<?php

use App\Domain\PrintJobs\Http\Controllers\LargeFormat\FetchLargeFormatJobsController;
use App\Domain\PrintJobs\Http\Controllers\LargeFormat\FilterLargeFormatJobsController;
use App\Domain\PrintJobs\Http\Controllers\LargeFormat\LargeFormatJobController;
use Illuminate\Support\Facades\Route;


// Large Format Jobs
Route::prefix('largeformat')
    ->name('largeformat.')
    ->group(function () {

        Route::controller(LargeFormatJobController::class)
            ->group(function () {

                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::get('/show/{largeFormatJob}', 'show')->name('show');
                Route::post('/store/{customer}', 'store')->name('store');
                Route::get('/edit/{largeFormatJob}', 'edit')->name('edit');
                Route::post('/update/{largeFormatJob}', 'update')->name('update');
                Route::delete('/delete/{largeFormatJob}', 'destroy')->name('delete');
            });

        Route::post('filter', FilterLargeFormatJobsController::class)->name('filter');
        Route::get('get-data', FetchLargeFormatJobsController::class)->name('get-data');

    });
