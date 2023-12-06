    <?php
    include "../../conf/conn.php";
    if($_POST)
    {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $usn = $_POST['usn'];
    $pass = $_POST['pass'];
    $telp = $_POST['telp'];
    $level = $_POST['level'];
    $query = ("UPDATE petugas SET nama_petugas='$nama',username='$usn',password='$pass',telp='$telp',level='$level' WHERE id_petugas ='$id'");
    echo $query;

    if(!mysqli_query($koneksi, "$query")){
        die(mysqli_error($koneksi));
        }else{
    echo '<script>alert("Data Berhasil Diubah !!!");
    window.location.href="../../index.php?page=data_petugas"</script>';
    }


    }

    ?>