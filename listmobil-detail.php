<?php
include("header.php");
include("koneksi/koneksi.php");
?>
<body>
  <section>
      <div class="container-fluid mt-3">
      <a class="btn btn-primary mb-3" href="listmobil.php">Kembali</a>
      </div>
  </section>
  <?php
    $id = 0;
    if (isset($_GET["id"])) {
      $id = $_GET["id"];
      $id = mysqli_real_escape_string($conn, $id);
    }
    $sql = "SELECT * FROM listmobil WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $id = $row["id"];
      $nama_mobil = $row['nama_mobil'];
      $merek_mobil = $row['merek_mobil'];
      $kapasitas_mobil = $row['kapasitas_mobil'];
      $deskripsi_mobil = $row['deskripsi_mobil'];
    } else {
      $id = "";
      $nama_mobil = "";
      $merek_mobil = "";
      $kapasitas_mobil = "";
      $deskripsi_mobil = "";
    }
    mysqli_close($conn);
    ?>
  <section class="vehicle-detail mt-4">
      <div class="container">
          <h2 class="text-center mb-4"><?= $merek_mobil ?> <?= $nama_mobil ?> </h2>
          <div class="row">
              <div class="col-md-4">
                  <img src="assets/car/<?= $row["gbr_mobil"] ?>" class="img-fluid" alt="<?= $nama_mobil ?>">
              </div>
              <div class="col-md-8">
                  <h5>Kapasitas : <?= $kapasitas_mobil ?> orang</h5>
                  <p><?= $deskripsi_mobil ?></p>
              </div>
          </div>
      </div>
  </section>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js"></script>
</body>
</html>
<?php
include("footer.php");
?>