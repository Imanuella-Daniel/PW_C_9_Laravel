<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Accommodation - Hahahihi Hotel</title>
        <link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&family=Inter:wght@400;700&display=swap" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link rel="stylesheet" href="{{ asset('CSS/navbar.css') }}">
        <style>
            body {
                font-family: 'Inter', sans-serif;
                margin: 0;
                padding: 0;
                overflow-x: hidden;
            }

            .logo {
                margin: 0 20px;
            }

            .logo img {
                height: 50px;
                width: auto;
                max-height: 100%;
            }

            .banner {
                background-image: url("{{ asset('img/kamar1.jpg') }}");
                background-size: cover;
                background-position: center;
                height: 100vh;
                position: relative;
                background-repeat: no-repeat;
                filter: brightness(0.9);
            }

            .banner-content {
                position: absolute;
                bottom: 0;
                width: 100%;
                background: linear-gradient(to top, rgba(25, 101, 179, 1), rgba(255, 255, 255, 0));
                text-align: center;
                padding: 20px;
                color: white;
            }

            .accommodation-section {
                background-color: rgba(25, 101, 179, 1);
                padding: 40px 0;
            }

            .room-card {
                background-color: #fff;
                border-radius: 12px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                padding: 20px;
                display: flex;
                align-items: center;
                position: relative;
                color: #4F4F4F;
            }

            .room-card img {
                width: 250px;
                border-radius: 12px;
            }

            .room-info {
                padding-left: 20px;
                flex-grow: 1;
            }

            .room-info h3 {
                font-size: 1.8rem;
                margin-bottom: 10px;
                color: #333;
            }

            .room-details {
                display: flex;
                flex-wrap: wrap;
                padding-left: 10px;
            }

            .room-details>div {
                width: 50%;
                margin-bottom: 5px;
                margin-left: -10px;
            }

            .stars {
                font-size: 1.2rem;
                color: #FFD21D;
            }

            .room-details i {
                margin-right: 5px;
            }

            .room-price {
                text-align: right;
                margin-top: 145px;
            }

            .room-price h4 {
                font-size: 1.4rem;
                color: #000;
                white-space: nowrap; 
            }

            .room-price small {
                color: #666;
            }

            .room-info h4 {
                font-weight: bold;
                color: #000;
            }

            .room-title {
                font-size: 2rem;
                font-weight: bold;
                color: #ffff;
                text-align: center;
                position: relative;
                margin-bottom: 20px;
            }

            .room-title::after {
                content: '';
                display: block;
                width: 60%;
                height: 4px;
                background: #ffff;
                margin: 10px auto;
            }

            .btn-pink {
                background-color: #FF4081;
                padding: 10px 20px;
                border-radius: 5px;
                color: white;
                font-weight: bold;
                margin-top: 15px;
            }

            .badge-custom {
                position: absolute;
                top: 20px;
                left: 20px;
                background-color: #28a745;
                color: white;
                padding: 5px 10px;
                border-radius: 5px;
                font-size: 14px;
            }

            .footer {
                background-color: #1965B3;
                text-align: center;
                padding: 20px 0;
                width: 100%;
                margin-top: auto;
            }

            .footer p {
                margin: 5px 0;
                color: #fff;
            }

            .small-red {
                font-size: 12px;
                color: red;
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

        <div class="banner">
            <div class="banner-content">
            </div>
        </div>

        <section class="accommodation-section">
            <div class="container">
                <div class="row">
                    <h4 class="room-title">Room</h4>
                    @foreach ($rooms as $room)
                        <div class="col-md-12 mb-4">
                            <div class="room-card d-flex justify-content-between align-items-center p-3 shadow">
                                <img src="{{ asset('storage/' . $room->photo) }}" alt="{{ $room->TipeKamar }}" class="img-fluid">
                                <div class="room-info">
                                    <h4>{{ $room->TipeKamar }}</h4>
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="stars text-warning">
                                            @for ($i = 0; $i < floor($room->Rating); $i++)
                                                <i class="bi bi-star-fill"></i>
                                            @endfor

                                            @if ($room->Rating - floor($room->Rating) >= 0.5)
                                                <i class="bi bi-star-half"></i>
                                            @endif

                                            @for ($i = ceil($room->Rating); $i < 5; $i++)
                                                <i class="bi bi-star"></i>
                                            @endfor
                                        </div>
                                        <span class="ml-2">{{ $room->Rating }} ({{ $room->reviews }} Reviews)</span>
                                    </div>
                                    <div class="room-details">
                                        <div><i class="bi bi-people-fill"></i> {{ $room->Kapasitas }} People</div>
                                        <div><i class="fa-solid fa-bed"></i> {{ $room->JumlahKamar }} Rooms</div>
                                    </div>
                                    <p class="mb-0">{{ strlen($room->Desc) > 200 ? substr($room->Desc, 0, 200) . '...' : $room->Desc }}</p>

                                    <a href="{{ route('room.detail', $room->NoKamar) }}" class="btn btn-pink text-white">See availability</a>
                                </div>
                                <div class="room-price text-right">
                                    <h4>Rp. {{ number_format($room->HargaKamar, 0, ',', '.') }}</h4>
                                    <small>Includes taxes</small>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <h4 class="room-title">Facilities</h4>
                    @foreach ($facilities as $facility)
                        <div class="col-md-12 mb-4">
                            <div class="room-card d-flex justify-content-between align-items-center p-3 shadow position-relative">
                                <span class="badge badge-success position-absolute" style="top: 10px; left: 10px;">{{ $facility->discount_percentage }}50% off</span>
                                <img src="{{ asset('/' . $facility->Gambar) }}" alt="{{ $facility->NamaFasilitas }}" class="img-fluid">
                                <div class="room-info">
                                    <h4>{{ $facility->NamaFasilitas }}</h4>
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="stars text-warning">
                                            @for ($i = 0; $i < floor($facility->Rating); $i++)
                                                <i class="bi bi-star-fill"></i>
                                            @endfor

                                            @if ($facility->Rating - floor($facility->Rating) >= 0.5)
                                                <i class="bi bi-star-half"></i>
                                            @endif

                                            @for ($i = ceil($facility->Rating); $i < 5; $i++)
                                                <i class="bi bi-star"></i>
                                            @endfor
                                        </div>
                                        <span class="ml-2">{{ $facility->Rating }} ({{ $facility->reviews }} Reviews)</span>
                                    </div>
                                    <div class="room-details">
                                        <div><i class="bi bi-people-fill"></i> {{ $facility->Kapasitas }} People</div>
                                        <div><i class="fa-solid fa-toilet"></i> {{ $facility->bathrooms }} Bathrooms</div>
                                    </div>
                                    <p class="mb-0">{{ $facility->Deskripsi }}</p>
                                    <a href="{{ route('facility_details', $facility->IDFasilitas) }}" class="btn btn-pink text-white">See availability</a>
                                </div>
                                <div class="room-price text-right">
                                    <h4 class="small-red" style="font-size: 12px; color: red;"><del>Rp. {{ number_format($facility->Biaya*2, 0, ',', '.') }}</del></h4>
                                    <h4>Rp. {{ number_format($facility->Biaya, 0, ',', '.') }}</h4>
                                    <small>Includes taxes</small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <h4 class="room-title">Facility</h4>
                    <div class="col-md-12 mb-4">
                        <div
                            class="room-card d-flex justify-content-between align-items-center p-3 shadow position-relative">
                            <span class="badge badge-success position-absolute" style="top: 10px; left: 10px;">10%
                                off</span>
                            <img src="{{ asset('img/ruang pertemuan.jpg') }}" alt="Honeymoon Package"
                                class="img-fluid">
                            <div class="room-info">
                                <h4>Meeting Room</h4>
                                <div class="d-flex align-items-center mb-2">
                                    <div class="stars text-warning">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-half"></i>
                                    </div>
                                    <span class="ml-2">4.5 (600 Reviews)</span>
                                </div>
                                <div class="room-details">
                                    <div><i class="bi bi-people-fill"></i></i> 14 People</div>
                                    <div><i class="fa-solid fa-toilet"></i></i></i> 1 Bathroom</div>
                                </div>
                                <p class="mb-0">This meeting room can accommodate up to 14 people, making</p>
                                <p class="mb-0">it ideal for business meetings, strategic sessions....</p>
                                <a href="{{ route('meeting') }}" class="btn btn-primary availability-btn">See
                                    availability</a>
                            </div>
                            <div class="room-price text-right">
                                <h4 class="small-red" style="font-size: 12px; color: red;"><del>Rp. 1,000,000.00</del>
                                </h4>
                                <h4>Rp. 900,000.00</h4>
                                <small>Includes taxes</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mb-4">
                        <div
                            class="room-card d-flex justify-content-between align-items-center p-3 shadow position-relative">
                            <span class="badge badge-success position-absolute" style="top: 10px; left: 10px;">30%
                                off</span>
                            <img src="{{ asset('img/bed.jpg') }}" alt="Honeymoon Package" class="img-fluid">
                            <div class="room-info">
                                <h4>Honeymoon</h4>
                                <div class="d-flex align-items-center mb-2">
                                    <div class="stars text-warning">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-half"></i>
                                    </div>
                                    <span class="ml-2">5.0 (1200 Reviews)</span>
                                </div>
                                <div class="room-details">
                                    <div><i class="bi bi-people-fill"></i></i> 2 People</div>
                                    <div><i class="fa-solid fa-bed"></i> 1 Exclusive bed</div>
                                    <div><i class="bi bi-shower"></i></i> 1 Bathroom</div>
                                </div>
                                <p class="mb-0">This luxurious room offers a private pool and intimate</p>
                                <p class="mb-0">experience, perfect for couples looking to celebrate special ....</p>
                                <a href="#" class="btn btn-primary availability-btn">See availability</a>
                            </div>
                            <div class="room-price text-right">
                                <h4 class="small-red" style="font-size: 12px; color: red;"><del>Rp. 1,000,000.00</del>
                                </h4>
                                <h4>Rp. 700,000.00</h4>
                                <small>Includes taxes</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mb-4">
                        <div
                            class="room-card d-flex justify-content-between align-items-center p-3 shadow position-relative">
                            <span class="badge badge-success position-absolute" style="top: 10px; left: 10px;">30%
                                off</span>
                            <img src="{{ asset('img/dining.jpg') }}" alt="Honeymoon Package" class="img-fluid">
                            <div class="room-info">
                                <h4>Romantic Dining</h4>
                                <div class="d-flex align-items-center mb-2">
                                    <div class="stars text-warning">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-half"></i>
                                    </div>
                                    <span class="ml-2">4.7 (950 Reviews)</span>
                                </div>
                                <div class="room-details">
                                    <div><i class="bi bi-people-fill"></i></i> 2 People</div>
                                </div>
                                <p class="mb-0">Enjoy an intimate and elegant dining experience, perfect for</p>
                                <p class="mb-0">couples celebrating special moments. Guests will be treated....</p>
                                <a href="#" class="btn btn-primary availability-btn">See availability</a>
                            </div>
                            <div class="room-price text-right">
                                <h4 class="small-red" style="font-size: 12px; color: red;"><del>Rp. 1,000,000.00</del>
                                </h4>
                                <h4>Rp. 700,000.00</h4>
                                <small>Includes taxes</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <footer class="footer">
            <div class="container text-center">
                <p>&copy; 2024 Blue Haven Hotel. All Rights Reserved.</p>
            </div>
        </footer>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

    </body>
</html>