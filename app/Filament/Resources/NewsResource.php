<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsResource\Pages;
use App\Filament\Resources\NewsResource\RelationManagers;
use App\Models\News;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;


class NewsResource extends Resource
{
    protected static ?string $model = News::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $navigationLabel = 'Berita';

    protected static ?string $modelLabel = 'Berita';

    protected static ?string $pluralModelLabel = 'Berita';

    protected static ?string $navigationGroup = 'Berita & Pengumuman';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //Form input Judul Berita
                TextInput::make('news_title')
                    ->label('Judul Berita')
                    ->required()
                    ->live(onBlur: true)
                    ->placeholder('Judul Berita')
                    ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state))),


                // Slug
                TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true) // Pastikan slug tidak kembar di DB
                    ->readOnly(), // Admin bisa melihat tapi tidak perlu mengetik manual

                // Category
                Select::make('category_id')
                    ->label('Kategori Berita')
                    ->placeholder('Pilih Kategori')
                    ->options(Category::all()->pluck('name_category', 'id'))
                    ->required(),

                // Date / Tanggal
                DatePicker::make('posted_at')
                    ->label('Tanggal Posting')
                    ->required()
                    ->displayFormat('d/m/y')
                    ->native(false),

                // Image/Gambar/Tumbnail berita
                FileUpload::make('image')
                    ->label('File Berita'),

                // Konten Berita
                RichEditor::make('news_content')
                    ->label('Berita')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('news_title')
                    ->label('Judul Berita'),
                TextColumn::make('posted_at')
                    ->label('Tanggal Posting'),
                ImageColumn::make('image')
                    ->label('File Berita'),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->successNotification(
                        Notification::make()
                            ->success()
                            ->title('Berita Dihapus')
                            ->body('Berita berhasil dihapus')
                    ),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->successNotification(
                            Notification::make()
                                ->success()
                                ->title('Kumpulan Berita Dihapus')
                                ->body('Kumpulan berita yang dipilih berhasil dihapus')
                        ),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
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
