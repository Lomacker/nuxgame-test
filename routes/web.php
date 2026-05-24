<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AccessPageController;
use App\Http\Controllers\LuckyController;

Route::get('/', [RegisterController::class, 'index']);

Route::post('/register', [RegisterController::class, 'store']);

Route::get('/a/{token}', [AccessPageController::class, 'show'])
    ->name('access.show');

Route::post('/a/{token}/regenerate', [AccessPageController::class, 'regenerate'])
    ->name('access.regenerate');

Route::post('/a/{token}/deactivate', [AccessPageController::class, 'deactivate'])
    ->name('access.deactivate');

Route::post('/a/{token}/lucky', [LuckyController::class, 'play'])
    ->name('lucky.play');

Route::get('/a/{token}/history', [LuckyController::class, 'history'])
    ->name('lucky.history');
