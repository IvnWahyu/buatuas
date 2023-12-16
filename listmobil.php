<!DOCTYPE html>
<html lang="en">
<?php
include("header.php");
include("koneksi/koneksi.php");
?>
<body>
<!-- Daftar Kendaraan -->
    <section class="vehicle-list">
        <div class="container">
            <div class="row mb-4">
                <div class="col-md-6">
                    <h2 class="text-center mb-4">Daftar Kendaraan yang Dapat Disewa</h2>
                </div>
                <div class="col-md-6">
                    <form class="d-flex">
                        <input class="form-control me-2" type="text" name="search" placeholder="Cari berdasarkan nama">
                        <select class="form-select me-2" name="merek_mobil">
                            <option value="">Pilih Merek</option>
                            <option value="Toyota">Toyota</option>
                            <option value="Honda">Honda</option>
                            <option value="Mitsubishi">Mitsubishi</option>
                            <option value="Daihatsu">Daihatsu</option>
                            <option value="Suzuki">Suzuki</option>
                        </select>
                        <select class="form-select me-2" name="kapasitas_mobil">
                            <option value="">Pilih Kapasitas</option>
                            <option value="4">4 Orang</option>
                            <option value="5">5 Orang</option>
                            <option value="7">7 Orang</option>
                        </select>
                        <button class="btn btn-outline-primary" type="submit">Cari</button>
                        <?php if (!empty($search) || !empty($_GET['merek_mobil']) || !empty($_GET['kapasitas_mobil'])) : ?>
                        <?php endif; ?> 
                    </form>
                </div>  
            </div>
            <div class="row">
                <?php
                $search = isset($_GET['search']) ? $_GET['search'] : '';
                $merekMobil = isset($_GET['merek_mobil']) ? $_GET['merek_mobil'] : '';
                $kapasitasMobil = isset($_GET['kapasitas_mobil']) ? $_GET['kapasitas_mobil'] : '';
                $sql = "SELECT * FROM listmobil";
                if (!empty($merekMobil)) {
                    $sql .= " WHERE merek_mobil = '$merekMobil'";
                }

                if (!empty($kapasitasMobil)) {
                    $sql .= empty($merekMobil) ? " WHERE" : " AND";
                    $sql .= " kapasitas_mobil = '$kapasitasMobil'";
                }
                
                if (!empty($search)) {
                    $sql .= (empty($merekMobil) && empty($kapasitasMobil)) ? " WHERE" : " AND";
                    $sql .= " nama_mobil LIKE '%$search%'";
                }
                $result = mysqli_query($conn, $sql);
                $counter = 0;
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img src="assets/car/<?= $row["gbr_mobil"] ?>" class="card-img-top" alt="Kendaraan <?= $row["nama_mobil"] ?>">
                                <div class="card-body">
                                    <h3 class="card-title"><b><?= $row["nama_mobil"] ?></b></h3>
                                    <h5 class="card-title"><?= $row["merek_mobil"] ?></h5>
                                    <h6 class="card-title">Kapasitas : <?= $row["kapasitas_mobil"] ?> orang</h6>
                                    <p class="card-text"><?= $row["deskripsi_mobil"] ?></p>
                                    <p class="card-text"><strong>Rp <?= $row["harga_mobil"] ?>/hari</strong></p>
                                    <a href="listmobil-detail.php?id=<?= $row["id"] ?>" class="btn btn-primary">
                                        <img src="assets\icon\info.png" alt="Info" style="margin-right: 5px; filter: brightness(0) invert(1);"> Detail
                                    </a>
                                    <a href="penyewaan.php" class="btn btn-success">
                                        <img src="assets\icon\form.png" alt="Pesan" style="margin-right: 5px; filter: brightness(0) invert(1);"> Form
                                    </a>
                                </div>
                            </div>
                        </div>
                <?php
                        $counter++;
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
include("footer.php");
?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js"></script>
</body>
</html>
