<?php
include "../../conf/conn.php";

if ($_POST) {
    $id = $_POST['id'];
    $tgl = $_POST['tgl'];
    $nik = $_POST['nik'];
    $isi = $_POST['isi'];
    $status = $_POST['status'];
    $foto_baru = $_FILES['gambar']['name'];
    $foto_lama = $_POST['foto_lama']; // Gambar lama yang disimpan dalam input tersembunyi

    // echo $foto_baru;

    // Periksa apakah ada file gambar yang diunggah
    if (isset($_FILES['gambar']) && $_FILES['gambar']['name'] != "") {
      
        $foto = $_FILES['gambar']['name'];

        $ekstensi_diperbolehkan = array('png', 'jpg');
        $x = explode('.', $foto);
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['gambar']['tmp_name'];
        $angka_acak = rand(1, 999);
        $nama_gambar_baru = $angka_acak . '-' . $foto;

        if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
            move_uploaded_file($file_tmp, '../../dist/img/' . $nama_gambar_baru);

            // Hapus gambar lama jika ada
            if (!empty($foto_lama) && file_exists('../../dist/img/' . $foto_lama)) {
                unlink('../../dist/img/' . $foto_lama);
            }
        } else {
            echo "Ekstensi file yang diunggah tidak diperbolehkan.";
            exit;
        }
    } else {
        
        // Jika tidak ada gambar yang diunggah, gunakan gambar yang ada di database
        $nama_gambar_baru = $foto_lama;
    }

    // Parameterisasi query untuk menghindari SQL Injection
    $query = "UPDATE pengaduan SET tgl_pengaduan = '$tgl', nik = '$nik', isi_laporan= '$isi', foto = '$nama_gambar_baru', status = '$status' WHERE id_pengaduan = $id";
    // $stmt = mysqli_prepare($koneksi, $query);
// echo $query;

    if(!mysqli_query($koneksi, $query)){
        die(mysqli_error($koneksi));
        }else{
    echo '<script>alert("Data Berhasil Diubah !!!");
    window.location.href="../../index.php?page=data_pengaduan"</script>';
    }
}
?>
