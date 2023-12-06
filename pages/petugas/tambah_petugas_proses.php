<?php
include "../../conf/conn.php";
if($_POST){

$nama = $_POST['nama'];
$usn = $_POST['usn'];
$pass = $_POST['pass'];
$telp = $_POST['telp'];
$level = $_POST['level'];
$query = "INSERT INTO petugas(nama_petugas,username,password,telp,level) VALUES ('$nama','$usn','$pass','$telp','$level')";
if(!mysqli_query($koneksi, "$query")){
die(mysqli_error($koneksi));
}else{
echo '<script>alert("Data Berhasil Ditambahkan !!!");
window.location.href="../../index.php?page=data_petugas"</script>';
}
}
?>