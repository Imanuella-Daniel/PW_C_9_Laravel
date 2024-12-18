<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="x-icon" href="/images/logo.png">
    <title>Admin Rooms - Blue Haven Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap');

        body,
        html {
            height: 100%;
            margin: 0;
            font-family: "Roboto", sans-serif;
            background-color: #1965B3;
        }

        .navbar-brand h5 {
            color: white;
            margin: 0;
            font-weight: 700;
        }

        .offcanvas-header h3 {
            color: #1965B3;
        }

        .search-bar {
            border-radius: 50px;
            padding: 10px 20px;
            width: 100%;
            max-width: 400px;
            margin-right: auto;
        }

        .search-container {
            padding: 15px;
            background-color: white;
        }

        .btn-group .btn {
            border-radius: 0;
        }

        .btn-group .btn-primary {
            background-color: #1965B3;
            border-color: #1965B3;
        }

        ..table th,
        .table td {
            text-align: center;
            padding: 12px 15px;
            vertical-align: middle;
            border: 1px solid #dee2e6;
            line-height: 1.6;
        }


        .btn-group .btn {
            border-radius: 0;
        }

        .table thead th {
            background-color: #f8f9fa;
        }

        .table-container {
            background-color: white;
            padding: 20px;
            margin-top: 20px;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .navbar-brand h5 {
                font-size: 18px;
            }

            .search-bar {
                max-width: 300px;
            }

            .btn-group {
                flex-wrap: wrap;
            }

            .table {
                font-size: 14px;
            }
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-light fixed-top">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasDarkNavbar">
                    <i class="bi bi-person"></i>
                </button>
                <a class="navbar-brand" href="/">
                    <h5>Blue Haven Hotel</h5>
                </a>
                <div class="offcanvas offcanvas-start text-bg-light" tabindex="-1" id="offcanvasDarkNavbar">
                    <div class="offcanvas-header">
                        <img src="{{ asset('img/2.jpg') }}" alt="Logo Hotel" class="navbar-logo">
                        <h3>BLUE HAVEN HOTEL</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ url('admin_rooms') }}">Rooms</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ url('admin_guest') }}">Guest</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <div class="container-fluid" style="margin-top: 80px;">
        <form method="GET" action="{{ route('admin_guest') }}" class="d-flex">
            <input type="text" class="search-bar form-control me-2" name="searchTerm"
                value="{{ request()->input('searchTerm') }}" placeholder="Search Reservation ID">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        <div class="table-container border border-primary rounded p-3 mt-3 shadow">
            <form method="GET" action="{{ route('admin_guest') }}" class="mb-4 d-flex justify-content-between">
                <div class="btn-group me-auto">
                    <button type="submit" name="filter" value="Check In"
                        class="btn {{ $filter === 'Check In' ? 'btn-primary' : 'btn-secondary' }}">Check In</button>
                    <button type="submit" name="filter" value="Check Out"
                        class="btn {{ $filter === 'Check Out' ? 'btn-primary' : 'btn-secondary' }}">Check Out</button>
                </div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addguest">Add
                    Guest</button>
            </form>
            <table class="table table-hover table-bordered table-responsive">
                <thead>
                    <tr>
                        <th>ID Pesanan</th>
                        <th>No Transaksi</th>
                        <th>Tipe Kamar</th>
                        <th>Room Number</th>
                        <th>Jumlah Dewasa</th>
                        <th>Tanggal Pesan</th>
                        <th>Tanggal Check In</th>
                        <th>Tanggal Check Out</th>
                        <th>Permintaan Khusus</th>
                        <th>Total Pembayaran</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td class="text-center">{{ $user->IDPesanan }}</td>
                            <td class="text-center">{{ $user->transaksi->NoTransaksi ?? 'N/A' }}</td>
                            <td class="text-center">{{ $user->kamar->TipeKamar }}</td>
                            <td class="text-center">{{ $user->kamar->NoKamar }}</td>
                            <td class="text-center">{{ $user->JumlahDewasa }}</td>
                            <td class="text-center">{{ $user->TanggalPesan }}</td>
                            <td class="text-center">{{ $user->TanggalCheckIn }}</td>
                            <td class="text-center">{{ $user->TanggalCheckOut }}</td>
                            <td class="text-center">{{ $user->PermintaanKhusus }}</td>
                            <td class="text-center">Rp. {{ number_format($user->transaksi->BiayaKamar, 0, ',', '.') }}
                            </td>
                            <td class="text-center">
                                <button class="btn btn-warning btn-sm edit-data"
                                    data-room="{{ json_encode($user) }}">Edit</button>
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal{{ $user->IDPesanan }}">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="addguest" tabindex="-1" aria-labelledby="addguestLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addguestLabel">Add Guest</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addGuestForm" method="POST" action="{{ route('admin_guest.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="NoKamar" class="form-label">Room Number</label>
                            <select name="NoKamar" class="form-control" required>
                                @foreach ($kamar as $room)
                                    <option value="{{ $room->NoKamar }}">{{ $room->NoKamar }} -
                                        {{ $room->NamaKamar }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="NoTransaksi" class="form-label">ID Transaksi</label>
                            <select name="NoTransaksi" class="form-control" required>
                                @foreach ($transaksis as $transaksi)
                                    <option value="{{ $transaksi->NoTransaksi }}">
                                        {{ $transaksi->NoTransaksi }} - {{ $transaksi->user->NamaDepan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>


                        <div class="mb-3">
                            <label for="TanggalPesan" class="form-label">Booking Date</label>
                            <input type="date" name="TanggalPesan" class="form-control" id="TanggalPesan"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="JumlahDewasa" class="form-label">Adults</label>
                            <input type="number" name="JumlahDewasa" class="form-control" id="JumlahDewasa"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="JumlahAnak" class="form-label">Children</label>
                            <input type="number" name="JumlahAnak" class="form-control" id="JumlahAnak" required>
                        </div>
                        <div class="mb-3">
                            <label for="PermintaanKhusus" class="form-label">Special Request</label>
                            <textarea name="PermintaanKhusus" class="form-control" id="PermintaanKhusus"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="TanggalCheckIn" class="form-label">Check-In Date</label>
                            <input type="date" name="TanggalCheckIn" class="form-control" id="TanggalCheckIn">
                        </div>
                        <div class="mb-3">
                            <label for="TanggalCheckOut" class="form-label">Check-Out Date</label>
                            <input type="date" name="TanggalCheckOut" class="form-control" id="TanggalCheckOut">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="saveRoomButton"
                        onclick="document.getElementById('addGuestForm').submit();">Save Guest</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editdata" tabindex="-1" aria-labelledby="editdataLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editdataLabel">Edit Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editData" method="POST" action="{{ route('admin_guest.update', '') }}">
                        @csrf
                        <input type="hidden" id="editId" name="id">

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="NamaDepan" required>
                        </div>

                        <div class="mb-3">
                            <label for="roomNumber" class="form-label">Room Number</label>
                            <input type="text" class="form-control" id="roomNumber" name="NoKamar" required>
                        </div>

                        <div class="mb-3">
                            <label for="facility" class="form-label">Facility</label>
                            <textarea class="form-control" id="facility" name="PermintaanKhusus" required></textarea>
                        </div>


                        <div class="mb-3">
                            <label for="TanggalCheckIn" class="form-label">Check-In Date</label>
                            <input type="date" name="TanggalCheckIn" class="form-control" id="TanggalCheckIn">
                        </div>
                        <div class="mb-3">
                            <label for="TanggalCheckOut" class="form-label">Check-Out Date</label>
                            <input type="date" name="TanggalCheckOut" class="form-control" id="TanggalCheckOut">
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="updateRoomButton"
                        onclick="document.getElementById('editData').submit();">Update Data</button>
                </div>
            </div>
        </div>
    </div>

    @foreach ($users as $user)
        <div class="modal fade" id="deleteModal{{ $user->IDPesanan }}" tabindex="-1"
            aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Delete Room</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this room?</p>
                        <form method="POST" action="{{ route('admin_guest.destroy', $user->IDPesanan) }}">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


    <script>
        document.querySelectorAll('.edit-data').forEach(button => {
            button.addEventListener('click', function() {
                const user = JSON.parse(this.dataset.room);

                const form = document.getElementById('editData');
                form.action = "/admin_guest/update/" + user.IDPesanan;

                document.getElementById('editId').value = user.IDPesanan;
                document.getElementById('nama').value = user.transaksi.user.NamaDepan;
                document.getElementById('roomNumber').value = user.kamar.NoKamar;
                document.getElementById('facility').value = user.PermintaanKhusus;
                document.getElementById('TanggalCheckIn').value = user.TanggalCheckIn;
                document.getElementById('TanggalCheckOut').value = user.TanggalCheckOut;

                const editModal = new bootstrap.Modal(document.getElementById('editdata'));
                editModal.show();
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
