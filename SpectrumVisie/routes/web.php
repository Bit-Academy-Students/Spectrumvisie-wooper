<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PendingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MateriaalController;
use App\Http\Controllers\OverzichtController;

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

Route::get('/upload', function (MateriaalController $controller) {
    $data = $controller->showAll();

    return view('upload', [
        'types' => $data['types'],
        'roles' => $data['roles'],
        'categories' => $data['categories'],
    ]);
});

Route::get('/platform', function (MateriaalController $controller) {
    $data = $controller->showAll();

    return view('platform', compact('data'));
});

Route::get('/category/{id}', function ($id, OverzichtController $controller) {
    $data = $controller->showCategory($id);

    return view('category', [
        'category' => $data['category'],
        'materiaal' => $data['materiaal'],
    ]);
});

Route::get('/materials/view/{id}', [OverzichtController::class, 'view'])
    ->name('materials.view');

Route::get('/materials/download/{id}', [OverzichtController::class, 'download'])
    ->name('materials.download');

Route::get('/home', function (PendingController $controller) {
    $users = $controller->ShowAllPendingUsers();
    return view('welcome', compact('users'));
});

Route::post('/register', [RegisterController::class, 'Register']);
Route::post('/login', [LoginController::class, 'login']);
Route::post('/upload', [MateriaalController::class, 'upload'])->name('upload.post');
Route::post('/pending/accept/{id}', [PendingController::class, 'AcceptUser'])->name('pending.accept');
Route::post('/pending/reject/{id}', [PendingController::class, 'RejectUser'])->name('pending.reject');
