<?php

use App\Http\Controllers\Reader\DestroyReaderController;
use App\Http\Controllers\Reader\ListReaderController;
use App\Http\Controllers\Reader\ShowReaderController;
use App\Http\Controllers\Reader\StoreReaderController;
use App\Http\Controllers\Reader\UpdateReaderController;


Route::get('', ListReaderController::class);
Route::get('{reader}', ShowReaderController::class)->middleware('can:own,reader');
Route::post('', StoreReaderController::class);
Route::put('{reader}', UpdateReaderController::class)->middleware('can:own,reader');
Route::delete('{reader}', DestroyReaderController::class)->middleware('can:own,reader');
