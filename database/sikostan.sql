-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Des 2022 pada 03.36
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
  `pass` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tgl_masuk` date DEFAULT NULL,
  `foto_profile` varchar(255) NOT NULL,
  `asal_kampus` varchar(255) NOT NULL,
  `hak_akses` char(1) NOT NULL DEFAULT '1',
  `no_kamar` char(255) NOT NULL DEFAULT 'Kosong',
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id_user`, `firstname`, `lastname`, `pass`, `username`, `no_hp`, `alamat`, `tgl_masuk`, `foto_profile`, `asal_kampus`, `hak_akses`, `no_kamar`, `status`) VALUES
(9, 'Abdullah', 'Ali', '123', 'aab', '08896748326', 'Jl. Jawa No.48', '2022-12-08', '', 'POLINEJ', '0', 'Kosong', 'AKTIF'),
(10, 'opfmew', 'mfepoop', 'pfomek', 'fompeo', 'pofoemp', 'ofep', '2022-12-09', '', '', '1', 'Kosong', 'AKTIF'),
(12, 'Ayudia', 'Azkia', '123', 'Azkia', '081299988765', '', NULL, '', '', '1', 'Kosong', NULL),
(14, 'Sintyah', 'Minasa', '', '', '081988769879', 'Jl. Panjaitan No.29 Jember', '2022-12-08', '', 'UNEJ', '1', 'F', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_tambahan`
--

CREATE TABLE `barang_tambahan` (
  `id_barang` int(255) UNSIGNED NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `harga_tambahan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
('2', 'Kamar Mandi Luar', '500000');

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
('Kosong', '1', 'Kosong');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(255) UNSIGNED NOT NULL,
  `tgl_pembayaran` date NOT NULL,
  `foto_kuitansi` varchar(255) NOT NULL,
  `id_user` int(255) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(2, 'Kamar Mandi Luar', '17', 'Andaokwdoa dwa', 'Jl. Jawa No.48 Jember', '081233326540', '', '2022-11-27'),
(3, 'Kamar Mandi Luar', '17', 'Andaokwdoa dwa', 'Jl. Jawa No.48 Jember', '081233326540', '', '2022-11-27'),
(4, 'Kamar Mandi Luar', '17', 'Andaokwdoa dwa', 'Jl. Jawa No.48 Jember', '081233326540', '', '2022-11-27'),
(5, 'Kamar Mandi Luar', '17', 'Andaokwdoa dwa', 'Jl. Jawa No.48 Jember', '081233326540', '', '2022-11-27'),
(6, 'Kamar Mandi Luar', '17', 'Andaokwdoa dwa', 'Jl. Jawa No.48 Jember', '081233326540', '', '2022-11-27'),
(7, 'Kamar Mandi Luar', '17', 'Andaokwdoa dwa', 'Jl. Jawa No.48 Jember', '081233326540', '', '2022-11-27'),
(8, 'Kamar Mandi Dalam', '15', 'Test', 'Jl. Jawa No.48 Jember', '081233326540', '', '2022-11-27');

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `rincian_barang`
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
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `fk_nokamar` (`no_kamar`);

--
-- Indeks untuk tabel `barang_tambahan`
--
ALTER TABLE `barang_tambahan`
  ADD PRIMARY KEY (`id_barang`);

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
-- Indeks untuk tabel `rincian_barang`
--
ALTER TABLE `rincian_barang`
  ADD PRIMARY KEY (`id_user`,`id_barang`),
  ADD KEY `id_barang` (`id_barang`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id_user` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `barang_tambahan`
--
ALTER TABLE `barang_tambahan`
  MODIFY `id_barang` int(255) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(255) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_psn` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pgd` int(255) UNSIGNED NOT NULL AUTO_INCREMENT;

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

--
-- Ketidakleluasaan untuk tabel `rincian_barang`
--
ALTER TABLE `rincian_barang`
  ADD CONSTRAINT `rincian_barang_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `akun` (`id_user`),
  ADD CONSTRAINT `rincian_barang_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang_tambahan` (`id_barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
