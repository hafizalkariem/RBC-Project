<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

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
        // Force HTTPS when using ngrok
        if (request()->header('x-forwarded-proto') === 'https') {
            URL::forceScheme('https');
        }
        
        view()->composer('*', function ($view) {
            $view->with('services', \App\Models\Service::orderBy('order')->get());
        });
    }
}