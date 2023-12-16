<?php
include("../koneksi/koneksi.php");
session_start();
// Periksa apakah pengguna sudah login dan memiliki role admin
if (!isset($_SESSION["username"]) || $_SESSION["username"] !== 'admin') {
    header("Location: ../login.php");
    exit();
}
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    // Query SQL DELETE
    $sql_delete = "DELETE FROM listmobil WHERE id = $id";
    // Eksekusi query
    if (mysqli_query($conn, $sql_delete)) {
        // Jika data berhasil dihapus, kembali ke halaman daftar kendaraan
        header("Location: list-mobil-admin.php");
        exit();
    } else {
        echo "Error: " . $sql_delete . "<br>" . mysqli_error($conn);
    }
} else {
    echo "ID tidak diberikan.";
}
// Tutup koneksi database
mysqli_close($conn);
?>
