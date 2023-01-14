    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">
    
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="">LMD</i>
            </div>
            <div class="sidebar-brand-text mx-3">Layanan Masyarakat Desa</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Looping Menu-->
        
            <!-- Heading -->
            <div class="sidebar-heading">
                Master Data
            </div>

                <!-- Nav Item - Dashboard -->
                <li class="nav-item active">
                    <!-- Nav Item - Dashboard -->
                    <li class="nav-item">
                        <a class="nav-link pb-0" href="<?= base_url('admin'); ?>">
                            <i class="fa-inverse fa-fw fa book"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pb-0" href="<?= base_url('warga'); ?>">
                            <i class="fa-inverse fa-fw fa book"></i>
                            <span>Data Warga</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pb-0" href="<?= base_url('user/data_user'); ?>">
                            <i class="fa fa-fw  fa-users"></i>
                            <span>Data User</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pb-0" href="<?= base_url('bansos/data_bansos'); ?>">
                            <i class="fa fa-fw fa book"></i>
                            <span>Data Bansos</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pb-0" href="<?= base_url('ktp/data_ktp'); ?>">
                            <i class="fa fa-fw fa-solid fa-id-card"></i>
                            <span>Data E-KTP</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pb-0" href="<?= base_url('keluhan/data_keluhan'); ?>">
                            <i class="fa fa-fw fa-solid fa-comment"></i>
                            <span>Data Keluhan</span>
                        </a>
                    </li>
                </li>
            <!-- Divider -->
            <hr class="sidebar-divider mt-3">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -- > 

