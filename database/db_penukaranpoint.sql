-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for db_penukaranpoin
CREATE DATABASE IF NOT EXISTS `db_penukaranpoin` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_penukaranpoin`;

-- Dumping structure for table db_penukaranpoin.carts
CREATE TABLE IF NOT EXISTS `carts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `detail_transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `carts_product_id_foreign` (`product_id`),
  KEY `carts_user_id_foreign` (`user_id`),
  CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_penukaranpoin.carts: ~14 rows (approximately)
/*!40000 ALTER TABLE `carts` DISABLE KEYS */;
INSERT INTO `carts` (`id`, `product_id`, `user_id`, `detail_transaction_id`, `created_at`, `updated_at`) VALUES
	(1, 2, 1, '3', '2021-06-19 04:38:32', '2021-06-19 04:38:39'),
	(2, 5, 1, '3', '2021-06-19 04:38:34', '2021-06-19 04:38:39'),
	(3, 6, 1, '4', '2021-06-19 04:39:38', '2021-06-19 04:39:42'),
	(4, 5, 2, '7', '2021-06-19 08:42:26', '2021-06-19 08:42:32'),
	(5, 17, 2, '8', '2021-06-19 09:05:40', '2021-06-19 09:05:52'),
	(6, 6, 2, '8', '2021-06-19 09:05:43', '2021-06-19 09:05:52'),
	(7, 5, 2, '8', '2021-06-19 09:05:46', '2021-06-19 09:05:52'),
	(8, 17, 2, '9', '2021-06-19 09:06:37', '2021-06-19 09:06:43'),
	(9, 33, 2, '9', '2021-06-19 09:06:39', '2021-06-19 09:06:43'),
	(10, 28, 2, '10', '2021-06-19 09:06:46', '2021-06-19 09:06:55'),
	(11, 25, 2, '10', '2021-06-19 09:06:48', '2021-06-19 09:06:55'),
	(12, 8, 2, '10', '2021-06-19 09:06:50', '2021-06-19 09:06:55'),
	(13, 30, 2, '11', '2021-06-19 09:06:59', '2021-06-19 09:07:25'),
	(14, 33, 2, '11', '2021-06-19 09:07:00', '2021-06-19 09:07:25');
/*!40000 ALTER TABLE `carts` ENABLE KEYS */;

-- Dumping structure for table db_penukaranpoin.detail_gifts
CREATE TABLE IF NOT EXISTS `detail_gifts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `users_id` bigint(20) unsigned NOT NULL,
  `gift_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `point` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'processing',
  PRIMARY KEY (`id`),
  KEY `detail_gifts_users_id_foreign` (`users_id`),
  KEY `detail_gifts_gift_id_foreign` (`gift_id`),
  CONSTRAINT `detail_gifts_gift_id_foreign` FOREIGN KEY (`gift_id`) REFERENCES `gifts` (`id`) ON DELETE CASCADE,
  CONSTRAINT `detail_gifts_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_penukaranpoin.detail_gifts: ~7 rows (approximately)
/*!40000 ALTER TABLE `detail_gifts` DISABLE KEYS */;
INSERT INTO `detail_gifts` (`id`, `users_id`, `gift_id`, `created_at`, `updated_at`, `point`, `status`) VALUES
	(33, 1, 2, '2021-06-19 07:52:56', '2021-06-19 08:54:32', '2', 'success'),
	(34, 1, 2, '2021-06-19 07:52:57', '2021-06-19 07:52:57', '2', 'processing'),
	(37, 1, 3, '2021-06-19 09:11:06', '2021-06-19 09:11:06', '1', 'processing'),
	(38, 1, 3, '2021-06-19 09:11:07', '2021-06-19 09:11:07', '1', 'processing'),
	(39, 1, 4, '2021-06-19 09:11:09', '2021-06-19 09:11:09', '5', 'processing'),
	(40, 1, 4, '2021-06-19 09:11:10', '2021-06-19 09:11:10', '5', 'processing'),
	(41, 1, 4, '2021-06-19 09:11:10', '2021-06-19 09:11:10', '5', 'processing');
/*!40000 ALTER TABLE `detail_gifts` ENABLE KEYS */;

-- Dumping structure for table db_penukaranpoin.detail_transactions
CREATE TABLE IF NOT EXISTS `detail_transactions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `transaction_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `detail_transactions_user_id_foreign` (`user_id`),
  KEY `detail_transactions_transaction_id_foreign` (`transaction_id`),
  CONSTRAINT `detail_transactions_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `detail_transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_penukaranpoin.detail_transactions: ~9 rows (approximately)
/*!40000 ALTER TABLE `detail_transactions` DISABLE KEYS */;
INSERT INTO `detail_transactions` (`id`, `user_id`, `transaction_id`, `created_at`, `updated_at`) VALUES
	(2, 1, 2, '2021-06-18 10:24:02', '2021-06-18 10:24:02'),
	(3, 1, 3, '2021-06-19 04:38:39', '2021-06-19 04:38:39'),
	(4, 1, 4, '2021-06-19 04:39:42', '2021-06-19 04:39:42'),
	(5, 1, 5, '2021-06-19 04:39:42', '2021-06-19 04:39:42'),
	(6, 1, 6, '2021-06-19 04:39:42', '2021-06-19 04:39:42'),
	(8, 1, 10, '2021-06-19 09:05:51', '2021-06-19 09:05:51'),
	(9, 1, 11, '2021-06-19 09:06:43', '2021-06-19 09:06:43'),
	(10, 1, 12, '2021-06-19 09:06:55', '2021-06-19 09:06:55'),
	(11, 1, 13, '2021-06-19 09:07:25', '2021-06-19 09:07:25');
/*!40000 ALTER TABLE `detail_transactions` ENABLE KEYS */;

-- Dumping structure for table db_penukaranpoin.failed_jobs
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

-- Dumping data for table db_penukaranpoin.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table db_penukaranpoin.gifts
CREATE TABLE IF NOT EXISTS `gifts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `point` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_penukaranpoin.gifts: ~4 rows (approximately)
/*!40000 ALTER TABLE `gifts` DISABLE KEYS */;
INSERT INTO `gifts` (`id`, `name`, `image`, `point`, `qty`, `created_at`, `updated_at`) VALUES
	(1, 'meja', 'cidQt9sSqntK51RcisDxZKcFNlPa9lbvcWeWAvZ2.png', '25', '1', '2021-06-18 08:53:41', '2021-06-19 07:52:18'),
	(2, 'kursi', '7bBOf7uUVi1SaBp83ko7mBufNHDDKjYWaGX4xKn2.png', '2', '5', '2021-06-18 08:53:59', '2021-06-19 09:03:16'),
	(3, 'buku', '7bBOf7uUVi1SaBp83ko7mBufNHDDKjYWaGX4xKn2.png', '1', '18', '2021-06-18 08:53:59', '2021-06-19 09:11:07'),
	(4, 'baju', '7bBOf7uUVi1SaBp83ko7mBufNHDDKjYWaGX4xKn2.png', '5', '7', '2021-06-18 08:53:59', '2021-06-19 09:11:10'),
	(5, 'sepatu', '7bBOf7uUVi1SaBp83ko7mBufNHDDKjYWaGX4xKn2.png', '3', '0', '2021-06-18 08:53:59', '2021-06-19 09:03:16');
/*!40000 ALTER TABLE `gifts` ENABLE KEYS */;

-- Dumping structure for table db_penukaranpoin.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_penukaranpoin.migrations: ~9 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2021_06_18_025624_create_permission_tables', 1),
	(5, '2021_06_18_032646_create_products_table', 1),
	(6, '2021_06_18_032917_create_transactions_table', 1),
	(7, '2021_06_18_032923_create_detail_transactions_table', 1),
	(8, '2021_06_18_032931_create_gifts_table', 1),
	(9, '2021_06_18_033000_create_detail_gifts_table', 1),
	(14, '2021_06_18_084647_add_point_to_detail_gift', 2),
	(15, '2021_06_18_093348_create_carts_table', 2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table db_penukaranpoin.model_has_permissions
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_penukaranpoin.model_has_permissions: ~0 rows (approximately)
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;

-- Dumping structure for table db_penukaranpoin.model_has_roles
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_penukaranpoin.model_has_roles: ~2 rows (approximately)
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
	(2, 'App\\Models\\User', 1),
	(1, 'App\\Models\\User', 2);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;

-- Dumping structure for table db_penukaranpoin.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_penukaranpoin.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table db_penukaranpoin.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_penukaranpoin.permissions: ~0 rows (approximately)
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;

-- Dumping structure for table db_penukaranpoin.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_penukaranpoin.products: ~43 rows (approximately)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `name`, `price`, `image`, `slug`, `created_at`, `updated_at`) VALUES
	(1, 'baju nikah 1', '2', 'Etmk4cJAUvPUhOrZup47kymPGkFXh2zLkXuclRsp.png', 'baju-nikah-1', '2021-06-18 08:04:43', '2021-06-18 08:21:54'),
	(2, 'baju nikah 2', '250', '87yiTGTqnDKxXx4CeHt3Q4S6xgItfemimoWgBmyy.jpg', 'baju-nikah-2', '2021-06-18 08:07:55', '2021-06-18 08:22:17'),
	(5, 'baju nikah 3', '2000', '76Cx9exVHbf5W7GZLJVwBT272jV6x9mZg0sgMAQn.png', 'baju-nikah-3', '2021-06-18 08:19:28', '2021-06-18 08:23:01'),
	(6, 'Queen Williamson', '100', '76Cx9exVHbf5W7GZLJVwBT272jV6x9mZg0sgMAQn.png', 'jamil-rice', '2021-06-18 09:27:00', '2021-06-18 09:27:00'),
	(7, 'Mariela Pacocha V', '100', '76Cx9exVHbf5W7GZLJVwBT272jV6x9mZg0sgMAQn.png', 'gust-cormier', '2021-06-18 09:27:00', '2021-06-18 09:27:00'),
	(8, 'Mr. Michael Labadie Sr.', '100', '76Cx9exVHbf5W7GZLJVwBT272jV6x9mZg0sgMAQn.png', 'mr-davonte-wunsch-jr', '2021-06-18 09:27:01', '2021-06-18 09:27:01'),
	(9, 'Dejon Raynor V', '100', '76Cx9exVHbf5W7GZLJVwBT272jV6x9mZg0sgMAQn.png', 'tyson-gaylord', '2021-06-18 09:27:01', '2021-06-18 09:27:01'),
	(10, 'Ms. Duane Spencer', '100', '76Cx9exVHbf5W7GZLJVwBT272jV6x9mZg0sgMAQn.png', 'adelbert-goodwin', '2021-06-18 09:27:01', '2021-06-18 09:27:01'),
	(11, 'Dr. Adele Hagenes', '100', '76Cx9exVHbf5W7GZLJVwBT272jV6x9mZg0sgMAQn.png', 'jennings-heller', '2021-06-18 09:27:01', '2021-06-18 09:27:01'),
	(12, 'Jessika Goldner', '100', '76Cx9exVHbf5W7GZLJVwBT272jV6x9mZg0sgMAQn.png', 'tabitha-kris-iii', '2021-06-18 09:27:01', '2021-06-18 09:27:01'),
	(13, 'Dr. Alice Howe', '100', '76Cx9exVHbf5W7GZLJVwBT272jV6x9mZg0sgMAQn.png', 'dr-laisha-mccullough', '2021-06-18 09:27:01', '2021-06-18 09:27:01'),
	(14, 'Karlee McDermott I', '100', '76Cx9exVHbf5W7GZLJVwBT272jV6x9mZg0sgMAQn.png', 'prof-juston-anderson-sr', '2021-06-18 09:27:01', '2021-06-18 09:27:01'),
	(15, 'Prof. Kennedy Runte', '100', '76Cx9exVHbf5W7GZLJVwBT272jV6x9mZg0sgMAQn.png', 'missouri-price', '2021-06-18 09:27:01', '2021-06-18 09:27:01'),
	(16, 'Flossie Mante', '100', '76Cx9exVHbf5W7GZLJVwBT272jV6x9mZg0sgMAQn.png', 'dr-hallie-hartmann-iii', '2021-06-18 09:27:09', '2021-06-18 09:27:09'),
	(17, 'Watson Cassin', '100', '76Cx9exVHbf5W7GZLJVwBT272jV6x9mZg0sgMAQn.png', 'jerome-wilkinson', '2021-06-18 09:27:10', '2021-06-18 09:27:10'),
	(18, 'Jana Hand', '100', '76Cx9exVHbf5W7GZLJVwBT272jV6x9mZg0sgMAQn.png', 'ms-minnie-schulist-iii', '2021-06-18 09:27:10', '2021-06-18 09:27:10'),
	(19, 'Dr. Spencer Doyle', '100', '76Cx9exVHbf5W7GZLJVwBT272jV6x9mZg0sgMAQn.png', 'alexandrine-gottlieb', '2021-06-18 09:27:10', '2021-06-18 09:27:10'),
	(20, 'Orion Tromp', '100', '76Cx9exVHbf5W7GZLJVwBT272jV6x9mZg0sgMAQn.png', 'nya-treutel', '2021-06-18 09:27:10', '2021-06-18 09:27:10'),
	(21, 'Elizabeth Huels', '100', '76Cx9exVHbf5W7GZLJVwBT272jV6x9mZg0sgMAQn.png', 'taylor-gutmann', '2021-06-18 09:27:10', '2021-06-18 09:27:10'),
	(22, 'Audrey Block', '100', '76Cx9exVHbf5W7GZLJVwBT272jV6x9mZg0sgMAQn.png', 'mr-hoyt-gusikowski-ii', '2021-06-18 09:27:10', '2021-06-18 09:27:10'),
	(23, 'Dr. Bradford Schimmel Jr.', '100', '76Cx9exVHbf5W7GZLJVwBT272jV6x9mZg0sgMAQn.png', 'dr-estrella-larson-i', '2021-06-18 09:27:10', '2021-06-18 09:27:10'),
	(24, 'Rosamond Kutch', '100', '76Cx9exVHbf5W7GZLJVwBT272jV6x9mZg0sgMAQn.png', 'lindsey-schaefer', '2021-06-18 09:27:10', '2021-06-18 09:27:10'),
	(25, 'Yesenia Borer', '100', '76Cx9exVHbf5W7GZLJVwBT272jV6x9mZg0sgMAQn.png', 'mr-justice-hammes', '2021-06-18 09:27:10', '2021-06-18 09:27:10'),
	(26, 'Silas McCullough', '100', '76Cx9exVHbf5W7GZLJVwBT272jV6x9mZg0sgMAQn.png', 'helena-schneider', '2021-06-18 09:27:11', '2021-06-18 09:27:11'),
	(27, 'Grayce Koepp', '100', '76Cx9exVHbf5W7GZLJVwBT272jV6x9mZg0sgMAQn.png', 'kameron-romaguera', '2021-06-18 09:27:11', '2021-06-18 09:27:11'),
	(28, 'Philip Douglas', '100', '76Cx9exVHbf5W7GZLJVwBT272jV6x9mZg0sgMAQn.png', 'selena-schumm-jr', '2021-06-18 09:27:11', '2021-06-18 09:27:11'),
	(29, 'Miss Jennifer Cole', '100', '76Cx9exVHbf5W7GZLJVwBT272jV6x9mZg0sgMAQn.png', 'ara-kunde', '2021-06-18 09:27:11', '2021-06-18 09:27:11'),
	(30, 'Velma Larkin', '100', '76Cx9exVHbf5W7GZLJVwBT272jV6x9mZg0sgMAQn.png', 'dr-adolfo-satterfield', '2021-06-18 09:27:11', '2021-06-18 09:27:11'),
	(31, 'Dr. Gwendolyn McCullough', '100', '76Cx9exVHbf5W7GZLJVwBT272jV6x9mZg0sgMAQn.png', 'karianne-williamson-iii', '2021-06-18 09:27:11', '2021-06-18 09:27:11'),
	(32, 'Pablo Abshire', '100', '76Cx9exVHbf5W7GZLJVwBT272jV6x9mZg0sgMAQn.png', 'prof-wilber-bergstrom', '2021-06-18 09:27:11', '2021-06-18 09:27:11'),
	(33, 'Noemie Harber', '100', '76Cx9exVHbf5W7GZLJVwBT272jV6x9mZg0sgMAQn.png', 'stanton-hartmann', '2021-06-18 09:27:11', '2021-06-18 09:27:11'),
	(34, 'Mrs. Elsie Lockman', '100', '76Cx9exVHbf5W7GZLJVwBT272jV6x9mZg0sgMAQn.png', 'jalyn-marvin', '2021-06-18 09:27:11', '2021-06-18 09:27:11'),
	(35, 'Dr. Emiliano Shanahan', '100', '76Cx9exVHbf5W7GZLJVwBT272jV6x9mZg0sgMAQn.png', 'johnson-powlowski', '2021-06-18 09:27:11', '2021-06-18 09:27:11'),
	(36, 'Mr. Ariel Moore Sr.', '100', '76Cx9exVHbf5W7GZLJVwBT272jV6x9mZg0sgMAQn.png', 'dr-melvina-mcglynn-md', '2021-06-18 09:27:12', '2021-06-18 09:27:12'),
	(37, 'Lea Swift', '100', '76Cx9exVHbf5W7GZLJVwBT272jV6x9mZg0sgMAQn.png', 'miss-jennifer-rosenbaum', '2021-06-18 09:27:12', '2021-06-18 09:27:12'),
	(38, 'Dr. Nyah Hackett', '100', '76Cx9exVHbf5W7GZLJVwBT272jV6x9mZg0sgMAQn.png', 'minnie-brown', '2021-06-18 09:27:13', '2021-06-18 09:27:13'),
	(39, 'Prof. Elmira Roberts', '100', '76Cx9exVHbf5W7GZLJVwBT272jV6x9mZg0sgMAQn.png', 'prof-jena-reichel-jr', '2021-06-18 09:27:13', '2021-06-18 09:27:13'),
	(40, 'Jarret Skiles', '100', '76Cx9exVHbf5W7GZLJVwBT272jV6x9mZg0sgMAQn.png', 'rhett-turner', '2021-06-18 09:27:13', '2021-06-18 09:27:13'),
	(41, 'Reina Schroeder PhD', '100', '76Cx9exVHbf5W7GZLJVwBT272jV6x9mZg0sgMAQn.png', 'elise-nader-ii', '2021-06-18 09:27:14', '2021-06-18 09:27:14'),
	(42, 'Maryam Aufderhar', '100', '76Cx9exVHbf5W7GZLJVwBT272jV6x9mZg0sgMAQn.png', 'donato-smith', '2021-06-18 09:27:14', '2021-06-18 09:27:14'),
	(43, 'Marquise Block', '100', '76Cx9exVHbf5W7GZLJVwBT272jV6x9mZg0sgMAQn.png', 'dr-german-vandervort-dds', '2021-06-18 09:27:14', '2021-06-18 09:27:14'),
	(44, 'Prof. Newell Heathcote', '100', '76Cx9exVHbf5W7GZLJVwBT272jV6x9mZg0sgMAQn.png', 'kali-wisozk', '2021-06-18 09:27:14', '2021-06-18 09:27:14'),
	(45, 'Audrey Larson', '100', '76Cx9exVHbf5W7GZLJVwBT272jV6x9mZg0sgMAQn.png', 'aida-friesen', '2021-06-18 09:27:14', '2021-06-18 09:27:14');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Dumping structure for table db_penukaranpoin.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_penukaranpoin.roles: ~2 rows (approximately)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'web', '2021-06-18 07:33:46', '2021-06-18 07:33:46'),
	(2, 'user', 'web', '2021-06-18 07:33:46', '2021-06-18 07:33:46');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping structure for table db_penukaranpoin.role_has_permissions
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_penukaranpoin.role_has_permissions: ~0 rows (approximately)
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;

-- Dumping structure for table db_penukaranpoin.transactions
CREATE TABLE IF NOT EXISTS `transactions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'processing',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_penukaranpoin.transactions: ~8 rows (approximately)
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
INSERT INTO `transactions` (`id`, `uuid`, `price`, `status`, `created_at`, `updated_at`) VALUES
	(2, '60cc744272df3', '2250', 'success', '2021-06-18 10:24:02', '2021-06-18 10:24:02'),
	(3, '60cd74cfdd07f', '2250', 'success', '2021-06-19 04:38:39', '2021-06-19 04:38:39'),
	(4, '60cd750ed304b', '100', 'success', '2021-06-19 04:39:42', '2021-06-19 04:39:42'),
	(5, '60cd750ed304b', '100', 'success', '2021-06-19 04:39:42', '2021-06-19 08:54:55'),
	(6, '60cd750ed304b', '100', 'success', '2021-06-19 04:39:42', '2021-06-19 04:39:42'),
	(10, '60cdb36fe8760', '2200', 'success', '2021-06-19 09:05:51', '2021-06-19 09:05:51'),
	(11, '60cdb3a3420f2', '200', 'success', '2021-06-19 09:06:43', '2021-06-19 09:06:43'),
	(12, '60cdb3af03e6c', '300', 'success', '2021-06-19 09:06:55', '2021-06-19 09:06:55'),
	(13, '60cdb3cd95edc', '200', 'processing', '2021-06-19 09:07:25', '2021-06-19 09:07:25');
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;

-- Dumping structure for table db_penukaranpoin.users
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_penukaranpoin.users: ~3 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'TestUser', 'testuser@mail.com', '2021-06-18 07:33:46', '$2y$10$bKe2ulnOzHTQN81rjSDuHuIu/1FLJ/.3Rfi0zKBuzhlUiJ0O6oH0e', NULL, '2021-06-18 07:33:46', '2021-06-18 07:33:46'),
	(2, 'TestAdmin', 'testadmin@mail.com', '2021-06-18 07:33:46', '$2y$10$PAgrUyxamGzTE.QQFxpyX.wYzxboSXbTYpQq0UloZe/eST9B8K0qC', NULL, '2021-06-18 07:33:46', '2021-06-18 07:33:46');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
