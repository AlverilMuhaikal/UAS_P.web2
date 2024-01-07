<?php
//mendapatkan id toko si user yang login
$id_toko =$_SESSION['user']['id_toko'];

$produk = array();
$ambil = $koneksi->query("SELECT * FROM produk WHERE id_toko ='$id_toko'");
while($tiap = $ambil->fetch_assoc())
{
    $produk[] = $tiap;
}

// echo "<pre>";
// print_r($produk);
// echo "</pre>";
?>

<div class="card border-0 shadow">
    <div class="card-header bg-primary text-white">Produk</div>
    <div class="card-body">
        <table class="table" id="example">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Harga Beli</th>
                    <th>Harga Jual</th>
                    <th>Stok</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($produk as $key => $value): ?>

                <tr>
                    <td><?php echo $key +1 ?></td>
                    <td><?php echo $value["kode_produk"] ?></td>
                    <td><?php echo $value["nama_produk"] ?></td>
                    <td><?php echo number_format($value["beli_produk"]) ?></td>
                    <td><?php echo number_format($value["jual_produk"]) ?></td>
                    <td><?php echo number_format($value["stok_produk"]) ?></td>
                    <td>
                        <a class="btn btn-outline-warning btn-sm" href="index.php?page=produk_edit&id=<?php echo $value["id_produk"] ?>">Edit</a>
                        <a class="btn btn-outline-danger btn-sm" href="index.php?page=produk_hapus&id=<?php echo $value["id_produk"] ?>">Hapus</a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <a class="btn btn-outline-primary btn-sm" href="index.php?page=produk_tambah">Tambah</a>
    </div>
</div>