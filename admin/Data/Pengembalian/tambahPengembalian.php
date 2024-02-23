<h3 class="page-heading mb-4">Data Pengembalian</h3>
<div class="row mb-2">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<button type="button" style="float:right;" class="btn btn-success">
					<a href="?page=Pengembalian" style="color: #fff;">Lihat Data Pengembalian</a>
				</button>
				<h3>Tambah Data Pengembalian</h3>
				<br>
				<form action="?page=simpanPengembalian" method="post" enctype="multipart/form-data">
					<div class="mb-3">
						<label for="kode_pengembalian" class="form-label">Kode Pengembalian</label>
						<input type="text" name="kode_pengembalian" class="form-control" id="kode_pengembalian">
					</div>
					<div class="mb-3">
						<label for="kode_peminjaman" class="form-label">Kode Peminjaman</label>
						<br>
						<select class="form-control form-control-lg mb-3" aria-label=".form-control-lg example" name="kode_peminjaman">
							<option selected>Pilih Status</option>
							<?php 
							require'../connect.php';
							$result	= mysqli_query($koneksi,"SELECT * FROM peminjaman")or die(mysql_error());
							while ($data=mysqli_fetch_array($result)) {
								echo '<option value="'.$data['kode_peminjaman'].'">'.$data['kode_peminjaman'].'</option>';
							}	
							?>
						</select>
					</div>
					<div class="mb-3">
						<label for="tanggal_pengembalian" class="form-label">Tanggal Pengembalian</label>
						<input type="date" name="tanggal_pengembalian" class="form-control" id="tanggal_pengembalian">
					</div>
					<div class="mb-3">
						<label for="status" class="form-label">Status</label>
						<input type="text" name="status" class="form-control" id="status">
					</div>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div>
	</div>
</div>