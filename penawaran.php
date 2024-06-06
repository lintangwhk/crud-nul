<?php

session_start();
include 'layout/header.php';


$data_barang = select("SELECT * FROM barang ORDER BY id_barang ASC");

?>

<div class="container mt-5">
    <h1>Lelang</h1>
    <hr>
    <a href="tambah-barang.php" class="btn btn-primary mb-1">Tambah</a>
    <table class="table table-bordered table-striped mt-3" id="table">
        <thead>
            <tr class="text-center">
                <th>No</th>
                <th>Barang</th>
                <th>Tanggal Daftar</th>
                <th>Harga</th>
                <th>Deskripsi</th>
                <th>Status</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach($data_barang as $barang) : ?>
            <tr class="text-center">
                <td><?= $no++; ?></td>
                <td><?= $barang['barang'];?></td>
                <td><?= date('d-m-y | H:i:s' ,strtotime($barang['tanggal_daftar']))?></td>
                <td>Rp.<?= number_format($barang['harga'],0,',','.');?></td>
                <td><?= $barang['deskripsi'];?></td>
                <td><?= $barang['status'];?></td>
                <td>
                    <img src="img/<?= $barang['foto'];?>" alt="foto" width="40%">
                </td>
                <td width="15%" class="text-center">
                    <a href="ubah-lelang.php?id_barang=<?= $barang['id_barang']; ?>" 
                    class="btn btn-success">Ubah</a>
                    <a href="hapus-lelang.php?id_barang=<?= $barang['id_barang']; ?>" 
                    class="btn btn-danger" onclick="return confirm('Yakin Data Barang Akan Dihapus');">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>

<?php include 'layout/footer.php'; ?>