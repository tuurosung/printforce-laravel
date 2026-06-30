<?php

use Illuminate\Support\Facades\Route;


Route::prefix('suppliers')
    ->name('suppliers.')
    ->group(function () {

        require __DIR__ . "/supplier-routes.php";

    });
