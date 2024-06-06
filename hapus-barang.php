<?php

include 'config/app.php';

//meneria id penawaran yang dipilih

$id_penawaran = (int)$_GET['id_penawaran'];

if (delete_penawaran($id_penawaran) > 0){
    echo "<script>
    alert('Data Barang Berhasil Dihapus');
    document.location.href = 'barang.php';
    </script>";

} else {
    echo "<script>
    alert('Data Barang Gagal Dihapus');
    document.location.href = 'barang.php';
    </script>";
}
