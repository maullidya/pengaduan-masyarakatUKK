<?php
include "../../conf/conn.php";
if($_POST)
{
$id = $_POST['id'];
$id_pengaduan = $_POST['pengaduan'];
$tgl = $_POST['tgl'];
$tanggapan = $_POST['tanggapan'];
$id_petugas = $_POST['id_petugas'];
$query = ("UPDATE tanggapan SET id_pengaduan='$id_pengaduan',tgl_tanggapan='$tgl',tanggapan='$tanggapan',id_petugas='$id_petugas' WHERE id_tanggapan ='$id'");
echo $query;

if(!mysqli_query($koneksi, "$query")){
    die(mysqli_error($koneksi));
    }else{
echo '<script>alert("Data Berhasil Diubah !!!");
window.location.href="../../index.php?page=data_tanggapan"</script>';
}
}

?>