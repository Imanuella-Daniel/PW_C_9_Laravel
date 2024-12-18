<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

-   [Simple, fast routing engine](https://laravel.com/docs/routing).
-   [Powerful dependency injection container](https://laravel.com/docs/container).
-   Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
-   Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
-   Database agnostic [schema migrations](https://laravel.com/docs/migrations).
-   [Robust background job processing](https://laravel.com/docs/queues).
-   [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

-   **[Vehikl](https://vehikl.com/)**
-   **[Tighten Co.](https://tighten.co)**
-   **[WebReinvent](https://webreinvent.com/)**
-   **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
-   **[64 Robots](https://64robots.com)**
-   **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
-   **[Cyber-Duck](https://cyber-duck.co.uk)**
-   **[DevSquad](https://devsquad.com/hire-laravel-developers)**
-   **[Jump24](https://jump24.co.uk)**
-   **[Redberry](https://redberry.international/laravel/)**
-   **[Active Logic](https://activelogic.com)**
-   **[byte5](https://byte5.de)**
-   **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

Kelas C Kelompok 9 Hotel

Anggota Kelompok:
• Christophorus Raditya Bagas Putra Indrasmoro (220711620) - backend pemesanaFasilitas
• Andreas Kuncoro Adi Nugroho (220711788) – merapihkan frontend
• Imanuella Daniel (220711901) backend, frontend dan integrasi
Username & Password Login

Login User
Bisan mendaftarkan akun, lalu dapat login menggunakan username dan password yang telah dibuat, contoh
• Username: Ella123
• Password: 123456789
Login Admin
• Username: Admin
• Password: admin

Bonus yang diambil
Router API

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
