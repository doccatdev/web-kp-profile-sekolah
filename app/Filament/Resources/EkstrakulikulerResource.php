<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EkstrakulikulerResource\Pages;
use App\Models\Ekstrakulikuler;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Illuminate\Support\HtmlString;

/**
 * IMPORT FORMS COMPONENTS
 */
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Set;

/**
 * IMPORT TABLES COMPONENTS
 */
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;

class EkstrakulikulerResource extends Resource
{
    protected static ?string $model = Ekstrakulikuler::class;
    protected static ?string $navigationIcon = 'heroicon-o-puzzle-piece';
    protected static ?string $navigationLabel = 'Ekstrakulikuler';
    protected static ?string $pluralLabel = 'Ekstrakulikuler';
    protected static ?string $navigationGroup = 'Profil Sekolah';
    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informasi Utama')
                    ->description('Identitas dasar ekstrakulikuler.')
                    ->collapsible()
                    ->schema([
                        TextInput::make('nama_ekskul')
                            ->label('Nama Ekstrakulikuler')
                            ->required()
                            ->placeholder('Masukan Nama Ekstrakulikuler')
                            ->live(onBlur: true),

                        TextInput::make('pembina')
                            ->label('Guru Pembina')
                            ->placeholder('Masukan Nama Pembina')
                            ->required(),

                        // Ubah ke Select biar user tinggal pilih, nggak ngetik manual
                        Select::make('icon_class')
                            ->label('Icon Visual (Bootstrap Icons)')
                            ->options([
                                'bi-shield-fill' => 'Pencak Silat',
                                'bi-dribbble' => 'Futsal',
                                'bi-person-arms-up' => 'Seni Tari',
                                'bi-compass' => 'Pramuka',
                                'bi-music-note-beamed' => 'Seni Musik',
                                'bi-trophy' => 'Default Icon',
                                'bi-camera' => 'Fotografi',
                                'bi-flag' => 'Paskibra',
                            ])
                            ->searchable()
                            ->default('bi-trophy')
                            ->required(),

                        FileUpload::make('thumbnail')
                            ->label('Foto Thumbnail')
                            ->image()
                            ->directory('ekskul-galeri/ekskul-thumbnails')
                            ->maxSize(2048)
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                            ->helperText('Format: JPG, PNG, atau WEBP. Maksimal: 2MB.')
                            ->required(),
                    ])->columns(2),

                Section::make('Konten & Deskripsi')
                    ->description('Isi deskripsi lengkap ekstrakulikuler.')
                    ->schema([
                        RichEditor::make('deskripsi_ekstrakulikuler')
                            ->label('Deskripsi Lengkap')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (Set $set, $state) {
                                $plainText = strip_tags($state);
                                $set('deskripsi_singkat', Str::limit($plainText, 150));
                            })
                            ->columnSpanFull(),

                        Textarea::make('deskripsi_singkat')
                            ->label('Ringkasan Singkat')
                            ->rows(3)
                            ->columnSpanFull(),
                    ]),

                Section::make('Galeri Dokumentasi')
                    ->schema([
                        Repeater::make('photos')
                            ->relationship('photos')
                            ->schema([
                                FileUpload::make('foto')
                                    ->image()
                                    ->directory('ekskul-galeri')
                                    ->maxSize(3072)
                                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                                    ->required(),
                                TextInput::make('caption')
                                    ->label('Keterangan Foto'),
                            ])
                            ->grid(2)
                            ->collapsible()
                            ->defaultItems(0),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('thumbnail')
                    ->circular(),

                TextColumn::make('nama_ekskul')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('photos_count')
                    ->label('Foto')
                    ->counts('photos')
                    ->badge(),
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
            'index' => Pages\ListEkstrakulikulers::route('/'),
            'create' => Pages\CreateEkstrakulikuler::route('/create'),
            'edit' => Pages\EditEkstrakulikuler::route('/{record}/edit'),
        ];
    }
}
