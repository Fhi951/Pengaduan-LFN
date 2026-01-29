<?php
session_start();
if ($_SESSION['role'] != 'user') {
    header("Location: ../auth/login.php");
}
?>
<link rel="stylesheet" href="../assets/css/style.css">

<div class="header">
    <h1>Sistem Pengaduan Masyarakat</h1>
</div>

<div class="container">
    <div class="card">
        <p>Halo, <b><?= $_SESSION['nama']; ?></b></p>

       <div class="menu">
    <a href="pengaduan_add.php">📝 Ajukan Pengaduan</a>
    <a href="tracking.php">📊 Tracking Pengaduan</a>
    <a href="../auth/logout.php">🚪 Logout</a>
</div>