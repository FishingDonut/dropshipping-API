<?php

use App\Models\{
    Phone,
    User,
    Adress
};
use Illuminate\Support\Facades\Route;

Route::resource('/user', App\Http\Controllers\UserController::class);
Route::resource('/product', App\Http\Controllers\ProductController::class);

Route::get('/adress/{id?}', function($id=1){
    // Adress::create(["user_id" => $id, "pais" => "russian", "estado" => "SC", "cidade" => "belem"]);
    // Phone::create(["adress_id" => $id, "phone" => 991112]);
    return User::find($id)->adress->first()->phone->first();
});
