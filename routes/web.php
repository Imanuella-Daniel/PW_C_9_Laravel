<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminGuestController;
use App\Http\Controllers\AdminRoomsController;

Route::get('/', function () {
    return view('login');
});

Route::get('admin_guest', [AdminGuestController::class, 'index'])->name('admin_guest');
Route::post('admin_guest', [AdminGuestController::class, 'store'])->name('admin_guest.store');
Route::post('/admin_guest/update/{id}', [AdminGuestController::class, 'update'])->name('admin_guest.update');
Route::delete('/admin_guest/{id}', [AdminGuestController::class, 'destroy'])->name('admin_guest.destroy');

Route::get('/profile', [UserController::class, 'showProfile'])->name('profile');
Route::get('/editProfile', [UserController::class, 'editProfile'])->name('editProfile');
Route::put('/editProfile', [UserController::class, 'updateProfile'])->name('profile.update');

Route::get('/signup', [AuthController::class, 'showRegistrationForm'])->name('signup');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/signup', [AuthController::class, 'register'])->name('signup.submit');

Route::get('/', function () {
    return view('login');
})->name('login');

Route::get('/home_page', function () {
    return view('home_page');
})->name('home_page');

Route::get('/signUP', function () {
    return view('signUP');
})->name('signUP');

Route::get('/payment', function () {
    return view('payment');
})->name('payment');


Route::get('/seeDetailReservation', function () {
    return view('seeDetailReservation');
})->name('seeDetailReservation');

Route::get('/accomodation', function () {
    return view('accomodation');
})->name('accomodation');



Route::get('/special_offers', function () {
    return view('special_offers');
})->name('special_offers');

Route::get('/detail', function () {

    return view('view_detail');
})->name('view_detail');



Route::get('/index', function () {
    return view('index');
});

$rooms = [];



Route::get('/detailmeet', function () {
    return view('meeting', compact('roomMeet'));
})->name('meeting');


Route::get('admin_rooms', [AdminRoomsController::class, 'index'])->name('admin_rooms');
Route::post('admin_rooms', [AdminRoomsController::class, 'store'])->name('admin_rooms.store');
Route::put('admin_rooms/{NoKamar}', [AdminRoomsController::class, 'update'])->name('admin_rooms.update');
Route::delete('/admin/rooms/{NoKamar}', [AdminRoomsController::class, 'destroy'])->name('admin_rooms.destroy');


Route::get('/accomodation', [AdminRoomsController::class, 'accomodation'])->name('accomodation');

Route::get('/available-room', [AdminRoomsController::class, 'showAvailableRooms'])->name('available_room');
Route::get('/room/{NoKamar}', [AdminRoomsController::class, 'show'])->name('room.detail');

Route::get('/booking/{NoKamar}', [TransaksiController::class, 'show'])->name('room_booking');
Route::post('/transaksi/create', [TransaksiController::class, 'createTransaction'])->name('transaksi.create');
