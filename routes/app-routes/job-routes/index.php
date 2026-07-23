<?php

use App\Domain\PrintJobs\Http\Controllers\OtherJobController;
use App\Domain\PrintJobs\Http\Controllers\PrintJobController;
use Illuminate\Support\Facades\Route;



Route::prefix('print-jobs')
    ->name('print-jobs.')
    ->controller(PrintJobController::class)
    ->group(function(){

        Route::post('store/{customer}', 'store')->name('store');
        Route::delete('delete/{printforceJob}', 'destroy')->name('delete');
    });

Route::prefix('jobs')
    ->name('jobs.')
    ->group(function () {

        require __DIR__ . "/misc-routes.php";




    });
