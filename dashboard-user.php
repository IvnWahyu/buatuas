<!DOCTYPE html>
<html lang="en">
<?php
include("header.php");
include("koneksi/koneksi.php");
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION["username"];
$sql = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $sql);
if ($result !== null) {
    $row = mysqli_fetch_assoc($result);
    $userFullName = $row["nama_lengkap"];
} else {
    header("Location: login.php");
    exit();
}
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Drive Deals</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div>
        <div class="jumbotron">
            <h1 class="display-4">Selamat Datang di Drive Deals, <?php echo $userFullName; ?>!</h1>
            <p class="lead">Temukan kendaraan yang sesuai dengan kebutuhan perjalanan Anda.</p>
            <a class="btn btn-primary btn-lg" href="listmobil.php" role="button">Lihat Kendaraan</a>
        </div>
        <section class="features">
            <div class="container">
                <div class="row text-center mt-4">
                    <div class="col-md-4">
                        <i class="bi bi-calendar3"></i>
                        <h3>Pemesanan Mudah</h3>
                        <p>Pesan kendaraan dengan mudah melalui platform kami.</p>
                    </div>
                    <div class="col-md-4">
                        <i class="bi bi-gear"></i>
                        <h3>Kendaraan Terawat</h3>
                        <p>Kendaraan kami selalu dalam kondisi terbaik dan terawat.</p>
                    </div>
                    <div class="col-md-4">
                        <i class="bi bi-person"></i>
                        <h3>Pelayanan Prima</h3>
                        <p>Kami siap memberikan pelayanan terbaik untuk kepuasan pelanggan.</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="blog mb-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="blog-post">
                            <h3 class="mb-4">Mengapa Memilih Rental Mobil?</h3>
                            <p>
                                Memilih rental mobil dapat memberikan banyak keuntungan untuk perjalanan Anda. Berikut adalah beberapa alasan mengapa menyewa mobil bisa menjadi pilihan yang bijak:
                            </p>
                            <h5><b>1. Fleksibilitas Perjalanan </b></h5>
                            <p>
                                Dengan mobil sewaan, Anda memiliki kendali penuh atas jadwal perjalanan Anda. Anda bisa berhenti di tempat-tempat menarik yang tidak terjangkau oleh transportasi umum.
                            </p>
                            <h5><b>2. Kenyamanan dan Privasi</b></h5>
                            <p>
                                Dibandingkan dengan transportasi umum, mobil sewaan memberikan kenyamanan dan privasi ekstra. Anda tidak perlu berbagi ruang dengan orang asing.

                            </p>
                            <h5><b>3. Akses ke Tempat Terpencil</b></h5>
                            <p>
                                Jika tujuan Anda termasuk tempat-tempat terpencil atau jalan yang tidak terlayani oleh transportasi umum, mobil sewaan memberikan akses yang lebih baik.
                            </p>
                            <h5><b>4. Pilihan Kendaraan</b></h5>
                            <p>
                                Rental mobil menawarkan berbagai pilihan kendaraan, mulai dari mobil ekonomis hingga kendaraan mewah. Anda bisa memilih kendaraan sesuai kebutuhan dan selera.
                            </p>
                            <h5><b>5. Liburan Lebih Aman dan Nyaman </b></h5>
                            <p>
                                Saat bepergian dengan keluarga atau teman-teman, menyewa mobil memberikan kenyamanan dan keamanan tambahan, terutama jika Anda memiliki banyak barang bawaan.
                            </p>
                            <p>
                                Jadi, pertimbangkan untuk menyewa mobil pada perjalanan Anda berikutnya dan nikmati kebebasan dan fleksibilitas yang ditawarkan!
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="blog-photo about-image">
                            <img src="assets/blog.jpg" class="img-fluid rounded" alt="Rental Mobil 1">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
<?php
include("footer.php")
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
</body>
</html>
