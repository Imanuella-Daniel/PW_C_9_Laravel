<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\kamarController;
use App\Http\Controllers\AdminController;

Route::get('/admin/rooms', [AdminController::class, 'rooms'])->name('admin_rooms');
Route::get('/home', [kamarController::class, 'index'])->name('home_page');
Route::get('/', function () {
    return view('login');
});
Route::get('/signup', [AuthController::class, 'showRegistrationForm'])->name('signup');
Route::post('/signup', [AuthController::class, 'register'])->name('signup.submit');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
