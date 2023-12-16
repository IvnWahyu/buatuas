<!DOCTYPE html>
<html lang="en">
<?php 
include("header.php");
include("koneksi/koneksi.php");
?>
<section class="rental-form mb-4 mt-4">
    <div class="container">
        <h2 class="text-center mb-4">Bukti Penyewaan</h2>
        <a class="btn btn-primary mb-3" href="bukti-penyewaan.php">Kembali</a>
        <?php
        $id = 0;
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            $id = mysqli_real_escape_string($conn, $id);
        }
        $sql = "SELECT * FROM penyewaan WHERE id=$id";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $namaPemesan = $row["nama_pemesan"];
            $email = $row["email"];
            $nomorTelepon = $row["nomor_telepon"];
            $kendaraan = $row["kendaraan"];
            $hargaPerHari = $row["harga"];
            $tanggalSewa = $row["tanggal_pemesanan"];
            $lamaSewa = $row["lama_sewa"];
            $tanggalPengembalian = $row["tanggal_pengembalian"];

            $totalHarga = $hargaPerHari * $lamaSewa;
            $totalHargaFormatted = number_format($totalHarga, 0, ',', '.');
        } else {
            $namaPemesan ="";
            $email = "";
            $nomorTelepon = "";
            $kendaraan = "";
            $hargaPerHari = "";
            $tanggalSewa = "";
            $lamaSewa = "";
            $tanggalPengembalian = "";

        }
        mysqli_close($conn);
        ?>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-4">Informasi Penyewaan</h5>
                <p class="card-text"><strong>Nama Pemesan:</strong> <?php echo $namaPemesan; ?></p>
                <p class="card-text"><strong>Email:</strong> <?php echo $email; ?></p>
                <p class="card-text"><strong>Nomor Telepon:</strong> <?php echo $nomorTelepon; ?></p>
                <p class="card-text"><strong>Kendaraan:</strong> <?php echo $kendaraan; ?></p>
                <p class="card-text"><strong>Harga Sewa per Hari:</strong> Rp <?php echo number_format($hargaPerHari, 0, ',', '.'); ?>.000</p>
                <p class="card-text"><strong>Tanggal Sewa:</strong> <?php echo $tanggalSewa; ?></p>
                <p class="card-text"><strong>Lama Sewa:</strong> <?php echo $lamaSewa; ?> hari</p>
                <p class="card-text"><strong>Tanggal Pengembalian:</strong> <?php echo $tanggalPengembalian; ?></p>
                <p class="card-text"><strong>Total Harga:</strong> Rp <?php echo $totalHargaFormatted ?>.000</p>
            </div>
        </div>
    </div>
</section>
<?php include("footer.php"); ?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js"></script>
</body>
</html>
