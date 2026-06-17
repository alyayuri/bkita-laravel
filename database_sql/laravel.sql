-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2026 at 05:16 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

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
-- Table structure for table `konselings`
--

CREATE TABLE `konselings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `layanan` varchar(255) NOT NULL,
  `topik` varchar(255) NOT NULL,
  `pesan` text NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'menunggu',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `konselings`
--

INSERT INTO `konselings` (`id`, `user_id`, `layanan`, `topik`, `pesan`, `status`, `created_at`, `updated_at`) VALUES
(4, 5, 'Pribadi', 'Kurang Percaya Diri di Sekolah', 'Saya merasa kurang percaya diri saat berada di kelas. Saya sering takut ketika diminta menjawab pertanyaan oleh guru atau berbicara di depan teman-teman.', 'selesai', '2026-05-20 10:00:12', '2026-06-09 04:36:22');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `konseling_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `konseling_id`, `user_id`, `message`, `created_at`, `updated_at`) VALUES
(4, 4, 2, 'iya nak boleh konsultasi dengan ibu', '2026-05-20 10:01:24', '2026-05-20 10:19:38'),
(5, 4, 5, 'Saya merasa kurang percaya diri saat berada di kelas. Saya sering takut ketika diminta menjawab pertanyaan oleh guru atau berbicara di depan teman-teman.', '2026-05-20 10:02:12', '2026-05-20 10:02:12'),
(6, 4, 2, 'Terima kasih sudah mau bercerita. Perasaan seperti itu cukup sering dialami banyak siswa, jadi kamu tidak sendirian. Rasa takut berbicara biasanya muncul karena khawatir jawaban salah atau takut dinilai teman-teman.', '2026-05-20 10:03:06', '2026-05-20 10:03:06'),
(7, 4, 5, 'Iya bu, saya takut kalau salah nanti ditertawakan teman', '2026-05-20 10:03:53', '2026-05-20 10:03:53'),
(11, 4, 2, 'Tidak apa-apa jika melakukan kesalahan saat belajar, karena sekolah memang tempat untuk belajar dan berkembang. Justru dengan mencoba berbicara, rasa percaya dirimu akan perlahan meningkat. Coba lakukan beberapa langkah kecil ini: Mulai berani menjawab pertanyaan sederhana terlebih dahulu. Latihan berbicara di depan cermin atau bersama teman dekat. Fokus pada materi yang dipahami agar lebih yakin saat berbicara. Jangan terlalu memikirkan penilaian orang lain.', '2026-05-20 10:20:49', '2026-05-20 10:20:49'),
(12, 4, 2, 'bagaimana nak?', '2026-05-20 18:06:07', '2026-05-20 18:06:07');

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
(5, '2026_04_16_104209_add_role_to_users_table', 1),
(6, '2026_04_16_171018_create_konselings_table', 1),
(7, '2026_04_21_162204_create_messages_table', 2),
(8, '2026_05_08_173117_add_foto_to_users_table', 3),
(9, '2026_05_13_153314_add_layanan_to_konselings_table', 4),
(11, '2026_05_20_163135_add_kelas_to_users_table', 5),
(12, '2026_05_20_175340_add_kelas_to_users_table', 5);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `kelas` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'siswa',
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `kelas`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `foto`) VALUES
(2, 'alya yuri', 'alyayur@gmail.com', NULL, NULL, '$2y$10$gJUGUq.R8uZsmqSV7vuBCeWJsPlIcrS7woH5MNQm9YqLv6uCTQHZy', NULL, '2026-04-16 11:43:01', '2026-04-16 11:43:01', 'guru', NULL),
(5, 'putri setia', 'putrisetia@gmail.com', 'X IPA 1', NULL, '$2y$10$bKyC2o1bioatjAnDLFUrtew4Sn9gubjm469tOe7FPP1d0bS6M/kuK', NULL, '2026-05-20 09:58:42', '2026-05-20 09:58:42', 'siswa', NULL),
(6, 'sandy afri', 'sandyafri@gmail.com', 'XI IPA 2', NULL, '$2y$10$ga98ZidSuG3nGc7qko7Rue.gEIfiBPPEGefsgc.gFpuL55O0KSlhK', NULL, '2026-05-20 11:00:11', '2026-05-20 11:00:11', 'siswa', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `konselings`
--
ALTER TABLE `konselings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `konselings_user_id_foreign` (`user_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_konseling_id_foreign` (`konseling_id`),
  ADD KEY `messages_user_id_foreign` (`user_id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `konselings`
--
ALTER TABLE `konselings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `konselings`
--
ALTER TABLE `konselings`
  ADD CONSTRAINT `konselings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_konseling_id_foreign` FOREIGN KEY (`konseling_id`) REFERENCES `konselings` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `messages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
