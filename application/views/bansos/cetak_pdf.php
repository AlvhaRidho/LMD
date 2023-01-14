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

<h3><center>Laporan Pengajuan Bansos</center></h3>
<br/>
<table class="table-data">
    <thead>
        <tr>
            <th>No</th>
            <th>No KK</th>
            <th>Nik Kepala Keluarga</th>
            <th>Kepala Keluarga</th>
            <th>Alamat</th>
            <th>Tanggal Pengajuan</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $no = 1;
    foreach($bansos as $b){
    ?>
     <tr>
        <td scope="row"><?= $no++; ?></td> 
        <td><?= $b['n_kk']; ?></td>
        <td><?= $b['nik_keke']; ?></td>
        <td><?= $b['keke']; ?></td>
        <td><?= $b['alamat']; ?></td>
        <td><?= $b['tgl_bansos']; ?></td> 
    </tr>
    <?php
 }
 ?>
</tbody>
</table>
</body>
</html