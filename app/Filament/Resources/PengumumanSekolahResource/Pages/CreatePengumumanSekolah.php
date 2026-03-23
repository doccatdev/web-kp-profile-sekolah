<?php

namespace App\Filament\Resources\PengumumanSekolahResource\Pages;

use App\Filament\Resources\PengumumanSekolahResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePengumumanSekolah extends CreateRecord
{
    protected static string $resource = PengumumanSekolahResource::class;

    protected static bool $canCreateAnother = false;

    // redirect to index news pages after CRUD (Create, Read, Update, Delete)
    public function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
