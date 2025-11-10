<?php

use App\Http\Controllers\Reader\DestroyReaderController;
use App\Http\Controllers\Reader\ListReaderController;
use App\Http\Controllers\Reader\ShowReaderController;
use App\Http\Controllers\Reader\StoreReaderController;
use App\Http\Controllers\Reader\UpdateReaderController;


Route::get('', ListReaderController::class);
Route::get('{reader}', ShowReaderController::class);
Route::post('', StoreReaderController::class);
Route::put('{reader}', UpdateReaderController::class);
Route::delete('{reader}', DestroyReaderController::class);
