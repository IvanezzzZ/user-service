<?php

declare(strict_types=1);

use App\Http\Controllers\Api\Admin\UserController as AdminUserController;
use App\Http\Controllers\Api\Auth\AuthenticatedController;
use App\Http\Controllers\Api\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Api\Auth\NewPasswordController;
use App\Http\Controllers\Api\Auth\PasswordResetLinkController;
use App\Http\Controllers\Api\Auth\RegisteredUserController;
use App\Http\Controllers\Api\Auth\VerifyEmailController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::post('/register', [RegisteredUserController::class, 'store'])
        ->name('register');
    Route::post('/tokens/create', [AuthenticatedController::class, 'createToken'])
        ->name('login');
    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');
    Route::post('/reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/tokens/remove', [AuthenticatedController::class, 'removeToken'])
        ->name('logout');

    Route::controller(UserController::class)->group(function () {
        Route::get('/user', 'getAuthUser');
        Route::patch('/user', 'updateAuthUser');
        Route::get('/users', 'getUsers');
    });

    Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, 'verifyEmail'])
        ->middleware('throttle:6,1')
        ->name('verification.verify');
    Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::middleware('admin')->prefix('admin')->group(function () {
        Route::controller(AdminUserController::class)->prefix('users')->group(function () {
            Route::post('/update-role/{user}', 'updateRole');
        });
    });
});
