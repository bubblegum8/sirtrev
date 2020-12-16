-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 10.4.11-MariaDB - mariadb.org binary distribution
-- OS Server:                    Win64
-- HeidiSQL Versi:               11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Membuang struktur basisdata untuk sirt
CREATE DATABASE IF NOT EXISTS `sirt` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `sirt`;

-- membuang struktur untuk table sirt.detail_keluarga
CREATE TABLE IF NOT EXISTS `detail_keluarga` (
  `nik` bigint(20) NOT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jk` enum('L','P') DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `pekerjaan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`nik`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel sirt.detail_keluarga: ~1 rows (lebih kurang)
/*!40000 ALTER TABLE `detail_keluarga` DISABLE KEYS */;
INSERT INTO `detail_keluarga` (`nik`, `nama`, `tanggal_lahir`, `jk`, `alamat`, `pekerjaan`) VALUES
	(123456, 'Farhan', NULL, 'L', 'majalengka', 'animator');
/*!40000 ALTER TABLE `detail_keluarga` ENABLE KEYS */;

-- membuang struktur untuk table sirt.keluarga
CREATE TABLE IF NOT EXISTS `keluarga` (
  `nkk` bigint(20) NOT NULL DEFAULT 0,
  `password` varchar(50) DEFAULT NULL,
  `role` enum('admin','rt','warga') DEFAULT NULL,
  `created` date DEFAULT NULL,
  PRIMARY KEY (`nkk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel sirt.keluarga: ~4 rows (lebih kurang)
/*!40000 ALTER TABLE `keluarga` DISABLE KEYS */;
INSERT INTO `keluarga` (`nkk`, `password`, `role`, `created`) VALUES
	(123, 'admin', 'admin', '2020-11-26'),
	(1111, 'rt', 'rt', '2020-11-26'),
	(12345, 'warga', 'warga', '2020-11-19'),
	(12345678, 'rt', 'rt', '2020-11-19');
/*!40000 ALTER TABLE `keluarga` ENABLE KEYS */;

-- membuang struktur untuk table sirt.suratpengantar
CREATE TABLE IF NOT EXISTS `suratpengantar` (
  `id_surat` int(11) NOT NULL,
  `jenis_surat` varchar(50) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  PRIMARY KEY (`id_surat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel sirt.suratpengantar: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `suratpengantar` DISABLE KEYS */;
/*!40000 ALTER TABLE `suratpengantar` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
