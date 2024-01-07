<?php include 'header.php'; ?>
<?php
//dapatkan id_user dari kasir yang login
$id_user = $_SESSION['user']['id_user'];
$id_toko = $_SESSION['user']['id_toko'];

$penjualan = array();
$ambil = $koneksi->query("SELECT * FROM penjualan 
                        LEFT JOIN pelanggan ON penjualan.id_pelanggan=pelanggan.id_pelanggan 
                        WHERE penjualan.id_user='$id_user' AND penjualan.id_toko='$id_toko' ");
while ($tiap = $ambil->fetch_assoc()) 
{
    $penjualan[] =$tiap;
}

// echo"<pre>";
// print_r($penjualan);
// echo"</pre>";
?>

<div class="container">
    <div class="card border-0 shadow">
        <div class="card-body">
            <h6>Transaksi Penjualan</h6>
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Pelanggan</th>
                        <th>Total</th>
                        <th>Bayar</th>
                        <th>Kembalian</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($penjualan as $key => $value): ?>

                    <tr>
                        <td><?php echo $key +1 ?></td>
                        <td><?php echo date("d M Y H:i", strtotime($value["tanggal_penjualan"])) ?></td>
                        <td>
                        <?php echo $value["nama_pelanggan"]?> 
                        <?php echo $value["telepon_pelanggan"]?>
                        </td>
                        <td><?php echo number_format($value["total_penjualan"]) ?></td>
                        <td><?php echo number_format($value["bayar_penjualan"]) ?></td>
                        <td><?php echo number_format($value["kembalian_penjualan"]) ?></td>
                        <td>
                            <a href="penjualanhapus.php?id=<?php echo $value['id_penjualan']?>" onclick="return confirm('yakin ?')">Hapus</a>
                            <a href="penjualanproduk.php?id=<?php echo $value["id_penjualan"] ?>">Detail</a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
        </table>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>