<?php

use App\Http\Controllers\Subscription\RegisterSubscriberController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')
    ->group(function () {

        Route::get('/register', function () {
            return view('auth.register');
        })->name('register');

        Route::post('/register-subscriber', RegisterSubscriberController::class)->name('register-subscriber');
});


Route::middleware('auth')
    ->group(function () {

        Route::get('/subscription-expired', function () {

            // dd(Auth::user()->company);
            return view('auth.subscription-expired');
        })->name('subscription');

    });
