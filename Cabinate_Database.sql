-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.22-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for cabinet
CREATE DATABASE IF NOT EXISTS `cabinet` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `cabinet`;

-- Dumping structure for table cabinet.cabinet_cate
CREATE TABLE IF NOT EXISTS `cabinet_cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cabinet_name` varchar(50) DEFAULT NULL,
  `cabinet_img` text DEFAULT NULL,
  `cabinet_details` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table cabinet.cabinet_cate: ~3 rows (approximately)
/*!40000 ALTER TABLE `cabinet_cate` DISABLE KEYS */;
REPLACE INTO `cabinet_cate` (`id`, `cabinet_name`, `cabinet_img`, `cabinet_details`) VALUES
	(3, 'ยาธาตุ', 'https://media.discordapp.net/attachments/1015952211253145702/1043785341439590430/491685088da2c671.jpg?width=671&height=671', 'เด็ก ให้รับประทานครั้งละ 1-2 ช้อนชา วันละ 3 ครั้ง หลังอาหารเช้า กลางวัน และเย็น หรือทุก 4-6 ชั่วโมง'),
	(4, 's', 'https://media.discordapp.net/attachments/1015952211253145702/1043860378263752786/ff69822229a8f702.jpeg?width=671&height=671', NULL),
	(5, 'ยาธาตุ', 'https://media.discordapp.net/attachments/1015952211253145702/1043785341439590430/491685088da2c671.jpg?width=671&height=671', NULL),
	(6, 'ยาธาตุ', 'https://media.discordapp.net/attachments/1015952211253145702/1043785341439590430/491685088da2c671.jpg?width=671&height=671', NULL);
/*!40000 ALTER TABLE `cabinet_cate` ENABLE KEYS */;

-- Dumping structure for table cabinet.citizen
CREATE TABLE IF NOT EXISTS `citizen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table cabinet.citizen: ~0 rows (approximately)
/*!40000 ALTER TABLE `citizen` DISABLE KEYS */;
REPLACE INTO `citizen` (`id`, `username`, `password`) VALUES
	(1, 'loadmaidai', '1234');
/*!40000 ALTER TABLE `citizen` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;