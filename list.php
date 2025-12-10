<h1 class="mt-3">Data Mahasiswa</h1>
<a href="index.php?page=create" class="btn btn-primary mb-3">Tambah Data</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama Mahasiswa</th>
            <th>Tanggal Lahir</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        require 'koneksi.php';
        $tampil = $koneksi->query("SELECT * FROM mahasiswa");
        $no = 1;

        while ($data = mysqli_fetch_assoc($tampil)) {
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $data['nim']; ?></td>
            <td><?= $data['nama_mhs']; ?></td>
            <td><?= $data['tgl_lahir']; ?></td>
            <td><?= $data['alamat']; ?></td>
            <td class="text-center">
                <a class="btn btn-warning btn-sm" href="index.php?page=edit&id=<?= $data['nim']; ?>">Edit</a>
                <a class="btn btn-danger btn-sm" href="proses.php?id=<?= $data['nim']; ?>" onclick="return confirm('Yakin hapus data?')">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
