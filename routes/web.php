<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return [
        'status' => 'api online'
    ];
});

Route::get('/login', function () {
    return null;
})->name('login');
