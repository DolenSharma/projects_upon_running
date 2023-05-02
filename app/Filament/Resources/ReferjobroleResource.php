<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReferjobroleResource\Pages;
use App\Filament\Resources\ReferjobroleResource\RelationManagers;
use App\Models\Referjobrole;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Card;
use Filament\Tables\Columns\TextColumn;

class ReferjobroleResource extends Resource
{
    protected static ?string $model = Referjobrole::class;

    protected static ?string $navigationIcon = 'heroicon-s-clipboard-list';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationGroup = 'For Our Partners';
    public static ?string $label = 'Refer Job Role';//Creating custom Profile Display min Dashboard for Uploadownprofile.

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        Forms\Components\Select::make('referjobrole_state')
                            ->options([
                                'Alabama' =>'Alabama',
                                'Alaska' =>'Alaska',
                                'Arizona' =>'Arizona',
                                'Arkansas' =>'Arkansas',
                                'California'=>'California',
                                'Colorado' =>'Colorado',
                                'Connecticut'=>'Connecticut',
                                'Delaware'=>'Delaware',
                                'Florida'=>'Florida',
                                'Georgia'  =>'Georgia',
                                'Hawaii' =>'Hawaii',
                                'Idaho' =>'Idaho',
                                'Illinois' =>'Illinois',
                                'Indiana'=>'Indiana',
                                'Iowa'=> 'Iowa',
                                'Kansas' =>'Kansas',
                                'Kentucky'=>'Kentucky',
                                'Louisiana' => 'Louisiana',
                                'Maine' =>'Maine',
                                'Maryland'=>'Maryland',
                                'Massachusetts' =>'Massachusetts',
                                'Michigan' =>'Michigan',
                                'Minnesota'=>'Minnesota',
                                'Mississipi'=>'Mississipi',
                                'Montana'=>'Montana',
                                'Nebraska'=>'Nebraska',
                                'Nevada'=>'Nevada',
                                'New Hampshire'=>'New Hampshire',
                                'New Jersey'=>'New Jersey',
                                'New Mexico'=>'New Mexico',
                                'New York'=>'New York',
                                'North Carolina'=>'North Carolina',
                                'North Dakota'=>'North Dakota',
                                'Ohio' =>'Ohio',
                                'Oklahoma'  =>'Oklahoma',
                                'Oregon'=>'Oregon',
                                'Pennsylvania' => 'Pennsylvania',
                                'Rhode Island'=>'Rhode Island',
                                'South Carolina'=>'South Carolina',
                                'Tennessee'=>'Tennessee',
                                'Texas'=>'Texas',
                                'Utah'=>'Utah',
                                'Vermont'=>'Vermont',
                                'Virginia' =>'Virginia',
                                'Washinton'=>'Washinton',
                                'West Virginia' =>'West Virginia',
                                'Wisconsin'=>'Wisconsin',
                                'Wyoming'=>'Wyoming',
                            ])
                            ->searchable()
                            ->label('State')
                            ->required(),
                        Forms\Components\TextInput::make('referjobrole_city')
                            ->label('City')
                            ->required(),
                        Forms\Components\Select::make('referjobrole_visa')
                            ->label('Visa')
                            ->autofocus()
                            ->required()
                            ->options([
                            'GC EAD' =>'GC EAD',
                            'USC' =>'USC',
                            'EAD-OPT' =>'EAD-OPT',
                            'TPS-EAD'  =>'TPS-EAD',
                            'OPT'=>'OPT',
                            'GC' =>'GC',
                            'Green Card'=> 'Green Card',
                            'H4EAD'=> 'H4EAD',
                            'CPT'=> 'CPT',
                            'H1B'=> 'H1B',
                            'Others'  =>'Others',
                            ]),
                        Forms\Components\TextInput::make('referjobrole_rate')
                            ->label('Rate')
                            ->required()
                            ->prefix('$')
                            ->suffix('/Hr'),
                        Forms\Components\TextInput::make('implementation_name')
                            ->label('Implementation Name')
                            ->required(),
                        Forms\Components\TextInput::make('imp_email')
                            ->label('Implementation Email')
                            ->email()
                            ->required(),
                        Forms\Components\TextInput::make('imp_contact')
                            ->label('Implementation Contact')
                            ->tel()
                            ->required()
                            ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/'),
                        Forms\Components\TextInput::make('pv_name')
                            ->label('Prime Vendor Name')
                            ->required(),
                        Forms\Components\TextInput::make('pv_email')
                            ->label('Prime Vendor Email')
                            ->email()
                            ->required(),
                        Forms\Components\TextInput::make('pv_contact')
                            ->label('Prime Vendor Contact')
                            ->tel()
                            ->required()
                            ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/'),
                        Forms\Components\TextInput::make('end_client')
                            ->label('End Client')
                            ->required(),


            Card::make()
            ->schema([
                Forms\Components\Textarea::make('job_description')
                ->label('Job Description')
                ->required()
                ->rows(12),
            ])->columns(1),
            ])->columns(4),
            ]);
    }
    

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable()->searchable()->label('S.N'),
                TextColumn::make('referjobrole_id')->sortable()->searchable()->label('RJR ID'),
                TextColumn::make('referjobrole_state')->sortable()->searchable()->label('State'),
                TextColumn::make('referjobrole_city')->sortable()->searchable()->label('City'),
                TextColumn::make('referjobrole_visa')->sortable()->searchable()->label('Visa'),
                TextColumn::make('referjobrole_rate')->sortable()->searchable()->label('Rate')                            ->prefix('$')
                ->suffix('/Hr')
                ->prefix('$'),
                TextColumn::make('implementation_name')->sortable()->searchable()->label('Implementation Partner'),
                TextColumn::make('imp_email')->sortable()->searchable()->label('Implementation Email'),
                TextColumn::make('imp_contact')->sortable()->searchable()->label('Implementation Contact'),
                TextColumn::make('pv_name')->sortable()->searchable()->label('Prime Vendor'),
                TextColumn::make('pv_email')->sortable()->searchable()->label('Prime Vendor Email'),
                TextColumn::make('pv_contact')->sortable()->searchable()->label('Prime Vendor Email'),
                TextColumn::make('end_client')->sortable()->searchable()->label('End Client'),
                TextColumn::make('job_description')->sortable()->searchable()->label('JD')->limit(20),
            ])
            ->filters([
                Tables\Filters\Filter::make('Daily ReferJobRole')
                ->query(fn (Builder $query): Builder => $query->whereDay('created_at', '=', date('d'))), //Filter Used for daily Submissions
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListReferjobroles::route('/'),
            'create' => Pages\CreateReferjobrole::route('/create'),
            'edit' => Pages\EditReferjobrole::route('/{record}/edit'),
        ];
    }    
}
