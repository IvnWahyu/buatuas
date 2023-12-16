<?php
include("header.php");
include("koneksi/koneksi.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $pesan = $_POST["pesan"];
    // Query SQL INSERT
    $sql_insert = "INSERT INTO kontak (nama, email, pesan) VALUES ('$nama', '$email', '$pesan')";
    // Eksekusi query
    if (mysqli_query($conn, $sql_insert)) {
        echo "Data berhasil disimpan ke database.";
    } else {
        echo "Error: " . $sql_insert . "<br>" . mysqli_error($conn);
    }
}
mysqli_close($conn);
?>
<body>
    <div class="container-fluid px-5 my-5">
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <div class="card border-0 rounded-3 shadow-lg overflow-hidden">
                    <div class="card-body p-0">
                        <div class="row g-0">
                            <div class="col-sm-6 d-none d-sm-block">
                                <img src="assets/kontak.jpg" alt="Kontak" style="width: 90%; height: 100%; object-fit: cover;">
                            </div>
                                <div class="col-sm-6 p-4">
                                    <div class="text-center">
                                        <div class="h3 fw-light">Kontak Form</div>
                                    </div>
                                    <form id="contactForm" method="post" action="">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="nama" name="nama" type="text" placeholder="Nama" data-sb-validations="required" />
                                            <label for="nama">Nama</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="email" name="email" type="email" placeholder="Email Address" data-sb-validations="required,email" />
                                            <label for="email">Email Address</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <textarea class="form-control" id="pesan" name="pesan" type="text" placeholder="Pesan" style="height: 10rem;" data-sb-validations="required"></textarea>
                                            <label for="pesan">Pesan</label>
                                        </div>
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php
include("footer.php");
?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js"></script>