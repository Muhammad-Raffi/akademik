<?php
session_start();
require 'koneksi.php';

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

$id = $_SESSION['user_id'];

/* Ambil data user */
$stmt = $koneksi->prepare(
    "SELECT nama_lengkap, email FROM pengguna WHERE id = ?"
);
$stmt->bind_param("i", $id);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();

/* Update profil */
if (isset($_POST['update'])) {
    $nama     = trim($_POST['nama_lengkap']);
    $password = $_POST['password'];

    if (strlen($nama) < 3) {
        $error = "Nama minimal 3 karakter";
    } else {

        if (!empty($password)) {
            if (strlen($password) < 6) {
                $error = "Password minimal 6 karakter";
            } else {
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $stmt = $koneksi->prepare(
                    "UPDATE pengguna SET nama_lengkap=?, password=? WHERE id=?"
                );
                $stmt->bind_param("ssi", $nama, $hash, $id);
            }
        } else {
            $stmt = $koneksi->prepare(
                "UPDATE pengguna SET nama_lengkap=? WHERE id=?"
            );
            $stmt->bind_param("si", $nama, $id);
        }

        if (!isset($error)) {
            $stmt->execute();
            $_SESSION['user_nama'] = $nama;
            $success = "Profil berhasil diperbarui";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5" style="max-width:500px;">
    <h4 class="mb-3">Edit Profil</h4>

    <?php if (isset($success)) : ?>
        <div class="alert alert-success"><?= $success ?></div>
    <?php endif; ?>

    <?php if (isset($error)) : ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <form method="post">
        <div class="mb-3">
            <label>Nama Lengkap</label>
            <input type="text"
                   name="nama_lengkap"
                   value="<?= htmlspecialchars($user['nama_lengkap']) ?>"
                   class="form-control"
                   required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email"
                   value="<?= htmlspecialchars($user['email']) ?>"
                   class="form-control"
                   readonly>
        </div>

        <div class="mb-3">
            <label>Password Baru (opsional)</label>
            <input type="password"
                   name="password"
                   class="form-control">
        </div>

        <button name="update" class="btn btn-primary">
            Simpan Perubahan
        </button>

        <a href="index.php" class="btn btn-secondary ms-2">
            Kembali
        </a>
    </form>
</div>

</body>
</html>