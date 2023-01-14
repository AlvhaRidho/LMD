<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<style type="text/css">
.table-data{
 width: 100%;
 border-collapse: collapse;
 }
 .table-data tr th,
 .table-data tr td{
 border:1px solid black;
 font-size: 11pt;
 font-family:Verdana;
 padding: 10px 10px 10px 10px;
 }
 .table-data th{
 background-color:white;
 }
 h3{
 font-family:Verdana;
 }
</style>

<h3><center>Laporan Data Pengajuan Pembuatan E-KTP</center></h3>
<br/>
<table class="table-data">
    <thead>
        <tr>
            <th>No</th>
            <th>Nik</th>
            <th>Nama</th>
            <th>Tempat, Tgl Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Golongan Darah</th>
            <th>Alamat</th>
            <th>Agama</th>
            <th>Status Perkawinan</th>
            <th>Pekerjaan</th>
            <th>Kewarganegaraan</th>
            <th>Gambar KK</th>
            <th>Foto</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach($ktp as $l){
        ?>
        <tr>
            <td scope="row"><?= $no++; ?></td> 
            <td><?= $l['nik']; ?></td>
            <td><?= $l['nama']; ?></td>
            <td><?= $l['temlah']; ?>,<?= $l['tgl_lahir']; ?></td>
            <td><?= $l['j_kelamin']; ?></td>
            <td><?= $l['g_darah']; ?></td>
            <td><?= $l['alamat']; ?>, RT/RW <?= $l['rt']; ?>/<?= $l['rw']; ?>,<?= $l['kel_desa']; ?>,<?= $l['kec']; ?></td>
            <td><?= $l['agama']; ?></td> 
            <td><?= $l['skaw']; ?></td>
            <td><?= $l['pekerjaan']; ?></td>
            <td><?= $l['kewarg']; ?></td>
            <td>
                <picture>
                    <source srcset="" type="image/svg+xml">
                        <img src="<?= base_url('assets/img/upload/') . $l['g_kk'];?>" class="img-fluid img-thumbnail" alt="..." width="50%">
                </picture>
            </td>
            <td>
                <picture>
                    <source srcset="" type="image/svg+xml">
                        <img src="<?= base_url('assets/img/upload/') . $l['foto'];?>" class="img-fluid img-thumbnail" alt="..." width="50%">
                </picture>
            </td>
        </tr>
        <?php
    }
 ?>
</tbody>
</table>
<script type="text/javascript">
window.print();
</script>
</body>
</html>