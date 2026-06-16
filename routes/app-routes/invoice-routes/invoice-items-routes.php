<?php

use App\Domain\Invoices\Http\Controllers\CustomerInvoiceItemController;
use Illuminate\Support\Facades\Route;

Route::prefix('invoice-items')
    ->name('invoice-items.')
    ->controller(CustomerInvoiceItemController::class)
    ->group(function () {

        Route::post('/store/{customerInvoice}', 'store')->name('store');
        Route::get('/{customerInvoiceItem}', 'show')->name('show');
        Route::put('/{customerInvoiceItem}', 'update')->name('update');
        Route::delete('delete/{customerInvoiceItem}', 'destroy')->name('destroy');

    });
