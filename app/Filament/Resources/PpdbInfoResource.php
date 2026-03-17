<?php

namespace App\Filament\Resources;

use App\Models\PpdbInfo;
use App\Filament\Resources\PpdbInfoResource\Pages;
use Filament\Resources\Resource;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;

// Form Components
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;

// Table Components
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class PpdbInfoResource extends Resource
{
    protected static ?string $model = PpdbInfo::class;
    protected static ?string $navigationLabel = 'PPDB';
    protected static ?string $pluralLabel = 'Informasi PPDB';
    protected static ?string $modelLabel = 'Informasi PPDB';
    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationGroup = 'PPDB Sekolah';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(3)
                    ->schema([
                        // Sisi Kiri: Detail & Persyaratan (Lebar 2)
                        Section::make('Rincian Penerimaan')
                            ->description('Kelola informasi status, biaya, tahun ajaran dan persyaratan PPDB')
                            ->columnSpan(2)
                            ->schema([
                                Grid::make(2)
                                    ->schema([
                                        Select::make('status')
                                            ->options([
                                                'Buka' => 'Buka',
                                                'Tutup' => 'Tutup',
                                            ])
                                            ->required()
                                            ->native(false),

                                        TextInput::make('tahun_ajaran')
                                            ->placeholder('2024/2025')
                                            ->required(),
                                    ]),

                                RichEditor::make('rincian_biaya')
                                    ->label('Rincian Biaya')
                                    ->required(),

                                RichEditor::make('persyaratan')
                                    ->label('Persyaratan Pendaftaran')
                                    ->required(),
                            ]),

                        // Sisi Kanan: Brosur & Kontak (Lebar 1)
                        Section::make('Media & Kontak')
                            ->description('Kelola informasi brosur dan kontak panitia PPDB')
                            ->columnSpan(1)
                            ->schema([
                                FileUpload::make('gambar_brosur')
                                    ->label('Brosur PPDB')
                                    ->image()
                                    ->imageEditor()
                                    ->directory('ppdb')
                                    ->disk('public')
                                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/jpg', 'image/webp'])
                                    ->helperText('Format file yang didukung adalah JPEG, PNG, JPG, WEBP. Maksimal ukuran file 2MB')
                                    ->maxSize(2048)
                                    ->required(),

                                Repeater::make('contacts')
                                    ->relationship('contacts')
                                    ->label('Admin WA')
                                    ->schema([
                                        TextInput::make('nama_admin')
                                            ->label('Nama')
                                            ->required(),
                                        TextInput::make('nomor_whatsapp')
                                            ->label('No. WA')
                                            ->placeholder('628xxx')
                                            ->tel()
                                            ->required(),
                                    ])
                                    ->itemLabel(fn (array $state): ?string => $state['nama_admin'] ?? null)
                                    ->collapsible()
                                    ->collapsed() // Default tertutup agar hemat ruang
                                    ->addActionLabel('Tambah Admin'),
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('tahun_ajaran')
                    ->label('Tahun Ajaran')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'Buka' => 'success',
                        'Tutup' => 'danger',
                        default => 'gray',
                    }),

                TextColumn::make('contacts_count')
                    ->label('Total Admin')
                    ->counts('contacts')
                    ->badge()
                    ->color('info'),

                ImageColumn::make('gambar_brosur')
                    ->label('Brosur')
                    ->disk('public')
                    ->square(),
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
            'index' => Pages\ListPpdbInfos::route('/'),
            'create' => Pages\CreatePpdbInfo::route('/create'),
            'edit' => Pages\EditPpdbInfo::route('/{record}/edit'),
        ];
    }
}
