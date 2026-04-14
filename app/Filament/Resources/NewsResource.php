<?php

namespace App\Filament\Resources;

use App\Models\News;
use App\Models\Category;
use App\Filament\Resources\NewsResource\Pages;
use Filament\Resources\Resource;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;

// Form Components
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Set;

// Table Components
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\BulkAction;

// Notification
use Filament\Notifications\Notification;

class NewsResource extends Resource
{
    protected static ?string $model = News::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $navigationLabel = 'Berita Sekolah';
    protected static ?string $modelLabel = 'Berita';
    protected static ?string $pluralLabel = 'Berita';
    protected static ?string $navigationGroup = 'Berita & Pengumuman';
    protected static ?int $navigationSort = 2;

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();

        // Guru hanya lihat artikel milik sendiri
        if (auth()->user()->hasRole('teacher')) {
            $query->where('author_id', auth()->id());
        }

        return $query;
    }

    public static function form(Form $form): Form
    {
        $isTeacher = auth()->user()->hasRole('teacher');

        return $form
            ->schema([
                Section::make('Informasi Berita')
                    ->schema([
                        TextInput::make('news_title')
                            ->label('Judul Berita')
                            ->required()
                            ->live(onBlur: true)
                            ->placeholder('Masukkan judul berita...')
                            ->afterStateUpdated(
                                fn (Set $set, ?string $state) => $set('slug', Str::slug($state))
                            ),

                        TextInput::make('slug')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->hidden()
                            ->dehydrated(true),

                        RichEditor::make('news_content')
                            ->label('Isi Berita')
                            ->required()
                            ->placeholder('Tuliskan isi berita di sini...')
                            ->columnSpanFull(),
                    ]),

                Section::make('Atribut & Media')
                    ->schema([
                        Select::make('category_id')
                            ->label('Kategori')
                            ->options(Category::all()->pluck('name_category', 'id'))
                            ->searchable()
                            ->preload()
                            ->required(),

                        Select::make('status')
                            ->label('Status')
                            ->options([
                                'pending'   => 'Menunggu',
                                'published' => 'Dipublikasikan',
                                'rejected'  => 'Ditolak',
                            ])
                            ->default('pending')
                            ->required()
                            ->disabled($isTeacher)   // guru lihat tapi tidak bisa ubah
                            ->dehydrated(! $isTeacher), // nilai tidak ikut di-save jika guru

                        DatePicker::make('posted_at')
                            ->label('Dibuat pada:')
                            ->required()
                            ->native(false)
                            ->default(now()),

                        FileUpload::make('image')
                            ->label('Thumbnail Berita')
                            ->image()
                            ->imageEditor()
                            ->directory('berita')
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/jpg', 'image/webp'])
                            ->helperText('Format: JPG/PNG/JPEG/WEBP. Max: 2MB.')
                            ->maxSize(2048)
                            ->disk('public')
                            ->required(),
                    ]),

                // ── Alasan Penolakan ──────────────────────────────────────
                // Tampil untuk semua role, tapi hanya jika status = rejected
                Section::make('Alasan Penolakan')
                    ->icon('heroicon-o-exclamation-triangle')
                    ->collapsible()
                    ->schema([

                        // Guru: read-only
                        Placeholder::make('rejection_reason_readonly')
                            ->label('Alasan dari Admin')
                            ->content(
                                fn (?News $record): string =>
                                    $record?->rejection_reason ?? 'Tidak ada keterangan dari admin.'
                            )
                            ->visible($isTeacher),

                        // Admin: bisa edit
                        Textarea::make('rejection_reason')
                            ->label('Alasan Penolakan')
                            ->placeholder('Tulis alasan penolakan berita ini..')
                            ->rows(3)
                            ->maxLength(500)
                            ->helperText('Alasan ini akan terlihat oleh penuli.')
                            ->visible(! $isTeacher),
                    ])
                    ->visible(
                        fn (?News $record): bool =>
                            $record !== null && $record->status === 'rejected'
                    ),
            ]);
    }

    public static function table(Table $table): Table
    {
        $isTeacher = auth()->user()->hasRole('teacher');

        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Gambar')
                    ->square(),

                TextColumn::make('news_title')
                    ->label('Judul Berita')
                    ->searchable()
                    ->wrap()
                    ->limit(50),

                TextColumn::make('author.name')
                    ->label('Penulis')
                    ->default('Admin')
                    ->sortable()
                    ->visible(! $isTeacher), // guru tidak perlu lihat kolom penulis

                TextColumn::make('category.name_category')
                    ->label('Kategori')
                    ->badge()
                    ->color('info'),

                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'published' => 'success',
                        'pending'   => 'warning',
                        'rejected'  => 'danger',
                        default     => 'gray',
                    }),

                // Kolom rejection reason — tampil di baris hanya jika rejected
                // Guru dan admin sama-sama bisa lihat di tabel
                TextColumn::make('rejection_reason')
                    ->label('Alasan Penolakan')
                    ->placeholder('—')
                    ->limit(50)
                    ->tooltip(fn (News $record): ?string => $record->rejection_reason)
                    ->wrap()
                    ->color('danger')
                    ->visible(fn (): bool => $isTeacher) // selalu tampil di kolom untuk guru
                    ->formatStateUsing(fn (?string $state): string => $state ?? '—'),

                TextColumn::make('posted_at')
                    ->label('Tanggal Terbit')
                    ->date('d M Y')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('category_id')
                    ->label('Filter Kategori')
                    ->relationship('category', 'name_category'),

                SelectFilter::make('status')
                    ->label('Filter Status')
                    ->options([
                        'pending'   => 'Menunggu',
                        'published' => 'Dipublikasikan',
                        'rejected'  => 'Ditolak',
                    ]),
            ])
            ->actions([
                ViewAction::make(),
                EditAction::make()
                    ->visible(
                        fn (News $record): bool =>
                            // Guru hanya bisa edit artikel yang belum published
                            $isTeacher
                                ? $record->status !== 'published'
                                : true
                    ),

                Action::make('approve')
                    ->label('Setujui')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->visible(
                        fn (News $record): bool =>
                            $record->status !== 'published' && ! $isTeacher
                    )
                    ->requiresConfirmation()
                    ->modalHeading('Setujui Berita')
                    ->modalDescription('Berita ini akan dipublikasikan dan dapat dilihat oleh pengunjung.')
                    ->modalSubmitActionLabel('Ya, Setujui')
                    ->action(function (News $record): void {
                        $record->update([
                            'status'           => 'published',
                            'rejection_reason' => null,
                        ]);
                        Notification::make()
                            ->success()
                            ->title('Berita Disetujui')
                            ->body('Berita berhasil dipublikasikan.')
                            ->send();
                    }),

                Action::make('reject')
                    ->label('Tolak')
                    ->icon('heroicon-o-x-circle')
                    ->color('danger')
                    ->visible(
                        fn (News $record): bool =>
                            $record->status !== 'rejected' && ! $isTeacher
                    )
                    ->modalHeading('Tolak Berita')
                    ->modalDescription('Berikan alasan penolakan agar penulis dapat memperbaiki beritanya.')
                    ->modalSubmitActionLabel('Ya, Tolak')
                    ->modalWidth('lg')
                    ->form([
                        Textarea::make('rejection_reason')
                            ->label('Alasan Penolakan')
                            ->placeholder('Contoh: Konten kurang relevan, mohon perbaiki bagian pengantar...')
                            ->required()
                            ->rows(4)
                            ->maxLength(500)
                            ->helperText('Wajib diisi. Alasan ini akan terlihat oleh penulis berita.'),
                    ])
                    ->action(function (News $record, array $data): void {
                        $record->update([
                            'status'           => 'rejected',
                            'rejection_reason' => $data['rejection_reason'],
                        ]);
                        Notification::make()
                            ->warning()
                            ->title('Berita Ditolak')
                            ->body('Berita telah ditolak dengan alasan yang tercatat.')
                            ->send();
                    }),

                DeleteAction::make()
                    ->visible(fn (): bool => ! $isTeacher) // guru tidak bisa hapus
                    ->successNotification(
                        Notification::make()
                            ->success()
                            ->title('Berita Dihapus')
                            ->body('Data berita telah berhasil dihapus.')
                    ),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    BulkAction::make('bulk_approve')
                        ->label('Setujui Semua')
                        ->icon('heroicon-o-check')
                        ->color('success')
                        ->visible(! $isTeacher)
                        ->requiresConfirmation()
                        ->modalHeading('Setujui Semua Berita Terpilih')
                        ->modalSubmitActionLabel('Ya, Setujui Semua')
                        ->action(fn ($records) => $records->each->update([
                            'status'           => 'published',
                            'rejection_reason' => null,
                        ]))
                        ->deselectRecordsAfterCompletion(),

                    BulkAction::make('bulk_reject')
                        ->label('Tolak Semua')
                        ->icon('heroicon-o-x-mark')
                        ->color('danger')
                        ->visible(! $isTeacher)
                        ->modalHeading('Tolak Semua Berita Terpilih')
                        ->modalSubmitActionLabel('Ya, Tolak Semua')
                        ->modalWidth('lg')
                        ->form([
                            Textarea::make('rejection_reason')
                                ->label('Alasan Penolakan')
                                ->placeholder('Alasan ini akan diterapkan ke semua berita yang dipilih...')
                                ->required()
                                ->rows(4)
                                ->maxLength(500)
                                ->helperText('Wajib diisi. Alasan ini berlaku untuk semua berita terpilih.'),
                        ])
                        ->action(function ($records, array $data): void {
                            $records->each->update([
                                'status'           => 'rejected',
                                'rejection_reason' => $data['rejection_reason'],
                            ]);
                        })
                        ->deselectRecordsAfterCompletion(),

                    DeleteBulkAction::make()
                        ->visible(! $isTeacher),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListNews::route('/'),
            'create' => Pages\CreateNews::route('/create'),
            'edit'   => Pages\EditNews::route('/{record}/edit'),
        ];
    }
}