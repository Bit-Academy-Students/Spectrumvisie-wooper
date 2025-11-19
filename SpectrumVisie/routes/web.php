<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('register');
});

Route::post('/register', [RegisterController::class, 'Register']);

Route::get('/login', function () {
    return view('login');
});
