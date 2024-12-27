<?php

use Illuminate\Support\Facades\Route;
use App\Models\Purchases\PurchasedItem;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\Purchases\PurchaseController;
use App\Http\Controllers\Purchases\PurchasedItemController;
use App\Http\Controllers\Purchases\PurchasePaymentController;

// Supplier Purchase Routing
Route::prefix('purchases')->controller(PurchaseController::class)->group(function () {

    // index
    Route::get('/', 'index')->name('purchases');

    // prepare invoice
    Route::get('/prepare-invoice/{purchase_id}', 'prepareInvoice')->name('prepare-invoice');

    // create a new purchase
    Route::post('purchase', 'store')->name('create.purchase');

    // offload cart
    Route::post('/offload-cart', 'offloadCart')->name('offload-cart');

    // Route::get('/supplier-edit/{id}', 'edit')->name('edit.supplier');
    // Route::post('/supplier-update', 'update')->name('update.supplier');
    // Route::post('/supplier-delete/{id}', 'destroy')->name('delete.supplier');
});

Route::prefix('purchased-items')->controller(PurchasedItemController::class)->group(function () {

    Route::post('/add-to-cart', 'addtoCart')->name('add-to-cart');
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
