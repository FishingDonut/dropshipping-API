<?php

use Illuminate\Support\Facades\Route;

use App\Models\{
    Category,
    Field,
    FieldValues
};

Route::resource('/user', App\Http\Controllers\UserController::class);
Route::resource('/product', App\Http\Controllers\ProductController::class);
