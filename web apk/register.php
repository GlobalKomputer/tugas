<?php
include "koneksi.php";

function input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = input($_POST["username"]);
    $password = input($_POST["password"]);

    // Periksa apakah username sudah ada
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($kon, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Username sudah ada
        echo "<div class='alert alert-danger text-center'>Username sudah terdaftar. Silakan pilih username lain.</div>";
    } else {
        // Username belum ada, lanjutkan proses registrasi
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        $hasil = mysqli_query($kon, $sql);

        if ($hasil) {
            echo "<div class='alert alert-success text-center'>Registrasi berhasil!</div>";
        } else {
            echo "<div class='alert alert-danger text-center'>Registrasi gagal!</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>Register</h4>
                    </div>
                    <div class="card-body">
                        <form action="register.php" method="post">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Register</button>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <a href="login.php" class="btn btn-secondary">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
