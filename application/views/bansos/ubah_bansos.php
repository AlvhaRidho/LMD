<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php } ?>
            <?php foreach ($bansos as $b) { ?>
                <form action="<?= base_url('bansos/ubahBansos'); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="n_kk" name="n_kk" placeholder="Masukkan Nomor Kartu Keluarga" value="<?= $b['n_kk']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="nik_keke" name="nik_keke" placeholder="Masukkan Nik Kepala Keluarga" value="<?= $b['nik_keke']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="keke" name="keke" placeholder="Nama Kepala Keluarga" value="<?= $b['keke']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="alamat" name="alamat" placeholder="Alamat" value="<?= $b['alamat']; ?>">
                    </div>
                    <div class="form-group">
                        <?php
                        if (isset($b['swafoto'])) { ?>

                            <input type="hidden" name="old_pict" id="old_pict" value="<?= $b['swafoto']; ?>">

                            <picture>
                                <source srcset="" type="image/svg+xml">
                                <img src="<?= base_url('assets/img/upload/') . $b['swafoto']; ?>" class="rounded mx-auto mb-3 d-blok" alt="..." width="20%">
                            </picture>

                        <?php } ?>

                        <input type="file" class="form-control form-control-user" id="image" name="image">
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