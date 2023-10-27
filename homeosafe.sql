-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2023 at 01:05 PM
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
-- Database: `homeosafe`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `specialist` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `email`, `password`, `phone`, `status`, `specialist`, `created_at`, `updated_at`) VALUES
(8, 'Sonu rai', 'sonu@gmail.com', '$2y$10$gCGcJMFy1YqyOHJ98OG/wu/8vuXXCoEOX37O79zHHq13JJzCT4/ka', '7834563423', '0', 'aurtho', '2023-09-28 06:42:02', '2023-09-28 06:42:02'),
(9, 'Sudipto Sen', 'sudipto@gmail.com', '$2y$10$.zoQ4ulc3bBuKPSf1P1mmOsByN3h0NNI6vKphXhJkmgXSFAU0lGTa', '7656543456', '0', 'ent', '2023-09-28 06:42:53', '2023-09-28 06:42:53'),
(10, 'Rishi kumar', 'rishi@gmail.com', '$2y$10$GnHq8tvaNmK/E5mP3m.9Juw01AAlLu7yDKWERR/FnYof3uXvafDdS', '5555556667', '0', 'heart', '2023-09-28 06:43:42', '2023-09-28 06:43:42'),
(11, 'dr.roy', 'babusonu@gmail.com', '123', '7676565645', '0', 'brain', '2023-09-28 06:44:11', '2023-09-28 06:44:11'),
(12, 'somnath ganguly', 'som@gmail.com', '123', '45465464577', '0', 'chest', NULL, NULL);

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
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `shift` enum('morning','evening','all') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`id`, `name`, `doctor_id`, `date`, `shift`, `created_at`, `updated_at`) VALUES
(1, 'Sonu rai', 8, '09/11/2023', 'morning', '2023-09-28 08:00:02', '2023-09-28 08:00:02');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_09_26_123143_create_patients_table', 2),
(6, '2023_09_27_101823_create_doctors_table', 3),
(7, '2023_09_27_111535_create_leaves_table', 4),
(8, '2023_09_28_071034_create_notifications_table', 5),
(9, '2023_09_28_072128_create_notifications_table', 6),
(10, '2023_09_28_072613_create_doctors_table', 7),
(11, '2023_09_28_083339_create_doctors_table', 8),
(12, '2023_09_28_102723_create_leaves_table', 9),
(13, '2023_09_29_070915_create_notifications_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_name` varchar(255) NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `shift` enum('morning','evening','all') NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `date` varchar(255) NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `patient_name`, `gender`, `shift`, `mobile`, `desc`, `date`, `is_read`, `created_at`, `updated_at`) VALUES
(1, 'Bikash Roy', 'male', 'morning', '6578906543', 'Headache,colld fever with cough', '2023-09-29', 1, NULL, '2023-09-29 07:36:44'),
(3, 'palash dey', 'male', 'evening', '5646457457', 'headache,pain', '2023-09-29', 1, NULL, '2023-10-16 01:45:52'),
(4, 'rishi sen', 'male', 'evening', '436436436', 'sugar', '2023-09-30', 1, NULL, '2023-10-16 01:45:23');

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
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `refered_by` int(255) DEFAULT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `shift` enum('morning','evening','all') NOT NULL,
  `date` varchar(255) NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `name`, `phone`, `email`, `refered_by`, `gender`, `description`, `shift`, `date`, `is_read`, `created_at`, `updated_at`) VALUES
(2, 'Rishi kumar', '7676565645', 'rishi@gmail.com', 8, 'male', 'chest pain', 'morning', '09/23/2023', 1, '2023-09-27 00:53:53', '2023-09-27 00:53:53'),
(3, 'sudipto sen', '7689056434', 'sudipto sen', 9, 'male', 'headace', 'morning', '09/11/2023', 1, '2023-09-27 00:57:03', '2023-09-27 00:57:03'),
(4, 'abc', '6565764567', 'abc@gmail.com', 10, 'male', 'fracture', 'morning', '09/19/2023', 1, '2023-09-27 01:07:11', '2023-09-27 01:07:11'),
(5, 'somath ganguly', '4567876543', 'abc@gmail.com', 11, 'male', 'cough', 'morning', '09/24/2023', 1, '2023-09-28 04:12:25', '2023-10-16 02:03:12'),
(6, 'rabindra nath', '343464564', 'abc@gmail.com', 9, 'male', 'chest pain', 'morning', '09/11/2023', 1, '2023-09-28 05:32:54', '2023-10-16 03:46:16'),
(7, 'abc', '5555556667', 'abc@gmail.com', 11, 'male', 'gum problem', 'morning', '10/09/2023', 1, '2023-10-16 00:57:23', '2023-10-16 03:46:16');

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Golam Gous', 'golam@gmail.com', NULL, '$2y$10$Lz2ZP/VfMq9Ndoe3XpMFa.EbalRvqkSPh.kCNicrQkynS/TPxiWS2', '1', NULL, '2023-09-27 02:25:06', '2023-09-27 02:25:06'),
(5, 'Sonu rai', 'sonu@gmail.com', NULL, '$2y$10$3vgZx5od4Ez.OJF8Njiy8.SBI6gqKkZwOnteSwXGDjUZ51BbsS95C', '0', NULL, '2023-09-27 03:14:00', '2023-09-27 03:14:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
