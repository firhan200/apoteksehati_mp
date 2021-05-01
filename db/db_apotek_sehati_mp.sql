-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2021 at 03:03 PM
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

--
-- Dumping data for table `dosis_obat`
--

INSERT INTO `dosis_obat` (`id`, `obat_id`, `dosis`, `created_at`, `updated_at`) VALUES
(4, 4, '4 mg', '2021-05-01 16:57:02', '2021-05-01 16:57:02'),
(5, 4, '8 mg', '2021-05-01 16:57:07', '2021-05-01 16:57:07'),
(6, 4, '16 mg', '2021-05-01 16:57:12', '2021-05-01 16:57:12'),
(13, 7, '10', '2021-05-01 17:06:32', '2021-05-01 19:56:48'),
(14, 7, '2,5', '2021-05-01 17:06:37', '2021-05-01 19:56:51'),
(15, 7, '5', '2021-05-01 17:06:43', '2021-05-01 19:56:53'),
(16, 1, '2,5', '2021-05-01 19:57:04', '2021-05-01 19:57:04'),
(17, 1, '5', '2021-05-01 19:57:06', '2021-05-01 19:57:06'),
(18, 1, '10', '2021-05-01 19:57:09', '2021-05-01 19:57:09'),
(19, 8, '1,25', '2021-05-01 19:57:36', '2021-05-01 19:57:36'),
(20, 8, '2,5', '2021-05-01 19:57:41', '2021-05-01 19:57:41'),
(21, 8, '5', '2021-05-01 19:57:43', '2021-05-01 19:57:43'),
(22, 8, '10', '2021-05-01 19:57:47', '2021-05-01 19:57:47'),
(23, 9, '6,25', '2021-05-01 19:58:04', '2021-05-01 19:58:04'),
(24, 9, '12,5', '2021-05-01 19:58:09', '2021-05-01 19:58:09'),
(25, 9, '25', '2021-05-01 19:58:13', '2021-05-01 19:58:13'),
(26, 10, '80', '2021-05-01 19:58:52', '2021-05-01 19:58:52'),
(27, 10, '160', '2021-05-01 19:58:55', '2021-05-01 19:58:55'),
(28, 11, '150', '2021-05-01 19:59:42', '2021-05-01 19:59:42'),
(29, 11, '300', '2021-05-01 19:59:45', '2021-05-01 19:59:45'),
(30, 12, '25', '2021-05-01 20:00:15', '2021-05-01 20:00:15'),
(31, 12, '100', '2021-05-01 20:00:19', '2021-05-01 20:00:19'),
(32, 12, '50', '2021-05-01 20:00:24', '2021-05-01 20:00:24'),
(33, 12, '200', '2021-05-01 20:00:26', '2021-05-01 20:00:26'),
(34, 15, '12,5', '2021-05-01 20:00:46', '2021-05-01 20:00:46'),
(35, 15, '25', '2021-05-01 20:00:51', '2021-05-01 20:00:51'),
(36, 15, '50', '2021-05-01 20:00:53', '2021-05-01 20:00:53'),
(37, 15, '100', '2021-05-01 20:00:56', '2021-05-01 20:00:56'),
(38, 16, '10', '2021-05-01 20:01:20', '2021-05-01 20:01:20'),
(39, 17, '10', '2021-05-01 20:01:38', '2021-05-01 20:01:38'),
(40, 18, '20', '2021-05-01 20:01:57', '2021-05-01 20:01:57'),
(41, 18, '40', '2021-05-01 20:02:00', '2021-05-01 20:02:00'),
(42, 18, '60', '2021-05-01 20:02:03', '2021-05-01 20:02:03'),
(43, 18, '80', '2021-05-01 20:02:06', '2021-05-01 20:02:06'),
(44, 18, '120', '2021-05-01 20:02:11', '2021-05-01 20:02:11'),
(45, 19, '2,5', '2021-05-01 20:02:42', '2021-05-01 20:02:42'),
(46, 19, '5', '2021-05-01 20:02:44', '2021-05-01 20:02:44'),
(47, 20, '0,125', '2021-05-01 20:02:59', '2021-05-01 20:02:59'),
(48, 20, '0,25', '2021-05-01 20:03:05', '2021-05-01 20:03:05');

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

--
-- Dumping data for table `kategori_obat`
--

INSERT INTO `kategori_obat` (`id`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(2, 'ACE INHIBITOR', '2021-05-01 16:24:43', '2021-05-01 16:24:43'),
(3, 'BETA BLOCKER', '2021-05-01 16:24:51', '2021-05-01 16:24:51'),
(4, 'ARB', '2021-05-01 16:24:58', '2021-05-01 16:24:58'),
(5, 'ARNI', '2021-05-01 16:25:07', '2021-05-01 16:25:07'),
(6, 'MRA', '2021-05-01 16:25:12', '2021-05-01 16:25:12'),
(8, 'DIURETIK', '2021-05-01 16:25:26', '2021-05-01 16:25:26'),
(9, 'DIGOXIN', '2021-05-01 16:25:32', '2021-05-01 16:25:32'),
(10, 'SGLT2i', '2021-05-01 20:01:07', '2021-05-01 20:01:07'),
(11, 'FUNNY CHANNEL INH', '2021-05-01 20:02:28', '2021-05-01 20:02:28');

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

--
-- Dumping data for table `laboratorium`
--

INSERT INTO `laboratorium` (`id`, `jenis_lab`, `created_at`, `updated_at`) VALUES
(1, 'GULA DARAH', '2021-05-01 17:12:02', '2021-05-01 17:14:55'),
(3, 'UREUM', '2021-05-01 17:15:33', '2021-05-01 17:15:33'),
(4, 'CREATININ', '2021-05-01 19:55:19', '2021-05-01 19:55:19'),
(5, 'estimated GFR', '2021-05-01 19:55:25', '2021-05-01 19:55:25'),
(6, 'Hb', '2021-05-01 19:55:30', '2021-05-01 19:55:30');

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

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id`, `kategori_obat_id`, `nama_obat`, `created_at`, `updated_at`) VALUES
(1, 2, 'RAMIPRIL', '2021-05-01 16:38:33', '2021-05-01 16:38:33'),
(4, 4, 'CANDESARTAN', '2021-05-01 16:56:51', '2021-05-01 16:56:51'),
(7, 2, 'LISINOPRIL', '2021-05-01 17:06:14', '2021-05-01 17:06:14'),
(8, 3, 'BISOPROLOL', '2021-05-01 19:57:27', '2021-05-01 19:57:27'),
(9, 3, 'CARVEDILOL', '2021-05-01 19:57:55', '2021-05-01 19:57:55'),
(10, 4, 'VALSARTAN', '2021-05-01 19:58:47', '2021-05-01 19:58:47'),
(11, 4, 'IRBESARTAN', '2021-05-01 19:59:35', '2021-05-01 19:59:35'),
(12, 5, 'UPERIO', '2021-05-01 20:00:01', '2021-05-01 20:00:01'),
(15, 6, 'SPIRONOLACTONE', '2021-05-01 20:00:40', '2021-05-01 20:00:40'),
(16, 10, 'EMPAGLIFLOZIN', '2021-05-01 20:01:14', '2021-05-01 20:01:14'),
(17, 10, 'DAPAGLIFLOZIN', '2021-05-01 20:01:33', '2021-05-01 20:01:33'),
(18, 8, 'FUROSEMIDE', '2021-05-01 20:01:50', '2021-05-01 20:01:50'),
(19, 11, 'CORALAN', '2021-05-01 20:02:35', '2021-05-01 20:02:35'),
(20, 9, 'DIGOXIN', '2021-05-01 20:02:52', '2021-05-01 20:02:52');

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
(7, 'John Doe', 'RM-0001', 0, '08-04-1988', 'Cirebon Kota', 'Hipertensi');

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

--
-- Dumping data for table `pasien_echo`
--

INSERT INTO `pasien_echo` (`id`, `pasien_id`, `tanggal_echo`, `EF`, `EA`, `TAPSE`, `masalah_katup`, `hipertensi_plumonal`, `created_at`, `updated_at`) VALUES
(3, 7, '01-05-2021', '25', '>1', '0.23', '', 'YA', '2021-05-01 19:55:59', '2021-05-01 19:55:59');

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

--
-- Dumping data for table `pasien_laboratorium`
--

INSERT INTO `pasien_laboratorium` (`id`, `pasien_id`, `laboratorium_id`, `hasil_lab`, `tanggal_lab`, `created_at`, `updated_at`) VALUES
(5, 7, 5, '', '01-05-2021', '2021-05-01 19:55:39', '2021-05-01 19:55:39'),
(6, 7, 4, '', '01-05-2021', '2021-05-01 19:55:46', '2021-05-01 19:55:46');

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

--
-- Dumping data for table `pasien_riwayat`
--

INSERT INTO `pasien_riwayat` (`id`, `pasien_id`, `tanggal_masuk`, `alasan_dirawat`) VALUES
(8, 7, '01-05-2021', 'Sakit Kepala');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `kategori_obat`
--
ALTER TABLE `kategori_obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `laboratorium`
--
ALTER TABLE `laboratorium`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pasien_echo`
--
ALTER TABLE `pasien_echo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pasien_laboratorium`
--
ALTER TABLE `pasien_laboratorium`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pasien_obat`
--
ALTER TABLE `pasien_obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pasien_riwayat`
--
ALTER TABLE `pasien_riwayat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
