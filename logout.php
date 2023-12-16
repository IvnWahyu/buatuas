<?php
// Mulai sesi
session_start();
// Hapus semua data sesi
session_unset();
// Hancurkan sesi
session_destroy();
// Redirect ke halaman utama atau halaman lain jika diinginkan
header("Location: index.php");
exit();
?>