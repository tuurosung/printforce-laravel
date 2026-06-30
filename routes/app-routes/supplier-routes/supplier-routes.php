<?php

use App\Domain\Suppliers\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

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
