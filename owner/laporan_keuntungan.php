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

// echo "<pre>";
// print_r($laporan);
// echo "</pre>";
$period = new DatePeriod(new DateTime($tglm), new DateInterval('P1D'), new DateTime($tgls));
foreach($period as $date)
{   
    $pertanggal = array();
    $tanggal = $date->format("Y-m-d");
    $keutungantanggal = 0;
    $transaksitanggal = 0;
    $ambil = $koneksi->query("SELECT * FROM penjualan_produk
        LEFT JOIN penjualan ON penjualan_produk.id_penjualan=penjualan.id_penjualan
        WHERE penjualan.id_toko='$id_toko' AND DATE(tanggal_penjualan)='$tanggal'");
    while($tiap = $ambil->fetch_assoc())
    {
        $transaksitanggal+=$tiap['harga_jual'];
        $keutungantanggal+=($tiap['harga_jual']- $tiap['harga_beli']) * $tiap['jumlah_jual'];
    }
    $pertanggal['tanggal'] = $tanggal;
    $pertanggal['keuntungan'] = $keutungantanggal;
    $pertanggal['transaksi'] = $transaksitanggal;
    $laporan[] = $pertanggal;

}
?>

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
        <table class="table" id="example">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Transaksi</th>
                    <th>Keuntungan</th>
                   
                </tr>
            </thead>
            <tbody>
                <?php $totalkeuntungan = 0; ?>
                <?php $totaltransaksi = 0; ?>
                <?php foreach ($laporan as $key => $value): ?>
                    <?php $totalkeuntungan+=$value['keuntungan']?>
                    <?php $totaltransaksi+=$value['transaksi']?>
                    <tr>
                        <td><?php echo $key+1 ?></td>
                        <td><?php echo date("d M Y", strtotime($value['tanggal'])) ?></td>
                        <td><?php echo number_format($value['transaksi']) ?></td>
                        <td><?php echo number_format($value['keuntungan']) ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2">Total Keuntungan</td>
                    <td><?php echo number_format($totaltransaksi) ?></td>
                    <td><?php echo number_format($totalkeuntungan) ?></td>
                </tr>
            </tfoot>
        </table>
        </div>
    </div>