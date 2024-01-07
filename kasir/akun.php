<?php include 'header.php'; ?>

<?php
$id_user = $_SESSION['user']['id_user'];

$ambil = $koneksi->query("SELECT * FROM user WHERE id_user='$id_user'");
$user = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($user);
// // print_r($produk);
// echo "</pre>";
?>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <h6>Ubah Akun</h6>
                    <form method="post">
                        <div class="mb-3">
                            <label>Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control" value="<?php echo $user['nama_user'] ?>">
                        </div>
                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="<?php echo $user['email_user'] ?>">
                        </div>
                        <div class="mb-3">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control"">
                        </div>
                        <button class="btn btn-primary" name="ubah">Ubah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
if (isset($_POST['ubah'])) 
{
    $nama =$_POST['nama'];
    $email =$_POST['email'];
    $password =$_POST['password'];
    if (!empty($password)) 
    {
        $password = sha1($password);
        $koneksi->query("UPDATE user SET nama_user='$nama', email_user='$email' password_user='$password'
        WHERE id_user='$id_user' ");
    }
    else
    {
        $koneksi->query("UPDATE user SET nama_user='$nama', email_user='$email' WHERE id_user='$id_user' ");
    }
    echo "<script>alert('akun telah diubah')</script>";
    echo "<script>location='index.php'</script>";
}

?>
<?php include 'footer.php'; ?>