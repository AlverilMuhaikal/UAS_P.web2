<div class="card border-0 shadow">
    <div class="card-header bg-primary text-white">Tambah pelanggan</div>
    <div class="card-body">
        <form method="post">
            <div class="mb-3">
                <label>Nama pelanggan</label>
                <input type="text" name="nama" class="form-control">
            </div>
            <div class="mb-3">
                <label>Email pelanggan</label>
                <input type="text" name="email" class="form-control">
            </div>
            <div class="mb-3">
                <label>Telepon pelanggan</label>
                <input type="text" name="telepon" class="form-control">
            </div>
            <div class="mb-3">
                <label>Alamat pelanggan</label>
                <input type="text" name="alamat" class="form-control">
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

    $koneksi->query("INSERT INTO pelanggan (id_toko,nama_pelanggan,email_pelanggan,telepon_pelanggan,alamat_pelanggan) 
    VALUES ('$id_toko','$nama','$email','$telepon','$alamat') ");

    echo "<script>alert('data tersimpan')</script>";
    echo "<script>location='index.php?page=pelanggan'</script>";
}
?>