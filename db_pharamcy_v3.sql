-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 22, 2019 at 12:19 PM
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
-- Database: `zadmin_sale`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inactive` tinyint(1) NOT NULL DEFAULT '0',
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

INSERT INTO `comment` (`id`, `content`, `inactive`, `is_delete`, `is_using`, `create_by`, `update_by`, `created_at`, `updated_at`) VALUES
(1, 'All raw materials provided by Pharmaxx', 0, 0, 1, NULL, NULL, '2019-07-13 00:51:29', '2019-07-13 00:51:29'),
(2, 'Softgel Encapsulation by Pharmaxx', 0, 0, 1, NULL, NULL, '2019-07-13 00:51:40', '2019-07-13 00:51:40'),
(3, 'Lead time: 6-8 weeks. After AW approved (FOS..)', 0, 0, 1, NULL, NULL, '2019-07-13 00:51:50', '2019-07-13 00:51:50'),
(4, 'Packaging:  Box of 60 softgels', 0, 0, 1, NULL, NULL, '2019-07-13 00:51:58', '2019-07-13 00:51:58'),
(5, 'FOB Murrieta , CA', 0, 0, 1, NULL, NULL, '2019-07-13 00:52:06', '2019-07-13 00:52:06'),
(6, 'Price quote good for 14 days.', 0, 0, 1, NULL, NULL, '2019-07-13 00:52:17', '2019-07-13 00:52:17');

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
(15, '001', 'ExxelUSA', '035 260 8118', 'thangvnnc@gmail.com', 0, 1, NULL, NULL, '2019-07-13 00:09:07', '2019-07-13 00:09:07'),
(16, '002', 'ExxelVN', '035 260 8118', NULL, 0, 1, NULL, NULL, '2019-07-13 00:09:25', '2019-07-13 00:09:25'),
(17, '003', 'ExxelRussia', '0909 009 009', 'thangitk14@gmail.com', 0, 1, NULL, NULL, '2019-07-13 00:09:56', '2019-07-13 00:09:56');

-- --------------------------------------------------------

--
-- Table structure for table `customrequest`
--

CREATE TABLE `customrequest` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ipd` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
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
  `order` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_by` int(11) DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customrequest`
--

INSERT INTO `customrequest` (`id`, `ipd`, `product_id`, `customer_id`, `address`, `manufature_id`, `formula_number`, `revision`, `date`, `is_softgel`, `is_tablet`, `is_hardcapsule`, `size_type`, `color_logo`, `filling_wt`, `order`, `create_by`, `update_by`, `created_at`, `updated_at`) VALUES
(7, '123', 1, 16, '213 USA', 1, '123', '123', '2019-07-22 00:00:00', 1, 1, 0, '123', '312', '123', '312', NULL, NULL, '2019-07-22 04:55:27', '2019-07-22 04:55:27');

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
(1, 'RG01', 'H2S + HCL', 0, 1, NULL, NULL, '2019-07-13 00:30:14', '2019-07-13 00:30:14');

-- --------------------------------------------------------

--
-- Table structure for table `ingredient`
--

CREATE TABLE `ingredient` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `per_serving` double DEFAULT NULL,
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

INSERT INTO `ingredient` (`id`, `name`, `per_serving`, `inactive`, `is_delete`, `is_using`, `create_by`, `update_by`, `created_at`, `updated_at`) VALUES
(1, 'Red Ginseng Extract', 50, 1, 0, 1, NULL, NULL, '2019-07-13 00:46:41', '2019-07-17 18:35:16'),
(2, 'Panax Ginseng 80% Extract', 700, 0, 0, 1, NULL, NULL, '2019-07-13 00:47:03', '2019-07-13 00:47:15'),
(3, 'Marine Oil (30% omega 3 DHA/EPA)', 1000, 0, 0, 1, NULL, NULL, '2019-07-13 00:49:01', '2019-07-13 00:49:01'),
(4, 'Lecithin', 30, 1, 0, 1, NULL, NULL, '2019-07-13 00:49:21', '2019-07-13 00:49:21'),
(5, 'Beewax', 40, 1, 0, 1, NULL, NULL, '2019-07-13 00:49:34', '2019-07-13 00:49:34');

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
(1, 'Pharmaxx (tick)', '30590 Cochise Circle, Murrieta, CA 92563', '035 260 8111', 0, 1, NULL, NULL, '2019-07-13 00:28:49', '2019-07-19 19:45:22'),
(2, 'Exxelife (tick)', '30590 Cochise Circle, Murrieta, CA 92563', '031 250 7007', 0, 1, NULL, NULL, '2019-07-13 00:29:28', '2019-07-19 19:45:30'),
(3, 'IPD (Ampharco USA)', '30590 Cochise Circle, Murrieta, CA 92563', '+95100008101', 0, 1, NULL, NULL, '2019-07-19 19:24:11', '2019-07-19 19:45:43');

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
(4, '2014_10_12_000000_create_users_table', 2),
(5, '2014_10_12_100000_create_password_resets_table', 2),
(6, '2019_07_09_145518_create_role_table', 2),
(7, '2019_07_09_145819_create_customer_table', 2),
(8, '2019_07_09_145836_create_manufature_table', 2),
(9, '2019_07_09_145848_create_ingredient_table', 2),
(10, '2019_07_09_145859_create_formula_table', 2),
(11, '2019_07_09_145910_create_product_table', 2),
(12, '2019_07_09_145923_create_comment_table', 2),
(13, '2019_07_09_150044_create_user_table', 2);

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
  `inactive` tinyint(1) NOT NULL DEFAULT '0',
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

INSERT INTO `product` (`id`, `name`, `code`, `inactive`, `is_delete`, `is_using`, `create_by`, `update_by`, `created_at`, `updated_at`) VALUES
(1, 'RG III 8%Royal Ginsen', '001', 0, 0, 1, NULL, NULL, '2019-07-13 00:10:32', '2019-07-13 00:10:32'),
(2, 'RG III 20%Royal Ginsen', '002', 0, 0, 1, NULL, NULL, '2019-07-13 00:11:09', '2019-07-13 00:11:09'),
(3, 'Ginkgobiloba', '003', 0, 0, 1, NULL, NULL, '2019-07-19 19:22:58', '2019-07-19 19:22:58');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salesorder_comments`
--

CREATE TABLE `salesorder_comments` (
  `id` bigint(20) NOT NULL,
  `customrequest_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salesorder_comments`
--

INSERT INTO `salesorder_comments` (`id`, `customrequest_id`, `comment_id`, `created_at`, `updated_at`) VALUES
(4, 7, 3, '2019-07-22 04:55:27', '2019-07-22 04:55:27'),
(5, 7, 1, '2019-07-22 04:55:27', '2019-07-22 04:55:27');

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
(4, 7, 2, 4.1, '2019-07-22 04:55:27', '2019-07-22 04:55:27'),
(5, 7, 1, 5.1, '2019-07-22 04:55:27', '2019-07-22 04:55:27');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT '1',
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Indexes for table `role`
--
ALTER TABLE `role`
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
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_username_unique` (`username`),
  ADD UNIQUE KEY `user_email_unique` (`email`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `formula`
--
ALTER TABLE `formula`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ingredient`
--
ALTER TABLE `ingredient`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `manufature`
--
ALTER TABLE `manufature`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salesorder_comments`
--
ALTER TABLE `salesorder_comments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `salesorder_ingredients`
--
ALTER TABLE `salesorder_ingredients`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
