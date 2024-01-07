<?php 
include '../koneksi.php';
//jika belum login
if(!isset($_SESSION['user']))
{
  echo "<script>alert('Anda harus login!')</script>";
  echo "<script>location='../index.php'</script>";
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasir Toko Veril</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg bg-primary navbar-dark mb-3">
  <div class="container">
    <a class="navbar-brand" href="#">Toko Veril</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link " href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="penjualan.php">Penjualan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="laporan.php">Laporan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="akun.php">Akun</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logut</a>
        </li>
        
       
      </ul>
      
    </div>
  </div>
</nav>