<?php

$user_name = $_POST["username"];
$user_pass = md5($_POST["password"]);

require '../config/database.php';

if ($con) {
    $sql = "SELECT * FROM customer WHERE username='$user_name' AND password='$user_pass'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $status = "Berhasil Login!";
        $result_code = true;
        $data = [
            'nomor_ktp' => $row['nomor_ktp'],
            'nama' => $row['nama_customer'],
            'telp' => $row['no_telp'],
            'jenkel' => $row['jenkel'],
            'alamat' => $row['alamat']
        ];
        echo json_encode(array('status' => $status, 'result_code' => $result_code, 'data' => $data));
    } else {
        $status = "Username atau Password Salah!";
        $result_code = false;
        echo json_encode(array('status' => $status, 'result_code' => $result_code));
    }
} else {
    $status = "failed";
    echo json_encode(array('status' => $status), JSON_FORCE_OBJECT);
}

mysqli_close($con);
