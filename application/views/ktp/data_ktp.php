<div class="container">
    <center>
        <table>
            <tr>
                <td>
                <?php if(validation_errors()){?>
                <div class="alert alert-danger" role="alert">
                <?= validation_errors();?>
                </div>
                <?php }?>
                <?= $this->session->flashdata('pesan'); ?>
                <a href="<?= base_url('ktp/cetak_print'); ?>" class="btn btn-primary mb-3"><i class="fas fa-print"></i> Print</a>
                <a href="<?= base_url('ktp/cetak_pdf'); ?>" class="btn btn-warning mb-3"><i class="far fa-file-pdf"></i>Pdf</a>
                    <div class="table-responsive full-width">
                        <table class="table table-bordered table-striped table-hover" id="table-datatable">
                            <tr>
                                <th>No.</th>
                                <th>Id User</th>
                                <th>Nik</th>
                                <th>Nama</th>
                                <th>Gambar KK</th>
                                <th>Foto 3x4</th>
                                <th>Status</th>
                                <th>Pilihan</th>
                            </tr>
                            <?php
                            $no = 1;
                            foreach ($ktp as $p) {
                            ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $p['id_user']; ?></td>
                                    <td><?= $p['nik']; ?></td>
                                    <td><?= $p['nama']; ?></td>
                                    <td>
                                        <picture>
                                            <source srcset="" type="image/svg+xml">
                                            <img src="<?= base_url('assets/img/upload/') . $p['g_kk'];?>" class="img-fluid img-thumbnail" alt="..." width="50%">
                                        </picture>
                                    </td>
                                    <td>
                                        <picture>
                                            <source srcset="" type="image/svg+xml">
                                            <img src="<?= base_url('assets/img/upload/') . $p['foto'];?>" class="img-fluid img-thumbnail" alt="..." width="50%">
                                        </picture>
                                    </td>
                                    <td>
                                            <?php if ($p['status'] == "Proses") {
                                                $status = "warning";
                                            } else {
                                                $status = "secondary";
                                            } ?>
                                            <i class="btn btn-outline-<?= $status; ?> btn-sm"><?= $p['status']; ?></i></td>
                                            <td nowrap>
                                                <p><a class="btn btn-sm btn-outline-info" href="<?= base_url('ktp/detaildataA/' . $p['id_ktp']); ?>"><i class="fas fa-fw fa-edit"></i>Detail</a></p>
                                                <?php if ($p['status'] == "Selesai") { ?>
                                                    <i class="btn btn-sm btn-outline-secondary"><i class="fas fa-fw fa-edit"></i>Ubah Status</i>
                                                <?php } else { ?>
                                                    <a class="btn btn-sm btn-outline-info" href="<?= base_url('ktp/ubahStatus/' . $p['id_ktp']. '/' . $p['nik']); ?>"><i class="fas fa-fw fa-edit"></i>Ubah Status</a>
                                                <?php } ?>
                                            </td>
                                 </tr>
                            <?php $no++;
                            } ?>
                         </table>
                    </div>
                </td>
            </tr>
        </table>
    </center>
</div>