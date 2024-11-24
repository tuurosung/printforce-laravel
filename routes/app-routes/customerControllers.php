<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerPaymentController;
use App\Http\Controllers\Customers\CustomerController;


Route::prefix('/customers')->controller(CustomerController::class)->group(function () {
    Route::get('/', 'index')->name('customers');
    Route::get('/info/{customer}', 'show')->name('customer-info');
    Route::get('/create', 'create')->name('new-customer');
    Route::post('/store.customer', 'store')->name('store.customer');
    Route::get('/edit-customer/{id}', 'edit')->name('customer.edit');
    Route::post('/customer-update', 'update')->name('customer.update');
});

Route::controller(CustomerPaymentController::class)->group(function () {
    Route::get('/payments', 'index')->name('payment.list');
    // show
    Route::get('/new-payment/{id}', 'create')->name('new.payment');
    Route::post('/payment', 'store')->name('create.payment');
    Route::get('/edit-payment/{id}', 'edit')->name('payment.edit');
    Route::post('/payment-update', 'update')->name('payment.update');
    Route::post('/payment-delete/{id}', 'destroy')->name('payment.delete');
    Route::post('/filter-payments', 'filterPayments')->name('filter.payments');
});
