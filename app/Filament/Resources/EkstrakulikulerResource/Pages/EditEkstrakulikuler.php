<?php

namespace App\Filament\Resources\EkstrakulikulerResource\Pages;

use App\Filament\Resources\EkstrakulikulerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEkstrakulikuler extends EditRecord
{
    protected static string $resource = EkstrakulikulerResource::class;

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
