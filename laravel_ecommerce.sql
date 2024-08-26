-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2024 at 07:21 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lara_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `archive` tinyint(4) NOT NULL DEFAULT 0,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `description`, `image`, `status`, `archive`, `category_id`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Cras ornare tristique elit.', 'Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Suspendisse potenti. Sed egestas \r\nSed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Suspendisse potenti. Sed egestas \r\nSed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Suspendisse potenti. Sed egestas ', NULL, 0, 0, 17, 2, '2024-05-03 07:43:11', '2024-05-03 07:43:11'),
(2, 'Facilisis aliquam porttitor mauris sit amet orci.', '<p><span style=\"color: rgb(119, 119, 119); font-family: Poppins; font-size: 14px;\">Morbi purus libero, faucibus commodo quis, gravida id, est. Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui.&nbsp;</span><span style=\"color: rgb(119, 119, 119); font-family: Poppins; font-size: 14px;\">Morbi purus libero, faucibus commodo quis, gravida id, est. Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui,&nbsp;</span><span style=\"color: rgb(119, 119, 119); font-family: Poppins; font-size: 14px;\">Morbi purus libero, faucibus commodo quis, gravida id, est. Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui.&nbsp;</span><span style=\"color: rgb(119, 119, 119); font-family: Poppins; font-size: 14px;\">Morbi purus libero, faucibus commodo quis, gravida id, est. Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui</span><br></p>', NULL, 0, 0, 7, 2, '2024-05-03 05:55:33', '2024-05-03 05:55:33'),
(3, 'ewrwerwer', '<p>wrwerew</p>', NULL, 0, 1, 15, 2, '2024-05-03 06:23:03', '2024-05-03 07:05:38'),
(4, 'qqq', '<p>qqq</p>', NULL, 0, 1, 14, 2, '2024-05-03 06:27:25', '2024-05-03 07:05:32'),
(5, 'aaaa', '<p>aaaaaa</p>', NULL, 0, 1, 9, 2, '2024-05-03 06:29:21', '2024-05-03 07:05:24');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `meta_keyword` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `archive` tinyint(4) NOT NULL DEFAULT 0,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`, `slug`, `meta_keyword`, `meta_description`, `meta_title`, `status`, `archive`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Samsung', 'samsung', 'Samsung', 'Telecommunication company', 'Samsung', 0, 0, 1, '2024-02-26 17:38:57', '2024-02-26 17:55:07'),
(2, 'iPhone', 'iphone', 'iPhone', 'Telecommunication company', 'iPhone', 0, 0, 1, '2024-02-26 17:40:00', '2024-02-26 17:44:04'),
(3, 'Adidas', 'adidas', 'Adidas', 'Adidas. Adidas first edition products', 'Adidas 1st Edition', 0, 0, 2, '2024-04-10 17:18:57', '2024-04-10 17:18:57'),
(4, 'Nike', 'nike', 'Nike', 'Nike', 'Nike 1st Edition', 0, 0, 2, '2024-04-10 17:19:47', '2024-04-10 17:19:47'),
(5, 'Jordan', 'Jordan', 'Jordan', 'Michael Jordan products from New York, USA', 'Jordan 1st Edition', 0, 0, 2, '2024-04-10 17:21:22', '2024-04-10 17:21:22'),
(6, 'Sony', 'sony', 'sony', 'Sony: Next-generation gaming console', 'Next-generation', 0, 0, 1, '2024-05-03 08:39:20', '2024-05-03 08:39:20'),
(7, 'Gucci', 'gucci', 'Gucci', 'Gucci', 'Gucci', 0, 0, 1, '2024-05-03 08:39:57', '2024-05-03 08:39:57'),
(8, 'Canon', 'canon', 'Canon', 'Canon', 'Canon', 0, 0, 1, '2024-05-03 08:40:36', '2024-05-03 08:40:36'),
(9, 'Rolex', 'rolex', 'Rolex', 'Rolex', 'Rolex', 0, 0, 1, '2024-05-03 09:08:18', '2024-05-03 09:08:18');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `meta_keyword` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `archive` tinyint(4) NOT NULL DEFAULT 0,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `meta_keyword`, `meta_title`, `slug`, `status`, `archive`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Shop with Sidebar', 'Shop with Sidebar', 'Shop with Sidebar', 'Shop with Sidebar', 'Shop-with-Sidebar', 0, 1, 2, '2024-02-24 17:26:22', '2024-04-13 18:17:37'),
(2, 'Shop with No Sidebar', 'Shop with No Sidebar', 'Shop with No Sidebar', 'Shop with No Sidebar', 'Shop-with-No-Sidebar', 0, 1, 2, '2024-02-24 17:32:21', '2024-04-13 18:17:46'),
(3, 'Shop by Mobile Transaction', 'Shop by Mobile Transaction', 'Shop by Mobile Transaction', 'Shop by Mobile Transaction', 'Shop-by-Mobile-Transaction', 0, 1, 2, '2024-02-24 17:48:19', '2024-04-13 18:17:54'),
(7, 'LifeStyles', 'LifeStyle', 'LifeStyle', 'LifeStyles', 'Lifestyles', 0, 0, 9, '2024-04-07 13:39:56', '2024-04-07 13:39:56'),
(8, 'Shoes', 'Shoes', 'Shoes', 'Shoes', 'shoes', 0, 0, 2, '2024-04-10 17:22:55', '2024-04-10 17:22:55'),
(9, 'Electronics', 'Electronics', 'Electronics', 'Electronics', 'Electronics', 0, 0, 2, '2024-04-10 17:23:33', '2024-04-10 17:23:33'),
(11, 'Jewelry & Watches', 'Jewelry and Watches', 'Jewelry & Watches', 'Jewelry & Watches', 'jewelry-and-watches', 0, 0, 2, '2024-04-13 18:08:48', '2024-04-13 18:08:48'),
(12, 'Sports & Outdoors', 'Sports and Outdoors', 'Sports & Outdoors', 'Sports & Outdoors', 'Sports & Outdoors', 0, 0, 2, '2024-04-13 18:09:30', '2024-04-13 18:09:30'),
(13, 'Toys & Games', 'Toys and Games', 'Toys & Games', 'Toys & Games', 'toys-and-games', 0, 0, 2, '2024-04-13 18:10:28', '2024-04-13 18:10:28'),
(14, 'Books, Movies & Music', 'Books, Movies & Music', 'Books, Movies & Musics', 'Books, Movies & Music', 'Books, Movies & Music', 0, 0, 2, '2024-04-13 18:11:27', '2024-04-13 18:11:27'),
(15, 'Beauty & Personal Care', 'Beauty & Personal Care', 'Beauty & Personal Care', 'Beauty & Personal Care', 'Beauty-and-personal-care', 0, 0, 2, '2024-04-13 18:12:36', '2024-04-13 18:12:36'),
(16, 'Home & Furniture', 'Home & Furniture', 'Home & Furniture', 'Home & Furniture', 'home-and-furniture', 0, 0, 2, '2024-04-13 18:13:23', '2024-04-13 18:13:23'),
(17, 'Fashion', 'Fashion', 'Fashion', 'Fashion', 'Fashion', 0, 0, 2, '2024-04-13 18:14:05', '2024-04-13 18:14:05');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `archive` tinyint(4) NOT NULL DEFAULT 0,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id`, `name`, `code`, `status`, `archive`, `created_by`, `created_at`, `updated_at`) VALUES
(2, 'Black', '#000000', 0, 0, 2, '2024-02-27 14:42:08', '2024-02-28 13:01:27'),
(7, 'Red', '#ff0000', 0, 0, 9, '2024-04-06 17:19:55', '2024-04-06 17:19:55'),
(8, 'Blue', '#1100ff', 0, 0, 1, '2024-04-07 05:55:58', '2024-04-07 05:55:58'),
(9, 'Green', '#229e00', 0, 0, 1, '2024-04-07 05:56:35', '2024-04-07 05:56:35');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_02_24_200529_create_category_table', 2),
(6, '2024_02_24_214433_additional_columns_in_category_table', 3),
(7, '2024_02_25_110431_sub_category_table', 4),
(8, '2024_02_25_141039_product_table', 5),
(9, '2024_02_25_160318_product_table', 6),
(10, '2024_02_25_161154_brand_table', 7),
(11, '2024_02_25_163255_additional_columns_in_brand_table', 8),
(12, '2024_02_27_193505_create_product_table', 9),
(13, '2024_02_27_201129_create_color_table', 10),
(14, '2024_02_28_194600_add_sku_in_product_table', 11),
(15, '2024_04_06_090905_create_color_table', 12),
(16, '2024_04_06_092906_create_color_table', 13),
(17, '2024_04_07_151408_create_products_table', 14),
(18, '2024_04_09_120718_add_sku_column_in_table', 15),
(19, '2024_04_10_211007_create_product_color_table', 16),
(20, '2024_04_12_083715_create_products_colors_table', 17),
(21, '2024_04_13_085854_create_product_size_table', 18),
(22, '2024_04_13_091618_create_product_size_table', 19),
(23, '2024_04_13_123230_create_product_image_table', 20),
(24, '2024_05_03_072402_create_blogs_table', 21),
(25, '2024_05_03_085113_add_image_in_blogs_table', 22);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `sku` varchar(255) DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sub_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `old_price` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `additional_info` text DEFAULT NULL,
  `shipping_returns` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `archive` tinyint(4) NOT NULL DEFAULT 0,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `slug`, `sku`, `category_id`, `sub_category_id`, `brand_id`, `old_price`, `price`, `short_description`, `description`, `additional_info`, `shipping_returns`, `status`, `archive`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Under Wear', 'under-wear', 'UW9890', 17, 14, 4, '7000', '1000', '<p><span style=\"color: rgb(189, 193, 198); font-family: arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(32, 33, 36); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is available.</span></p>', '<p><span style=\"color: rgb(189, 193, 198); font-family: arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(32, 33, 36); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is available.</span></p>', '<p><span style=\"color: rgb(189, 193, 198); font-family: arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(32, 33, 36); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is available.</span></p>', '<p><span style=\"color: rgb(189, 193, 198); font-family: arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(32, 33, 36); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is available.</span></p>', 0, 0, 2, '2024-04-07 12:22:05', '2024-04-30 11:38:41'),
(2, 'Short Trouser', 'short-trouser', 'SKU87345', 17, 14, 5, '900', '700', '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span><br></p>', '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry.</span><br></p>', '<p><span style=\"font-weight: bolder; margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</span><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry.</span><br></p>', '<p><span style=\"font-weight: bolder; margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</span><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry.</span><br></p>', 0, 0, 2, '2024-04-07 12:22:44', '2024-04-30 11:32:19'),
(5, 'Open shoes', 'open-shoes', 'OPS874', 1, 1, 3, '3000', '4500', '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>', '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>', '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>', '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>', 0, 0, 2, '2024-04-10 17:12:06', '2024-04-10 18:57:34'),
(6, 'Travolta', 'travolta', 'SKU87345', 17, 14, 3, '8000', '10000', '<p><span>The code should work as intended if the tables and columns exist and if your application logic aligns with these conditions.</span><br></p>', '<p><span>The code should work as intended if the tables and columns exist and if your application logic aligns with these conditions.</span><br></p>', '<p><span>The code should work as intended if the tables and columns exist and if your application logic aligns with these conditions.</span><br></p>', '<p><span>The code should work as intended if the tables and columns exist and if your application logic aligns with these conditions.</span><br></p>', 0, 0, 2, '2024-04-10 17:14:20', '2024-04-30 11:33:36'),
(7, 'Handbag', 'handbag', 'HB234', 15, 17, 4, '4500', '4000', '<p><span style=\"color: rgb(105, 105, 105); font-family: &quot;Segoe UI&quot;, &quot;Segoe UI Midlevel&quot;, &quot;Segoe WP&quot;, Arial, sans-serif; font-size: 0.813em;\">Microsoft and our third-party vendors use cookies to store and access information such as unique IDs to deliver, maintain and improve our services and ads.</span></p>', '<p><span style=\"color: rgb(105, 105, 105); font-family: &quot;Segoe UI&quot;, &quot;Segoe UI Midlevel&quot;, &quot;Segoe WP&quot;, Arial, sans-serif; font-size: 13.008px;\">Microsoft and our third-party vendors use cookies to store and access information such as unique IDs to deliver, maintain and improve our services and ads.</span><br></p>', '<p><span style=\"color: rgb(105, 105, 105); font-family: &quot;Segoe UI&quot;, &quot;Segoe UI Midlevel&quot;, &quot;Segoe WP&quot;, Arial, sans-serif; font-size: 13.008px;\">Microsoft and our third-party vendors use cookies to store and access information such as unique IDs to deliver, maintain and improve our services and ads.</span><br></p>', '<p><span style=\"color: rgb(105, 105, 105); font-family: &quot;Segoe UI&quot;, &quot;Segoe UI Midlevel&quot;, &quot;Segoe WP&quot;, Arial, sans-serif; font-size: 13.008px;\">Microsoft and our third-party vendors use cookies to store and access information such as unique IDs to deliver, maintain and improve our services and ads.</span><br></p>', 0, 0, 2, '2024-04-30 11:41:10', '2024-04-30 11:43:54'),
(8, 'Airforce', 'air-force', 'AF734', 17, 9, 5, '80000', '75000', '<p>New product from Turkey</p><p><iframe frameborder=\"0\" src=\"//www.youtube.com/embed/h4pmzQI7ikI\" width=\"640\" height=\"360\" class=\"note-video-clip\"></iframe><br></p>', '<p>New product from Turkey<br></p>', '<p>New product from Turkey<br></p>', '<p>New product from Turkey<br></p>', 0, 0, 1, '2024-05-01 04:08:33', '2024-05-03 09:30:06'),
(9, 'Laptop', 'laptop', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, '2024-05-03 08:41:08', '2024-05-03 08:41:08'),
(10, 'Men\'s Watch', 'mens-watch', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, '2024-05-03 09:09:29', '2024-05-03 09:09:29');

-- --------------------------------------------------------

--
-- Table structure for table `product_color`
--

CREATE TABLE `product_color` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `color_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` bigint(20) UNSIGNED DEFAULT 0,
  `archive` bigint(20) UNSIGNED DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_color`
--

INSERT INTO `product_color` (`id`, `product_id`, `color_id`, `status`, `archive`, `created_at`, `updated_at`) VALUES
(65, 2, 2, 0, 0, '2024-04-30 11:32:19', '2024-04-30 11:32:19'),
(66, 2, 8, 0, 0, '2024-04-30 11:32:19', '2024-04-30 11:32:19'),
(67, 2, 9, 0, 0, '2024-04-30 11:32:19', '2024-04-30 11:32:19'),
(68, 2, 7, 0, 0, '2024-04-30 11:32:19', '2024-04-30 11:32:19'),
(69, 6, 2, 0, 0, '2024-04-30 11:33:36', '2024-04-30 11:33:36'),
(70, 6, 8, 0, 0, '2024-04-30 11:33:36', '2024-04-30 11:33:36'),
(71, 6, 9, 0, 0, '2024-04-30 11:33:36', '2024-04-30 11:33:36'),
(72, 6, 7, 0, 0, '2024-04-30 11:33:36', '2024-04-30 11:33:36'),
(73, 1, 2, 0, 0, '2024-04-30 11:38:41', '2024-04-30 11:38:41'),
(74, 1, 8, 0, 0, '2024-04-30 11:38:41', '2024-04-30 11:38:41'),
(75, 1, 9, 0, 0, '2024-04-30 11:38:41', '2024-04-30 11:38:41'),
(76, 1, 7, 0, 0, '2024-04-30 11:38:41', '2024-04-30 11:38:41'),
(77, 7, 8, 0, 0, '2024-04-30 11:43:54', '2024-04-30 11:43:54'),
(84, 8, 2, 0, 0, '2024-05-03 09:30:06', '2024-05-03 09:30:06'),
(85, 8, 8, 0, 0, '2024-05-03 09:30:06', '2024-05-03 09:30:06');

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `extension` varchar(255) DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_by` bigint(20) UNSIGNED NOT NULL DEFAULT 100,
  `archive` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`id`, `name`, `extension`, `product_id`, `order_by`, `archive`, `status`, `created_at`, `updated_at`) VALUES
(18, '2gzlzbd5xvwvq7drbrwuo.jpg', 'jpg', 2, 100, 0, 0, '2024-04-13 14:06:11', '2024-04-13 14:06:11'),
(19, '2vromeauirt1o3rfwp5gr.jpg', 'jpg', 2, 100, 0, 0, '2024-04-13 14:06:11', '2024-04-13 14:06:11'),
(20, '2yupadgkeffkl6t5y7kxw.jpg', 'jpg', 2, 100, 0, 0, '2024-04-13 14:06:11', '2024-04-13 14:06:11'),
(22, '2zk1mo5n0jz3rhpl67ibx.jpg', 'jpg', 2, 100, 0, 0, '2024-04-13 14:06:11', '2024-04-13 14:06:11'),
(28, '6xynkmfopbzcmla698jlz.jpg', 'jpg', 6, 100, 0, 0, '2024-04-30 11:33:36', '2024-04-30 11:33:36'),
(29, '6h2ebwd210qtcgppe9ok8.jpg', 'jpg', 6, 100, 0, 0, '2024-04-30 11:33:36', '2024-04-30 11:33:36'),
(30, '66puxgs2j712snfijsnoe.jpg', 'jpg', 6, 100, 0, 0, '2024-04-30 11:33:36', '2024-04-30 11:33:36'),
(31, '1tr0mslyjkvr0qryrqico.jpg', 'jpg', 1, 100, 0, 0, '2024-04-30 11:38:41', '2024-04-30 11:38:41'),
(32, '7fhwy7hutyhxtbwdmqpj4.jpg', 'jpg', 7, 100, 0, 0, '2024-04-30 11:43:54', '2024-04-30 11:43:54'),
(33, '7vp1nkxqob6njcbujbc2i.jpg', 'jpg', 7, 100, 0, 0, '2024-04-30 11:43:54', '2024-04-30 11:43:54'),
(34, '78phpvspadrce9mkizpbo.jpg', 'jpg', 7, 100, 0, 0, '2024-04-30 11:43:54', '2024-04-30 11:43:54'),
(37, '87dusge9pgts1d0ux6cgz.jpg', 'jpg', 8, 100, 0, 0, '2024-05-01 04:12:17', '2024-05-01 04:12:17');

-- --------------------------------------------------------

--
-- Table structure for table `product_size`
--

CREATE TABLE `product_size` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `archive` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_size`
--

INSERT INTO `product_size` (`id`, `name`, `price`, `product_id`, `archive`, `status`, `created_at`, `updated_at`) VALUES
(61, '1.3', '2000', 2, 0, 0, '2024-04-30 11:32:19', '2024-04-30 11:32:19'),
(62, '2.0', '3000', 2, 0, 0, '2024-04-30 11:32:19', '2024-04-30 11:32:19'),
(63, '3.0', '4500', 2, 0, 0, '2024-04-30 11:32:19', '2024-04-30 11:32:19'),
(64, '39', '10000', 6, 0, 0, '2024-04-30 11:33:36', '2024-04-30 11:33:36'),
(65, '40', '12000', 6, 0, 0, '2024-04-30 11:33:36', '2024-04-30 11:33:36'),
(66, '41', '15000', 6, 0, 0, '2024-04-30 11:33:36', '2024-04-30 11:33:36'),
(67, '42', '20000', 6, 0, 0, '2024-04-30 11:33:36', '2024-04-30 11:33:36'),
(68, '20', '5000', 1, 0, 0, '2024-04-30 11:38:41', '2024-04-30 11:38:41'),
(69, '23', '6000', 1, 0, 0, '2024-04-30 11:38:41', '2024-04-30 11:38:41'),
(70, '25', '7000', 1, 0, 0, '2024-04-30 11:38:41', '2024-04-30 11:38:41'),
(71, '30', '0', 1, 0, 0, '2024-04-30 11:38:41', '2024-04-30 11:38:41'),
(72, '20', '5000', 7, 0, 0, '2024-04-30 11:43:54', '2024-04-30 11:43:54'),
(82, '40', '75000', 8, 0, 0, '2024-05-03 09:30:07', '2024-05-03 09:30:07'),
(83, '41', '75000', 8, 0, 0, '2024-05-03 09:30:07', '2024-05-03 09:30:07'),
(84, '42', '80000', 8, 0, 0, '2024-05-03 09:30:07', '2024-05-03 09:30:07');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keyword` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `archive` tinyint(4) NOT NULL DEFAULT 0,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`id`, `category_id`, `name`, `slug`, `meta_title`, `meta_keyword`, `description`, `status`, `archive`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'Lorem ipsum dolor sit', 'Lorem ipsum dolor sit, amet consectetur', 'Lorem ipsum dolor sit, amet consectetur', 'Lorem ipsum dolor sit, amet consectetur', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Impedit laborum voluptatem possimus quod perferendis et placeat hic voluptate quaerat eaque, pariatur ut, nulla laboriosam dolor soluta aspernatur. Laborum, accusantium ipsum.', 0, 1, 1, '2024-02-25 11:20:50', '2024-04-13 18:19:01'),
(2, 3, 'Lorem ipsum dolor sit 123', 'Lorem ipsum dolor sit, amet consectetur 123', 'Lorem ipsum dolor sit, amet consectetur 123', 'Lorem ipsum dolor sit, amet consectetur 123', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Impedit laborum voluptatem possimus quod perferendis et placeat hic voluptate quaerat eaque, pariatur ut, nulla laboriosam dolor soluta aspernatur. Laborum, accusantium ipsum. 123', 0, 1, 2, '2024-02-25 11:20:50', '2024-04-13 18:18:58'),
(6, 16, 'Kitchen & Dining', 'kitchen-and-dining', 'Kitchen & Dining', 'Kitchen & Dining', 'Kitchen & Dining', 0, 0, 2, '2024-04-13 18:20:30', '2024-04-13 19:03:56'),
(7, 16, 'Furniture', 'furniture', 'Furniture', 'Furniture', 'Furniture', 0, 0, 2, '2024-04-13 18:21:12', '2024-04-13 18:21:12'),
(8, 17, 'Lingerie & Sleepwear', 'lingerie-and-sleepwear', 'Lingerie & Sleepwear', 'Lingerie & Sleepwear', 'Lingerie & Sleepwear', 0, 0, 2, '2024-04-13 18:22:40', '2024-04-13 18:22:40'),
(9, 17, 'Shoes & Footwear', 'shoes-and-footwear', 'Shoes & Footwear', 'Shoes & Footwear', 'Shoes & Footwear', 0, 0, 2, '2024-04-13 18:23:56', '2024-04-13 18:23:56'),
(10, 9, 'Audio & Headphones', 'audio-and-headphones', 'Audio & Headphones', 'Audio & Headphones', 'Audio & Headphones', 0, 0, 2, '2024-04-13 18:25:09', '2024-04-13 18:25:09'),
(11, 14, 'Mabala The Farmer', 'mabala-the-farmer', 'Mabala The Farmer', 'Mabala The Farmer', 'Mabala The Farmer', 0, 0, 2, '2024-04-13 18:29:54', '2024-04-13 18:29:54'),
(12, 14, 'Tanzania Royal Tour', 'tanzania-royal-tour', 'Tanzania Royal Tour', 'Tanzania Royal Tour', 'Tanzania Royal Tour', 0, 0, 2, '2024-04-13 18:31:36', '2024-04-13 18:31:36'),
(13, 9, 'Gaming', 'gaming', 'Gaming', 'Gaming', 'Gaming', 0, 0, 2, '2024-04-13 18:32:44', '2024-04-13 18:32:44'),
(14, 17, 'Women\'s Clothes', 'womens-clothes', 'Women\'s Clothes', 'Women\'s Clothes', 'Women\'s Clothes', 0, 0, 2, '2024-04-13 18:33:48', '2024-04-13 18:33:48'),
(15, 17, 'Men\'s Clothes', 'mens-clothes', 'Men\'s Clothes', 'Men\'s Clothes', 'Men\'s Clothes', 0, 0, 2, '2024-04-13 18:34:34', '2024-04-13 18:34:34'),
(16, 17, 'Kid\'s Clothes', 'kids-clothes', 'Kid\'s Clothes', 'Kid\'s Clothes', 'Kid\'s Clothes', 0, 0, 2, '2024-04-13 18:35:20', '2024-04-13 18:35:20'),
(17, 15, 'Skin Care', 'skin-care', 'Skin Care', 'Skin Care', 'Skin Care', 0, 0, 2, '2024-04-13 19:11:10', '2024-04-13 19:11:10'),
(18, 15, 'Hair Care', 'hair-care', 'Hair Care', 'Hair Care', 'Hair Care', 0, 0, 2, '2024-04-13 19:11:43', '2024-04-13 19:18:38'),
(19, 15, 'Makeup', 'makeup', 'Makeup', 'Makeup', 'Makeup', 0, 0, 2, '2024-04-13 19:12:25', '2024-04-13 19:19:16'),
(20, 17, 'Watches', 'watches', 'Watches', 'Watches', 'Watches', 0, 0, 1, '2024-05-03 09:09:10', '2024-05-03 09:09:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` int(5) NOT NULL DEFAULT 1,
  `status` int(5) NOT NULL DEFAULT 0,
  `archive` int(5) NOT NULL DEFAULT 0,
  `created_by` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `status`, `archive`, `created_by`) VALUES
(1, 'Elisha Bwilukiro', '0987654321', 'elisha@email.com', '2024-02-09 06:55:18', '$2y$10$PzbpZCQuTezRn1lk1bpZqe5fpGRHHkGgduhaUr/0AfXn.8Jra/Mkm', NULL, '2024-02-09 06:55:18', '2024-02-24 11:15:58', 1, 0, 0, 1),
(2, 'Esther Samwel', '0987654321', 'esther@email.com', NULL, '$2y$10$otJuFICOXYdiCZLPmKiuTODhy.MbJnvmz5WEeYLhlAfwBzXm1Asc6', NULL, '2024-02-13 02:19:44', '2024-04-06 13:44:44', 1, 0, 0, 1),
(3, 'Hemed Maguzo', '0987654321', 'hemed@gmail.com', NULL, '$2y$10$y//tDRpi9cSQn.//LqMnvOgmXcv0K9nzKyBl0xIn70o/yUStxukOq', NULL, '2024-02-22 17:47:16', '2024-02-23 01:23:28', 1, 0, 0, 1),
(9, 'Japhet Danison', '078932463263', 'japhet@emai.com', NULL, '$2y$10$MCgjUIG3zzvvwBy8I9HLOOxGU8mbg23ASUJkQaqFcqgOmt4VRhvcC', NULL, '2024-04-06 13:29:20', '2024-04-06 13:45:07', 1, 0, 0, 2),
(10, 'Jackson Mwatuka', '0653064129', 'jackson@gmail.com', NULL, '$2y$10$HYIRO/RCLBERmT5XY4PYAOcQoppGyWX0F9Y3EzB02r7lNpmqWfyoy', NULL, '2024-04-06 13:44:21', '2024-04-06 13:44:21', 1, 1, 0, 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogs_category_id_foreign` (`category_id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_sub_category_id_foreign` (`sub_category_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`),
  ADD KEY `products_created_by_foreign` (`created_by`);

--
-- Indexes for table `product_color`
--
ALTER TABLE `product_color`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_color_product_id_foreign` (`product_id`),
  ADD KEY `product_color_color_id_foreign` (`color_id`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_image_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_size`
--
ALTER TABLE `product_size`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_size_product_id_foreign` (`product_id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_category_category_id_foreign` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product_color`
--
ALTER TABLE `product_color`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `product_size`
--
ALTER TABLE `product_size`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`),
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `products_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `products_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_category` (`id`);

--
-- Constraints for table `product_color`
--
ALTER TABLE `product_color`
  ADD CONSTRAINT `product_color_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`),
  ADD CONSTRAINT `product_color_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `product_image`
--
ALTER TABLE `product_image`
  ADD CONSTRAINT `product_image_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `product_size`
--
ALTER TABLE `product_size`
  ADD CONSTRAINT `product_size_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD CONSTRAINT `sub_category_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
