<?php

include 'layout/header.php';


//mengambil id_penawaran dari url
$id_penawaran = (int)$_GET['id_penawaran'];

$penawaran = select("SELECT * FROM penawaran WHERE id_penawaran = $id_penawaran")[0];
//check apakah tombol ubah ditekan

if (isset($_POST['ubah'])){
    if(update_penawaran($_POST)>0) {
        echo "<script>
                alert('Data Barang Berhasil Diubah');
                document.location.href = 'barang.php';
        </script>";
    } else {
        echo "<script>
                alert('Data Barang Gagal Diubah');
                document.location.href = 'barang.php';
                </script>";
    }
}
?>

<div class="container mt-5">
    <h1>Ubah Penawaran</h1>
    <hr>

    <form action="" method="post">
        <input type="hidden" name="id_penawaran" value="<?= $penawaran['id_penawaran']; ?>"></input>
        <div class="mb-3">
            <label for="barang" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" id="barang" name="barang" value="<?= $penawaran['barang'];?>" 
            placeholder="nama barang..." required>
        </div>


    <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" value="<?= $penawaran['harga'];?>" 
            placeholder="harga..." required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?= $penawaran['deskripsi'];?>" 
            placeholder="deskripsi barang..." required>
        </div>


        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" class="form-control" id="foto" name="foto" placeholder="Foto..."
            required>
            <p>
                <small>Gambar Sebelumnya</small>
            </p>
            <img src="img/<?= $penawaran['foto']; ?>" alt="foto" width="30%">
        </div>

        <button type="submit" name="ubah" class="btn btn-primary" style="float:right">Ubah</button>
    </form>


    
</div>
 


<?php
include 'layout/footer.php';
?>