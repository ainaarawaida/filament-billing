<?php

namespace App\Filament\App\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Product;
use Filament\Forms\Form;
use App\Models\Quotation;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Actions\Action;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\App\Resources\QuotationResource\Pages;
use App\Filament\App\Resources\QuotationResource\RelationManagers;

class QuotationResource extends Resource
{
    protected static ?string $model = Quotation::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Document';

    // protected static ?string $tenantOwnershipRelationshipName = 'teams';


    // public static function form(Form $form): Form
    // {
    //     return $form
    //             ->schema([
    //                 Forms\Components\Group::make()
    //                     ->schema([
    //                         Forms\Components\Section::make()
    //                             ->schema([

    //                                 Forms\Components\Select::make('shop_customer_id')
    //                                     ->relationship('customer', 'name')
    //                                     ->searchable()
    //                                     ->required()
    //                                     ->preload()
    //                                     ->live(onBlur: true)
                                    
    //                                     ->createOptionForm([
    //                                         Forms\Components\TextInput::make('name')
    //                                             ->required()
    //                                             ->maxLength(255),
                    
    //                                         Forms\Components\TextInput::make('email')
    //                                             ->label('Email address')
    //                                             ->required()
    //                                             ->email()
    //                                             ->maxLength(255)
    //                                             ->unique(),
                    
    //                                         Forms\Components\TextInput::make('phone')
    //                                             ->maxLength(255),
                    
    //                                         Forms\Components\Select::make('gender')
    //                                             ->placeholder('Select gender')
    //                                             ->options([
    //                                                 'male' => 'Male',
    //                                                 'female' => 'Female',
    //                                             ])
    //                                             ->required()
    //                                             ->native(false),
    //                                     ])
    //                                     ->createOptionAction(function (Action $action) {
    //                                         return $action
    //                                             ->modalHeading('Create customer')
    //                                             ->modalSubmitActionLabel('Create customer')
    //                                             ->modalWidth('lg');
    //                                     }),

    //                                 Forms\Components\ViewField::make('detail_customer')
    //                                     ->view('filament.detail_customer'),
                                
    //                             ])

                            
    //                     ]),
    //                 Forms\Components\Group::make()
    //                     ->schema([
    //                         Forms\Components\Section::make()
    //                         ->schema([
    //                             Forms\Components\DatePicker::make('quotation_date')
    //                                 // ->format('d/m/Y')
    //                                 ->native(false)
    //                                 ->displayFormat('d/m/Y')
    //                                 ->default(now())
    //                                 ->required(),
    //                             Forms\Components\TextInput::make('valid_days')
    //                                 ->numeric()
    //                                 ->default(1)
    //                                 ->minValue(0)
    //                                 ->required(),

    //                             Forms\Components\Select::make('quote_status')
    //                                 ->options([
    //                                     'draft' => 'Draft',
    //                                     'new' => 'New',
    //                                     'process' => 'Process',
    //                                     'done' => 'Done',
    //                                     'expired' => 'Expired',
    //                                     'cancelled' => 'Cancelled',

    //                                 ])
    //                                 ->default('draft')
    //                                 ->searchable()
    //                                 ->preload()
    //                                 ->required()
    //                                 ->columnSpan(2),


    //                         ])->columns(2)
                            
    //                     ]),
    //                     Forms\Components\Section::make()
    //                         ->schema([
    //                             Forms\Components\TextInput::make('title')
    //                             ->afterStateHydrated(function ($component, string $state) {
    //                                 $component->state(ucwords($state));
    //                             })
    //                                 ->required()
    //                                 ->maxLength(255),

    //                         ]),
    //                     Forms\Components\Section::make()
    //                         ->schema([
    //                             Forms\Components\Repeater::make('items')
    //                                 ->live(onBlur: true)
    //                                 ->minItems(1)
    //                                 ->collapsible()
    //                                 ->relationship('items')
    //                                 ->schema([
    //                                     Forms\Components\Textarea::make('title')
    //                                         ->required()
    //                                         ->columnSpan(2),
    //                                         Forms\Components\Select::make('product_id')
    //                                         ->relationship('product','title')
    //                                         ->searchable()
    //                                         ->preload()
    //                                         ->distinct()
    //                                         ->disableOptionsWhenSelectedInSiblingRepeaterItems()
    //                                         // ->live(onBlur: true)
    //                                         ->columnSpan(3),
    //                                     Forms\Components\TextInput::make('price')
    //                                         ->required()
    //                                         ->prefix('RM')
    //                                         ->formatStateUsing(fn (string $state): string => number_format($state, 2))

    //                                         // ->live(onBlur: true)
    //                                         ->afterStateUpdated(function ($state, $set, $get ){
    //                                             $set('total', number_format($state*$get('quantity'), 2)  );
    //                                             // $total = 0 ; 
    //                                             // if(!$repeaters = $get('../../items')){
    //                                             //     return $total ;
    //                                             // }
    //                                             // foreach($repeaters AS $key => $val){
    //                                             //     $total += (float)$get("../../items.{$key}.total");
    //                                             // }
    //                                             // $set('../../sub_total', number_format($total, 2) );
    //                                             // $set('../../final_amount', number_format($total, 2));
    //                                         })
    //                                         ->default(0.00),
    //                                     Forms\Components\Checkbox::make('tax')
    //                                     // ->live(onBlur: true)
    //                                     ->inline(false),
    //                                     Forms\Components\TextInput::make('quantity')
    //                                         ->required()
    //                                         ->numeric()
    //                                         // ->live(onBlur: true)
    //                                         ->afterStateUpdated(function ($state, $set, $get ){
    //                                             $set('total', number_format($state*$get('price'), 2)  );
    //                                         })
    //                                         ->default(1),
    //                                     Forms\Components\Select::make('unit')
    //                                         ->options([
    //                                             'Unit' => 'Unit',
    //                                             'Kg' => 'Kg',
    //                                             'Gram' => 'Gram',
    //                                             'Box' => 'Box',
    //                                             'Pack' => 'Pack',
    //                                             'Day' => 'Day',
    //                                             'Month' => 'Month',
    //                                             'Year' => 'Year',
    //                                             'People' => 'People',

    //                                         ])
    //                                         ->default('Unit')
    //                                         ->searchable()
    //                                         ->preload()
    //                                         ->required(),
    //                                     Forms\Components\TextInput::make('total')
    //                                         ->prefix('RM')
    //                                         ->readonly()
    //                                         ->formatStateUsing(fn (string $state): string => number_format($state, 2))
    //                                         ->default(0.00),
    //                                 ])->columns(5),

    //                         ]),
    //                     Forms\Components\Section::make()
    //                         ->schema([
    //                             Forms\Components\Textarea::make('notes'),
    //                             Forms\Components\Group::make()
    //                             ->schema([
    //                                 Forms\Components\TextInput::make('sub_total')
    //                                     ->formatStateUsing(fn ( $state)  => number_format($state, 2))
    //                                     ->prefix('RM')
    //                                     ->readonly()
    //                                     ->default(0),
    //                                 Forms\Components\TextInput::make('taxes')
    //                                     ->prefix('RM')
    //                                     ->readonly()
    //                                     ->default(0),
    //                                 Forms\Components\TextInput::make('percentage_tax')
    //                                     ->prefix('%')
    //                                     ->live(onBlur: true)
    //                                     ->integer()
    //                                     ->default(0),
    //                                 Forms\Components\TextInput::make('delivery')
    //                                     ->prefix('RM')
    //                                     ->live(onBlur: true)
    //                                     ->numeric()
    //                                     ->default(0.00),
    //                                 Forms\Components\TextInput::make('final_amount')
    //                                     ->prefix('RM')
    //                                     ->readonly()
    //                                     ->live(onBlur: true)
    //                                     ->default(0.00),
                                        

    //                             ])->inlineLabel(),

    //                             Forms\Components\Placeholder::make('calculation')
    //                                 ->hiddenLabel()
    //                                 ->content(function ($get, $set){
    //                                     $sub_total = 0 ; 
    //                                     $taxes = 0 ;
                                      
    //                                     if(!$repeaters = $get('items')){
    //                                         return $sub_total ;
    //                                     }
    //                                     foreach($repeaters AS $key => $val){
    //                                         $sub_total += (float)$get("items.{$key}.total");
                                          
    //                                         if($get("items.{$key}.tax") == true){
    //                                             $taxes = $taxes + ((int)$get('percentage_tax') / 100 * (float)$get("items.{$key}.total")) ;
    //                                         }else{

    //                                         }
                                           
    //                                     }

    //                                     $set('sub_total', number_format($sub_total, 2));
    //                                     $set('taxes', number_format($taxes, 2));
    //                                     $set('final_amount', number_format($sub_total + (float)$get("taxes") + (float)$get("delivery"), 2));

    //                                     return "";
    //                                     // return $sub_total." ".(float)$get("taxes"). " ". (float)$get("delivery")." ".$sub_total + (float)$get("taxes") + (float)$get("delivery")  ;
    //                                 }),

    //                         ])->columns(2),
                           

                        
    //             ]);
    // }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make()
                            ->schema([

                                Forms\Components\Select::make('shop_customer_id')
                                    ->relationship('customer', 'name')
                                    ->searchable()
                                    ->required()
                                    ->preload()
                                    ->live(onBlur: true)
                                
                                    ->createOptionForm([
                                        Forms\Components\TextInput::make('name')
                                            ->required()
                                            ->maxLength(255),
                
                                        Forms\Components\TextInput::make('email')
                                            ->label('Email address')
                                            ->required()
                                            ->email()
                                            ->maxLength(255)
                                            ->unique(),
                
                                        Forms\Components\TextInput::make('phone')
                                            ->maxLength(255),
                
                                        Forms\Components\Select::make('gender')
                                            ->placeholder('Select gender')
                                            ->options([
                                                'male' => 'Male',
                                                'female' => 'Female',
                                            ])
                                            ->required()
                                            ->native(false),
                                    ])
                                    ->createOptionAction(function (Action $action) {
                                        return $action
                                            ->modalHeading('Create customer')
                                            ->modalSubmitActionLabel('Create customer')
                                            ->modalWidth('lg');
                                    }),

                                Forms\Components\ViewField::make('detail_customer')
                                    ->view('filament.detail_customer'),
                            
                            ])

                        
                    ]),
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make()
                        ->schema([
                            Forms\Components\DatePicker::make('quotation_date')
                                // ->format('d/m/Y')
                                ->native(false)
                                ->displayFormat('d/m/Y')
                                ->default(now())
                                ->required(),
                            Forms\Components\TextInput::make('valid_days')
                                ->numeric()
                                ->default(1)
                                ->minValue(0)
                                ->required(),

                            Forms\Components\Select::make('quote_status')
                                ->options([
                                    'draft' => 'Draft',
                                    'new' => 'New',
                                    'process' => 'Process',
                                    'done' => 'Done',
                                    'expired' => 'Expired',
                                    'cancelled' => 'Cancelled',

                                ])
                                ->default('draft')
                                ->searchable()
                                ->preload()
                                ->required()
                                ->columnSpan(2),


                        ])->columns(2)
                        
                    ]),

                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('title')
                        ->afterStateHydrated(function (?TextInput $component, ?string $state) {
                            $component->state(ucwords($state));
                        })
                            ->required()
                            ->maxLength(255),

                    ]),

                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\Repeater::make('items')
                            ->live(onBlur: true)
                            ->minItems(1)
                            ->collapsible()
                            ->relationship('items')
                            ->schema([
                                Forms\Components\Textarea::make('title')
                                    ->required()
                                    ->columnSpan(2),
                                Forms\Components\Select::make('product_id')
                                    ->relationship('product','title')
                                    ->searchable()
                                    ->preload()
                                    ->distinct()
                                    ->disableOptionsWhenSelectedInSiblingRepeaterItems()
                                    ->createOptionForm([
                                        Forms\Components\Textarea::make('title')
                                            ->maxLength(65535)
                                            ->columnSpanFull(),
                                        Forms\Components\Checkbox::make('tax')
                                            // ->live(onBlur: true)
                                            ->inline(false),

                                        Forms\Components\TextInput::make('quantity')
                                            ->required()
                                            ->numeric()
                                            ->default(0),
                                        Forms\Components\TextInput::make('price')
                                            ->required()
                                            ->numeric()
                                            ->prefix('RM')
                                            ->formatStateUsing(fn (?string $state): ?string => number_format($state, 2))
                                    ])
                                    ->createOptionAction(function (Action $action) {
                                        return $action
                                            // ->modalHeading('Create customer')
                                            // ->modalSubmitActionLabel('Create customer')
                                            ->modalWidth('Screen');
                                    })
                                    ->afterStateUpdated(function ($state, $set, $get ){
                                        $product = Product::find($state);
                                        $set('price', number_format($product->price, 2));
                                        $set('tax', (bool)$product->tax);
                                        $set('quantity', (int)$product->quantity);
                                        $set('total', number_format((int)$product->quantity*$get('price'), 2)  );
                                       
                                    })
                                    // ->live(onBlur: true)
                                    ->columnSpan(3),
                                Forms\Components\TextInput::make('price')
                                    ->required()
                                    ->prefix('RM')
                                    ->formatStateUsing(fn (string $state): string => number_format($state, 2))

                                    // ->live(onBlur: true)
                                    ->afterStateUpdated(function ($state, $set, $get ){
                                        $set('total', number_format($state*$get('quantity'), 2)  );
                                        // $total = 0 ; 
                                        // if(!$repeaters = $get('../../items')){
                                        //     return $total ;
                                        // }
                                        // foreach($repeaters AS $key => $val){
                                        //     $total += (float)$get("../../items.{$key}.total");
                                        // }
                                        // $set('../../sub_total', number_format($total, 2) );
                                        // $set('../../final_amount', number_format($total, 2));
                                    })
                                    ->default(0.00),
                                Forms\Components\Checkbox::make('tax')
                                // ->live(onBlur: true)
                                ->inline(false),
                                Forms\Components\TextInput::make('quantity')
                                    ->required()
                                    ->numeric()
                                    // ->live(onBlur: true)
                                    ->afterStateUpdated(function ($state, $set, $get ){
                                        $set('total', number_format($state*$get('price'), 2)  );
                                    })
                                    ->default(1),
                                Forms\Components\Select::make('unit')
                                    ->options([
                                        'Unit' => 'Unit',
                                        'Kg' => 'Kg',
                                        'Gram' => 'Gram',
                                        'Box' => 'Box',
                                        'Pack' => 'Pack',
                                        'Day' => 'Day',
                                        'Month' => 'Month',
                                        'Year' => 'Year',
                                        'People' => 'People',

                                    ])
                                    ->default('Unit')
                                    ->searchable()
                                    ->preload()
                                    ->required(),
                                Forms\Components\TextInput::make('total')
                                    ->prefix('RM')
                                    ->readonly()
                                    ->formatStateUsing(fn (string $state): string => number_format($state, 2))
                                    ->default(0.00),
                            ])->columns(5),

                    ]),
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\Textarea::make('notes'),
                        Forms\Components\Group::make()
                        ->schema([
                            Forms\Components\TextInput::make('sub_total')
                                ->formatStateUsing(fn ( $state)  => number_format($state, 2))
                                ->prefix('RM')
                                ->readonly()
                                ->default(0),
                            Forms\Components\TextInput::make('taxes')
                                ->prefix('RM')
                                ->readonly()
                                ->default(0),
                            Forms\Components\TextInput::make('percentage_tax')
                                ->prefix('%')
                                ->live(onBlur: true)
                                ->integer()
                                ->default(0),
                            Forms\Components\TextInput::make('delivery')
                                ->prefix('RM')
                                ->live(onBlur: true)
                                ->numeric()
                                ->default(0.00),
                            Forms\Components\TextInput::make('final_amount')
                                ->prefix('RM')
                                ->readonly()
                                ->live(onBlur: true)
                                ->default(0.00),
                                

                        ])->inlineLabel(),

                        Forms\Components\Placeholder::make('calculation')
                            ->hiddenLabel()
                            ->content(function ($get, $set){
                                $sub_total = 0 ; 
                                $taxes = 0 ;
                                
                                if(!$repeaters = $get('items')){
                                    return $sub_total ;
                                }
                                foreach($repeaters AS $key => $val){
                                    $sub_total += (float)$get("items.{$key}.total");
                                    
                                    if($get("items.{$key}.tax") == true){
                                        $taxes = $taxes + ((int)$get('percentage_tax') / 100 * (float)$get("items.{$key}.total")) ;
                                    }else{

                                    }
                                    
                                }

                                $set('sub_total', number_format($sub_total, 2));
                                $set('taxes', number_format($taxes, 2));
                                $set('final_amount', number_format($sub_total + (float)$get("taxes") + (float)$get("delivery"), 2));

                                return ;
                                // return $sub_total." ".(float)$get("taxes"). " ". (float)$get("delivery")." ".$sub_total + (float)$get("taxes") + (float)$get("delivery")  ;
                            }),

                    ])->columns(2),
                         
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('customer.name')
                    ->formatStateUsing(fn (string $state): string => __("<b>{$state}</b>"))
                    ->markdown()
                    ->searchable(),
                Tables\Columns\TextColumn::make('quotation_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('valid_days')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('quote_status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sub_total')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('taxes')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('percentage_tax')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('delivery')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('final_amount')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListQuotations::route('/'),
            'create' => Pages\CreateQuotation::route('/create'),
            'edit' => Pages\EditQuotation::route('/{record}/edit'),
            'test' => Pages\Tests::route('/test'),
        ];
    }
}
