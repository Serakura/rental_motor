<?php 
require"../connect.php";
$kode_pengembalian		=$_POST['kode_pengembalian'];
$kode_pengembalian=mysqli_query($koneksi, "SELECT * FROM pengembalian WHERE kode_pengembalian='$kode_pengembalian' ");

if (mysqli_num_rows($kode_pengembalian)>0){
    ?>
    <script>
        alert('Kode Pengembalian sudah digunakan!! || Silahkan Input Ulang!');
        window.location='?page=tambahPengembalian';

    </script>

    <?php  
}else{
    $kode_pengembalian      =$_POST['kode_pengembalian'];
    $kode_peminjaman        =$_POST['kode_peminjaman'];
    $tanggal_pengembalian   =$_POST['tanggal_pengembalian'];
    $status                 =$_POST['status'];



    $query = mysqli_query($koneksi,"INSERT INTO pengembalian(kode_pengembalian,kode_peminjaman,tanggal_pengembalian,status)
        VALUES ('$kode_pengembalian','$kode_peminjaman','$tanggal_pengembalian','$status')");


    echo "<script>
    alert('Data Berhasil diTambahkan');
    window.location='?page=Pengembalian';

    </script>";
}  

?>