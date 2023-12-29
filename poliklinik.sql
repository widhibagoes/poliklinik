-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2023 at 12:27 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `poliklinik`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_periksa`
--

CREATE TABLE `detail_periksa` (
  `id` int(10) NOT NULL,
  `id_periksa` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_periksa`
--

INSERT INTO `detail_periksa` (`id`, `id_periksa`, `id_obat`) VALUES
(73, 29, 5),
(74, 29, 6),
(75, 29, 7),
(76, 29, 8),
(77, 29, 9),
(78, 29, 10),
(79, 29, 11),
(80, 29, 12),
(81, 28, 5);

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `no_hp` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id`, `nama`, `alamat`, `no_hp`) VALUES
(16, 'dr. Aris Catur, Sp.DV', 'Jl. Simongan Raya', '081555666991'),
(17, 'dr. Ade Permana, Sp.OG-KFER', 'Jl. Mawar No.1', '085666333222'),
(18, 'dr. Achmad Chusnu Romdhoni, Sp.THT-KL', 'Jl. Gajah Raya No.10', '085134621696'),
(19, 'dr. Abdul Alim Rahimi, Sp.PD', 'Jl. Badal No. 4', '089556334126');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id` int(11) NOT NULL,
  `nama_obat` varbinary(50) NOT NULL,
  `kemasan` varchar(35) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id`, `nama_obat`, `kemasan`, `harga`) VALUES
(5, 0x416c6f707572696e6f6c207461626c657420313030206d67, 'ktk 10 x 10 tablet', 16000),
(6, 0x416d6c6f646970696e207461626c6574203130206d67, 'ktk 3 x 10 tablet', 8750),
(7, 0x476c696d657072696465207461626c65742031206d67, 'ktk 3 x 10 table', 30000),
(8, 0x49627570726f66656e207461626c657420343030206d67, 'kotak 10 x 10 tablet', 28000),
(9, 0x4b616c7369756d204c616b74617420284b616c6b29207461626c657420353030206d67, 'btl 1000 tablet', 69000),
(10, 0x4d6574666f726d696e2048434c207461626c657420353030206d67, 'ktk 10 x 10 tablet', 8000),
(11, 0x4f62617420426174756b20486974616d20284f2e422e48292063616972616e, 'btl 200 ml', 378000),
(12, 0x50617261736574616d6f6c207461626c657420353030206d67, 'ktk 10 x 10 tablet', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `no_hp` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id`, `nama`, `alamat`, `no_hp`) VALUES
(14, 'Agus Purnomo', 'Jl. Melati No.5', '08153245621'),
(15, 'Joko Susilo', 'Jl. Nangka No.4', '087512346749'),
(16, 'Bagas Maulana', 'Jl. Nilam Raya No.12', '087123456789');

-- --------------------------------------------------------

--
-- Table structure for table `periksa`
--

CREATE TABLE `periksa` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_dokter` int(10) UNSIGNED NOT NULL,
  `id_pasien` int(10) UNSIGNED NOT NULL,
  `tgl_periksa` datetime NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `periksa`
--

INSERT INTO `periksa` (`id`, `id_dokter`, `id_pasien`, `tgl_periksa`, `catatan`) VALUES
(28, 16, 14, '2023-12-29 16:06:00', 'pusing'),
(29, 19, 14, '2023-12-08 16:12:00', 'pusing dan batuk');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(8, 'widhi', '$2y$10$mqre7RsdobimUrbw4wtug.zXbAIt7Bz9q2oC9ylyE1Tv6ah2m1GLy'),
(9, 'widhibn', '$2y$10$L0HTMOrCGh1joa2084.cv.8SR/TOOgqokBBRTyWqE4JucWYf7I8ga'),
(10, 'widhi_bagus', '$2y$10$uCEON1Yx0ItabJDJwETDpeJNKmaFpMgB/lHwUMPtRSYvLlWRvtBeO'),
(12, 'bagus', '$2y$10$hFUwPLvvDKrR4LXTw6ov7.IJrrNT2655bOa3QKAwu8qNUUv7/adAG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_periksa`
--
ALTER TABLE `detail_periksa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `periksa`
--
ALTER TABLE `periksa`
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
-- AUTO_INCREMENT for table `detail_periksa`
--
ALTER TABLE `detail_periksa`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `periksa`
--
ALTER TABLE `periksa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
