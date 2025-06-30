<?php

use App\Http\Controllers\Central\Tenant\TenantController;
use App\Http\Controllers\Central\User\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('web')->group(function () {
    Route::post('register', [UserController::class, 'register']);
    Route::post('login', [UserController::class, 'login']);

    Route::middleware(['auth:sanctum'])->group(function () {
        Route::apiResource('organizations', TenantController::class);
    });
});
