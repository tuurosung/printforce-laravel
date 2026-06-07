<?php

use App\Domain\Customers\Http\Controllers\CustomerController;
use App\Domain\Customers\Http\Controllers\FilterCustomersController;
use App\Domain\Customers\Http\Controllers\PrintDebtorsController;
use App\Domain\Customers\Http\Controllers\ViewDebtorsController;
use App\Domain\Customers\Http\Controllers\FilterCustomersJson;
use Illuminate\Support\Facades\Route;

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
                Route::delete('/delete/{customer}', 'destroy')->name('delete');
            });

        Route::get('/filter', FilterCustomersController::class)->name('filter');
        Route::get('/filter-json', FilterCustomersJson::class)->name('filter-json');

        // debtors
        Route::prefix('debtors')
            ->name('debtors.')
            ->group(function () {

            Route::get('/view', ViewDebtorsController::class)->name('view');
            Route::get('/print', PrintDebtorsController::class)->name('print');
        });

});
