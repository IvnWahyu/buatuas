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
    header("Location: list-mobil-admin.php");
    exit();
}
// Ambil data mobil berdasarkan ID
$sql = "SELECT * FROM listmobil WHERE id = $id";
$result = mysqli_query($conn, $sql);
if (!$result || mysqli_num_rows($result) === 0) {
    // Redirect jika data tidak ditemukan
    header("Location: list-mobil-admin.php");
    exit();
}
$row = mysqli_fetch_assoc($result);
// Proses formulir jika disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_mobil = mysqli_real_escape_string($conn, $_POST["nama_mobil"]);
    $merek_mobil = mysqli_real_escape_string($conn, $_POST["merek_mobil"]);
    $kapasitas_mobil = mysqli_real_escape_string($conn, $_POST["kapasitas_mobil"]);
    $deskripsi_mobil = mysqli_real_escape_string($conn, $_POST["deskripsi_mobil"]);
    // Update data mobil
    $updateSql = "UPDATE listmobil SET nama_mobil='$nama_mobil', merek_mobil='$merek_mobil', kapasitas_mobil='$kapasitas_mobil', deskripsi_mobil='$deskripsi_mobil' WHERE id=$id";
    if (mysqli_query($conn, $updateSql)) {
        // Redirect setelah update berhasil
        header("Location: list-mobil-admin.php");
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
                <label for="nama_mobil" class="form-label">Nama Mobil</label>
                <input type="text" class="form-control" id="nama_mobil" name="nama_mobil" value="<?= $row['nama_mobil'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="merek_mobil" class="form-label">Merek Mobil</label>
                <input type="text" class="form-control" id="merek_mobil" name="merek_mobil" value="<?= $row['merek_mobil'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="kapasitas_mobil" class="form-label">Kapasitas Mobil</label>
                <input type="number" class="form-control" id="kapasitas_mobil" name="kapasitas_mobil" value="<?= $row['kapasitas_mobil'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi_mobil" class="form-label">Deskripsi Mobil</label>
                <textarea class="form-control" id="deskripsi_mobil" name="deskripsi_mobil" rows="3" required><?= $row['deskripsi_mobil'] ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
    <?php include("../footer.php"); ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js"></script>
</body>
</html>
