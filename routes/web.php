<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminGuestController;
use App\Http\Controllers\AdminRoomsController;

Route::get('/', function () {
    return view('login');
});
Route::get('admin_rooms', [AdminRoomsController::class, 'index'])->name('admin_rooms');
Route::post('admin_rooms', [AdminRoomsController::class, 'store'])->name('admin_rooms.store');
Route::put('admin_rooms/{NoKamar}', [AdminRoomsController::class, 'update'])->name('admin_rooms.update');
Route::delete('/admin/rooms/{NoKamar}', [AdminRoomsController::class, 'destroy'])->name('admin_rooms.destroy');
Route::get('/available-room', [AdminRoomsController::class, 'showAvailableRooms'])->name('available_room');
Route::get('/room/{NoKamar}', [AdminRoomsController::class, 'show'])->name('room.detail');
Route::get('/booking/{NoKamar}', [TransaksiController::class, 'show'])->name('room_booking');
Route::post('/transaksi/create', [TransaksiController::class, 'createTransaction'])->name('transaksi.create');
Route::get('/accomodation', [AdminRoomsController::class, 'accommodation'])->name('accomodation');
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
Route::get('/seeDetailReservation/{IDPesanan}', [UserController::class, 'seeDetailReservation'])->name('seeDetailReservation');

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

Route::post('/admin_rooms/add', function (Request $request) use (&$rooms) {
    return redirect()->route('admin_rooms');
});

Route::post('/admin_rooms/edit', function (Request $request) use (&$rooms) {
    return redirect()->route('admin_rooms');
});

Route::delete('/admin_rooms/delete/{number}', function ($number) use (&$rooms) {
    $rooms = array_filter($rooms, function ($room) use ($number) {
        return $room['number'] !== $number;
    });

    return redirect()->route('admin_rooms')->with('success', 'Room deleted successfully.');
});


Route::get('/detailmeet', function () {
    return view('meeting', compact('roomMeet'));
})->name('meeting');


Route::get('admin_rooms', [AdminRoomsController::class, 'index'])->name('admin_rooms');
Route::post('admin_rooms', [AdminRoomsController::class, 'store'])->name('admin_rooms.store');
Route::post('admin_rooms/{id}', [AdminRoomsController::class, 'update'])->name('admin_rooms.update');
Route::delete('/admin/rooms/{NoKamar}', [AdminRoomsController::class, 'destroy'])->name('admin_rooms.destroy');


Route::prefix('kamar')->name('kamar.')->group(function () {
    Route::get('/', [KamarController::class, 'index'])->name('index');
    Route::get('/create', [KamarController::class, 'create'])->name('create');
    Route::post('/', [KamarController::class, 'store'])->name('store');
    Route::get('/{kamar}/edit', [KamarController::class, 'edit'])->name('edit');
    Route::put('/{kamar}', [KamarController::class, 'update'])->name('update');
    Route::delete('/{kamar}', [KamarController::class, 'destroy'])->name('destroy');
});

Route::get('/accomodation', [KamarController::class, 'accomodationPage'])->name('accomodation');
Route::get('/available_room', [KamarController::class, 'availableRoomsPage'])->name('available_room');
Route::get('/room_booking/{id}', [KamarController::class, 'showBookingPage'])->name('room_booking');