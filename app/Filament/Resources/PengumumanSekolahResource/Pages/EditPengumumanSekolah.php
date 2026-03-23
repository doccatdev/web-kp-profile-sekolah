<?php

namespace App\Filament\Resources\PengumumanSekolahResource\Pages;

use App\Filament\Resources\PengumumanSekolahResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPengumumanSekolah extends EditRecord
{
    protected static string $resource = PengumumanSekolahResource::class;

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
