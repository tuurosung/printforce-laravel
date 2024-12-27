<?php

use App\Http\Controllers\Users\UserController;

Route::prefix('users')->controller(UserController::class)->group(function () {

    Route::get('/', 'index')->name('users');
    Route::get('/edit/{user_id}', 'edit')->name('edit-user');
    Route::post('/store', 'store')->name('create-user');
});
