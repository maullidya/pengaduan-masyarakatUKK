<?php
if(isset($_GET['page'])){
  $page = $_GET['page'];
switch ($page) {
// Beranda
  case 'data_petugas':
  include 'pages/petugas/data_petugas.php';
  break;
  case 'tambah_petugas':
  include 'pages/petugas/tambah_petugas.php';
  break;
  case 'ubah_petugas':
  include 'pages/petugas/ubah_petugas.php';
  break;
  }
  switch ($page) {
    // Beranda
      case 'data_masyarakat':
        include 'pages/masyarakat/data_masyarakat.php';
        break;
        case 'tambah_masyarakat':
          include 'pages/masyarakat/tambah_masyarakat.php';
          break;
    case 'ubah_masyarakat':
          include 'pages/masyarakat/ubah_masyarakat.php';
          break;
      }
      switch ($page) {
        // Beranda
          case 'data_pengaduan':
            // echo "ppp";
            include 'pages/pengaduan/data_pengaduan.php';
            break;
            case 'tambah_pengaduan':
              include 'pages/pengaduan/tambah_pengaduan.php';
              break;
        case 'ubah_pengaduan':
              include 'pages/pengaduan/ubah_pengaduan.php';
              break;
          }
          switch ($page) {
            // Beranda
              case 'data_tanggapan':
              include 'pages/tanggapan/data_tanggapan.php';
              break;
              case 'tambah_tanggapan':
              include 'pages/tanggapan/tambah_tanggapan.php';
              break;
              case 'ubah_tanggapan':
              include 'pages/tanggapan/ubah_tanggapan.php';
              break;
              }
}else{
    include "pages/beranda.php";
  }
?>