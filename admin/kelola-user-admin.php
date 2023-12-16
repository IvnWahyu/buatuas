<?php
include("headeradmin.php");
include("../koneksi/koneksi.php");
session_start();
// Periksa apakah pengguna sudah login dan memiliki role admin
if (!isset($_SESSION["username"]) || $_SESSION["username"] !== 'admin') {
    header("Location: ../login.php");
    exit();
}
?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" >
<body>
  <div class="container mt-5">
    <h3>Kelola User</h3>
    <p>List User Pada Aplikasi</p>
    <table id="tableku" class="table table-striped table-hover mb-5">
      <thead>
        <tr>
          <th>Nama Lengkap</th>
          <th>Username</th>
          <th>Password</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
  <?php
    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn,$sql);
    if (mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_assoc($result)){
  ?>
        <tr>
          <td><?= $row["nama_lengkap"] ?></td>
          <td><?= $row["username"] ?></td>
          <!-- <td><?= $row["password"] ?></td> -->
          <td><?= str_repeat("*", strlen($row["password"])) ?></td>
          <td>
              <a href="edit-kelola-user-admin.php?id=<?= $row['id'] ?>" class="btn btn-warning text-white">Edit</a>
              <a href="delete-kelola-user-admin.php?id=<?= $row['id'] ?>" class="btn btn-danger text-white" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Delete</a>
          </td>
        </tr>
  <?php
      }
    }
    mysqli_close($conn);
  ?>
      </tbody>
    </table>
  </div>
</body>
<?php
include("../footer.php");
?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script>let table = new DataTable("#tableku") </script>