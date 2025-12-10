<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Register | Pariwisata & Homestay</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .fade-card { animation: fadeIn .6s ease-out; }
    </style>
</head>

<body class="bg-gradient-to-br from-red-50 via-white to-red-100 min-h-screen flex items-center justify-center">

    <div class="fade-card bg-white/90 backdrop-blur-xl p-8 rounded-2xl shadow-xl w-full max-w-md border border-red-100">

        {{-- TITLE --}}
        <h2 class="text-3xl font-extrabold text-center mb-2" style="color:#C62828;">
            Daftar Akun Baru
        </h2>

        <p class="text-center text-gray-700 mb-6">
            Buat akun untuk mengakses sistem pariwisata & homestay
        </p>

        {{-- FORM --}}
        <form action="{{ route('register.process') }}" method="POST" class="space-y-4">
            @csrf

            {{-- Nama --}}
            <div>
                <label class="block mb-1 font-semibold text-gray-700">Nama Lengkap</label>
                <input type="text" name="name" required
                       class="w-full border border-red-200 px-3 py-2 rounded-lg
                              focus:ring-2 focus:ring-red-400 focus:outline-none transition">
            </div>

            {{-- Email --}}
            <div>
                <label class="block mb-1 font-semibold text-gray-700">Email</label>
                <input type="email" name="email" required
                       class="w-full border border-red-200 px-3 py-2 rounded-lg
                              focus:ring-2 focus:ring-red-400 focus:outline-none transition">
            </div>

            {{-- Password --}}
            <div>
                <label class="block mb-1 font-semibold text-gray-700">Password</label>
                <input type="password" name="password" required minlength="6"
                       class="w-full border border-red-200 px-3 py-2 rounded-lg
                              focus:ring-2 focus:ring-red-400 focus:outline-none transition">
            </div>

            {{-- Role --}}
            <div>
                <label class="block mb-1 font-semibold text-gray-700">Role</label>
                <select name="role" required
                        class="w-full border border-red-200 px-3 py-2 rounded-lg bg-white
                               focus:ring-2 focus:ring-red-400 focus:outline-none transition">
                    <option value="admin">Admin</option>
                    <option value="petugas" selected>Petugas</option>
                </select>
            </div>

            {{-- Submit --}}
            <button
                class="w-full py-2 rounded-lg font-semibold shadow-md hover:shadow-lg transition"
                style="background:#C62828; color:white; border-bottom:3px solid #8E0000;">
                Daftar
            </button>

        </form>

        {{-- LOGIN LINK --}}
        <p class="text-center mt-5 text-gray-700">
            Sudah punya akun?
            <a href="{{ route('login.form') }}" class="font-semibold hover:underline" style="color:#C62828;">
                Login
            </a>
        </p>

    </div>

</body>
</html>
