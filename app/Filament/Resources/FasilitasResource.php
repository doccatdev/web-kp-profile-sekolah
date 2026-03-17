<?php

namespace App\Filament\Resources;;

use App\Filament\Resources\FasilitasResource\Pages;
use App\Models\Fasilitas;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Repeater;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class FasilitasResource extends Resource
{
    protected static ?string $model = Fasilitas::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';
    protected static ?string $navigationLabel = 'Sarana & Prasarana Sekolah';
    protected static ?string $navigationGroup = 'Profil Sekolah';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Fasilitas')
                    ->tabs([
                        // TAB 1: DATA UTAMA
                        Tabs\Tab::make('Informasi Dasar')
                            ->schema([
                                Section::make('Data Utama')
                                    ->description('Kelola informasi status, nama, dan ringkasan fasilitas sekolah.')
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
                                            ->helperText('Contoh: bi bi-laptop, bi bi-book. Kosongkan jika tidak perlu.'),

                                        Textarea::make('deskripsi_singkat')
                                            ->required()
                                            ->rows(3)
                                            ->placeholder('Tulis ringkasan singkat untuk tampilan kartu...'),

                                        FileUpload::make('thumbnail')
                                            ->label('Foto Utama (Thumbnail)')
                                            ->image()
                                            ->disk('public')
                                            ->directory('fasilitas/thumbnails')
                                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/jpg', 'image/webp'])
                                            ->maxSize(2048) // Limit 2MB
                                            ->required()
                                            ->helperText('Format: JPG, PNG, atau WEBP. Maksimal ukuran file: 2MB.'),
                                    ]),
                            ]),

                        // TAB 2: DETAIL
                        Tabs\Tab::make('Konten Detail')
                            ->schema([
                                Section::make('Artikel Lengkap')
                                    ->description('Tuliskan detail atau deskripsi lengkap fasilitas.')
                                    ->schema([
                                        RichEditor::make('deskripsi_fasilitas')
                                            ->required()
                                            ->columnSpanFull(),
                                    ]),
                            ]),

                        // TAB 3: GALERI
                        Tabs\Tab::make('Galeri Dokumentasi')
                            ->schema([
                                Section::make('Koleksi Foto')
                                    ->description('Foto-foto tambahan untuk slider/carousel di halaman detail.')
                                    ->schema([
                                        Repeater::make('galeri')
                                            ->relationship('galeri')
                                            ->schema([
                                                FileUpload::make('image')
                                                    ->label('Upload Gambar')
                                                    ->image()
                                                    ->disk('public')
                                                    ->directory('fasilitas/galeri')
                                                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/jpg', 'image/webp'])
                                                    ->maxSize(2048)
                                                    ->required()
                                                    ->helperText('Gunakan gambar landscape agar tampilan carousel rapi. Format file yang didukung adalah JPEG, PNG, JPG, WEBP. Maksimal ukuran file 2MB'),
                                                TextInput::make('caption')
                                                    ->label('Keterangan Gambar')
                                                    ->placeholder('Siswa sedang melakukan praktikum...'),
                                            ])
                                            ->columns(2)
                                            ->grid(2)
                                            ->label('Koleksi Foto')
                                            ->createItemButtonLabel('Tambah Foto Baru'),
                                    ]),
                            ]),
                    ])->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('thumbnail')
                    ->label('Foto')
                    ->disk('public')
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
            'index' => Pages\ListFasilitas::route('/'),
            'create' => Pages\CreateFasilitas::route('/create'),
            'edit' => Pages\EditFasilitas::route('/{record}/edit'),
        ];
    }
}
