<?php
//mendapatkan id toko si user yang login
$id_toko =$_SESSION['user']['id_toko'];

$user = array();
$ambil = $koneksi->query("SELECT * FROM user WHERE id_toko ='$id_toko'");
while($tiap = $ambil->fetch_assoc())
{
    $user[] = $tiap;
}

// echo "<pre>";
// print_r($user);
// echo "</pre>";
?>

<div class="card border-0 shadow">
    <div class="card-header bg-primary text-white">User</div>
    <div class="card-body">
        <table class="table" id="example">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Level</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($user as $key => $value): ?>

                <tr>
                    <td><?php echo $key +1 ?></td>
                    <td><?php echo $value["nama_user"] ?></td>
                    <td><?php echo $value["email_user"] ?></td>
                    <td><?php echo $value["level_user"] ?></td>
                    <td>
                        <a class="btn btn-outline-warning btn-sm" href="index.php?page=user_edit&id=<?php echo $value["id_user"] ?>">Edit</a>
                        <a class="btn btn-outline-danger btn-sm" href="index.php?page=user_hapus&id=<?php echo $value["id_user"] ?>">Hapus</a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <a class="btn btn-outline-primary btn-sm" href="index.php?page=user_tambah">Tambah</a>
    </div>
</div>