<?php

namespace App\Filament\Resources\NewsResource\Pages;

use App\Filament\Resources\NewsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;
use Illuminate\Support\Str;

class CreateNews extends CreateRecord
{
    protected static string $resource = NewsResource::class;

    protected static bool $canCreateAnother = false;

    // redirect to index news pages after CRUD (Create, Read, Update, Delete)
    public function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    // notify the user that the category has been created successfully
    public function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->title('Berita Dibuat')
            ->body('Berita berhasil dibuat')
            ->success()
            ->send();
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Ambil news_content, buang tag HTML, batasi 150 karakter
        $data['short_description'] = Str::limit(strip_tags($data['news_content']), 150);

        return $data;
    }
}
