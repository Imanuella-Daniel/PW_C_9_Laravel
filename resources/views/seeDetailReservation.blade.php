<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>seeDetailReservation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&family=Merriweather:wght@400;700&display=swap"
        rel="stylesheet">

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



        .navbar-container {
            width: 100%;
            display: flex;
            justify-content: center;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 40px;
            background: rgba(255, 255, 255, 0.95);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            font-family: 'Lora', serif;
            font-weight: 500;
        }

        .navbar-logo {
            width: 50px;
        }

        .navbar ul {
            list-style: none;
            padding: 0;
            display: flex;
            margin: 0;
        }

        .navbar ul li a {
            text-decoration: none;
            color: #000;
            padding: 8px 16px;
            border-radius: 20px;
            transition: color 0.3s ease, background-color 0.3s ease;
        }

        .navbar ul li a:hover {
            color: #FF4081;
        }

        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                align-items: center;
                padding: 10px;
            }

            .navbar ul {
                flex-direction: column;
                text-align: center;
                width: 100%;
            }

            .navbar ul li {
                margin: 8px 0;
            }

            .navbar-logo {
                margin-bottom: 10px;
            }
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
                <li><a href="{{ route('home_page') }}">Home</a></li>
                <li><a href="{{ route('accomodation') }}">Accommodation</a></li>
            </ul>

            <a href="{{ route('home_page') }}">
                <img src="{{ asset('img/BLUE.png') }}" alt="Blue Haven Hotel Logo" class="navbar-logo">
            </a>

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

                <!-- Detail Kamar -->
                <div class="card mb-4">
                    <h4 class="card-header text-left fw-bold">
                        <i class="bi bi-door-open-fill"></i>
                        <span style="ms-5">Room Detail</span>
                    </h4>
                    <div class="card-body">
                        <h5 class="fw-bold">Room Description</h5>
                        <p>{{ $room->Desc }}</p>
                        <h5 class="fw-bold">Facility</h5>
                        @php
                            $facilities = is_string($room->Facility) ? explode(',', $room->Facility) : [];
                        @endphp

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
                    <h3 class="mt-3 mb-1"><strong>{{ $room->TipeKamar }}</strong></h3>
                    <h5 class="mb-1">Check-in: <strong>{{ $pemesananKamar->TanggalCheckIn }}</strong></h5>
                    <h5 class="mb-1">Check-out: <strong>{{ $pemesananKamar->TanggalCheckOut }}</strong></h5>
                    <h5 class="mb-1">{{ $pemesananKamar->JumlahDewasa }} adult(s), {{ $pemesananKamar->JumlahAnak }}
                        child(ren)</h5>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
