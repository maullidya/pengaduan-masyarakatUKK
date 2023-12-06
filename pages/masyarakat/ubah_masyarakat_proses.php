<?php
include "../../conf/conn.php";
if($_POST)
{
$nik = $_POST['nik'];
$nama = $_POST['nama'];
$usn = $_POST['usn'];
$pass = $_POST['pass'];
$telp = $_POST['telp'];
$query = ("UPDATE masyarakat SET nama='$nama',username='$usn',password='$pass',no_telp='$telp' WHERE nik ='$nik'");
echo $query;

if(!mysqli_query($koneksi, "$query")){
    die(mysqli_error($koneksi));
    }else{
echo '<script>alert("Data Berhasil Diubah !!!");
window.location.href="../../index.php?page=data_masyarakat"</script>';
}


}

?>