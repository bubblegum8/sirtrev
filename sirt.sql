-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Jul 2020 pada 11.51
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sirt`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_warga`
--

CREATE TABLE `detail_warga` (
  `id_detailwarga` int(11) NOT NULL,
  `NKK` varchar(100) DEFAULT NULL,
  `id_warga` int(11) DEFAULT NULL,
  `id_rt` int(11) DEFAULT NULL,
  `statuswarga` enum('Ketua RT','Warga') DEFAULT NULL,
  `statuskeluarga` enum('Kepala Keluarga','Istri','Anak') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_warga`
--

INSERT INTO `detail_warga` (`id_detailwarga`, `NKK`, `id_warga`, `id_rt`, `statuswarga`, `statuskeluarga`) VALUES
(1, '12345', 2, 1, NULL, 'Anak'),
(2, '123456', 3, 3, NULL, 'Kepala Keluarga');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rt`
--

CREATE TABLE `rt` (
  `id_rt` int(11) NOT NULL,
  `rt` varchar(50) DEFAULT NULL,
  `rw` varchar(50) DEFAULT NULL,
  `kelurahan` varchar(200) DEFAULT NULL,
  `kecamatan` varchar(200) DEFAULT NULL,
  `kota` varchar(200) DEFAULT NULL,
  `provinsi` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rt`
--

INSERT INTO `rt` (`id_rt`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kota`, `provinsi`) VALUES
(1, '3', '21', 'CIMEKAR', 'CILEUNYI', 'BANDUNG', 'JAWA BARAT'),
(3, '4', '2', 'sragen', 'batu', 'malang', 'jawa timur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat`
--

CREATE TABLE `surat` (
  `id_surat` int(11) NOT NULL,
  `id_rt` int(11) DEFAULT NULL,
  `id_warga` int(11) DEFAULT NULL,
  `no_surat` varchar(100) DEFAULT NULL,
  `keperluan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `surat`
--

INSERT INTO `surat` (`id_surat`, `id_rt`, `id_warga`, `no_surat`, `keperluan`) VALUES
(1, 1, 2, '1', 'pembuatan ktp');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `level` enum('rt','warga') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `name`, `level`) VALUES
(1, '12345', 'warga', 'toni maulana', 'warga'),
(5, '123456', 'rt', 'rahmadi sh', 'rt');

-- --------------------------------------------------------

--
-- Struktur dari tabel `warga`
--

CREATE TABLE `warga` (
  `id_warga` int(11) NOT NULL,
  `NIK` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tmpt_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `pendidikan` varchar(100) NOT NULL,
  `agama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `warga`
--

INSERT INTO `warga` (`id_warga`, `NIK`, `nama`, `alamat`, `tmpt_lahir`, `tgl_lahir`, `pendidikan`, `agama`) VALUES
(2, '12345', 'Toni Maulana', 'Jln. Malawisma 3', 'Majalengka', '1999-04-04', 'S1', 'Islam'),
(3, '123456', 'Ryan Noofauzan', 'Jln. Manisi 12', 'Djakarta', '1999-07-24', 'S3', 'Islam'),
(4, '1234567', 'Riki Ahmad Maulana', 'Komp. Bukit Mekar Indah Block D No 6', 'Bandung', '1999-04-05', 'S1', 'Islam');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `detail_warga`
--
ALTER TABLE `detail_warga`
  ADD PRIMARY KEY (`id_detailwarga`),
  ADD KEY `FK_detail_warga_warga` (`id_warga`),
  ADD KEY `FK_detail_warga_rt` (`id_rt`);

--
-- Indeks untuk tabel `rt`
--
ALTER TABLE `rt`
  ADD PRIMARY KEY (`id_rt`);

--
-- Indeks untuk tabel `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`id_surat`),
  ADD KEY `FK_surat_warga` (`id_warga`),
  ADD KEY `FK_surat_rt` (`id_rt`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `warga`
--
ALTER TABLE `warga`
  ADD PRIMARY KEY (`id_warga`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `detail_warga`
--
ALTER TABLE `detail_warga`
  MODIFY `id_detailwarga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `rt`
--
ALTER TABLE `rt`
  MODIFY `id_rt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `surat`
--
ALTER TABLE `surat`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `warga`
--
ALTER TABLE `warga`
  MODIFY `id_warga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_warga`
--
ALTER TABLE `detail_warga`
  ADD CONSTRAINT `FK_detail_warga_rt` FOREIGN KEY (`id_rt`) REFERENCES `rt` (`id_rt`),
  ADD CONSTRAINT `FK_detail_warga_warga` FOREIGN KEY (`id_warga`) REFERENCES `warga` (`id_warga`);

--
-- Ketidakleluasaan untuk tabel `surat`
--
ALTER TABLE `surat`
  ADD CONSTRAINT `FK_surat_rt` FOREIGN KEY (`id_rt`) REFERENCES `rt` (`id_rt`),
  ADD CONSTRAINT `FK_surat_warga` FOREIGN KEY (`id_warga`) REFERENCES `warga` (`id_warga`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
