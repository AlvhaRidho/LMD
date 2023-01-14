<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php } ?>
            <?php foreach ($ktp as $b) { ?>
                <form action="<?= base_url('ktp/ubahKtp'); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" name="id_ktp" id="id_ktp" value="<?php echo $b['id_ktp']; ?>">
                        <input type="text" class="form-control form-control-user" id="nik" name="nik" placeholder="Masukkan Nik" value="<?= $b['nik']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder=" Nama Lengkap" value="<?= $b['nama']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="temlah" name="temlah" placeholder="Tempat Lahir" value="<?= $b['temlah']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="date" class="form-control form-control-user" id="tgl_lahir" name="tgl_lahir" value="<?= $b['tgl_lahir']; ?>">
                    </div>
                    <div class="form-group">
                        <select id="j_kelamin" name="j_kelamin" class="form-control form-control-user" value="<?= $b['j_kelamin']; ?>">
                            <option>Jenis Kelamin</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select id="g_darah" name="g_darah" class="form-control form-control-user" value="<?= $b['g_darah']; ?>">
                            <option>Golongan Darah</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="AB">AB</option>
                            <option value="O">O</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="alamat" name="alamat" placeholder="Alamat" value="<?= $b['alamat']; ?>">
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control py-4" id="rt" name="rt" placeholder="RT" value="<?= $b['rt']; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control py-4" id="rw" name="rw" placeholder="RW" value="<?= $b['rw']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="kel_desa" name="kel_desa" placeholder="Kel/Desa" value="<?= $b['kel_desa']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="kec" name="kec" placeholder="Kecamatan" value="<?= $b['kec']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="agama" name="agama" placeholder="Agama" value="<?= $b['agama']; ?>">
                    </div>
                    <div class="form-group">
                        <select id="skaw" name="skaw" class="form-control form-control-user" value="<?= $b['skaw']; ?>">
                            <option>Status Perkawinan</option>
                            <option id="skaw" name="skaw" class="form-control form-control-user" value="<?= $b['skaw']; ?>" value="Kawin">Kawin</option>
                            <option id="skaw" name="skaw" class="form-control form-control-user" value="<?= $b['skaw']; ?>" value="Belum Kawin">Belum Kawin</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan" value="<?= $b['pekerjaan']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="kewarg" name="kewarg" placeholder="Kewarganegaraan" value="<?= $b['kewarg']; ?>">
                    </div>
                    <div class="form-group">
                        <p class="small mb-1" >Gambar KK</p>
                        <?php
                        if (isset($b['g_kk'])) { ?>

                            <input type="hidden" name="old_pict" id="old_pict" value="<?= $b['g_kk']; ?>">

                            <picture>
                                <source srcset="" type="image/svg+xml">
                                <img src="<?= base_url('assets/img/upload/') . $b['g_kk']; ?>" class="rounded mx-auto mb-3 d-blok" alt="..." width="20%">
                            </picture>

                        <?php } ?>

                        <input type="file" class="form-control form-control-user" id="g_kk" name="g_kk">
                    </div>
                    <div class="form-group">
                        <p class="small mb-1">Foto 3x4</p>
                        <?php
                        if (isset($b['foto'])) { ?>

                            <input type="hidden" name="old_pict" id="old_pict" value="<?= $b['foto']; ?>">

                            <picture>
                                <source srcset="" type="image/svg+xml">
                                <img src="<?= base_url('assets/img/upload/') . $b['foto']; ?>" class="rounded mx-auto mb-3 d-blok" alt="..." width="20%">
                            </picture>

                        <?php } ?>

                        <input type="file" class="form-control form-control-user" id="foto" name="foto">
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