-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2019 at 05:15 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbdeptech`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `kd_admin` int(11) NOT NULL,
  `nama_admin` varchar(50) DEFAULT NULL,
  `username_admin` varchar(50) DEFAULT NULL,
  `password_admin` varchar(256) DEFAULT NULL,
  `email_admin` varchar(50) DEFAULT NULL,
  `status_admin` int(11) DEFAULT NULL,
  `date_create_admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`kd_admin`, `nama_admin`, `username_admin`, `password_admin`, `email_admin`, `status_admin`, `date_create_admin`) VALUES
(1, 'bahyu sanciko', 'bahyu', '$2y$10$gXV2XtdP9f/zXtEwA6bd/.T6sr59Ybl2uAzEAfVs8gUkCrUD6RWGK', 'cbahyu@gmail.com', 1, 1554105936),
(2, 'admin admin', 'admin', '$2y$10$vrObvDwjX4ZnNUGn.w2xn.GGamkmoqqvp7ceKy1l.bDjqQTg.2yS6', 'admin@gmail.com', 1, 1554112151);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cuti`
--

CREATE TABLE `tbl_cuti` (
  `kd_cuti` int(11) NOT NULL,
  `kd_pegawai` int(11) DEFAULT NULL,
  `tgl_mulai_cuti` date DEFAULT NULL,
  `tgl_selesai_cuti` date DEFAULT NULL,
  `alasan_cuti` varchar(500) DEFAULT NULL,
  `status_cuti` int(11) DEFAULT NULL,
  `insertby_cuti` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cuti`
--

INSERT INTO `tbl_cuti` (`kd_cuti`, `kd_pegawai`, `tgl_mulai_cuti`, `tgl_selesai_cuti`, `alasan_cuti`, `status_cuti`, `insertby_cuti`) VALUES
(1, 1, '2019-04-01', '2019-04-06', 'Males mager', 1, 'bahyu'),
(2, 2, '2019-04-06', '2019-04-08', 'kdjsfk', 1, 'bahyu sanciko'),
(10, 2, '2019-04-07', '2019-04-07', 'sadas', 1, 'bahyu sanciko'),
(11, 2, '2019-04-08', '2019-04-08', 'dsa', 1, 'bahyu sanciko'),
(12, 3, '2019-04-07', '2019-04-09', 'mnm', 1, 'bahyu sanciko'),
(13, 3, '2019-04-28', '2019-04-29', 'mnn', 1, 'bahyu sanciko');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pegawai`
--

CREATE TABLE `tbl_pegawai` (
  `kd_pegawai` int(11) NOT NULL,
  `nama_pegawai` varchar(50) DEFAULT NULL,
  `email_pegawai` varchar(50) DEFAULT NULL,
  `no_hp_pegawai` int(13) DEFAULT NULL,
  `alamat_pegawai` varchar(100) DEFAULT NULL,
  `kelamin_pegawai` varchar(50) DEFAULT NULL,
  `date_create_pegawai` varchar(50) DEFAULT NULL,
  `insertby_pegawai` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pegawai`
--

INSERT INTO `tbl_pegawai` (`kd_pegawai`, `nama_pegawai`, `email_pegawai`, `no_hp_pegawai`, `alamat_pegawai`, `kelamin_pegawai`, `date_create_pegawai`, `insertby_pegawai`) VALUES
(1, 'Siti Hasuna', 'siti@gmail.com', 89666666, 'jl buntu', 'perempuan', '11', 'bahyu'),
(2, 'Bahyu Sanciko', 'bahyu@gmail.com', 5454516, ' jlnin aja', 'Laki-Laki', '1554110108', 'bahyu sanciko'),
(3, 'Sella Jdiatr', 'Cbahyu@gmailc.om', 2147483647, 'jlni aja ', 'Prempuan', '1554603070', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`kd_admin`);

--
-- Indexes for table `tbl_cuti`
--
ALTER TABLE `tbl_cuti`
  ADD PRIMARY KEY (`kd_cuti`);

--
-- Indexes for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  ADD PRIMARY KEY (`kd_pegawai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `kd_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_cuti`
--
ALTER TABLE `tbl_cuti`
  MODIFY `kd_cuti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  MODIFY `kd_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
