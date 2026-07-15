<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;



Route::prefix('auth')->name('auth.')->group(function () {

    Route::middleware('guest:web')->group(function () {

        Route::controller(RegisterController::class)
            ->prefix('register')
            ->name('register.')
            ->group(function () {

                Route::get('/', 'index')->name('index');
                Route::post('/', 'post')->name('post');

            });

        Route::controller(LoginController::class)
            ->prefix('login')
            ->name('login.')
            ->group(function () {

                Route::get('/', 'index')->name('index');
                Route::post('/', 'post')->name('post');

            });

    });


        Route::get('logout', [LogoutController::class, 'index'])->middleware('auth:web')
            ->name('logout');



});
