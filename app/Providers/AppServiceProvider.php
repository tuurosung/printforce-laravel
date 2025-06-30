<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
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
        // \Event::listen('Illuminate\Database\Events\QueryExecuted', function ($query) {
        //     echo '<pre>';
        //     print_r([$query->sql, $query->time]);
        //     echo '</pre>';
        // });

        $gates = [
            'administrator' => 'administrator',
        ];

        foreach ($gates as $gate => $allowed) {
            Gate::define($gate, function ($user) use ($allowed) {
                return in_array($user->access_level, (array) $allowed);
            });
        }

    }
}
