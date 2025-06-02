<?php

use App\Http\Controllers\Services\FilterPrintServicesController;
use App\Http\Controllers\Services\PrintServiceController;
use App\Http\Controllers\Services\PrintServiceCostController;

Route::prefix('configuration')
    ->name('configuration.')
    ->group(function (){

        Route::prefix('print-services')
            ->name('print-services.')
            ->controller(PrintServiceController::class)
            ->group(function (){

                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/edit/{printService}', 'edit')->name('edit');
                Route::post('/update/{printService}', 'update')->name('update');
                Route::delete('/delete/{printService}', 'destroy')->name('delete');


            });


            Route::prefix('print-services')
                ->name('print-services.')
                ->group(function () {
                    Route::get('/get-service-cost/{serviceId}', PrintServiceCostController::class)->name('get-service-cost');
                    Route::get('/filter/{searchTerm}', FilterPrintServicesController::class)->name('filter');
                });

    });
