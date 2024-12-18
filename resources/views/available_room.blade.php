<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Booking - Available Rooms</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Lora:wght@400;700&family=Poppins:wght@300;400;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        body {
            font-family: 'Lora', serif;
            background-image: url('/img/eksterior2.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .logo {
            margin: 0 20px;
        }

        .logo img {
            height: 50px;
            width: auto;
            max-height: 100%;
        }

        .available-rooms {
            text-align: center;
            margin: 120px auto 40px auto;
            width: 90%;
            max-width: 1200px;
            flex-grow: 1;
        }

        .available-rooms h1 {
            color: #fff;
            font-size: 36px;
            margin: 20px 0;
        }

        .rooms-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            justify-content: center;
        }

        .room-card {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: left;
            border: 1px solid #e0e0e0;
            display: flex;
            flex-direction: column;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .room-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        }

        .room-card img {
            height: 400px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 15px;
        }

        .room-card h3 {
            font-size: 24px;
            font-weight: bold;
            color: #1965B3;
            border-bottom: 2px solid #E0E2E6;
            padding-bottom: 10px;
            margin-bottom: 15px;
        }


        .room-details {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 15px;
        }

        .room-details>div {
            width: 50%;
            margin-bottom: 5px;
            font-size: 14px;
            display: flex;
            align-items: center;
        }

        .room-details i {
            margin-right: 5px;
            color: #1965B3;
        }

        .price-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: auto;
        }

        .availability-btn {
            background-color: #FF4081;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .availability-btn:hover {
            background-color: #1965B3;
        }

        .discount-price {
            color: #1965B3;
            font-size: 20px;
            font-weight: bold;
        }


        .room-header {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #1965B3;
            color: #ffffff;
            padding: 15px 20px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            margin-bottom: 20px;
        }

        .room-title {
            font-size: 28px;
            text-transform: uppercase;
            letter-spacing: 1px;
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

        .navbar-container {
            width: 100%;
            display: flex;
            justify-content: center;
        }

        .navbar {
            font-size: 1.3rem;
            justify-content: space-between;
            color: #000;
            margin: 0 50px;
            font-weight: 500;
            font-family: 'Lora', serif;
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
            color: #FF4081;
        }

        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
            }

            .navbar ul {
                flex-direction: column;
                align-items: center;
                width: 100%;
            }

            .navbar ul li {
                margin: 10px 0;
            }

            .navbar-logo {
                margin: 10px 0;
            }

            .room-card {
                padding: 15px;
            }

            .room-card img {
                height: 150px;
            }

            .room-card h3 {
                font-size: 20px;
            }

            .room-details>div {
                width: 100%;
                font-size: 12px;
            }

            .price-container {
                flex-direction: column;
                align-items: flex-start;
            }

            .availability-btn {
                width: 100%;
                margin-top: 10px;
            }

            .room-title {
                font-size: 24px;
            }
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
            <ul>
                <img src="{{ asset('img/BLUE.png') }}" alt="Logo Hotel" class="navbar-logo">
                <li><a href="{{ route('special_offers') }}">Special Offers</a></li>
                <li><a href="{{ route('profile') }}">Profile</a></li>
            </ul>
        </nav>
    </div>
    <section class="accommodation-section">
        <div class="content">
            <div class="available-rooms">
                <div class="room-header">
                    <span class="room-title">Available Rooms</span>
                </div>
                <div class="rooms-container">
                    <div class="room-info">
                        @foreach ($rooms as $room)
                            <div class="room-card">
                                <img src="{{ asset('storage/' . $room->photo) }}" alt="{{ $room->TipeKamar }}"
                                    class="img-fluid">
                                <h3>{{ $room->TipeKamar }}</h3>
                                <div class="room-details">
                                    <div><i class="bi bi-people-fill"></i> {{ $room->Kapasitas }} People</div>
                                    <div><i class="fa-solid fa-bed"></i> {{ $room->JumlahKamar }} Rooms</div>
                                </div>
                                <h3 style="margin-top: 20px">Room Description</h3>
                                <p style="font-size: 14px; margin-bottom: 15px;">{{ $room->Desc }}</p>
                                <div class="price-container">
                                    <span class="discount-price">Rp.
                                        {{ number_format($room->HargaKamar, 0, ',', '.') }} /night</span>
                                    <a href="{{ route('room.detail', $room->NoKamar) }}"
                                        class="btn btn-primary availability-btn">Book Now</a>
                                </div>
                            </div>
                        @endforeach
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

</body>

</html>
