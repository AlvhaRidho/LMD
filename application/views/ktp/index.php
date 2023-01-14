<!-- Begin Page Content -->
<div class="container-fluid">
 
    <div class="row">
        <div class="col-lg-12">
            <?php if(validation_errors()){?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors();?>
                </div>
            <?php }?>
            </div class="fw-bolder">
                    <h4><strong>Di menu E-KTP anda dapat mengajukan pembuatan E-KTP secara online. ada beberapa langkah-langkahnya yaitu:</strong></h4>
                    <h5><div class=""><strong>
                        <li>Jika ingin mengajukan E-KTP, klik Tambah</li>
                        <li>Isi fomulir sesuai data diri anda</li>
                        <li>Jika sudah mengajukan tunggu pemberitahuan oleh Admin atau Pengurus</li>
                        <li>Jika Status berubah yaitu <b>"Proses"</b> menjadi <b>"Selesai"</b> segera ke kantor 
                        pemerintah setempat untuk mengambil E-KTP yang sudah jadi</li>
                        <li>Jika sudah 14 hari tanpa ada pemberitahuan oleh Admin atau Pengurus, 
                            segera hubungi nomor yang ada di menu Bantuan</li>
                        <li>Terima kasih Sudah membaca</li>
                    </div></strong></h5><p></p>
                    
            </div>
            <a href="" class="btn btn-info mb-3" data-toggle="modal" data-target="#ktpBaruModal"><i class="fas fa-plus"></i>Tambah</a>
            <table class="table table-hover">
                <thead>    
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nik</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Gambar KK</th>
                        <th scope="col">Foto 3x4</th>
                        <th scope="col">Status</th>
                        <th scope="col">Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $a = 1;
                        foreach ($ktp as $b) { ?>
                    <tr>
                        <th scope="row"><?= $a++; ?></th>
                        <td><?= $b['nik']; ?></td>
                        <td><?= $b['nama']; ?></td>
                        <td>
                            <picture>
                                <source srcset="" type="image/svg+xml">
                                <img src="<?= base_url('assets/img/upload/') . $b['g_kk'];?>" class="img-fluid img-thumbnail" alt="..." width="50%">
                            </picture>
                        </td>
                        <td>
                            <picture>
                                <source srcset="" type="image/svg+xml">
                                <img src="<?= base_url('assets/img/upload/') . $b['foto'];?>" class="img-fluid img-thumbnail" alt="..." width="50%">
                            </picture>
                        </td>
                        <td><?= $b['status']; ?></td>
                        <td>
                            <a href="<?= base_url('ktp/ubahKtp/').$b['id_ktp'];?>" class="badge badge-info"><i class="fas fa-edit"></i> Ubah</a>
                            <a href="<?= base_url('ktp/detaildataU/').$b['id_ktp'];?>" class="badge badge-success"><i class=""></i> Detail</a>
                            <a href="<?= base_url('ktp/hapusktp/').$b['id_ktp'];?>" onclick="return confirm('Kamu yakin akan menghapus nya')" class="badge badge-danger"><i class="fas fa-trash"></i> Hapus</a>
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
<div class="modal fade" id="ktpBaruModal" tabindex="-1" role="dialog" aria-labelledby="ktpBaruModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ktpBaruModalLabel">Buat E-KTP</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('ktp'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="nik" name="nik" placeholder="NIK">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder=" Nama Lengkap">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="temlah" name="temlah" placeholder="Tempat Lahir">
                    </div>
                    
                    <div class="form-group">
                        <input type="date" class="form-control form-control-user" id="tgl_lahir" name="tgl_lahir" >
                    </div>
                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="j_kelamin" name="j_kelamin" value="Laki-laki">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Laki-laki
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="j_kelamin" name="j_kelamin" value="Perempuan">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Perempuan
                            </label>
                         </div>
                    </div>
                    <div class="form-group">
                        <select id="g_darah" name="g_darah" class="form-control form-control-user">
                            <option value="">Golongan Darah</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="AB">AB</option>
                            <option value="O">O</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="alamat" name="alamat" placeholder="Alamat">
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control py-4" id="rt" name="rt" placeholder="RT">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control py-4" id="rw" name="rw" placeholder="RW">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="kel_desa" name="kel_desa" placeholder="Kel/Desa">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="kec" name="kec" placeholder="Kecamatan">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="agama" name="agama" placeholder="Agama">
                    </div>
                    <div class="form-group">
                        <select id="skaw" name="skaw" class="form-control form-control-user">
                            <option value="">Status Perkawinan</option>
                            <option value="Kawin">Kawin</option>
                            <option value="Belum Kawin">Belum Kawin</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="kewarg" name="kewarg" placeholder="Kewarganegaraan">
                    </div>
                    <div class="form-group">
                        <label class="small mb-1">Gambar KK</label>
                        <input type="file" class="form-control form-control-user" id="g_kk" name="g_kk">
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" >Foto 3x4</label>
                        <input type="file" class="form-control form-control-user" id="foto" name="foto">
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