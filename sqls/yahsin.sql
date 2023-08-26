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

-- 傾印  資料表 yahsin.admin_menu 結構
CREATE TABLE IF NOT EXISTS `admin_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `order` int(11) NOT NULL DEFAULT '0',
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uri` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permission` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 正在傾印表格  yahsin.admin_menu 的資料：~9 rows (近似值)
INSERT INTO `admin_menu` (`id`, `parent_id`, `order`, `title`, `icon`, `uri`, `permission`, `created_at`, `updated_at`) VALUES
	(1, 0, 1, 'Dashboard', 'fa-bar-chart', '/', NULL, NULL, NULL),
	(2, 0, 2, 'Admin', 'fa-tasks', '', NULL, NULL, NULL),
	(3, 2, 3, 'Users', 'fa-users', 'auth/users', NULL, NULL, NULL),
	(4, 2, 4, 'Roles', 'fa-user', 'auth/roles', NULL, NULL, NULL),
	(5, 2, 5, 'Permission', 'fa-ban', 'auth/permissions', NULL, NULL, NULL),
	(6, 2, 6, 'Menu', 'fa-bars', 'auth/menu', NULL, NULL, NULL),
	(7, 2, 7, 'Operation log', 'fa-history', 'auth/logs', NULL, NULL, NULL),
	(8, 0, 8, '資料管理', 'fa-bars', NULL, NULL, '2023-06-22 14:18:24', '2023-06-22 14:18:48'),
	(9, 8, 0, '訂單管理', 'fa-file-text-o', 'orders', NULL, '2023-06-22 14:19:18', '2023-06-22 14:20:31');

-- 傾印  資料表 yahsin.admin_operation_log 結構
CREATE TABLE IF NOT EXISTS `admin_operation_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `input` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `admin_operation_log_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=217 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 正在傾印表格  yahsin.admin_operation_log 的資料：~212 rows (近似值)
INSERT INTO `admin_operation_log` (`id`, `user_id`, `path`, `method`, `ip`, `input`, `created_at`, `updated_at`) VALUES
	(1, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-06-14 06:14:28', '2023-06-14 06:14:28'),
	(2, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-06-14 06:17:32', '2023-06-14 06:17:32'),
	(3, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-06-22 13:44:46', '2023-06-22 13:44:46'),
	(4, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-06-22 13:44:53', '2023-06-22 13:44:53'),
	(5, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-06-22 13:45:11', '2023-06-22 13:45:11'),
	(6, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-06-22 13:45:45', '2023-06-22 13:45:45'),
	(7, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-06-22 13:47:24', '2023-06-22 13:47:24'),
	(8, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-06-22 13:47:45', '2023-06-22 13:47:45'),
	(9, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{"_pjax":"#pjax-container"}', '2023-06-22 14:16:12', '2023-06-22 14:16:12'),
	(10, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{"_pjax":"#pjax-container"}', '2023-06-22 14:16:17', '2023-06-22 14:16:17'),
	(11, 1, 'admin/auth/menu', 'POST', '127.0.0.1', '{"parent_id":"0","title":"\\u8cc7\\u6599\\u7ba1\\u7406","icon":"fa-bars","uri":null,"roles":[null],"permission":null,"_token":"oaha0G6bdkEUWR2bOqji1qenCXjgs1oR6RxxsMBv"}', '2023-06-22 14:18:23', '2023-06-22 14:18:23'),
	(12, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-06-22 14:18:24', '2023-06-22 14:18:24'),
	(13, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-06-22 14:18:42', '2023-06-22 14:18:42'),
	(14, 1, 'admin/auth/menu', 'POST', '127.0.0.1', '{"_token":"oaha0G6bdkEUWR2bOqji1qenCXjgs1oR6RxxsMBv","_order":"[{\\"id\\":1},{\\"id\\":2,\\"children\\":[{\\"id\\":3},{\\"id\\":4},{\\"id\\":5},{\\"id\\":6},{\\"id\\":7}]},{\\"id\\":8}]"}', '2023-06-22 14:18:47', '2023-06-22 14:18:47'),
	(15, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{"_pjax":"#pjax-container"}', '2023-06-22 14:18:48', '2023-06-22 14:18:48'),
	(16, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-06-22 14:18:53', '2023-06-22 14:18:53'),
	(17, 1, 'admin/auth/menu', 'POST', '127.0.0.1', '{"parent_id":"8","title":"\\u8a02\\u55ae\\u7ba1\\u7406","icon":"fa-bars","uri":"orders","roles":[null],"permission":null,"_token":"oaha0G6bdkEUWR2bOqji1qenCXjgs1oR6RxxsMBv"}', '2023-06-22 14:19:18', '2023-06-22 14:19:18'),
	(18, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-06-22 14:19:19', '2023-06-22 14:19:19'),
	(19, 1, 'admin', 'GET', '127.0.0.1', '{"_pjax":"#pjax-container"}', '2023-06-22 14:19:29', '2023-06-22 14:19:29'),
	(20, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-06-22 14:19:31', '2023-06-22 14:19:31'),
	(21, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-06-22 14:19:34', '2023-06-22 14:19:34'),
	(22, 1, 'admin/orders', 'GET', '127.0.0.1', '{"_pjax":"#pjax-container"}', '2023-06-22 14:19:36', '2023-06-22 14:19:36'),
	(23, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{"_pjax":"#pjax-container"}', '2023-06-22 14:19:41', '2023-06-22 14:19:41'),
	(24, 1, 'admin/auth/menu/9/edit', 'GET', '127.0.0.1', '{"_pjax":"#pjax-container"}', '2023-06-22 14:19:47', '2023-06-22 14:19:47'),
	(25, 1, 'admin/auth/menu/9', 'PUT', '127.0.0.1', '{"parent_id":"8","title":"\\u8a02\\u55ae\\u7ba1\\u7406","icon":"fa-file-text-o","uri":"orders","roles":[null],"permission":null,"_token":"oaha0G6bdkEUWR2bOqji1qenCXjgs1oR6RxxsMBv","_method":"PUT","_previous_":"http:\\/\\/yahsin.tet:8080\\/admin\\/auth\\/menu"}', '2023-06-22 14:20:31', '2023-06-22 14:20:31'),
	(26, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-06-22 14:20:32', '2023-06-22 14:20:32'),
	(27, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-06-22 14:20:48', '2023-06-22 14:20:48'),
	(28, 1, 'admin/orders', 'GET', '127.0.0.1', '{"_pjax":"#pjax-container"}', '2023-06-22 14:20:51', '2023-06-22 14:20:51'),
	(29, 1, 'admin/orders/create', 'GET', '127.0.0.1', '{"_pjax":"#pjax-container"}', '2023-06-22 14:25:59', '2023-06-22 14:25:59'),
	(30, 1, 'admin/orders', 'GET', '127.0.0.1', '{"_pjax":"#pjax-container"}', '2023-06-22 14:26:16', '2023-06-22 14:26:16'),
	(31, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 14:27:12', '2023-06-22 14:27:12'),
	(32, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 14:28:19', '2023-06-22 14:28:19'),
	(33, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 14:28:34', '2023-06-22 14:28:34'),
	(34, 1, 'admin/orders/create', 'GET', '127.0.0.1', '{"_pjax":"#pjax-container"}', '2023-06-22 14:28:36', '2023-06-22 14:28:36'),
	(35, 1, 'admin/orders/create', 'GET', '127.0.0.1', '[]', '2023-06-22 14:31:55', '2023-06-22 14:31:55'),
	(36, 1, 'admin/orders', 'GET', '127.0.0.1', '{"_pjax":"#pjax-container"}', '2023-06-22 14:31:56', '2023-06-22 14:31:56'),
	(37, 1, 'admin/orders/create', 'GET', '127.0.0.1', '{"_pjax":"#pjax-container"}', '2023-06-22 14:31:58', '2023-06-22 14:31:58'),
	(38, 1, 'admin/orders/create', 'GET', '127.0.0.1', '[]', '2023-06-22 14:40:38', '2023-06-22 14:40:38'),
	(39, 1, 'admin/orders/create', 'GET', '127.0.0.1', '[]', '2023-06-22 14:41:19', '2023-06-22 14:41:19'),
	(40, 1, 'admin/orders', 'POST', '127.0.0.1', '{"status":"0","email":"tony86777525@hotmail.com.tw","address":"sssss","_token":"oaha0G6bdkEUWR2bOqji1qenCXjgs1oR6RxxsMBv"}', '2023-06-22 14:41:33', '2023-06-22 14:41:33'),
	(41, 1, 'admin/orders/create', 'GET', '127.0.0.1', '[]', '2023-06-22 14:41:36', '2023-06-22 14:41:36'),
	(42, 1, 'admin/orders/create', 'GET', '127.0.0.1', '[]', '2023-06-22 14:42:27', '2023-06-22 14:42:27'),
	(43, 1, 'admin/orders/create', 'GET', '127.0.0.1', '[]', '2023-06-22 14:42:35', '2023-06-22 14:42:35'),
	(44, 1, 'admin/orders', 'POST', '127.0.0.1', '{"status":"0","email":"tony86777525@hotmail.com.tw","address":"fefe","_token":"oaha0G6bdkEUWR2bOqji1qenCXjgs1oR6RxxsMBv"}', '2023-06-22 14:42:40', '2023-06-22 14:42:40'),
	(45, 1, 'admin/orders/create', 'GET', '127.0.0.1', '[]', '2023-06-22 14:42:41', '2023-06-22 14:42:41'),
	(46, 1, 'admin/orders/create', 'GET', '127.0.0.1', '[]', '2023-06-22 14:42:59', '2023-06-22 14:42:59'),
	(47, 1, 'admin/orders', 'POST', '127.0.0.1', '{"status":"0","email":"tony86777525@hotmail.com.tw","address":"dwd","_token":"oaha0G6bdkEUWR2bOqji1qenCXjgs1oR6RxxsMBv"}', '2023-06-22 14:43:03', '2023-06-22 14:43:03'),
	(48, 1, 'admin/orders/create', 'GET', '127.0.0.1', '[]', '2023-06-22 14:43:04', '2023-06-22 14:43:04'),
	(49, 1, 'admin/orders/create', 'GET', '127.0.0.1', '[]', '2023-06-22 14:44:11', '2023-06-22 14:44:11'),
	(50, 1, 'admin/orders', 'POST', '127.0.0.1', '{"status":"0","email":"tony86777525@hotmail.com.tw","address":"sssss","_token":"oaha0G6bdkEUWR2bOqji1qenCXjgs1oR6RxxsMBv"}', '2023-06-22 14:44:16', '2023-06-22 14:44:16'),
	(51, 1, 'admin/orders/create', 'GET', '127.0.0.1', '[]', '2023-06-22 14:44:17', '2023-06-22 14:44:17'),
	(52, 1, 'admin/orders/create', 'GET', '127.0.0.1', '[]', '2023-06-22 14:45:31', '2023-06-22 14:45:31'),
	(53, 1, 'admin/orders', 'POST', '127.0.0.1', '{"number":"20230622224531345","status":"0","email":"tony86777525@hotmail.com.tw","address":"dw","_token":"oaha0G6bdkEUWR2bOqji1qenCXjgs1oR6RxxsMBv"}', '2023-06-22 14:45:39', '2023-06-22 14:45:39'),
	(54, 1, 'admin/orders/create', 'GET', '127.0.0.1', '[]', '2023-06-22 14:45:40', '2023-06-22 14:45:40'),
	(55, 1, 'admin/orders', 'POST', '127.0.0.1', '{"number":"20230622224531345","status":"0","email":"tony86777525@hotmail.com.tw","address":"dw","_token":"oaha0G6bdkEUWR2bOqji1qenCXjgs1oR6RxxsMBv"}', '2023-06-22 14:45:52', '2023-06-22 14:45:52'),
	(56, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 14:46:25', '2023-06-22 14:46:25'),
	(57, 1, 'admin/orders/create', 'GET', '127.0.0.1', '{"_pjax":"#pjax-container"}', '2023-06-22 14:46:27', '2023-06-22 14:46:27'),
	(58, 1, 'admin/orders', 'POST', '127.0.0.1', '{"number":"20230622224627824","status":"0","email":"tony86777525@hotmail.com.tw","address":"dww","_token":"oaha0G6bdkEUWR2bOqji1qenCXjgs1oR6RxxsMBv","_previous_":"http:\\/\\/yahsin.tet:8080\\/admin\\/orders"}', '2023-06-22 14:46:32', '2023-06-22 14:46:32'),
	(59, 1, 'admin/orders/create', 'GET', '127.0.0.1', '[]', '2023-06-22 14:46:32', '2023-06-22 14:46:32'),
	(60, 1, 'admin/orders/create', 'GET', '127.0.0.1', '[]', '2023-06-22 14:46:46', '2023-06-22 14:46:46'),
	(61, 1, 'admin/orders', 'POST', '127.0.0.1', '{"number":"20230622224646502","status":"0","email":"tony86777525@hotmail.com.tw","address":"dwdw","_token":"oaha0G6bdkEUWR2bOqji1qenCXjgs1oR6RxxsMBv","_previous_":"http:\\/\\/yahsin.tet:8080\\/admin\\/orders"}', '2023-06-22 14:46:51', '2023-06-22 14:46:51'),
	(62, 1, 'admin/orders/create', 'GET', '127.0.0.1', '[]', '2023-06-22 14:46:51', '2023-06-22 14:46:51'),
	(63, 1, 'admin/orders/create', 'GET', '127.0.0.1', '[]', '2023-06-22 14:47:57', '2023-06-22 14:47:57'),
	(64, 1, 'admin/orders', 'POST', '127.0.0.1', '{"status":"0","email":"tony86777525@hotmail.com.tw","address":"eee","_token":"oaha0G6bdkEUWR2bOqji1qenCXjgs1oR6RxxsMBv"}', '2023-06-22 14:48:01', '2023-06-22 14:48:01'),
	(65, 1, 'admin/orders/create', 'GET', '127.0.0.1', '[]', '2023-06-22 14:48:02', '2023-06-22 14:48:02'),
	(66, 1, 'admin/orders/create', 'GET', '127.0.0.1', '[]', '2023-06-22 14:51:21', '2023-06-22 14:51:21'),
	(67, 1, 'admin/orders', 'POST', '127.0.0.1', '{"status":"0","email":"tony86777525@hotmail.com.tw","address":"sssss","_token":"oaha0G6bdkEUWR2bOqji1qenCXjgs1oR6RxxsMBv"}', '2023-06-22 14:51:26', '2023-06-22 14:51:26'),
	(68, 1, 'admin/orders/create', 'GET', '127.0.0.1', '[]', '2023-06-22 14:51:26', '2023-06-22 14:51:26'),
	(69, 1, 'admin/orders', 'POST', '127.0.0.1', '{"status":"0","email":"tony86777525@hotmail.com.tw","address":"sssss","_token":"oaha0G6bdkEUWR2bOqji1qenCXjgs1oR6RxxsMBv"}', '2023-06-22 14:52:04', '2023-06-22 14:52:04'),
	(70, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 14:52:05', '2023-06-22 14:52:05'),
	(71, 1, 'admin/orders/1/edit', 'GET', '127.0.0.1', '{"_pjax":"#pjax-container"}', '2023-06-22 14:53:10', '2023-06-22 14:53:10'),
	(72, 1, 'admin/orders', 'GET', '127.0.0.1', '{"_pjax":"#pjax-container"}', '2023-06-22 14:53:12', '2023-06-22 14:53:12'),
	(73, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 14:53:28', '2023-06-22 14:53:28'),
	(74, 1, 'admin/orders/1/edit', 'GET', '127.0.0.1', '{"_pjax":"#pjax-container"}', '2023-06-22 14:53:29', '2023-06-22 14:53:29'),
	(75, 1, 'admin/orders', 'GET', '127.0.0.1', '{"_pjax":"#pjax-container"}', '2023-06-22 14:53:31', '2023-06-22 14:53:31'),
	(76, 1, 'admin/orders/create', 'GET', '127.0.0.1', '{"_pjax":"#pjax-container"}', '2023-06-22 14:53:32', '2023-06-22 14:53:32'),
	(77, 1, 'admin/orders', 'POST', '127.0.0.1', '{"status":"0","email":"tony867775251@hotmail.com.tw","address":"ewewr","_token":"oaha0G6bdkEUWR2bOqji1qenCXjgs1oR6RxxsMBv","_previous_":"http:\\/\\/yahsin.tet:8080\\/admin\\/orders"}', '2023-06-22 14:53:41', '2023-06-22 14:53:41'),
	(78, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 14:53:41', '2023-06-22 14:53:41'),
	(79, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 14:54:04', '2023-06-22 14:54:04'),
	(80, 1, 'admin/orders/create', 'GET', '127.0.0.1', '{"_pjax":"#pjax-container"}', '2023-06-22 14:54:14', '2023-06-22 14:54:14'),
	(81, 1, 'admin/orders', 'POST', '127.0.0.1', '{"status":"0","email":"tony86777525@hotmail.com.tw","address":"sssss","_token":"oaha0G6bdkEUWR2bOqji1qenCXjgs1oR6RxxsMBv","_previous_":"http:\\/\\/yahsin.tet:8080\\/admin\\/orders"}', '2023-06-22 14:54:22', '2023-06-22 14:54:22'),
	(82, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 14:54:23', '2023-06-22 14:54:23'),
	(83, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 14:54:36', '2023-06-22 14:54:36'),
	(84, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 14:55:18', '2023-06-22 14:55:18'),
	(85, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 14:55:30', '2023-06-22 14:55:30'),
	(86, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 14:56:56', '2023-06-22 14:56:56'),
	(87, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 14:58:51', '2023-06-22 14:58:51'),
	(88, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 15:00:05', '2023-06-22 15:00:05'),
	(89, 1, 'admin/orders/2/edit', 'GET', '127.0.0.1', '{"_pjax":"#pjax-container"}', '2023-06-22 15:00:08', '2023-06-22 15:00:08'),
	(90, 1, 'admin/orders/2', 'PUT', '127.0.0.1', '{"status":"0","email":"b@gmail.com","address":"\\u65b0\\u5317\\u5e02\\u677f\\u6a4b\\u5340","_token":"oaha0G6bdkEUWR2bOqji1qenCXjgs1oR6RxxsMBv","_method":"PUT","_previous_":"http:\\/\\/yahsin.tet:8080\\/admin\\/orders"}', '2023-06-22 15:00:20', '2023-06-22 15:00:20'),
	(91, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 15:00:21', '2023-06-22 15:00:21'),
	(92, 1, 'admin/orders/3/edit', 'GET', '127.0.0.1', '{"_pjax":"#pjax-container"}', '2023-06-22 15:00:24', '2023-06-22 15:00:24'),
	(93, 1, 'admin/orders/3', 'PUT', '127.0.0.1', '{"status":"0","email":"c@gmail.com","address":"\\u65b0\\u5317\\u5e02\\u677f\\u6a4b\\u5340","_token":"oaha0G6bdkEUWR2bOqji1qenCXjgs1oR6RxxsMBv","_method":"PUT","_previous_":"http:\\/\\/yahsin.tet:8080\\/admin\\/orders"}', '2023-06-22 15:00:32', '2023-06-22 15:00:32'),
	(94, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 15:00:33', '2023-06-22 15:00:33'),
	(95, 1, 'admin/orders/create', 'GET', '127.0.0.1', '{"_pjax":"#pjax-container"}', '2023-06-22 15:01:57', '2023-06-22 15:01:57'),
	(96, 1, 'admin/orders/create', 'GET', '127.0.0.1', '[]', '2023-06-22 15:02:08', '2023-06-22 15:02:08'),
	(97, 1, 'admin/orders', 'GET', '127.0.0.1', '{"_pjax":"#pjax-container"}', '2023-06-22 15:02:12', '2023-06-22 15:02:12'),
	(98, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 15:03:21', '2023-06-22 15:03:21'),
	(99, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 15:05:06', '2023-06-22 15:05:06'),
	(100, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 15:06:18', '2023-06-22 15:06:18'),
	(101, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 15:06:23', '2023-06-22 15:06:23'),
	(102, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 15:06:44', '2023-06-22 15:06:44'),
	(103, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 15:09:02', '2023-06-22 15:09:02'),
	(104, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 15:09:09', '2023-06-22 15:09:09'),
	(105, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 15:20:27', '2023-06-22 15:20:27'),
	(106, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 15:21:29', '2023-06-22 15:21:29'),
	(107, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 15:21:39', '2023-06-22 15:21:39'),
	(108, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 15:21:51', '2023-06-22 15:21:51'),
	(109, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 15:22:00', '2023-06-22 15:22:00'),
	(110, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 15:22:17', '2023-06-22 15:22:17'),
	(111, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 15:22:27', '2023-06-22 15:22:27'),
	(112, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 15:22:35', '2023-06-22 15:22:35'),
	(113, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 15:22:40', '2023-06-22 15:22:40'),
	(114, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 15:22:46', '2023-06-22 15:22:46'),
	(115, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 15:24:56', '2023-06-22 15:24:56'),
	(116, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 15:25:15', '2023-06-22 15:25:15'),
	(117, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 15:26:58', '2023-06-22 15:26:58'),
	(118, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 15:27:13', '2023-06-22 15:27:13'),
	(119, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 15:28:00', '2023-06-22 15:28:00'),
	(120, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 15:28:06', '2023-06-22 15:28:06'),
	(121, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 15:28:42', '2023-06-22 15:28:42'),
	(122, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 15:29:18', '2023-06-22 15:29:18'),
	(123, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 15:29:26', '2023-06-22 15:29:26'),
	(124, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 15:29:51', '2023-06-22 15:29:51'),
	(125, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 15:29:57', '2023-06-22 15:29:57'),
	(126, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-23 04:46:35', '2023-06-23 04:46:35'),
	(127, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-06-26 15:14:29', '2023-06-26 15:14:29'),
	(128, 1, 'admin/orders', 'GET', '127.0.0.1', '{"_pjax":"#pjax-container"}', '2023-06-26 15:14:34', '2023-06-26 15:14:34'),
	(129, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-26 15:17:01', '2023-06-26 15:17:01'),
	(130, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-28 15:26:00', '2023-06-28 15:26:00'),
	(131, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-28 15:54:45', '2023-06-28 15:54:45'),
	(132, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-28 15:54:56', '2023-06-28 15:54:56'),
	(133, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-07-02 08:35:15', '2023-07-02 08:35:15'),
	(134, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-07-02 09:12:32', '2023-07-02 09:12:32'),
	(135, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-07-02 09:18:21', '2023-07-02 09:18:21'),
	(136, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-07-02 09:35:19', '2023-07-02 09:35:19'),
	(137, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-07-02 09:48:12', '2023-07-02 09:48:12'),
	(138, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-07-02 09:58:43', '2023-07-02 09:58:43'),
	(139, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-07-02 10:05:16', '2023-07-02 10:05:16'),
	(140, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-07-02 10:09:01', '2023-07-02 10:09:01'),
	(141, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-07-02 10:09:03', '2023-07-02 10:09:03'),
	(142, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-07-02 10:09:04', '2023-07-02 10:09:04'),
	(143, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-07-02 10:12:06', '2023-07-02 10:12:06'),
	(144, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-07-02 10:12:15', '2023-07-02 10:12:15'),
	(145, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-07-02 10:12:23', '2023-07-02 10:12:23'),
	(146, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-07-02 10:12:25', '2023-07-02 10:12:25'),
	(147, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-07-02 10:12:49', '2023-07-02 10:12:49'),
	(148, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-07-02 10:18:46', '2023-07-02 10:18:46'),
	(149, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-07-26 07:32:39', '2023-07-26 07:32:39'),
	(150, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-07-26 15:52:19', '2023-07-26 15:52:19'),
	(151, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-07-26 15:57:39', '2023-07-26 15:57:39'),
	(152, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-07-26 15:59:11', '2023-07-26 15:59:11'),
	(153, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-07-26 15:59:31', '2023-07-26 15:59:31'),
	(154, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-07-26 15:59:37', '2023-07-26 15:59:37'),
	(155, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-07-26 15:59:49', '2023-07-26 15:59:49'),
	(156, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-07-27 13:52:14', '2023-07-27 13:52:14'),
	(157, 1, 'admin/orders', 'GET', '127.0.0.1', '{"_pjax":"#pjax-container"}', '2023-07-27 13:52:33', '2023-07-27 13:52:33'),
	(158, 1, 'admin/orders/3/edit', 'GET', '127.0.0.1', '{"_pjax":"#pjax-container"}', '2023-07-27 13:52:41', '2023-07-27 13:52:41'),
	(159, 1, 'admin/orders', 'GET', '127.0.0.1', '{"_pjax":"#pjax-container"}', '2023-07-27 13:52:44', '2023-07-27 13:52:44'),
	(160, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-07-30 14:36:08', '2023-07-30 14:36:08'),
	(161, 1, 'admin/orders', 'GET', '127.0.0.1', '{"_pjax":"#pjax-container"}', '2023-07-30 14:36:13', '2023-07-30 14:36:13'),
	(162, 1, 'admin/orders/4/edit', 'GET', '127.0.0.1', '{"_pjax":"#pjax-container"}', '2023-07-30 14:36:17', '2023-07-30 14:36:17'),
	(163, 1, 'admin/orders', 'GET', '127.0.0.1', '{"_pjax":"#pjax-container"}', '2023-07-30 14:36:27', '2023-07-30 14:36:27'),
	(164, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-07-30 15:46:24', '2023-07-30 15:46:24'),
	(165, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-07-30 15:49:03', '2023-07-30 15:49:03'),
	(166, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-07-30 15:49:37', '2023-07-30 15:49:37'),
	(167, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-07-30 15:52:24', '2023-07-30 15:52:24'),
	(168, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-07-30 15:52:37', '2023-07-30 15:52:37'),
	(169, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-07-30 15:55:17', '2023-07-30 15:55:17'),
	(170, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-07-31 15:21:17', '2023-07-31 15:21:17'),
	(171, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-08-20 14:05:25', '2023-08-20 14:05:25'),
	(172, 1, 'admin/orders', 'GET', '127.0.0.1', '{"_pjax":"#pjax-container"}', '2023-08-20 14:11:06', '2023-08-20 14:11:06'),
	(173, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-08-20 14:15:33', '2023-08-20 14:15:33'),
	(174, 1, 'admin/orders', 'GET', '127.0.0.1', '{"_pjax":"#pjax-container"}', '2023-08-20 14:15:36', '2023-08-20 14:15:36'),
	(175, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-08-20 14:16:20', '2023-08-20 14:16:20'),
	(176, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-08-20 14:25:49', '2023-08-20 14:25:49'),
	(177, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-08-20 14:26:03', '2023-08-20 14:26:03'),
	(178, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-08-20 14:26:11', '2023-08-20 14:26:11'),
	(179, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-08-20 14:26:16', '2023-08-20 14:26:16'),
	(180, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-08-20 14:52:02', '2023-08-20 14:52:02'),
	(181, 1, 'admin/orders/1/edit', 'GET', '127.0.0.1', '{"_pjax":"#pjax-container"}', '2023-08-20 14:52:41', '2023-08-20 14:52:41'),
	(182, 1, 'admin/orders/1/edit', 'GET', '127.0.0.1', '[]', '2023-08-22 11:46:30', '2023-08-22 11:46:30'),
	(183, 1, 'admin/orders/1/edit', 'GET', '127.0.0.1', '[]', '2023-08-22 15:12:19', '2023-08-22 15:12:19'),
	(184, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-08-22 15:46:15', '2023-08-22 15:46:15'),
	(185, 1, 'admin/orders', 'GET', '127.0.0.1', '{"_pjax":"#pjax-container"}', '2023-08-22 15:46:22', '2023-08-22 15:46:22'),
	(186, 1, 'admin/orders/1/edit', 'GET', '127.0.0.1', '{"_pjax":"#pjax-container"}', '2023-08-22 15:46:50', '2023-08-22 15:46:50'),
	(187, 1, 'admin/orders/1/edit', 'GET', '127.0.0.1', '[]', '2023-08-22 16:00:48', '2023-08-22 16:00:48'),
	(188, 1, 'admin/orders/1/edit', 'GET', '127.0.0.1', '[]', '2023-08-22 16:19:02', '2023-08-22 16:19:02'),
	(189, 1, 'admin/orders/1/edit', 'GET', '127.0.0.1', '[]', '2023-08-22 16:23:02', '2023-08-22 16:23:02'),
	(190, 1, 'admin/orders/1/edit', 'GET', '127.0.0.1', '[]', '2023-08-22 16:23:18', '2023-08-22 16:23:18'),
	(191, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-08-23 14:14:22', '2023-08-23 14:14:22'),
	(192, 1, 'admin/orders', 'GET', '127.0.0.1', '{"_pjax":"#pjax-container"}', '2023-08-23 14:14:40', '2023-08-23 14:14:40'),
	(193, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-08-23 14:14:51', '2023-08-23 14:14:51'),
	(194, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-08-23 14:19:45', '2023-08-23 14:19:45'),
	(195, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-08-23 14:30:09', '2023-08-23 14:30:09'),
	(196, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-08-23 14:33:44', '2023-08-23 14:33:44'),
	(197, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-08-23 14:34:21', '2023-08-23 14:34:21'),
	(198, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-08-23 14:34:50', '2023-08-23 14:34:50'),
	(199, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-08-23 14:35:35', '2023-08-23 14:35:35'),
	(200, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-08-23 14:35:47', '2023-08-23 14:35:47'),
	(201, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-08-23 14:36:51', '2023-08-23 14:36:51'),
	(202, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-08-23 14:37:45', '2023-08-23 14:37:45'),
	(203, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-08-23 14:45:26', '2023-08-23 14:45:26'),
	(204, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-08-23 14:47:30', '2023-08-23 14:47:30'),
	(205, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-08-23 14:48:39', '2023-08-23 14:48:39'),
	(206, 1, 'admin/orders', 'GET', '127.0.0.1', '{"_pjax":"#pjax-container"}', '2023-08-23 14:48:43', '2023-08-23 14:48:43'),
	(207, 1, 'admin/orders', 'GET', '127.0.0.1', '{"_pjax":"#pjax-container","number":"20230823224516659"}', '2023-08-23 14:48:53', '2023-08-23 14:48:53'),
	(208, 1, 'admin/orders', 'GET', '127.0.0.1', '{"_pjax":"#pjax-container"}', '2023-08-23 15:11:52', '2023-08-23 15:11:52'),
	(209, 1, 'admin/orders/1/edit', 'GET', '127.0.0.1', '{"_pjax":"#pjax-container"}', '2023-08-23 15:11:56', '2023-08-23 15:11:56'),
	(210, 1, 'admin/orders/1', 'PUT', '127.0.0.1', '{"status":"1","name":"dc11","email":"tony@gmail.com","country":"0","recipient_name":"dc11","recipient_company_name":null,"recipient_address_nation":"\\u4e9e\\u7f8e\\u5c3c\\u4e9e","recipient_address_country":"\\u74e6\\u7d04\\u8328\\u4f50\\u723e","recipient_address_code":"1233","recipient_address":"abcdefghijklmn","recipient_tel":"0912345678","recipient_email":"tony@gmail.com","google_drive_folder_id":"1WlkZU2_HMKRPsrTWPR9FYPVYipiULTKH","_token":"XtYlOOXVpQFwusRjFBpl9NFVa46xeyoIudEHw6XQ","_method":"PUT","_previous_":"https:\\/\\/7fc2-218-35-166-9.ngrok-free.app\\/admin\\/orders"}', '2023-08-23 15:12:01', '2023-08-23 15:12:01'),
	(211, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-08-23 15:12:02', '2023-08-23 15:12:02'),
	(212, 1, 'admin/orders/1/edit', 'GET', '127.0.0.1', '{"_pjax":"#pjax-container"}', '2023-08-23 15:13:25', '2023-08-23 15:13:25'),
	(213, 1, 'admin/orders/1', 'PUT', '127.0.0.1', '{"status":"2","name":"dc11","email":"tony@gmail.com","country":"0","recipient_name":"dc11","recipient_company_name":null,"recipient_address_nation":"\\u4e9e\\u7f8e\\u5c3c\\u4e9e","recipient_address_country":"\\u74e6\\u7d04\\u8328\\u4f50\\u723e","recipient_address_code":"1233","recipient_address":"abcdefghijklmn","recipient_tel":"0912345678","recipient_email":"tony@gmail.com","google_drive_folder_id":"1WlkZU2_HMKRPsrTWPR9FYPVYipiULTKH","_token":"XtYlOOXVpQFwusRjFBpl9NFVa46xeyoIudEHw6XQ","_method":"PUT","_previous_":"https:\\/\\/7fc2-218-35-166-9.ngrok-free.app\\/admin\\/orders"}', '2023-08-23 15:13:30', '2023-08-23 15:13:30'),
	(214, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-08-23 15:13:31', '2023-08-23 15:13:31'),
	(215, 1, 'admin/orders/1/edit', 'GET', '127.0.0.1', '{"_pjax":"#pjax-container"}', '2023-08-23 15:13:34', '2023-08-23 15:13:34'),
	(216, 1, 'admin/orders', 'GET', '127.0.0.1', '{"_pjax":"#pjax-container"}', '2023-08-23 15:13:42', '2023-08-23 15:13:42');

-- 傾印  資料表 yahsin.admin_permissions 結構
CREATE TABLE IF NOT EXISTS `admin_permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `http_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `http_path` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_permissions_name_unique` (`name`),
  UNIQUE KEY `admin_permissions_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 正在傾印表格  yahsin.admin_permissions 的資料：~5 rows (近似值)
INSERT INTO `admin_permissions` (`id`, `name`, `slug`, `http_method`, `http_path`, `created_at`, `updated_at`) VALUES
	(1, 'All permission', '*', '', '*', NULL, NULL),
	(2, 'Dashboard', 'dashboard', 'GET', '/', NULL, NULL),
	(3, 'Login', 'auth.login', '', '/auth/login\r\n/auth/logout', NULL, NULL),
	(4, 'User setting', 'auth.setting', 'GET,PUT', '/auth/setting', NULL, NULL),
	(5, 'Auth management', 'auth.management', '', '/auth/roles\r\n/auth/permissions\r\n/auth/menu\r\n/auth/logs', NULL, NULL);

-- 傾印  資料表 yahsin.admin_roles 結構
CREATE TABLE IF NOT EXISTS `admin_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_roles_name_unique` (`name`),
  UNIQUE KEY `admin_roles_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 正在傾印表格  yahsin.admin_roles 的資料：~0 rows (近似值)
INSERT INTO `admin_roles` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
	(1, 'Administrator', 'administrator', '2023-06-14 06:14:10', '2023-06-14 06:14:10');

-- 傾印  資料表 yahsin.admin_role_menu 結構
CREATE TABLE IF NOT EXISTS `admin_role_menu` (
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `admin_role_menu_role_id_menu_id_index` (`role_id`,`menu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 正在傾印表格  yahsin.admin_role_menu 的資料：~0 rows (近似值)
INSERT INTO `admin_role_menu` (`role_id`, `menu_id`, `created_at`, `updated_at`) VALUES
	(1, 2, NULL, NULL);

-- 傾印  資料表 yahsin.admin_role_permissions 結構
CREATE TABLE IF NOT EXISTS `admin_role_permissions` (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `admin_role_permissions_role_id_permission_id_index` (`role_id`,`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 正在傾印表格  yahsin.admin_role_permissions 的資料：~0 rows (近似值)
INSERT INTO `admin_role_permissions` (`role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
	(1, 1, NULL, NULL);

-- 傾印  資料表 yahsin.admin_role_users 結構
CREATE TABLE IF NOT EXISTS `admin_role_users` (
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `admin_role_users_role_id_user_id_index` (`role_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 正在傾印表格  yahsin.admin_role_users 的資料：~0 rows (近似值)
INSERT INTO `admin_role_users` (`role_id`, `user_id`, `created_at`, `updated_at`) VALUES
	(1, 1, NULL, NULL);

-- 傾印  資料表 yahsin.admin_users 結構
CREATE TABLE IF NOT EXISTS `admin_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 正在傾印表格  yahsin.admin_users 的資料：~0 rows (近似值)
INSERT INTO `admin_users` (`id`, `username`, `password`, `name`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'admin', '$2y$10$9rVSzRGLIELcSBFplwWULO4OeuR8J8jSBXTBJGYWy0oFfYSrI7nt.', 'Administrator', NULL, 'JiRgfUxKzUR6Urzj4LUqlrHe37O3JLK5bt7l8OYRQfibMGRNQAzAyVQ32BlJ', '2023-06-14 06:14:10', '2023-06-14 06:14:10');

-- 傾印  資料表 yahsin.admin_user_permissions 結構
CREATE TABLE IF NOT EXISTS `admin_user_permissions` (
  `user_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `admin_user_permissions_user_id_permission_id_index` (`user_id`,`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 正在傾印表格  yahsin.admin_user_permissions 的資料：~0 rows (近似值)

-- 傾印  資料表 yahsin.failed_jobs 結構
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 正在傾印表格  yahsin.failed_jobs 的資料：~0 rows (近似值)

-- 傾印  資料表 yahsin.migrations 結構
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 正在傾印表格  yahsin.migrations 的資料：~5 rows (近似值)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2016_01_04_173148_create_admin_tables', 1),
	(4, '2019_08_19_000000_create_failed_jobs_table', 1),
	(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(6, '2014_10_12_100000_create_password_resets_table', 2);

-- 傾印  資料表 yahsin.password_resets 結構
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 正在傾印表格  yahsin.password_resets 的資料：~0 rows (近似值)

-- 傾印  資料表 yahsin.password_reset_tokens 結構
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 正在傾印表格  yahsin.password_reset_tokens 的資料：~0 rows (近似值)

-- 傾印  資料表 yahsin.personal_access_tokens 結構
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 正在傾印表格  yahsin.personal_access_tokens 的資料：~0 rows (近似值)

-- 傾印  資料表 yahsin.users 結構
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 正在傾印表格  yahsin.users 的資料：~0 rows (近似值)

-- 傾印  資料表 yahsin.yh_orders 結構
CREATE TABLE IF NOT EXISTS `yh_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` varchar(255) NOT NULL,
  `payment_number` varchar(255) NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
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
  `payment_times` tinyint(1) NULL DEFAULT '0',
  `created_at_date`varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
