<?php

use App\Domain\Invoices\Http\Controllers\CheckoutCustomerInvoiceController;
use App\Domain\Invoices\Http\Controllers\CustomerInvoiceController;
use App\Domain\Invoices\Http\Controllers\PrepareCustomerInvoiceController;
use App\Domain\Invoices\Http\Controllers\PrintInvoiceController;
use Illuminate\Support\Facades\Route;


Route::controller(CustomerInvoiceController::class)
    ->group(function () {

        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('show/{customerInvoice}', 'show')->name('show');
        Route::get('edit/{customerInvoice}', 'edit')->name('edit');
        Route::patch('update/{customerInvoice}/update', 'update')->name('update');
        Route::delete('delete/{customerInvoice}', 'destroy')->name('delete');

    });

Route::get('/prepare-customer-invoice/{customerInvoice}', PrepareCustomerInvoiceController::class)
    ->name('prepare-customer-invoice');

Route::post('/checkout-customer-invoice/{customerInvoice}', CheckoutCustomerInvoiceController::class)
    ->name('checkout-customer-invoice');

Route::get('/print-invoice/{customerInvoice}', PrintInvoiceController::class)->name('print-invoice');
