<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>seeDetailReservation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #1965B3;
        }


        .navbar-container {
            width: 100%;
            display: flex;
            justify-content: center;
        }

        .navbar {
            display: flex;
            align-items: center;
            padding: 10px 40px;
            border-radius: 12px;
            background-color: rgba(255, 255, 255, 0.8);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            position: fixed;
        }

        .navbar-logo {
            width: 50px;
            height: auto;
        }


        .navbar ul {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .navbar ul li {
            margin: 0 15px;
        }

        .navbar ul li a {
            text-decoration: none;
            color: #000;
            padding: 10px 20px;
            border-radius: 20px;
            transition: background-color 0.3s, color 0.3s;
        }

        .navbar ul li a:hover {
            color: red;
            background-color: transparent;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 4rem;
        }

        nav a {
            color: #000;
            margin: 0 50px;
            font-family: 'Inika', serif;
            text-decoration: none;
            font-size: 1.3rem;
            font-weight: 500;
        }

        nav a.active {
            color: #3b82f6;
            border-bottom: 2px solid #3b82f6;
        }

        .logo {
            margin: 0 20px;
        }

        .logo img {
            height: 50px;
            width: auto;
            max-height: 100%;
        }

        .container-fluid {
            margin-top: 150px;
        }

        .reservations-img {
            border-radius: 10px;
            width: 100%;
            height: auto;
            max-height: 200px;
            object-fit: cover;
        }

        .card {
            border-radius: 10px;
            overflow: hidden;
        }

        .card-header {
            background-color: #E9ECEF;
        }

        .amenity-icon {
            font-size: 1.5rem;
            margin-right: 10px;
        }

        .amenity {
            display: flex;
            align-items: center;
            font-size: 1rem;
        }

        .stars i {
            margin-right: 3px;
        }

        h4,
        h5,
        p,
        label {
            font-family: 'Inter', sans-serif;
        }

        h4 {
            font-weight: 600;
        }

        h5 {
            font-weight: 500;
        }

        p,
        label {
            font-weight: 400;
        }
    </style>
</head>

<body>
    <div class="navbar-container">
        <nav class="navbar">
            <ul>
                <li><a href="{{ route('home_page') }}">Home</a></li>
                <li><a href="{{ route('accomodation') }}">Accommodation</a></li>
            </ul>
            <img src="{{ asset('img/BLUE.png') }}" alt="Logo Hotel" class="navbar-logo">
            <ul>
                <li><a href="{{ route('special_offers') }}">Special Offers</a></li>
                <li><a href="{{ route('profile') }}">Profile</a></li>
            </ul>
        </nav>
    </div>

    <div class="container-fluid">
        <div class="row">
            <!-- Kolom Profil Pelanggan -->
            <div class="col-md-8">
                <div class="card mb-4">
                    <h4 class="card-header text-left fw-bold">
                        <i class="fa-solid fa-shield"></i>
                        <span style="ms-5">Customer Profile</span>
                    </h4>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label>First name</label>
                                <h5>{{ $user->NamaDepan }}</h5>
                            </div>
                            <div class="col-md-6">
                                <label>Last name</label>
                                <h5>{{ $user->NamaBelakang }}</h5>
                            </div>
                        </div>
                        <label>User ID</label>
                        <h5>{{ $user->IDUser }}</h5>
                    </div>
                </div>

                <!-- Detail Kamar -->
                <div class="card mb-4">
                    <h4 class="card-header text-left fw-bold">
                        <i class="bi bi-door-open-fill"></i>
                        <span style="ms-5">Room Detail</span>
                    </h4>
                    <div class="card-body">
                        <h6 class="fw-bold">Room Description</h6>
                        <p>{{ $room->desc }}</p>
                        <h6 class="fw-bold">Offered Amenities</h6>
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="list-unstyled">
                                    @if (isset($room->amenities_left) && $room->amenities_left->isNotEmpty())
                                        @foreach ($room->amenities_left as $amenity)
                                            <li class="amenity">
                                                <span class="amenity-icon">{{ $amenity->icon }}</span>
                                                {{ $amenity->name }}
                                            </li>
                                        @endforeach
                                    @else
                                        <li>No amenities available</li>
                                    @endif
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="list-unstyled">
                                    @if (isset($room->amenities_right) && $room->amenities_right->isNotEmpty())
                                        @foreach ($room->amenities_right as $amenity)
                                            <li class="amenity">
                                                <span class="amenity-icon">{{ $amenity->icon }}</span>
                                                {{ $amenity->name }}
                                            </li>
                                        @endforeach
                                    @else
                                        <li>No amenities available</li>
                                    @endif
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Kolom Foto Kamar -->
            <div class="col-md-4">
                <div class="card mb-4 p-3">
                    <img src="{{ asset('storage/' . $room->photo) }}" alt="{{ $room->TipeKamar }}" class="img-fluid">
                    <p class="mt-3 mb-1"><strong>{{ $room->name }}</strong></p>
                    <p class="mb-1">Check-in: <strong>{{ $pemesananKamar->TanggalCheckIn }}</strong></p>
                    <p class="mb-1">Check-out: <strong>{{ $pemesananKamar->TanggalCheckOut }}</strong></p>
                    <p class="mb-1">{{ $pemesananKamar->JumlahDewasa }} adult(s), {{ $pemesananKamar->JumlahAnak }}
                        child(ren)</p>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
