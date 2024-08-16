<?php

namespace App\Providers;

use App\View\Composers\MainLayoutComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // View::composer([
        //     'components.layouts.main',
        //     'components.layouts.app',
        //     'components.layouts.guest'
        // ], MainLayoutComposer::class);
        View::composer('*', MainLayoutComposer::class);
    }
}
