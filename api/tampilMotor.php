<?php
$ip = getHostByName(getHostName());
require '../config/database.php';
//Mencari berdasarkan merek dan kapasitas
if ($con) {
    $sql = "SELECT nama_kendaraan,plat_nomor,warna,tahun_pembuatan,tarif,CONCAT('http://$ip/rental_motor/upload/',foto) AS gambar,jenis_motor.jenis,merek.nama AS merek FROM motor INNER JOIN jenis_motor ON motor.id_jenis = jenis_motor.id_jenis INNER JOIN merek ON motor.id_merek = merek.id_merek WHERE status_motor=1";
    $result = $con->query($sql);
    $outp = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($outp);
}
mysqli_close($con);
