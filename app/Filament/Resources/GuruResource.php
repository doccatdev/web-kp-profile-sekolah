<?php

namespace App\Filament\Resources;

use App\Models\Guru;
use App\Filament\Resources\GuruResource\Pages;
use Filament\Resources\Resource;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

// Library Form Components
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Set; // Tambahkan ini untuk type-hinting

// Library Table Components
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class GuruResource extends Resource
{
    protected static ?string $model = Guru::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationLabel = 'Data Guru';
    protected static ?string $modelLabel = 'Data Guru';
    protected static ?string $pluralModelLabel = 'Data Guru';
    protected static ?string $navigationGroup = 'Profil Sekolah';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informasi Profil Guru')
                    ->description('Kelola data guru sekolah.')
                    ->collapsible()
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('nama')
                                    ->label('Nama Lengkap')
                                    ->required()
                                    ->maxLength(255)
                                    ->placeholder('Masukkan nama beserta gelar...')
                                    ->live(onBlur: true)
                                    // Menggunakan Set $set untuk memastikan slug terisi
                                    ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state))),

                                TextInput::make('slug')
                                    ->required()
                                    ->unique(ignoreRecord: true) // Mencegah error duplikat slug
                                    ->hidden()
                                    ->dehydrated(true), // Memastikan field dikirim ke database saat simpan

                                TextInput::make('jabatan')
                                    ->label('Jabatan')
                                    ->required()
                                    ->placeholder('Contoh: Kepala Sekolah')
                                    ->maxLength(255),

                                TextInput::make('mata_pelajaran')
                                    ->label('Mata Pelajaran')
                                    ->placeholder('Contoh: Matematika')
                                    ->maxLength(255),
                            ]),

                        FileUpload::make('foto')
                            ->label('Foto Profil')
                            ->image()
                            ->avatar()
                            ->imageEditor()
                            ->directory('guru')
                            ->disk('public')
                            ->maxSize(2048)
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('foto')
                    ->label('Foto')
                    ->circular(),

                TextColumn::make('nama')
                    ->label('Nama Guru')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('jabatan')
                    ->label('Jabatan')
                    ->badge()
                    ->color('info')
                    ->searchable(),

                TextColumn::make('mata_pelajaran')
                    ->label('Mata Pelajaran')
                    ->placeholder('-')
                    ->searchable(),
            ])
            ->filters([])
            ->actions([
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
            'index' => Pages\ListGurus::route('/'),
            'create' => Pages\CreateGuru::route('/create'),
            'edit' => Pages\EditGuru::route('/{record}/edit'),
        ];
    }
}
