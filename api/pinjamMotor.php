<?php
$id = $_POST["nomor_ktp"];
$nopol = $_POST["nopol_mobil"];
$tanggal = $_POST["tanggal"];
$sewa = $_POST["durasi_sewa"];
$bayar = $_POST["total_bayar"];

require '../config/database.php';

$sql = "SELECT status_mobil FROM `mobil` WHERE nopol_mobil='$nopol' AND status_mobil=1";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
    $sql = "INSERT INTO peminjaman (nomor_ktp,nopol_mobil,tanggal,durasi_sewa,total_bayar) VALUES ('$id','$nopol','$tanggal','$sewa','$bayar')";
    if (mysqli_query($con, $sql)) {
        $status = "Berhasil Melakukan Peminjaman!";
        $result_code = true;
        echo json_encode(array('status' => $status, 'result_code' => $result_code));
    } else {
        $status = "Gagal Melakukan Peminjaman!";
        echo json_encode(array('status' => $status), JSON_FORCE_OBJECT);
    }
} else {
    $status = "Mobil Sudah Dipinjam!";
    $result_code = false;
    echo json_encode(array('status' => $status, 'result_code' => $result_code));
}

mysqli_close($con);
