<?php

namespace App\Filament\Resources\NewsResource\Pages;

use App\Filament\Resources\NewsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;

class EditNews extends EditRecord
{
    protected static string $resource = NewsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

     // redirect to index category pages after CRUD (Create, Read, Update, Delete)
     public function getRedirectUrl(): string
     {
         return $this->getResource()::getUrl('index');
     }

     // notify the user that the category has been updated successfully
     public function getSavedNotification(): ?Notification
     {
         return Notification::make()
             ->title('Berita Diupdate')
             ->body('Berita berhasil diupdate')
             ->success()
             ->send();
     }
}
