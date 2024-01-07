<?php
include '../koneksi.php';

$keranjang = array();
$total =0;
if(isset($_SESSION['keranjang']))
{
    foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) 
    {
        $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
        $produk = $ambil->fetch_assoc();
        $produk['jumlah'] = $jumlah;
        $keranjang[] = $produk;
        $total+=$produk['jual_produk'] * $jumlah;
        }
}

?>
<?php foreach ($keranjang as $key => $perproduk): ?>
    <div class="row">
        <div col-md-9>
            <h6><?php echo $perproduk["nama_produk"] ?></h6>
            <span class="small text-muted">
                <?php echo number_format($perproduk["jual_produk"]) ?> X <?php echo $perproduk['jumlah'] ?>
            </span>
          
        </div>
        <div class="col-md-1">
            <div>
                <i class="bi bi-plus tambahi" idnya="<?php echo $perproduk['id_produk'] ?>"></i>
            </div>
            
            <div>
                <i class="bi bi-dash kurangi" idnya="<?php echo $perproduk['id_produk'] ?>"></i>
            </div>
            
        </div>
    </div>
    <hr>
<?php endforeach?>

<form method="post" action="checkout.php" target="_blank">
    <div class="mb-3">
        <label>Total</label>
        <input type="number" name="total" class="form-control total" value="<?php echo $total ?>" readonly>
    </div>
    <div class="mb-3">
        <label>Bayar</label>
        <input type="number" name="bayar" class="form-control bayar" required>
    </div>
    <div class="mb-3">
        <label>Kembalian</label>
        <input type="number" name="kembalian" class="form-control kembalian" readonly>
    </div>
    <div class="mb-3">
        <label >Telepon Pelanggan</label>
        <input type="text" name="telepon" class="form-control" placeholder="62">
    </div>
    <button class="btn btn-primary btn-sm">Checkout</button>
</form>