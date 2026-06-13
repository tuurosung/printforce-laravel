<?php

use App\Domain\PrintJobs\Http\Controllers\AllJobsController;
use App\Domain\PrintJobs\Http\Controllers\AssignJobController;
use App\Domain\PrintJobs\Http\Controllers\JobStatusController;
use App\Domain\PrintJobs\Http\Controllers\TodaysJobsController;
use App\Domain\PrintJobs\Http\Controllers\ViewJobController;
use Illuminate\Support\Facades\Route;

Route::get('/all', AllJobsController::class)->name('all');
Route::get('/today', TodaysJobsController::class)->name('today');

// View Job
Route::get('/view-job/{jobId}/{jobType}', ViewJobController::class)->name('view-job');

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
