<?php 
require'../connect.php';
$kode_pengembalian =$_GET['kode_pengembalian'];
$query  =mysqli_query($koneksi, "SELECT * FROM pengembalian 
                                            INNER JOIN peminjaman  ON pengembalian.kode_peminjaman  = peminjaman.kode_peminjaman 
                                            WHERE kode_pengembalian='$kode_pengembalian'");
while ($data=mysqli_fetch_array($query)) : 
  ?>
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
          <form action="?page=updatePengembalian" method="post">
            <div class="mb-3">
              <label for="kode_pengembalian" class="form-label">Kode Pengembalian</label>
              <input type="text" disabled name="kode_pengembalian" value="<?= $data['kode_pengembalian']?>" class="form-control" id="kode_pengembalian">
              <input type="hidden" name="kode_pengembalian" value="<?= $data['kode_pengembalian']?>" class="form-control" id="kode_pengembalian">
            </div>
            <div class="mb-3">
              <label for="kode_peminjaman" class="form-label">Kode Peminjaman</label>
              <br>
              <select class="form-control form-control-lg mb-3" aria-label=".form-control-lg example" name="kode_peminjaman">
                <option controled>Pilih Status</option>
                <?php 
                require'../connect.php';
                $result = mysqli_query($koneksi, "SELECT * FROM peminjaman");
                while ($datas=mysqli_fetch_array($result)) {
                    if ($data['kode_peminjaman']==$datas['kode_peminjaman']) {
                      echo '<option value="'.$datas['kode_peminjaman'].'" selected="selected">'.$datas['kode_peminjaman'].'</option>';
                    }else{
                      echo '<option value="'.$datas['kode_peminjaman'].'">'.$datas['kode_peminjaman'].'</option>';
                    }
                  }
                  ?>
                </div>
                <div class="mb-3">
                  <label for="tanggal_pengembalian" class="form-label">Tanggal Pengembalian</label>
                  <input type="date" name="tanggal_pengembalian" value="<?= $data['tanggal_pengembalian']?>" class="form-control" id="tanggal_pengembalian">
                </div>
                <div class="mb-3">
                  <label for="status" class="form-label">Status</label>
                  <input type="text" name="status" value="<?= $data['status']?>" class="form-control" id="status">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>  
      <?php endwhile; ?>