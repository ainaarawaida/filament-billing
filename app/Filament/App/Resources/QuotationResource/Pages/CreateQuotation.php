<?php

namespace App\Filament\App\Resources\QuotationResource\Pages;

use Filament\Actions;
use Filament\Forms\Components\ViewField;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\App\Resources\QuotationResource;

class CreateQuotation extends CreateRecord
{
    protected static string $resource = QuotationResource::class;


    // public function getHeading(): string 
    // {
    //     // return "ddd";
    //     // $data = $this->form->getRawState();
    //     // return json_encode($data);
    //     return $this->heading ?? $this->getTitle()." ".;
    // }

    protected function getHeaderActions(): array
    {
        return [
            
        Actions\CreateAction::make(),
        ];
    }
}
