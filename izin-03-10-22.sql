-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2021 at 04:54 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(1, 'Admin', 'admin@gmail.com', 'copascat', 'cowok.png'),
(2, 'Admin 2', 'deni.w4f@gmail.com', 'k5j67k2i', 'cowok.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_aktifitas`
--

CREATE TABLE `tbl_aktifitas` (
  `aktifitas_id` int(255) NOT NULL,
  `pengajuan_code` varchar(255) NOT NULL,
  `aktifitas_des` enum('diproses','diverifikasi','ditolak','direvisi','diterima','dipending') NOT NULL,
  `aktifitas_tgl` datetime NOT NULL DEFAULT current_timestamp()
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
(13, 'GF0E43TJ0B', 'diproses', '2021-05-05 14:26:39'),
(14, '2NANNR6Y2G', 'diproses', '2021-09-22 18:48:19'),
(15, 'GF0E43TJ0B', 'ditolak', '2021-09-22 13:49:01'),
(16, 'VTK4M7S7N7', 'diproses', '2021-10-03 19:17:38'),
(17, 'GFD49CJEJP', 'diproses', '2021-10-03 19:36:23'),
(18, 'TQWTKB05LI', 'diproses', '2021-10-03 20:06:19'),
(19, 'L75NT71N8N', 'diproses', '2021-10-03 20:07:16'),
(20, '2NANNR6Y2G', 'dipending', '2021-10-03 15:08:46'),
(21, 'VTK4M7S7N7', 'diterima', '2021-10-03 15:09:32'),
(22, 'VTK4M7S7N7', 'diterima', '2021-10-03 15:10:16'),
(23, 'R8FI8WV80K', 'diproses', '2021-10-03 20:10:47'),
(24, '497TI4O5YU', 'diproses', '2021-10-03 20:15:09'),
(25, '9TTIS9UY2W', 'diproses', '2021-10-03 20:15:19'),
(26, 'L9AN5FQ0LC', 'diproses', '2021-10-03 20:15:32'),
(27, 'R3U0V8QQI2', 'diproses', '2021-10-03 20:15:38'),
(28, 'GFD49CJEJP', 'dipending', '2021-10-03 15:16:41'),
(29, 'TA938LJXJF', 'diproses', '2021-10-03 20:17:11'),
(30, '81UDUES9VK', 'diproses', '2021-10-03 20:18:42'),
(31, 'CQZ3PZPGRP', 'diproses', '2021-10-03 20:26:18'),
(32, 'Z9P7KYN1CF', 'diproses', '2021-10-03 20:26:53'),
(33, '38Y1WXBIRK', 'diproses', '2021-10-03 20:26:59'),
(34, 'JVFSA79VMB', 'diproses', '2021-10-03 20:50:58'),
(35, 'JVFSA79VMB', 'diterima', '2021-10-03 16:00:24'),
(36, '2XMCPKR6DN', 'diproses', '2021-10-03 21:17:20'),
(37, 'U8KIFBIM6U', 'diproses', '2021-10-03 21:18:05'),
(38, 'Y9JGBOTA5V', 'diproses', '2021-10-03 21:20:31'),
(39, 'VGTPZKHYSH', 'diproses', '2021-10-03 21:20:42'),
(40, 'TIPYQBMIPV', 'diproses', '2021-10-03 21:22:20'),
(41, 'HSD3MG7DFB', 'diproses', '2021-10-03 21:22:27'),
(42, 'PK8YS340IC', 'diproses', '2021-10-03 21:22:32'),
(43, '32JIFLVD00', 'diproses', '2021-10-03 21:22:44'),
(44, '2XMCPKR6DN', 'dipending', '2021-10-03 16:23:15'),
(45, '8VOCHFJKW4', 'diproses', '2021-10-03 21:23:22'),
(46, '8V6VMF12GN', 'diproses', '2021-10-03 21:24:04'),
(47, 'MZFYDH8RBH', 'diproses', '2021-10-03 21:24:17'),
(48, '1N0E976RYP', 'diproses', '2021-10-03 21:34:13'),
(49, 'IKH4Q8ISYB', 'diproses', '2021-10-03 21:34:20'),
(50, 'JFEKAGY6H8', 'diproses', '2021-10-03 21:34:26'),
(51, 'CAFPKORVK7', 'diproses', '2021-10-03 21:34:34'),
(52, '2XKOZQR1C3', 'diproses', '2021-10-03 21:34:50'),
(53, '3VEP9RO978', 'diproses', '2021-10-03 21:35:32'),
(54, 'U8KIFBIM6U', 'ditolak', '2021-10-03 16:36:37'),
(55, '6IW47EZN4F', 'diproses', '2021-10-03 21:36:43'),
(56, '61FC7MU95P', 'diproses', '2021-10-03 21:36:46'),
(57, '56MOZ4IMTG', 'diproses', '2021-10-03 21:37:09'),
(58, 'XSY5T90HR2', 'diproses', '2021-10-03 21:37:34'),
(59, 'VGTPZKHYSH', 'diterima', '2021-10-03 16:38:18'),
(60, 'AXUMVXVS3T', 'diproses', '2021-10-03 21:38:50'),
(61, '9CZKWTSMCN', 'diproses', '2021-10-03 21:50:24');

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
(5, 'KIS', 'KIS', 'KIS.jpeg'),
(6, 'KIP', 'KIP', 'KIP.jpeg'),
(7, 'JAMPERSAL', 'JAMPERSAL', 'JAMPERSAL.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kecamatan`
--

CREATE TABLE `tbl_kecamatan` (
  `kecamatan_id` int(11) NOT NULL,
  `kode_kecamatan` varchar(255) NOT NULL,
  `nama_kecamatan` varchar(255) NOT NULL,
  `photo_kecamatan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kecamatan`
--

INSERT INTO `tbl_kecamatan` (`kecamatan_id`, `kode_kecamatan`, `nama_kecamatan`, `photo_kecamatan`) VALUES
(1, 'KEC001', 'Kecamatan Padang Sidempuan Angkola Julu', 'Logo_Binamadani1.jpg'),
(2, 'KEC002', 'Kecamatan Padang Sidempuan Batunadua', 'Anonimous7.jpg'),
(3, 'KEC003', 'Kecamatan Padang Sidempuan Hutaimbaru', 'Logo_Binamadani2.jpg'),
(4, 'KEC004', 'Kecamatan Padang Sidempuan Selatan', 'Logo_Binamadani3.jpg'),
(5, 'KEC005', 'Kecamatan Padang Sidempuan Tenggara', 'Logo_Binamadani4.jpg'),
(6, 'KEC006', 'Kecamatan Padang Sidempuan Utara ', 'Logo_Binamadani5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kelurahan`
--

CREATE TABLE `tbl_kelurahan` (
  `kelurahan_id` int(11) NOT NULL,
  `kode_kelurahan` varchar(255) DEFAULT NULL,
  `nama_kelurahan` varchar(255) DEFAULT NULL,
  `nama_kecamatan` varchar(255) DEFAULT NULL,
  `photo_kelurahan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `pengajuan_tgl` datetime NOT NULL DEFAULT current_timestamp(),
  `pengajuan_status` enum('diproses','diterima','ditolak','dipending') NOT NULL DEFAULT 'diproses',
  `pemohon_nik` varchar(255) NOT NULL,
  `pemohon_nama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengajuan`
--

INSERT INTO `tbl_pengajuan` (`pengajuan_id`, `pengajuan_code`, `pengajuan_formulir`, `formulir_code`, `user_nik`, `pengajuan_tgl`, `pengajuan_status`, `pemohon_nik`, `pemohon_nama`) VALUES
(31, '9CZKWTSMCN', 'FORM_KIS13.docx', 'JAMPERSAL', '123', '2021-10-03 21:50:24', 'diproses', '123454321234', 'Jabat Siregar');

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
  `detail_tgl` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `penolakan_tgl` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(255) NOT NULL,
  `user_nik` varchar(255) NOT NULL,
  `user_instansi` varchar(255) NOT NULL,
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

INSERT INTO `tbl_user` (`user_id`, `user_nik`, `user_instansi`, `user_nama`, `user_tempat`, `user_tanggal`, `user_alamat`, `user_kelamin`, `user_agama`, `user_status`, `user_pekerjaan`, `user_kebangsaan`, `user_email`, `user_nohp`, `user_password`, `user_foto`) VALUES
(1, '12345', '', 'Updu Tech', 'Karawang', '1998-01-01', 'Bekasi', 'Laki-laki', 'Islam', 'Belum Kawin', 'Mahasiswa', 'Indonesia', 'updu.tech@gmail.com', '085155230104', '123', 'cowok.png'),
(2, '123', '', 'Eka', 'Medan', '2020-10-05', 'Kisaran', 'Perempuan', 'Yahudi', 'Kawin', 'Tukang', 'Indonesia', 'eka@gmail.com', '0823723232833', '123', 'cewek.png'),
(4, '3603182606940001', 'Kel. 1', 'Deni Suryadi', 'Sumedang', '1994-06-26', 'Jl. Kemenangan, Kp. Balong No.22A RT.06/RW.11\r\nBojonggede, Kec. Bojong Gede, Bogor, Jawa Barat', 'Laki-laki', 'Islam', 'Belum Menikah', 'Programmer', 'WNI', 'deni.w4f@gmail.com', '08551607171', 'k5j67k2i', 'cowok.png'),
(5, '123', 'Kel. 1', 'tes', 'asd', '2020-10-05', 'Jl. Kemenangan, Kp. Balong No.22A RT.06/RW.11\r\nBojonggede, Kec. Bojong Gede, Bogor, Jawa Barat', 'Laki-laki', 'Islam', 'Kawin', 'asd', 'WNI', 'deni.w4f@gmail.com', '08551607171', '123', 'cowok.png');

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
-- Indexes for table `tbl_kecamatan`
--
ALTER TABLE `tbl_kecamatan`
  ADD PRIMARY KEY (`kecamatan_id`);

--
-- Indexes for table `tbl_kelurahan`
--
ALTER TABLE `tbl_kelurahan`
  ADD PRIMARY KEY (`kelurahan_id`);

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
  MODIFY `admin_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_aktifitas`
--
ALTER TABLE `tbl_aktifitas`
  MODIFY `aktifitas_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `tbl_formulir`
--
ALTER TABLE `tbl_formulir`
  MODIFY `formulir_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_kecamatan`
--
ALTER TABLE `tbl_kecamatan`
  MODIFY `kecamatan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_kelurahan`
--
ALTER TABLE `tbl_kelurahan`
  MODIFY `kelurahan_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_pending`
--
ALTER TABLE `tbl_pending`
  MODIFY `pending_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_pengajuan`
--
ALTER TABLE `tbl_pengajuan`
  MODIFY `pengajuan_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_pengajuan_detail`
--
ALTER TABLE `tbl_pengajuan_detail`
  MODIFY `detail_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_penolakan`
--
ALTER TABLE `tbl_penolakan`
  MODIFY `penolakan_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
