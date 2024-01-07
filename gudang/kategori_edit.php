<?php
$id_kategori = $_GET['id'];
$id_toko =$_SESSION['user']['id_toko'];

$ambil = $koneksi->query("SELECT * FROM kategori WHERE id_kategori ='$id_kategori' AND id_toko ='$id_toko' ");
$kategori = $ambil->fetch_assoc();


?>

<div class="card border-0 shadow">
    <div class="card-header bg-primary text-white">Edit Kategori</div>
    <div class="card-body">
        <form method="post">
            <div class="mb-3">
                <label>Nama kategori</label>
                <input type="text" name="nama" class="form-control" value="<?php echo $kategori['nama_kategori'] ?>">
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

    $koneksi->query("UPDATE kategori SET nama_kategori='$nama' WHERE id_kategori='$id_kategori' AND id_toko='$id_toko' ");

    echo "<script>alert('data tersimpan')</script>";
    echo "<script>location='index.php?page=kategori'</script>";
}
?>