<?php

use App\Http\Controllers\Customers\CustomerPaymentController;
use App\Http\Controllers\Payments\PaymentsGraphController;

Route::prefix('payments')
    ->name('payments.')
    ->group(function () {

        Route::controller(CustomerPaymentController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create/{customer_id}', 'create')->name('new');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{customerPayment}', 'edit')->name('edit');
            Route::post('/update/{customerPayment}', 'update')->name('update');
            Route::delete('/delete/{customerPayment}', 'destroy')->name('delete');
            Route::post('/filter-payments', 'filterPayments')->name('filter');
            // Route::get('/payment-graph', 'paymentGraph')->name('graph');
        });

        Route::get('/graph', PaymentsGraphController::class)->name('graph');

    });

// Route::prefix('payments')->controller(CustomerPaymentController::class)->group(function () {

//     Route::post('/store-payment', 'store')->name('store.payment');
// });

// Route::prefix('payments')->controller(CustomerPaymentController::class)->group(function () {
//     Route::get('/', 'index')->name('payments');
//     // show
//     Route::get('/new-payment/{id}', 'create')->name('new.payment');
//     Route::post('/store-payment', 'store')->name('store.payment');
//     Route::get('/edit-payment/{id}', 'edit')->name('edit.payment');
//     Route::post('/update', 'update')->name('update.payment');
//     Route::delete('/delete/{payment}', 'destroy')->name('delete.payment');
//     Route::post('/filter-payments', 'filterPayments')->name('filter.payments');

//     Route::get('/payment-graph', 'paymentGraph')->name('payment-graph');
// });
