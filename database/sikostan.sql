-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2022 at 04:30 AM
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
-- Database: `sikostan`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_user` int(255) UNSIGNED NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tgl_masuk` date DEFAULT NULL,
  `foto_profile` varchar(255) NOT NULL,
  `asal_kampus` varchar(255) NOT NULL,
  `hak_akses` char(1) NOT NULL DEFAULT '1',
  `no_kamar` char(255) NOT NULL DEFAULT 'Kosong',
  `status` enum('Aktif','Tidak Aktif') NOT NULL DEFAULT 'Tidak Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_user`, `firstname`, `lastname`, `username`, `pass`, `no_hp`, `alamat`, `tgl_masuk`, `foto_profile`, `asal_kampus`, `hak_akses`, `no_kamar`, `status`) VALUES
(0, '', '', '', '', '', '', '0000-00-00', '', '', '', 'Kosong', 'Tidak Aktif'),
(9, 'Abdullah', 'Ali', 'aab', '202cb962ac59075b964b07152d234b70', '08896748326', 'Jl. Jawa No.48', '2022-12-08', 'photo-1529665253569-6d01c0eaf7b6.jpeg', '', '0', 'Kosong', 'Tidak Aktif'),
(10, 'Brenda', 'Friesen', 'fompeo', 'pfomek', '081277765987', '776 Gordon Flats', '2022-12-09', '', 'UNEJ', '1', 'Kosong', 'Aktif'),
(12, 'Ayudia', 'Azkia', 'Azkia', '$2y$10$IXXMJAC8n2ZPDJubG5uTY.bMu.emeQd1dFuIXeFK1pY0PUPgqr6wm', '081299988765', '98531 Rowland Land', '2022-11-16', '', 'Morar - Wilkinson', '1', 'Kosong', 'Aktif'),
(14, 'Sintyah', 'Minasa', 'cisa', 'cisa123', '081988769879', 'Jl. Panjaitan No.29 Jember', '2022-12-08', '', 'UNEJ', '1', 'Kosong', 'Aktif'),
(18, 'Aryanna', 'Kirlin', 'Annkir', '202cb962ac59075b964b07152d234b70', '081299876549', '592 Mann Valley', '2022-11-29', '4e9f035d05faeb0561835197a51a51f5.jpg', '', '0', 'Kosong', 'Tidak Aktif'),
(24, 'Violette', 'Stracke', 'Alyson', '202cb962ac59075b964b07152d234b70', '0812998765', '297 Heller Views', '2022-11-29', '', '', '0', 'Kosong', 'Tidak Aktif');

--
-- Triggers `akun`
--
DELIMITER $$
CREATE TRIGGER `rubah_status_kamar_kosong` AFTER UPDATE ON `akun` FOR EACH ROW BEGIN
UPDATE kamar SET status_kmr = 'Kosong' WHERE old.no_kamar = kamar.no_kamar;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `rubah_status_kamar_terisi` AFTER UPDATE ON `akun` FOR EACH ROW BEGIN
UPDATE kamar SET status_kmr = 'Terisi' WHERE new.no_kamar = kamar.no_kamar AND no_kamar NOT IN('Kosong');
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `barang_tambahan`
--

CREATE TABLE `barang_tambahan` (
  `id_barang` int(255) UNSIGNED NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `harga_barang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang_tambahan`
--

INSERT INTO `barang_tambahan` (`id_barang`, `nama_barang`, `harga_barang`) VALUES
(1, 'Komputer', '40000'),
(2, 'Televisi', '25000'),
(3, 'Kipas Angin', '25000'),
(4, 'Hair Dryer', '25000'),
(5, 'Dispenser', '50000'),
(6, 'Oven Listrik', '50000'),
(7, 'Kompor Listrik', '50000'),
(8, 'Bread Toaster', '25000'),
(9, 'Juicer', '25000'),
(10, 'Coffe Maker', '25000'),
(11, 'Mixer', '25000'),
(12, 'Mug Air', '40000'),
(13, 'Setrika', '30000'),
(14, 'Kulkas', '35000'),
(15, 'Microwave', '50000'),
(16, 'Vacuum Cleaner', '50000'),
(17, 'Mesin Cuci', '45000'),
(18, 'Alat Music Listrik', '40000');

-- --------------------------------------------------------

--
-- Table structure for table `detail_barang`
--

CREATE TABLE `detail_barang` (
  `id_detail_barang` varchar(255) NOT NULL,
  `id_user` int(255) UNSIGNED NOT NULL,
  `id_barang` int(255) UNSIGNED NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `total_harga` varchar(255) NOT NULL
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
('2', 'Kamar Mandi Luar', '500000'),
('3', 'Kosong', 'Kosong');

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `no_kamar` char(255) NOT NULL,
  `id_jenis_kamar` char(255) NOT NULL,
  `status_kmr` enum('Kosong','Terisi') NOT NULL DEFAULT 'Kosong'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`no_kamar`, `id_jenis_kamar`, `status_kmr`) VALUES
('1', '2', 'Kosong'),
('10', '2', 'Kosong'),
('11', '2', 'Kosong'),
('12', '2', 'Kosong'),
('13', '2', 'Kosong'),
('14', '2', 'Kosong'),
('15', '2', 'Kosong'),
('16', '2', 'Kosong'),
('17', '2', 'Kosong'),
('18', '2', 'Kosong'),
('19', '2', 'Kosong'),
('2', '2', 'Kosong'),
('20', '2', 'Kosong'),
('3', '2', 'Kosong'),
('4', '2', 'Kosong'),
('5', '2', 'Kosong'),
('6', '2', 'Kosong'),
('7', '2', 'Kosong'),
('8', '2', 'Kosong'),
('9', '2', 'Kosong'),
('A', '1', 'Kosong'),
('B', '1', 'Kosong'),
('C', '1', 'Kosong'),
('D', '1', 'Kosong'),
('E', '1', 'Kosong'),
('F', '1', 'Kosong'),
('G', '1', 'Kosong'),
('H', '1', 'Kosong'),
('Kosong', '3', 'Kosong');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(255) UNSIGNED NOT NULL,
  `id_user` int(255) UNSIGNED DEFAULT NULL,
  `kamar` char(255) NOT NULL,
  `tgl_pembayaran` date NOT NULL,
  `harga_kamar` varchar(255) NOT NULL,
  `foto_kuitansi` varchar(255) NOT NULL,
  `status_pembayaran` enum('Lunas','Belum Lunas') NOT NULL DEFAULT 'Belum Lunas'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_user`, `kamar`, `tgl_pembayaran`, `harga_kamar`, `foto_kuitansi`, `status_pembayaran`) VALUES
(1, 12, 'D', '2022-11-16', '700000', 'showimg.jpeg', 'Lunas'),
(32, 12, 'D', '2022-12-16', '700000', 'showimg.jpeg', 'Lunas'),
(33, 12, 'D', '2023-01-16', '700000', '', 'Belum Lunas');

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
(1, 'Kamar Mandi Dalam', 'D', 'Abdullah Ali', 'Jl. Jawa No.48 Jember', '081233326540', '', '2022-11-27');

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

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id_pgd`, `nama_pgd`, `no_kamar_pgd`, `isi_pgd`, `lampiran_pgd`, `judul_pgd`) VALUES
(1, 'Abdullah Ali', '16', 'Keran pada kamar mandi A6 rusak, air keluar terus menerus', '', 'Keran Kamar Mandi Rusak');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `fk_nokamar` (`no_kamar`);

--
-- Indexes for table `barang_tambahan`
--
ALTER TABLE `barang_tambahan`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `detail_barang`
--
ALTER TABLE `detail_barang`
  ADD PRIMARY KEY (`id_detail_barang`),
  ADD KEY `id_user` (`id_user`) USING BTREE,
  ADD KEY `id_barang` (`id_barang`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id_user` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `barang_tambahan`
--
ALTER TABLE `barang_tambahan`
  MODIFY `id_barang` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_psn` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pgd` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `akun`
--
ALTER TABLE `akun`
  ADD CONSTRAINT `fk_nokamar` FOREIGN KEY (`no_kamar`) REFERENCES `kamar` (`no_kamar`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `detail_barang`
--
ALTER TABLE `detail_barang`
  ADD CONSTRAINT `detail_barang_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `akun` (`id_user`),
  ADD CONSTRAINT `detail_barang_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang_tambahan` (`id_barang`);

--
-- Constraints for table `kamar`
--
ALTER TABLE `kamar`
  ADD CONSTRAINT `kamar_ibfk_2` FOREIGN KEY (`id_jenis_kamar`) REFERENCES `jenis_kamar` (`id_jenis_kamar`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `akun` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
