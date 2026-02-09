<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactResource\Pages;
use App\Models\Contact;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Grid;
use Filament\Notifications\Notification;
use Afsakar\LeafletMapPicker\LeafletMapPicker;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(12)
                    ->schema([
                        // SISI KIRI: MAP (Leaflet Picker)
                        LeafletMapPicker::make('location')
                            ->label('Pilih Lokasi')
                            ->columnSpan(8)  // Ambil 8 kolom dari 12
                            ->defaultLocation([-6.880095, 107.606583]) // Koordinat default
                            ->height('450px'),

                        // SISI KANAN: INPUT FIELDS
                        Grid::make(1)
                            ->columnSpan(4)
                            ->schema([
                                TextInput::make('address')
                                    ->label('Alamat')
                                    ->required(),

                                TextInput::make('phone')
                                    ->label('Telepon')
                                    ->tel()
                                    ->required(),

                                TextInput::make('email')
                                    ->label('Email')
                                    ->email()
                                    ->required(),
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('address')->limit(50)
                    ->label('Alamat'),
                Tables\Columns\TextColumn::make('phone')
                    ->label('Nomor Telepon'),
                Tables\Columns\TextColumn::make('email')
                    ->label('Email'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->successNotification(
                        Notification::make()
                            ->success()
                            ->title('Kontak Dihapus')
                            ->body('Kontak berhasil dihapus')
                    ),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContacts::route('/'),
            'create' => Pages\CreateContact::route('/create'),
            'edit' => Pages\EditContact::route('/{record}/edit'),
        ];
    }
}
