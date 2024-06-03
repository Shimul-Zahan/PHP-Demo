<?php

use App\Http\Controllers\product_controller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products/create', [product_controller:: class, 'create'])-> name('products.create');
