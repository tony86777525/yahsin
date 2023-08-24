-- --------------------------------------------------------
-- 主機:                           127.0.0.1
-- 伺服器版本:                        5.7.33 - MySQL Community Server (GPL)
-- 伺服器作業系統:                      Win64
-- HeidiSQL 版本:                  12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- 傾印  資料表 yahsin.yh_orders 結構
CREATE TABLE IF NOT EXISTS `yh_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `country` tinyint(1) NOT NULL DEFAULT '0',
  `amount` int(11) DEFAULT '1',
  `price` int(11) DEFAULT '0',
  `recipient_name` varchar(50) DEFAULT NULL,
  `recipient_company_name` varchar(255) DEFAULT NULL,
  `recipient_address_nation` varchar(100) DEFAULT NULL,
  `recipient_address_country` varchar(100) DEFAULT NULL,
  `recipient_address_code` varchar(10) DEFAULT NULL,
  `recipient_address` varchar(255) DEFAULT NULL,
  `recipient_tel` varchar(20) DEFAULT NULL,
  `recipient_email` varchar(50) DEFAULT NULL,
  `google_drive_folder_id` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- 正在傾印表格  yahsin.yh_orders 的資料：~0 rows (近似值)
INSERT INTO `yh_orders` (`id`, `number`, `status`, `name`, `email`, `country`, `amount`, `price`, `recipient_name`, `recipient_company_name`, `recipient_address_nation`, `recipient_address_country`, `recipient_address_code`, `recipient_address`, `recipient_tel`, `recipient_email`, `google_drive_folder_id`, `created_at`, `updated_at`) VALUES
	(1, '20230823231330007', 2, 'dc11', 'tony@gmail.com', 0, 1, 8800, 'dc11', NULL, '亞美尼亞', '瓦約茨佐爾', '1233', 'abcdefghijklmn', '0912345678', 'tony@gmail.com', '1WlkZU2_HMKRPsrTWPR9FYPVYipiULTKH', '1692801916', '1692803610');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
