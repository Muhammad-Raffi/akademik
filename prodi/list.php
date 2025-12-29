<?php
require '../mahasiswa/koneksi.php';

$data = $koneksi->query("SELECT * FROM prodi");
?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Data Program Studi</h3>
    <a href="index.php?page=create" class="btn btn-primary">
        Tambah Prodi
    </a>
</div>

<?php if ($data->num_rows == 0): ?>
    <div class="alert alert-info">
        Belum ada data prodi.<br>
        Silakan klik <b>Tambah Prodi</b> untuk menambahkan program studi baru.
    </div>
<?php else: ?>

<table class="table table-bordered table-striped">
    <thead class="table-light text-center">
        <tr>
            <th width="50">No</th>
            <th>Nama Prodi</th>
            <th width="90">Jenjang</th>
            <th>Keterangan</th>
            <th width="140">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; while ($row = $data->fetch_assoc()): ?>
        <tr>
            <td class="text-center"><?= $no++ ?></td>
            <td><?= $row['nama_prodi'] ?></td>
            <td class="text-center"><?= $row['jenjang'] ?></td>
            <td><?= $row['keterangan'] ?></td>
            <td>
                <div class="d-flex justify-content-center gap-2">
                    
                    <!-- EDIT PRODI -->
                    <a href="index.php?page=edit&id=<?= $row['id'] ?>"
                       class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <!-- DELETE PRODI -->
                    <a href="../mahasiswa/proses.php?hapus_prodi=<?= $row['id'] ?>"
                       class="btn btn-danger btn-sm"
                       onclick="return confirm('Yakin hapus prodi?')">
                        Delete
                    </a>

                </div>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<?php endif; ?>
