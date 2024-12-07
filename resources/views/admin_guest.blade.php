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

        body, html {
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

        .table th, .table td {
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

        .badge-available {
            background-color: #3bc9db;
        }

        .badge-booked {
            background-color: #ff6b6b;
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
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar">
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
                                <a class="nav-link active" href="{{url('admin-rooms')}}">Rooms</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{url('admin_guest')}}">Guest</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <div class="container-fluid" style="margin-top: 80px;">
        <form method="GET" action="{{ route('admin_guest') }}" class="d-flex">
            <input type="text" class="search-bar form-control me-2" name="searchTerm" value="{{ $searchTerm }}" placeholder="Search Reservation ID">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        
        <div class="table-container border border-primary rounded p-3 mt-3 shadow">
            <form method="GET" action="{{ route('admin_guest') }}" class="mb-4 d-flex justify-content-between">
                <div class="btn-group me-auto">
                    <button type="submit" name="filter" value="Check In" class="btn {{ $filter === 'Check In' ? 'btn-primary' : 'btn-secondary' }}">Check In</button>
                    <button type="submit" name="filter" value="Check Out" class="btn {{ $filter === 'Check Out' ? 'btn-primary' : 'btn-secondary' }}">Check Out</button>

                </div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addguest">Add Guest</button>
            </form>
            <table class="table table-hover table-bordered table-responsive">
                <thead>
                    <tr>
                        <th>Reservation ID</th>
                        <th>Name</th>
                        <th>Room Number</th>
                        <th>Room Facility</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservations as $reservation)
                    <tr>
                        <td>{{ $reservation['id'] }}</td>
                        <td>{{ $reservation['name'] }}</td>
                        <td>{{ $reservation['room_number'] }}</td>
                        <td>{{ $reservation['facility'] }}</td>
                        <td>
                            <span class="badge {{ $reservation['status'] === 'Available' ? 'badge-available' : 'badge-booked' }}">
                                {{ $reservation['status'] }}
                            </span>
                        </td>
                        <td>
                            <button class="btn btn-warning btn-sm edit-data" data-room="{{ json_encode($reservation) }}">Edit</button>
                            <button class="btn btn-danger btn-sm" onclick="deleteData('{{ $reservation['id'] }}')">Delete</button>
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
                    <form id="addGuestForm" method="POST" action="{{ route('admin_guest') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="addnama" class="form-label">Name</label>
                            <input type="text" class="form-control" id="addnama" required>
                        </div>
                        <div class="mb-3">
                            <label for="addNumber" class="form-label">Room Number</label>
                            <input type="text" class="form-control" id="addNumber" required>
                        </div>
                        <div class="mb-3">
                            <label for="addfacility" class="form-label">Room Facility</label>
                            <textarea class="form-control" id="addfacility" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="roomStatus" class="form-label">Status</label>
                            <select class="form-select" id="roomStatus" required>
                                <option value="Check In">Check In</option>
                                <option value="Check Out">Check Out</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="saveRoomButton" onclick="document.getElementById('addGuestForm').submit();">Save Guest</button>
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
                    <form id="editData" >
                        <input type="hidden" id="editId">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="roomNumber" class="form-label">Room Number</label>
                            <input type="text" class="form-control" id="roomNumber" required>
                        </div>
                        <div class="mb-3">
                            <label for="facility" class="form-label">Facility</label>
                            <textarea class="form-control" id="facility" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" required>
                                <option value="Check In">Check In</option>
                                <option value="Check Out">Check Out</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="updateRoomButton">Update Data</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        document.querySelectorAll('.edit-data').forEach(button => {
        button.addEventListener('click', function () {
            const reservation = JSON.parse(this.dataset.room);

            document.getElementById('editId').value = reservation.id; // Menyimpan ID reservasi
            document.getElementById('nama').value = reservation.name; // Menyimpan nama tamu
            document.getElementById('roomNumber').value = reservation.room_number; // Menyimpan nomor kamar
            document.getElementById('facility').value = reservation.facility; // Menyimpan fasilitas
            document.getElementById('status').value = reservation.status; // Menyimpan status

            const editModal = new bootstrap.Modal(document.getElementById('editdata'));
            editModal.show(); 
            });
        });

        function deleteData(id) {
            alert(`Room ${id} deleted successfully!`);
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>      
</body>
</html>
