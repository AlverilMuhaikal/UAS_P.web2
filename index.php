<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body class="bg-lightblue" >
    
    <h3><marquee behavior='slide' bgcolor='pink' stop='center' > Selamat Datang Di Toko veril </marquee></h3>
    <h4 ><center>Selamat Berbelanja!</center></h4>
    
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 offset-md-4 mt-5 bg-white shadow p-5 rounded">
                <div class="text-center">
                    <img src="assets/img/logoku.png" width="150">
                </div>
                <form method="post">
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control">
                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <button class="btn btn-primary" name="login">Login</button>
                </form>
            </div>
        </div>
    </div>


    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <style>
        /* Style Button */
  	.button-custom {
      display: inline-block;
      background: #4285F4;
      color: #fff;
      width: 240px;
      height: 50px;
      border-radius: 5px;
      border: thin solid #888;
      box-shadow: 1px 1px 1px grey;
      white-space: nowrap;
      font-size: 16px;
      font-weight: normal;
      font-family: 'Roboto', sans-serif;
      margin: 2rem 0;
    </style>
</body>
</html>

<?php
if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $password = sha1($_POST['password']);

    //cek ke table user ada tidak akun itu
    $ambil = $koneksi->query("SELECT * FROM user WHERE email_user='$email' AND password_user='$password' ");
    $cekuser = $ambil->fetch_assoc();

    //jk kosong
    if(empty($cekuser))
    {
        echo "<script>alert('gagal!, akun salah')</script>";
        echo "<script>location='index.php'</script>";
    }
    else
    {
        //menyimpan data pelogin dalam session agar sistem tau siapa yang pakai dia
        $_SESSION['user'] = $cekuser;

        if($cekuser['level_user']=="kasir")
        {
            echo "<script>alert('sukses!')</script>";
            echo "<script>location='kasir/index.php'</script>";
        }
        elseif($cekuser['level_user']=="gudang")
        {
            echo "<script>alert('sukses!')</script>";
            echo "<script>location='gudang/index.php'</script>";
        }
        elseif($cekuser['level_user']=="owner")
        {
            echo "<script>alert('sukses!')</script>";
            echo "<script>location='owner/index.php'</script>";
        }
    }
}

?>