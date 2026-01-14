<?php
$nama = $_SESSION['user_nama'] ?? 'User';
$isAdmin = strtolower($nama) === 'admin';
?>

<div class="card shadow-sm">
    <div class="card-body p-4">

        <h4 class="mb-2">
            👋 Selamat Datang,
            <span class="text-primary">
                <?= htmlspecialchars($nama) ?>
            </span>
        </h4>

        <p class="text-muted mb-4">
            Anda login sebagai 
            <b><?= $isAdmin ? 'Administrator' : 'User' ?></b> 
            pada Sistem Akademik.
        </p>

        <div class="row g-3">

            <!-- Informasi Akun -->
            <div class="col-md-6">
                <div class="border rounded p-3 h-100">
                    <h6 class="fw-bold mb-2">👤 Informasi Akun</h6>
                    <p class="mb-1"><b>Nama Lengkap:</b> <?= htmlspecialchars($nama) ?></p>
                    <p class="mb-1"><b>Status Login:</b> Aktif</p>
                    <p class="mb-0">
                        <b>Akses:</b> <?= $isAdmin ? 'Administrator' : 'User' ?>
                    </p>
                </div>
            </div>

            <!-- Informasi Sistem (BERBEDA) -->
            <div class="col-md-6">
                <div class="border rounded p-3 h-100">
                    <h6 class="fw-bold mb-2">📌 Informasi Sistem</h6>

                    <?php if ($isAdmin): ?>
                        <ul class="mb-0">
                            <li>Mengelola data mahasiswa</li>
                            <li>Mengelola program studi</li>
                            <li>Mengelola akun pengguna</li>
                            <li>Memastikan integritas data akademik</li>
                        </ul>
                    <?php else: ?>
                        <ul class="mb-0">
                            <li>Melihat data mahasiswa</li>
                            <li>Mengakses informasi program studi</li>
                            <li>Melihat data akademik</li>
                        </ul>
                    <?php endif; ?>

                </div>
            </div>

        </div>

        <hr class="my-4">

        <p class="text-muted mb-0">
            Silakan gunakan menu navigasi di atas sesuai dengan hak akses Anda.
        </p>

    </div>
</div>
