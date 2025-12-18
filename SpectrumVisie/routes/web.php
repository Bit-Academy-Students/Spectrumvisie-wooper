<?php

use App\Http\Controllers\AccountStatusController;
use App\Http\Controllers\certificateController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PendingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MateriaalController;
use App\Http\Controllers\OverzichtController;
use App\Http\Middleware\AdminMiddleware;
use App\Models\User;
use App\Models\Certificate;

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

Route::get('/materials/view/{id}', function ($id, OverzichtController $controller) {
    $item = $controller->view($id);

    return view('view', compact('item'));
})->name('materials.view');

Route::get('/materials/download/{id}', [OverzichtController::class, 'download'])
    ->name('materials.download');

Route::get('/stream/{id}', [OverzichtController::class, 'stream'])
    ->name('materials.stream');


Route::get('/', function () {
    return view('home');
});


Route::get('/certficaat', function () {
    return view('Certicate');
});

Route::post('/register', [RegisterController::class, 'Register']);
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/upload', [MateriaalController::class, 'upload'])->middleware(['auth', AdminMiddleware::class])->name('upload.post');
Route::post('/pending/accept/{id}', [PendingController::class, 'AcceptUser'])->name('pending.accept');
Route::post('/pending/reject/{id}', [PendingController::class, 'RejectUser'])->name('pending.reject');
Route::post('/user/deactivate/{id}', [AccountStatusController::class, 'deactivate'])->name('user.deactivate');
Route::post('/user/activate/{id}', [AccountStatusController::class, 'activate'])->name('user.activate');
Route::post('/certificate', [certificateController::class, 'insertCertificate'])->name('insert.certificate');

Route::post('/materials/{id}/access', [MateriaalController::class, 'updateAccess'])->name('materials.access.update');

Route::delete('/materials/{id}', [MateriaalController::class, 'destroy'])->name('materials.destroy');

Route::get('/trainer', function () {
    return view('trainer');
});

Route::get('/about', function () {
    return view('about');
});

Route::delete('/admin/users/{id}', [AccountStatusController::class, 'destroy'])
    ->name('users.destroy')
    ->middleware(AdminMiddleware::class);

Route::get('/admin/dashboard', function (
    MateriaalController $controller,
    PendingController $UserController
) {
    $data         = $controller->showAll();
    $UserData     = $UserController->ShowAllPendingUsers();
    $Users        = User::with('roles')->get();

    return view('Admin_dashboard', compact('data', 'UserData', 'Users'));
})->name('admin.dashboard')->middleware(AdminMiddleware::class);

