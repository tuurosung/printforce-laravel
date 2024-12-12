<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Jobs\PressJobController;
use App\Http\Controllers\Jobs\DesignJobController;
use App\Http\Controllers\Jobs\EmbroideryJobController;
use App\Http\Controllers\Jobs\LargeFormatJobController;

Route::get('/jobs', function () {
    return view('app.job.all-jobs');
})->name('jobs');

Route::prefix('largeformatjobs')->controller(LargeFormatJobController::class)->group(function () {

    Route::get('/', 'index')->name('largeformatjobs');

    Route::get('/new-largeformatjob', 'create')->name('new.largeformatjob');
    Route::get('/view-job-card/{job_id}', 'show')->name('view-largeformat-job');
    Route::post('/store', 'store')->name('store.largeformatjob');
    Route::delete('/delete/{job_id}', 'destroy')->name('delete-largeformat-job');
    Route::post('/filter', 'filterJobs')->name('filter.largeformatjobs');
});


Route::prefix('embroideryjobs')->controller(EmbroideryJobController::class)->group(function () {

    Route::get('/', 'index')->name('embroideryjobs');
    Route::get('/new-embroideryjob', 'create')->name('new.embroideryjob');
    Route::get('/view-job-card/{job_id}', 'show')->name('view-embroidery-job');
    Route::post('/store', 'store')->name('store.embroideryjob');
    Route::delete('/delete/{job_id}', 'destroy')->name('delete-embroidery-job');
});



Route::prefix('designjobs')->controller(DesignJobController::class)->group(function () {

    Route::get('/', 'index')->name('designjobs');
    Route::get('/view-job-card/{job_id}', 'show')->name('view-design-job');
    Route::post('/store', 'store')->name('store.designjob');
    Route::delete('/delete/{job_id}', 'destroy')->name('delete-design-job');
});


Route::prefix('pressjobs')->controller(PressJobController::class)->group(function () {

    Route::get('/', 'index')->name('pressjobs');
    Route::post('/store', 'store')->name('store.pressjob');
});
