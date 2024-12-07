<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blue Haven Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&family=Inter:wght@400;700&display=swap" rel="stylesheet">
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

        .room-check-form input, .room-check-form select {
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
                            <form id="bookingForm">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="firstName" class="form-label">First name</label>
                                        <input type="text" class="form-control" id="firstName" placeholder="Enter First name" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="lastName" class="form-label">Last name</label>
                                        <input type="text" class="form-control" id="lastName" placeholder="Enter Last name" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="userId" class="form-label">User ID</label>
                                    <input type="number" class="form-control" id="userId" placeholder="Enter User ID " required>
                                </div>
                                <div class="mb-3">
                                    <label for="userId" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="Enter Email " required>
                                </div>
                   


                                <div class="mb-3">
  <label for="phone" class="form-label">Phone Number</label>
  <div class="input-group">
    <div class="dropdown">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
        Pilih Negara
      </button>
      <ul class="dropdown-menu dropdown-menu-secondary" aria-labelledby="dropdownMenuButton" style="min-width: 80px;">
        <li>
          <a class="dropdown-item" href="#" data-code="+62" onclick="setCountryCode(this)">
            <img src="{{ asset('img/indo.png') }}" alt="Indonesia" style="width: 20px; height: 20px;"> Indonesia
          </a>
        </li>
        <li>
          <a class="dropdown-item" href="#" data-code="+81" onclick="setCountryCode(this)">
            <img src="{{ asset('img/jepang.png') }}" alt="Jepang" style="width: 20px; height: 20px;"> Jepang
          </a>
        </li>
        <li>
          <a class="dropdown-item" href="#" data-code="+82" onclick="setCountryCode(this)">
            <img src="{{ asset('img/korea.png') }}" alt="Korea" style="width: 20px; height: 20px;"> Korea
          </a>
        </li>
      </ul>
    </div>

    <input type="tel" class="form-control" id="phone" value="+62" required>
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
    <p>{{ $roomDetails['description'] }}</p>
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
        <input type="text" class="form-control text-center" value="1" id="roomNumber" readonly>
        <button class="btn btn-pink" type="button" id="increase">+</button>
      </div>
    </li>
  </ul>
</div>
<div class="room-check-form">
    <form>
        <div class="form-group">
            <label for="checkin">Check-in date</label>
            <input type="date" id="checkin" name="checkin">
        </div>
        
        <div class="form-group">
            <label for="checkout">Check-out date</label>
            <input type="date" id="checkout" name="checkout">
        </div>
        
        <div class="form-group">
            <label for="person">Person</label>
            <select id="person" name="person">
                <option value="1">1 Adult</option>
                <option value="2">2 Adults</option>
            </select>
        </div>
    </form>
</div>
    </div>

  </div>
</div>


                    <div class="card">    
                    <h4 class="card-header text-left fw-bold">Payment options</h4>
                            <div class="card-body">
                            <ul class="nav nav-tabs mb-3" id="paymentTabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="bank-transfer-tab" data-bs-toggle="tab" data-bs-target="#bank-transfer" type="button" role="tab">Bank Transfer</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="e-money-tab" data-bs-toggle="tab" data-bs-target="#e-money" type="button" role="tab">E-money</button>
                                </li>
                            </ul>

                            <div class="tab-content" id="paymentTabsContent">
                                <div class="tab-pane fade show active" id="bank-transfer" role="tabpanel">
                                    <div class="row mb-3">
                                        <div class="col-8 d-flex align-items-center">   
                                        @foreach(['BCA', 'Mandiri', 'BNI', 'BRI'] as $bank)
                                            <div class="me-3">
                                                <button class="btn btn-outline-secondary d-flex flex-column align-items-center justify-content-center" style="border: none; padding: 0;">
                                                    <img src="{{ asset('img/' . strtolower($bank) . '.png') }}" alt="{{ $bank }}">
                                                    <span class="text-muted">{{ $bank }}</span>
                                                </button>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="col-4 d-flex align-items-center">
                                <label for="cardNumber" class="form-label">Card Number</label>
                                <input type="tel" class="form-control" id="cardNumber" placeholder="Enter Card Number" required>
                            </div>
                                </div>
                                </div>
                                <div class="tab-pane fade" id="e-money" role="tabpanel">
                                    <div class="row mb-3">
                                    <div class="col-8 d-flex align-items-center">
                                        @foreach(['OVO', 'DANA', 'Gopay', 'ShopeePay'] as $money)
                                            <div class="me-3">
                                                <button class="btn btn-outline-secondary d-flex flex-column align-items-center justify-content-center" style="border: none; padding: 0;">
                                                    <img src="{{ asset('img/' . strtolower($money) . '.png') }}" alt="{{ $money }}">
                                                    <span class="text-muted">{{ $money }}</span>
                                                </button>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="col-4 d-flex align-items-center">
                                <label for="cardNumber" class="form-label">Card Phone Number</label>
                                <input type="tel" class="form-control" id="cardNumber" placeholder="Enter Phone Number" required>
                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="booking-card">
                        <img src="{{ asset('img/kamar1.jpg') }}" class="card-img-top" alt="Deluxe Double Room">
                        <div class="card-body">
                        <h2 class="fw-bold">{{ $roomDetails['name'] }}</h2>
                            <div class="mb-2">
                                <span class="text-warning">★★★★☆</span>
                                <small>4.5 (1200 Reviews)</small>
                            </div>
                            <p>
                                Check in: Sunday, October 13, 2024<br>
                                Check out: Monday, October 14, 2024<br>
                                1 night stay
                            </p>
                            
                            <h3 class="mb-3">{{ $roomDetails['price'] }}<small>/ night</small></h3>
                            @if($bank != null)
                              <button class="btn btn-pink w-100" data-bs-toggle="modal" data-bs-target="#paymentBank">Confirm Booking</button>
                            @else
                              <button class="btn btn-pink w-100" data-bs-toggle="modal" data-bs-target="#paymentWallet">Confirm Booking</button>
                            @endif       
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>

    <footer class="footer">
        <div class="container">
            <span>© 2023 Blue Haven Hotel. All rights reserved.</span>
        </div>
    </footer>


    <div class="modal fade" id="paymentBank" tabindex="-1" aria-labelledby="paymentBankLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="paymentBankLabel">Payment</h5>
          </div>
          <div class="modal-body">
            <div class="row mb-3">
              <div class="col">
                <span class="total-payment" style = "color: #1A1A1A">Total Payment</span>
              </div>
              <div class="col text-end">
                <span class="total-payment"><strong>Rp. 500.000,00</strong></span>
              </div>
            </div>
            <div class="mb-3">
              <img src="{{ asset('img/BRI.png') }}" alt="BRI Logo" style="width: 50px;">
              <div>No. Account</div>
              <div class="virtual-account">123 4567890</div>
              <p class="payment-instructions">Verification process less than 10 minutes after successful payment</p>
            </div>
            <p>Pay the order to the Virtual Account above before making another order with the Virtual Account so that the number remains the same. </p>
            <p>Only accept from BRI Bank.</p>

            <div class="accordion" id="paymentInstructions">
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    mBanking Transfer Instructions
                  </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#paymentInstructions">
                  <div class="accordion-body transfer-instructions">
                    <p>1 Enter the BRI Mobile Banking menu. Then, select Payment > BRIVA.</p>
                    <p>2 Enter BRIVA Number 123 4567890.</p>
                    <p>3 Enter your PIN then select Send. If a confirmation message for transactions using SMS appears, select OK. The transaction status will be sent via SMS and can be used as proof of payment.</p>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    ATM Transfer Instructions
                  </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#paymentInstructions">
                  <div class="accordion-body transfer-instructions">
                    <p>1 Select Other Transactions > Payments > Others > BRIVA.</p>
                    <p>2 Enter the BRIVA number 128 081384752007 then select Correct.</p>
                    <p>3 Check the information on the screen. Make sure the Merchant is Shopee, the Total bill is correct and your username is andreaskuncoro684. If correct, select Yes. </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-ok" id="paymentOkButton">OK</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="paymentWallet" tabindex="-1" aria-labelledby="paymentWalletLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="paymentWalletLabel">Payment</h5>
          </div>
          <div class="modal-body">
            <div class="row mb-3">
              <div class="col">
                <span class="total-payment" style = "color: #1A1A1A">Total Payment</span>
              </div>
              <div class="col text-end">
                <span class="total-payment"><strong>Rp. 500.000,00</strong></span>
              </div>
            </div>
            <div class="mb-3">
              <img src="{{ asset('img/Dana.png') }}" alt="BRI Logo" style="width: 50px;">
            </div>

            <div class="text-center mb-3">
              <img src="https://api.qrserver.com/v1/create-qr-code/?data=https://www.dana.id/&size=150x150" alt="QR Code" class="img-fluid">
              <p>Scan this QR code to pay via DANA</p>
            </div>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-ok" id="paymentOkButton">OK</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="successModalLabel">Payment</h5>
          </div>
          <div class="modal-body text-center">
            <img src="{{ asset('img\hugeicons_payment-success-02.png') }}" alt="Payment Success" class="success-icon">
            <h3>Payment Success</h3>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-ok" id="successOkButton">OK</button>
          </div>
        </div>
      </div>
    </div>

    <script>
  const decreaseBtn = document.getElementById('decrease');
  const increaseBtn = document.getElementById('increase');
  const roomNumberInput = document.getElementById('roomNumber');

  decreaseBtn.addEventListener('click', () => {
    let currentValue = parseInt(roomNumberInput.value);
    if (currentValue > 1) {
      roomNumberInput.value = currentValue - 1;
    }
  });

  increaseBtn.addEventListener('click', () => {
    let currentValue = parseInt(roomNumberInput.value);
    roomNumberInput.value = currentValue + 1;
  });

  function setCountryCode(element) {
    const code = element.getAttribute('data-code');
    document.getElementById('phone').value = code; 
  }

    
<script>
    const decreaseBtn = document.getElementById('decrease');
    const increaseBtn = document.getElementById('increase');
    const roomNumberInput = document.getElementById('roomNumber');

    decreaseBtn.addEventListener('click', (event) => {
        event.stopPropagation(); // Prevent event from bubbling up
        let currentValue = parseInt(roomNumberInput.value);
        if (currentValue > 1) {
            roomNumberInput.value = currentValue - 1;
        }
    });

    increaseBtn.addEventListener('click', (event) => {
        event.stopPropagation(); // Prevent event from bubbling up
        let currentValue = parseInt(roomNumberInput.value);
        roomNumberInput.value = currentValue + 1;
    });

    function setCountryCode(element) {
        const code = element.getAttribute('data-code');
        document.getElementById('phone').value = code; 
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

 
<script>
      // Handle OK button on Payment Modal
      document.getElementById('paymentOkButton').addEventListener('click', function () {
        var paymentBank = new bootstrap.Modal(document.getElementById('paymentBank'));
        paymentBank.hide();
        
        var successModal = new bootstrap.Modal(document.getElementById('successModal'));
        successModal.show();
      });

      // Handle OK button on Success Modal
      document.getElementById('successOkButton').addEventListener('click', function () {
        var successModal = new bootstrap.Modal(document.getElementById('successModal'));
        successModal.hide();
        
        // Optionally, you can reload the page to return to the start
        window.location.href = "{{ route('home_page') }}";
      });
    </script>
</body>
</html>
