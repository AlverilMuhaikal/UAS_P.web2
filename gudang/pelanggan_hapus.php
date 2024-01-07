<?php
$id_pelanggan = $_GET['id'];
$id_toko =$_SESSION['user']['id_toko'];

$koneksi->query("DELETE FROM pelanggan WHERE id_pelanggan ='$id_pelanggan' AND id_toko ='$id_toko' ");

echo "<script>alert('data terhapus')</script>";
echo "<script>location='index.php?page=pelanggan'</script>";


?>