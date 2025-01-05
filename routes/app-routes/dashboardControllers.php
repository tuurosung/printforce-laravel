<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::prefix('/dashboard')->controller(DashboardController::class)->group(function () {
    Route::get('/', 'index')->name('dashboard');
});
