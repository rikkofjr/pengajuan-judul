-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2019 at 01:26 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_larjudul`
--

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_03_28_043910_create_permission_tables', 1),
(4, '2019_04_02_085409_create_judul_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(4, 'App\\Models\\User', 5),
(4, 'App\\Models\\User', 8),
(4, 'App\\Models\\User', 11);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Administer roles & permissions', 'web', '2019-04-02 01:29:31', '2019-04-02 01:29:31'),
(2, 'Update Data', 'web', '2019-04-05 06:15:47', '2019-04-05 06:15:47'),
(3, 'Add data - Judul', 'web', '2019-04-05 06:17:06', '2019-04-05 06:17:17'),
(4, 'Edit data - judul', 'web', '2019-04-05 06:17:33', '2019-04-05 06:17:33');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin Prodi', 'web', '2019-04-02 01:34:47', '2019-04-02 01:34:47'),
(2, 'Kaprodi', 'web', '2019-04-05 06:16:23', '2019-04-05 06:16:23'),
(3, 'Dosen', 'web', '2019-04-05 06:16:42', '2019-04-05 06:16:42'),
(4, 'Mahasiswa', 'web', '2019-04-05 06:17:51', '2019-04-05 06:17:51');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 2),
(2, 3),
(3, 3),
(3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tb_judul`
--

CREATE TABLE `tb_judul` (
  `id_judul` bigint(20) UNSIGNED NOT NULL,
  `judul` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `latar_belakang` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_penelitian` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dp_1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dp_2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_judul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `st_judul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_judul`
--

INSERT INTO `tb_judul` (`id_judul`, `judul`, `latar_belakang`, `jenis_penelitian`, `dp_1`, `dp_2`, `user_judul`, `st_judul`, `created_at`, `updated_at`) VALUES
(1, 's', 's', '1', '0', '0', '1', '0', '2019-04-02 06:40:07', '2019-04-02 06:40:07'),
(2, 'ini judul 2', 'ini latar', '2', '0', '0', '1', '0', '2019-04-05 08:14:27', '2019-04-05 08:14:27'),
(3, 'Ini Judul Lagi', 'latab', '2', '0', '4', '1', '0', '2019-04-05 17:36:44', '2019-04-05 17:36:44'),
(4, 'Judul Lagi', 'Lagi Lagi', '3', '0', '0', '1', '0', '2019-04-05 23:59:44', '2019-04-05 23:59:44'),
(5, 'haahh', 'adawdad', '2', '3', '0', '1', '0', '2019-04-05 23:59:57', '2019-04-05 23:59:57'),
(6, 'lagi', 'ladawd', '3', '0', '0', '1', '0', '2019-04-06 00:00:14', '2019-04-06 00:00:14'),
(7, 'wewa', 'awdadad', '1', '4', '0', '1', '0', '2019-04-06 00:00:30', '2019-04-06 00:00:30'),
(8, 'abc', 'awad', '2', '0', '3', '1', '0', '2019-04-06 00:00:47', '2019-04-06 00:00:47'),
(9, 'aedad', 'awdada', '1', '0', '0', '1', '0', '2019-04-06 00:00:58', '2019-04-06 00:00:58'),
(10, 'awdaw', 'awdwadawd', '1', '0', '0', '1', '0', '2019-04-06 00:01:15', '2019-04-06 00:01:15'),
(11, 'awda', 'awdawdaw', '2', '0', '0', '1', '0', '2019-04-06 00:01:33', '2019-04-06 00:01:33'),
(12, 'ini judu lagi', 'kupret', '2', '0', '0', '1', '0', '2019-04-17 20:18:34', '2019-04-17 20:18:34');

-- --------------------------------------------------------

--
-- Table structure for table `tb_posts`
--

CREATE TABLE `tb_posts` (
  `id` bigint(200) NOT NULL,
  `title` text NOT NULL,
  `isi` text NOT NULL,
  `usernya` int(20) NOT NULL,
  `categorynya` int(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(0, '-', '-', '-', NULL, '$2y$10$qWP864toyciXoJ4WWXd0cOtR2JKWs/2MfM6IUX./mDFTxVjVmMCba', NULL, '2019-04-05 06:38:29', '2019-04-05 06:59:20'),
(1, 'Admin Prodi', 'prodi', 'admin@bladephp.co', NULL, '$2y$10$qWP864toyciXoJ4WWXd0cOtR2JKWs/2MfM6IUX./mDFTxVjVmMCba', NULL, '2019-04-05 06:38:29', '2019-04-05 06:59:20'),
(2, 'Kaprodi', 'kaprodi', 'prodi@pro.di', NULL, '$2y$10$Abxct.D5SLFjIgi/DCvLuelr7KPYBTsQCiwqrczH38D6VMq1oOfMC', NULL, '2019-04-05 07:01:43', '2019-04-05 07:09:15'),
(3, 'Dosen Satu', 'dosen1', 'dosen@dos.go', NULL, '$2y$10$GbcpIeIfUxUEVdB.mOKyHO7QAw1tfv4XSRtmSKvsnnOZvqtjKmZpC', NULL, '2019-04-05 07:20:31', '2019-04-05 07:20:31'),
(4, 'Dosen Dua', 'Dosen2', 'dosen2@dos.go', NULL, '$2y$10$SS7GyKYec4X8msN.ek1mSe0vgx92iP0ykk4DXb2MEEbOxx6qweBjO', NULL, '2019-04-05 07:21:42', '2019-04-05 07:21:42'),
(5, 'Mahasiswa Satu', 'mahasiswa1', 'mahasiswa@ma.go', NULL, '$2y$10$iVJSIWY9oLA.kD.kYXZUEOakTHEOg9nfaZy9Pw0Ef1hGyhwDzel6K', NULL, '2019-04-05 07:22:14', '2019-04-05 07:22:56'),
(6, 'Mahasiswa Dua', 'mahasiswa2', 'mahasiswa2@ma.go', NULL, '$2y$10$NaGpR26Pg7hJ9AY0bWo3T.LGQWIZzEQwx/ot4bud1W5xPHD82arXS', NULL, '2019-04-05 07:29:20', '2019-04-05 07:29:20'),
(7, 'Mahasiswa Tiga', 'mahasiswa3', 'mahasiswa3@ma.go', NULL, '$2y$10$JP1PnahPy.N4fD70tFVf3eAMKFNfvaEqYBJU1VjllxZIQ0vwU2R7y', NULL, '2019-04-05 07:34:07', '2019-04-05 07:34:07'),
(8, 'Mahasiswa Empat', 'mahasiswa4', 'mahasiswa4@ma.go', NULL, '$2y$10$4t.XcuFUGkQ3em7OYeKJMeA2RBA.QBRhMiZuidLPNWUN436luAXBu', NULL, '2019-04-05 07:39:34', '2019-04-05 07:39:34'),
(11, 'Ini Mahasiswa', 'mahasiswa5', 'mahasiswa5@ma.go', NULL, '$2y$10$264DwGbxe63wOKrXNI1u.u6ICqroMKLcbeXGPd2216OWxO860EO7e', NULL, '2019-04-16 05:12:07', '2019-04-16 05:12:07');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `tb_judul`
--
ALTER TABLE `tb_judul`
  ADD PRIMARY KEY (`id_judul`);

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_judul`
--
ALTER TABLE `tb_judul`
  MODIFY `id_judul` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
