<div class="container">

    <?= $this->session->flashdata('pesan'); ?>
    <div class="row">
        <div class="col-lg-12">
            <?php if(validation_errors()){?>
                <div class="alert alert-danger" role="alert">
                <?= validation_errors();?>
                </div>
                <?php }?>
            <?= $this->session->flashdata('pesan'); ?>
            <a href="<?= base_url('bansos/cetak_print'); ?>" class="btn btn-primary mb-3"><i class="fas fa-print"></i> Print</a>
            <a href="<?= base_url('bansos/cetak_pdf'); ?>" class="btn btn-warning mb-3"><i class="far fa-file-pdf"></i>Pdf</a>
            <table class="table table-hover">
            <center>
                <table>
                    <tr>
                        <td>
                            <div class="table-responsive full-width">
                                <table class="table table-bordered table-striped table-hover" id="table-datatable">
                                    <tr>
                                        <th>Id User</th>
                                        <th>No KK</th>
                                        <th>Nik Kepala Keluarga</th>
                                        <th>Kepala Keluarga</th>
                                        <th>Alamat</th>
                                        <th>Swafoto + Ktp</th>
                                        <th>Tangal Pengajuan</th>
                                        <th>Status</th>
                                        <th>Pilihan</th>
                                    </tr>
                                    <?php
                                    
                                    foreach ($bansos as $p) {
                                    ?>
                                        <tr>
                                            <td><?= $p['id_user']; ?></td>
                                            <td><?= $p['n_kk']; ?></td>
                                            <td><?= $p['nik_keke']; ?></td>
                                            <td><?= $p['keke']; ?></td>
                                            <td><?= $p['alamat']; ?></td>
                                            <td>
                                                <picture>
                                                    <source srcset="" type="image/svg+xml">
                                                    <img src="<?= base_url('assets/img/upload/') . $p['swafoto'];?>" class="img-fluid img-thumbnail" alt="..." width="50%"> 
                                                </picture>
                                            </td>
                                            <td><?= $p['tgl_bansos']; ?></td>
                                            <td>
                                            <?php if ($p['status'] == "Proses") {
                                                $status = "warning";
                                            } else {
                                                $status = "secondary";
                                            } ?>
                                            <i class="btn btn-outline-<?= $status; ?> btn-sm"><?= $p['status']; ?></i></td>
                                            <td nowrap>
                                                <?php if ($p['status'] == "Selesai") { ?>
                                                    <i class="btn btn-sm btn-outline-secondary"><i class="fas fa-fw fa-edit"></i>Ubah Status</i>
                                                <?php } else { ?>
                                                    <a class="btn btn-sm btn-outline-info" href="<?= base_url('bansos/ubahStatus/' . $p['id_bansos']. '/' . $p['n_kk']); ?>"><i class="fas fa-fw fa-edit"></i>Ubah Status</a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php
                                    } ?>
                                </table>
                            </div>
                        </td>
                    </tr>
                </table>
            </center>
        </div>
    </div>
</div>