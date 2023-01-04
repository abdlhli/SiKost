-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Jan 2023 pada 12.24
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

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
-- Struktur dari tabel `akun`
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
  `status` enum('Aktif','Tidak Aktif','Super Admin','Admin') NOT NULL DEFAULT 'Tidak Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id_user`, `firstname`, `lastname`, `username`, `pass`, `no_hp`, `alamat`, `tgl_masuk`, `foto_profile`, `asal_kampus`, `hak_akses`, `no_kamar`, `status`) VALUES
(0, '', '', '', '', '', '', '0000-00-00', '', '', '', 'Kosong', 'Tidak Aktif'),
(9, 'Abdullah', 'Ali', 'aab', '202cb962ac59075b964b07152d234b70', '08896748326', 'Jl. Jawa No.48', '2022-12-08', 'photo-1529665253569-6d01c0eaf7b6.jpeg', '', '0', 'Kosong', 'Super Admin'),
(10, 'Brenda', 'Friesen', 'Brensen', '202cb962ac59075b964b07152d234b70', '081277765987', '776 Gordon Flats', '2022-12-09', '12-Custom-f9cf2.jpg', 'UNEJ', '1', 'G', 'Aktif'),
(12, 'Ayudia', 'Azkia', 'Azkia', '202cb962ac59075b964b07152d234b70', '081299988766', '98531 Rowland Land', '2022-11-16', 'girl.jpeg', 'Morar - Wilkinson', '1', '3', 'Aktif'),
(14, 'Sintyah', 'Minasa', 'cisa', '1a79d40e13162e1f3f54a57f77b2bfd9', '081988769879', 'Jl. Panjaitan No.29 Jember', '2022-12-08', 'foto-propil.webp', 'UNEJ', '1', '12', 'Aktif'),
(18, 'Aryanna', 'Kirlin', 'Annkir', '202cb962ac59075b964b07152d234b70', '081299876549', '592 Mann Valley', '2022-11-29', '4e9f035d05faeb0561835197a51a51f5.jpg', '', '0', 'Kosong', 'Admin'),
(24, 'Violette', 'Stracke', 'Alyson', '202cb962ac59075b964b07152d234b70', '0812998765', '297 Heller Views', '2022-11-29', '', '', '0', 'Kosong', 'Admin'),
(79, 'Jennete', 'Dyanica', 'Jendy', '38a7960c18f3216f32a3c74041a96c70', '', '', NULL, '', '', '1', 'Kosong', 'Tidak Aktif');

--
-- Trigger `akun`
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
-- Struktur dari tabel `jenis_kamar`
--

CREATE TABLE `jenis_kamar` (
  `id_jenis_kamar` char(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_kamar`
--

INSERT INTO `jenis_kamar` (`id_jenis_kamar`, `keterangan`, `harga`) VALUES
('1', 'Kamar Mandi Dalam', '700000'),
('2', 'Kamar Mandi Luar', '500000'),
('3', 'Kosong', 'Kosong');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar`
--

CREATE TABLE `kamar` (
  `no_kamar` char(255) NOT NULL,
  `id_jenis_kamar` char(255) NOT NULL,
  `status_kmr` enum('Kosong','Terisi') NOT NULL DEFAULT 'Kosong'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kamar`
--

INSERT INTO `kamar` (`no_kamar`, `id_jenis_kamar`, `status_kmr`) VALUES
('1', '2', 'Kosong'),
('10', '2', 'Kosong'),
('11', '2', 'Kosong'),
('12', '2', 'Terisi'),
('13', '2', 'Kosong'),
('14', '2', 'Kosong'),
('15', '2', 'Kosong'),
('16', '2', 'Kosong'),
('17', '2', 'Kosong'),
('18', '2', 'Kosong'),
('19', '2', 'Kosong'),
('2', '2', 'Kosong'),
('20', '2', 'Kosong'),
('3', '2', 'Terisi'),
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
('G', '1', 'Terisi'),
('H', '1', 'Kosong'),
('Kosong', '3', 'Kosong');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
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
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_user`, `kamar`, `tgl_pembayaran`, `harga_kamar`, `foto_kuitansi`, `status_pembayaran`) VALUES
(1, 12, 'D', '2022-11-16', '700000', 'showimg.jpeg', 'Lunas'),
(32, 12, 'D', '2022-12-16', '700000', 'kuitansi.png', 'Lunas'),
(38, 12, 'D', '2023-01-16', '700000', '', 'Belum Lunas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
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
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id_psn`, `jenis_kamar_psn`, `no_kamar_psn`, `nama_psn`, `alamat_psn`, `no_hp_psn`, `lampiran_ktp_psn`, `tgl_psn`) VALUES
(1, 'Kamar Mandi Dalam', 'D', 'Abdullah Ali', 'Jl. Jawa No.48 Jember', '081233326540', '', '2022-11-27'),
(9, 'Kamar Mandi Dalam', '15', 'Casimir Hammes', '3557 Deja Drive', '238-086-8465', '', '2023-01-16'),
(23, '', '', '', '', '', '', '2023-01-02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan`
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
-- Dumping data untuk tabel `pengaduan`
--

INSERT INTO `pengaduan` (`id_pgd`, `nama_pgd`, `no_kamar_pgd`, `isi_pgd`, `lampiran_pgd`, `judul_pgd`) VALUES
(1, 'Abdullah Ali', '16', 'Keran pada kamar mandi A6 rusak, air keluar terus menerus', '', 'Keran Kamar Mandi Rusak');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `fk_nokamar` (`no_kamar`);

--
-- Indeks untuk tabel `jenis_kamar`
--
ALTER TABLE `jenis_kamar`
  ADD PRIMARY KEY (`id_jenis_kamar`);

--
-- Indeks untuk tabel `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`no_kamar`),
  ADD KEY `id_jenis_kamar` (`id_jenis_kamar`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_psn`);

--
-- Indeks untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pgd`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id_user` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_psn` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pgd` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD CONSTRAINT `fk_nokamar` FOREIGN KEY (`no_kamar`) REFERENCES `kamar` (`no_kamar`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `kamar`
--
ALTER TABLE `kamar`
  ADD CONSTRAINT `kamar_ibfk_2` FOREIGN KEY (`id_jenis_kamar`) REFERENCES `jenis_kamar` (`id_jenis_kamar`);

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `akun` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
