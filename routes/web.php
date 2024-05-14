<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerPaymentController;
use App\Http\Controllers\ExpenditureController;
use App\Http\Controllers\FundTransferController;
use App\Http\Controllers\LargeFormatJobController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\PurchasePaymentController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SupplierController;
use App\Models\Customer;
use App\Models\CustomerPayment;
use App\Models\LargeFormatJob;
use App\Models\PurchasePayment;
use App\Models\Supplier;
use Illuminate\Support\Facades\Route;

Route::controller(CustomerController::class)->group(function () {
    Route::get('/customers', 'index')->name('customer_list');
    Route::get('/customer-info/{id}', 'show')->name('customer.info');
    Route::get('/new-customer', 'create')->name('new-customer');
    Route::post('/customer', 'store')->name('create-customer');
    Route::get('/edit-customer/{id}', 'edit')->name('customer.edit');
    Route::post('/customer-update', 'update')->name('customer.update');
});


Route::controller(LargeFormatJobController::class)->group(function () {
    Route::get('/largeformat', 'index')->name('largeformatjobs');

    Route::get('/new-largeformatjob', 'create')->name('new.largeformatjob');
});

Route::controller(CustomerPaymentController::class)->group(function () {
    Route::get('/payments', 'index')->name('payment.list');
    // show
    Route::get('/new-payment/{id}', 'create')->name('new.payment');
    Route::post('/payment', 'store')->name('create.payment');
    Route::get('/edit-payment/{id}', 'edit')->name('payment.edit');
    Route::post('/payment-update', 'update')->name('payment.update');
    Route::post('/payment-delete/{id}', 'destroy')->name('payment.delete');
    Route::post('/filter-payments', 'filterPayments')->name('filter.payments');
});

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

// Expenditure Routing
Route::controller(ExpenditureController::class)->group(function () {
    // index
    Route::get('/expenditure', 'index')->name('all.expenses');
    Route::get('/supplier-info/{id}', 'show')->name('supplier.info');
    // Route::get('/new-expenditure', 'create')->name('new.expenditure');
    Route::post('expenditure', 'store')->name('create.expense');
    Route::get('/expenditure-edit/{id}', 'edit')->name('edit.expenditure');
    Route::post('/expenditure-update', 'update')->name('update.expenditure');
    Route::post('/expenditure-delete/{id}', 'destroy')->name('delete.expenditure');
    Route::post('/filter-expenditure', 'filterExpenditure')->name('filter.expenditure');
});


// Transfers Routing
Route::controller(FundTransferController::class)->group(function () {
    // index
    Route::get('/transfers', 'index')->name('all.transfers');
    // Route::get('/transfer-info/{id}', 'show')->name('transfer.info');
    Route::get('/transfer', 'create')->name('new.transfer');
    Route::post('transfer', 'store')->name('create.transfer');
    Route::get('/transfer-edit/{id}', 'edit')->name('edit.transfer');
    Route::post('/transfer-update', 'update')->name('update.transfer');
    Route::post('/transfer-delete/{id}', 'destroy')->name('delete.transfer');
    Route::post('/filter-transfers', 'filterTransfers')->name('filter.transfers');
});


// Services Routing
Route::controller(ServiceController::class)->group(function () {
    // index
    Route::get('/services', 'index')->name('all.services');
    // Route::get('/transfer-info/{id}', 'show')->name('transfer.info');
    Route::get('/service', 'create')->name('new.service');
    Route::post('service', 'store')->name('create.service');
    Route::get('/service-edit/{id}', 'edit')->name('edit.service');
    Route::post('/service-update', 'update')->name('update.service');
    Route::post('/service-delete/{id}', 'destroy')->name('delete.service');
    // Route::post('/filter-transfers', 'filterTransfers')->name('filter.transfers');
});



// index
// show
// create
// store
// edit
// udpate
// delete
