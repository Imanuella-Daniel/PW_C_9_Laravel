<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Detail - Blue Haven Hotel</title>

    <link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&family=Inter:wght@400;700&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('CSS/navbar.css') }}">
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #1965B3;
            margin: 0;
            padding: 0;
        }

        .footer {
            background-color: #1965B3;
            color: white;
            text-align: center;
            padding: 20px;
            position: relative;
        }

        .carousel-item img {
            height: 80vh;
            object-fit: cover;
        }

        .carousel {
            margin-left: -50vw;
            margin-right: -50vw;
            width: 100vw;
            left: 50%;
            position: relative;
        }

        header {
            background-color: white;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
        }

        .room-images {
            margin-bottom: 1.5rem;
            border-radius: 0.5rem;
            overflow: hidden;
        }

        .room-info {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 1.5rem;
        }
        .card {
            background-color: white;
            border-radius: 0.5rem;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
        }
        .card-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .availability-badge {
            background-color:rgb(33, 150, 83);
            color: white;
            font-size: 1rem;
            font-weight: 500;
            padding: 0.25rem 0.75rem;
            border-radius: 6px;
        }
        .amenities {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
        }

        .amenity-icon {
            margin-right: 0.5rem;
            color: #9ca3af;
        }
        .booking-card {
            background-color: white;
            border-radius: 0.5rem;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
            height: fit-content;
            max-width: fit-content;
        }
        .price {
            font-size: 1.5rem; 
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

       

        .btn-pink {
            background-color: #ff007f;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 8px;
            
            font-size: 16px;
        }

        .btn-pink:hover {
            background-color: #e6006f;
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

    <main class="container">
        <div id="roomCarousel" class="carousel slide room-images" data-bs-ride="carousel">
            <div class="carousel-inner">
                @if (!empty($roomDetails['images']))
                    @foreach ($roomDetails['images'] as $index => $image)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                            <img src="{{ $image }}" class="d-block w-100" alt="Room Image">
                        </div>
                    @endforeach
                @else
                    <p>No images available</p>
                @endif
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#roomCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#roomCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class="room-info">
            <div class="card">
                <div class="card-title">
                    <h3 class="fw-bold">{{ $roomDetails['name'] }}</h3>
                    <span class="availability-badge">Available</span>
                </div>
                <h6 class="fw-bold">Room Description</h6>
                <p>{{ $roomDetails['description'] }}</p>
                <h6 class="fw-bold">Offered Amenities</h6>
                <div class="amenities">
                    @foreach ($roomDetails['facilities'] as $amenity)
                        <div class="amenity">{{ $amenity }}</div>
                    @endforeach
                </div>
            </div>

            <div class="booking-card">
                <div style="display: flex; align-items: center;">
                    <div class="price">{{ $roomDetails['price'] }}</div>
                    <p class="mb-4" style="margin: 1px;">/ Night</p>
                </div>
                <a href="{{ route('room_booking', ['NoKamar' => $roomDetails['NoKamar']]) }}"
                    class="btn btn-pink w-100">Book Now</a>
            </div>
        </div>
    </main>


    <footer class="footer">
        <div class="container">
            <span>© 2023 Blue Haven Hotel. All rights reserved.</span>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
