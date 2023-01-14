<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-8">
            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php } ?>
            <?php foreach ($keluhan as $b) { ?>
                <form action="<?= base_url('keluhan/ubah'); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" name="id_keluhan" id="id_keluhan" value="<?php echo $b['id_keluhan']; ?>">
                        <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Masukkan Nama Lengkap" value="<?= $b['nama']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="alamat" name="alamat" placeholder="Masukkan Alamat Lengkap" value="<?= $b['alamat']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="no_telp" name="no_telp" placeholder="Masukkan Nomor Headphone" value="<?= $b['no_telp']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="textareas" row="3" class="form-control form-control-user" id="keluhan" name="keluhan" placeholder="Masukkan Keluhan yang ingin disampaikan" value="<?= $b['keluhan']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" row="3" class="form-control form-control-user" id="status" name="status" value="<?= $b['status']; ?>" readonly>
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