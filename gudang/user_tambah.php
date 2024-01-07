<div class="card border-0 shadow">
    <div class="card-header bg-primary text-white">Tambah User</div>
    <div class="card-body">
        <form method="post">
            <div class="mb-3">
                <label>Nama </label>
                <input type="text" name="nama" class="form-control">
            </div>
            <div class="mb-3">
                <label>Email </label>
                <input type="text" name="email" class="form-control">
            </div>
            <div class="mb-3">
                <label>Password </label>
                <input type="text" name="password" class="form-control">
            </div>
            <div class="mb-3">
                <label>Level </label>
                <select class="form-control" name="level">
                    <option value="">Pilih</option>
                    <option value="kasir">Kasir</option>
                    <option value="gudang">Gudang</option>
                    <option value="owner">Owner</option>
                </select>
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
    $password =sha1($_POST['password']);
    $level =$_POST['level'];
    $id_toko = $_SESSION['user']['id_toko'];

    $koneksi->query("INSERT INTO user (id_toko,nama_user,email_user,password_user,level_user) 
        VALUES ('$id_toko','$nama','$email','$password','$level') ");

    echo "<script>alert('data tersimpan')</script>";
    echo "<script>location='index.php?page=user'</script>";
}
?>