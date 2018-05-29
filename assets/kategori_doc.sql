-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               10.1.28-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table ematch.kategori_doc
CREATE TABLE IF NOT EXISTS `kategori_doc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_doc` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table ematch.kategori_doc: ~3 rows (approximately)
/*!40000 ALTER TABLE `kategori_doc` DISABLE KEYS */;
INSERT INTO `kategori_doc` (`id`, `nama_doc`, `date`) VALUES
	(1, 'Dokumen', '2017-12-18'),
	(2, 'Apps', '2017-12-18'),
	(3, 'ooooo', '2017-12-21');
/*!40000 ALTER TABLE `kategori_doc` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
