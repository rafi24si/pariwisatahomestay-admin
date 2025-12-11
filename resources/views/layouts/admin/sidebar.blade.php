<aside class="left-sidebar" style="background:#fff; border-right:1px solid #f1f1f1;">

    <div>

        {{-- LOGO --}}
        <div class="brand-logo text-center py-4 border-bottom" style="background:#fff;">
            <a href="{{ route('dashboard') }}" class="text-nowrap logo-img d-block">
                <img src="{{ asset('assets/images/logos/logo.png') }}" alt="Logo" style="width:120px;"
                    class="drop-shadow-lg">
            </a>
        </div>

        {{-- USER PROFILE --}}
        @if (session()->has('user_id'))
            @php
                $user = \App\Models\User::with('fotoProfil')->find(session('user_id'));
                $foto = $user?->fotoProfil?->file_url
                    ? asset('storage/' . $user->fotoProfil->file_url)
                    : 'https://ui-avatars.com/api/?name=' .
                        urlencode($user->name) .
                        '&background=C62828&color=fff&size=90&rounded=true';
            @endphp

            <div class="sidebar-profile text-center py-4 px-3">

                {{-- Avatar / Foto Profil --}}
                <img src="{{ $foto }}" class="rounded-circle shadow mb-2" width="80" height="80"
                    style="object-fit: cover;">

                {{-- Nama User --}}
                <h6 class="fw-bold mb-0">
                    {{ $user->name }}
                </h6>

                {{-- Role --}}
                <span class="badge" style="background:#C62828; color:white; padding:5px 12px; border-radius:8px;">
                    {{ ucfirst($user->role) }}
                </span>

                <hr class="mt-3">
            </div>
        @endif


        {{-- NAVIGATION --}}
        <nav class="sidebar-nav scroll-sidebar px-2" data-simplebar="">
            <ul id="sidebarnav">

                {{-- TITLE --}}
                <li class="nav-small-cap mt-3 mb-2">
                    <span class="fw-bold text-muted small">MENU UTAMA</span>
                </li>

                {{-- MENU ITEM --}}
                <li class="sidebar-item mb-1">
                    <a class="sidebar-link d-flex align-items-center py-2 px-3 rounded hover-menu"
                        href="{{ route('dashboard') }}">
                        <iconify-icon icon="solar:atom-line-duotone" class="me-3" width="20"></iconify-icon>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item mb-1">
                    <a class="sidebar-link d-flex align-items-center py-2 px-3 rounded hover-menu"
                        href="{{ route('user.index') }}">
                        <iconify-icon icon="solar:users-group-rounded-line-duotone" class="me-3"
                            width="20"></iconify-icon>
                        <span>Users</span>
                    </a>
                </li>

                <li class="sidebar-item mb-1">
                    <a class="sidebar-link d-flex align-items-center py-2 px-3 rounded hover-menu"
                        href="{{ route('warga.index') }}">
                        <iconify-icon icon="solar:users-group-two-rounded-line-duotone" class="me-3"
                            width="20"></iconify-icon>
                        <span>Warga</span>
                    </a>
                </li>

                <li class="sidebar-item mb-1">
                    <a class="sidebar-link d-flex align-items-center py-2 px-3 rounded hover-menu"
                        href="{{ route('destinasi.index') }}">
                        <iconify-icon icon="solar:map-point-bold-duotone" class="me-3" width="20"></iconify-icon>
                        <span>Destinasi</span>
                    </a>
                </li>

                <li class="sidebar-item mb-1">
                    <a class="sidebar-link d-flex align-items-center py-2 px-3 rounded hover-menu"
                        href="{{ route('homestay.index') }}">
                        <iconify-icon icon="material-symbols:home-work-rounded" class="me-3"
                            width="20"></iconify-icon>
                        <span>Homestay</span>
                    </a>
                </li>

                <li class="sidebar-item mb-1">
                    <a class="sidebar-link d-flex align-items-center py-2 px-3 rounded hover-menu"
                        href="{{ route('kamar.index') }}">
                        <iconify-icon icon="material-symbols:meeting-room-rounded" class="me-3"
                            width="20"></iconify-icon>
                        <span>Kamar Homestay</span>
                    </a>
                </li>

                <li class="sidebar-item mb-1">
                    <a class="sidebar-link d-flex align-items-center py-2 px-3 rounded hover-menu"
                        href="{{ route('booking.index') }}">
                        <iconify-icon icon="solar:calendar-bold-duotone" class="me-3" width="20"></iconify-icon>
                        <span>Booking Homestay</span>
                    </a>
                </li>

                <li class="sidebar-item mb-1">
                    <a class="sidebar-link d-flex align-items-center py-2 px-3 rounded hover-menu"
                        href="{{ route('ulasan.index') }}">
                        <iconify-icon icon="solar:star-bold-duotone" width="20" class="me-3"></iconify-icon>
                        <span>Ulasan Wisata</span>
                    </a>
                </li>



            </ul>
        </nav>

    </div>

</aside>

{{-- STYLE TAMBAHAN --}}
<style>
    .hover-menu:hover {
        background: #C62828 !important;
        color: #fff !important;
    }

    .hover-menu:hover iconify-icon {
        color: #fff !important;
    }

    .sidebar-link {
        color: #444 !important;
        font-weight: 500;
        transition: .2s ease;
    }
</style>
