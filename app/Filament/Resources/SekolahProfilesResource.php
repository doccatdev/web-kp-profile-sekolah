<?php

namespace App\Filament\Resources;

use App\Models\SekolahProfile;
use App\Filament\Resources\SekolahProfilesResource\Pages;
use Filament\Resources\Resource;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;

// Components
use Filament\Forms\Components\Section;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class SekolahProfilesResource extends Resource
{
    protected static ?string $model = SekolahProfile::class;

    protected static ?string $navigationIcon = 'heroicon-o-home-modern';
    protected static ?string $navigationLabel = 'Profil Sekolah';
    protected static ?string $modelLabel = 'Profil Sekolah';
    protected static ?string $pluralModelLabel = 'Profil Sekolah';
    protected static ?string $navigationGroup = 'Profil Sekolah';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Kolom 1: Detail Sekolah
                Section::make('Detail Sekolah')
                    ->schema([
                        RichEditor::make('profil_sekolah')
                            ->label('Profil Utama')
                            ->required(),

                        RichEditor::make('sejarah_singkat')
                            ->label('Sejarah Singkat')
                            ->required(),
                    ]),

                // Kolom 2: Visi & Misi (Terpisah Baris)
                Section::make('Visi & Misi')
                    ->schema([
                        RichEditor::make('visi')
                            ->label('Visi Sekolah')
                            ->required(),

                        RichEditor::make('misi')
                            ->label('Misi Sekolah')
                            ->required(),
                    ]),

                // Bagian Terakhir: Logo
                Section::make('Logo')
                    ->schema([
                        FileUpload::make('logo_sekolah')
                            ->label('Upload Logo')
                            ->image()
                            ->directory('sekolah')
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/jpg', 'image/webp'])
                            ->helperText('Format file yang didukung adalah JPEG, PNG, JPG, WEBP. Maksimal ukuran file 2MB')
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
                ImageColumn::make('logo_sekolah')
                    ->label('Logo'),

                TextColumn::make('profil_sekolah')
                    ->label('Profil')
                    ->html()
                    ->limit(50),

                TextColumn::make('updated_at')
                    ->label('Terakhir Diperbarui')
                    ->dateTime('d M Y')
                    ->color('gray'),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListSekolahProfiles::route('/'),
            'create' => Pages\CreateSekolahProfiles::route('/create'),
            'edit' => Pages\EditSekolahProfiles::route('/{record}/edit'),
        ];
    }
}
