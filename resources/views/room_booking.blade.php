<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blue Haven Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('CSS/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('CSS/room_booking.css') }}">
    <style>
        
    </style>
</head>

<body>
    <div class="navbar-container">
        <nav class="navbar">
            <ul>
                <li><a href="{{ route('home_page') }}" class="{{ request()->routeIs('home_page') ? 'active' : '' }}">Home</a></li>
                <li><a href="{{ route('accomodation') }}" class="{{ request()->routeIs('accomodation') ? 'active' : '' }}">Accommodation</a></li>
            </ul>

            <a href="{{ route('home_page') }}" class="navbar-logo-container"><img src="{{ asset('img/BLUE.png') }}" alt="Blue Haven Hotel Logo" class="navbar-logo"></a>

            <ul>
                <li><a href="{{ route('special_offers') }}" class="{{ request()->routeIs('special_offers') ? 'active' : '' }}">Special Offers</a></li>
                <li><a href="{{ route('profile') }}" class="{{ request()->routeIs('profile') ? 'active' : '' }}">Profile</a></li>
            </ul>
        </nav>
    </div>

    <div class="container-fluid py-5">
        <div class="container mt-4">
            <h1 class="text-white mb-4">Secure your reservation</h1>
            <div class="row">
                <div class="col-md-8">
                    <div class="card mb-4">
                        <h4 class="card-header text-left fw-bold"> <i class="fa-solid fa-shield"></i> Customer Profile</h4>
                        <div class="card-body">
                            <form method="POST" action="{{ route('transaksi.create') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="firstName" class="form-label">First name</label>
                                        <input type="text" class="form-control" name="firstName"
                                            placeholder="Enter First name" value="{{ Auth::user()->NamaDepan }}" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="lastName" class="form-label">Last name</label>
                                        <input type="text" class="form-control" name="lastName"
                                            placeholder="Enter Last name" value="{{ Auth::user()->NamaBelakang }}" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="PermintaanKhusus" class="form-label">Permintaan Khusus</label>
                                    <textarea class="form-control" name="PermintaanKhusus" id="PermintaanKhusus" placeholder="Masukan Permintaan Khusus" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Enter Email" value="{{ Auth::user()->Email }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <div class="input-group">
                                        <select class="form-select" name="Negara" style="width: 50px; height: 38px;">
                                            <option value="+62" selected>+62</option>
                                            <option value="+1">+1</option>
                                            <option value="+44">+44</option>
                                        </select>
                                        <input class="form-control" name="phone" type="text" value="{{ Auth::user()->NoTelepon }}" required />
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <h4 class="card-header text-left fw-bold">
                            <span class="amenity-icon" aria-label="Door"> <i class="bi bi-door-open-fill"> </i></span> Room Detail
                        </h4>
                        <div class="card-body">
                            <h6 class="fw-bold">Room Description</h6>
                            <p>{{ $roomDetails['description'] ?? 'Description not available' }}</p>
                            <h6 class="fw-bold">Room Description</h6>
                            <p>{{ $roomDetails['facilities'] ?? 'facilities not available' }}</p>
                            <div class="row">
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
                            <div class="mb-3"></div>
                            <input type="hidden" name="payment_option" id="payment_option" value="">
                            <input type="hidden" name="IDUser" value="{{ Auth::user()->IDUser }}">

                            <ul class="nav nav-tabs mb-3" id="paymentTabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="bank-transfer-tab" data-bs-toggle="tab"
                                        data-bs-target="#bank-transfer" type="button" role="tab"
                                        onclick="setPaymentOption('bank_transfer')">Bank Transfer</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="e-money-tab" data-bs-toggle="tab"
                                        data-bs-target="#e-money" type="button" role="tab"
                                        onclick="setPaymentOption('e_money')">E-money</button>
                                </li>
                            </ul>
                            
                            <div class="tab-content" id="paymentTabsContent">
                                <div class="tab-pane fade show active" id="bank-transfer" role="tabpanel">
                                    <div class="row mb-3">
                                        <div class="col-8 d-flex align-items-center">
                                            @foreach (['BCA', 'Mandiri', 'BNI', 'BRI'] as $bank)
                                                <div class="me-3">
                                                <button class="btn btn-outline-secondary payment-btn d-flex flex-column align-items-center justify-content-center"
                                                    style="border: none; padding: 0;"
                                                    onclick="setPaymentOption('bank_transfer', this)">
                                                    <img src="{{ asset('img/' . strtolower($bank) . '.png') }}" alt="{{ $bank }}">
                                                    <span class="text-muted">{{ $bank }}</span>
                                                </button>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="col-4 d-flex align-items-center">
                                            <label for="NoKartu" class="form-label">Card Number</label>
                                            <input type="tel" class="form-control" id="NoKartuBank" name="NoKartu" placeholder="Enter Card Number" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="e-money" role="tabpanel">
                                    <div class="row mb-3">
                                        <div class="col-8 d-flex align-items-center">
                                            @foreach (['OVO', 'DANA', 'Gopay', 'ShopeePay'] as $money)
                                                <div class="me-3">
                                                <button class="btn btn-outline-secondary payment-btn d-flex flex-column align-items-center justify-content-center"
                                                    style="border: none; padding: 0;"
                                                    onclick="setPaymentOption('e_money', this)">
                                                    <img src="{{ asset('img/' . strtolower($money) . '.png') }}" alt="{{ $money }}">
                                                    <span class="text-muted">{{ $money }}</span>
                                                </button>

                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="col-4 d-flex align-items-center">
                                            <label for="NoKartu" class="form-label">Card Phone Number</label>
                                            <input type="tel" class="form-control" id="NoKartuPhone" name="NoKartu" placeholder="Enter Phone Number" required>
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

                                <div class="d-flex justify-content-between align-items-start mb-2 gap-3 text-muted small">
                                    <p class="mb-0">
                                        Check-in: <br>
                                        <span id="checkinText">input tanggal</span>
                                    </p>

                                    <p class="mb-0">
                                        Check-out: <br>
                                        <span id="checkoutText">input tanggal</span>
                                    </p>
                                </div>

                                <div class="d-flex align-items-baseline">
                                    <h3 class="fw-bold mb-3" id="price">{{ $roomDetails['formattedPrice'] }}</h3>
                                    <span class="text-muted ms-2">/ night</span>
                                </div>

                                <div class="d-grid gap-2">
                                    <button class="btn btn-pink w-100" id="confirmBookingButton">Confirm Booking</button>
                                </div>
                            </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <footer class="footer">
        <p>&copy; 2021 Blue Haven Hotel. All rights reserved.</p>

        <script>
            function setPaymentOption(option, selectedButton) {
                document.getElementById('payment_option').value = option;

                const allButtons = document.querySelectorAll('.payment-btn');
                allButtons.forEach(button => {
                    button.classList.remove('btn-active');
                });

                selectedButton.classList.add('btn-active');

                if (option === 'bank_transfer') {
                    document.getElementById('NoKartuBank').readOnly = false;
                    document.getElementById('NoKartuBank').required = true;
                    document.getElementById('NoKartuPhone').readOnly = true;
                    document.getElementById('NoKartuPhone').required = false;
                    document.getElementById('NoKartuPhone').value = '';
                } else if (option === 'e_money') {
                    document.getElementById('NoKartuBank').readOnly = true;
                    document.getElementById('NoKartuBank').required = false;
                    document.getElementById('NoKartuBank').value = '';
                    document.getElementById('NoKartuPhone').readOnly = false;
                    document.getElementById('NoKartuPhone').required = true;
                }

            }
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('confirmBookingButton').addEventListener('click', function (event) {
                event.preventDefault();

                const paymentOption = document.getElementById('payment_option').value;

                if (!paymentOption) {
                    alert('Please select a payment method.');
                    return;
                }

                if (paymentOption === 'bank_transfer') {
                    const bankModal = new bootstrap.Modal(document.getElementById('paymentBank'));
                    bankModal.show();
                } else if (paymentOption === 'e_money') {
                    const walletModal = new bootstrap.Modal(document.getElementById('paymentWallet'));
                    walletModal.show();
                }
            });

            const bankOkButton = document.querySelector('#paymentBank .btn-ok');
            const walletOkButton = document.querySelector('#paymentWallet .btn-ok');

            bankOkButton.addEventListener('click', showSuccessModal);
            walletOkButton.addEventListener('click', showSuccessModal);

            function showSuccessModal() {
                const successModal = new bootstrap.Modal(document.getElementById('successModal'));
                successModal.show();
            }

            document.getElementById('successOkButton').addEventListener('click', function () {
                document.querySelector('form').submit();
            });
        });

        </script>

        <div class="modal fade" id="paymentBank" tabindex="-1" aria-labelledby="paymentBankLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="paymentBankLabel">Payment</h5>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col">
                                <span class="total-payment" style = "color: #1A1A1A">Total Payment</span>
                            </div>
                            <div class="col text-end">
                                <span class="total-payment" id="modalPrice"><strong>{{ $roomDetails['formattedPrice'] }}</strong></span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <img src="{{ asset('img/BRI.png') }}" alt="BRI Logo" style="width: 50px;">
                            <div>No. Account</div>
                            <div class="virtual-account">123 4567890</div>
                            <p class="payment-instructions">Verification process less than 10 minutes after successful
                                payment</p>
                        </div>
                        <p>Pay the order to the Virtual Account above before making another order with the Virtual
                            Account
                            so that the number remains the same. </p>
                        <p>Only accept from BRI Bank.</p>

                        <div class="accordion" id="paymentInstructions">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true"
                                        aria-controls="collapseOne">
                                        mBanking Transfer Instructions
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                    aria-labelledby="headingOne" data-bs-parent="#paymentInstructions">
                                    <div class="accordion-body transfer-instructions text-start">
                                        <p>1. Enter the BRI Mobile Banking menu. Then, select Payment > BRIVA.</p>
                                        <p>2. Enter BRIVA Number 123 4567890.</p>
                                        <p>3. Enter your PIN then select Send. If a confirmation message for transactions
                                            using SMS appears, select OK. The transaction status will be sent via SMS
                                            and can be used as proof of payment.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                                        aria-controls="collapseTwo">
                                        ATM Transfer Instructions
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse"
                                    aria-labelledby="headingTwo" data-bs-parent="#paymentInstructions">
                                    <div class="accordion-body transfer-instructions text-start">
                                        <p>1. Select Other Transactions > Payments > Others > BRIVA.</p>
                                        <p>2. Enter the BRIVA number 128 081384752007 then select Correct.</p>
                                        <p>3. Check the information on the screen. Make sure the Merchant is Shopee, the
                                            Total bill is correct and your username is andreaskuncoro684. If correct,
                                            select
                                            Yes. </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-ok" id="submitBookingBank">OK</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
        document.getElementById('confirmBookingButton').addEventListener('click', function (event) {
            const dynamicPrice = document.getElementById('price').textContent;
            document.getElementById('modalPrice').textContent = dynamicPrice;
        });
    </script>
        <div class="modal fade" id="paymentWallet" tabindex="-1" aria-labelledby="paymentWalletLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="paymentWalletLabel">Payment</h5>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col">
                                <span class="total-payment" style = "color: #1A1A1A">Total Payment</span>
                            </div>
                            <div class="col text-end">
                                <span class="total-payment" id="modalPrice"><strong>{{ $roomDetails['formattedPrice'] }}</strong></span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <img src="{{ asset('img/Dana.png') }}" alt="Dana Logo" style="width: 50px;">
                        </div>

                        <div class="text-center mb-3">
                            <img src="https://api.qrserver.com/v1/create-qr-code/?data=https://www.dana.id/&size=150x150"
                                alt="QR Code" class="img-fluid">
                            <p>Scan this QR code to pay via DANA</p>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-ok" id="submitBookingWallet">OK</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="successModal" aria-labelledby="successModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="successModalLabel">Payment</h5>
                    </div>
                    <div class="modal-body text-center">
                        <img src="{{ asset('img\hugeicons_payment-success-02.png') }}" alt="Payment Success"
                            class="success-icon">
                        <h3 class="text-dark">Payment Success</h3>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-ok" id="successOkButton">OK</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function formatDate(date) {
                return new Date(date).toLocaleDateString('id-ID', {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                });
            }
            const checkinInput = document.getElementById('checkin');
            const checkoutInput = document.getElementById('checkout');

            const today = new Date();
            const formattedToday = today.toISOString().split('T')[0];
            checkinInput.setAttribute('min', formattedToday);

            checkinInput.addEventListener('change', function () {
                const checkinDate = new Date(checkinInput.value);
                const minCheckoutDate = new Date(checkinDate);
                minCheckoutDate.setDate(checkinDate.getDate() + 1);
                const formattedMinCheckout = minCheckoutDate.toISOString().split('T')[0];
                
                checkoutInput.setAttribute('min', formattedMinCheckout);
            });

            checkoutInput.setAttribute('min', new Date(today.getTime() + 24 * 60 * 60 * 1000).toISOString().split('T')[0]);


            document.getElementById('checkin').addEventListener('input', function() {
                document.getElementById('checkinText').textContent = formatDate(this.value);
            });

            document.getElementById('checkout').addEventListener('input', function() {
                document.getElementById('checkoutText').textContent = formatDate(this.value);
            });
        </script>

        <script>
            document.getElementById('checkin').addEventListener('change', calculateTotalPrice);
            document.getElementById('checkout').addEventListener('change', calculateTotalPrice);
            
            function calculateTotalPrice() {
                const checkinDate = document.getElementById('checkin').value;
                const checkoutDate = document.getElementById('checkout').value;
                const pricePerNight = {{ $roomDetails['price'] }};
                
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
            </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>