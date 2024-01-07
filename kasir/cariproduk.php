<?php
include '../koneksi.php';
//dapatkan id toko dari user yang login
$id_toko = $_SESSION['user']['id_toko'];
$cari = $_POST['cari'];

//dapatkan produk sesuai id toko ini
$produk = array();
$ambil = $koneksi->query("SELECT * FROM produk WHERE id_toko ='$id_toko' AND nama_produk LIKE '%$cari%' ");
while($tiap = $ambil->fetch_assoc())
{
    $produk[] = $tiap;
}

// echo "<pre>";
// print_r($produk);
// echo "</pre>";

?>  
<div class="row">
    <?php foreach ($produk as $key => $value): ?>
        <div class="col-md-3">
        <a href="#" class="text-decoration-none link-produk" idnya="<?php echo $value["id_produk"] ?>">
        <img src="../assets/img/produk/<?php echo $value['foto_produk']?>" class="img-fluid">
        <h6><?php echo $value['nama_produk']?></h6>
        <span class="small text-muted"><?php echo number_format($value['jual_produk'])?></span>
        <p>Stok: <?php echo $value['stok_produk']?> </p>
        </a>
        </div>
    <?php endforeach ?>
    </div>