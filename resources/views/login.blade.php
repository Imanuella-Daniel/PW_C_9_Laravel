<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BlueHaven_login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&display=swap" rel="stylesheet">

    <style>
        body,
        html {
            height: 100%;
            margin: 0;
        }

        .container-fluid {
            height: 100%;
        }

        .left-side {
            background-image: url("{{ asset('img/lobby.jpg') }}");
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: left;
            font-family: 'Inika', serif;
            position: relative;
        }

        .left-side::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            backdrop-filter: blur(8px);
            background-color: rgba(0, 0, 0, 0.4);
            z-index: 1;
        }

        .left-side>div {
            position: relative;
            z-index: 2;
        }

        .left-side h1 {
            font-size: 3rem;
            font-weight: bold;
        }

        .left-side h2 {
            font-size: 1.5rem;
            font-weight: normal;
        }

        .right-side {
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Inter', sans-serif;
        }

        .login-form {
            width: 100%;
            max-width: 600px;
            padding: 15px;
        }

        .login-form h2 {
            margin-bottom: 20px;
        }

        .form-control {
            margin-bottom: 10px;
        }

        .signin-btn {
            font-family: 'Inika', serif;
            background-color: #1965B3;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 8px;
            width: 100%;
            font-size: 16px;
        }

        .signin-btn:hover {
            background-color: #155494;
        }

        .form-text {
            text-align: right;
        }

        label {
            color: #000;
            opacity: 0.7;
            font-size: 12px;
            text-align: left;
            display: block;
        }

        .logo-container {
            display: flex;
            justify-content: left;
            margin-bottom: 10px;
        }

        .logo {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            object-fit: cover;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        .toast {
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1055;
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
        }

        .toast.show {
            opacity: 1;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row h-100">
            <div class="col-md-6 left-side">
                <div>
                    <div class="logo-container">
                        <img src="{{ asset('img/BLUE HAVEN.png') }}" alt="Blue Haven Logo" class="logo">
                    </div>
                    <h1>Welcome to<br>Blue Haven Hotel</h1>
                    <h2>A Modern Elegance in Simplicity</h2>
                </div>
            </div>
            <div class="col-md-6 right-side">
                <div class="login-form">
                    <h2>Sign in</h2>
                    <form id="login-form" action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="Username" name="Username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3 form-text">
                            <a href="#">Forget your password?</a>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <button type="submit" class="btn signin-btn">Sign in</button>
                            </div>
                        </div>
                        <div class="mt-3">

                            <p>Don't have an account? <a href= "{{ route('signup') }}">Sign up</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <footer class="footer">
        <div class="container">
            <span>© 2023 Blue Haven Hotel. All rights reserved.</span>
        </div>
    </footer>

    <div class="toast align-items-center text-bg-danger text-white" id="errorMessage" role="alert"
        aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                Username atau password salah.
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                aria-label="Close"></button>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
</body>

</html>
