<?php

namespace App\Filament\Resources\ContactResource\Pages;

use App\Filament\Resources\ContactResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreateContact extends CreateRecord
{
    protected static string $resource = ContactResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    public function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->title('Kontak Ditambahkan')
            ->body('Kontak berhasil ditambahkan')
            ->success()
            ->send();
    }
}
