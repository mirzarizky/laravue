<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Illuminate\Support\HtmlString;
use Illuminate\Support\ServiceProvider;

class FilamentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Filament::serving(function () {
            // Filament::register(mix('/dist/js/alpine.js'));
            Filament::registerTheme(mix('/dist/css/app.css'));
        });

        Filament::pushMeta([
            new HtmlString('<link rel="preconnect" href="https://fonts.googleapis.com">'),
            new HtmlString('<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>'),
            new HtmlString('<link
            href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@100;200;300;400;500;600;700&display=swap"
            rel="stylesheet">'),
            new HtmlString('<link
            href="https://fonts.googleapis.com/css2?family=Crimson+Pro:wght@200;300;400;500;600;700;800;900&display=swap"
            rel="stylesheet" />'),
        ]);
    }
}
