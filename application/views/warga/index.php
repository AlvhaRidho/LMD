<!-- Begin Page Content -->
<div class="container-fluid">
 
    <div class="row">
        <div class="col-lg-12">
            <?php if(validation_errors()){?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors();?>
                </div>
            <?php }?>
            <a href="" class="btn btn-info mb-3" data-toggle="modal" data-target="#wargaBaruModal"><i class="fas "></i>Tambah</a>
            <?= $this->session->flashdata('pesan'); ?>
            <a href="<?= base_url('warga/cetak_print'); ?>" class="btn btn-primary mb-3"><i class="fas fa-print"></i> Print</a>
            <a href="<?= base_url('warga/cetak_pdf'); ?>" class="btn btn-warning mb-3"><i class="far fa-file-pdf"></i>Pdf</a>
            <table class="table table-hover">
                <thead>    
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">No KK</th>
                        <th scope="col">Nama Kepala Keluarga</th>
                        <th scope="col">Jumlah Anggota Keluarga</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Gambar KK</th>
                        <th scope="col">Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $a = 1;
                        foreach ($warga as $b) { ?>
                    <tr>
                        <th scope="row"><?= $a++; ?></th>
                        <td><?= $b['no_kk']; ?></td>
                        <td><?= $b['nama_keke']; ?></td>
                        <td><?= $b['j_anggota']; ?></td>
                        <td><?= $b['alamat']; ?></td>
                        <td>
                            <picture>
                                <source srcset="" type="image/svg+xml">
                                <img src="<?= base_url('assets/img/upload/') . $b['gmbr_kk'];?>" class="img-fluid img-thumbnail" alt="..." width="50%">
                            </picture>
                        </td>
                        <td>
                            <a href="<?= base_url('warga/ubahWarga/').$b['id_warga'];?>" class="badge badge-info"><i class="fas fa-edit"></i> Ubah</a>
                            <a href="<?= base_url('warga/hapuswarga/').$b['id_warga'];?>" onclick="return confirm('Kamu yakin akan menghapus nya')" class="badge badge-danger"><i class="fas fa-trash"></i> Hapus</a>
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
<div class="modal fade" id="wargaBaruModal" tabindex="-1" role="dialog" aria-labelledby="wargaBaruModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="wargaBaruModalLabel">Tambah Warga</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('warga'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="no_kk" name="no_kk" placeholder="Nomor Kartu Keluarga">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="nama_keke" name="nama_keke" placeholder="Nama Kepala Keluarga">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="j_anggota" name="j_anggota" placeholder="Jumlah Anggota">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="alamat" name="alamat" placeholder="Alamat">
                    </div>
                    <div class="form-group">
                        <label class="small mb-1">Gambar KK</label>
                        <input type="file" class="form-control form-control-user" id="gmbr_kk" name="gmbr_kk">
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