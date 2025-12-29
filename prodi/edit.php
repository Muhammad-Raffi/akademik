<?php
require '../mahasiswa/koneksi.php';

$id = $_GET['id'];
$data = $koneksi->query("SELECT * FROM prodi WHERE id='$id'")->fetch_assoc();

if (!$data) {
    header("Location: index.php?page=list");
    exit;
}
?>

<form method="POST" action="../mahasiswa/proses.php">
    <input type="hidden" name="id" value="<?= $data['id'] ?>">

    <div class="container">
        <h3 class="mt-3">Edit Prodi</h3>

        <div class="mb-3">
            <label class="form-label">Nama Prodi</label>
            <input type="text" class="form-control"
                   name="nama_prodi"
                   value="<?= $data['nama_prodi'] ?>"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">Jenjang</label>
            <select class="form-select" name="jenjang" required>
                <option value="D2" <?= $data['jenjang']=='D2'?'selected':'' ?>>D2</option>
                <option value="D3" <?= $data['jenjang']=='D3'?'selected':'' ?>>D3</option>
                <option value="D4" <?= $data['jenjang']=='D4'?'selected':'' ?>>D4</option>
                <option value="S2" <?= $data['jenjang']=='S2'?'selected':'' ?>>S2</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Keterangan</label>
            <textarea class="form-control"
                      name="keterangan"
                      rows="4"><?= $data['keterangan'] ?></textarea>
        </div>

        <button type="submit"
                name="update_prodi"
                class="btn btn-warning">
            Update
        </button>

        <a href="index.php?page=list" class="btn btn-secondary">
            Batal
        </a>
    </div>
</form>
