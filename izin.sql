-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 05, 2021 at 07:53 AM
-- Server version: 5.7.24
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `izin`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(255) NOT NULL,
  `admin_nama` text NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` text NOT NULL,
  `admin_foto` varchar(255) NOT NULL DEFAULT 'cowok.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_nama`, `admin_email`, `admin_password`, `admin_foto`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin123', 'cowok.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_aktifitas`
--

CREATE TABLE `tbl_aktifitas` (
  `aktifitas_id` int(255) NOT NULL,
  `pengajuan_code` varchar(255) NOT NULL,
  `aktifitas_des` enum('diproses','diverifikasi','ditolak','direvisi','diterima','dipending') NOT NULL,
  `aktifitas_tgl` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_aktifitas`
--

INSERT INTO `tbl_aktifitas` (`aktifitas_id`, `pengajuan_code`, `aktifitas_des`, `aktifitas_tgl`) VALUES
(1, 'IIHCGR788S', 'diproses', '2020-10-02 21:43:50'),
(2, 'IIHCGR788S', 'dipending', '2020-10-02 16:46:51'),
(3, 'IIHCGR788S', 'direvisi', '2020-10-02 21:47:18'),
(4, 'IIHCGR788S', 'diterima', '2020-10-02 16:47:45'),
(5, '1N5CBFFP6J', 'diproses', '2020-10-11 13:50:28'),
(6, '1N5CBFFP6J', 'dipending', '2020-10-11 08:54:58'),
(7, '1N5CBFFP6J', 'direvisi', '2020-10-11 13:55:50'),
(8, '1N5CBFFP6J', 'diterima', '2020-10-11 08:56:37'),
(9, 'YITBKTHZV9', 'diproses', '2020-10-14 18:17:47'),
(10, 'YITBKTHZV9', 'dipending', '2020-10-14 13:22:56'),
(11, 'YITBKTHZV9', 'direvisi', '2020-10-14 18:24:39'),
(12, 'YITBKTHZV9', 'diterima', '2020-10-14 13:25:25'),
(13, 'GF0E43TJ0B', 'diproses', '2021-05-05 14:26:39');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_formulir`
--

CREATE TABLE `tbl_formulir` (
  `formulir_id` int(11) NOT NULL,
  `formulir_code` varchar(255) NOT NULL,
  `formulir_deskripsi` text NOT NULL,
  `formulir_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_formulir`
--

INSERT INTO `tbl_formulir` (`formulir_id`, `formulir_code`, `formulir_deskripsi`, `formulir_file`) VALUES
(3, 'BLT', 'BLT', '93521117_1830266870444135_4100897296059727872_o.jpg'),
(4, 'KIA', 'KIA', '93521117_1830266870444135_4100897296059727872_o_(2)1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pending`
--

CREATE TABLE `tbl_pending` (
  `pending_id` int(255) NOT NULL,
  `pending_ket` text NOT NULL,
  `pending_file` varchar(255) NOT NULL,
  `pengajuan_code` varchar(255) NOT NULL,
  `admin_id` int(255) NOT NULL,
  `pending_tgl` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengajuan`
--

CREATE TABLE `tbl_pengajuan` (
  `pengajuan_id` int(255) NOT NULL,
  `pengajuan_code` varchar(255) NOT NULL,
  `pengajuan_formulir` varchar(255) NOT NULL,
  `formulir_code` varchar(255) NOT NULL,
  `user_nik` varchar(255) NOT NULL,
  `pengajuan_tgl` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pengajuan_status` enum('diproses','diterima','ditolak','dipending') NOT NULL DEFAULT 'diproses'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengajuan`
--

INSERT INTO `tbl_pengajuan` (`pengajuan_id`, `pengajuan_code`, `pengajuan_formulir`, `formulir_code`, `user_nik`, `pengajuan_tgl`, `pengajuan_status`) VALUES
(13, 'IIHCGR788S', '93521117_1830266870444135_4100897296059727872_o_(1)1.jpg', 'BLT', '12121212121', '2020-10-02 21:47:18', 'diterima'),
(17, 'YITBKTHZV9', 'banner11_(1).png', 'BLT', '12121212121', '2020-10-14 18:24:39', 'diterima'),
(18, 'GF0E43TJ0B', 'img-01.jpg', 'BLT', '12121212121', '2021-05-05 14:26:39', 'diproses');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengajuan_detail`
--

CREATE TABLE `tbl_pengajuan_detail` (
  `detail_id` int(255) NOT NULL,
  `pengajuan_code` varchar(255) NOT NULL,
  `admin_id` int(255) NOT NULL,
  `detail_ket` text NOT NULL,
  `detail_file` varchar(255) NOT NULL,
  `detail_status` enum('ditolak','dipending','diterima') NOT NULL,
  `detail_tgl` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengajuan_detail`
--

INSERT INTO `tbl_pengajuan_detail` (`detail_id`, `pengajuan_code`, `admin_id`, `detail_ket`, `detail_file`, `detail_status`, `detail_tgl`) VALUES
(2, 'IIHCGR788S', 1, 'Silahkan ambil bantuan anda.', '', 'diterima', '2020-10-02 16:47:45'),
(6, 'YITBKTHZV9', 1, 'Silahkan ambil berkasnya di kantor pada Hari senin pukul 9 pagi.', '', 'diterima', '2020-10-14 13:25:25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penolakan`
--

CREATE TABLE `tbl_penolakan` (
  `penolakan_id` int(255) NOT NULL,
  `penolakan_ket` text NOT NULL,
  `penolakan_file` varchar(255) NOT NULL,
  `pengajuan_code` varchar(255) NOT NULL,
  `admin_id` int(255) NOT NULL,
  `penolakan_tgl` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(255) NOT NULL,
  `user_nik` varchar(255) NOT NULL,
  `user_nama` text NOT NULL,
  `user_tempat` varchar(255) NOT NULL,
  `user_tanggal` date NOT NULL,
  `user_alamat` text NOT NULL,
  `user_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `user_agama` varchar(255) NOT NULL,
  `user_status` varchar(255) NOT NULL,
  `user_pekerjaan` varchar(255) NOT NULL,
  `user_kebangsaan` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_nohp` varchar(255) NOT NULL,
  `user_password` text NOT NULL,
  `user_foto` varchar(255) NOT NULL DEFAULT 'cowok.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_nik`, `user_nama`, `user_tempat`, `user_tanggal`, `user_alamat`, `user_kelamin`, `user_agama`, `user_status`, `user_pekerjaan`, `user_kebangsaan`, `user_email`, `user_nohp`, `user_password`, `user_foto`) VALUES
(1, '12345', 'Updu Tech', 'Karawang', '1998-01-01', 'Bekasi', 'Laki-laki', 'Islam', 'Belum Kawin', 'Mahasiswa', 'Indonesia', 'updu.tech@gmail.com', '085155230104', 'updu123', 'cowok.png'),
(2, '12121212121', 'Eka', 'Medan', '2020-10-05', 'Kisaran', 'Perempuan', 'Yahudi', 'Kawin', 'Tukang', 'Indonesia', 'eka@gmail.com', '0823723232833', '12121212121', 'cewek.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_aktifitas`
--
ALTER TABLE `tbl_aktifitas`
  ADD PRIMARY KEY (`aktifitas_id`);

--
-- Indexes for table `tbl_formulir`
--
ALTER TABLE `tbl_formulir`
  ADD PRIMARY KEY (`formulir_id`);

--
-- Indexes for table `tbl_pending`
--
ALTER TABLE `tbl_pending`
  ADD PRIMARY KEY (`pending_id`);

--
-- Indexes for table `tbl_pengajuan`
--
ALTER TABLE `tbl_pengajuan`
  ADD PRIMARY KEY (`pengajuan_id`);

--
-- Indexes for table `tbl_pengajuan_detail`
--
ALTER TABLE `tbl_pengajuan_detail`
  ADD PRIMARY KEY (`detail_id`);

--
-- Indexes for table `tbl_penolakan`
--
ALTER TABLE `tbl_penolakan`
  ADD PRIMARY KEY (`penolakan_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_aktifitas`
--
ALTER TABLE `tbl_aktifitas`
  MODIFY `aktifitas_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_formulir`
--
ALTER TABLE `tbl_formulir`
  MODIFY `formulir_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_pending`
--
ALTER TABLE `tbl_pending`
  MODIFY `pending_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_pengajuan`
--
ALTER TABLE `tbl_pengajuan`
  MODIFY `pengajuan_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_pengajuan_detail`
--
ALTER TABLE `tbl_pengajuan_detail`
  MODIFY `detail_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_penolakan`
--
ALTER TABLE `tbl_penolakan`
  MODIFY `penolakan_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
