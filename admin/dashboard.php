<?php
session_start();

require_once __DIR__ . "/../config/database.php";

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../auth/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="header">
    <h1>Dashboard Admin — Sistem Pengaduan Masyarakat</h1>
</div>

<div class="container">
    <div class="card">
        <p>Selamat datang, <b><?= $_SESSION['nama'] ?? 'Admin'; ?></b></p>

        <div class="menu">
            <a href="user_list.php">👥 Kelola User</a>
            <a href="pengaduan_list.php">📄 Data Pengaduan</a>
            <a href="../auth/logout.php">🚪 Logout</a>
        </div>
    </div>
</div>

</body>
</html>