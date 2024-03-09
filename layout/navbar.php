<?php 
// session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: ./index.php');
    exit;
}
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard Kasir Pak Kusir</title>
    <link rel="stylesheet" href="../assets/style/dashboard.css">
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="../../pages/dashboard.php">Doyz</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
    <li class="nav-item  <?php echo ($role === 'admin') ? '' : 'd-none'; ?>">
        <a class="nav-link active" aria-current="page" href="./boss/kelola_akun.php">Kelola Akun</a>
    </li>

    <li class="nav-item <?php echo ($role === 'admin' || $role === 'kasir') ? '' : 'd-none'; ?>">
          <a class="nav-link" href="./kasir/manage_product.php">Manage Product</a>
     </li>

    <li class="nav-item<?php echo ($role === 'boss') ? '' : 'd-none'; ?>">
          <a class="nav-link" href="./boss/data_karyawan.php">Data Karyawan</a>
      </li>

        <li class="nav-item <?php echo ($role === 'admin' || $role === 'boss') ? '' : 'd-none'; ?>">
          <a class="nav-link" href="./boss/data_karyawan.php">Log Activity</a>
        </li>
    </div>
  </div>
</nav>
          </body>