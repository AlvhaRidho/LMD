<!-- Begin Page Content -->
<div class="container-fluid">
 
    <div class="row">
        <div class="col-lg-12">
            <?php if(validation_errors()){?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors();?>
                </div>
            <?php }?>
            <a href="" class="btn btn-info mb-3" data-toggle="modal" data-target="#keluhanBaruModal"><i class="fas fa-plus"></i> Tambah</a>
            <table class="table table-hover">
                <thead>    
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">No Headphone</th>
                        <th type="text" scope="col">Keluhan</th>
                        <th scope="col">Status</th>
                        <th scope="col">Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $a = 1;
                        foreach ($keluhan as $b) { ?>
                    <tr>
                        <th scope="row"><?= $a++; ?></th>
                        <td><?= $b['nama']; ?></td>
                        <td><?= $b['alamat']; ?></td>
                        <td><?= $b['no_telp']; ?></td>
                        <td><?= $b['keluhan']; ?></td>
                        <td><?= $b['status']; ?></td>
                        <td>
                            <a href="<?= base_url('keluhan/ubah/').$b['id_keluhan'];?>" class="badge badge-info"><i class="fas fa-edit"></i> Ubah</a>
                            <a href="<?= base_url('keluhan/hapuskeluhan/').$b['id_keluhan'];?>" onclick="return confirm('Kamu yakin akan menghapus Keluhan ini ?');" class="badge badge-danger"><i class="fas fa-trash"></i> Hapus</a>
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
<div class="modal fade" id="keluhanBaruModal" tabindex="-1" role="dialog" aria-labelledby="keluhanBaruModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="keluhanBaruModalLabel">Tambah Keluhan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('keluhan'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Masukkan Nama Lengkap">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="alamat" name="alamat" placeholder="Masukkan Alamat Lengkap">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="no_telp" name="no_telp" placeholder="Masukkan Nomor Headphone">
                    </div>
                    <div class="form-group">
                        <input type="textarea" class="form-control form-control-user" id="keluhan" name="keluhan" placeholder="Masukkan Keluhan yang ingin disampaikan">
                    </div>
                    
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban"></i> Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>