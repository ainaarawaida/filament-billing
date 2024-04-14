<?php

namespace App\Filament\Pages\Tenancy;

use App\Models\Team;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Illuminate\Support\Str;
use Filament\Facades\Filament;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Tenancy\EditTenantProfile;

class EditTeamProfile extends EditTenantProfile
{
      public static function getLabel(): string
      {
            return 'Organization';
      }

      public function form(Form $form): Form
      {
            return $form
                  ->schema([
                        TextInput::make('name')
                        ->required()
                        ->live(onBlur:true)
                        ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),
                        TextInput::make('slug')
                        ->required()
                        ->unique(Team::class, 'slug', fn ($record) => $record),
                  ]);
      }

      public function getRedirectUrl(): string
      {
            // return Filament::getUrl('index');
            // $newSlug = $this->record->slug;
            // $tenant = Filament::getTenant();
            // dd($tenant);
            // Replace '/desired-route' with the actual path you want to redirect to
            // dd(route('filament.admin.tenant'));
            // dd(route('filament.admin.tenant'));
            // $link = route('filament.admin.tenant') ;
            return route('filament.admin.tenant');
            // return redirect()->to($link);
            // return static::getResource()::getUrl('index');
            // return route('filament.admin.tenant');
      }
}
