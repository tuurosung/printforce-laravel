<?php

use App\Http\Controllers\Jobs\EmbroideryJobController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Jobs\LargeFormatJobController;

Route::get('/jobs', function () {
    return view('app.job.all-jobs');
})->name('jobs');

Route::prefix('largeformatjobs')->controller(LargeFormatJobController::class)->group(function () {

    Route::get('/', 'index')->name('largeformatjobs');
    Route::get('/new-largeformatjob', 'create')->name('new.largeformatjob');
    Route::post('/store', 'store')->name('store.largeformatjob');
});

Route::prefix('embroiderjobs')->controller(EmbroideryJobController::class)->group(function () {

    Route::get('/', 'index')->name('embroiderjobs');
    Route::get('/new-embroideryjob', 'create')->name('new.embroideryjob');
    Route::post('/store', 'store')->name('store.embroideryjob');
});
