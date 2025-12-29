<?php
require 'koneksi.php';

$nim = $_GET['id'];
$query = "SELECT * FROM mahasiswa WHERE nim = '$nim'";
$result = $koneksi->query($query);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    header("Location: index.php?page=mahasiswa");
    exit;
}
?>

<form method="POST" action="proses.php">
    <div class="container">
        <h3 class="mt-3">Edit Data Mahasiswa</h3>

        <input type="hidden" name="nim" value="<?= $data['nim']; ?>">

        <div class="mb-3">
            <label class="form-label">Nama Mahasiswa</label>
            <input type="text" class="form-control" name="nama_mhs" value="<?= $data['nama_mhs']; ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" name="tgl_lahir" value="<?= $data['tgl_lahir']; ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <textarea class="form-control" name="alamat" required><?= $data['alamat']; ?></textarea>
        </div>

        <button type="submit" class="btn btn-success" name="update">Ubah Data</button>
        <a href="index.php?page=mahasiswa" class="btn btn-secondary">Batal</a>
    </div>
</form>
