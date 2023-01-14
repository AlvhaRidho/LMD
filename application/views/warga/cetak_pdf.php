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

<h3><center>Laporan Data Warga</center></h3>
<br/>
<table class="table-data">
    <thead>
        <tr>
            <th>No</th>
            <th>No KK</th>
            <th>Kepala Keluarga</th>
            <th>Jumlah Anggota Keluarga</th>
            <th>Alamat</th>
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
        <td><?= $l['alamat']; ?></td>s
    </tr>
    <?php
 }
 ?>
</tbody>
</table>
</body>
</html