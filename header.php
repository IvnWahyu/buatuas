<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include("koneksi/koneksi.php");
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Drive Deals</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom styles -->
    <link rel="stylesheet" href="assets/style.css">
    <link rel="icon" href="assets/icon/logotab.png" type="image/x-icon">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
        <img src="assets/icon/logo.png" alt="Drive Deals Logo" style="width: 100px; height: auto;">
    </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <?php
                    // Periksa apakah pengguna sudah login
                    if (isset($_SESSION["username"])) {
                        // Jika sudah login, tampilkan tombol logout
                        echo '<a class="nav-link" href="dashboard-user.php">Beranda</a>';
                    } else {
                        // Jika belum login, tampilkan tombol register
                        echo '<a class="nav-link" href="index.php">Beranda</a>';
                    }
                    ?>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="listmobil.php">List Mobil</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">Penyewaan</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="penyewaan.php">Form Pemesanan</a></li>
                        <li><a class="dropdown-item" href="bukti-penyewaan.php">List Penyewaan</a></li>
                        <li><a class="dropdown-item" href="#">Link 3</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">Tentang Kami</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="kontak.php">Kontak</a>
                </li>
                
                <li class="nav-item">
                    <?php
                    // Periksa apakah pengguna sudah login
                    if (isset($_SESSION["username"])) {
                        // Jika sudah login, tampilkan tombol logout
                        echo '<a class="nav-link" href="logout.php">Logout</a>';
                    } else {
                        // Jika belum login, tampilkan tombol register
                        echo '<a class="nav-link" href="register.php">Register</a>';
                    }
                    ?>
                </li>
            </ul>
        </div>
    </div>
</nav>