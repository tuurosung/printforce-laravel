<?php

use App\Domain\Customers\Http\Controllers\PrintDebtorsController;
use App\Domain\Customers\Http\Controllers\ViewDebtorsController;
use Illuminate\Support\Facades\Route;

// debtors
Route::prefix('debtors')
    ->name('debtors.')
    ->group(function () {

        Route::get('/view', ViewDebtorsController::class)->name('view');
        Route::get('/print', PrintDebtorsController::class)->name('print');
    });
