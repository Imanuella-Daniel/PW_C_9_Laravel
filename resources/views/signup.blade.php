<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BlueHaven_Signup</title>

    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            font-family: 'Inter', sans-serif;
            background-color: rgba(0, 0, 0, 0.6);
        }

        .background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url("{{ asset('img/lobby.jpg') }}");
            background-size: cover;
            background-position: center;
            filter: blur(10px);
            z-index: -1;
        }

        .content {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            margin: 20px;
            flex: 1;
            color: black;
            text-align: center;
            z-index: 1;
        }

        .form-section {
            flex: 1;
        }

        .form-section h2 {
            font-size: 24px;
            color: #333;
            text-align: left;
        }

        .form-section p {
            font-size: 12px;
            color: #999;
            text-align: left;
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

        .btn-pink {
            background-color: #1965B3;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 8px;
            font-size: 16px;
        }

        .btn-pink:hover {
            background-color: #155494;
        }

        label {
            color: #000;
            opacity: 0.7;
            font-size: 12px;
            text-align: left;
            display: block;
        }

        footer {
            background-color: #1965B3;
            color: white;
            text-align: center;
            padding: 20px;
            position: relative;
            margin-top: 130px;
        }
    </style>
</head>

<body>
    <div class="background"></div>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="content d-flex align-items-center justify-content-between">
                    <div class="form-section">
                        <h2>Create an Account</h2>
                        <p>Already have an account? <a href="{{ route('login') }}" class="link-opacity-10-hover">Log
                                in</a></p>
                        <form method="POST" action="{{ route('signup.submit') }}">
                            @csrf
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label>First name</label>
                                    <input class="form-control" name="NamaDepan" type="text" value=""
                                        required />
                                </div>
                                <div class="col-md-6">
                                    <label>Last name</label>
                                    <input class="form-control" name="NamaBelakang" type="text" value=""
                                        required />
                                </div>
                            </div>
                            <label>Email Address</label>
                            <input class="form-control" name="Email" type="email" value="" required />
                            <label for="phone">Phone Number</label>
                            <div class="input-group">
                                <select class="form-select" name="Negara" style="width: 50px; height: 38px;">
                                    <option value="+62" selected>+62</option>
                                    <option value="+1">+1</option>
                                    <option value="+44">+44</option>
                                </select>
                                <input class="form-control" name="NoTelepon" type="text" value="" required />
                            </div>
                            <label>Country</label>
                            <input class="form-control" name="Negara" type="text" value="" required />
                            <label>Detail Address</label>
                            <textarea class="form-control" name="Alamat" value="" required></textarea>
                            <label>Username</label>
                            <input class="form-control" name="Username" type="text" value="" required />
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label>Password</label>
                                    <input class="form-control" name="password" type="password" value=""
                                        required />
                                </div>
                                <div class="col-md-6">
                                    <label>Confirm your password</label>
                                    <input class="form-control" name="password_confirmation" type="password"
                                        value="" required />
                                </div>
                            </div>
                            <label>Use 8 or more characters with a mix of letters, numbers & symbols</label>

                            <div class="row mt-3">
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-pink w-100">Create an Account</button>
                                </div>
                            </div>
                        </form>

                    </div>

                    <div class="col-md-4 text-center">
                        <img src="{{ asset('img/Illustration.png') }}" class="img-fluid" style="max-height: 350px;" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="container">
            <span>© 2023 Blue Haven Hotel. All rights reserved.</span>
        </div>
    </footer>

    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-xnxU4LncQ6ZHlAz1KCBq2IZ5r8oVoBX4GuLQ8mZRUflHk8KEnKU+WLV+XwQq3eSQ" crossorigin="anonymous">
    </script>
</body>

</html>
