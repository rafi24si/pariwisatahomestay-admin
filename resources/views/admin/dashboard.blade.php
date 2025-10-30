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

  <style>
    /* Floating WhatsApp Button */
    .whatsapp-float {
      position: fixed;
      width: 60px;
      height: 60px;
      bottom: 25px;
      right: 25px;
      background-color: #25d366;
      color: #fff;
      border-radius: 50%;
      text-align: center;
      font-size: 30px;
      box-shadow: 2px 2px 3px rgba(0, 0, 0, 0.3);
      z-index: 100;
      transition: transform 0.3s ease;
    }

    .whatsapp-float:hover {
      transform: scale(1.1);
      background-color: #20ba5a;
    }

    .whatsapp-icon {
      margin-top: 15px;
    }
  </style>
</head>

<body>
  <div class="container-scroller">

    <!-- Sidebar -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav">
        <li class="nav-item nav-profile border-bottom">
          <a href="#" class="nav-link flex-column">
            <div class="nav-profile-image">
              <img src="assets-admin/images/faces/face1.jpg" alt="profile" />
            </div>
            <div class="nav-profile-text d-flex ml-0 mb-3 flex-column">
              <span class="font-weight-semibold mb-1 mt-2 text-center">Muhammad Rafi</span>
              <span class="text-secondary icon-sm text-center">Rp.32.000</span>
            </div>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="mdi mdi-compass-outline menu-icon"></i>
            <span class="menu-title">Dashboard</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('warga.index') }}">
            <i class="mdi mdi-database menu-icon"></i>
            <span class="menu-title">Data Warga</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('warga.create') }}">
            <i class="mdi mdi-account-plus menu-icon"></i>
            <span class="menu-title">Tambahkan Data Warga</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('destinasi.index') }}">
            <i class="mdi mdi-image-filter-hdr menu-icon"></i>
            <span class="menu-title">Data Destinasi</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('destinasi.create') }}">
            <i class="mdi mdi-account-plus menu-icon"></i>
            <span class="menu-title">Data Destinasi</span>
          </a>
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
              <button class="btn btn-primary mb-2 mb-md-0 mr-2" onclick="window.location.href='/warga/create'">
                Tambahkan Data Warga
              </button>
              <button class="btn btn-outline-primary bg-white mb-2 mb-md-0" onclick="window.location.href='/destinasi'">
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
