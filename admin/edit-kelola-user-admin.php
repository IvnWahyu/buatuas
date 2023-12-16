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
    header("Location: kelola-user-admin.php");
    exit();
}
// Ambil data mobil berdasarkan ID
$sql = "SELECT * FROM users WHERE id = $id";
$result = mysqli_query($conn, $sql);

if (!$result || mysqli_num_rows($result) === 0) {
    // Redirect jika data tidak ditemukan
    header("Location: kelola-user-admin.php");
    exit();
}
$row = mysqli_fetch_assoc($result);
// Proses formulir jika disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $namaLengkap = mysqli_real_escape_string($conn, $_POST["nama_lengkap"]);
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    // Update data mobil
    $updateSql = "UPDATE users SET nama_lengkap='$namaLengkap', username='$username', password='$password' WHERE id=$id";
    if (mysqli_query($conn, $updateSql)) {
        // Redirect setelah update berhasil
        header("Location: kelola-user-admin.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
mysqli_close($conn);
?>
<body>
    
    <div class="container mt-5">
        <h2>Edit Data User</h2>
        <form method="post" action="">
            <div class="mb-3">
                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?= $row['nama_lengkap'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="<?= $row['username'] ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
    <?php include("../footer.php"); ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js"></script>
</body>
</html>
