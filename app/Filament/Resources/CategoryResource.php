<?php

namespace App\Filament\Resources;

// Library Inti
use App\Models\Category;
use App\Filament\Resources\CategoryResource\Pages;
use Filament\Resources\Resource;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

// Form Components
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Set;

// Table & Notification
use Filament\Tables\Columns\TextColumn;
use Filament\Notifications\Notification;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';
    protected static ?string $navigationLabel = 'Kategori Berita & Pengumuman';
    protected static ?string $modelLabel = 'Kategori';
    protected static ?string $pluralModelLabel = 'Kategori Berita & Pengumuman';
    protected static ?string $navigationGroup = 'Berita & Pengumuman';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Data Kategori')
                    ->description('Kelola pengelompokan untuk Berita dan Pengumuman sekolah.')
                    ->schema([
                        TextInput::make('name_category')
                            ->label('Nama Kategori')
                            ->placeholder('Contoh: Kegiatan Sekolah, Info Kurikulum, dll')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state))),

                        TextInput::make('slug')
                            ->label('Slug (Otomatis)')
                            ->required()
                            ->readOnly()
                            ->dehydrated(true)
                            ->unique(ignoreRecord: true),

                        // MODIFIKASI: Menghapus opsi 'prestasi'
                        Select::make('type')
                            ->label('Tipe Kategori')
                            ->options([
                                'berita' => 'Berita',
                                'pengumuman' => 'Pengumuman',
                            ])
                            ->required()
                            ->native(false)
                            ->helperText('Tentukan apakah kategori ini digunakan untuk modul Berita atau Pengumuman.'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name_category')
                    ->label('Nama Kategori')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('type')
                    ->label('Tipe')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'berita' => 'info',
                        'pengumuman' => 'warning',
                        default => 'gray',
                    })
                    ->searchable(),

                TextColumn::make('slug')
                    ->label('Slug')
                    ->badge()
                    ->color('gray'),

                // MODIFIKASI: Hanya menghitung jumlah Berita (Relasi news/berita)
                // Pastikan di Model Category ada relasi public function news()
                TextColumn::make('news_count')
                    ->label('Total Post')
                    ->counts('news')
                    ->badge()
                    ->color('success')
                    ->toggleable(),

                // MODIFIKASI: Kolom prestasis_count DIHAPUS karena sudah beda tabel

                TextColumn::make('created_at')
                    ->label('Dibuat pada')
                    ->dateTime('d M Y')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                // MODIFIKASI: Filter Tipe hanya Berita & Pengumuman
                Tables\Filters\SelectFilter::make('type')
                    ->label('Filter Tipe')
                    ->options([
                        'berita' => 'Berita',
                        'pengumuman' => 'Pengumuman',
                    ]),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->successNotification(
                        Notification::make()
                            ->success()
                            ->title('Kategori Dihapus')
                            ->body('Data kategori telah berhasil dihapus.')
                    ),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
