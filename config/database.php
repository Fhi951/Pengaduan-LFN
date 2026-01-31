<?php
$host = "sql201.infinityfree.com";
$user = "if0_41031719";
$pass = "Uqda8a4w0su";
$db   = "if0_41031719_db_pengaduan";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi database gagal");
}