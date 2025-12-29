<?php
session_start();
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
    <title>Data Prodi</title>

    <!-- Bootstrap sama persis -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg bg-warning">
    <div class="container">
        <a class="navbar-brand" href="../mahasiswa/index.php">
            AKADEMIK
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">

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

                <!-- MENU PRODI -->
                <li class="nav-item">
                    <a class="nav-link <?= in_array($page, ['list','create','edit']) ? 'active' : '' ?>"
                       href="index.php?page=list">
                        Prodi
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>

<div class="container my-4">
<?php
if ($page == 'list')   include 'list.php';
if ($page == 'create') include 'create.php';
if ($page == 'edit')   include 'edit.php';
?>
</div>

</body>
</html>
