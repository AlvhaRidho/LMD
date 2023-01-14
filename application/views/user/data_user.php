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
            <a href="<?= base_url('user/cetak_print'); ?>" class="btn btn-primary mb-3"><i class="fas fa-print"></i> Print</a>
            <a href="<?= base_url('user/cetak_pdf'); ?>" class="btn btn-warning mb-3"><i class="far fa-file-pdf"></i>Pdf</a>
            <table class="table table-hover">
            <center>
                <table>
                    <tr>
                        <td>
                            <div class="table-responsive full-width">
                                <table class="table table-bordered table-striped table-hover" id="table-datatable">
                                    <tr>
                                        <th>Id User</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Role ID</th>
                                        <th>Aktif</th>
                                        <th>Member Sejak</th>
                                    </tr>
                                    <?php
                                    
                                    foreach ($anggota as $p) {
                                    ?>
                                        <tr>
                                            <td><?= $p['id']; ?></td>
                                            <td><?= $p['nama']; ?></td>
                                            <td><?= $p['email']; ?></td>
                                            <td><?= $p['role_id']; ?></td>
                                            <td><?= $p['is_active']; ?></td>
                                            <td><?= date('d F Y', $p['tanggal_input']); ?></td>
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