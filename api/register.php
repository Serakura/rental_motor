<?php
$id = $_POST["nomor_ktp"];
$name = $_POST["nama_customer"];
$user_name = $_POST["username"];
$user_pass = md5($_POST["password"]);
$telp = $_POST["no_telp"];
$jenis_kelamin = $_POST["jenkel"];
$alamat = $_POST["alamat"];

require '../config/database.php';

if ($con) {
    $sql = "SELECT * FROM customer WHERE username='$user_name' OR nomor_ktp='$id'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        $status = "Username atau nomor ktp sudah digunakan!";
        $result_code = false;
        echo json_encode(array('status' => $status, 'result_code' => $result_code));
    } else {
        $sql = "INSERT INTO customer (nomor_ktp,nama_customer,no_telp,username,password,jenkel,alamat) VALUES ('$id','$name','$telp','$user_name','$user_pass','$jenis_kelamin','$alamat')";
        if (mysqli_query($con, $sql)) {
            $status = "Berhasil Membuat Akun!";
            $result_code = true;
            echo json_encode(array('status' => $status, 'result_code' => $result_code));
        } else {
            $status = "Gagal Membuat Akun!";
            echo json_encode(array('status' => $status), JSON_FORCE_OBJECT);
        }
    }
} else {
    $status = "Gagal terhubung!";
    echo json_encode(array('status' => $status), JSON_FORCE_OBJECT);
}

mysqli_close($con);
