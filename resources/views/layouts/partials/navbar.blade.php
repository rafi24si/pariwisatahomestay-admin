<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row shadow-sm">
    <div class="navbar-menu-wrapper d-flex align-items-stretch justify-content-between w-100 px-3">

        <!-- Tombol minimize sidebar -->
        <button class="navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-chevron-double-left text-primary"></span>
        </button>

        <!-- Brand -->
        <div class="d-flex align-items-center">
            <a class="navbar-brand brand-logo-mini" href="{{ route('admin.dashboard') }}">
                <img src="{{ asset('assets-admin/images/logo-mini.svg') }}" alt="logo" />
            </a>
        </div>

        <!-- Bagian kiri (pesan & notifikasi) -->
        <ul class="navbar-nav d-flex align-items-center">
            <!-- Messages -->
            <li class="nav-item dropdown mx-2">
                <a class="nav-link" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                    <i class="mdi mdi-email-outline"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-left navbar-dropdown preview-list"
                    aria-labelledby="messageDropdown">
                    <h6 class="p-3 mb-0 font-weight-semibold">Messages</h6>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <img src="{{ asset('assets-admin/images/faces/face1.jpg') }}" alt="image" class="profile-pic">
                        </div>
                        <div class="preview-item-content d-flex flex-column justify-content-center">
                            <h6 class="preview-subject mb-1">Mark send you a message</h6>
                            <p class="text-gray mb-0 small">1 minute ago</p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <h6 class="p-3 mb-0 text-center text-primary small">4 new messages</h6>
                </div>
            </li>

            <!-- Notifications -->
            <li class="nav-item dropdown mx-2">
                <a class="nav-link" id="notificationDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                    <i class="mdi mdi-bell-outline"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-left navbar-dropdown preview-list"
                    aria-labelledby="notificationDropdown">
                    <h6 class="px-3 py-3 font-weight-semibold mb-0">Notifications</h6>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-success">
                                <i class="mdi mdi-calendar"></i>
                            </div>
                        </div>
                        <div class="preview-item-content d-flex flex-column justify-content-center">
                            <h6 class="preview-subject mb-1">New order received</h6>
                            <p class="text-gray mb-0 small">45 sec ago</p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <h6 class="p-3 mb-0 text-center text-primary small">View all notifications</h6>
                </div>
            </li>
        </ul>

        <!-- Bagian kanan (status, bahasa, dan home) -->
        <ul class="navbar-nav navbar-nav-right d-flex align-items-center">
            <li class="nav-item d-none d-md-block mr-3">
                <span class="nav-link text-muted">Status: <strong>Active</strong></span>
            </li>

            <li class="nav-item d-none d-md-block mr-3">
                <button class="btn btn-sm btn-danger px-3">Trailing</button>
            </li>

            <!-- Language -->
            <li class="nav-item dropdown d-none d-md-block mr-3">
                <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown">
                    <div class="nav-profile-text">English</div>
                </a>
                <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                    <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-bl mr-2"></i> French</a>
                    <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-cn mr-2"></i> Chinese</a>
                    <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-de mr-2"></i> German</a>
                    <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-ru mr-2"></i> Russian</a>
                </div>
            </li>

            <!-- Home -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <i class="mdi mdi-home-circle text-primary"></i>
                </a>
            </li>
        </ul>

        <!-- Mobile Toggle -->
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
            data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>

    </div>
</nav>
