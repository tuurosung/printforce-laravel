<?php

use App\Http\Controllers\Users\ResetPasswordController;
use App\Http\Controllers\Users\UpdatePasswordController;
use App\Http\Controllers\Users\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix("hr")
    ->name("hr.")
    ->group(function () {

        Route::prefix("users/password")
            ->name("users.password.")
            ->group(function () {

                Route::get("/reset/{user}", ResetPasswordController::class)->name("reset");
                Route::post("/update", UpdatePasswordController::class)->name("update");
            });

        Route::resource("users", UserController::class);

    });

