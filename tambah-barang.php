<?php

include 'layout/header.php';


//check apakah tombol tambah ditekan
if (isset($_POST['tambah'])){
    if(create_barang($_POST)>0) {
        echo "<script>
                alert('Data Barang Berhasil Ditambahkan');
                document.location.href = 'penawaran.php';
        </script>";
    } else {
        echo "<script>
                alert('Data Barang Gagal Ditambahkan');
                document.location.href = 'penawaran.php';
                </script>";
    }
}
?>

<div class="container mt-5">
    <h1>Tambah Barang Lelang</h1>
    <hr>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="barang" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" id="barang" name="barang" placeholder="nama barang..." required>
        </div>


    <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" placeholder="harga..." required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="deskripsi barang..." required>
        </div>

        <div class="mb-3 ">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="">---- pilih Status Lelang ---- </option>
                <option value="close">Close </option>
                <option value="open">Open </option>
                <option value="sold">Sold </option>
            </select>
        </div>

        <div class="mb-3">
            <label for="foto" class="form-label">foto</label>
            <input type="file" class="form-control" id="foto" name="foto" placeholder="foto barang..." required>
        </div>

        <div style="display: flex; justify-content: space-between;">
            <a href="penawaran.php" class="btn btn-secondary">Kembali</a>
            <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
        </div>
    </form>


    
</div>
 


<?php
include 'layout/footer.php';
?>