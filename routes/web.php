<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminGuestController;
use App\Http\Controllers\AdminRoomsController;
use App\Http\Controllers\AdminFacilityController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\AccommodationController;
use App\Http\Controllers\TransaksiFasilitasController;

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
Route::get('/available-room', [AdminRoomsController::class, 'showAvailableRooms'])->name('available_room');
Route::get('/accomodation', [AdminRoomsController::class, 'accommodation'])->name('accomodation');
Route::get('/admin_guest', [AdminGuestController::class, 'index'])->name('admin_guest');
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

Route::prefix('fasilitas')->name('fasilitas.')->group(function () {
    Route::get('/', [FasilitasController::class, 'index'])->name('index');
    Route::get('/create', [FasilitasController::class, 'create'])->name('create');
    Route::post('/', [FasilitasController::class, 'store'])->name('store');
    Route::get('/{fasilitas}/edit', [FasilitasController::class, 'edit'])->name('edit');
    Route::put('/{fasilitas}', [FasilitasController::class, 'update'])->name('update');
    Route::delete('/{fasilitas}', [FasilitasController::class, 'destroy'])->name('destroy');
});

Route::get('/accomodation', [AccommodationController::class, 'index'])->name('accomodation');
Route::get('/facility_details/{IDFasilitas}', [AdminFacilityController::class, 'show'])->name('facility_details');
Route::get('/facility-booking/{IDFasilitas}', [TransaksiFasilitasController::class, 'show'])->name('facility_booking');
Route::post('/facility/create', [TransaksiFasilitasController::class, 'createTransaction'])->name('facility.create');
Route::post('/create-facility-transaction', [TransaksiFasilitasController::class, 'createTransaction'])->name('create_facility_transaction');
Route::get('/facility/{IDFasilitas}', [FasilitasController::class, 'showFacilityDetail'])
    ->name('facility.facility_detail');
