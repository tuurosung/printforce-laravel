<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Accounting\ExpenditureController;
use App\Http\Controllers\Accounting\FilterFundTransferController;
use App\Http\Controllers\Accounting\FundTransferController;
use App\Http\Controllers\Accounting\OperatingAccountController;

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


        // Expenditure routes
        Route::prefix('expenditure')
            ->name('expenditure.')
            ->controller(ExpenditureController::class)
            ->group(function () {

                Route::get('/', 'index')->name('index');
                Route::get('/edit/{expenditure}', 'edit')->name('edit');
                Route::post('/update/{expenditure}', 'update')->name('update');
                Route::post('/store', 'store')->name('store');
                Route::post('/delete/{expenditure}', 'destroy')->name('delete');
                Route::post('/filter', 'filterExpenditure')->name('filter');

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
