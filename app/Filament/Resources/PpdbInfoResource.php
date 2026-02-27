<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PpdbInfoResource\Pages;
use App\Filament\Resources\PpdbInfoResource\RelationManagers;
use App\Models\PpdbInfo;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Card;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PpdbInfoResource extends Resource
{
    protected static ?string $model = PpdbInfo::class;

    // Mengubah nama di Sidebar
    protected static ?string $navigationLabel = 'Informasi PPDB';

    // Mengubah judul jamak (header halaman)
    protected static ?string $pluralLabel = 'Informasi PPDB';

    // Mengubah judul tunggal
    protected static ?string $modelLabel = 'Informasi PPDB';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Card::make()
                    ->schema([
                        Select::make('status')
                            ->options([
                                'Buka' => 'Buka',
                                'Tutup' => 'Tutup',
                            ])
                            ->required()
                            ->native(false),
                        TextInput::make('tahun_ajaran')
                            ->placeholder('2024/2025')
                            ->required(),
                        RichEditor::make('rincian_biaya')
                            ->columnSpanFull()
                            ->required(),
                        RichEditor::make('persyaratan')
                            ->columnSpanFull()
                            ->required(),
                        TextInput::make('kontak_whatsapp')
                            ->label('Nomor WhatsApp Admin')
                            ->placeholder('08123456789')
                            ->required(),
                        FileUpload::make('gambar_brosur')
                            ->image()
                            ->label('Gambar Brosur')
                            ->disk('public')
                            ->required(),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('tahun_ajaran')
                    ->label('Tahun Ajaran'),
                TextColumn::make('status')
                    ->label('Status'),
                TextColumn::make('kontak_whatsapp')
                    ->label('Nomor WhatsApp Admin'),
                ImageColumn::make('gambar_brosur')
                    ->label('Brosur')
                    ->disk('public'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListPpdbInfos::route('/'),
            'create' => Pages\CreatePpdbInfo::route('/create'),
            'edit' => Pages\EditPpdbInfo::route('/{record}/edit'),
        ];
    }
}
