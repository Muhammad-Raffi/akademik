<?php
require 'koneksi.php';

if (isset($_POST['register'])) {
    $nama     = $_POST['nama_lengkap'];
    $email    = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // cek email sudah terdaftar
    $cek = $koneksi->query("SELECT * FROM pengguna WHERE email='$email'");
    if ($cek->num_rows > 0) {
        $error = "Email sudah terdaftar!";
    } else {
        $koneksi->query(
            "INSERT INTO pengguna (nama_lengkap, email, password)
             VALUES ('$nama','$email','$password')"
        );

        header("Location: login.php?register=success");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5" style="max-width:400px;">
    <h3 class="mb-3">Daftar Akun</h3>

    <?php if (isset($error)) : ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <form method="post">
        <div class="mb-3">
            <label>Nama Lengkap</label>
            <input type="text" name="nama_lengkap" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button name="register" class="btn btn-success w-100">
            Daftar
        </button>

        <div class="text-center mt-2">
            <a href="login.php">Sudah punya akun? Login</a>
        </div>
    </form>
</div>

</body>
</html>
