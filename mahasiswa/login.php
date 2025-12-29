<?php
session_start();

/* Jika sudah login, langsung ke index */
if (isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}

require 'koneksi.php';

if (isset($_POST['login'])) {
    $email    = trim($_POST['email']);
    $password = $_POST['password'];

    $stmt = $koneksi->prepare("SELECT * FROM pengguna WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user   = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['login'] = true;
        $_SESSION['user']  = $user['nama_lengkap'];

        header("Location: index.php");
        exit;
    } else {
        $error = "Email atau password salah!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5" style="max-width:400px;">
    <h3 class="mb-3 text-center">Login</h3>

    <?php if (isset($_GET['register'])) : ?>
        <div class="alert alert-success">
            Registrasi berhasil, silakan login
        </div>
    <?php endif; ?>

    <?php if (isset($error)) : ?>
        <div class="alert alert-danger">
            <?= $error ?>
        </div>
    <?php endif; ?>

    <form method="post">
        <div class="mb-3">
            <label>Email</label>
            <input type="email"
                   name="email"
                   class="form-control"
                   required>
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password"
                   name="password"
                   class="form-control"
                   required>
        </div>

        <button type="submit"
                name="login"
                class="btn btn-primary w-100">
            Login
        </button>

        <div class="text-center mt-3">
            <a href="register.php">Belum punya akun? Daftar</a>
        </div>
    </form>
</div>

</body>
</html>
