<!-- Begin Page Content -->
<div class="container-fluid">
    <center>
        <!-- row ux-->
        <div class="">
        </div>  
        <div class="container">
            <div class="row">
                
                    <div class="caption">
                            
                                <table class="table table-stripped">
                                
                                <?php
                                $no = 1;
                                foreach ($ktp as $p) {
                                ?>
                                
                                    <tr>
                                        <th nowrap>Nik: </th>
                                        <td nowrap><?= $p['nik']; ?></td>
                                        <td>&nbsp;</td>
                                        <th>Nama: </th>
                                        <td><?= $p['nama']; ?></td>
                                    </tr>
                                    <tr>
                                        <th nowrap>Tempat Lahir: </th>
                                        <td><?= $p['temlah']; ?></td>
                                        <td>&nbsp;</td>
                                        <th>Tanggal Lahir: </th>
                                        <td><?= $p['tgl_lahir']; ?></td>
                                    </tr>
                                    <tr>
                                        <th nowrap>Jenis Kelamin: </th>
                                        <td><?= $p['j_kelamin']; ?></td>
                                        <td>&nbsp;</td>
                                        <th>Golongan Darah: </th>
                                        <td><?= $p['g_darah']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Alamat: </th>
                                        <td><?= $p['alamat']; ?></td>
                                        <td>&nbsp;</td>
                                        <th>RT/RW: </th>
                                        <td><?= $p['rt']; ?>/<?= $p['rw']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Kel/Desa: </th>
                                        <td><?= $p['kel_desa']; ?></td>
                                        <td>&nbsp;</td>
                                        <th>Kec: </th>
                                        <td><?= $p['kec']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Agama: </th>
                                        <td><?= $p['agama']; ?></td>
                                        <td>&nbsp;</td>
                                        <th>Status Perkawinan: </th>
                                        <td><?= $p['skaw']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Pekerjaan: </th>
                                        <td><?= $p['pekerjaan']; ?></td>
                                        <td>&nbsp;</td>
                                        <th>Kewarganegaraan: </th>
                                        <td><?= $p['kewarg']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Gambar KK: </th>
                                        <td>
                                            <picture>
                                                <source srcset="" type="image/svg+xml">
                                                <img src="<?= base_url('assets/img/upload/') . $p['g_kk'];?>" class="img-fluid img-thumbnail" alt="..." width="50%">
                                            </picture>
                                        </td>
                                        <td>&nbsp;</td>
                                        <th>Foto 3x4: </th>
                                        <td>
                                            <picture>
                                                <source srcset="" type="image/svg+xml">
                                                <img src="<?= base_url('assets/img/upload/') . $p['foto'];?>" class="img-fluid img-thumbnail" alt="..." width="50%">
                                            </picture>
                                        </td>
                                    </tr>
                                <?php $no++;
                                } ?>  
                                </table>
                            <p>
                                <span class="btn btn-outline-secondary" onclick="window.history.go(-1)"> Kembali</span>
                            </p>
                    </div>
                
            </div>
        </div>
    </center>
