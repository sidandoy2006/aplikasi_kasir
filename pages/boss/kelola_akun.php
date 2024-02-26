<?php
session_start();
require_once('../../db/DB_connection.php');
// if ($_SESSION["role"] != "boss") {
// 	echo "<script>
// 		alert('perhatian anda tidak punya akses');
// 		</script>";
// 	exit;
// }


// Fungsi untuk mengecek apakah pengguna memiliki akses tertentu berdasarkan peran
function checkPermission($allowedRoles) {
    // Pastikan session telah dimulai
    if (!isset($_SESSION['loggedin'])) {
        header('location: ../index.php');
        exit;
    }

    }

checkPermission(['boss']); // Hanya izinkan peran "boss" untuk mengakses halaman ini
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Akun</title>
    <link rel="stylesheet" href="../../assets/style/kelola_akun.css">
</head>
<body>
    <!-- <header id="footer">
        <nav class="main-nav">
            <div class="brand text-main">
            </div>
            <div class="links ">
                <ul>
                    <li><a href="#">Kelola akun</a></li>
                    <li><a href="activity/log_activity.php">Log Activity</a></li>
                    <li><a href="kasir/manage_product.php">Transaksi</a></li>
                    <li><a href="kasir/manage_product.php">Data Produk</a></li>
                </ul>
            </div>
        </nav>
    </header> -->

    <div class="content">
        <h2>Kelola Akun</h2>
        <!-- Tambahkan form untuk mengelola akun -->
        <form action="process_kelola_akun.php" method="POST" class="form-container">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>

            <label for="role">Role:</label>
            <select id="role" name="role">
                <option value="boss">Boss</option>
                <option value="admin">Admin</option>
                <option value="kasir">Kasir</option>
            </select><br><br>

            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>