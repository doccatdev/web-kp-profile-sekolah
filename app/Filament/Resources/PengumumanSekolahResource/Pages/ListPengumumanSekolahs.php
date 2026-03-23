<?php

namespace App\Filament\Resources\PengumumanSekolahResource\Pages;

use App\Filament\Resources\PengumumanSekolahResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPengumumanSekolahs extends ListRecords
{
    protected static string $resource = PengumumanSekolahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
