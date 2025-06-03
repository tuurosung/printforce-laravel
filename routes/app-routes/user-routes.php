<?php

use App\Http\Controllers\Users\ResetPasswordController;
use App\Http\Controllers\Users\UpdatePasswordController;
use App\Http\Controllers\Users\UserController;

Route::prefix('human-resources')
    ->name('human-resources.')
    ->group(function () {

        // users
        Route::prefix('users')
            ->name('users.')
            ->controller(UserController::class)
            ->group(function () {

                Route::get('/', 'index')->name('index');
                Route::get('/edit/{user}', 'edit')->name('edit');
                Route::post('/store', 'store')->name('store');
                Route::post('/update/{user}', 'update')->name('update');
                Route::delete('/delete/{user}', 'destroy')->name('delete');

            });

        Route::get('/users/reset-password/{user}', ResetPasswordController::class)->name('users.reset-password');
        Route::post('/users/update-password/{user}', UpdatePasswordController::class)->name('users.update-password');
    });
