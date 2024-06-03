<?php

use App\Http\Controllers\product_controller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', [product_controller::class, 'index'])->name('products.index');
Route::get('/products/create', [product_controller::class, 'create'])->name('products.create');
Route::post('/products', [product_controller::class, 'store'])->name('products.store');
Route::get('/products/{product}/edit', [product_controller::class, 'edit'])->name('products.edit');
