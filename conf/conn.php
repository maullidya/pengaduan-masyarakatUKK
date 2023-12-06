<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "pengaduan";    

$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if(mysqli_connect_errno()) {
   // echo "Koneksi Berhasil!";

    echo "Koneksi Gagal! : ". mysqli_connect_error();
}

?>