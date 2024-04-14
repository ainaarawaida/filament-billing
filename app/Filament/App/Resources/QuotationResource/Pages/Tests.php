<?php

namespace App\Filament\App\Resources\QuotationResource\Pages;

use Filament\Forms\Form;
use Filament\Resources\Pages\Page;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\ViewField;
use App\Filament\App\Resources\QuotationResource;
use Filament\Pages\Concerns\InteractsWithFormActions;

class Tests extends Page
{

    use InteractsWithFormActions;
    
    protected static string $resource = QuotationResource::class;

    protected static string $view = 'filament.app.resources.quotation-resource.pages.tests';
    
    public $record = null;
    public ?array $data = [];
    
    public function form(Form $form): Form
    {
        return $form
            ->live()
            ->schema([
                Select::make('selection')
                    ->label('Select')
                    ->options([
                        'option1' => 'Option 1',
                        'option2' => 'Option 2',
                        // ... Add more options as needed
                    ])
                    ->live(),
                ViewField::make('rating')
                    ->view('filament.test')
                    ->viewData([
                        'min' => "jajaja",
                        'max' => 5,
                    ]),
            ])
            ->model($this->record)
            ->statePath('data')
            ->operation('edit');
    }





}
