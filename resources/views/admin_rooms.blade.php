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

        .btn-group .btn-primary {
            background-color: #1965B3;
            border-color: #1965B3;
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
        <form method="GET" action="{{ route('admin_rooms') }}" class="d-flex">
            <input type="text" class="search-bar form-control me-2" name="searchTerm" value="{{ $searchTerm }}" placeholder="Search room number">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>

        <div class="table-container border border-primary rounded p-3 mt-3 shadow">
            <form method="GET" action="{{ route('admin_rooms') }}" class="mb-4 d-flex justify-content-between">
                <div class="btn-group me-auto">
                    <button type="submit" name="filter" value="All" class="btn {{ $filter === 'All' ? 'btn-primary' : 'btn-secondary' }}">All Room</button>
                    <button type="submit" name="filter" value="Available" class="btn {{ $filter === 'Available' ? 'btn-primary' : 'btn-secondary' }}">Available</button>
                    <button type="submit" name="filter" value="Booked" class="btn {{ $filter === 'Booked' ? 'btn-primary' : 'btn-secondary' }}">Booked</button>
                </div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addRoomModal">Add Room</button>
            </form>

            <table class="table table-hover table-bordered table-responsive">
                <thead>
                    <tr>
                        <th>No Kamar</th>
                        <th>Type</th>
                        <th>Floor</th>
                        <th>Facility</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($filteredRooms as $room)
                        <tr>
                            <td>{{ $room['number'] }}</td>
                            <td>{{ $room['type'] }}</td>
                            <td>{{ $room['floor'] }}</td>
                            <td>{{ $room['facility'] }}</td>
                            <td>
                                <span class="badge {{ $room['status'] === 'Available' ? 'badge-available' : 'badge-booked' }}">
                                    {{ $room['status'] }}
                                </span>
                            </td>
                            <td>
                                <button class="btn btn-warning btn-sm edit-room" data-room="{{ json_encode($room) }}">Edit</button>
                                <button class="btn btn-danger btn-sm" onclick="deleteRoom('{{ $room['number'] }}')">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal for Add Room -->
    <div class="modal fade" id="addRoomModal" tabindex="-1" aria-labelledby="addRoomModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addRoomModalLabel">Add Room</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addRoomForm">
                        <div class="mb-3">
                            <label for="roomNumber" class="form-label">Room Number</label>
                            <input type="text" class="form-control" id="roomNumber" required>
                        </div>
                        <div class="mb-3">
                            <label for="roomType" class="form-label">Type</label>
                            <input type="text" class="form-control" id="roomType" required>
                        </div>
                        <div class="mb-3">
                            <label for="roomFloor" class="form-label">Floor</label>
                            <input type="text" class="form-control" id="roomFloor" required>
                        </div>
                        <div class="mb-3">
                            <label for="roomFacility" class="form-label">Facility</label>
                            <textarea class="form-control" id="roomFacility" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="roomStatus" class="form-label">Status</label>
                            <select class="form-select" id="roomStatus" required>
                                <option value="Available">Available</option>
                                <option value="Booked">Booked</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="roomImages" class="form-label">Upload Room Images</label>
                            <input type="file" class="form-control" id="roomImages" name="images[]" accept="image/*" multiple required>
                            <small class="text-muted">You can upload up to 3 images.</small>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="saveRoomButton">Save Room</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Edit Room -->
    <div class="modal fade" id="editRoomModal" tabindex="-1" aria-labelledby="editRoomModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editRoomModalLabel">Edit Room</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editRoomForm">
                        <input type="hidden" id="editRoomNumber">
                        <div class="mb-3">
                            <label for="editRoomType" class="form-label">Type</label>
                            <input type="text" class="form-control" id="editRoomType" required>
                        </div>
                        <div class="mb-3">
                            <label for="editRoomFloor" class="form-label">Floor</label>
                            <input type="text" class="form-control" id="editRoomFloor" required>
                        </div>
                        <div class="mb-3">
                            <label for="editRoomFacility" class="form-label">Facility</label>
                            <textarea class="form-control" id="editRoomFacility" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="editRoomStatus" class="form-label">Status</label>
                            <select class="form-select" id="editRoomStatus" required>
                                <option value="Available">Available</option>
                                <option value="Booked">Booked</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="roomImages" class="form-label">Upload Room Images</label>
                            <input type="file" class="form-control" id="roomImages" name="images[]" accept="image/*" multiple required>
                            <small class="text-muted">You can upload up to 3 images.</small>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="updateRoomButton">Update Room</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.querySelectorAll('.edit-room').forEach(button => {
            button.addEventListener('click', function () {
                const room = JSON.parse(this.dataset.room);
                document.getElementById('editRoomNumber').value = room.number;
                document.getElementById('editRoomType').value = room.type;
                document.getElementById('editRoomFloor').value = room.floor;
                document.getElementById('editRoomFacility').value = room.facility;
                document.getElementById('editRoomStatus').value = room.status;
                const editModal = new bootstrap.Modal(document.getElementById('editRoomModal'));
                editModal.show();
            });
        });

        document.getElementById('updateRoomButton').addEventListener('click', function () {
            const roomNumber = document.getElementById('editRoomNumber').value;
            const roomType = document.getElementById('editRoomType').value;
            const roomFloor = document.getElementById('editRoomFloor').value;
            const roomFacility = document.getElementById('editRoomFacility').value;
            const roomStatus = document.getElementById('editRoomStatus').value;

            alert(`Room ${roomNumber} updated successfully!`);
            const editModal = bootstrap.Modal.getInstance(document.getElementById('editRoomModal'));
            editModal.hide();
        });

        document.getElementById('saveRoomButton').addEventListener('click', function () {
            const roomNumber = document.getElementById('roomNumber').value;
            const roomType = document.getElementById('roomType').value;
            const roomFloor = document.getElementById('roomFloor').value;
            const roomFacility = document.getElementById('roomFacility').value;
            const roomStatus = document.getElementById('roomStatus').value;
            const roomImages = document.getElementById('roomImages').files;

            alert(`Room ${roomNumber} added successfully!`);
            const addModal = bootstrap.Modal.getInstance(document.getElementById('addRoomModal'));
            addModal.hide();
        });

        function deleteRoom(roomNumber) {
            alert(`Room ${roomNumber} deleted successfully!`);
        }
    </script>
</body>
</html>
