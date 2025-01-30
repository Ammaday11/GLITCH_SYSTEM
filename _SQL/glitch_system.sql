-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2025 at 12:16 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `glitch_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `glitches`
--

CREATE TABLE `glitches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `room_no` varchar(191) NOT NULL,
  `guest_name` varchar(191) DEFAULT NULL,
  `arrival_date` varchar(191) DEFAULT NULL,
  `departure_date` varchar(191) DEFAULT NULL,
  `category` enum('General request','Complaint','Issue') NOT NULL,
  `glitch_type` varchar(191) NOT NULL DEFAULT 'Undefined',
  `title` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `status` enum('Pending','Ongoing','Resolved','Follow-up Pending','Suspended') NOT NULL DEFAULT 'Pending',
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `follow_up_by` varchar(191) DEFAULT NULL,
  `follow_up_at` timestamp NULL DEFAULT NULL,
  `guest_satisfaction` varchar(191) NOT NULL DEFAULT 'Undefined',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `glitch_types`
--

CREATE TABLE `glitch_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `glitch_types`
--

INSERT INTO `glitch_types` (`id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'AC', '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(2, 'Room Amenities on RQ', '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(3, 'Medical', '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(4, 'Smell', '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(5, 'Wi-Fi', '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(6, 'Buggy Request', '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(7, 'TV', '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(8, 'Cleaning', '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(9, 'Mini Bar', '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(10, 'Room Amenities', '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(11, 'Lost', '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(12, 'Assistance', '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(13, 'Maintenance', '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(14, 'Clearance', '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(15, 'Key Card', '2025-01-26 11:15:52', '2025-01-26 11:15:52');

-- --------------------------------------------------------

--
-- Table structure for table `guests`
--

CREATE TABLE `guests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_No` varchar(191) NOT NULL,
  `guest_name` varchar(191) DEFAULT NULL,
  `arrival_date` varchar(191) DEFAULT NULL,
  `departure_date` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guests`
--

INSERT INTO `guests` (`id`, `room_No`, `guest_name`, `arrival_date`, `departure_date`, `created_at`, `updated_at`) VALUES
(1, '101', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(2, '102', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(3, '103', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(4, '104', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(5, '105', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(6, '106', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(7, '107', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(8, '108', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(9, '109', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(10, '110', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(11, '111', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(12, '112', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(13, '114', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(14, '115', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(15, '116', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(16, '117', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(17, '118', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(18, '119', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(19, '120', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(20, '121', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(21, '122', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(22, '123', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(23, '124', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(24, '125', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(25, '126', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(26, '127', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(27, '128', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(28, '129', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(29, '130', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(30, '131', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(31, '132', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(32, '133', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(33, '134', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(34, '201', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(35, '202', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(36, '203', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(37, '204', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(38, '205', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(39, '206', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(40, '207', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(41, '208', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(42, '209', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(43, '210', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(44, '211', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(45, '212', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(46, '214', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(47, '215', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(48, '216', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(49, '217', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(50, '218', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(51, '219', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(52, '220', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(53, '221', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(54, '222', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(55, '223', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(56, '224', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(57, '225', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(58, '226', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(59, '227', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(60, '228', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(61, '229', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(62, '230', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(63, '231', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(64, '232', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(65, '233', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(66, '234', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(67, '235', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(68, '236', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(69, '237', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(70, '238', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(71, '301', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(72, '302', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(73, '303', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(74, '304', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(75, '305', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(76, '306', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(77, '307', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(78, '308', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(79, '309', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(80, '310', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(81, '311', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(82, '312', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(83, '314', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(84, '315', 'TBA', NULL, NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(85, '316', 'TBA', NULL, NULL, '2025-01-26 11:15:53', '2025-01-26 11:15:53'),
(86, '317', 'TBA', NULL, NULL, '2025-01-26 11:15:53', '2025-01-26 11:15:53'),
(87, '318', 'TBA', NULL, NULL, '2025-01-26 11:15:53', '2025-01-26 11:15:53'),
(88, '319', 'TBA', NULL, NULL, '2025-01-26 11:15:53', '2025-01-26 11:15:53'),
(89, '320', 'TBA', NULL, NULL, '2025-01-26 11:15:53', '2025-01-26 11:15:53'),
(90, '321', 'TBA', NULL, NULL, '2025-01-26 11:15:53', '2025-01-26 11:15:53'),
(91, '322', 'TBA', NULL, NULL, '2025-01-26 11:15:53', '2025-01-26 11:15:53'),
(92, '323', 'TBA', NULL, NULL, '2025-01-26 11:15:53', '2025-01-26 11:15:53'),
(93, '324', 'TBA', NULL, NULL, '2025-01-26 11:15:53', '2025-01-26 11:15:53'),
(94, '325', 'TBA', NULL, NULL, '2025-01-26 11:15:53', '2025-01-26 11:15:53'),
(95, '327', 'TBA', NULL, NULL, '2025-01-26 11:15:53', '2025-01-26 11:15:53'),
(96, '329', 'TBA', NULL, NULL, '2025-01-26 11:15:53', '2025-01-26 11:15:53'),
(97, '331', 'TBA', NULL, NULL, '2025-01-26 11:15:53', '2025-01-26 11:15:53'),
(98, '333', 'TBA', NULL, NULL, '2025-01-26 11:15:53', '2025-01-26 11:15:53'),
(99, '335', 'TBA', NULL, NULL, '2025-01-26 11:15:53', '2025-01-26 11:15:53'),
(100, '337', 'TBA', NULL, NULL, '2025-01-26 11:15:53', '2025-01-26 11:15:53');

-- --------------------------------------------------------

--
-- Table structure for table `guest_satisfactions`
--

CREATE TABLE `guest_satisfactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `guest_satisfaction` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guest_satisfactions`
--

INSERT INTO `guest_satisfactions` (`id`, `guest_satisfaction`, `created_at`, `updated_at`) VALUES
(1, 'Happy', '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(2, 'Very Happy', '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(3, 'Not Satisfied', '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(4, 'Complaint', '2025-01-26 11:15:52', '2025-01-26 11:15:52');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_03_02_072347_create_employees_table', 1),
(7, '2024_03_02_104136_create_glitches_table', 1),
(8, '2025_01_10_111229_create_permission_tables', 1),
(9, '2025_01_12_104905_create_guests_table', 1),
(10, '2025_01_23_162414_create_staff_table', 1),
(11, '2025_01_25_111759_create_glitch_types_table', 1),
(12, '2025_01_25_175141_create_guest_satisfactions_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `guard_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'view_users', 'web', '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(2, 'manage_users', 'web', '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(3, 'change_password', 'web', '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(4, 'view_roles', 'web', '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(5, 'manage_roles', 'web', '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(6, 'update_guestlist', 'web', '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(7, 'view_reports', 'web', '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(8, 'create_glitch', 'web', '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(9, 'modify_glitch', 'web', '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(10, 'suspend_glitch', 'web', '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(11, 'view_glitch', 'web', '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(12, 'view_glitch_list', 'web', '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(13, 'delete_glitch', 'web', '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(14, 'manage_staff', 'web', '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(15, 'manage_glitch_types', 'web', '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(16, 'create_glitch_types', 'web', '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(17, 'manage_guest_satisfactions', 'web', '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(18, 'create_guest_satisfactions', 'web', '2025-01-26 11:15:52', '2025-01-26 11:15:52');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `guard_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'web', '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(2, 'Manager', 'web', '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(3, 'Staff', 'web', '2025-01-26 11:15:52', '2025-01-26 11:15:52');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(3, 2),
(3, 3),
(4, 1),
(5, 1),
(6, 1),
(6, 2),
(6, 3),
(7, 1),
(7, 2),
(7, 3),
(8, 1),
(8, 2),
(8, 3),
(9, 1),
(9, 2),
(9, 3),
(10, 1),
(10, 2),
(11, 1),
(11, 2),
(11, 3),
(12, 1),
(12, 2),
(12, 3),
(13, 1),
(13, 2),
(14, 1),
(14, 2),
(15, 1),
(16, 1),
(16, 2),
(16, 3),
(17, 1),
(17, 2),
(18, 1),
(18, 2),
(18, 3);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Adam', '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(2, 'Asel', '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(3, 'Azeeza', '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(4, 'Hawwa', '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(5, 'Juan', '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(6, 'KB', '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(7, 'Saaidh', '2025-01-26 11:15:52', '2025-01-26 11:15:52'),
(8, 'Zarenna', '2025-01-26 11:15:52', '2025-01-26 11:15:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bwlmNo` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `bwlmNo`, `name`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'BWLM0156', 'Ahmed Shafeeu', '$2y$10$gZvWXkf8C8J6e9rUad9To.Tj4dfVvHsiQF6UAm2YxWB/2f.RVpNZe', NULL, '2025-01-26 11:15:52', '2025-01-26 11:15:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_user_id_unique` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `glitches`
--
ALTER TABLE `glitches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `glitch_types`
--
ALTER TABLE `glitch_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `glitch_types_type_unique` (`type`);

--
-- Indexes for table `guests`
--
ALTER TABLE `guests`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `guests_room_no_unique` (`room_No`);

--
-- Indexes for table `guest_satisfactions`
--
ALTER TABLE `guest_satisfactions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `guest_satisfactions_guest_satisfaction_unique` (`guest_satisfaction`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `staff_name_unique` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_bwlmno_unique` (`bwlmNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `glitches`
--
ALTER TABLE `glitches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `glitch_types`
--
ALTER TABLE `glitch_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `guests`
--
ALTER TABLE `guests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `guest_satisfactions`
--
ALTER TABLE `guest_satisfactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
