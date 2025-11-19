<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MateriaalController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/upload', [MateriaalController::class, 'showUploadForm'])->name('upload.form');
Route::post('/upload', [MateriaalController::class, 'upload'])->name('upload.post');
