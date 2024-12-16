<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\PasswordRecoveryController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisterController::class, 'show'])->name('register');
    Route::post('register', [RegisterController::class, 'store']);

    Route::get('login', [AuthController::class, 'show'])->name('login');
    Route::post('login', [AuthController::class, 'store']);

    Route::get('password/recovery', [PasswordRecoveryController::class, 'show'])->name('password.recovery');
    Route::post('password/recovery', [PasswordRecoveryController::class, 'store']);

    Route::get('password/reset/{token}', [PasswordResetController::class, 'show'])->name('password.reset');
    Route::post('password/reset', [PasswordResetController::class, 'store'])->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('dashboard', DashboardController::class)->name('dashboard');

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});
