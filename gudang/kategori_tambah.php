<div class="card border-0 shadow">
    <div class="card-header bg-primary text-white">Tambah Kategori</div>
    <div class="card-body">
        <form method="post">
            <div class="mb-3">
                <label>Nama Kategori</label>
                <input type="text" name="nama" class="form-control">
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

    $koneksi->query("INSERT INTO kategori (id_toko,nama_kategori) VALUES ('$id_toko','$nama') ");

    echo "<script>alert('data tersimpan')</script>";
    echo "<script>location='index.php?page=kategori'</script>";
}
?>