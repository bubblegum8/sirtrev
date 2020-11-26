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

-- Dumping structure for table sirt.keluarga
CREATE TABLE IF NOT EXISTS `keluarga` (
  `nkk` bigint(20) NOT NULL DEFAULT 0,
  `password` varchar(50) DEFAULT NULL,
  `role` enum('admin','rt','warga') DEFAULT NULL,
  `created` date DEFAULT NULL,
  PRIMARY KEY (`nkk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table sirt.keluarga: ~3 rows (approximately)
/*!40000 ALTER TABLE `keluarga` DISABLE KEYS */;
INSERT INTO `keluarga` (`nkk`, `password`, `role`, `created`) VALUES
	(123, 'admin', 'admin', '2020-11-26'),
	(1111, 'rt', 'rt', '2020-11-26'),
	(12345, 'warga', 'warga', '2020-11-19'),
	(12345678, 'rt', 'rt', '2020-11-19');
/*!40000 ALTER TABLE `keluarga` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
