<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BlueHaven_Profile</title>
    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #1965B3;
        }

        .navbar-container {
                width: 100%;
                display: flex;
                justify-content: center;
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

            .navbar ul li a:hover {
                color: red;
                background-color: transparent;
            }

            nav {
                display: flex;
                justify-content: space-between;
                align-items: center;
                height: 4rem;
            }
        
            nav a {
                color: #000;
                margin: 0 50px;
                font-family: 'Inika', serif;
                text-decoration: none;
                font-size: 1.3rem;
                font-weight: 500;
            }
            nav a.active {
                color: #3b82f6;
                border-bottom: 2px solid #3b82f6;
            }
       
        .logo {
            margin: 0 20px;
        }

        .logo img {
            height: 50px;
            width: auto;
            max-height: 100%;
        }

        .row {
            margin: 0 -10px;
            margin-top: 50px;
        }

        .sidebar {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            width: 250px;
            margin: 20px;
            height: 300px;
        }

        .content {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            margin: 20px;
            height: 650px;
        }

        .profile-pic {
            width: 100px;
            height: 100px;
            background-color: #d9d9d9;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 10px;
        }

        .profile-pic i {
            font-size: 50px;
            color: #a6a6a6;
        }

        .confirmed {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 5px;
        }

        .confirmed i {
            color: #4CAF50;
            margin-right: 5px;
        }

        .col-md-10 {
            margin-right: 40px; 
            margin-left: 10px; 
            padding: 0 15px;
            height: 1; /* Pastikan tinggi sesuai */
            flex: 1; /* Biarkan mengambil semua ruang yang tersedia */
        }
        .content {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            margin: 20px;
            min-height: 650px; /* Ubah height menjadi min-height */
            width: 100%; /* Pastikan lebar penuh */
        }


        .form-section {
            flex: 1;
        }

        .form-section h1 {
            font-size: 24px;
            color: #333;
        }

        .form-section p {
            font-size: 12px;
            color: #999;
        }

        .form-section .form-control {
            margin-bottom: 15px;
            border-radius: 5px;
        }

        .form-section .btn {
            width: 100%;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        .edit-btn {
            background-color: #F72585;
            color: #fff;
        }

        .logout-btn {
            background-color: #F72585;
            color: #fff;
        }

        label {
            opacity: 0.7;
            font-size: 12px;
            text-align: left;
            display: block;
        }

        footer {
            text-align: center;
            padding: 20px 0;
            background-color: #1965B3;
            color: #fff;
            position: relative;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="navbar-container">
        <nav class="navbar">
            <ul>
                <li><a href="{{ route('home_page') }}">Home</a></li>
                <li><a href="{{ route('accomodation') }}">Accommodation</a></li>
            </ul>
            <img src="{{ asset('img/BLUE.png') }}" alt="Logo Hotel" class="navbar-logo">
            <ul>
                <li><a href="{{ route('special_offers') }}">Special Offers</a></li>
                <li><a href="{{ route('profile') }}">Profile</a></li>
            </ul>
        </nav>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2" style ="padding-right: 25px">
                <div class="sidebar">
                    <div class="profile-pic">
                        <i class="fas fa-user"></i>
                    </div>
                    <p>Upload a Photo</p>
                    <h5>{{ $user->NamaDepan }}</h5>
                    <div class="confirmed">
                        <i class="fas fa-check"></i>
                        <span>Email Confirmed</span>
                    </div>
                    <div class="confirmed">
                        <i class="fas fa-check"></i>
                        <span>Mobile Confirmed</span>
                    </div>
                </div>
            </div>

            <div class="col-md-10">
                <div class="content d-flex flex-column flex-lg-row align-items-stretch">
                    <div class="form-section mb-4 mb-lg-0 me-lg-3" style="flex: 1;">
                        <h1><strong>Hello, {{ $user->NamaDepan }}</strong></h1>
                        <p>User Id: {{ $user->IDUser }}</p>
                        <form method="POST" action="{{ route('profile.update') }}">
                            @csrf
                            @method('PUT')

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label for="NamaDepan">First name</label>
                                    <input id="NamaDepan" class="form-control" placeholder="First name" type="text" value="{{ $user->NamaDepan }}" name="NamaDepan">
                                </div>
                                <div class="col-md-6">
                                    <label for="NamaBelakang">Last name</label>
                                    <input id="NamaBelakang" class="form-control" placeholder="Last name" type="text" value="{{ $user->NamaBelakang }}" name="NamaBelakang">
                                </div>
                            </div>

                            <label for="Email" class="mt-3">Email Address</label>
                            <input id="Email" class="form-control" placeholder="Email address" type="email" value="{{ $user->Email }}" name="Email">

                            <label for="NoTelepon" class="mt-3">Phone Number</label>
                            <input id="NoTelepon" class="form-control" placeholder="Phone Number" type="text" value="{{ $user->NoTelepon }}" name="NoTelepon">

                            <label for="Negara" class="mt-3">Country</label>
                            <input id="Negara" class="form-control" placeholder="Country" type="text" value="{{ $user->Negara }}" name="Negara">

                            <label for="Alamat" class="mt-3">Detail Address</label>
                            <textarea id="Alamat" class="form-control" placeholder="Detail Address" name="Alamat">{{ $user->Alamat }}</textarea>

                            <label for="Username" class="mt-3">Username</label>
                            <input id="Username" class="form-control" placeholder="Username" type="text" value="{{ $user->Username }}" name="Username">

                            <div class="row mt-1">
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary me-2 mb-2">Save Changes</button>
                                </div>
                                <div class="col-auto">
                                    <button class="btn logout-btn mb-2" type="button">Logout</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="image-section text-center">
                        <img src="{{ asset('img/Illustration.png') }}" class="img-fluid" alt="Illustration" style="max-height: 350px;">
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


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
