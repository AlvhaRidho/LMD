<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php } ?>
            <?php foreach ($warga as $b) { ?>
                <form action="<?= base_url('warga/ubahWarga'); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="no_kk" name="no_kk" placeholder="Masukkan Nomor Kartu Keluarga" value="<?= $b['no_kk']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="alamat" name="alamat" placeholder="Alamat" value="<?= $b['alamat']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="nama_keke" name="nama_keke" placeholder="Masukkan Nama Kepala Keluarga" value="<?= $b['nama_keke']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="j_anggota" name="j_anggota" placeholder="Jumlah Anggota Keluarga" value="<?= $b['j_anggota']; ?>">
                    </div>
                    <div class="form-group">
                        <?php
                        if (isset($b['gmbr_kk'])) { ?>

                            <input type="hidden" name="old_pict" id="old_pict" value="<?= $b['gmbr_kk']; ?>">

                            <picture>
                                <source srcset="" type="image/svg+xml">
                                <img src="<?= base_url('assets/img/upload/') . $b['gmbr_kk']; ?>" class="rounded mx-auto mb-3 d-blok" alt="..." width="20%">
                            </picture>

                        <?php } ?>

                        <input type="file" class="form-control form-control-user" id="gmbr_kk" name="gmbr_kk">
                    </div>
                    <div class="form-group">
                        <input type="button" class="form-control form-control-user btn btn-dark col-lg-3 mt-3" value="Kembali" onclick="window.history.go(-1)">
                        <input type="submit" class="form-control form-control-user btn btn-primary col-lg-3 mt-3" value="Update">
                    </div>
                </form>
            <?php } ?>
        </div>
    </div>
</div>