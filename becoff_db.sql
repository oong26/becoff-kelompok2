-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2022 at 09:31 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `becoff_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cek_kualitas`
--

CREATE TABLE `cek_kualitas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomor_identitas` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kopi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aroma` tinyint(3) UNSIGNED NOT NULL,
  `rasa` tinyint(3) UNSIGNED NOT NULL,
  `after_taste` tinyint(3) UNSIGNED NOT NULL,
  `acidity` tinyint(3) UNSIGNED NOT NULL,
  `kekentalan` tinyint(3) UNSIGNED NOT NULL,
  `kepahitan` tinyint(3) UNSIGNED NOT NULL,
  `winey` tinyint(3) UNSIGNED NOT NULL,
  `grassy` tinyint(3) UNSIGNED NOT NULL,
  `smokey` tinyint(3) UNSIGNED NOT NULL,
  `cereal` tinyint(3) UNSIGNED NOT NULL,
  `medicine` tinyint(3) UNSIGNED NOT NULL,
  `stinkey` tinyint(3) UNSIGNED NOT NULL,
  `musty` tinyint(3) UNSIGNED NOT NULL,
  `score` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `daftar_menu`
--

CREATE TABLE `daftar_menu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `daftar_menu`
--

INSERT INTO `daftar_menu` (`id`, `nama`, `keterangan`, `harga`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Arabika', 'aSDkjalsdj', '10000', 'upload/menu/20220517003613WhatsApp Image 2022-05-16 at 07.46.30.jpeg', '2022-05-16 17:36:13', '2022-05-16 17:36:13'),
(2, 'Robusta', 'asldkjqlwe', '11000', 'upload/menu/20220517003627WhatsApp Image 2022-05-16 at 07.46.30.jpeg', '2022-05-16 17:36:27', '2022-05-16 17:36:27');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_pesanan` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_menu` bigint(20) UNSIGNED NOT NULL,
  `qty` smallint(5) UNSIGNED NOT NULL,
  `total_harga` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_pesanan`
--

INSERT INTO `detail_pesanan` (`id`, `kode_pesanan`, `id_menu`, `qty`, `total_harga`, `created_at`, `updated_at`) VALUES
(1, '202205180001', 1, 2, '20000', '2022-05-18 03:13:39', '2022-05-18 03:13:39'),
(2, '202205180001', 2, 1, '11000', '2022-05-18 03:13:40', '2022-05-18 03:13:40'),
(3, '202205180001', 1, 1, '10000', '2022-05-18 03:57:22', '2022-05-18 03:57:22');

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
-- Table structure for table `keuangan`
--

CREATE TABLE `keuangan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nominal` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipe` enum('Pemasukan','Pengeluaran') COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukti` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `keuangan`
--

INSERT INTO `keuangan` (`id`, `nominal`, `keterangan`, `tipe`, `bukti`, `created_at`, `updated_at`) VALUES
(1, '31000', '202205180001', 'Pemasukan', NULL, '2022-05-18 03:13:49', '2022-05-18 03:13:49'),
(2, '10000', '202205180001', 'Pemasukan', NULL, '2022-05-18 03:59:47', '2022-05-18 03:59:47');

-- --------------------------------------------------------

--
-- Table structure for table `meja`
--

CREATE TABLE `meja` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomor_meja` smallint(6) NOT NULL,
  `is_used` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meja`
--

INSERT INTO `meja` (`id`, `nomor_meja`, `is_used`, `created_at`, `updated_at`) VALUES
(1, 1, 0, '2022-05-18 03:42:31', '2022-05-18 03:59:47'),
(3, 3, 0, '2022-05-18 03:42:46', '2022-05-18 03:44:27');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_10_12_111722_add_role_to_users_table', 1),
(6, '2021_10_12_112053_create_daftar_menu_table', 1),
(7, '2021_10_14_210101_create_pesanan_table', 1),
(8, '2021_10_14_210838_create_detail_pesanan_table', 1),
(9, '2021_10_17_224426_create_keuangan_table', 1),
(10, '2021_10_17_225411_add_status_to_pesanan_table', 1),
(11, '2021_10_17_234004_add_keterangan_to_keuangan_table', 1),
(12, '2021_10_27_173157_add_nama_pemesan_to_pesanan_table', 1),
(13, '2021_11_07_212333_add_cancelled_to_pesanan_table', 1),
(14, '2021_11_07_235406_add_bukti_to_keuangan_table', 1),
(15, '2021_11_15_211350_create_cek_kualitas_table', 1),
(16, '2022_05_18_102310_create_meja_table', 2),
(17, '2022_05_18_102407_add_id_meja_to_pesanan_table', 3),
(18, '2022_05_18_103315_add_unique_to_nomor_meja_table', 4),
(19, '2022_05_18_103627_add_default_value_to_is_used_field_on_meja_table', 5);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_pesanan` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pemesan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pemesan` bigint(20) UNSIGNED NOT NULL,
  `id_meja` bigint(20) UNSIGNED NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Belum Diproses','Sudah Diproses') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Belum Diproses',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cancelled_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `kode_pesanan`, `nama_pemesan`, `pemesan`, `id_meja`, `keterangan`, `total`, `status`, `created_at`, `updated_at`, `cancelled_at`) VALUES
(1, '202205180001', 'Customer', 2, 1, NULL, '10000', 'Sudah Diproses', '2022-05-18 03:57:22', '2022-05-18 03:59:47', NULL);

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
  `role` enum('Owner','Pegawai','Customer') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Owner', 'owner@mail.com', NULL, '$2y$10$I3XORz.yh9Q4ztLXqGptxevEGg61/bTbleiNC9zFsnO4K62o4FO1O', 'Owner', NULL, '2022-05-16 17:35:33', '2022-05-16 17:35:33'),
(2, 'Pegawai', 'pegawai@mail.com', NULL, '$2y$10$o1KcNJJbyMqUvVjwJVbtrehXcWgNEHA2mnixJlkeQiSeFsKVRX7UK', 'Pegawai', NULL, '2022-05-16 17:35:34', '2022-05-16 17:35:34'),
(3, 'Customer 1', 'customer@mail.com', NULL, '$2y$10$Jur/MQX4jxw6yZ4gxkMd8OAxeVd86IJZ37F0SZUyDXXViTgcmxF8K', 'Customer', NULL, '2022-05-16 17:35:36', '2022-05-16 17:35:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cek_kualitas`
--
ALTER TABLE `cek_kualitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daftar_menu`
--
ALTER TABLE `daftar_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_pesanan_kode_pesanan_foreign` (`kode_pesanan`),
  ADD KEY `detail_pesanan_id_menu_foreign` (`id_menu`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `keuangan`
--
ALTER TABLE `keuangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meja`
--
ALTER TABLE `meja`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `meja_nomor_meja_unique` (`nomor_meja`);

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
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pesanan_kode_pesanan_unique` (`kode_pesanan`),
  ADD KEY `pesanan_pemesan_foreign` (`pemesan`),
  ADD KEY `pesanan_id_meja_foreign` (`id_meja`);

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
-- AUTO_INCREMENT for table `cek_kualitas`
--
ALTER TABLE `cek_kualitas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `daftar_menu`
--
ALTER TABLE `daftar_menu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `keuangan`
--
ALTER TABLE `keuangan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `meja`
--
ALTER TABLE `meja`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD CONSTRAINT `detail_pesanan_id_menu_foreign` FOREIGN KEY (`id_menu`) REFERENCES `daftar_menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_pesanan_kode_pesanan_foreign` FOREIGN KEY (`kode_pesanan`) REFERENCES `pesanan` (`kode_pesanan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_id_meja_foreign` FOREIGN KEY (`id_meja`) REFERENCES `meja` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pesanan_pemesan_foreign` FOREIGN KEY (`pemesan`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
