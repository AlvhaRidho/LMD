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
    padding: 10px 10px 10px 10px;
    }
     h3{
        font-family:Verdana;
    }
    </style>

<h3><center>Laporan Pengajuan Keluhan</center></h3>
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
    foreach($keluhan as $b){
    ?>
     <tr>
        <td scope="row"><?= $no++; ?></td> 
        <td><?= $b['id_user']; ?></td>
        <td><?= $b['tgl_keluhan']; ?></td>
        <td><?= $b['nama']; ?></td>
        <td><?= $b['alamat']; ?></td>
        <td><?= $b['no_telp']; ?></td>
        <td><?= $b['keluhan']; ?></td>
        <td><?= $b['tgl_keluhan']; ?></td>
        <td><?= $b['status']; ?></td>  
    </tr>
    <?php
 }
 ?>
</tbody>
</table>
</body>
</html