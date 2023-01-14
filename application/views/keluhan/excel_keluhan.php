<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<h3><center>Laporan Data Pengajuan Keluhan</center></h3>
<br/>
<table class="table-data">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No Headphone</th>
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
        <th scope="row"><?= $no++; ?></th> 
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