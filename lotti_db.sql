/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 10.4.24-MariaDB : Database - lotti_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`lotti_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `lotti_db`;

/*Table structure for table `attribute_values` */

DROP TABLE IF EXISTS `attribute_values`;

CREATE TABLE `attribute_values` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `variant_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attribute_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `attribute_values` */

insert  into `attribute_values`(`id`,`variant_id`,`attribute_value`,`slug`,`status`,`created_at`,`updated_at`) values 
(1,'2','Red','red','1','2023-01-19 00:02:37','2023-01-19 00:02:37'),
(2,'2','Blue','blue','1','2023-01-19 00:02:41','2023-01-19 00:02:41'),
(3,'2','Gold','gold','1','2023-01-19 00:02:46','2023-01-19 00:02:46'),
(4,'3','Small','small','1','2023-01-19 00:02:59','2023-01-19 00:02:59'),
(5,'3','Medium','medium','1','2023-01-19 00:03:04','2023-01-19 00:03:04'),
(6,'3','Large','large','1','2023-01-19 00:03:08','2023-01-19 00:03:08'),
(7,'4','Dell','dell','1','2023-01-19 00:03:19','2023-01-19 00:03:19'),
(8,'4','Intel','intel','1','2023-01-19 00:03:24','2023-01-19 00:03:24'),
(9,'4','Lenovo','lenovo','1','2023-01-19 00:03:35','2023-01-19 00:03:35');

/*Table structure for table `attributes` */

DROP TABLE IF EXISTS `attributes`;

CREATE TABLE `attributes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `variant` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `variant_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attribute` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attribute_value` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visible_product` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `used_for_variation` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `attributes` */

/*Table structure for table `banners` */

DROP TABLE IF EXISTS `banners`;

CREATE TABLE `banners` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `page_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section_name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title1` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title2` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title3` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `banners` */

insert  into `banners`(`id`,`page_id`,`section_name`,`title1`,`title2`,`title3`,`banner_image`,`created_at`,`updated_at`) values 
(1,'1','home-slider','A Store For','Electronic','Products','[\"166870430348.webp\",\"166870430381.webp\",\"166870430322.webp\",\"16687043037.webp\"]','2022-11-11 01:01:03','2022-11-17 23:58:23'),
(3,'3','contact',NULL,NULL,NULL,'1668104917.webp','2022-11-11 01:08:45','2022-11-11 01:28:37'),
(4,'12','category',NULL,NULL,NULL,'1668103738.webp','2022-11-11 01:08:58','2022-11-11 01:08:58'),
(5,'13','shop',NULL,NULL,NULL,'1668103755.webp','2022-11-11 01:09:15','2022-11-11 01:09:15');

/*Table structure for table `billing_infos` */

DROP TABLE IF EXISTS `billing_infos`;

CREATE TABLE `billing_infos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_status` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancellation_status` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancelled_at` timestamp NULL DEFAULT NULL,
  `cancellation_reason` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancellation_comments` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancellation_image` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_variantion_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attributes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attribute_values` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_fee` double DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double DEFAULT NULL,
  `discounted_price` double DEFAULT NULL,
  `discount` double DEFAULT NULL COMMENT 'How much customer save money',
  `total` double DEFAULT NULL,
  `shipping_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `billing_infos` */

insert  into `billing_infos`(`id`,`order_id`,`product_id`,`order_status`,`cancellation_status`,`cancelled_at`,`cancellation_reason`,`cancellation_comments`,`cancellation_image`,`product_variantion_id`,`attributes`,`attribute_values`,`delivery_fee`,`quantity`,`price`,`discounted_price`,`discount`,`total`,`shipping_address`,`billing_address`,`created_at`,`updated_at`) values 
(1,'1','1','2','1','2023-01-19 20:56:09','2','for test',NULL,'2','1,5','Red,Medium',0,'1',386,174,212,174,'{\"id\":1,\"user_id\":\"3\",\"name\":\"Lev\",\"address\":\"Brody\",\"contact\":\"133\",\"landmark\":\"Mannix\",\"delivery_label\":\"1\",\"province\":\"1\",\"city\":\"1\",\"village\":null,\"default_shipping\":\"1\",\"default_billing\":null,\"shipping_active_address\":\"1\",\"billing_active_address\":\"2\",\"address_identifire\":\"1\",\"created_at\":\"2023-01-13T20:47:42.000000Z\",\"updated_at\":\"2023-01-18T19:01:45.000000Z\"}','{\"id\":1,\"user_id\":\"3\",\"name\":\"Lev\",\"address\":\"Brody\",\"contact\":\"133\",\"landmark\":\"Mannix\",\"delivery_label\":\"1\",\"province\":\"1\",\"city\":\"1\",\"village\":null,\"default_shipping\":\"1\",\"default_billing\":null,\"shipping_active_address\":\"1\",\"billing_active_address\":\"2\",\"address_identifire\":\"1\",\"created_at\":\"2023-01-13T20:47:42.000000Z\",\"updated_at\":\"2023-01-18T19:01:45.000000Z\"}','2023-01-19 07:26:18','2023-01-19 20:56:58'),
(2,'2','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,'1',500,NULL,NULL,500,'{\"id\":1,\"user_id\":\"3\",\"name\":\"Uma Wheeler\",\"address\":\"Repellendus Consequ\",\"contact\":\"+1 (494) 934-7647\",\"landmark\":\"Autem eveniet simil\",\"delivery_label\":\"1\",\"province\":\"2\",\"city\":\"34\",\"village\":null,\"default_shipping\":\"1\",\"default_billing\":\"2\",\"shipping_active_address\":\"1\",\"billing_active_address\":\"2\",\"address_identifire\":1,\"created_at\":\"2023-01-19T20:35:39.000000Z\",\"updated_at\":\"2023-01-19T20:35:39.000000Z\"}','{\"id\":1,\"user_id\":\"3\",\"name\":\"Uma Wheeler\",\"address\":\"Repellendus Consequ\",\"contact\":\"+1 (494) 934-7647\",\"landmark\":\"Autem eveniet simil\",\"delivery_label\":\"1\",\"province\":\"2\",\"city\":\"34\",\"village\":null,\"default_shipping\":\"1\",\"default_billing\":\"2\",\"shipping_active_address\":\"1\",\"billing_active_address\":\"2\",\"address_identifire\":1,\"created_at\":\"2023-01-19T20:35:39.000000Z\",\"updated_at\":\"2023-01-19T20:35:39.000000Z\"}','2023-01-19 20:51:50','2023-01-19 20:51:50');

/*Table structure for table `blogs` */

DROP TABLE IF EXISTS `blogs`;

CREATE TABLE `blogs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `blogs` */

insert  into `blogs`(`id`,`title`,`slug`,`image`,`date`,`description`,`status`,`created_at`,`updated_at`) values 
(1,'Lorem ipsum is placeholder text commonly used in the graphic','lorem-ipsum-is-placeholder-text-commonly-used-in-the-graphic','1667340369.png','2022-11-02','<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.&nbsp;</p>',1,'2022-11-02 05:06:09','2022-11-08 03:54:49'),
(2,'Lorem ipsum is a name for a common type of placeholder text','lorem-ipsum-is-a-name-for-a-common-type-of-placeholder-text','1667422467.jpg','2022-11-02','<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.</p>',1,'2022-11-02 05:06:57','2022-11-08 06:23:38');

/*Table structure for table `brands` */

DROP TABLE IF EXISTS `brands`;

CREATE TABLE `brands` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `parent_category_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_category_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `brands` */

insert  into `brands`(`id`,`parent_category_id`,`main_category_id`,`brand_name`,`slug`,`status`,`created_at`,`updated_at`) values 
(1,NULL,NULL,'LDNIO','ldnio',1,'2022-12-28 01:55:32','2022-12-28 01:55:32'),
(2,NULL,NULL,'MOXOM','moxom',1,'2022-12-28 01:55:48','2022-12-28 01:55:48'),
(3,NULL,NULL,'LG','lg',1,'2023-01-18 08:05:14','2023-01-18 08:05:22');

/*Table structure for table `cancellations` */

DROP TABLE IF EXISTS `cancellations`;

CREATE TABLE `cancellations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cancellation_policy` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `cancellations` */

insert  into `cancellations`(`id`,`cancellation_policy`,`reason`,`slug`,`status`,`created_at`,`updated_at`) values 
(1,'<p>Before cancelling the order, kindly read thoroughly our following terms &amp; conditions:</p><ol><li>Once you submit this form you agree to cancel the selected item(s) in your order. We will be unable to retrieve your order once it is cancelled.</li><li>Once you confirm your item(s) cancellation, we will process your refund within 24 hours, provided the item(s) has not been handed over to the logistics partner yet. Please note that, if your item has already been handed over to the logistics partner we will be unable to proceed with your cancellation request and we will inform you accordingly.</li><li>If you are cancelling your order partially, ie. not all the items in your order, then we will be unable to refund you the shipping fee.</li><li>Once your item(s) has been successfully cancelled you will receive a notification from us with your refund summary</li></ol>','Change/combine order',NULL,1,'2023-01-05 15:58:47','2023-01-05 16:16:07'),
(2,NULL,'Delivery time is too long',NULL,1,'2023-01-05 16:06:28','2023-01-05 16:06:28'),
(3,NULL,'Duplicate order',NULL,1,'2023-01-05 16:06:40','2023-01-05 16:57:00'),
(4,NULL,'Change of Delivery Address',NULL,1,'2023-01-05 16:07:03','2023-01-05 16:56:18'),
(5,NULL,'Shipping Fees',NULL,1,'2023-01-05 16:07:17','2023-01-05 16:55:33'),
(6,NULL,'Change of mind',NULL,1,'2023-01-05 16:07:31','2023-01-05 16:53:28'),
(7,NULL,'Forgot to use voucher/voucher issue',NULL,1,'2023-01-05 16:08:04','2023-01-05 16:53:03'),
(8,NULL,'Decided for alternative product',NULL,1,'2023-01-05 16:08:23','2023-01-05 16:52:12'),
(9,NULL,'Found cheaper elsewhere',NULL,1,'2023-01-05 16:08:43','2023-01-05 16:51:06'),
(10,NULL,'Change Payment method',NULL,1,'2023-01-05 16:09:00','2023-01-05 17:00:25');

/*Table structure for table `carts` */

DROP TABLE IF EXISTS `carts`;

CREATE TABLE `carts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(50) DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_variantion_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_category_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT 1,
  `price` int(11) DEFAULT NULL,
  `discount` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'custom how much save money',
  `discounted_price` double DEFAULT NULL,
  `total` int(11) NOT NULL,
  `attribute` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attribute_value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cart_id_checkbox` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `carts` */

/*Table structure for table `cities` */

DROP TABLE IF EXISTS `cities`;

CREATE TABLE `cities` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `state_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=180 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `cities` */

insert  into `cities`(`id`,`state_id`,`city`,`created_at`,`updated_at`) values 
(1,'1','Johor Bahru','2022-11-30 17:27:17','2022-11-30 17:27:17'),
(2,'1','Tebrau','2022-11-30 17:28:33','2022-11-30 17:28:33'),
(3,'1','Pasir Gudang','2022-11-30 17:28:55','2022-11-30 17:28:55'),
(4,'1','Bukit Indah','2022-11-30 17:29:04','2022-11-30 17:29:04'),
(5,'1','Skudai','2022-11-30 17:29:13','2022-11-30 17:29:13'),
(6,'1','Kluang','2022-11-30 17:29:22','2022-11-30 17:29:22'),
(7,'1','Batu Pahat','2022-11-30 17:29:30','2022-11-30 17:29:30'),
(8,'1','Muar','2022-11-30 17:29:40','2022-11-30 17:29:40'),
(9,'1','Ulu Tiram','2022-11-30 17:29:47','2022-11-30 17:29:47'),
(10,'1','Senai','2022-11-30 17:29:54','2022-11-30 17:29:54'),
(11,'1','Segamat','2022-11-30 17:30:02','2022-11-30 17:30:02'),
(12,'1','Kulai','2022-11-30 17:30:09','2022-11-30 17:30:09'),
(13,'1','Kota Tinggi','2022-11-30 17:30:16','2022-11-30 17:30:16'),
(14,'1','Pontian Kechil','2022-11-30 17:30:23','2022-11-30 17:30:23'),
(15,'1','Tangkak','2022-11-30 17:30:32','2022-11-30 17:30:32'),
(16,'1','Bukit Bakri','2022-11-30 17:30:41','2022-11-30 17:30:41'),
(17,'1','Yong Peng','2022-11-30 17:30:49','2022-11-30 17:30:49'),
(18,'1','Pekan Nenas','2022-11-30 17:30:57','2022-11-30 17:30:57'),
(19,'1','Labis','2022-11-30 17:31:05','2022-11-30 17:31:05'),
(20,'1','Mersing','2022-11-30 17:31:13','2022-11-30 17:31:13'),
(21,'1','Simpang Renggam','2022-11-30 17:31:21','2022-11-30 17:31:21'),
(22,'1','Parit Raja','2022-11-30 17:31:29','2022-11-30 17:31:29'),
(23,'1','Kelapa Sawit','2022-11-30 17:31:36','2022-11-30 17:31:36'),
(24,'1','Buloh Kasap','2022-11-30 17:31:44','2022-11-30 17:31:44'),
(25,'1','Chaah','2022-11-30 17:31:52','2022-11-30 17:31:52'),
(26,'2','Sungai Petani','2022-11-30 17:33:52','2022-11-30 17:33:52'),
(27,'2','Alor Setar','2022-11-30 17:34:26','2022-11-30 17:34:26'),
(28,'2','Kulim','2022-11-30 17:34:34','2022-11-30 17:34:34'),
(29,'2','Jitra / Kubang Pasu','2022-11-30 17:34:44','2022-11-30 17:34:44'),
(30,'2','Baling','2022-11-30 17:34:52','2022-11-30 17:34:52'),
(31,'2','Pendang','2022-11-30 17:35:00','2022-11-30 17:35:00'),
(32,'2','Langkawi','2022-11-30 17:35:07','2022-11-30 17:35:07'),
(33,'2','Yan','2022-11-30 17:35:13','2022-11-30 17:35:13'),
(34,'2','Sik','2022-11-30 17:35:19','2022-11-30 17:35:19'),
(35,'2','Kuala Nerang','2022-11-30 17:35:26','2022-11-30 17:35:26'),
(36,'2','Pokok Sena','2022-11-30 17:35:32','2022-11-30 17:35:32'),
(37,'2','Bandar Baharu','2022-11-30 17:35:40','2022-11-30 17:35:40'),
(38,'3','Kota Bharu','2022-11-30 17:37:51','2022-11-30 17:37:51'),
(39,'3','Pangkal Kalong','2022-11-30 17:38:03','2022-11-30 17:38:03'),
(40,'3','Tanah Merah','2022-11-30 17:38:11','2022-11-30 17:38:11'),
(41,'3','Peringat','2022-11-30 17:38:18','2022-11-30 17:38:18'),
(42,'3','Wakaf Baru','2022-11-30 17:38:25','2022-11-30 17:38:25'),
(43,'3','Kadok','2022-11-30 17:38:32','2022-11-30 17:38:32'),
(44,'3','Pasir Mas','2022-11-30 17:38:44','2022-11-30 17:38:44'),
(45,'3','Gua Musang','2022-11-30 17:38:52','2022-11-30 17:38:52'),
(46,'3','Kuala Krai','2022-11-30 17:38:59','2022-11-30 17:38:59'),
(47,'3','Tumpat','2022-11-30 17:39:06','2022-11-30 17:39:06'),
(48,'4','Bandaraya Melaka','2022-11-30 17:40:19','2022-11-30 17:40:19'),
(49,'4','Bukit Baru','2022-11-30 17:40:27','2022-11-30 17:40:27'),
(50,'4','Ayer Keroh','2022-11-30 17:40:38','2022-11-30 17:40:38'),
(51,'4','Klebang','2022-11-30 17:40:46','2022-11-30 17:40:46'),
(52,'4','Masjid Tanah','2022-11-30 17:40:55','2022-11-30 17:40:55'),
(53,'4','Sungai Udang','2022-11-30 17:41:02','2022-11-30 17:41:02'),
(54,'4','Batu Berendam','2022-11-30 17:41:09','2022-11-30 17:41:09'),
(55,'4','Alor Gajah','2022-11-30 17:41:16','2022-11-30 17:41:16'),
(56,'4','Bukit Rambai','2022-11-30 17:41:24','2022-11-30 17:41:24'),
(57,'4','Ayer Molek','2022-11-30 17:41:31','2022-11-30 17:41:31'),
(58,'4','Bemban\"','2022-11-30 17:41:39','2022-11-30 17:41:39'),
(59,'4','Kuala Sungai Baru','2022-11-30 17:41:46','2022-11-30 17:41:46'),
(60,'4','Pulau Sebang','2022-11-30 17:41:55','2022-11-30 17:41:55'),
(61,'4','Jasin','2022-11-30 17:42:03','2022-11-30 17:42:03'),
(62,'5','Seremban','2022-11-30 17:43:00','2022-11-30 17:43:00'),
(63,'5','Port Dickson','2022-11-30 17:43:08','2022-11-30 17:43:08'),
(64,'5','Nilai','2022-11-30 17:43:16','2022-11-30 17:43:16'),
(65,'5','Bahau','2022-11-30 17:43:22','2022-11-30 17:43:22'),
(66,'5','Tampin','2022-11-30 17:43:28','2022-11-30 17:43:28'),
(67,'5','Kuala Pilah','2022-11-30 17:43:35','2022-11-30 17:43:35'),
(68,'6','Kuantan','2022-11-30 17:44:18','2022-11-30 17:44:18'),
(69,'6','Temerloh','2022-11-30 17:44:26','2022-11-30 17:44:26'),
(70,'6','Bentong','2022-11-30 17:44:33','2022-11-30 17:44:33'),
(71,'6','Mentakab','2022-11-30 17:44:40','2022-11-30 17:44:40'),
(72,'6','Raub','2022-11-30 17:44:49','2022-11-30 17:44:49'),
(73,'6','Jerantut','2022-11-30 17:44:55','2022-11-30 17:44:55'),
(74,'6','Pekan','2022-11-30 17:45:02','2022-11-30 17:45:02'),
(75,'6','Kuala Lipis','2022-11-30 17:45:11','2022-11-30 17:45:11'),
(76,'6','Bandar Jengka','2022-11-30 17:45:18','2022-11-30 17:45:18'),
(77,'6','Bukit Tinggi','2022-11-30 17:45:26','2022-11-30 17:45:26'),
(78,'7','Ipoh','2022-11-30 17:45:48','2022-11-30 17:45:48'),
(79,'7','Taiping','2022-11-30 17:46:04','2022-11-30 17:46:04'),
(80,'7','Sitiawan','2022-11-30 17:46:12','2022-11-30 17:46:12'),
(81,'7','Simpang Empat','2022-11-30 17:46:18','2022-11-30 17:46:18'),
(82,'7','Teluk Intan','2022-11-30 17:46:27','2022-11-30 17:46:27'),
(83,'7','Batu Gajah','2022-11-30 17:46:34','2022-11-30 17:46:34'),
(84,'7','Lumut','2022-11-30 17:46:41','2022-11-30 17:46:41'),
(85,'7','Kampung Koh','2022-11-30 17:46:49','2022-11-30 17:46:49'),
(86,'7','Kuala Kangsar','2022-11-30 17:46:56','2022-11-30 17:46:56'),
(87,'7','Sungai Siput Utara','2022-11-30 17:47:03','2022-11-30 17:47:03'),
(88,'7','Tapah','2022-11-30 17:47:12','2022-11-30 17:47:12'),
(89,'7','Bidor','2022-11-30 17:47:19','2022-11-30 17:47:19'),
(90,'7','Parit Buntar','2022-11-30 17:47:26','2022-11-30 17:47:26'),
(91,'7','Ayer Tawar','2022-11-30 17:47:33','2022-11-30 17:47:33'),
(92,'7','Bagan Serai','2022-11-30 17:47:40','2022-11-30 17:47:40'),
(93,'7','Tanjung Malim','2022-11-30 17:47:48','2022-11-30 17:47:48'),
(94,'7','Lawan Kuda Baharu','2022-11-30 17:47:55','2022-11-30 17:47:55'),
(95,'7','Pantai Remis','2022-11-30 17:48:05','2022-11-30 17:48:05'),
(96,'7','Kampar','2022-11-30 17:48:12','2022-11-30 17:48:12'),
(97,'8','Kangar','2022-11-30 17:48:33','2022-11-30 17:48:33'),
(98,'8','Kuala Perlis','2022-11-30 17:48:46','2022-11-30 17:48:46'),
(99,'9','Bukit Mertajam','2022-11-30 17:49:56','2022-11-30 17:49:56'),
(100,'9','Georgetown','2022-11-30 17:50:05','2022-11-30 17:50:05'),
(101,'9','Sungai Ara','2022-11-30 17:50:12','2022-11-30 17:50:12'),
(102,'9','Gelugor','2022-11-30 17:50:20','2022-11-30 17:50:20'),
(103,'9','Ayer Itam','2022-11-30 17:50:30','2022-11-30 17:50:30'),
(104,'9','Butterworth','2022-11-30 17:50:38','2022-11-30 17:50:38'),
(105,'9','Perai','2022-11-30 17:50:47','2022-11-30 17:50:47'),
(106,'9','Nibong Tebal','2022-11-30 17:50:55','2022-11-30 17:50:55'),
(107,'9','Permatang Kucing','2022-11-30 17:51:03','2022-11-30 17:51:03'),
(108,'9','Tanjung Tokong','2022-11-30 17:51:11','2022-11-30 17:51:11'),
(109,'9','Kepala Batas','2022-11-30 17:51:21','2022-11-30 17:51:21'),
(110,'9','Tanjung Bungah','2022-11-30 17:51:29','2022-11-30 17:51:29'),
(111,'9','Juru','2022-11-30 17:51:37','2022-11-30 17:51:37'),
(112,'10','Kota Kinabalu','2022-11-30 17:52:23','2022-11-30 17:52:23'),
(113,'10','Sandakan','2022-11-30 17:52:40','2022-11-30 17:52:40'),
(114,'10','Tawau','2022-11-30 17:52:49','2022-11-30 17:52:49'),
(115,'10','Lahad Datu','2022-11-30 17:52:56','2022-11-30 17:52:56'),
(116,'10','Keningau','2022-11-30 17:53:04','2022-11-30 17:53:04'),
(117,'10','Putatan','2022-11-30 17:53:11','2022-11-30 17:53:11'),
(118,'10','Donggongon','2022-11-30 17:53:19','2022-11-30 17:53:19'),
(119,'10','Semporna','2022-11-30 17:53:25','2022-11-30 17:53:25'),
(120,'10','Kudat','2022-11-30 17:53:33','2022-11-30 17:53:33'),
(121,'10','Kunak','2022-11-30 17:53:40','2022-11-30 17:53:40'),
(122,'10','Papar','2022-11-30 17:53:46','2022-11-30 17:53:46'),
(123,'10','Ranau','2022-11-30 17:53:57','2022-11-30 17:53:57'),
(124,'10','Beaufort','2022-11-30 17:54:04','2022-11-30 17:54:04'),
(125,'10','Kinarut','2022-11-30 17:54:10','2022-11-30 17:54:10'),
(126,'10','Kota Belud','2022-11-30 17:54:17','2022-11-30 17:54:17'),
(127,'11','Kuching','2022-11-30 17:54:37','2022-11-30 17:54:37'),
(128,'11','Miri','2022-11-30 17:54:46','2022-11-30 17:54:46'),
(129,'11','Sibu','2022-11-30 17:54:53','2022-11-30 17:54:53'),
(130,'11','Bintulu','2022-11-30 17:55:23','2022-11-30 17:55:23'),
(131,'11','Limbang','2022-11-30 17:55:30','2022-11-30 17:55:30'),
(132,'11','Sarikei','2022-11-30 17:55:37','2022-11-30 17:55:37'),
(133,'11','Sri Aman','2022-11-30 17:55:44','2022-11-30 17:55:44'),
(134,'11','Kapit','2022-11-30 17:55:50','2022-11-30 17:55:50'),
(135,'11','Batu Delapan Bazaar','2022-11-30 17:55:58','2022-11-30 17:55:58'),
(136,'11','Kota Samarahan','2022-11-30 17:56:05','2022-11-30 17:56:05'),
(137,'12','Subang Jaya','2022-11-30 17:56:22','2022-11-30 17:56:22'),
(138,'12','Klang','2022-11-30 17:56:29','2022-11-30 17:56:29'),
(139,'12','Ampang Jaya','2022-11-30 17:56:37','2022-11-30 17:56:37'),
(140,'12','Shah Alam','2022-11-30 17:56:44','2022-11-30 17:56:44'),
(141,'12','Petaling Jaya','2022-11-30 17:56:52','2022-11-30 17:56:52'),
(142,'12','Cheras','2022-11-30 17:57:00','2022-11-30 17:57:00'),
(143,'12','Kajang','2022-11-30 17:57:06','2022-11-30 17:57:06'),
(144,'12','Selayang Baru','2022-11-30 17:57:14','2022-11-30 17:57:14'),
(145,'12','Rawang','2022-11-30 17:57:20','2022-11-30 17:57:20'),
(146,'12','Taman Greenwood','2022-11-30 17:57:29','2022-11-30 17:57:29'),
(147,'12','Semenyih','2022-11-30 17:57:35','2022-11-30 17:57:35'),
(148,'12','Banting','2022-11-30 17:57:42','2022-11-30 17:57:42'),
(149,'12','Balakong','2022-11-30 17:57:49','2022-11-30 17:57:49'),
(150,'12','Gombak Setia','2022-11-30 17:57:57','2022-11-30 17:57:57'),
(151,'12','Kuala Selangor','2022-11-30 17:58:04','2022-11-30 17:58:04'),
(152,'12','Serendah','2022-11-30 17:58:10','2022-11-30 17:58:10'),
(153,'12','Bukit Beruntung','2022-11-30 17:58:18','2022-11-30 17:58:18'),
(154,'12','Pengkalan Kundang','2022-11-30 17:58:26','2022-11-30 17:58:26'),
(155,'12','Jenjarom','2022-11-30 17:58:33','2022-11-30 17:58:33'),
(156,'12','Sungai Besar','2022-11-30 17:58:39','2022-11-30 17:58:39'),
(157,'12','Batu Arang','2022-11-30 17:58:47','2022-11-30 17:58:47'),
(158,'12','Tanjung Sepat','2022-11-30 17:58:54','2022-11-30 17:58:54'),
(159,'12','Kuang','2022-11-30 17:59:01','2022-11-30 17:59:01'),
(160,'12','Kuala Kubu Baharu','2022-11-30 17:59:08','2022-11-30 17:59:08'),
(161,'12','Batang Berjuntai','2022-11-30 17:59:15','2022-11-30 17:59:15'),
(162,'12','Bandar Baru Salak Tinggi','2022-11-30 17:59:24','2022-11-30 17:59:24'),
(163,'12','Sekinchan','2022-11-30 17:59:38','2022-11-30 17:59:38'),
(164,'12','Sabak','2022-11-30 17:59:44','2022-11-30 17:59:44'),
(165,'12','Tanjung Karang','2022-11-30 17:59:51','2022-11-30 17:59:51'),
(166,'12','Beranang','2022-11-30 17:59:59','2022-11-30 17:59:59'),
(167,'12','Sungai Pelek','2022-11-30 18:00:06','2022-11-30 18:00:06'),
(168,'12','Sepang','2022-11-30 18:00:13','2022-11-30 18:00:13'),
(169,'13','Kuala Terengganu','2022-11-30 18:00:34','2022-11-30 18:00:34'),
(170,'13','Chukai','2022-11-30 18:00:44','2022-11-30 18:00:44'),
(171,'13','Dungun','2022-11-30 18:00:51','2022-11-30 18:00:51'),
(172,'13','Kerteh','2022-11-30 18:00:59','2022-11-30 18:00:59'),
(173,'13','Kuala Berang','2022-11-30 18:01:07','2022-11-30 18:01:07'),
(174,'13','Marang','2022-11-30 18:01:15','2022-11-30 18:01:15'),
(175,'13','Paka','2022-11-30 18:01:22','2022-11-30 18:01:22'),
(176,'13','Jerteh','2022-11-30 18:01:29','2022-11-30 18:01:29'),
(177,'14','Kuala Lumpur','2022-11-30 18:01:50','2022-11-30 18:01:50'),
(178,'14','Labuan','2022-11-30 18:01:57','2022-11-30 18:01:57'),
(179,'14','Putrajaya','2022-11-30 18:02:06','2022-11-30 18:02:06');

/*Table structure for table `configurations` */

DROP TABLE IF EXISTS `configurations`;

CREATE TABLE `configurations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `copy_right` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_fee` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_code` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_discount` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `configurations` */

insert  into `configurations`(`id`,`copy_right`,`contact`,`email`,`address`,`map_link`,`short_description`,`shipping_fee`,`coupon_code`,`coupon_discount`,`status`,`created_at`,`updated_at`) values 
(1,'COPYRIGHTS ALL RIGHTS RESERVED 2022 BY LOTTI','123456789','abc@gmail.com','Test Address','https://goo.gl/maps/k6131cCb6qKph3LGA','<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh.</p>','15','lotti-sxfewe',10,1,'2022-11-30 20:18:49','2022-12-01 23:25:32');

/*Table structure for table `coupons` */

DROP TABLE IF EXISTS `coupons`;

CREATE TABLE `coupons` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_variation_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_category_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `percentage` varchar(199) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `expiry_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `free_shipping` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `minimum_spend` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `maximum_spend` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_items` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `allowed_emails` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usage_limit_per_coupon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usage_limit_per_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usage_limit_items` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `coupons` */

/*Table structure for table `define_product_variants` */

DROP TABLE IF EXISTS `define_product_variants`;

CREATE TABLE `define_product_variants` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `variant_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `variant` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `define_product_variants` */

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `faqs` */

DROP TABLE IF EXISTS `faqs`;

CREATE TABLE `faqs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `questions` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(119) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `faqs` */

insert  into `faqs`(`id`,`questions`,`answer`,`status`,`created_at`,`updated_at`) values 
(6,'Question 1','<p>Answer 1</p>','0','2022-11-01 00:06:07','2022-11-01 23:37:11'),
(7,'Question 2','<p>Answer 2</p>','1','2022-11-01 00:06:20','2022-11-01 00:06:20'),
(9,'Question 3','<p>Answer3</p>','1','2022-11-01 23:38:52','2022-11-04 06:34:11');

/*Table structure for table `galleries` */

DROP TABLE IF EXISTS `galleries`;

CREATE TABLE `galleries` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `image_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `galleries` */

insert  into `galleries`(`id`,`image_title`,`image_slug`,`image_name`,`image_path`,`status`,`deleted_at`,`created_at`,`updated_at`) values 
(1,'Home','Home','1667577984.jpg',NULL,1,NULL,'2022-11-04 23:06:24','2022-11-04 23:10:42');

/*Table structure for table `homes` */

DROP TABLE IF EXISTS `homes`;

CREATE TABLE `homes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `page_title` varchar(119) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_banner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `homes` */

/*Table structure for table `inquiries` */

DROP TABLE IF EXISTS `inquiries`;

CREATE TABLE `inquiries` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `inquiries` */

/*Table structure for table `locations` */

DROP TABLE IF EXISTS `locations`;

CREATE TABLE `locations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `location_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `map_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `locations` */

insert  into `locations`(`id`,`location_name`,`map_link`,`slug`,`image`,`status`,`created_at`,`updated_at`) values 
(2,'Houston','https://goo.gl/maps/xCPfwnLAtu7Hr5ZR7','houston','1667503661.png',1,'2022-11-04 02:27:41','2022-11-08 04:50:17'),
(3,'test','Ducimus nisi culpa','test','1667926252.jpg',1,'2022-11-08 23:50:52','2022-11-08 23:50:52');

/*Table structure for table `logos` */

DROP TABLE IF EXISTS `logos`;

CREATE TABLE `logos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `logos` */

insert  into `logos`(`id`,`type`,`image`,`created_at`,`updated_at`) values 
(1,'Favicon','1668093193.webp','2022-11-05 07:16:45','2022-11-10 22:13:13'),
(2,'Logo','1668092422.webp','2022-11-05 02:17:29','2022-11-10 22:00:22');

/*Table structure for table `main_categories` */

DROP TABLE IF EXISTS `main_categories`;

CREATE TABLE `main_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `parent_category_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `main_categories` */

insert  into `main_categories`(`id`,`parent_category_id`,`main_category_name`,`slug`,`status`,`created_at`,`updated_at`) values 
(1,'1','Mobile Accessories','mobile-accessories',1,'2022-12-28 01:51:08','2022-12-28 01:51:08'),
(2,'2','Apple','apple',1,'2023-01-18 08:06:49','2023-01-18 08:06:49'),
(3,'2','Samsung','samsung',1,'2023-01-18 08:07:04','2023-01-18 08:07:04');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1),
(4,'2022_03_03_210155_create_logos_table',2),
(5,'2022_03_04_205232_create_homes_table',3),
(8,'2022_10_13_190725_create_testimonials_table',6),
(9,'2022_10_18_184937_testimonial',7),
(10,'2022_10_18_190709_create__testimonial_table',8),
(11,'2022_10_27_173542_create_faqs_table',9),
(12,'2022_10_28_215824_create_portfolio',10),
(13,'2022_10_31_164116_create_inquiries_table',11),
(14,'2022_10_31_173933_create_packages_table',12),
(16,'2022_10_31_214150_create_socials_table',14),
(17,'2022_10_31_223033_create_services_table',15),
(18,'2022_10_31_230211_create_portfolios_table',16),
(19,'2014_10_12_000000_create_users_table',17),
(21,'2022_11_01_170350_create_pages_table',18),
(22,'2022_11_01_180422_create_banners_table',19),
(24,'2022_11_01_195440_create_privacy_policies_table',20),
(25,'2022_11_01_201457_create_terms_conditions_table',21),
(26,'2022_11_01_203428_create_page_contents_table',22),
(28,'2022_11_01_212644_create_blogs_table',23),
(30,'2022_11_02_151719_create_parent_categories_table',24),
(31,'2022_11_02_161824_create_main_categories_table',25),
(32,'2022_11_02_170134_create_sub_categories_table',26),
(33,'2022_11_03_181130_create_locations_table',27),
(34,'2022_11_04_155504_create_galleries_table',28),
(36,'2022_11_07_212636_create_configurations_table',29),
(39,'2022_11_08_215416_create_attributes_table',30),
(42,'2022_11_08_214745_create_products_table',31),
(45,'2022_11_09_174828_create_brands_table',32),
(46,'2022_11_11_151231_create_otp_verifications_table',33),
(47,'2022_11_11_190922_create_subscriptions_table',34),
(48,'2022_11_14_222008_create_user_addresses_table',35),
(49,'2022_11_14_224938_create_wishlists_table',36),
(50,'2022_11_15_195941_create_orders_table',37),
(51,'2022_11_16_182850_create_offers_table',38),
(52,'2022_11_24_204011_create_carts_table',39),
(53,'2022_11_29_200021_create_billing_infos_table',40),
(54,'2022_12_09_230607_create_variants_table',41),
(55,'2022_12_14_164113_create_order_notifications_table',42),
(56,'2022_12_16_192955_create_product_additional_attributes_table',43),
(57,'2022_12_16_191951_create_product_attributes_table',44),
(58,'2022_12_16_195520_create_define_product_variants_table',45),
(59,'2022_12_20_163757_create_product_variantions_table',46);

/*Table structure for table `multiple_cities` */

DROP TABLE IF EXISTS `multiple_cities`;

CREATE TABLE `multiple_cities` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `shipping_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `multiple_cities` */

insert  into `multiple_cities`(`id`,`shipping_id`,`city_id`,`city_name`,`created_at`,`updated_at`) values 
(1,'6','1','Johor Bahru','2023-01-18 20:34:59','2023-01-18 20:34:59'),
(2,'6','2','Tebrau','2023-01-18 20:34:59','2023-01-18 20:34:59'),
(3,'6','3','Pasir Gudang','2023-01-18 20:34:59','2023-01-18 20:34:59');

/*Table structure for table `offers` */

DROP TABLE IF EXISTS `offers`;

CREATE TABLE `offers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `page_id` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section_name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `offers` */

insert  into `offers`(`id`,`page_id`,`section_name`,`title1`,`title2`,`title3`,`title4`,`slug`,`image1`,`image2`,`created_at`,`updated_at`) values 
(1,'1','Biggest Sale','This weekend only','biggest','sale','up to 70% off','this-weekend-only','1668703864.webp','1668703811.webp','2022-11-17 02:30:33','2022-11-17 23:51:04'),
(2,'2','Buy One Get One Free','Buy One','Get One','Free',NULL,'buy-one','1668628909.webp','1668704100.webp','2022-11-17 02:57:38','2022-11-17 23:55:00');

/*Table structure for table `order_notes` */

DROP TABLE IF EXISTS `order_notes`;

CREATE TABLE `order_notes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_notes_status` int(11) NOT NULL,
  `status_changed_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `order_notes` */

insert  into `order_notes`(`id`,`order_id`,`order_comment`,`order_notes_status`,`status_changed_time`,`created_at`,`updated_at`) values 
(1,'1',NULL,1,'2023-01-19 00:26:18','2023-01-19 07:26:18','2023-01-19 07:26:18'),
(2,'2',NULL,1,'2023-01-19 20:51:50','2023-01-19 20:51:50','2023-01-19 20:51:50'),
(3,'2','your order has been shipphed',2,'2023-01-19 20:57:41','2023-01-19 20:57:41','2023-01-19 20:57:41'),
(4,'2','order has been deliverd\r\nThanks for shopping with lotti website',3,'2023-01-19 20:58:36','2023-01-19 20:58:36','2023-01-19 20:58:36');

/*Table structure for table `order_notifications` */

DROP TABLE IF EXISTS `order_notifications`;

CREATE TABLE `order_notifications` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `order_notifications` */

/*Table structure for table `orders` */

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_fee` int(11) DEFAULT NULL,
  `coupon_status` tinyint(1) DEFAULT NULL COMMENT '(1) active, (2) null deactive',
  `product_count` int(50) DEFAULT 0,
  `order_status` tinyint(1) DEFAULT NULL COMMENT '(1) pending, (2) dispatch, (3) deliver, (4) cancelled, (5) hold ,(6) Approved Cancellation',
  `cancel_order_count` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` double DEFAULT NULL COMMENT '(1) cash on delivery, (2) Paypal, (3) Stripe',
  `payment_response` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_cancellation_reason` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_verification` tinyint(1) DEFAULT NULL COMMENT '(1) verified',
  `processing_at` timestamp NULL DEFAULT NULL,
  `shipped_at` timestamp NULL DEFAULT NULL,
  `delivered_at` timestamp NULL DEFAULT NULL,
  `cancelled_at` timestamp NULL DEFAULT NULL,
  `verified_at` timestamp NULL DEFAULT NULL,
  `hold_at` timestamp NULL DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `orders` */

insert  into `orders`(`id`,`user_id`,`product_id`,`coupon_id`,`quantity`,`total_price`,`delivery_fee`,`coupon_status`,`product_count`,`order_status`,`cancel_order_count`,`billing_address`,`shipping_address`,`payment_method`,`payment_response`,`order_cancellation_reason`,`order_verification`,`processing_at`,`shipped_at`,`delivered_at`,`cancelled_at`,`verified_at`,`hold_at`,`comment`,`created_at`,`updated_at`) values 
(1,'3',NULL,NULL,NULL,NULL,0,NULL,0,10,'1','{\"id\":1,\"user_id\":\"3\",\"name\":\"Lev\",\"address\":\"Brody\",\"contact\":\"133\",\"landmark\":\"Mannix\",\"delivery_label\":\"1\",\"province\":\"1\",\"city\":\"1\",\"village\":null,\"default_shipping\":\"1\",\"default_billing\":null,\"shipping_active_address\":\"1\",\"billing_active_address\":\"2\",\"address_identifire\":\"1\",\"created_at\":\"2023-01-13T20:47:42.000000Z\",\"updated_at\":\"2023-01-18T19:01:45.000000Z\"}','{\"id\":1,\"user_id\":\"3\",\"name\":\"Lev\",\"address\":\"Brody\",\"contact\":\"133\",\"landmark\":\"Mannix\",\"delivery_label\":\"1\",\"province\":\"1\",\"city\":\"1\",\"village\":null,\"default_shipping\":\"1\",\"default_billing\":null,\"shipping_active_address\":\"1\",\"billing_active_address\":\"2\",\"address_identifire\":\"1\",\"created_at\":\"2023-01-13T20:47:42.000000Z\",\"updated_at\":\"2023-01-18T19:01:45.000000Z\"}',1,NULL,'{\"orderIdHidden\":\"1\",\"cancel_product_id\":\"1\",\"cancel_order_id\":\"1\",\"cancellation_policy\":\"1\",\"cancelproduct\":[\"1\"],\"allorders\":null,\"reason\":\"2\",\"comment\":\"for test\",\"policy\":\"1\"}',NULL,'2023-01-19 07:26:18',NULL,NULL,NULL,NULL,NULL,'for test','2023-01-19 07:26:18','2023-01-19 20:56:58'),
(2,'3',NULL,NULL,NULL,NULL,0,NULL,0,3,NULL,'{\"id\":1,\"user_id\":\"3\",\"name\":\"Uma Wheeler\",\"address\":\"Repellendus Consequ\",\"contact\":\"+1 (494) 934-7647\",\"landmark\":\"Autem eveniet simil\",\"delivery_label\":\"1\",\"province\":\"2\",\"city\":\"34\",\"village\":null,\"default_shipping\":\"1\",\"default_billing\":\"2\",\"shipping_active_address\":\"1\",\"billing_active_address\":\"2\",\"address_identifire\":1,\"created_at\":\"2023-01-19T20:35:39.000000Z\",\"updated_at\":\"2023-01-19T20:35:39.000000Z\"}','{\"id\":1,\"user_id\":\"3\",\"name\":\"Uma Wheeler\",\"address\":\"Repellendus Consequ\",\"contact\":\"+1 (494) 934-7647\",\"landmark\":\"Autem eveniet simil\",\"delivery_label\":\"1\",\"province\":\"2\",\"city\":\"34\",\"village\":null,\"default_shipping\":\"1\",\"default_billing\":\"2\",\"shipping_active_address\":\"1\",\"billing_active_address\":\"2\",\"address_identifire\":1,\"created_at\":\"2023-01-19T20:35:39.000000Z\",\"updated_at\":\"2023-01-19T20:35:39.000000Z\"}',1,NULL,NULL,NULL,'2023-01-19 20:51:48','2023-01-19 20:57:41','2023-01-19 20:58:36',NULL,NULL,NULL,'order has been deliverd\r\nThanks for shopping with lotti website','2023-01-19 20:51:48','2023-01-19 20:58:36');

/*Table structure for table `otp_verifications` */

DROP TABLE IF EXISTS `otp_verifications`;

CREATE TABLE `otp_verifications` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `otp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `otp_verifications` */

insert  into `otp_verifications`(`id`,`email`,`otp`,`created_at`,`updated_at`) values 
(1,'rano@mailinator.com','149569','2023-01-19 19:20:24','2023-01-19 19:20:24'),
(2,'rano@mailinator.com','294296','2023-01-19 19:20:33','2023-01-19 19:20:33'),
(3,'rano@mailinator.com','323572','2023-01-19 19:20:46','2023-01-19 19:20:46'),
(4,'rano@mailinator.com','772051','2023-01-19 19:21:16','2023-01-19 19:21:16'),
(5,'djoy62471@gmail.com','537283','2023-01-19 22:22:35','2023-01-19 22:22:35'),
(6,'djoy621@gmail.com','861790','2023-01-19 22:49:07','2023-01-19 22:49:07');

/*Table structure for table `packages` */

DROP TABLE IF EXISTS `packages`;

CREATE TABLE `packages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `packages` */

insert  into `packages`(`id`,`title`,`price`,`description`,`status`,`created_at`,`updated_at`) values 
(3,'Basic','500','<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.</p>',1,'2022-11-01 02:36:56','2022-11-01 23:34:11'),
(4,'Gold','700','<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.</p>',0,'2022-11-01 02:37:12','2022-11-04 22:32:04'),
(5,'Premium','1000','<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.</p>',0,'2022-11-01 02:37:23','2022-11-05 02:26:05');

/*Table structure for table `page_contents` */

DROP TABLE IF EXISTS `page_contents`;

CREATE TABLE `page_contents` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `page_id` int(11) NOT NULL,
  `section_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title2` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title3` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title4` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `page_contents` */

insert  into `page_contents`(`id`,`page_id`,`section_name`,`title1`,`title2`,`title3`,`title4`,`slug`,`description`,`image`,`created_at`,`updated_at`) values 
(1,1,'Discount Section','Book Your','IPhone 14 Pro Max','25','Sale','book-your','<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.</p>','1669849108.webp','2022-12-01 00:23:16','2022-12-01 23:13:41'),
(2,1,'Power Bank','Power Bank','25','Sale',NULL,'power-bank','<p>Sale</p>','1669847063.webp','2022-12-01 00:24:23','2022-12-01 00:56:45'),
(3,1,'Andriod','Andriod','25','Sale',NULL,'andriod','<p>Sale</p>','1669847108.webp','2022-12-01 00:25:08','2022-12-01 00:56:53'),
(4,1,'Digital Watch','Digital Watch','25','Sale',NULL,'digital-watch','<p>Digital WatchDigital Watch</p>','1669847157.webp','2022-12-01 00:25:57','2022-12-01 00:56:58'),
(5,1,'Gaming PC','Gaming PC','25','Sale',NULL,'gaming-pc','<p>sale</p>','1669847551.webp','2022-12-01 00:32:31','2022-12-01 00:57:11');

/*Table structure for table `pages` */

DROP TABLE IF EXISTS `pages`;

CREATE TABLE `pages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `page_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `pages` */

insert  into `pages`(`id`,`page_name`,`status`,`created_at`,`updated_at`) values 
(1,'Home',1,'2022-11-02 00:55:44','2022-11-08 03:44:23'),
(2,'About us',1,'2022-11-02 00:55:52','2022-11-02 00:55:52'),
(3,'Contact Us',1,'2022-11-02 00:56:04','2022-11-02 00:56:04'),
(4,'Gallery',1,'2022-11-02 00:56:30','2022-11-02 00:56:30'),
(5,'Privacy Policy',1,'2022-11-02 00:56:42','2022-11-02 00:56:42'),
(6,'Terms & Conditions',1,'2022-11-02 00:57:19','2022-11-02 00:57:19'),
(7,'Sign up',0,'2022-11-02 00:57:39','2022-11-05 02:34:50'),
(8,'Sign in',1,'2022-11-02 00:57:48','2022-11-04 23:49:17'),
(9,'Testimonials',1,'2022-11-02 00:59:38','2022-11-02 00:59:38'),
(10,'Faq',1,'2022-11-02 00:59:48','2022-11-02 00:59:48'),
(11,'Portfolio',1,'2022-11-02 01:00:58','2022-11-03 03:03:31'),
(12,'Category',1,'2022-11-10 23:39:53','2022-11-10 23:39:53'),
(13,'Shop',1,'2022-11-10 23:40:29','2022-11-10 23:40:29');

/*Table structure for table `parent_categories` */

DROP TABLE IF EXISTS `parent_categories`;

CREATE TABLE `parent_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `parent_category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `parent_categories` */

insert  into `parent_categories`(`id`,`parent_category_name`,`slug`,`status`,`created_at`,`updated_at`) values 
(1,'Electronic Accessories','electronic-accessories',1,'2022-12-28 01:49:38','2022-12-30 22:36:25'),
(2,'Mobile Phone','mobile-phone',1,'2023-01-18 08:06:24','2023-01-18 08:06:24');

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `portfolios` */

DROP TABLE IF EXISTS `portfolios`;

CREATE TABLE `portfolios` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `portfolios` */

insert  into `portfolios`(`id`,`type`,`image`,`image_thumbnail`,`video`,`status`,`created_at`,`updated_at`) values 
(5,1,'1667319869.png','1667318978.jpg','1667319546.jpg',1,'2022-11-01 23:09:38','2022-11-04 03:50:20'),
(6,1,'1667576142.jpg','1667582735.jpg','1667502769.mp4',1,'2022-11-04 02:12:49','2022-11-05 00:25:35');

/*Table structure for table `privacy_policies` */

DROP TABLE IF EXISTS `privacy_policies`;

CREATE TABLE `privacy_policies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `privacy_policies` */

insert  into `privacy_policies`(`id`,`title`,`slug`,`description`,`created_at`,`updated_at`) values 
(1,'Privacy and Policy',NULL,'<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolor</p>','2022-11-02 03:28:44','2022-11-11 02:13:20');

/*Table structure for table `product_additional_attributes` */

DROP TABLE IF EXISTS `product_additional_attributes`;

CREATE TABLE `product_additional_attributes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_attribute_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attribute_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attribute` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `product_additional_attributes` */

insert  into `product_additional_attributes`(`id`,`product_attribute_id`,`attribute_id`,`attribute`,`created_at`,`updated_at`) values 
(1,'3','1','Red','2023-01-19 07:14:27','2023-01-19 07:14:27'),
(2,'3','2','Blue','2023-01-19 07:14:27','2023-01-19 07:14:27'),
(3,'4','4','Small','2023-01-19 07:14:27','2023-01-19 07:14:27'),
(4,'4','5','Medium','2023-01-19 07:14:27','2023-01-19 07:14:27');

/*Table structure for table `product_attributes` */

DROP TABLE IF EXISTS `product_attributes`;

CREATE TABLE `product_attributes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `variant_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `variant` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visible_product` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `used_for_variation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `product_attributes` */

insert  into `product_attributes`(`id`,`product_id`,`variant_id`,`variant`,`visible_product`,`used_for_variation`,`created_at`,`updated_at`) values 
(3,'1','2','Color','1','2','2023-01-19 07:14:27','2023-01-19 07:14:27'),
(4,'1','3','Size','1','2','2023-01-19 07:14:27','2023-01-19 07:14:27');

/*Table structure for table `product_variantions` */

DROP TABLE IF EXISTS `product_variantions`;

CREATE TABLE `product_variantions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `parent_category_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_category_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_category_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `define_product_variant_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_attribute_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_additional_attribute_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `variant_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `variant` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attribute_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attribute` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regular_price` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_price` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'customer save money',
  `discount_percent` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Save amount in percentage (%)	',
  `start_date` timestamp NULL DEFAULT NULL,
  `end_date` timestamp NULL DEFAULT NULL,
  `discount_status` tinyint(1) DEFAULT NULL,
  `quantity` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `length` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `width` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `height` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '(1) stock (2) Out of stock',
  `shipping` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `product_variantions` */

insert  into `product_variantions`(`id`,`parent_category_id`,`main_category_id`,`sub_category_id`,`product_id`,`define_product_variant_id`,`product_attribute_id`,`product_additional_attribute_id`,`variant_id`,`variant`,`attribute_id`,`attribute`,`image`,`regular_price`,`sale_price`,`discount`,`discount_percent`,`start_date`,`end_date`,`discount_status`,`quantity`,`sku`,`weight`,`length`,`width`,`height`,`stock`,`shipping`,`created_at`,`updated_at`) values 
(1,'2','2','1','1',NULL,NULL,NULL,NULL,NULL,'1,4','Red,Small','167408773796.png','795','526','269','33.84',NULL,NULL,1,'757','Obcaecati similique','Debitis enim ducimus','Blanditiis deserunt','Est eveniet volupt','Exercitationem dolor','1',NULL,'2023-01-19 07:15:24','2023-01-19 07:22:17'),
(2,'2','2','1','1',NULL,NULL,NULL,NULL,NULL,'1,5','Red,Medium','167408732439.png','386','174','212','54.92',NULL,NULL,1,'636','Sunt nihil ipsa rer','In quia est commodi','Aut quae id vitae ut','Molestiae quibusdam','Minus do labore eius','1',NULL,'2023-01-19 07:15:24','2023-01-19 07:22:17'),
(3,'2','2','1','1',NULL,NULL,NULL,NULL,NULL,'2,4','Blue,Small','167408732489.png','277','130','147','53.07',NULL,NULL,1,'77','Aut nihil excepteur','Sit nihil magnam ut','Nostrum et ipsum qui','Eveniet velit recu','Vel nesciunt iure d','1',NULL,'2023-01-19 07:15:24','2023-01-19 07:22:17'),
(4,'2','2','1','1',NULL,NULL,NULL,NULL,NULL,'2,5','Blue,Medium','167408732458.png','896','125','771','86.05',NULL,NULL,1,'751','Perspiciatis volupt','Consequatur qui aspe','Suscipit eveniet es','Voluptas fugit fugi','Sit sit ullam ut mo','1',NULL,'2023-01-19 07:15:24','2023-01-19 07:22:17');

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(1) simpele, (2) variable product',
  `parent_category_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_category_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_category_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_price` double DEFAULT NULL,
  `discounted_price` double DEFAULT NULL,
  `discount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'customer save money',
  `discount_percent` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Save amount in percentage (%)',
  `sale_start` timestamp NULL DEFAULT NULL,
  `sale_end` timestamp NULL DEFAULT NULL,
  `discount_status` tinyint(1) DEFAULT NULL COMMENT '(1) for discount active',
  `total_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_id` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `multiple_image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '(1) stock (2) Out of stock',
  `shipping` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `products` */

insert  into `products`(`id`,`product_type`,`parent_category_id`,`main_category_id`,`sub_category_id`,`product_name`,`slug`,`price`,`sale_price`,`discounted_price`,`discount`,`discount_percent`,`sale_start`,`sale_end`,`discount_status`,`total_price`,`brand_id`,`sku`,`tags`,`image`,`multiple_image`,`quantity`,`stock`,`shipping`,`status`,`short_description`,`description`,`created_at`,`updated_at`) values 
(1,'2','2','2','1','Athena Lancaster','athena-lancaster','724',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'724','2','Sed omnis rerum duci','[\"omnis\",\"vel\",\"sed\"]','1674087248.jpg',NULL,'151','1','8',1,'Numquam nulla volupt','<p>test</p>','2023-01-19 07:14:08','2023-01-19 07:26:18'),
(2,'1','1','1','6','Headphone','headphone','500',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'500','2','lotti-1234','[\"headphone\",\"bluetooth\"]','1674087373.webp',NULL,'9','1','2',1,'Short DescriptionShort Description','<p>Product Description Product DescriptionProduct DescriptionProduct DescriptionProduct Description</p>','2023-01-19 07:16:13','2023-01-19 20:51:50');

/*Table structure for table `reviews` */

DROP TABLE IF EXISTS `reviews`;

CREATE TABLE `reviews` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_variation_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reviews` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `reviews` */

/*Table structure for table `services` */

DROP TABLE IF EXISTS `services`;

CREATE TABLE `services` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `service_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `services` */

insert  into `services`(`id`,`service_name`,`created_at`,`updated_at`) values 
(1,'Logo Design','2022-11-01 05:36:04','2022-11-01 05:36:04'),
(2,'Animation','2022-11-01 05:36:25','2022-11-01 05:36:25'),
(3,'Website Design and Development','2022-11-01 05:36:37','2022-11-01 05:36:37');

/*Table structure for table `shipping_methods` */

DROP TABLE IF EXISTS `shipping_methods`;

CREATE TABLE `shipping_methods` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `shipping_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `shipping_methods` */

insert  into `shipping_methods`(`id`,`shipping_title`,`shipping_price`,`slug`,`status`,`created_at`,`updated_at`) values 
(1,'Flat rate','200','flat-rate',1,'2022-12-14 11:14:23','2022-12-14 11:14:23'),
(2,'Free shipping',NULL,'free-shipping',1,'2022-12-14 11:14:48','2022-12-14 20:06:52');

/*Table structure for table `shippings` */

DROP TABLE IF EXISTS `shippings`;

CREATE TABLE `shippings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `city_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_method_id` bigint(20) NOT NULL COMMENT '(1) Flat Rate(2) Free Shipping',
  `zone_name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_price` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_fee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `shippings` */

insert  into `shippings`(`id`,`city_id`,`shipping_method_id`,`zone_name`,`shipping_title`,`shipping_price`,`shipping_fee`,`status`,`created_at`,`updated_at`) values 
(1,NULL,1,'Flate Rate','Flat rate',NULL,'150',1,'2023-01-03 20:17:42','2023-01-09 17:58:15'),
(2,NULL,2,'Free Shipping','Free shipping',NULL,NULL,1,'2023-01-03 20:19:14','2023-01-03 20:19:14'),
(5,NULL,2,'Amelia Byrd','Free shipping',NULL,NULL,1,'2023-01-06 12:49:22','2023-01-06 12:49:48'),
(6,NULL,1,'Talon Beasley','Flat rate',NULL,'32',1,'2023-01-09 15:40:57','2023-01-09 15:40:57'),
(7,NULL,1,'Dillon Mcgowan','Flat rate',NULL,'90',1,'2023-01-09 17:54:32','2023-01-09 18:22:21'),
(8,NULL,1,'Dillon Mcgowan Jordior','Flat rate',NULL,'85',1,'2023-01-09 17:56:08','2023-01-09 17:56:08'),
(9,NULL,2,'Uzair','Free shipping',NULL,NULL,1,'2023-01-09 18:26:23','2023-01-09 18:26:23');

/*Table structure for table `socials` */

DROP TABLE IF EXISTS `socials`;

CREATE TABLE `socials` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `socials` */

insert  into `socials`(`id`,`facebook`,`twitter`,`instagram`,`youtube`,`linkedin`,`slug`,`created_at`,`updated_at`) values 
(5,'http://facebook.com','http://twitter.com','http://instagram.com',NULL,'http://linkedin.com',NULL,'2022-11-03 05:17:58','2022-11-03 05:17:58');

/*Table structure for table `states` */

DROP TABLE IF EXISTS `states`;

CREATE TABLE `states` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `states` */

insert  into `states`(`id`,`state`,`created_at`,`updated_at`) values 
(1,'Johor','2022-11-30 16:48:50','2022-11-30 16:48:50'),
(2,'Kedah','2022-11-30 16:50:58','2022-11-30 16:50:58'),
(3,'Kelantan','2022-11-30 16:51:51','2022-11-30 16:51:51'),
(4,'Melaka','2022-11-30 16:52:23','2022-11-30 16:52:23'),
(5,'Negeri Sembilan','2022-11-30 16:53:08','2022-11-30 16:53:08'),
(6,'Pahang','2022-11-30 16:53:25','2022-11-30 16:53:25'),
(7,'Perak','2022-11-30 16:53:45','2022-11-30 16:53:45'),
(8,'Perlis','2022-11-30 16:54:10','2022-11-30 16:54:10'),
(9,'Pulau Pinang','2022-11-30 16:54:29','2022-11-30 16:54:29'),
(10,'Sabah','2022-11-30 16:54:49','2022-11-30 16:54:49'),
(11,'Sarawak','2022-11-30 16:55:08','2022-11-30 16:55:08'),
(12,'Selangor','2022-11-30 16:55:30','2022-11-30 16:55:30'),
(13,'Terengganu','2022-11-30 16:55:55','2022-11-30 16:55:55'),
(14,'Wilayah Persekutuan','2022-11-30 16:56:20','2022-11-30 16:56:20');

/*Table structure for table `stocks` */

DROP TABLE IF EXISTS `stocks`;

CREATE TABLE `stocks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `stocks` */

/*Table structure for table `sub_categories` */

DROP TABLE IF EXISTS `sub_categories`;

CREATE TABLE `sub_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `parent_category_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_category_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `show_home` int(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sub_categories` */

insert  into `sub_categories`(`id`,`parent_category_id`,`main_category_id`,`sub_category_name`,`slug`,`image`,`status`,`show_home`,`created_at`,`updated_at`) values 
(1,'1','1','Powerbank & Speaker','powerbank-speaker',NULL,1,NULL,'2022-12-28 01:52:07','2022-12-28 01:52:07'),
(2,'1','1','Home Charger','home-charger',NULL,1,NULL,'2022-12-28 01:52:33','2022-12-28 01:52:33'),
(3,'1','1','Usb Cable','usb-cable',NULL,1,NULL,'2022-12-28 01:53:09','2022-12-28 01:53:09'),
(4,'1','1','Audio Cable','audio-cable',NULL,1,NULL,'2022-12-28 01:54:00','2022-12-28 01:54:00'),
(5,'1','1','Hub','hub',NULL,1,NULL,'2022-12-28 01:54:19','2022-12-28 01:54:19'),
(6,'1','1','Bluetooth Earphone','bluetooth-earphone',NULL,1,NULL,'2022-12-28 01:54:47','2022-12-28 01:54:47'),
(7,'2','2','Iphone 14 Pro Max','iphone-14-pro-max',NULL,1,NULL,'2023-01-18 08:07:42','2023-01-18 08:07:42'),
(8,'2','2','Iphone 13 Pro Max','iphone-13-pro-max',NULL,1,NULL,'2023-01-18 08:08:03','2023-01-18 08:08:03');

/*Table structure for table `subscriptions` */

DROP TABLE IF EXISTS `subscriptions`;

CREATE TABLE `subscriptions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `subscriptions` */

insert  into `subscriptions`(`id`,`email`,`status`,`created_at`,`updated_at`) values 
(32,'djoy62471@gmail.com',1,'2023-01-19 18:54:59','2023-01-19 18:54:59');

/*Table structure for table `terms_conditions` */

DROP TABLE IF EXISTS `terms_conditions`;

CREATE TABLE `terms_conditions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `terms_conditions` */

insert  into `terms_conditions`(`id`,`title`,`slug`,`description`,`created_at`,`updated_at`) values 
(1,'Terms and Conditions',NULL,'<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat</p><h3>1. Introduction</h3><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit&nbsp;</p>','2022-11-02 03:27:49','2022-11-17 04:29:34');

/*Table structure for table `testimonials` */

DROP TABLE IF EXISTS `testimonials`;

CREATE TABLE `testimonials` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `testimonials` */

insert  into `testimonials`(`id`,`name`,`image`,`short_description`,`long_description`,`status`,`created_at`,`updated_at`) values 
(2,'Freya Steele','1666729111.jpg','Sapiente dicta sed q','<p>wdqwerkebfkbfkbhg</p>',0,'2022-10-26 03:18:31','2022-11-04 23:47:55'),
(3,'Boris Barry','1666814435.jpg','testing testing','<p>aefwerfwerfwsedqa</p>',1,'2022-10-26 03:20:27','2022-11-08 23:56:25'),
(4,'Boris Barry','1667423137.jpg','Officiis debitis eiu','<p>aefwerfwerfwsedqa</p>',0,'2022-10-26 03:20:34','2022-11-04 23:47:52');

/*Table structure for table `user_addresses` */

DROP TABLE IF EXISTS `user_addresses`;

CREATE TABLE `user_addresses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `landmark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `village` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `default_shipping` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `default_billing` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_active_address` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_active_address` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_identifire` tinyint(1) DEFAULT NULL COMMENT '(1) active shipping address (2) active billing address',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `user_addresses` */

insert  into `user_addresses`(`id`,`user_id`,`name`,`address`,`contact`,`landmark`,`delivery_label`,`province`,`city`,`village`,`default_shipping`,`default_billing`,`shipping_active_address`,`billing_active_address`,`address_identifire`,`created_at`,`updated_at`) values 
(1,'3','Uma Wheeler','Repellendus Consequ','+1 (494) 934-7647','Autem eveniet simil','1','2','34',NULL,'1','2','1','2',1,'2023-01-19 20:35:39','2023-01-19 20:35:39');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_login` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `day` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_label` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `village` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `offers` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `profile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `default_shipping` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `default_billing` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `landmark` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`first_name`,`last_name`,`user_name`,`role`,`slug`,`social_login`,`contact`,`month`,`day`,`year`,`gender`,`address`,`province`,`delivery_label`,`city`,`village`,`offers`,`status`,`profile`,`default_shipping`,`default_billing`,`billing`,`landmark`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values 
(1,'Admin','admin@lotti.com',NULL,NULL,NULL,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'$2y$10$31W7x2S/s1I3iA.H.O2M0OEnRuDVjn3z1.HcbXWD5/KLB4itpwmSq',NULL,'2022-11-02 03:18:37','2022-11-02 03:18:37'),
(2,'Dominic Xavier','dominicxavier143@gmail.com','Dominic','Xavier',NULL,'2','',NULL,NULL,'02','01','1994','male',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'$2y$10$/AE2N1DtItYxGAERhnJL2OWdoAcy6N967P9tE6eLld7xrem3rRG3C',NULL,'2022-12-28 12:11:48','2022-12-28 12:11:48'),
(3,'David Joy','djoy62471@gmail.com','David','Joy',NULL,'2','',NULL,'03362047895','07','09','1998','male',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'$2y$10$Tw14rX7DdBVpsx8iU35rE.DUYJ9pAAMQMa7ce2.GEsYk1O6uuFTEi',NULL,'2022-12-28 16:30:52','2023-01-19 22:49:56'),
(6,'Tofique Ahmed','testingsoftware359@gmail.com','Tofique','Ahmed',NULL,'2','',NULL,NULL,'02','01','1999','male',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'$2y$10$jIIWP41d37apO6O7qhLQKejvxeh2bpuvIWySAvE7Cu/LOtIp3vMfm',NULL,'2022-12-30 20:54:46','2022-12-30 20:54:46'),
(7,'James Doe','iamjamesalbertt@gmail.com','James','Doe',NULL,'2','',NULL,NULL,'11','01','1997','male',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'$2y$10$QkWVYbbEgCg59B0KCalt9.1rJ6.w3sP0O485nmCBAWAsFIhI1t8Du',NULL,'2023-01-03 16:35:08','2023-01-03 16:35:08');

/*Table structure for table `variants` */

DROP TABLE IF EXISTS `variants`;

CREATE TABLE `variants` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `variant` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `variants` */

insert  into `variants`(`id`,`variant`,`slug`,`status`,`created_at`,`updated_at`) values 
(1,'Custom product attribute','custom-product-attribute','1','2022-12-27 20:32:06','2022-12-27 20:32:06'),
(2,'Color','color','1','2022-12-28 09:25:28','2022-12-28 09:25:28'),
(3,'Size','size','1','2022-12-28 09:25:37','2022-12-28 09:25:37'),
(4,'Processor','processor','1','2023-01-18 23:09:41','2023-01-18 23:09:41');

/*Table structure for table `wishlists` */

DROP TABLE IF EXISTS `wishlists`;

CREATE TABLE `wishlists` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_variation_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `wishlists` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
