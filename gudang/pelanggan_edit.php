<?php
$id_pelanggan = $_GET['id'];
$id_toko =$_SESSION['user']['id_toko'];

$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan ='$id_pelanggan' AND id_toko ='$id_toko' ");
$pelanggan = $ambil->fetch_assoc();


?>

<div class="card border-0 shadow">
    <div class="card-header bg-primary text-white">Edit pelanggan</div>
    <div class="card-body">
        <form method="post">
            <div class="mb-3">
                <label>Nama pelanggan</label>
                <input type="text" name="nama" class="form-control" value="<?php echo $pelanggan['nama_pelanggan'] ?>">
            </div>
            <div class="mb-3">
                <label>Email pelanggan</label>
                <input type="text" name="email" class="form-control" value="<?php echo $pelanggan['email_pelanggan'] ?>">
            </div>
            <div class="mb-3">
                <label>Telepon pelanggan</label>
                <input type="text" name="telepon" class="form-control" value="<?php echo $pelanggan['telepon_pelanggan'] ?>">
            </div>
            <div class="mb-3">
                <label>Alamat pelanggan</label>
                <input type="text" name="alamat" class="form-control" value="<?php echo $pelanggan['alamat_pelanggan'] ?>">
            </div>
            <button class="btn btn-primary" name="simpan">Simpan</button>
        </form>
    </div>
</div>

<?php
if (isset($_POST['simpan'])) 
{
    $nama =$_POST['nama'];
    $email =$_POST['email'];
    $telepon =$_POST['telepon'];
    $alamat =$_POST['alamat'];
    $id_toko = $_SESSION['user']['id_toko'];

    $koneksi->query("UPDATE pelanggan SET nama_pelanggan='$nama',email_pelanggan='$email',telepon_pelanggan='$telepon',alamat_pelanggan='$alamat'
    WHERE id_pelanggan='$id_pelanggan' AND id_toko='$id_toko' ");

    echo "<script>alert('data tersimpan')</script>";
    echo "<script>location='index.php?page=pelanggan'</script>";
}
?>