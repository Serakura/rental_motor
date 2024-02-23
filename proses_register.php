<?php 
require "connect.php";
$nama_user 	=$_POST['nama_user'];
$username 	=$_POST['username'];
$password 	=md5($_POST['password']);


$result 	=mysqli_query($koneksi,"SELECT * FROM user WHERE username='$username' ") or die(mysqli_error());

if(mysqli_num_rows($result) == true){
	?>
	<script>
		alert('Username Telah digunakan!! Silahkan ganti dengan yang lain');
		document.location='register.php';
	</script>

	<?php
}else{

	$query = mysqli_query($koneksi,"INSERT INTO user(nama_user,username,password) 
		VALUES('$nama_user','$username','$password')");
	if($query){
		?>
		<script>
			alert('Pendaftaran Sukses, Akun Siap digunakan');
			document.location='register.php';
		</script>
		<?php
	}else{
		echo "<div align='center'>Proses Gagal!</div>";
	}

}
?>