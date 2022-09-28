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
                        <a href="<?= base_url('front/dashboard/logout') ?>" class="dropdown-item notify-item">
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

    <div class="topnav shadow-lg">
        <div class="container-fluid">
            <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

                <div class="collapse navbar-collapse" id="topnav-menu-content">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="<?= base_url('front/dashboard') ?>" id="topnav-dashboard" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="fe-airplay mr-1"></i> Dashboard
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link" href="<?= base_url('front/materi') ?>" id="topnav-apps" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="fe-grid mr-1"></i> Materi
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link" href="<?= base_url('front/quiz') ?>" id="topnav-ui" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="fe-briefcase mr-1"></i> Quiz
                            </a>
                        </li>
                    </ul> <!-- end navbar-->
                </div> <!-- end .collapsed-->
            </nav>
        </div> <!-- end container-fluid -->
    </div> <!-- end topnav-->