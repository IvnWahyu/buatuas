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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Admin</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom styles -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Dashboard Admin</h1>
        <p>Selamat datang di halaman dashboard admin. Silakan pilih opsi di menu di atas.</p>

        <!-- Content from your original code -->
        <div class="container-fluid mt-3">
            <h3>Bukti Pembayaran</h3>
            <p>List Bukti Pembayaran Pada Aplikasi</p>
            <table id="tableku" class="table table-striped table-hover mb-5">
                <thead>
                    <tr>
                        <th>Nama Pemesan</th>
                        <th>Nama Kendaraan</th>
                        <th>Tanggal Pemesanan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM penyewaan";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                            <tr>
                                <td><?= $row["nama_pemesan"] ?></td>
                                <td><?= $row["kendaraan"] ?></td>
                                <td><?= $row["tanggal_pemesanan"] ?></td>
                                <td>
                                    <a href="edit-bukti-penyewaan-admin.php?id=<?= $row['id'] ?>" class="btn btn-warning text-white">Edit</a>
                                    <a href="delete-bukti-penyewaan-admin.php?id=<?= $row['id'] ?>" class="btn btn-danger text-white" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Delete</a>
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
    </div>
    <?php
    include("../footer.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>
