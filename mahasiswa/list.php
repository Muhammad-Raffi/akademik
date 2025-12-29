<?php
require 'koneksi.php';

$data = $koneksi->query("SELECT * FROM mahasiswa");
?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Data Mahasiswa</h3>
    <a href="index.php?page=create" class="btn btn-primary">
        Tambah Data
    </a>
</div>

<?php if ($data->num_rows == 0): ?>
    <div class="alert alert-info">
        Belum ada data mahasiswa.<br>
        Silakan klik <b>Tambah Data</b> untuk menambahkan mahasiswa baru.
    </div>
<?php else: ?>

<table class="table table-bordered table-striped">
    <thead class="table-light text-center">
        <tr>
            <th width="50">No</th>
            <th>NIM</th>
            <th>Nama Mahasiswa</th>
            <th width="130">Tanggal Lahir</th>
            <th>Alamat</th>
            <th width="140">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; while ($row = $data->fetch_assoc()): ?>
        <tr>
            <td class="text-center"><?= $no++ ?></td>
            <td><?= $row['nim'] ?></td>
            <td><?= $row['nama_mhs'] ?></td>
            <td class="text-center"><?= $row['tgl_lahir'] ?></td>
            <td><?= $row['alamat'] ?></td>
            <td>
                <div class="d-flex justify-content-center gap-2">

                    <!-- EDIT MAHASISWA -->
                    <a href="index.php?page=edit&id=<?= $row['nim'] ?>"
                       class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <!-- DELETE MAHASISWA -->
                    <a href="proses.php?id=<?= $row['nim'] ?>"
                       class="btn btn-danger btn-sm"
                       onclick="return confirm('Yakin hapus data?')">
                        Delete
                    </a>

                </div>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<?php endif; ?>
