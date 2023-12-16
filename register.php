<!DOCTYPE html>
<html lang="en">

<?php
include("header.php");
include("koneksi/koneksi.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm_password"];
    $nama_lengkap = mysqli_real_escape_string($conn, $_POST["nama_lengkap"]);
    // Check if password and confirm password match
    if ($password != $confirmPassword) {
        echo "Password dan Confirm Password tidak cocok.";
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO users (username, password, nama_lengkap) VALUES ('$username', '$hashedPassword', '$nama_lengkap')";

        if (mysqli_query($conn, $sql)) {
            echo "Pendaftaran berhasil.";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    mysqli_close($conn);
}
?>
<body>
    <div class="card" style="width: 800px; margin: auto; margin-top: 100px; margin-bottom: 100px;">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <div>
                    <img src="assets/register.jpg" alt="Register Image" style="width: 300px; height: auto;">
                </div>
                <div style="width: 400px;">
                    <h2 class="card-title">Register</h2>
                    <form id="registrationForm" method="post" onsubmit="return validateForm()">
                        <label for="username">Username:</label>
                        <input type="text" name="username" id="username" class="form-control" required>

                        <div>
                            <label for="nama_lengkap">Nama Lengkap:</label>
                            <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="password">Password:</label>
                            <div class="input-group">
                                <input type="password" name="password" id="password" class="form-control" required>
                                <br><br>
                            </div>
                            <input type="checkbox" onclick="myFunction('password')">Show Password
                        </div>

                        <div class="mb-3">
                            <label for="confirm_password">Confirm Password:</label>
                            <div class="input-group">
                                <input type="password" name="confirm_password" id="confirm_password" class="form-control" required>
                            </div>
                            <input type="checkbox" onclick="myFunction('confirm_password')">Show Password
                        </div>
                        <button type="submit" class="btn btn-primary">Register</button>
                    </form>
                    <p>Sudah punya akun? <a href="login.php">Masuk</a></p>
                </div>
                
            </div>
        </div>
    </div>
    <script>
        function validateForm() {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirm_password").value;

            if (password !== confirmPassword) {
                alert("Password dan Confirm Password tidak cocok.");
                return false;
            }

            return true;
        }
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
</body>
</html>
