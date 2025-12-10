<?php
require 'koneksi.php';

// CREATE
if (isset($_POST['submit'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama_mhs'];
    $tgl = $_POST['tgl_lahir'];
    $alamat = $_POST['alamat'];

    $query = "INSERT INTO mahasiswa VALUES ('$nim','$nama','$tgl','$alamat')";
    $koneksi->query($query);

    header("Location: index.php?page=bukutamu");
    exit;
}

// UPDATE
if (isset($_POST['update'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama_mhs'];
    $tgl = $_POST['tgl_lahir'];
    $alamat = $_POST['alamat'];

    $query = "UPDATE mahasiswa 
              SET nama_mhs='$nama', tgl_lahir='$tgl', alamat='$alamat'
              WHERE nim='$nim'";

    $koneksi->query($query);

    header("Location: index.php?page=bukutamu");
    exit;
}

// DELETE
if (isset($_GET['id'])) {
    $nim = $_GET['id'];
    $koneksi->query("DELETE FROM mahasiswa WHERE nim='$nim'");
    header("Location: index.php?page=bukutamu");
    exit;
}
?>
