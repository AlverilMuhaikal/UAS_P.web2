<?php include '../koneksi.php'?>
<?php
//jika belum login
if(!isset($_SESSION['user']))
{
  echo "<script>alert('Anda harus login!')</script>";
  echo "<script>location='../index.php'</script>";
  exit();
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Rizky Ananda">
    <title>Toko Veril</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link href="../assets/css/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-primary flex-md-nowrap p-0 ">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">Toko Veril</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" 
  aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
 
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3 text-white" href="index.php?page=logout">Sign out</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-white sidebar collapse shadow">
      <div class="my-3 text-center">
        <img src="../assets/img/logoku.png" width="80">
        <h6><?php echo $_SESSION['user']['nama_user'] ?></h6>
        <span class="text-muted small">Admin Gudang</span>
      </div>
      <div class="position-sticky pt-3 sidebar-sticky"  background-color: pink;>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">
              <i class="bi bi-house"></i>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="index.php?page=user">
              <i class="bi bi-person-circle"></i>
              User
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=supplier">      
              <i class="bi bi-truck"></i>     
              Supplier
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=kategori">
            <i class="bi bi-tag"></i>          
              Kategori
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=produk">   
            <i class="bi bi-box"></i>       
              Produk
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=pelanggan">     
            <i class="bi bi-person"></i>      
              Pelanggan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=penjualan">  
            <i class="bi bi-bag-check"></i>       
              Penjualan
            </a>
          </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
          <span>LAPORAN</span>
          <a class="link-secondary" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle" class="align-text-bottom"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=laporan_penjualan">
              <i class="bi bi-file-arrow-down"></i>
              Laporan Penjualan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=laporan_keuntungan">
              <i class="bi bi-file-arrow-down"></i>
              Laporan Keuntungan
            </a>
          </li>
          

        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 min-vh-100 pt-3" style="background: #f1f1f1;">
        <?php
        if(!isset($_GET['page']))
        {
          include 'dashboard.php';
        }
        else
        {
          if($_GET['page']=="supplier")
          {
            include 'supplier.php';
          }
          elseif($_GET['page']=="kategori")
          {
            include 'kategori.php';
          }
          elseif($_GET['page']=="produk")
          {
            include 'produk.php';
          }
          elseif($_GET['page']=="pelanggan")
          {
            include 'pelanggan.php';
          }
          elseif($_GET['page']=="pelanggan_tambah")
          {
            include 'pelanggan_tambah.php';
          }
          elseif($_GET['page']=="pelanggan_edit")
          {
            include 'pelanggan_edit.php';
          }
          elseif($_GET['page']=="pelanggan_hapus")
          {
            include 'pelanggan_hapus.php';
          }
          elseif($_GET['page']=="logout")
          {
            include 'logout.php';
          }
          elseif($_GET['page']=="penjualan")
          {
            include 'penjualan.php';
          }
          elseif($_GET['page']=="penjualan_produk")
          {
            include 'penjualan_produk.php';
          }
          elseif($_GET['page']=="supplier_tambah")
          {
            include 'supplier_tambah.php';
          }
          elseif($_GET['page']=="kategori_tambah")
          {
            include 'kategori_tambah.php';
          }
          elseif($_GET['page']=="produk_tambah")
          {
            include 'produk_tambah.php';
          }
          elseif($_GET['page']=="supplier_edit")
          {
            include 'supplier_edit.php';
          }
          elseif($_GET['page']=="supplier_hapus")
          {
            include 'supplier_hapus.php';
          }
          elseif($_GET['page']=="kategori_edit")
          {
            include 'kategori_edit.php';
          }
          elseif($_GET['page']=="kategori_hapus")
          {
            include 'kategori_hapus.php';
          }
          elseif($_GET['page']=="produk_edit")
          {
            include 'produk_edit.php';
          }
          elseif($_GET['page']=="produk_hapus")
          {
            include 'produk_hapus.php';
          }
          elseif($_GET['page']=="laporan_penjualan")
          {
            include 'laporan_penjualan.php';
          }
          elseif($_GET['page']=="laporan_keuntungan")
          {
            include 'laporan_keuntungan.php';
          }
          elseif($_GET['page']=="user")
          {
            include 'user.php';
          }
          elseif($_GET['page']=="user_tambah")
          {
            include 'user_tambah.php';
          }
          elseif($_GET['page']=="user_edit")
          {
            include 'user_edit.php';
          }
          elseif($_GET['page']=="user_hapus")
          {
            include 'user_hapus.php';
          }
        }
        ?>
    </main>
  </div>
</div>
<script src="../assets/js/bootstrap.bundle.min.js"></script> 
<script src="https://code.jquery.com/jquery-3.7.0.js"></script> 
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script> 
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script> 

<script>
  $(document).ready(function(){
    $('#example').DataTable();
  });
</script>
</body>
</html>


