<?php

namespace App\Filament\Resources\BdmpostResource\Pages;

use App\Filament\Resources\BdmpostResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBdmpost extends CreateRecord
{
    protected static string $resource = BdmpostResource::class;
    protected ?string $maxContentWidth = 'full';
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getCreatedNotificationTitle(): ?string
{
    return 'BDM Post Successfully Created!';
}
}
