<?php

use Illuminate\Support\Facades\Route;


Route::prefix('invoices')
    ->name('invoices.')
    ->group(function () {

        require __DIR__ . "/invoice-routes.php";
        require __DIR__ . "/invoice-items-routes.php";

    });
