<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Booking - Available Rooms</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('CSS/navbar.css') }}">

    <style>
        html, body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-image: url("img/eksterior2.png");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-color: #1965B3;
            flex: 1;
            padding-bottom: 75px; 
        }

        .logo {
            margin: 0 20px;
        }

        .logo img {
                height: 50px;
                width: auto;
                max-height: 100%;
        }
        
        .available-rooms {
            text-align: center;
            margin: 100px auto; 
            margin-top: 240px; 
            width: 80%;
            flex-grow: 1; 
        }

        .available-rooms h1 {
            color: #000;
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
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: left;
            border: 1px solid #e0e0e0;
            display: flex; 
            flex-direction: column;
            height: 100%; 
        }

        .room-card img {
            width: 120px;
            height: auto;
            border-radius: 10px;
            margin-right: 30px;
        }

        .room-card h3 {
            margin-top: 0;
            font-size: 24px;
            font-weight: bold;
            color: #000;
            border-bottom: 2px solid #E0E2E6;
            padding-bottom: 10px; 
            display: inline-block; 
            width: 100%; /* Ubah agar sesuai dengan card */
            box-sizing: border-box; /* Pastikan padding tidak menambah lebar */
            margin-bottom: 10px; /* Tambahkan sedikit jarak dari elemen berikutnya */
        }

                
        .room-details {
            display: flex;
            flex-wrap: wrap;
            padding-left: 10px;
        }

        .room-details > div {
            width: 50%;
            margin-bottom: 5px;
            margin-left: -10px;
            font-size: 12px; 
        }
                
        .price-container {
            display: flex; 
            justify-content: space-between; 
            align-items: center;
            margin-top: auto; 
            height: 50px;
        }
        
        .availability-btn {
            background-color: #FF4081;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 0; 
            height: 100%; 
            display: flex; 
            align-items: center; 
            justify-content: center;
        }

        .discount-price {
            color: #000;
            font-size: 18px;
            font-weight: bold;
        }

        .availability-btn {
            background-color: #FF4081;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 15px;
        }

        .availability-btn:hover {
            background-color: #1965B3;
        }

        .rating {
            display: flex;
            align-items: center;
            margin-top: 5px;
        }

        .rating-stars {
            color: gold;
            margin-right: 8px;
        }

        .rating-text {
            font-size: 14px;
            color: #555;
        }

        .room-header {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            background-color: #1965B3; 
            color: #ffffff; 
            padding: 15px 20px; 
            border-radius: 10px; 
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); 
            margin-bottom: 20px; 
        }

        .room-title {
            font-size: 28px; 
            text-align: left;
            text-transform: uppercase; 
        }

        .footer {
            background-color: #1965B3;
            text-align: center;
            padding: 20px 0;
            position: relative; 
            bottom: 0;
            width: 100%;
            margin-top: 60px;
            padding: 55px; 
        }

        .footer p {
            margin: 5px 0;
            color: #ffff;
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


    <section class="accommodation-section">
    <div class="content">
        <div class="available-rooms">
            <div class="room-header">
                <span class="room-title">Room Available</span>
            </div>
            <div class="rooms-container">
                @foreach ($kamar as $room)
                    <div class="room-card">
                        <div class="d-flex align-items-start">
                            <img src="{{ $room->Gambar }}" alt="{{ $room->TipeKamar }}" class="img-fluid">
                            <div>
                                <h3>{{ $room->TipeKamar }}</h3>
                                <div class="rating">
                                    <div class="rating-stars">
                                        @for ($i = 1; $i <= floor($room->Rating); $i++)
                                            <i class="bi bi-star-fill"></i>
                                        @endfor
                                        @if ($room->rating - floor($room->Rating) > 0)
                                            <i class="bi bi-star-half"></i>
                                        @endif
                                    </div>
                                    <div class="rating-text">{{ $room->Rating }} ({{ $room->reviews }} Reviews)</div>
                                </div>
                                <div class="room-details">
                                    <div><i class="bi bi-people-fill"></i> {{ $room->Kapasitas }} People</div>
                                    <div><i class="fa-solid fa-bed"></i> {{ $room->bed }}</div>
                                    <div><i class="fa-solid fa-bath"></i> {{ $room->bathroom }}</div>
                                </div>
                            </div>
                        </div>
                        <h5 style="margin-top: 20px">Room Description</h5>
                        <p style="margin-top: 0px; font-size: 13px;">
                            {{ $room->Deskripsi }}
                        </p>
                        <div class="price-container">
                            <span class="discount-price">Rp. {{ number_format($room->HargaKamar, 2, ',', '.') }} /night</span>
                            <a href="{{ route('room_booking', ['id' => $room->NoKamar]) }}" class="availability-btn">Book Now</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
</body>
    <footer class="footer">
        <div class="container text-center">
            <p style="color: white;">&copy; 2024 Blue Haven Hotel. All Rights Reserved.</p>
        </div>
    </footer>
</html>
