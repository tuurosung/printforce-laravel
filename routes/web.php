<?php

use App\Http\Controllers\ExpenditureController;
use App\Http\Controllers\FundTransferController;
use App\Http\Controllers\ServiceController;
use App\Http\Middleware\CheckSubscriptionValidatity;
use App\Models\OperatingAccount;
use Illuminate\Support\Facades\Route;

// Development helpers: serve legacy vendor JS and images from resources
// so existing blade templates referencing /js/printforce/* and /images/*
// do not 404 while we migrate assets into the Vite build.
Route::get('/js/printforce/{path}', function ($path) {
    $file = resource_path('js/printforce/' . $path);
    if (! file_exists($file)) {
        abort(404);
    }
    return response()->file($file);
})->where('path', '.*');

Route::get('/images/{path}', function ($path) {
    $file = resource_path('images/' . $path);
    if (! file_exists($file)) {
        abort(404);
    }
    return response()->file($file);
})->where('path', '.*');

// Serve /assets/img/* from resources/images for development (favicon, etc.)
Route::get('/assets/img/{path}', function ($path) {
    $file = resource_path('images/' . $path);
    if (! file_exists($file)) {
        // fallback to logo if requested image not present
        $file = resource_path('images/logo.png');
    }
    return response()->file($file);
})->where('path', '.*');

Route::get('/', function(){
    return view('landing');
})->name('landing');

Route::get('/login', function(){
    return view('auth.login');
})->name('login');


require __DIR__ . "/app-routes/subscription-routes.php";



Route::post('/logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('logout');
Route::post('/user-login', [App\Http\Controllers\LoginController::class, 'authenticate'])->name('user-login');


Route::middleware(['auth'])
    ->middleware(CheckSubscriptionValidatity::class)
    ->group(function () {
    require __DIR__ . "/app-routes/dashboard-routes.php";

    require __DIR__ . "/app-routes/customer-routes/index.php";
    require __DIR__ . "/app-routes/job-routes/index.php";
    require __DIR__ . "/app-routes/payment-routes.php";
    require __DIR__ . "/app-routes/invoice-routes/index.php";

    require __DIR__ . "/app-routes/supplier-routes/index.php";

    require __DIR__ . "/app-routes/purchase-routes.php";

    require __DIR__ . "/app-routes/accounting-routes.php";
    require __DIR__ . "/app-routes/service-routes.php";
    require __DIR__ . "/app-routes/user-routes.php";
    require __DIR__ . "/app-routes/upgrade-routes.php";

    // require __DIR__ . "/app-routes/config-routes/index.php";


});
