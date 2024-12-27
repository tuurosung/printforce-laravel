<?php

use App\Http\Controllers\Suppliers\SupplierController;


Route::prefix('suppliers')->controller(SupplierController::class)->group(function () {

    // index
    Route::get('/', 'index')->name('suppliers');

    // show supplier profile
    Route::get('/info/{id}', 'show')->name('supplier-info');

    // create a new supplier
    Route::post('/create', 'store')->name('create-supplier');

    // edit supplier
    Route::get('/edit/{supplier_id}', 'edit')->name('edit-supplier');

    // update supplier
    Route::post('/update', 'update')->name('update-supplier');

    Route::post('/supplier-delete/{id}', 'destroy')->name('delete.supplier');
});
