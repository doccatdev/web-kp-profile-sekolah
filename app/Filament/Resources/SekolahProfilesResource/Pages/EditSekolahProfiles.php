<?php

namespace App\Filament\Resources\SekolahProfilesResource\Pages;

use App\Filament\Resources\SekolahProfilesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSekolahProfiles extends EditRecord
{
    protected static string $resource = SekolahProfilesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    // redirect to index news pages after CRUD (Create, Read, Update, Delete)
    public function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
