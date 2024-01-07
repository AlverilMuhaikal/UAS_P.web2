<?php 
include '../koneksi.php';

echo "<pre>";
print_r($_POST);
print_r($_SESSION['keranjang']);
echo "</pre>";

$total = $_POST['total'];
$bayar = $_POST['bayar'];
$kembalian = $_POST['kembalian'];
$telepon = $_POST['telepon'];
$tanggal = date("Y-m-d H:i:s");
$id_toko = $_SESSION['user']['id_toko'];
$id_user = $_SESSION['user']['id_user'];

//jika kosong telepon
if (empty($telepon)) {
    $id_pelanggan = null;
}
else
{
    //cek ke tabel pelanggan 
    $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE telepon_pelanggan='$telepon'");
    $pelanggan = $ambil->fetch_assoc();

    if (empty($pelanggan)) 
    {
        $koneksi->query("INSERT INTO pelanggan (telepon_pelanggan) VALUES('$telepon')");
        $id_pelanggan = $koneksi->insert_id;
    }
    else 
    {
        $id_pelanggan = $pelanggan['id_pelanggan'];
    }
}
//simpan penjualan
$koneksi->query("INSERT INTO penjualan
    (id_pelanggan,id_toko,id_user,tanggal_penjualan,total_penjualan,bayar_penjualan,kembalian_penjualan)
    VALUES('$id_pelanggan','$id_toko','$id_user','$tanggal','$total','$bayar','$kembalian');
    ");

//dapatkan id_penjualan barusan
$id_penjualan = $koneksi->insert_id;

//simpan penjualan_produk
foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) 
{
    $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
    $produk = $ambil->fetch_assoc();

    $harga_beli = $produk['beli_produk'];
    $harga_jual = $produk['jual_produk'];
    $nama_jual = $produk['nama_produk'];
    $subtotal_jual = $produk['jual_produk'] * $jumlah;

    $koneksi->query("INSERT INTO penjualan_produk
        (id_penjualan,id_toko,id_produk,harga_beli,harga_jual,nama_jual,subtotal_jual, jumlah_jual)
    VALUES('$id_penjualan','$id_toko','$id_produk','$harga_beli','$harga_jual','$nama_jual','$subtotal_jual', '$jumlah') ") or
        die(mysqli_error($koneksi));

    //kurangi stok produk itu
    $koneksi->query("UPDATE produk SET stok_produk=stok_produk-$jumlah WHERE id_produk='$id_produk'");
}

//kosongkan keranjang
unset($_SESSION['keranjang']);

//larikan ke halaman nota
echo "<script>location='nota.php?id=$id_penjualan'</script>"
?>