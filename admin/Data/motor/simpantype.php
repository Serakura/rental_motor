<?php 
require"../connect.php";
include'function.php';
$jenis		=$_POST['jenis'];


$cek_nopol=mysqli_query($koneksi, "SELECT * FROM jenis_motor WHERE jenis='$jenis' ")or die(mysqli_error());

if (mysqli_num_rows($cek_nopol)>0){
 	?>
 	<script>
 		alert('Type Kendaraan Sudah Terdaftar');
 		window.location='?page=tambahmotor';

 	</script>

 	<?php  
 }else{

$query = mysqli_query($koneksi,"INSERT INTO jenis_motor(jenis) VALUES ('$jenis')");


 	echo "<script>
 		alert('Data Berhasil diTambahkan');
 		window.location='?page=motor';

 	</script>";
 }	
 
?>