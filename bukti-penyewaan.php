<?php
include("header.php");
include("koneksi/koneksi.php");
?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" >

<div class="container-fluid mt-3">
  <h3>Bukti Pembayaran</h3>
  <p>List Bukti Pembayaran Pada Aplikasi</p>
  <a class="btn btn-primary mb-3" href="penyewaan.php">Isi Form Penyewaan</a>
  <table id="tableku" class="table table-striped table-hover mb-5">
    <thead>
      <tr>
        <th>Nama Pemesan</th>
        <th>Nama Kendaraan</th>
        <th>Tanggal Pemesanan</th>
        <th>Detail</th>
      </tr>
    </thead>
    <tbody>
<?php
  $sql = "SELECT * FROM penyewaan";
  $result = mysqli_query($conn,$sql);
  if (mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
?>
      <tr>
        <td><?= $row["nama_pemesan"] ?></td>
        <td><?= $row["kendaraan"] ?></td>
        <td><?= $row["tanggal_pemesanan"] ?></td>
        <td><a href="bukti-penyewaan-detail.php?id=<?= $row['id'] ?>" class="btn btn-success btn-sm">Detail Pembayaran</a></td>
      </tr>
<?php
    }
  }
  mysqli_close($conn);
?>
    </tbody>
  </table>
</div>
<?php
include("footer.php");
?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script>let table = new DataTable("#tableku") </script>