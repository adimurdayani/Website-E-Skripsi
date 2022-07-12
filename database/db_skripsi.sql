-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2021 at 11:12 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_skripsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_akses_menu`
--

CREATE TABLE `tb_akses_menu` (
  `id_akses` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_akses_menu`
--

INSERT INTO `tb_akses_menu` (`id_akses`, `user_id`, `menu_id`) VALUES
(1, 1, 1),
(4, 1, 4),
(5, 1, 5),
(6, 2, 2),
(7, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_grup`
--

CREATE TABLE `tb_grup` (
  `user_id` int(11) NOT NULL,
  `nama_grup` varchar(123) NOT NULL,
  `created_at` varchar(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_grup`
--

INSERT INTO `tb_grup` (`user_id`, `nama_grup`, `created_at`) VALUES
(1, 'Administrator', '27 Aug 2021'),
(2, 'Admin', '27 Aug 2021'),
(3, 'User', '04 Sep 2021');

-- --------------------------------------------------------

--
-- Table structure for table `tb_judul`
--

CREATE TABLE `tb_judul` (
  `id` int(11) NOT NULL,
  `id_tema` int(11) NOT NULL,
  `is_active` varchar(123) NOT NULL,
  `nim` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `no_hp` int(12) NOT NULL,
  `email` varchar(128) NOT NULL,
  `kelamin` varchar(128) NOT NULL,
  `jurusan` varchar(128) NOT NULL,
  `konsentrasi` int(11) NOT NULL,
  `judul` varchar(190) NOT NULL,
  `pem_satu` int(11) NOT NULL,
  `pem_dua` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_konsentrasi`
--

CREATE TABLE `tb_konsentrasi` (
  `id` int(11) NOT NULL,
  `nama_kons` varchar(128) NOT NULL,
  `created_at` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_konsentrasi`
--

INSERT INTO `tb_konsentrasi` (`id`, `nama_kons`, `created_at`) VALUES
(1, 'Sistem Informasi Geografis (SIG)', '03 Sep 2021'),
(2, 'Jaringan', '03 Sep 2021'),
(3, 'Desain Web', '03 Sep 2021'),
(4, 'Multimedia', '03 Sep 2021'),
(5, 'Rekayasa Perangkat Lunak (RPL)', '03 Sep 2021');

-- --------------------------------------------------------

--
-- Table structure for table `tb_menu`
--

CREATE TABLE `tb_menu` (
  `id_menu` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_menu`
--

INSERT INTO `tb_menu` (`id_menu`, `menu`) VALUES
(1, 'Admin'),
(2, 'Modul'),
(3, 'User'),
(4, 'Menu'),
(5, 'Setting');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembimbing`
--

CREATE TABLE `tb_pembimbing` (
  `id_pem` int(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `nama_pem` varchar(128) NOT NULL,
  `created_at` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pembimbing`
--

INSERT INTO `tb_pembimbing` (`id_pem`, `nip`, `nama_pem`, `created_at`) VALUES
(1, 913038604, 'Abdul Zahir', '03 Sep 2021');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sub_menu`
--

CREATE TABLE `tb_sub_menu` (
  `sub_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_sub_menu`
--

INSERT INTO `tb_sub_menu` (`sub_id`, `menu_id`, `judul`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'backend/admin', 'feather icon-home', 1),
(2, 3, 'Profile', 'backend/user', 'feather icon-user', 1),
(3, 4, 'Menu Manajemen', 'backend/menu', 'feather icon-folder', 1),
(4, 4, 'Sub Menu Manajemen', 'backend/menu/submenu', 'feather icon-file', 1),
(5, 5, 'Users Manajemen', 'backend/setting', 'feather icon-users', 1),
(6, 5, 'User Grup', 'backend/setting/grup', 'feather icon-settings', 1),
(7, 2, 'Data Judul', 'backend/modul', 'feather icon-book', 1),
(8, 2, 'Data Tema', 'backend/modul/tema', 'feather icon-list', 1),
(9, 2, 'Data Konsentrasi', 'backend/modul/konsentrasi', 'feather icon-bookmark', 1),
(11, 2, 'Data Pembimbing', 'backend/modul/pembimbing', 'feather icon-users', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_tema`
--

CREATE TABLE `tb_tema` (
  `id_tema` int(11) NOT NULL,
  `id_konsentrasi` int(11) NOT NULL,
  `tema` varchar(128) NOT NULL,
  `created_at` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_tema`
--

INSERT INTO `tb_tema` (`id_tema`, `id_konsentrasi`, `tema`, `created_at`) VALUES
(1, 1, 'Pemetaan Daerah Rawan Bencana', '03 Sep 2021'),
(2, 1, 'Pemetaan Fasilitas', '03 Sep 2021'),
(3, 1, 'Pemetaan Resiko dan Sumber Daya Alam', '03 Sep 2021'),
(4, 1, 'Sistem Manajemen Resiko dan Dukungan Dalam Mitigasi Bencana', '03 Sep 2021');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_active` int(1) NOT NULL,
  `nama` varchar(123) NOT NULL,
  `email` varchar(153) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` varchar(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `user_id`, `user_active`, `nama`, `email`, `username`, `password`, `created_at`) VALUES
(2, 1, 1, 'Administrator', 'admin@gmail.com', 'admin', 'b37741dad7e325cd739bdecdf50d028b72ee4fe6', '04 Sep 2021'),
(3, 2, 1, 'Admin', 'admin2@gmail.com', 'admin1', '2827168b65f18e23b9a2183a937236a1501e91fd', '04 Sep 2021'),
(4, 2, 1, 'Adi', 'username@gmail.com', 'username', 'e81afcb069f1c7b5e18f509d51e5022180f79b9e', '04 Sep 2021'),
(13, 3, 1, 'Adi Murdayani', 'adimurdayani@gmail.com', 'adimurdayani', '538ccb720c36e5991c7cbe07092497e56100869c', '04 Sep 2021'),
(14, 3, 1, 'Jepri Toni', 'jepri@gmail.com', 'jepritoni', 'd07830f4a53c19e025292daec4a6926cfe7e335f', '11 Sep 2021 15:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_akses_menu`
--
ALTER TABLE `tb_akses_menu`
  ADD PRIMARY KEY (`id_akses`);

--
-- Indexes for table `tb_grup`
--
ALTER TABLE `tb_grup`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tb_judul`
--
ALTER TABLE `tb_judul`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_konsentrasi`
--
ALTER TABLE `tb_konsentrasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_menu`
--
ALTER TABLE `tb_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `tb_pembimbing`
--
ALTER TABLE `tb_pembimbing`
  ADD PRIMARY KEY (`id_pem`);

--
-- Indexes for table `tb_sub_menu`
--
ALTER TABLE `tb_sub_menu`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `tb_tema`
--
ALTER TABLE `tb_tema`
  ADD PRIMARY KEY (`id_tema`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_akses_menu`
--
ALTER TABLE `tb_akses_menu`
  MODIFY `id_akses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_grup`
--
ALTER TABLE `tb_grup`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_judul`
--
ALTER TABLE `tb_judul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_konsentrasi`
--
ALTER TABLE `tb_konsentrasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_menu`
--
ALTER TABLE `tb_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_pembimbing`
--
ALTER TABLE `tb_pembimbing`
  MODIFY `id_pem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_sub_menu`
--
ALTER TABLE `tb_sub_menu`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_tema`
--
ALTER TABLE `tb_tema`
  MODIFY `id_tema` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
