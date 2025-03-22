
CREATE DATABASE pitpos_testing;
USE pitpos_testing;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2025 at 04:05 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pitpos`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `status_id` tinyint(4) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_user` smallint(6) NOT NULL,
  `updated_user` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status_id`, `created_date`, `updated_date`, `created_user`, `updated_user`) VALUES
(1, 'Dishwashing Liquid', 1, '2025-03-18 04:17:23', '2025-03-18 04:17:23', 1, 1),
(2, 'Detergent', 1, '2025-03-18 04:17:23', '2025-03-18 04:17:23', 1, 1),
(3, 'Softdrinks', 1, '2025-03-18 04:17:23', '2025-03-18 04:17:23', 1, 1),
(4, 'Chips', 1, '2025-03-18 04:17:23', '2025-03-18 04:17:23', 1, 1),
(5, 'Biscuits', 1, '2025-03-18 04:17:23', '2025-03-18 04:17:23', 1, 1),
(6, 'Energy Drink', 1, '2025-03-18 04:17:23', '2025-03-18 04:17:23', 1, 1);

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_03_18_000000_create_tables', 1),
(5, '2025_03_19_053749_create_personal_access_tokens_table', 2),
(6, '2025_03_19_083450_create_roles_table', 3),
(7, '2025_03_19_083857_add_user_type_to_users_table', 4);

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
  `name` varchar(100) NOT NULL,
  `description` varchar(300) NOT NULL,
  `status_id` smallint(6) NOT NULL,
  `category_id` smallint(6) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_user` smallint(6) NOT NULL,
  `updated_user` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `status_id`, `category_id`, `created_at`, `updated_at`, `created_user`, `updated_user`) VALUES
(1, 'Sunlight Lemon', 'Sunlight Lemon Description', 2, 1, '2025-03-18 04:20:04', '2025-03-18 12:44:34', 1, 1),
(2, 'Joy Antibac', 'Joy Antibac Description', 1, 1, '2025-03-18 04:20:04', '2025-03-18 04:20:04', 1, 1),
(3, 'Axion Dish Paste', 'Axion Dish Paste Description', 1, 1, '2025-03-18 04:20:04', '2025-03-18 04:20:04', 1, 1),
(4, 'Mama Lemon', 'Mama Lemon Description', 1, 1, '2025-03-18 04:20:04', '2025-03-18 04:20:04', 1, 1),
(5, 'Tide Powder', 'Tide Powder Description', 1, 2, '2025-03-18 04:20:04', '2025-03-18 04:20:04', 1, 1),
(6, 'Ariel Pods', 'Ariel Pods Description', 1, 2, '2025-03-18 04:20:04', '2025-03-18 04:20:04', 1, 1),
(7, 'Downy Liquid', 'Downy Liquid Description', 1, 2, '2025-03-18 04:20:04', '2025-03-18 04:20:04', 1, 1),
(8, 'Surf Detergent Bar', 'Surf Detergent Bar Description', 1, 2, '2025-03-18 04:20:04', '2025-03-18 04:20:04', 1, 1),
(9, 'Coca-Cola', 'Coca-Cola Description', 1, 3, '2025-03-18 04:20:04', '2025-03-18 04:20:04', 1, 1),
(10, 'Pepsi', 'Pepsi Description', 1, 3, '2025-03-18 04:20:04', '2025-03-18 04:20:04', 1, 1),
(11, 'Sprite', 'Sprite Description', 1, 3, '2025-03-18 04:20:04', '2025-03-18 04:20:04', 1, 1),
(12, 'Royal Orange', 'Royal Orange Description', 1, 3, '2025-03-18 04:20:04', '2025-03-18 04:20:04', 1, 1),
(13, 'Lays Classic', 'Lays Classic Description', 1, 4, '2025-03-18 04:20:04', '2025-03-18 04:20:04', 1, 1),
(14, 'Doritos Nacho Cheese', 'Doritos Nacho Cheese Description', 1, 4, '2025-03-18 04:20:04', '2025-03-18 04:20:04', 1, 1),
(15, 'Pringles Original', 'Pringles Original Description', 1, 4, '2025-03-18 04:20:04', '2025-03-18 04:20:04', 1, 1),
(16, 'Cheetos Puffs', 'Cheetos Puffs Description', 1, 4, '2025-03-18 04:20:04', '2025-03-18 04:20:04', 1, 1),
(17, 'Oreo Chocolate', 'Oreo Chocolate Description', 1, 5, '2025-03-18 04:20:04', '2025-03-18 04:20:04', 1, 1),
(18, 'Chips Ahoy', 'Chips Ahoy Description', 1, 5, '2025-03-18 04:20:04', '2025-03-18 04:20:04', 1, 1),
(19, 'Marie Biscuits', 'Marie Biscuits Description', 1, 5, '2025-03-18 04:20:04', '2025-03-18 04:20:04', 1, 1),
(20, 'Skyflakes Crackers', 'Skyflakes Crackers Description', 1, 5, '2025-03-18 04:20:04', '2025-03-18 04:20:04', 1, 1),
(21, 'Red Bull', 'Red Bull Description', 1, 6, '2025-03-18 04:20:04', '2025-03-18 04:20:04', 1, 1),
(22, 'Monster Energy', 'Monster Energy Description', 1, 6, '2025-03-18 04:20:04', '2025-03-18 04:20:04', 1, 1),
(23, 'Gatorade Blue Bolt', 'Gatorade Blue Bolt Description', 1, 6, '2025-03-18 04:20:04', '2025-03-18 04:20:04', 1, 1),
(24, 'Powerade Mountain Blast', 'Powerade Mountain Blast Description', 1, 6, '2025-03-18 04:20:04', '2025-03-18 04:20:04', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_user` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_user` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `status_id`, `created_at`, `updated_at`, `created_user`, `updated_user`) VALUES
(1, 'admin', 1, '2025-03-19 00:37:38', '2025-03-19 00:37:38', 1, 1),
(2, 'user', 1, '2025-03-19 00:37:38', '2025-03-19 00:37:38', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('0VJKORTpyiMSRA98PfcQ30b9QnyfzzpfQByjGVsu', NULL, '127.0.0.1', 'PostmanRuntime/7.43.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUDNObzNLOGNSZVdZM3VJNERVaG9qWE9TcWprZENIdFJVcnBYYUdkTiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742306168),
('R1a2NVJwipPZZt0iMPzQSngVfvQ5s7FNZVP9oftl', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 Edg/134.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYXV3a1A4VjFIQVZLVnZONG9xSXdsMlZ6RTFnTFdrRng1ZjhTWnVseCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9wcm9kdWN0cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742301877),
('uhCjsE5K9ldpt97n918IXLKFe8gwvAGKnVYN2QhN', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 Edg/134.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSTE0MXUxTnBMQUlPUkFKb3FFY1RGd3Ayc3p4Y29LMDdHWFlVS0M3QyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fX0=', 1742369332),
('x18HIFmWUB74PiXwm1PytkX7YgG1khUx5pThC3ek', NULL, '127.0.0.1', 'PostmanRuntime/7.43.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVldFNG9RRkhtODF6Nnp4Nktxb0FYR1Z5YjRVd25IYUlVVTJwMUNyTCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742305667),
('ZgHnuIo3cM0QMSRClyWj73n7pTMvivWiKhRaOWC5', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 Edg/134.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMEVjR2hmaThBRk5ncm9EYVEzUGgxSkhtajNEVWVRdFZRRXB2aFg4QiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9wcm9kdWN0cyI7fX0=', 1742361990);

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_user` smallint(6) NOT NULL,
  `updated_user` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `name`, `created_date`, `updated_date`, `created_user`, `updated_user`) VALUES
(1, 'active', '2025-03-18 04:17:23', '2025-03-18 04:17:23', 1, 1),
(2, 'inactive', '2025-03-18 04:17:23', '2025-03-18 04:17:23', 1, 1),
(3, 'open', '2025-03-18 04:17:23', '2025-03-18 04:17:23', 1, 1),
(4, 'closed', '2025-03-18 04:17:23', '2025-03-18 04:17:23', 1, 1),
(5, 'complete', '2025-03-18 04:17:23', '2025-03-18 04:17:23', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `unit_of_measures`
--

CREATE TABLE `unit_of_measures` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `status_id` smallint(6) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `set_as_default` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_user` smallint(6) NOT NULL,
  `updated_user` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unit_of_measures`
--

INSERT INTO `unit_of_measures` (`id`, `name`, `status_id`, `price`, `set_as_default`, `created_at`, `updated_at`, `created_user`, `updated_user`) VALUES
(1, 'Gram', 1, '10.00', 1, '2025-03-18 06:11:01', '2025-03-18 06:11:01', 1, 1),
(2, 'Kg', 1, '5.00', 1, '2025-03-18 06:11:34', '2025-03-18 06:12:01', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_type` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `user_type`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test User', 'test@example.com', 1, '2025-03-18 04:14:47', '$2y$12$gcp5jMBuVqJW/3ur1st66e4TTcLgmSNRkWuwB/kbN/JtXNhaPLwvm', 'oqh2PUxSYe', '2025-03-18 04:14:47', '2025-03-18 04:14:47'),
(2, 'apit test now', 'lalibasser@gmail.com', 1, NULL, '$2y$12$BUN9PTNN72OCY5xuTGUNc..3YaN2g49Nit1YhW3kTdwdkaYilBIye', NULL, '2025-03-18 21:26:09', '2025-03-18 21:26:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roles_created_user_foreign` (`created_user`),
  ADD KEY `roles_updated_user_foreign` (`updated_user`),
  ADD KEY `roles_status_id_index` (`status_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit_of_measures`
--
ALTER TABLE `unit_of_measures`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `unit_of_measures`
--
ALTER TABLE `unit_of_measures`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_created_user_foreign` FOREIGN KEY (`created_user`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `roles_updated_user_foreign` FOREIGN KEY (`updated_user`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
