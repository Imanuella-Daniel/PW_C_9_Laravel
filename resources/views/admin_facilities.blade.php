<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="x-icon" href="/images/logo.png">
    <title>Admin Facilities - Blue Haven Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

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

        .table th,
        .table td {
            max-width: 15px;
            padding: 12px 15px;
            vertical-align: middle;
            text-align: center;
            border: 1px solid #dee2e6;
            line-height: 1.6;
        }

        .table img {
            max-width: 150px;
            height: auto;
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
        <form method="GET" action="{{ route('admin_facilities') }}" class="d-flex">
            <input type="text" class="search-bar form-control me-2" name="searchTerm"
                value="{{ request('searchTerm') }}" placeholder="Search facility name">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>

        <div class="table-container border border-primary rounded p-3 mt-3 shadow">
            <form method="GET" action="{{ route('admin_facilities') }}" class="mb-4 d-flex justify-content-between">
                <div class="btn-group me-auto">
                    <button type="submit" name="filter" value="All"
                        class="btn {{ $filter === 'All' ? 'btn-primary' : 'btn-secondary' }}">All Facilities</button>
                    <button type="submit" name="filter" value="Available"
                        class="btn {{ $filter === 'Available' ? 'btn-primary' : 'btn-secondary' }}">Available</button>
                    <button type="submit" name="filter" value="Booked"
                        class="btn {{ $filter === 'Booked' ? 'btn-primary' : 'btn-secondary' }}">Booked</button>
                </div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addFacilityModal">Add
                    Facility</button>
            </form>

            <table class="table table-hover table-bordered table-responsive">
                <thead>
                    <tr>
                        <th>ID Facility</th>
                        <th>Facility Name</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Actions</th>
                        <th>Photo</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($filteredFacilities->isEmpty())
                        <tr>
                            <td colspan="6" class="text-center text-muted">
                                No facilities available at the moment.
                            </td>
                        </tr>
                    @else
                        @foreach ($filteredFacilities as $facility)
                            <tr>
                                <td>{{ $facility->IDFasilitas }}</td>
                                <td>{{ $facility->NamaFasilitas }}</td>
                                <td>{{ $facility->Biaya }}</td>
                                <td>
                                    <span
                                        class="badge {{ strtolower(trim($facility->Status)) === 'available' ? 'bg-primary' : 'badge bg-danger' }}">
                                        {{ $facility->Status }}
                                    </span>
                                </td>
                                <td>
                                    <button class="btn btn-warning btn-sm edit-facility" data-bs-toggle="modal"
                                        data-bs-target="#editFacilityModal" data-facility="{{ json_encode($facility) }}">
                                        Edit
                                    </button>

                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal{{ $facility->IDFasilitas }}">
                                        Delete
                                    </button>
                                </td>

                                <td>
                                    <img src="{{ asset('storage/' . $facility->Gambar) }}" alt="Facility Photo"
                                        class="facility-photo">
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal for Add Facility -->
    <div class="modal fade" id="addFacilityModal" tabindex="-1" aria-labelledby="addFacilityModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addFacilityModalLabel">Add Facility</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('admin_facilities.store') }}" enctype="multipart/form-data">

                        @csrf
                        <div class="mb-3">
                            <label for="NamaFasilitas" class="form-label">Facility Name</label>
                            <input type="text" class="form-control" id="NamaFasilitas" name="NamaFasilitas" required>
                        </div>
                        <div class="mb-3">
                            <label for="Biaya" class="form-label">Price</label>
                            <input type="number" class="form-control" id="Biaya" name="Biaya" required>
                        </div>
                        <div class="mb-3">
                            <label for="Status" class="form-label">Facility Status</label>
                            <select class="form-control" id="Status" name="Status" required>
                                <option value="available">Available</option>
                                <option value="booked">Booked</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="Gambar" class="form-label">Facility Photo</label>
                            <input type="file" class="form-control" id="Gambar" name="Gambar" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Add Facility</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Edit Facility -->
    <div class="modal fade" id="editFacilityModal" tabindex="-1" aria-labelledby="editFacilityModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editFacilityModalLabel">Edit Facility</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('admin_facilities.update', ':IDFasilitas') }}"
                        id="editFacilityForm" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <input type="hidden" id="editFacilityId" name="IDFasilitas">

                        <div class="mb-3">
                            <label for="editNamaFasilitas" class="form-label">Facility Name</label>
                            <input type="text" class="form-control" id="editNamaFasilitas" name="NamaFasilitas" required>
                        </div>
                        <div class="mb-3">
                            <label for="editBiaya" class="form-label">Price</label>
                            <input type="number" class="form-control" id="editBiaya" name="Biaya" required>
                        </div>
                        <div class="mb-3">
                            <label for="editStatus" class="form-label">Facility Status</label>
                            <select class="form-control" id="editStatus" name="Status" required>
                                <option value="available">Available</option>
                                <option value="booked">Booked</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="editGambar" class="form-label">Facility Photo</label>
                            <input type="file" class="form-control" id="editGambar" name="Gambar">
                            <small class="form-text text-muted">Leave blank if you don't want to change the
                                photo.</small>
                        </div>

                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Delete Confirmation -->
    @foreach ($filteredFacilities as $facility)
        <div class="modal fade" id="deleteModal{{ $facility->IDFasilitas }}" tabindex="-1"
            aria-labelledby="deleteModalLabel" aria-hidden="true">

            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Delete Facility</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this facility?</p>
                        <form method="POST" action="{{ route('admin_facilities.destroy', $facility->IDFasilitas) }}">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script>
        document.querySelectorAll('.edit-facility').forEach(function(button) {
            button.addEventListener('click', function() {
                const facility = JSON.parse(this.getAttribute('data-facility')); // Ambil data fasilitas
                const form = document.getElementById('editFacilityForm');

                // Ganti action form dengan IDFasilitas dinamis
                form.action = "{{ route('admin_facilities.update', ':IDFasilitas') }}".replace(':IDFasilitas', facility
                    .IDFasilitas);

                // Isi input form modal edit
                document.getElementById('editFacilityId').value = facility.IDFasilitas;
                document.getElementById('editNamaFasilitas').value = facility.NamaFasilitas;
                document.getElementById('editBiaya').value = facility.Biaya;
                document.getElementById('editStatus').value = facility.Status;
            });
        });
    </script>
</body>

</html>
