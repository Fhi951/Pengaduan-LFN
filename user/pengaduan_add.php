<?php
session_start();
include "../config/database.php";

if ($_SESSION['role'] != 'user') {
    header("Location: ../auth/login.php");
}

if (isset($_POST['kirim'])) {
    mysqli_query($conn, "
        INSERT INTO pengaduan (user_id, judul, isi)
        VALUES (
            $_SESSION[id],
            '$_POST[judul]',
            '$_POST[isi]'
        )
    ");

    $_SESSION['notif'] = "Pengaduan berhasil dikirim!";
    header("Location: tracking.php");
}
?>

<link rel="stylesheet" href="../assets/css/style.css">

<div class="header">Ajukan Pengaduan</div>

<div class="container">
<div class="card">

<form method="post">
    <label>Judul Pengaduan</label>
    <input type="text" name="judul" required>

    <label>Isi Pengaduan</label>
    <textarea name="isi" rows="5" required></textarea>

    <button name="kirim">Kirim Pengaduan</button>
</form>

</div>
</div>