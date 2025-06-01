<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customers\CustomerController;
use App\Http\Controllers\Customers\FilterCustomersController;
use App\Http\Controllers\Customers\PrintDebtorsController;
use App\Http\Controllers\Customers\ViewDebtorsController;

Route::prefix('customers')
    ->name('customers.')
    ->controller(CustomerController::class)
    ->group(function () {

        Route::prefix('customer')
            ->name('customer.')
            ->controller(CustomerController::class)
            ->group(function () {

                Route::get('/', 'index')->name('index');
                Route::get('/info/{customer}', 'show')->name('info');
                Route::get('/create', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/edit/{customer}', 'edit')->name('edit');
                Route::patch('/update/{customer}', 'update')->name('update');
                Route::delete('/delete', 'destroy')->name('delete');
            });

        Route::get('/filter', FilterCustomersController::class)->name('filter');

        // debtors
        Route::prefix('debtors')
            ->name('debtors.')
            ->group(function () {

            Route::get('/view', ViewDebtorsController::class)->name('view');
            Route::get('/print', PrintDebtorsController::class)->name('print');
        });

});
