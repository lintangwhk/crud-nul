<?php

include 'config/app.php';

//meneria id akun yang dipilih

$id_akun = (int)$_GET['id_akun'];

if (delete_akun($id_akun) > 0){
    echo "<script>
    alert('Data akun Berhasil Dihapus');
    document.location.href = 'data-akun.php';
    </script>";

} else {
    echo "<script>
    alert('Data akun Gagal Dihapus');
    document.location.href = 'data-akun.php';
    </script>";
}