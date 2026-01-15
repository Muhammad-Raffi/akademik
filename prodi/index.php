<?php
session_start();

/* Proteksi halaman */
if (!isset($_SESSION['login'])) {
    header("Location: ../mahasiswa/login.php");
    exit;
}

$page = $_GET['page'] ?? 'list';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akademik</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .container-fix {
            margin-left: 18.75rem;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-warning">
    <div class="container container-fix">

        <!-- BRAND -->
        <a class="navbar-brand"
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
                    <a class="nav-link"
                       href="../mahasiswa/index.php">
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link"
                       href="../mahasiswa/index.php?page=mahasiswa">
                        Mahasiswa
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= in_array($page, ['list','create','edit']) ? 'active fw-bold' : '' ?>"
                       href="index.php?page=list">
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
                        <li>
                            <a class="dropdown-item" href="../mahasiswa/edit_profil.php">
                                Edit Profil
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item text-danger"
                               href="../mahasiswa/logout.php"
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

<div class="container container-fix my-4">
<?php
switch ($page) {
    case 'create':
        include 'create.php';
        break;

    case 'edit':
        include 'edit.php';
        break;

    default:
        include 'list.php';
        break;
}
?>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
