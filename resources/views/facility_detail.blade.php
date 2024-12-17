<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facility Detail - Hahahihi Hotel</title>

    <link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
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

        .facility-images {
            margin-bottom: 1.5rem;
            border-radius: 0.5rem;
            overflow: hidden;
        }

        .facility-info {
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
            background-color: rgb(33, 150, 83);
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
        <div id="facilityCarousel" class="carousel slide facility-images" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ $facilityDetails->image }}" class="d-block w-100" alt="Facility Image">
                </div>
            </div>
        </div>

        <div class="facility-info">
            <!-- Facility Information Card -->
            <div class="card">
                <div class="card-title">
                    <h3 class="fw-bold">{{ $facilityDetails->name }}</h3>
                    <span class="availability-badge">Available</span>
                </div>
                <h6 class="fw-bold">Room Description</h6>
                <p>{{ $facilityDetails->description }}</p>
                <h6 class="fw-bold">Offered Amenities</h6>
                <div class="amenities">
                    @foreach ($facilityDetails->facilities as $amenity)
                        <div class="amenity d-flex align-items-center">
                            @if (stripos($amenity, 'LCD Projector') !== false)
                                <i class="fas fa-tv amenity-icon"></i>
                            @elseif (stripos($amenity, 'Free Wireless Internet') !== false)
                                <i class="fas fa-wifi amenity-icon"></i>
                            @elseif (stripos($amenity, 'Snack') !== false || stripos($amenity, 'meal') !== false)
                                <i class="fas fa-utensils amenity-icon"></i>
                            @elseif (stripos($amenity, 'Air Conditioner') !== false)
                                <i class="fas fa-snowflake amenity-icon"></i>
                            @elseif (stripos($amenity, 'Toilet') !== false)
                                <i class="fas fa-toilet amenity-icon"></i>
                            @else
                                <i class="fas fa-check-circle amenity-icon"></i>
                            @endif
                            <span>{{ $amenity }}</span>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Booking Card -->
            <div class="booking-card">
                <div style="display: flex; align-items: center;">
                    <div class="price">{{ $facilityDetails->price }}</div>
                    <p class="mb-4" style="margin: 1px;">/ Night</p>
                </div>
                <a href="{{ route('facility_booking', ['IDFasilitas' => $facilityDetails->IDFasilitas]) }}" class="btn btn-pink w-100">Book Now</a>
            </div>
        </div>
    </main>


    <footer class="footer">
        <div class="container">
            <span>© 2024 Hahahihi Hotel. All rights reserved.</span>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
