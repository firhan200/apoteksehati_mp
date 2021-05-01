-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2021 at 10:05 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_apotek_sehati_mp`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosis_obat`
--

CREATE TABLE `dosis_obat` (
  `id` int(11) NOT NULL,
  `obat_id` int(11) NOT NULL,
  `dosis` varchar(255) NOT NULL,
  `created_at` varchar(50) NOT NULL,
  `updated_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_obat`
--

CREATE TABLE `kategori_obat` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `created_at` varchar(50) NOT NULL,
  `updated_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `laboratorium`
--

CREATE TABLE `laboratorium` (
  `id` int(11) NOT NULL,
  `jenis_lab` varchar(255) NOT NULL,
  `created_at` varchar(50) NOT NULL,
  `updated_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id` int(11) NOT NULL,
  `kategori_obat_id` int(11) NOT NULL,
  `nama_obat` varchar(255) NOT NULL,
  `created_at` varchar(50) NOT NULL,
  `updated_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `no_rm` varchar(100) NOT NULL,
  `jenis_kelamin` smallint(1) NOT NULL COMMENT '0 = Pria, 1 = Wanita',
  `tanggal_lahir` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `faktor_resiko_cad` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id`, `nama`, `no_rm`, `jenis_kelamin`, `tanggal_lahir`, `alamat`, `faktor_resiko_cad`) VALUES
(6, 'john', 'RM-0001', 0, '04-07-1997', 'Cirebon Kota', 'Dislipidemia');

-- --------------------------------------------------------

--
-- Table structure for table `pasien_echo`
--

CREATE TABLE `pasien_echo` (
  `id` int(11) NOT NULL,
  `pasien_id` int(11) NOT NULL,
  `tanggal_echo` varchar(50) NOT NULL,
  `EF` varchar(255) NOT NULL,
  `EA` varchar(255) NOT NULL,
  `TAPSE` varchar(255) NOT NULL,
  `masalah_katup` varchar(255) NOT NULL,
  `hipertensi_plumonal` varchar(255) NOT NULL,
  `created_at` varchar(50) NOT NULL,
  `updated_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pasien_laboratorium`
--

CREATE TABLE `pasien_laboratorium` (
  `id` int(11) NOT NULL,
  `pasien_id` int(11) NOT NULL,
  `laboratorium_id` int(11) NOT NULL,
  `hasil_lab` varchar(255) NOT NULL,
  `tanggal_lab` varchar(50) NOT NULL,
  `created_at` varchar(50) NOT NULL,
  `updated_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pasien_obat`
--

CREATE TABLE `pasien_obat` (
  `id` int(11) NOT NULL,
  `pasien_id` int(11) NOT NULL,
  `dosis_obat_id` int(11) NOT NULL,
  `tanggal_diberikan` varchar(50) NOT NULL,
  `created_at` varchar(50) NOT NULL,
  `updated_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pasien_riwayat`
--

CREATE TABLE `pasien_riwayat` (
  `id` int(11) NOT NULL,
  `pasien_id` int(11) NOT NULL,
  `tanggal_masuk` varchar(50) NOT NULL,
  `alasan_dirawat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` smallint(1) NOT NULL,
  `created_at` varchar(50) NOT NULL,
  `updated_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`, `level`, `created_at`, `updated_at`) VALUES
(1, 'Asisten', 'asisten@email.com', '7069b8f529015bc8085b3374e90220bed9d5955d', 1, '2021-05-01 12:55:41', '2021-05-01 12:55:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosis_obat`
--
ALTER TABLE `dosis_obat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_obat`
--
ALTER TABLE `kategori_obat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laboratorium`
--
ALTER TABLE `laboratorium`
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
-- Indexes for table `pasien_echo`
--
ALTER TABLE `pasien_echo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasien_laboratorium`
--
ALTER TABLE `pasien_laboratorium`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasien_obat`
--
ALTER TABLE `pasien_obat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasien_riwayat`
--
ALTER TABLE `pasien_riwayat`
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
-- AUTO_INCREMENT for table `dosis_obat`
--
ALTER TABLE `dosis_obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori_obat`
--
ALTER TABLE `kategori_obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laboratorium`
--
ALTER TABLE `laboratorium`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pasien_echo`
--
ALTER TABLE `pasien_echo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pasien_laboratorium`
--
ALTER TABLE `pasien_laboratorium`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pasien_obat`
--
ALTER TABLE `pasien_obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pasien_riwayat`
--
ALTER TABLE `pasien_riwayat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
