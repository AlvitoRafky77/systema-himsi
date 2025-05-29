-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Bulan Mei 2025 pada 20.18
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `systema_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `jobs`
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
-- Struktur dari tabel `job_batches`
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
-- Struktur dari tabel `kontaks`
--

CREATE TABLE `kontaks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_hp` varchar(255) DEFAULT NULL,
  `pesan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_04_20_081452_add_is_admin_to_users_table', 2),
(6, '2025_04_20_180537_merchandise', 4),
(9, '2025_04_20_182533_create_produk_table', 5),
(10, '2025_05_03_154520_create_kontaks_table', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produks`
--

CREATE TABLE `produks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `produks`
--

INSERT INTO `produks` (`id`, `name`, `type`, `price`, `image`, `stock`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Lanyard HIMSI', 'Merchandise', 14000.00, 'produk/4gr3eIHOjhlz0gfUaOl37QyZgYa0nPwr94xMN7Uy.jpg', 25, 'Lanyard HIMSI bergaya elegan dengan warna identitas jurusan, logo HIMSI tercetak jelas, dan bahan kuat serta nyaman dipakai.', '2025-04-20 11:59:30', '2025-05-02 03:04:07'),
(2, 'Keychain HIMSI', 'Merchandise', 10000.00, 'produk/0ZdeHxLe1cgBAOzYpKQLsJHhfUsJkopzPwzrQvO8.png', 50, 'Keychain HIMSI stylish dan fungsional, jadi simbol kebanggaan anak Sistem Informasi.', '2025-04-20 11:59:30', '2025-05-02 01:42:47'),
(3, 'Ayam Suwir Pedas', 'Food', 15000.00, 'produk/LRk9xZnfF5rQRPpPxOnUi2VcSQ80ao9z1zA1KjYl.jpg', 30, 'Nikmati kelezatan Ayam Suwir dengan cita rasa autentik yang kaya rempah. Siap santap, higienis, dan cocok untuk semua momen spesial Anda. Praktis dan lezat dalam setiap suapan!', NULL, '2025-05-02 01:43:04'),
(4, 'Ayam Katsu Komplit', 'Food', 15000.00, 'produk/LxZBnswXw9lVnKbgUtvIaNfjSm3OLLxZCtBCyRTv.jpg', 20, 'Crispy di luar, juicy di dalam! Ayam Katsu siap jadi pilihan favorit kamu—dengan balutan tepung renyah dan cita rasa gurih yang menggoda. Cocok untuk makan siang atau bekal praktis!', NULL, '2025-05-02 01:43:33'),
(5, 'Pop Ice Aneka Rasa', 'Drink', 7000.00, 'produk/RX1ivvQtWj3a0MA7CKEFBYqHi22n3m1x1j1HDVj7.jpg', 50, 'Rasakan nikmatnya air minum menyegarkan dan menghilangkan dahaga, cocok saat panas-panas gini!', NULL, '2025-05-02 01:43:48'),
(11, 'Sticker Himsi', 'Merchandise', 5000.00, 'produk/K8qybqEPIy97HGGUkvG3iQdREPwLP72sqVdVxyjZ.png', 20, 'Stiker Himsi dengan tampilan yang kece dan menandakan kamu bergabung ke keluarga HIMSI', '2025-05-02 01:45:21', '2025-05-02 01:45:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `review` text NOT NULL,
  `rating` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `product_id`, `review`, `rating`, `created_at`, `updated_at`) VALUES
(2, 7, 4, 'Enak sekali mengeyangkan', 5, '2025-05-16 10:21:25', '2025-05-16 10:21:25'),
(3, 7, 2, 'Keychain ini sangat keren', 4, '2025-05-16 10:22:13', '2025-05-16 10:22:13'),
(4, 7, 11, 'Kurang bagus', 2, '2025-05-16 10:29:51', '2025-05-16 10:29:51'),
(5, 7, 5, 'Manis sekali tapi enak', 3, '2025-05-16 10:31:35', '2025-05-16 10:31:35'),
(6, 8, 1, 'Lanyard ini sangat bagus sekali dari segi warna dan desain', 5, '2025-05-16 10:56:54', '2025-05-16 10:56:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
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
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('hY58HFF3slS2OcniWWMZoyhzJXedHFW24pou6lI9', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVTY1R3d1NjR6VDdBSjZMZFE4Q0xRQ0tsUE1ZalNxMm95VUw4STNZTSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fX0=', 1747419498);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `is_admin`, `created_at`, `updated_at`) VALUES
(1, 'Alvito', 'alvitorafky44@gmail.com', NULL, '$2y$12$Ryyo59Ui92t4wBDkLDf/J..7rUTxc2pPglbgdWcyQqQqGcMN2ebCO', 'UxHtWvMa4AZxWD4ubz4Rj9ajkr8R6jRPKGTlFMSxHdzpicSV3cX2V4ICoqx8', 0, '2025-04-17 07:24:29', '2025-04-20 01:00:37'),
(3, 'Fadel JMK Super', 'fadeljomok@gmail.com', NULL, '$2y$12$u11cb20uc.MPMq/rPiriI.VhX0L7GWvzzSzhrv7T0srAvWXR4TsH6', NULL, 0, '2025-04-17 08:23:13', '2025-04-17 08:24:48'),
(4, 'Admin', 'admin@gmail.com', NULL, '$2y$12$8M8V5i3HMHzrvRCfOgxPjOQzGWNxVP.21K6Clj8b2EAuhZLgy4SCO', NULL, 1, '2025-04-20 01:12:35', '2025-04-20 01:12:35'),
(5, 'Fadel Jomok', 'fadeljomokerto@gmail.com', NULL, '$2y$12$NzftOA.bDvnI.7fly5bGKeP4TDlF4.Bh4lusvMRopj3s82qMIns0.', NULL, 0, '2025-04-20 16:42:46', '2025-04-20 16:42:46'),
(6, 'Fadel Adzandika', 'fadel123@gmail.com', NULL, '$2y$12$jtEsMSYsx/n5hTQQzhzF.Ol45DtOA7oCaplUXt79pIFQnVhVVA9hi', NULL, 0, '2025-04-30 02:51:03', '2025-04-30 02:51:03'),
(7, 'Rendy Bau', 'rendy@gmail.com', NULL, '$2y$12$BWshwK/V1HIuOmu/O.TtzOLNUSv7JxhWgx7ZvHX/SxXowfoXaWj4i', NULL, 0, '2025-05-02 00:55:42', '2025-05-02 00:55:42'),
(8, 'Aulia Fauziah', 'aulia@gmail.com', NULL, '$2y$12$Qm4Wb/dcr6e/uRjlm0dQvOPWDVQql7DuumRUoVSFCYcfE9KHO5siS', NULL, 0, '2025-05-16 10:40:20', '2025-05-16 11:18:12');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kontaks`
--
ALTER TABLE `kontaks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kontaks`
--
ALTER TABLE `kontaks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `produks`
--
ALTER TABLE `produks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
