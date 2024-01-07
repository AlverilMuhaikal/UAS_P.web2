<?php include 'header.php'; ?>
<?php
//mendapatkan id toko si user yang login
$id_toko = $_SESSION['user']['id_toko'];

//mendapatkan id_penjualan yang di detailkan dari url
$id_penjualan = $_GET['id'];

//ambil dari tabel penjualan yang idnya ini
$ambil = $koneksi->query("SELECT * FROM penjualan 
                        LEFT JOIN pelanggan ON penjualan.id_pelanggan=pelanggan.id_pelanggan
                        WHERE penjualan.id_penjualan ='$id_penjualan' AND penjualan.id_toko= '$id_toko' ");
$penjualan = $ambil->fetch_assoc();


$produk = array();
$ambil = $koneksi->query("SELECT * FROM penjualan_produk WHERE id_penjualan='$id_penjualan' AND id_toko= '$id_toko' ");
while($tiap = $ambil->fetch_assoc())
{
    $produk[] = $tiap;
}


// echo "<pre>";
// print_r($penjualan);
// print_r($produk);
// echo "</pre>";
?>
<div class="container">
<div class="row mb-3">
    <div class="col-md-3">
        <div class="card border-0 shadow">
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td>ID Penjualan</td>
                        <td><?php echo $penjualan['id_penjualan'] ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal</td>
                        <td><?php echo $penjualan['tanggal_penjualan'] ?></td>
                    </tr>
                    <tr>
                        <td>Pelanggan</td>
                        <td>
                        <?php echo $penjualan['nama_pelanggan'] ?> <?php echo $penjualan['telepon_pelanggan'] ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="card border-0 shadow">
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Produk</th>
                    <th>Harga Beli</th>
                    <th>Harga Jual</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php $keuntungan = 0; ?>
                <?php foreach ($produk as $key => $value): ?>

                    <?php $keuntungan += ($value['harga_jual'] - $value['harga_beli']) * $value['jumlah_jual'] ?>
                <tr>
                    <td><?php echo $key+1 ?></td>
                    <td><?php echo $value["nama_jual"] ?></td>
                    <td><?php echo number_format($value["harga_beli"]) ?></td>
                    <td><?php echo number_format($value["harga_jual"]) ?></td>
                    <td><?php echo number_format($value["jumlah_jual"]) ?></td>
                    <td><?php echo number_format($value["subtotal_jual"]) ?></td>
                </tr>
                <?php endforeach?>
            </tbody>
            <tfoot>
                <tr>
                    <td>Total</td>
                    <td><?php echo number_format($penjualan["total_penjualan"]) ?></td>
                </tr>
                <tr>
                    <td>Bayar</td>
                    <td><?php echo number_format($penjualan["bayar_penjualan"]) ?></td>
                </tr>
                <tr>
                    <td>Kembalian</td>
                    <td><?php echo number_format($penjualan["kembalian_penjualan"]) ?></td>
                </tr>
                <tr>
                    <td>Keuntungan</td>
                    <td><?php echo number_format($keuntungan) ?></td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
</div>


<?php include 'footer.php'; ?>