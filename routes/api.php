<?php

use App\Http\Controllers\{
    AuthController,
    BookController,
    BookImagesController,
    LendingController,
    PublisherController,
    ReaderController,
    UserController
};
use App\Http\Middleware\JWTMiddleware;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {

    Route::post('login', [AuthController::class, 'login']);

    Route::middleware(['auth:api', JWTMiddleware::class])->group(function() {
        Route::post('logout', [AuthController::class, 'logout']);
        Route::post('refresh', [AuthController::class, 'refresh']);
        Route::post('me', [AuthController::class, 'me']);
    });
    
});

Route::apiResource('users', UserController::class)
    ->only(['store']);

Route::middleware(['auth:api', JWTMiddleware::class])->group(function() {

    Route::apiResource('publishers', PublisherController::class);
    
    Route::apiResource('books', BookController::class);
    
    Route::apiResource('readers', ReaderController::class);
    
    Route::apiResource('book-images', BookImagesController::class)
        ->only(['store', 'destroy']);
    
    Route::apiResource('lendings', LendingController::class);

});
