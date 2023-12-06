<?php
include "../../conf/conn.php";
if($_POST){
$pgdn = $_POST['pengaduan'];
$tgl = $_POST['tgl'];
$tanggapan = $_POST['tanggapan'];
$petugas = $_POST['petugas'];
$query = "INSERT INTO tanggapan(id_pengaduan,tgl_tanggapan,tanggapan,id_petugas) VALUES ('$pgdn','$tgl','$tanggapan','$petugas')";
if(!mysqli_query($koneksi, "$query")){
die(mysqli_error($koneksi));
}else{
echo '<script>alert("Data Berhasil Ditambahkan !!!");
window.location.href="../../index.php?page=data_tanggapan"</script>';
}
echo $query;
}
?>