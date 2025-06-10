<?php

use App\Http\Controllers\ExpenditureController;
use App\Http\Controllers\FundTransferController;
use App\Http\Controllers\ServiceController;
use App\Models\OperatingAccount;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('landing');
})->name('landing');

Route::get('/login', function(){
    return view('auth.login');
})->name('login');


Route::get('/logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('logout');
Route::post('/user-login', [App\Http\Controllers\LoginController::class, 'authenticate'])->name('user-login');




Route::middleware(['auth'])->group(function () {
    require __DIR__ . "/app-routes/dashboardControllers.php";
    require __DIR__ . "/app-routes/job-routes.php";
    require __DIR__ . "/app-routes/payment-routes.php";
    require __DIR__ . "/app-routes/customer-routes.php";
    require __DIR__ . "/app-routes/purchaseControllers.php";
    require __DIR__ . "/app-routes/accounting-routes.php";
    require __DIR__ . "/app-routes/supplierControllers.php";
    require __DIR__ . "/app-routes/service-routes.php";
    require __DIR__ . "/app-routes/user-routes.php";
    require __DIR__ . "/app-routes/upgrade-routes.php";
});
