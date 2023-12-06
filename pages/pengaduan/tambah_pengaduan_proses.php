<?php
include "../../conf/conn.php";
if($_POST){

$tgl = $_POST['tgl'];
$nik = $_POST['nik'];
$isi = $_POST['isi'];
$foto = $_FILES['gambar']['name'];
$status = $_POST['status'];

if($foto != "") {
    $ekstensi_diperbolehkan = array('png','jpg','jpeg'); //ekstensi file gambar yang bisa diupload 
    $x = explode('.', $foto); //memisahkan nama file dengan ekstensi yang diupload
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['gambar']['tmp_name'];   
    $angka_acak     = rand(1,999);
    $nama_gambar_baru = $angka_acak.'-'.$foto; //menggabungkan angka acak dengan nama file sebenarnya
          if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                  move_uploaded_file($file_tmp, '../../dist/img/'.$nama_gambar_baru);

$query = "INSERT INTO pengaduan(tgl_pengaduan,nik,isi_laporan,foto,status) VALUES ('$tgl','$nik','$isi','$nama_gambar_baru','$status')";
if(!mysqli_query($koneksi, "$query")){
die(mysqli_error($koneksi));
}else{
echo '<script>alert("Data Berhasil Ditambahkan !!!");
window.location.href="../../index.php?page=data_pengaduan"</script>';
}
}
}
}
?>