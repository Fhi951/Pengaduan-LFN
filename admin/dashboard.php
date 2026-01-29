<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../auth/login.php");
    exit;
}
?>
<link rel="stylesheet" href="../assets/css/style.css">

<div class="header">
    <h1>Dashboard Admin — Sistem Pengaduan Masyarakat</h1>
</div>

<div class="container">
    <div class="card">
        <p>Selamat datang, <b><?= $_SESSION['nama']; ?></b></p>

        <div class="menu">
            <a href="user_list.php">👥 Kelola User</a>
            <a href="pengaduan_list.php">📄 Data Pengaduan</a>
            <a href="../auth/logout.php">🚪 Logout</a>
        </div>
    </div>
</div>