<?php

namespace App\Filament\Resources\ReferjobroleResource\Pages;

use App\Filament\Resources\ReferjobroleResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListReferjobroles extends ListRecords
{
    protected static string $resource = ReferjobroleResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
