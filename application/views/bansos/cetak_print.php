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

<h3><center>LAPORAN DATA BANSOS</center></h3>
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
            <th>Swafoto + Ktp</th>
            
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach($bansos as $l){
        ?>
        <tr>
            <td scope="row"><?= $no++; ?></td> 
            <td><?= $l['n_kk']; ?></td>
            <td><?= $l['nik_keke']; ?></td>
            <td><?= $l['keke']; ?></td>
            <td><?= $l['alamat']; ?></td>
            <td><?= $l['tgl_bansos']; ?></td>
            <td>
                <picture>
                    <source srcset="" type="image/svg+xml">
                        <img src="<?= base_url('assets/img/upload/') . $l['swafoto'];?>" class="img-fluid img-thumbnail" alt="..." width="50%">
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