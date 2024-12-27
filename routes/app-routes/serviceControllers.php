<?php

use App\Http\Controllers\Services\ServiceController;


// Services Routing
Route::prefix('services')->controller(ServiceController::class)->group(function () {

    // index
    Route::get('/', 'index')->name('services');

    // create new service
    Route::post('/create', 'store')->name('create-service');

    // edit service
    Route::get('/edit/{service_id}', 'edit')->name('edit-service');

    // update service
    Route::post('/update', 'update')->name('update-service');

    // delete service
    Route::delete('/delete/{service_id}', 'destroy')->name('delete-service');
});
