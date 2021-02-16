-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 07, 2020 at 04:07 AM
-- Server version: 8.0.21-0ubuntu0.20.04.4
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `covid_19`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `institutions`
--

CREATE TABLE `institutions` (
  `id_institution` int UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` int NOT NULL DEFAULT '0',
  `city` int NOT NULL DEFAULT '0',
  `union` int NOT NULL DEFAULT '0',
  `word` int NOT NULL DEFAULT '0',
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `institutions`
--

INSERT INTO `institutions` (`id_institution`, `name`, `address_details`, `district_name`, `type`, `city`, `union`, `word`, `latitude`, `longitude`, `phone`, `mobile`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Shohidur Rahman', 'sdasdsad shohid', '1', 1, 1, 212, 121, 'asdsd', 'asdsad', 'sadsa', NULL, 'asdsa', 1, '2020-09-03 00:36:11', '2020-09-03 00:39:31');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id_menu` int UNSIGNED NOT NULL,
  `is_display` tinyint NOT NULL DEFAULT '0',
  `parent_id` int DEFAULT NULL,
  `is_active` tinyint NOT NULL DEFAULT '0',
  `order_id` int NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uri` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wrap_group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wrap_group_level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id_menu`, `is_display`, `parent_id`, `is_active`, `order_id`, `name`, `uri`, `route_name`, `description`, `wrap_group`, `wrap_group_level`, `icon`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 1, 0, 'Setting Parent', 'setting_parent', 'setting_parent', 'Setting Parent', 'setting_parent', 'Settings', '', '2020-09-02 03:09:37', '2020-09-02 03:09:37'),
(2, 0, 0, 1, 0, 'login', 'login', 'login', 'Function showLoginForm of LoginController Controller', 'LoginController', 'LoginController', '', '2020-09-02 03:09:37', '2020-09-02 03:09:37'),
(3, 0, 0, 1, 0, 'logout', 'logout', 'logout', 'Function logout of LoginController Controller', 'LoginController', 'LoginController', '', '2020-09-02 03:09:37', '2020-09-02 03:09:37'),
(4, 0, 0, 1, 0, 'register', 'register', 'register', 'Function showRegistrationForm of RegisterController Controller', 'RegisterController', 'RegisterController', '', '2020-09-02 03:09:37', '2020-09-02 03:09:37'),
(5, 0, 0, 1, 0, 'password.request', 'password/reset', 'password.request', 'Function showLinkRequestForm of ForgotPasswordController Controller', 'ForgotPasswordController', 'ForgotPasswordController', '', '2020-09-02 03:09:38', '2020-09-02 03:09:38'),
(6, 0, 0, 1, 0, 'password.email', 'password/email', 'password.email', 'Function sendResetLinkEmail of ForgotPasswordController Controller', 'ForgotPasswordController', 'ForgotPasswordController', '', '2020-09-02 03:09:38', '2020-09-02 03:09:38'),
(7, 0, 0, 1, 0, 'password.reset', 'password/reset/{token}', 'password.reset', 'Function showResetForm of ResetPasswordController Controller', 'ResetPasswordController', 'ResetPasswordController', '', '2020-09-02 03:09:38', '2020-09-02 03:09:38'),
(8, 0, 0, 1, 0, 'password.update', 'password/reset', 'password.update', 'Function reset of ResetPasswordController Controller', 'ResetPasswordController', 'ResetPasswordController', '', '2020-09-02 03:09:38', '2020-09-02 03:09:38'),
(9, 0, 0, 1, 0, 'password.confirm', 'password/confirm', 'password.confirm', 'Function showConfirmForm of ConfirmPasswordController Controller', 'ConfirmPasswordController', 'ConfirmPasswordController', '', '2020-09-02 03:09:38', '2020-09-02 03:09:38'),
(10, 0, 0, 1, 0, 'home', '/', 'home', 'Function index of HomeController Controller', 'HomeController', 'HomeController', '', '2020-09-02 03:09:38', '2020-09-02 03:09:38'),
(11, 1, 1, 1, 1, 'Role List', 'role', 'role_index', 'Role List', 'Role', 'Roles', '', '2020-09-02 03:09:38', '2020-09-02 03:09:38'),
(12, 0, 1, 1, 0, 'Role Create', 'role/create', 'role_create', 'Role Create', 'Role', 'Roles', '', '2020-09-02 03:09:38', '2020-09-02 03:09:38'),
(13, 0, 1, 1, 0, 'Role Store', 'role/create', 'role_create_action', 'Role Store', 'Role', 'Roles', '', '2020-09-02 03:09:39', '2020-09-02 03:09:39'),
(14, 0, 1, 1, 0, 'Role Edit', 'role/edit/{id}', 'role_edit', 'Role Edit', 'Role', 'Roles', '', '2020-09-02 03:09:39', '2020-09-02 03:09:39'),
(15, 0, 1, 1, 0, 'Role Update', 'role/edit/{id}', 'role_edit_action', 'Role Update', 'Role', 'Roles', '', '2020-09-02 03:09:39', '2020-09-02 03:09:39'),
(16, 0, 1, 1, 0, 'Role Delete', 'role/delete/{id}', 'role_delete', 'Role Delete', 'Role', 'Roles', '', '2020-09-02 03:09:39', '2020-09-02 03:09:39'),
(17, 0, 1, 1, 0, 'Role Status', 'role/status/{id}', 'role_status', 'Role Status', 'Role', 'Roles', '', '2020-09-02 03:09:39', '2020-09-02 03:09:39'),
(18, 0, 1, 1, 0, 'Role Permission', 'role/permission', 'role_permission', 'Role Permission', 'Role', 'Roles', '', '2020-09-02 03:09:39', '2020-09-02 03:09:39'),
(19, 0, 1, 1, 0, 'Get Ajax Role Permission', 'role/getpermission', 'get_role_permission', 'Get Ajax Role Permission', 'Role', 'Roles', '', '2020-09-02 03:09:39', '2020-09-02 03:09:39'),
(20, 0, 1, 1, 0, 'Role Permission store', 'role/permission', 'role_permission_store', 'Role Permission store', 'Role', 'Roles', '', '2020-09-02 03:09:40', '2020-09-02 03:09:40'),
(21, 1, 1, 1, 1, 'Institution', 'institution', 'institution_index', 'Institution', 'institution', 'institution', '', '2020-09-02 03:09:40', '2020-09-02 03:09:40'),
(22, 1, 1, 1, 1, 'Package', 'package', 'package_index', 'Package', 'package', 'package', '', '2020-09-02 03:09:40', '2020-09-02 03:09:40'),
(23, 1, 1, 1, 1, 'Msmetype', 'msmetype', 'msmetype_index', 'Msmetype', 'msmetype', 'msmetype', '', '2020-09-02 03:09:40', '2020-09-02 03:09:40'),
(24, 0, 0, 1, 0, 'AdminTemplateController_index', 'kamruljpi/admintemplate', 'AdminTemplateController_index', 'Function index of AdminTemplateController Controller', 'AdminTemplateController', 'AdminTemplateController', '', '2020-09-02 03:09:40', '2020-09-02 03:09:40'),
(25, 0, 0, 1, 0, 'LoginController_login', 'login', 'LoginController_login', 'Function login of LoginController Controller', 'LoginController', 'LoginController', '', '2020-09-02 03:09:40', '2020-09-02 03:09:40'),
(26, 0, 0, 1, 0, 'RegisterController_register', 'register', 'RegisterController_register', 'Function register of RegisterController Controller', 'RegisterController', 'RegisterController', '', '2020-09-02 03:09:40', '2020-09-02 03:09:40'),
(27, 0, 0, 1, 0, 'ConfirmPasswordController_confirm', 'password/confirm', 'ConfirmPasswordController_confirm', 'Function confirm of ConfirmPasswordController Controller', 'ConfirmPasswordController', 'ConfirmPasswordController', '', '2020-09-02 03:09:40', '2020-09-02 03:09:40');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2018_11_27_092305_create_menu', 2),
(5, '2018_11_27_101816_create_role', 2),
(6, '2018_11_27_123039_create_user_role_menu', 2),
(7, '2020_02_25_09123456_alter_user_for_role', 2),
(8, '2020_09_02_115032_create_institution_table', 3),
(9, '2020_09_02_115032_create_msmetype_table', 3),
(10, '2020_09_02_115032_create_package_table', 3),
(11, '2020_09_06_043623_add_new_field_user_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `msmetypes`
--

CREATE TABLE `msmetypes` (
  `id_msmetype` int UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `msmetypes`
--

INSERT INTO `msmetypes` (`id_msmetype`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', 2, NULL, '2020-09-03 00:41:37');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id_package` int UNSIGNED NOT NULL,
  `package_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `package_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `packages_for` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loan_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_districts` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_audience` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id_package`, `package_name`, `package_description`, `packages_for`, `package_amount`, `loan_amount`, `package_districts`, `package_audience`, `start_date`, `end_date`, `status`, `created_at`, `updated_at`) VALUES
(2, 'asdasd', 'aaaaaa', 'asdasd', 'asdasd', 'asdsad', '1', '1', '2020-09-03', '2020-09-03', 1, '2020-09-02 22:11:49', '2020-09-03 00:40:29');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id_role` int UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` int NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id_role`, `name`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 1, NULL, '2020-09-02 04:33:11', '2020-09-01 23:32:19'),
(2, 'Shohidur Rahman', 1, NULL, '2020-09-01 23:30:42', '2020-09-02 02:15:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_role_id` int DEFAULT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `national_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int NOT NULL DEFAULT '0',
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `user_role_id`, `user_name`, `first_name`, `last_name`, `national_id`, `mobile_no`, `status`, `picture`) VALUES
(1, 'Shohidur Rahman', 'sohidurr49@gmail.com', NULL, '$2y$10$vqRRb4so4voQMHXX6JBcFOf7yZxT//tLVsTlc6BEeODENprVarMWe', 'RscK4X8UACCPzZTdy5uvdNluyA8vgdOfeF3GlImizyfsZXfo7k1dX6r5tsdd', '2020-09-01 00:46:48', '2020-09-01 00:46:48', 1, NULL, NULL, NULL, NULL, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_role_menus`
--

CREATE TABLE `user_role_menus` (
  `id_user_role_menu` int UNSIGNED NOT NULL,
  `role_id` int DEFAULT NULL,
  `route_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_role_menus`
--

INSERT INTO `user_role_menus` (`id_user_role_menu`, `role_id`, `route_name`, `is_active`, `created_at`, `updated_at`) VALUES
(73, 2, 'setting_parent', 1, '2020-09-01 23:31:02', '2020-09-01 23:31:02'),
(74, 2, 'login', 1, '2020-09-01 23:31:02', '2020-09-01 23:31:02'),
(75, 2, 'logout', 1, '2020-09-01 23:31:02', '2020-09-01 23:31:02'),
(76, 2, 'LoginController_login', 1, '2020-09-01 23:31:02', '2020-09-01 23:31:02'),
(77, 2, 'register', 1, '2020-09-01 23:31:03', '2020-09-01 23:31:03'),
(78, 2, 'RegisterController_register', 1, '2020-09-01 23:31:03', '2020-09-01 23:31:03'),
(79, 2, 'password.request', 1, '2020-09-01 23:31:03', '2020-09-01 23:31:03'),
(80, 2, 'password.email', 1, '2020-09-01 23:31:03', '2020-09-01 23:31:03'),
(81, 2, 'password.reset', 1, '2020-09-01 23:31:03', '2020-09-01 23:31:03'),
(82, 2, 'password.update', 1, '2020-09-01 23:31:03', '2020-09-01 23:31:03'),
(83, 2, 'password.confirm', 1, '2020-09-01 23:31:04', '2020-09-01 23:31:04'),
(84, 2, 'ConfirmPasswordController_confirm', 1, '2020-09-01 23:31:04', '2020-09-01 23:31:04'),
(85, 2, 'role_index', 1, '2020-09-01 23:31:04', '2020-09-01 23:31:04'),
(86, 2, 'role_create', 1, '2020-09-01 23:31:04', '2020-09-01 23:31:04'),
(87, 2, 'role_create_action', 1, '2020-09-01 23:31:04', '2020-09-01 23:31:04'),
(88, 2, 'role_edit', 1, '2020-09-01 23:31:04', '2020-09-01 23:31:04'),
(89, 2, 'role_edit_action', 1, '2020-09-01 23:31:04', '2020-09-01 23:31:04'),
(90, 2, 'role_delete', 1, '2020-09-01 23:31:04', '2020-09-01 23:31:04'),
(91, 2, 'role_status', 1, '2020-09-01 23:31:05', '2020-09-01 23:31:05'),
(92, 2, 'role_permission', 1, '2020-09-01 23:31:05', '2020-09-01 23:31:05'),
(93, 2, 'get_role_permission', 1, '2020-09-01 23:31:05', '2020-09-01 23:31:05'),
(94, 2, 'role_permission_store', 1, '2020-09-01 23:31:05', '2020-09-01 23:31:05'),
(95, 2, 'AdminTemplateController_index', 1, '2020-09-01 23:31:05', '2020-09-01 23:31:05'),
(120, 1, 'setting_parent', 1, '2020-09-02 03:10:41', '2020-09-02 03:10:41'),
(121, 1, 'login', 1, '2020-09-02 03:10:42', '2020-09-02 03:10:42'),
(122, 1, 'logout', 1, '2020-09-02 03:10:42', '2020-09-02 03:10:42'),
(123, 1, 'LoginController_login', 1, '2020-09-02 03:10:42', '2020-09-02 03:10:42'),
(124, 1, 'register', 1, '2020-09-02 03:10:42', '2020-09-02 03:10:42'),
(125, 1, 'RegisterController_register', 1, '2020-09-02 03:10:42', '2020-09-02 03:10:42'),
(126, 1, 'password.request', 1, '2020-09-02 03:10:42', '2020-09-02 03:10:42'),
(127, 1, 'password.email', 1, '2020-09-02 03:10:43', '2020-09-02 03:10:43'),
(128, 1, 'password.reset', 1, '2020-09-02 03:10:43', '2020-09-02 03:10:43'),
(129, 1, 'password.update', 1, '2020-09-02 03:10:43', '2020-09-02 03:10:43'),
(130, 1, 'password.confirm', 1, '2020-09-02 03:10:43', '2020-09-02 03:10:43'),
(131, 1, 'ConfirmPasswordController_confirm', 1, '2020-09-02 03:10:43', '2020-09-02 03:10:43'),
(132, 1, 'home', 1, '2020-09-02 03:10:43', '2020-09-02 03:10:43'),
(133, 1, 'role_index', 1, '2020-09-02 03:10:43', '2020-09-02 03:10:43'),
(134, 1, 'role_create', 1, '2020-09-02 03:10:43', '2020-09-02 03:10:43'),
(135, 1, 'role_create_action', 1, '2020-09-02 03:10:43', '2020-09-02 03:10:43'),
(136, 1, 'role_edit', 1, '2020-09-02 03:10:44', '2020-09-02 03:10:44'),
(137, 1, 'role_edit_action', 1, '2020-09-02 03:10:44', '2020-09-02 03:10:44'),
(138, 1, 'role_delete', 1, '2020-09-02 03:10:44', '2020-09-02 03:10:44'),
(139, 1, 'role_status', 1, '2020-09-02 03:10:44', '2020-09-02 03:10:44'),
(140, 1, 'role_permission', 1, '2020-09-02 03:10:44', '2020-09-02 03:10:44'),
(141, 1, 'get_role_permission', 1, '2020-09-02 03:10:44', '2020-09-02 03:10:44'),
(142, 1, 'role_permission_store', 1, '2020-09-02 03:10:44', '2020-09-02 03:10:44'),
(143, 1, 'institution_index', 1, '2020-09-02 03:10:44', '2020-09-02 03:10:44'),
(144, 1, 'package_index', 1, '2020-09-02 03:10:45', '2020-09-02 03:10:45'),
(145, 1, 'msmetype_index', 1, '2020-09-02 03:10:45', '2020-09-02 03:10:45'),
(146, 1, 'AdminTemplateController_index', 1, '2020-09-02 03:10:45', '2020-09-02 03:10:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `institutions`
--
ALTER TABLE `institutions`
  ADD PRIMARY KEY (`id_institution`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `msmetypes`
--
ALTER TABLE `msmetypes`
  ADD PRIMARY KEY (`id_msmetype`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id_package`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_role_menus`
--
ALTER TABLE `user_role_menus`
  ADD PRIMARY KEY (`id_user_role_menu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `institutions`
--
ALTER TABLE `institutions`
  MODIFY `id_institution` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id_menu` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `msmetypes`
--
ALTER TABLE `msmetypes`
  MODIFY `id_msmetype` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id_package` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id_role` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_role_menus`
--
ALTER TABLE `user_role_menus`
  MODIFY `id_user_role_menu` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
