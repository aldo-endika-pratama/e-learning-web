<!-- Begin page -->
<div id="wrapper">

    <!-- Topbar Start -->
    <div class="navbar-custom">
        <div class="container-fluid">
            <ul class="list-unstyled topnav-menu float-right mb-0">

                <li class="dropdown notification-list topbar-dropdown">
                    <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="fas fa-fw fa-user"></i>
                        <span class="pro-user-name ml-1">
                            <?= ucfirst($this->session->userdata('user_name')); ?> <i class="mdi mdi-chevron-down"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <!-- item-->
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Selamat Datang !</h6>
                        </div>

                        <div class="dropdown-divider"></div>

                        <!-- item-->
                        <a href="<?= base_url('login/logout') ?>" class="dropdown-item notify-item">
                            <i class="fe-log-out"></i>
                            <span>Logout</span>
                        </a>

                    </div>
                </li>

            </ul>

            <!-- LOGO -->
            <div class="logo-box">
                <a href="index.html" class="logo logo-dark text-center">
                    <span class="logo-sm">
                        <span class="logo-lg-text-light">E-L</span>
                    </span>
                    <span class="logo-lg">
                        <span class="logo-lg-text-light">E-Learning</span>
                    </span>
                </a>

                <a href="index.html" class="logo logo-light text-center">
                    <span class="logo-sm">
                        <span class="logo-lg-text-light">E-L</span>
                    </span>
                    <span class="logo-lg">
                        <span class="logo-lg-text-light">E-Learning</span>
                    </span>
                </a>
            </div>

            <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                <li>
                    <button class="button-menu-mobile waves-effect waves-light">
                        <i class="fe-menu"></i>
                    </button>
                </li>

                <li>
                    <!-- Mobile menu toggle (Horizontal Layout)-->
                    <a class="navbar-toggle nav-link" data-toggle="collapse" data-target="#topnav-menu-content">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a>
                    <!-- End mobile menu toggle-->
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- end Topbar -->

    <!-- ========== Left Sidebar Start ========== -->
    <div class="left-side-menu">

        <div class="h-100" data-simplebar>

            <!-- User box -->
            <div class="user-box text-center">
                <img src="../assets/images/users/user-1.jpg" alt="user-img" title="Mat Helme" class="rounded-circle avatar-md">
                <div class="dropdown">
                    <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block" data-toggle="dropdown">Geneva Kennedy</a>
                    <div class="dropdown-menu user-pro-dropdown">

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="fe-user mr-1"></i>
                            <span>My Account</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="fe-settings mr-1"></i>
                            <span>Settings</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="fe-lock mr-1"></i>
                            <span>Lock Screen</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="fe-log-out mr-1"></i>
                            <span>Logout</span>
                        </a>

                    </div>
                </div>
                <p class="text-muted">Admin Head</p>
            </div>

            <!--- Sidemenu -->
            <div id="sidebar-menu">

                <ul id="side-menu">

                    <li class="menu-title">Navigasi</li>

                    <li>
                        <a href="<?= base_url('beranda') ?>">
                            <i data-feather="airplay"></i>
                            <span> Beranda </span>
                        </a>
                    </li>

                    <li class="menu-title mt-2">Manajemen Materi</li>

                    <li>
                        <a href="<?= base_url('kategori') ?>">
                            <i data-feather="calendar"></i>
                            <span> Kategori Materi </span>
                        </a>
                    </li>

                    <li>
                        <a href="<?= base_url('materi') ?>">
                            <i data-feather="clipboard"></i>
                            <span> Daftar Materi </span>
                        </a>
                    </li>

                    <li class="menu-title mt-2">Manajemen Quiz</li>

                    <li>
                        <a href="<?= base_url('quiz') ?>">
                            <i data-feather="layers"></i>
                            <span> Daftar Quiz </span>
                        </a>
                    </li>

                    <li>
                        <a href="<?= base_url('soal') ?>">
                            <i data-feather="book-open"></i>
                            <span> Daftar Pertanyaan </span>
                        </a>
                    </li>

                    <li class="menu-title mt-2">Manajemen User</li>

                    <li>
                        <a href="<?= base_url('user') ?>">
                            <i data-feather="users"></i>
                            <span> Daftar User </span>
                        </a>
                    </li>

                </ul>

            </div>
            <!-- End Sidebar -->

            <div class="clearfix"></div>

        </div>
        <!-- Sidebar -left -->

    </div>
    <!-- Left Sidebar End -->