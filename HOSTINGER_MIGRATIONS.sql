-- Script SQL para crear tablas en Hostinger
-- Ejecutar esto en phpMyAdmin o Terminal de Hostinger

-- Tabla de Banners
CREATE TABLE IF NOT EXISTS `banners` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci,
  `button_text` varchar(50) COLLATE utf8mb4_unicode_ci,
  `order` int NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `banners_is_active_index` (`is_active`),
  KEY `banners_order_index` (`order`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabla de Media
CREATE TABLE IF NOT EXISTS `media` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(100) COLLATE utf8mb4_unicode_ci,
  `file_size` bigint NOT NULL,
  `category` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section` varchar(50) COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `media_category_index` (`category`),
  KEY `media_is_active_index` (`is_active`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Agregar columnas a testimonials
ALTER TABLE `testimonials` ADD COLUMN IF NOT EXISTS `image_url` varchar(255) COLLATE utf8mb4_unicode_ci AFTER `avatar_url`;
ALTER TABLE `testimonials` ADD COLUMN IF NOT EXISTS `file_path` varchar(255) COLLATE utf8mb4_unicode_ci AFTER `image_url`;
ALTER TABLE `testimonials` ADD COLUMN IF NOT EXISTS `file_type` varchar(100) COLLATE utf8mb4_unicode_ci AFTER `file_path`;
ALTER TABLE `testimonials` ADD COLUMN IF NOT EXISTS `file_size` bigint AFTER `file_type`;

