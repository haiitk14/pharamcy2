-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2019 at 02:23 AM
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
(1, 'All raw materials provided by Pharmaxx', 0, 1, NULL, NULL, '2019-07-13 00:51:29', '2019-07-13 00:51:29'),
(2, 'Softgel Encapsulation by Pharmaxx', 0, 1, NULL, NULL, '2019-07-13 00:51:40', '2019-07-13 00:51:40'),
(3, 'Lead time: 6-8 weeks. After AW approved (FOS..)', 0, 1, NULL, NULL, '2019-07-13 00:51:50', '2019-07-13 00:51:50'),
(4, 'Packaging:  Box of 60 softgels', 0, 1, NULL, NULL, '2019-07-13 00:51:58', '2019-07-13 00:51:58'),
(5, 'FOB Murrieta , CA', 0, 1, NULL, NULL, '2019-07-13 00:52:06', '2019-07-13 00:52:06'),
(6, 'Price quote good for 14 days.', 0, 1, NULL, NULL, '2019-07-13 00:52:17', '2019-07-13 00:52:17');

-- --------------------------------------------------------

--
-- Table structure for table `cost_hardcapsule`
--

CREATE TABLE `cost_hardcapsule` (
  `id` bigint(20) NOT NULL,
  `reportcost_id` bigint(20) DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `num1` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `num2` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `num3` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size_type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cost_hardcapsule`
--

INSERT INTO `cost_hardcapsule` (`id`, `reportcost_id`, `name`, `num1`, `num2`, `num3`, `size_type`, `created_at`, `updated_at`) VALUES
(2, 4, 'Name', '3', '4', '12', '18 Ob', '2019-08-15 06:28:31', '2019-08-15 06:28:31'),
(3, 5, 'Name', '3', '4', '12', '18 Ob', '2019-08-15 06:29:51', '2019-08-15 06:29:51'),
(4, 6, 'Name', '3', '4', '12', '18 Ob', '2019-08-16 00:18:06', '2019-08-16 00:18:06'),
(5, 7, 'Name', '1', '2', '2', NULL, '2019-09-11 03:15:00', '2019-09-11 03:15:00'),
(6, 8, 'Name', '1', '2', '2', NULL, '2019-09-11 03:15:03', '2019-09-11 03:15:03');

-- --------------------------------------------------------

--
-- Table structure for table `cost_ingredients`
--

CREATE TABLE `cost_ingredients` (
  `id` bigint(20) NOT NULL,
  `reportcost_id` bigint(20) DEFAULT NULL,
  `ingredient_id` bigint(20) DEFAULT NULL,
  `code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ingredient` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inactive` tinyint(4) DEFAULT NULL,
  `per_unit` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `per_batch` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_per_kg` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_per_batch` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reportformula_id` bigint(20) DEFAULT NULL,
  `create_by` bigint(20) DEFAULT NULL,
  `update_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cost_ingredients`
--

INSERT INTO `cost_ingredients` (`id`, `reportcost_id`, `ingredient_id`, `code`, `name_ingredient`, `inactive`, `per_unit`, `per_batch`, `price_per_kg`, `price_per_batch`, `reportformula_id`, `create_by`, `update_by`, `created_at`, `updated_at`) VALUES
(18, 4, 11, NULL, 'Titanium DiOxide (TiO2) FCC', 2, '5.51', '6.6100', '0', '0', 5, NULL, NULL, '2019-08-15 06:28:31', '2019-08-15 06:28:31'),
(19, 4, 12, NULL, 'Glycerin USP/FCC', 2, '0.00', '0.0000', '0', '0', 5, NULL, NULL, '2019-08-15 06:28:31', '2019-08-15 06:28:31'),
(20, 4, 13, NULL, 'FD&C Color Blue', 2, '3.49', '4.1900', '0', '0', 5, NULL, NULL, '2019-08-15 06:28:31', '2019-08-15 06:28:31'),
(21, 4, 14, NULL, 'FD&C Color Red', 2, '1.43', '1.7200', '0', '0', 5, NULL, NULL, '2019-08-15 06:28:31', '2019-08-15 06:28:31'),
(22, 4, 15, NULL, 'FD&C Color Yellow', 2, '0.60', '0.7200', '0', '0', 5, NULL, NULL, '2019-08-15 06:28:31', '2019-08-15 06:28:31'),
(23, 4, 20, NULL, 'Purified   Water', 2, '0.00', '0.0000', '0', '0', 5, NULL, NULL, '2019-08-15 06:28:31', '2019-08-15 06:28:31'),
(24, 4, 17, NULL, 'Gelatine 200B T-B 400MSH (Food Grade)', 3, '385.85', '463.0200', '0', '0', 5, NULL, NULL, '2019-08-15 06:28:31', '2019-08-15 06:28:31'),
(25, 4, 18, NULL, 'Glycerine 99.5% USP', 3, '110.24', '132.2900', '0', '0', 5, NULL, NULL, '2019-08-15 06:28:31', '2019-08-15 06:28:31'),
(26, 4, 19, NULL, 'Sorbitol 99.5% USP', 3, '5.51', '6.6100', '0', '0', 5, NULL, NULL, '2019-08-15 06:28:31', '2019-08-15 06:28:31'),
(27, 4, 16, NULL, 'Purified  Water', 3, '38.58', '46.3000', '0', '0', 5, NULL, NULL, '2019-08-15 06:28:31', '2019-08-15 06:28:31'),
(28, 4, 1, 'RG01-01J', 'Red Ginseng Extract', 0, '50.00', '63.0000', '0', '0', 5, NULL, NULL, '2019-08-15 06:28:31', '2019-08-15 06:28:31'),
(29, 4, 2, 'PG01-01J', 'Panax Ginseng 80% Extract', 0, '25.00', '30.0000', '0', '0', 5, NULL, NULL, '2019-08-15 06:28:31', '2019-08-15 06:28:31'),
(30, 4, 3, 'FO01-AR01', 'Marine Oil (30% omega 3 DHA/EPA)', 0, '250.00', '300.0000', '0', '0', 5, NULL, NULL, '2019-08-15 06:28:31', '2019-08-15 06:28:31'),
(31, 4, 9, NULL, 'Resveratrol 98% Extract', 0, '6.50', '7.8000', '0', '0', 5, NULL, NULL, '2019-08-15 06:28:31', '2019-08-15 06:28:31'),
(32, 4, 10, NULL, 'Vitamin K (MK7)', 0, '0.03', '2.3100', '1', '2.31', 5, NULL, NULL, '2019-08-15 06:28:31', '2019-08-15 06:28:31'),
(33, 4, 4, 'LC01-WC01', 'Lecithin', 1, '10.00', '12.0000', '0', '0', 5, NULL, NULL, '2019-08-15 06:28:31', '2019-08-15 06:28:31'),
(34, 4, 5, 'BW01-CS01', 'Beewax', 1, '30.00', '36.0000', '0', '0', 5, NULL, NULL, '2019-08-15 06:28:31', '2019-08-15 06:28:31'),
(35, 5, 11, NULL, 'Titanium DiOxide (TiO2) FCC', 2, '5.51', '6.6100', '0', '0', 5, NULL, NULL, '2019-08-15 06:29:51', '2019-08-15 06:29:51'),
(36, 5, 12, NULL, 'Glycerin USP/FCC', 2, '0.00', '0.0000', '0', '0', 5, NULL, NULL, '2019-08-15 06:29:51', '2019-08-15 06:29:51'),
(37, 5, 13, NULL, 'FD&C Color Blue', 2, '3.49', '4.1900', '0', '0', 5, NULL, NULL, '2019-08-15 06:29:51', '2019-08-15 06:29:51'),
(38, 5, 14, NULL, 'FD&C Color Red', 2, '1.43', '1.7200', '0', '0', 5, NULL, NULL, '2019-08-15 06:29:51', '2019-08-15 06:29:51'),
(39, 5, 15, NULL, 'FD&C Color Yellow', 2, '0.60', '0.7200', '0', '0', 5, NULL, NULL, '2019-08-15 06:29:51', '2019-08-15 06:29:51'),
(40, 5, 20, NULL, 'Purified   Water', 2, '0.00', '0.0000', '0', '0', 5, NULL, NULL, '2019-08-15 06:29:51', '2019-08-15 06:29:51'),
(41, 5, 17, NULL, 'Gelatine 200B T-B 400MSH (Food Grade)', 3, '385.85', '463.0200', '0', '0', 5, NULL, NULL, '2019-08-15 06:29:51', '2019-08-15 06:29:51'),
(42, 5, 18, NULL, 'Glycerine 99.5% USP', 3, '110.24', '132.2900', '0', '0', 5, NULL, NULL, '2019-08-15 06:29:51', '2019-08-15 06:29:51'),
(43, 5, 19, NULL, 'Sorbitol 99.5% USP', 3, '5.51', '6.6100', '0', '0', 5, NULL, NULL, '2019-08-15 06:29:51', '2019-08-15 06:29:51'),
(44, 5, 16, NULL, 'Purified  Water', 3, '38.58', '46.3000', '0', '0', 5, NULL, NULL, '2019-08-15 06:29:51', '2019-08-15 06:29:51'),
(45, 5, 1, 'RG01-01J', 'Red Ginseng Extract', 0, '50.00', '63.0000', '0', '0', 5, NULL, NULL, '2019-08-15 06:29:51', '2019-08-15 06:29:51'),
(46, 5, 2, 'PG01-01J', 'Panax Ginseng 80% Extract', 0, '25.00', '30.0000', '0', '0', 5, NULL, NULL, '2019-08-15 06:29:51', '2019-08-15 06:29:51'),
(47, 5, 3, 'FO01-AR01', 'Marine Oil (30% omega 3 DHA/EPA)', 0, '250.00', '300.0000', '0', '0', 5, NULL, NULL, '2019-08-15 06:29:51', '2019-08-15 06:29:51'),
(48, 5, 9, NULL, 'Resveratrol 98% Extract', 0, '6.50', '7.8000', '0', '0', 5, NULL, NULL, '2019-08-15 06:29:51', '2019-08-15 06:29:51'),
(49, 5, 10, NULL, 'Vitamin K (MK7)', 0, '0.03', '2.3100', '1', '2.31', 5, NULL, NULL, '2019-08-15 06:29:51', '2019-08-15 06:29:51'),
(50, 5, 4, 'LC01-WC01', 'Lecithin', 1, '10.00', '12.0000', '0', '0', 5, NULL, NULL, '2019-08-15 06:29:51', '2019-08-15 06:29:51'),
(51, 5, 5, 'BW01-CS01', 'Beewax', 1, '30.00', '36.0000', '0', '0', 5, NULL, NULL, '2019-08-15 06:29:51', '2019-08-15 06:29:51'),
(52, 6, 11, NULL, 'Titanium DiOxide (TiO2) FCC', 2, '5.51', '6.6100', '1', '6.61', 5, NULL, NULL, '2019-08-16 00:18:06', '2019-08-16 00:18:06'),
(53, 6, 12, NULL, 'Glycerin USP/FCC', 2, '0.00', '0.0000', '0', '0', 5, NULL, NULL, '2019-08-16 00:18:06', '2019-08-16 00:18:06'),
(54, 6, 13, NULL, 'FD&C Color Blue', 2, '3.49', '4.1900', '0', '0', 5, NULL, NULL, '2019-08-16 00:18:06', '2019-08-16 00:18:06'),
(55, 6, 14, NULL, 'FD&C Color Red', 2, '1.43', '1.7200', '0', '0', 5, NULL, NULL, '2019-08-16 00:18:06', '2019-08-16 00:18:06'),
(56, 6, 15, NULL, 'FD&C Color Yellow', 2, '0.60', '0.7200', '0', '0', 5, NULL, NULL, '2019-08-16 00:18:06', '2019-08-16 00:18:06'),
(57, 6, 20, NULL, 'Purified   Water', 2, '0.00', '0.0000', '0', '0', 5, NULL, NULL, '2019-08-16 00:18:06', '2019-08-16 00:18:06'),
(58, 6, 17, NULL, 'Gelatine 200B T-B 400MSH (Food Grade)', 3, '385.85', '463.0200', '0', '0', 5, NULL, NULL, '2019-08-16 00:18:06', '2019-08-16 00:18:06'),
(59, 6, 18, NULL, 'Glycerine 99.5% USP', 3, '110.24', '132.2900', '0', '0', 5, NULL, NULL, '2019-08-16 00:18:06', '2019-08-16 00:18:06'),
(60, 6, 19, NULL, 'Sorbitol 99.5% USP', 3, '5.51', '6.6100', '0', '0', 5, NULL, NULL, '2019-08-16 00:18:06', '2019-08-16 00:18:06'),
(61, 6, 16, NULL, 'Purified  Water', 3, '38.58', '46.3000', '0', '0', 5, NULL, NULL, '2019-08-16 00:18:06', '2019-08-16 00:18:06'),
(62, 6, 1, 'RG01-01J', 'Red Ginseng Extract', 0, '50.00', '63.0000', '0', '0', 5, NULL, NULL, '2019-08-16 00:18:06', '2019-08-16 00:18:06'),
(63, 6, 2, 'PG01-01J', 'Panax Ginseng 80% Extract', 0, '25.00', '30.0000', '0', '0', 5, NULL, NULL, '2019-08-16 00:18:06', '2019-08-16 00:18:06'),
(64, 6, 3, 'FO01-AR01', 'Marine Oil (30% omega 3 DHA/EPA)', 0, '250.00', '300.0000', '0', '0', 5, NULL, NULL, '2019-08-16 00:18:06', '2019-08-16 00:18:06'),
(65, 6, 9, NULL, 'Resveratrol 98% Extract', 0, '6.50', '7.8000', '0', '0', 5, NULL, NULL, '2019-08-16 00:18:06', '2019-08-16 00:18:06'),
(66, 6, 10, NULL, 'Vitamin K (MK7)', 0, '0.03', '2.3100', '1', '2.31', 5, NULL, NULL, '2019-08-16 00:18:06', '2019-08-16 00:18:06'),
(67, 6, 4, 'LC01-WC01', 'Lecithin', 1, '10.00', '12.0000', '0', '0', 5, NULL, NULL, '2019-08-16 00:18:06', '2019-08-16 00:18:06'),
(68, 6, 5, 'BW01-CS01', 'Beewax', 1, '30.00', '36.0000', '0', '0', 5, NULL, NULL, '2019-08-16 00:18:06', '2019-08-16 00:18:06'),
(69, 7, 25, NULL, 'Coenzyme Q10', 0, '30.00', '4.5000', '12', '54', 8, NULL, NULL, '2019-09-11 03:15:00', '2019-09-11 03:15:00'),
(70, 7, 4, 'LC01-WC01', 'Lecithin', 1, '10.00', '1.5000', '51', '76.5', 8, NULL, NULL, '2019-09-11 03:15:00', '2019-09-11 03:15:00'),
(71, 7, 5, 'BW01-CS01', 'White Beewax', 1, '40.00', '6.0000', '22', '132', 8, NULL, NULL, '2019-09-11 03:15:00', '2019-09-11 03:15:00'),
(72, 7, 24, NULL, 'Soybean Oil', 1, '500.00', '75.0000', '10', '750', 8, NULL, NULL, '2019-09-11 03:15:00', '2019-09-11 03:15:00'),
(73, 8, 25, NULL, 'Coenzyme Q10', 0, '30.00', '4.5000', '12', '54', 8, NULL, NULL, '2019-09-11 03:15:03', '2019-09-11 03:15:03'),
(74, 8, 4, 'LC01-WC01', 'Lecithin', 1, '10.00', '1.5000', '51', '76.5', 8, NULL, NULL, '2019-09-11 03:15:03', '2019-09-11 03:15:03'),
(75, 8, 5, 'BW01-CS01', 'White Beewax', 1, '40.00', '6.0000', '22', '132', 8, NULL, NULL, '2019-09-11 03:15:03', '2019-09-11 03:15:03'),
(76, 8, 24, NULL, 'Soybean Oil', 1, '500.00', '75.0000', '10', '750', 8, NULL, NULL, '2019-09-11 03:15:03', '2019-09-11 03:15:03');

-- --------------------------------------------------------

--
-- Table structure for table `cost_labor`
--

CREATE TABLE `cost_labor` (
  `id` bigint(20) NOT NULL,
  `reportcost_id` bigint(20) DEFAULT NULL,
  `amount` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hour` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `person` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `process` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cost_labor`
--

INSERT INTO `cost_labor` (`id`, `reportcost_id`, `amount`, `cost`, `hour`, `person`, `process`, `created_at`, `updated_at`) VALUES
(1, 4, '132', '44', '3', '0', 'Name', '2019-08-15 06:28:31', '2019-08-15 06:28:31'),
(2, 5, '132', '44', '3', '0', 'Name', '2019-08-15 06:29:51', '2019-08-15 06:29:51'),
(3, 6, '132', '44', '3', '0', 'Name', '2019-08-16 00:18:06', '2019-08-16 00:18:06'),
(4, 7, '40', '20', '2', '1', 'II', '2019-09-11 03:15:01', '2019-09-11 03:15:01'),
(5, 8, '40', '20', '2', '1', 'II', '2019-09-11 03:15:03', '2019-09-11 03:15:03');

-- --------------------------------------------------------

--
-- Table structure for table `cost_laborbottles`
--

CREATE TABLE `cost_laborbottles` (
  `id` bigint(20) NOT NULL,
  `reportcost_id` bigint(20) DEFAULT NULL,
  `cost` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hour` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `person` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `process` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cost_laborbottles`
--

INSERT INTO `cost_laborbottles` (`id`, `reportcost_id`, `cost`, `hour`, `person`, `process`, `total`, `created_at`, `updated_at`) VALUES
(1, 4, '44', '33', '0', 'Name', '1452', '2019-08-15 06:28:31', '2019-08-15 06:28:31'),
(2, 5, '44', '33', '0', 'Name', '1452', '2019-08-15 06:29:51', '2019-08-15 06:29:51'),
(3, 6, '44', '33', '0', 'Name', '1452', '2019-08-16 00:18:06', '2019-08-16 00:18:06'),
(4, 7, '12', '2', '1', 'Name', '24', '2019-09-11 03:15:03', '2019-09-11 03:15:03'),
(5, 8, '12', '2', '1', 'Name', '24', '2019-09-11 03:15:03', '2019-09-11 03:15:03');

-- --------------------------------------------------------

--
-- Table structure for table `cost_typebottles`
--

CREATE TABLE `cost_typebottles` (
  `id` bigint(20) NOT NULL,
  `reportcost_id` bigint(20) DEFAULT NULL,
  `name1` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name2` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name3` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `num1` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `num2` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `num3` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cost_typebottles`
--

INSERT INTO `cost_typebottles` (`id`, `reportcost_id`, `name1`, `name2`, `name3`, `num1`, `num2`, `num3`, `created_at`, `updated_at`) VALUES
(1, 4, 'Name1', 'Name2', 'Name3', '22', '44', '55', '2019-08-15 06:28:31', '2019-08-15 06:28:31'),
(2, 5, 'Name1', 'Name2', 'Name3', '22', '44', '55', '2019-08-15 06:29:51', '2019-08-15 06:29:51'),
(3, 6, 'Name1', 'Name2', 'Name3', '22', '44', '55', '2019-08-16 00:18:06', '2019-08-16 00:18:06'),
(4, 7, 'Name1', 'Name2', 'Name3', '1', '2', '3', '2019-09-11 03:15:03', '2019-09-11 03:15:03'),
(5, 8, 'Name1', 'Name2', 'Name3', '1', '2', '3', '2019-09-11 03:15:03', '2019-09-11 03:15:03');

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
  `product` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manufature_id` int(11) DEFAULT NULL,
  `formula_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `po` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

INSERT INTO `customrequest` (`id`, `ipd`, `product`, `customer`, `address`, `manufature_id`, `formula_number`, `po`, `revision`, `date`, `is_softgel`, `is_tablet`, `is_hardcapsule`, `size_type`, `color_logo`, `serving_size`, `filling_wt`, `order`, `box`, `carton`, `create_by`, `update_by`, `created_at`, `updated_at`) VALUES
(7, '123', '1', '16', '213 USA', 1, '123', '0', '123', '2019-07-22 00:00:00', 1, 1, 0, '123', '312', '0', '123', '312', '', '', NULL, NULL, '2019-07-22 04:55:27', '2019-07-22 04:55:27'),
(8, NULL, '3', '16', 'vvv', 1, '1', '0', '2', '2019-07-28 00:00:00', 0, 1, 0, '2', 'red', '0', '1222', '2', '', '', NULL, NULL, '2019-07-28 23:56:35', '2019-07-28 23:56:35'),
(9, '123', 'abc', 'bcd', 'efg', 3, '123', '0', '1', '2019-07-29 00:00:00', 1, 0, 1, '321', 'red', '0', '12', '33', '', '', NULL, NULL, '2019-07-29 04:27:02', '2019-07-29 04:27:02'),
(10, NULL, 'product', 'customer', 'ca mau', 1, '1', '0', '1', '2019-07-30 00:00:00', 0, 0, 0, '1', '1', '0', '1', '1', '', '', NULL, NULL, '2019-07-31 01:56:26', '2019-07-31 01:56:26'),
(11, '333', 'QQQQ', 'WWWW', 'aaaa', 2, '12', '0', '111', '2019-08-01 00:00:00', 1, 1, 0, '13', '33', '0', '223', '111', '', '', NULL, NULL, '2019-08-01 05:40:59', '2019-08-01 05:40:59'),
(12, NULL, 'ggg', 'hhh', 'dgfd', 1, '1', '0', '1', '2019-08-02 00:00:00', 0, 1, 0, '123', 'red', '0', '1222', '1', '', '', NULL, NULL, '2019-08-01 13:12:33', '2019-08-01 13:12:33'),
(13, '0123', 'ggss', 'nnn', 'dsfdsfd', 1, '1', '0', '2', '2019-08-02 00:00:00', 0, 0, 1, '1222', 'red', '0', '1111', '20000', '', '', NULL, NULL, '2019-08-02 00:48:56', '2019-08-02 00:48:56'),
(14, NULL, 'RG III 8%Royal Ginseng', 'ExxelUSA', '30590 Cochise Circle, Murrieta, CA 92563', 1, 'RG01', '0', '1.00', '2018-05-14 00:00:00', 1, 1, 1, '18 Ob', 'Red', '0', '962.69', '1200000', '', '', NULL, NULL, '2019-08-02 01:13:07', '2019-08-02 01:13:07'),
(15, '113', 'RG III 8%Royal Ginseng', 'ExxelUSA', '30590 Cochise Circle, Murrieta, CA 92563', 1, 'RG01', '0', '1.00', '2019-08-02 00:00:00', 1, 0, 0, '18', 'Red', '0', '374.02', '1200000', '', '', NULL, NULL, '2019-08-02 04:12:02', '2019-08-02 04:12:02'),
(16, '009', 'A', 'B', 'VN', 1, '01', '0', '1.1', '2019-08-02 00:00:00', 1, 0, 0, NULL, 'Black', '0', NULL, '5000', '', '', NULL, NULL, '2019-08-02 13:20:35', '2019-08-02 13:20:35'),
(17, NULL, 'Ginkgok 01', 'VN01', 'HCM', 1, '01', '0', '1.1', '2019-08-08 00:00:00', 1, 0, 0, NULL, 'Black', '0', NULL, '5000', '', '', NULL, NULL, '2019-08-08 18:14:48', '2019-08-08 18:14:48'),
(18, NULL, 'Ginkgok 01', 'VN01', 'HCM', 1, '01', '0', '1.1', '2019-08-08 00:00:00', 1, 0, 0, NULL, 'Black', '0', NULL, '5000', '', '', NULL, NULL, '2019-08-08 18:15:21', '2019-08-08 18:15:21'),
(19, NULL, 'Ginkgok 01', 'VN01', 'HCM', 1, '01', '0', '1.1', '2019-08-08 00:00:00', 1, 0, 0, NULL, 'Black', '0', NULL, '5000', '', '', NULL, NULL, '2019-08-08 18:16:07', '2019-08-08 18:16:07'),
(20, '114', 'abc', 'def', 'aaaaaaaaaaaa', 2, '11A', '0', '123', '2019-08-08 00:00:00', 0, 0, 0, '123', '123', '0', '123', '123', '', '', NULL, NULL, '2019-08-08 23:09:42', '2019-08-08 23:09:42'),
(21, '1256', 'ggg', 'sfdsf', 'sfds', 2, '1', '0', '2', '2019-08-08 00:00:00', 0, 1, 0, '18 Ob (text, number)', 'red', '0', '2', '1200000', '', '', NULL, NULL, '2019-08-08 23:56:01', '2019-08-08 23:56:01'),
(22, '654', 'AAAA', 'BBB', 'bbbb', 2, '22', '12', '333', '2019-08-08 00:00:00', 1, 0, 0, '1', '2', '3', NULL, '4', '5', '6', NULL, NULL, '2019-08-09 03:30:55', '2019-08-09 03:30:55'),
(23, NULL, 'RG3 ginsen', 'excell usa', 'usa', 1, 'RG01', NULL, '1', '2019-08-10 00:00:00', 0, 0, 1, '18 Ob (text, number)', 'red', '2', NULL, '1200000', '3 blister x 10 softgels', '50 boxes', NULL, NULL, '2019-08-10 18:22:40', '2019-08-10 18:22:40'),
(24, NULL, 'RGensin33', 'Excell usa', 'vietnam', 1, 'RG01', NULL, '1', '2019-08-12 00:00:00', 0, 1, 0, '18 Ob', 'Black', '2', NULL, '1200000', '3 blister x 10 softgels', NULL, NULL, NULL, '2019-08-12 18:52:08', '2019-08-12 18:52:08'),
(25, NULL, 'Ginkgo', 'Charles', 'USA', 1, 'GG1', '1', '1', '2019-08-23 00:00:00', 1, 0, 0, NULL, NULL, NULL, NULL, '300000', NULL, NULL, NULL, NULL, '2019-08-23 18:36:49', '2019-08-23 18:36:49'),
(26, NULL, 'Ginkgo', 'Charles', 'USA', 1, 'GG1', '1', '1', '2019-08-23 00:00:00', 1, 0, 0, NULL, NULL, NULL, NULL, '300000', NULL, NULL, NULL, NULL, '2019-08-23 18:36:58', '2019-08-23 18:36:58'),
(27, NULL, 'Ginkgo', 'Charles', 'USA', 1, 'GG1', '1', '1', '2019-08-23 00:00:00', 1, 0, 0, NULL, NULL, NULL, NULL, '300000', NULL, NULL, NULL, NULL, '2019-08-23 18:37:06', '2019-08-23 18:37:06'),
(28, '1', 'Ginkgo', 'Charles', 'USA', 1, 'GG1', '1', '1', '2019-08-23 00:00:00', 1, 0, 0, NULL, NULL, NULL, NULL, '300000', NULL, NULL, NULL, NULL, '2019-08-23 18:37:11', '2019-08-23 18:37:11'),
(29, NULL, 'COENZYME Q10', 'FPT', 'VN', 1, '1', '1', NULL, '2019-09-10 00:00:00', 1, 0, 0, NULL, NULL, NULL, NULL, '15000', '30 softgels', '50 boxes', NULL, NULL, '2019-09-11 02:46:52', '2019-09-11 02:46:52'),
(30, NULL, 'COENZYME Q10', 'FPT', 'VN', NULL, '1', '2', '1', '2019-09-10 00:00:00', 1, 0, 0, NULL, NULL, NULL, NULL, '150000', '30 softgels', '50 boxes', NULL, NULL, '2019-09-11 02:53:35', '2019-09-11 02:53:35');

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
(1, 1, 3, 'FO01-AR01', 'Marine Oil (30% omega 3 DHA/EPA)', 0, '4.00', '1.33', '4.00', '5.00', '35.00', '0.1800', '1.00', '2019-08-06 04:34:40', '2019-08-06 04:34:40'),
(2, 1, 5, 'BW01-CS01', 'Beewax', 1, '5.00', '1.67', '4.00', '4.00', '43.33', '0.2200', '0.55', '2019-08-06 04:34:40', '2019-08-06 04:34:40'),
(3, 1, 1, 'RG01-01J', 'Red Ginseng Extract', 2, '12.00', '4.00', '4.00', '4.00', '104.00', '0.5200', '1.33', '2019-08-06 04:34:40', '2019-08-06 04:34:40'),
(4, 1, 2, 'PG01-01J', 'Panax Ginseng 80% Extract', 3, '12.00', '4.00', '4.00', '4.00', '104.00', '0.5200', '1.00', '2019-08-06 04:34:40', '2019-08-06 04:34:40'),
(5, 2, 3, 'FO01-AR01', 'Marine Oil (30% omega 3 DHA/EPA)', 0, '4.00', '1.33', '4.00', '3.00', '34.33', '0.1700', '1.00', '2019-08-06 04:44:35', '2019-08-06 04:44:35'),
(6, 2, 5, 'BW01-CS01', 'Beewax', 1, '4.00', '1.33', '5.00', '5.00', '28.00', '0.1400', '0.45', '2019-08-06 04:44:35', '2019-08-06 04:44:35'),
(7, 2, 1, 'RG01-01J', 'Red Ginseng Extract', 2, '12.00', '4.00', '5.00', '4.00', '83.20', '0.4200', '1.33', '2019-08-06 04:44:35', '2019-08-06 04:44:35'),
(8, 2, 2, 'PG01-01J', 'Panax Ginseng 80% Extract', 3, '12.00', '4.00', '5.00', '4.00', '83.20', '0.4200', '1.00', '2019-08-06 04:44:35', '2019-08-06 04:44:35'),
(9, 3, 6, '10', 'Ginkgo', 0, '3.00', '1.00', '3.00', '0.00', '33.33', '0.0000', '1.00', '2019-08-09 04:00:48', '2019-08-09 04:00:48'),
(10, 3, 5, 'BW01-CS01', 'Beewax', 1, '3.00', '1.00', '4.00', '0.00', '25.00', '0.0000', '0.43', '2019-08-09 04:00:48', '2019-08-09 04:00:48'),
(11, 3, 1, 'RG01-01J', 'Red Ginseng Extract', 2, '9.00', '3.00', '2.00', '5.00', '157.50', '0.0000', '2.70', '2019-08-09 04:00:48', '2019-08-09 04:00:48'),
(12, 3, 2, 'PG01-01J', 'Panax Ginseng 80% Extract', 3, '12.00', '4.00', '4.00', '5.00', '105.00', '0.0000', '1.00', '2019-08-09 04:00:48', '2019-08-09 04:00:48'),
(13, 4, 1, 'RG01-01J', 'Red Ginseng Extract', 0, '100.00', '50.00', '100.00', '5.00', '52.50', '63.0000', '0.96', '2019-08-10 18:44:26', '2019-08-10 18:44:26'),
(14, 4, 2, 'PG01-01J', 'Panax Ginseng 80% Extract', 0, '50.00', '25.00', '100.00', '0.00', '25.00', '30.0000', '0.31', '2019-08-10 18:44:26', '2019-08-10 18:44:26'),
(15, 4, 3, 'FO01-AR01', 'Marine Oil (30% omega 3 DHA/EPA)', 0, '500.00', '250.00', '100.00', '0.00', '250.00', '300.0000', '0.76', '2019-08-10 18:44:26', '2019-08-10 18:44:26'),
(16, 4, 9, NULL, 'Resveratrol 98% Extract', 0, '13.00', '6.50', '100.00', '0.00', '6.50', '7.8000', '0.02', '2019-08-10 18:44:26', '2019-08-10 18:44:26'),
(17, 4, 10, NULL, 'Vitamin K (MK7)', 0, '0.05', '0.03', '1.30', '0.00', '1.92', '2.3100', '1.00', '2019-08-10 18:44:26', '2019-08-10 18:44:26'),
(18, 4, 4, 'LC01-WC01', 'Lecithin', 1, '20.00', '10.00', '100.00', '0.00', '10.00', '12.0000', '0.03', '2019-08-10 18:44:26', '2019-08-10 18:44:26'),
(19, 4, 5, 'BW01-CS01', 'Beewax', 1, '60.00', '30.00', '100.00', '0.00', '30.00', '36.0000', '0.08', '2019-08-10 18:44:26', '2019-08-10 18:44:26'),
(20, 4, 11, NULL, 'Titanium DiOxide (TiO2) FCC', 2, '11.02', '5.51', '100.00', '0.00', '5.51', '6.6100', '0.00', '2019-08-10 18:44:26', '2019-08-10 18:44:26'),
(21, 4, 12, NULL, 'Glycerin USP/FCC', 2, '0.00', '0.00', '100.00', '0.00', '0.00', '0.0000', '0.00', '2019-08-10 18:44:26', '2019-08-10 18:44:26'),
(22, 4, 13, NULL, 'FD&C Color Blue', 2, '6.98', '3.49', '100.00', '0.00', '3.49', '4.1900', '0.00', '2019-08-10 18:44:26', '2019-08-10 18:44:26'),
(23, 4, 14, NULL, 'FD&C Color Red', 2, '2.86', '1.43', '100.00', '0.00', '1.43', '1.7200', '0.00', '2019-08-10 18:44:26', '2019-08-10 18:44:26'),
(24, 4, 15, NULL, 'FD&C Color Yellow', 2, '1.20', '0.60', '100.00', '0.00', '0.60', '0.7200', '0.00', '2019-08-10 18:44:26', '2019-08-10 18:44:26'),
(25, 4, 20, NULL, 'Purified   Water', 2, '0.00', '0.00', '100.00', '0.00', '0.00', '0.0000', '0.00', '2019-08-10 18:44:26', '2019-08-10 18:44:26'),
(26, 4, 17, NULL, 'Gelatine 200B T-B 400MSH (Food Grade)', 3, '771.70', '385.85', '100.00', '0.00', '385.85', '463.0200', '0.00', '2019-08-10 18:44:26', '2019-08-10 18:44:26'),
(27, 4, 18, NULL, 'Glycerine 99.5% USP', 3, '220.48', '110.24', '100.00', '0.00', '110.24', '132.2900', '0.00', '2019-08-10 18:44:26', '2019-08-10 18:44:26'),
(28, 4, 19, NULL, 'Sorbitol 99.5% USP', 3, '11.02', '5.51', '100.00', '0.00', '5.51', '6.6100', '0.00', '2019-08-10 18:44:26', '2019-08-10 18:44:26'),
(29, 4, 16, NULL, 'Purified  Water', 3, '77.16', '38.58', '100.00', '0.00', '38.58', '46.3000', '0.07', '2019-08-10 18:44:26', '2019-08-10 18:44:26'),
(30, 5, 1, 'RG01-01J', 'Red Ginseng Extract', 0, '100.00', '50.00', '100.00', '5.00', '52.50', '63.0000', '14.06', '2019-08-12 19:03:00', '2019-08-12 19:03:00'),
(31, 5, 2, 'PG01-01J', 'Panax Ginseng 80% Extract', 0, '50.00', '25.00', '100.00', '0.00', '25.00', '30.0000', '6.69', '2019-08-12 19:03:00', '2019-08-12 19:03:00'),
(32, 5, 3, 'FO01-AR01', 'Marine Oil (30% omega 3 DHA/EPA)', 0, '500.00', '250.00', '100.00', '0.00', '250.00', '300.0000', '66.95', '2019-08-12 19:03:00', '2019-08-12 19:03:00'),
(33, 5, 9, NULL, 'Resveratrol 98% Extract', 0, '13.00', '6.50', '100.00', '0.00', '6.50', '7.8000', '1.74', '2019-08-12 19:03:00', '2019-08-12 19:03:00'),
(34, 5, 10, NULL, 'Vitamin K (MK7)', 0, '0.05', '0.03', '1.30', '0.00', '1.92', '2.3100', '0.51', '2019-08-12 19:03:00', '2019-08-12 19:03:00'),
(35, 5, 4, 'LC01-WC01', 'Lecithin', 1, '20.00', '10.00', '100.00', '0.00', '10.00', '12.0000', '2.68', '2019-08-12 19:03:00', '2019-08-12 19:03:00'),
(36, 5, 5, 'BW01-CS01', 'Beewax', 1, '60.00', '30.00', '100.00', '0.00', '30.00', '36.0000', '8.03', '2019-08-12 19:03:00', '2019-08-12 19:03:00'),
(37, 5, 11, NULL, 'Titanium DiOxide (TiO2) FCC', 2, '11.02', '5.51', '100.00', '0.00', '5.51', '6.6100', '1.47', '2019-08-12 19:03:00', '2019-08-12 19:03:00'),
(38, 5, 12, NULL, 'Glycerin USP/FCC', 2, '0.00', '0.00', '100.00', '0.00', '0.00', '0.0000', '0.00', '2019-08-12 19:03:00', '2019-08-12 19:03:00'),
(39, 5, 13, NULL, 'FD&C Color Blue', 2, '6.98', '3.49', '100.00', '0.00', '3.49', '4.1900', '0.93', '2019-08-12 19:03:00', '2019-08-12 19:03:00'),
(40, 5, 14, NULL, 'FD&C Color Red', 2, '2.86', '1.43', '100.00', '0.00', '1.43', '1.7200', '0.38', '2019-08-12 19:03:00', '2019-08-12 19:03:00'),
(41, 5, 15, NULL, 'FD&C Color Yellow', 2, '1.20', '0.60', '100.00', '0.00', '0.60', '0.7200', '0.16', '2019-08-12 19:03:00', '2019-08-12 19:03:00'),
(42, 5, 20, NULL, 'Purified   Water', 2, '0.00', '0.00', '100.00', '0.00', '0.00', '0.0000', '0.00', '2019-08-12 19:03:00', '2019-08-12 19:03:00'),
(43, 5, 17, NULL, 'Gelatine 200B T-B 400MSH (Food Grade)', 3, '771.70', '385.85', '100.00', '0.00', '385.85', '463.0200', '71.43', '2019-08-12 19:03:00', '2019-08-12 19:03:00'),
(44, 5, 18, NULL, 'Glycerine 99.5% USP', 3, '220.48', '110.24', '100.00', '0.00', '110.24', '132.2900', '20.41', '2019-08-12 19:03:00', '2019-08-12 19:03:00'),
(45, 5, 19, NULL, 'Sorbitol 99.5% USP', 3, '11.02', '5.51', '100.00', '0.00', '5.51', '6.6100', '1.02', '2019-08-12 19:03:00', '2019-08-12 19:03:00'),
(46, 5, 16, NULL, 'Purified  Water', 3, '77.16', '38.58', '100.00', '0.00', '38.58', '46.3000', '7.14', '2019-08-12 19:03:00', '2019-08-12 19:03:00'),
(47, 6, 22, NULL, 'Ginkgo Biloba Leaf Powder', 0, '135.00', '135.00', '100.00', '5.00', '141.75', '42.5250', '23.68', '2019-08-23 18:44:26', '2019-08-23 18:44:26'),
(48, 6, 23, NULL, 'Ginkgo Biloba Leaf Extract', 0, '15.00', '15.00', '100.00', '5.00', '15.75', '4.7250', '2.63', '2019-08-23 18:44:26', '2019-08-23 18:44:26'),
(49, 6, 4, 'LC01-WC01', 'Lecithin', 1, '20.00', '20.00', '100.00', '0.00', '20.00', '6.0000', '3.34', '2019-08-23 18:44:26', '2019-08-23 18:44:26'),
(50, 6, 5, 'BW01-CS01', 'White Beewax', 1, '40.00', '40.00', '100.00', '0.00', '40.00', '12.0000', '6.68', '2019-08-23 18:44:26', '2019-08-23 18:44:26'),
(51, 6, 24, NULL, 'Soybean Oil', 1, '381.00', '381.00', '100.00', '0.00', '381.00', '114.3000', '63.66', '2019-08-23 18:44:26', '2019-08-23 18:44:26'),
(52, 6, 11, NULL, 'Titanium DiOxide (TiO2) FCC', 2, '5.51', '5.51', '100.00', '0.00', '5.51', '1.6530', '0.92', '2019-08-23 18:44:26', '2019-08-23 18:44:26'),
(53, 6, 12, NULL, 'Glycerin USP/FCC', 2, '0.00', '0.00', '100.00', '0.00', '0.00', '0.0000', '0.00', '2019-08-23 18:44:26', '2019-08-23 18:44:26'),
(54, 6, 13, NULL, 'FD&C Color Blue', 2, '3.49', '3.49', '100.00', '0.00', '3.49', '1.0470', '0.58', '2019-08-23 18:44:26', '2019-08-23 18:44:26'),
(55, 6, 14, NULL, 'FD&C Color Red', 2, '1.43', '1.43', '100.00', '0.00', '1.43', '0.4290', '0.24', '2019-08-23 18:44:26', '2019-08-23 18:44:26'),
(56, 6, 15, NULL, 'FD&C Color Yellow', 2, '0.60', '0.60', '100.00', '0.00', '0.60', '0.1800', '0.10', '2019-08-23 18:44:26', '2019-08-23 18:44:26'),
(57, 6, 20, NULL, 'Purified   Water', 2, '0.00', '0.00', '100.00', '0.00', '0.00', '0.0000', '0.00', '2019-08-23 18:44:26', '2019-08-23 18:44:26'),
(58, 6, 16, NULL, 'Purified  Water', 3, '243.33', '243.33', '100.00', '0.00', '243.33', '72.9990', '43.29', '2019-08-23 18:44:26', '2019-08-23 18:44:26'),
(59, 6, 17, NULL, 'Gelatine 200B T-B 400MSH (Food Grade)', 3, '109.50', '109.50', '100.00', '0.00', '109.50', '32.8500', '19.48', '2019-08-23 18:44:26', '2019-08-23 18:44:26'),
(60, 6, 18, NULL, 'Glycerine 99.5% USP', 3, '9.73', '9.73', '100.00', '0.00', '9.73', '2.9190', '1.73', '2019-08-23 18:44:26', '2019-08-23 18:44:26'),
(61, 6, 19, NULL, 'Sorbitol 99.5% USP', 3, '199.53', '199.53', '100.00', '0.00', '199.53', '59.8590', '35.50', '2019-08-23 18:44:26', '2019-08-23 18:44:26'),
(62, 7, 25, NULL, 'Coenzyme Q10', 0, '30.00', '0.00', '100.00', '5.00', '0.00', '0.0000', '0.00', '2019-09-11 02:51:56', '2019-09-11 02:51:56'),
(63, 7, 4, 'LC01-WC01', 'Lecithin', 1, '20.00', '0.00', '100.00', '0.00', '0.00', '0.0000', '0.00', '2019-09-11 02:51:56', '2019-09-11 02:51:56'),
(64, 7, 5, 'BW01-CS01', 'White Beewax', 1, '30.00', '0.00', '100.00', '0.00', '0.00', '0.0000', '0.00', '2019-09-11 02:51:56', '2019-09-11 02:51:56'),
(65, 8, 25, NULL, 'Coenzyme Q10', 0, '30.00', '30.00', '100.00', '0.00', '30.00', '4.5000', '5.45', '2019-09-11 02:56:39', '2019-09-11 02:56:39'),
(66, 8, 4, 'LC01-WC01', 'Lecithin', 1, '10.00', '10.00', '100.00', '0.00', '10.00', '1.5000', '1.82', '2019-09-11 02:56:39', '2019-09-11 02:56:39'),
(67, 8, 5, 'BW01-CS01', 'White Beewax', 1, '40.00', '40.00', '100.00', '0.00', '40.00', '6.0000', '7.27', '2019-09-11 02:56:39', '2019-09-11 02:56:39'),
(68, 8, 24, NULL, 'Soybean Oil', 1, '500.00', '500.00', '100.00', '0.00', '500.00', '75.0000', '90.91', '2019-09-11 02:56:39', '2019-09-11 02:56:39');

-- --------------------------------------------------------

--
-- Table structure for table `ingredient`
--

CREATE TABLE `ingredient` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(1, 'RG01-01J', 'Red Ginseng Extract', 0, 0, 1, NULL, NULL, '2019-07-13 00:46:41', '2019-08-10 18:15:06'),
(2, 'PG01-01J', 'Panax Ginseng 80% Extract', 0, 0, 1, NULL, NULL, '2019-07-13 00:47:03', '2019-08-10 18:15:12'),
(3, 'FO01-AR01', 'Marine Oil (30% omega 3 DHA/EPA)', 0, 0, 1, NULL, NULL, '2019-07-13 00:49:01', '2019-07-23 22:21:27'),
(4, 'LC01-WC01', 'Lecithin', 1, 0, 1, NULL, NULL, '2019-07-13 00:49:21', '2019-08-10 18:16:43'),
(5, 'BW01-CS01', 'White Beewax', 1, 0, 1, NULL, NULL, '2019-07-13 00:49:34', '2019-08-23 18:32:41'),
(6, '10', 'Ginkgo', 0, 0, 1, NULL, NULL, '2019-08-02 13:03:44', '2019-08-02 13:03:44'),
(9, NULL, 'Resveratrol 98% Extract', 0, 0, 1, NULL, NULL, '2019-08-10 18:15:35', '2019-08-10 18:15:35'),
(10, NULL, 'Vitamin K (MK7)', 0, 0, 1, NULL, NULL, '2019-08-10 18:16:04', '2019-08-10 18:16:04'),
(11, NULL, 'Titanium DiOxide (TiO2) FCC', 2, 0, 1, NULL, NULL, '2019-08-10 18:25:33', '2019-08-10 18:25:33'),
(12, NULL, 'Glycerin USP/FCC', 2, 0, 1, NULL, NULL, '2019-08-10 18:25:46', '2019-08-10 18:25:46'),
(13, NULL, 'FD&C Color Blue', 2, 0, 1, NULL, NULL, '2019-08-10 18:26:03', '2019-08-10 18:26:03'),
(14, NULL, 'FD&C Color Red', 2, 0, 1, NULL, NULL, '2019-08-10 18:26:14', '2019-08-10 18:26:14'),
(15, NULL, 'FD&C Color Yellow', 2, 0, 1, NULL, NULL, '2019-08-10 18:26:24', '2019-08-10 18:26:24'),
(16, NULL, 'Purified  Water', 3, 0, 1, NULL, NULL, '2019-08-10 18:26:38', '2019-08-10 18:29:18'),
(17, NULL, 'Gelatine 200B T-B 400MSH (Food Grade)', 3, 0, 1, NULL, NULL, '2019-08-10 18:27:09', '2019-08-10 18:27:09'),
(18, NULL, 'Glycerine 99.5% USP', 3, 0, 1, NULL, NULL, '2019-08-10 18:27:22', '2019-08-10 18:27:22'),
(19, NULL, 'Sorbitol 99.5% USP', 3, 0, 1, NULL, NULL, '2019-08-10 18:27:32', '2019-08-10 18:27:32'),
(20, NULL, 'Purified   Water', 2, 0, 1, NULL, NULL, '2019-08-10 18:33:07', '2019-08-10 18:33:07'),
(22, NULL, 'Ginkgo Biloba Leaf Powder', 0, 0, 1, NULL, NULL, '2019-08-23 18:32:05', '2019-08-23 18:32:05'),
(23, NULL, 'Ginkgo Biloba Leaf Extract', 0, 0, 1, NULL, NULL, '2019-08-23 18:32:16', '2019-08-23 18:32:16'),
(24, NULL, 'Soybean Oil', 1, 0, 1, NULL, NULL, '2019-08-23 18:33:03', '2019-08-23 18:33:03'),
(25, NULL, 'Coenzyme Q10', 0, 0, 1, NULL, NULL, '2019-09-11 02:46:34', '2019-09-11 02:46:34');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_ingredients`
--

CREATE TABLE `inventory_ingredients` (
  `id` bigint(20) NOT NULL,
  `reportinventory_id` bigint(20) DEFAULT NULL,
  `ingredient_id` bigint(20) DEFAULT NULL,
  `code` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ingredient` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inactive` int(11) DEFAULT NULL,
  `per_batch` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `in_stock` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lot` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchased` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `checked` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventory_ingredients`
--

INSERT INTO `inventory_ingredients` (`id`, `reportinventory_id`, `ingredient_id`, `code`, `name_ingredient`, `inactive`, `per_batch`, `in_stock`, `lot`, `purchased`, `checked`, `created_at`, `updated_at`) VALUES
(1, 1, 11, NULL, 'Titanium DiOxide (TiO2) FCC', 2, '1.6530', '123', '4124', '312', '333', '2019-09-05 03:45:42', '2019-09-05 03:45:42'),
(2, 1, 12, NULL, 'Glycerin USP/FCC', 2, '0.0000', '0', '0', '0', '0', '2019-09-05 03:45:42', '2019-09-05 03:45:42'),
(3, 1, 13, NULL, 'FD&C Color Blue', 2, '1.0470', '0', '0', '0', '0', '2019-09-05 03:45:42', '2019-09-05 03:45:42'),
(4, 1, 14, NULL, 'FD&C Color Red', 2, '0.4290', '0', '0', '0', '0', '2019-09-05 03:45:42', '2019-09-05 03:45:42'),
(5, 1, 15, NULL, 'FD&C Color Yellow', 2, '0.1800', '0', '0', '0', '0', '2019-09-05 03:45:42', '2019-09-05 03:45:42'),
(6, 1, 20, NULL, 'Purified   Water', 2, '0.0000', '0', '0', '0', '0', '2019-09-05 03:45:42', '2019-09-05 03:45:42'),
(7, 1, 16, NULL, 'Purified  Water', 3, '72.9990', '0', '0', '0', '0', '2019-09-05 03:45:42', '2019-09-05 03:45:42'),
(8, 1, 17, NULL, 'Gelatine 200B T-B 400MSH (Food Grade)', 3, '32.8500', '0', '0', '0', '0', '2019-09-05 03:45:42', '2019-09-05 03:45:42'),
(9, 1, 18, NULL, 'Glycerine 99.5% USP', 3, '2.9190', '0', '0', '0', '0', '2019-09-05 03:45:42', '2019-09-05 03:45:42'),
(10, 1, 19, NULL, 'Sorbitol 99.5% USP', 3, '59.8590', '0', '0', '0', '0', '2019-09-05 03:45:42', '2019-09-05 03:45:42'),
(11, 1, 22, NULL, 'Ginkgo Biloba Leaf Powder', 0, '42.5250', '0', '0', '0', '0', '2019-09-05 03:45:42', '2019-09-05 03:45:42'),
(12, 1, 23, NULL, 'Ginkgo Biloba Leaf Extract', 0, '4.7250', '0', '0', '0', '0', '2019-09-05 03:45:42', '2019-09-05 03:45:42'),
(13, 1, 4, 'LC01-WC01', 'Lecithin', 1, '6.0000', '0', '0', '0', '0', '2019-09-05 03:45:42', '2019-09-05 03:45:42'),
(14, 1, 5, 'BW01-CS01', 'White Beewax', 1, '12.0000', '0', '0', '0', '0', '2019-09-05 03:45:42', '2019-09-05 03:45:42'),
(15, 1, 24, NULL, 'Soybean Oil', 1, '114.3000', '0', '0', '0', '0', '2019-09-05 03:45:42', '2019-09-05 03:45:42'),
(16, 2, 25, NULL, 'Coenzyme Q10', 0, '4.5000', '0', '0', '0', '0', '2019-09-11 03:18:12', '2019-09-11 03:18:12'),
(17, 2, 4, 'LC01-WC01', 'Lecithin', 1, '1.5000', '0', '0', '0', '0', '2019-09-11 03:18:12', '2019-09-11 03:18:12'),
(18, 2, 5, 'BW01-CS01', 'White Beewax', 1, '6.0000', '0', '0', '0', '0', '2019-09-11 03:18:12', '2019-09-11 03:18:12'),
(19, 2, 24, NULL, 'Soybean Oil', 1, '75.0000', '0', '0', '0', '0', '2019-09-11 03:18:12', '2019-09-11 03:18:12');

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
-- Table structure for table `mixing_ass`
--

CREATE TABLE `mixing_ass` (
  `id` bigint(20) NOT NULL,
  `reportmixing_id` bigint(20) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `labor_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_in` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_out` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `record` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost_per_hour` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `labor_cost` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mixing_ass`
--

INSERT INTO `mixing_ass` (`id`, `reportmixing_id`, `name`, `labor_name`, `time_in`, `time_out`, `record`, `cost_per_hour`, `labor_cost`, `created_at`, `updated_at`) VALUES
(9, 7, 'Enter', 'Enter', '2019-09-20 00:01', '2019-09-20 00:10', 'Enter', '0', '0', '2019-09-18 17:50:11', '2019-09-18 17:50:11'),
(10, 7, 'HAi', 'Enter', '2019-09-20 00:00', '2019-09-20 00:09', 'Enter', '0', '0', '2019-09-18 17:50:11', '2019-09-18 17:50:11');

-- --------------------------------------------------------

--
-- Table structure for table `mixing_ingredients`
--

CREATE TABLE `mixing_ingredients` (
  `id` bigint(20) NOT NULL,
  `reportmixing_id` bigint(20) DEFAULT NULL,
  `ingredient_id` bigint(20) DEFAULT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ingredient` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inactive` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `per_batch` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wt_amt` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lot_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wt_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mixing_ingredients`
--

INSERT INTO `mixing_ingredients` (`id`, `reportmixing_id`, `ingredient_id`, `code`, `name_ingredient`, `inactive`, `per_batch`, `wt_amt`, `lot_no`, `wt_by`, `created_at`, `updated_at`) VALUES
(22, 7, 25, NULL, 'Coenzyme Q10', '0', '4.5000', 'Enter', 'Enter', 'Enter', '2019-09-18 17:50:11', '2019-09-18 17:50:11'),
(23, 7, 4, 'LC01-WC01', 'Lecithin', '1', '1.5000', 'Enter', 'Enter', 'Enter', '2019-09-18 17:50:11', '2019-09-18 17:50:11'),
(24, 7, 5, 'BW01-CS01', 'White Beewax', '1', '6.0000', 'Enter', 'Enter', 'Enter', '2019-09-18 17:50:11', '2019-09-18 17:50:11'),
(25, 7, 24, NULL, 'Soybean Oil', '1', '75.0000', 'Enter', 'Enter', 'Enter', '2019-09-18 17:50:11', '2019-09-18 17:50:11');

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
(1, 'RG III 8%Royal Ginsen', '001', 0, 1, NULL, NULL, '2019-07-13 00:10:32', '2019-07-13 00:10:32'),
(2, 'RG III 20%Royal Ginsen', '002', 0, 1, NULL, NULL, '2019-07-13 00:11:09', '2019-07-13 00:11:09'),
(3, 'Ginkgobiloba', '003', 0, 1, NULL, NULL, '2019-07-19 19:22:58', '2019-07-19 19:22:58');

-- --------------------------------------------------------

--
-- Table structure for table `reportcost`
--

CREATE TABLE `reportcost` (
  `id` bigint(20) NOT NULL,
  `customrequest_id` bigint(20) DEFAULT NULL,
  `po` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `batch_no` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sum_price_per_batch_color` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sum_price_per_batch_shell` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sum_price_per_batch_inactive` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sum_num3_hardcapsule` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sum_amount_labor` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sum_cost1000` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sum_amount_cost` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sum_amount_labor_bottles` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sum_num1_type_bottles` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sum_num2_type_bottles` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sum_num3_type_bottles` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_by` bigint(20) DEFAULT NULL,
  `update_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reportcost`
--

INSERT INTO `reportcost` (`id`, `customrequest_id`, `po`, `batch_no`, `sum_price_per_batch_color`, `sum_price_per_batch_shell`, `sum_price_per_batch_inactive`, `sum_num3_hardcapsule`, `sum_amount_labor`, `sum_cost1000`, `sum_amount_cost`, `sum_amount_labor_bottles`, `sum_num1_type_bottles`, `sum_num2_type_bottles`, `sum_num3_type_bottles`, `create_by`, `update_by`, `created_at`, `updated_at`) VALUES
(4, 24, NULL, NULL, '0', '0', '2.31', '12', '132', '0.1331', '159.72', '1452', '22', '44', '55', NULL, NULL, '2019-08-15 06:28:31', '2019-08-15 06:28:31'),
(5, 24, '123', NULL, '0', '0', '2.31', '12', '132', '0.1331', '159.72', '1452', '022', '044', '055', NULL, NULL, '2019-08-15 06:29:51', '2019-08-15 06:29:51'),
(6, 24, '123', NULL, '6.61', '0', '8.92', '12', '132', '0.1992', '239.04', '1452', '022', '044', '055', NULL, NULL, '2019-08-16 00:18:06', '2019-08-16 00:18:06'),
(7, 30, NULL, NULL, '0', '0', '1012.5', '2', '40', '13.766666666666667', '16520', '24', '1', '2', '3', NULL, NULL, '2019-09-11 03:15:00', '2019-09-11 03:15:00'),
(8, 30, NULL, NULL, '0', '0', '1012.5', '2', '40', '13.766666666666667', '16520', '24', '1', '2', '3', NULL, NULL, '2019-09-11 03:15:02', '2019-09-11 03:15:02');

-- --------------------------------------------------------

--
-- Table structure for table `reportformula`
--

CREATE TABLE `reportformula` (
  `id` bigint(20) NOT NULL,
  `customrequest_id` bigint(20) NOT NULL,
  `po` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `filling_wt` decimal(10,2) NOT NULL DEFAULT '0.00',
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
(1, 16, '354', '0.00', 3, 4, NULL, NULL, '2019-08-06 04:34:40', '2019-08-06 04:34:40'),
(2, 16, '12333', '0.00', 3, 5, NULL, NULL, '2019-08-06 04:44:35', '2019-08-06 04:44:35'),
(3, 22, '33', '58.33', 3, 4, NULL, NULL, '2019-08-09 04:00:48', '2019-08-09 04:00:48'),
(4, 23, NULL, '375.92', 2, 1, NULL, NULL, '2019-08-10 18:44:26', '2019-08-10 18:44:26'),
(5, 24, NULL, '375.92', 2, 1, NULL, NULL, '2019-08-12 19:03:00', '2019-08-12 19:03:00'),
(6, 28, NULL, '598.50', 1, 1, NULL, NULL, '2019-08-23 18:44:26', '2019-08-23 18:44:26'),
(7, 29, NULL, '0.00', 0, 0, NULL, NULL, '2019-09-11 02:51:56', '2019-09-11 02:51:56'),
(8, 30, NULL, '580.00', 1, 0, NULL, NULL, '2019-09-11 02:56:39', '2019-09-11 02:56:39');

-- --------------------------------------------------------

--
-- Table structure for table `reportinventory`
--

CREATE TABLE `reportinventory` (
  `id` bigint(20) NOT NULL,
  `customrequest_id` bigint(20) DEFAULT NULL,
  `batch_no` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reportinventory`
--

INSERT INTO `reportinventory` (`id`, `customrequest_id`, `batch_no`, `create_by`, `update_by`, `created_at`, `updated_at`) VALUES
(1, 28, '0', NULL, NULL, '2019-09-05 03:45:42', '2019-09-05 03:45:42'),
(2, 30, '141,519.00', NULL, NULL, '2019-09-11 03:18:12', '2019-09-11 03:18:12');

-- --------------------------------------------------------

--
-- Table structure for table `reportmixing`
--

CREATE TABLE `reportmixing` (
  `id` bigint(20) NOT NULL,
  `customrequest_id` bigint(20) DEFAULT NULL,
  `batch_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `personnel` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ipc_person` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weighing_person` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blendling_person` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `line_clear` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ipc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reportmixing`
--

INSERT INTO `reportmixing` (`id`, `customrequest_id`, `batch_no`, `personnel`, `ipc_person`, `weighing_person`, `blendling_person`, `line_clear`, `ipc`, `create_by`, `update_by`, `created_at`, `updated_at`) VALUES
(7, 30, '2', '3', '4', '5', '6', '7', '9', NULL, NULL, '2019-09-18 17:50:10', '2019-09-18 17:50:10');

-- --------------------------------------------------------

--
-- Table structure for table `reportquotation`
--

CREATE TABLE `reportquotation` (
  `id` bigint(20) NOT NULL,
  `customrequest_id` bigint(20) DEFAULT NULL,
  `price` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `packing` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paper_big_box` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deposit` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_by` bigint(20) DEFAULT NULL,
  `update_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reportquotation`
--

INSERT INTO `reportquotation` (`id`, `customrequest_id`, `price`, `packing`, `paper_big_box`, `deposit`, `create_by`, `update_by`, `created_at`, `updated_at`) VALUES
(1, 24, '123.00', '321.00', '444.00', '555.00', NULL, NULL, '2019-08-21 04:17:47', '2019-08-21 04:17:47'),
(2, 30, '15.00', '310.00', NULL, '70.00', NULL, NULL, '2019-09-11 03:17:25', '2019-09-11 03:17:25');

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
(1, 'super-admin', 'Supper Administrator', '2019-07-24 16:43:54', '2019-07-24 16:43:54'),
(2, 'admin', 'Administrator', '2019-07-24 16:43:54', '2019-07-24 16:43:54'),
(3, 'user', 'User', '2019-07-24 16:43:54', '2019-07-24 16:43:54');

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
(4, 7, '3', '2019-07-22 04:55:27', '2019-07-22 04:55:27'),
(5, 7, '1', '2019-07-22 04:55:27', '2019-07-22 04:55:27'),
(6, 8, '1', '2019-07-28 23:56:35', '2019-07-28 23:56:35'),
(7, 8, '2', '2019-07-28 23:56:35', '2019-07-28 23:56:35'),
(8, 9, '123abc', '2019-07-29 04:27:02', '2019-07-29 04:27:02'),
(9, 9, 'bcd123', '2019-07-29 04:27:02', '2019-07-29 04:27:02'),
(10, 10, 'aaaaaaa', '2019-07-31 01:56:26', '2019-07-31 01:56:26'),
(11, 11, 'asdasd', '2019-08-01 05:40:59', '2019-08-01 05:40:59'),
(12, 11, 'ddddd', '2019-08-01 05:40:59', '2019-08-01 05:40:59'),
(13, 12, 'nnnn', '2019-08-01 13:12:33', '2019-08-01 13:12:33'),
(14, 13, 'hfghf', '2019-08-02 00:48:56', '2019-08-02 00:48:56'),
(15, 14, 'All raw materials provided by Pharmaxx', '2019-08-02 01:13:07', '2019-08-02 01:13:07'),
(16, 15, 'All raw materials provided by Pharmaxx', '2019-08-02 04:12:02', '2019-08-02 04:12:02'),
(17, 16, 'XXXX', '2019-08-02 13:20:35', '2019-08-02 13:20:35'),
(18, 17, 'No', '2019-08-08 18:14:49', '2019-08-08 18:14:49'),
(19, 18, 'No', '2019-08-08 18:15:21', '2019-08-08 18:15:21'),
(20, 19, 'No', '2019-08-08 18:16:07', '2019-08-08 18:16:07'),
(21, 20, 'aaa', '2019-08-08 23:09:42', '2019-08-08 23:09:42'),
(22, 21, 'bbbb', '2019-08-08 23:56:01', '2019-08-08 23:56:01'),
(23, 22, 'dd', '2019-08-09 03:30:55', '2019-08-09 03:30:55'),
(24, 22, 'rrr', '2019-08-09 03:30:55', '2019-08-09 03:30:55'),
(25, 23, 'All raw materials provided by Pharmaxx', '2019-08-10 18:22:40', '2019-08-10 18:22:40'),
(26, 23, 'Softgel Encapsulation by Pharmaxx', '2019-08-10 18:22:40', '2019-08-10 18:22:40'),
(27, 24, 'All raw materials provided by Pharmaxx', '2019-08-12 18:52:08', '2019-08-12 18:52:08'),
(28, 24, 'Softgel Encapsulation by Pharmaxx', '2019-08-12 18:52:08', '2019-08-12 18:52:08'),
(29, 24, 'Lead time: 6-8 weeks. After AW approved (FOS..)', '2019-08-12 18:52:08', '2019-08-12 18:52:08');

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
(5, 7, 1, 5.1, '2019-07-22 04:55:27', '2019-07-22 04:55:27'),
(6, 8, 2, 10, '2019-07-28 23:56:35', '2019-07-28 23:56:35'),
(7, 8, 1, 21, '2019-07-28 23:56:35', '2019-07-28 23:56:35'),
(8, 8, 3, 8, '2019-07-28 23:56:35', '2019-07-28 23:56:35'),
(9, 9, 2, 0, '2019-07-29 04:27:02', '2019-07-29 04:27:02'),
(10, 9, 1, 0, '2019-07-29 04:27:02', '2019-07-29 04:27:02'),
(11, 10, 2, 20, '2019-07-31 01:56:26', '2019-07-31 01:56:26'),
(12, 10, 4, 30, '2019-07-31 01:56:26', '2019-07-31 01:56:26'),
(13, 11, 1, 12, '2019-08-01 05:40:59', '2019-08-01 05:40:59'),
(14, 11, 4, 1.1, '2019-08-01 05:40:59', '2019-08-01 05:40:59'),
(15, 11, 2, 3.1, '2019-08-01 05:40:59', '2019-08-01 05:40:59'),
(16, 11, 3, 3.1, '2019-08-01 05:40:59', '2019-08-01 05:40:59'),
(17, 11, 5, 3.1, '2019-08-01 05:40:59', '2019-08-01 05:40:59'),
(18, 12, 1, 0, '2019-08-01 13:12:33', '2019-08-01 13:12:33'),
(19, 12, 4, 0, '2019-08-01 13:12:33', '2019-08-01 13:12:33'),
(20, 13, 4, 3, '2019-08-02 00:48:56', '2019-08-02 00:48:56'),
(21, 13, 1, 12, '2019-08-02 00:48:56', '2019-08-02 00:48:56'),
(22, 13, 2, 300, '2019-08-02 00:48:56', '2019-08-02 00:48:56'),
(23, 13, 5, 7, '2019-08-02 00:48:56', '2019-08-02 00:48:56'),
(24, 13, 3, 333, '2019-08-02 00:48:56', '2019-08-02 00:48:56'),
(25, 14, 1, 100, '2019-08-02 01:13:07', '2019-08-02 01:13:07'),
(26, 14, 4, 30, '2019-08-02 01:13:07', '2019-08-02 01:13:07'),
(27, 15, 1, 100, '2019-08-02 04:12:02', '2019-08-02 04:12:02'),
(28, 15, 4, 20, '2019-08-02 04:12:02', '2019-08-02 04:12:02'),
(29, 16, 3, 500, '2019-08-02 13:20:35', '2019-08-02 13:20:35'),
(30, 16, 5, 20, '2019-08-02 13:20:35', '2019-08-02 13:20:35'),
(31, 17, 3, 500, '2019-08-08 18:14:48', '2019-08-08 18:14:48'),
(32, 17, 5, 0, '2019-08-08 18:14:48', '2019-08-08 18:14:48'),
(33, 18, 3, 500, '2019-08-08 18:15:21', '2019-08-08 18:15:21'),
(34, 18, 5, 0, '2019-08-08 18:15:21', '2019-08-08 18:15:21'),
(35, 19, 3, 500, '2019-08-08 18:16:07', '2019-08-08 18:16:07'),
(36, 19, 5, 0, '2019-08-08 18:16:07', '2019-08-08 18:16:07'),
(37, 20, 4, 1000, '2019-08-08 23:09:42', '2019-08-08 23:09:42'),
(38, 21, 1, 100, '2019-08-08 23:56:01', '2019-08-08 23:56:01'),
(39, 21, 5, 20, '2019-08-08 23:56:01', '2019-08-08 23:56:01'),
(40, 22, 1, 0, '2019-08-09 03:30:55', '2019-08-09 03:30:55'),
(41, 22, 2, 0, '2019-08-09 03:30:55', '2019-08-09 03:30:55'),
(42, 22, 6, 0, '2019-08-09 03:30:55', '2019-08-09 03:30:55'),
(43, 22, 5, 0, '2019-08-09 03:30:55', '2019-08-09 03:30:55'),
(44, 23, 1, 100, '2019-08-10 18:22:40', '2019-08-10 18:22:40'),
(45, 23, 2, 50, '2019-08-10 18:22:40', '2019-08-10 18:22:40'),
(46, 23, 3, 500, '2019-08-10 18:22:40', '2019-08-10 18:22:40'),
(47, 23, 9, 13, '2019-08-10 18:22:40', '2019-08-10 18:22:40'),
(48, 23, 10, 0.05, '2019-08-10 18:22:40', '2019-08-10 18:22:40'),
(49, 23, 4, 20, '2019-08-10 18:22:40', '2019-08-10 18:22:40'),
(50, 23, 5, 60, '2019-08-10 18:22:40', '2019-08-10 18:22:40'),
(51, 24, 1, 100, '2019-08-12 18:52:08', '2019-08-12 18:52:08'),
(52, 24, 2, 50, '2019-08-12 18:52:08', '2019-08-12 18:52:08'),
(53, 24, 3, 500, '2019-08-12 18:52:08', '2019-08-12 18:52:08'),
(54, 24, 9, 13, '2019-08-12 18:52:08', '2019-08-12 18:52:08'),
(55, 24, 10, 0.05, '2019-08-12 18:52:08', '2019-08-12 18:52:08'),
(56, 24, 4, 20, '2019-08-12 18:52:08', '2019-08-12 18:52:08'),
(57, 24, 5, 60, '2019-08-12 18:52:08', '2019-08-12 18:52:08'),
(58, 25, 22, 135, '2019-08-23 18:36:49', '2019-08-23 18:36:49'),
(59, 25, 23, 15, '2019-08-23 18:36:49', '2019-08-23 18:36:49'),
(60, 25, 4, 500, '2019-08-23 18:36:49', '2019-08-23 18:36:49'),
(61, 25, 5, 30, '2019-08-23 18:36:49', '2019-08-23 18:36:49'),
(62, 25, 24, 381, '2019-08-23 18:36:49', '2019-08-23 18:36:49'),
(63, 26, 22, 135, '2019-08-23 18:36:58', '2019-08-23 18:36:58'),
(64, 26, 23, 15, '2019-08-23 18:36:58', '2019-08-23 18:36:58'),
(65, 26, 4, 500, '2019-08-23 18:36:58', '2019-08-23 18:36:58'),
(66, 26, 5, 30, '2019-08-23 18:36:58', '2019-08-23 18:36:58'),
(67, 26, 24, 381, '2019-08-23 18:36:58', '2019-08-23 18:36:58'),
(68, 27, 22, 135, '2019-08-23 18:37:06', '2019-08-23 18:37:06'),
(69, 27, 23, 15, '2019-08-23 18:37:06', '2019-08-23 18:37:06'),
(70, 27, 4, 500, '2019-08-23 18:37:06', '2019-08-23 18:37:06'),
(71, 27, 5, 30, '2019-08-23 18:37:06', '2019-08-23 18:37:06'),
(72, 27, 24, 381, '2019-08-23 18:37:06', '2019-08-23 18:37:06'),
(73, 28, 22, 135, '2019-08-23 18:37:11', '2019-08-23 18:37:11'),
(74, 28, 23, 15, '2019-08-23 18:37:11', '2019-08-23 18:37:11'),
(75, 28, 4, 500, '2019-08-23 18:37:11', '2019-08-23 18:37:11'),
(76, 28, 5, 30, '2019-08-23 18:37:11', '2019-08-23 18:37:11'),
(77, 28, 24, 381, '2019-08-23 18:37:11', '2019-08-23 18:37:11'),
(78, 30, 25, 30, '2019-09-11 02:53:35', '2019-09-11 02:53:35');

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
(1, 'super-admin', 'Super Administrator', 'superadmin', '', '$2y$10$28.VNVdzTnUG9zEaXIvbKODjlwCtD1Dpo7l7JkqNmsKssIEneZQda', 1, 0, 0, 1, 0, '6EIZy58PsXbMEEmuuGGOeffZWAAutPFUNzpgqUkRHgEhGKal7CVvMeeh5S6A', '2019-07-24 16:43:54', '2019-07-24 16:43:54'),
(2, 'admin', 'Administrator', 'admin', '', '$2y$12$S7o6N6GXDGMJYkWRR4qkpuNbnS.m7vIXCMBDzR5oKc.ypHuf./mbW', 1, 0, 1, 0, 0, 'p3U3gFuRURxDgK5aqKL7ps3T3pZGPHzt0EiZNEr9yU5yYigx85TWcF2KzCqd', '2019-07-24 16:43:54', '2019-07-24 16:43:54'),
(6, 'admin', 'Administrator', 'hoang', '', '$2y$12$S7o6N6GXDGMJYkWRR4qkpuNbnS.m7vIXCMBDzR5oKc.ypHuf./mbW', 1, 0, 1, 0, 0, 'gObe0roFDBzLXQi9OHPz2XsXf9U0d9KfPt5Ljis4CncMS6PNN7Ok8bxg6whg', '2019-07-24 16:43:54', '2019-07-24 16:43:54'),
(7, 'admin', 'Administrator', 'thanh', '', '$2y$12$S7o6N6GXDGMJYkWRR4qkpuNbnS.m7vIXCMBDzR5oKc.ypHuf./mbW', 1, 0, 1, 0, 0, '', '2019-07-24 16:43:54', '2019-07-24 16:43:54'),
(8, 'admin', 'Administrator', 'thang', '', '$2y$12$S7o6N6GXDGMJYkWRR4qkpuNbnS.m7vIXCMBDzR5oKc.ypHuf./mbW', 1, 0, 1, 0, 0, '', '2019-07-24 16:43:54', '2019-07-24 16:43:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cost_hardcapsule`
--
ALTER TABLE `cost_hardcapsule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cost_ingredients`
--
ALTER TABLE `cost_ingredients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cost_labor`
--
ALTER TABLE `cost_labor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cost_laborbottles`
--
ALTER TABLE `cost_laborbottles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cost_typebottles`
--
ALTER TABLE `cost_typebottles`
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
-- Indexes for table `inventory_ingredients`
--
ALTER TABLE `inventory_ingredients`
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
-- Indexes for table `mixing_ass`
--
ALTER TABLE `mixing_ass`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mixing_ingredients`
--
ALTER TABLE `mixing_ingredients`
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
-- Indexes for table `reportcost`
--
ALTER TABLE `reportcost`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reportformula`
--
ALTER TABLE `reportformula`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reportinventory`
--
ALTER TABLE `reportinventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reportmixing`
--
ALTER TABLE `reportmixing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reportquotation`
--
ALTER TABLE `reportquotation`
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
-- AUTO_INCREMENT for table `cost_hardcapsule`
--
ALTER TABLE `cost_hardcapsule`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cost_ingredients`
--
ALTER TABLE `cost_ingredients`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `cost_labor`
--
ALTER TABLE `cost_labor`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cost_laborbottles`
--
ALTER TABLE `cost_laborbottles`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cost_typebottles`
--
ALTER TABLE `cost_typebottles`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `customrequest`
--
ALTER TABLE `customrequest`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `formula`
--
ALTER TABLE `formula`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `formula_ingredients`
--
ALTER TABLE `formula_ingredients`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `ingredient`
--
ALTER TABLE `ingredient`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `inventory_ingredients`
--
ALTER TABLE `inventory_ingredients`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
-- AUTO_INCREMENT for table `mixing_ass`
--
ALTER TABLE `mixing_ass`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `mixing_ingredients`
--
ALTER TABLE `mixing_ingredients`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reportcost`
--
ALTER TABLE `reportcost`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reportformula`
--
ALTER TABLE `reportformula`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reportinventory`
--
ALTER TABLE `reportinventory`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reportmixing`
--
ALTER TABLE `reportmixing`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reportquotation`
--
ALTER TABLE `reportquotation`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `salesorder_comments`
--
ALTER TABLE `salesorder_comments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `salesorder_ingredients`
--
ALTER TABLE `salesorder_ingredients`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
