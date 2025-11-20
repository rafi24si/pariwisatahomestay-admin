<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Bina Desa</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #89f7fe, #66a6ff);
            min-height: 100vh;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        /* Floating circles background animation */
        .circle {
            position: absolute;
            border-radius: 50%;
            opacity: 0.25;
            background: white;
            animation: floatCircle 12s infinite ease-in-out;
        }

        .circle:nth-child(1) {
            width: 120px;
            height: 120px;
            top: 10%;
            left: 15%;
            animation-delay: 0s;
        }

        .circle:nth-child(2) {
            width: 200px;
            height: 200px;
            top: 60%;
            right: 10%;
            animation-delay: 2s;
        }

        .circle:nth-child(3) {
            width: 160px;
            height: 160px;
            bottom: 10%;
            left: 40%;
            animation-delay: 4s;
        }

        @keyframes floatCircle {

            0%,
            100% {
                transform: translateY(0);
                opacity: 0.3;
            }

            50% {
                transform: translateY(-25px);
                opacity: 0.6;
            }
        }

        /* Login box */
        .login-box {
            position: relative;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(12px);
            width: 420px;
            border-radius: 22px;
            box-shadow: 0 10px 35px rgba(0, 0, 0, 0.15);
            padding: 50px 40px;
            animation: fadeIn 0.9s ease forwards;
            transform: translateY(20px);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-box h1 {
            font-weight: 700;
            color: #66a6ff;
            letter-spacing: 1px;
            margin-bottom: 10px;
        }

        .login-title {
            color: #444;
            font-weight: 600;
            font-size: 1rem;
            margin-bottom: 20px;
            text-align: center;
        }

        .form-control {
            border-radius: 12px;
            padding: 12px;
            border: 1.5px solid #e0e0e0;
            transition: all 0.3s;
        }

        .form-control:focus {
            border-color: #66a6ff;
            box-shadow: 0 0 0 0.2rem rgba(102, 166, 255, 0.25);
        }

        .btn-login {
            background: linear-gradient(90deg, #66a6ff, #89f7fe);
            color: white;
            border: none;
            border-radius: 12px;
            padding: 12px;
            font-weight: 600;
            width: 100%;
            letter-spacing: 0.5px;
            transition: all 0.4s ease;
            box-shadow: 0 4px 10px rgba(102, 166, 255, 0.4);
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(102, 166, 255, 0.6);
        }

        .btn-outline-secondary {
            border-radius: 12px;
        }

        .text-muted small {
            color: #6c757d !important;
        }

        /* Glow animation on hover */
        .login-box:hover {
            box-shadow: 0 0 25px rgba(102, 166, 255, 0.4);
            transition: all 0.4s ease;
        }

        /* Floating text animation */
        .floating-text {
            animation: floatText 5s ease-in-out infinite;
        }

        @keyframes floatText {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-5px);
            }
        }

        .btn-google {
            background-color: #4285F4;
            color: white;
            border-radius: 5px;
            padding: 8px 12px;
            font-weight: 500;
            transition: background 0.3s;
        }

        .btn-google:hover {
            background-color: #357ae8;
            text-decoration: none;
            color: white;
        }

        .btn-github {
            background-color: #24292e;
            color: white;
            border-radius: 5px;
            padding: 8px 12px;
            font-weight: 500;
            transition: background 0.3s;
        }

        .btn-github:hover {
            background-color: #1b1f23;
            text-decoration: none;
            color: white;
        }

        .btn-register {
            background-color: #28a745;
            /* hijau */
            color: white;
            border-radius: 5px;
            padding: 8px 12px;
            font-weight: 500;
            transition: background 0.3s;
            text-decoration: none;
        }

        .btn-register:hover {
            background-color: #218838;
            text-decoration: none;
            color: white;
        }
    </style>
</head>

<body>
    <!-- Animated background circles -->
    <div class="circle"></div>
    <div class="circle"></div>
    <div class="circle"></div>

    <div class="login-box">
        <h2 class="text-center mb-1 floating-text">Welcome to</h2>
        <h1 class="text-center mb-3">Bina Desa</h1>
        <p class="login-title">Admin Login</p>

        @if ($errors->any())
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Login Gagal',
                    text: '{{ $errors->first() }}',
                    confirmButtonColor: '#66a6ff'
                });
            </script>
        @endif

        <form action="{{ url('/auth/login') }}" method="POST" role="form" novalidate>
            @csrf

            <div class="mb-3">
                <label for="username" class="form-label fw-semibold">Username</label>
                <input id="username" name="username" type="text"
                    class="form-control @error('username') is-invalid @enderror" placeholder="Masukkan username"
                    value="{{ old('username') }}" required autocomplete="username" autofocus>
                @error('username')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label fw-semibold">Password</label>
                <div class="input-group">
                    <input id="password" name="password" type="password"
                        class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan password"
                        required autocomplete="current-password">
                    <button class="btn btn-outline-secondary" type="button" id="togglePassword">👁</button>
                </div>
                @error('password')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">Ingat saya</label>
                </div>
                <a href="{{ url('/auth/forgot') }}" class="text-decoration-none small">Lupa password?</a>
            </div>

            <button type="submit" class="btn btn-login">Login</button>

            <div class="text-center mt-4">
                <p class="small text-muted">atau masuk dengan</p>

                <!-- Google -->
                <a href="{{ url('/auth/google') }}"
                    class="btn btn-google d-flex align-items-center justify-content-center mb-2">
                    <span class="me-2">
                        <!-- SVG Google G Logo -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 46 46">
                            <path fill="#4285F4" d="M23 23h23v23H23z" />
                            <path fill="#0F9D58" d="M0 23h23v23H0z" />
                            <path fill="#F4B400" d="M0 0h23v23H0z" />
                            <path fill="#DB4437" d="M23 0h23v23H23z" />
                        </svg>
                    </span>
                    Masuk dengan Google
                </a>

                <!-- GitHub -->
                <a href="{{ url('/auth/github') }}"
                    class="btn btn-github d-flex align-items-center justify-content-center">
                    <span class="me-2">
                        <!-- SVG GitHub Mark -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16"
                            fill="white">
                            <path
                                d="M8 0C3.58 0 0 3.58 0 8a8 8 0 005.47 7.59c.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49C3.71 14.09 3.29 12.81 3.29 12.81c-.36-.91-.88-1.15-.88-1.15-.72-.5.05-.49.05-.49.8.06 1.22.82 1.22.82.71 1.21 1.87.86 2.33.66.07-.52.28-.86.5-1.06-2.22-.25-4.56-1.11-4.56-4.95 0-1.09.39-1.98 1.03-2.68-.1-.25-.45-1.27.1-2.65 0 0 .84-.27 2.75 1.02A9.56 9.56 0 018 4.8a9.54 9.54 0 012.5.34c1.91-1.29 2.75-1.02 2.75-1.02.55 1.38.2 2.4.1 2.65.64.7 1.03 1.59 1.03 2.68 0 3.85-2.34 4.7-4.57 4.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.01 8.01 0 0016 8c0-4.42-3.58-8-8-8z" />
                        </svg>
                    </span>
                    Masuk dengan GitHub
                </a>
            </div>

            <div class="text-center mt-3">
                <p class="small text-muted">Belum punya akun?</p>
                <a href="{{ url('/register') }}"
                    class="btn btn-register d-flex align-items-center justify-content-center">
                    <i class="bi bi-pencil-square me-2"></i>
                    Daftar Sekarang
                </a>
            </div>
        </form>

        <div class="text-center mt-4">
            <small class="text-muted">Masuk menggunakan akun admin yang terdaftar.</small>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const toggle = document.getElementById('togglePassword');
        const pwd = document.getElementById('password');

        toggle.addEventListener('click', function() {
            const type = pwd.type === 'password' ? 'text' : 'password';
            pwd.type = type;
            toggle.textContent = type === 'password' ? '👁' : '🙈';
        });
    </script>
</body>

</html>
