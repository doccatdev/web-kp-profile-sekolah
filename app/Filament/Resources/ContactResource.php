<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactResource\Pages;
use App\Models\Contact;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Section;

class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;

    protected static ?string $navigationIcon = 'heroicon-o-phone'; // Saya ganti ke icon telepon biar lebih pas

    protected static ?string $navigationGroup = 'Kontak Sekolah';

    protected static ?int $navigationSort = 4;

    // Mengubah label navigasi dan model
    protected static ?string $navigationLabel = 'Alamat & Kontak';
    protected static ?string $modelLabel = 'Kontak Sekolah';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informasi Kontak Sekolah')
                    ->description('Kelola alamat, email, dan nomor telepon resmi sekolah.')
                    ->schema([
                        Textarea::make('address')
                            ->label('Alamat Lengkap')
                            ->required()
                            ->columnSpanFull(),

                        TextInput::make('email')
                            ->label('Email Resmi')
                            ->email()
                            ->required()
                            ->maxLength(255),

                        TextInput::make('phone')
                            ->label('Nomor Telepon/WA')
                            ->tel()
                            ->required()
                            ->maxLength(255),

                        Textarea::make('location')
                            ->label('Koordinat Lokasi')
                            ->placeholder('-6.12345, 106.12345')
                            ->columnSpanFull(),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('email')
                    ->label('Email Sekolah')
                    ->searchable()
                    ->icon('heroicon-m-envelope'), // Menambah estetika dengan icon

                TextColumn::make('phone')
                    ->label('Kontak')
                    ->searchable()
                    ->copyable(), // Fitur keren: klik nomor langsung tersalin

                TextColumn::make('address')
                    ->label('Alamat')
                    ->limit(50) // Biar tabel tidak terlalu panjang kesamping
                    ->tooltip(fn ($record): string => $record->address), // Munculkan alamat lengkap saat kursor diarahkan ke teks
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(), // Tambahkan delete jika diperlukan
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
            'index' => Pages\ListContacts::route('/'),
            'create' => Pages\CreateContact::route('/create'),
            'edit' => Pages\EditContact::route('/{record}/edit'),
        ];
    }
}
