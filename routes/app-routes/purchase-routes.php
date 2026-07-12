<?php

use App\Domain\Purchases\Http\Controllers\OffloadPurchaseInvoiceCartController;
use App\Domain\Purchases\Http\Controllers\PrintPurchaseInvoiceController;
use App\Domain\Purchases\Http\Controllers\PurchaseController;
use App\Domain\Purchases\Http\Controllers\PurchasedItemController;
use App\Domain\Purchases\Http\Controllers\PurchasePaymentController;
use App\Domain\Purchases\Http\Controllers\PrepareInvoiceController;
use Illuminate\Support\Facades\Route;

Route::prefix("purchases")
    ->name("purchases.")
    ->group(function () {
        Route::get('/prepare-invoice/{purchase}', PrepareInvoiceController::class)->name('prepare-invoice');
        Route::post('/offload-cart/{purchase}', OffloadPurchaseInvoiceCartController::class)->name('offload-cart');
        Route::get('/print-invoice/{purchase}', PrintPurchaseInvoiceController::class)->name('print-invoice');
    });

Route::resource("purchase-payment", PurchasePaymentController::class)->parameters([
    "purchase-payment" => "purchasePayment"
]);
Route::resource("purchases", PurchaseController::class);
Route::resource("purchases.purchased-items", PurchasedItemController::class)->parameters([
    "purchased-items" => "purchasedItem",
]);

Route::resource("purchase-payments", PurchasePaymentController::class)->parameters([
    "purchase-payment"=> "purchasePayment"
]);


// Route::prefix('purchase-payments')
//     ->name('payments.')
//     ->controller(PurchasePaymentController::class)
//     ->group(function () {

//         Route::get('/', 'index')->name('index');
//         Route::post('/store/{supplier}', 'store')->name('store');
//         Route::get('/create', 'create')->name('create');
//         Route::get('/edit/{purchasePayment}', 'edit')->name('edit');
//         Route::patch('/update/{purchasePayment}', 'update')->name('update');
//         Route::delete('/delete/{purchasePayment}', 'destroy')->name('delete');
//     });

// Route::prefix('purchases')
//     ->name('purchases.')
//     ->group(function () {



//         Route::prefix('purchased-items')
//             ->name('purchased-items.')
//             ->controller(PurchasedItemController::class)
//             ->group(function () {

//                 Route::post('/add-to-cart/{purchase}', 'addtoCart')->name('add-to-cart');
//                 Route::delete('/remove-from-cart/{purchasedItem}', 'removeFromCart')->name('remove-from-cart');
//                 Route::get('/cart', 'cart')->name('cart');
//                 Route::post('/update-cart', 'updateCart')->name('update-cart');
//             });


//     });
