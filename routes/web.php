<?php

use App\Http\Controllers\ExpenditureController;
use App\Http\Controllers\FundTransferController;
use App\Http\Controllers\ServiceController;
use App\Models\OperatingAccount;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return redirect('/login');
});

Route::get('/login', function(){
    return view('auth.login');
})->name('login');

Route::get('/logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('logout');
Route::post('/user-login', [App\Http\Controllers\LoginController::class, 'authenticate'])->name('user-login');

Route::get('/dashbaord', function(){
    return view('app.dashboard');
})->name('dashboard');

Route::middleware(['auth'])->group(function () {
    require __DIR__ . "/app-routes/dashboardControllers.php";
    require __DIR__ . "/app-routes/jobsControllers.php";
    require __DIR__ . "/app-routes/paymentControllers.php";
    require __DIR__ . "/app-routes/customerControllers.php";
    require __DIR__ . "/app-routes/purchaseControllers.php";
    require __DIR__ . "/app-routes/accountingControllers.php";
});





// Services Routing
Route::controller(ServiceController::class)->group(function () {
    // index
    Route::get('/services', 'index')->name('all.services');
    // Route::get('/transfer-info/{id}', 'show')->name('transfer.info');
    Route::get('/service', 'create')->name('new.service');
    Route::post('service', 'store')->name('create.service');
    Route::get('/service-edit/{id}', 'edit')->name('edit.service');
    Route::post('/service-update', 'update')->name('update.service');
    Route::post('/service-delete/{id}', 'destroy')->name('delete.service');
    // Route::post('/filter-transfers', 'filterTransfers')->name('filter.transfers');
});





// index
// show
// create
// store
// edit
// udpate
// delete
