<?php

use App\Http\Controllers\Book\DestroyBookController;
use App\Http\Controllers\Book\ListBookController;
use App\Http\Controllers\Book\ShowBookController;
use App\Http\Controllers\Book\StoreBookController;
use App\Http\Controllers\Book\UpdateBookController;


Route::get('', ListBookController::class);
Route::get('{book}', ShowBookController::class);
Route::post('', StoreBookController::class);
Route::put('{book}', UpdateBookController::class);
Route::delete('{book}', DestroyBookController::class);
