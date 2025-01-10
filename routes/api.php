<?php

use App\Models\{
    User,
    Pokemon,
    Badge
};
use Illuminate\Support\Facades\Route;

Route::resource('/user', App\Http\Controllers\UserController::class);
Route::resource('/product', App\Http\Controllers\ProductController::class);

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

Route::get('/user/badges/{id?}', function($id=1){
    return User::find($id)->badges;
});

Route::get('/badge/users/{id?}', function($id=1){
    return Badge::find($id)->users;
});
