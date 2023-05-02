<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ConsultantResource\Pages;
use App\Models\Consultant;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Builder;



class ConsultantResource extends Resource
{
    protected static ?string $model = Consultant::class;

    protected static ?string $navigationIcon = 'heroicon-s-collection';
        protected static ?int $navigationSort = 1;
    protected static ?string $navigationGroup = 'Consultants & Interviews';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Card::make()
            ->schema([
                Hidden::make('user_id'),
                TextInput::make('consultant_name')->helperText('Consultant full name here, including any middle names.')->autofocus()
                ->placeholder('---Full Name---')
                ->minLength(2)
                 ->maxLength(255)
                 ->required(),
                //  ->unique(ignoreRecord:true),
        Forms\Components\TextInput::make('con_contact_number')->placeholder('---Phone Number---')->label('Phone Number')
                    ->maxLength('12')
                    ->required()
                    ->autofocus()
                    ->tel()
                    ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/'),
        TextInput::make('con_email')
            ->placeholder('---Consultant Email---')
                        ->label('Email')
                        ->email()
                        ->autofocus()
                        ->required(),
                Select::make('experience')
                ->required()
                    ->options([
                        '2+' => '2+',
                        '3+' => '3+',
                        '4+' => '4+',
                        '5+' => '5+',
                        '6+' => '6+',
                        '7+' => '7+',
                        '8+' => '8+',
                        '9+' => '9+',
                        '10+' => '10+',
                        '11+' => '11+',
                        '12+' => '12+',
                        '13+' => '13+',
                        '14+' => '14+',
                        '15+' => '15+',
                        '16+' => '16+',
                        '17+' => '17+',
                        '18+' => '18+',
                        '19+' => '19+',
                        '20+' => '20+',
                    ]),

 //working state starts----------------------------------------------------------------

                Select::make('state')
                ->required()
                ->searchable()
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
                ->helperText('Select consultant state!'),

 //working state ends----------------------------------------------------------------

//working city starts--------------------------------------------------------
                TextInput::make('city')
                ->required()
                ->autofocus()
                ->helperText('Please mention consultant city here.'),
//working city ends--------------------------------------------------------

                Select::make('visa')
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
                DatePicker::make('dob')
            ->minDate(now()->subYears(100))
            // ->autofocus()
            ->maxDate(now())
            ->required(),
            TextInput::make('linkedin')
            ->autofocus()
            ->placeholder('Optional')
            ->label('LinkedInLink/Reference'),
            Textarea::make('education')
            ->required(),
            Select::make('catagory')
            ->required()
            ->autofocus()
            ->options([
                'W2' =>'W2',
                'C2C'=>'C2C',
                'Referral' =>'Referral',
            ]),
            Select::make('status')
            ->required()
            ->autofocus()
                ->options([
                    'Active' => 'Draft',
                    'Offered' => 'Offered',
                    'Inactive' => 'Inactive',
                    'Hold' => 'Hold',
                ]),

            FileUpload::make('image')
            ->required()
            ->imagePreviewHeight('250')
            ->imageCropAspectRatio('16:9')
            ->imageResizeTargetWidth('1920')
            ->imageResizeTargetHeight('1080')
                ->enableOpen()
                ->minSize(4)
                ->maxSize(1024)
                ->image()
                ->directory('consultants-photos')
                ->preserveFilenames(),
          FileUpload::make('con_cv')
          ->acceptedFileTypes(['application/pdf'])
              ->directory('consultants-cv')
             ->preserveFilenames()
            ->minSize(5)
            ->maxSize(2048)
          ->label('Consultant CV')
          ->placeholder('--Upload CV--')->nullable()
          ->required()
          ->enableDownload(),
          Select::make('profile_given_by')
                ->label('Profile Given By')->required()
                ->options(User::all()->pluck('name', 'name'))
                ->searchable(),
          TextInput::make('bench_rate')->mask(fn (TextInput\Mask $mask) => $mask->money(prefix: '$', thousandsSeparator: ',', decimalPlaces: 2, isSigned: false))->required(),
        ])->columns(4),

        Card::make()
        ->schema([
            TextInput::make('company_name')->helperText('*Note: This Section is for Employeer Details.')
            ->placeholder('---Employer Name---')
                    ->required()
                    ->label('Company Name')
                    ->autofocus()
                    ->minLength(2)
                    ->maxLength(255),
            TextInput::make('comp_email')
            ->placeholder('---Employer Email---')
                        ->label('Email')
                        ->email()
                        ->autofocus()
                        ->required(),
            TextInput::make('recruiter_name')
                       ->placeholder('---Recruiter Name---')
                        ->required()
                        ->label('Recruiter Name')
                        ->autofocus()
                        ->minLength(2)
                        ->maxLength(255),
            TextInput::make('phone_number')
                       ->placeholder('---Employer Contact---')
                        ->label('Contact')
                        ->maxLength('12')
                        ->required()
                        ->autofocus()
                        ->tel()
                        ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/'),
            TextInput::make('extension')
                       ->placeholder('---Employer Extension---(optional)')
                        ->label('Extension')
                        ->maxLength('4')
                        ->nullable()
                        ->autofocus()
                        ->tel()
                        ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/'),
        ])->columns()->inlineLabel(),
        Card::make()
    ->schema([
    Select::make('is_verified')->label('Verification Status! --------------------------> ')
    ->options([
        'No'=>'No',
        'Reviewing'=> 'Reviewing',
        'Verified'=>'Verified',
        'Rejected'=>'Rejected',
    ])
    ])
    ->columns(1)->inlineLabel(),
    
        ]);

        
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('S.N'),
                Tables\Columns\TextColumn::make('consultant_id')->searchable()->label('ID'),//using observers
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('consultant_name')->searchable(),
                Tables\Columns\TextColumn::make('con_email')->searchable()->label('Email Id')->hidden(),
                Tables\Columns\TextColumn::make('experience'),
                Tables\Columns\TextColumn::make('state')->searchable(),
                Tables\Columns\TextColumn::make('city')->searchable(),
                Tables\Columns\TextColumn::make('visa'),
                Tables\Columns\TextColumn::make('dob'),
                Tables\Columns\TextColumn::make('linkedin')->limit(10),
                Tables\Columns\TextColumn::make('education'),
                Tables\Columns\BadgeColumn::make('status')
                ->colors([
                    'danger'   =>   'Inactive',
                    'primary'   =>   'Offered',
                    'warning' => 'Hold',
                    'success' => 'Active',
                ]),
                Tables\Columns\TextColumn::make('bench_rate')->label('Rate')->prefix('$')->suffix('/hr')->hidden(),
                Tables\Columns\ImageColumn::make('con_cv')->label('CV'),
                Tables\Columns\BadgeColumn::make('is_verified')->label('VFN Status')
                ->colors([
                    'danger'   =>   'No',
                    'primary'   =>   'Reviewing',
                    'warning' => 'Rejected',
                    'success' => 'Verified',
                ]),
                Tables\Columns\TextColumn::make('profile_given_by')->label('Profile Given By')->searchable(),

            ])

            ->filters([
            Tables\Filters\Filter::make('Daily Consultants')
                ->query(fn (Builder $query): Builder => $query->whereDay('created_at', '=', date('d'))),
            Tables\Filters\Filter::make('Monthly Consultants')
                ->query(fn (Builder $query): Builder => $query->whereMonth('created_at', '=', date('d'))),
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
            'index' => Pages\ListConsultants::route('/'),
            'create' => Pages\CreateConsultant::route('/create'),
            'view' => Pages\ViewConsultant::route('/{record}'),
            'edit' => Pages\EditConsultant::route('/{record}/edit'),
        ];
    }
    
}
