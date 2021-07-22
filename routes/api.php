<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Route::get('/users','App\Http\Controllers\Api\UsersController@index')->name('api.users.index');
// Route::post('/users','App\Http\Controllers\Api\UsersController@store')->name('api.users.store');
// Route::get('/users/{id}','App\Http\Controllers\Api\UsersController@show')->name('api.users.show');
// Route::put('/users/{id}','App\Http\Controllers\Api\UsersController@update')->name('api.users.update');
// Route::delete('/users/{id}','App\Http\Controllers\Api\UsersController@destroy')->name('api.users.destroy');

Route::apiResource('/users','App\Http\Controllers\Api\UsersController'); // semua method

Route::post('/carts','App\Http\Controllers\Api\CartController@store');
Route::post('/checkout','App\Http\Controllers\Api\TransactionController@store')->name('api.checkout.store');

// Route::apiResource('/products','App\Http\Controllers\Api\UsersController')->only(['store']); // semua method