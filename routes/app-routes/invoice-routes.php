<?php

use App\Models\Invoices\CustomerInvoices;
use App\Http\Controllers\Invoices\CustomerInvoiceController;
use App\Http\Controllers\Invoices\CustomerInvoiceItemController;
use App\Http\Controllers\Invoices\PrepareCustomerInvoiceController;
use App\Http\Controllers\Invoices\CheckoutCustomerInvoiceController;

Route::prefix('invoices')
    ->name('invoices.')
    ->group(function () {


        Route::controller(CustomerInvoiceController::class)
            ->group(function () {

                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/{customerInvoices}', 'show')->name('show');
                Route::get('/{customerInvoices}/edit', 'edit')->name('edit');
                Route::put('/{customerInvoices}/update', 'update')->name('update');
                Route::delete('/{customerInvoices}/delete', 'destroy')->name('destroy');

            });

        Route::get('/prepare-customer-invoice/{customerInvoice}', PrepareCustomerInvoiceController::class)
            ->name('prepare-customer-invoice');

        Route::prefix('invoice-items')
            ->name('invoice-items.')
            ->controller(CustomerInvoiceItemController::class)
            ->group(function () {

                Route::post('/store/{customerInvoice}', 'store')->name('store');
                Route::get('/{customerInvoiceItem}', 'show')->name('show');
                Route::put('/{customerInvoiceItem}', 'update')->name('update');
                Route::delete('/{customerInvoiceItem}', 'destroy')->name('destroy');

            });

        Route::post('/checkout-customer-invoice/{customerInvoice}', CheckoutCustomerInvoiceController::class)
            ->name('checkout-customer-invoice');

    });
