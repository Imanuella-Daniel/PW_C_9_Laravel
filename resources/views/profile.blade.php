<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BlueHaven Profile</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('CSS/navbar.css') }}">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #1965B3;
        }

        .logo {
            margin: 0 20px;
        }

        .logo img {
            height: 50px;
            width: auto;
            max-height: 100%;
        }

        .container-fluid {
            margin-top: 100px;
            display: flex;
            flex-wrap: wrap;
        }

        .sidebar-wrapper {
            flex: 0 0 250px;
        }

        .sidebar {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            margin-bottom: 20px;
        }

        .profile-pic {
            width: 100px;
            height: 100px;
            background-color: #d9d9d9;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 10px;
        }

        .profile-pic i {
            font-size: 50px;
            color: #a6a6a6;
        }

        .confirmed {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 5px;
        }

        .confirmed i {
            color: #4CAF50;
            margin-right: 5px;
        }

        .content {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            flex-grow: 1;
            margin-left: 20px;
        }

        .form-section h1 {
            font-size: 24px;
            color: #333;
        }

        .form-section p {
            font-size: 12px;
            color: #999;
        }

        .form-section .btn {
            width: 100%;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        .edit-btn,
        .btn-sm {
            background-color: #F72585;
            color: #fff;
        }

        .logout-btn{
            background-color:rgb(227, 18, 18);
            color: #fff;
        }

        label {
            opacity: 0.7;
            font-size: 12px;
            text-align: left;
            display: block;
        }

        .reservations-card {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
        }

        .reservations-card img {
            border-radius: 10px;
            width: 100%;
            max-height: 150px;
            object-fit: cover;
        }

        .reservations-card button {
            background-color: #F72585;
            color: #fff;
        }

        footer {
            text-align: center;
            padding: 20px 0;
            background-color: #1965B3;
            color: #fff;
            position: relative;
            bottom: 0;
            width: 100%;
        }

        @media (max-width: 768px) {
            .sidebar-wrapper {
                flex: 0 0 100%;
                margin-bottom: 20px;
            }

            .content {
                margin-left: 0;
            }
        }

    </style>
</head>

<body>
    <div class="navbar-container">
        <nav class="navbar">
            <ul>
                <li><a href="{{ route('home_page') }}" class="{{ request()->routeIs('home_page') ? 'active' : '' }}">Home</a></li>
                <li><a href="{{ route('accomodation') }}" class="{{ request()->routeIs('accomodation') ? 'active' : '' }}">Accommodation</a></li>
            </ul>

            <a href="{{ route('home_page') }}" class="navbar-logo-container">
                <img src="{{ asset('img/BLUE.png') }}" alt="Blue Haven Hotel Logo" class="navbar-logo">
            </a>

            <ul>
                <li><a href="{{ route('special_offers') }}" class="{{ request()->routeIs('special_offers') ? 'active' : '' }}">Special Offers</a></li>
                <li><a href="{{ route('profile') }}" class="{{ request()->routeIs('profile') ? 'active' : '' }}">Profile</a></li>
            </ul>
        </nav>
    </div>
    
    <div class="container-fluid">
        <div class="sidebar-wrapper">
            <div class="sidebar">
                <div class="profile-pic">
                    <i class="fas fa-user"></i>
                </div>
                <h5>{{ $user ? $user->NamaDepan : 'User not logged in' }}</h5>
                <div class="confirmed">
                    <i class="fas fa-check"></i>
                    <span>Email Confirmed</span>
                </div>
                <div class="confirmed">
                    <i class="fas fa-check"></i>
                    <span>Mobile Confirmed</span>
                </div>
            </div>

            <div class="reservations-card">
                <h5>Your Reservations</h5>
                @if ($pemesananKamar->isEmpty())
                    <p class="mt-3">You have no reservations.</p>
                @else
                    @foreach ($pemesananKamar as $reservation)
                        <div class="reservation-item">
                            {{-- <img src="{{ asset('storage/' . $reservation->photo) }}" alt="{{ $reservation->TipeKamar }}"
                                class="img-fluid"> --}}
                            {{-- <p class="mt-3 mb-1"><strong>Kamar No: {{ $reservation->NoKamar }}</strong></p> --}}
                            <p class="mb-1">Check-in: {{ $reservation->TanggalCheckIn }}</p>
                            <p class="mb-3">Guests: {{ $reservation->JumlahDewasa }} Adults</p>
                            <a href="{{ url('seeDetailReservation', $reservation->IDPesanan) }}" class="btn btn-sm">See
                                details</a>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="content d-flex align-items-start justify-content-between">
            <div class="form-section" style="flex: 1;">
                <h1><strong>Hello, {{ $user->NamaDepan }}</strong></h1>
                <p>User Id: {{ $user->IDUser }}</p>
                <form>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label>First name</label>
                            <h6>{{ $user->NamaDepan }}</h6>
                        </div>
                        <div class="col-md-6">
                            <label>Last name</label>
                            <h6>{{ $user->NamaBelakang }}</h6>
                        </div>
                    </div>
                    <label>Email Address</label>
                    <h6>{{ $user->Email }}</h6>
                    <label>Phone Number</label>
                    <h6>{{ $user->NoTelepon }}</h6>
                    <label>Country</label>
                    <h6>{{ $user->Negara }}</h6>
                    <label>Detail Address</label>
                    <h6>{{ $user->Alamat }}</h6>
                    <label>Username</label>
                    <h6>{{ $user->Username }}</h6>

                    <div class="row mt-4">
                        <div class="col-md-3">
                            <a href="{{ route('editProfile') }}" class="btn btn-primary me-2 mb-2" role="button">Edit Profile</a>
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-danger me-2 mb-2" type="button" data-bs-toggle="modal" data-bs-target="#logoutModal">Logout
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="image-section text-center">
            <img src="{{ asset('img/Illustration.png') }}" class="img-fluid rounded" style="max-height: 350px;"
                alt="Illustration" />
        </div>
    </div>

    </div>

    <footer class="footer">
        <div class="container mt-5">
            <span>© 2023 Blue Haven Hotel. All rights reserved.</span>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #1965B3">
                    <h5 class="modal-title" id="logoutModalLabel" style="color: #fff">Apakah ingin Logout?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger"
                        onclick="window.location.href='{{ route('login') }}'">Logout</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
