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
                        <a class="nav-link pb-0" href="<?= base_url('user/index'); ?>">
                            <i class="fa-inverse fa-fw fa book"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pb-0" href="<?= base_url('keluhan'); ?>">
                            <i class="fa fa-fw fa-comment "></i>
                            <span>Keluhan</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pb-0" href="<?= base_url('bansos'); ?>">
                            <i class="fa fa-fw fa book"></i>
                            <span>Bansos</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pb-0" href="<?= base_url('ktp'); ?>">
                            <i class="fa fa-fw fa-solid fa-id-card"></i>
                            <span>E-KTP</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pb-0" href="<?= base_url('user/help'); ?>">
                            <i class="fa fa-fw fa-solid fa-question-circle"></i>
                            <span>Bantuan</span>
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

