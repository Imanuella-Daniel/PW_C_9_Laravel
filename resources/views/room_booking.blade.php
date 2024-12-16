<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blue Haven Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&family=Inter:wght@400;700&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Inika', serif;
            margin: 0;
            padding: 0;
            background-color: #1965B3;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 4rem;
        }

        nav ul {
            display: flex;
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        nav a {
            color: #4b5563;
            text-decoration: none;
            font-family: 'Inika', serif;
            font-size: 0.875rem;
            font-weight: 500;
            padding: 0.5rem 1rem;
        }

        nav a.active {
            color: #3b82f6;
            border-bottom: 2px solid #3b82f6;
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

        .navbar-container {
            position: absolute;
            width: 100%;
            display: flex;
            justify-content: center;
        }

        .navbar ul li a:hover {
            color: red;
        }

        .form-control {
            padding: 8px;
            font-size: 14px;
            font-family: 'Inika', serif;
        }

        .booking-card {
            background-color: white;
            border-radius: 0.5rem;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
            height: fit-content;
            max-width: fit-content;
        }

        .card-body {
            padding: 15px;
            margin: 10px;
        }

        .container-fluid.bg-primary {
            margin-top: 20px;
        }

        .modal-header {
            background-color: #f0f4ff;
            border-bottom: none;
        }

        .modal-title {
            font-weight: bold;
        }

        .total-payment {
            color: #007bff;
            font-size: 1.25rem;
        }

        .virtual-account {
            font-size: 1.5rem;
            font-weight: bold;
            color: #007bff;
        }

        .payment-instructions {
            color: red;
            font-size: 0.9rem;
        }

        .transfer-instructions {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
        }

        .btn-ok {
            background-color: #ff007f;
            color: white;
        }

        .success-icon {
            width: 100px;
            margin-bottom: 20px;
        }

        .btn-pink {
            background-color: #ff007f;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 8px;
            font-size: 16px;
            font-family: 'Inika', serif;
        }

        .room-check-form {
            display: flex;
            border-radius: 10px;
            margin: 20px auto;
        }

        .room-check-form .form-group {
            flex-direction: column;
            margin-right: 15px;
        }

        .room-check-form label {
            font-size: 14px;
            margin-bottom: 5px;
        }

        .room-check-form input,
        .room-check-form select {
            padding: 8px;
            border-radius: 8px;
            border: 1px solid #ccc;
            width: 200px;
            height: 40px;
            font-size: 14px;
            color: #555;
        }

        .room-check-form select {
            width: 220px;
        }

        .btn-pink:hover {
            background-color: #e6006f;
        }

        .text-warning {
            color: #FFD700;
        }

        .bg-primary {
            background-color: #1965B3;
        }

        .footer {
            background-color: #1965B3;
            color: white;
            text-align: center;
            padding: 20px;
            position: relative;
        }
    </style>
</head>

<body>
    <div class="navbar-container">
        <nav class="navbar">
            <ul>
                <li><a href="{{ route('home_page') }}">Home</a></li>
                <li><a href="{{ route('view_detail') }}">Accommodation</a></li>
            </ul>
            <img src="{{ asset('img/BLUE.png') }}" alt="Logo Hotel" class="navbar-logo">
            <ul>
                <li><a href="#">Special Offers</a></li>
                <li><a href="#">Profile</a></li>
            </ul>
        </nav>
    </div>
    <div class="container-fluid py-5">
        <div class="container mt-4">
            <h1 class="text-white mb-4">Secure your reservation</h1>
            <div class="row">
                <div class="col-md-8">
                    <div class="card mb-4">
                        <h4 class="card-header text-left fw-bold">Customer Profile</h4>
                        <div class="card-body">
                            <form method="POST" action="{{ route('transaksi.create') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="firstName" class="form-label">First name</label>
                                        <input type="text" class="form-control" name="firstName"
                                            placeholder="Enter First name" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="lastName" class="form-label">Last name</label>
                                        <input type="text" class="form-control" name="lastName"
                                            placeholder="Enter Last name" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="userId" class="form-label">User ID</label>
                                    <input type="number" class="form-control" name="userId"
                                        placeholder="Enter User ID " required>
                                </div>
                                <div class="mb-3">
                                    <label for="userId" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Enter Email "
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <div class="input-group">
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button"
                                                id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                Pilih Negara
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-secondary"
                                                aria-labelledby="dropdownMenuButton" style="min-width: 80px;">
                                                <li>
                                                    <a class="dropdown-item" href="#" data-code="+62"
                                                        onclick="setCountryCode(this)">
                                                        <img src="{{ asset('img/indo.png') }}" alt="Indonesia"
                                                            style="width: 20px; height: 20px;"> Indonesia
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#" data-code="+81"
                                                        onclick="setCountryCode(this)">
                                                        <img src="{{ asset('img/jepang.png') }}" alt="Jepang"
                                                            style="width: 20px; height: 20px;"> Jepang
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#" data-code="+82"
                                                        onclick="setCountryCode(this)">
                                                        <img src="{{ asset('img/korea.png') }}" alt="Korea"
                                                            style="width: 20px; height: 20px;"> Korea
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <input type="tel" class="form-control" name="phone" value="+62"
                                            required>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <h4 class="card-header text-left fw-bold">
                            <span class="amenity-icon" aria-label="Door">🚪</span> Room Detail
                        </h4>
                        <div class="card-body">
                            <h6 class="fw-bold">Room Description</h6>
                            <p>{{ $roomDetails['description'] ?? 'Description not available' }}</p>
                            <h3>Offered Amenities</h3>
                            <div class="row">
                                <div class="col-md-4">
                                    <ul class="list-unstyled">
                                        <li class="amenity">
                                            <span class="amenity-icon" aria-label="Television">📺</span>
                                            <span>Television with Netflix</span>
                                        </li>
                                        <li class="amenity">
                                            <span class="amenity-icon" aria-label="Internet">📡</span>
                                            <span>Free Wireless Internet</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-4">
                                    <ul class="list-unstyled">
                                        <li class="amenity">
                                            <span class="amenity-icon" aria-label="Air Conditioner">❄️</span>
                                            <span>Air Conditioner</span>
                                        </li>
                                        <li class="amenity">
                                            <span class="amenity-icon" aria-label="Bathroom">🛁</span>
                                            <span>Bathroom</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-4">
                                    <ul class="list-unstyled">
                                        <li class="amenity">
                                            <span class="amenity-icon" aria-label="Number of rooms"></span>
                                            <span>Number of rooms</span>
                                        </li>
                                        <li class="amenity">
                                            <span class="amenity-icon" aria-label="Bathroom"></span>
                                            <div class="input-group mb-3" style="max-width: 120px;">
                                                <button class="btn btn-pink" type="button" id="decrease">-</button>
                                                <input type="text" class="form-control text-center" value="1"
                                                    id="roomNumber" readonly>
                                                <button class="btn btn-pink" type="button" id="increase">+</button>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="room-check-form">
                                    <div class="form-group">
                                        <label for="checkin">Check-in date</label>
                                        <input type="date" name="checkin" id="checkin" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="checkout">Check-out date</label>
                                        <input type="date" name="checkout" id="checkout" required>
                                    </div>


                                    <div class="mb-3">
                                        <label for="person" class="form-label">Person</label>
                                        <input type="number" class="form-control" name="person"
                                            placeholder="Enter Max 4 " required>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <h4 class="card-header text-left fw-bold">Payment options</h4>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Pilih Opsi Pembayaran</label>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="paymentOption"
                                        value="bank-transfer" id="bank-transfer-option" required>
                                    <label class="form-check-label" for="bank-transfer-option">Bank Transfer</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="paymentOption"
                                        value="e-money" id="e-money-option" required>
                                    <label class="form-check-label" for="e-money-option">E-money</label>
                                </div>
                            </div>
                            <ul class="nav nav-tabs mb-3" id="paymentTabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="bank-transfer-tab" data-bs-toggle="tab"
                                        data-bs-target="#bank-transfer" type="button" role="tab">Bank
                                        Transfer</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="e-money-tab" data-bs-toggle="tab"
                                        data-bs-target="#e-money" type="button" role="tab">E-money</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="paymentTabsContent">
                                <div class="tab-pane fade show active" id="bank-transfer" role="tabpanel">
                                    <div class="row mb-3">
                                        <div class="col-8 d-flex align-items-center">
                                            @foreach (['BCA', 'Mandiri', 'BNI', 'BRI'] as $bank)
                                                <div class="me-3">
                                                    <button
                                                        class="btn btn-outline-secondary d-flex flex-column align-items-center justify-content-center"
                                                        style="border: none; padding: 0;">
                                                        <img src="{{ asset('img/' . strtolower($bank) . '.png') }}"
                                                            alt="{{ $bank }}">
                                                        <span class="text-muted">{{ $bank }}</span>
                                                    </button>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="col-4 d-flex align-items-center">
                                            <label for="NoKartu" class="form-label">Card Number</label>
                                            <input type="tel" class="form-control" id="NoKartu"
                                                placeholder="Enter Card Number" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="e-money" role="tabpanel">
                                    <div class="row mb-3">
                                        <div class="col-8 d-flex align-items-center">
                                            @foreach (['OVO', 'DANA', 'Gopay', 'ShopeePay'] as $money)
                                                <div class="me-3">
                                                    <button
                                                        class="btn btn-outline-secondary d-flex flex-column align-items-center justify-content-center"
                                                        style="border: none; padding: 0;">
                                                        <img src="{{ asset('img/' . strtolower($money) . '.png') }}"
                                                            alt="{{ $money }}">
                                                        <span class="text-muted">{{ $money }}</span>
                                                    </button>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="col-4 d-flex align-items-center">
                                            <label for="NoKartuPhone" class="form-label">Card Phone Number</label>
                                            <input type="tel" class="form-control" id="NoKartuPhone"
                                                placeholder="Enter Phone Number" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="booking-card">
                        <img src="{{ asset('storage/' . ($roomDetails['images'] ?? 'default.jpg')) }}"
                            alt="{{ $roomDetails['name'] }}" class="img-fluid">

                        <div class="card-body">
                            <h2 class="fw-bold fs-3 mb-3">{{ $roomDetails['name'] }}</h2>

                            <div class="d-flex justify-content-between mb-2">
                                <p class="fw-bold fs-5 text-muted">
                                    Check-in: <span id="checkinText">input tanggal</span>
                                </p>

                                <p class="fw-bold fs-5 text-muted">
                                    Check-out: <span id="checkoutText">input tanggal</span>
                                </p>
                            </div>
                            <h3 class="fw-bold mb-3">
                                <span id="price">{{ $roomDetails['formattedPrice'] }}</span><small
                                    class="text-muted"> /
                                    night</small>
                            </h3>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-pink w-100">Confirm Booking </button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <footer class="footer">
        <div class="container">
            <span>© 2023 Blue Haven Hotel. All rights reserved.</span>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('checkin').addEventListener('change', calculateTotalPrice);
        document.getElementById('checkout').addEventListener('change', calculateTotalPrice);

        function calculateTotalPrice() {
            const checkinDate = document.getElementById('checkin').value;
            const checkoutDate = document.getElementById('checkout').value;
            const pricePerNight = {{ $roomDetails['price'] }}; // Harga per malam

            if (checkinDate && checkoutDate) {
                const checkin = new Date(checkinDate);
                const checkout = new Date(checkoutDate);
                const timeDifference = checkout - checkin;
                const days = timeDifference / (1000 * 3600 * 24);

                if (days > 0) {
                    const totalPrice = days * pricePerNight;
                    document.getElementById('price').innerText = 'Rp. ' + totalPrice.toLocaleString('id-ID');
                } else {
                    document.getElementById('price').innerText = 'Rp. 0';
                }
            }
        }

        document.querySelector("form").addEventListener("submit", function(event) {
            const paymentOption = document.querySelector('input[name="paymentOption"]:checked');
            if (!paymentOption) {
                alert("Silakan pilih opsi pembayaran.");
                event.preventDefault();
            }
        });
    </script>


</body>

</html>
