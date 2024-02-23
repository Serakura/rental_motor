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

  $fotoLama   = $_POST['fotoLama'];


  if($_FILES['foto']['error'] === 4){
    $foto = $fotoLama;
  }else{
    $foto = upload();
  }




$query=mysqli_query($koneksi, "UPDATE motor SET id_jenis='$id_jenis', id_merek='$id_merek', nama_kendaraan='$nama_kendaraan', warna='$warna ', tahun_pembuatan='$tahun_pembuatan', tarif='$tarif', status_motor='$status_motor', foto='$foto' WHERE plat_nomor='$plat_nomor'");

if ($query){
 	?>
 	<script>
 		alert('Data Berhasil di Edit');

 		document.location='?page=motor&pesan=update';

 	</script>

<?php }	

?>