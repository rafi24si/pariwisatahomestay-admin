<div class="app-topstrip py-3 px-4 w-100 d-lg-flex align-items-center justify-content-between"
     style="background:#C62828; backdrop-filter:blur(6px); box-shadow:0 3px 12px rgba(0,0,0,0.2);">

    {{-- ============================
        BAGIAN KIRI (LOGO + TITLE)
    ============================= --}}
    <div class="d-flex align-items-center gap-4">

        {{-- LOGO --}}
        <a href="{{ route('dashboard') }}" class="d-flex align-items-center gap-2 text-white text-decoration-none">
            <img src="{{ asset('assets/images/logo.png') }}"
                 style="width:55px;"
                 class="drop-shadow-lg">

            <span class="fw-bold fs-5" style="letter-spacing:0.5px;">
                ADMIN PARIWISATA & HOMESTAY
            </span>
        </a>

        {{-- MENU TAMBAHAN --}}
        <div class="d-none d-xl-flex align-items-center gap-2">

            <a href="#" class="btn btn-sm px-3 py-1 text-white"
               style="background:rgba(255,255,255,0.18); border-radius:8px;">
                <i class="ti ti-lifebuoy fs-5"></i> Bantuan
            </a>

            <a href="#" class="btn btn-sm px-3 py-1 text-white"
               style="background:rgba(255,255,255,0.18); border-radius:8px;">
                <i class="ti ti-gift fs-5"></i> Template
            </a>

            <a href="#" class="btn btn-sm px-3 py-1 text-white"
               style="background:rgba(255,255,255,0.18); border-radius:8px;">
                <i class="ti ti-briefcase fs-5"></i> Layanan
            </a>

        </div>

    </div>



    {{-- =====================================
         BAGIAN KANAN (LOGIN / USER INFO)
    ====================================== --}}
    <div class="d-flex align-items-center gap-3">

        @if(session()->has('user_id'))

            {{-- USER BOX --}}
            <div class="px-3 py-2 rounded-3 text-white"
                 style="background:rgba(255,255,255,0.15); border:1px solid rgba(255,255,255,0.25); backdrop-filter:blur(10px);">

                <div class="fw-bold d-flex align-items-center gap-2">
                    <i class="ti ti-user-circle fs-5"></i> {{ session('user_name') }}
                </div>

                <div class="small opacity-75 ms-4">
                    {{ ucfirst(session('role')) }} • Terakhir login: {{ session('last_login') }}
                </div>
            </div>

            {{-- LOGOUT --}}
            <a href="{{ route('logout') }}"
               class="btn px-4 d-flex align-items-center gap-2"
               style="background:#8E0000; color:white; border-radius:10px;">
                <i class="ti ti-logout fs-5"></i> Keluar
            </a>

        @else

            {{-- LOGIN BUTTON --}}
            <a href="{{ route('login.form') }}"
               class="btn btn-warning d-flex align-items-center gap-2 px-4"
               style="border-radius:10px;">
                <i class="ti ti-login fs-5"></i> Login
            </a>

        @endif

    </div>
</div>


{{-- ===============================
     BAGIAN BAWAH HEADER (OPTIONAL)
================================ --}}
<div class="d-flex align-items-center gap-2 px-4 py-2"
     style="background:#FDECEC; border-bottom:1px solid #f3d4d4;">

    <span class="fw-bold text-danger small">Panel Navigasi Cepat</span>

    {{-- Bisa tambahkan dropdown atau menu kecil --}}
</div>
