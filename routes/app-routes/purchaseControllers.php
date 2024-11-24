<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PurchasePaymentController;

// Supplier Routing
Route::controller(SupplierController::class)->group(function () {
    // index
    Route::get('/suppliers', 'index')->name('all.suppliers');
    Route::get('/supplier-info/{id}', 'show')->name('supplier.info');
    Route::get('/new-supplier', 'create')->name('new.supplier');
    Route::post('supplier', 'store')->name('create.supplier');
    Route::get('/supplier-edit/{id}', 'edit')->name('edit.supplier');
    Route::post('/supplier-update', 'update')->name('update.supplier');
    Route::post('/supplier-delete/{id}', 'destroy')->name('delete.supplier');
});

// Supplier Purchase Routing
Route::controller(PurchaseController::class)->group(function () {
    // index
    // Route::get('/pu', 'index')->name('all.suppliers');
    // Route::get('/supplier-info/{id}', 'show')->name('supplier.info');
    // Route::get('/new-purchase-payment', 'create')->name('new.purchase.payment');
    Route::post('purchase', 'store')->name('create.purchase');
    // Route::get('/supplier-edit/{id}', 'edit')->name('edit.supplier');
    // Route::post('/supplier-update', 'update')->name('update.supplier');
    // Route::post('/supplier-delete/{id}', 'destroy')->name('delete.supplier');
});


// Supplier Payments Routing
Route::controller(PurchasePaymentController::class)->group(function () {
    // index
    // Route::get('/pu', 'index')->name('all.suppliers');
    // Route::get('/supplier-info/{id}', 'show')->name('supplier.info');
    // Route::get('/new-purchase-payment', 'create')->name('new.purchase.payment');
    Route::post('purchase-payment', 'store')->name('create.purchase.payment');
    // Route::get('/supplier-edit/{id}', 'edit')->name('edit.supplier');
    // Route::post('/supplier-update', 'update')->name('update.supplier');
    // Route::post('/supplier-delete/{id}', 'destroy')->name('delete.supplier');
});
