<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atma HotelHotel - Home</title>

    <link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&family=Inter:wght@400;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
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

        .banner {
            background-image: url("{{ asset('img/eksterior2.png') }}");
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            position: relative;
            margin-top: 0px;
        }

        .banner-content {
            position: relative;
            z-index: 2;
            margin-top: 105vh;
            padding: 0 20px;
        }

        .banner h1 {
            font-size: 3rem;
            margin: 0;
            background: linear-gradient(to right, #0000FF, #00FFFF);
            -webkit-background-clip: text;
            background-clip: text;
            color: #fff;
        }

        .banner p {
            font-size: 1.5rem;
            margin: 10px 0 0;
            background: linear-gradient(to right, #0000FF, #00FFFF);
            -webkit-background-clip: text;
            background-clip: text;
            color: #fff;
        }

        .banner-description {
            font-size: 1rem;
            margin-top: 90px;
            line-height: 1.6;
            color: #fff;
            z-index: 2;
        }

        .banner-description p {
            font-size: 12.5px;
            color: #fff;
            margin-bottom: 1px;
        }

        .banner-gradient {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 45vh;
            background: linear-gradient(to top, rgba(25, 101, 179, 1), rgba(255, 255, 255, 0));
            z-index: 0;
        }

        .lobby {
            background-image: url("{{ asset('img/lobby.jpg') }}");
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            position: relative;
        }

        .lobby-gradient {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 40vh;
            background: linear-gradient(to bottom, rgba(25, 101, 179, 1), rgba(255, 255, 255, 0));
            z-index: 1;
        }

        .lobby-gradient-down {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 25vh;
            background: linear-gradient(to top, rgba(25, 101, 179, 1), rgba(255, 255, 255, 0));
            z-index: 1;
        }

        .lobby-content {
            position: relative;
            z-index: 2;
            background: #fff;
            padding: 25px;
            border-radius: 15px;
            color: black;
            font-family: 'Inter', sans-serif;
        }

        .lobby-content h2,
        p {
            font-weight: normal;
            margin-top: 0px;
            margin-bottom: 0px;
            font-family: 'Inter', sans-serif;
        }

        .room-check-form {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 40px;
        }

        .room-check-form label {
            font-size: 14px;
            color: #9A9A9A;
        }

        .room-check-form input,
        .room-check-form select {
            padding: 0px;
            margin-bottom: 5px;
            border-radius: 10px;
            border: 1px solid #ccc;
            width: 180px;
            height: 40px;
            font-family: 'Inter', sans-serif;
        }

        .check-room-btn {
            background-color: #ff007f;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 180px;
            height: 40px;
            margin-left: 12px;
            margin-top: 15px;
        }

        .check-room-btn:hover {
            background-color: #e6006f;
        }

        .intro-text p {
            line-height: 1.6;
            margin-bottom: 16px;
            font-family: 'Inika';
        }

        .grouped-text p {
            margin-bottom: 8px;
            line-height: 1.4;
        }

        .standard-text p {
            margin-bottom: 20px;
        }

        .special-offers {
            background-color: #f9f9f9;
            padding: 20px;
            font-family: 'Inter', sans-serif;
        }

        .special-offers h2 {
            font-size: 1.2rem;
            margin-bottom: 2px;
            color: #1965B3;
            font-weight: normal;
        }

        .special-offers h1 {
            font-size: 2rem;
            color: black;
            font-weight: normal;
            margin-top: 15px;
            margin-bottom: 15px;
        }

        .special-offers h5 {
            margin-bottom: 0;
        }

        .special-offers p {
            margin: 4px 0;
            font-size: 15px;
            font-family: 'Inter';
        }

        .special-offers h4 {
            margin-top: 15px;
            font-size: 18px;
        }

        .offers-container {
            margin-top: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
            padding: 0 15px;
        }

        .offer-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
            height: 500px;
            transition: transform 0.3s;
            margin: 10px;
        }

        .offer-card:hover {
            transform: scale(1.05);
        }

        .offer-card h2 {
            color: #000;
            font-weight: bold;
            font-size: 18px;
        }

        .offer-card h4 {
            color: #000;
            font-weight: bold;
            font-size: 18px;
        }

        .offer-card h5 {
            color: #000;
            font-weight: bold;
            font-size: 10px;
            margin-top: 10px;
        }

        .offer-card p {
            color: #000;
            margin: 8px 0;
            font-size: 10px;
            margin-top: 8px;
            margin-bottom: 15px;
        }

        .offer-card span {
            font-size: 12px;
            color: #555;
        }

        .price-duration {
            display: inline-flex;
            align-items: baseline;
        }

        .price-duration h2,
        .price-duration span {
            margin: 0;
        }

        .price-duration h2 {
            font-size: 25px;
        }

        .price-duration span {
            font-size: 1rem;
            padding-left: 5px;
        }

        .footer {
            background-color: #1965B3;
            padding: 55px;
            position: relative;
            bottom: 0;
            width: 100%;
        }

        .banner-content h1,
        p {
            font-family: 'Inika';
        }

        .grouped-text p {
            margin: 0px;
            letter-spacing: 1.2px;
        }

        .person-count {
            position: absolute;
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

    <div class="banner">
        <div class="banner-content">
            <h1>Welcome to Blue Haven Hotel</h1>
            <p>A Modern Elegance in Simplicity</p>
            <div class="banner-description">
                <div class="intro-text">
                    <div class="grouped-text">
                        <p>Atma Hotel is an oasis of tranquility amidst the hustle and bustle of the city, offering
                            an elegant and classy stay experience. With its minimalist modern design,</p>
                        <p>we create the perfect atmosphere for travelers who appreciate simplicity and beauty.</p>
                    </div>
                    <p></p>
                    <div class="grouped-text">
                        <p></p>
                        <p>Strategically located in the heart of the city, Atma HotelHotel provides easy access to
                            shopping centers, dining spots, and nightlife, just minutes away from the airport.</p>
                    </div>
                    <p></p>
                    <div class="grouped-text">
                        <p>Every detail at Atma HotelHotel is thoughtfully designed to blend modern aesthetics with
                            unparalleled comfort. Enjoy spacious rooms equipped with the latest
                        <p>amenities, along with exceptional service that caters to your every need.</p>
                    </div>
                    <p></p>
                    <div class="grouped-text">
                        <p>More than just a place to stay, Atma HotelHotel offers an experience that combines modern
                            simplicity with warm comfort. Discover beauty in simplicity and enjoy</p>
                        <p>an unforgettable experience with us.</p>
                    </div>
                </div>

            </div>
        </div>
        <div class="banner-gradient"></div>
    </div>

    <div class="lobby">
        <div class="lobby-gradient"></div>
        <div class="lobby-content">
            <h2>Check Room</h2>
            <p>Discover the perfect space for you!</p>
            <div class="room-check-form">
                <form method="GET" action="{{ route('available_room') }}"
                    style="display: flex; align-items: center; justify-content: flex-start; gap: 12px;">
                    <div>
                        <label for="TanggalCheckIn"
                            style="display: block; font-size: 13px; color: #9A9A9A; text-align: left; margin-bottom: 5px;">
                            Check-in date
                        </label>
                        <input type="date" id="TanggalCheckIn" name="TanggalCheckIn" required>
                    </div>

                    <div>
                        <label for="TanggalCheckOut"
                            style="display: block; font-size: 13px; color: #9A9A9A; text-align: left; margin-bottom: 5px;">
                            Check-out date
                        </label>
                        <input type="date" id="TanggalCheckOut" name="TanggalCheckOut" required>
                    </div>

                    <div>
                        <label for="JumlahDewasa"
                            style="display: block; font-size: 13px; color: #9A9A9A; text-align: left; margin-bottom: 5px;">
                            Person
                        </label>
                        <select id="JumlahDewasa" name="JumlahDewasa"
                            style="width: 180px; height: 40px; border-radius: 10px; border: 1px solid #ccc;">
                            <option value="" disabled selected>Select number of persons</option>
                            <option value="1">1 Adult</option>
                            <option value="2">2 Adults</option>
                        </select>
                    </div>

                    <div>
                        <button type="submit" class="check-room-btn"
                            style="width: 180px; height: 40px; border-radius: 10px;">Check Room</button>
                    </div>
                </form>

            </div>
        </div>
        <div class="lobby-gradient-down"></div>
    </div>

    <div class="special-offers">
        <h2>Special Offers</h2>
        <div class="offers-header">
            <h1>Best offer of the month</h1>
        </div>
        <p>Experience Fantastic Benefits and Obtain Better Rates When You</p>
        <p>Make a Direct Booking on Our Official Website</p>

        <div class="offers-container">
            <div class="offer-card">
                <img src="{{ asset('img/bed.jpg') }}" style="width: 100%; border-radius: 10px;">
                <h5>Room</h5>
                <h4>Honeymoon</h4>
                <p>Indulge in a Memorable One-Time Romantic Dinner for Two</p>
                <div class="price-duration">
                    <h2>Rp 3.000.000</h2>
                    <p>/ 12 hours</p>
                </div>
            </div>

            <div class="offer-card" style="position: relative;">
                <img src="{{ asset('img/ruang pertemuan.jpg') }}" style="width: 100%; border-radius: 10px;">
                <h5>Room</h5>
                <h4>Meetings</h4>
                <p>Experience an Exclusively Private Environment to Boost Your Productivity</p>
                <div class="price-duration">
                    <h2>Rp 900.000</h2>
                    <p>/ 12 hours</p>
                </div>
            </div>

            <div class="offer-card">
                <img src="{{ asset('img/dining.jpg') }}" alt="Romantic Dining"
                    style="width: 100%; border-radius: 10px;">
                <h5>Room</h5>
                <h4>Romantic Dining</h4>
                <p>Indulge in a Memorable One-Time Romantic Dinner for Two</p>
                <div class="price-duration">
                    <h2>Rp 700.000</h2>
                    <p>/ 12 hours</p>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="container text-center">
            <p style="color: white;">&copy; 2024 Blue Haven Hotel. All Rights Reserved.</p>
        </div>
    </footer>
</body>

</html>
