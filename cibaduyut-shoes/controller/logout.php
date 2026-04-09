<?php
session_start();

// Hapus semua session (sesuai modul)
$_SESSION = [];
session_destroy();

// Redirect ke halaman login
header("Location: ../login.php");
exit;
