<?php

use App\Http\Controllers\Api\Auth\AuthenticatedController;
use App\Http\Controllers\Api\Auth\RegisteredUserController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::post('/register', [RegisteredUserController::class, 'store']);
    Route::post('/tokens/create', [AuthenticatedController::class, 'createToken']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/tokens/remove', [AuthenticatedController::class, 'removeToken']);
    Route::get('/user', [UserController::class, 'getAuthUser']);
    Route::patch('/user', [UserController::class, 'updateAuthUser']);
});
