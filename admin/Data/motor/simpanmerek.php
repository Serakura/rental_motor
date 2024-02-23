<?php 
require"../connect.php";
include'function.php';
$nama		=$_POST['nama'];


$cek_nopol=mysqli_query($koneksi, "SELECT * FROM merek WHERE nama='$nama' ")or die(mysqli_error());

if (mysqli_num_rows($cek_nopol)>0){
 	?>
 	<script>
 		alert('Merek Kendaraan Sudah Terdaftar');
 		window.location='?page=tambahmotor';

 	</script>

 	<?php  
 }else{

$query = mysqli_query($koneksi,"INSERT INTO merek(nama) VALUES ('$nama')");


 	echo "<script>
 		alert('Data Berhasil diTambahkan');
 		window.location='?page=motor';

 	</script>";
 }	
 
?>