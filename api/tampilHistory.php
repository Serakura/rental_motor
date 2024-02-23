<?php
$id = $_POST["nomor_ktp"];
$ip = getHostByName(getHostName());

require '../config/database.php';

if ($con) {
    $sql = "SELECT motor.nama_kendaraan,merek.nama AS merek,history.plat_nomor,CONCAT('http://$ip/rental_motor/upload/',motor.foto) AS gambar,tanggal_pinjam,tanggal_kembali,total_biaya FROM history INNER JOIN motor ON history.plat_nomor=motor.plat_nomor INNER JOIN merek ON merek.id_merek = motor.id_merek WHERE history.nomor_ktp='$id'";
    $result = $con->query($sql);
    if (mysqli_num_rows($result) > 0) {
        $outp = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($outp);
    } else {
        $result = "Tidak Ada Data History Peminjaman!";
        echo json_encode(array('message' => $result));
    }
} else {
    $result = "Gagal Terhubung!";
    echo json_encode(array('message' => $result));
}
