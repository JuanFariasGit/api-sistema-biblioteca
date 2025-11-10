<?php

use App\Http\Controllers\Lending\DestroyLendingController;
use App\Http\Controllers\Lending\ListLendingController;
use App\Http\Controllers\Lending\ShowLendingController;
use App\Http\Controllers\Lending\StoreLendingController;
use App\Http\Controllers\Lending\UpdateLendingController;

Route::get('', ListLendingController::class);
Route::get('{lending}', ShowLendingController::class);
Route::post('', StoreLendingController::class);
Route::put('{lending}', UpdateLendingController::class);
Route::delete('{lending}', DestroyLendingController::class);
