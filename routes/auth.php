<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

///Register
Route::get('/register', [AuthController::class, 'register'])->name('register');

Route::post('/register', [AuthController::class, 'store']);


///Login
Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/login', [AuthController::class, 'authenticate']);


///Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
