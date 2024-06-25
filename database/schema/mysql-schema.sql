/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
DROP TABLE IF EXISTS `abouts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `abouts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt_tag1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt_tag2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_designation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_signature` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt_tag3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `applications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `applications` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `application_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `application_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `application_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt_tag` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `banners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `banners` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `banner_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt_tag` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `blogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `blogs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `blog_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt_tag` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `banner_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_alt_tag` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `posted_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_canonical` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt_tag` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon_alt_tag` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_canonical` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clients` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `client_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt_tag` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `counters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `counters` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` int NOT NULL,
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt_tag` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `f_a_q_s`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `f_a_q_s` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `question` text COLLATE utf8mb4_unicode_ci,
  `answer` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `footers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `footers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `news_letter` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `instagram_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt_tag` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_canonical` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `headers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `headers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_alt_tag` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fav_icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon_alt_tag` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_keyword` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_canonical` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `headings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `headings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menus` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `page_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt_tag` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_canonical` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `missions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `missions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `Mission_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Mission_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Mission_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Mission_alt_tag` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `vision_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `vision_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `vision_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `vision_alt_tag` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Core_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Core_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Core_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Core_alt_tag` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint unsigned DEFAULT NULL,
  `subcategory_id` bigint unsigned DEFAULT NULL,
  `product_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt_tag` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_canonical` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_slug_unique` (`slug`),
  KEY `products_category_id_foreign` (`category_id`),
  KEY `products_subcategory_id_foreign` (`subcategory_id`),
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `products_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `staticseos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `staticseos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `meta_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_canonical` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `subcategories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subcategories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt_tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keyword` text COLLATE utf8mb4_unicode_ci,
  `meta_canonical` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subcategories_category_id_foreign` (`category_id`),
  CONSTRAINT `subcategories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `testimonials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `testimonials` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt_tag` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `user_inquiries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_inquiries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `why_choose_us`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `why_choose_us` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `why_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `why_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `why_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt_tag` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (1,'0001_01_01_000000_create_users_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (2,'0001_01_01_000001_create_cache_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (3,'0001_01_01_000002_create_jobs_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (4,'2024_05_17_084223_creating_banner',2);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (5,'2024_05_20_113232_add_status_to_banners_table',3);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (6,'2024_05_20_113717_create_personal_access_tokens_table',4);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (7,'2024_05_21_043546_create_counters_table',5);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (8,'2024_05_21_093535_add_status_to_counter_table',6);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (10,'2024_05_22_032711_creating__application',7);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (12,'2024_05_22_084802_creating_whychooseus_table',8);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (14,'2024_05_22_111938_create_why_choose_us_table',9);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (15,'2024_05_23_094606_create_clients_table',10);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (16,'2024_05_23_114109_add_status_to_clients_table',11);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (17,'2024_05_24_064436_create_testimonials_table',12);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (18,'2024_05_24_102012_create_abouts_table',13);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (19,'2024_05_27_034423_create_missions_table',14);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (20,'2024_05_27_071541_create_blogs_table',15);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (21,'2024_05_27_090517_add_status_to_blogs',16);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (22,'2024_05_28_043040_create_headers_table',17);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (23,'2024_05_28_055539_create_footers_table',18);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (25,'2024_05_28_085452_create_menus_table',19);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (26,'2024_05_28_105128_create_staticseos_table',20);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (28,'2024_05_29_032054_create_categories_table',21);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (29,'2024_05_29_054431_create_products_table',22);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (30,'2024_05_29_093602_create_headings_table',23);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (31,'2024_06_03_060334_create_subcategories_table',24);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (32,'2024_06_03_094344_update_products_category_id',25);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (33,'2024_06_03_100657_update_subcategory_category_id',26);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (34,'2024_06_06_050206_create_user_inquiries_table',27);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (35,'2024_06_11_043002_create_f_a_q_s_table',28);
INSERT INTO `abouts` (`id`, `title`, `sub_title`, `description`, `image1`, `alt_tag1`, `image2`, `alt_tag2`, `owner_name`, `owner_designation`, `owner_signature`, `alt_tag3`, `created_at`, `updated_at`) VALUES (1,'About Company','We Are Solving All of Your Business Problem','Our industry\'s business policy encompasses the strategies, guidelines, and practices that technology companies use to achieve their goals and objectives. The policies may vary depending on the company\'s size, market position, and competitive landscape. Commodo erat amet vitae consectetur consectetur feugiat.\n\nTellus viverra eu risus ut ipsum magna sed odio elit. Sed sem purus tincidunt condimentum amet condimentum massa. Nunc vel nascetur id cras.','1716620039.png','1','1716618010.png','2','Savannah Nguyen','CEO & Founder of Manit','1716617936.png','Savannah Nguyen','2024-05-24 14:23:59','2024-05-24 14:23:59');
INSERT INTO `applications` (`id`, `application_title`, `application_description`, `application_image`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (3,'Test003','Test003','1716360039.jpeg','Test003',0,'2024-05-21 14:10:39','2024-05-21 14:20:04');
INSERT INTO `applications` (`id`, `application_title`, `application_description`, `application_image`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (4,'Application 4','Application 4','1716995820.jpg','Application 4',1,'2024-05-21 14:11:49','2024-05-28 22:47:00');
INSERT INTO `applications` (`id`, `application_title`, `application_description`, `application_image`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (5,'Application 3','Application 3','1716995788.jpg','Application 3',0,'2024-05-21 14:14:59','2024-05-28 22:46:28');
INSERT INTO `applications` (`id`, `application_title`, `application_description`, `application_image`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (6,'Application 2','Application 2','1716995761.jpg','Application 2',1,'2024-05-21 14:18:51','2024-05-28 22:46:01');
INSERT INTO `applications` (`id`, `application_title`, `application_description`, `application_image`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (7,'Application 1','Application 1','1716995743.jpg','Application 1',1,'2024-05-21 14:19:33','2024-05-28 22:45:43');
INSERT INTO `banners` (`id`, `title`, `sub_title`, `description`, `banner_image`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (31,'EXAMPLE','EXAMPLE','EXAMPLE','1716995308.jpg','EXAMPLE',1,'2024-06-04 23:34:51','2024-06-04 23:34:51');
INSERT INTO `banners` (`id`, `title`, `sub_title`, `description`, `banner_image`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (35,'Test001','Test001','Test001','1716995222.jpg','Test001',1,'2024-06-04 23:34:51','2024-06-04 23:34:51');
INSERT INTO `banners` (`id`, `title`, `sub_title`, `description`, `banner_image`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (92,'Test002','Test002','Test002','1716995238.jpg','Test002',1,'2024-06-09 21:55:23','2024-06-09 21:55:23');
INSERT INTO `banners` (`id`, `title`, `sub_title`, `description`, `banner_image`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (93,'Test001','Test001','Test001','1716995222.jpg','Test001',1,'2024-06-09 21:55:23','2024-06-09 21:55:23');
INSERT INTO `blogs` (`id`, `blog_title`, `blog_slug`, `short_description`, `long_description`, `blog_image`, `alt_tag`, `status`, `banner_image`, `banner_alt_tag`, `posted_by`, `meta_title`, `meta_description`, `meta_keywords`, `meta_canonical`, `created_at`, `updated_at`) VALUES (2,'2','2','2','2','YuGKJBAu3CYDuusL0nMJVGuTofQwlPb0xyrdSSdh.png','2',1,'TG5s9CbuzjMokamTlC7PprzbyuYw4F6FWzodGTom.png','2','shakib munshi 2','2','2','2','http://127.0.0.1:8000/blogs/create','2024-05-26 18:29:51','2024-05-27 11:56:22');
INSERT INTO `blogs` (`id`, `blog_title`, `blog_slug`, `short_description`, `long_description`, `blog_image`, `alt_tag`, `status`, `banner_image`, `banner_alt_tag`, `posted_by`, `meta_title`, `meta_description`, `meta_keywords`, `meta_canonical`, `created_at`, `updated_at`) VALUES (3,'Test003','Test003 Slug','Test003 short description','Test003 long description','1iwmZ068YwFGn896EwWDQhX1FfInFhlYVCWocGLn.png','Test003 Alt tag',1,'7AiA2RUb7l29FAH33ywrnwqbbLpDVkvprAlnBZrp.png','Test003 Banner alt tag','shakib munshi','test003 Title','test003 Description','test 003 Keywords','http://127.0.0.1:8000/blogs','2024-05-27 11:14:57','2024-06-05 04:52:15');
INSERT INTO `blogs` (`id`, `blog_title`, `blog_slug`, `short_description`, `long_description`, `blog_image`, `alt_tag`, `status`, `banner_image`, `banner_alt_tag`, `posted_by`, `meta_title`, `meta_description`, `meta_keywords`, `meta_canonical`, `created_at`, `updated_at`) VALUES (4,'2','2','2','2','YuGKJBAu3CYDuusL0nMJVGuTofQwlPb0xyrdSSdh.png','2',1,'TG5s9CbuzjMokamTlC7PprzbyuYw4F6FWzodGTom.png','2','shakib munshi 2','2','2','2','http://127.0.0.1:8000/blogs/create','2024-06-05 05:14:14','2024-06-05 05:14:14');
INSERT INTO `blogs` (`id`, `blog_title`, `blog_slug`, `short_description`, `long_description`, `blog_image`, `alt_tag`, `status`, `banner_image`, `banner_alt_tag`, `posted_by`, `meta_title`, `meta_description`, `meta_keywords`, `meta_canonical`, `created_at`, `updated_at`) VALUES (5,'Test003','Test003 Slug','Test003 short description','Test003 long description','1iwmZ068YwFGn896EwWDQhX1FfInFhlYVCWocGLn.png','Test003 Alt tag',1,'7AiA2RUb7l29FAH33ywrnwqbbLpDVkvprAlnBZrp.png','Test003 Banner alt tag','shakib munshi','test003 Title','test003 Description','test 003 Keywords','http://127.0.0.1:8000/blogs','2024-06-05 05:14:14','2024-06-05 05:14:14');
INSERT INTO `blogs` (`id`, `blog_title`, `blog_slug`, `short_description`, `long_description`, `blog_image`, `alt_tag`, `status`, `banner_image`, `banner_alt_tag`, `posted_by`, `meta_title`, `meta_description`, `meta_keywords`, `meta_canonical`, `created_at`, `updated_at`) VALUES (6,'2','2','2','2','YuGKJBAu3CYDuusL0nMJVGuTofQwlPb0xyrdSSdh.png','2',1,'TG5s9CbuzjMokamTlC7PprzbyuYw4F6FWzodGTom.png','2','shakib munshi 2','2','2','2','http://127.0.0.1:8000/blogs/create','2024-06-09 11:18:18','2024-06-09 11:18:18');
INSERT INTO `blogs` (`id`, `blog_title`, `blog_slug`, `short_description`, `long_description`, `blog_image`, `alt_tag`, `status`, `banner_image`, `banner_alt_tag`, `posted_by`, `meta_title`, `meta_description`, `meta_keywords`, `meta_canonical`, `created_at`, `updated_at`) VALUES (7,'Test003','Test003 Slug','Test003 short description','Test003 long description','1iwmZ068YwFGn896EwWDQhX1FfInFhlYVCWocGLn.png','Test003 Alt tag',1,'7AiA2RUb7l29FAH33ywrnwqbbLpDVkvprAlnBZrp.png','Test003 Banner alt tag','shakib munshi','test003 Title','test003 Description','test 003 Keywords','http://127.0.0.1:8000/blogs','2024-06-09 11:18:18','2024-06-09 11:18:18');
INSERT INTO `blogs` (`id`, `blog_title`, `blog_slug`, `short_description`, `long_description`, `blog_image`, `alt_tag`, `status`, `banner_image`, `banner_alt_tag`, `posted_by`, `meta_title`, `meta_description`, `meta_keywords`, `meta_canonical`, `created_at`, `updated_at`) VALUES (8,'2','2','2','2','YuGKJBAu3CYDuusL0nMJVGuTofQwlPb0xyrdSSdh.png','2',1,'TG5s9CbuzjMokamTlC7PprzbyuYw4F6FWzodGTom.png','2','shakib munshi 2','2','2','2','http://127.0.0.1:8000/blogs/create','2024-06-09 11:18:18','2024-06-09 11:18:18');
INSERT INTO `blogs` (`id`, `blog_title`, `blog_slug`, `short_description`, `long_description`, `blog_image`, `alt_tag`, `status`, `banner_image`, `banner_alt_tag`, `posted_by`, `meta_title`, `meta_description`, `meta_keywords`, `meta_canonical`, `created_at`, `updated_at`) VALUES (9,'Test003','Test003 Slug','Test003 short description','Test003 long description','1iwmZ068YwFGn896EwWDQhX1FfInFhlYVCWocGLn.png','Test003 Alt tag',1,'7AiA2RUb7l29FAH33ywrnwqbbLpDVkvprAlnBZrp.png','Test003 Banner alt tag','shakib munshi','test003 Title','test003 Description','test 003 Keywords','http://127.0.0.1:8000/blogs','2024-06-09 11:18:18','2024-06-09 11:18:18');
INSERT INTO `categories` (`id`, `name`, `slug`, `image`, `alt_tag`, `icon`, `icon_alt_tag`, `meta_title`, `meta_description`, `meta_keyword`, `meta_canonical`, `status`, `created_at`, `updated_at`) VALUES (2,'name','slug','iRQRW1754OaNyUJy8blua7ruLyVl1XsJDQ3lpM14.png','alt tag','8GHAPC98nApyhNyXJyNByNPav9oWkN7TSYqq4c8l.jpg','icon alt tag','title','description','keyword','http://127.0.0.1:8000/blogs/create',1,'2024-05-28 12:53:40','2024-05-28 13:02:43');
INSERT INTO `categories` (`id`, `name`, `slug`, `image`, `alt_tag`, `icon`, `icon_alt_tag`, `meta_title`, `meta_description`, `meta_keyword`, `meta_canonical`, `status`, `created_at`, `updated_at`) VALUES (3,'2','2','bY1OZi4Mn6Nzur3mZBee48iQSWpZkI4upfhTjtIj.jpg','2','rYM97LBdJ6ORDYwb5ZstpBCLUvEYvahv78SxAkuR.jpg','2','2','2','2','http://127.0.0.1:8000/blogs/create',1,'2024-05-28 12:59:15','2024-06-05 03:19:44');
INSERT INTO `categories` (`id`, `name`, `slug`, `image`, `alt_tag`, `icon`, `icon_alt_tag`, `meta_title`, `meta_description`, `meta_keyword`, `meta_canonical`, `status`, `created_at`, `updated_at`) VALUES (4,'3 name','3 slug','ApuIvaSo5ohgnarRDD0CT4c4mThGlfV28PyL5gA0.jpg','3 alt tag','Fatpt6qzPh6DC2P5kk1LdHcnfKfiIbaRdmzXYW0w.jpg','3 icon alt tag','3 title','3 description','3 keyword','http://127.0.0.1:8000/blogs/create001',1,'2024-05-28 13:01:57','2024-05-28 13:01:57');
INSERT INTO `categories` (`id`, `name`, `slug`, `image`, `alt_tag`, `icon`, `icon_alt_tag`, `meta_title`, `meta_description`, `meta_keyword`, `meta_canonical`, `status`, `created_at`, `updated_at`) VALUES (5,'name','Slug-007','iRQRW1754OaNyUJy8blua7ruLyVl1XsJDQ3lpM14.png','alt tag','8GHAPC98nApyhNyXJyNByNPav9oWkN7TSYqq4c8l.jpg','icon alt tag','title','description','keyword','http://127.0.0.1:8000/blogs/create',1,'2024-06-05 03:42:40','2024-06-05 03:42:40');
INSERT INTO `categories` (`id`, `name`, `slug`, `image`, `alt_tag`, `icon`, `icon_alt_tag`, `meta_title`, `meta_description`, `meta_keyword`, `meta_canonical`, `status`, `created_at`, `updated_at`) VALUES (6,'2','2-007','bY1OZi4Mn6Nzur3mZBee48iQSWpZkI4upfhTjtIj.jpg','2','rYM97LBdJ6ORDYwb5ZstpBCLUvEYvahv78SxAkuR.jpg','2','2','2','2','http://127.0.0.1:8000/blogs/create',1,'2024-06-05 03:42:40','2024-06-05 03:42:40');
INSERT INTO `categories` (`id`, `name`, `slug`, `image`, `alt_tag`, `icon`, `icon_alt_tag`, `meta_title`, `meta_description`, `meta_keyword`, `meta_canonical`, `status`, `created_at`, `updated_at`) VALUES (7,'3 name','3 slug-007','ApuIvaSo5ohgnarRDD0CT4c4mThGlfV28PyL5gA0.jpg','3 alt tag','Fatpt6qzPh6DC2P5kk1LdHcnfKfiIbaRdmzXYW0w.jpg','3 icon alt tag','3 title','3 description','3 keyword','http://127.0.0.1:8000/blogs/create001',1,'2024-06-05 03:42:40','2024-06-05 03:42:40');
INSERT INTO `clients` (`id`, `client_image`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (1,'1716996197.png','Test - 1',1,'2024-05-22 18:22:46','2024-05-28 22:53:17');
INSERT INTO `clients` (`id`, `client_image`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (3,'1716996211.png','Example - 2',1,'2024-05-28 22:53:31','2024-05-28 22:53:31');
INSERT INTO `clients` (`id`, `client_image`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (4,'1716996222.png','Test 3',1,'2024-05-28 22:53:42','2024-05-28 22:53:42');
INSERT INTO `clients` (`id`, `client_image`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (5,'1716996197.png','Test - 1',1,'2024-06-05 01:59:38','2024-06-05 01:59:38');
INSERT INTO `clients` (`id`, `client_image`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (6,'1716996211.png','Example - 2',1,'2024-06-05 01:59:38','2024-06-05 01:59:38');
INSERT INTO `clients` (`id`, `client_image`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (7,'1716996222.png','Test 3',1,'2024-06-05 01:59:38','2024-06-05 01:59:38');
INSERT INTO `clients` (`id`, `client_image`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (8,'1716996197.png','Test - 1',1,'2024-06-09 11:07:04','2024-06-09 11:07:04');
INSERT INTO `clients` (`id`, `client_image`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (9,'1716996211.png','Example - 2',1,'2024-06-09 11:07:04','2024-06-09 11:07:04');
INSERT INTO `clients` (`id`, `client_image`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (10,'1716996222.png','Test 3',1,'2024-06-09 11:07:04','2024-06-09 11:07:04');
INSERT INTO `clients` (`id`, `client_image`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (11,'1716996197.png','Test - 1',1,'2024-06-09 11:07:04','2024-06-09 11:07:04');
INSERT INTO `clients` (`id`, `client_image`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (12,'1716996211.png','Example - 2',1,'2024-06-09 11:07:04','2024-06-09 11:07:04');
INSERT INTO `clients` (`id`, `client_image`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (13,'1716996222.png','Test 3',1,'2024-06-09 11:07:04','2024-06-09 11:07:04');
INSERT INTO `counters` (`id`, `title`, `number`, `icon`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (6,'Final test',22,'1716283153.png','Final test',0,'2024-05-20 16:48:08','2024-05-20 18:05:30');
INSERT INTO `counters` (`id`, `title`, `number`, `icon`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (7,'Counter - 5',21,'1716995592.svg','Counter - 5 Alt Tag',1,'2024-05-20 17:14:37','2024-05-28 22:43:39');
INSERT INTO `counters` (`id`, `title`, `number`, `icon`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (9,'Counter - 4',9,'1716995532.svg','Counter - 4 Alt Tag',0,'2024-05-20 18:07:27','2024-05-28 22:42:12');
INSERT INTO `counters` (`id`, `title`, `number`, `icon`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (11,'Counter - 3',30,'1716995508.svg','Counter - 3 Alt Tag',1,'2024-05-20 18:08:00','2024-05-28 22:42:38');
INSERT INTO `counters` (`id`, `title`, `number`, `icon`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (17,'Counter - 2',17,'1716995484.svg','Counter - 2 Alt Tag',1,'2024-05-20 18:19:44','2024-05-28 22:41:24');
INSERT INTO `counters` (`id`, `title`, `number`, `icon`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (18,'Counter - 1',26,'1716995416.svg','Counter - 1 Alt Tag',0,'2024-05-20 18:20:47','2024-05-28 22:40:56');
INSERT INTO `counters` (`id`, `title`, `number`, `icon`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (19,'Final test',22,'1716283153.png','Final test',1,'2024-06-05 00:54:20','2024-06-05 00:54:20');
INSERT INTO `counters` (`id`, `title`, `number`, `icon`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (20,'Counter - 5',21,'1716995592.svg','Counter - 5 Alt Tag',1,'2024-06-05 00:54:20','2024-06-05 00:54:20');
INSERT INTO `counters` (`id`, `title`, `number`, `icon`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (21,'Counter - 4',9,'1716995532.svg','Counter - 4 Alt Tag',1,'2024-06-05 00:54:20','2024-06-05 00:54:20');
INSERT INTO `counters` (`id`, `title`, `number`, `icon`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (22,'Counter - 3',30,'1716995508.svg','Counter - 3 Alt Tag',1,'2024-06-05 00:54:20','2024-06-05 00:54:20');
INSERT INTO `counters` (`id`, `title`, `number`, `icon`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (23,'Counter - 2',17,'1716995484.svg','Counter - 2 Alt Tag',1,'2024-06-05 00:54:20','2024-06-05 00:54:20');
INSERT INTO `counters` (`id`, `title`, `number`, `icon`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (24,'Counter - 1',26,'1716995416.svg','Counter - 1 Alt Tag',1,'2024-06-05 00:54:20','2024-06-05 00:54:20');
INSERT INTO `counters` (`id`, `title`, `number`, `icon`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (25,'Final test',22,'1716283153.png','Final test',1,'2024-06-05 06:14:22','2024-06-05 06:14:22');
INSERT INTO `counters` (`id`, `title`, `number`, `icon`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (26,'Counter - 5',21,'1716995592.svg','Counter - 5 Alt Tag',1,'2024-06-05 06:14:22','2024-06-05 06:14:22');
INSERT INTO `counters` (`id`, `title`, `number`, `icon`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (27,'Counter - 4',9,'1716995532.svg','Counter - 4 Alt Tag',1,'2024-06-05 06:14:23','2024-06-05 06:14:23');
INSERT INTO `counters` (`id`, `title`, `number`, `icon`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (28,'Counter - 3',30,'1716995508.svg','Counter - 3 Alt Tag',1,'2024-06-05 06:14:23','2024-06-05 06:14:23');
INSERT INTO `counters` (`id`, `title`, `number`, `icon`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (29,'Counter - 2',17,'1716995484.svg','Counter - 2 Alt Tag',1,'2024-06-05 06:14:24','2024-06-05 06:14:24');
INSERT INTO `counters` (`id`, `title`, `number`, `icon`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (30,'Counter - 1',26,'1716995416.svg','Counter - 1 Alt Tag',1,'2024-06-05 06:14:24','2024-06-05 06:14:24');
INSERT INTO `counters` (`id`, `title`, `number`, `icon`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (31,'Final test',22,'1716283153.png','Final test',1,'2024-06-05 06:14:25','2024-06-05 06:14:25');
INSERT INTO `counters` (`id`, `title`, `number`, `icon`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (32,'Counter - 5',21,'1716995592.svg','Counter - 5 Alt Tag',1,'2024-06-05 06:14:26','2024-06-05 06:14:26');
INSERT INTO `counters` (`id`, `title`, `number`, `icon`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (33,'Counter - 4',9,'1716995532.svg','Counter - 4 Alt Tag',1,'2024-06-05 06:14:26','2024-06-05 06:14:26');
INSERT INTO `counters` (`id`, `title`, `number`, `icon`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (34,'Counter - 3',30,'1716995508.svg','Counter - 3 Alt Tag',1,'2024-06-05 06:14:27','2024-06-05 06:14:27');
INSERT INTO `counters` (`id`, `title`, `number`, `icon`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (35,'Counter - 2',17,'1716995484.svg','Counter - 2 Alt Tag',1,'2024-06-05 06:14:27','2024-06-05 06:14:27');
INSERT INTO `counters` (`id`, `title`, `number`, `icon`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (36,'Counter - 1',26,'1716995416.svg','Counter - 1 Alt Tag',0,'2024-06-05 06:14:28','2024-06-09 01:40:10');
INSERT INTO `counters` (`id`, `title`, `number`, `icon`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (37,'Final test',22,'1716283153.png','Final test',1,'2024-06-09 01:43:07','2024-06-09 01:43:07');
INSERT INTO `counters` (`id`, `title`, `number`, `icon`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (38,'Counter - 5',21,'1716995592.svg','Counter - 5 Alt Tag',1,'2024-06-09 01:43:07','2024-06-09 01:43:07');
INSERT INTO `counters` (`id`, `title`, `number`, `icon`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (39,'Counter - 4',9,'1716995532.svg','Counter - 4 Alt Tag',1,'2024-06-09 01:43:07','2024-06-09 01:43:07');
INSERT INTO `counters` (`id`, `title`, `number`, `icon`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (40,'Counter - 3',30,'1716995508.svg','Counter - 3 Alt Tag',1,'2024-06-09 01:43:07','2024-06-09 01:43:07');
INSERT INTO `counters` (`id`, `title`, `number`, `icon`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (41,'Counter - 2',17,'1716995484.svg','Counter - 2 Alt Tag',1,'2024-06-09 01:43:07','2024-06-09 01:43:07');
INSERT INTO `counters` (`id`, `title`, `number`, `icon`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (42,'Counter - 1',26,'1716995416.svg','Counter - 1 Alt Tag',1,'2024-06-09 01:43:07','2024-06-09 01:43:07');
INSERT INTO `counters` (`id`, `title`, `number`, `icon`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (43,'Final test',22,'1716283153.png','Final test',1,'2024-06-09 01:43:07','2024-06-09 01:43:07');
INSERT INTO `counters` (`id`, `title`, `number`, `icon`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (44,'Counter - 5',21,'1716995592.svg','Counter - 5 Alt Tag',1,'2024-06-09 01:43:07','2024-06-09 01:43:07');
INSERT INTO `counters` (`id`, `title`, `number`, `icon`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (45,'Counter - 4',9,'1716995532.svg','Counter - 4 Alt Tag',1,'2024-06-09 01:43:07','2024-06-09 01:43:07');
INSERT INTO `counters` (`id`, `title`, `number`, `icon`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (46,'Counter - 3',30,'1716995508.svg','Counter - 3 Alt Tag',1,'2024-06-09 01:43:07','2024-06-09 01:43:07');
INSERT INTO `counters` (`id`, `title`, `number`, `icon`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (47,'Counter - 2',17,'1716995484.svg','Counter - 2 Alt Tag',1,'2024-06-09 01:43:08','2024-06-09 01:43:08');
INSERT INTO `counters` (`id`, `title`, `number`, `icon`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (48,'Counter - 1',26,'1716995416.svg','Counter - 1 Alt Tag',1,'2024-06-09 01:43:08','2024-06-09 01:43:08');
INSERT INTO `counters` (`id`, `title`, `number`, `icon`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (49,'Final test',22,'1716283153.png','Final test',1,'2024-06-09 01:43:08','2024-06-09 01:43:08');
INSERT INTO `counters` (`id`, `title`, `number`, `icon`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (50,'Counter - 5',21,'1716995592.svg','Counter - 5 Alt Tag',1,'2024-06-09 01:43:08','2024-06-09 01:43:08');
INSERT INTO `counters` (`id`, `title`, `number`, `icon`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (51,'Counter - 4',9,'1716995532.svg','Counter - 4 Alt Tag',1,'2024-06-09 01:43:08','2024-06-09 01:43:08');
INSERT INTO `counters` (`id`, `title`, `number`, `icon`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (52,'Counter - 3',30,'1716995508.svg','Counter - 3 Alt Tag',1,'2024-06-09 01:43:08','2024-06-09 01:43:08');
INSERT INTO `counters` (`id`, `title`, `number`, `icon`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (53,'Counter - 2',17,'1716995484.svg','Counter - 2 Alt Tag',1,'2024-06-09 01:43:08','2024-06-09 01:43:08');
INSERT INTO `counters` (`id`, `title`, `number`, `icon`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (54,'Counter - 1',26,'1716995416.svg','Counter - 1 Alt Tag',1,'2024-06-09 01:43:08','2024-06-09 01:43:08');
INSERT INTO `counters` (`id`, `title`, `number`, `icon`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (55,'Final test',22,'1716283153.png','Final test',1,'2024-06-09 01:43:08','2024-06-09 01:43:08');
INSERT INTO `counters` (`id`, `title`, `number`, `icon`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (56,'Counter - 5',21,'1716995592.svg','Counter - 5 Alt Tag',1,'2024-06-09 01:43:08','2024-06-09 01:43:08');
INSERT INTO `counters` (`id`, `title`, `number`, `icon`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (57,'Counter - 4',9,'1716995532.svg','Counter - 4 Alt Tag',1,'2024-06-09 01:43:08','2024-06-09 01:43:08');
INSERT INTO `counters` (`id`, `title`, `number`, `icon`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (58,'Counter - 3',30,'1716995508.svg','Counter - 3 Alt Tag',1,'2024-06-09 01:43:08','2024-06-09 01:43:08');
INSERT INTO `counters` (`id`, `title`, `number`, `icon`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (59,'Counter - 2',17,'1716995484.svg','Counter - 2 Alt Tag',1,'2024-06-09 01:43:08','2024-06-09 01:43:08');
INSERT INTO `counters` (`id`, `title`, `number`, `icon`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (60,'Counter - 1',26,'1716995416.svg','Counter - 1 Alt Tag',1,'2024-06-09 01:43:08','2024-06-09 01:43:08');
INSERT INTO `footers` (`id`, `news_letter`, `instagram_link`, `facebook_link`, `google_link`, `location`, `phone`, `phone2`, `email`, `email2`, `address`, `logo`, `alt_tag`, `meta_title`, `meta_description`, `meta_keyword`, `meta_canonical`, `created_at`, `updated_at`) VALUES (1,'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nesciunt iure blanditiis labore tempora inventore laborum error molestias,','#','#','#','https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.9147703055!2d-74.11976314309273!3d40.69740344223377!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sbd!4v1547528325671','8866481097','8866481097','info@gmail.com','novopack@gmail.com','7 Green Lake Street Crawfordsville, IN 47933','1716996530.svg','image','title','description','keyword','canonical',NULL,'2024-05-28 22:58:50');
INSERT INTO `headers` (`id`, `phone`, `email`, `logo`, `logo_alt_tag`, `fav_icon`, `icon_alt_tag`, `meta_title`, `meta_description`, `meta_keyword`, `meta_canonical`, `created_at`, `updated_at`) VALUES (1,'8866481097','NovoPack@gmail.com','1716996551.svg','logo001','1716996551.svg','icon001','meta title','meta description','meta keyword','meta canonical',NULL,'2024-05-29 19:16:21');
INSERT INTO `headings` (`id`, `title`, `sub_title`, `created_at`, `updated_at`) VALUES (1,'Application','Our Applications',NULL,'2024-05-28 19:15:26');
INSERT INTO `headings` (`id`, `title`, `sub_title`, `created_at`, `updated_at`) VALUES (2,'Why Choose Us','Why Choose Us',NULL,'2024-05-28 19:15:39');
INSERT INTO `headings` (`id`, `title`, `sub_title`, `created_at`, `updated_at`) VALUES (3,'Testimonial','What Our Clients Say\'s',NULL,'2024-05-28 19:15:19');
INSERT INTO `headings` (`id`, `title`, `sub_title`, `created_at`, `updated_at`) VALUES (4,'What We Offer','Our Products',NULL,NULL);
INSERT INTO `headings` (`id`, `title`, `sub_title`, `created_at`, `updated_at`) VALUES (5,'Blogs','News & Articles',NULL,NULL);
INSERT INTO `menus` (`id`, `page_name`, `slug`, `banner_image`, `alt_tag`, `meta_title`, `meta_keywords`, `meta_description`, `meta_canonical`, `status`, `created_at`, `updated_at`) VALUES (2,'Test002','002','EEB1qRpyHV7xAgLCHAy94zSFPtzNRdC3UcWDJ9q6.png','Test002','Test002','Test002','Test002','http://127.0.0.1:8000/blogs',1,'2024-05-27 18:00:50','2024-05-27 19:18:03');
INSERT INTO `menus` (`id`, `page_name`, `slug`, `banner_image`, `alt_tag`, `meta_title`, `meta_keywords`, `meta_description`, `meta_canonical`, `status`, `created_at`, `updated_at`) VALUES (3,'Test003','003','rUeYNfJtbTJrsIkFBMWRkBwORPW7puFEd65tTSWE.jpg','Test003','Test003','Test003','Test003','http://127.0.0.1:8000/blogs',0,'2024-05-27 18:12:47','2024-06-10 04:56:59');
INSERT INTO `missions` (`id`, `Mission_title`, `Mission_description`, `Mission_image`, `Mission_alt_tag`, `vision_title`, `vision_description`, `vision_image`, `vision_alt_tag`, `Core_title`, `Core_description`, `Core_image`, `Core_alt_tag`, `created_at`, `updated_at`) VALUES (1,'Test1','To pursue our commitment to continuous innovation in terms of manufacturing, technology, product design, and product quality for creating a wider market base of national and international clients.','1716792401_mission.png','Test1','Test2','To achieve the highest level of standards in manufacturing for providing a unique range of food packaging solutions to our esteemed distributors, channel partners, and institutional customers.','1716792401_vision.png','Test2','Test003','To develop and maintain the bond and trust with our Channel Partners and focus on continuous evolution for the long-term sustainability of the company by focusing on the strengths to deliver the promises.','1716792401_core.png','Test003',NULL,'2024-05-26 14:16:41');
INSERT INTO `products` (`id`, `category_id`, `subcategory_id`, `product_name`, `slug`, `description`, `image`, `alt_tag`, `meta_title`, `meta_description`, `meta_keyword`, `meta_canonical`, `status`, `created_at`, `updated_at`) VALUES (1,3,NULL,'wWw','qwqw','qwqw','Ih6NpO7arNRx6NjTM1ryQOaBwTnR7cUb0EDBAfRW.png','wqwq','wqwqw','qwqwqw','qwqw','http://127.0.0.1:8000/blogs/create',1,'2024-05-28 14:23:59','2024-05-28 17:02:16');
INSERT INTO `products` (`id`, `category_id`, `subcategory_id`, `product_name`, `slug`, `description`, `image`, `alt_tag`, `meta_title`, `meta_description`, `meta_keyword`, `meta_canonical`, `status`, `created_at`, `updated_at`) VALUES (2,2,NULL,'003','003','003','yfMjx3HRDS7Pj43k90wSrGxLXt0s1DlKeaJYUI5L.png','003','003','003','003','http://127.0.0.1:8000/blogs',1,'2024-05-28 16:23:56','2024-05-28 16:41:06');
INSERT INTO `products` (`id`, `category_id`, `subcategory_id`, `product_name`, `slug`, `description`, `image`, `alt_tag`, `meta_title`, `meta_description`, `meta_keyword`, `meta_canonical`, `status`, `created_at`, `updated_at`) VALUES (4,4,3,'DEATH STAR PRO','DEATH STAR PRO','DEATH STAR PRO','U4l93OTPaH55BAWcLqCnjc3px2UPhqwEjq4n6JUC.jpg','DEATH STAR PRO','DEATH STAR PRO','DEATH STAR PRO','DEATH STAR PRO','http://127.0.0.1:8000/blogs/create',1,'2024-06-03 04:30:40','2024-06-03 04:50:37');
INSERT INTO `products` (`id`, `category_id`, `subcategory_id`, `product_name`, `slug`, `description`, `image`, `alt_tag`, `meta_title`, `meta_description`, `meta_keyword`, `meta_canonical`, `status`, `created_at`, `updated_at`) VALUES (6,3,3,'wWw','new001','qwqw','Ih6NpO7arNRx6NjTM1ryQOaBwTnR7cUb0EDBAfRW.png','wqwq','wqwqw','qwqwqw','qwqw','http://127.0.0.1:8000/blogs/create',1,'2024-06-05 04:30:34','2024-06-05 04:30:34');
INSERT INTO `products` (`id`, `category_id`, `subcategory_id`, `product_name`, `slug`, `description`, `image`, `alt_tag`, `meta_title`, `meta_description`, `meta_keyword`, `meta_canonical`, `status`, `created_at`, `updated_at`) VALUES (7,2,3,'003','new002','003','yfMjx3HRDS7Pj43k90wSrGxLXt0s1DlKeaJYUI5L.png','003','003','003','003','http://127.0.0.1:8000/blogs',1,'2024-06-05 04:30:34','2024-06-05 04:30:34');
INSERT INTO `products` (`id`, `category_id`, `subcategory_id`, `product_name`, `slug`, `description`, `image`, `alt_tag`, `meta_title`, `meta_description`, `meta_keyword`, `meta_canonical`, `status`, `created_at`, `updated_at`) VALUES (8,4,3,'DEATH STAR PRO','new003','DEATH STAR PRO','U4l93OTPaH55BAWcLqCnjc3px2UPhqwEjq4n6JUC.jpg','DEATH STAR PRO','DEATH STAR PRO','DEATH STAR PRO','DEATH STAR PRO','http://127.0.0.1:8000/blogs/create',1,'2024-06-05 04:30:34','2024-06-05 04:30:34');
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES ('0quZAKFdvVuHkFupR2Ud4l33PUIdqEAawKZZcvRa',2,'127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:126.0) Gecko/20100101 Firefox/126.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSDFheFBsMUZtZlpuUk4wb0tvTVFjV3RId21qMnJCemU2eFZ2MGdKUSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9mYXFzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mjt9',1718084018);
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES ('8VHhp9fQ1WCpTWqniRe2ESr1Xhc4KUhKiy6tF0b1',2,'127.0.0.1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQ05SRFpUaUhpU2J0UzdWaU94NkN4VU1HYko5bTVPbGdISEFMdHl6UiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC90ZXN0aW1vbmlhbHMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO30=',1718083024);
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES ('EU2QXfV9sd0n6houI8OTrIs05knUmiCW9CdcfRA7',1,'127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:126.0) Gecko/20100101 Firefox/126.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSm1uU0s5TXFZZ2VKRUE3NFZiYWJIaDY5RzFpdDgzQXdMNGswb2czUyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=',1718082210);
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES ('mh4ftAj7rJ5PUb3rWHfgCiXsHBCwZv7WGbcdM5WZ',1,'127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:126.0) Gecko/20100101 Firefox/126.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoibkpBb3pYbHM0Y0FuREJtTTFBQ0dnWEF2Q1Zac3M3MERXdGkwS3hGZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9iYWNrdXBzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9',1718095064);
INSERT INTO `staticseos` (`id`, `meta_title`, `meta_keyword`, `meta_description`, `meta_canonical`, `created_at`, `updated_at`) VALUES (1,'Novo Pack','Novo Pack','Novo Pack','Novo Pack',NULL,'2024-05-27 18:39:49');
INSERT INTO `subcategories` (`id`, `category_id`, `name`, `slug`, `image`, `alt_tag`, `meta_title`, `meta_description`, `meta_keyword`, `meta_canonical`, `status`, `created_at`, `updated_at`) VALUES (3,4,'DEATH STAR SUB','DEATH STAR SUB','zfgahliAk2ReWy3jHphBUOKImLGmqLt7f8LXw7LW.jpg','DEATH STAR SUB','DEATH STAR SUB','DEATH STAR SUB','DEATH STAR SUB','http://127.0.0.1:8000/blogs/create',1,'2024-06-03 04:34:40','2024-06-03 21:47:58');
INSERT INTO `subcategories` (`id`, `category_id`, `name`, `slug`, `image`, `alt_tag`, `meta_title`, `meta_description`, `meta_keyword`, `meta_canonical`, `status`, `created_at`, `updated_at`) VALUES (4,4,'DEATH STAR SUB','DEATH STAR SUB','zfgahliAk2ReWy3jHphBUOKImLGmqLt7f8LXw7LW.jpg','DEATH STAR SUB','DEATH STAR SUB','DEATH STAR SUB','DEATH STAR SUB','http://127.0.0.1:8000/blogs/create',1,'2024-06-05 04:07:23','2024-06-05 04:07:23');
INSERT INTO `subcategories` (`id`, `category_id`, `name`, `slug`, `image`, `alt_tag`, `meta_title`, `meta_description`, `meta_keyword`, `meta_canonical`, `status`, `created_at`, `updated_at`) VALUES (5,4,'DEATH STAR SUB','DEATH STAR SUB','zfgahliAk2ReWy3jHphBUOKImLGmqLt7f8LXw7LW.jpg','DEATH STAR SUB','DEATH STAR SUB','DEATH STAR SUB','DEATH STAR SUB','http://127.0.0.1:8000/blogs/create',1,'2024-06-09 22:10:17','2024-06-09 22:10:17');
INSERT INTO `subcategories` (`id`, `category_id`, `name`, `slug`, `image`, `alt_tag`, `meta_title`, `meta_description`, `meta_keyword`, `meta_canonical`, `status`, `created_at`, `updated_at`) VALUES (6,4,'DEATH STAR SUB','DEATH STAR SUB','zfgahliAk2ReWy3jHphBUOKImLGmqLt7f8LXw7LW.jpg','DEATH STAR SUB','DEATH STAR SUB','DEATH STAR SUB','DEATH STAR SUB','http://127.0.0.1:8000/blogs/create',1,'2024-06-09 22:10:17','2024-06-09 22:10:17');
INSERT INTO `testimonials` (`id`, `name`, `description`, `profile_image`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (1,'Test 2','Test 2','1716996140.jpg','Test 2',1,'2024-05-23 14:59:35','2024-06-05 03:19:33');
INSERT INTO `testimonials` (`id`, `name`, `description`, `profile_image`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (3,'Example 1','Example 1','1716996096.jpg','Example 1',1,'2024-05-23 17:31:12','2024-05-28 22:51:36');
INSERT INTO `testimonials` (`id`, `name`, `description`, `profile_image`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (4,'Test 3','Test 3','1716996159.jpg','Test 3',1,'2024-05-28 22:52:39','2024-05-28 22:52:39');
INSERT INTO `testimonials` (`id`, `name`, `description`, `profile_image`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (5,'Test 2','Test 2','1716996140.jpg','Test 2',1,'2024-06-05 03:21:41','2024-06-05 03:21:41');
INSERT INTO `testimonials` (`id`, `name`, `description`, `profile_image`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (6,'Example 1','Example 1','1716996096.jpg','Example 1',1,'2024-06-05 03:21:41','2024-06-05 03:21:41');
INSERT INTO `testimonials` (`id`, `name`, `description`, `profile_image`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (7,'Test 3','Test 3','1716996159.jpg','Test 3',1,'2024-06-05 03:21:41','2024-06-05 03:21:41');
INSERT INTO `testimonials` (`id`, `name`, `description`, `profile_image`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (8,'Test 2','Test 2','1716996140.jpg','Test 2',1,'2024-06-09 11:09:47','2024-06-09 11:09:47');
INSERT INTO `testimonials` (`id`, `name`, `description`, `profile_image`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (9,'Example 1','Example 1','1716996096.jpg','Example 1',1,'2024-06-09 11:09:47','2024-06-09 11:09:47');
INSERT INTO `testimonials` (`id`, `name`, `description`, `profile_image`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (10,'Test 3','Test 3','1716996159.jpg','Test 3',1,'2024-06-09 11:09:47','2024-06-09 11:09:47');
INSERT INTO `testimonials` (`id`, `name`, `description`, `profile_image`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (11,'Test 2','Test 2','1716996140.jpg','Test 2',1,'2024-06-09 11:09:47','2024-06-09 11:09:47');
INSERT INTO `testimonials` (`id`, `name`, `description`, `profile_image`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (12,'Example 1','Example 1','1716996096.jpg','Example 1',1,'2024-06-09 11:09:47','2024-06-09 11:09:47');
INSERT INTO `testimonials` (`id`, `name`, `description`, `profile_image`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (13,'Test 3','Test 3','1716996159.jpg','Test 3',1,'2024-06-09 11:09:47','2024-06-09 11:09:47');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (1,'Dr. Lyric Marvin','(364) 765-4208','colby.lockman@example.org','Libero aspernatur repudiandae et consequuntur laboriosam. Molestiae exercitationem dignissimos modi. Nulla maiores voluptate itaque eos. Tenetur consectetur hic sunt quia.','2024-04-14 07:48:26','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (2,'Chloe Hirthe','+15404140004','ufeeney@example.org','Voluptatem optio ut ad culpa. Optio voluptate omnis tempora ipsam voluptas ea autem. Nemo dignissimos doloribus qui. Cumque aut voluptatibus et harum ipsa. Saepe rerum est sunt et totam eum rem est.','2024-09-24 13:56:59','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (3,'Clement Donnelly','951.466.8354','ywalker@example.net','Est qui incidunt sed adipisci quo dolores quisquam. Eos assumenda in id maiores dolor ullam aliquid soluta. Nihil minus eveniet aliquid.','2024-09-07 21:26:45','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (4,'Mustafa Morissette','+1.212.258.0151','donato28@example.com','Consequatur nesciunt aspernatur dolorem itaque voluptates. Dolor eaque blanditiis velit eaque ut eum sit rerum. Ut reiciendis voluptas et exercitationem modi harum. Temporibus autem sed dolore. Odio magnam vitae optio reiciendis ex.','2024-10-18 08:10:41','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (5,'Prof. Jessika Legros Jr.','+1.848.659.8919','lfahey@example.com','Nobis voluptatibus sit est sed. Similique dolorem ab ut ipsa qui aliquid. Dolorem et est quam accusamus. Ut quia ab dolores sed porro id.','2024-06-23 00:01:30','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (6,'Ricky Jacobson','(231) 903-4058','vschultz@example.com','A impedit et omnis iure totam sint eius. Quia doloribus recusandae quia ad. Suscipit sunt vel eaque et aut aut esse.','2024-12-02 12:04:44','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (7,'Madisyn Fisher DDS','212.280.9840','leilani.ankunding@example.org','Voluptatem maxime officiis reprehenderit et ea aut nulla magnam. Omnis illo qui sint perferendis dolorem. Similique consequatur autem amet laborum.','2024-04-03 04:21:24','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (8,'Haven O\'Conner','434-287-1434','smith.natalie@example.net','Qui aliquam rerum laudantium dolorem facilis. Laborum quas eaque qui. Tenetur omnis in provident non.','2024-05-07 14:52:10','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (9,'Mr. Domenico Jenkins MD','(225) 331-7163','lou.schroeder@example.org','Ea repellendus et nisi voluptas autem officiis. At ut accusantium rerum ut perferendis numquam corporis. Ipsam dolore repellendus eos molestiae provident.','2024-01-22 15:24:13','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (10,'Tess Streich','+1-689-333-7067','kamren.jerde@example.com','Consequatur asperiores incidunt ea asperiores dolorem sed. Est dolores dolore ex quisquam harum velit. Nihil aut itaque cumque hic in.','2024-04-26 15:49:42','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (11,'Kathryne Price','(661) 352-2400','wolff.rhiannon@example.com','Accusantium similique labore esse amet accusamus. Corporis illum eligendi qui qui. Est laboriosam in animi distinctio enim. Ab rerum eveniet commodi quia id.','2024-08-28 12:06:26','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (12,'Hobart Corkery V','+1 (906) 441-9805','kreiger.katlyn@example.org','Dolores pariatur enim quo. Quo veritatis fuga accusantium sit perferendis neque.','2024-06-09 11:47:32','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (13,'Mrs. Nelda Kshlerin','+14024195794','batz.letha@example.org','Eius architecto quia quod aut. Numquam temporibus aperiam voluptate voluptatem autem fugit. Delectus odit eum culpa quia mollitia consequatur pariatur.','2024-05-22 09:12:17','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (14,'Mr. Theodore Daniel','+1-857-589-2515','borer.sebastian@example.net','Inventore aut dolor id rerum quas voluptatibus aspernatur. Consequatur sunt deleniti neque quis cumque dolorem. Eveniet modi repellendus animi.','2024-09-09 04:04:57','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (15,'Payton Langworth','+1-478-480-5060','garfield36@example.org','Id cupiditate tempora officia molestiae delectus vel quia. Labore modi ea non alias. Dolore autem corrupti autem esse magnam.','2024-08-25 16:33:12','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (16,'Prof. Alessandro McLaughlin','+1-818-207-9743','fswaniawski@example.net','Officiis eum qui accusantium repudiandae omnis commodi vel. Nulla possimus blanditiis mollitia. Fugiat voluptates error odit. Eius dolorum facere in eaque. Consequatur iste quaerat blanditiis.','2024-08-27 04:14:10','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (17,'George Zulauf','1-539-626-8039','schmidt.natalia@example.com','Et nobis ipsum voluptate non incidunt fuga ea nulla. Nisi quos est ut non distinctio aut doloribus. Qui vitae qui est molestiae repellendus.','2024-08-27 10:42:20','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (18,'Kaia Heller','786-569-7170','sturner@example.com','Temporibus autem omnis repellat ut non tempora. Et consequatur ipsum est eos consequatur labore. Et autem iusto est.','2024-10-10 22:22:44','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (19,'Mary Hegmann','1-364-434-6185','tfeeney@example.net','Inventore quae ad eos occaecati. Rerum et et eius blanditiis maxime iusto est. Quia ex eos vitae blanditiis.','2024-10-23 11:18:47','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (20,'Beth Stokes','+1 (680) 201-7360','mack87@example.net','Enim dignissimos voluptas accusantium. Maxime eius sed nobis alias porro et. Incidunt est temporibus maiores reiciendis ea.','2024-06-26 04:35:07','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (21,'Abbey Senger','+13053344205','jacobson.demario@example.com','Non quaerat ducimus in sint labore. Neque veritatis ut quae veniam in vero rerum. Saepe voluptatem voluptatem neque ut harum aut. Et earum ut reprehenderit qui et voluptatem quisquam.','2024-08-12 08:03:30','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (22,'Rashawn Abbott','+1-951-721-2360','hamill.haleigh@example.com','Ut et cum qui dicta facere veritatis. Doloribus nostrum animi id doloremque animi. Distinctio explicabo quisquam occaecati nisi impedit.','2023-11-13 11:53:45','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (23,'Nathanial Stanton','1-717-546-8943','iwyman@example.com','Hic fugiat eum dolore doloribus. Exercitationem aut eaque dolorem voluptates aut maxime. Aut numquam ea exercitationem consequatur sed. Doloremque accusantium voluptates ab quis vel.','2023-05-16 15:35:18','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (24,'Webster Jacobs','+1-830-471-4619','xzulauf@example.net','Magni omnis tempora a quo. Et non quisquam molestias id aut itaque animi. Non soluta deleniti et modi ea dolores. Quia magnam necessitatibus esse magnam. Rerum sint officiis praesentium in aperiam.','2023-03-21 17:30:40','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (25,'Ardith Mann','1-341-794-1300','jeffry.marks@example.org','Nemo corporis dolorem enim sint quia dolores blanditiis. Consequuntur optio repellat quia recusandae.','2023-02-06 17:25:38','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (26,'Ms. Imelda Metz DVM','458.384.0005','clemmie61@example.com','Tempore corporis consequatur quo explicabo et sunt. Ratione ipsam fugit eos ipsam tempora at vel. Voluptates mollitia molestiae repudiandae. Amet distinctio quia eius voluptatem dolores.','2023-02-05 05:11:53','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (27,'Lulu Tremblay','1-831-695-3285','gottlieb.brianne@example.net','Eos quo ut voluptatem facilis. Mollitia voluptatem accusantium sunt asperiores maiores. Autem voluptas vero voluptatem et saepe ratione sed. Architecto sit magni nesciunt nihil.','2023-06-13 17:47:37','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (28,'Patrick Feeney','915-221-3072','schmeler.katrine@example.org','Eveniet id non et. Sint cum fuga est qui et voluptas excepturi ut. Voluptas velit minus unde ea ut accusantium.','2023-05-10 06:30:00','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (29,'Miss Eliane Kassulke PhD','+1-458-635-0743','ktoy@example.org','Possimus molestiae laboriosam ipsam consequatur praesentium voluptatem. Hic aliquam optio eaque nisi dolor blanditiis est.','2023-03-27 08:29:05','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (30,'Dr. Lolita Denesik','828-645-1880','bernice70@example.com','Et fugiat maiores ipsa porro. Porro assumenda autem ut ipsum nisi consequatur culpa natus. At in rerum consequatur deserunt. Neque est dolor dicta aut labore distinctio consequatur.','2023-04-19 16:56:40','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (31,'April Simonis','+1 (906) 776-5242','ytreutel@example.org','Soluta sunt rerum aut quia optio. Molestiae consequatur aut aliquid accusantium magnam et incidunt. Et sit omnis tenetur occaecati.','2023-01-18 09:05:02','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (32,'Dr. Paul Towne PhD','+1-929-573-8858','keaton.littel@example.org','Laborum nam adipisci hic delectus at voluptas dicta. Suscipit saepe eaque et deserunt voluptatem mollitia et quidem. Quisquam harum saepe tenetur itaque dolor odit est.','2023-11-23 04:59:57','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (33,'Vicky Harvey','+1-725-389-5527','vnienow@example.org','Aliquam nobis blanditiis repellendus quia optio hic. Harum doloremque dolores debitis fugit inventore culpa quas ut. Qui eum nesciunt voluptas et voluptatibus distinctio quia. Minima est rem sequi qui sunt.','2023-02-09 23:05:43','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (34,'Alaina D\'Amore','814.204.4588','elisha.wuckert@example.org','Quisquam possimus ut enim ratione. Recusandae et sequi iusto aspernatur. Nihil est occaecati ut omnis sunt itaque. Reiciendis eos eum a quos ducimus qui.','2023-02-20 01:22:34','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (35,'Randi Barrows','+1.269.291.1273','rosemarie75@example.org','Aliquam provident quas quia. Ipsa aut vel voluptas nesciunt nulla reiciendis. Est doloremque nesciunt nam dolor similique ut repellat. Omnis voluptate est amet qui aut consequatur maiores dolorum.','2023-11-21 18:10:49','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (36,'Prof. Pauline Boyle II','480-547-6559','katelynn14@example.com','Distinctio cumque dolorum quidem delectus commodi et. Numquam quia est atque dicta voluptatem libero molestiae consectetur. Et quia et ut at aliquam provident. Ullam quibusdam officiis nemo dignissimos vitae nam soluta excepturi. Harum qui repudiandae eius deleniti consequatur voluptas.','2023-04-03 17:55:03','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (37,'Davon Wehner MD','925-861-8342','amina93@example.com','Et earum architecto quo et dolor. Hic omnis odit ut neque. Est quo sed et ut voluptas.','2023-05-27 19:33:19','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (38,'Mr. Xavier Moen DDS','(931) 769-0621','rosetta.windler@example.com','Error debitis praesentium voluptas saepe. Repudiandae pariatur in aut beatae in. Dolorem dolores deserunt tempore odit id possimus.','2023-12-08 19:20:56','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (39,'Dr. Sage Reinger','509.838.9476','otha.terry@example.org','Qui id harum itaque. Fuga reprehenderit autem consectetur ad sed unde expedita architecto. Expedita soluta sequi quia nihil et id.','2023-03-15 07:00:24','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (40,'Dr. Rosella Pouros','(608) 961-4967','kparisian@example.com','Libero quia molestias excepturi eos dolores. Aliquid quasi ut non natus sint. Et explicabo quia nesciunt esse quia cumque. Facilis ipsam animi repellat.','2023-06-11 12:15:44','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (41,'Miss Beulah Spencer','(629) 838-3700','rlindgren@example.net','Quo nihil quis dolores qui dolorum. Ex aut ipsam ea voluptas dicta. Quaerat fuga perferendis molestiae sed. Et officiis aut sunt sequi et.','2023-05-19 07:53:46','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (42,'Mr. Khalid Corwin Sr.','+1.843.653.2118','bridie.schroeder@example.org','Quo qui aliquam molestiae voluptates sint blanditiis temporibus. Quis consequatur voluptatum omnis atque. Inventore aut recusandae non aut expedita quam et quos. Provident asperiores id quo et id eaque.','2023-03-02 15:46:19','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (43,'Alexandrine Predovic','(980) 789-1180','price70@example.com','Praesentium beatae sit suscipit rerum. Voluptatem soluta laboriosam alias consequatur maxime. Vel facere eum nam dignissimos autem est eum dolores.','2023-12-01 18:47:03','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (44,'Celia Walsh','1-301-299-2201','louisa41@example.org','Occaecati expedita vero dolorem quia est. Quam aut explicabo ut eum enim voluptates atque. Rem incidunt et laborum dolore. Deleniti quos in placeat possimus omnis et accusantium et.','2023-02-05 18:25:08','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (45,'Berenice Schinner','+1-814-229-2822','rmarks@example.net','Consequuntur aspernatur soluta corporis hic. Dolore unde ut quia beatae et officiis. Consequatur nostrum enim blanditiis est dolores. Et quia sint ut doloribus omnis esse excepturi. Esse enim voluptas quia est modi excepturi quisquam voluptatum.','2023-07-03 07:16:21','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (46,'Melody Wiegand PhD','870-290-1405','ubashirian@example.com','Ex voluptatibus eligendi autem ratione nihil. Qui quo temporibus rerum tempore id. Ipsum aut et est architecto ratione. Reiciendis et et molestiae.','2023-09-25 19:29:15','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (47,'Prof. Garett Hartmann','1-386-329-1413','evie90@example.com','Itaque deserunt id fugiat. Distinctio molestias possimus voluptas labore quia magni minus. Facilis nulla dolorem exercitationem dolores. Omnis inventore ratione eos non.','2023-04-24 04:31:26','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (48,'Mrs. Stephania Orn','+1 (239) 688-6739','vicenta.towne@example.com','Rem doloremque similique eos ut autem beatae. Repudiandae consectetur aperiam optio amet alias et in. Mollitia quis quam maiores totam quod. Et natus sequi perspiciatis sit.','2023-08-03 09:27:26','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (49,'Prof. Antonina Glover III','(225) 673-0743','terry.sister@example.net','Officia aliquam tenetur nihil voluptatem aut. Eveniet dignissimos assumenda eius eius inventore. Nobis et hic iste iure vitae. Omnis ipsam harum et id.','2023-11-24 15:58:13','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (50,'Mrs. Electa Hansen DVM','+1 (678) 529-1931','dudley55@example.net','Et sed quod quia in molestiae. Qui et alias accusantium recusandae. Quisquam mollitia rerum atque nisi. Et ut sed quaerat quidem et quam. Provident quo sunt officiis molestiae.','2023-11-13 11:59:17','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (51,'Mr. Ronny Huel','(267) 207-1277','pvonrueden@example.net','Porro harum tempora qui vel vel. Aspernatur odio dolor corporis excepturi exercitationem et. Repellat exercitationem sed vel quibusdam est quaerat. Error non consequuntur ut culpa. Sequi beatae quo ex optio.','2023-01-26 13:26:26','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (52,'Bianka Runolfsson','1-425-352-4215','maryjane.pagac@example.com','Fugit vel sequi maxime laborum. Minus quidem molestiae laudantium aspernatur explicabo molestiae libero. At officia voluptatibus autem officia quod qui adipisci. Tempore sequi cum dolor doloremque numquam et.','2023-01-04 12:33:43','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (53,'Dr. Emmanuelle Daugherty DDS','785-891-7088','dave.sauer@example.net','Rerum est suscipit blanditiis quisquam sed omnis asperiores. Iste iusto voluptas blanditiis ratione rerum ea est. Quia eos distinctio totam facilis.','2023-12-24 22:20:36','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (54,'Prof. Angel Watsica IV','352-339-6196','turner.kaci@example.com','Aperiam qui totam qui deserunt omnis. Incidunt dolorem ad facilis repellat assumenda. Consequatur ut quo fuga vel qui molestias nam. Aut sit possimus ipsa voluptate dicta.','2023-09-20 12:01:02','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (55,'Kristin Halvorson','803-993-2794','blick.mozell@example.com','Dolores qui corporis ut sequi quaerat quis cumque distinctio. Debitis fugit dolorem dolorem ratione non. Nemo ea porro eum aspernatur ratione. Eius nesciunt enim iure cupiditate. Enim quia voluptatem mollitia cumque hic.','2023-03-05 16:36:33','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (56,'Abdiel D\'Amore','+1-318-679-5505','hcole@example.org','Et tenetur veniam dicta et dolores assumenda sed voluptates. Amet minus quidem libero sint id est et. Pariatur non quod voluptatem.','2023-06-24 14:06:48','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (57,'Donna Kovacek','351.747.4280','jed87@example.org','Ab ut qui quis vitae. Exercitationem tempora dicta illo sit voluptatum distinctio animi est. Et ratione nihil nam debitis iusto voluptas. Iusto explicabo ipsum eveniet dolorum inventore cumque. Voluptatem voluptas praesentium fugit aliquam deserunt asperiores itaque.','2023-11-06 16:29:50','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (58,'Edna Treutel','+1-606-397-9369','sally.carter@example.com','Aut et amet rerum vel sit minus. Pariatur quis laudantium dolor harum expedita tenetur nisi. Vel est tenetur sequi. Ut animi esse at molestiae.','2023-11-05 16:04:29','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (59,'Adriel Funk','308-995-3263','kyle60@example.com','Illum praesentium et consequuntur iure eum porro eveniet. Occaecati vel deleniti tenetur unde sequi praesentium. Magnam id itaque consequatur ut non. Ut rerum quia eos.','2023-09-03 23:31:27','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (60,'Eula Wisoky','+1-419-864-5123','feest.gaylord@example.net','Ut quos sint eveniet natus ut. Dolor et sint tenetur ullam consequatur. Quaerat debitis qui impedit sed. Et tempore qui doloremque numquam dolorum quasi porro.','2023-04-26 10:06:44','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (61,'Dominic Nicolas','+1 (254) 804-4434','jasper.bauch@example.com','Omnis dolores eos amet porro. Voluptatum velit deserunt facere inventore consequuntur tempora id. Dolorum quia sunt aut eos voluptas. Architecto perspiciatis enim enim aut quidem aut.','2023-02-11 04:00:59','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (62,'Mrs. Elinore Medhurst','+1-404-451-2555','xbogan@example.org','Esse optio est corrupti. Ducimus magni quasi tempora quia aut rerum. Necessitatibus libero quidem fuga voluptates nulla velit. Voluptatem consequatur dicta veniam vel explicabo.','2023-05-01 15:12:35','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (63,'Loyce Donnelly','1-802-975-4135','earnestine.fay@example.net','Similique et est et officiis dolores est. Facere architecto sed necessitatibus nostrum rerum placeat. Voluptatibus et quos asperiores corporis placeat ex at voluptas. Repellendus fuga est atque voluptatem sed et dicta non.','2023-06-08 23:52:37','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (64,'Santiago Johnston Sr.','1-775-699-2718','considine.boyd@example.org','Nulla rem numquam et nulla quo. Quam doloremque cumque nisi ea. Et commodi quam non cumque velit sapiente qui.','2023-09-03 18:11:15','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (65,'Linwood Pfeffer','1-202-479-9646','ohoppe@example.net','Ex enim delectus consequuntur molestiae id ipsum. Consequatur animi et et alias magni. Non perferendis nobis iure nesciunt fuga similique quia.','2023-09-13 23:21:07','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (66,'Mr. Loy Von PhD','+1 (484) 427-4946','cronin.trisha@example.com','Fuga rerum provident repudiandae labore incidunt. Qui consequatur natus consequatur asperiores. Laudantium iusto voluptas est eveniet consectetur ullam dolorem. Dolorum doloremque nam et maxime.','2023-06-15 03:00:41','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (67,'Dr. Mathilde Okuneva III','+18288679801','xpredovic@example.org','Molestias quibusdam atque neque at aut sit voluptates animi. Sed in quo commodi ea sed veritatis voluptatum. Voluptatem explicabo ut voluptatibus est a optio. Autem magnam eos voluptatem est recusandae a maxime.','2023-09-13 11:10:29','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (68,'Helga Braun','+1-906-545-3360','will.abernathy@example.org','Autem dolorem in non rerum ut. Deserunt in vitae minima ut ullam nulla voluptate. Consequuntur enim voluptatem sit debitis ullam impedit aut.','2023-09-08 06:27:09','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (69,'Brandt Kuhic','(949) 298-1115','mills.filomena@example.org','Asperiores ab occaecati perferendis. Minima facilis nesciunt voluptas soluta amet harum repellendus. Inventore ipsum sed impedit aliquam aliquid molestias.','2023-11-05 23:49:28','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (70,'Jeanie Hand I','+12314436280','hickle.braulio@example.net','Provident eveniet consequatur est numquam sed est asperiores maiores. Accusantium et et eos dolor ea animi. Qui aut qui vero nemo aliquam dolores unde.','2023-04-09 22:36:19','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (71,'Marjolaine Moen','+1.765.573.8844','lschaden@example.org','Provident assumenda maiores beatae rerum necessitatibus beatae tempore. Ea aut et iste tempora amet. Sint possimus accusantium aut itaque unde placeat quod. Id autem delectus id.','2023-05-21 06:31:46','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (72,'Dr. Antonina Bins','+1.740.718.0202','tyree.hintz@example.com','Hic harum nesciunt delectus enim corporis. Eaque non illo laborum dignissimos maxime id dolorem. Quod quis impedit praesentium. Ullam facilis accusantium facilis excepturi perferendis.','2023-01-05 11:34:41','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (73,'Dr. Americo Gulgowski','(818) 391-3284','streich.rex@example.com','Dolorum enim at praesentium ut deserunt dicta blanditiis. Qui facere a repellendus. Vel nam eaque perspiciatis.','2023-10-15 02:42:39','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (74,'Kendra Stroman','+1.303.722.8571','timmy.bernhard@example.org','Cupiditate eum ut rem quod fugiat dolorum. Repellat vel non et aut. Est sed repudiandae sed deserunt repudiandae possimus id.','2023-05-28 01:20:24','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (75,'Mr. Mason Wilkinson','+17242900363','heidenreich.delaney@example.org','Molestias esse dicta ullam dolorem doloremque. Et culpa quidem sint velit et rem magni. Voluptatem totam cum nihil ex quos qui.','2023-10-03 15:12:04','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (76,'Alfredo O\'Reilly Sr.','+1-321-484-8958','claudia27@example.com','Quia quia eaque aut possimus rerum quam repellendus. Ipsum aperiam deserunt expedita quis quaerat qui. Minima veritatis ipsum ea omnis ut tenetur.','2023-06-18 17:48:28','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (77,'Nolan Kihn','706.531.2540','howell.laney@example.net','Sint iste quia voluptatum quaerat doloremque. Quo iure non ut rerum aut. Quia beatae asperiores fuga qui provident deserunt. Velit molestias quia laborum recusandae natus voluptas laudantium.','2023-07-24 01:59:45','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (78,'Dejuan Swaniawski','334-843-2600','dmuller@example.org','Hic esse aut mollitia ut esse asperiores mollitia. Reprehenderit rerum sint debitis aut quo ipsum quo atque.','2023-01-17 04:36:33','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (79,'Floy Berge','(283) 867-9622','hhintz@example.net','Reiciendis consequuntur quis qui magnam. Error molestiae praesentium non voluptates repellat. Dolore ratione neque et.','2023-11-27 11:59:54','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (80,'Mrs. Chelsie Auer','+1 (906) 723-9057','xblanda@example.com','Iusto qui impedit id provident. Sit debitis praesentium dolorem sapiente soluta minus aperiam. Quidem repellat commodi consequatur suscipit ut velit eligendi. Aut aut aperiam quo ea.','2023-05-04 15:23:31','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (81,'Gillian Wunsch','+18202276282','haufderhar@example.net','Sed neque occaecati sit ipsum unde facilis quia. Est vitae voluptates architecto facilis iure sequi id aut. Nostrum ut necessitatibus animi quia sed enim voluptatum.','2023-10-05 00:28:44','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (82,'Toney Lesch Jr.','+1-507-216-4879','oceane66@example.org','Nihil molestiae dignissimos repudiandae rerum. Modi adipisci dolore iure veniam magnam neque.','2023-07-13 17:45:30','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (83,'Elise Mann','1-856-938-0246','vonrueden.noble@example.com','Deleniti sit ea impedit quas doloremque. Ducimus ea odit explicabo ea illum nihil quasi. Beatae cumque est praesentium corrupti numquam. Nulla inventore perspiciatis mollitia possimus qui.','2023-08-15 19:04:26','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (84,'Chyna Satterfield','(352) 850-1863','estella11@example.org','Atque iste saepe vel assumenda. Odio inventore quod facilis esse ut labore. Deserunt quis ipsum dicta provident et.','2023-04-21 14:13:22','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (85,'Anastacio Anderson Jr.','1-657-416-8774','johnson.ilene@example.com','Temporibus nobis et voluptas. Dolore natus earum quia velit repudiandae.','2023-10-08 07:43:29','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (86,'Dr. Leola Lemke','1-689-409-9378','zkunde@example.org','Dolores sit nostrum quis beatae odio dolor rerum et. Non qui accusamus accusamus omnis. Et illo sequi magni unde neque aliquid doloremque ea. Maxime quia delectus quam facilis quod sit et.','2023-05-13 14:37:06','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (87,'Lori Jerde','+1.724.664.5586','huel.kavon@example.com','Saepe voluptatem voluptatem aut perspiciatis est qui aliquam molestiae. Quo quae et modi porro. Velit molestiae consequuntur non dicta sed et.','2023-01-06 09:22:08','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (88,'Jermey McClure MD','1-772-944-1088','samson90@example.net','Laboriosam ut qui et voluptatem enim. Pariatur voluptatem fugiat sit repudiandae culpa ut.','2023-11-28 04:35:35','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (89,'Filomena Gleichner','+1.817.609.2165','domenick97@example.com','Numquam illo asperiores dolorem velit. Voluptate impedit ab ea occaecati corporis. Eum maxime ut fugiat et at. Accusantium aut eos earum.','2023-05-22 23:27:31','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (90,'Prof. Missouri Pollich','312.937.0043','hauck.eriberto@example.com','Rerum ea eum minus illum voluptatem. Dolor numquam magnam nostrum rerum aut. Ad beatae iure facere ut. Dolor non eos dolorum totam dolor dolorem et.','2023-10-11 09:35:21','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (91,'Katherine Jacobson','+1.903.323.6717','fcarroll@example.org','Ut ipsum saepe asperiores temporibus. Officiis et soluta illum dolor nam maiores. Sint illum ex in ullam id rerum fugiat porro. Doloribus necessitatibus voluptatem est asperiores inventore.','2023-01-03 10:45:36','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (92,'Dr. Destin Hayes','561.289.0808','brittany67@example.org','Iste et ea sint. Non et eveniet eum et aliquam est quo. Nemo sequi occaecati maiores numquam et. Sit deleniti aliquid quam a perferendis ut.','2023-03-24 05:34:11','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (93,'Paige Rath','1-220-363-2820','aric.dickens@example.org','Hic dolorum sit sapiente sed ipsum. Blanditiis assumenda quis excepturi eos delectus non. Voluptas et adipisci repudiandae doloribus nobis molestiae consectetur laboriosam. Omnis libero aut ea provident natus voluptatem at.','2023-01-22 09:18:22','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (94,'Julio Corkery','(279) 258-2098','ijaskolski@example.com','Ipsam accusamus est est a temporibus vero animi. Magnam perferendis repellendus architecto. Sit architecto inventore rerum corrupti sunt non. Libero et ipsum quidem possimus necessitatibus sapiente.','2023-10-19 05:41:04','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (95,'Nova O\'Conner','+1-442-238-3042','laverne.jenkins@example.com','Et porro quia rerum voluptate aut. Porro alias neque sit iusto repellat sit eos omnis. Quidem officiis rem ut odit illo. Et omnis eos occaecati placeat blanditiis tempora.','2023-08-09 11:11:59','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (96,'Brett Metz','+1-341-639-2729','nathanael22@example.org','Cum laborum eius sed minima nulla rem. Molestiae occaecati recusandae quis unde consequuntur. Eius similique repellendus doloribus natus perspiciatis perspiciatis natus. Animi sit praesentium dolor.','2023-12-27 17:25:24','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (97,'Pearline Christiansen','574-566-7343','kquitzon@example.com','Quia rerum eveniet quas excepturi officia corporis atque ea. Est labore ab quae temporibus et maxime id.','2023-07-01 00:16:58','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (98,'Bette Lindgren','+18454639399','lschumm@example.com','Totam quidem repellat necessitatibus perferendis distinctio tenetur excepturi. Magni voluptatibus consequatur qui magni excepturi maxime molestiae. Incidunt excepturi sed perferendis fugit fugiat. Tenetur quae delectus at temporibus non placeat harum.','2023-05-21 00:03:49','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (99,'Mr. Helmer Shields Jr.','680-465-6013','funk.layla@example.com','Distinctio nihil eligendi quod quam illum. Omnis aut suscipit hic fugiat ut voluptatem. Pariatur animi explicabo perferendis tempore cumque dolor cupiditate.','2023-10-10 03:06:01','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (100,'Mortimer Hackett','904-975-6612','tristin84@example.net','Tempore rerum quas velit qui qui odit. Odit molestiae doloribus veniam deserunt. Blanditiis quo aut reiciendis rerum aut illum voluptatem distinctio.','2023-09-13 07:40:32','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (101,'Scotty Graham III','+1 (806) 562-4257','andreane.heller@example.net','Autem est in animi alias ad. Quasi aut ducimus quia in nobis sit suscipit.','2023-11-13 17:32:20','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (102,'Fred Rodriguez','678-214-1978','koelpin.golden@example.net','Eum maiores enim sed qui. In porro excepturi ut nulla. Placeat quas natus exercitationem itaque.','2023-06-28 01:46:14','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (103,'Mrs. Domenica Hoppe V','+18324884707','rahsaan.franecki@example.net','Nesciunt nihil aut sit corrupti nostrum quam. Temporibus consequatur ad quidem. Ut et consectetur nihil quae est et necessitatibus.','2022-08-09 05:53:05','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (104,'Abe Lang I','+17255466882','mattie.moore@example.net','Ipsa ea officiis facilis quia dolores est temporibus. Voluptas voluptatem deleniti veniam itaque optio est neque. Voluptas rerum nihil nobis voluptates.','2022-04-01 07:23:05','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (105,'Prof. Walter Marks','1-360-873-4227','rutherford.dorcas@example.com','Velit provident accusamus voluptatum nam dolorum vel explicabo laudantium. Illum qui omnis voluptatem dolorum id. Minus ab porro quasi et.','2022-03-01 01:25:13','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (106,'Dedrick Schaefer','+1 (830) 561-2261','jaden.gottlieb@example.net','Aut exercitationem autem qui quo. Corporis unde ut nemo voluptate nam iste. Quia quibusdam ut et rerum dicta et.','2022-04-21 21:08:38','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (107,'Felipe Bahringer','+1-607-635-4859','lweber@example.net','Laborum dolores doloribus aut sequi minus asperiores sequi. Itaque quis quia omnis quia ipsum molestiae. Deleniti qui necessitatibus sed quis quaerat quaerat. Porro magnam porro ut eos vero odio quo perferendis.','2022-11-16 07:58:30','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (108,'Verdie Moore','+1-559-519-8359','justice.cormier@example.com','Sed unde aut quia ullam. Sed et non et est. Adipisci ipsum dolorum ad excepturi hic maxime saepe. Laudantium quasi esse illum assumenda iste delectus at quo.','2022-03-09 18:56:06','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (109,'Dr. Myrtle Haag Sr.','925-204-4414','dayna65@example.org','Et exercitationem voluptatibus consequatur praesentium. Dolores qui quod sint cum eaque. Nobis voluptas consequuntur quod sit voluptatem aut corrupti.','2022-01-19 08:33:28','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (110,'Miss Delia Bruen Sr.','+1-862-954-8008','ebba80@example.com','Ipsam sit doloribus et fuga molestiae culpa. Numquam atque sit molestiae amet dolorem. Voluptas qui quaerat sed ducimus. Laborum sunt quisquam doloribus ipsa error.','2022-01-28 08:00:11','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (111,'Cedrick Volkman III','1-417-515-8793','patience.lueilwitz@example.com','Est et eaque voluptatum repudiandae asperiores. Assumenda qui deserunt debitis odit sit consequatur.','2022-06-19 18:30:19','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (112,'Prof. Ellsworth West Jr.','+1 (256) 200-7568','margarita.lindgren@example.com','Iure dolore non quis aut optio autem eius. Aut possimus voluptates aut. Ea id aut sunt inventore non nisi. Sunt quis sequi autem velit.','2022-04-19 00:27:29','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (113,'Marques Champlin V','+1 (828) 491-9635','sonya.nolan@example.net','Sint velit quis doloremque rerum. Deleniti et earum harum. Dolores laborum itaque tenetur ab. Quasi repellat ut odit consequatur quos dicta neque voluptatibus.','2021-09-18 19:09:22','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (114,'Jonathon Gleason','1-817-630-4468','ondricka.yvonne@example.org','Sunt laudantium dolor perferendis adipisci. Saepe iste facere occaecati hic aperiam. Cupiditate sed ipsam rem reiciendis. Dignissimos similique non itaque id blanditiis.','2021-12-25 19:04:48','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (115,'Madelynn Brown','+1-616-328-9396','fkertzmann@example.net','Similique mollitia et consequatur quia earum modi. Quidem placeat neque et. Voluptatem perferendis ab sed est adipisci omnis.','2021-07-13 16:00:44','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (116,'Connie Stanton DDS','1-279-230-5079','jany90@example.com','Occaecati aperiam sint consectetur rem laboriosam quia repellendus. Distinctio rem aut voluptatum. Praesentium at repellendus recusandae animi architecto deleniti dolores. Repudiandae voluptatum quibusdam quam placeat.','2021-04-27 00:53:14','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (117,'Kaleb Reichel','(838) 604-7720','lawrence41@example.com','Quidem sint autem architecto dolorem odit porro illo. Possimus facere ipsum et dolor. Eligendi ut magnam consequuntur labore. Aut totam aspernatur aliquid est quam et distinctio ducimus.','2021-12-19 07:30:31','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (118,'Regan Little DVM','+17579251293','pouros.leola@example.com','Amet libero beatae eligendi nisi et voluptate. Velit totam officiis porro. Quae doloribus est cumque deserunt molestiae enim. Dolorum qui voluptas illum harum quos adipisci.','2021-02-05 00:08:57','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (119,'Carlee Heidenreich','+1 (254) 497-0958','goodwin.miracle@example.com','Officiis quod consequatur unde sint. Enim architecto error facilis. Possimus et id velit et in qui.','2021-06-09 23:53:54','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (120,'Burnice Murray','+1-341-826-9592','vpollich@example.org','Dolorem delectus non qui facilis id id. Eos officiis perferendis perferendis voluptatem necessitatibus. Reiciendis quisquam dolor odit nihil quos.','2021-08-11 14:27:40','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (121,'Dr. Lenna Schaefer','626-967-5121','dubuque.alexzander@example.org','Saepe enim fugiat fugit et. Necessitatibus rerum blanditiis necessitatibus debitis quia rem. Consequuntur qui est est incidunt. Quia similique occaecati reprehenderit.','2021-08-25 14:04:22','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (122,'Marianna Huels','530-980-6422','omonahan@example.org','Explicabo doloribus ipsam minus est eos corporis. Ipsa quae qui magni consequuntur ex.','2021-07-28 03:17:44','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (123,'Mr. Monserrat Johns Jr.','248-970-1878','dmiller@example.com','Distinctio atque autem quia similique et. Itaque tempora voluptas magni neque aut quibusdam. Assumenda natus aut nulla officiis aliquid vero est. Amet eum sunt quos laboriosam iste.','2021-10-10 20:53:14','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (124,'Herman Schroeder','+1-469-977-0558','karlee.stamm@example.net','Iusto incidunt omnis ut aperiam possimus. Provident laudantium assumenda ipsam consequatur. Nam error ullam velit ut labore quis quo. Est aliquid enim molestiae voluptas asperiores et est occaecati. Et magni excepturi voluptate esse illo dolorum.','2021-11-19 12:42:43','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (125,'Jakob Rempel','+1-747-721-3924','damion.jenkins@example.com','Incidunt et voluptatem maiores blanditiis quo eos ea architecto. Qui doloremque est harum quis culpa voluptatem ullam. Nihil molestiae minima quo molestiae et doloribus. Qui nihil ut ut non qui officia.','2021-06-18 19:32:02','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (126,'Mr. Rodrick Schumm','+1-571-355-0940','abbie.grant@example.net','Minima mollitia autem repellendus quasi omnis. Non voluptate quae inventore dignissimos. Autem dolor sed ea quisquam.','2021-03-18 01:44:53','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (127,'Corine Muller','(432) 925-2677','lhintz@example.net','Omnis quisquam quidem labore vitae debitis nihil in fugit. Voluptatem vel saepe voluptatem repellendus adipisci et placeat. Libero et amet modi ad aut ut blanditiis. Est praesentium dolorem est ex repellendus qui voluptatem. Labore reiciendis minima maxime aliquam voluptatem.','2021-04-04 09:23:09','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (128,'Mrs. Nelda Pagac','1-412-407-0539','elmer86@example.net','Et esse ipsam officia odit aperiam. Nihil rem autem sint et eaque aut consequatur esse. Optio ipsum et maiores aperiam. Aut molestiae sunt voluptatem et repudiandae quam.','2021-11-17 11:33:33','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (129,'Jermain Bradtke PhD','(838) 296-2073','delfina63@example.org','Qui excepturi eum esse nisi repudiandae placeat quia. Sunt eos eos deleniti id. Nesciunt sequi quae a quia. Aut eveniet ab ex quos.','2021-09-22 03:51:39','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (130,'Abraham Abshire Jr.','1-281-581-9175','jarvis74@example.com','Nisi pariatur ratione occaecati dolores laudantium soluta qui. Ipsam optio eligendi odio dolorem. Id necessitatibus corrupti rerum. Quod in nihil quis provident id qui eveniet eaque.','2021-11-12 06:35:30','2024-06-07 04:12:52');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (131,'Will White','(878) 593-7025','uhegmann@example.net','Aut quam labore sequi in. Exercitationem quam sint officia asperiores. Quisquam expedita est quia exercitationem quibusdam nulla.','2021-10-11 21:11:01','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (132,'Kameron Leuschke','757-752-0152','smith.katherine@example.net','Soluta harum officiis est id dolores neque. Inventore quas a asperiores repellendus quae. Id explicabo ipsam sint quia. Molestiae occaecati sint eligendi sint deserunt illum.','2020-08-17 10:14:11','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (133,'Catharine Moore','(956) 442-5378','hahn.ahmad@example.com','Pariatur ea nemo veritatis deserunt. In ducimus nisi in.','2020-06-24 19:54:01','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (134,'Miss Edna Abbott DVM','(484) 334-2515','emery65@example.org','Occaecati quo vitae ut neque itaque est aperiam. Quis expedita ut perspiciatis. Assumenda aut et autem omnis dolores et illo. Numquam mollitia dolor nulla dolor repudiandae.','2020-03-24 10:42:42','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (135,'Winfield Kilback I','1-509-995-5231','celestino14@example.com','Soluta voluptatem itaque iusto tempora dignissimos perferendis vel. Beatae id voluptatum et consequatur. Dolores temporibus perferendis in blanditiis eos rerum.','2020-06-21 22:33:26','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (136,'Mr. Donato Grant DDS','(316) 491-9569','gail27@example.net','Nulla ex dolorem repellat nobis similique. Praesentium atque eligendi fugiat quia. Vel sed explicabo debitis distinctio perferendis error placeat. Molestias adipisci ab et et quae illo voluptatum unde.','2020-04-16 12:42:47','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (137,'Ms. Amelie Leannon','(732) 600-3197','vschowalter@example.com','Omnis recusandae asperiores corrupti vel ea quod quo. Voluptatem voluptatem itaque non et voluptatem rem qui nulla. Nemo incidunt quia velit eum itaque.','2020-12-10 18:04:03','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (138,'Boyd Schulist IV','1-612-612-0809','alexandra.jenkins@example.com','Consequatur labore sit aut et labore magni voluptatibus voluptas. Suscipit dolorem modi quia molestiae ut. Totam quas dolores harum sit.','2020-06-06 15:38:14','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (139,'Dane Goldner','+1-540-933-9438','roderick.mayer@example.com','Illum voluptatibus ducimus est consequuntur voluptas enim nam numquam. Quae est ratione eum. Repellat iusto soluta autem dolores est eveniet vitae.','2020-05-28 14:10:40','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (140,'Priscilla Blick','559-214-6063','kaycee72@example.com','Ut consectetur amet rerum doloribus et. Sequi voluptatum laudantium eos odit. Non praesentium quae ut laboriosam dolorem.','2020-05-27 01:39:26','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (141,'Lora D\'Amore','+1-337-251-5481','rbernier@example.org','Doloremque ut hic quia vel ad similique sed omnis. Libero vel labore eius vel. Ex doloribus quasi corporis eaque molestiae. Voluptates quis pariatur modi illum. Dicta fuga deleniti quia eaque deleniti.','2020-03-14 02:45:13','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (142,'Vida Jenkins','+1-505-582-5827','maximo27@example.com','Amet illum quibusdam vel veritatis alias ratione qui. Et perspiciatis quidem dignissimos qui vitae.','2020-01-14 12:35:15','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (143,'Ms. Meaghan Barton','(580) 612-8927','joesph70@example.net','Corporis omnis est recusandae ipsum quia. Ad placeat quidem consequatur praesentium quia illo doloribus. Ut et in consectetur. Similique esse praesentium et.','2020-09-15 16:22:47','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (144,'Tillman Kertzmann','+1-216-467-4808','janick18@example.com','Sed vitae sint nisi tempora voluptate odit. Aliquam repudiandae tenetur aliquam corrupti at. Assumenda aspernatur et ut. Est eveniet molestias dolores quas.','2020-02-24 19:41:25','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (145,'Santa Hagenes','+18706136396','reid.harris@example.org','Debitis consequatur necessitatibus quia aspernatur quidem laborum magnam quod. Et vitae natus in quia. Voluptatem rerum totam aperiam voluptas incidunt quidem praesentium autem.','2020-03-02 01:02:09','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (146,'Delphia Armstrong','813-604-2944','hahn.dalton@example.net','Quis totam quidem et totam in molestias. Accusantium est autem distinctio laboriosam. Dolorem sapiente numquam sint dolorem beatae est.','2020-07-24 14:40:48','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (147,'Kip Fay','+1 (312) 775-0799','tlockman@example.com','Fugiat porro animi rerum eos. Sed suscipit quaerat voluptatem quis explicabo molestias.','2020-05-13 01:30:30','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (148,'Adelbert Rogahn','1-806-852-0960','constantin.stanton@example.com','Sit nulla qui et quisquam. Perferendis quasi dolor autem excepturi adipisci atque. Esse exercitationem et occaecati eum voluptatem distinctio aut quam. Adipisci et expedita cum est sit suscipit.','2020-08-09 19:16:41','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (149,'Juvenal Gleason','1-531-997-1034','pbergnaum@example.net','Eveniet dicta ut amet delectus cum voluptas quam. Reiciendis ut adipisci cupiditate rerum. Suscipit hic soluta mollitia assumenda. Necessitatibus et quos quo magnam id qui et sequi.','2020-03-05 19:48:57','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (150,'Julien Hyatt','256-255-8512','delpha.altenwerth@example.com','Excepturi reiciendis maiores dolorem et at voluptatibus ratione. Ratione rerum quia accusamus et excepturi recusandae id. Molestiae quisquam natus perspiciatis reiciendis nesciunt. Voluptates perferendis quasi ratione qui minima molestias eaque.','2020-03-18 00:48:39','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (151,'Mrs. Maryam Dietrich','425-417-1149','cecelia.strosin@example.net','Vero velit totam est et quia. Ut inventore alias voluptatem officiis. Hic provident rerum quasi assumenda nemo impedit. Rerum est repellat ea at.','2020-12-17 16:44:31','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (152,'Shyann Parker','+1-785-645-5798','krystal.schroeder@example.net','Rerum ratione voluptas nisi rerum ut. Quod nesciunt velit reiciendis et repellat molestias soluta fugiat. Enim enim voluptas ut laborum inventore. Ea harum ea fugiat accusantium id voluptas sed.','2020-08-03 13:38:39','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (153,'Dr. Rickey Zboncak Jr.','+1.239.798.7777','fritsch.alana@example.com','Accusamus necessitatibus ut est dicta veritatis. Tempore iste tenetur voluptatem. Ratione molestias voluptatem aliquam omnis. Beatae minus ut necessitatibus atque nisi qui.','2020-04-25 02:40:25','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (154,'Willie Conn','(631) 873-7698','kenyatta.bashirian@example.org','Ad quia nihil velit porro aut placeat. Vitae ut qui natus tempore nihil laudantium dolor qui. Distinctio ut fuga aspernatur natus amet. Fugit iusto ut perferendis eligendi dolores.','2020-05-01 12:25:41','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (155,'Heath Smitham II','601.382.8119','xharvey@example.net','Vel blanditiis atque ut nihil. Eos perspiciatis eius quasi et. Vel asperiores dolores eveniet quis cum cumque. Facilis et sed et non ut similique.','2020-09-23 13:37:24','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (156,'Okey Zboncak','754-831-1762','aaron35@example.net','Voluptas adipisci illo deserunt perferendis ut quaerat nihil. Qui quasi ullam totam dolorem aspernatur. Quas culpa recusandae accusamus accusamus. Ipsum sed similique error et eaque.','2020-01-20 23:25:15','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (157,'Emilia Stamm','541-535-9494','phyllis02@example.org','Voluptate aut sint aut itaque nisi vitae. Molestias eos sit dolorem possimus consequatur similique quidem. Enim praesentium officia sequi iure minima nihil a porro. Neque eaque sunt vero consequatur.','2020-07-15 19:50:42','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (158,'Jayce Veum','+1-305-859-2341','jhermiston@example.org','Sed hic reprehenderit qui voluptate veritatis ut. Et error veritatis similique.','2020-05-19 04:23:59','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (159,'Wilbert Runte','(608) 940-6638','bechtelar.rashawn@example.com','Aspernatur illo architecto quo asperiores dicta. Eos iste et rem est neque rerum temporibus. Necessitatibus suscipit recusandae fugiat atque sequi vel sint temporibus.','2020-05-18 18:40:37','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (160,'Misty Schroeder','+1 (212) 743-1521','boehm.destany@example.com','Provident voluptatem omnis nemo aut commodi. Odit iure molestiae qui cumque consequuntur rerum assumenda. Commodi praesentium sit recusandae aliquam.','2020-10-10 02:45:26','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (161,'Rebeka Schultz','+1-980-720-6752','raul27@example.net','Possimus omnis facere ipsam non itaque perferendis modi molestias. Consequuntur quae tempora et voluptates. Ea id ad deserunt et expedita molestiae.','2020-02-05 01:37:18','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (162,'Prof. Jaylin King','1-479-865-0401','fadel.dudley@example.org','Dolorem repudiandae exercitationem laboriosam corporis enim est. Aperiam molestias totam eum culpa aut. Rerum ratione pariatur praesentium iure impedit aut. Quam unde eligendi et consequatur voluptatem suscipit similique.','2020-07-14 22:10:55','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (163,'Enola Kilback','+1-206-934-6950','savanah.upton@example.net','Qui adipisci recusandae explicabo fuga cupiditate. In occaecati suscipit aut ullam. Vitae eius dolorum occaecati laudantium.','2020-06-27 02:34:04','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (164,'Kristoffer Kuhic','1-606-738-3500','sienna.rohan@example.org','Quasi optio quia aliquid veniam occaecati. Illum sunt placeat est fugiat fugiat sint. Laudantium voluptas eos consequatur ipsam accusantium.','2020-09-11 15:29:05','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (165,'Dr. Tyra Quitzon','(762) 264-1902','watsica.mckenzie@example.org','Et doloribus cumque quis natus sint in. Sit labore ipsum et voluptatibus excepturi molestiae. Saepe facilis autem itaque consequatur est id sunt. Non est necessitatibus natus neque tenetur. Repellendus voluptatem debitis deserunt quibusdam molestiae optio.','2020-07-25 16:36:05','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (166,'Jett White','1-408-370-7368','hank.krajcik@example.org','Repudiandae et explicabo qui. Earum molestiae ut recusandae ut quam accusantium beatae.','2020-08-14 10:12:23','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (167,'Eugenia Stroman DDS','305.903.0923','braxton28@example.com','Quia molestiae delectus consequatur facere cumque culpa. Architecto repellat dolores fugit optio voluptatum ut. Quidem nostrum libero aperiam sed voluptatem quos. Explicabo ratione consequuntur expedita est dolore sint rem quo.','2020-11-11 10:11:43','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (168,'Mrs. Earline Jast III','(575) 918-0072','gmitchell@example.net','Qui officiis vel laudantium ratione. Delectus molestiae laboriosam non. Libero dolorem quia nobis sunt porro delectus ex. Ducimus quos facilis optio accusantium natus deserunt omnis cum.','2020-06-22 10:53:36','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (169,'Katelyn Reinger','731.963.4717','cassie.schumm@example.org','Veritatis accusamus culpa modi aut modi dolores. Debitis doloribus id eveniet numquam qui optio repellendus illum. Omnis fuga aut rerum perspiciatis quod et. Laborum quaerat cum et aut dolorum.','2020-12-24 15:46:03','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (170,'Augustine Gutkowski','(540) 784-8049','ibogisich@example.com','Id ab vel ex qui accusantium. Vel ut distinctio tempora a non. Eos provident rerum non maiores. Libero sit eaque nisi quasi hic perspiciatis atque.','2020-05-02 09:19:18','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (171,'Ms. Katherine Tillman','201.592.7782','jfahey@example.net','Quasi voluptas velit harum cumque repudiandae illum. Iste ad dolor labore veniam temporibus qui reprehenderit. Quae in hic neque ut voluptatum dolorem ea.','2020-05-25 10:29:50','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (172,'Erika Weber','534-837-1554','tcartwright@example.org','Nam saepe distinctio qui autem commodi repellendus. Earum et nisi dolorem voluptas et ex. Reiciendis beatae eos quo iste at in.','2020-12-25 15:38:08','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (173,'Orlo Kling','386-876-4175','stiedemann.jorge@example.com','Earum sint dolor voluptatem et ipsam. Aut nesciunt velit non laboriosam. Fugiat et inventore quia inventore veniam fuga minima nisi.','2020-01-21 20:12:49','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (174,'Jaylen Pagac','+1-269-620-8298','ohermann@example.org','Rerum pariatur id commodi repellat. Deserunt aut et consectetur. Et voluptas minus voluptatem sint eveniet asperiores voluptas.','2020-07-02 05:08:34','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (175,'Marilie Dooley DVM','+1-757-666-8616','abagail.ohara@example.net','Sunt occaecati repudiandae laudantium molestias ut exercitationem eum. Commodi fugiat eum esse sapiente quos molestias quae autem. Aliquam et velit sint possimus officia nemo qui.','2020-09-04 07:34:41','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (176,'Danika Denesik','1-682-562-8443','auer.pink@example.net','Itaque sapiente et rerum harum. Qui fugit qui neque quas enim voluptas. Unde modi libero est est minus vel. Esse deleniti et quasi eveniet quis nulla. Et voluptas reprehenderit sed id velit dolores.','2020-06-23 13:38:10','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (177,'Hilda Glover IV','+1.425.862.9254','mante.mario@example.net','Laborum sit ut et non minus. Qui iusto reprehenderit asperiores sint dolorem esse dolorem.','2020-02-08 14:43:09','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (178,'Carroll Simonis','1-283-217-9323','htowne@example.com','Ex fugiat possimus numquam porro modi. Accusamus sit doloribus iusto exercitationem repellat similique ea. Repudiandae quidem ut sit velit minima.','2020-05-16 20:55:43','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (179,'Wade Runte','(302) 707-2105','sjohnson@example.org','Nobis error ut ad necessitatibus rerum et quia qui. Dolores sequi qui est eveniet. Aut quas mollitia qui nobis vitae. Perferendis aut et eaque sit aut.','2019-01-28 05:20:37','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (180,'Marcelle Kshlerin','(351) 753-0146','elenor.eichmann@example.org','Ratione vitae minima molestias earum eius. Ut id accusantium id et. Qui consequuntur quasi enim porro. Rerum laudantium dolores est et consequatur.','2019-06-15 21:07:25','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (181,'Mr. Lorenzo Mueller','929-256-9180','vrippin@example.net','Explicabo error incidunt voluptas qui beatae. Et quas vero at esse ut laboriosam. Soluta nam rerum assumenda id vel aut voluptas.','2019-01-17 19:21:07','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (182,'Dr. Nicola Graham','1-734-371-1978','dixie.paucek@example.net','In vero beatae soluta tempore. Corporis iure sunt unde velit est. Officia omnis quasi facilis nemo fugiat. Autem sequi itaque quisquam voluptatem molestiae non repudiandae.','2019-05-07 23:42:51','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (183,'Jayme Kunze','347-467-4443','lang.laurence@example.net','Aut itaque architecto ipsam ducimus quisquam magnam provident nisi. Excepturi quis tempora non laudantium fugit ipsa. Et aut ullam a non unde enim. Vel dolores minima sint autem eos.','2019-04-10 22:24:00','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (184,'Ms. Cecile Halvorson','+17638832952','xrenner@example.net','Praesentium quod praesentium suscipit doloribus excepturi. Voluptatibus perferendis debitis et aut quia nihil. Odio ratione nemo animi dicta. Consequatur sit omnis vel praesentium omnis at tempore.','2019-10-19 02:22:54','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (185,'Patience Boyle','816.926.5172','denesik.marcos@example.com','Laborum dolorem voluptatem nulla magnam ea sit. Sunt exercitationem fugit ducimus excepturi laudantium. Ipsa quos occaecati sed voluptatibus voluptates. Blanditiis deserunt aut odit illum necessitatibus fuga qui.','2019-09-26 10:37:52','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (186,'Ayden Rodriguez','+1 (531) 796-8644','ideckow@example.net','Quidem in atque non est rerum velit quia. Odio possimus nulla tenetur eius voluptatem in. Ducimus sit sequi nemo et omnis eum neque. Neque ratione doloribus delectus omnis minima.','2019-02-12 17:44:12','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (187,'Jazlyn Koepp III','+1.321.298.1941','ortiz.aimee@example.com','Sit debitis ut corporis officia. Ut nulla est et unde maiores in inventore. Nobis sed nihil dolores alias esse sapiente iure. Esse aut delectus vel neque unde aspernatur. Veniam in magni voluptas corrupti et quibusdam qui.','2019-06-26 03:49:21','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (188,'Orin McDermott','+1-239-757-8520','ernser.felicia@example.net','Vitae et animi voluptatum voluptatem quidem id illo. Provident velit sed et non sed soluta voluptatem. Numquam tempore et dolorem numquam. Atque soluta cum deserunt hic alias dolorem omnis.','2019-01-17 05:02:49','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (189,'Jazmyne Cormier','(305) 365-0914','gutkowski.princess@example.org','Est consequatur molestias sed quae natus fugit. Beatae et voluptatem omnis reiciendis maiores aut aliquid. Ad ad sunt quo minus quam voluptatem.','2019-09-09 23:30:15','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (190,'Izaiah Fadel','+1-484-736-4366','bins.general@example.org','Esse sit ex nihil asperiores qui. Error nisi sed iure esse et. Nihil saepe quam molestiae. Suscipit quam accusantium illum ipsam aut non dolor et.','2019-09-16 00:42:04','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (191,'Myriam McGlynn','(469) 388-3514','ervin58@example.org','Dolor et excepturi tempore quaerat quas asperiores quis. Recusandae voluptatem et aut iusto ab. Et aut nostrum natus voluptatum ut.','2019-12-05 18:54:30','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (192,'Daphnee Quitzon','(351) 835-2143','filomena.konopelski@example.net','Enim asperiores aliquid iste est nobis omnis ut. Modi adipisci et autem amet et repellat. Et tenetur praesentium adipisci iste ipsa et. Placeat debitis ullam velit a molestias soluta ipsam.','2019-05-15 03:36:20','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (193,'Ms. Herminia Lebsack DVM','+14246962162','iva00@example.org','Enim odit amet eum ducimus. Mollitia enim illum laborum dolorem ex dolorum unde. Commodi eius dignissimos fugit ducimus rerum maiores. Repellendus eaque eius voluptatem dignissimos itaque architecto.','2019-09-08 00:31:30','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (194,'Nannie Rowe','+1-406-584-0739','mueller.ivah@example.org','Perferendis odit vero fugiat totam. Quisquam ratione voluptatum ipsa et molestiae impedit. Ipsam corporis veniam ab est et alias distinctio nam.','2019-11-23 08:36:45','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (195,'Sarai Stroman','(636) 602-1336','zdavis@example.com','Tempore hic voluptatem rem accusantium eos. Et autem adipisci cum voluptatem molestias fugiat. Suscipit laboriosam alias accusantium nobis et consequatur eum. Dolorum voluptate natus itaque sapiente.','2019-10-05 04:15:28','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (196,'Eliezer Swift V','463-986-3292','oconner.maegan@example.net','Et culpa fuga omnis enim numquam ipsam nobis. Aut debitis velit repellat blanditiis. Omnis aut magnam in voluptatibus aut soluta. Vel quisquam et et cumque cupiditate atque. Eum voluptas magni aut sed distinctio.','2019-08-19 04:36:11','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (197,'Josefa Gutmann','+1.360.460.4543','hdickens@example.net','Ex quidem unde voluptas ad quidem non. Aperiam deserunt hic dolor blanditiis impedit in. Sapiente eligendi perferendis expedita amet maiores sed.','2019-11-16 15:10:32','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (198,'Willard Padberg DDS','520-736-5868','madalyn.veum@example.org','Suscipit ut omnis sint facere libero beatae. Provident accusamus voluptate est sint quod.','2019-11-14 16:35:25','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (199,'Ezra Hane','+1-715-882-4573','effertz.amely@example.net','Animi nobis fugit cumque sed voluptas. Atque laboriosam ut et ut debitis. Nesciunt vel ea beatae et vero et. Porro aliquam exercitationem mollitia laudantium et.','2019-05-11 12:42:51','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (200,'Prof. Dorcas Heaney','+1-689-428-9373','arely87@example.com','Maxime temporibus beatae quis et ducimus. Non quidem voluptas autem ipsam necessitatibus necessitatibus repudiandae. Voluptate aliquid ea consequuntur distinctio et. Rerum sunt rerum accusantium repellendus.','2019-03-24 21:13:25','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (201,'Remington Gleichner','(857) 983-5911','qterry@example.com','Ex saepe deleniti ut provident. Id tempore aut consectetur hic unde est tenetur repellat. Omnis corporis voluptatibus expedita.','2019-02-27 15:10:18','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (202,'Easter Sawayn','424.874.2666','haley.austyn@example.com','Corrupti non perspiciatis aut molestiae. Neque a harum aut voluptas ullam. Voluptas quia quod eum et qui explicabo ipsum. Soluta iste non cupiditate est possimus consectetur.','2019-02-25 00:06:08','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (203,'Tatyana Macejkovic','1-717-286-6672','opowlowski@example.net','Molestias libero sit dolor est. Esse ratione voluptatem ab. Porro harum nisi ratione rem similique quo ipsum. Rerum qui placeat ad est reprehenderit.','2019-04-26 13:05:23','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (204,'Dr. Kolby Wisozk II','1-272-336-2547','johnny.pacocha@example.net','Est vel non voluptas maxime consectetur. Qui perspiciatis repudiandae est praesentium in. Voluptates eos ad nihil debitis corporis distinctio aut. Et odio odio sed hic inventore autem.','2019-10-08 05:12:15','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (205,'Karl Jacobs','+1 (563) 488-7155','qpowlowski@example.org','Aut nihil minima doloremque aut labore dolore sunt. Molestiae recusandae deserunt molestiae sit. Ex veniam voluptas eveniet qui laboriosam quia.','2019-01-07 01:55:30','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (206,'Mr. Jayme Herman IV','(215) 979-5683','hbayer@example.net','Eos similique esse aut qui. Quia impedit ut dolores eligendi numquam laboriosam ducimus. Omnis quibusdam quasi rerum.','2019-12-17 16:20:45','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (207,'Prof. Rory Mitchell Jr.','+1 (726) 749-0281','nreichert@example.org','Possimus natus et at fugit blanditiis dolores sunt et. Voluptatem excepturi quibusdam suscipit velit asperiores esse. Maiores sunt in nesciunt labore fugit assumenda sequi.','2019-07-25 05:39:44','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (208,'Amanda Olson','(469) 652-4841','kristina.hickle@example.org','A hic ipsam et dolore maiores aliquid consectetur. Non quam corrupti dolor sapiente voluptate cupiditate impedit rerum. Harum autem non assumenda quis qui labore architecto.','2019-08-09 20:06:29','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (209,'Silas Schuppe','(980) 940-4574','savion20@example.org','Dolores voluptates voluptatum quidem excepturi. Modi enim impedit officiis doloribus est harum deleniti placeat. Laudantium est similique saepe error consequatur nulla quo. Unde perferendis cumque in aut illo. Maxime laudantium cum blanditiis deleniti aperiam harum.','2019-10-28 08:11:58','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (210,'Dr. Eugene West','1-419-333-0533','velva.keebler@example.net','Molestiae eaque aspernatur voluptas nam in dolor sequi. Ut ea totam illo ea enim alias eius. Ut nihil est quia eum velit. Quibusdam nobis quia ut.','2019-12-28 14:46:19','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (211,'Myles McKenzie','660.890.5360','rex.thiel@example.net','Est dolorem laudantium nihil in molestias id accusamus. Excepturi culpa sed molestiae dolorum ut. A quisquam non dolorem ipsam repellat ullam.','2019-03-13 15:40:34','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (212,'Ayana Jacobson','+1 (620) 318-2774','molly.schneider@example.net','Eveniet eaque aperiam sit et porro eos rerum. Voluptatem autem nisi laudantium odio quia. Et expedita nemo ea. Facilis qui qui sunt.','2019-07-20 03:53:41','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (213,'Fleta Tillman','+1-346-329-0915','ciara41@example.net','Eaque labore ex voluptatem facere repellat totam. Rerum cum itaque vero sunt sequi aut voluptatem. Dolorem quo ut enim saepe.','2019-10-15 18:33:32','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (214,'Mrs. Luz Gulgowski','801-949-3413','boyer.sabryna@example.net','Fugiat quisquam rerum id doloremque voluptas officiis aperiam. Laborum molestias quibusdam consequatur placeat delectus id assumenda possimus. Ea ut ab laboriosam.','2019-07-09 11:30:22','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (215,'Maude O\'Hara','+1-928-533-6274','nborer@example.com','Quasi aut explicabo fugit enim repellendus ad maxime. Dolores nihil eaque expedita quam. Numquam error aut ex consequatur.','2019-10-22 21:50:50','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (216,'Mrs. Arlene Kovacek','423.213.9751','nader.adelle@example.org','Cumque quos minima minus. Eaque id minus et repudiandae distinctio repellendus. Asperiores qui et omnis quam enim provident eum. Explicabo vero magni ullam sunt occaecati corporis.','2019-09-11 17:55:13','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (217,'Dr. Logan Herzog','+1-312-874-9745','nicholaus.morar@example.net','Fugiat nihil vero autem est blanditiis facere. Sapiente doloremque tenetur minima labore voluptas qui molestiae. Voluptatem a hic voluptas error dolore.','2019-05-17 10:07:29','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (218,'Ricardo Funk','(941) 237-3795','beichmann@example.com','Repudiandae consequatur sunt et laboriosam non veritatis. Qui fugit consequatur quam voluptatem corporis est laudantium.','2019-01-15 19:24:43','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (219,'Lillie Klocko','1-989-901-1616','talia10@example.com','Cupiditate autem voluptatem earum ea commodi ut cupiditate. Quisquam quia accusamus vero doloribus magnam. Autem amet voluptate aspernatur eveniet aliquid. Voluptatum voluptatem ea voluptas sed fugiat asperiores enim. Quia in expedita eveniet at sit tenetur sit.','2019-08-22 22:31:23','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (220,'Kayla Monahan','+1-458-734-2076','tcole@example.org','Dolor fugit dolorum est dolor non. Quia cum consectetur omnis porro impedit et nobis. Commodi error aut labore odio.','2019-04-08 09:58:48','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (221,'Leta Harvey','+1-681-624-2880','heathcote.arden@example.net','Nam nesciunt non consequuntur vitae beatae ut aut. Voluptate reprehenderit architecto quod doloribus. Aliquam voluptas aut doloribus minus et maxime. Ea veniam quo enim quidem magni non excepturi est.','2019-05-17 17:08:11','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (222,'Axel Romaguera','(551) 309-1685','aida.treutel@example.org','Repellendus id molestiae recusandae ab. Voluptatibus id sint quos est quaerat. Odio dolor impedit nulla consectetur magnam iusto porro.','2019-12-14 14:42:21','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (223,'Stuart Ruecker','540.738.6003','carey.erdman@example.net','Officiis neque omnis accusamus eius. Delectus ut nihil veniam. Rerum ad qui modi. Quasi accusantium quia itaque vel totam excepturi.','2019-03-16 00:46:39','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (224,'D\'angelo Stoltenberg','+1 (854) 781-2967','witting.ciara@example.net','Repellat ratione ut tenetur tempore repellendus adipisci facilis. Rerum dolor nulla architecto molestiae suscipit amet sit. Officia illum quia est reprehenderit impedit fugit. Consequatur sunt modi fuga iste sit nobis quam.','2019-08-28 18:25:43','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (225,'Dr. Stanley Kunze','+1 (256) 517-7891','don27@example.net','Amet rerum velit saepe rerum velit cum. Libero pariatur optio voluptate ea quisquam ad.','2019-02-01 15:11:48','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (226,'Mrs. Dora McGlynn','(854) 682-9050','stephania46@example.com','Porro non et nobis quia excepturi dolorum sit. Esse delectus expedita rerum minus est nesciunt perferendis. Expedita soluta quas praesentium voluptatem occaecati et voluptate. Et ipsum aut qui voluptatem incidunt quia dolores.','2019-07-31 21:05:54','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (227,'Clarissa Frami','(859) 785-4783','travon.lynch@example.net','Sunt quaerat amet dolorum quam voluptate. Consectetur aut dolor voluptates amet voluptas eveniet. Velit voluptatibus quaerat repellendus fuga delectus consequatur.','2019-10-16 12:59:32','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (228,'Darien Roob','(283) 796-1774','bernita48@example.net','Corporis eos quas minima harum non velit suscipit. Quidem ut cum id pariatur aut similique. Rem repellat exercitationem excepturi et.','2019-04-04 13:01:27','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (229,'Carmen Gerhold IV','(308) 905-8365','okey.crist@example.com','Perferendis ipsum illo debitis voluptas et asperiores. Voluptatem enim placeat quae.','2019-05-02 10:52:19','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (230,'Prof. Brooklyn Flatley','+1.380.402.4302','fshields@example.com','Dolor voluptatibus aut sed minima accusamus. Beatae architecto voluptatibus corporis nisi id omnis. Non veritatis nostrum est recusandae eius. Nobis libero saepe iusto ad ut maxime.','2019-11-11 23:41:16','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (231,'Danyka Torphy','(937) 201-4248','nelda.moen@example.org','Recusandae aliquid vero eum molestiae. Aut sit repellendus provident et et. Aut quibusdam eum et dolores. Sed veniam ut quia quia magni. Recusandae beatae sapiente ut libero.','2018-08-20 13:41:20','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (232,'Danielle Cummerata','+1.878.230.2089','jefferey.kihn@example.org','Non minus voluptas voluptas. Illum eos saepe nihil nostrum dicta quia distinctio quas. Provident unde iste laudantium enim dolorem sed expedita ea.','2018-04-22 07:57:55','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (233,'Ally Collins','+1-336-214-9789','colby.rohan@example.com','Similique facere autem distinctio cum quia. Rerum maiores quo qui dolorem. Non laudantium omnis repellendus.','2018-08-20 15:24:27','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (234,'Mrs. Hannah Ebert','+1 (620) 353-5486','fritsch.stan@example.org','Qui totam nesciunt qui quod sequi labore numquam. Eum reprehenderit quis rerum numquam. Illo eligendi temporibus cupiditate quasi explicabo. Quia architecto quos occaecati magnam eum.','2018-02-18 03:35:54','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (235,'Dr. Salvatore Predovic','1-616-372-8568','kaylah.hauck@example.com','Deserunt esse tempore non ipsa omnis est. Aut sint sunt molestias fugiat ipsam quos. A sed non consequuntur neque est consequuntur. Et dolorem repudiandae impedit illum totam sint voluptates.','2018-05-13 02:47:02','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (236,'Colin O\'Kon','620-568-3037','mohammad.bartoletti@example.org','Quo qui architecto fuga sequi quia impedit. Commodi similique asperiores rerum hic. Ut nihil ab enim eaque autem recusandae ipsum. Incidunt eum aperiam ea et voluptate voluptas.','2018-05-23 23:46:12','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (237,'Brooks Medhurst','701-922-9064','cgreenfelder@example.net','Est quo nulla non non nihil. Consequatur autem ut quis cumque commodi dolorem harum. Pariatur atque neque vitae in eum. Nulla ullam aut iusto quia quia.','2018-08-28 04:47:37','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (238,'Beulah Steuber','458-647-8635','mmraz@example.net','Fuga rem fuga quam necessitatibus animi sit et doloribus. Expedita vitae ab quibusdam beatae dolore aliquam. Numquam facere pariatur ad et natus molestiae id.','2018-04-15 20:04:24','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (239,'Grayson Hintz','(847) 209-4451','shayna.dooley@example.com','Laudantium et molestiae earum nam maxime ducimus. Beatae pariatur autem placeat dolor aut quae.','2018-12-27 01:16:48','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (240,'Julia Medhurst PhD','1-339-669-1521','mmorissette@example.org','Exercitationem occaecati consectetur maiores ut amet labore corrupti. Nostrum quia voluptatum in mollitia dolor blanditiis dolores soluta. Eos debitis voluptatem et. Vero reiciendis et fugiat accusantium deleniti et.','2018-04-27 18:38:19','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (241,'Derrick Hermiston','(352) 491-4807','ekunde@example.org','Ratione blanditiis dolores ea. Beatae itaque quibusdam consequatur consequatur et. Laborum ut aut eaque asperiores porro nulla.','2018-01-16 13:01:20','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (242,'Afton Carter','901-295-2358','wdenesik@example.net','Optio laborum est quia non. Sed vero itaque qui minima officiis distinctio odio. Animi eum sit ut est fugit. Iure labore ipsum enim vitae vel consectetur est. Earum rem ut architecto dignissimos et dolorum.','2018-09-05 04:25:13','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (243,'Berry Kling MD','+1-586-259-3935','littel.kaci@example.org','Ratione optio explicabo et quia illo ut. Aut amet aut dolores molestiae quis ut est. Quis nisi sit ut nemo. Voluptatem sit est sunt cumque odit vitae.','2018-03-01 11:59:48','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (244,'Domenico Schmidt','+1-662-789-8290','royal07@example.net','Accusamus molestias quas rerum veritatis. Temporibus quae ipsa praesentium est sed. Est dolor vel consectetur culpa ratione esse ut. Qui quisquam praesentium eligendi est ut autem. Sapiente quibusdam autem aut consequuntur rerum voluptas enim perferendis.','2018-01-27 06:02:02','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (245,'Roel Kirlin','+1-854-357-0133','vconn@example.com','Reiciendis necessitatibus cum deserunt et aut maiores. Explicabo consectetur nihil minima sunt quia. Qui explicabo et tenetur. Dolor voluptates veritatis est soluta nemo maiores.','2018-11-08 00:17:52','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (246,'Leann Hartmann I','+1-830-415-1462','bogisich.gennaro@example.org','Labore laudantium iste et sunt. Quam excepturi facere et vero quia perspiciatis. Eius nulla ut est blanditiis omnis optio ipsa. In at ipsa est est odit velit neque.','2018-06-05 03:17:09','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (247,'Krista Thiel PhD','+1-339-271-3293','raven68@example.com','Omnis dolore eum officia voluptas beatae ut nam. Consequatur qui porro autem laudantium fuga ratione. Fugiat modi id et qui est.','2018-05-01 17:45:26','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (248,'Fredy Langworth','+1-503-376-6023','thagenes@example.org','Rem eum debitis sit eos accusantium non. Dolorem est molestiae consequatur voluptatem. Sequi aut ut animi earum cupiditate.','2018-11-06 01:17:45','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (249,'Mr. Arvel Haley','+1 (760) 701-2584','schmidt.reece@example.com','Omnis laudantium est dolor facilis ipsum nostrum sunt et. Non maiores tenetur et magni voluptatibus. Ex adipisci aut quia impedit perspiciatis autem quam aut.','2018-04-15 12:39:32','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (250,'Adolphus Smitham','1-503-938-6705','gustave.hand@example.net','Fuga voluptatem iure autem ut quis mollitia debitis. Est dicta et laudantium. Aut esse quo odit. Fugiat vitae dignissimos animi aspernatur magni et. Rerum iste est dolorem facere.','2018-09-07 01:11:17','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (251,'Trudie Schinner','+1.931.545.3722','xgreenfelder@example.net','Ut nobis fugiat autem quidem vero architecto. Iure sint tenetur laboriosam repellat consequuntur quasi.','2018-10-07 07:09:25','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (252,'Morgan Witting V','+1.724.672.9549','trantow.bill@example.org','Aut voluptas delectus quod et. Ea alias amet et id quod amet fugiat officia. Dolorem sit ea placeat dolorem exercitationem. Qui dicta eos dolorem numquam voluptatem qui.','2018-09-18 23:57:35','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (253,'Shanelle Stamm','1-651-225-1961','neil13@example.net','Sint voluptatibus nostrum consequuntur qui quos. Voluptas et est aperiam iste molestiae. Quasi ut velit nulla harum. Suscipit corrupti voluptatum consequuntur et. Doloremque soluta quam unde minus dolorem asperiores sed est.','2018-04-15 00:31:41','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (254,'Kendra Weissnat PhD','(540) 988-3086','veum.magdalen@example.com','Eum magnam impedit laudantium illum magnam. Omnis iste nemo possimus dignissimos reiciendis iure. Ut cupiditate perferendis voluptas omnis occaecati quae iste qui.','2018-08-18 20:29:00','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (255,'Maegan Champlin','+19064690444','nwintheiser@example.com','Et non aliquid nesciunt autem neque. Eaque enim saepe expedita eum. Iusto quisquam molestiae adipisci. Dolor aut molestiae est qui.','2018-06-04 19:17:16','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (256,'Lavon Ullrich','1-901-390-4471','javon55@example.org','Assumenda in perferendis doloribus mollitia quisquam unde impedit. Voluptatibus ea autem at. Earum dicta itaque ea magnam debitis animi. Tenetur ut nobis recusandae nulla.','2018-04-19 02:31:52','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (257,'Dr. Alek Russel MD','954-942-4716','conner.kovacek@example.net','Sunt incidunt omnis repellat quas adipisci. Qui quaerat aperiam aut. Ut atque est enim.','2018-07-19 13:51:25','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (258,'Americo Lebsack','1-770-512-0005','ethel38@example.com','Neque dolores eos placeat dolore nihil totam nesciunt. Vitae voluptas eum velit reprehenderit aut culpa dignissimos repudiandae. Qui facere qui cupiditate voluptate.','2018-07-01 10:36:03','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (259,'Jerod Volkman','+1.678.893.5584','jimmy34@example.com','Minus quia qui est commodi enim fuga adipisci dolores. Repellendus veniam impedit iure est quasi assumenda. Repellat sint veritatis voluptas totam.','2018-09-13 22:56:29','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (260,'Gaylord Kassulke','706.781.6633','kcorkery@example.net','Sit et natus eum vel repellendus totam. Eaque quis et perferendis debitis aut sit aut. Eum labore similique nulla. Quae qui aperiam cumque aut explicabo quod quia.','2018-01-12 02:46:17','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (261,'Leanna Mitchell','(731) 314-2270','pboyle@example.net','Explicabo voluptas repellat et dolorem aliquid dolores. Impedit minus velit molestias fuga ad. Ut quis id expedita praesentium.','2018-08-13 14:24:10','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (262,'Treva Stanton','951-919-2530','tremblay.mac@example.net','Excepturi sint dignissimos neque animi. Numquam deserunt sed unde. Qui voluptatem distinctio facere ullam in.','2018-06-12 22:56:05','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (263,'Finn Renner','+19178133287','jackeline.lang@example.com','Eum libero et occaecati consequuntur itaque hic culpa. Sunt quos enim consequatur et voluptatum. Dolorem voluptas illum sed consequatur ipsam. Quibusdam id sequi consequuntur autem architecto nesciunt.','2018-09-03 10:40:46','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (264,'Ludie Borer','+15304303686','ljacobi@example.net','Sequi sed pariatur molestiae velit assumenda. Assumenda consectetur ipsam sit qui et repellendus repudiandae. Eum dignissimos omnis dolor. Sunt est ullam harum in et.','2018-11-18 19:04:58','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (265,'Chet Swaniawski','607-525-6782','aiden98@example.net','Aut aliquam error inventore eligendi. Ullam et esse et dolorem molestiae odit aliquam. Et quibusdam voluptas autem enim accusamus hic qui saepe.','2018-12-24 17:16:11','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (266,'Ms. Bessie Williamson IV','+1 (570) 773-9511','heathcote.kelton@example.org','Minima natus consequatur nulla. Aperiam vel et provident labore necessitatibus quo. Sed voluptas dolorem eveniet non reprehenderit maiores aliquam. Molestiae mollitia et dolorum voluptate quaerat.','2018-04-12 09:28:30','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (267,'Mrs. Wilma McLaughlin II','463.539.0800','marcel97@example.org','Dolorem quis repellat quod et animi totam sit. Dolorem excepturi voluptas perferendis dolores molestiae. Perferendis alias qui dolorem totam aut. Repudiandae dolores dolorem qui architecto iste repudiandae et.','2018-10-09 01:49:24','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (268,'Kendra Pouros','(667) 502-6338','kilback.malvina@example.org','Animi est praesentium sed dicta id asperiores. Sequi sed fugit cumque mollitia. Corporis cum consectetur consectetur quo animi velit.','2018-11-02 19:27:09','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (269,'Jackeline Jones','(820) 576-2947','greenfelder.kade@example.com','Aut aspernatur harum et fugit. Inventore voluptate dolorem sit quia optio sapiente. Molestias corrupti dicta aut voluptates eveniet. Nesciunt qui repudiandae rerum autem.','2018-01-25 04:54:17','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (270,'Brant Treutel','307-406-5006','luciano.gislason@example.com','A omnis distinctio beatae cum est pariatur neque. Id corrupti autem similique et qui et cum. Reprehenderit atque mollitia ea iusto.','2018-10-05 11:12:05','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (271,'Bryana Pfeffer','(910) 380-6199','karina.stokes@example.org','Impedit deleniti vel qui tempora laborum. Sit ratione optio pariatur reiciendis repellat tempora explicabo eveniet. Excepturi et asperiores ipsum animi sed consequuntur.','2018-06-14 14:16:48','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (272,'Herminia Sporer','+1 (862) 748-6478','aubree.wiegand@example.org','Sit autem odit et aperiam inventore rerum cupiditate. Tempore velit quia nemo vel est beatae.','2018-01-17 20:25:40','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (273,'Wilhelmine Block','678-572-1578','bleannon@example.net','Officiis sunt ipsum quis quasi. Voluptatem laborum nesciunt nostrum consequatur aspernatur. Dolores corporis quos id dolor et. Dolor porro excepturi saepe totam.','2018-02-23 01:32:43','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (274,'Caterina Erdman DDS','680-971-1670','bwilkinson@example.org','Voluptates molestias accusamus tenetur. Ipsum a voluptatem quam. Et doloremque voluptatem dolores dolores perspiciatis et.','2018-05-08 20:48:22','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (275,'Reinhold Russel','+1-978-904-5658','sbrekke@example.net','Possimus dolorem modi iste illo odit. Suscipit voluptates et eum recusandae esse. Sed ea quo eum voluptas inventore.','2018-04-01 19:56:23','2024-06-07 04:12:53');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (276,'Elroy Mohr Jr.','909-471-1952','ohomenick@example.net','In sed molestiae nobis asperiores modi magnam qui. Et aut ut sunt suscipit sed. Voluptas autem eos deleniti iure et sit totam praesentium. Est corrupti eligendi ipsam consequuntur assumenda pariatur.','2018-10-13 22:16:05','2024-06-07 04:12:54');
INSERT INTO `user_inquiries` (`id`, `name`, `mobile_number`, `email`, `message`, `created_at`, `updated_at`) VALUES (277,'Walton D\'Amore','+1.513.918.3149','kub.asia@example.net','Ipsam ullam doloribus voluptas eum. Nostrum ea ratione aut culpa et nemo. Ullam voluptas aut dolorem molestias corporis consequuntur impedit maxime.','2018-06-11 08:50:20','2024-06-07 04:12:54');
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (1,'Admin','shakib.munshi@rndtechnosoft.in',NULL,'$2y$12$GY88zIDEN6SHtRbFelcBtuuaY0O5UJRZqvTYIqkdEeJNeNnTXy5Ha','nissqL5pLNKX5MKvxfkKsuHuhVAQmA7yBk27zPoYLVEopMwMgzD8GGBVS3gu','2024-05-16 11:46:42','2024-05-16 11:46:42');
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (2,'Admin001','shakib001@gmail.com',NULL,'$2y$12$1Bvuz0.tJidTFdrfW/BnDuukDr16ox6Awl8ON9XHrMIIEmo1qIZAC',NULL,'2024-05-19 17:16:55','2024-05-19 17:16:55');
INSERT INTO `why_choose_us` (`id`, `why_title`, `why_description`, `why_image`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (3,'Example - 2','Example - 2','1716996012.png','Example - 2',0,'2024-05-22 11:41:12','2024-06-07 01:25:24');
INSERT INTO `why_choose_us` (`id`, `why_title`, `why_description`, `why_image`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (4,'Why Choose Us Example - 1','Example','1716995956.png','Example',0,'2024-05-22 14:43:42','2024-06-07 01:25:25');
INSERT INTO `why_choose_us` (`id`, `why_title`, `why_description`, `why_image`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (5,'Example - 2','Example - 2','1716996012.png','Example - 2',1,'2024-06-05 01:46:27','2024-06-05 01:46:27');
INSERT INTO `why_choose_us` (`id`, `why_title`, `why_description`, `why_image`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (6,'Why Choose Us Example - 1','Example','1716995956.png','Example',1,'2024-06-05 01:46:28','2024-06-05 01:46:28');
INSERT INTO `why_choose_us` (`id`, `why_title`, `why_description`, `why_image`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (7,'Example - 2','Example - 2','1716996012.png','Example - 2',1,'2024-06-07 01:25:42','2024-06-07 01:25:42');
INSERT INTO `why_choose_us` (`id`, `why_title`, `why_description`, `why_image`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (8,'Why Choose Us Example - 1','Example','1716995956.png','Example',1,'2024-06-07 01:25:42','2024-06-07 01:25:42');
INSERT INTO `why_choose_us` (`id`, `why_title`, `why_description`, `why_image`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (9,'Example - 2','Example - 2','1716996012.png','Example - 2',1,'2024-06-07 01:25:42','2024-06-07 01:25:42');
INSERT INTO `why_choose_us` (`id`, `why_title`, `why_description`, `why_image`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (10,'Why Choose Us Example - 1','Example','1716995956.png','Example',1,'2024-06-07 01:25:42','2024-06-07 01:25:42');
INSERT INTO `why_choose_us` (`id`, `why_title`, `why_description`, `why_image`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (11,'Example - 2','Example - 2','1716996012.png','Example - 2',1,'2024-06-09 11:00:54','2024-06-09 11:00:54');
INSERT INTO `why_choose_us` (`id`, `why_title`, `why_description`, `why_image`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (12,'Why Choose Us Example - 1','Example','1716995956.png','Example',1,'2024-06-09 11:00:54','2024-06-09 11:00:54');
INSERT INTO `why_choose_us` (`id`, `why_title`, `why_description`, `why_image`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (13,'Example - 2','Example - 2','1716996012.png','Example - 2',1,'2024-06-09 11:00:54','2024-06-09 11:00:54');
INSERT INTO `why_choose_us` (`id`, `why_title`, `why_description`, `why_image`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (14,'Why Choose Us Example - 1','Example','1716995956.png','Example',1,'2024-06-09 11:00:54','2024-06-09 11:00:54');
INSERT INTO `why_choose_us` (`id`, `why_title`, `why_description`, `why_image`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (15,'Example - 2','Example - 2','1716996012.png','Example - 2',1,'2024-06-09 11:00:54','2024-06-09 11:00:54');
INSERT INTO `why_choose_us` (`id`, `why_title`, `why_description`, `why_image`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (16,'Why Choose Us Example - 1','Example','1716995956.png','Example',1,'2024-06-09 11:00:54','2024-06-09 11:00:54');
INSERT INTO `why_choose_us` (`id`, `why_title`, `why_description`, `why_image`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (17,'Example - 2','Example - 2','1716996012.png','Example - 2',1,'2024-06-09 11:00:54','2024-06-09 11:00:54');
INSERT INTO `why_choose_us` (`id`, `why_title`, `why_description`, `why_image`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (18,'Why Choose Us Example - 1','Example','1716995956.png','Example',1,'2024-06-09 11:00:54','2024-06-09 11:00:54');
