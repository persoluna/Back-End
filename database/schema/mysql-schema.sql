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
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt_tag1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt_tag2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_signature` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt_tag3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `application_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `application_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `application_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt_tag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `banner_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt_tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `blog_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt_tag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `banner_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_alt_tag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `posted_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_canonical` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt_tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon_alt_tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_canonical` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `client_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt_tag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` int NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt_tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `news_letter` text COLLATE utf8mb4_unicode_ci,
  `instagram_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` text COLLATE utf8mb4_unicode_ci,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt_tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_canonical` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_alt_tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fav_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon_alt_tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keyword` text COLLATE utf8mb4_unicode_ci,
  `meta_canonical` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
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
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `page_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt_tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_canonical` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `missions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `missions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `Mission_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Mission_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Mission_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Mission_alt_tag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vision_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vision_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `vision_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vision_alt_tag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Core_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Core_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Core_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Core_alt_tag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
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
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint unsigned NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt_tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_canonical` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_slug_unique` (`slug`),
  KEY `products_category_id_foreign` (`category_id`),
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_canonical` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `testimonials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `testimonials` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt_tag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
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
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `why_choose_us`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `why_choose_us` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `why_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `why_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `why_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt_tag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
INSERT INTO `abouts` (`id`, `title`, `sub_title`, `description`, `image1`, `alt_tag1`, `image2`, `alt_tag2`, `owner_name`, `owner_designation`, `owner_signature`, `alt_tag3`, `created_at`, `updated_at`) VALUES (1,'About Company','We Are Solving All of Your Business Problem','Our industry\'s business policy encompasses the strategies, guidelines, and practices that technology companies use to achieve their goals and objectives. The policies may vary depending on the company\'s size, market position, and competitive landscape. Commodo erat amet vitae consectetur consectetur feugiat.\n\nTellus viverra eu risus ut ipsum magna sed odio elit. Sed sem purus tincidunt condimentum amet condimentum massa. Nunc vel nascetur id cras.','1716620039.png','1','1716618010.png','2','Savannah Nguyen','CEO & Founder of Manit','1716617936.png','Savannah Nguyen','2024-05-25 01:23:59','2024-05-25 01:23:59');
INSERT INTO `applications` (`id`, `application_title`, `application_description`, `application_image`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (2,'Test002','Test002','1716995877.png','Test002',1,'2024-05-22 01:05:58','2024-05-29 09:47:57');
INSERT INTO `applications` (`id`, `application_title`, `application_description`, `application_image`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (3,'Test003','Test003','1716360039.jpeg','Test003',0,'2024-05-22 01:10:39','2024-05-22 01:20:04');
INSERT INTO `applications` (`id`, `application_title`, `application_description`, `application_image`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (4,'Application 4','Application 4','1716995820.jpg','Application 4',1,'2024-05-22 01:11:49','2024-05-29 09:47:00');
INSERT INTO `applications` (`id`, `application_title`, `application_description`, `application_image`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (5,'Application 3','Application 3','1716995788.jpg','Application 3',0,'2024-05-22 01:14:59','2024-05-29 09:46:28');
INSERT INTO `applications` (`id`, `application_title`, `application_description`, `application_image`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (6,'Application 2','Application 2','1716995761.jpg','Application 2',1,'2024-05-22 01:18:51','2024-05-29 09:46:01');
INSERT INTO `applications` (`id`, `application_title`, `application_description`, `application_image`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (7,'Application 1','Application 1','1716995743.jpg','Application 1',1,'2024-05-22 01:19:33','2024-05-29 09:45:43');
INSERT INTO `banners` (`id`, `title`, `sub_title`, `description`, `banner_image`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (11,'demo','demo','demo','1716008684.png','img',0,'2024-05-17 23:34:44','2024-05-21 21:54:02');
INSERT INTO `banners` (`id`, `title`, `sub_title`, `description`, `banner_image`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (13,'EXAMPLE','EXAMPLE','EXAMPLE','1716995308.jpg','EXAMPLE',0,'2024-05-19 23:26:38','2024-05-29 09:38:28');
INSERT INTO `banners` (`id`, `title`, `sub_title`, `description`, `banner_image`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (14,'EXAMPLE','EXAMPLE','EXAMPLE','1716995291.jpg','EXAMPLE',1,'2024-05-20 01:26:02','2024-05-29 09:38:11');
INSERT INTO `banners` (`id`, `title`, `sub_title`, `description`, `banner_image`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (15,'EXAMPLE','EXAMPLE','EXAMPLE','1716995276.jpg','EXAMPLE',0,'2024-05-20 22:04:34','2024-05-29 09:39:00');
INSERT INTO `banners` (`id`, `title`, `sub_title`, `description`, `banner_image`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (16,'Test002','Test002','Test002','1716995238.jpg','Test002',0,'2024-05-21 21:52:37','2024-05-29 09:37:18');
INSERT INTO `banners` (`id`, `title`, `sub_title`, `description`, `banner_image`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (17,'Test001','Test001','Test001','1716995222.jpg','Test001',0,'2024-05-21 21:53:03','2024-06-01 03:36:01');
INSERT INTO `blogs` (`id`, `blog_title`, `blog_slug`, `short_description`, `long_description`, `blog_image`, `alt_tag`, `status`, `banner_image`, `banner_alt_tag`, `posted_by`, `meta_title`, `meta_description`, `meta_keywords`, `meta_canonical`, `created_at`, `updated_at`) VALUES (2,'2','2','2','2','YuGKJBAu3CYDuusL0nMJVGuTofQwlPb0xyrdSSdh.png','2',1,'TG5s9CbuzjMokamTlC7PprzbyuYw4F6FWzodGTom.png','2','shakib munshi 2','2','2','2','http://127.0.0.1:8000/blogs/create','2024-05-27 05:29:51','2024-05-27 22:56:22');
INSERT INTO `blogs` (`id`, `blog_title`, `blog_slug`, `short_description`, `long_description`, `blog_image`, `alt_tag`, `status`, `banner_image`, `banner_alt_tag`, `posted_by`, `meta_title`, `meta_description`, `meta_keywords`, `meta_canonical`, `created_at`, `updated_at`) VALUES (3,'Test003','Test003 Slug','Test003 short description','Test003 long description','1iwmZ068YwFGn896EwWDQhX1FfInFhlYVCWocGLn.png','Test003 Alt tag',0,'7AiA2RUb7l29FAH33ywrnwqbbLpDVkvprAlnBZrp.png','Test003 Banner alt tag','shakib munshi','test003 Title','test003 Description','test 003 Keywords','http://127.0.0.1:8000/blogs','2024-05-27 22:14:57','2024-05-27 22:54:14');
INSERT INTO `categories` (`id`, `name`, `slug`, `image`, `alt_tag`, `icon`, `icon_alt_tag`, `meta_title`, `meta_description`, `meta_keyword`, `meta_canonical`, `status`, `created_at`, `updated_at`) VALUES (2,'name','slug','iRQRW1754OaNyUJy8blua7ruLyVl1XsJDQ3lpM14.png','alt tag','8GHAPC98nApyhNyXJyNByNPav9oWkN7TSYqq4c8l.jpg','icon alt tag','title','description','keyword','http://127.0.0.1:8000/blogs/create',1,'2024-05-28 23:53:40','2024-05-29 00:02:43');
INSERT INTO `categories` (`id`, `name`, `slug`, `image`, `alt_tag`, `icon`, `icon_alt_tag`, `meta_title`, `meta_description`, `meta_keyword`, `meta_canonical`, `status`, `created_at`, `updated_at`) VALUES (3,'2','2','bY1OZi4Mn6Nzur3mZBee48iQSWpZkI4upfhTjtIj.jpg','2','rYM97LBdJ6ORDYwb5ZstpBCLUvEYvahv78SxAkuR.jpg','2','2','2','2','http://127.0.0.1:8000/blogs/create',0,'2024-05-28 23:59:15','2024-05-29 00:02:36');
INSERT INTO `categories` (`id`, `name`, `slug`, `image`, `alt_tag`, `icon`, `icon_alt_tag`, `meta_title`, `meta_description`, `meta_keyword`, `meta_canonical`, `status`, `created_at`, `updated_at`) VALUES (4,'3 name','3 slug','ApuIvaSo5ohgnarRDD0CT4c4mThGlfV28PyL5gA0.jpg','3 alt tag','Fatpt6qzPh6DC2P5kk1LdHcnfKfiIbaRdmzXYW0w.jpg','3 icon alt tag','3 title','3 description','3 keyword','http://127.0.0.1:8000/blogs/create001',1,'2024-05-29 00:01:57','2024-05-29 00:01:57');
INSERT INTO `categories` (`id`, `name`, `slug`, `image`, `alt_tag`, `icon`, `icon_alt_tag`, `meta_title`, `meta_description`, `meta_keyword`, `meta_canonical`, `status`, `created_at`, `updated_at`) VALUES (5,'002','002','5orBBoJjdVJkgfZxGbtFJXGg9BALJhsMcGqFzBgZ.jpg','002','aeOolx1LEBzGy8Le6jVt2n2doPqex1QVgmpZyBE3.jpg','002','002','002','002','http://127.0.0.1:8000/blogs',1,'2024-05-29 03:05:57','2024-05-29 03:05:57');
INSERT INTO `clients` (`id`, `client_image`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (1,'1716996197.png','Test - 1',1,'2024-05-23 05:22:46','2024-05-29 09:53:17');
INSERT INTO `clients` (`id`, `client_image`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (3,'1716996211.png','Example - 2',1,'2024-05-29 09:53:31','2024-05-29 09:53:31');
INSERT INTO `clients` (`id`, `client_image`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (4,'1716996222.png','Test 3',1,'2024-05-29 09:53:42','2024-05-29 09:53:42');
INSERT INTO `counters` (`id`, `title`, `number`, `icon`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (6,'Final test',22,'1716283153.png','Final test',0,'2024-05-21 03:48:08','2024-05-21 05:05:30');
INSERT INTO `counters` (`id`, `title`, `number`, `icon`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (7,'Counter - 5',21,'1716995592.svg','Counter - 5 Alt Tag',1,'2024-05-21 04:14:37','2024-05-29 09:43:39');
INSERT INTO `counters` (`id`, `title`, `number`, `icon`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (9,'Counter - 4',9,'1716995532.svg','Counter - 4 Alt Tag',0,'2024-05-21 05:07:27','2024-05-29 09:42:12');
INSERT INTO `counters` (`id`, `title`, `number`, `icon`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (11,'Counter - 3',30,'1716995508.svg','Counter - 3 Alt Tag',1,'2024-05-21 05:08:00','2024-05-29 09:42:38');
INSERT INTO `counters` (`id`, `title`, `number`, `icon`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (17,'Counter - 2',17,'1716995484.svg','Counter - 2 Alt Tag',1,'2024-05-21 05:19:44','2024-05-29 09:41:24');
INSERT INTO `counters` (`id`, `title`, `number`, `icon`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (18,'Counter - 1',26,'1716995416.svg','Counter - 1 Alt Tag',0,'2024-05-21 05:20:47','2024-05-29 09:40:56');
INSERT INTO `footers` (`id`, `news_letter`, `instagram_link`, `facebook_link`, `google_link`, `location`, `phone`, `phone2`, `email`, `email2`, `address`, `logo`, `alt_tag`, `meta_title`, `meta_description`, `meta_keyword`, `meta_canonical`, `created_at`, `updated_at`) VALUES (1,'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nesciunt iure blanditiis labore tempora inventore laborum error molestias,','#','#','#','https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.9147703055!2d-74.11976314309273!3d40.69740344223377!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sbd!4v1547528325671','8866481097','8866481097','info@gmail.com','novopack@gmail.com','7 Green Lake Street Crawfordsville, IN 47933','1716996530.svg','image','title','description','keyword','canonical',NULL,'2024-05-29 09:58:50');
INSERT INTO `headers` (`id`, `phone`, `email`, `logo`, `logo_alt_tag`, `fav_icon`, `icon_alt_tag`, `meta_title`, `meta_description`, `meta_keyword`, `meta_canonical`, `created_at`, `updated_at`) VALUES (1,'8866481097','NovoPack@gmail.com','1716996551.svg','logo001','1716996551.svg','icon001','meta title','meta description','meta keyword','meta canonical',NULL,'2024-05-30 06:16:21');
INSERT INTO `headings` (`id`, `title`, `sub_title`, `created_at`, `updated_at`) VALUES (1,'Application','Our Applications',NULL,'2024-05-29 06:15:26');
INSERT INTO `headings` (`id`, `title`, `sub_title`, `created_at`, `updated_at`) VALUES (2,'Why Choose Us','Why Choose Us',NULL,'2024-05-29 06:15:39');
INSERT INTO `headings` (`id`, `title`, `sub_title`, `created_at`, `updated_at`) VALUES (3,'Testimonial','What Our Clients Say\'s',NULL,'2024-05-29 06:15:19');
INSERT INTO `headings` (`id`, `title`, `sub_title`, `created_at`, `updated_at`) VALUES (4,'What We Offer','Our Products',NULL,NULL);
INSERT INTO `headings` (`id`, `title`, `sub_title`, `created_at`, `updated_at`) VALUES (5,'Blogs','News & Articles',NULL,NULL);
INSERT INTO `menus` (`id`, `page_name`, `slug`, `banner_image`, `alt_tag`, `meta_title`, `meta_keywords`, `meta_description`, `meta_canonical`, `status`, `created_at`, `updated_at`) VALUES (2,'Test002','002','EEB1qRpyHV7xAgLCHAy94zSFPtzNRdC3UcWDJ9q6.png','Test002','Test002','Test002','Test002','http://127.0.0.1:8000/blogs',1,'2024-05-28 05:00:50','2024-05-28 06:18:03');
INSERT INTO `menus` (`id`, `page_name`, `slug`, `banner_image`, `alt_tag`, `meta_title`, `meta_keywords`, `meta_description`, `meta_canonical`, `status`, `created_at`, `updated_at`) VALUES (3,'Test003','003','rUeYNfJtbTJrsIkFBMWRkBwORPW7puFEd65tTSWE.jpg','Test003','Test003','Test003','Test003','http://127.0.0.1:8000/blogs',0,'2024-05-28 05:12:47','2024-05-29 09:59:28');
INSERT INTO `missions` (`id`, `Mission_title`, `Mission_description`, `Mission_image`, `Mission_alt_tag`, `vision_title`, `vision_description`, `vision_image`, `vision_alt_tag`, `Core_title`, `Core_description`, `Core_image`, `Core_alt_tag`, `created_at`, `updated_at`) VALUES (1,'Test1','To pursue our commitment to continuous innovation in terms of manufacturing, technology, product design, and product quality for creating a wider market base of national and international clients.','1716792401_mission.png','Test1','Test2','To achieve the highest level of standards in manufacturing for providing a unique range of food packaging solutions to our esteemed distributors, channel partners, and institutional customers.','1716792401_vision.png','Test2','Test003','To develop and maintain the bond and trust with our Channel Partners and focus on continuous evolution for the long-term sustainability of the company by focusing on the strengths to deliver the promises.','1716792401_core.png','Test003',NULL,'2024-05-27 01:16:41');
INSERT INTO `products` (`id`, `category_id`, `product_name`, `slug`, `description`, `image`, `alt_tag`, `meta_title`, `meta_description`, `meta_keyword`, `meta_canonical`, `status`, `created_at`, `updated_at`) VALUES (1,3,'wWw','qwqw','qwqw','Ih6NpO7arNRx6NjTM1ryQOaBwTnR7cUb0EDBAfRW.png','wqwq','wqwqw','qwqwqw','qwqw','http://127.0.0.1:8000/blogs/create',1,'2024-05-29 01:23:59','2024-05-29 04:02:16');
INSERT INTO `products` (`id`, `category_id`, `product_name`, `slug`, `description`, `image`, `alt_tag`, `meta_title`, `meta_description`, `meta_keyword`, `meta_canonical`, `status`, `created_at`, `updated_at`) VALUES (2,2,'003','003','003','yfMjx3HRDS7Pj43k90wSrGxLXt0s1DlKeaJYUI5L.png','003','003','003','003','http://127.0.0.1:8000/blogs',1,'2024-05-29 03:23:56','2024-05-29 03:41:06');
INSERT INTO `products` (`id`, `category_id`, `product_name`, `slug`, `description`, `image`, `alt_tag`, `meta_title`, `meta_description`, `meta_keyword`, `meta_canonical`, `status`, `created_at`, `updated_at`) VALUES (3,4,'444','444','444','EcvXheDc6o4BFEoGI8IyR37xzxHDswpIecryUMhr.jpg','444','444','444','444','http://127.0.0.1:8000/blogs/create',1,'2024-05-29 03:47:11','2024-05-29 03:58:17');
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES ('al7mslf4pJczjfz8IDxg6DPW6LiYSdysi8jsD0Qk',1,'127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:126.0) Gecko/20100101 Firefox/126.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZ0VJTHZsaEhyeENwRHpOdmh2TDBtalhyaVF6ZEdyTEJYTEJGMVdqMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zY2hlbWEtZHVtcC12aWV3Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9',1717236613);
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES ('KJ4vCakTkIMXkVT2rytZ3CWs23CPyPUWU1DxFOEH',NULL,'127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:126.0) Gecko/20100101 Firefox/126.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiR0Jsd1dkTW5sTDJBajNJVGF4OHZXUnZSeXZWSDFveGlRT1JvWnQ2diI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=',1717232822);
INSERT INTO `staticseos` (`id`, `meta_title`, `meta_keyword`, `meta_description`, `meta_canonical`, `created_at`, `updated_at`) VALUES (1,'Novo Pack','Novo Pack','Novo Pack','Novo Pack',NULL,'2024-05-28 05:39:49');
INSERT INTO `testimonials` (`id`, `name`, `description`, `profile_image`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (1,'Test 2','Test 2','1716996140.jpg','Test 2',0,'2024-05-24 01:59:35','2024-05-29 09:52:20');
INSERT INTO `testimonials` (`id`, `name`, `description`, `profile_image`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (3,'Example 1','Example 1','1716996096.jpg','Example 1',1,'2024-05-24 04:31:12','2024-05-29 09:51:36');
INSERT INTO `testimonials` (`id`, `name`, `description`, `profile_image`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (4,'Test 3','Test 3','1716996159.jpg','Test 3',1,'2024-05-29 09:52:39','2024-05-29 09:52:39');
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (1,'Admin','shakib.munshi@rndtechnosoft.in',NULL,'$2y$12$GY88zIDEN6SHtRbFelcBtuuaY0O5UJRZqvTYIqkdEeJNeNnTXy5Ha','83aU98csaPvVJcKA3Y9trmYUxExCNaAhEoAM5GykrO2QE4cGqfvzkiKUHeMs','2024-05-16 22:46:42','2024-05-16 22:46:42');
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (2,'Admin001','shakib001@gmail.com',NULL,'$2y$12$1Bvuz0.tJidTFdrfW/BnDuukDr16ox6Awl8ON9XHrMIIEmo1qIZAC',NULL,'2024-05-20 04:16:55','2024-05-20 04:16:55');
INSERT INTO `why_choose_us` (`id`, `why_title`, `why_description`, `why_image`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (3,'Example - 2','Example - 2','1716996012.png','Example - 2',0,'2024-05-22 22:41:12','2024-05-29 09:50:12');
INSERT INTO `why_choose_us` (`id`, `why_title`, `why_description`, `why_image`, `alt_tag`, `status`, `created_at`, `updated_at`) VALUES (4,'Why Choose Us Example - 1','Example','1716995956.png','Example',0,'2024-05-23 01:43:42','2024-05-29 09:49:16');
