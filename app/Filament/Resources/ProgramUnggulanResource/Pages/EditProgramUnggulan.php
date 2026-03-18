<?php

namespace App\Filament\Resources\ProgramUnggulanResource\Pages;

use App\Filament\Resources\ProgramUnggulanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProgramUnggulan extends EditRecord
{
    protected static string $resource = ProgramUnggulanResource::class;

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
