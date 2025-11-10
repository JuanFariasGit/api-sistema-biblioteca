<?php

use App\Http\Controllers\Publisher\DestroyPublisherController;
use App\Http\Controllers\Publisher\ListPublisherController;
use App\Http\Controllers\Publisher\ShowPublisherController;
use App\Http\Controllers\Publisher\StorePublisherController;
use App\Http\Controllers\Publisher\UpdatePublisherController;
    
    
Route::get('', ListPublisherController::class);
Route::get('{publisher}', ShowPublisherController::class);
Route::post('', StorePublisherController::class);
Route::put('{publisher}', UpdatePublisherController::class);
Route::delete('{publisher}', DestroyPublisherController::class);
