<?php

session_start();
include 'layout/header.php';



$data_penawaran = select("SELECT * FROM penawaran ORDER BY id_penawaran ASC");
?>
    
    <div class="container mt-5">
    <h1>Penawaran Ku</h1>
    <hr>
    <a href="tambah-lelang.php" class="btn btn-primary mb-1">Tambah</a>
    <table class="table table-bordered table-striped mt-3" id="table">
        <thead>
            <tr class="text-center">
                <th>No</th>
                <th>Barang</th>
                <th>Tanggal Daftar</th>
                <th>Harga</th>
                <th>Deskripsi</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach($data_penawaran as $penawaran) : ?>
            <tr class="text-center">
                <td><?= $no++; ?></td>
                <td><?= $penawaran['barang'];?></td>
                <td><?= date('d-m-y | H:i:s' ,strtotime($penawaran['tanggal_daftar']))?></td>
                <td>Rp.<?= number_format($penawaran['harga'],0,',','.');?></td>
                <td><?= $penawaran['deskripsi'];?></td>
                <td>
                <img src="img/<?= $penawaran['foto'];?>" alt="foto" width="40%">
                </td>
                <td width="15%" class="text-center">
                    <a href="ubah-barang.php?id_penawaran=<?= $penawaran['id_penawaran']; ?>" 
                    class="btn btn-success">Ubah</a>
                    <a href="hapus-barang.php?id_penawaran=<?= $penawaran['id_penawaran']; ?>" 
                    class="btn btn-danger" onclick="return confirm('Yakin Data Barang Akan Dihapus');">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
 
<?php
include 'layout/footer.php';

?>

   