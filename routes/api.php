<?php

use Illuminate\Support\Facades\Route;

Route::resource('/user', App\Http\Controllers\UserController::class);
Route::resource('/product', App\Http\Controllers\ProductController::class);
