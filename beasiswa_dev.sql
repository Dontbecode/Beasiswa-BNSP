-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 16, 2024 at 10:01 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 8.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beasiswa_dev`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_beasiswa`
--

CREATE TABLE `tabel_beasiswa` (
  `id` varchar(32) NOT NULL,
  `nama_beasiswa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_beasiswa`
--

INSERT INTO `tabel_beasiswa` (`id`, `nama_beasiswa`) VALUES
('437fcfa436c49d9602a532edb474c1ed', 'FrontEnd'),
('44ead2114480da6e10a2e859b9e458f4', 'Akademik'),
('6f9cd12c8004b99ef096ea0164522baf', 'NonAkademik'),
('92e55ac58b2f3a60656f199a2b1a55a7', 'Back End');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pendaftaran`
--

CREATE TABLE `tabel_pendaftaran` (
  `id` varchar(32) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nomor_hp` varchar(20) NOT NULL,
  `semester` int(11) NOT NULL,
  `ipk` decimal(4,2) NOT NULL,
  `pilihan_beasiswa` varchar(255) NOT NULL,
  `berkas_syarat` varchar(255) NOT NULL,
  `status_ajuan` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_pendaftaran`
--

INSERT INTO `tabel_pendaftaran` (`id`, `nama_lengkap`, `email`, `nomor_hp`, `semester`, `ipk`, `pilihan_beasiswa`, `berkas_syarat`, `status_ajuan`, `created_at`) VALUES
('4cb2eeb278b0945e64590b5a5d34268a', 'Albet Ubaidi 2', 'albet.ubaidi931@gmail.com', '082215293663', 5, 3.12, 'Akademik', 'download (51).jpg', 'Belum Terverifikasi', '2024-09-16 09:04:03'),
('c6629aa5f72217f213241a82252df843', 'GTR', 'rzaaditia3@gmail.com', '082215293663', 4, 3.67, 'NonAkademik', 'download (48).jpg', 'Belum Terverifikasi', '2024-09-16 09:04:43'),
('d65876cdb3271c86c1d61d1b0c5a405c', 'Albet Ubaidi', 'albet.ubaidi139@gmail.com', '082215293663', 4, 3.69, 'FrontEnd', '_ Mazda RX-7 [FD] _.jpg', 'Belum Terverifikasi', '2024-09-16 09:03:40');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `no_hp`, `is_admin`) VALUES
(13, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '12345', 1),
(14, 'Albet ubaidi', 'albetubaidi', '8d1b3c1b02b9871b87c1f8aa69991576', '12345', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_beasiswa`
--
ALTER TABLE `tabel_beasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabel_pendaftaran`
--
ALTER TABLE `tabel_pendaftaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
