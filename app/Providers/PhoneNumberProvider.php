<?php

namespace App\Providers;

use App\Services\PhoneNumberValidationService;
use Illuminate\Support\ServiceProvider;

class PhoneNumberProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton('phone-number-service', function ($app) {
            return new PhoneNumberValidationService();
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
