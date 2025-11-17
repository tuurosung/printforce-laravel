<?php

use App\Models\Jobs\LargeFormatJob;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Jobs\AllJobsController;
use App\Http\Controllers\Jobs\AssignJobController;
use App\Http\Controllers\Jobs\JobStatusController;
use App\Http\Controllers\Jobs\TodaysJobsController;
use App\Http\Controllers\Jobs\Press\PressJobController;
use App\Http\Controllers\Jobs\Design\DesignJobController;
use App\Http\Controllers\Jobs\Press\FilterPressJobController;
use App\Http\Controllers\Jobs\Design\FilterDesignJobsController;
use App\Http\Controllers\Jobs\Embroidery\EmbroideryJobController;
use App\Http\Controllers\Jobs\LargeFormat\LargeFormatJobController;
use App\Http\Controllers\Jobs\Embroidery\FetchEmbroideryJobsController;
use App\Http\Controllers\Jobs\Embroidery\FilterEmbroideryJobsController;
use App\Http\Controllers\Jobs\LargeFormat\FetchLargeFormatJobsController;
use App\Http\Controllers\Jobs\LargeFormat\FilterLargeFormatJobsController;

Route::prefix('jobs')
    ->name('jobs.')
    ->group(function () {

        Route::get('/all', AllJobsController::class)->name('all');
        Route::get('/today', TodaysJobsController::class)->name('today');


        // Large Format Jobs
        Route::prefix('largeformat')
            ->name('largeformat.')
            ->group(function () {

                Route::controller(LargeFormatJobController::class)
                    ->group(function (){
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


        // Embroidery Jobs
        Route::prefix('embroidery')
            ->name('embroidery.')
            ->group(function () {

                Route::controller(EmbroideryJobController::class)
                    ->group(function () {

                        Route::get('/', 'index')->name('index');
                        Route::get('/create', 'create')->name('create');
                        Route::get('/show/{embroideryJob}', 'show')->name('show');
                        Route::post('/store/{customer}', 'store')->name('store');
                        Route::get('/edit/{embroideryJob}', 'edit')->name('edit');
                        Route::post('/update/{embroideryJob}', 'update')->name('update');
                        Route::delete('/delete/{embroideryJob}', 'destroy')->name('delete');
                    });

                Route::post('filter', FilterEmbroideryJobsController::class)->name('filter');
                Route::get('get-data', FetchEmbroideryJobsController::class)->name('get-data');
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


        Route::prefix('assign-job')
            ->name('assign-job.')
            ->controller(AssignJobController::class)
            ->group(function () {

                Route::get('/load-assign-job/{job_id}/{category_id}', 'load')->name('load');
                Route::post('/assign-job-to-user', 'assign')->name('assign-to-user');

            });

        Route::prefix('job-status')
            ->name('job-status.')
            ->controller(JobStatusController::class)
            ->group(function () {

                Route::get('/load/{job_id}/{category_id}', 'load')->name('load');
                Route::post('/update', 'update')->name('update');

            });
    });
