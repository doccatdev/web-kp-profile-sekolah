<?php

namespace App\Filament\Resources\CategoryResource\Pages;

use App\Filament\Resources\CategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreateCategory extends CreateRecord
{
    protected static string $resource = CategoryResource::class;


    // redirect to index category pages after CRUD (Create, Read, Update, Delete)
    public function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    // notify the user that the category has been created successfully
    public function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->title('Kategori Dibuat')
            ->body('Kategori berhasil dibuat')
            ->success()
            ->send();
    }
}
