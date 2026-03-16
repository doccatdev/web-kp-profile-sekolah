<?php

namespace App\Filament\Resources\SekolahProfilesResource\Pages;

use App\Filament\Resources\SekolahProfilesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSekolahProfiles extends ListRecords
{
    protected static string $resource = SekolahProfilesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
