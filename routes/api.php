<?php

use Illuminate\Support\Facades\Route;

use App\Models\{
    Category,
    Field,
    FieldValues
};

Route::resource('/user', App\Http\Controllers\UserController::class);
Route::resource('/product', App\Http\Controllers\ProductController::class);


Route::get('category', function (){
    $values = Category::with('fields.field_values.product')->find(1);
    return $values;
});
