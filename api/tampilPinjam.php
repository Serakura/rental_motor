<?php
$id = $_POST["nomor_ktp"];
$ip = getHostByName(getHostName());

require '../config/database.php';

if ($con) {
    $sql = "SELECT motor.nama_kendaraan,merek.nama AS merek,motor.plat_nomor,CONCAT('http://$ip/rental_motor/upload/',motor.foto) AS gambar,tanggal,durasi_sewa,total_bayar FROM `peminjaman` INNER JOIN motor ON peminjaman.plat_nomor=motor.plat_nomor INNER JOIN customer ON customer.nomor_ktp=peminjaman.nomor_ktp INNER JOIN merek ON merek.id_merek = motor.id_merek WHERE peminjaman.nomor_ktp='$id' AND motor.status_motor=0";
    $result = $con->query($sql);
    if (mysqli_num_rows($result) > 0) {
        $outp = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($outp);
    } else {
        $result = "Tidak Ada Data Peminjaman!";
        echo json_encode(array('message' => $result));
    }
} else {
    $result = "Gagal Terhubung!";
    echo json_encode(array('message' => $result));
}
