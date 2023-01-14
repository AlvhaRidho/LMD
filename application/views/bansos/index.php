<!-- Begin Page Content -->
<div class="container-fluid">
 
    <div class="row">
        <div class="col-lg-12">
            <?php if(validation_errors()){?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors();?>
                </div>
            <?php }?>
            <a href="" class="btn btn-info mb-3" data-toggle="modal" data-target="#bansosBaruModal"><i class="fas fa-plus"></i> Tambah </a>
            <table class="table table-hover">
                <thead>    
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">No KK</th>
                        <th scope="col">Nik Kepala Keluarga</th>
                        <th scope="col">Nama Kepala Keluarga</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $a = 1;
                        foreach ($bansos as $b) { ?>
                    <tr>
                        <th scope="row"><?= $a++; ?></th>
                        <td><?= $b['n_kk']; ?></td>
                        <td><?= $b['nik_keke']; ?></td>
                        <td><?= $b['keke']; ?></td>
                        <td><?= $b['alamat']; ?></td>
                        <td>
                            <picture>
                                <source srcset="" type="image/svg+xml">
                                <img src="<?= base_url('assets/img/upload/') . $b['swafoto'];?>" class="img-fluid img-thumbnail" alt="..." width="50%"> 
                            </picture></td>
                        <td>
                            <a href="<?= base_url('bansos/ubahBansos/').$b['id_bansos'];?>" class="badge badge-info"><i class="fas fa-edit"></i> Ubah</a>
                            <a href="<?= base_url('bansos/hapusbansos/').$b['id_bansos'];?>" onclick="return confirm('Kamu yakin akan menghapus fomulir ini')" class="badge badge-danger"><i class="fas fa-trash"></i> Hapus</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal Tambah buku baru-->
<div class="modal fade" id="bansosBaruModal" tabindex="-1" role="dialog" aria-labelledby="bansosBaruModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bansosBaruModalLabel">Fomulir</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('bansos'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="n_kk" name="n_kk" placeholder="Masukkan Nomor Kartu Keluarga">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="nik_keke" name="nik_keke" placeholder="Masukkan Nik Kepala Keluarga">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="keke" name="keke" placeholder="Masukkan nama Kepala Keluarga">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="alamat" name="alamat" placeholder="Masukkan Alamat">
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control form-control-user" id="swafoto" name="swafoto">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban"></i> Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>