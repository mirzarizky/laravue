<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Users extends Page
{
    protected static ?string $navigationGroup = 'Master';

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static string $view = 'filament.pages.users';
}
