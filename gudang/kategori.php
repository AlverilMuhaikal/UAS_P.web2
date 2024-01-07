<?php
//mendapatkan id toko si user yang login
$id_toko =$_SESSION['user']['id_toko'];

$kategori = array();
$ambil = $koneksi->query("SELECT * FROM kategori WHERE id_toko ='$id_toko'");
while($tiap = $ambil->fetch_assoc())
{
    $kategori[] = $tiap;
}

// echo "<pre>";
// print_r($kategori);
// echo "</pre>";
?>

<div class="card border-0 shadow">
    <div class="card-header bg-primary text-white">Kategori</div>
    <div class="card-body">
        <table class="table" id="example">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($kategori as $key => $value): ?>

                <tr>
                    <td><?php echo $key +1 ?></td>
                    <td><?php echo $value["nama_kategori"] ?></td>
                    <td>
                        <a class="btn btn-outline-warning btn-sm" href="index.php?page=kategori_edit&id=<?php echo $value["id_kategori"] ?>">Edit</a>
                        <a class="btn btn-outline-danger btn-sm" href="index.php?page=kategori_hapus&id=<?php echo $value["id_kategori"] ?>">Hapus</a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <a class="btn btn-outline-primary btn-sm" href="index.php?page=kategori_tambah">Tambah</a>
    </div>
</div>