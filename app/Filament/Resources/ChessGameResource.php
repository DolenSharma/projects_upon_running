<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ChessGameResource\Pages;
use App\Models\ChessGame;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\TextInput;

class ChessGameResource extends Resource
{
    public static ?string $model = ChessGame::class;

    protected static ?string $navigationIcon = 'heroicon-o-puzzle';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Card::make()->schema([
                TextInput::make('player1')->label('Player 1')->required(),
                TextInput::make('player2')->label('Player 2')->required(),
                TextInput::make('moves')->label('Moves'),
                // Add more fields as per your requirements
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListChessGames::route('/'),
            'create' => Pages\CreateChessGame::route('/create'),
            'edit' => Pages\EditChessGame::route('/{record}/edit'),
            
        ];
    }    
}
