<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PendingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MateriaalController;

Route::get('/register', function (RegisterController $controller) {
    $roles = $controller->ShowRole();
    return view('register', compact('roles'));
});


Route::get('/login', function () {
    return view('login');
});

Route::get('/welcome', function () {
    return view('home');
});

Route::get('/trainer', function () {
    return view('trainer');
});
// Route::get('/upload', function (MateriaalController $controller) {
//     $data = $controller->showUploadForm();
//     return view('upload', compact('data'));
// });

Route::get('/upload', function (MateriaalController $controller) {
    $data = $controller->showUploadForm();

    return view('upload', [
        'types' => $data['types'],
        'roles' => $data['roles'],
        'categories' => $data['categories'],
    ]);
});


Route::get('/home', function (PendingController $controller) {
    $users = $controller->ShowAllPendingUsers();
    return view('welcome', compact('users'));
});

Route::post('/register', [RegisterController::class, 'Register']);

Route::post('/login', [LoginController::class, 'login']);
Route::post('/upload', [MateriaalController::class, 'upload'])->name('upload.post');
Route::post('/pending/accept/{id}', [PendingController::class, 'AcceptUser'])->name('pending.accept');
