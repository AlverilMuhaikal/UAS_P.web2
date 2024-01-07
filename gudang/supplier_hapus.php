<?php
$id_supplier = $_GET['id'];
$id_toko =$_SESSION['user']['id_toko'];

$koneksi->query("DELETE FROM supplier WHERE id_supplier ='$id_supplier' AND id_toko ='$id_toko' ");

echo "<script>alert('data terhapus')</script>";
echo "<script>location='index.php?page=supplier'</script>";


?>