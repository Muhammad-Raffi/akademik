<?php
session_start();

/* Proteksi halaman */
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

$page = $_GET['page'] ?? 'home';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akademik</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg bg-warning">
    <div class="container">

        <!-- BRAND -->
        <a class="navbar-brand <?= $page=='akademik' ? 'fw-bold' : '' ?>"
            href="../mahasiswa/index.php?page=akademik">
                Akademik
        </a>


        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <!-- MENU KIRI -->
            <ul class="navbar-nav me-auto">

                <li class="nav-item">
                    <a class="nav-link <?= $page=='home' ? 'active fw-bold' : '' ?>"
                       href="index.php?page=home">
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= $page=='mahasiswa' ? 'active fw-bold' : '' ?>"
                       href="index.php?page=mahasiswa">
                        Mahasiswa
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link"
                       href="../prodi/index.php?page=list">
                        Prodi
                    </a>
                </li>

            </ul>

            <!-- MENU KANAN (USER) -->
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle bg-white px-3 py-1 rounded-3"
                       href="#"
                       role="button"
                       data-bs-toggle="dropdown">
                        <?= htmlspecialchars($_SESSION['user_nama'] ?? 'User') ?>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item text-danger"
                               href="logout.php"
                               onclick="return confirm('Yakin ingin logout?')">
                                Logout
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>

        </div>
    </div>
</nav>

<div class="container my-4">
<?php
if ($page == 'home')      include 'home.php';
if ($page == 'akademik')  include 'akademik.php';
if ($page == 'mahasiswa') include 'list.php';
if ($page == 'create')    include 'create.php';
if ($page == 'edit')      include 'edit.php';
?>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
