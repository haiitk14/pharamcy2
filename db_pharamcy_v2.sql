-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2019 at 05:39 AM
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
(1, 'ABCD', 0, 1, NULL, NULL, '2019-07-21 03:38:24', '2019-07-21 03:38:24'),
(2, 'EFTR', 0, 1, NULL, NULL, '2019-07-21 03:38:31', '2019-07-21 03:38:31'),
(3, 'UYTR', 0, 1, NULL, NULL, '2019-07-21 03:38:37', '2019-07-21 03:38:37'),
(4, 'BGTQ', 0, 1, NULL, NULL, '2019-07-21 03:38:43', '2019-07-21 03:38:43'),
(5, 'JUIK', 0, 1, NULL, NULL, '2019-07-21 03:38:49', '2019-07-21 03:38:49');

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
(1, 'c1', 'customer A', '0891231231', '123 Hoang Kiem', 0, 1, NULL, NULL, '2019-07-21 01:52:37', '2019-07-21 01:54:51'),
(2, 'c2', 'Customer B', '012332123', '13 Ly Tu Trong', 0, 1, NULL, NULL, '2019-07-21 01:53:08', '2019-07-21 01:53:08'),
(3, 'c3', 'cutomer C', '0812342121', '911 Bui Vien', 0, 1, NULL, NULL, '2019-07-21 01:53:34', '2019-07-21 01:53:34'),
(4, 'c4', 'customer D', '0301233322', '90 Ly Thuong Kiet', 0, 1, NULL, NULL, '2019-07-21 01:54:02', '2019-07-21 01:54:02'),
(5, 'c5', 'customer PP', '0712333221', '21 Con Rua', 0, 1, NULL, NULL, '2019-07-21 01:54:23', '2019-07-21 01:54:23');

-- --------------------------------------------------------

--
-- Table structure for table `customrequest`
--

CREATE TABLE `customrequest` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ipd` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manufature_id` int(11) NOT NULL,
  `formula_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revision` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `is_softgel` tinyint(1) NOT NULL DEFAULT '0',
  `is_tablet` tinyint(1) NOT NULL DEFAULT '0',
  `is_hardcapsule` tinyint(1) NOT NULL DEFAULT '0',
  `size_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color_logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filling_wt` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salesorder_ingredients_id` int(11) NOT NULL,
  `salesorder_comments_id` int(11) NOT NULL,
  `create_by` int(11) DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'Formula WEEE', 'A +B', 0, 1, NULL, NULL, '2019-07-21 03:37:46', '2019-07-21 03:37:46'),
(2, 'Formula TTT', 'D + I', 0, 1, NULL, NULL, '2019-07-21 03:37:58', '2019-07-21 03:37:58'),
(3, 'Formula IUI', 'U + H', 0, 1, NULL, NULL, '2019-07-21 03:38:13', '2019-07-21 03:38:13');

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
(1, 'i1', 'Ingredient AA', 1, 0, 1, NULL, NULL, '2019-07-21 02:32:41', '2019-07-21 02:32:41'),
(2, 'i2', 'Ingredient QWE', 1, 0, 1, NULL, NULL, '2019-07-21 03:36:26', '2019-07-21 03:36:26'),
(3, 'i3', 'Ingredient YYY', 1, 0, 1, NULL, NULL, '2019-07-21 03:36:42', '2019-07-21 03:36:42'),
(4, 'i4', 'Ingredient HHH', 1, 0, 1, NULL, NULL, '2019-07-21 03:36:55', '2019-07-21 03:36:55'),
(5, 'i5', 'Ingredient OOO', 1, 0, 1, NULL, NULL, '2019-07-21 03:37:04', '2019-07-21 03:37:04'),
(6, 'i6', 'Ingredient YYY', 0, 0, 1, NULL, NULL, '2019-07-21 03:37:24', '2019-07-21 03:37:24');

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
(1, 'manufature AAA', '321 Ton Ngo Khong', '01233332123', 0, 1, NULL, NULL, '2019-07-21 02:02:18', '2019-07-21 02:30:31'),
(2, 'manufature RRR', '1 Le Thanh Ton', '0123333321355', 0, 1, NULL, NULL, '2019-07-21 02:03:25', '2019-07-21 02:30:42'),
(3, 'Manufature 3', '45 Tan Nhon', '0967123123', 0, 1, NULL, NULL, '2019-07-21 02:29:36', '2019-07-21 02:30:54'),
(4, 'Manufature PO', '43 Tu Trong', '0123332111', 0, 1, NULL, NULL, '2019-07-21 02:29:57', '2019-07-21 02:31:05'),
(5, 'Manufature QWE', '89 Ton Trong Phong', '0123993939', 0, 1, NULL, NULL, '2019-07-21 02:31:41', '2019-07-21 02:31:41');

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
(30, '2014_10_12_000000_create_users_table', 2),
(31, '2014_10_12_100000_create_password_resets_table', 2),
(32, '2019_07_09_145518_create_role_table', 2),
(33, '2019_07_09_145819_create_customer_table', 2),
(34, '2019_07_09_145836_create_manufature_table', 2),
(35, '2019_07_09_145848_create_ingredient_table', 2),
(36, '2019_07_09_145859_create_formula_table', 2),
(43, '2019_07_09_145910_create_product_table', 3),
(44, '2019_07_09_145923_create_comment_table', 3),
(45, '2019_07_09_150044_create_user_table', 3),
(46, '2019_07_20_222003_create_customrequest_table', 3),
(47, '2019_07_20_224933_create_salesorderingredients_table', 3),
(48, '2019_07_20_225001_create_salesordercomments_table', 3);

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
(1, 'Product A', 'p1', 0, 1, NULL, NULL, '2019-07-21 02:28:39', '2019-07-21 02:28:39'),
(2, 'Product B', 'p2', 0, 1, NULL, NULL, '2019-07-21 02:28:47', '2019-07-21 02:28:47'),
(3, 'Product C', 'p3', 0, 1, NULL, NULL, '2019-07-21 02:28:54', '2019-07-21 02:28:54'),
(4, 'Product DD', 'p4', 0, 1, NULL, NULL, '2019-07-21 02:29:02', '2019-07-21 02:29:02'),
(5, 'Product PP', 'p5', 0, 1, NULL, NULL, '2019-07-21 02:29:14', '2019-07-21 02:29:14');

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
  `id` bigint(20) UNSIGNED NOT NULL,
  `custom_request_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salesorder_ingredients`
--

CREATE TABLE `salesorder_ingredients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `custom_request_id` int(11) NOT NULL,
  `ingredient_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customrequest`
--
ALTER TABLE `customrequest`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salesorder_ingredients`
--
ALTER TABLE `salesorder_ingredients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
