<form method="POST" action="../mahasiswa/proses.php">
    <div class="container">
        <h3 class="mt-3">Tambah Prodi</h3>

        <div class="mb-3">
            <label class="form-label">Nama Prodi</label>
            <input type="text"
                   class="form-control"
                   name="nama_prodi"
                   placeholder="Contoh: Teknik Komputer"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">Jenjang</label>
            <select class="form-select" name="jenjang" required>
                <option value="">-- Pilih Jenjang --</option>
                <option value="D2">D2</option>
                <option value="D3">D3</option>
                <option value="D4">D4</option>
                <option value="S2">S2</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Keterangan</label>
            <textarea class="form-control"
                      name="keterangan"
                      rows="4"
                      placeholder="Deskripsi singkat program studi"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">
            Simpan
        </button>

        <a href="index.php?page=prodi" class="btn btn-outline-secondary">
            Kembali
        </a>
    </div>
</form>
