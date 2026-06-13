<?php

use App\Domain\PrintJobs\Http\Controllers\Embroidery\EmbroideryJobController;
use App\Domain\PrintJobs\Http\Controllers\Embroidery\FetchEmbroideryJobsController;
use App\Domain\PrintJobs\Http\Controllers\Embroidery\FilterEmbroideryJobsController;
use Illuminate\Support\Facades\Route;

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
