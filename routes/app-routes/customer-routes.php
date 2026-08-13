<?php

use App\Domain\Customers\Http\Controllers\CustomerController;
use App\Domain\Customers\Http\Controllers\FilterCustomersController;
use App\Domain\Customers\Http\Controllers\FilterCustomersJson;
use App\Domain\Customers\Http\Controllers\ViewDebtorsController;
use Illuminate\Support\Facades\Route;

Route::get('/filter', FilterCustomersController::class)->name('customers.filter');
Route::get('/filter-json', FilterCustomersJson::class)->name('customers.filter-json');

Route::resource('customers', CustomerController::class);
Route::get('/debtors', ViewDebtorsController::class)->name('debtors');
