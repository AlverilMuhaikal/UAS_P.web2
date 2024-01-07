<?php
$id_user = $_GET['id'];
$id_toko =$_SESSION['user']['id_toko'];

$koneksi->query("DELETE FROM user WHERE id_user ='$id_user' AND id_toko ='$id_toko' ");

echo "<script>alert('data terhapus')</script>";
echo "<script>location='index.php?page=user'</script>";


?>