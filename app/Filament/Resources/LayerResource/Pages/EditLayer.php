<?php

namespace App\Filament\Resources\LayerResource\Pages;

use App\Filament\Resources\LayerResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLayer extends EditRecord
{
    protected static string $resource = LayerResource::class;
    protected ?string $maxContentWidth = 'full';

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
        return 'Layer Submission Updated Successfully!!';
    }
}
