<?php
session_start();
include "../config/database.php";

if ($_SESSION['role'] != 'admin') {
    header("Location: ../auth/login.php");
}

$data = mysqli_query($conn, "SELECT * FROM users ORDER BY created_at DESC");
?>

<link rel="stylesheet" href="../assets/css/style.css">

<div class="header">Kelola User</div>

<div class="container">
<div class="card">

<table>
<tr>
    <th>Nama</th>
    <th>Email</th>
    <th>Role</th>
    <th>Terdaftar</th>
</tr>

<?php while($u = mysqli_fetch_assoc($data)) { ?>
<tr>
    <td><?= $u['nama']; ?></td>
    <td><?= $u['email']; ?></td>
    <td><?= ucfirst($u['role']); ?></td>
    <td><?= date('d M Y H:i', strtotime($u['created_at'])); ?></td>
</tr>
<?php } ?>

</table>

</div>
</div>