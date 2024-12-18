<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>seeDetailReservation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('CSS/navbar.css') }}">

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #1965B3;
            color: #333;
        }


        h3,
        h4,
        h5 {
            font-family: 'Lora', serif;
            color: black;
            font-weight: 700;
        }


        p,
        label {
            font-family: 'Roboto', sans-serif;
            font-size: 1rem;
            color: #333;
            line-height: 1.6;
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
                <li><a href="{{ route('home_page') }}"
                        class="{{ request()->routeIs('home_page') ? 'active' : '' }}">Home</a></li>
                <li><a href="{{ route('accomodation') }}"
                        class="{{ request()->routeIs('accomodation') ? 'active' : '' }}">Accommodation</a></li>
            </ul>

            <a href="{{ route('home_page') }}" class="navbar-logo-container">
                <img src="{{ asset('img/BLUE.png') }}" alt="Blue Haven Hotel Logo" class="navbar-logo">
            </a>

            <ul>
                <li><a href="{{ route('special_offers') }}"
                        class="{{ request()->routeIs('special_offers') ? 'active' : '' }}">Special Offers</a></li>
                <li><a href="{{ route('profile') }}"
                        class="{{ request()->routeIs('profile') ? 'active' : '' }}">Profile</a></li>
            </ul>
        </nav>
    </div>

    <div class="container-fluid">
        <div class="row">
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
                        <div class="row">
                            <div class="col-md-6">
                                <label>Phone Number</label>
                                <h5>{{ $user->NoTelepon }}</h5>
                            </div>
                            <div class="col-md-6">
                                <label>Kode Transaksi</label>
                                <h5>{{ $pemesananKamar->transaksi->NoTransaksi }}</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <h4 class="card-header text-left fw-bold">
                        <i class="bi bi-door-open-fill"></i>
                        <span style="ms-5">Room Detail</span>
                    </h4>
                    <div class="card-body">
                        <h5 class="fw-bold">{{ $room->TipeKamar }}</h5>
                        <h6 class="fw-bold">Room Description</h6>
                        <p>{{ $room->Desc }}</p>
                        <h6 class="fw-bold">Offered Amenities</h6>
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="list-unstyled">
                                    @if (!empty($facilities))
                                        @foreach ($facilities as $amenity)
                                            <li class="amenity">
                                                <span class="amenity-icon">✔️</span>
                                                {{ trim($amenity) }}
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

            <div class="col-md-4">
                <div class="card mb-4 p-3">
                    <img src="{{ asset('storage/' . $room->photo) }}" alt="{{ $room->TipeKamar }}" class="img-fluid">
                    <p class="mt-3 mb-1"><strong>{{ $room->name }}</strong></p>
                    <p class="mb-1">Check-in: <strong>{{ $pemesananKamar->TanggalCheckIn }}</strong></p>
                    <p class="mb-1">Check-out: <strong>{{ $pemesananKamar->TanggalCheckOut }}</strong></p>
                    <p class="mb-1">{{ $pemesananKamar->JumlahDewasa }} Orang</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
