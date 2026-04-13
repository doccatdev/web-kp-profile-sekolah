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
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
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

        // Teachers only see their own articles
        if (auth()->user()->hasRole('teacher')) {
            $query->where('author_id', auth()->id());
        }

        return $query;
    }

    public static function form(Form $form): Form
    {
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
                            ->hidden(fn () => auth()->user()->hasRole('teacher')), // teachers cannot change status

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
            ]);
    }

    public static function table(Table $table): Table
    {
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
                    ->sortable(),

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
                EditAction::make(),

                Action::make('approve')
                    ->label('Setujui')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->visible(
                        fn (News $record): bool =>
                            $record->status !== 'published' &&
                            ! auth()->user()->hasRole('teacher') // teachers cannot approve
                    )
                    ->requiresConfirmation()
                    ->modalHeading('Setujui Artikel')
                    ->modalDescription('Artikel ini akan dipublikasikan dan dapat dilihat oleh pengunjung.')
                    ->modalSubmitActionLabel('Ya, Setujui')
                    ->action(function (News $record): void {
                        $record->update(['status' => 'published']);
                        Notification::make()
                            ->success()
                            ->title('Artikel Disetujui')
                            ->body('Artikel berhasil dipublikasikan.')
                            ->send();
                    }),

                Action::make('reject')
                    ->label('Tolak')
                    ->icon('heroicon-o-x-circle')
                    ->color('danger')
                    ->visible(
                        fn (News $record): bool =>
                            $record->status !== 'rejected' &&
                            ! auth()->user()->hasRole('teacher') // teachers cannot reject
                    )
                    ->requiresConfirmation()
                    ->modalHeading('Tolak Artikel')
                    ->modalDescription('Artikel ini akan ditolak dan tidak akan ditampilkan ke pengunjung.')
                    ->modalSubmitActionLabel('Ya, Tolak')
                    ->action(function (News $record): void {
                        $record->update(['status' => 'rejected']);
                        Notification::make()
                            ->warning()
                            ->title('Artikel Ditolak')
                            ->body('Artikel telah ditolak.')
                            ->send();
                    }),

                DeleteAction::make()
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
                        ->visible(! auth()->user()->hasRole('teacher'))
                        ->requiresConfirmation()
                        ->modalHeading('Setujui Semua Artikel Terpilih')
                        ->modalSubmitActionLabel('Ya, Setujui Semua')
                        ->action(fn ($records) => $records->each->update(['status' => 'published']))
                        ->deselectRecordsAfterCompletion(),

                    BulkAction::make('bulk_reject')
                        ->label('Tolak Semua')
                        ->icon('heroicon-o-x-mark')
                        ->color('danger')
                        ->visible(! auth()->user()->hasRole('teacher'))
                        ->requiresConfirmation()
                        ->modalHeading('Tolak Semua Artikel Terpilih')
                        ->modalSubmitActionLabel('Ya, Tolak Semua')
                        ->action(fn ($records) => $records->each->update(['status' => 'rejected']))
                        ->deselectRecordsAfterCompletion(),

                    DeleteBulkAction::make(),
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