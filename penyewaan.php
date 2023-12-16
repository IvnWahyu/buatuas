<!DOCTYPE html>
<html lang="en">
<?php
include("header.php");
include("koneksi/koneksi.php");

// Inisialisasi array untuk menyimpan nama mobil dan harga mobil
$mobil_options = array();
// Ambil data mobil dari database
$sql_mobil = "SELECT nama_mobil, harga_mobil FROM listmobil";
$result_mobil = mysqli_query($conn, $sql_mobil);
// Loop untuk mengambil data nama mobil dan harga mobil
while ($row_mobil = mysqli_fetch_assoc($result_mobil)) {
    $mobil_options[] = array('nama_mobil' => $row_mobil['nama_mobil'], 'harga_mobil' => $row_mobil['harga_mobil']);
}
// Inisialisasi total harga
$total_harga = 0;
// Proses formulir ketika data dikirim
if (isset($_POST["nama"], $_POST["email"], $_POST["telepon"], $_POST["kendaraan"], $_POST["harga"], $_POST["tanggal-sewa"], $_POST["lama-sewa"], $_POST["tanggal-pengembalian"])) {
    // Ambil data dari formulir
    $nama_pemesan = $_POST["nama"];
    $email = $_POST["email"];
    $nomor_telepon = $_POST["telepon"];
    $kendaraan = $_POST["kendaraan"];
    $harga_sewa_per_hari = $_POST["harga"];
    $tanggal_sewa = $_POST["tanggal-sewa"];
    $lama_sewa = $_POST["lama-sewa"];
    $tanggal_pengembalian = $_POST["tanggal-pengembalian"];

    // Hitung total harga
    $total_harga = $harga_sewa_per_hari * $lama_sewa;

    // Query SQL INSERT
    $sql_insert = "INSERT INTO penyewaan (nama_pemesan, email, nomor_telepon, kendaraan, harga, tanggal_pemesanan, lama_sewa, tanggal_pengembalian, total_harga) 
               VALUES ('$nama_pemesan', '$email', '$nomor_telepon', '$kendaraan', '$harga_sewa_per_hari', '$tanggal_sewa', '$lama_sewa', '$tanggal_pengembalian', '$total_harga')";

    // Eksekusi query
    if (mysqli_query($conn, $sql_insert)) {
        echo "Data berhasil disimpan ke database.";
    } else {
        echo "Error: " . $sql_insert . "<br>" . mysqli_error($conn);
    }
}
?>

<!-- Form Penyewaan -->
<section class="rental-form">
    <div class="container">
        <h2 class="text-center mb-4">Formulir Penyewaan</h2>
        <form method="post" action="">
            <div class="mb-3">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama" required>
            </div>
            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan Email" required>
            </div>
            <div class="mb-3">
                <label for="telepon">Nomor Telepon</label>
                <input type="tel" class="form-control" name="telepon" id="telepon" placeholder="Masukkan Nomor Telepon" required>
            </div>
            <div class="mb-3">
                <label for="kendaraan">Pilih Kendaraan</label>
                <select class="form-select" name="kendaraan" id="kendaraan" required>
                    <option value="" selected disabled>Pilih Kendaraan</option>
                    <?php
                    // Loop untuk mengisi opsi dropdown dengan nama mobil dari array
                    foreach ($mobil_options as $mobil) {
                        echo "<option value='" . $mobil['nama_mobil'] . "' data-harga='" . $mobil['harga_mobil'] . "'>" . $mobil['nama_mobil'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="harga">Harga Sewa Mobil per Hari</label>
                <input type="text" class="form-control" name="harga" id="harga" placeholder="Harga Mobil per Hari" readonly>
            </div>
            <div class="mb-3">
                <label for="tanggal-sewa">Tanggal Sewa</label>
                <input type="date" class="form-control" name="tanggal-sewa" id="tanggal-sewa" required>
            </div>
            <div class="mb-3">
                <label for="lama-sewa">Lama Sewa (hari)</label>
                <input type="number" class="form-control" name="lama-sewa" id="lama-sewa" placeholder="Misalnya: 1, 2, 3" required>
            </div>
            <div class="mb-3">
                <label for="tanggal-pengembalian">Tanggal Pengembalian</label>
                <input type="date" class="form-control" name="tanggal-pengembalian" id="tanggal-pengembalian" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</section>
<script>
    // Event listener untuk mendapatkan harga mobil saat memilih kendaraan
    document.getElementById('kendaraan').addEventListener('change', function() {
        var selectedOption = this.options[this.selectedIndex];
        var hargaMobil = selectedOption.getAttribute('data-harga');
        document.getElementById('harga').value = hargaMobil;
    });
</script>
<?php
include("footer.php");
?>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js"></script>
</body>
</html>
