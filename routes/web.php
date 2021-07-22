<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::middleware(['auth'])->group(function(){
	Route::resource('/product','App\Http\Controllers\ProductController')->names('product');
	// Route::get('/product','App\Http\Controllers\ProductController@index')->name('product.index');
	// Route::post('/product','App\Http\Controllers\ProductController@index')->name('product.index');
});