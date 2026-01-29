<?php
include "../config/database.php";

if (isset($_POST['daftar'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    mysqli_query($conn,
        "INSERT INTO users (nama,email,password,role)
         VALUES ('$nama','$email','$password','user')"
    );

    header("Location: login.php");
}
?>

<link rel="stylesheet" href="../assets/css/style.css">

<form method="post" class="card">
    <h2>Register User</h2>
    <input type="text" name="nama" placeholder="Nama" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button name="daftar">Daftar</button>
</form>