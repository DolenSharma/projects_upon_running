<?php

namespace App\Filament\Resources\ReferjobroleResource\Pages;

use App\Filament\Resources\ReferjobroleResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditReferjobrole extends EditRecord
{
    protected static string $resource = ReferjobroleResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getSavedNotificationTitle(): ?string
    {
        return 'Referred Job Role Updated Successfully!!';
    }
}
