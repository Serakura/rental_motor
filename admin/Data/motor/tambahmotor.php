<h3 class="page-heading mb-4">Data Motor</h3>
<div class="row mb-2">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<button type="button" style="float:right;" class="btn btn-success">
					<a href="?page=motor" style="color: #fff;">Lihat Data Motor</a>
				</button>
				<h3>Tambah Data Motor</h3>
				<br>
				<form action="?page=simpanmotor" method="post" enctype="multipart/form-data">
					<div class="mb-3">
						<label for="merek_motor" class="form-label">Merk motor</label>
						<select class="form-control" style="height:45px" name="id_merek" required aria-label="Default select example">
							<option selected value="">-- Pilih Salah Satu --</option>
							<?php
							require"../connect.php";
							$result = mysqli_query($koneksi, "SELECT * FROM merek ")or die(mysqli_error());
							while($data=mysqli_fetch_array($result)){
								echo '<option value="'.$data['id_merek'].'">'.$data['nama'].' </option>';
							}
							?>
						</select>
					</div>
					<div class="mb-3">
						<label for="merek_motor" class="form-label">Jenis motor</label>
						<select class="form-control" style="height:45px" name="id_jenis" required aria-label="Default select example">
							<option selected value="">-- Pilih Salah Satu --</option>
							<?php
							require"../connect.php";
							$result = mysqli_query($koneksi, "SELECT * FROM jenis_motor ")or die(mysqli_error());
							while($data=mysqli_fetch_array($result)){
								echo '<option value="'.$data['id_jenis'].'">'.$data['jenis'].' </option>';
							}
							?>
						</select>
					</div>
					<div class="mb-3">
						<label for="nopol" class="form-label">Nama Kendaraan</label>
						<input type="text" name="nama_kendaraan" class="form-control" id="nopol">
					</div>
					<div class="mb-3">
						<label for="nopol" class="form-label">Nomor Plat motor</label>
						<input type="text" name="plat_nomor" class="form-control" id="nopol">
					</div>
					<div class="mb-3">
						<label for="warna" class="form-label">Warna motor</label>
						<input type="text" name="warna" class="form-control" id="warna">
					</div>
					<div class="mb-3">
						<label for="tahunPembuatan" class="form-label">Tahun Pembuatan</label>
						<input type="text" name="tahun_pembuatan" class="form-control" id="tahunPembuatan">
					</div>
					<div class="mb-3">
						<label for="tarif" class="form-label">Tarif Sewa</label>
						<input type="text" name="tarif" class="form-control" id="tarif">
					</div>
					<div class="mb-3">
						<label for="status_motor" class="form-label">Status</label>
						<br>
						<select class="form-control form-control-lg mb-3" aria-label=".form-select-lg example" name="status_motor">
							<option selected>Pilih Status</option>
							<option value="1">Ready</option>
							<option value="0">Booking</option>
						</select>
					</div>
					<div class="mb-3">
						<label for="formFile" class="form-label">Gambar motor</label>
						<input class="form-control" name="foto" type="file" id="formFile">
					</div>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div>
	</div>
</div>