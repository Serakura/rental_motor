<h3 class="page-heading mb-4">History Peminjaman</h3>
<div class="card">
  <div class="card-body">
    <h5 class="card-title mb-4">List Data History</h5>
    <br>
    <table class="table table-hover">
      <thead>
        <tr class="">
          <th>No</th>
          <th>Kode Peminjaman</th>
          <th>Kode Pengembalian</th>
          <th>No KTP</th>
          <th>No Plat</th>
          <th>Tanggal Pinjam</th>
          <th>Tanggal Kembali</th>
          <th>Total Bayar</th>
        </tr>
      </thead>
      <?php 
        require'../connect.php';
        include 'function.php';
        $no =1;    
        $query=mysqli_query($koneksi, "SELECT * FROM History")or die(mysqli_error());
        while($data=mysqli_fetch_array($query)): 
       ?>
       <tbody>
        <tr>
            <td><?= $no++;?></td>
            <td><?= $data['kode_peminjaman']; ?></td>
            <td><?= $data['kode_pengembalian']; ?></td>
            <td><?= $data['nomor_ktp']; ?></td>
            <td><?= $data['plat_nomor']; ?></td>
            <td><?= tgl($data['tanggal_pinjam']); ?></td>
            <td><?= tgl($data['tanggal_kembali']); ?></td>
            <td><?= $data['total_biaya']; ?></td>
           
        </tr>
      <?php endwhile; ?>
      </tbody>
    </table>
  </div>