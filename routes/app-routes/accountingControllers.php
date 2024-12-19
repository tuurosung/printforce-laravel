<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExpenditureController;
use App\Http\Controllers\FundTransferController;
use App\Http\Controllers\OperatingAccountController;

// Accounts Routing
Route::prefix('accounts')->controller(OperatingAccountController::class)->group(function () {

    // index
    Route::get('/', 'index')->name('accounts');

    // show account details
    Route::get('/transactions/{operatingAccount}', 'show')->name('account-transactions');

    // load edit form
    Route::get('/edit/{id}', 'edit')->name('edit-account');

    // create new account
    Route::post('/create', 'store')->name('create-account');

    // update account
    Route::post('/update', 'update')->name('update-account');

    // deletes an account
    Route::post('/delete/{operatingAccount}', 'destroy')->name('delete-account');

    // Route::post('service', 'store')->name('create.service');
    // Route::get('/service-edit/{id}', 'edit')->name('edit.service');
    // Route::post('/service-update', 'update')->name('update.service');
    // Route::post('/service-delete/{id}', 'destroy')->name('delete.service');
    // Route::post('/filter-transfers', 'filterTransfers')->name('filter.transfers');
});

// Expenditure Routing
Route::prefix('expenses')->controller(ExpenditureController::class)->group(function () {

    // displays all expenses
    Route::get('/', 'index')->name('expenses');

    // shows a selected expense
    Route::get('/edit-expense/{id}', 'edit')->name('edit-expense');

    // updates a selected expense
    Route::post('/update-expense', 'update')->name('update-expense');

    // create a new expense
    Route::post('/create-expense', 'store')->name('create-expense');

    // deletes a selected expense
    Route::post('/delete/{id}', 'destroy')->name('delete-expense');

    // filter expenses
    Route::post('/filter-expenses', 'filterExpenditure')->name('filter-expenses');
});


// Transfers Routing
Route::prefix('fund-transfers')->controller(FundTransferController::class)->group(function () {

    // index
    Route::get('/', 'index')->name('transfers');

    // Route::get('/transfer-info/{id}', 'show')->name('transfer.info');
    Route::get('/transfer', 'create')->name('new.transfer');

    // create new transfer
    Route::post('/create-transfer', 'store')->name('create-transfer');

    // edit transfer
    Route::get('/edit/{transfer_id}', 'edit')->name('edit-transfer');

    // update transfer
    Route::post('/update', 'update')->name('update-transfer');

    // delete transfer
    Route::post('/transfer-delete/{id}', 'destroy')->name('delete.transfer');

    // filter transfers
    Route::post('/filter-transfers', 'filterTransfers')->name('filter.transfers');
});
