<?php

use App\Http\Controllers\Purchases\OffloadPurchaseInvoiceCartController;
use App\Http\Controllers\Purchases\PrepareInvoiceController;
use App\Http\Controllers\Purchases\PrintPurchaseInvoiceController;
use Illuminate\Support\Facades\Route;
use App\Models\Purchases\PurchasedItem;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\Purchases\PurchaseController;
use App\Http\Controllers\Purchases\PurchasedItemController;
use App\Http\Controllers\Purchases\PurchasePaymentController;

Route::prefix('purchases')
    ->name('purchases.')
    ->group(function () {

        Route::get('/prepare-invoice/{purchase}', PrepareInvoiceController::class)->name('prepare-invoice');
        Route::post('/offload-cart/{purchase}', OffloadPurchaseInvoiceCartController::class)->name('offload-cart');
        Route::get('/print-invoice/{purchase}', PrintPurchaseInvoiceController::class)->name('print-invoice');

        Route::controller(PurchaseController::class)
            ->group(function () {

                Route::get('/', 'index')->name('index');
                Route::post('/store', 'store')->name('store');
            });

        Route::prefix('purchased-items')
            ->name('purchased-items.')
            ->controller(PurchasedItemController::class)
            ->group(function () {

                Route::post('/add-to-cart/{purchase}', 'addtoCart')->name('add-to-cart');
                Route::delete('/remove-from-cart/{purchasedItem}', 'removeFromCart')->name('remove-from-cart');
                Route::get('/cart', 'cart')->name('cart');
                Route::post('/update-cart', 'updateCart')->name('update-cart');
            });

        Route::prefix('payments')
            ->name('payments.')
            ->controller(PurchasePaymentController::class)
            ->group(function () {

                Route::get('/', 'index')->name('index');
                Route::post('/store/{supplier}', 'store')->name('store');
                Route::get('/create', 'create')->name('create');
                Route::get('/edit/{purchasePayment}', 'edit')->name('edit');
                Route::patch('/update/{purchasePayment}', 'update')->name('update');
                Route::delete('/delete/{purchasePayment}', 'destroy')->name('delete');
            });
    });
