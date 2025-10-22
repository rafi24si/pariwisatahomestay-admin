<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | PlusAdmin</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #0048ff, #00c6ff);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-box {
            background: #fff;
            width: 420px;
            border-radius: 18px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.1);
            padding: 45px;
            animation: fadeUp 0.8s ease;
        }

        @keyframes fadeUp {
            from {opacity: 0; transform: translateY(30px);}
            to {opacity: 1; transform: translateY(0);}
        }

        .login-title {
            color: #0048ff;
            font-weight: 600;
            text-align: center;
            margin-bottom: 25px;
        }

        .form-control {
            border-radius: 10px;
            padding: 12px;
        }

        .btn-login {
            background: #0048ff;
            color: white;
            border: none;
            border-radius: 10px;
            padding: 12px;
            font-weight: 600;
            width: 100%;
            transition: 0.3s;
        }

        .btn-login:hover {
            background: #0036d1;
        }

        .floating-circle {
            position: absolute;
            width: 160px;
            height: 160px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            top: -60px;
            right: -60px;
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%,100% { transform: translateY(0); }
            50% { transform: translateY(15px); }
        }
    </style>
</head>
<body>
    <div class="floating-circle"></div>

    <div class="login-box">
<h2 class="text-center mb-1">Welcome to</h2>
<h1 class="text-center mb-3" style="color: #0048ff; font-weight: 700;">Bina Desa</h1>
<p class="login-title">Admin Login</p>

@if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Login Gagal:</strong> {{ $errors->first() }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <script>
        Swal.fire({
            icon: 'error',
            title: 'Login Gagal',
            text: '{{ $errors->first() }}',
            confirmButtonColor: '#0048ff'
        });
    </script>
@endif

<form action="{{ url('/auth/login') }}" method="POST" role="form" novalidate>
    @csrf

    <div class="mb-3">
        <label for="username" class="form-label fw-semibold">Username</label>
        <input
            id="username"
            name="username"
            type="text"
            class="form-control @error('username') is-invalid @enderror"
            placeholder="Masukkan username"
            value="{{ old('username') }}"
            required
            autocomplete="username"
            autofocus
            aria-describedby="usernameHelp"
        >
        @error('username')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="password" class="form-label fw-semibold">Password</label>
        <div class="input-group">
            <input
                id="password"
                name="password"
                type="password"
                class="form-control @error('password') is-invalid @enderror"
                placeholder="Masukkan password"
                required
                autocomplete="current-password"
                aria-label="Password"
            >
            <button class="btn btn-outline-secondary" type="button" id="togglePassword" aria-pressed="false" title="Tampilkan / sembunyikan kata sandi">Tampilkan</button>
        </div>
        @error('password')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label" for="remember">Ingat saya</label>
        </div>
        <a href="{{ url('/auth/forgot') }}" class="text-decoration-none small">Lupa password?</a>
    </div>

    <button type="submit" class="btn btn-login">Login</button>
</form>

<div class="text-center mt-4">
    <small class="text-muted">Masuk menggunakan akun admin yang terdaftar.</small>
</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    (function () {
        const toggle = document.getElementById('togglePassword');
        const pwd = document.getElementById('password');
        if (!toggle || !pwd) return;

        toggle.addEventListener('click', function () {
            const showing = pwd.type === 'text';
            pwd.type = showing ? 'password' : 'text';
            toggle.textContent = showing ? 'Tampilkan' : 'Sembunyikan';
            toggle.setAttribute('aria-pressed', String(!showing));
        });
    })();
</script>
</body>
</html>
