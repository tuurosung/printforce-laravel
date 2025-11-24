<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboards\DashboardController;

Route::get('/dashboard', DashboardController::class)->name('dashboard');
