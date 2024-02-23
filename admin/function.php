<?php 
function tgl($tgli){
	$tanggal = substr($tgli, 8, 2 );
	$bulan = substr($tgli, 5, 2 );
	$tahun = substr($tgli, 0, 4 );
	return $tanggal."-".$bulan."-".$tahun;

}
function upload(){
		$namaFile 	=$_FILES['foto']['name'];
		$ukuranFile	=$_FILES['foto']['size'];
		$error		=$_FILES['foto']['error'];
		$tmpName	=$_FILES['foto']['tmp_name'];

		//cek apakah tidak ada gambar yang diuoload
		if($error === 4){ 
			echo "<script>
					alert('pilih gambar terlebih dahulu');
				</script>";

			return false;

		}

		//cek apakah yg diupload adalah gambar
		$ekstensiGambarValid=['jpg','jpeg','png'];
		$ekstensiGambar 	= explode('.',$namaFile);
		$ekstensiGambar 	= strtolower(end($ekstensiGambar));
		if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
			echo "<script>
					alert('yang anda upload bukan gambar');
				</script>";
		}

		//cek jika ukurannya terlalu besar
		if ($ukuranFile > 1000000) {
			echo "<script>
					alert('ukuran gambar terlalu besar');
				</script>";

				return false;
		}

		// lolos pengecekan, gambar siap di upload

		//generate nama gambar baruu

		$namaFileBaru  = uniqid();
		$namaFileBaru .='.';
		$namaFileBaru .=$ekstensiGambar;


		move_uploaded_file($tmpName,'images/upload/'.$namaFileBaru);
		return $namaFileBaru;


	}

 ?>