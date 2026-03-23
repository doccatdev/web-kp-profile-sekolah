<?php

namespace App\Filament\Resources\SekolahProfilesResource\Pages;

use App\Filament\Resources\SekolahProfilesResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSekolahProfiles extends CreateRecord
{
    protected static string $resource = SekolahProfilesResource::class;

    protected static bool $canCreateAnother = false;

    // redirect to index news pages after CRUD (Create, Read, Update, Delete)
    public function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
