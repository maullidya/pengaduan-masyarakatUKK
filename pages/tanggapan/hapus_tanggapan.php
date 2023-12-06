<?php
include "../../conf/conn.php";
$id_pengaduan = $_GET['id_tanggapan'];
$query = ("DELETE FROM tanggapan WHERE id_tanggapan ='$id_pengaduan'");
//echo $query;
if(!mysqli_query($koneksi, "$query")){
    die(mysqli_error($koneksi));
    }else{
        echo '<script>alert("Data Berhasil Dihapus !!!");
        window.location.href="../../index.php?page=data_petugas"</script>';
}
?>