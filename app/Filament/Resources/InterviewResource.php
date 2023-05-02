<?php

namespace App\Filament\Resources;

use Filament\Tables;
use App\Models\Interview;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DateTimePicker;
use App\Filament\Resources\InterviewResource\Pages;
use App\Filament\Resources\InterviewResource\RelationManagers;
use Doctrine\DBAL\Schema\Schema;
use Illuminate\Database\Eloquent\Builder;

class InterviewResource extends Resource
{
    protected static ?string $model = Interview::class;

    protected static ?string $navigationIcon = 'heroicon-s-video-camera';
    protected static ?int $navigationSort = 2;
    protected static ?string $navigationGroup = 'Consultants & Interviews';

    public static function form(Form $form): Form
    {
        return $form
        
            
            ->schema([
                Card::make()
                   ->schema([
                Select::make('layer_id')
                      ->label('LAYER ID')
                      ->relationship('layer', 'layer_id')->preload()
                      ->helperText('Select either the Layer ID or the Submission ID'),
                Select::make('submission_id')
                       ->relationship('submission', 'submission_id')->preload()->label('Submission ID'),
                ])->columns(2),
                Card::make()
                   ->schema([
               Select::make('rounds_of_interview')
                   ->required()
                    ->options([
                        '1st'  => '1st',
                        '2nd' => '2nd',
                        '3rd' => '3rd',
                    ]),
            DateTimePicker::make('interview_date')
                ->required()
                 ->label('Interview date and time')
                 ->placeholder('---Mention Interview Date & Time Here---'),
            Select::make('status')
                        ->required()
                        ->options([
                            'Offered'   => 'Offered',
                            'Rejected'  => 'Rejected',
                            'Active' => 'Active',
                        ]),
                ])->columns(3)
            
                ]);
                
      
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('S.N'),
                Tables\Columns\TextColumn::make('interview_id')->searchable()->label('Interview ID'),
                Tables\Columns\TextColumn::make('submission.submission_id')->searchable()->label('SUB ID'),
                Tables\Columns\TextColumn::make('layer.layer_id')->searchable()->label('LAYER ID'),
                Tables\Columns\BadgeColumn::make('status')->searchable()->label('Status')
                ->colors([
                    'primary'   =>   'Offered',
                    'warning' => 'Rejected',
                    'success' => 'Active',
                ])
                ->icons([
                    'heroicon-s-eye' =>   'Active',
                    'heroicon-s-refresh' => 'Rejected',
                    'heroicon-s-academic-cap' => 'Offered',
                ])
                ->iconPosition('after'),
                Tables\Columns\TextColumn::make('rounds_of_interview')->searchable()->label('Round'),
                Tables\Columns\TextColumn::make('interview_date')->label('Interview Date & Time')->color('warning'),
                Tables\Columns\TextColumn::make('created_at')->label('Created Date')
                ->dateTime('M j, Y')
                ->sortable(),
            ])
            ->filters([
            Tables\Filters\Filter::make('Daily Interviews')
                ->query(fn (Builder $query): Builder => $query->whereDay('created_at', '=', date('d'))), //Filter Used for daily Interviews
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                //
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
            'index' => Pages\ListInterviews::route('/'),
            'create' => Pages\CreateInterview::route('/create'),
            'edit' => Pages\EditInterview::route('/{record}/edit'),
        ];
    }
}
