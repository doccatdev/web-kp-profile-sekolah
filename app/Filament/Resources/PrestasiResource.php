<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PrestasiResource\Pages;
use App\Models\Prestasi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

// Form Components
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Set;

// Table Components
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class PrestasiResource extends Resource
{
    protected static ?string $model = Prestasi::class;
    protected static ?string $navigationIcon = 'heroicon-o-trophy';
    protected static ?string $navigationLabel = 'Prestasi';
    protected static ?string $pluralLabel = 'Prestasi';
    protected static ?string $navigationGroup = 'Profil Sekolah';
    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informasi Utama')
                    ->columns(2)
                    ->schema([
                        TextInput::make('judul')
                            ->label('Judul Prestasi')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state))),

                        TextInput::make('slug')
                            ->label('Slug (Otomatis)')
                            ->required()
                            ->readOnly()
                            ->dehydrated(true)
                            ->unique(ignoreRecord: true),

                        TextInput::make('kategori_prestasi') // Disamakan dengan nama kolom di table lu
                            ->label('Bidang / Kategori')
                            ->placeholder('Contoh: Akademik, Olahraga, Seni')
                            ->required(),

                        TextInput::make('tingkat')
                            ->label('Tingkat')
                            ->placeholder('Contoh: Nasional, Provinsi, Kabupaten')
                            ->required(),

                        DatePicker::make('tanggal_posting')
                            ->label('Dibuat pada:')
                            ->required(),
                    ]),

                Section::make('Konten & Media')
                    ->schema([
                        FileUpload::make('thumbnail')
                            ->label('Foto Utama (Thumbnail)')
                            ->image()
                            ->directory('prestasi/thumbnails')
                            // MODIFIKASI: Max 2MB & Tipe File
                            ->maxSize(2048)
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/jpg', 'image/webp'])
                            ->helperText('Format: JPG, PNG, JPEG atau WEBP. Maksimal 2MB.')
                            ->required(),

                        RichEditor::make('konten')
                            ->label('Detail Prestasi')
                            ->required()
                            ->columnSpanFull()
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (string $operation, $state, Set $set) {
                                if ($operation === 'create') {
                                    $set('deskripsi_singkat', Str::limit(strip_tags($state), 150));
                                }
                            }),

                        TextInput::make('deskripsi_singkat')
                            ->label('Ringkasan / Preview')
                            ->helperText('Akan terisi otomatis jika Anda mengisi Konten.')
                            ->maxLength(255)
                            ->required(),
                    ]),

                Section::make('Galeri Dokumentasi')
                    ->description('Tambahkan banyak foto sekaligus untuk galeri prestasi.')
                    ->schema([
                        Repeater::make('photos')
                            ->relationship('photos')
                            ->schema([
                                FileUpload::make('foto')
                                    ->image()
                                    ->directory('prestasi/gallery')
                                    // MODIFIKASI: Max 2MB & Tipe File
                                    ->maxSize(2048)
                                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/jpg', 'image/webp'])
                                    ->helperText('Format: JPG, PNG, JPEG atau WEBP. Maksimal 2MB.')
                                    ->required(),
                                TextInput::make('caption')
                                    ->label('Keterangan Foto')
                                    ->placeholder('Opsional'),
                            ])
                            ->grid(2)
                            ->collapsible()
                            ->itemLabel(fn(array $state): ?string => $state['caption'] ?? 'Foto Prestasi'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('thumbnail')
                    ->label('Foto')
                    ->circular(),

                TextColumn::make('judul')
                    ->label('Judul Prestasi')
                    ->searchable()
                    ->sortable()
                    ->wrap(),

                TextColumn::make('kategori_prestasi')
                    ->label('Bidang')
                    ->badge()
                    ->color('success')
                    ->searchable(),

                TextColumn::make('tingkat')
                    ->label('Tingkat')
                    ->sortable(),

                TextColumn::make('tanggal_posting')
                    ->label('Tanggal Posting')
                    ->date('d M Y')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('kategori_prestasi')
                    ->label('Filter Bidang')
                    ->options(fn() => Prestasi::distinct()->pluck('kategori_prestasi', 'kategori_prestasi')->toArray()),
            ])
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
            'index' => Pages\ListPrestasis::route('/'),
            'create' => Pages\CreatePrestasi::route('/create'),
            'edit' => Pages\EditPrestasi::route('/{record}/edit'),
        ];
    }
}
