-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2022 at 07:19 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sikost`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_user` int(255) UNSIGNED NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tgl_masuk` date DEFAULT NULL,
  `foto_profile` varchar(255) NOT NULL,
  `asal_kampus` varchar(255) NOT NULL,
  `hak_akses` char(1) NOT NULL DEFAULT '1',
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_user`, `firstname`, `lastname`, `pass`, `username`, `no_hp`, `alamat`, `tgl_masuk`, `foto_profile`, `asal_kampus`, `hak_akses`, `status`) VALUES
(1, 'Abdullah', 'Ali', 'aab123', 'aab', '081233326540', 'Jl. Jawa No.48 Jember', NULL, '', 'Politeknik Negeri Jember', '0', ''),
(2, 'Dwi', 'Nafis', 'nafis123', 'Ucik Dika', '081233345678', 'Jl. Kebonsari', NULL, '', 'Politeknik Negeri Jember', '1', 'Aktif'),
(3, 'Fagil', 'Nuril', 'Fagnurl123', 'NurilNihSenggolDong', '081234469765', 'Jl. Kaliurang No. 38', NULL, '', 'Politeknik Negeri Jember', '1', 'Tidak Aktif'),
(4, 'Taufiq', 'Rahmadi', 'topek123', 'TaufiqRah', '', '', NULL, '', '', '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `barang_tambahan`
--

CREATE TABLE `barang_tambahan` (
  `id_barang` int(255) UNSIGNED NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `harga_tambahan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kamar`
--

CREATE TABLE `jenis_kamar` (
  `id_jenis_kamar` char(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_kamar`
--

INSERT INTO `jenis_kamar` (`id_jenis_kamar`, `keterangan`, `harga`) VALUES
('1', 'Kamar Mandi Dalam', '700000'),
('2', 'Kamar Mandi Luar', '500000');

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `no_kamar` char(255) NOT NULL,
  `id_user` int(255) UNSIGNED DEFAULT NULL,
  `id_jenis_kamar` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`no_kamar`, `id_user`, `id_jenis_kamar`) VALUES
('1', 2, '2'),
('10', 3, '2'),
('11', NULL, '2'),
('12', NULL, '2'),
('13', NULL, '2'),
('14', NULL, '2'),
('15', NULL, '2'),
('16', NULL, '2'),
('17', NULL, '2'),
('18', NULL, '2'),
('19', NULL, '2'),
('2', NULL, '2'),
('20', NULL, '2'),
('3', NULL, '2'),
('4', NULL, '2'),
('5', NULL, '2'),
('6', NULL, '2'),
('7', NULL, '2'),
('8', NULL, '2'),
('9', NULL, '2'),
('A', NULL, '1'),
('B', NULL, '1'),
('C', NULL, '1'),
('D', NULL, '1'),
('E', NULL, '1'),
('F', NULL, '1'),
('G', NULL, '1'),
('H', NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(255) UNSIGNED NOT NULL,
  `tgl_pembayaran` date NOT NULL,
  `foto_kuitansi` varchar(255) NOT NULL,
  `id_user` int(255) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_psn` int(255) UNSIGNED NOT NULL,
  `jenis_kamar_psn` varchar(255) NOT NULL,
  `no_kamar_psn` varchar(255) NOT NULL,
  `nama_psn` varchar(255) NOT NULL,
  `alamat_psn` varchar(255) NOT NULL,
  `no_hp_psn` varchar(255) NOT NULL,
  `lampiran_ktp_psn` varchar(255) NOT NULL,
  `tgl_psn` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_psn`, `jenis_kamar_psn`, `no_kamar_psn`, `nama_psn`, `alamat_psn`, `no_hp_psn`, `lampiran_ktp_psn`, `tgl_psn`) VALUES
(1, 'Kamar Mandi Dalam', 'D', 'Abdullah Ali', 'Jl. Jawa No.48 Jember', '081233326540', '', '2022-11-27'),
(2, 'Kamar Mandi Luar', '17', 'Andaokwdoa dwa', 'Jl. Jawa No.48 Jember', '081233326540', '', '2022-11-27'),
(3, 'Kamar Mandi Luar', '17', 'Andaokwdoa dwa', 'Jl. Jawa No.48 Jember', '081233326540', '', '2022-11-27'),
(4, 'Kamar Mandi Luar', '17', 'Andaokwdoa dwa', 'Jl. Jawa No.48 Jember', '081233326540', '', '2022-11-27'),
(5, 'Kamar Mandi Luar', '17', 'Andaokwdoa dwa', 'Jl. Jawa No.48 Jember', '081233326540', '', '2022-11-27'),
(6, 'Kamar Mandi Luar', '17', 'Andaokwdoa dwa', 'Jl. Jawa No.48 Jember', '081233326540', '', '2022-11-27'),
(7, 'Kamar Mandi Luar', '17', 'Andaokwdoa dwa', 'Jl. Jawa No.48 Jember', '081233326540', '', '2022-11-27'),
(8, 'Kamar Mandi Dalam', '15', 'Test', 'Jl. Jawa No.48 Jember', '081233326540', '', '2022-11-27');

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pgd` int(255) UNSIGNED NOT NULL,
  `nama_pgd` varchar(255) NOT NULL,
  `no_kamar_pgd` varchar(255) NOT NULL,
  `isi_pgd` varchar(255) NOT NULL,
  `lampiran_pgd` varchar(255) NOT NULL,
  `judul_pgd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rincian_barang`
--

CREATE TABLE `rincian_barang` (
  `jumlah` varchar(255) NOT NULL,
  `id_user` int(255) UNSIGNED NOT NULL,
  `id_barang` int(255) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `barang_tambahan`
--
ALTER TABLE `barang_tambahan`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `jenis_kamar`
--
ALTER TABLE `jenis_kamar`
  ADD PRIMARY KEY (`id_jenis_kamar`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`no_kamar`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_jenis_kamar` (`id_jenis_kamar`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_psn`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pgd`);

--
-- Indexes for table `rincian_barang`
--
ALTER TABLE `rincian_barang`
  ADD PRIMARY KEY (`id_user`,`id_barang`),
  ADD KEY `id_barang` (`id_barang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id_user` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `barang_tambahan`
--
ALTER TABLE `barang_tambahan`
  MODIFY `id_barang` int(255) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(255) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_psn` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pgd` int(255) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kamar`
--
ALTER TABLE `kamar`
  ADD CONSTRAINT `kamar_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `akun` (`id_user`),
  ADD CONSTRAINT `kamar_ibfk_2` FOREIGN KEY (`id_jenis_kamar`) REFERENCES `jenis_kamar` (`id_jenis_kamar`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `akun` (`id_user`);

--
-- Constraints for table `rincian_barang`
--
ALTER TABLE `rincian_barang`
  ADD CONSTRAINT `rincian_barang_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `akun` (`id_user`),
  ADD CONSTRAINT `rincian_barang_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang_tambahan` (`id_barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
