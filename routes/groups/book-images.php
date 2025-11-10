<?php

use App\Http\Controllers\BookImages\DestroyBookImagesController;
use App\Http\Controllers\BookImages\StoreBookImagesController;

Route::post('', StoreBookImagesController::class);
Route::delete('{bookImages}', DestroyBookImagesController::class);
