<?php
session_start();
require_once('../db/DB_connection.php');
$role = isset($_SESSION['role']) ? $_SESSION['role'] : null;

// Fungsi untuk menentukan peran pengguna setelah login
function setRole($username) {
    // Di sini Anda dapat melakukan validasi dan pengecekan di database
    // Misalnya, jika $username adalah admin, maka peran akan diatur sebagai "admin"
    // Di sini saya akan menggunakan logika sederhana untuk contoh
    if ($username === "boss") {
        $_SESSION['role'] = "boss";
    } elseif ($username === "admin") {
        $_SESSION['role'] = "admin";
    } else {
        $_SESSION['role'] = "kasir";
    }
}
$allowedRoles = ['boss', 'admin', 'kasir'];

// Fungsi untuk mengecek apakah pengguna memiliki akses tertentu berdasarkan peran
function checkPermission($allowedRoles) {
    // Pastikan session telah dimulai
    if (!isset($_SESSION['loggedin'])) {
		header('location: ../index.php');
		exit;
	}
    }
$dataPoints = array( 
	array("y" => 3373.64, "label" => "Germany" ),
	array("y" => 2435.94, "label" => "France" ),
	array("y" => 1842.55, "label" => "China" ),
	array("y" => 1828.55, "label" => "Russia" ),
	array("y" => 1039.99, "label" => "Switzerland" ),
	array("y" => 765.215, "label" => "Japan" ),
	array("y" => 612.453, "label" => "Netherlands" )
);

$realName = $_SESSION['nama'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard Kasir Pak Kusir</title>
    <link rel="stylesheet" href="../assets/style/dashboard.css">
    <script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Most Sales"
	},
	axisY: {
		title: "Most Sales (in tonnes)"
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0.## tonnes",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
<body>
<header id="footer">
		<nav class="main-nav">
			<div class="brand text-main">
			</div>
			<div class="links ">
				<ul>
					<li><a href="boss/kelola_akun.php">Kelola akun</a></li>
					<li><a href="#">Log Activity</a></li>
					
					<li><a href="kasir/manage_product.php">Transaksi</a></li>
					
                    <!-- <li><a href="kasir/manage_product.php">Data Produk</a></li> -->

					<li><a href="#">Data Karyawan</a></li>
					
				</ul>
			</div>
		</nav>
	</header>
	<div class="navbar">
			<a href="kasir/" <?php echo ($role === 'admin' || $role === 'kasir') ? '' : 'style="display:none;"'; ?>>Akun Kasir</a>
			<a href="activity/log_activity.php" <?php echo ($role === 'admin' || $role === 'boss') ? '' : 'style="display:none;"'; ?>>Log Activity</a>
			<a href="transaksi/" <?php echo ($role === 'admin' || $role === 'boss' || $role === 'kasir') ? '' : 'style="display:none;"'; ?>>Transaksi</a>
			<a href="../kasir/manage_product.php" <?php echo ($role === 'admin' || $role === 'boss') ? '' : 'style="display:none;"'; ?>>Data Produk</a>
			<a href="boss/laporan.php" <?php echo $role === 'boss' ? '' : 'style="display:none;"'; ?>>Laporan</a>
		</div>
<img style="width: 200px; margin-bottom: 2rem;" src="./assets/images/logo.png" alt="">
    <h1>Hello, <?php echo htmlspecialchars($realName); ?>! Welcome to the dashboard</h1>

    <div class="dashboard-content">
        <h2>dashboard</h2>
        <p>Welcome to the Kasir Pak Kusir dashboard. You can manage products and perform other tasks here</p>
    </div>
    
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>


    <form action="../db/DB_logout.php" method="post">
        <button type="submit" class="btn-logout"> Log Out </button>
    </form>
</body>
</html>