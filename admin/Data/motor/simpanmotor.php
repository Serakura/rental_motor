<?php 
require"../connect.php";
include'function.php';
$id_jenis		=$_POST['id_jenis'];
$id_merek		=$_POST['id_merek'];
$plat_nomor		=$_POST['plat_nomor'];
$warna		=$_POST['warna'];
$tahun_pembuatan	=$_POST['tahun_pembuatan'];
$nama_kendaraan			=$_POST['nama_kendaraan'];
$tarif				=$_POST['tarif'];
$status_motor				=$_POST['status_motor'];

$foto = upload();
		if (!$foto) {
			return false;
		}

$cek_nopol=mysqli_query($koneksi, "SELECT * FROM motor WHERE plat_nomor='$plat_nomor' ")or die(mysqli_error());

if (mysqli_num_rows($cek_nopol)>0){
 	?>
 	<script>
 		alert('Nomor Plat Sudah digunakan!! || Silahkan Input Ulang!');
 		window.location='?page=tambahmotor';

 	</script>

 	<?php  
 }else{

$query = mysqli_query($koneksi,"INSERT INTO motor 
						(id_jenis,id_merek,plat_nomor,warna,tahun_pembuatan,nama_kendaraan,tarif,status_motor,foto)
 						VALUES 
 						('$id_jenis','$id_merek','$plat_nomor','$warna','$tahun_pembuatan','$nama_kendaraan','$tarif','$status_motor','$foto')");


 	echo "<script>
 		alert('Data Berhasil diTambahkan');
 		window.location='?page=motor';

 	</script>";
 }	
 
?>