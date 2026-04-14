<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SliderResource\Pages;
use App\Filament\Resources\SliderResource\RelationManagers;
use App\Models\Slider;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SliderResource extends Resource
{
    protected static ?string $model = Slider::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Slider Image';
    protected static ?string $modelLabel = 'Slider Image';
    protected static ?string $pluralModelLabel = 'Slider Image';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->label('Judul Utama')
                    ->placeholder('Contoh: Selamat Datang')
                    ->required(),

                Textarea::make('caption')
                    ->label('Deskripsi/Sub-judul')
                    ->placeholder('Contoh: Website Resmi SMP Al-Husaniyyah')
                    ->rows(3),

                FileUpload::make('images')
                    ->label('Foto Slider')
                    ->image()
                    ->multiple() // Mengizinkan banyak foto
                    ->reorderable() // Bisa disusun urutannya
                    ->appendFiles()
                    ->directory('sliders') // Folder storage/app/public/sliders
                    ->imageEditor()
                    ->required()
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/jpg', 'image/webp'])
                    ->helperText('Format: JPEG/PNG/JPG/WEBP. Max file 2MB')
                    ->maxSize(2048),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Menampilkan Nama Slider

                Tables\Columns\TextColumn::make('title')
                    ->label('Judul'),

                Tables\Columns\TextColumn::make('caption')
                    ->label('Deskripsi')
                    ->limit(25)
                    ->wrap()
                    ->searchable()
                    ->sortable(),

                // Menampilkan Gambar (Stacked/Tumpuk)
                Tables\Columns\ImageColumn::make('images')
                    ->label('Foto-foto Slider')
                    ->disk('public') // Pastikan disk sesuai
                    ->circular()     // Membuat foto jadi bulat (opsional)
                    ->stacked()      // Menumpuk foto agar tidak berderet panjang
                    ->limit(3)       // Membatasi hanya 3 foto yang terlihat di tabel
                    ->limitedRemainingText() // Menampilkan angka sisa (misal: +2)
                    ->wrap(),        // Memastikan jika banyak tidak merusak layout

                // Menampilkan Tanggal Dibuat
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSliders::route('/'),
            'create' => Pages\CreateSlider::route('/create'),
            'edit' => Pages\EditSlider::route('/{record}/edit'),
        ];
    }
}
