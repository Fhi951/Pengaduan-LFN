<?php
session_start();
include "../config/database.php";

/* Proteksi role */
if (!isset($_SESSION['login']) || $_SESSION['role'] != 'user') {
    header("Location: ../auth/login.php");
    exit;
}

/* Ambil pengaduan MILIK USER INI SAJA */
$data = mysqli_query($conn, "
    SELECT judul, status, created_at
    FROM pengaduan
    WHERE user_id = $_SESSION[id]
    ORDER BY created_at DESC
");
?>

<link rel="stylesheet" href="../assets/css/style.css">

<div class="header">Tracking Pengaduan</div>

<div class="container">
<div class="card">

<h3>Riwayat Pengaduan Anda</h3>

<?php
if (isset($_SESSION['notif'])) {
    echo "<p style='color:green;font-weight:600'>".$_SESSION['notif']."</p>";
    unset($_SESSION['notif']);
}
?>

<table>
<tr>
    <th>Judul Pengaduan</th>
    <th>Status</th>
    <th>Waktu</th>
</tr>

<?php if (mysqli_num_rows($data) == 0) { ?>
<tr>
    <td colspan="3" style="text-align:center">
        Belum ada pengaduan yang dikirim.
    </td>
</tr>
<?php } ?>

<?php while ($p = mysqli_fetch_assoc($data)) { ?>
<tr>
    <td><?= $p['judul']; ?></td>
    <td>
        <?php
        if ($p['status'] == 'Terkirim') echo "📤 Terkirim (menunggu admin)";
        if ($p['status'] == 'Dilihat')  echo "👀 Sudah dibaca admin";
        ?>
    </td>
    <td><?= date('d M Y H:i', strtotime($p['created_at'])); ?></td>
</tr>
<?php } ?>

</table>

<a href="dashboard.php" style="display:inline-block;margin-top:15px">
    ← Kembali ke Dashboard
</a>

</div>
</div>