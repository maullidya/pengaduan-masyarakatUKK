<?php
include "../../conf/conn.php";
$id = $_GET['id'];
$query = ("DELETE FROM pengaduan WHERE id_pengaduan ='$id'");
if(!mysqli_query($koneksi, "$query")){
    die(mysqli_error($koneksi));
    }else{
echo '<script>alert("Data Berhasil Dihapus !!!");
window.location.href="../../index.php?page=data_pengaduan"</script>';
}
echo $query;
?>