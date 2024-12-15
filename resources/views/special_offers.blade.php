<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hahahihi Hotel - Special Offers</title>
    <link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('CSS/navbar.css') }}">
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            background-color: rgba(0, 0, 0, 0.7); 
            background-image: url("img/lobby.jpg");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .logo {
            margin: 0 20px;
        }

        .logo img {
            height: 50px;
            width: auto;
            max-height: 100%;
        }

        .special-offers {
            padding: 100px 50px;
            text-align: center;
            margin: 20px auto;
            width: 80%;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .special-offers h1 {
            color: #1965B3;
            font-size: 36px;
        }

        .offers-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .offer-row {
            display: flex;
            justify-content: space-between; 
            margin-bottom: 20px;
            width: 100%; 
        }

        .offer-row .offer-card {
            width: calc(50% - 15px); 
        }

        .offer-card {
            display: flex;
            flex-direction: column; 
            justify-content: space-between; 
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 40px; 
            margin: 20px;
            text-align: left;
            position: relative;
            border: 1px solid #e0e0e0; 
        }

        .offer-card h3 {
            margin-top: 0;
            font-size: 24px;
            font-weight: bold;
            color: #000;
            width: calc(100% + 100px); 
        }

        .offer-card .price {
            font-size: 16px;
            text-decoration: line-through;
            color: red;
            margin-top: -30px; 
        }

        .offer-card .discount-price {
            color: #000;
            font-size: 28px;
            font-weight: bold;
            margin-top: -40px; 
        }

        

        .offer-card .availability-btn {
            background-color: #FF4081;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            font-size: 16px;
            margin-top: 15px;
            display: inline-block;
        }

        .btn-pink {
                background-color: #FF4081;
                padding: 10px 20px;
                border-radius: 5px;
                color: white;
                font-weight: bold;
                margin-top: 15px;
            }


        .btn-pink:hover {
            background-color: #e6006f;
        }

        .offer-card .availability-btn:hover {
            background-color: #1965B3;
        }

        .btn-pink:hover {
            background-color: #e6006f;
        }

        .discount-badge {
            background-color: #4CAF50;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 14px;
            position: absolute;
            top: 20px;
            right: 20px;
        }

        .footer {
            background-color: #1965B3; 
            padding: 55px; 
            position: relative;
            bottom: 0;
            width: 100%;
        }

        .price-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .offer-details {
            margin-top: 10px; 
        }

        .offer-details .d-flex {
            flex: 1;
        }

        .offer-details span {
            width: 60%;
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
            <img src="{{ asset('img/BLUE.png') }}" alt="Logo Hotel" class="navbar-logo">
            <ul>
                <li><a href="{{ route('special_offers') }}" class="{{ request()->routeIs('special_offers') ? 'active' : '' }}">Special Offers</a></li>
                <li><a href="{{ route('profile') }}" class="{{ request()->routeIs('profile') ? 'active' : '' }}">Profile</a></li>
            </ul>
        </nav>
        </nav>
    </div>

    <div class="special-offers">
        <div class="offers-container">
            <div class="offer-row">
                <div class="offer-card">
                    <div class="d-flex align-items-start">
                        <img src="img/ruang pertemuan.jpg" style="width: 120px; height: auto; border-radius: 10px; margin-right: 30px;">
                        <div>
                            <h3 style="border-bottom: 2px solid #e0e0e0; padding-bottom: 10px;">
                                <i class="bi bi-meeting"></i> Meeting Room
                            </h3>
                            <div class="discount-badge">10% off</div>
                            <div style="margin-top: 10px;" class="offer-details">
                                <div class="d-flex justify-content-between" style="font-size: 11px;">
                                    <span><i class="bi bi-people-fill"></i> 14 People</span>
                                    <span><i class="fa-solid fa-mug-hot"></i> 2x Coffee break</span>
                                </div>
                                <div class="d-flex justify-content-between" style="font-size: 11px;">
                                    <span><i class="fa-solid fa-toilet"></i></i> 1 Toilet</span>
                                    <span><i class="fa-solid fa-utensils"></i></i> 1x Lunch</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h5 style="margin-top: 15px; margin-bottom: -8px;">Room Description</h5>
                    <p style="font-size: 13px;">This meeting room can accommodate up to 14 people, making it ideal for business meetings, strategic sessions, or internal training.
                    It comes with 2 coffee breaks to keep participants refreshed and 1 lunch to ensure uninterrupted sessions. A private toilet is also available for added convenience.</p>
                    <div class="price-container">
                        <span class="price">Rp. 1,000,000</span>
                        <a href="{{ route('meeting') }}" class="btn btn-pink text-white">See availability</a>
                    </div>
                    <span class="discount-price" style="margin-top: -53px;">Rp. 900,000</span>
                </div>

                <div class="offer-card">
                    <div class="d-flex align-items-start">
                        <img src="img/bed.jpg" style="width: 120px; height: auto; border-radius: 10px; margin-right: 30px;">
                        <div>
                            <h3 style="border-bottom: 2px solid #e0e0e0; padding-bottom: 10px;"></i> Honeymoon</h3>
                            <div class="discount-badge">30% off</div>
                            <div class="d-flex justify-content-between" style="font-size: 11px;">
                                <div style="margin-top: 10px;" class="offer-details">
                                    <div class="d-flex justify-content-between" style="font-size: 11px;">
                                        <span><i class="bi bi-people-fill"></i> 2 People</span>
                                        <span><i class="fa-solid fa-volume-xmark"></i> Soundproof</span>
                                    </div>
                                    <div class="d-flex justify-content-between" style="font-size: 11px;">
                                        <span><i class="fa-solid fa-bath"></i></i> 1 Toilet</span>
                                        <span><i class="fa-solid fa-utensils"></i></i> 1x Lunch</span>
                                    </div>
                                    <div class="d-flex justify-content-between" style="font-size: 11px;">
                                        <span><i class="fa-solid fa-bed"></i></i> 1 Exclusive Bad</span>
                                        <span><i class="fa-solid fa-volume-xmark"></i></i></i> Soundproof</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h5 style="margin-top: 20px">Room Description</h5>
                    <p style="margin-top: 0px; font-size: 13px;">This Honeymoon Room offers a luxurious and intimate experience, perfect for couples looking to celebrate special moments. Designed for comfort and relaxation, it features an exclusive bed and a soundproof room to ensure privacy. Guests will enjoy 2 coffee breaks and 1 special dish, making their stay even more memorable. A private bathroom is also provided for added convenience.</p>
                    <div class="price-container">
                        <span class="price">Rp. 1,000,000</span>
                        <a href="{{ route('view_detail') }}" class="btn btn-pink text-white">See availability</a>
                    </div>
                    <span class="discount-price">Rp. 700,000</span>
                </div>
            </div>

            <div class="offer-row">
                <div class="offer-card" style="margin: 0 auto;">
                    <div class="d-flex align-items-start">
                        <img src="img/dining.jpg" style="width: 120px; height: auto; border-radius: 10px; margin-right: 30px;">
                        <div>
                            <h3 style="border-bottom: 2px solid #e0e0e0; padding-bottom: 10px;"></i> Romantic Dining</h3>
                            <div class="discount-badge">10% off</div>
                            <div class="d-flex justify-content-between" style="font-size: 11px;">
                                <span><i class="bi bi-people-fill"></i> 2 Poeple</span>
                                <span><i class="fa-solid fa-utensils"></i> Special Dishes</span>
                            </div>
                        </div>
                    </div>
                    <h5 style="margin-top: 20px">Room Description</h5>
                    <p style="margin-top: 0px; font-size: 13px;">Enjoy an intimate and elegant dining experience, perfect for couples celebrating special moments. Guests will be treated to special dishes crafted exclusively by Blue Haven Hotel, with access to a private restroom for added comfort.</p>
                    <div class="price-container">
                        <span class="price">Rp. 1,000,000</span>
                        <button class="availability-btn">See availability</button>
                    </div>
                    <span class="discount-price">Rp. 900,000</span>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="container text-center">
            <p style="color: white;">&copy; 2024 Blue Haven Hotel. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
