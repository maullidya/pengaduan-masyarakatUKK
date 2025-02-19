-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2024 at 03:42 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengaduan`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `data_pengaduan` ()   SELECT * FROM pengaduan$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `status_pengaduan` (IN `sts` VARCHAR(50))   SELECT*FROM pengaduan
WHERE status=sts$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `masyarakat`
--

CREATE TABLE `masyarakat` (
  `nik` char(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `level` varchar(10) NOT NULL DEFAULT 'masyarakat',
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `masyarakat`
--

INSERT INTO `masyarakat` (`nik`, `nama`, `username`, `password`, `no_telp`, `level`, `email`) VALUES
('0987', 'keysa', 'kesalena', '1239', '09897', 'masyarakat', 'keysa@gmail.com'),
('1234', 'agus', 'agusgtg', '4321', '098876', 'masyarakat', 'agus@gmail.com'),
('4321', 'maulidya', 'maul', '123', '67890', 'masyarakat', 'maulidya@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `tgl_pengaduan` date NOT NULL,
  `nik` char(16) NOT NULL,
  `isi_laporan` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` enum('0','proses') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `tgl_pengaduan`, `nik`, `isi_laporan`, `foto`, `status`) VALUES
(11, '2023-10-18', '0987', 'jalanan tidak rata', '975-Screenshot 2023-09-12 220518.png', 'proses'),
(13, '2023-10-05', '1234', 'lingkungan kotor', '113-Screenshot 2023-09-23 172425.png', 'proses'),
(21, '2023-11-08', '0987', 'boikot melany', '647-Screenshot 2023-10-10 200259.png', 'proses'),
(23, '2023-12-01', '1234', 'terjadi genangan air setelah hujan di daerah Tlogomas', '613-Screenshot 2023-09-23 172425.png', 'proses'),
(24, '2024-01-08', '0987', 'banjir', '21-Screenshot (1).png', '');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `level` varchar(8) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `telp`, `level`, `email`) VALUES
(5, 'Amuro Tooru', 'amuro', '1234', '9876543', 'petugas', 'amuro@gmail.com'),
(6, 'Wakasa Imaushi', 'wakasa', '1234', '098765', 'admin', 'wakasa@gmail.com'),
(9, 'Syin Sheladiang', 'syin', '1234', '1234', 'admin', 'syin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tanggapan`
--

CREATE TABLE `tanggapan` (
  `id_tanggapan` int(11) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `tgl_tanggapan` date NOT NULL,
  `tanggapan` text NOT NULL,
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tanggapan`
--

INSERT INTO `tanggapan` (`id_tanggapan`, `id_pengaduan`, `tgl_tanggapan`, `tanggapan`, `id_petugas`) VALUES
(9, 23, '2023-12-01', 'oke, segera akan kami teruskan ke bagian dinas terkait', 5),
(10, 21, '2023-12-01', 'sudah kami banned', 6),
(22, 13, '2024-06-03', 'nanti dibersihkan', 6),
(23, 11, '2024-06-03', 'diaspal ulang', 6),
(24, 23, '2024-11-05', 'segera diatasi', 6);

--
-- Triggers `tanggapan`
--
DELIMITER $$
CREATE TRIGGER `hapus` AFTER DELETE ON `tanggapan` FOR EACH ROW BEGIN
UPDATE pengaduan 
SET status = '0'
WHERE id_pengaduan = OLD.id_pengaduan;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `status` AFTER INSERT ON `tanggapan` FOR EACH ROW BEGIN
UPDATE pengaduan 
SET status = 'proses'
WHERE id_pengaduan = NEW.id_pengaduan;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`),
  ADD KEY `nik` (`nik`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`),
  ADD KEY `id_pengaduan` (`id_pengaduan`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tanggapan`
--
ALTER TABLE `tanggapan`
  MODIFY `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD CONSTRAINT `pengaduan_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `masyarakat` (`nik`);

--
-- Constraints for table `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD CONSTRAINT `tanggapan_ibfk_1` FOREIGN KEY (`id_pengaduan`) REFERENCES `pengaduan` (`id_pengaduan`),
  ADD CONSTRAINT `tanggapan_ibfk_2` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
