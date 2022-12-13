-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2022 at 07:59 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `larabangla`
--

-- --------------------------------------------------------

--
-- Table structure for table `chapters`
--

CREATE TABLE `chapters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `technology_id` bigint(20) UNSIGNED NOT NULL,
  `version_id` bigint(20) UNSIGNED NOT NULL,
  `order` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1 for active, 0 for deactivate',
  `keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Keywords for SEO',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chapters`
--

INSERT INTO `chapters` (`id`, `technology_id`, `version_id`, `order`, `name`, `slug`, `status`, `keywords`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 1, 'শুরি করছি', 'getting-started', 1, 'boostrap getting started,bootstrap begain', '2022-12-12 23:58:56', '2022-12-12 23:58:56', NULL),
(2, 2, 2, 2, 'শুরি করছি', 'get-started', 1, 'laravel 9x get strated,laravel get started', '2022-12-13 00:06:08', '2022-12-13 00:06:08', NULL),
(3, 3, 3, 3, 'ব্যাকগ্রাউন্ড', 'background', 1, 'css background', '2022-12-13 00:29:50', '2022-12-13 00:29:50', NULL),
(4, 4, 7, 4, 'শুরি করছি', 'getting-started-vue js', 1, 'vuejs get started', '2022-12-13 00:54:15', '2022-12-13 00:54:15', NULL),
(5, 4, 7, 5, 'শুরি করছি', 'getting-started-1', 1, NULL, '2022-12-13 00:54:34', '2022-12-13 00:54:59', '2022-12-13 00:54:59');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `technology_id` bigint(20) UNSIGNED NOT NULL,
  `version_id` bigint(20) UNSIGNED NOT NULL,
  `chapter_id` bigint(20) UNSIGNED NOT NULL,
  `order` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1 for active, 0 for deactivate',
  `keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Keywords for SEO',
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Description for SEO',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`id`, `technology_id`, `version_id`, `chapter_id`, `order`, `name`, `slug`, `file`, `status`, `keywords`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 1, 1, 'ইন্সটলেশন', 'installation', 'installation.md', 1, 'bootstrap installation', 'bootstrap installation', '2022-12-12 23:59:46', '2022-12-12 23:59:46', NULL),
(2, 1, 1, 1, 2, 'কনফিগারেশন', 'configuration', 'configuration.md', 1, 'configuration,bootstrap configuration', 'Bootstrap configuration', '2022-12-13 00:03:01', '2022-12-13 00:03:01', NULL),
(3, 2, 2, 2, 3, 'ইন্সটলেশন', 'installation-laravel', 'installation_laravel639818d47ce76.md', 1, 'laravel installation,laravel 9 installation', 'Laravel install', '2022-12-13 00:07:33', '2022-12-13 00:16:52', NULL),
(4, 3, 3, 3, 4, 'ইন্সটলেশন', 'css-installation', 'css_installation.md', 1, 'css installation,css 3  installation', 'installation', '2022-12-13 00:32:04', '2022-12-13 00:32:04', NULL),
(5, 4, 7, 4, 5, 'Installation', 'vue-js-installation', 'vue_js_installation.md', 1, 'installation', 'installation', '2022-12-13 00:55:49', '2022-12-13 00:59:14', '2022-12-13 00:59:14');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(99, '2014_10_12_000000_create_users_table', 1),
(100, '2014_10_12_100000_create_password_resets_table', 1),
(101, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(102, '2019_08_19_000000_create_failed_jobs_table', 1),
(103, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(104, '2020_05_21_100000_create_teams_table', 1),
(105, '2020_05_21_200000_create_team_user_table', 1),
(106, '2020_05_21_300000_create_team_invitations_table', 1),
(107, '2022_11_14_081246_create_sessions_table', 1),
(108, '2022_11_17_061121_create_technology_divisions_table', 1),
(109, '2022_11_17_061122_create_technologies_table', 1),
(110, '2022_11_17_061641_create_versions_table', 1),
(111, '2022_11_17_062744_create_chapters_table', 1),
(112, '2022_11_17_063052_create_lessons_table', 1);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('SqWV8KiQrV9YOpDLIlrePa1YRLWMxhMZ32vzkw4w', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:107.0) Gecko/20100101 Firefox/107.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoieHJkR2lxR1pKN1dIZGNKQXQyV3d6N1VKb3VCcXhXMUhwbXFrMWg1WCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjIzNDoiaHR0cDovL2xiLnNpdGUvYWRtaW4vc2hvdy9jaGFwdGVyL2V5SnBkaUk2SW5aQmFIbElTbXhxYTNSa1NIcExTV1F6ZVRGUlZVRTlQU0lzSW5aaGJIVmxJam9pUTI1VU9VY3haMDkxVkdNdmVTOWpXVzR3Y1cxaVp6MDlJaXdpYldGaklqb2lNR1psWVdWbFlUVTNNMlV4T1RBeVl6QXpNbVkzWWpsaE56Wm1Zamd3WW1WalpEQmlZV05qWVdVek0ySmtOak5sTW1WaU9EZzNNVGRrTURnME1XRm1aU0lzSW5SaFp5STZJaUo5Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1670914754),
('T6ndzQFu6wG5wbVWQAK3nl3xy7ApJgkaM25PY2Xs', NULL, '192.168.159.1', 'HomeNet/1.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiY3NvNzRwd1h6MlJFRG03Q3lybmVZMlREM1VxVXpXYVlKcjJGZUlPQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHA6Ly8xOTIuMTY4LjE1OS4xMjgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1670912425);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_team` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `user_id`, `name`, `personal_team`, `created_at`, `updated_at`) VALUES
(1, 1, 'Anowar\'s Team', 1, '2022-12-12 23:56:14', '2022-12-12 23:56:14');

-- --------------------------------------------------------

--
-- Table structure for table `team_invitations`
--

CREATE TABLE `team_invitations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team_user`
--

CREATE TABLE `team_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `technologies`
--

CREATE TABLE `technologies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `technology_division_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path_folder_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Technology folder name, for store docs files',
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1 for active, 0 for deactivate',
  `order` int(11) NOT NULL,
  `keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Keywords for SEO',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `technologies`
--

INSERT INTO `technologies` (`id`, `technology_division_id`, `name`, `slug`, `image`, `path_folder_name`, `status`, `order`, `keywords`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'বুটস্ট্র্যাপ', 'bootstrap', 'NgRRObaElU4rkWwGccMiDeU8dSgCpGf9JpHMdmKL.png', 'Bootstrap', 1, 1, 'bootstrap,design,learn bootstrap', '2022-12-12 23:57:28', '2022-12-12 23:57:28', NULL),
(2, 2, 'লারাভেল', 'laravel', 'olWHUXVx6UiJoyfqaCndSUXCQLJWCOtgD4BQU5rb.png', 'Laravel', 1, 2, 'laravel', '2022-12-13 00:04:43', '2022-12-13 00:04:43', NULL),
(3, 1, 'সিএসএস', 'css', '6ACXlCvw5uEPy5tKHdlp4FO8QYB1x2o0fQ71W4dh.png', 'CSS', 1, 3, 'css', '2022-12-13 00:28:30', '2022-12-13 00:28:30', NULL),
(4, 1, 'Vue JS', 'vue-js', '7fafXktNnPv2Ux9BZEReqv9RVtTa7GUuQ62veMmo.png', 'vuejs', 1, 4, 'vue js', '2022-12-13 00:40:24', '2022-12-13 00:43:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `technology_divisions`
--

CREATE TABLE `technology_divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1 for active, 0 for deactivate',
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `technology_divisions`
--

INSERT INTO `technology_divisions` (`id`, `name`, `slug`, `status`, `order`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ফ্রন্টইন্ড', 'frontend', 1, 1, '2022-12-12 23:56:52', '2022-12-12 23:56:52', NULL),
(2, 'ডেভেলপমেন্ট', 'development', 1, 2, '2022-12-13 00:03:41', '2022-12-13 00:03:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Anowar Hosen', 'anowarhosensoft@gmail.com', '2022-12-13 05:56:29', '$2y$10$wxBPhT8iTOimqJQSiWpXU.dhLGBfrmbr5Olz.CO8WiJK43LgHCjAu', NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-12 23:56:14', '2022-12-12 23:56:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `versions`
--

CREATE TABLE `versions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `technology_id` bigint(20) UNSIGNED NOT NULL COMMENT 'Technology ID',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Version Name',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Version Slug',
  `path_folder_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Technology folder name, for store docs files',
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1 for active, 0 for deactivate',
  `order` int(11) NOT NULL,
  `keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Keywords for SEO',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `versions`
--

INSERT INTO `versions` (`id`, `technology_id`, `name`, `slug`, `path_folder_name`, `status`, `order`, `keywords`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '5x', '5x', '5x', 1, 1, 'bootstrap 5x,bootstrap 5x documention', '2022-12-12 23:58:04', '2022-12-12 23:58:04', NULL),
(2, 2, '9x', '9x', '9x', 1, 2, 'laravel 9x,learn laravel 9x', '2022-12-13 00:05:20', '2022-12-13 00:05:20', NULL),
(3, 3, '3x', '3x', '3x', 1, 3, NULL, '2022-12-13 00:29:05', '2022-12-13 00:29:05', NULL),
(7, 4, '3x', 'vue-js-3x', 'vuejs3x', 1, 4, 'vue js', '2022-12-13 00:49:37', '2022-12-13 00:53:31', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chapters`
--
ALTER TABLE `chapters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `chapters_slug_unique` (`slug`),
  ADD KEY `chapters_technology_id_foreign` (`technology_id`),
  ADD KEY `chapters_version_id_foreign` (`version_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `lessons_slug_unique` (`slug`),
  ADD UNIQUE KEY `lessons_file_unique` (`file`),
  ADD KEY `lessons_technology_id_foreign` (`technology_id`),
  ADD KEY `lessons_version_id_foreign` (`version_id`),
  ADD KEY `lessons_chapter_id_foreign` (`chapter_id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teams_user_id_index` (`user_id`);

--
-- Indexes for table `team_invitations`
--
ALTER TABLE `team_invitations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_invitations_team_id_email_unique` (`team_id`,`email`);

--
-- Indexes for table `team_user`
--
ALTER TABLE `team_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_user_team_id_user_id_unique` (`team_id`,`user_id`);

--
-- Indexes for table `technologies`
--
ALTER TABLE `technologies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `technologies_slug_unique` (`slug`),
  ADD UNIQUE KEY `technologies_image_unique` (`image`),
  ADD UNIQUE KEY `technologies_path_folder_name_unique` (`path_folder_name`),
  ADD KEY `technologies_technology_division_id_foreign` (`technology_division_id`);

--
-- Indexes for table `technology_divisions`
--
ALTER TABLE `technology_divisions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `technology_divisions_slug_unique` (`slug`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `versions`
--
ALTER TABLE `versions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `versions_slug_unique` (`slug`),
  ADD UNIQUE KEY `versions_path_folder_name_unique` (`path_folder_name`),
  ADD KEY `versions_technology_id_foreign` (`technology_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chapters`
--
ALTER TABLE `chapters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `team_invitations`
--
ALTER TABLE `team_invitations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team_user`
--
ALTER TABLE `team_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `technologies`
--
ALTER TABLE `technologies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `technology_divisions`
--
ALTER TABLE `technology_divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `versions`
--
ALTER TABLE `versions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chapters`
--
ALTER TABLE `chapters`
  ADD CONSTRAINT `chapters_technology_id_foreign` FOREIGN KEY (`technology_id`) REFERENCES `technologies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `chapters_version_id_foreign` FOREIGN KEY (`version_id`) REFERENCES `versions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lessons`
--
ALTER TABLE `lessons`
  ADD CONSTRAINT `lessons_chapter_id_foreign` FOREIGN KEY (`chapter_id`) REFERENCES `chapters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lessons_technology_id_foreign` FOREIGN KEY (`technology_id`) REFERENCES `technologies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lessons_version_id_foreign` FOREIGN KEY (`version_id`) REFERENCES `versions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `team_invitations`
--
ALTER TABLE `team_invitations`
  ADD CONSTRAINT `team_invitations_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `technologies`
--
ALTER TABLE `technologies`
  ADD CONSTRAINT `technologies_technology_division_id_foreign` FOREIGN KEY (`technology_division_id`) REFERENCES `technology_divisions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `versions`
--
ALTER TABLE `versions`
  ADD CONSTRAINT `versions_technology_id_foreign` FOREIGN KEY (`technology_id`) REFERENCES `technologies` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
