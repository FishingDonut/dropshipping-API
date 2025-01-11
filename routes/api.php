<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    UserController,
    ProductController,
    CategoryController,
    FieldController
};

Route::resource('/user', UserController::class);
Route::resource('/product', ProductController::class);
Route::resource('/category', CategoryController::class);
Route::resource('/field', FieldController::class);
