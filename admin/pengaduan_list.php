<?php
session_start();
require_once __DIR__ . "/../config/database.php";

if (!isset($_SESSION['login']) || $_SESSION['role'] != 'admin') {
    header("Location: ../auth/login.php");
    exit;
}

mysqli_query($conn, "
    UPDATE pengaduan 
    SET status='Dilihat'
    WHERE status='Terkirim'
");

$data = mysqli_query($conn, "
    SELECT 
        pengaduan.judul,
        pengaduan.status,
        pengaduan.created_at,
        users.nama
    FROM pengaduan
    JOIN users ON pengaduan.user_id = users.id
    ORDER BY pengaduan.created_at DESC
");
?>

<link rel="stylesheet" href="../assets/css/style.css">

<div class="header">Data Pengaduan Masyarakat</div>

<div class="container">
<div class="card">

<h3>Daftar Pengaduan Masuk</h3>

<table class="table table-bordered table-striped">
<tr>
    <th>Nama Pengadu</th>
    <th>Judul Pengaduan</th>
    <th>Status</th>
    <th>Waktu</th>
</tr>

<?php if (mysqli_num_rows($data) == 0) { ?>
<tr>
    <td colspan="4" style="text-align:center">
        Belum ada pengaduan masuk.
    </td>
</tr>
<?php } ?>

<?php while ($p = mysqli_fetch_assoc($data)) { ?>
<tr>
    <td><?= $p['nama']; ?></td>
    <td><?= $p['judul']; ?></td>
    <td>
    <?php if ($p['status'] == 'Terkirim') { ?>
        <span class="badge bg-info">Terkirim</span>
    <?php } else { ?>
        <span class="badge bg-success">Dilihat</span>
    <?php } ?>
</td>
    <td><?= date('d M Y H:i', strtotime($p['created_at'])); ?></td>
</tr>
<?php } ?>

</table>

<a href="dashboard.php" style="display:inline-block;margin-top:15px">
    ← Kembali ke Dashboard Admin
</a>

</div>
</div>
<?php include "../partials/footer.php"; ?>