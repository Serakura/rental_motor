<?php 
require'../connect.php';
$plat_nomor =$_GET['plat_nomor'];
$query  =mysqli_query($koneksi, "SELECT * FROM motor  INNER JOIN merek ON motor.id_merek=merek.id_merek
  INNER JOIN jenis_motor ON motor.id_jenis=jenis_motor.id_jenis WHERE plat_nomor='$plat_nomor'");
while ($data=mysqli_fetch_array($query)) : 
  ?>
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
          <form action="?page=updatemotor" method="post" enctype="multipart/form-data">
           <div class="mb-3">
              <input type="hidden"  name="fotoLama" value="<?= $data['foto']; ?>" readonly class="form-control" id="level" required>
            <label for="merek_motor" class="form-label">Merk motor</label>
            <select class="form-control" style="height:45px" name="id_merek" required aria-label="Default select example">
              <option selected value="">-- Pilih Salah Satu --</option>
              <?php
              require"../connect.php";
              $result = mysqli_query($koneksi, "SELECT * FROM merek ")or die(mysqli_error());
              while($datas=mysqli_fetch_array($result)){
                if ($data['id_merek']==$datas['id_merek']) {
                  echo '<option value="'.$datas['id_merek'].'" selected="selected">'.$datas['nama'].'</option>';
                }else{
                  echo '<option value="'.$datas['id_merek'].'">'.$datas['nama'].'</option>';
                }
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
              while($datas=mysqli_fetch_array($result)){
                  if ($data['id_jenis']==$datas['id_jenis']) {
                  echo '<option value="'.$datas['id_jenis'].'" selected="selected">'.$datas['jenis'].'</option>';
                }else{
                  echo '<option value="'.$datas['id_jenis'].'">'.$datas['jenis'].'</option>';
                }
              }
              ?>
              
            </select>
          </div>
           <div class="mb-3">
            <label for="kapasitas" class="form-label">Nama Kendaraan</label>
            <input type="text" name="nama_kendaraan" value="<?= $data['nama_kendaraan']?>" class="form-control" id="kapasitas">
          </div>
          <div class="mb-3">
            <label for="nopol" class="form-label">Nomor Plat</label>
            <input type="text" disabled name="plat_nomor" value="<?= $data['plat_nomor']?>" class="form-control" id="nopol">
            <input type="hidden" name="plat_nomor" value="<?= $data['plat_nomor']?>" class="form-control" id="nopol">
          </div>
          <div class="mb-3">
            <label for="warna" class="form-label">Warna Motor</label>
            <input type="text" name="warna" value="<?= $data['warna']?>" class="form-control" id="warna">
          </div>
          <div class="mb-3">
            <label for="tahunPembuatan" class="form-label">Tahun Pembuatan</label>
            <input type="text" name="tahun_pembuatan" value="<?= $data['tahun_pembuatan']?>" class="form-control" id="tahunPembuatan">
          </div>
         
          <div class="mb-3">
            <label for="tarif" class="form-label">Tarif Sewa</label>
            <input type="text" name="tarif" value="<?= $data['tarif']?>" class="form-control" id="tarif">
          </div>
          <div class="mb-3">
            <label for="status_motor" class="form-label">Status</label>
            <br>
            <?php 
            $statusmotor = array('ready','booking'); 
            ?>
            <select class="form-control form-control-lg mb-3" aria-label=".form-control-lg example" name="status_motor">
             <?php 
             foreach($statusmotor as $key){
              if($key == $data['status']){

                ?>
                <option value="<?php echo $key; ?>" selected="selected">&nbsp; <?php echo $key; ?></option>
              <?php }else{ ?>

               <option value="<?php echo $key; ?>">&nbsp; <?php echo $key; ?></option>
             <?php }
           } 
           ?>
         </select>
       </div>
       <div class="mb-3">
        <label for="formFile" class="form-label">Gambar Motor</label>
        <img src="images/upload/<?= $data['foto'] ?>"  width='100' height='100' >
        <input class="form-control" name="foto" type="file" id="formFile">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>
</div>
</div>  
<?php endwhile; ?>