-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2019 at 12:45 PM
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
  `formula_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revision` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` datetime NOT NULL,
  `is_softgel` tinyint(1) NOT NULL DEFAULT '0',
  `is_tablet` tinyint(1) NOT NULL DEFAULT '0',
  `is_hardcapsule` tinyint(1) NOT NULL DEFAULT '0',
  `size_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color_logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `filling_wt` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` double NOT NULL DEFAULT '0',
  `create_by` int(11) DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customrequest`
--

INSERT INTO `customrequest` (`id`, `ipd`, `product`, `customer`, `address`, `manufature_id`, `formula_number`, `revision`, `date`, `is_softgel`, `is_tablet`, `is_hardcapsule`, `size_type`, `color_logo`, `filling_wt`, `order`, `create_by`, `update_by`, `created_at`, `updated_at`) VALUES
(7, '123', '1', '16', '213 USA', 1, '123', '123', '2019-07-22 00:00:00', 1, 1, 0, '123', '312', '123', 312, 2, NULL, '2019-07-21 21:55:27', '2019-07-21 21:55:27'),
(8, '123', 'AAAA', 'BBBB', 'bbbbbb', 1, '123', '123', '2019-07-31 00:00:00', 1, 0, 1, '1', 'blue', '12', 123, NULL, NULL, '2019-07-31 03:13:47', '2019-07-31 03:13:47'),
(9, '123', 'GGGG', 'BBBB', 'TTTT', 3, '123', '12', '2019-07-31 00:00:00', 1, 1, 0, '123', 'blue', 'ads', 1, NULL, NULL, '2019-07-31 05:39:44', '2019-07-31 05:39:44');

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
(1, 'RG01-01J', 'Red Ginseng Extract', 0, 0, 1, 2, 2, '2019-07-12 17:46:41', '2019-07-31 02:43:29'),
(2, 'PG01-01J', 'Panax Ginseng 80% Extract', 0, 0, 1, 2, 2, '2019-07-12 17:47:03', '2019-07-31 02:43:36'),
(3, 'FO01-AR01', 'Marine Oil (30% omega 3 DHA/EPA)', 1, 0, 1, 2, 2, '2019-07-12 17:49:01', '2019-07-31 02:41:38'),
(4, 'LC01-WC01', 'Lecithin', 3, 0, 1, 2, 2, '2019-07-12 17:49:21', '2019-07-31 02:39:02'),
(5, 'BW01-CS01', 'Beewax', 2, 0, 1, 2, 2, '2019-07-12 17:49:34', '2019-07-31 02:38:50');

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
(4, 7, '3', '2019-07-21 21:55:27', '2019-07-21 21:55:27'),
(5, 7, '1', '2019-07-21 21:55:27', '2019-07-21 21:55:27'),
(6, 9, 'aaaa', '2019-07-31 05:39:44', '2019-07-31 05:39:44'),
(7, 9, 'ddddd', '2019-07-31 05:39:44', '2019-07-31 05:39:44'),
(8, 9, 'rrtttt', '2019-07-31 05:39:45', '2019-07-31 05:39:45');

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
(4, 7, 2, 4.1, '2019-07-21 21:55:27', '2019-07-21 21:55:27'),
(5, 7, 1, 5.1, '2019-07-21 21:55:27', '2019-07-21 21:55:27'),
(6, 8, 5, 7.1, '2019-07-31 03:13:47', '2019-07-31 03:13:47'),
(7, 8, 4, 10.1, '2019-07-31 03:13:47', '2019-07-31 03:13:47'),
(8, 8, 1, 0, '2019-07-31 03:13:47', '2019-07-31 03:13:47'),
(9, 8, 3, 0, '2019-07-31 03:13:47', '2019-07-31 03:13:47'),
(10, 9, 5, 3.1, '2019-07-31 05:39:44', '2019-07-31 05:39:44'),
(11, 9, 4, 1.1, '2019-07-31 05:39:44', '2019-07-31 05:39:44'),
(12, 9, 2, 4.1, '2019-07-31 05:39:44', '2019-07-31 05:39:44'),
(13, 9, 3, 3.1, '2019-07-31 05:39:44', '2019-07-31 05:39:44');

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
(2, 'admin', 'Administrator', 'admin', '', '$2y$10$MIHVJlIWk..BOS2ydunxUe551ThekH1pe0Ohr6.PFldLpFp1YqSce', 1, 0, 1, 0, 0, 'DnsEakZzQWk9QlBJsQgeBg5L7tuDThTvsoyw2eIRcb52T0dcdn81AnfilydF', '2019-07-24 12:43:54', '2019-07-24 12:43:54'),
(3, 'user', 'Do Truong Hai', 'haidt', '', '$2y$10$IeXouVhzd3oziu3TLJLMMO.po.dwWLp2Fc7afOIS5j8rsjlYvjFqu', 1, 0, 0, 0, 0, 'TMSCyZ4H8rB2kbChApNQgqsJLMOhUP6GFWnCd7HRBUSDAb8JqYgTfaysvawx', '2019-07-24 12:43:54', '2019-07-24 12:43:54');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `customrequest`
--
ALTER TABLE `customrequest`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `formula`
--
ALTER TABLE `formula`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ingredient`
--
ALTER TABLE `ingredient`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `manufature`
--
ALTER TABLE `manufature`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `salesorder_comments`
--
ALTER TABLE `salesorder_comments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `salesorder_ingredients`
--
ALTER TABLE `salesorder_ingredients`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
