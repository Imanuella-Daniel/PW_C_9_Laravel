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
                    <p class="payment-instructions">Verification process less than 10 minutes after successful
                        payment</p>
                </div>
                <p>Pay the order to the Virtual Account above before making another order with the Virtual Account
                    so that the number remains the same. </p>
                <p>Only accept from BRI Bank.</p>

                <div class="accordion" id="paymentInstructions">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                mBanking Transfer Instructions
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#paymentInstructions">
                            <div class="accordion-body transfer-instructions">
                                <p>1 Enter the BRI Mobile Banking menu. Then, select Payment > BRIVA.</p>
                                <p>2 Enter BRIVA Number 123 4567890.</p>
                                <p>3 Enter your PIN then select Send. If a confirmation message for transactions
                                    using SMS appears, select OK. The transaction status will be sent via SMS and
                                    can be used as proof of payment.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                ATM Transfer Instructions
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#paymentInstructions">
                            <div class="accordion-body transfer-instructions">
                                <p>1 Select Other Transactions > Payments > Others > BRIVA.</p>
                                <p>2 Enter the BRIVA number 128 081384752007 then select Correct.</p>
                                <p>3 Check the information on the screen. Make sure the Merchant is Shopee, the
                                    Total bill is correct and your username is andreaskuncoro684. If correct, select
                                    Yes. </p>
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
                    <img src="https://api.qrserver.com/v1/create-qr-code/?data=https://www.dana.id/&size=150x150"
                        alt="QR Code" class="img-fluid">
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
                <img src="{{ asset('img\hugeicons_payment-success-02.png') }}" alt="Payment Success"
                    class="success-icon">
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


    <
    script >
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
    document.getElementById('paymentOkButton').addEventListener('click', function() {
        var paymentBank = new bootstrap.Modal(document.getElementById('paymentBank'));
        paymentBank.hide();

        var successModal = new bootstrap.Modal(document.getElementById('successModal'));
        successModal.show();
    });

    // Handle OK button on Success Modal
    document.getElementById('successOkButton').addEventListener('click', function() {
        var successModal = new bootstrap.Modal(document.getElementById('successModal'));
        successModal.hide();

        // Optionally, you can reload the page to return to the start
        window.location.href = "{{ route('home_page') }}";
    });
</script>
