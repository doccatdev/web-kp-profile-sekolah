<?php

namespace App\Filament\Resources;

use App\Models\News;
use App\Models\Category;
use App\Filament\Resources\NewsResource\Pages;
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
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Set;

// Table & Notification
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Notifications\Notification;

class NewsResource extends Resource
{
    protected static ?string $model = News::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $navigationLabel = 'Berita Sekolah';
    protected static ?string $modelLabel = 'Berita';
    protected static ?string $pluralLabel = 'Berita';
    protected static ?string $navigationGroup = 'Berita & Pengumuman';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Section 1: Utama
                Section::make('Informasi Berita')
                    ->schema([
                        TextInput::make('news_title')
                            ->label('Judul Berita')
                            ->required()
                            ->live(onBlur: true)
                            ->placeholder('Masukkan judul berita...')
                            ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state))),

                        TextInput::make('slug')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->hidden()
                            ->dehydrated(true),

                        RichEditor::make('news_content')
                            ->label('Isi Berita')
                            ->required()
                            ->placeholder('Tuliskan isi berita di sini...')
                            ->columnSpanFull(),
                    ]),

                // Section 2: Atribut (Sekarang di baris baru/satu kolom)
                Section::make('Atribut & Media')
                    ->schema([
                        Select::make('category_id')
                            ->label('Kategori')
                            ->options(Category::all()->pluck('name_category', 'id'))
                            ->searchable()
                            ->preload()
                            ->required(),

                        DatePicker::make('posted_at')
                            ->label('Tanggal Posting')
                            ->required()
                            ->native(false)
                            ->default(now()),

                        FileUpload::make('image')
                            ->label('Gambar Utama')
                            ->image()
                            ->imageEditor()
                            ->directory('berita')
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/jpg', 'image/webp'])
                            ->helperText('Format: JPG/PNG/JPEG/WEBP. Max: 2MB.')
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
                ImageColumn::make('image')
                    ->label('Gambar')
                    ->square(),

                TextColumn::make('news_title')
                    ->label('Judul Berita')
                    ->searchable()
                    ->wrap()
                    ->limit(50),

                TextColumn::make('category.name_category')
                    ->label('Kategori')
                    ->badge()
                    ->color('info'),

                TextColumn::make('posted_at')
                    ->label('Tanggal Terbit')
                    ->date('d M Y')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category_id')
                    ->label('Filter Kategori')
                    ->relationship('category', 'name_category'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->successNotification(
                        Notification::make()
                            ->success()
                            ->title('Berita Dihapus')
                            ->body('Data berita telah berhasil dihapus.')
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
            'index' => Pages\ListNews::route('/'),
            'create' => Pages\CreateNews::route('/create'),
            'edit' => Pages\EditNews::route('/{record}/edit'),
        ];
    }
}
