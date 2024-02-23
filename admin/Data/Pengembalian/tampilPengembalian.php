<h3 class="page-heading mb-4">Pengembalian</h3>
<div class="card">
  <div class="card-body">
    <button type="button" style="float:right;" class="btn btn-success">
      <a href="?page=tambahPengembalian" style="color: #fff;">Tambah Data</a>
    </button>
    <h5 class="card-title mb-4">List Data Pengembalian</h5>
    <br>
    <table class="table table-hover">
      <thead>
        <tr class="">
          <th>No</th>
          <th>Kode Pengembalian</th>
          <th>Kode Peminjaman</th>
          <th>Tanggal</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <?php 
        require'../connect.php';
        include 'function.php';
        $no =1;    
        $query=mysqli_query($koneksi, "SELECT * FROM pengembalian")or die(mysqli_error());
        while($data=mysqli_fetch_array($query)): 
       ?>
       <tbody>
        <tr>
            <td><?= $no++;?></td>
            <td><?= $data['kode_pengembalian']; ?></td>
            <td><?= $data['kode_peminjaman']; ?></td>
            <td><?= tgl($data['tanggal_pengembalian']); ?></td>
            <td><?= $data['status']; ?></td>
            <td>
              <a href="?page=editPengembalian&kode_pengembalian=<?php echo $data['kode_pengembalian']; ?>" class="link"><img name="pencil" src="images/action/edit2.png"></a>
              <a href="?page=hapusPengembalian&kode_pengembalian=<?php echo $data['kode_pengembalian']; ?>" class="link"><img name="delete" src="images/action/hapus.jpg" onclick="return confirm('Yakin Akan di Hapus ?')"></a>
            </td>
        </tr>
      <?php endwhile; ?>
      </tbody>
    </table>
  </div>