<?php

use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(base_path('routes/groups/auth.php'));

Route::prefix('users')->group(base_path('routes/groups/users.php'));

Route::middleware('auth:api')->group(function() {

    Route::prefix('publishers')->group(base_path('routes/groups/publishers.php'));

    Route::prefix('books')->group(base_path('routes/groups/books.php'));

    Route::prefix('book-images')->group(base_path('routes/groups/book-images.php'));

    Route::prefix('lendings')->group(base_path('routes/groups/lendings.php'));

    Route::prefix('readers')->group(base_path('routes/groups/readers.php'));
    
});
