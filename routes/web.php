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


// Route::get('/dashbaord', function(){
//     return view('app.dashboard');
// })->name('dashboard');


Route::middleware(['auth'])->group(function () {
    require __DIR__ . "/app-routes/dashboardControllers.php";
    require __DIR__ . "/app-routes/jobsControllers.php";
    require __DIR__ . "/app-routes/paymentControllers.php";
    require __DIR__ . "/app-routes/customerControllers.php";
    require __DIR__ . "/app-routes/purchaseControllers.php";
    require __DIR__ . "/app-routes/accountingControllers.php";
    require __DIR__ . "/app-routes/supplierControllers.php";
    require __DIR__ . "/app-routes/serviceControllers.php";
    require __DIR__ . "/app-routes/userControllers.php";
});











// index
// show
// create
// store
// edit
// udpate
// delete
