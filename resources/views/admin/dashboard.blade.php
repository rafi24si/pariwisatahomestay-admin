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
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- Sidebar -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">

                <!-- Profile -->
                <li class="nav-item nav-profile border-bottom">
                    <a href="#" class="nav-link flex-column">
                        <div class="nav-profile-image">
                            <img src="assets-admin/images/faces/face1.jpg" alt="profile" />
                        </div>
                        <div class="nav-profile-text d-flex ml-0 mb-3 flex-column">
                            <span class="font-weight-semibold mb-1 mt-2 text-center text-dark">Muhammad Rafi</span>
                            <span class="text-secondary icon-sm text-center">Rp.32.000</span>
                        </div>
                    </a>
                </li>

                <!-- Dashboard -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.dashboard') }}">
                        <i class="bi bi-speedometer2 me-2 text-primary"></i>
                        <span class="menu-title text-dark fw-semibold">Dashboard</span>
                    </a>
                </li>

                <!-- Tentang Kami dropdown -->
                <li class="nav-item">
                    <a class="nav-link d-flex justify-content-between align-items-center fw-bold"
                        data-bs-toggle="collapse" href="#aboutMenu" role="button">
                        <span class="d-flex align-items-center">
                            <i class="bi bi-person-heart me-2 text-warning"></i>
                            <span class="text-dark fw-semibold"> Warga</span>
                        </span>
                        <i class="bi bi-chevron-down rotate-icon text-dark"></i>
                    </a>

                    <div class="collapse ps-4 menu-collapse" id="aboutMenu">
                        <a href="{{ route('warga.index') }}" class="nav-link sub-item fw-semibold text-dark">
                            <i class="bi bi-people-fill me-1 text-primary"></i>
                            <i class=""></i>
                            Data Warga
                        </a>
                    </div>



                    <div class="collapse ps-4 menu-collapse" id="aboutMenu">
                        <a href="{{ route('warga.create') }}" class="nav-link sub-item fw-semibold text-dark">
                            <i class="bi bi-plus-circle-fill text-success me-2"></i> Tambah Data Warga
                        </a>
                    </div>
                </li>

                <!-- Data Homestay dropdown -->
                <li class="nav-item">
                    <a class="nav-link d-flex justify-content-between align-items-center fw-bold"
                        data-bs-toggle="collapse" href="#destinasiMenu" role="button">
                        <span class="d-flex align-items-center">
                            <i class="bi bi-map-fill me-2 text-info"></i>
                            <span class="text-dark fw-semibold">Destinasi</span>
                        </span>
                        <i class="bi bi-chevron-down rotate-icon text-dark"></i>
                    </a>

                    <div class="collapse ps-4 menu-collapse" id="destinasiMenu">
                        <a href="{{ route('destinasi.index') }}" class="nav-link sub-item fw-semibold text-dark">
                            <i class="bi bi-collection-fill me-2 text-primary"></i> Data Destinasi
                        </a>
                        <a href="{{ route('destinasi.create') }}" class="nav-link sub-item fw-semibold text-dark">
                            <i class="bi bi-plus-circle-fill text-success me-2"></i> Tambah Destinasi
                        </a>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link d-flex justify-content-between align-items-center fw-bold"
                        data-bs-toggle="collapse" href="#homestayMenu" role="button">
                        <span class="d-flex align-items-center">
                            <i class="bi bi-house-fill me-2-info"></i>
                            <span class="text-dark fw-semibold">Homestay</span>
                        </span>
                        <i class="bi bi-chevron-down rotate-icon text-dark"></i>
                    </a>

                    <div class="collapse ps-4 menu-collapse" id="homestayMenu">
                        <a href="{{ route('homestay.index') }}" class="nav-link sub-item fw-semibold text-dark">
                            <i class="bi bi-collection-fill me-2 text-primary"></i> Data Destinasi
                        </a>
                        <a href="{{ route('homestay.create') }}" class="nav-link sub-item fw-semibold text-dark">
                            <i class="bi bi-plus-circle-fill text-success me-2"></i> Tambah Homestay
                        </a>
                    </div>
                </li>

            </ul>
        </nav>

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
                    <div class="page-header flex-wrap">
                        <div class="header-left">
                            <button class="btn btn-primary mb-2 mb-md-0 mr-2"
                                onclick="window.location.href='/warga/create'">
                                Tambahkan Data Warga
                            </button>
                            <button class="btn btn-outline-primary bg-white mb-2 mb-md-0"
                                onclick="window.location.href='/destinasi'">
                                Tambah data Pariwisata & HomeStay
                            </button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-9 stretch-card grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title mb-0">Pendapatan HomeStay dan Pariwisata</div>
                                    <h3 class="font-weight-bold mb-0">Rp.23.543.032</h3>
                                    <p class="text-muted mt-2">Statistik pemasukan sementara</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-4 grid-margin">
                            <div class="card card-stat stretch-card mb-3">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div class="text-white">
                                            <h3 class="font-weight-bold mb-0">$168.90</h3>
                                            <h6>This Month</h6>
                                            <div class="badge badge-danger">23%</div>
                                        </div>
                                        <div class="flot-bar-wrapper">
                                            <div id="column-chart" class="flot-chart"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

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

</html>
