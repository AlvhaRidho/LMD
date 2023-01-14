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

<h3><center>LAPORAN DATA PENGAJUAN KELUHAN</center></h3>
<br/>
<table class="table-data">
    <thead>
        <tr>
            <th>No</th>
            <th>Id User</th>
            <th>Tanggal Keluhan</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No Handphone</th>
            <th>Keluhan</th>
            <th>Tanggal Pengajuan</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach($keluhan as $l){
        ?>
        <tr>
            <td scope="row"><?= $no++; ?></td> 
            <td><?= $l['id_user']; ?></td>
            <td><?= $l['tgl_keluhan']; ?></td>
            <td><?= $l['nama']; ?></td>
            <td><?= $l['alamat']; ?></td>
            <td><?= $l['no_telp']; ?></td>
            <td><?= $l['keluhan']; ?></td>
            <td><?= $l['tgl_keluhan']; ?></td>
            <td><?= $l['status']; ?></td> 
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