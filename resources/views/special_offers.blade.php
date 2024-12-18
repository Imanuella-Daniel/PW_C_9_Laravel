<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <<<<<<<<< Temporary merge branch 1 <title>Hahahihi Hotel - Special Offers</title>
        <link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&family=Inter:wght@400;700&display=swap"
            rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&family=Inter:wght@400;700&display=swap"
            rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link rel="stylesheet" href="{{ asset('CSS/navbar.css') }}">

        =========
        <title>Special Offers - Hotel Blue Haven</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css2?family=Lora:wght@600&family=Poppins:wght@300;400;600&display=swap"
            rel="stylesheet">

        >>>>>>>>> Temporary merge branch 2
        <style>
            body {
                font-family: 'Poppins', sans-serif;
                background: url("img/lobby.jpg") center/cover fixed no-repeat;
                margin: 0;
            }

            h1,
            h4 {
                font-family: 'Lora', serif;
                color: #1965B3;
            }

            .logo {
                margin: 0 20px;
            }

            .logo img {
                height: 50px;
                width: auto;
                max-height: 100%;
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

            h1 {
                margin-top: 50px;
            }

            .offers-container {
                display: flex;
                flex-direction: column;
                align-items: center;
                margin-top: 20px;
                padding-top: 30px;
            }

            .offer-row {
                display: flex;
                justify-content: space-between;
                margin-bottom: 20px;
                width: 100%;
            }

            /* Card Styles */
            .card {
                border: none;
                border-radius: 10px;
                box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }

            .card:hover {
                transform: translateY(-8px);
                box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.3);
            }

            .card-title {
                font-size: 1.4rem;
            }

            .badge {
                font-size: 0.9rem;
                padding: 6px 10px;
            }

            .btn-primary {
                background-color: #1965B3;
                border: none;
                transition: background-color 0.3s ease;
            }

            .btn-primary:hover {
                background-color: #144a82;
            }

            .text-strike {
                text-decoration: line-through;
                color: #dc3545;
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

            <a href="{{ route('home_page') }}">
                <img src="{{ asset('img/BLUE.png') }}" alt="Blue Haven Hotel Logo" class="navbar-logo">
            </a>

            <ul>
                <li><a href="{{ route('special_offers') }}"
                        class="{{ request()->routeIs('special_offers') ? 'active' : '' }}">Special Offers</a></li>
                <li><a href="{{ route('profile') }}"
                        class="{{ request()->routeIs('profile') ? 'active' : '' }}">Profile</a></li>
            </ul>
        </nav>
        </nav>
    </div>

    <div class="container py-5">
        <h1 class="text-center mb-4">Special Offers</h1>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card h-100">
                    <img src="img/ruangPertemuan.jpg" alt="Meeting Room" class="card-img-top rounded-top"
                        style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <span class="badge bg-success position-absolute top-0 end-0 m-2">10% Off</span>
                        <h4 class="card-title">Meeting Room</h4>
                        <p>Room for up to 14 people with 2 coffee breaks and lunch included. Private toilet available.
                        </p>
                        <p class="text-strike mb-0">Rp. 1,000,000</p>
                        <p class="fw-bold fs-5">Rp. 900,000</p>
                        <a href="{{ route('meeting') }}" class="btn btn-primary w-100">See Availability</a>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-6">
                <div class="card h-100">
                    <img src="img/bed.jpg" alt="Honeymoon Room" class="card-img-top rounded-top"
                        style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <span class="badge bg-success position-absolute top-0 end-0 m-2">30% Off</span>
                        <h4 class="card-title">Honeymoon Room</h4>
                        <p>Exclusive, soundproof room for 2 people with 1 bed and private bathroom. Includes 2 coffee
                            breaks and 1 lunch.</p>
                        <p class="text-strike mb-0">Rp. 1,000,000</p>
                        <p class="fw-bold fs-5">Rp. 700,000</p>
                        <a href="{{ route('view_detail') }}" class="btn btn-primary w-100">See Availability</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
