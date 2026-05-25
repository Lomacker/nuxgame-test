<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AccessPageController;
use App\Http\Controllers\LuckyController;

Route::get('/', [RegisterController::class, 'index']);

Route::post('/register', [RegisterController::class, 'store']);

Route::prefix('access/{token}')
    ->group(function () {

        Route::get('/', [AccessPageController::class, 'show'])
            ->name('access.show');

        Route::post('/regenerate', [AccessPageController::class, 'regenerate'])
            ->name('access.regenerate');

        Route::post('/deactivate', [AccessPageController::class, 'deactivate'])
            ->name('access.deactivate');

        Route::post('/lucky', [LuckyController::class, 'play'])
            ->name('lucky.play');

        Route::get('/history', [LuckyController::class, 'history'])
            ->name('lucky.history');
    });
