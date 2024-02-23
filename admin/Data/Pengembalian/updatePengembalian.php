<?php 
require"../connect.php";
$kode_pengembalian		=$_POST['kode_pengembalian'];
$kode_peminjaman		=$_POST['kode_peminjaman'];
$tanggal_pengembalian	=$_POST['tanggal_pengembalian'];
$status					=$_POST['status'];


$query=mysqli_query($koneksi, "UPDATE pengembalian SET kode_peminjaman='$kode_peminjaman', tanggal_pengembalian='$tanggal_pengembalian', status='$status' WHERE kode_pengembalian='$kode_pengembalian'");

if ($query){
 	?>
 	<script>
 		alert('Data Berhasil di Edit');
 		document.location='?page=Pengembalian&pesan=update';

 	</script>

<?php }	

?>