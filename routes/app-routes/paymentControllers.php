<?php

use App\Http\Controllers\Customers\CustomerPaymentController;

Route::prefix('payments')->controller(CustomerPaymentController::class)->group(function () {

    Route::post('/store-payment', 'store')->name('store.payment');
});

Route::prefix('payments')->controller(CustomerPaymentController::class)->group(function () {
    Route::get('/', 'index')->name('payments');
    // show
    Route::get('/new-payment/{id}', 'create')->name('new.payment');
    Route::post('/store-payment', 'store')->name('store.payment');
    Route::get('/edit-payment/{id}', 'edit')->name('edit.payment');
    Route::post('/update', 'update')->name('update.payment');
    Route::delete('/delete/{payment}', 'destroy')->name('delete.payment');
    Route::post('/filter-payments', 'filterPayments')->name('filter.payments');
});
