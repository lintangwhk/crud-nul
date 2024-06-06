<?php

include 'config/app.php';

//meneria id lelang yang dipilih

$id_barang = (int)$_GET['id_barang'];

if (delete_barang($id_barang) > 0){
    echo "<script>
    alert('Data Barang Berhasil Dihapus');
    document.location.href = 'penawaran.php';
    </script>";

} else {
    echo "<script>
    alert('Data Barang Gagal Dihapus');
    document.location.href = 'penawaran.php';
    </script>";
}
