<?php
require 'connect.php';
session_start();
	if(isset($_POST['login'])){
		$username=$_POST['username'];
		$password=$_POST['password'];

	
		$query = mysqli_query($koneksi, "SELECT*FROM user WHERE username='$username' AND password='$password'");

	
		if(mysqli_num_rows($query) == 0){
	//cek username

			echo '<script language="javascript">
					alert("Username Tidak ditemukan!!!"); 
					document.location="index.php";
				 </script>';
		}else{
			$result = mysqli_fetch_assoc($query);
			
			$_SESSION['id_user']=$result['id_user'];
			$_SESSION['username']=$result['username'];
			$_SESSION['password']=$result['password'];

			
?>
			<script>alert("Selamat Datang <?php echo $_SESSION['username']; ?> di Aplikasi Rental Mobil" ); document.location="admin/index.php";</script>

		
<?php
		}
	}
?>
