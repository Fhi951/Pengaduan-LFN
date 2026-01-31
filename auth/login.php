<?php
session_start();
require_once __DIR__ . "/../config/database.php";

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $q = mysqli_query($conn,
        "SELECT * FROM users WHERE email='$email' AND password='$password'"
    );

    $data = mysqli_fetch_assoc($q);

    if ($data) {
        $_SESSION['login'] = true;
        $_SESSION['role']  = $data['role'];
        $_SESSION['nama']  = $data['nama'];
        $_SESSION['id']    = $data['id'];

        if ($data['role'] == 'admin') {
            header("Location: ../admin/dashboard.php");
        } else {
            header("Location: ../user/dashboard.php");
        }
    } else {
        $error = "Login gagal!";
    }
}
?>

<link rel="stylesheet" href="../assets/css/style.css">

<div class="header">
    Sistem Pengaduan Masyarakat
</div>

<div class="container">
    <div class="card">
        <h2 style="margin-top:0">Login</h2>

        <?php if (isset($error)) echo "<p style='color:red'>$error</p>"; ?>

        <form method="post">
            <label>Email</label>
            <input type="email" name="email" required>

            <label>Password</label>
            <input type="password" name="password" required>

            <button name="login">Masuk</button>
        </form>

        <p style="margin-top:15px;font-size:14px">
            Belum punya akun? <a href="register.php">Daftar di sini</a>
        </p>
    </div>
</div>
<?php include "../partials/footer.php"; ?>