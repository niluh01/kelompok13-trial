<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NovelController;
use App\Http\Controllers\AuthController;

// 🟢 Home (bebas diakses)
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/popular', [HomeController::class, 'popular'])->name('popular');
Route::get('/latest', [HomeController::class, 'latest'])->name('latest');
Route::get('/search', [HomeController::class, 'search'])->name('search');


// 🔐 AUTH (login manual)
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


// 🔐 Harus login (tulis novel)
Route::middleware(['auth'])->group(function () {
    Route::resource('novels', NovelController::class);
});