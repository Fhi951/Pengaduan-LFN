<?php
include "../config/database.php";

if (isset($_POST['simpan'])) {
    mysqli_query($conn,
        "INSERT INTO users VALUES (
            NULL,
            '$_POST[nama]',
            '$_POST[email]',
            MD5('$_POST[password]'),
            '$_POST[role]',
            NOW()
        )"
    );
    header("Location: user_list.php");
}
?>

<form method="post">
    <input name="nama" placeholder="Nama">
    <input name="email" placeholder="Email">
    <input name="password" placeholder="Password">
    <select name="role">
        <option value="admin">Admin</option>
        <option value="user">User</option>
    </select>
    <button name="simpan">Simpan</button>
</form>