<?php

namespace App\Filament\Resources\LayerResource\Pages;

use App\Filament\Resources\LayerResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateLayer extends CreateRecord
{
    protected static string $resource = LayerResource::class;
        protected ?string $maxContentWidth = 'full';
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getCreatedNotificationTitle(): ?string
{
    return 'Layer Submission Successfully Created!';
}
}
