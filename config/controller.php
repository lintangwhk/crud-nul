<?php

//fungsi menampilkan
function select($query)
{
    //panggil koneksi
    global $db;

    $result = mysqli_query($db, $query);
    $rows = [];

    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }

    return $rows;
}

//fungsi menambahkan barang
function create_penawaran($post)
{
    global $db;

    $barang             = strip_tags($post['barang']);
    $harga              = strip_tags($post['harga']);
    $deskripsi          = strip_tags($post['deskripsi']);
    $foto               = upload_file();

        // Check upload file
        if (!$foto) {
            return false;
        }

    //query tambah data
    $query = "INSERT INTO penawaran VALUES(null, '$barang' , CURRENT_TIMESTAMP() , '$harga', '$deskripsi' , '$foto' )";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function upload_file()
{
    $namafile    = $_FILES['foto']['name'];
    $ukuranfile  = $_FILES['foto']['size'];
    $error       = $_FILES['foto']['error'];
    $tmpName     = $_FILES['foto']['tmp_name'];

    // Check file upload
    $extensifileValid = ['jpg', 'jpeg', 'png'];
    $extensifile = explode('.', $namafile);
    $extensifile = strtolower(end($extensifile));

    if (!in_array($extensifile, $extensifileValid)) {
        // Pesan gagal
        echo "<script>
                alert('Format File Tidak Valid');
                document.location.href= 'tambah-barang.php';
                </script>";
        return false;
    }

    // Check ukuran file 2mb
    if ($ukuranfile > 2048000) {
        // Pesan gagal
        echo "<script>
                alert('Ukuran File Max 2MB');
                document.location.href= 'tambah-barang.php';
                </script>";
        return false;
    }

    // Generate nama file baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $extensifile;

    // Pindahkan folder lokal
    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
    return $namaFileBaru;
}

//fungsi mengubah data barang
function update_penawaran($post)
{
    global $db;

    $id_penawaran       = strip_tags($post['id_penawaran']);

    $barang             = strip_tags($post['barang']);
    $harga              = strip_tags($post['harga']);
    $deskripsi          = strip_tags($post['deskripsi']);
    $foto               = strip_tags($post['foto']);

    //query ubah data
    $query = "UPDATE penawaran SET barang= '$barang' , harga = '$harga' , deskripsi = '$deskripsi' , foto = '$foto' WHERE id_penawaran =
    $id_penawaran"; 
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

//fungsi hapus data penawaran
function delete_penawaran($id_penawaran)
{
    global $db;


    //ambil foto sesuai yang dipilih
    $foto= select("SELECT * FROM penawaran WHERE id_penawaran = $id_penawaran")[0];


    unlink("img/" . $foto['foto']);
    // Query hapus data barang
    $query = "DELETE FROM penawaran WHERE id_penawaran = $id_penawaran";



    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

//fungsi menambahkan barang lelang
function create_barang($post)
{
    global $db;

    $barang             = strip_tags($post['barang']);
    $harga              = strip_tags($post['harga']);
    $deskripsi          = strip_tags($post['deskripsi']);
    $status             = strip_tags($post['status']);
    $foto               = upload_file();

    //query tambah data
    $query = "INSERT INTO barang VALUES(null, '$barang' , CURRENT_TIMESTAMP() , '$harga', '$deskripsi' , '$status', '$foto' )";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

//fungsi hapus data barang
function delete_barang($id_barang)
{
    global $db;


        //ambil foto sesuai yang dipilih
        $foto= select("SELECT * FROM barang WHERE id_barang = $id_barang")[0];


    unlink("img/" . $foto['foto']);
    // Query hapus data barang
    $query = "DELETE FROM barang WHERE id_barang = $id_barang";




    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

//fungsi tambah akun
function create_akun($post){
    global $db;

    $nama        = strip_tags($post['nama']);
    $username    = strip_tags($post['username']);
    $email       = strip_tags($post['email']);
    $password    = strip_tags($post['password']);
    $level       = strip_tags($post['level']);
    

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //query tambah data
    $query = "INSERT INTO akun VALUES(null, '$nama', '$username', '$email' , '$password' ,
    '$level')";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

//fungsi menghapus data akun
function delete_akun($id_akun)
{
    global $db;

    //query hapus data akun
    $query = " DELETE FROM akun WHERE id_akun = $id_akun ";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

//fungsi ubah akun
function update_akun($post){
    global $db;

    $id_akun     = strip_tags($post['id_akun']);
    $nama        = strip_tags($post['nama']);
    $username    = strip_tags($post['username']);
    $email       = strip_tags($post['email']);
    $password    = strip_tags($post['password']);
    $level       = strip_tags($post['level']);
    

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //query ubah data
    $query = "UPDATE akun SET nama = '$nama' , username= '$username' , email='$email' , password= '$password' , level= '$level' WHERE id_akun = $id_akun ";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

?>