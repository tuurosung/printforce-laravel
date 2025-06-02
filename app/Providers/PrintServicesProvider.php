<?php

namespace App\Providers;

use App\Services\PrintServicesManager;
use Illuminate\Support\ServiceProvider;

class PrintServicesProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton('printservices', function ($app) {
            return new PrintServicesManager();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
