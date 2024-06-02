<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('php', PostController::class);
Route::get('php', function () {
    return view('layouts.layout');
});
