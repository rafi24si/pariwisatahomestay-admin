<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Login | Pariwisata & Homestay</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        /* Fade in animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .fade-card {
            animation: fadeIn .7s ease-out;
        }

        .logo-anim {
            animation: fadeIn 1s ease-out;
        }

        /* Background gradient animation */
        @keyframes bgMove {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        body {
            background: linear-gradient(-45deg, #FDECEC, #FFF5F5, #FAD0D0, #FDECEC);
            background-size: 400% 400%;
            animation: bgMove 12s ease infinite;
            position: relative;
            overflow: hidden;
        }

        /* Floating particles */
        .particle {
            position: absolute;
            border-radius: 50%;
            background: rgba(255,255,255,0.4);
            animation: floatUp 8s infinite ease-in-out;
            filter: blur(3px);
        }

        @keyframes floatUp {
            0% { transform: translateY(0); opacity: .6; }
            50% { opacity: 1; }
            100% { transform: translateY(-80px); opacity: 0; }
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center">

    {{-- BACKGROUND PARTICLES --}}
    <span class="particle" style="width:50px; height:50px; left:10%; top:80%; animation-duration:10s;"></span>
    <span class="particle" style="width:35px; height:35px; left:70%; top:85%; animation-duration:12s;"></span>
    <span class="particle" style="width:45px; height:45px; left:50%; top:78%; animation-duration:9s;"></span>
    <span class="particle" style="width:25px; height:25px; left:30%; top:90%; animation-duration:11s;"></span>

    <div class="fade-card bg-white/90 backdrop-blur-xl p-8 rounded-2xl shadow-xl w-full max-w-md border border-red-100">

        {{-- LOGO BINA DESA --}}
        <div class="flex justify-center mb-4">
            <img src="{{ asset('assets/images/logo.png') }}"
                 alt="Logo Bina Desa"
                 class="w-48 logo-anim drop-shadow-xl">
        </div>

        <h2 class="text-3xl font-extrabold text-center mb-2" style="color:#C62828;">
            Selamat Datang 👋
        </h2>

        <p class="text-center text-gray-700 mb-6">
            Silakan masuk untuk melanjutkan
        </p>

        {{-- ERROR MESSAGE --}}
        @if (session('error'))
            <div class="mb-4 p-3 rounded bg-red-100 text-red-700 border border-red-300">
                {{ session('error') }}
            </div>
        @endif

        {{-- LOGIN FORM --}}
        <form action="{{ route('login.process') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block mb-1 font-semibold text-gray-700">Email</label>
                <input type="email" name="email" required
                    class="w-full border border-red-200 px-3 py-2 rounded-lg
                           focus:ring-2 focus:ring-red-400 focus:outline-none transition">
            </div>

            <div>
                <label class="block mb-1 font-semibold text-gray-700">Password</label>
                <input type="password" name="password" required
                    class="w-full border border-red-200 px-3 py-2 rounded-lg
                           focus:ring-2 focus:ring-red-400 focus:outline-none transition">
            </div>

            <button
                class="w-full py-2 rounded-lg font-semibold shadow-md hover:shadow-lg transition"
                style="background:#C62828; color:white; border-bottom:3px solid #8E0000;">
                Masuk
            </button>
        </form>

        {{-- GOOGLE LOGIN --}}
        <div class="my-5 flex items-center">
            <div class="flex-grow h-px bg-red-200"></div>
            <span class="px-3 text-gray-500 text-sm">atau</span>
            <div class="flex-grow h-px bg-red-200"></div>
        </div>

        {{-- REGISTER --}}
        <p class="text-center mt-5 text-gray-700">
            Belum punya akun?
            <a href="{{ route('register.form') }}" class="font-semibold hover:underline" style="color:#C62828;">
                Daftar
            </a>
        </p>
    </div>

</body>
</html>
