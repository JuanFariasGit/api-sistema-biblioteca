<?php

use App\Http\Controllers\Auth\LoginAuthController;
use App\Http\Controllers\Auth\LogoutAuthController;
use App\Http\Controllers\Auth\RefreshTokenAuthController;
use App\Http\Controllers\Auth\ShowUserAuthController;

Route::post('login', LoginAuthController::class);
Route::post('refresh', RefreshTokenAuthController::class);

Route::middleware('auth:api')->group(function () {
    Route::post('logout', LogoutAuthController::class);
    Route::post('me', ShowUserAuthController::class);
});
