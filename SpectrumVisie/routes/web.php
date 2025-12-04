<?php

use App\Http\Controllers\AccountStatusController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PendingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MateriaalController;
use App\Http\Controllers\OverzichtController;
use App\Http\Middleware\AdminMiddleware;

Route::get('/register', function (RegisterController $controller) {
    $roles = $controller->ShowRole();
    return view('register', compact('roles'));
})->middleware("guest");

Route::get('/login', function () {
    return view('login');
})->middleware("guest");


Route::get('/upload', function (MateriaalController $controller) {
    $data = $controller->showAll();

    return view('upload', compact('data'));
});


Route::get('/platform', function (MateriaalController $controller) {
    $data = $controller->showAll();

    return view('platform', compact('data'));
});

Route::get('/category/{id}', function ($id, OverzichtController $controller) {
    $data = $controller->showCategory($id);

    return view('category', compact('data'));
});

Route::get('/materials/view/{id}', [OverzichtController::class, 'view'])
    ->name('materials.view');

Route::get('/materials/download/{id}', [OverzichtController::class, 'download'])
    ->name('materials.download');

Route::get('/', function () {
    return view('home');
});

Route::post('/register', [RegisterController::class, 'Register']);
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/upload', [MateriaalController::class, 'upload'])->name('upload.post');
Route::post('/pending/accept/{id}', [PendingController::class, 'AcceptUser'])->name('pending.accept');
Route::post('/pending/reject/{id}', [PendingController::class, 'RejectUser'])->name('pending.reject');
Route::post('/user/deactivate/{id}', [AccountStatusController::class, 'deactivate'])->name('user.deactivate');
Route::post('/user/activate/{id}', [AccountStatusController::class, 'activate'])->name('user.deactivate');

Route::get('/admin/dashboard', function (MateriaalController $controller, PendingController $UserController) {
    $data = $controller->showAll();
    $UserData = $UserController->ShowAllPendingUsers();

    return view('Admin_dashboard', compact('data', 'UserData'));
})->name('admin.dashboard')->middleware(AdminMiddleware::class);
