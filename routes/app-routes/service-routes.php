<?php

use App\Domain\PrintServices\Http\Controllers\FilterPrintServicesController;
use App\Domain\PrintServices\Http\Controllers\PrintServiceController;
use App\Domain\PrintServices\Http\Controllers\PrintServiceCostController;
use Illuminate\Support\Facades\Route;

Route::prefix('print-services')
    ->name('print-services.')
    ->group(function () {

        Route::get('{serviceId}/cost', PrintServiceCostController::class)->name("cost");
        Route::get('{searchTerm}/filter', FilterPrintServicesController::class)->name('filter');

    });


Route::resource('print-services', PrintServiceController::class)
    ->parameter('print-services', 'printService');

