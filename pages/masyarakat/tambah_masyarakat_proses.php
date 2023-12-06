<?php
include "../../conf/conn.php";
if($_POST){
     $nik = $_POST['nik'];
$nama = $_POST['nama'];
$usn = $_POST['usn'];
$pass = $_POST['pass'];
$telp = $_POST['telp'];
$query = "INSERT INTO masyarakat(nik,nama,username,password,no_telp) VALUES ('$nik','$nama','$usn','$pass','$telp')";
if(!mysqli_query($koneksi, "$query")){
die(mysqli_error($koneksi));
}else{
echo '<script>alert("Data Berhasil Ditambahkan !!!");
window.location.href="../../index.php?page=data_masyarakat"</script>';
}
}
?>