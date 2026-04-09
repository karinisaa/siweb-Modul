<?php
session_start();

// Kredensial valid (hardcoded untuk simulasi)
$valid_users = [
    'admin'   => 'admin123',
    'manager' => 'manager123',
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    $remember = isset($_POST['remember']);

    // Validasi input tidak kosong
    if (empty($username) || empty($password)) {
        header("Location: ../login.php?error=empty");
        exit;
    }

    // Cek kredensial
    if (isset($valid_users[$username]) && $valid_users[$username] === $password) {
        // Set session
        $_SESSION['user']     = $username;
        $_SESSION['login_at'] = date('Y-m-d H:i:s');

        // Fitur Remember Me — simpan username ke cookie selama 7 hari
        if ($remember) {
            setcookie('username', $username, time() + (7 * 24 * 60 * 60), '/');
        } else {
            setcookie('username', '', time() - 3600, '/');
        }

        header("Location: ../index.php");
        exit;
    } else {
        header("Location: ../login.php?error=invalid");
        exit;
    }
} else {
    header("Location: ../login.php");
    exit;
}