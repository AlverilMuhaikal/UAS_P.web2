<?php
//mendapatkan id toko si user yang login
$id_toko =$_SESSION['user']['id_toko'];

$supplier = array();
$ambil = $koneksi->query("SELECT * FROM supplier WHERE id_toko ='$id_toko'");
while($tiap = $ambil->fetch_assoc())
{
    $supplier[] = $tiap;
}

// echo "<pre>";
// print_r($supplier);
// echo "</pre>";
?>

<div class="card border-0 shadow">
    <div class="card-header bg-primary text-white">Supplier</div>
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
                <?php foreach ($supplier as $key => $value): ?>

                <tr>
                    <td><?php echo $key +1 ?></td>
                    <td><?php echo $value["nama_supplier"] ?></td>
                    <td>
                        <a class="btn btn-outline-warning btn-sm" href="index.php?page=supplier_edit&id=<?php echo $value["id_supplier"] ?>">Edit</a>
                        <a class="btn btn-outline-danger btn-sm" href="index.php?page=supplier_hapus&id=<?php echo $value["id_supplier"] ?>">Hapus</a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <a class="btn btn-outline-primary btn-sm" href="index.php?page=supplier_tambah">Tambah</a>
    </div>
</div>