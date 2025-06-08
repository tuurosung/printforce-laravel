<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Jobs\JobController;
use App\Http\Controllers\Jobs\AllJobsController;
use App\Http\Controllers\Jobs\PressJobController;
use App\Http\Controllers\Jobs\DesignJobController;
use App\Http\Controllers\Jobs\TodaysJobsController;
use App\Http\Controllers\Jobs\EmbroideryJobController;
use App\Http\Controllers\Jobs\LargeFormatJobController;
use App\Http\Controllers\Jobs\FilterDesignJobsController;
use App\Http\Controllers\Jobs\FilterLargeFormatJobsController;
use App\Http\Controllers\Jobs\FilterPressJobController;

Route::prefix('jobs')
    ->name('jobs.')
    ->group(function () {

        Route::get('/all', AllJobsController::class)->name('all');
        Route::get('/today', TodaysJobsController::class)->name('today');


        // Large Format Jobs
        Route::prefix('large-format')
            ->name('large-format.')
            ->controller(LargeFormatJobController::class)
            ->group(function () {

                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::get('/show/{largeFormatJob}', 'show')->name('show');
                Route::post('/store/{customer}', 'store')->name('store');
                Route::get('/edit/{largeFormatJob}', 'edit')->name('edit');
                Route::post('/update/{largeFormatJob}', 'update')->name('update');
                Route::delete('/delete/{largeFormatJob}', 'destroy')->name('delete');
        });
        Route::post('large-format/filter', FilterLargeFormatJobsController::class)->name('large-format.filter');


        // Embroidery Jobs
        Route::prefix('embroidery')
            ->name('embroidery.')
            ->controller(EmbroideryJobController::class)
            ->group(function () {

                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::get('/show/{embroideryJob}', 'show')->name('show');
                Route::post('/store/{customer}', 'store')->name('store');
                Route::get('/edit/{embroideryJob}', 'edit')->name('edit');
                Route::post('/update/{embroideryJob}', 'update')->name('update');
                Route::delete('/delete/{embroideryJob}', 'destroy')->name('delete');
                Route::post('/filter', 'filterJobs')->name('filter');
        });


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


        // Press Jobs
        Route::prefix('press')
            ->name('press.')
            ->controller(PressJobController::class)
            ->group(function () {

                Route::get('/', 'index')->name('index');
                Route::get('/show/{pressJob}', 'show')->name('show');
                Route::post('/store/{customer}', 'store')->name('store');
                Route::get('/edit/{pressJob}', 'edit')->name('edit');
                Route::post('/update/{pressJob}', 'update')->name('update');
                Route::delete('/delete/{pressJob}', 'destroy')->name('delete');
        });
        Route::get('/press/filter', FilterPressJobController::class)->name('press.filter');
    });
