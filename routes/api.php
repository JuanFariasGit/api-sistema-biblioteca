<?php

use App\Http\Controllers\{
    AuthController,
    BookController,
    BookImagesController,
    LendingController,
    PublisherController,
    ReaderController
};
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

Route::apiResource('books', BookController::class)->middleware('auth:api');

Route::apiResource('readers', ReaderController::class)->middleware('auth:api');

Route::apiResource('book-images', BookImagesController::class)
    ->only(['store', 'destroy'])
    ->middleware('auth:api');

Route::apiResource('lendings', LendingController::class)
    ->only(['store', 'destroy'])
    ->middleware('auth:api');
