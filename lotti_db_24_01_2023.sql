-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2023 at 01:06 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lotti_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `variant` varchar(250) DEFAULT NULL,
  `variant_id` varchar(100) DEFAULT NULL,
  `attribute` varchar(200) DEFAULT NULL,
  `attribute_value` varchar(200) DEFAULT NULL,
  `visible_product` varchar(50) DEFAULT NULL,
  `used_for_variation` varchar(50) DEFAULT NULL,
  `stock` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attribute_values`
--

CREATE TABLE `attribute_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `variant_id` varchar(255) NOT NULL,
  `attribute_value` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attribute_values`
--

INSERT INTO `attribute_values` (`id`, `variant_id`, `attribute_value`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, '2', 'Red', 'red', '1', '2023-01-19 02:02:37', '2023-01-19 02:02:37'),
(2, '2', 'Blue', 'blue', '1', '2023-01-19 02:02:41', '2023-01-19 02:02:41'),
(3, '2', 'Gold', 'gold', '1', '2023-01-19 02:02:46', '2023-01-19 02:02:46'),
(4, '3', 'Small', 'small', '1', '2023-01-19 02:02:59', '2023-01-19 02:02:59'),
(5, '3', 'Medium', 'medium', '1', '2023-01-19 02:03:04', '2023-01-19 02:03:04'),
(6, '3', 'Large', 'large', '1', '2023-01-19 02:03:08', '2023-01-19 02:03:08'),
(7, '4', 'Dell', 'dell', '1', '2023-01-19 02:03:19', '2023-01-19 02:03:19'),
(8, '4', 'Intel', 'intel', '1', '2023-01-19 02:03:24', '2023-01-19 02:03:24'),
(9, '4', 'Lenovo', 'lenovo', '1', '2023-01-19 02:03:35', '2023-01-19 02:03:35'),
(10, '1', '26gb', '26gb', '1', '2023-01-20 19:59:55', '2023-01-20 19:59:55'),
(11, '1', '567gb', '567gb', '1', '2023-01-20 19:59:55', '2023-01-20 19:59:55'),
(12, '1', '76gb', '76gb', '1', '2023-01-20 19:59:55', '2023-01-20 19:59:55');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_id` varchar(255) NOT NULL,
  `section_name` varchar(200) DEFAULT NULL,
  `title1` varchar(200) DEFAULT NULL,
  `title2` varchar(200) DEFAULT NULL,
  `title3` varchar(200) DEFAULT NULL,
  `banner_image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `page_id`, `section_name`, `title1`, `title2`, `title3`, `banner_image`, `created_at`, `updated_at`) VALUES
(1, '1', 'home-slider', 'A Store For', 'Electronic', 'Products', '[\"166870430348.webp\",\"166870430381.webp\",\"166870430322.webp\",\"16687043037.webp\"]', '2022-11-11 03:01:03', '2022-11-18 01:58:23'),
(3, '3', 'contact', NULL, NULL, NULL, '1668104917.webp', '2022-11-11 03:08:45', '2022-11-11 03:28:37'),
(4, '12', 'category', NULL, NULL, NULL, '1668103738.webp', '2022-11-11 03:08:58', '2022-11-11 03:08:58'),
(5, '13', 'shop', NULL, NULL, NULL, '1668103755.webp', '2022-11-11 03:09:15', '2022-11-11 03:09:15');

-- --------------------------------------------------------

--
-- Table structure for table `billing_infos`
--

CREATE TABLE `billing_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(100) NOT NULL,
  `product_id` varchar(100) NOT NULL,
  `order_status` varchar(250) DEFAULT NULL,
  `cancellation_status` varchar(200) DEFAULT NULL,
  `cancelled_at` timestamp NULL DEFAULT NULL,
  `cancellation_reason` varchar(200) DEFAULT NULL,
  `cancellation_comments` text DEFAULT NULL,
  `cancellation_image` varchar(250) DEFAULT NULL,
  `product_variantion_id` varchar(250) DEFAULT NULL,
  `attributes` varchar(255) DEFAULT NULL,
  `attribute_values` varchar(255) DEFAULT NULL,
  `delivery_fee` double DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `discounted_price` double DEFAULT NULL,
  `discount` double DEFAULT NULL COMMENT 'How much customer save money',
  `total` double DEFAULT NULL,
  `shipping_address` text DEFAULT NULL,
  `billing_address` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `slug`, `image`, `date`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Lorem ipsum is placeholder text commonly used in the graphic', 'lorem-ipsum-is-placeholder-text-commonly-used-in-the-graphic', '1667340369.png', '2022-11-02', '<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.&nbsp;</p>', 1, '2022-11-02 07:06:09', '2022-11-08 05:54:49'),
(2, 'Lorem ipsum is a name for a common type of placeholder text', 'lorem-ipsum-is-a-name-for-a-common-type-of-placeholder-text', '1667422467.jpg', '2022-11-02', '<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.</p>', 1, '2022-11-02 07:06:57', '2022-11-08 08:23:38');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_category_id` varchar(255) DEFAULT NULL,
  `main_category_id` varchar(255) DEFAULT NULL,
  `brand_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `parent_category_id`, `main_category_id`, `brand_name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'LDNIO', 'ldnio', 1, '2022-12-28 03:55:32', '2022-12-28 03:55:32'),
(2, NULL, NULL, 'MOXOM', 'moxom', 1, '2022-12-28 03:55:48', '2022-12-28 03:55:48'),
(3, NULL, NULL, 'LG', 'lg', 1, '2023-01-18 10:05:14', '2023-01-18 10:05:22');

-- --------------------------------------------------------

--
-- Table structure for table `cancellations`
--

CREATE TABLE `cancellations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cancellation_policy` text DEFAULT NULL,
  `reason` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cancellations`
--

INSERT INTO `cancellations` (`id`, `cancellation_policy`, `reason`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, '<p>Before cancelling the order, kindly read thoroughly our following terms &amp; conditions:</p><ol><li>Once you submit this form you agree to cancel the selected item(s) in your order. We will be unable to retrieve your order once it is cancelled.</li><li>Once you confirm your item(s) cancellation, we will process your refund within 24 hours, provided the item(s) has not been handed over to the logistics partner yet. Please note that, if your item has already been handed over to the logistics partner we will be unable to proceed with your cancellation request and we will inform you accordingly.</li><li>If you are cancelling your order partially, ie. not all the items in your order, then we will be unable to refund you the shipping fee.</li><li>Once your item(s) has been successfully cancelled you will receive a notification from us with your refund summary</li></ol>', 'Change/combine order', NULL, 1, '2023-01-05 17:58:47', '2023-01-05 18:16:07'),
(2, NULL, 'Delivery time is too long', NULL, 1, '2023-01-05 18:06:28', '2023-01-05 18:06:28'),
(3, NULL, 'Duplicate order', NULL, 1, '2023-01-05 18:06:40', '2023-01-05 18:57:00'),
(4, NULL, 'Change of Delivery Address', NULL, 1, '2023-01-05 18:07:03', '2023-01-05 18:56:18'),
(5, NULL, 'Shipping Fees', NULL, 1, '2023-01-05 18:07:17', '2023-01-05 18:55:33'),
(6, NULL, 'Change of mind', NULL, 1, '2023-01-05 18:07:31', '2023-01-05 18:53:28'),
(7, NULL, 'Forgot to use voucher/voucher issue', NULL, 1, '2023-01-05 18:08:04', '2023-01-05 18:53:03'),
(8, NULL, 'Decided for alternative product', NULL, 1, '2023-01-05 18:08:23', '2023-01-05 18:52:12'),
(9, NULL, 'Found cheaper elsewhere', NULL, 1, '2023-01-05 18:08:43', '2023-01-05 18:51:06'),
(10, NULL, 'Change Payment method', NULL, 1, '2023-01-05 18:09:00', '2023-01-05 19:00:25');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(50) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `product_id` varchar(255) DEFAULT NULL,
  `product_variantion_id` varchar(250) DEFAULT NULL,
  `sub_category_id` varchar(250) DEFAULT NULL,
  `quantity` int(11) DEFAULT 1,
  `price` int(11) DEFAULT NULL,
  `discount` varchar(250) DEFAULT NULL COMMENT 'custom how much save money',
  `discounted_price` double DEFAULT NULL,
  `total` int(11) NOT NULL,
  `attribute` varchar(250) DEFAULT NULL,
  `attribute_value` varchar(255) DEFAULT NULL,
  `cart_id_checkbox` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `state_id` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `state_id`, `city`, `created_at`, `updated_at`) VALUES
(1, '1', 'Johor Bahru', '2022-11-30 19:27:17', '2022-11-30 19:27:17'),
(2, '1', 'Tebrau', '2022-11-30 19:28:33', '2022-11-30 19:28:33'),
(3, '1', 'Pasir Gudang', '2022-11-30 19:28:55', '2022-11-30 19:28:55'),
(4, '1', 'Bukit Indah', '2022-11-30 19:29:04', '2022-11-30 19:29:04'),
(5, '1', 'Skudai', '2022-11-30 19:29:13', '2022-11-30 19:29:13'),
(6, '1', 'Kluang', '2022-11-30 19:29:22', '2022-11-30 19:29:22'),
(7, '1', 'Batu Pahat', '2022-11-30 19:29:30', '2022-11-30 19:29:30'),
(8, '1', 'Muar', '2022-11-30 19:29:40', '2022-11-30 19:29:40'),
(9, '1', 'Ulu Tiram', '2022-11-30 19:29:47', '2022-11-30 19:29:47'),
(10, '1', 'Senai', '2022-11-30 19:29:54', '2022-11-30 19:29:54'),
(11, '1', 'Segamat', '2022-11-30 19:30:02', '2022-11-30 19:30:02'),
(12, '1', 'Kulai', '2022-11-30 19:30:09', '2022-11-30 19:30:09'),
(13, '1', 'Kota Tinggi', '2022-11-30 19:30:16', '2022-11-30 19:30:16'),
(14, '1', 'Pontian Kechil', '2022-11-30 19:30:23', '2022-11-30 19:30:23'),
(15, '1', 'Tangkak', '2022-11-30 19:30:32', '2022-11-30 19:30:32'),
(16, '1', 'Bukit Bakri', '2022-11-30 19:30:41', '2022-11-30 19:30:41'),
(17, '1', 'Yong Peng', '2022-11-30 19:30:49', '2022-11-30 19:30:49'),
(18, '1', 'Pekan Nenas', '2022-11-30 19:30:57', '2022-11-30 19:30:57'),
(19, '1', 'Labis', '2022-11-30 19:31:05', '2022-11-30 19:31:05'),
(20, '1', 'Mersing', '2022-11-30 19:31:13', '2022-11-30 19:31:13'),
(21, '1', 'Simpang Renggam', '2022-11-30 19:31:21', '2022-11-30 19:31:21'),
(22, '1', 'Parit Raja', '2022-11-30 19:31:29', '2022-11-30 19:31:29'),
(23, '1', 'Kelapa Sawit', '2022-11-30 19:31:36', '2022-11-30 19:31:36'),
(24, '1', 'Buloh Kasap', '2022-11-30 19:31:44', '2022-11-30 19:31:44'),
(25, '1', 'Chaah', '2022-11-30 19:31:52', '2022-11-30 19:31:52'),
(26, '2', 'Sungai Petani', '2022-11-30 19:33:52', '2022-11-30 19:33:52'),
(27, '2', 'Alor Setar', '2022-11-30 19:34:26', '2022-11-30 19:34:26'),
(28, '2', 'Kulim', '2022-11-30 19:34:34', '2022-11-30 19:34:34'),
(29, '2', 'Jitra / Kubang Pasu', '2022-11-30 19:34:44', '2022-11-30 19:34:44'),
(30, '2', 'Baling', '2022-11-30 19:34:52', '2022-11-30 19:34:52'),
(31, '2', 'Pendang', '2022-11-30 19:35:00', '2022-11-30 19:35:00'),
(32, '2', 'Langkawi', '2022-11-30 19:35:07', '2022-11-30 19:35:07'),
(33, '2', 'Yan', '2022-11-30 19:35:13', '2022-11-30 19:35:13'),
(34, '2', 'Sik', '2022-11-30 19:35:19', '2022-11-30 19:35:19'),
(35, '2', 'Kuala Nerang', '2022-11-30 19:35:26', '2022-11-30 19:35:26'),
(36, '2', 'Pokok Sena', '2022-11-30 19:35:32', '2022-11-30 19:35:32'),
(37, '2', 'Bandar Baharu', '2022-11-30 19:35:40', '2022-11-30 19:35:40'),
(38, '3', 'Kota Bharu', '2022-11-30 19:37:51', '2022-11-30 19:37:51'),
(39, '3', 'Pangkal Kalong', '2022-11-30 19:38:03', '2022-11-30 19:38:03'),
(40, '3', 'Tanah Merah', '2022-11-30 19:38:11', '2022-11-30 19:38:11'),
(41, '3', 'Peringat', '2022-11-30 19:38:18', '2022-11-30 19:38:18'),
(42, '3', 'Wakaf Baru', '2022-11-30 19:38:25', '2022-11-30 19:38:25'),
(43, '3', 'Kadok', '2022-11-30 19:38:32', '2022-11-30 19:38:32'),
(44, '3', 'Pasir Mas', '2022-11-30 19:38:44', '2022-11-30 19:38:44'),
(45, '3', 'Gua Musang', '2022-11-30 19:38:52', '2022-11-30 19:38:52'),
(46, '3', 'Kuala Krai', '2022-11-30 19:38:59', '2022-11-30 19:38:59'),
(47, '3', 'Tumpat', '2022-11-30 19:39:06', '2022-11-30 19:39:06'),
(48, '4', 'Bandaraya Melaka', '2022-11-30 19:40:19', '2022-11-30 19:40:19'),
(49, '4', 'Bukit Baru', '2022-11-30 19:40:27', '2022-11-30 19:40:27'),
(50, '4', 'Ayer Keroh', '2022-11-30 19:40:38', '2022-11-30 19:40:38'),
(51, '4', 'Klebang', '2022-11-30 19:40:46', '2022-11-30 19:40:46'),
(52, '4', 'Masjid Tanah', '2022-11-30 19:40:55', '2022-11-30 19:40:55'),
(53, '4', 'Sungai Udang', '2022-11-30 19:41:02', '2022-11-30 19:41:02'),
(54, '4', 'Batu Berendam', '2022-11-30 19:41:09', '2022-11-30 19:41:09'),
(55, '4', 'Alor Gajah', '2022-11-30 19:41:16', '2022-11-30 19:41:16'),
(56, '4', 'Bukit Rambai', '2022-11-30 19:41:24', '2022-11-30 19:41:24'),
(57, '4', 'Ayer Molek', '2022-11-30 19:41:31', '2022-11-30 19:41:31'),
(58, '4', 'Bemban\"', '2022-11-30 19:41:39', '2022-11-30 19:41:39'),
(59, '4', 'Kuala Sungai Baru', '2022-11-30 19:41:46', '2022-11-30 19:41:46'),
(60, '4', 'Pulau Sebang', '2022-11-30 19:41:55', '2022-11-30 19:41:55'),
(61, '4', 'Jasin', '2022-11-30 19:42:03', '2022-11-30 19:42:03'),
(62, '5', 'Seremban', '2022-11-30 19:43:00', '2022-11-30 19:43:00'),
(63, '5', 'Port Dickson', '2022-11-30 19:43:08', '2022-11-30 19:43:08'),
(64, '5', 'Nilai', '2022-11-30 19:43:16', '2022-11-30 19:43:16'),
(65, '5', 'Bahau', '2022-11-30 19:43:22', '2022-11-30 19:43:22'),
(66, '5', 'Tampin', '2022-11-30 19:43:28', '2022-11-30 19:43:28'),
(67, '5', 'Kuala Pilah', '2022-11-30 19:43:35', '2022-11-30 19:43:35'),
(68, '6', 'Kuantan', '2022-11-30 19:44:18', '2022-11-30 19:44:18'),
(69, '6', 'Temerloh', '2022-11-30 19:44:26', '2022-11-30 19:44:26'),
(70, '6', 'Bentong', '2022-11-30 19:44:33', '2022-11-30 19:44:33'),
(71, '6', 'Mentakab', '2022-11-30 19:44:40', '2022-11-30 19:44:40'),
(72, '6', 'Raub', '2022-11-30 19:44:49', '2022-11-30 19:44:49'),
(73, '6', 'Jerantut', '2022-11-30 19:44:55', '2022-11-30 19:44:55'),
(74, '6', 'Pekan', '2022-11-30 19:45:02', '2022-11-30 19:45:02'),
(75, '6', 'Kuala Lipis', '2022-11-30 19:45:11', '2022-11-30 19:45:11'),
(76, '6', 'Bandar Jengka', '2022-11-30 19:45:18', '2022-11-30 19:45:18'),
(77, '6', 'Bukit Tinggi', '2022-11-30 19:45:26', '2022-11-30 19:45:26'),
(78, '7', 'Ipoh', '2022-11-30 19:45:48', '2022-11-30 19:45:48'),
(79, '7', 'Taiping', '2022-11-30 19:46:04', '2022-11-30 19:46:04'),
(80, '7', 'Sitiawan', '2022-11-30 19:46:12', '2022-11-30 19:46:12'),
(81, '7', 'Simpang Empat', '2022-11-30 19:46:18', '2022-11-30 19:46:18'),
(82, '7', 'Teluk Intan', '2022-11-30 19:46:27', '2022-11-30 19:46:27'),
(83, '7', 'Batu Gajah', '2022-11-30 19:46:34', '2022-11-30 19:46:34'),
(84, '7', 'Lumut', '2022-11-30 19:46:41', '2022-11-30 19:46:41'),
(85, '7', 'Kampung Koh', '2022-11-30 19:46:49', '2022-11-30 19:46:49'),
(86, '7', 'Kuala Kangsar', '2022-11-30 19:46:56', '2022-11-30 19:46:56'),
(87, '7', 'Sungai Siput Utara', '2022-11-30 19:47:03', '2022-11-30 19:47:03'),
(88, '7', 'Tapah', '2022-11-30 19:47:12', '2022-11-30 19:47:12'),
(89, '7', 'Bidor', '2022-11-30 19:47:19', '2022-11-30 19:47:19'),
(90, '7', 'Parit Buntar', '2022-11-30 19:47:26', '2022-11-30 19:47:26'),
(91, '7', 'Ayer Tawar', '2022-11-30 19:47:33', '2022-11-30 19:47:33'),
(92, '7', 'Bagan Serai', '2022-11-30 19:47:40', '2022-11-30 19:47:40'),
(93, '7', 'Tanjung Malim', '2022-11-30 19:47:48', '2022-11-30 19:47:48'),
(94, '7', 'Lawan Kuda Baharu', '2022-11-30 19:47:55', '2022-11-30 19:47:55'),
(95, '7', 'Pantai Remis', '2022-11-30 19:48:05', '2022-11-30 19:48:05'),
(96, '7', 'Kampar', '2022-11-30 19:48:12', '2022-11-30 19:48:12'),
(97, '8', 'Kangar', '2022-11-30 19:48:33', '2022-11-30 19:48:33'),
(98, '8', 'Kuala Perlis', '2022-11-30 19:48:46', '2022-11-30 19:48:46'),
(99, '9', 'Bukit Mertajam', '2022-11-30 19:49:56', '2022-11-30 19:49:56'),
(100, '9', 'Georgetown', '2022-11-30 19:50:05', '2022-11-30 19:50:05'),
(101, '9', 'Sungai Ara', '2022-11-30 19:50:12', '2022-11-30 19:50:12'),
(102, '9', 'Gelugor', '2022-11-30 19:50:20', '2022-11-30 19:50:20'),
(103, '9', 'Ayer Itam', '2022-11-30 19:50:30', '2022-11-30 19:50:30'),
(104, '9', 'Butterworth', '2022-11-30 19:50:38', '2022-11-30 19:50:38'),
(105, '9', 'Perai', '2022-11-30 19:50:47', '2022-11-30 19:50:47'),
(106, '9', 'Nibong Tebal', '2022-11-30 19:50:55', '2022-11-30 19:50:55'),
(107, '9', 'Permatang Kucing', '2022-11-30 19:51:03', '2022-11-30 19:51:03'),
(108, '9', 'Tanjung Tokong', '2022-11-30 19:51:11', '2022-11-30 19:51:11'),
(109, '9', 'Kepala Batas', '2022-11-30 19:51:21', '2022-11-30 19:51:21'),
(110, '9', 'Tanjung Bungah', '2022-11-30 19:51:29', '2022-11-30 19:51:29'),
(111, '9', 'Juru', '2022-11-30 19:51:37', '2022-11-30 19:51:37'),
(112, '10', 'Kota Kinabalu', '2022-11-30 19:52:23', '2022-11-30 19:52:23'),
(113, '10', 'Sandakan', '2022-11-30 19:52:40', '2022-11-30 19:52:40'),
(114, '10', 'Tawau', '2022-11-30 19:52:49', '2022-11-30 19:52:49'),
(115, '10', 'Lahad Datu', '2022-11-30 19:52:56', '2022-11-30 19:52:56'),
(116, '10', 'Keningau', '2022-11-30 19:53:04', '2022-11-30 19:53:04'),
(117, '10', 'Putatan', '2022-11-30 19:53:11', '2022-11-30 19:53:11'),
(118, '10', 'Donggongon', '2022-11-30 19:53:19', '2022-11-30 19:53:19'),
(119, '10', 'Semporna', '2022-11-30 19:53:25', '2022-11-30 19:53:25'),
(120, '10', 'Kudat', '2022-11-30 19:53:33', '2022-11-30 19:53:33'),
(121, '10', 'Kunak', '2022-11-30 19:53:40', '2022-11-30 19:53:40'),
(122, '10', 'Papar', '2022-11-30 19:53:46', '2022-11-30 19:53:46'),
(123, '10', 'Ranau', '2022-11-30 19:53:57', '2022-11-30 19:53:57'),
(124, '10', 'Beaufort', '2022-11-30 19:54:04', '2022-11-30 19:54:04'),
(125, '10', 'Kinarut', '2022-11-30 19:54:10', '2022-11-30 19:54:10'),
(126, '10', 'Kota Belud', '2022-11-30 19:54:17', '2022-11-30 19:54:17'),
(127, '11', 'Kuching', '2022-11-30 19:54:37', '2022-11-30 19:54:37'),
(128, '11', 'Miri', '2022-11-30 19:54:46', '2022-11-30 19:54:46'),
(129, '11', 'Sibu', '2022-11-30 19:54:53', '2022-11-30 19:54:53'),
(130, '11', 'Bintulu', '2022-11-30 19:55:23', '2022-11-30 19:55:23'),
(131, '11', 'Limbang', '2022-11-30 19:55:30', '2022-11-30 19:55:30'),
(132, '11', 'Sarikei', '2022-11-30 19:55:37', '2022-11-30 19:55:37'),
(133, '11', 'Sri Aman', '2022-11-30 19:55:44', '2022-11-30 19:55:44'),
(134, '11', 'Kapit', '2022-11-30 19:55:50', '2022-11-30 19:55:50'),
(135, '11', 'Batu Delapan Bazaar', '2022-11-30 19:55:58', '2022-11-30 19:55:58'),
(136, '11', 'Kota Samarahan', '2022-11-30 19:56:05', '2022-11-30 19:56:05'),
(137, '12', 'Subang Jaya', '2022-11-30 19:56:22', '2022-11-30 19:56:22'),
(138, '12', 'Klang', '2022-11-30 19:56:29', '2022-11-30 19:56:29'),
(139, '12', 'Ampang Jaya', '2022-11-30 19:56:37', '2022-11-30 19:56:37'),
(140, '12', 'Shah Alam', '2022-11-30 19:56:44', '2022-11-30 19:56:44'),
(141, '12', 'Petaling Jaya', '2022-11-30 19:56:52', '2022-11-30 19:56:52'),
(142, '12', 'Cheras', '2022-11-30 19:57:00', '2022-11-30 19:57:00'),
(143, '12', 'Kajang', '2022-11-30 19:57:06', '2022-11-30 19:57:06'),
(144, '12', 'Selayang Baru', '2022-11-30 19:57:14', '2022-11-30 19:57:14'),
(145, '12', 'Rawang', '2022-11-30 19:57:20', '2022-11-30 19:57:20'),
(146, '12', 'Taman Greenwood', '2022-11-30 19:57:29', '2022-11-30 19:57:29'),
(147, '12', 'Semenyih', '2022-11-30 19:57:35', '2022-11-30 19:57:35'),
(148, '12', 'Banting', '2022-11-30 19:57:42', '2022-11-30 19:57:42'),
(149, '12', 'Balakong', '2022-11-30 19:57:49', '2022-11-30 19:57:49'),
(150, '12', 'Gombak Setia', '2022-11-30 19:57:57', '2022-11-30 19:57:57'),
(151, '12', 'Kuala Selangor', '2022-11-30 19:58:04', '2022-11-30 19:58:04'),
(152, '12', 'Serendah', '2022-11-30 19:58:10', '2022-11-30 19:58:10'),
(153, '12', 'Bukit Beruntung', '2022-11-30 19:58:18', '2022-11-30 19:58:18'),
(154, '12', 'Pengkalan Kundang', '2022-11-30 19:58:26', '2022-11-30 19:58:26'),
(155, '12', 'Jenjarom', '2022-11-30 19:58:33', '2022-11-30 19:58:33'),
(156, '12', 'Sungai Besar', '2022-11-30 19:58:39', '2022-11-30 19:58:39'),
(157, '12', 'Batu Arang', '2022-11-30 19:58:47', '2022-11-30 19:58:47'),
(158, '12', 'Tanjung Sepat', '2022-11-30 19:58:54', '2022-11-30 19:58:54'),
(159, '12', 'Kuang', '2022-11-30 19:59:01', '2022-11-30 19:59:01'),
(160, '12', 'Kuala Kubu Baharu', '2022-11-30 19:59:08', '2022-11-30 19:59:08'),
(161, '12', 'Batang Berjuntai', '2022-11-30 19:59:15', '2022-11-30 19:59:15'),
(162, '12', 'Bandar Baru Salak Tinggi', '2022-11-30 19:59:24', '2022-11-30 19:59:24'),
(163, '12', 'Sekinchan', '2022-11-30 19:59:38', '2022-11-30 19:59:38'),
(164, '12', 'Sabak', '2022-11-30 19:59:44', '2022-11-30 19:59:44'),
(165, '12', 'Tanjung Karang', '2022-11-30 19:59:51', '2022-11-30 19:59:51'),
(166, '12', 'Beranang', '2022-11-30 19:59:59', '2022-11-30 19:59:59'),
(167, '12', 'Sungai Pelek', '2022-11-30 20:00:06', '2022-11-30 20:00:06'),
(168, '12', 'Sepang', '2022-11-30 20:00:13', '2022-11-30 20:00:13'),
(169, '13', 'Kuala Terengganu', '2022-11-30 20:00:34', '2022-11-30 20:00:34'),
(170, '13', 'Chukai', '2022-11-30 20:00:44', '2022-11-30 20:00:44'),
(171, '13', 'Dungun', '2022-11-30 20:00:51', '2022-11-30 20:00:51'),
(172, '13', 'Kerteh', '2022-11-30 20:00:59', '2022-11-30 20:00:59'),
(173, '13', 'Kuala Berang', '2022-11-30 20:01:07', '2022-11-30 20:01:07'),
(174, '13', 'Marang', '2022-11-30 20:01:15', '2022-11-30 20:01:15'),
(175, '13', 'Paka', '2022-11-30 20:01:22', '2022-11-30 20:01:22'),
(176, '13', 'Jerteh', '2022-11-30 20:01:29', '2022-11-30 20:01:29'),
(177, '14', 'Kuala Lumpur', '2022-11-30 20:01:50', '2022-11-30 20:01:50'),
(178, '14', 'Labuan', '2022-11-30 20:01:57', '2022-11-30 20:01:57'),
(179, '14', 'Putrajaya', '2022-11-30 20:02:06', '2022-11-30 20:02:06');

-- --------------------------------------------------------

--
-- Table structure for table `configurations`
--

CREATE TABLE `configurations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `copy_right` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `map_link` varchar(255) DEFAULT NULL,
  `short_description` varchar(200) DEFAULT NULL,
  `shipping_fee` varchar(200) DEFAULT NULL,
  `coupon_code` varchar(250) DEFAULT NULL,
  `coupon_discount` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `configurations`
--

INSERT INTO `configurations` (`id`, `copy_right`, `contact`, `email`, `address`, `map_link`, `short_description`, `shipping_fee`, `coupon_code`, `coupon_discount`, `status`, `created_at`, `updated_at`) VALUES
(1, 'COPYRIGHTS ALL RIGHTS RESERVED 2022 BY LOTTI', '123456789', 'abc@gmail.com', 'Test Address', 'https://goo.gl/maps/k6131cCb6qKph3LGA', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh.</p>', '15', 'lotti-sxfewe', 10, 1, '2022-11-30 22:18:49', '2022-12-02 01:25:32');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(255) DEFAULT NULL,
  `product_variation_id` varchar(250) DEFAULT NULL,
  `sub_category_id` varchar(255) NOT NULL DEFAULT '0',
  `coupon_code` varchar(255) DEFAULT NULL,
  `discount_type` varchar(255) DEFAULT NULL,
  `coupon_amount` varchar(255) DEFAULT NULL,
  `percentage` varchar(199) DEFAULT '0',
  `expiry_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `free_shipping` varchar(255) DEFAULT NULL,
  `minimum_spend` varchar(255) DEFAULT NULL,
  `maximum_spend` varchar(255) DEFAULT NULL,
  `sale_items` varchar(255) DEFAULT NULL,
  `allowed_emails` varchar(255) DEFAULT NULL,
  `usage_limit_per_coupon` varchar(255) DEFAULT NULL,
  `usage_limit_per_user` varchar(255) DEFAULT NULL,
  `usage_limit_items` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `product_id`, `product_variation_id`, `sub_category_id`, `coupon_code`, `discount_type`, `coupon_amount`, `percentage`, `expiry_date`, `free_shipping`, `minimum_spend`, `maximum_spend`, `sale_items`, `allowed_emails`, `usage_limit_per_coupon`, `usage_limit_per_user`, `usage_limit_items`, `description`, `status`, `created_at`, `updated_at`) VALUES
(2, NULL, NULL, '2', 'freecode-20', '1', NULL, '5', '2023-01-31 02:00:00', NULL, '1000', '10000', NULL, 'null', '1', '1', NULL, '<p>enjoy promo code&nbsp;</p>', 1, '2023-01-20 20:58:39', '2023-01-20 20:58:39');

-- --------------------------------------------------------

--
-- Table structure for table `define_product_variants`
--

CREATE TABLE `define_product_variants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `variant_id` varchar(255) NOT NULL,
  `variant` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `questions` longtext NOT NULL,
  `answer` longtext NOT NULL,
  `status` varchar(119) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `questions`, `answer`, `status`, `created_at`, `updated_at`) VALUES
(6, 'Question 1', '<p>Answer 1</p>', '0', '2022-11-01 02:06:07', '2022-11-02 01:37:11'),
(7, 'Question 2', '<p>Answer 2</p>', '1', '2022-11-01 02:06:20', '2022-11-01 02:06:20'),
(9, 'Question 3', '<p>Answer3</p>', '1', '2022-11-02 01:38:52', '2022-11-04 08:34:11');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_title` varchar(255) NOT NULL,
  `image_slug` varchar(255) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `image_title`, `image_slug`, `image_name`, `image_path`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Home', 'Home', '1667577984.jpg', NULL, 1, NULL, '2022-11-05 01:06:24', '2022-11-05 01:10:42');

-- --------------------------------------------------------

--
-- Table structure for table `homes`
--

CREATE TABLE `homes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_title` varchar(119) DEFAULT NULL,
  `home_content` longtext DEFAULT NULL,
  `home_banner` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `location_name` varchar(255) NOT NULL,
  `map_link` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `location_name`, `map_link`, `slug`, `image`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Houston', 'https://goo.gl/maps/xCPfwnLAtu7Hr5ZR7', 'houston', '1667503661.png', 1, '2022-11-04 04:27:41', '2022-11-08 06:50:17'),
(3, 'test', 'Ducimus nisi culpa', 'test', '1667926252.jpg', 1, '2022-11-09 01:50:52', '2022-11-09 01:50:52');

-- --------------------------------------------------------

--
-- Table structure for table `logos`
--

CREATE TABLE `logos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logos`
--

INSERT INTO `logos` (`id`, `type`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Favicon', '1668093193.webp', '2022-11-05 09:16:45', '2022-11-11 00:13:13'),
(2, 'Logo', '1668092422.webp', '2022-11-05 04:17:29', '2022-11-11 00:00:22');

-- --------------------------------------------------------

--
-- Table structure for table `main_categories`
--

CREATE TABLE `main_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_category_id` varchar(255) NOT NULL,
  `main_category_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `main_categories`
--

INSERT INTO `main_categories` (`id`, `parent_category_id`, `main_category_name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', 'Mobile Accessories', 'mobile-accessories', 1, '2022-12-28 03:51:08', '2022-12-28 03:51:08'),
(2, '2', 'Apple', 'apple', 1, '2023-01-18 10:06:49', '2023-01-18 10:06:49'),
(3, '2', 'Samsung', 'samsung', 1, '2023-01-18 10:07:04', '2023-01-18 10:07:04');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2022_03_03_210155_create_logos_table', 2),
(5, '2022_03_04_205232_create_homes_table', 3),
(8, '2022_10_13_190725_create_testimonials_table', 6),
(9, '2022_10_18_184937_testimonial', 7),
(10, '2022_10_18_190709_create__testimonial_table', 8),
(11, '2022_10_27_173542_create_faqs_table', 9),
(12, '2022_10_28_215824_create_portfolio', 10),
(13, '2022_10_31_164116_create_inquiries_table', 11),
(14, '2022_10_31_173933_create_packages_table', 12),
(16, '2022_10_31_214150_create_socials_table', 14),
(17, '2022_10_31_223033_create_services_table', 15),
(18, '2022_10_31_230211_create_portfolios_table', 16),
(19, '2014_10_12_000000_create_users_table', 17),
(21, '2022_11_01_170350_create_pages_table', 18),
(22, '2022_11_01_180422_create_banners_table', 19),
(24, '2022_11_01_195440_create_privacy_policies_table', 20),
(25, '2022_11_01_201457_create_terms_conditions_table', 21),
(26, '2022_11_01_203428_create_page_contents_table', 22),
(28, '2022_11_01_212644_create_blogs_table', 23),
(30, '2022_11_02_151719_create_parent_categories_table', 24),
(31, '2022_11_02_161824_create_main_categories_table', 25),
(32, '2022_11_02_170134_create_sub_categories_table', 26),
(33, '2022_11_03_181130_create_locations_table', 27),
(34, '2022_11_04_155504_create_galleries_table', 28),
(36, '2022_11_07_212636_create_configurations_table', 29),
(39, '2022_11_08_215416_create_attributes_table', 30),
(42, '2022_11_08_214745_create_products_table', 31),
(45, '2022_11_09_174828_create_brands_table', 32),
(46, '2022_11_11_151231_create_otp_verifications_table', 33),
(47, '2022_11_11_190922_create_subscriptions_table', 34),
(48, '2022_11_14_222008_create_user_addresses_table', 35),
(49, '2022_11_14_224938_create_wishlists_table', 36),
(50, '2022_11_15_195941_create_orders_table', 37),
(51, '2022_11_16_182850_create_offers_table', 38),
(52, '2022_11_24_204011_create_carts_table', 39),
(53, '2022_11_29_200021_create_billing_infos_table', 40),
(54, '2022_12_09_230607_create_variants_table', 41),
(55, '2022_12_14_164113_create_order_notifications_table', 42),
(56, '2022_12_16_192955_create_product_additional_attributes_table', 43),
(57, '2022_12_16_191951_create_product_attributes_table', 44),
(58, '2022_12_16_195520_create_define_product_variants_table', 45),
(59, '2022_12_20_163757_create_product_variantions_table', 46);

-- --------------------------------------------------------

--
-- Table structure for table `multiple_cities`
--

CREATE TABLE `multiple_cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shipping_id` varchar(255) NOT NULL,
  `city_id` varchar(250) DEFAULT NULL,
  `city_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `multiple_cities`
--

INSERT INTO `multiple_cities` (`id`, `shipping_id`, `city_id`, `city_name`, `created_at`, `updated_at`) VALUES
(1, '6', '1', 'Johor Bahru', '2023-01-18 22:34:59', '2023-01-18 22:34:59'),
(2, '6', '2', 'Tebrau', '2023-01-18 22:34:59', '2023-01-18 22:34:59'),
(3, '6', '3', 'Pasir Gudang', '2023-01-18 22:34:59', '2023-01-18 22:34:59');

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_id` varchar(200) NOT NULL,
  `section_name` varchar(200) DEFAULT NULL,
  `title1` varchar(255) NOT NULL,
  `title2` varchar(255) NOT NULL,
  `title3` varchar(255) NOT NULL,
  `title4` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `page_id`, `section_name`, `title1`, `title2`, `title3`, `title4`, `slug`, `image1`, `image2`, `created_at`, `updated_at`) VALUES
(1, '1', 'Biggest Sale', 'This weekend only', 'biggest', 'sale', 'up to 70% off', 'this-weekend-only', '1668703864.webp', '1668703811.webp', '2022-11-17 04:30:33', '2022-11-18 01:51:04'),
(2, '2', 'Buy One Get One Free', 'Buy One', 'Get One', 'Free', NULL, 'buy-one', '1668628909.webp', '1668704100.webp', '2022-11-17 04:57:38', '2022-11-18 01:55:00');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `product_id` varchar(255) DEFAULT NULL,
  `coupon_id` varchar(250) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `total_price` varchar(255) DEFAULT NULL,
  `delivery_fee` int(11) DEFAULT NULL,
  `coupon_status` tinyint(1) DEFAULT NULL COMMENT '(1) active, (2) null deactive',
  `product_count` int(50) DEFAULT 0,
  `order_status` tinyint(1) DEFAULT NULL COMMENT '(1) pending, (2) dispatch, (3) deliver, (4) cancelled, (5) hold ,(6) Approved Cancellation',
  `cancel_order_count` varchar(200) DEFAULT NULL,
  `billing_address` text DEFAULT NULL,
  `shipping_address` text DEFAULT NULL,
  `payment_method` double DEFAULT NULL COMMENT '(1) cash on delivery, (2) Paypal, (3) Stripe',
  `payment_response` text DEFAULT NULL,
  `order_cancellation_reason` text DEFAULT NULL,
  `order_verification` tinyint(1) DEFAULT NULL COMMENT '(1) verified',
  `processing_at` timestamp NULL DEFAULT NULL,
  `shipped_at` timestamp NULL DEFAULT NULL,
  `delivered_at` timestamp NULL DEFAULT NULL,
  `cancelled_at` timestamp NULL DEFAULT NULL,
  `verified_at` timestamp NULL DEFAULT NULL,
  `hold_at` timestamp NULL DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_notes`
--

CREATE TABLE `order_notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `order_comment` text DEFAULT NULL,
  `order_notes_status` int(11) NOT NULL,
  `status_changed_time` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_notifications`
--

CREATE TABLE `order_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `otp_verifications`
--

CREATE TABLE `otp_verifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `otp` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `otp_verifications`
--

INSERT INTO `otp_verifications` (`id`, `email`, `otp`, `created_at`, `updated_at`) VALUES
(1, 'djoy62471@gmail.com', '240447', '2023-01-21 01:28:35', '2023-01-21 01:28:35');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `title`, `price`, `description`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Basic', '500', '<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.</p>', 1, '2022-11-01 04:36:56', '2022-11-02 01:34:11'),
(4, 'Gold', '700', '<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.</p>', 0, '2022-11-01 04:37:12', '2022-11-05 00:32:04'),
(5, 'Premium', '1000', '<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.</p>', 0, '2022-11-01 04:37:23', '2022-11-05 04:26:05');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `page_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Home', 1, '2022-11-02 02:55:44', '2022-11-08 05:44:23'),
(2, 'About us', 1, '2022-11-02 02:55:52', '2022-11-02 02:55:52'),
(3, 'Contact Us', 1, '2022-11-02 02:56:04', '2022-11-02 02:56:04'),
(4, 'Gallery', 1, '2022-11-02 02:56:30', '2022-11-02 02:56:30'),
(5, 'Privacy Policy', 1, '2022-11-02 02:56:42', '2022-11-02 02:56:42'),
(6, 'Terms & Conditions', 1, '2022-11-02 02:57:19', '2022-11-02 02:57:19'),
(7, 'Sign up', 0, '2022-11-02 02:57:39', '2022-11-05 04:34:50'),
(8, 'Sign in', 1, '2022-11-02 02:57:48', '2022-11-05 01:49:17'),
(9, 'Testimonials', 1, '2022-11-02 02:59:38', '2022-11-02 02:59:38'),
(10, 'Faq', 1, '2022-11-02 02:59:48', '2022-11-02 02:59:48'),
(11, 'Portfolio', 1, '2022-11-02 03:00:58', '2022-11-03 05:03:31'),
(12, 'Category', 1, '2022-11-11 01:39:53', '2022-11-11 01:39:53'),
(13, 'Shop', 1, '2022-11-11 01:40:29', '2022-11-11 01:40:29');

-- --------------------------------------------------------

--
-- Table structure for table `page_contents`
--

CREATE TABLE `page_contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_id` int(11) NOT NULL,
  `section_name` varchar(255) NOT NULL,
  `title1` varchar(255) DEFAULT NULL,
  `title2` varchar(200) DEFAULT NULL,
  `title3` varchar(200) DEFAULT NULL,
  `title4` varchar(200) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_contents`
--

INSERT INTO `page_contents` (`id`, `page_id`, `section_name`, `title1`, `title2`, `title3`, `title4`, `slug`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'Discount Section', 'Book Your', 'IPhone 14 Pro Max', '25', 'Sale', 'book-your', '<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.</p>', '1669849108.webp', '2022-12-01 02:23:16', '2022-12-02 01:13:41'),
(2, 1, 'Power Bank', 'Power Bank', '25', 'Sale', NULL, 'power-bank', '<p>Sale</p>', '1669847063.webp', '2022-12-01 02:24:23', '2022-12-01 02:56:45'),
(3, 1, 'Andriod', 'Andriod', '25', 'Sale', NULL, 'andriod', '<p>Sale</p>', '1669847108.webp', '2022-12-01 02:25:08', '2022-12-01 02:56:53'),
(4, 1, 'Digital Watch', 'Digital Watch', '25', 'Sale', NULL, 'digital-watch', '<p>Digital WatchDigital Watch</p>', '1669847157.webp', '2022-12-01 02:25:57', '2022-12-01 02:56:58'),
(5, 1, 'Gaming PC', 'Gaming PC', '25', 'Sale', NULL, 'gaming-pc', '<p>sale</p>', '1669847551.webp', '2022-12-01 02:32:31', '2022-12-01 02:57:11');

-- --------------------------------------------------------

--
-- Table structure for table `parent_categories`
--

CREATE TABLE `parent_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_category_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parent_categories`
--

INSERT INTO `parent_categories` (`id`, `parent_category_name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Electronic Accessories', 'electronic-accessories', 1, '2022-12-28 03:49:38', '2022-12-31 00:36:25'),
(2, 'Mobile Phone', 'mobile-phone', 1, '2023-01-18 10:06:24', '2023-01-18 10:06:24');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

CREATE TABLE `portfolios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `image_thumbnail` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portfolios`
--

INSERT INTO `portfolios` (`id`, `type`, `image`, `image_thumbnail`, `video`, `status`, `created_at`, `updated_at`) VALUES
(5, 1, '1667319869.png', '1667318978.jpg', '1667319546.jpg', 1, '2022-11-02 01:09:38', '2022-11-04 05:50:20'),
(6, 1, '1667576142.jpg', '1667582735.jpg', '1667502769.mp4', 1, '2022-11-04 04:12:49', '2022-11-05 02:25:35');

-- --------------------------------------------------------

--
-- Table structure for table `privacy_policies`
--

CREATE TABLE `privacy_policies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `privacy_policies`
--

INSERT INTO `privacy_policies` (`id`, `title`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Privacy and Policy', NULL, '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolor</p>', '2022-11-02 05:28:44', '2022-11-11 04:13:20');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_type` varchar(50) NOT NULL COMMENT '(1) simpele, (2) variable product',
  `parent_category_id` varchar(255) NOT NULL,
  `main_category_id` varchar(255) NOT NULL,
  `sub_category_id` varchar(255) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `sale_price` double DEFAULT NULL,
  `discounted_price` double DEFAULT NULL,
  `discount` varchar(255) DEFAULT NULL COMMENT 'customer save money',
  `discount_percent` varchar(250) DEFAULT NULL COMMENT 'Save amount in percentage (%)',
  `sale_start` timestamp NULL DEFAULT NULL,
  `sale_end` timestamp NULL DEFAULT NULL,
  `discount_status` tinyint(1) DEFAULT NULL COMMENT '(1) for discount active',
  `total_price` varchar(255) DEFAULT NULL,
  `brand_id` varchar(200) DEFAULT NULL,
  `sku` varchar(200) DEFAULT NULL,
  `tags` varchar(200) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `multiple_image` varchar(200) DEFAULT NULL,
  `quantity` varchar(250) DEFAULT NULL,
  `stock` varchar(250) DEFAULT NULL COMMENT '(1) stock (2) Out of stock',
  `shipping` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_additional_attributes`
--

CREATE TABLE `product_additional_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_attribute_id` varchar(255) NOT NULL,
  `attribute_id` varchar(250) DEFAULT NULL,
  `attribute` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_attributes`
--

CREATE TABLE `product_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `variant_id` varchar(50) NOT NULL,
  `variant` varchar(255) DEFAULT NULL,
  `visible_product` varchar(255) DEFAULT NULL,
  `used_for_variation` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_variantions`
--

CREATE TABLE `product_variantions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_category_id` varchar(250) DEFAULT NULL,
  `main_category_id` varchar(250) DEFAULT NULL,
  `sub_category_id` varchar(250) DEFAULT NULL,
  `product_id` varchar(255) DEFAULT NULL,
  `define_product_variant_id` varchar(255) DEFAULT NULL,
  `product_attribute_id` varchar(255) DEFAULT NULL,
  `product_additional_attribute_id` varchar(255) DEFAULT NULL,
  `variant_id` varchar(250) DEFAULT NULL,
  `variant` varchar(255) DEFAULT NULL,
  `attribute_id` varchar(250) DEFAULT NULL,
  `attribute` varchar(255) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `regular_price` varchar(250) DEFAULT NULL,
  `sale_price` varchar(250) DEFAULT NULL,
  `discount` varchar(250) DEFAULT NULL COMMENT 'customer save money',
  `discount_percent` varchar(250) DEFAULT NULL COMMENT 'Save amount in percentage (%)	',
  `start_date` timestamp NULL DEFAULT NULL,
  `end_date` timestamp NULL DEFAULT NULL,
  `discount_status` tinyint(1) DEFAULT NULL,
  `quantity` varchar(250) DEFAULT NULL,
  `sku` varchar(250) DEFAULT NULL,
  `weight` varchar(250) DEFAULT NULL,
  `length` varchar(250) DEFAULT NULL,
  `width` varchar(250) DEFAULT NULL,
  `height` varchar(250) DEFAULT NULL,
  `stock` varchar(250) DEFAULT NULL COMMENT '(1) stock (2) Out of stock',
  `shipping` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `order_id` varchar(250) DEFAULT NULL,
  `product_id` varchar(255) NOT NULL,
  `product_variation_id` varchar(250) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `reviews` varchar(255) NOT NULL,
  `comments` text NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_name`, `created_at`, `updated_at`) VALUES
(1, 'Logo Design', '2022-11-01 07:36:04', '2022-11-01 07:36:04'),
(2, 'Animation', '2022-11-01 07:36:25', '2022-11-01 07:36:25'),
(3, 'Website Design and Development', '2022-11-01 07:36:37', '2022-11-01 07:36:37');

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city_id` varchar(255) DEFAULT NULL,
  `shipping_method_id` bigint(20) NOT NULL COMMENT '(1) Flat Rate(2) Free Shipping',
  `zone_name` varchar(200) DEFAULT NULL,
  `shipping_title` varchar(200) NOT NULL,
  `shipping_price` varchar(200) DEFAULT NULL,
  `shipping_fee` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `city_id`, `shipping_method_id`, `zone_name`, `shipping_title`, `shipping_price`, `shipping_fee`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 'Flate Rate', 'Flat rate', NULL, '150', 1, '2023-01-03 22:17:42', '2023-01-09 19:58:15'),
(2, NULL, 2, 'Free Shipping', 'Free shipping', NULL, NULL, 1, '2023-01-03 22:19:14', '2023-01-03 22:19:14'),
(5, NULL, 2, 'Amelia Byrd', 'Free shipping', NULL, NULL, 1, '2023-01-06 14:49:22', '2023-01-06 14:49:48'),
(6, NULL, 1, 'Talon Beasley', 'Flat rate', NULL, '32', 1, '2023-01-09 17:40:57', '2023-01-09 17:40:57'),
(7, NULL, 1, 'Dillon Mcgowan', 'Flat rate', NULL, '90', 1, '2023-01-09 19:54:32', '2023-01-09 20:22:21'),
(8, NULL, 1, 'Dillon Mcgowan Jordior', 'Flat rate', NULL, '85', 1, '2023-01-09 19:56:08', '2023-01-09 19:56:08'),
(9, NULL, 2, 'Uzair', 'Free shipping', NULL, NULL, 1, '2023-01-09 20:26:23', '2023-01-09 20:26:23');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_methods`
--

CREATE TABLE `shipping_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shipping_title` varchar(255) NOT NULL,
  `shipping_price` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_methods`
--

INSERT INTO `shipping_methods` (`id`, `shipping_title`, `shipping_price`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Flat rate', '200', 'flat-rate', 1, '2022-12-14 13:14:23', '2022-12-14 13:14:23'),
(2, 'Free shipping', NULL, 'free-shipping', 1, '2022-12-14 13:14:48', '2022-12-14 22:06:52');

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) NOT NULL,
  `slug` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `facebook`, `twitter`, `instagram`, `youtube`, `linkedin`, `slug`, `created_at`, `updated_at`) VALUES
(5, 'http://facebook.com', 'http://twitter.com', 'http://instagram.com', NULL, 'http://linkedin.com', NULL, '2022-11-03 07:17:58', '2022-11-03 07:17:58');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `state` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `state`, `created_at`, `updated_at`) VALUES
(1, 'Johor', '2022-11-30 18:48:50', '2022-11-30 18:48:50'),
(2, 'Kedah', '2022-11-30 18:50:58', '2022-11-30 18:50:58'),
(3, 'Kelantan', '2022-11-30 18:51:51', '2022-11-30 18:51:51'),
(4, 'Melaka', '2022-11-30 18:52:23', '2022-11-30 18:52:23'),
(5, 'Negeri Sembilan', '2022-11-30 18:53:08', '2022-11-30 18:53:08'),
(6, 'Pahang', '2022-11-30 18:53:25', '2022-11-30 18:53:25'),
(7, 'Perak', '2022-11-30 18:53:45', '2022-11-30 18:53:45'),
(8, 'Perlis', '2022-11-30 18:54:10', '2022-11-30 18:54:10'),
(9, 'Pulau Pinang', '2022-11-30 18:54:29', '2022-11-30 18:54:29'),
(10, 'Sabah', '2022-11-30 18:54:49', '2022-11-30 18:54:49'),
(11, 'Sarawak', '2022-11-30 18:55:08', '2022-11-30 18:55:08'),
(12, 'Selangor', '2022-11-30 18:55:30', '2022-11-30 18:55:30'),
(13, 'Terengganu', '2022-11-30 18:55:55', '2022-11-30 18:55:55'),
(14, 'Wilayah Persekutuan', '2022-11-30 18:56:20', '2022-11-30 18:56:20');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `color_id` varchar(255) NOT NULL,
  `size_id` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `email`, `status`, `created_at`, `updated_at`) VALUES
(33, 'djoy62471@gmail.com', 1, '2023-01-21 00:29:31', '2023-01-21 00:29:31');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_category_id` varchar(255) NOT NULL,
  `main_category_id` varchar(255) NOT NULL,
  `sub_category_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(200) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `show_home` int(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `parent_category_id`, `main_category_id`, `sub_category_name`, `slug`, `image`, `status`, `show_home`, `created_at`, `updated_at`) VALUES
(1, '1', '1', 'Powerbank & Speaker', 'powerbank-speaker', NULL, 1, NULL, '2022-12-28 03:52:07', '2022-12-28 03:52:07'),
(2, '1', '1', 'Home Charger', 'home-charger', NULL, 1, NULL, '2022-12-28 03:52:33', '2022-12-28 03:52:33'),
(3, '1', '1', 'Usb Cable', 'usb-cable', NULL, 1, NULL, '2022-12-28 03:53:09', '2022-12-28 03:53:09'),
(4, '1', '1', 'Audio Cable', 'audio-cable', NULL, 1, NULL, '2022-12-28 03:54:00', '2022-12-28 03:54:00'),
(5, '1', '1', 'Hub', 'hub', NULL, 1, NULL, '2022-12-28 03:54:19', '2022-12-28 03:54:19'),
(6, '1', '1', 'Bluetooth Earphone', 'bluetooth-earphone', NULL, 1, NULL, '2022-12-28 03:54:47', '2022-12-28 03:54:47'),
(7, '2', '2', 'Iphone 14 Pro Max', 'iphone-14-pro-max', NULL, 1, NULL, '2023-01-18 10:07:42', '2023-01-18 10:07:42'),
(8, '2', '2', 'Iphone 13 Pro Max', 'iphone-13-pro-max', NULL, 1, NULL, '2023-01-18 10:08:03', '2023-01-18 10:08:03');

-- --------------------------------------------------------

--
-- Table structure for table `terms_conditions`
--

CREATE TABLE `terms_conditions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `terms_conditions`
--

INSERT INTO `terms_conditions` (`id`, `title`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Terms and Conditions', NULL, '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat</p><h3>1. Introduction</h3><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit&nbsp;</p>', '2022-11-02 05:27:49', '2022-11-17 06:29:34');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `short_description` varchar(255) NOT NULL,
  `long_description` varchar(255) NOT NULL,
  `status` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `image`, `short_description`, `long_description`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Freya Steele', '1666729111.jpg', 'Sapiente dicta sed q', '<p>wdqwerkebfkbfkbhg</p>', 0, '2022-10-26 05:18:31', '2022-11-05 01:47:55'),
(3, 'Boris Barry', '1666814435.jpg', 'testing testing', '<p>aefwerfwerfwsedqa</p>', 1, '2022-10-26 05:20:27', '2022-11-09 01:56:25'),
(4, 'Boris Barry', '1667423137.jpg', 'Officiis debitis eiu', '<p>aefwerfwerfwsedqa</p>', 0, '2022-10-26 05:20:34', '2022-11-05 01:47:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `social_login` varchar(200) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `month` varchar(200) DEFAULT NULL,
  `day` varchar(200) DEFAULT NULL,
  `year` varchar(200) DEFAULT NULL,
  `gender` varchar(200) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `province` varchar(200) DEFAULT NULL,
  `delivery_label` varchar(200) DEFAULT NULL,
  `city` varchar(200) DEFAULT NULL,
  `village` varchar(200) DEFAULT NULL,
  `offers` varchar(200) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `profile` varchar(255) DEFAULT NULL,
  `default_shipping` varchar(200) DEFAULT NULL,
  `default_billing` varchar(200) DEFAULT NULL,
  `billing` varchar(200) DEFAULT NULL,
  `landmark` varchar(200) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `first_name`, `last_name`, `user_name`, `role`, `slug`, `social_login`, `contact`, `month`, `day`, `year`, `gender`, `address`, `province`, `delivery_label`, `city`, `village`, `offers`, `status`, `profile`, `default_shipping`, `default_billing`, `billing`, `landmark`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@lotti.com', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$31W7x2S/s1I3iA.H.O2M0OEnRuDVjn3z1.HcbXWD5/KLB4itpwmSq', NULL, '2022-11-02 05:18:37', '2022-11-02 05:18:37'),
(2, 'Dominic Xavier', 'dominicxavier143@gmail.com', 'Dominic', 'Xavier', NULL, '2', '', NULL, NULL, '02', '01', '1994', 'male', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$/AE2N1DtItYxGAERhnJL2OWdoAcy6N967P9tE6eLld7xrem3rRG3C', NULL, '2022-12-28 14:11:48', '2022-12-28 14:11:48'),
(3, 'David Joy', 'djoy62471@gmail.com', 'David', 'Joy', NULL, '2', '', NULL, NULL, '07', '09', '1998', 'male', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$Tw14rX7DdBVpsx8iU35rE.DUYJ9pAAMQMa7ce2.GEsYk1O6uuFTEi', NULL, '2022-12-28 18:30:52', '2023-01-21 00:58:40'),
(6, 'Tofique Ahmed', 'testingsoftware359@gmail.com', 'Tofique', 'Ahmed', NULL, '2', '', NULL, NULL, '02', '01', '1999', 'male', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$jIIWP41d37apO6O7qhLQKejvxeh2bpuvIWySAvE7Cu/LOtIp3vMfm', NULL, '2022-12-30 22:54:46', '2022-12-30 22:54:46'),
(7, 'James Doe', 'iamjamesalbertt@gmail.com', 'James', 'Doe', NULL, '2', '', NULL, NULL, '11', '01', '1997', 'male', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$QkWVYbbEgCg59B0KCalt9.1rJ6.w3sP0O485nmCBAWAsFIhI1t8Du', NULL, '2023-01-03 18:35:08', '2023-01-03 18:35:08');

-- --------------------------------------------------------

--
-- Table structure for table `user_addresses`
--

CREATE TABLE `user_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `landmark` varchar(255) DEFAULT NULL,
  `delivery_label` varchar(255) DEFAULT NULL COMMENT '(1) Home (2) Office',
  `province` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `village` varchar(255) DEFAULT NULL,
  `default_shipping` varchar(255) DEFAULT NULL COMMENT 'for manage account shipping address',
  `default_billing` varchar(255) DEFAULT NULL COMMENT 'for manage account billing address',
  `shipping_active_address` varchar(50) DEFAULT NULL COMMENT 'for label default shipping on cards',
  `billing_active_address` varchar(50) DEFAULT NULL COMMENT 'for label default billing on cards',
  `address_identifire` tinyint(1) DEFAULT NULL COMMENT '(1) active shipping address (2) active billing address (3) both',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `variants`
--

CREATE TABLE `variants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `variant` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `variants`
--

INSERT INTO `variants` (`id`, `variant`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Custom product attribute', 'custom-product-attribute', '1', '2022-12-27 22:32:06', '2022-12-27 22:32:06'),
(2, 'Color', 'color', '1', '2022-12-28 11:25:28', '2022-12-28 11:25:28'),
(3, 'Size', 'size', '1', '2022-12-28 11:25:37', '2022-12-28 11:25:37'),
(4, 'Processor', 'processor', '1', '2023-01-19 01:09:41', '2023-01-19 01:09:41');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `product_variation_id` varchar(250) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attribute_values`
--
ALTER TABLE `attribute_values`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billing_infos`
--
ALTER TABLE `billing_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cancellations`
--
ALTER TABLE `cancellations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configurations`
--
ALTER TABLE `configurations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `define_product_variants`
--
ALTER TABLE `define_product_variants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homes`
--
ALTER TABLE `homes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logos`
--
ALTER TABLE `logos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_categories`
--
ALTER TABLE `main_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `multiple_cities`
--
ALTER TABLE `multiple_cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_notes`
--
ALTER TABLE `order_notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_notifications`
--
ALTER TABLE `order_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otp_verifications`
--
ALTER TABLE `otp_verifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_contents`
--
ALTER TABLE `page_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parent_categories`
--
ALTER TABLE `parent_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `privacy_policies`
--
ALTER TABLE `privacy_policies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_additional_attributes`
--
ALTER TABLE `product_additional_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_variantions`
--
ALTER TABLE `product_variantions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_methods`
--
ALTER TABLE `shipping_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms_conditions`
--
ALTER TABLE `terms_conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_addresses`
--
ALTER TABLE `user_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `variants`
--
ALTER TABLE `variants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attribute_values`
--
ALTER TABLE `attribute_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `billing_infos`
--
ALTER TABLE `billing_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cancellations`
--
ALTER TABLE `cancellations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT for table `configurations`
--
ALTER TABLE `configurations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `define_product_variants`
--
ALTER TABLE `define_product_variants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `homes`
--
ALTER TABLE `homes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `logos`
--
ALTER TABLE `logos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `main_categories`
--
ALTER TABLE `main_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `multiple_cities`
--
ALTER TABLE `multiple_cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_notes`
--
ALTER TABLE `order_notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_notifications`
--
ALTER TABLE `order_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `otp_verifications`
--
ALTER TABLE `otp_verifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `page_contents`
--
ALTER TABLE `page_contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `parent_categories`
--
ALTER TABLE `parent_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `privacy_policies`
--
ALTER TABLE `privacy_policies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_additional_attributes`
--
ALTER TABLE `product_additional_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_attributes`
--
ALTER TABLE `product_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_variantions`
--
ALTER TABLE `product_variantions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `shipping_methods`
--
ALTER TABLE `shipping_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `terms_conditions`
--
ALTER TABLE `terms_conditions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_addresses`
--
ALTER TABLE `user_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `variants`
--
ALTER TABLE `variants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
