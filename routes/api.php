<?php

use App\Models\{
    Phone,
    User,
    Adress,
    Pokemon
};
use Illuminate\Support\Facades\Route;

Route::resource('/user', App\Http\Controllers\UserController::class);
Route::resource('/product', App\Http\Controllers\ProductController::class);

Route::get('/adress/{id?}', function($id=1){
    // Adress::create(["user_id" => $id, "pais" => "russian", "estado" => "SC", "cidade" => "belem"]);
    // Phone::create(["adress_id" => $id, "phone" => 991112]);
    return User::find($id)->adress->first()->phone->first();
});

Route::get('/pokemon/user/{id?}', function($id=1){
    return User::find($id)->pokemons;
});

Route::get('/pokemon/user/{id?}/{name?}', function($id=1, $name='pikachu'){
    $user = User::find($id)->pokemons()->create(["name" => $name]);

    return $user->refresh();
});

Route::get('/pokemon/{id?}', function($id=1){
    return Pokemon::find($id)->user;
});
