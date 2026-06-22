<?php

use App\Http\Controllers\LandingController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index'])->name('home');

// Прийом заявки: не більше 6 спроб за хвилину з однієї IP — захист від спаму/флуду.
Route::post('/order', [OrderController::class, 'store'])
    ->middleware('throttle:6,1')
    ->name('order.store');
