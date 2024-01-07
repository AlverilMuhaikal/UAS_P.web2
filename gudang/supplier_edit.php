<?php
$id_supplier = $_GET['id'];
$id_toko =$_SESSION['user']['id_toko'];

$ambil = $koneksi->query("SELECT * FROM supplier WHERE id_supplier ='$id_supplier' AND id_toko ='$id_toko' ");
$supplier = $ambil->fetch_assoc();


?>

<div class="card border-0 shadow">
    <div class="card-header bg-primary text-white">Edit Supplier</div>
    <div class="card-body">
        <form method="post">
            <div class="mb-3">
                <label>Nama Supplier</label>
                <input type="text" name="nama" class="form-control" value="<?php echo $supplier['nama_supplier'] ?>">
            </div>
            <button class="btn btn-primary" name="simpan">Simpan</button>
        </form>
    </div>
</div>

<?php
if (isset($_POST['simpan'])) 
{
    $nama =$_POST['nama'];
    $id_toko = $_SESSION['user']['id_toko'];

    $koneksi->query("UPDATE supplier SET nama_supplier='$nama' WHERE id_supplier='$id_supplier' AND id_toko='$id_toko' ");

    echo "<script>alert('data tersimpan')</script>";
    echo "<script>location='index.php?page=supplier'</script>";
}
?>