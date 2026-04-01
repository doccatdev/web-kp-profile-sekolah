<?php

namespace App\Filament\Resources;

use App\Models\PengumumanSekolah;
use App\Filament\Resources\PengumumanSekolahResource\Pages;
use Filament\Resources\Resource;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

// Form Components
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Set;

// Table Components
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class PengumumanSekolahResource extends Resource
{
    protected static ?string $model = PengumumanSekolah::class;

    protected static ?string $navigationIcon = 'heroicon-o-megaphone';
    protected static ?string $navigationLabel = 'Pengumuman Sekolah';
    protected static ?string $modelLabel = 'Pengumuman';
    protected static ?string $pluralLabel = 'Pengumuman Sekolah';
    protected static ?string $navigationGroup = 'Berita & Pengumuman';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Section Utama (Judul & Isi)
                Section::make('Konten Pengumuman')
                    ->description('Tuliskan detail pengumuman utama di sini.')
                    ->schema([
                        TextInput::make('judul_pengumuman')
                            ->label('Judul Pengumuman')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->placeholder('Contoh: Penerimaan Peserta Didik Baru')
                            ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),

                        TextInput::make('slug')
                            ->label('Slug / URL')
                            ->required()
                            ->unique(PengumumanSekolah::class, 'slug', ignoreRecord: true)
                            ->helperText('Otomatis terisi, bisa diedit jika perlu.'),

                        RichEditor::make('isi_pengumuman')
                            ->label('Isi Pengumuman')
                            ->required()
                            ->columnSpanFull()
                            ->toolbarButtons([
                                'attachFiles', 'blockquote', 'bold', 'bulletList', 'codeBlock',
                                'h2', 'h3', 'italic', 'link', 'orderedList', 'redo', 'strike', 'undo',
                            ]),
                    ])->columns(2),

                // Section Atribut & Media
                Section::make('Atribut & Gambar')
                    ->description('Unggah gambar utama dan tentukan tanggal terbit.')
                    ->schema([
                        // Select category_id sudah DIHAPUS

                        DatePicker::make('posted_at')
                            ->label('Dibuat pada:')
                            ->required()
                            ->native(false)
                            ->default(now()),

                        FileUpload::make('thumbnail')
                            ->label('Thumbnail Pengumuman')
                            ->image()
                            ->imageEditor()
                            ->directory('pengumuman')
                            ->disk('public')
                            ->required()
                            ->helperText('Format: JPG/PNG/WEBP. Rekomendasi 1200x600px.'),

                        Textarea::make('deskripsi_singkat')
                            ->label('Ringkasan (Excerpt)')
                            ->placeholder('Tulis ringkasan singkat untuk tampilan card...')
                            ->rows(3)
                            ->helperText('Ringkasan singkat yang akan muncul di halaman depan.'),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('thumbnail')
                    ->label('Thumbnail')
                    ->square(),

                TextColumn::make('judul_pengumuman')
                    ->label('Judul')
                    ->searchable()
                    ->wrap()
                    ->limit(50),

                // TextColumn category.name_category sudah DIHAPUS

                TextColumn::make('posted_at')
                    ->label('Terbit')
                    ->date('d M Y')
                    ->sortable(),
            ])
            ->filters([
                // Filter category_id sudah DIHAPUS
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
            'index' => Pages\ListPengumumanSekolahs::route('/'),
            'create' => Pages\CreatePengumumanSekolah::route('/create'),
            'edit' => Pages\EditPengumumanSekolah::route('/{record}/edit'),
        ];
    }
}
