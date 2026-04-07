<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FasilitasResource\Pages;
use App\Models\Fasilitas;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Illuminate\Support\Str;

// --- IMPORT COMPONENT FORM ---
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Repeater;

// --- IMPORT COMPONENT TABLE ---
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;

class FasilitasResource extends Resource
{
    protected static ?string $model = Fasilitas::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';
    protected static ?string $navigationLabel = 'Sarana & Prasarana';
    protected static ?string $navigationGroup = 'Profil Sekolah';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // SECTION 1: DATA UTAMA
                Section::make('Informasi Dasar')
                    ->description('Kelola informasi nama, icon, dan ringkasan fasilitas sekolah.')
                    ->schema([
                        TextInput::make('nama_fasilitas')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),

                        TextInput::make('slug')
                            ->required()
                            ->disabled()
                            ->dehydrated()
                            ->unique(Fasilitas::class, 'slug', ignoreRecord: true),

                        TextInput::make('icon_class')
                            ->label('Icon Class (Bootstrap Icons)')
                            ->placeholder('bi bi-laptop')
                            ->helperText('Contoh: bi bi-laptop, bi bi-book.'),

                        FileUpload::make('thumbnail')
                            ->label('Foto Utama (Thumbnail)')
                            ->image()
                            ->disk('public')
                            ->directory('fasilitas/thumbnails')
                            ->required()
                            ->columnSpanFull()
                            // --- TAMBAHAN VALIDASI ---
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                            ->maxSize(2048) // 2MB
                            ->helperText('Format: JPG, PNG, atau WEBP. Maksimal ukuran file: 2MB.'),

                        Textarea::make('deskripsi_singkat')
                            ->label('Ringkasan')
                            ->rows(3)
                            ->placeholder('Tulis ringkasan singkat untuk tampilan kartu...')
                            ->columnSpanFull(),
                    ])->columns(2),

                // SECTION 2: ARTIKEL LENGKAP
                Section::make('Detail Lengkap')
                    ->description('Tuliskan detail atau deskripsi lengkap fasilitas.')
                    ->schema([
                        RichEditor::make('deskripsi_fasilitas')
                            ->label('Detail Fasilitas')
                            ->required()
                            ->columnSpanFull(),
                    ]),

                // SECTION 3: GALERI DOKUMENTASI
                Section::make('Galeri Dokumentasi')
                    ->description('Foto-foto tambahan untuk slider atau carousel di halaman depan.')
                    ->schema([
                        Repeater::make('galeri')
                            ->relationship('galeri')
                            ->schema([
                                FileUpload::make('image')
                                    ->label('Upload Gambar')
                                    ->image()
                                    ->disk('public')
                                    ->directory('fasilitas/galeri')
                                    ->required()
                                    // --- TAMBAHAN VALIDASI ---
                                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/jpg', 'image/webp'])
                                    ->maxSize(2048) // 1MB untuk galeri
                                    ->helperText('Format: JPG/JPEG/PNG/WEBP. Max: 2MB.'),

                                TextInput::make('caption')
                                    ->label('Keterangan Gambar')
                                    ->placeholder('Contoh: Suasana ruang kelas...'),
                            ])
                            ->columns(2)
                            ->grid(2)
                            ->label('Koleksi Foto Tambahan')
                            ->createItemButtonLabel('Tambah Foto Baru'),
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

                TextColumn::make('nama_fasilitas')
                    ->label('Nama Fasilitas')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('icon_class')
                    ->label('Icon')
                    ->badge()
                    ->color('info'),

                TextColumn::make('slug')
                    ->label('URL Slug')
                    ->color('gray'),
            ])
            ->filters([])
            ->actions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFasilitas::route('/'),
            'create' => Pages\CreateFasilitas::route('/create'),
            'edit' => Pages\EditFasilitas::route('/{record}/edit'),
        ];
    }
}
