<?php
session_start();

if (isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}

require 'koneksi.php';

/* LOGIN */
if (isset($_POST['login'])) {
    $email    = trim($_POST['email']);
    $password = $_POST['password'];

    $stmt = $koneksi->prepare("SELECT * FROM pengguna WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $user = $stmt->get_result()->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['login']      = true;
        $_SESSION['user_id']    = $user['id'];
        $_SESSION['user_nama']  = $user['nama_lengkap'];
        $_SESSION['user_email'] = $user['email'];


        header("Location: index.php");
        exit;
    } else {
        $error = "Email atau password salah!";
    }
}

/* LUPA PASSWORD */
if (isset($_POST['reset'])) {
    $email    = trim($_POST['email']);
    $password = $_POST['password'];

    if (strlen($password) < 6) {
        $error = "Password minimal 6 karakter";
    } else {
        $stmt = $koneksi->prepare("SELECT id FROM pengguna WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $user = $stmt->get_result()->fetch_assoc();

        if ($user) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $koneksi->prepare(
                "UPDATE pengguna SET password = ? WHERE email = ?"
            );
            $stmt->bind_param("ss", $hash, $email);
            $stmt->execute();

            $success = "Password berhasil direset. Silakan login.";
        } else {
            $error = "Email tidak ditemukan";
        }
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
    <h3 class="mb-3 text-center">
        <?= isset($_GET['forgot']) ? 'Lupa Kata Sandi' : 'Login' ?>
    </h3>

    <?php if (isset($_GET['register'])) : ?>
        <div class="alert alert-success">
            Registrasi berhasil, silakan login
        </div>
    <?php endif; ?>

    <?php if (isset($success)) : ?>
        <div class="alert alert-success">
            <?= $success ?>
        </div>
    <?php endif; ?>

    <?php if (isset($error)) : ?>
        <div class="alert alert-danger">
            <?= $error ?>
        </div>
    <?php endif; ?>

    <!-- FORM LOGIN -->
    <?php if (!isset($_GET['forgot'])) : ?>
    <form method="post">
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button type="submit" name="login" class="btn btn-primary w-100">
            Login
        </button>

        <div class="text-center mt-3">
            <a href="?forgot=1">Lupa kata sandi?</a><br>
            <a href="register.php">Belum punya akun? Daftar</a>
        </div>
    </form>
    <?php endif; ?>

    <!-- FORM RESET PASSWORD -->
    <?php if (isset($_GET['forgot'])) : ?>
    <form method="post">
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Password Baru</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button type="submit" name="reset" class="btn btn-warning w-100">
            Reset Password
        </button>

        <div class="text-center mt-3">
            <a href="login.php">Kembali ke Login</a>
        </div>
    </form>
    <?php endif; ?>
</div>

</body>
</html>
