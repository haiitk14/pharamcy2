-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2019 at 02:20 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharamcy`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  `is_using` tinyint(1) NOT NULL DEFAULT '1',
  `create_by` int(11) DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `content`, `is_delete`, `is_using`, `create_by`, `update_by`, `created_at`, `updated_at`) VALUES
(1, 'All raw materials provided by Pharmaxx', 0, 1, 2, NULL, '2019-07-12 17:51:29', '2019-07-12 17:51:29'),
(2, 'Softgel Encapsulation by Pharmaxx', 0, 1, 2, NULL, '2019-07-12 17:51:40', '2019-07-12 17:51:40'),
(3, 'Lead time: 6-8 weeks. After AW approved (FOS..)', 0, 1, 2, NULL, '2019-07-12 17:51:50', '2019-07-12 17:51:50'),
(4, 'Packaging:  Box of 60 softgels', 0, 1, 2, NULL, '2019-07-12 17:51:58', '2019-07-12 17:51:58'),
(5, 'FOB Murrieta , CA', 0, 1, 2, NULL, '2019-07-12 17:52:06', '2019-07-12 17:52:06'),
(6, 'Price quote good for 14 days.', 0, 1, 2, NULL, '2019-07-12 17:52:17', '2019-07-12 17:52:17');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  `is_using` tinyint(1) NOT NULL DEFAULT '1',
  `create_by` int(11) DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `code`, `full_name`, `phone`, `address`, `is_delete`, `is_using`, `create_by`, `update_by`, `created_at`, `updated_at`) VALUES
(15, '001', 'ExxelUSA', '035 260 8118', 'thangvnnc@gmail.com', 0, 1, 2, NULL, '2019-07-12 17:09:07', '2019-07-12 17:09:07'),
(16, '002', 'ExxelVN', '035 260 8118', NULL, 0, 1, 2, NULL, '2019-07-12 17:09:25', '2019-07-12 17:09:25'),
(17, '003', 'ExxelRussia', '0909 009 009', 'thangitk14@gmail.com', 0, 1, 2, NULL, '2019-07-12 17:09:56', '2019-07-12 17:09:56');

-- --------------------------------------------------------

--
-- Table structure for table `customrequest`
--

CREATE TABLE `customrequest` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ipd` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manufature_id` int(11) DEFAULT NULL,
  `po` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `formula_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revision` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` datetime NOT NULL,
  `is_softgel` tinyint(1) NOT NULL DEFAULT '0',
  `is_tablet` tinyint(1) NOT NULL DEFAULT '0',
  `is_hardcapsule` tinyint(1) NOT NULL DEFAULT '0',
  `size_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color_logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serving_size` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `filling_wt` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `box` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `carton` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customrequest`
--

INSERT INTO `customrequest` (`id`, `ipd`, `product`, `customer`, `address`, `manufature_id`, `po`, `formula_number`, `revision`, `date`, `is_softgel`, `is_tablet`, `is_hardcapsule`, `size_type`, `color_logo`, `serving_size`, `filling_wt`, `order`, `box`, `carton`, `create_by`, `update_by`, `created_at`, `updated_at`) VALUES
(18, 'aaa', 'AAAA', 'BBBB', 'aaaa', 1, '123', '333', '1', '2019-08-13 00:00:00', 1, 1, 0, '1', 'Red', '2', NULL, '4', '5', '6', NULL, NULL, '2019-08-13 16:29:09', '2019-08-13 16:29:09');

-- --------------------------------------------------------

--
-- Table structure for table `formula`
--

CREATE TABLE `formula` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  `is_using` tinyint(1) NOT NULL DEFAULT '1',
  `create_by` int(11) DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `formula`
--

INSERT INTO `formula` (`id`, `name`, `content`, `is_delete`, `is_using`, `create_by`, `update_by`, `created_at`, `updated_at`) VALUES
(1, 'RG01', 'H2S + HCL', 0, 1, 2, NULL, '2019-07-12 17:30:14', '2019-07-12 17:30:14');

-- --------------------------------------------------------

--
-- Table structure for table `formula_ingredients`
--

CREATE TABLE `formula_ingredients` (
  `id` bigint(20) NOT NULL,
  `reportformula_id` bigint(20) NOT NULL,
  `ingredient_id` bigint(20) NOT NULL,
  `code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ingredient` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inactive` tinyint(4) DEFAULT NULL,
  `per_serving` decimal(10,2) DEFAULT '0.00',
  `per_unit` decimal(10,2) NOT NULL DEFAULT '0.00',
  `purity` decimal(10,2) NOT NULL DEFAULT '0.00',
  `overage` decimal(10,2) NOT NULL DEFAULT '0.00',
  `per_tab` decimal(10,2) NOT NULL DEFAULT '0.00',
  `per_batch` decimal(10,4) NOT NULL DEFAULT '0.0000',
  `tab100` decimal(10,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `formula_ingredients`
--

INSERT INTO `formula_ingredients` (`id`, `reportformula_id`, `ingredient_id`, `code`, `name_ingredient`, `inactive`, `per_serving`, `per_unit`, `purity`, `overage`, `per_tab`, `per_batch`, `tab100`, `created_at`, `updated_at`) VALUES
(11, 5, 1, 'RG01-01J', 'Red Ginseng Extract', 0, '10.00', '10.00', '20.00', '100.00', '100.00', '66.7000', '0.82', '2019-08-13 16:30:55', '2019-08-13 16:30:55'),
(12, 5, 3, 'FO01-AR01', 'Marine Oil (30% omega 3 DHA/EPA)', 0, '20.00', '20.00', '30.00', '1.00', '67.33', '12.5000', '0.55', '2019-08-13 16:30:55', '2019-08-13 16:30:55'),
(13, 5, 2, 'PG01-01J', 'Panax Ginseng 80% Extract', 0, '30.00', '30.00', '22.00', '22.00', '166.36', '33.0000', '1.37', '2019-08-13 16:30:55', '2019-08-13 16:30:55'),
(14, 5, 4, 'LC01-WC01', 'Lecithin', 1, '212.00', '212.00', '22.00', '22.00', '1175.64', '0.0047', '9.67', '2019-08-13 16:30:55', '2019-08-13 16:30:55'),
(15, 5, 5, 'BW01-CS01', 'Beewax', 1, '213.00', '213.00', '2.00', '22.00', '12993.00', '0.0520', '106.86', '2019-08-13 16:30:55', '2019-08-13 16:30:55'),
(16, 5, 11, NULL, 'Titanium DiOxide (TiO2) FCC', 2, '4.00', '4.00', '100.00', '3.00', '4.12', '12.4000', '0.03', '2019-08-13 16:30:55', '2019-08-13 16:30:55'),
(17, 5, 12, NULL, 'Glycerin USP/FCC', 2, '3.00', '3.00', '100.00', '3.00', '3.09', '12.5000', '0.02', '2019-08-13 16:30:55', '2019-08-13 16:30:55'),
(18, 5, 13, NULL, 'FD&C Color Blue', 2, '3.00', '3.00', '100.00', '3.00', '3.09', '32.3000', '0.02', '2019-08-13 16:30:55', '2019-08-13 16:30:55'),
(19, 5, 15, NULL, 'FD&C Color Yellow', 2, '3.00', '3.00', '100.00', '3.00', '3.09', '12.5000', '0.02', '2019-08-13 16:30:55', '2019-08-13 16:30:55'),
(20, 5, 20, NULL, 'Purified   Water', 2, '444.00', '444.00', '100.00', '0.00', '444.00', '0.0018', '3.06', '2019-08-13 16:30:55', '2019-08-13 16:30:55'),
(21, 5, 16, NULL, 'Purified  Water', 3, '0.00', '0.00', '0.00', '0.00', '0.00', '45.6600', '0.00', '2019-08-13 16:30:55', '2019-08-13 16:30:55'),
(22, 5, 18, NULL, 'Glycerine 99.5% USP', 3, '0.00', '0.00', '0.00', '0.00', '0.00', '10.0000', '0.00', '2019-08-13 16:30:55', '2019-08-13 16:30:55'),
(23, 5, 19, NULL, 'Sorbitol 99.5% USP', 3, '0.00', '0.00', '0.00', '0.00', '0.00', '23.7700', '0.00', '2019-08-13 16:30:55', '2019-08-13 16:30:55');

-- --------------------------------------------------------

--
-- Table structure for table `ingredient`
--

CREATE TABLE `ingredient` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inactive` tinyint(1) NOT NULL DEFAULT '0',
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  `is_using` tinyint(1) NOT NULL DEFAULT '1',
  `create_by` int(11) DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ingredient`
--

INSERT INTO `ingredient` (`id`, `code`, `name`, `inactive`, `is_delete`, `is_using`, `create_by`, `update_by`, `created_at`, `updated_at`) VALUES
(1, 'RG01-01J', 'Red Ginseng Extract', 0, 0, 1, NULL, NULL, '2019-07-12 17:46:41', '2019-08-10 11:15:06'),
(2, 'PG01-01J', 'Panax Ginseng 80% Extract', 0, 0, 1, NULL, NULL, '2019-07-12 17:47:03', '2019-08-10 11:15:12'),
(3, 'FO01-AR01', 'Marine Oil (30% omega 3 DHA/EPA)', 0, 0, 1, NULL, NULL, '2019-07-12 17:49:01', '2019-07-23 15:21:27'),
(4, 'LC01-WC01', 'Lecithin', 1, 0, 1, NULL, NULL, '2019-07-12 17:49:21', '2019-08-10 11:16:43'),
(5, 'BW01-CS01', 'Beewax', 1, 0, 1, NULL, NULL, '2019-07-12 17:49:34', '2019-07-23 15:21:54'),
(6, '10', 'Ginkgo', 0, 0, 1, NULL, NULL, '2019-08-02 06:03:44', '2019-08-02 06:03:44'),
(9, NULL, 'Resveratrol 98% Extract', 0, 0, 1, NULL, NULL, '2019-08-10 11:15:35', '2019-08-10 11:15:35'),
(10, NULL, 'Vitamin K (MK7)', 0, 0, 1, NULL, NULL, '2019-08-10 11:16:04', '2019-08-10 11:16:04'),
(11, NULL, 'Titanium DiOxide (TiO2) FCC', 2, 0, 1, NULL, NULL, '2019-08-10 11:25:33', '2019-08-10 11:25:33'),
(12, NULL, 'Glycerin USP/FCC', 2, 0, 1, NULL, NULL, '2019-08-10 11:25:46', '2019-08-10 11:25:46'),
(13, NULL, 'FD&C Color Blue', 2, 0, 1, NULL, NULL, '2019-08-10 11:26:03', '2019-08-10 11:26:03'),
(14, NULL, 'FD&C Color Red', 2, 0, 1, NULL, NULL, '2019-08-10 11:26:14', '2019-08-10 11:26:14'),
(15, NULL, 'FD&C Color Yellow', 2, 0, 1, NULL, NULL, '2019-08-10 11:26:24', '2019-08-10 11:26:24'),
(16, NULL, 'Purified  Water', 3, 0, 1, NULL, NULL, '2019-08-10 11:26:38', '2019-08-10 11:29:18'),
(17, NULL, 'Gelatine 200B T-B 400MSH (Food Grade)', 3, 0, 1, NULL, NULL, '2019-08-10 11:27:09', '2019-08-10 11:27:09'),
(18, NULL, 'Glycerine 99.5% USP', 3, 0, 1, NULL, NULL, '2019-08-10 11:27:22', '2019-08-10 11:27:22'),
(19, NULL, 'Sorbitol 99.5% USP', 3, 0, 1, NULL, NULL, '2019-08-10 11:27:32', '2019-08-10 11:27:32'),
(20, NULL, 'Purified   Water', 2, 0, 1, NULL, NULL, '2019-08-10 11:33:07', '2019-08-10 11:33:07');

-- --------------------------------------------------------

--
-- Table structure for table `manufature`
--

CREATE TABLE `manufature` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  `is_using` tinyint(1) NOT NULL DEFAULT '1',
  `create_by` int(11) DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manufature`
--

INSERT INTO `manufature` (`id`, `name`, `address`, `phone`, `is_delete`, `is_using`, `create_by`, `update_by`, `created_at`, `updated_at`) VALUES
(1, 'Pharmaxx (tick)', '30590 Cochise Circle, Murrieta, CA 92563', '035 260 8111', 0, 1, 2, NULL, '2019-07-12 17:28:49', '2019-07-19 12:45:22'),
(2, 'Exxelife (tick)', '30590 Cochise Circle, Murrieta, CA 92563', '031 250 7007', 0, 1, 2, NULL, '2019-07-12 17:29:28', '2019-07-19 12:45:30'),
(3, 'IPD (Ampharco USA)', '30590 Cochise Circle, Murrieta, CA 92563', '+95100008101', 0, 1, 2, NULL, '2019-07-19 12:24:11', '2019-07-19 12:45:43');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(3, '2019_07_09_144556_create_roles_table', 1),
(46, '2019_07_20_222003_create_customrequest_table', 3),
(49, '2014_10_12_000000_create_users_table', 4),
(50, '2014_10_12_100000_create_password_resets_table', 4),
(51, '2019_07_09_145518_create_role_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  `is_using` tinyint(1) NOT NULL DEFAULT '1',
  `create_by` int(11) DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `code`, `is_delete`, `is_using`, `create_by`, `update_by`, `created_at`, `updated_at`) VALUES
(1, 'RG III 8%Royal Ginsen', '001', 0, 1, 2, NULL, '2019-07-12 17:10:32', '2019-07-12 17:10:32'),
(2, 'RG III 20%Royal Ginsen', '002', 0, 1, 2, NULL, '2019-07-12 17:11:09', '2019-07-12 17:11:09'),
(3, 'Ginkgobiloba', '003', 0, 1, 2, NULL, '2019-07-19 12:22:58', '2019-07-19 12:22:58');

-- --------------------------------------------------------

--
-- Table structure for table `reportformula`
--

CREATE TABLE `reportformula` (
  `id` bigint(20) NOT NULL,
  `customrequest_id` bigint(20) NOT NULL,
  `po` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `filling_wt` decimal(10,2) DEFAULT '0.00',
  `serving_size` double DEFAULT NULL,
  `gelatin_batch` double DEFAULT NULL,
  `create_by` bigint(20) DEFAULT NULL,
  `update_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reportformula`
--

INSERT INTO `reportformula` (`id`, `customrequest_id`, `po`, `filling_wt`, `serving_size`, `gelatin_batch`, `create_by`, `update_by`, `created_at`, `updated_at`) VALUES
(5, 18, NULL, '14502.33', 1, 2, NULL, NULL, '2019-08-13 16:30:55', '2019-08-13 16:30:55');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `code`, `name`, `created_at`, `updated_at`) VALUES
(1, 'super-admin', 'Supper Administrator', '2019-07-24 12:43:54', '2019-07-24 12:43:54'),
(2, 'admin', 'Administrator', '2019-07-24 12:43:54', '2019-07-24 12:43:54'),
(3, 'user', 'User', '2019-07-24 12:43:54', '2019-07-24 12:43:54');

-- --------------------------------------------------------

--
-- Table structure for table `salesorder_comments`
--

CREATE TABLE `salesorder_comments` (
  `id` bigint(20) NOT NULL,
  `customrequest_id` int(11) NOT NULL,
  `comment` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salesorder_comments`
--

INSERT INTO `salesorder_comments` (`id`, `customrequest_id`, `comment`, `created_at`, `updated_at`) VALUES
(29, 18, 'aaa', '2019-08-13 16:29:09', '2019-08-13 16:29:09'),
(30, 18, 'bbb', '2019-08-13 16:29:09', '2019-08-13 16:29:09'),
(31, 18, 'ccc', '2019-08-13 16:29:09', '2019-08-13 16:29:09');

-- --------------------------------------------------------

--
-- Table structure for table `salesorder_ingredients`
--

CREATE TABLE `salesorder_ingredients` (
  `id` bigint(20) NOT NULL,
  `customrequest_id` int(11) NOT NULL,
  `ingredient_id` int(11) NOT NULL,
  `per_serving` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salesorder_ingredients`
--

INSERT INTO `salesorder_ingredients` (`id`, `customrequest_id`, `ingredient_id`, `per_serving`, `created_at`, `updated_at`) VALUES
(40, 18, 11, 0, '2019-08-13 16:29:09', '2019-08-13 16:29:09'),
(41, 18, 12, 0, '2019-08-13 16:29:09', '2019-08-13 16:29:09'),
(42, 18, 13, 0, '2019-08-13 16:29:09', '2019-08-13 16:29:09'),
(43, 18, 15, 0, '2019-08-13 16:29:09', '2019-08-13 16:29:09'),
(44, 18, 20, 0, '2019-08-13 16:29:09', '2019-08-13 16:29:09'),
(45, 18, 16, 0, '2019-08-13 16:29:09', '2019-08-13 16:29:09'),
(46, 18, 18, 0, '2019-08-13 16:29:09', '2019-08-13 16:29:09'),
(47, 18, 19, 0, '2019-08-13 16:29:09', '2019-08-13 16:29:09'),
(48, 18, 1, 0, '2019-08-13 16:29:09', '2019-08-13 16:29:09'),
(49, 18, 3, 0, '2019-08-13 16:29:09', '2019-08-13 16:29:09'),
(50, 18, 2, 0, '2019-08-13 16:29:09', '2019-08-13 16:29:09'),
(51, 18, 4, 0, '2019-08-13 16:29:09', '2019-08-13 16:29:09'),
(52, 18, 5, 0, '2019-08-13 16:29:09', '2019-08-13 16:29:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `roles_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `is_delete` tinyint(4) NOT NULL DEFAULT '0',
  `is_admin` tinyint(4) NOT NULL DEFAULT '0',
  `is_superadmin` tinyint(4) NOT NULL DEFAULT '0',
  `is_user` tinyint(4) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `roles_code`, `name`, `username`, `email`, `password`, `is_active`, `is_delete`, `is_admin`, `is_superadmin`, `is_user`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'super-admin', 'Super Administrator', 'superadmin', '', '$2y$10$28.VNVdzTnUG9zEaXIvbKODjlwCtD1Dpo7l7JkqNmsKssIEneZQda', 1, 0, 0, 1, 0, 'kiYVDdwCknBNmjA5xGHXlQgFOLRByRwPH8LqYdUaT0UCOlO14qIcpUab5KuQ', '2019-07-24 12:43:54', '2019-07-24 12:43:54'),
(2, 'admin', 'Administrator', 'admin', '', '$2y$12$SbpnZF8MxMxlwSMylkE6PejwlsorPeHf.rETd1QdrYi40ZIRC2yQK', 1, 0, 1, 0, 0, 'uxH5ebDrYU38uN6BCI8lNIcVt33LQmvGZEpPeHgvty4WAyH5q5000SCfcrKp', '2019-07-24 12:43:54', '2019-07-24 12:43:54'),
(3, 'user', 'Do Truong Hai', 'haidt', '', '$2y$10$IeXouVhzd3oziu3TLJLMMO.po.dwWLp2Fc7afOIS5j8rsjlYvjFqu', 1, 0, 0, 0, 0, '2nMnLNTI6FvXcS3kyOXfppmxopKzw0lxwoWp9krRgBh8ZAIqBPSfCxOzBLlf', '2019-07-24 12:43:54', '2019-07-24 12:43:54'),
(4, 'user', 'Thang', 'thangtp', NULL, '$2y$10$f4.IrmRwEgsH3D.xNV5bBexZeeziLIjP8K0wJNkmO3V9.MCS34yLC', 1, 0, 0, 0, 1, NULL, '2019-08-09 17:37:05', '2019-08-09 17:37:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customrequest`
--
ALTER TABLE `customrequest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `formula`
--
ALTER TABLE `formula`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `formula_ingredients`
--
ALTER TABLE `formula_ingredients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ingredient`
--
ALTER TABLE `ingredient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manufature`
--
ALTER TABLE `manufature`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reportformula`
--
ALTER TABLE `reportformula`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salesorder_comments`
--
ALTER TABLE `salesorder_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salesorder_ingredients`
--
ALTER TABLE `salesorder_ingredients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `customrequest`
--
ALTER TABLE `customrequest`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `formula`
--
ALTER TABLE `formula`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `formula_ingredients`
--
ALTER TABLE `formula_ingredients`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `ingredient`
--
ALTER TABLE `ingredient`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `manufature`
--
ALTER TABLE `manufature`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reportformula`
--
ALTER TABLE `reportformula`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `salesorder_comments`
--
ALTER TABLE `salesorder_comments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `salesorder_ingredients`
--
ALTER TABLE `salesorder_ingredients`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
