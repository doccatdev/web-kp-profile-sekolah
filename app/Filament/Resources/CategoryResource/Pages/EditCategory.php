<?php

namespace App\Filament\Resources\CategoryResource\Pages;

use App\Filament\Resources\CategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;

class EditCategory extends EditRecord
{
    protected static string $resource = CategoryResource::class;

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
            ->title('Kategori Diupdate')
            ->body('Kategori berhasil diupdate')
            ->success()
            ->send();
    }
}
