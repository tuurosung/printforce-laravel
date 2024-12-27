<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerPaymentController;
use App\Http\Controllers\Customers\CustomerController;


Route::prefix('customers')->controller(CustomerController::class)->group(function () {
    Route::get('/', 'index')->name('customers');
    Route::get('/info/{customer}', 'show')->name('customer-info');
    Route::get('/create', 'create')->name('new-customer');

    Route::get('/debtors', 'debtorsList')->name('debtors');
    Route::get('/print-debtors-list', 'printDebtorsList')->name('print.debtors.list');
    Route::post('/store.customer', 'store')->name('store.customer');
    Route::get('/edit-customer/{id}', 'edit')->name('customer.edit');
    Route::post('/customer-update', 'update')->name('customer.update');
});
