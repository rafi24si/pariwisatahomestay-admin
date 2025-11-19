<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets-admin/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets-admin/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets-admin/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets-admin/css/demo_1/style.css" />
    <link rel="shortcut icon" href="assets-admin/images/favicon.png" />
    <link rel="stylesheet" href="assets-admin/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets-admin/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets-admin/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets-admin/vendors/jquery-bar-rating/css-stars.css" />
    <link rel="stylesheet" href="assets-admin/vendors/font-awesome/css/font-awesome.min.css" />
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets-admin/css/demo_1/style.css" />
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets-admin/images/favicon.png" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@7.2.96/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">



    <style>
        /* === GLOBAL THEME BLUE SKY === */
        body {
            background: #e9f3ff;
            font-family: 'Poppins', sans-serif;
        }

        /* ==== SIDEBAR ==== */
        .sidebar {
            background: linear-gradient(180deg, #1a73e8, #4ea8ff);
            border-right: none;
        }

        .sidebar .nav-link {
            color: #fff;
            transition: 0.3s;
            border-radius: 8px;
        }

        .sidebar .nav-link:hover {
            background: rgba(255, 255, 255, 0.18);
            transform: scale(1.03);
        }

        .sidebar .menu-title {
            font-weight: 600;
        }

        .nav-profile-text span {
            color: #fff !important;
        }

        /* ===== SIDEBAR BASE ===== */
        .sidebar {
            width: 240px;
            height: 100vh;
            background: #0d6efd;
            /* biru admin */
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 70px;
            overflow-y: auto;
            transition: 0.35s ease;
            z-index: 999;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.25);
        }

        /* ===== CLOSED MODE ===== */
        .sidebar.closed {
            width: 70px;
        }

        /* ===== ITEM MENU ===== */
        .sidebar .nav-link {
            color: #fff;
            font-size: 15px;
            padding: 12px 18px;
            display: flex;
            align-items: center;
            white-space: nowrap;
            transition: 0.2s;
        }

        .sidebar .nav-link i {
            font-size: 21px;
            margin-right: 14px;
            transition: 0.3s;
        }

        /* ===== HOVER ===== */
        .sidebar .nav-link:hover {
            background: rgba(255, 255, 255, 0.15);
            padding-left: 25px;
            border-radius: 6px;
        }

        /* ICON SPIN ANIMATION ON HOVER */
        .sidebar .nav-link:hover i {
            transform: rotate(20deg) scale(1.1);
        }

        /* HIDE TEXT IF CLOSED */
        .sidebar.closed .nav-link span {
            display: none;
        }

        /* RESPONSIVE */
        @media(max-width: 990px) {
            .sidebar {
                left: -250px;
            }

            .sidebar.open {
                left: 0;
            }
        }


        /* NAV TOP */
        .navbar {
            background: #f8faff;
            border-bottom: 2px solid #d5e3ff;
        }

        .btn-danger {
            border-radius: 8px;
        }

        .btn-danger:hover {
            transform: scale(1.05);
        }

        /* ==== BUTTON ==== */
        .btn-primary {
            background: linear-gradient(135deg, #0066ff, #5ab6ff);
            border: none;
            transition: 0.3s;
            border-radius: 10px;
        }

        .btn-primary:hover {
            transform: scale(1.08);
            opacity: 0.9;
        }

        .btn-outline-primary {
            border-radius: 10px;
            border-color: #0066ff;
        }

        .btn-outline-primary:hover {
            background: #0066ff !important;
            color: #fff;
        }

        /* ==== SIDEBAR FIX ==== */
        .sidebar {
            width: 260px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: linear-gradient(90deg, #0099ff, #66ccff);
            overflow-y: auto;
            z-index: 9999;
            padding-top: 80px;
            transition: .3s ease;
        }

        /* Konten geser otomatis ke kanan */
        .content-wrapper {
            margin-left: 260px;
            transition: .3s ease;
        }

        /* ====== mode collapse ===== */
        .sidebar.closed {
            width: 80px;
        }

        .sidebar.closed .menu-text {
            display: none;
        }

        .content-wrapper.shifted {
            margin-left: 80px;
        }

        /* Biar konten tidak menimpa sidebar di layar kecil */
        @media(max-width: 992px) {
            .sidebar {
                left: -260px;
                /* tersembunyi */
            }

            .sidebar.open {
                left: 0;
            }

            .content-wrapper {
                margin-left: 0 !important;
            }
        }

        .navbar-menu-wrapper {
            background: linear-gradient(90deg, #0099ff, #66ccff) !important;
            display: flex;
            align-items: stretch;
            padding: 0 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: .3s ease;
        }



        /* Floating WhatsApp ( improved ) */
        .whatsapp-float {
            position: fixed;
            width: 67px;
            height: 67px;
            bottom: 25px;
            right: 25px;
            background: linear-gradient(145deg, #25d366, #20ba5a);
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 36px;
            color: #fff;
            z-index: 100;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            transition: 0.3s ease;
        }

        .whatsapp-float:hover {
            transform: scale(1.15);
            box-shadow: 0 0 18px rgba(37, 211, 102, 0.7);
        }

        /* Fade animation pada body */
        .main-panel,
        .card,
        .navbar,
        .sidebar {
            animation: fadeInUp 0.6s ease forwards;
            opacity: 0;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(15px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Untuk layar HP */
        @media (max-width: 768px) {
            .sidebar-wrapper {
                position: fixed;
                left: -260px;
                top: 0;
                height: 100vh;
                width: 260px !important;
                background: white;
                z-index: 9999;
                transition: all .3s ease;
            }

            .sidebar-wrapper.open {
                left: 0 !important;
            }

            /* Saat sidebar terbuka → konten tidak terdorong terlalu jauh */
            .content-wrapper {
                margin-left: 0 !important;
            }
        }

        /* SIDEBAR MODERN */
        .sidebar {
            width: 260px;
            background: #ffffff;
            height: 100vh;
            transition: all .3s ease;
            border-right: 1px solid #e6e6e6;
            position: fixed;
        }

        /* TOGGLE: SIDEBAR MENYEMPIT */
        .sidebar.collapsed {
            width: 80px;
        }

        .sidebar.collapsed .menu-title,
        .sidebar.collapsed .sub-item,
        .sidebar.collapsed .nav-profile-text {
            display: none;
        }

        .sidebar.collapsed .nav-profile-image img {
            width: 45px;
            height: 45px;
        }

        /* SUBITEM */
        .sub-item {
            padding-left: 40px;
            font-weight: 500;
            color: #333;
        }

        .sub-item:hover {
            background: #f3f3f3;
        }

        /* ROTATE ARROW */
        .rotate-icon {
            transition: .3s;
        }

        .menu-toggle.collapsed .rotate-icon {
            transform: rotate(-90deg);
        }

        /* TOGGLE BUTTON */
        .sidebar-toggle-btn {
            position: fixed;
            top: 15px;
            left: 270px;
            background: #ffffff;
            border: 1px solid #ddd;
            padding: 8px 12px;
            border-radius: 8px;
            cursor: pointer;
            transition: .3s;
            z-index: 999;
        }

        .sidebar.collapsed+.sidebar-toggle-btn {
            left: 90px;
        }

        /* SUPAYA CARD TIDAK KELUAR AREA */
        .content-wrapper {
            padding: 20px !important;
            overflow-x: hidden !important;
        }

        /* FIX GRID BOOTSTRAP SUPAYA RAPI */
        .row {
            margin-left: 0 !important;
            margin-right: 0 !important;
        }

        /* CARD TIDAK MENDORONG KE SAMPING */
        .feature-box,
        .card {
            width: 100%;
        }

        /* BATAS LEBAR HALAMAN SUPAYA TIDAK MELEBAR KE KANAN */
        .main-panel {
            max-width: 90% !important;
        }

        /* Feature card styles */
.feature-card {
  display: flex;
  flex-direction: column;
  height: 100%;
  background: #fff;
  border-radius: 12px;
  padding: 18px;
  box-shadow: 0 6px 18px rgba(16,24,40,0.06);
  border: 1px solid rgba(16,24,40,0.04);
  transition: transform .18s ease, box-shadow .18s ease;
  overflow: hidden;
}

.feature-card:hover {
  transform: translateY(-6px);
  box-shadow: 0 12px 30px rgba(16,24,40,0.08);
}

/* Header area: logo left, small icon right */
.feature-card-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 8px;
}

.feature-logo {
  width: 48px;
  height: 48px;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 10px;
  background: linear-gradient(135deg, rgba(0,0,0,0.02), rgba(0,0,0,0.01));
  box-shadow: inset 0 -1px 0 rgba(255,255,255,0.6);
}

/* small action icon (ke kiri pada desain lama) */
.feature-action i {
  font-size: 20px;
  opacity: 0.9;
}

/* Body takes available space so buttons align bottom */
.feature-card-body {
  flex: 1 1 auto;
  display: flex;
  flex-direction: column;
  justify-content: flex-start;
}

/* Footer aligned bottom */
.feature-card-footer {
  margin-top: 12px;
  display: flex;
  justify-content: flex-start;
  align-items: center;
  gap: 12px;
  border-top: 1px dashed rgba(16,24,40,0.03);
  padding-top: 12px;
}

.feature-card-footer .meta {
  font-size: 0.9rem;
  color: #475569;
}

/* Button full width and rounded */
.feature-card .btn {
  border-radius: 999px;
  padding: 8px 14px;
  font-weight: 600;
  box-shadow: none;
}

/* small responsive tweak if needed */
@media (max-width: 575.98px) {
  .feature-card { padding: 14px; }
  .feature-logo { width: 44px; height: 44px; }
}

    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- Sidebar -->
        <!-- SIDEBAR + TOGGLE BUTTON -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">

            <!-- PROFILE SECTION -->
            <ul class="nav">
                <li class="nav-item nav-profile border-bottom">
                    <a href="#" class="nav-link flex-column text-center">
                        <div class="nav-profile-image">
                            <img src="assets-admin/images/faces/face1.jpg" alt="profile" class="rounded-circle" />
                        </div>
                        <div class="nav-profile-text mt-2">
                            <span class="fw-bold text-dark">Muhammad Rafi</span>
                            <span class="text-secondary small d-block">Rp.32.000</span>
                        </div>
                    </a>
                </li>

                <!-- DASHBOARD -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.dashboard') }}">
                        <i class="bi bi-speedometer2 me-2 text-primary"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>

                <!-- WARGA -->
                <li class="nav-item">
                    <a class="nav-link menu-toggle d-flex justify-content-between align-items-center"
                        data-bs-toggle="collapse" href="#menuWarga">
                        <span><i class="bi bi-person-heart me-2 text-warning"></i> Warga</span>
                        <i class="bi bi-chevron-down rotate-icon"></i>
                    </a>

                    <div class="collapse menu-collapse" id="menuWarga">
                        <a href="{{ route('warga.index') }}" class="nav-link sub-item">
                            <i class="bi bi-people-fill text-primary me-2"></i> Data Warga
                        </a>

                        <a href="{{ route('warga.create') }}" class="nav-link sub-item">
                            <i class="bi bi-plus-circle-fill text-success me-2"></i> Tambah Data
                        </a>
                    </div>
                </li>

                <!-- DESTINASI -->
                <li class="nav-item">
                    <a class="nav-link menu-toggle d-flex justify-content-between align-items-center"
                        data-bs-toggle="collapse" href="#menuDestinasi">
                        <span><i class="bi bi-map-fill me-2 text-info"></i> Destinasi</span>
                        <i class="bi bi-chevron-down rotate-icon"></i>
                    </a>

                    <div class="collapse menu-collapse" id="menuDestinasi">
                        <a href="{{ route('destinasi.index') }}" class="nav-link sub-item">
                            <i class="bi bi-collection-fill text-primary me-2"></i> Data Destinasi
                        </a>

                        <a href="{{ route('destinasi.create') }}" class="nav-link sub-item">
                            <i class="bi bi-plus-circle-fill text-success me-2"></i> Tambah Destinasi
                        </a>
                    </div>
                </li>

                <!-- HOMESTAY -->
                <li class="nav-item">
                    <a class="nav-link menu-toggle d-flex justify-content-between align-items-center"
                        data-bs-toggle="collapse" href="#menuHomestay">
                        <span><i class="bi bi-house-fill me-2 text-primary"></i> Homestay</span>
                        <i class="bi bi-chevron-down rotate-icon"></i>
                    </a>

                    <div class="collapse menu-collapse" id="menuHomestay">
                        <a href="{{ route('homestay.index') }}" class="nav-link sub-item">
                            <i class="bi bi-collection-fill text-primary me-2"></i> Data Homestay
                        </a>

                        <a href="{{ route('homestay.create') }}" class="nav-link sub-item">
                            <i class="bi bi-plus-circle-fill text-success me-2"></i> Tambah Homestay
                        </a>
                    </div>
                </li>
            </ul>
        </nav>

        <!-- TOGGLE BUTTON (atas sidebar) -->
        <button id="sidebarToggle" class="sidebar-toggle-btn">
            <i class="bi bi-list"></i>
        </button>



        <!-- End Sidebar -->

        <!-- Main Content -->
        <div class="container-fluid page-body-wrapper">
            <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
                <div class="navbar-menu-wrapper d-flex align-items-stretch">
                    <ul class="navbar-nav navbar-nav-right">
                        <li class="nav-item nav-logout d-none d-md-block">
                            <form id="logoutForm" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="mdi mdi-logout"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="main-panel">
                <div class="content-wrapper pb-0">

                    <!-- SECTION: CARD WARGA / DESTINASI / HOMESTAY -->
                    <!-- Redesigned Cards with Logos -->
                    <div class="row mb-4 align-items-stretch">

                        <!-- CARD WARGA -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <article class="feature-card">
                                <div class="feature-card-header">
                                    <!-- Logo (SVG placeholder) -->
                                    <div class="feature-logo">
                                        <!-- Replace SVG with <img src="/path/to/logo-warga.png"> if needed -->
                                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none"
                                            aria-hidden>
                                            <circle cx="12" cy="8" r="3.2" stroke="#2563EB"
                                                stroke-width="1.5" />
                                            <path d="M4 20c0-3.2 3.6-5.6 8-5.6s8 2.4 8 5.6" stroke="#2563EB"
                                                stroke-width="1.5" stroke-linecap="round" />
                                        </svg>
                                    </div>
                                    <div class="feature-action">
                                        <i class="bi bi-people-fill"></i>
                                    </div>
                                </div>

                                <div class="feature-card-body">
                                    <h4 class="fw-bold mb-1">Data Warga</h4>
                                    <p class="text-muted small mb-3">Kelola informasi warga secara lengkap</p>
                                    <a href="{{ route('warga.index') }}" class="btn btn-primary btn-sm w-100">Lihat
                                        Data Warga</a>
                                </div>

                                <div class="feature-card-footer">
                                    <span class="meta">Total: <strong>124</strong></span>
                                </div>
                            </article>
                        </div>

                        <!-- CARD DESTINASI -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <article class="feature-card">
                                <div class="feature-card-header">
                                    <div class="feature-logo">
                                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none"
                                            aria-hidden>
                                            <path d="M12 2L20 8v10a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V8l7-6z"
                                                stroke="#10B981" stroke-width="1.5" stroke-linejoin="round" />
                                            <circle cx="12" cy="12" r="2" stroke="#10B981"
                                                stroke-width="1.2" />
                                        </svg>
                                    </div>
                                    <div class="feature-action">
                                        <i class="bi bi-map-fill"></i>
                                    </div>
                                </div>

                                <div class="feature-card-body">
                                    <h4 class="fw-bold mb-1">Data Destinasi</h4>
                                    <p class="text-muted small mb-3">Manajemen tempat wisata desa</p>
                                    <a href="{{ route('destinasi.index') }}"
                                        class="btn btn-success btn-sm w-100">Lihat Data Destinasi</a>
                                </div>

                                <div class="feature-card-footer">
                                    <span class="meta">Total: <strong>32</strong></span>
                                </div>
                            </article>
                        </div>

                        <!-- CARD HOMESTAY -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <article class="feature-card">
                                <div class="feature-card-header">
                                    <div class="feature-logo">
                                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none"
                                            aria-hidden>
                                            <path d="M3 11.5L12 4l9 7.5" stroke="#0EA5E9" stroke-width="1.5"
                                                stroke-linejoin="round" />
                                            <rect x="6" y="11.5" width="12" height="8" rx="1"
                                                stroke="#0EA5E9" stroke-width="1.2" />
                                        </svg>
                                    </div>
                                    <div class="feature-action">
                                        <i class="bi bi-house-fill"></i>
                                    </div>
                                </div>

                                <div class="feature-card-body">
                                    <h4 class="fw-bold mb-1">Data Homestay</h4>
                                    <p class="text-muted small mb-3">Kelola pemilik dan kamar homestay</p>
                                    <a href="{{ route('homestay.index') }}" class="btn btn-info btn-sm w-100">Lihat
                                        Data Homestay</a>
                                </div>

                                <div class="feature-card-footer">
                                    <span class="meta">Total: <strong>18</strong></span>
                                </div>
                            </article>
                        </div>

                    </div>


                    <!-- SECTION: TOTAL CARD -->
                    <div class="row g-4 mb-5">

                        <div class="col-md-4">
                            <div class="card shadow rounded-4 p-3 text-center">
                                <h5 class="fw-bold">Total Warga</h5>
                                <p class="display-6 fw-bold text-primary">124</p>
                                <a href="#" class="btn btn-primary btn-sm mt-2">Kelola Warga</a>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card shadow rounded-4 p-3 text-center">
                                <h5 class="fw-bold">Total Destinasi</h5>
                                <p class="display-6 fw-bold text-success">32</p>
                                <a href="#" class="btn btn-success btn-sm mt-2">Kelola Destinasi</a>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card shadow rounded-4 p-3 text-center">
                                <h5 class="fw-bold">Total Homestay</h5>
                                <p class="display-6 fw-bold text-warning">18</p>
                                <a href="#" class="btn btn-warning btn-sm mt-2">Kelola Homestay</a>
                            </div>
                        </div>

                    </div>

                    <!-- SECTION: FITUR ADMIN -->
                    <div class="row g-4">

                        <div class="col-md-3">
                            <div class="card shadow-sm p-3 text-center rounded-4">
                                <i class="bi bi-people-fill fs-2 text-primary"></i>
                                <h6 class="fw-bold mt-2">Manajemen User</h6>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card shadow-sm p-3 text-center rounded-4">
                                <i class="bi bi-gear-fill fs-2 text-secondary"></i>
                                <h6 class="fw-bold mt-2">Pengaturan Sistem</h6>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card shadow-sm p-3 text-center rounded-4">
                                <i class="bi bi-card-checklist fs-2 text-success"></i>
                                <h6 class="fw-bold mt-2">Laporan & Statistik</h6>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card shadow-sm p-3 text-center rounded-4">
                                <i class="bi bi-cloud-arrow-up-fill fs-2 text-info"></i>
                                <h6 class="fw-bold mt-2">Backup Data</h6>
                            </div>
                        </div>

                    </div>

                </div><!-- content-wrapper -->
            </div><!-- main-panel -->
        </div>
        !-- main-panel -->






        <!-- Floating WhatsApp -->
        <a href="https://wa.me/6281365782010?text=Halo%20Admin,%20saya%20ingin%20bertanya%20tentang%20Pariwisata."
            class="whatsapp-float" target="_blank">
            <i class="mdi mdi-whatsapp whatsapp-icon"></i>
        </a>

        <!-- JS -->
        <script src="assets-admin/vendors/js/vendor.bundle.base.js"></script>
        <script src="assets-admin/js/off-canvas.js"></script>
        <script src="assets-admin/js/misc.js"></script>

</body>

<script>
    const button = document.getElementById("toggleSidebar");
    const sidebar = document.querySelector(".sidebar-wrapper");

    button.addEventListener("click", () => {

        // Mobile mode
        if (window.innerWidth <= 768) {
            sidebar.classList.toggle("open");
            return;
        }

        // Desktop mode
        sidebar.classList.toggle("closed");
        document.querySelector(".content-wrapper").classList.toggle("shifted");
    });
</script>

<script>
    const sidebar = document.getElementById("sidebar");
    const toggleBtn = document.getElementById("sidebarToggle");

    toggleBtn.addEventListener("click", () => {
        sidebar.classList.toggle("collapsed");
    });
</script>


</html>
