<?php

use App\Http\Controllers\product_controller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(product_controller::class)->group(function () {
    Route::get('/products', 'index')->name('products.index');
    Route::get('/products/create', 'create')->name('products.create');
    Route::post('/products', 'store')->name('products.store');
    Route::get('/products/{product}/edit', 'edit')->name('products.edit');
    Route::get('/products/{product}/details', 'details')->name('products.details');
    Route::put('/products/{product}', 'update')->name('products.update');
    Route::get('/products/{product}/cart', 'addToCart')->name('products.cart');
    Route::get('/carts', 'getAllCarts')->name('products.carts');
    Route::delete('/products/{product}', 'destroy')->name('products.destroy');
});
