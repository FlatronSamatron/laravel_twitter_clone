<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

//AUTH
Route::get('/register', [AuthController::class, 'index'])->name('register');
Route::post('/register', [AuthController::class, 'store'])->name('register.store');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'auth'])->name('login.store');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');