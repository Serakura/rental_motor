<?php 	
require '../connect.php';
$plat_nomor=$_GET['plat_nomor'];
$hapus=mysqli_query($koneksi,"DELETE FROM motor WHERE plat_nomor='$plat_nomor'");
if ($hapus) {
?>
	<script>
 		alert('Data Berhasil di Hapus');
 		document.location='?page=motor&pesan=hapus';
	</script>
<?php
}

 ?>