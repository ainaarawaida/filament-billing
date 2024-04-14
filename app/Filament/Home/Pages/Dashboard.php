<?php

namespace App\Filament\Home\Pages;

use Filament\Pages\Page;
use Filament\Pages\Dashboard as OriDashboard;

class Dashboard extends OriDashboard
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.home.pages.dashboard';

    protected static ?string $title = '';
    protected static ?string $navigationLabel = 'Homes';
}
