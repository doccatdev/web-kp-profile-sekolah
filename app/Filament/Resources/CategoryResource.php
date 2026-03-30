<?php

namespace App\Filament\Resources;

use App\Models\Category;
use App\Filament\Resources\CategoryResource\Pages;
use Filament\Resources\Resource;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Set;

use Filament\Tables\Columns\TextColumn;
use Filament\Notifications\Notification;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';
    protected static ?string $navigationLabel = 'Kategori Berita'; // Diubah agar spesifik
    protected static ?string $modelLabel = 'Kategori Berita';
    protected static ?string $pluralModelLabel = 'Kategori Berita';
    protected static ?string $navigationGroup = 'Berita & Pengumuman';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Data Kategori')
                    ->description('Kelola pengelompokan khusus untuk Berita sekolah.')
                    ->schema([
                        TextInput::make('name_category')
                            ->label('Nama Kategori')
                            ->placeholder('Contoh: Kegiatan, Prestasi, Akademik, dll')
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
                        
                        // Select 'type' sudah DIHAPUS
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

                TextColumn::make('slug')
                    ->label('Slug')
                    ->badge()
                    ->color('gray'),

                // Menghitung jumlah berita yang menggunakan kategori ini
                TextColumn::make('news_count')
                    ->label('Total Berita')
                    ->counts('news')
                    ->badge()
                    ->color('success'),

                TextColumn::make('created_at')
                    ->label('Dibuat pada')
                    ->dateTime('d M Y')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                // Filter 'type' sudah DIHAPUS
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