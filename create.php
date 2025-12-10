<form method="POST" action="proses.php">
    <div class="container">
        <h3 class="mt-3">Tambah Mahasiswa</h3>

        <div class="mb-3">
            <label class="form-label">NIM</label>
            <input type="text" class="form-control" name="nim" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Nama Mahasiswa</label>
            <input type="text" class="form-control" name="nama_mhs" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" name="tgl_lahir" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <textarea class="form-control" name="alamat" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </div>
</form>
