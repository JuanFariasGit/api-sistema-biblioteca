<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PublisherController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {

    Route::post('login', [AuthController::class, 'login']);

    Route::middleware('auth:api')->group(function() {
        Route::post('logout', [AuthController::class, 'logout']);
        Route::post('refresh', [AuthController::class, 'refresh']);
        Route::post('me', [AuthController::class, 'me']);
    });
    
});

Route::apiResource('publishers', PublisherController::class)->middleware('auth:api');
