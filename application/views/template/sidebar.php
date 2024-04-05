<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <i class="fas fa-fw fa-truck fa-2x"></i>
                <div class="sidebar-brand-text mx-3">Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <?php
            $currentPage = $this->uri->segment(3);

            function isMenuItemActive($menuItem, $currentPage)
            {
                return $menuItem === $currentPage ? 'active' : '';
            }
            ?>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?php echo isMenuItemActive('index', $currentPage); ?>">
                <a class="nav-link" href="<?php echo base_url('admin/dashboard/index') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                #
            </div>

            <!-- Nav Item - Tables -->
            <li class="nav-item <?php echo isMenuItemActive('user', $currentPage); ?>">
                <a class="nav-link" href="<?php echo base_url('admin/dashboard/user') ?>">
                    <i class="fas fa-fw fa-user"></i>
                    <span>User</span></a>
            </li>
            <li class="nav-item <?php echo isMenuItemActive('kendaraan', $currentPage); ?>">
                <a class="nav-link" href="<?php echo base_url('admin/dashboard/kendaraan') ?>">
                    <i class="fas fa-fw fa-car"></i>
                    <span>Kendaraan</span></a>
            </li>
            <li class="nav-item <?php echo isMenuItemActive('driver', $currentPage); ?>">
                <a class="nav-link" href="<?php echo base_url('admin/dashboard/driver') ?>">
                    <i class="fas fa-fw fa-id-card"></i>
                    <span>Driver</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Heading -->
            <div class="sidebar-heading">
                #
            </div>

            <li class="nav-item <?php echo isMenuItemActive('pemesanan', $currentPage); ?>">
                <a class="nav-link" href="<?php echo base_url('admin/dashboard/pemesanan') ?>">
                    <i class="fas fa-fw fa-file-invoice"></i>
                    <span>Pemesanan</span></a>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-dark" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-dark" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Centered User Information -->
                        <div class="d-flex align-items-center">

                            <?php if ($this->session->userdata('username')) { ?>
                                <li class="nav-item dropdown no-arrow">
                                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $this->session->userdata('username') ?> </span>
                                        <img class="img-profile rounded-circle" src="<?php echo base_url() ?>assets/img/hiro_soma_fruits_basket.jpeg">
                                    </a>

                                    <!-- Dropdown - User Information -->
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                        <a class="dropdown-item" href="<?php echo base_url('auth/logout') ?>">
                                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Logout
                                        </a>
                                    </div>
                                </li>

                            <?php } else { ?>
                                <li>
                                    <?php echo anchor('auth/login', 'Login') ?>
                                </li>
                            <?php } ?>

                        </div>


                    </ul>
                </nav>
                <!-- End of Topbar -->