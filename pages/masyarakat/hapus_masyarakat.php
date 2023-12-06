<?php
include "../../../conf/conn.php";
$nik = $_GET['nik'];
$query = ("DELETE FROM masyarakat WHERE nik ='$nik'");
if(!mysqli_query($koneksi, "$query")){
die(mysqli_error($koneksi));
}else{
echo '<script>alert("Data Berhasil Dihapus !!!");
window.location.href="../../index.php?page=data_masyarakat"</script>';
}
echo $query;
?>

