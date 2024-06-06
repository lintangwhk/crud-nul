<?php

include 'layout/header.php';


//mengambil id_penawaran dari url
$id_barang = (int)$_GET['id_barang'];

$barang = select("SELECT * FROM barang WHERE id_barang = $id_barang")[0];
//check apakah tombol ubah ditekan

if (isset($_POST['ubah'])){
    if(update_barang($_POST)>0) {
        echo "<script>
                alert('Data Barang Berhasil Diubah');
                document.location.href = 'penawaran.php';
        </script>";
    } else {
        echo "<script>
                alert('Data Barang Gagal Diubah');
                document.location.href = 'penawaran.php';
                </script>";
    }
}
?>

<div class="container mt-5">
    <h1>Ubah Barang</h1>
    <hr>

    <form action="" method="post">
        <input type="hidden" name="id_barang" value="<?= $barang['id_barang']; ?>"></input>
        <div class="mb-3">
            <label for="barang" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" id="barang" name="barang" value="<?= $barang['barang'];?>" 
            placeholder="nama barang..." required>
        </div>


    <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" value="<?= $barang['harga'];?>" 
            placeholder="harga..." required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?= $barang['deskripsi'];?>" 
            placeholder="deskripsi barang..." required>
        </div>

        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" class="form-control" id="foto" name="foto" placeholder="Foto..."
            required>
            <p>
                <small>Gambar Sebelumnya</small>
            </p>
            <img src="img/<?= $barang['foto']; ?>" alt="foto" width="30%">
        </div>

        <button type="submit" name="ubah" class="btn btn-primary" style="float:right">Ubah</button>
    </form>


    
</div>
 


<?php
include 'layout/footer.php';
?>