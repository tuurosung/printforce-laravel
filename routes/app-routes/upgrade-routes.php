<?php

use App\Http\Controllers\DbUpgradeController;

Route::prefix('upgrade')
    ->name('upgrade.')
    ->group(function () {

        Route::get('/db', DbUpgradeController::class)->name('db');

    });
