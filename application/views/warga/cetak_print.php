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

<h3><center>LAPORAN DATA WARGA</center></h3>
<br/>
<table class="table-data">
    <thead>
        <tr>
            <th>No</th>
            <th>No KK</th>
            <th>Kepala Keluarga</th>
            <th>Jumlah Anggota Keluarga</th>
            <th>Alamat</th>
            <th>Gambar KK</th>
            
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach($warga as $l){
        ?>
        <tr>
            <td scope="row"><?= $no++; ?></td> 
            <td><?= $l['no_kk']; ?></td>
            <td><?= $l['nama_keke']; ?></td>
            <td><?= $l['j_anggota']; ?></td>
            <td><?= $l['alamat']; ?></td>
            <td>
                <picture>
                    <source srcset="" type="image/svg+xml">
                        <img src="<?= base_url('assets/img/upload/') . $l['gmbr_kk'];?>" class="img-fluid img-thumbnail" alt="..." width="30%">
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