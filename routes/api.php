<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    UserController,
    ProductController,
    CategoryController
};

Route::resource('/user', UserController::class);
Route::resource('/product', ProductController::class);
Route::resource('/category', CategoryController::class);
