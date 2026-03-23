<?php

namespace App\Filament\Resources\PpdbInfoResource\Pages;

use App\Filament\Resources\PpdbInfoResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePpdbInfo extends CreateRecord
{
    protected static string $resource = PpdbInfoResource::class;

    protected static bool $canCreateAnother = false;

    // redirect to index news pages after CRUD (Create, Read, Update, Delete)
    public function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
