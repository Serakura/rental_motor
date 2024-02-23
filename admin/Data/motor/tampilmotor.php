<h3 class="page-heading mb-4">Motor</h3>
<div class="card">
  <div class="card-body">
    <h5 class="card-title mb-4">List Data Motor</h5>
    <button type="button" style="float:right;" class="btn btn-success">
      <a href="?page=tambahmotor" style="color: #fff;">Tambah Data</a>
    </button>
     <button type="button" style="float:left;" class="btn btn-primary">
      <a href="?page=tambahmerek" style="color: #fff;">Merek</a>
    </button>
     </button>
     <button type="button" style="float:left; margin-left: 5px;" class="btn btn-primary">
      <a href="?page=tambahtype" style="color: #fff;">Type</a>
    </button>
    <br><br><br>
    <table class="table table-hover">
      <thead>
        <tr class="">
          <th>No</th>
          <th>Merek</th>
          <th>Jenis</th>
          <th>Nama</th>
          <th>Nopol</th>
          <th>Warna</th>
          <th>Tahun Pembuatan</th>
          <th>Tarif</th>
          <th>Status</th>
          <th>Gambar</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <?php 
        require'../connect.php';
        $no =1;    
        $query=mysqli_query($koneksi, "SELECT * FROM motor 
          INNER JOIN merek ON motor.id_merek=merek.id_merek
          INNER JOIN jenis_motor ON motor.id_jenis=jenis_motor.id_jenis
          ")or die(mysqli_error());
        while($data=mysqli_fetch_array($query)): 
       ?>
       <tbody>
        <tr>
            <td><?= $no++;?></td>
            <td><?= $data['nama']; ?></td>
            <td><?= $data['jenis']; ?></td>
            <td><?= $data['nama_kendaraan']; ?></td>
            <td><?= $data['plat_nomor']; ?></td>
            <td><?= $data['warna']; ?></td>
            <td><?= $data['tahun_pembuatan']; ?></td>
            <td><?= $data['tarif']; ?></td>
            <?php if ($data['status_motor']%2!=0){
              $status="Ready";
            }else{
              $status="Booking";
            } ?>
              
            
            <td><?= $status; ?></td>
            <td><img src="images/upload/<?= $data["foto"]; ?> " width='150' height='100'></td>
            <td>
              <a href="?page=editmotor&plat_nomor=<?php echo $data['plat_nomor']; ?>" class="link"><img name="pencil" src="images/action/edit2.png"></a>
              <a href="?page=hapusmotor&plat_nomor=<?php echo $data['plat_nomor']; ?>" class="link"><img name="delete" src="images/action/hapus.jpg" onclick="return confirm('Yakin Akan di Hapus ?')"></a>
            </td>
        </tr>
      <?php endwhile; ?>
      </tbody>
    </table>
  </div>