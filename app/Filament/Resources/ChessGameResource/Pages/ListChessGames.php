<?php

namespace App\Filament\Resources\ChessGameResource\Pages;

use App\Filament\Resources\ChessGameResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListChessGames extends ListRecords
{
    protected static string $resource = ChessGameResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
