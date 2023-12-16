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

<body>
    <section class="vehicle-list">
        <div class="container">
            <div class="row mb-4">
                <div class="col-md-6">
                    <h2 class="text-center mb-4 mt-4">Daftar Kendaraan</h2>
                </div>
                <div class="col-md-6">
                </div>
            </div>

            <div class="row">
                <?php
                $sql = "SELECT * FROM listmobil";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img src="../assets/car/<?= $row["gbr_mobil"] ?>" class="card-img-top" alt="Kendaraan <?= $row["nama_mobil"] ?>">
                                <div class="card-body">
                                    <h3 class="card-title"><?= $row["nama_mobil"] ?></h3>
                                    <h5 class="card-title"><?= $row["merek_mobil"] ?></h5>
                                    <h6 class="card-title">Kapasitas : <?= $row["kapasitas_mobil"] ?> orang</h6>
                                    <p class="card-text"><?= $row["deskripsi_mobil"] ?></p>
                                    <p class="card-text"><strong>Rp <?= $row["harga_mobil"] ?>/hari</strong></p>
                                    <a href="edit-mobil.php?id=<?= $row["id"] ?>" class="btn btn-warning text-white">
                                        <img src="../assets/icon/edit.png" alt="Edit" style="margin-right: 5px; filter: brightness(0) invert(1);"> Edit
                                    </a>
                                    <a href="delete-mobil.php?id=<?= $row["id"] ?>" class="btn btn-danger text-white" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">
                                        <img src="../assets/icon/delete.png" alt="Delete" style="margin-right: 5px; filter: brightness(0) invert(1); "> Delete
                                    </a>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo '<div class="col-md-12"><p>Tidak ada kendaraan yang ditemukan.</p></div>';
                }
                mysqli_close($conn);
                ?>
            </div>
        </div>
    </section>
</body>

<?php
include("../footer.php");
?>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js"></script>
</body>
</html>
