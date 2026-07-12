<?php

use App\Domain\Customers\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;


Route::prefix('customers')
    ->name('customers.')
    ->controller(CustomerController::class)
    ->group(function () {

        require __DIR__ . "/customer-routes.php";
        require __DIR__ . "/debtors-routes.php";

    });
