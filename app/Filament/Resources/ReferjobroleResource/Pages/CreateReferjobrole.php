<?php

namespace App\Filament\Resources\ReferjobroleResource\Pages;

use App\Filament\Resources\ReferjobroleResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateReferjobrole extends CreateRecord
{
    protected static string $resource = ReferjobroleResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getCreatedNotificationTitle(): ?string
{
    return 'Referral Job Role Successfully Created';
}
}
