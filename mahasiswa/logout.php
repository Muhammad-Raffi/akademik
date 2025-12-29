<?php
session_start();

/* Hapus semua session */
$_SESSION = [];
session_unset();
session_destroy();

/* Pastikan benar-benar pindah */
header("Location: login.php");
exit;
