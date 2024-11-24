<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExpenditureController;
use App\Http\Controllers\FundTransferController;
use App\Http\Controllers\OperatingAccountController;

// Accounts Routing
Route::controller(OperatingAccountController::class)->group(function () {
    // index
    Route::get('/accounts', 'index')->name('all.accounts');
    // Route::get('/transfer-info/{id}', 'show')->name('transfer.info');
    Route::get('/account', 'create')->name('new.account');
    // Route::post('service', 'store')->name('create.service');
    // Route::get('/service-edit/{id}', 'edit')->name('edit.service');
    // Route::post('/service-update', 'update')->name('update.service');
    // Route::post('/service-delete/{id}', 'destroy')->name('delete.service');
    // Route::post('/filter-transfers', 'filterTransfers')->name('filter.transfers');
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
