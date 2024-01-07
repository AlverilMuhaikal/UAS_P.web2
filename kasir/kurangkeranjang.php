<?php
include '../koneksi.php';
$id_produk = $_POST['id_produk'];

// jika dikeranjang dia tinggal 1, maka hilangkan sekalian
if($_SESSION['keranjang'][$id_produk]==1)
{
    unset($_SESSION['keranjang'][$id_produk]) ;
}
else
{
    $_SESSION['keranjang'][$id_produk] -= 1;
}
?>