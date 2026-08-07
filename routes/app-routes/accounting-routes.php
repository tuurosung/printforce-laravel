<?php

declare(strict_types=1);

use App\Domain\Accounts\Http\Controllers\FilterFundTransferController;
use App\Domain\Accounts\Http\Controllers\FundTransferController;
use App\Domain\Accounts\Http\Controllers\OperatingAccountController;
use App\Domain\Expenditure\Http\Controllers\ExpenditureController;
use Illuminate\Support\Facades\Route;

Route::resource('operating-accounts', OperatingAccountController::class);
Route::resource('fund-transfers', FundTransferController::class);
Route::resource('expenditure', ExpenditureController::class);
Route::post('fund-transfers/filter', FilterFundTransferController::class)->name('tranfsers.filter');
