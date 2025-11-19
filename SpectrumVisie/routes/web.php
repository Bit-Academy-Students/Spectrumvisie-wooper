<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PendingController;
use Illuminate\Support\Facades\Route;

Route::get('/register', function () {
    return view('register');
});


Route::get('/login', function () {
    return view('login');
});


Route::get('/home', function (PendingController $controller) {
    $users = $controller->ShowAllUsers();
    return view('welcome', compact('users'));
});

Route::post('/register', [RegisterController::class, 'Register']);

Route::post('/login', [LoginController::class, 'login']);
