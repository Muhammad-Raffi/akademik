<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg bg-warning">
    <div class="container">
        <a class="navbar-brand" href="#">DATA MAHASISWA</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=mahasiswa">Tabel Data</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=create">Tambah Data</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container my-4">
<?php
$page = $_GET['page'] ?? 'home';

if ($page == 'home') include 'home.php';
if ($page == 'mahasiswa') include 'list.php';
if ($page == 'create') include 'create.php';
if ($page == 'edit') include 'edit.php';
?>
</div>

</body>
</html>
