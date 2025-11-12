<?php

use App\Http\Controllers\Lending\DestroyLendingController;
use App\Http\Controllers\Lending\ListLendingController;
use App\Http\Controllers\Lending\ShowLendingController;
use App\Http\Controllers\Lending\StoreLendingController;
use App\Http\Controllers\Lending\UpdateLendingController;

Route::get('', ListLendingController::class);
Route::get('{lending}', ShowLendingController::class)->middleware('can:own,lending');
Route::post('', StoreLendingController::class);
Route::put('{lending}', UpdateLendingController::class)->middleware('can:own,lending');
Route::delete('{lending}', DestroyLendingController::class)->middleware('can:own,lending');
