<?php

namespace App\Filament\Resources\ProgramUnggulanResource\Pages;

use App\Filament\Resources\ProgramUnggulanResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProgramUnggulan extends CreateRecord
{
    protected static string $resource = ProgramUnggulanResource::class;

    protected static bool $canCreateAnother = false;

    // redirect to index news pages after CRUD (Create, Read, Update, Delete)
    public function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
