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

<h3><center>Laporan DATA USER</center></h3>
<br/>
<table class="table-data">
    <thead>
        <tr>
            <th>No</th>
            <th>Id User</th>
            <th>Email</th>
            <th>Nama</th>
            <th>No Handphone</th>
            <th>Role Id</th>
            <th>Member Sejak</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $no = 1;
    foreach($anggota as $l){
    ?>
     <tr>
        <td scope="row"><?= $no++; ?></td> 
        <td><?= $l['id']; ?></td>
        <td><?= $l['email']; ?></td>
        <td><?= $l['nama']; ?></td>
        <td><?= $l['no_hp']; ?></td>
        <td><?= $l['role_id']; ?></td>
        <td><?= date('d F Y', $l['tanggal_input']); ?></td>  
    </tr>
    <?php
 }
 ?>
</tbody>
</table>
</body>
</html