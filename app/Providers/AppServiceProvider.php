<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (config('app.env') === 'production') {
    \URL::forceScheme('https');
}
        if (app()->runningInConsole()) {
            return;
        }

        if (app()->environment('production')) {
            URL::forceRootUrl(request()->getSchemeAndHttpHost());

            if (request()->isSecure()) {
                URL::forceScheme('https');
            }
        }
    }
}
