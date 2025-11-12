<?php

use App\Http\Controllers\Book\DestroyBookController;
use App\Http\Controllers\Book\ListBookController;
use App\Http\Controllers\Book\ShowBookController;
use App\Http\Controllers\Book\StoreBookController;
use App\Http\Controllers\Book\UpdateBookController;


Route::get('', ListBookController::class);
Route::get('{book}', ShowBookController::class)->middleware('can:own,book');
Route::post('', StoreBookController::class);
Route::put('{book}', UpdateBookController::class)->middleware('can:own,book');
Route::delete('{book}', DestroyBookController::class)->middleware('can:own,book');
