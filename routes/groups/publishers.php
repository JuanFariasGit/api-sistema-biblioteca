<?php

use App\Http\Controllers\Publisher\DestroyPublisherController;
use App\Http\Controllers\Publisher\ListPublisherController;
use App\Http\Controllers\Publisher\ShowPublisherController;
use App\Http\Controllers\Publisher\StorePublisherController;
use App\Http\Controllers\Publisher\UpdatePublisherController;
    
    
Route::get('', ListPublisherController::class);
Route::get('{publisher}', ShowPublisherController::class)->middleware('can:own,publisher');
Route::post('', StorePublisherController::class);
Route::put('{publisher}', UpdatePublisherController::class)->middleware('can:own,publisher');
Route::delete('{publisher}', DestroyPublisherController::class)->middleware('can:own,publisher');
