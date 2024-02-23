<?php 	
require '../connect.php';
$kode_pengembalian=$_GET['kode_pengembalian'];
$hapus=mysqli_query($koneksi,"DELETE FROM pengembalian WHERE kode_pengembalian='$kode_pengembalian'");
if ($hapus) {
?>
	<script>
 		alert('Data Berhasil di Hapus');
 		document.location='?page=Pengembalian&pesan=hapus';
	</script>
<?php
}

 ?>