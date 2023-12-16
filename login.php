<?php
include("header.php");
include("koneksi/koneksi.php");
// Periksa apakah pengguna sudah login, jika iya, arahkan ke halaman lain
if (isset($_SESSION["username"])) {
    header("Location: index.php");
    exit();
}
$login_error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    // Check if $result is not null before accessing it
    if ($result !== null) {
        $row = mysqli_fetch_assoc($result);

        // Periksa apakah password cocok menggunakan password_verify
        if ($row && password_verify($password, $row["password"])) {
            // Jika cocok, set session dan arahkan ke halaman sesuai role
            $_SESSION["username"] = $username;

            // Tambahkan pengecekan untuk role admin
            if ($username == 'admin') {
                header("Location: admin/dashboard-admin.php");
                exit();
            } else {
                header("Location: dashboard-user.php");
                exit();
            }
        } else {
            $login_error = "Login Gagal. Periksa kembali username dan password Anda.";
        }
    } else {
        $login_error = "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
<body>
    <div class="card" style="width: 800px; margin: auto; margin-top: 100px; margin-bottom: 100px;">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <div>
                    <img src="assets/login.jpg" alt="Login Image" style="width: 300px; height: auto;">
                </div>
                <div style="width: 400px;">
                    <h2 class="card-title">Login</h2>

                    <!-- Tambahkan pesan kesalahan -->
                    <?php if (!empty($login_error)) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $login_error; ?>
                        </div>
                    <?php endif; ?>

                    <form method="post" action="">
                        <label for="username">Username:</label>
                        <input type="text" name="username" id="username" class="form-control" value="" required>

                        <div class="mb-3" >
                            <label for="password">Password:</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                            <input type="checkbox" onclick="myFunction('password')">Show Password
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                    <p>Belum punya akun? <a href="register.php">Daftar</a></p>
                </div>
                
            </div>
        </div>
    </div>
</body>

<script>
    function myFunction(inputId) {
            var x = document.getElementById(inputId);
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js"></script>
