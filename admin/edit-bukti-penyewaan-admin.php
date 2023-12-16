<?php
include("../koneksi/koneksi.php");
include("headeradmin.php");
session_start();
// Periksa apakah pengguna sudah login dan memiliki role admin
if (!isset($_SESSION["username"]) || $_SESSION["username"] !== 'admin') {
    header("Location: ../login.php");
    exit();
}
$id = isset($_GET['id']) ? $_GET['id'] : '';
if (empty($id)) {
    // Redirect jika ID tidak tersedia
    header("Location: bukti-penyewaan-admin.php");
    exit();
}
// Ambil data mobil berdasarkan ID
$sql = "SELECT * FROM penyewaan WHERE id = $id";
$result = mysqli_query($conn, $sql);
if (!$result || mysqli_num_rows($result) === 0) {
    // Redirect jika data tidak ditemukan
    header("Location: bukti-penyewaan-admin.php");
    exit();
}
$row = mysqli_fetch_assoc($result);
// Proses formulir jika disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $namaPemesan = mysqli_real_escape_string($conn, $_POST["nama_pemesan"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $nomorTelepon = mysqli_real_escape_string($conn, $_POST["nomor_telepon"]);
    // Update data mobil
    $updateSql = "UPDATE penyewaan SET nama_pemesan='$namaPemesan', email='$email', nomor_telepon='$nomorTelepon' WHERE id=$id";
    if (mysqli_query($conn, $updateSql)) {
        // Redirect setelah update berhasil
        header("Location: bukti-penyewaan-admin.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
mysqli_close($conn);
?>
<body>
    
    <div class="container mt-5">
        <h2>Edit Data Mobil</h2>
        <form method="post" action="">
            <div class="mb-3">
                <label for="nama_pemesan" class="form-label">Nama Mobil</label>
                <input type="text" class="form-control" id="nama_pemesan" name="nama_pemesan" value="<?= $row['nama_pemesan'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Merek Mobil</label>
                <input type="text" class="form-control" id="email" name="email" value="<?= $row['email'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="nomor_telepon" class="form-label">Kapasitas Mobil</label>
                <input type="number" class="form-control" id="nomor_telepon" name="nomor_telepon" value="<?= $row['nomor_telepon'] ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
    <?php include("../footer.php"); ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js"></script>
</body>
</html>
