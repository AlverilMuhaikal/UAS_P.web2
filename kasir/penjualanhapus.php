<?php
include '../koneksi.php';
$id_penjualan = $_GET['id'];

$id_toko = $_SESSION['user']['id_toko'];

$produk = array();
$ambil = $koneksi->query("SELECT * FROM penjualan_produk WHERE id_penjualan='$id_penjualan' AND id_toko= '$id_toko' ");
while($tiap = $ambil->fetch_assoc())
{
    $id_produk = $tiap['id_produk'];
    $jumlah_jual = $tiap['jumlah_jual'];

    //kembalikan stok dari produk ini
    $koneksi->query("UPDATE produk SET stok_produk = stok_produk+$jumlah_jual WHERE id_produk='$id_produk' ");
}

$koneksi->query("DELETE FROM penjualan_produk WHERE id_penjualan='$id_penjualan' AND id_toko='$id_toko' ");
$koneksi->query("DELETE FROM penjualan WHERE id_penjualan='$id_penjualan' AND id_toko='$id_toko' ");

echo "<script>alert('Penjualan telah dihapus!')</script>";
echo "<script>location='penjualan.php'</script>";
?>