<?php include 'header.php'; ?>
<?php
//jika ada inputan filter tglm dan tgls
if (isset($_POST['tglm']) AND $_POST['tgls']) 
{
    $tglm = $_POST['tglm'];
    $tgls = $_POST['tgls'];
} else{
    $tgls = date("Y-m-d");
    $tglm = (new Datetime($tgls))->modify("-1 month")->format("Y-m-d");
}

$laporan = array();
$id_toko = $_SESSION['user']['id_toko'];
$id_user = $_SESSION['user']['id_user'];
$ambil = $koneksi->query("SELECT * FROM penjualan
            LEFT JOIN pelanggan ON penjualan.id_pelanggan=pelanggan.id_pelanggan
            WHERE penjualan.id_toko='$id_toko' AND id_user='$id_user' AND DATE(tanggal_penjualan) BETWEEN '$tglm' AND '$tgls' ");
while ($tiap = $ambil->fetch_assoc()) 
{
    $laporan[] =$tiap;
}
// echo "<pre>";
// print_r($laporan);
// echo "</pre>";
?>

<div class="container">
    <div class="card border-0 shadow">
        <div class="card-body">
            <form method="post">
                <div class="row">
                    <div class="col-md-3">
                        <label>Mulai</label>
                        <input type="date" name="tglm" class="form-control" value="<?php echo $tglm ?>">
                    </div>
                    <div class="col-md-3">
                        <label>Selesai</label>
                        <input type="date" name="tgls" class="form-control" value="<?php echo $tgls ?>">
                    </div>
                    <div class="col-md-3">
                        <label>&nbsp;</label><br>
                        <button class="btn btn-primary" name="filter">Filter</button>
                    </div>
                </div>
            </form>
            <hr>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Pelanggan</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php $grandtotal =0; ?>
                <?php foreach ($laporan as $key => $value): ?>
                <?php $grandtotal+=$value["total_penjualan"] ?>    
                <tr>
                    <td><?php echo $key+1 ?></td>
                    <td><?php echo date("d M Y H:i", strtotime($value['tanggal_penjualan'])) ?></td>
                    <td><?php echo $value['nama_pelanggan'] ?></td>
                    <td><?php echo number_format($value['total_penjualan']) ?></td>
                </tr>    
                <?php endforeach ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3">Total</td>
                    <td><?php echo number_format($grandtotal) ?></td>
                </tr>
            </tfoot>
        </table>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>