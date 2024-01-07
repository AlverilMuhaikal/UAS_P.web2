<?php
//mendapatkan id toko si user yang login
$id_produk = $_GET['id'];
$id_toko =$_SESSION['user']['id_toko'];

$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk' AND id_toko ='$id_toko'");
$produk = $ambil->fetch_assoc();

$supplier = array();
$ambil = $koneksi->query("SELECT * FROM supplier WHERE id_toko ='$id_toko'");
while($tiap = $ambil->fetch_assoc())
{
    $supplier[] = $tiap;
}

$kategori = array();
$ambil = $koneksi->query("SELECT * FROM kategori WHERE id_toko ='$id_toko'");
while($tiap = $ambil->fetch_assoc())
{
    $kategori[] = $tiap;
}

?>

<div class="card border-0 shadow">
    <div class="card-header bg-primary text-white">Edit Produk</div>
    <div class="card-body">
        <form method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label>Supplier</label>
                    <select class="form-control" name="id_supplier">
                        <option value="">Pilih</option>
                        <?php foreach ($supplier as $key => $value): ?>

                            <option value="<?php echo $value["id_supplier"] ?>" <?php echo $value['id_supplier']==$produk['id_supplier']?"selected":"" ?> >
                                <?php echo $value["nama_supplier"] ?>
                            </option>
                        <?php endforeach?>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label>Kategori</label>
                    <select class="form-control" name="id_kategori">
                        <option value="">Pilih</option>
                        <?php foreach ($kategori as $key => $value): ?>
                            <option value="<?php echo $value['id_kategori'] ?>"<?php echo $value['id_kategori']==$produk['id_kategori']?"selected":"" ?> >
                                <?php echo $value["nama_kategori"] ?>
                            </option>
                        <?php endforeach?>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label>Kode Produk</label>
                    <input type="text" name="kode" class="form-control" value="<?php echo $produk['kode_produk'] ?>">
                </div>
            </div>
            <div class="mb-3">
                <label>Nama Produk</label>
                <input type="text" name="nama" class="form-control" value="<?php echo $produk['nama_produk']?>">
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label>Beli Produk</label>
                    <input type="number" name="beli" class="form-control" value="<?php echo $produk['beli_produk']?>">
                </div>
                <div class="col-md-4 mb-3">
                    <label>Jual Produk</label>
                    <input type="number" name="jual" class="form-control" value="<?php echo $produk['jual_produk']?>">
                </div>
                <div class="col-md-4 mb-3">
                    <label>Stok Produk</label>
                    <input type="number" name="stok" class="form-control" value="<?php echo $produk['stok_produk']?>">
                </div>
            </div>
            <div class="mb-3">
                <label>Foto Sebelumnya</label><br>
                <img src="../assets/img/produk/<?php echo $produk['foto_produk'] ?>" width="200">
            </div>
            <div class="mb-3">
                <label>Foto Produk</label>
                <input type="file" name="foto" class="form-control">
            </div>
            <div class="mb-3">
                <label>Keterangan Produk</label>
                <textarea class="form-control" rows="3" name="keterangan"><?php echo $produk['keterangan_produk']?></textarea>
            </div>
            <button class="btn btn-primary" name="simpan">Simpan</button>
        </form>
    </div>
</div>

<?php
if (isset($_POST['simpan'])) 
{
    $id_toko = $_SESSION['user']['id_toko'];
    $nama =$_POST['nama'];
    $id_supplier =$_POST['id_supplier'];
    $id_kategori =$_POST['id_kategori'];
    $kode =$_POST['kode'];
    $beli =$_POST['beli'];
    $jual =$_POST['jual'];
    $stok =$_POST['stok'];
    $keterangan =$_POST['keterangan'];
    $namafoto = $_FILES['foto']['name'];
    $lokasifoto = $_FILES['foto']['tmp_name'];

    if (!empty($lokasifoto)) 
    {
        move_uploaded_file($lokasifoto, "../assets/img/produk/".$namafoto);

        $koneksi->query("UPDATE produk SET
            id_kategori='$id_kategori',
            id_supplier='$id_supplier',
            nama_produk='$nama',
            kode_produk='$kode',
            beli_produk='$beli',
            jual_produk='$jual',
            stok_produk='$stok',       
            foto_produk='$namafoto',
            keterangan_produk='$keterangan' WHERE id_produk='$id_produk' AND id_toko='$id_toko' ");
    }
    else
    {
        $koneksi->query("UPDATE produk SET
            id_kategori='$id_kategori',
            id_supplier='$id_supplier',
            nama_produk='$nama',
            kode_produk='$kode',
            beli_produk='$beli',
            jual_produk='$jual',
            stok_produk='$stok',
            keterangan_produk='$keterangan' WHERE id_produk='$id_produk' AND id_toko='$id_toko' ");
    }



    echo "<script>alert('data tersimpan')</script>";
    echo "<script>location='index.php?page=produk'</script>";
}
?>