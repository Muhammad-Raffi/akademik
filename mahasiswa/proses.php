<?php
require 'koneksi.php';

/* =======================
   INSERT PRODI
======================= */
if (isset($_POST['simpan_prodi'])) {
    $nama_prodi = $_POST['nama_prodi'];
    $jenjang    = $_POST['jenjang'];
    $keterangan = $_POST['keterangan'];

    $query = "INSERT INTO prodi (nama_prodi, jenjang, keterangan)
              VALUES ('$nama_prodi', '$jenjang', '$keterangan')";

    $koneksi->query($query);

    header("Location: ../prodi/index.php?page=list");
    exit;
}


/* =======================
   UPDATE PRODI
======================= */
if (isset($_POST['update_prodi'])) {
    $id         = $_POST['id'];
    $nama_prodi = $_POST['nama_prodi'];
    $jenjang    = $_POST['jenjang'];
    $keterangan = $_POST['keterangan'];

    $query = "UPDATE prodi 
              SET nama_prodi='$nama_prodi',
                  jenjang='$jenjang',
                  keterangan='$keterangan'
              WHERE id='$id'";

    $koneksi->query($query);

    header("Location: ../prodi/index.php?page=list");
    exit;
}


/* =======================
   DELETE PRODI
======================= */
if (isset($_GET['hapus_prodi'])) {
    $id = $_GET['hapus_prodi'];

    $koneksi->query("DELETE FROM prodi WHERE id='$id'");

    header("Location: ../prodi/index.php?page=list");
    exit;
}


/* =======================
   INSERT MAHASISWA
======================= */
if (isset($_POST['submit'])) {
    $nim    = $_POST['nim'];
    $nama   = $_POST['nama_mhs'];
    $tgl    = $_POST['tgl_lahir'];
    $alamat = $_POST['alamat'];

    $query = "INSERT INTO mahasiswa (nim, nama_mhs, tgl_lahir, alamat, prodi_id)
              VALUES ('$nim','$nama','$tgl','$alamat', NULL)";

    $koneksi->query($query);

    header("Location: index.php?page=mahasiswa");
    exit;
}


/* =======================
   UPDATE MAHASISWA
======================= */
if (isset($_POST['update'])) {
    $nim    = $_POST['nim'];
    $nama   = $_POST['nama_mhs'];
    $tgl    = $_POST['tgl_lahir'];
    $alamat = $_POST['alamat'];

    $query = "UPDATE mahasiswa 
              SET nama_mhs='$nama',
                  tgl_lahir='$tgl',
                  alamat='$alamat'
              WHERE nim='$nim'";

    $koneksi->query($query);

    header("Location: index.php?page=mahasiswa");
    exit;
}


/* =======================
   DELETE MAHASISWA
======================= */
if (isset($_GET['id'])) {
    $nim = $_GET['id'];

    $koneksi->query("DELETE FROM mahasiswa WHERE nim='$nim'");
    header("Location: index.php?page=mahasiswa");
    exit;
}
?>
