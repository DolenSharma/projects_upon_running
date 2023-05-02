<?php

namespace App\Filament\Resources\LayerResource\Pages;

use App\Filament\Resources\LayerResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLayers extends ListRecords
{
    protected static string $resource = LayerResource::class;
    protected ?string $maxContentWidth = 'full';

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
