<?php
session_start();
require_once('../db/DB_connection.php');
include '../layout/navbar.php';
$role = isset($_SESSION['role']) ? $_SESSION['role'] : null;

if (!$role) {
    header("Location: ../index.php");
    exit();
}

$realName = $_SESSION['nama'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard Kasir Pak Kusir</title>
    <link rel="stylesheet" href="../assets/style/dashboard.css">
</head>
<body>
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

