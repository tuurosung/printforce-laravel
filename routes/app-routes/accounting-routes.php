<?php

use App\Domain\Expenditure\Http\Controllers\ExpenditureController;
use App\Http\Controllers\Accounting\FilterFundTransferController;
use App\Http\Controllers\Accounting\FundTransferController;
use App\Http\Controllers\Accounting\OperatingAccountController;
use Illuminate\Support\Facades\Route;

Route::resource('expenditure', ExpenditureController::class);

Route::prefix('accounting')
    ->name('accounting.')
    ->group(function () {

        // This prefix is used for all routes in this group

        // Accounts routes
        Route::prefix('accounts')
            ->name('accounts.')
            ->controller(OperatingAccountController::class)
            ->group(function () {

                Route::get('/', 'index')->name('index');
                Route::get('/transactions/{operatingAccount}', 'show')->name('transactions');
                Route::get('/edit/{operatingAccount}', 'edit')->name('edit');
                Route::post('/store', 'store')->name('store');
                Route::patch('/update/{operatingAccount}', 'update')->name('update');
                Route::post('/delete/{operatingAccount}', 'destroy')->name('delete');

            });


        // Fund Transfer routes
        Route::prefix('transfers')
            ->name('transfers.')
            ->controller(FundTransferController::class)
            ->group(function () {

                Route::get('/', 'index')->name('index');
                Route::get('/transfer', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/edit/{fundTransfer}', 'edit')->name('edit');
                Route::post('/update/{fundTransfer}', 'update')->name('update');
                Route::post('/delete/{fundTransfer}', 'destroy')->name('delete');
                // Route::post('/filter', 'filterTransfers')->name('filter');

            });

            Route::post('/transfers/filter', FilterFundTransferController::class)->name('tranfsers.filter');
    });
