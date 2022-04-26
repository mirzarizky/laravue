<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\NPSOverview;
use Filament\Pages\Page;

class NpsScore extends Page
{
    protected static ?string $navigationGroup = 'SkinSight';

    protected static ?string $navigationLabel = 'NPS Score';

    protected static ?string $navigationIcon = 'heroicon-o-star';

    protected static string $view = 'filament.pages.nps-score';

    protected function getHeaderWidgets(): array
    {
        return [
            NPSOverview::class
        ];
    }
}
