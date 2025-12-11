<div class="app-topstrip py-3 px-4 w-100 d-lg-flex align-items-center justify-content-between"
    style="background:#C62828; backdrop-filter:blur(6px); box-shadow:0 3px 12px rgba(0,0,0,0.2);">

    {{-- BAGIAN KIRI --}}
    <div class="d-flex align-items-center gap-4">

        {{-- LOGO --}}
        <a href="{{ route('dashboard') }}" class="d-flex align-items-center gap-2 text-white text-decoration-none">
            <img src="{{ asset('assets/images/logo.png') }}" style="width:55px;" class="drop-shadow-lg">
            <span class="fw-bold fs-5" style="letter-spacing:0.5px;">ADMIN PARIWISATA & HOMESTAY</span>
        </a>

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

    {{-- BAGIAN KANAN (DROPDOWN USER) --}}
    <div class="d-flex align-items-center gap-3">

        @if (session()->has('user_id'))

            <div class="dropdown">

                {{-- BUTTON --}}
                <button class="btn d-flex align-items-center gap-2 px-3 py-2 text-white"
                    style="background:rgba(255,255,255,0.15);
                           border:1px solid rgba(255,255,255,0.25);
                           backdrop-filter:blur(10px);
                           border-radius:10px;"
                    data-bs-toggle="dropdown">

                    <i class="ti ti-user-circle fs-4"></i>

                    <div class="text-start" style="line-height:1;">
                        <div class="fw-bold">{{ session('user_name') }}</div>
                        <small class="opacity-75">{{ ucfirst(session('role')) }}</small>
                    </div>

                    <i class="ti ti-chevron-down ms-1"></i>
                </button>

                {{-- DROPDOWN MENU FIX --}}
                <ul class="dropdown-menu dropdown-menu-end shadow-lg" style="border-radius:12px;">

                    <li>
                        <a href="{{ route('user.profil') }}"
                           class="dropdown-item d-flex align-items-center gap-2">
                            <i class="ti ti-user-edit"></i> Profil Saya
                        </a>
                    </li>
                    
                    <li><hr class="dropdown-divider"></li>

                    <li>
                        <a href="{{ route('logout') }}"
                           class="dropdown-item text-danger d-flex align-items-center gap-2"
                           onclick="return confirm('Keluar dari aplikasi?')">
                            <i class="ti ti-logout"></i> Keluar
                        </a>
                    </li>
                </ul>

            </div>

        @else
            <a href="{{ route('login.form') }}"
                class="btn btn-warning d-flex align-items-center gap-2 px-4"
                style="border-radius:10px;">
                <i class="ti ti-login fs-5"></i> Login
            </a>
        @endif

    </div>

</div>

{{-- NAV BAWAH --}}
<div class="d-flex align-items-center gap-2 px-4 py-2" style="background:#FDECEC; border-bottom:1px solid #f3d4d4;">
    <span class="fw-bold text-danger small">Panel Navigasi Cepat</span>
</div>

{{-- WAJIB AGAR DROPDOWN BOOTSTRAP BERFUNGSI --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
