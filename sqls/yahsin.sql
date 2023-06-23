-- --------------------------------------------------------
-- 主機:                           127.0.0.1
-- 伺服器版本:                        5.7.33 - MySQL Community Server (GPL)
-- 伺服器作業系統:                      Win64
-- HeidiSQL 版本:                  11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- 正在傾印表格  yahsin.admin_menu 的資料：~9 rows (近似值)
/*!40000 ALTER TABLE `admin_menu` DISABLE KEYS */;
INSERT INTO `admin_menu` (`id`, `parent_id`, `order`, `title`, `icon`, `uri`, `permission`, `created_at`, `updated_at`) VALUES
	(1, 0, 1, 'Dashboard', 'fa-bar-chart', '/', NULL, NULL, NULL),
	(2, 0, 2, 'Admin', 'fa-tasks', '', NULL, NULL, NULL),
	(3, 2, 3, 'Users', 'fa-users', 'auth/users', NULL, NULL, NULL),
	(4, 2, 4, 'Roles', 'fa-user', 'auth/roles', NULL, NULL, NULL),
	(5, 2, 5, 'Permission', 'fa-ban', 'auth/permissions', NULL, NULL, NULL),
	(6, 2, 6, 'Menu', 'fa-bars', 'auth/menu', NULL, NULL, NULL),
	(7, 2, 7, 'Operation log', 'fa-history', 'auth/logs', NULL, NULL, NULL),
	(8, 0, 8, '資料管理', 'fa-bars', NULL, NULL, '2023-06-22 22:18:24', '2023-06-22 22:18:48'),
	(9, 8, 0, '訂單管理', 'fa-file-text-o', 'orders', NULL, '2023-06-22 22:19:18', '2023-06-22 22:20:31');
/*!40000 ALTER TABLE `admin_menu` ENABLE KEYS */;

-- 正在傾印表格  yahsin.admin_operation_log 的資料：~126 rows (近似值)
/*!40000 ALTER TABLE `admin_operation_log` DISABLE KEYS */;
INSERT INTO `admin_operation_log` (`id`, `user_id`, `path`, `method`, `ip`, `input`, `created_at`, `updated_at`) VALUES
	(1, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-06-14 14:14:28', '2023-06-14 14:14:28'),
	(2, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-06-14 14:17:32', '2023-06-14 14:17:32'),
	(3, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-06-22 21:44:46', '2023-06-22 21:44:46'),
	(4, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-06-22 21:44:53', '2023-06-22 21:44:53'),
	(5, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-06-22 21:45:11', '2023-06-22 21:45:11'),
	(6, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-06-22 21:45:45', '2023-06-22 21:45:45'),
	(7, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-06-22 21:47:24', '2023-06-22 21:47:24'),
	(8, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-06-22 21:47:45', '2023-06-22 21:47:45'),
	(9, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{"_pjax":"#pjax-container"}', '2023-06-22 22:16:12', '2023-06-22 22:16:12'),
	(10, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{"_pjax":"#pjax-container"}', '2023-06-22 22:16:17', '2023-06-22 22:16:17'),
	(11, 1, 'admin/auth/menu', 'POST', '127.0.0.1', '{"parent_id":"0","title":"\\u8cc7\\u6599\\u7ba1\\u7406","icon":"fa-bars","uri":null,"roles":[null],"permission":null,"_token":"oaha0G6bdkEUWR2bOqji1qenCXjgs1oR6RxxsMBv"}', '2023-06-22 22:18:23', '2023-06-22 22:18:23'),
	(12, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-06-22 22:18:24', '2023-06-22 22:18:24'),
	(13, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-06-22 22:18:42', '2023-06-22 22:18:42'),
	(14, 1, 'admin/auth/menu', 'POST', '127.0.0.1', '{"_token":"oaha0G6bdkEUWR2bOqji1qenCXjgs1oR6RxxsMBv","_order":"[{\\"id\\":1},{\\"id\\":2,\\"children\\":[{\\"id\\":3},{\\"id\\":4},{\\"id\\":5},{\\"id\\":6},{\\"id\\":7}]},{\\"id\\":8}]"}', '2023-06-22 22:18:47', '2023-06-22 22:18:47'),
	(15, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{"_pjax":"#pjax-container"}', '2023-06-22 22:18:48', '2023-06-22 22:18:48'),
	(16, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-06-22 22:18:53', '2023-06-22 22:18:53'),
	(17, 1, 'admin/auth/menu', 'POST', '127.0.0.1', '{"parent_id":"8","title":"\\u8a02\\u55ae\\u7ba1\\u7406","icon":"fa-bars","uri":"orders","roles":[null],"permission":null,"_token":"oaha0G6bdkEUWR2bOqji1qenCXjgs1oR6RxxsMBv"}', '2023-06-22 22:19:18', '2023-06-22 22:19:18'),
	(18, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-06-22 22:19:19', '2023-06-22 22:19:19'),
	(19, 1, 'admin', 'GET', '127.0.0.1', '{"_pjax":"#pjax-container"}', '2023-06-22 22:19:29', '2023-06-22 22:19:29'),
	(20, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-06-22 22:19:31', '2023-06-22 22:19:31'),
	(21, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-06-22 22:19:34', '2023-06-22 22:19:34'),
	(22, 1, 'admin/orders', 'GET', '127.0.0.1', '{"_pjax":"#pjax-container"}', '2023-06-22 22:19:36', '2023-06-22 22:19:36'),
	(23, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{"_pjax":"#pjax-container"}', '2023-06-22 22:19:41', '2023-06-22 22:19:41'),
	(24, 1, 'admin/auth/menu/9/edit', 'GET', '127.0.0.1', '{"_pjax":"#pjax-container"}', '2023-06-22 22:19:47', '2023-06-22 22:19:47'),
	(25, 1, 'admin/auth/menu/9', 'PUT', '127.0.0.1', '{"parent_id":"8","title":"\\u8a02\\u55ae\\u7ba1\\u7406","icon":"fa-file-text-o","uri":"orders","roles":[null],"permission":null,"_token":"oaha0G6bdkEUWR2bOqji1qenCXjgs1oR6RxxsMBv","_method":"PUT","_previous_":"http:\\/\\/yahsin.tet:8080\\/admin\\/auth\\/menu"}', '2023-06-22 22:20:31', '2023-06-22 22:20:31'),
	(26, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-06-22 22:20:32', '2023-06-22 22:20:32'),
	(27, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-06-22 22:20:48', '2023-06-22 22:20:48'),
	(28, 1, 'admin/orders', 'GET', '127.0.0.1', '{"_pjax":"#pjax-container"}', '2023-06-22 22:20:51', '2023-06-22 22:20:51'),
	(29, 1, 'admin/orders/create', 'GET', '127.0.0.1', '{"_pjax":"#pjax-container"}', '2023-06-22 22:25:59', '2023-06-22 22:25:59'),
	(30, 1, 'admin/orders', 'GET', '127.0.0.1', '{"_pjax":"#pjax-container"}', '2023-06-22 22:26:16', '2023-06-22 22:26:16'),
	(31, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 22:27:12', '2023-06-22 22:27:12'),
	(32, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 22:28:19', '2023-06-22 22:28:19'),
	(33, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 22:28:34', '2023-06-22 22:28:34'),
	(34, 1, 'admin/orders/create', 'GET', '127.0.0.1', '{"_pjax":"#pjax-container"}', '2023-06-22 22:28:36', '2023-06-22 22:28:36'),
	(35, 1, 'admin/orders/create', 'GET', '127.0.0.1', '[]', '2023-06-22 22:31:55', '2023-06-22 22:31:55'),
	(36, 1, 'admin/orders', 'GET', '127.0.0.1', '{"_pjax":"#pjax-container"}', '2023-06-22 22:31:56', '2023-06-22 22:31:56'),
	(37, 1, 'admin/orders/create', 'GET', '127.0.0.1', '{"_pjax":"#pjax-container"}', '2023-06-22 22:31:58', '2023-06-22 22:31:58'),
	(38, 1, 'admin/orders/create', 'GET', '127.0.0.1', '[]', '2023-06-22 22:40:38', '2023-06-22 22:40:38'),
	(39, 1, 'admin/orders/create', 'GET', '127.0.0.1', '[]', '2023-06-22 22:41:19', '2023-06-22 22:41:19'),
	(40, 1, 'admin/orders', 'POST', '127.0.0.1', '{"status":"0","email":"tony86777525@hotmail.com.tw","address":"sssss","_token":"oaha0G6bdkEUWR2bOqji1qenCXjgs1oR6RxxsMBv"}', '2023-06-22 22:41:33', '2023-06-22 22:41:33'),
	(41, 1, 'admin/orders/create', 'GET', '127.0.0.1', '[]', '2023-06-22 22:41:36', '2023-06-22 22:41:36'),
	(42, 1, 'admin/orders/create', 'GET', '127.0.0.1', '[]', '2023-06-22 22:42:27', '2023-06-22 22:42:27'),
	(43, 1, 'admin/orders/create', 'GET', '127.0.0.1', '[]', '2023-06-22 22:42:35', '2023-06-22 22:42:35'),
	(44, 1, 'admin/orders', 'POST', '127.0.0.1', '{"status":"0","email":"tony86777525@hotmail.com.tw","address":"fefe","_token":"oaha0G6bdkEUWR2bOqji1qenCXjgs1oR6RxxsMBv"}', '2023-06-22 22:42:40', '2023-06-22 22:42:40'),
	(45, 1, 'admin/orders/create', 'GET', '127.0.0.1', '[]', '2023-06-22 22:42:41', '2023-06-22 22:42:41'),
	(46, 1, 'admin/orders/create', 'GET', '127.0.0.1', '[]', '2023-06-22 22:42:59', '2023-06-22 22:42:59'),
	(47, 1, 'admin/orders', 'POST', '127.0.0.1', '{"status":"0","email":"tony86777525@hotmail.com.tw","address":"dwd","_token":"oaha0G6bdkEUWR2bOqji1qenCXjgs1oR6RxxsMBv"}', '2023-06-22 22:43:03', '2023-06-22 22:43:03'),
	(48, 1, 'admin/orders/create', 'GET', '127.0.0.1', '[]', '2023-06-22 22:43:04', '2023-06-22 22:43:04'),
	(49, 1, 'admin/orders/create', 'GET', '127.0.0.1', '[]', '2023-06-22 22:44:11', '2023-06-22 22:44:11'),
	(50, 1, 'admin/orders', 'POST', '127.0.0.1', '{"status":"0","email":"tony86777525@hotmail.com.tw","address":"sssss","_token":"oaha0G6bdkEUWR2bOqji1qenCXjgs1oR6RxxsMBv"}', '2023-06-22 22:44:16', '2023-06-22 22:44:16'),
	(51, 1, 'admin/orders/create', 'GET', '127.0.0.1', '[]', '2023-06-22 22:44:17', '2023-06-22 22:44:17'),
	(52, 1, 'admin/orders/create', 'GET', '127.0.0.1', '[]', '2023-06-22 22:45:31', '2023-06-22 22:45:31'),
	(53, 1, 'admin/orders', 'POST', '127.0.0.1', '{"number":"20230622224531345","status":"0","email":"tony86777525@hotmail.com.tw","address":"dw","_token":"oaha0G6bdkEUWR2bOqji1qenCXjgs1oR6RxxsMBv"}', '2023-06-22 22:45:39', '2023-06-22 22:45:39'),
	(54, 1, 'admin/orders/create', 'GET', '127.0.0.1', '[]', '2023-06-22 22:45:40', '2023-06-22 22:45:40'),
	(55, 1, 'admin/orders', 'POST', '127.0.0.1', '{"number":"20230622224531345","status":"0","email":"tony86777525@hotmail.com.tw","address":"dw","_token":"oaha0G6bdkEUWR2bOqji1qenCXjgs1oR6RxxsMBv"}', '2023-06-22 22:45:52', '2023-06-22 22:45:52'),
	(56, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 22:46:25', '2023-06-22 22:46:25'),
	(57, 1, 'admin/orders/create', 'GET', '127.0.0.1', '{"_pjax":"#pjax-container"}', '2023-06-22 22:46:27', '2023-06-22 22:46:27'),
	(58, 1, 'admin/orders', 'POST', '127.0.0.1', '{"number":"20230622224627824","status":"0","email":"tony86777525@hotmail.com.tw","address":"dww","_token":"oaha0G6bdkEUWR2bOqji1qenCXjgs1oR6RxxsMBv","_previous_":"http:\\/\\/yahsin.tet:8080\\/admin\\/orders"}', '2023-06-22 22:46:32', '2023-06-22 22:46:32'),
	(59, 1, 'admin/orders/create', 'GET', '127.0.0.1', '[]', '2023-06-22 22:46:32', '2023-06-22 22:46:32'),
	(60, 1, 'admin/orders/create', 'GET', '127.0.0.1', '[]', '2023-06-22 22:46:46', '2023-06-22 22:46:46'),
	(61, 1, 'admin/orders', 'POST', '127.0.0.1', '{"number":"20230622224646502","status":"0","email":"tony86777525@hotmail.com.tw","address":"dwdw","_token":"oaha0G6bdkEUWR2bOqji1qenCXjgs1oR6RxxsMBv","_previous_":"http:\\/\\/yahsin.tet:8080\\/admin\\/orders"}', '2023-06-22 22:46:51', '2023-06-22 22:46:51'),
	(62, 1, 'admin/orders/create', 'GET', '127.0.0.1', '[]', '2023-06-22 22:46:51', '2023-06-22 22:46:51'),
	(63, 1, 'admin/orders/create', 'GET', '127.0.0.1', '[]', '2023-06-22 22:47:57', '2023-06-22 22:47:57'),
	(64, 1, 'admin/orders', 'POST', '127.0.0.1', '{"status":"0","email":"tony86777525@hotmail.com.tw","address":"eee","_token":"oaha0G6bdkEUWR2bOqji1qenCXjgs1oR6RxxsMBv"}', '2023-06-22 22:48:01', '2023-06-22 22:48:01'),
	(65, 1, 'admin/orders/create', 'GET', '127.0.0.1', '[]', '2023-06-22 22:48:02', '2023-06-22 22:48:02'),
	(66, 1, 'admin/orders/create', 'GET', '127.0.0.1', '[]', '2023-06-22 22:51:21', '2023-06-22 22:51:21'),
	(67, 1, 'admin/orders', 'POST', '127.0.0.1', '{"status":"0","email":"tony86777525@hotmail.com.tw","address":"sssss","_token":"oaha0G6bdkEUWR2bOqji1qenCXjgs1oR6RxxsMBv"}', '2023-06-22 22:51:26', '2023-06-22 22:51:26'),
	(68, 1, 'admin/orders/create', 'GET', '127.0.0.1', '[]', '2023-06-22 22:51:26', '2023-06-22 22:51:26'),
	(69, 1, 'admin/orders', 'POST', '127.0.0.1', '{"status":"0","email":"tony86777525@hotmail.com.tw","address":"sssss","_token":"oaha0G6bdkEUWR2bOqji1qenCXjgs1oR6RxxsMBv"}', '2023-06-22 22:52:04', '2023-06-22 22:52:04'),
	(70, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 22:52:05', '2023-06-22 22:52:05'),
	(71, 1, 'admin/orders/1/edit', 'GET', '127.0.0.1', '{"_pjax":"#pjax-container"}', '2023-06-22 22:53:10', '2023-06-22 22:53:10'),
	(72, 1, 'admin/orders', 'GET', '127.0.0.1', '{"_pjax":"#pjax-container"}', '2023-06-22 22:53:12', '2023-06-22 22:53:12'),
	(73, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 22:53:28', '2023-06-22 22:53:28'),
	(74, 1, 'admin/orders/1/edit', 'GET', '127.0.0.1', '{"_pjax":"#pjax-container"}', '2023-06-22 22:53:29', '2023-06-22 22:53:29'),
	(75, 1, 'admin/orders', 'GET', '127.0.0.1', '{"_pjax":"#pjax-container"}', '2023-06-22 22:53:31', '2023-06-22 22:53:31'),
	(76, 1, 'admin/orders/create', 'GET', '127.0.0.1', '{"_pjax":"#pjax-container"}', '2023-06-22 22:53:32', '2023-06-22 22:53:32'),
	(77, 1, 'admin/orders', 'POST', '127.0.0.1', '{"status":"0","email":"tony867775251@hotmail.com.tw","address":"ewewr","_token":"oaha0G6bdkEUWR2bOqji1qenCXjgs1oR6RxxsMBv","_previous_":"http:\\/\\/yahsin.tet:8080\\/admin\\/orders"}', '2023-06-22 22:53:41', '2023-06-22 22:53:41'),
	(78, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 22:53:41', '2023-06-22 22:53:41'),
	(79, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 22:54:04', '2023-06-22 22:54:04'),
	(80, 1, 'admin/orders/create', 'GET', '127.0.0.1', '{"_pjax":"#pjax-container"}', '2023-06-22 22:54:14', '2023-06-22 22:54:14'),
	(81, 1, 'admin/orders', 'POST', '127.0.0.1', '{"status":"0","email":"tony86777525@hotmail.com.tw","address":"sssss","_token":"oaha0G6bdkEUWR2bOqji1qenCXjgs1oR6RxxsMBv","_previous_":"http:\\/\\/yahsin.tet:8080\\/admin\\/orders"}', '2023-06-22 22:54:22', '2023-06-22 22:54:22'),
	(82, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 22:54:23', '2023-06-22 22:54:23'),
	(83, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 22:54:36', '2023-06-22 22:54:36'),
	(84, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 22:55:18', '2023-06-22 22:55:18'),
	(85, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 22:55:30', '2023-06-22 22:55:30'),
	(86, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 22:56:56', '2023-06-22 22:56:56'),
	(87, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 22:58:51', '2023-06-22 22:58:51'),
	(88, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 23:00:05', '2023-06-22 23:00:05'),
	(89, 1, 'admin/orders/2/edit', 'GET', '127.0.0.1', '{"_pjax":"#pjax-container"}', '2023-06-22 23:00:08', '2023-06-22 23:00:08'),
	(90, 1, 'admin/orders/2', 'PUT', '127.0.0.1', '{"status":"0","email":"b@gmail.com","address":"\\u65b0\\u5317\\u5e02\\u677f\\u6a4b\\u5340","_token":"oaha0G6bdkEUWR2bOqji1qenCXjgs1oR6RxxsMBv","_method":"PUT","_previous_":"http:\\/\\/yahsin.tet:8080\\/admin\\/orders"}', '2023-06-22 23:00:20', '2023-06-22 23:00:20'),
	(91, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 23:00:21', '2023-06-22 23:00:21'),
	(92, 1, 'admin/orders/3/edit', 'GET', '127.0.0.1', '{"_pjax":"#pjax-container"}', '2023-06-22 23:00:24', '2023-06-22 23:00:24'),
	(93, 1, 'admin/orders/3', 'PUT', '127.0.0.1', '{"status":"0","email":"c@gmail.com","address":"\\u65b0\\u5317\\u5e02\\u677f\\u6a4b\\u5340","_token":"oaha0G6bdkEUWR2bOqji1qenCXjgs1oR6RxxsMBv","_method":"PUT","_previous_":"http:\\/\\/yahsin.tet:8080\\/admin\\/orders"}', '2023-06-22 23:00:32', '2023-06-22 23:00:32'),
	(94, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 23:00:33', '2023-06-22 23:00:33'),
	(95, 1, 'admin/orders/create', 'GET', '127.0.0.1', '{"_pjax":"#pjax-container"}', '2023-06-22 23:01:57', '2023-06-22 23:01:57'),
	(96, 1, 'admin/orders/create', 'GET', '127.0.0.1', '[]', '2023-06-22 23:02:08', '2023-06-22 23:02:08'),
	(97, 1, 'admin/orders', 'GET', '127.0.0.1', '{"_pjax":"#pjax-container"}', '2023-06-22 23:02:12', '2023-06-22 23:02:12'),
	(98, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 23:03:21', '2023-06-22 23:03:21'),
	(99, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 23:05:06', '2023-06-22 23:05:06'),
	(100, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 23:06:18', '2023-06-22 23:06:18'),
	(101, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 23:06:23', '2023-06-22 23:06:23'),
	(102, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 23:06:44', '2023-06-22 23:06:44'),
	(103, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 23:09:02', '2023-06-22 23:09:02'),
	(104, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 23:09:09', '2023-06-22 23:09:09'),
	(105, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 23:20:27', '2023-06-22 23:20:27'),
	(106, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 23:21:29', '2023-06-22 23:21:29'),
	(107, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 23:21:39', '2023-06-22 23:21:39'),
	(108, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 23:21:51', '2023-06-22 23:21:51'),
	(109, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 23:22:00', '2023-06-22 23:22:00'),
	(110, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 23:22:17', '2023-06-22 23:22:17'),
	(111, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 23:22:27', '2023-06-22 23:22:27'),
	(112, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 23:22:35', '2023-06-22 23:22:35'),
	(113, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 23:22:40', '2023-06-22 23:22:40'),
	(114, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 23:22:46', '2023-06-22 23:22:46'),
	(115, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 23:24:56', '2023-06-22 23:24:56'),
	(116, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 23:25:15', '2023-06-22 23:25:15'),
	(117, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 23:26:58', '2023-06-22 23:26:58'),
	(118, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 23:27:13', '2023-06-22 23:27:13'),
	(119, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 23:28:00', '2023-06-22 23:28:00'),
	(120, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 23:28:06', '2023-06-22 23:28:06'),
	(121, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 23:28:42', '2023-06-22 23:28:42'),
	(122, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 23:29:18', '2023-06-22 23:29:18'),
	(123, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 23:29:26', '2023-06-22 23:29:26'),
	(124, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 23:29:51', '2023-06-22 23:29:51'),
	(125, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-22 23:29:57', '2023-06-22 23:29:57'),
	(126, 1, 'admin/orders', 'GET', '127.0.0.1', '[]', '2023-06-23 12:46:35', '2023-06-23 12:46:35');
/*!40000 ALTER TABLE `admin_operation_log` ENABLE KEYS */;

-- 正在傾印表格  yahsin.admin_permissions 的資料：~5 rows (近似值)
/*!40000 ALTER TABLE `admin_permissions` DISABLE KEYS */;
INSERT INTO `admin_permissions` (`id`, `name`, `slug`, `http_method`, `http_path`, `created_at`, `updated_at`) VALUES
	(1, 'All permission', '*', '', '*', NULL, NULL),
	(2, 'Dashboard', 'dashboard', 'GET', '/', NULL, NULL),
	(3, 'Login', 'auth.login', '', '/auth/login\r\n/auth/logout', NULL, NULL),
	(4, 'User setting', 'auth.setting', 'GET,PUT', '/auth/setting', NULL, NULL),
	(5, 'Auth management', 'auth.management', '', '/auth/roles\r\n/auth/permissions\r\n/auth/menu\r\n/auth/logs', NULL, NULL);
/*!40000 ALTER TABLE `admin_permissions` ENABLE KEYS */;

-- 正在傾印表格  yahsin.admin_roles 的資料：~0 rows (近似值)
/*!40000 ALTER TABLE `admin_roles` DISABLE KEYS */;
INSERT INTO `admin_roles` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
	(1, 'Administrator', 'administrator', '2023-06-14 14:14:10', '2023-06-14 14:14:10');
/*!40000 ALTER TABLE `admin_roles` ENABLE KEYS */;

-- 正在傾印表格  yahsin.admin_role_menu 的資料：~0 rows (近似值)
/*!40000 ALTER TABLE `admin_role_menu` DISABLE KEYS */;
INSERT INTO `admin_role_menu` (`role_id`, `menu_id`, `created_at`, `updated_at`) VALUES
	(1, 2, NULL, NULL);
/*!40000 ALTER TABLE `admin_role_menu` ENABLE KEYS */;

-- 正在傾印表格  yahsin.admin_role_permissions 的資料：~0 rows (近似值)
/*!40000 ALTER TABLE `admin_role_permissions` DISABLE KEYS */;
INSERT INTO `admin_role_permissions` (`role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
	(1, 1, NULL, NULL);
/*!40000 ALTER TABLE `admin_role_permissions` ENABLE KEYS */;

-- 正在傾印表格  yahsin.admin_role_users 的資料：~0 rows (近似值)
/*!40000 ALTER TABLE `admin_role_users` DISABLE KEYS */;
INSERT INTO `admin_role_users` (`role_id`, `user_id`, `created_at`, `updated_at`) VALUES
	(1, 1, NULL, NULL);
/*!40000 ALTER TABLE `admin_role_users` ENABLE KEYS */;

-- 正在傾印表格  yahsin.admin_users 的資料：~0 rows (近似值)
/*!40000 ALTER TABLE `admin_users` DISABLE KEYS */;
INSERT INTO `admin_users` (`id`, `username`, `password`, `name`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'admin', '$2y$10$9rVSzRGLIELcSBFplwWULO4OeuR8J8jSBXTBJGYWy0oFfYSrI7nt.', 'Administrator', NULL, 'JiRgfUxKzUR6Urzj4LUqlrHe37O3JLK5bt7l8OYRQfibMGRNQAzAyVQ32BlJ', '2023-06-14 14:14:10', '2023-06-14 14:14:10');
/*!40000 ALTER TABLE `admin_users` ENABLE KEYS */;

-- 正在傾印表格  yahsin.admin_user_permissions 的資料：~0 rows (近似值)
/*!40000 ALTER TABLE `admin_user_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin_user_permissions` ENABLE KEYS */;

-- 正在傾印表格  yahsin.failed_jobs 的資料：~0 rows (近似值)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- 正在傾印表格  yahsin.migrations 的資料：~5 rows (近似值)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2016_01_04_173148_create_admin_tables', 1),
	(4, '2019_08_19_000000_create_failed_jobs_table', 1),
	(5, '2019_12_14_000001_create_personal_access_tokens_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- 正在傾印表格  yahsin.password_reset_tokens 的資料：~0 rows (近似值)
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;

-- 正在傾印表格  yahsin.personal_access_tokens 的資料：~0 rows (近似值)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- 正在傾印表格  yahsin.users 的資料：~0 rows (近似值)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- 正在傾印表格  yahsin.ys_orders 的資料：~3 rows (近似值)
/*!40000 ALTER TABLE `ys_orders` DISABLE KEYS */;
INSERT INTO `ys_orders` (`id`, `number`, `status`, `name`, `email`, `address`, `created_at`, `updated_at`) VALUES
	(1, '20230622225204306', 0, 'a', 'a@gmail.com', '新北市板橋區', '1687445524', '1687445524'),
	(2, '20230622230021760', 0, 'b', 'b@gmail.com', '新北市板橋區', '1687445621', '1687446021'),
	(3, '20230622230033847', 0, 'c', 'c@gmail.com', '新北市板橋區', '1687445662', '1687446033');
/*!40000 ALTER TABLE `ys_orders` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
