<?php

namespace App\Filament\Resources\EkstrakulikulerResource\Pages;

use App\Filament\Resources\EkstrakulikulerResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEkstrakulikuler extends CreateRecord
{
    protected static string $resource = EkstrakulikulerResource::class;

    protected static bool $canCreateAnother = false;

    // redirect to index news pages after CRUD (Create, Read, Update, Delete)
    public function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
