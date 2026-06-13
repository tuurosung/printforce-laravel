<?php

use App\Domain\PrintJobs\Http\Controllers\Design\DesignJobController;
use App\Domain\PrintJobs\Http\Controllers\Design\FilterDesignJobsController;
use Illuminate\Support\Facades\Route;

// Design Jobs
Route::prefix('design')
    ->name('design.')
    ->controller(DesignJobController::class)
    ->group(function () {

        Route::get('/', 'index')->name('index');
        Route::get('/show/{designJob}', 'show')->name('show');
        Route::post('/store/{customer}', 'store')->name('store');
        Route::get('/edit/{designJob}', 'edit')->name('edit');
        Route::post('/update/{designJob}', 'update')->name('update');
        Route::delete('/delete/{designJob}', 'destroy')->name('delete');
        // Route::post('/filter', 'filterJobs')->name('filter');
    });
Route::post('design/filter', FilterDesignJobsController::class)->name('design.filter');
