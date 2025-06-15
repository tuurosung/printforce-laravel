<?php

use App\Http\Controllers\Suppliers\SupplierController;

Route::prefix('suppliers')
    ->name('suppliers.')
    ->group(function () {

        Route::controller(SupplierController::class)
            ->group(function () {

                Route::get('/', 'index')->name('index');
                Route::get('/info/{supplier}', 'show')->name('info');
                Route::get('/create', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/edit/{supplier}', 'edit')->name('edit');
                Route::patch('/update/{supplier}', 'update')->name('update');
                Route::delete('/delete/{supplier}', 'destroy')->name('delete');
            });
    });

