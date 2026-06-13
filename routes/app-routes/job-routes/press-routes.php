<?php

use App\Domain\PrintJobs\Http\Controllers\Press\FilterPressJobController;
use App\Domain\PrintJobs\Http\Controllers\Press\PressJobController;
use Illuminate\Support\Facades\Route;


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
