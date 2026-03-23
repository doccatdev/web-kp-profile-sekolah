<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProgramUnggulanResource\Pages;
use App\Models\ProgramUnggulan;
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

class ProgramUnggulanResource extends Resource
{
    protected static ?string $model = ProgramUnggulan::class;

    protected static ?string $navigationIcon = 'heroicon-o-sparkles';
    protected static ?string $navigationGroup = 'Profil Sekolah';
    protected static ?string $navigationLabel = 'Program Unggulan';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // SECTION 1: Identitas Program
                Section::make('Informasi Utama')
                    ->description('Masukkan judul dan kategori program.')
                    ->schema([
                        TextInput::make('nama_program')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn ($state, $set) => $set('slug', Str::slug($state))),

                        TextInput::make('slug')
                            ->disabled()
                            ->dehydrated()
                            ->required()
                            ->unique(ProgramUnggulan::class, 'slug', ignoreRecord: true),

                        TextInput::make('badge_text')
                            ->label('Label Kategori (Contoh: Tahfidz)'),

                        TextInput::make('icon_class')
                            ->label('Icon Class')
                            ->default('bi bi-star'),
                    ])->columns(2),

                // SECTION 2: Media & Deskripsi
                Section::make('Konten & Media')
                    ->schema([
                        FileUpload::make('thumbnail')
                            ->label('Foto Utama')
                            ->image()
                            ->disk('public')
                            ->directory('program-unggulan')
                            ->required()
                            // --- VALIDASI & HELPER ---
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                            ->maxSize(2048) // 2MB
                            ->helperText('Format: JPG, PNG, atau WEBP. Maksimal 2MB. Gunakan rasio 16:9 agar tampilan rapi.')
                            ->columnSpanFull(),

                        Textarea::make('deskripsi_singkat')
                            ->label('Ringkasan')
                            ->rows(3)
                            ->columnSpanFull(),

                        RichEditor::make('deskripsi_program')
                            ->label('Detail Lengkap')
                            ->required()
                            ->columnSpanFull(),
                    ]),

                // SECTION 3: Galeri
                Section::make('Galeri Foto Kegiatan')
                    ->schema([
                        Repeater::make('galleries')
                            ->relationship('galleries')
                            ->schema([
                                FileUpload::make('image')
                                    ->label('Foto Galeri')
                                    ->image()
                                    ->required()
                                    ->directory('program-unggulan/galleries')
                                    // --- VALIDASI & HELPER ---
                                    ->acceptedFileTypes(['image/jpeg', 'image/jpg','image/png', 'image/webp'])
                                    ->maxSize(1024) // 1MB untuk galeri biar gak berat
                                    ->helperText('Format: JPEG/JPG/PNG/WEBP/. Max 1MB.'),

                                TextInput::make('caption')
                                    ->label('Keterangan'),
                            ])
                            ->columns(2)
                            ->grid(2)
                            ->itemLabel(fn (array $state): ?string => $state['caption'] ?? null),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('thumbnail')->circular(),
                TextColumn::make('nama_program')->searchable()->sortable(),
                TextColumn::make('badge_text')->badge()->color('success'),
            ])
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
            'index' => Pages\ListProgramUnggulans::route('/'),
            'create' => Pages\CreateProgramUnggulan::route('/create'),
            'edit' => Pages\EditProgramUnggulan::route('/{record}/edit'),
        ];
    }
}
