<?php
//mendapatkan id toko si user yang login
$id_toko =$_SESSION['user']['id_toko'];

$penjualan = array();
$ambil = $koneksi->query("SELECT * FROM penjualan 
                        LEFT JOIN pelanggan ON penjualan.id_pelanggan=pelanggan.id_pelanggan
                        WHERE penjualan.id_toko ='$id_toko'
                        ORDER BY id_penjualan DESC ");
while($tiap = $ambil->fetch_assoc())
{
    $penjualan[] = $tiap;
}



// echo "<pre>";
// print_r($penjualan);
// echo "</pre>";
?>

<div class="card border-0 shadow">
    <div class="card-header bg-primary text-white">Penjualan</div>
    <div class="card-body">
        <table class="table" id="example">
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
                        <a class="btn btn-outline-success btn-sm" href="index.php?page=penjualan_produk&id=<?php echo $value["id_penjualan"] ?>">Detail</a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>