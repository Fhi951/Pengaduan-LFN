<?php
require_once __DIR__ . "/config/database.php";

if ($conn) {
    echo "KONEKSI DATABASE BERHASIL";
} else {
    echo "GAGAL KONEKSI";
}