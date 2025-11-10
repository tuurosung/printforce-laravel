<?php

namespace App\Providers;

use Illuminate\Support\Number;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Blade;
use Illuminate\Database\Eloquent\Model;
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
       Model::automaticallyEagerLoadRelationships();

       Blade::directive('currency', function ($expression) {
           return "<?php echo number_format($expression, 2); ?>";
       });

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
