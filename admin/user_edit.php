<?php
include "../config/database.php";
$id = $_GET['id'];
$u = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT * FROM users WHERE id=$id")
);

if (isset($_POST['update'])) {
    mysqli_query($conn,
        "UPDATE users SET
        nama='$_POST[nama]',
        email='$_POST[email]',
        role='$_POST[role]'
        WHERE id=$id"
    );
    header("Location: user_list.php");
}
?>

<form method="post">
    <input name="nama" value="<?= $u['nama']; ?>">
    <input name="email" value="<?= $u['email']; ?>">
    <select name="role">
        <option value="admin">Admin</option>
        <option value="user">User</option>
    </select>
    <button name="update">Update</button>
</form>