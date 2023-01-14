<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- row ux-->
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2 bg-primary">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-white text-uppercase mb-1">Jumlah User</div>
                            <div class="h1 mb-0 font-weight-bold text-white"><?=$this->ModelUser->getUserWhere(['role_id' => 2])->num_rows(); ?></div>
                        </div>
                        <div class="col-auto">
                            <a href="<?= base_url('user/anggota'); ?>"><i class="fas fa-users fa-3x text-warning"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2 bg-warning">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-white text-uppercase mb-1">Jumlah Data Bansos</div>
                            <div class="h1 mb-0 font-weight-bold text-white"><?=$this->MBansos->getBansosWhere(['id_bansos'])->num_rows(); ?></div>
                        </div>

                        <div class="col-auto">
                            <a href="<?= base_url('buku'); ?>"><i class="fas fa-book fa-3x text-primary"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2 bg-danger">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-white text-uppercase mb-1">Jumlah Data E-KTP</div>
                            <div class="h1 mb-0 font-weight-bold text-white"><?=$this->ModelKTP->getKtpWhere(['id_ktp'])->num_rows(); ?></div>
                        </div>
                        <div class="col-auto">
                            <a href="<?= base_url('user'); ?>"><i class="fas fa-id-card fa-3x text-success"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2 bg-success">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-white text-uppercase mb-1">Jumlah Keluhan</div>
                            <div class="h1 mb-0 font-weight-bold text-white"><?=$this->ModelKeluhan->getKeluhanWhere(['id_keluhan'])->num_rows(); ?></div>
                        </div>
                        <div class="col-auto">
                            <a href="<?= base_url('keluhan'); ?>"><i class="fas fa-comment fa-3x text-danger"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row ux-->

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- row table-->
    <div class="row">

    <div class="table-responsive table-bordered col-sm-8 ml-auto mr-auto mt-2">
        <div class="page-header">
            <span class="fas fa-users text-primary mt-2 "> Data User</span>
            <a class="text-danger" href="<?php echo base_url('user/data_user'); ?>"><i class="fas fa-search mt-2 float-right"> Tampilkan</i></a>
        </div>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Anggota</th>
                    <th>Email</th>
                    <th>Role ID</th>
            </thead>
            <tbody>
            <?php
            $i = 1;
            foreach ($anggota as $a) { ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $a['nama']; ?></td>
                    <td><?= $a['email']; ?></td>
                    <td><?= $a['role_id']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>


</div>
 <!-- end of row table-->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
