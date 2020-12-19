-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.14-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for sirt
CREATE DATABASE IF NOT EXISTS `sirt` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `sirt`;

-- Dumping structure for table sirt.detail_keluarga
CREATE TABLE IF NOT EXISTS `detail_keluarga` (
  `nik` bigint(20) NOT NULL,
  `nkk` bigint(20) DEFAULT NULL,
  `id_wilayah` bigint(20) DEFAULT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jk` enum('L','P') DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `pekerjaan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`nik`),
  KEY `nkk` (`nkk`),
  KEY `id_wilayah` (`id_wilayah`),
  CONSTRAINT `FK_detail_keluarga_keluarga` FOREIGN KEY (`nkk`) REFERENCES `keluarga` (`nkk`) ON DELETE CASCADE,
  CONSTRAINT `FK_detail_keluarga_wilayah` FOREIGN KEY (`id_wilayah`) REFERENCES `wilayah` (`id_wilayah`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table sirt.detail_keluarga: ~3 rows (approximately)
/*!40000 ALTER TABLE `detail_keluarga` DISABLE KEYS */;
INSERT INTO `detail_keluarga` (`nik`, `nkk`, `id_wilayah`, `nama`, `tanggal_lahir`, `jk`, `alamat`, `pekerjaan`) VALUES
	(123456, 12345, 1, 'Toni', '2020-12-04', 'L', 'bandung', 'animator'),
	(1234567, 12345, 2, 'ROYAN SUBRYAN', '2020-12-19', 'P', 'BANYUWANGI', 'Programmer Project'),
	(66666666, 12345, 1, 'Iqbal Sanjaya', '2020-12-16', 'P', 'Bandung', 'Programmer Project Bandung'),
	(4444444444444, 1111, 1, 'Roy Sanjaya', '2020-12-19', 'L', 'asdsadas', 'asdsa');
/*!40000 ALTER TABLE `detail_keluarga` ENABLE KEYS */;

-- Dumping structure for table sirt.keluarga
CREATE TABLE IF NOT EXISTS `keluarga` (
  `nkk` bigint(20) NOT NULL DEFAULT 0,
  `id_wilayah` bigint(20) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `role` enum('admin','rt','warga') DEFAULT NULL,
  `created` date DEFAULT NULL,
  PRIMARY KEY (`nkk`),
  KEY `id_wilayah` (`id_wilayah`),
  CONSTRAINT `FK_keluarga_wilayah` FOREIGN KEY (`id_wilayah`) REFERENCES `wilayah` (`id_wilayah`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table sirt.keluarga: ~4 rows (approximately)
/*!40000 ALTER TABLE `keluarga` DISABLE KEYS */;
INSERT INTO `keluarga` (`nkk`, `id_wilayah`, `password`, `role`, `created`) VALUES
	(123, NULL, 'admin', 'admin', '2020-11-26'),
	(1111, 1, 'rt', 'rt', '2020-11-26'),
	(12345, 1, 'warga', 'warga', '2020-11-19'),
	(12345678, 2, 'rt', 'rt', '2020-11-19');
/*!40000 ALTER TABLE `keluarga` ENABLE KEYS */;

-- Dumping structure for table sirt.suratpengantar
CREATE TABLE IF NOT EXISTS `suratpengantar` (
  `id_surat` int(11) NOT NULL,
  `jenis_surat` varchar(50) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  PRIMARY KEY (`id_surat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table sirt.suratpengantar: ~0 rows (approximately)
/*!40000 ALTER TABLE `suratpengantar` DISABLE KEYS */;
INSERT INTO `suratpengantar` (`id_surat`, `jenis_surat`, `keterangan`, `tanggal`) VALUES
	(0, 'Surat Pengantar KTP', 'Surat untuk membuat KTP', '2020-12-15');
/*!40000 ALTER TABLE `suratpengantar` ENABLE KEYS */;

-- Dumping structure for table sirt.wilayah
CREATE TABLE IF NOT EXISTS `wilayah` (
  `id_wilayah` bigint(20) NOT NULL,
  `provinsi` varchar(50) DEFAULT NULL,
  `kota` varchar(50) DEFAULT NULL,
  `kecamatan` varchar(50) DEFAULT NULL,
  `kelurahan` varchar(50) DEFAULT NULL,
  `rw` varchar(50) DEFAULT NULL,
  `rt` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_wilayah`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table sirt.wilayah: ~1 rows (approximately)
/*!40000 ALTER TABLE `wilayah` DISABLE KEYS */;
INSERT INTO `wilayah` (`id_wilayah`, `provinsi`, `kota`, `kecamatan`, `kelurahan`, `rw`, `rt`) VALUES
	(1, 'Jawa Barat', 'Bandung', 'Cileunyi', 'Cimekar', '21', '01'),
	(2, 'Jawa tengah', 'Belitung', 'Beringin', 'Bantul', '2', '1');
/*!40000 ALTER TABLE `wilayah` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
