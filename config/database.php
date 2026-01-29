<?php
$conn = mysqli_connect("localhost", "root", "", "uas_pemrograman_web");

if (!$conn) {
    die("Koneksi database gagal!");
}