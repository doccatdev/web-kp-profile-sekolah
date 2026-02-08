<?php

namespace App\Filament\Resources\ContactResource\Pages;

use App\Filament\Resources\ContactResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;

class EditContact extends EditRecord
{
    protected static string $resource = ContactResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    // redirect to index contact pages after CRUD (Create, Read, Update, Delete)
    public function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    // notify the user that the contact has been updated successfully
    public function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->title('Kontak Diupdate')
            ->body('Kontak berhasil diupdate')
            ->success()
            ->send();
    }
}
