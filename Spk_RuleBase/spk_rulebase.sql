-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Bulan Mei 2025 pada 17.06
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_rulebase`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `kode_kelas`, `nama_kelas`, `created_at`, `updated_at`) VALUES
(1, '--', '--', '2025-03-18 19:51:51', '2025-03-18 19:51:51'),
(2, 'X MM 1', 'X Multimedia 1', '2025-03-18 19:52:25', '2025-03-18 19:52:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_pelanggarans`
--

CREATE TABLE `laporan_pelanggarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_siswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas_id` bigint(20) UNSIGNED NOT NULL,
  `pelanggaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pelapor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_sanksis`
--

CREATE TABLE `laporan_sanksis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `daftar_pelanggaran` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_tatib` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sanksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `siswa_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `laporan_sanksis`
--

INSERT INTO `laporan_sanksis` (`id`, `daftar_pelanggaran`, `kode_tatib`, `sanksi`, `siswa_id`, `created_at`, `updated_at`) VALUES
(2, 'tes', '3', 'Melakukan Pembersihan', 3, '2025-03-18 21:08:05', '2025-03-18 21:08:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_07_23_041225_create_kelas_table', 1),
(6, '2024_07_23_051953_create_siswas_table', 1),
(7, '2024_07_23_092309_create_tatibs_table', 1),
(8, '2024_07_24_000000_create_users_table', 1),
(9, '2024_07_24_011111_create_sanksis_table', 1),
(10, '2024_07_24_013358_create_riwayats_table', 1),
(11, '2024_07_24_153609_create_rule_tatibs_table', 1),
(12, '2024_07_25_191632_create_laporan_sanksis_table', 1),
(13, '2024_08_04_064127_create_laporan_pelanggarans_table', 1),
(14, '2025_03_19_011440_create_pending_registrations_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pending_registrations`
--

CREATE TABLE `pending_registrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `siswa_id` bigint(20) UNSIGNED DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
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
-- Struktur dari tabel `riwayats`
--

CREATE TABLE `riwayats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_riwayat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `siswa_id` bigint(20) UNSIGNED NOT NULL,
  `tatib_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_laporan` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `riwayats`
--

INSERT INTO `riwayats` (`id`, `kode_riwayat`, `siswa_id`, `tatib_id`, `tanggal_laporan`, `created_at`, `updated_at`) VALUES
(1, 'R01', 2, 1, '2025-03-19', '2025-03-18 20:12:17', '2025-03-18 20:12:17'),
(2, 'R02', 3, 3, '2025-03-11', '2025-03-18 21:07:15', '2025-03-18 21:07:15'),
(3, 'R03', 3, 3, '2025-03-19', '2025-03-18 21:07:26', '2025-03-18 21:07:26'),
(4, 'R04', 3, 3, '2025-03-18', '2025-03-18 21:07:39', '2025-03-18 21:07:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rule_tatibs`
--

CREATE TABLE `rule_tatibs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rule` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`rule`)),
  `id_sanksi` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rule_tatibs`
--

INSERT INTO `rule_tatibs` (`id`, `rule`, `id_sanksi`, `created_at`, `updated_at`) VALUES
(10, '[{\"kode\":\"AP1\",\"operator\":\"<=\",\"batas\":\"2\",\"max_batas\":null}]', 1, '2025-03-18 20:52:16', '2025-03-18 20:52:16'),
(11, '[{\"kode\":\"AP2\",\"operator\":\"<=\",\"batas\":\"2\",\"max_batas\":null}]', 1, '2025-03-18 20:56:53', '2025-03-18 20:56:53'),
(12, '[{\"kode\":\"AP3\",\"operator\":\"<=\",\"batas\":\"2\",\"max_batas\":null}]', 1, '2025-03-18 20:57:27', '2025-03-18 20:57:27'),
(13, '[{\"kode\":\"AP1\",\"operator\":\">=\",\"batas\":\"3\",\"max_batas\":\"7\"}]', 2, '2025-03-18 20:58:53', '2025-03-18 20:58:53'),
(14, '[{\"kode\":\"AP1\",\"operator\":\">=\",\"batas\":\"8\",\"max_batas\":\"14\"}]', 5, '2025-03-18 20:59:31', '2025-03-18 20:59:31'),
(15, '[{\"kode\":\"AP1\",\"operator\":\">=\",\"batas\":\"15\",\"max_batas\":\"30\"}]', 6, '2025-03-18 21:00:41', '2025-03-18 21:00:41'),
(16, '[{\"kode\":\"AP2\",\"operator\":\">=\",\"batas\":\"3\",\"max_batas\":\"9\"}]', 2, '2025-03-18 21:02:20', '2025-03-18 21:02:20'),
(17, '[{\"kode\":\"AP2\",\"operator\":\">=\",\"batas\":\"10\",\"max_batas\":\"29\"}]', 5, '2025-03-18 21:03:03', '2025-03-18 21:03:03'),
(18, '[{\"kode\":\"AP2\",\"operator\":\">=\",\"batas\":\"30\",\"max_batas\":null}]', 6, '2025-03-18 21:04:28', '2025-03-18 21:04:28'),
(19, '[{\"kode\":\"AP3\",\"operator\":\">=\",\"batas\":\"3\",\"max_batas\":\"5\"}]', 3, '2025-03-18 21:05:33', '2025-03-18 21:05:33'),
(20, '[{\"kode\":\"AP3\",\"operator\":\">=\",\"batas\":\"6\",\"max_batas\":\"10\"}]', 4, '2025-03-18 21:10:17', '2025-03-18 21:10:17'),
(21, '[{\"kode\":\"AP1\",\"operator\":\">=\",\"batas\":\"31\",\"max_batas\":\"150\"}]', 7, '2025-03-18 21:14:12', '2025-03-18 21:14:12'),
(22, '[{\"kode\":\"AP1\",\"operator\":\">=\",\"batas\":\"151\",\"max_batas\":\"330\"}]', 8, '2025-03-18 21:15:27', '2025-03-18 21:15:27'),
(23, '[{\"kode\":\"AP1\",\"operator\":\">=\",\"batas\":\"331\",\"max_batas\":null}]', 9, '2025-03-18 21:16:35', '2025-03-18 21:16:35'),
(24, '[{\"kode\":\"BP1\",\"operator\":\"<=\",\"batas\":\"2\",\"max_batas\":null}]', 1, '2025-03-18 21:18:44', '2025-03-18 21:18:44'),
(25, '[{\"kode\":\"BP2\",\"operator\":\"<=\",\"batas\":\"2\",\"max_batas\":null}]', 1, '2025-03-18 21:19:57', '2025-03-18 21:19:57'),
(26, '[{\"kode\":\"BP3\",\"operator\":\"<=\",\"batas\":\"2\",\"max_batas\":null}]', 1, '2025-03-18 21:20:47', '2025-03-18 21:20:47'),
(27, '[{\"kode\":\"BP4\",\"operator\":\"<=\",\"batas\":\"2\",\"max_batas\":null}]', 1, '2025-03-18 21:21:27', '2025-03-18 21:21:27'),
(28, '[{\"kode\":\"BP1\",\"operator\":\">=\",\"batas\":\"3\",\"max_batas\":null}]', 4, '2025-03-18 21:22:31', '2025-03-18 21:22:31'),
(29, '[{\"kode\":\"BP2\",\"operator\":\">=\",\"batas\":\"3\",\"max_batas\":null}]', 2, '2025-03-18 21:23:16', '2025-03-18 21:23:16'),
(30, '[{\"kode\":\"BP3\",\"operator\":\">=\",\"batas\":\"3\",\"max_batas\":null}]', 2, '2025-03-18 21:23:49', '2025-03-18 21:23:49'),
(31, '[{\"kode\":\"BP4\",\"operator\":\">=\",\"batas\":\"3\",\"max_batas\":null}]', 2, '2025-03-18 21:24:51', '2025-03-18 21:24:51'),
(32, '[{\"kode\":\"CP1\",\"operator\":\"<=\",\"batas\":\"2\",\"max_batas\":null}]', 2, '2025-03-18 21:25:48', '2025-03-18 21:25:48'),
(33, '[{\"kode\":\"CP2\",\"operator\":\"<=\",\"batas\":\"2\",\"max_batas\":null}]', 2, '2025-03-18 21:26:16', '2025-03-18 21:26:16'),
(34, '[{\"kode\":\"CP3\",\"operator\":\"<=\",\"batas\":\"2\",\"max_batas\":null}]', 7, '2025-03-18 21:27:09', '2025-03-18 21:27:09'),
(35, '[{\"kode\":\"CP4\",\"operator\":\"<=\",\"batas\":\"2\",\"max_batas\":null}]', 2, '2025-03-18 21:27:58', '2025-03-18 21:27:58'),
(36, '[{\"kode\":\"CP5\",\"operator\":\"<=\",\"batas\":\"1\",\"max_batas\":null}]', 9, '2025-03-18 21:29:10', '2025-03-18 21:29:10'),
(37, '[{\"kode\":\"CP1\",\"operator\":\">=\",\"batas\":\"3\",\"max_batas\":null}]', 3, '2025-03-18 21:30:18', '2025-03-18 21:30:18'),
(38, '[{\"kode\":\"CP2\",\"operator\":\">=\",\"batas\":\"3\",\"max_batas\":\"5\"}]', 5, '2025-03-18 21:31:10', '2025-03-18 21:31:10'),
(39, '[{\"kode\":\"CP2\",\"operator\":\">=\",\"batas\":\"3\",\"max_batas\":null}]', 6, '2025-03-18 21:32:27', '2025-03-18 21:32:27'),
(40, '[{\"kode\":\"CP4\",\"operator\":\">=\",\"batas\":\"3\",\"max_batas\":\"5\"}]', 5, '2025-03-18 21:33:19', '2025-03-18 21:33:19'),
(41, '[{\"kode\":\"CP4\",\"operator\":\">=\",\"batas\":\"6\",\"max_batas\":\"9\"}]', 6, '2025-03-18 21:34:14', '2025-03-18 21:34:14'),
(42, '[{\"kode\":\"CP4\",\"operator\":\">=\",\"batas\":\"10\",\"max_batas\":null}]', 7, '2025-03-18 21:35:15', '2025-03-18 21:35:15'),
(43, '[{\"kode\":\"DP1\",\"operator\":\"<=\",\"batas\":\"2\",\"max_batas\":null}]', 1, '2025-03-18 21:36:00', '2025-03-18 21:36:00'),
(44, '[{\"kode\":\"DP2\",\"operator\":\"<=\",\"batas\":\"2\",\"max_batas\":null}]', 1, '2025-03-18 21:36:35', '2025-03-18 21:36:35'),
(45, '[{\"kode\":\"DP2\",\"operator\":\"<=\",\"batas\":\"2\",\"max_batas\":null}]', 1, '2025-03-18 21:38:05', '2025-03-18 21:38:05'),
(46, '[{\"kode\":\"DP3\",\"operator\":\"<=\",\"batas\":\"2\",\"max_batas\":null}]', 2, '2025-03-18 21:38:56', '2025-03-18 21:38:56'),
(47, '[{\"kode\":\"DP4\",\"operator\":\"<=\",\"batas\":\"4\",\"max_batas\":null}]', 7, '2025-03-18 21:39:35', '2025-03-18 21:39:35'),
(48, '[{\"kode\":\"DP5\",\"operator\":\">=\",\"batas\":\"1\",\"max_batas\":null}]', 6, '2025-03-18 21:40:26', '2025-03-18 21:40:26'),
(49, '[{\"kode\":\"DP6\",\"operator\":\"<=\",\"batas\":\"1\",\"max_batas\":null}]', 7, '2025-03-18 21:41:06', '2025-03-18 21:41:06'),
(50, '[{\"kode\":\"DP7\",\"operator\":\">=\",\"batas\":\"1\",\"max_batas\":null}]', 9, '2025-03-18 21:42:10', '2025-03-18 21:42:10'),
(51, '[{\"kode\":\"DP8\",\"operator\":\">=\",\"batas\":\"1\",\"max_batas\":null}]', 7, '2025-03-18 21:43:06', '2025-03-18 21:43:06'),
(52, '[{\"kode\":\"DP1\",\"operator\":\">=\",\"batas\":\"3\",\"max_batas\":\"5\"}]', 2, '2025-03-18 21:43:43', '2025-03-18 21:43:43'),
(53, '[{\"kode\":\"DP1\",\"operator\":\">=\",\"batas\":\"6\",\"max_batas\":null}]', 5, '2025-03-18 21:44:11', '2025-03-18 21:44:11'),
(54, '[{\"kode\":\"DP2\",\"operator\":\">=\",\"batas\":\"3\",\"max_batas\":null}]', 2, '2025-03-18 21:45:03', '2025-03-18 21:45:03'),
(55, '[{\"kode\":\"DP3\",\"operator\":\">=\",\"batas\":\"3\",\"max_batas\":null}]', 6, '2025-03-18 21:46:32', '2025-03-18 21:46:32'),
(56, '[{\"kode\":\"DP4\",\"operator\":\">=\",\"batas\":\"5\",\"max_batas\":null}]', 9, '2025-03-18 21:48:46', '2025-03-18 21:48:46'),
(57, '[{\"kode\":\"DP6\",\"operator\":\">=\",\"batas\":\"2\",\"max_batas\":null}]', 9, '2025-03-18 21:49:53', '2025-03-18 21:49:53'),
(58, '[{\"kode\":\"AP1\",\"operator\":\"<=\",\"batas\":\"2\",\"max_batas\":null},{\"kode\":\"AP2\",\"operator\":\"<=\",\"batas\":\"2\",\"max_batas\":null}]', 2, '2025-03-18 21:52:00', '2025-03-18 21:52:00'),
(59, '[{\"kode\":\"AP1\",\"operator\":\"<=\",\"batas\":\"2\",\"max_batas\":null},{\"kode\":\"AP2\",\"operator\":\"<=\",\"batas\":\"2\",\"max_batas\":null},{\"kode\":\"AP3\",\"operator\":\"<=\",\"batas\":\"2\",\"max_batas\":null}]', 2, '2025-03-18 21:52:36', '2025-03-18 21:52:36'),
(60, '[{\"kode\":\"AP1\",\"operator\":\">=\",\"batas\":\"8\",\"max_batas\":\"14\"},{\"kode\":\"AP2\",\"operator\":\">=\",\"batas\":\"10\",\"max_batas\":\"29\"}]', 6, '2025-03-18 21:53:53', '2025-03-18 21:53:53'),
(61, '[{\"kode\":\"AP3\",\"operator\":\"<=\",\"batas\":\"2\",\"max_batas\":null},{\"kode\":\"BP1\",\"operator\":\"<=\",\"batas\":\"2\",\"max_batas\":null}]', 3, '2025-03-18 21:54:36', '2025-03-18 21:54:36'),
(62, '[{\"kode\":\"AP3\",\"operator\":\"<=\",\"batas\":\"2\",\"max_batas\":null},{\"kode\":\"BP1\",\"operator\":\"<=\",\"batas\":\"2\",\"max_batas\":null},{\"kode\":\"BP2\",\"operator\":\"<=\",\"batas\":\"2\",\"max_batas\":null}]', 3, '2025-03-18 21:55:22', '2025-03-18 21:55:22'),
(63, '[{\"kode\":\"AP2\",\"operator\":\"<=\",\"batas\":\"2\",\"max_batas\":null},{\"kode\":\"CP1\",\"operator\":\"<=\",\"batas\":\"2\",\"max_batas\":null}]', 5, '2025-03-18 21:56:04', '2025-03-18 21:56:04'),
(64, '[{\"kode\":\"CP2\",\"operator\":\"<=\",\"batas\":\"2\",\"max_batas\":null},{\"kode\":\"DP4\",\"operator\":\"<=\",\"batas\":\"4\",\"max_batas\":null}]', 1, '2025-03-18 21:57:55', '2025-03-18 21:57:55'),
(65, '[{\"kode\":\"DP1\",\"operator\":\"<=\",\"batas\":\"2\",\"max_batas\":null},{\"kode\":\"DP2\",\"operator\":\"<=\",\"batas\":\"2\",\"max_batas\":null}]', 2, '2025-03-18 21:59:11', '2025-03-18 21:59:11'),
(66, '[{\"kode\":\"CP2\",\"operator\":\"<=\",\"batas\":\"3\",\"max_batas\":null},{\"kode\":\"CP3\",\"operator\":\"<=\",\"batas\":\"3\",\"max_batas\":null},{\"kode\":\"DP1\",\"operator\":\"<=\",\"batas\":\"3\",\"max_batas\":null}]', 7, '2025-03-18 21:59:57', '2025-03-18 21:59:57'),
(67, '[{\"kode\":\"DP3\",\"operator\":\">=\",\"batas\":\"1\",\"max_batas\":null},{\"kode\":\"DP5\",\"operator\":\">=\",\"batas\":\"1\",\"max_batas\":null}]', 7, '2025-03-18 22:01:01', '2025-03-18 22:01:01'),
(68, '[{\"kode\":\"AP2\",\"operator\":\">=\",\"batas\":\"1\",\"max_batas\":null},{\"kode\":\"DP5\",\"operator\":\">=\",\"batas\":\"1\",\"max_batas\":null}]', 7, '2025-03-18 22:02:37', '2025-03-18 22:02:37'),
(69, '[{\"kode\":\"AP2\",\"operator\":\">=\",\"batas\":\"1\",\"max_batas\":null},{\"kode\":\"DP5\",\"operator\":\">=\",\"batas\":\"1\",\"max_batas\":null},{\"kode\":\"CP1\",\"operator\":\">=\",\"batas\":\"1\",\"max_batas\":null}]', 1, '2025-03-18 22:03:13', '2025-03-18 22:03:13'),
(70, '[{\"kode\":\"DP4\",\"operator\":\">=\",\"batas\":\"1\",\"max_batas\":null},{\"kode\":\"DP8\",\"operator\":\">=\",\"batas\":\"1\",\"max_batas\":null}]', 7, '2025-03-18 22:04:15', '2025-03-18 22:04:15'),
(71, '[{\"kode\":\"DP5\",\"operator\":\">=\",\"batas\":\"1\",\"max_batas\":null},{\"kode\":\"DP6\",\"operator\":\">=\",\"batas\":\"1\",\"max_batas\":null}]', 7, '2025-03-18 22:05:12', '2025-03-18 22:05:12'),
(72, '[{\"kode\":\"AP1\",\"operator\":\">=\",\"batas\":\"8\",\"max_batas\":\"14\"},{\"kode\":\"BP2\",\"operator\":\">=\",\"batas\":\"3\",\"max_batas\":null},{\"kode\":\"BP3\",\"operator\":\">=\",\"batas\":\"1\",\"max_batas\":null},{\"kode\":\"BP2\",\"operator\":\">=\",\"batas\":\"1\",\"max_batas\":null}]', 6, '2025-03-18 22:06:49', '2025-03-18 22:06:49'),
(73, '[{\"kode\":\"AP3\",\"operator\":\">=\",\"batas\":\"1\",\"max_batas\":null},{\"kode\":\"BP1\",\"operator\":\">=\",\"batas\":\"1\",\"max_batas\":null},{\"kode\":\"BP2\",\"operator\":\">=\",\"batas\":\"1\",\"max_batas\":null},{\"kode\":\"BP3\",\"operator\":\">=\",\"batas\":\"1\",\"max_batas\":null}]', 4, '2025-03-18 22:08:13', '2025-03-18 22:08:13'),
(74, '[{\"kode\":\"AP3\",\"operator\":\">=\",\"batas\":\"6\",\"max_batas\":\"10\"},{\"kode\":\"AP2\",\"operator\":\"<=\",\"batas\":\"20\",\"max_batas\":\"29\"}]', 5, '2025-03-18 22:09:23', '2025-03-18 22:09:23'),
(75, '[{\"kode\":\"AP2\",\"operator\":\">=\",\"batas\":\"30\",\"max_batas\":null},{\"kode\":\"AP1\",\"operator\":\">=\",\"batas\":\"151\",\"max_batas\":\"330\"}]', 8, '2025-03-18 22:10:41', '2025-03-18 22:10:41'),
(76, '[{\"kode\":\"BP2\",\"operator\":\">=\",\"batas\":\"3\",\"max_batas\":null},{\"kode\":\"BP3\",\"operator\":\">=\",\"batas\":\"3\",\"max_batas\":null}]', 6, '2025-03-18 22:11:52', '2025-03-18 22:11:52'),
(77, '[{\"kode\":\"BP2\",\"operator\":\">=\",\"batas\":\"3\",\"max_batas\":null},{\"kode\":\"BP3\",\"operator\":\">=\",\"batas\":\"3\",\"max_batas\":null},{\"kode\":\"BP4\",\"operator\":\">=\",\"batas\":\"3\",\"max_batas\":null}]', 6, '2025-03-18 22:12:49', '2025-03-18 22:12:49'),
(78, '[{\"kode\":\"BP1\",\"operator\":\">=\",\"batas\":\"3\",\"max_batas\":null},{\"kode\":\"AP1\",\"operator\":\">=\",\"batas\":\"8\",\"max_batas\":\"14\"},{\"kode\":\"CP2\",\"operator\":\">=\",\"batas\":\"1\",\"max_batas\":null},{\"kode\":\"DP2\",\"operator\":\">=\",\"batas\":\"1\",\"max_batas\":null}]', 6, '2025-03-18 22:14:58', '2025-03-18 22:14:58'),
(79, '[{\"kode\":\"CP2\",\"operator\":\">=\",\"batas\":\"3\",\"max_batas\":\"5\"},{\"kode\":\"AP2\",\"operator\":\">=\",\"batas\":\"3\",\"max_batas\":\"9\"},{\"kode\":\"AP1\",\"operator\":\">=\",\"batas\":\"3\",\"max_batas\":\"6\"},{\"kode\":\"CP1\",\"operator\":\">=\",\"batas\":\"1\",\"max_batas\":null}]', 6, '2025-03-18 22:16:43', '2025-03-18 22:16:43'),
(80, '[{\"kode\":\"CP2\",\"operator\":\">=\",\"batas\":\"3\",\"max_batas\":\"5\"},{\"kode\":\"CP1\",\"operator\":\">=\",\"batas\":\"3\",\"max_batas\":null},{\"kode\":\"DP1\",\"operator\":\">=\",\"batas\":\"1\",\"max_batas\":null}]', 6, '2025-03-18 22:18:28', '2025-03-18 22:18:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sanksis`
--

CREATE TABLE `sanksis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_sanksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_sanksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sanksis`
--

INSERT INTO `sanksis` (`id`, `kode_sanksi`, `item_sanksi`, `created_at`, `updated_at`) VALUES
(1, 'S1', 'Teguran lisan', '2025-03-18 20:08:55', '2025-03-18 20:08:55'),
(2, 'S2', 'peringatan langsung/tertulis', '2025-03-18 20:09:08', '2025-03-18 20:09:08'),
(3, 'S3', 'Melakukan Pembersihan', '2025-03-18 20:09:18', '2025-03-18 20:09:18'),
(4, 'S4', 'Tidak di ijinkan ikut jam pelajaran', '2025-03-18 20:09:31', '2025-03-18 20:09:31'),
(5, 'S5', 'Surat pernyataan I', '2025-03-18 20:09:42', '2025-03-18 20:09:42'),
(6, 'S6', 'Surat pernyataan II & Melalui Pembinaan guru BK', '2025-03-18 20:09:55', '2025-03-18 20:09:55'),
(7, 'S7', 'Surat pernyataan III & Diketahui Ortu', '2025-03-18 20:10:09', '2025-03-18 20:10:09'),
(8, 'S8', 'Tinggal kelas', '2025-03-18 20:10:22', '2025-03-18 20:10:22'),
(9, 'S9', 'Diberikan Surat Rekomendasi Pindah Sekolah.', '2025-03-18 20:10:33', '2025-03-18 20:10:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswas`
--

CREATE TABLE `siswas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('LAKI-LAKI','PEREMPUAN') COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `siswas`
--

INSERT INTO `siswas` (`id`, `nis`, `nama`, `jenis_kelamin`, `alamat`, `kelas_id`, `created_at`, `updated_at`) VALUES
(1, '--', '--', 'LAKI-LAKI', '--', 1, '2025-03-18 19:51:51', '2025-03-18 19:51:51'),
(2, '210.543.343', 'SISWA 1', 'LAKI-LAKI', 'Rangas barat', 2, '2025-03-18 19:52:41', '2025-03-18 19:52:41'),
(3, '21.054.3351', 'SISWA 2', 'PEREMPUAN', 'Passarang', 2, '2025-03-18 19:52:52', '2025-03-18 19:52:52'),
(4, '210.543.332', 'SISWA 3', 'LAKI-LAKI', 'Passarang', 2, '2025-03-18 19:53:04', '2025-03-18 19:53:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tatibs`
--

CREATE TABLE `tatibs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_tatib` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_tatib` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` enum('RINGAN','SEDANG','BERAT') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tatibs`
--

INSERT INTO `tatibs` (`id`, `kode_tatib`, `item_tatib`, `kategori`, `created_at`, `updated_at`) VALUES
(1, 'AP1', 'ALPA ( Tanpa Keterangan )', 'RINGAN', '2025-03-18 19:55:54', '2025-03-18 19:55:54'),
(2, 'AP2', 'Tidak masuk jam Pelajaran Sebelum atau sesudahnya/Tanpa keterangan (BOLOS)', 'RINGAN', '2025-03-18 19:57:33', '2025-03-18 19:57:33'),
(3, 'AP3', 'Terlambat (max 15 menit)', 'RINGAN', '2025-03-18 19:58:04', '2025-03-18 19:58:04'),
(4, 'BP1', 'Seragam Tidak sesuai dengan ketentuan Jam dan hari penggunaannya (termasuk pakaian olahraga)', 'RINGAN', '2025-03-18 19:59:09', '2025-03-18 19:59:09'),
(5, 'BP2', 'Tidak Memakai sepatu/Memakai sandal selama Proses pembelajaran disekolah', 'RINGAN', '2025-03-18 19:59:24', '2025-03-18 19:59:24'),
(6, 'BP3', 'Memakai Jilbab/Ikat Pinggang yang tidak sesuai ketentuan sekolah', 'RINGAN', '2025-03-18 19:59:45', '2025-03-18 19:59:45'),
(7, 'BP4', 'Atribut pada baju yang tidak lengkap', 'RINGAN', '2025-03-18 20:00:04', '2025-03-18 20:00:04'),
(8, 'CP1', 'Melompat Pagar sekolah', 'SEDANG', '2025-03-18 20:00:26', '2025-03-18 20:00:26'),
(9, 'CP2', 'Mengejek/Mengancam/Membully Teman sekolah', 'SEDANG', '2025-03-18 20:00:43', '2025-03-18 20:00:43'),
(10, 'CP3', 'Mengejek/Mengancam/Membully Guru/staf/pegawai', 'BERAT', '2025-03-18 20:01:00', '2025-03-18 20:01:00'),
(11, 'CP4', 'Berpacaran dilingkungan sekolah', 'SEDANG', '2025-03-18 20:01:39', '2025-03-18 20:01:39'),
(12, 'CP5', 'Ketahuan Hamil. Menghamili,Menikah', 'BERAT', '2025-03-18 20:03:27', '2025-03-18 20:03:27'),
(13, 'DP1', 'Memakai anting, Tatto, gelang, kalung bagi siswa laki-laki', 'RINGAN', '2025-03-18 20:03:55', '2025-03-18 20:03:55'),
(14, 'DP2', 'Berambut Gonrong/panjang, mengecat rambut selain warna hitam bagi siswa laki-laki', 'RINGAN', '2025-03-18 20:04:14', '2025-03-18 20:04:14'),
(15, 'DP3', 'Membawa Majalah, Buku, VCD serta  Menonton Video Terlarang di lingkungan sekolah', 'SEDANG', '2025-03-18 20:04:34', '2025-03-18 20:04:34'),
(16, 'DP4', 'Terlibat Perkelahian / Menganiaya teman', 'BERAT', '2025-03-18 20:04:54', '2025-03-18 20:04:54'),
(17, 'DP5', 'Merokok dilingkungan sekolah/diluar sekolah tapi masih dengan atribut sekolah.', 'BERAT', '2025-03-18 20:05:53', '2025-03-18 20:05:53'),
(18, 'DP6', 'Membawa / menggunakan Minuman dan obat-obatan terlarang', 'BERAT', '2025-03-18 20:06:18', '2025-03-18 20:06:18'),
(19, 'DP7', 'Ditangkap karna terbukti berbuat tindak pidana', 'BERAT', '2025-03-18 20:06:47', '2025-03-18 20:06:47'),
(20, 'DP8', 'Membawa sejata api/tajam yang berpotensi merugikan dan mengancam keselamatan orang lain', 'BERAT', '2025-03-18 20:07:14', '2025-03-18 20:07:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `siswa_id` bigint(20) UNSIGNED NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `siswa_id`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'superadmin@example.com', 'superAdmin', 1, NULL, '$2y$12$/dYmDOEf.V600gI3QNHpxegY16R4P2U1ZI7gkhTBWf7cjPLJjrD/q', NULL, NULL, NULL),
(2, 'Guru BK', 'bk1', 'bk', 1, NULL, '$2y$12$AHLNItK2hkxbRjOXEqa.levHpNt0qYjw.sf/dbLHg5dJLws7EZ6WW', NULL, '2025-03-18 22:19:15', '2025-03-18 22:19:15');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kelas_kode_kelas_unique` (`kode_kelas`);

--
-- Indeks untuk tabel `laporan_pelanggarans`
--
ALTER TABLE `laporan_pelanggarans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `laporan_pelanggarans_kelas_id_foreign` (`kelas_id`);

--
-- Indeks untuk tabel `laporan_sanksis`
--
ALTER TABLE `laporan_sanksis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `laporan_sanksis_siswa_id_foreign` (`siswa_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pending_registrations`
--
ALTER TABLE `pending_registrations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pending_registrations_email_unique` (`email`),
  ADD KEY `pending_registrations_siswa_id_foreign` (`siswa_id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `riwayats`
--
ALTER TABLE `riwayats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `riwayats_siswa_id_foreign` (`siswa_id`),
  ADD KEY `riwayats_tatib_id_foreign` (`tatib_id`);

--
-- Indeks untuk tabel `rule_tatibs`
--
ALTER TABLE `rule_tatibs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rule_tatibs_id_sanksi_foreign` (`id_sanksi`);

--
-- Indeks untuk tabel `sanksis`
--
ALTER TABLE `sanksis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sanksis_kode_sanksi_unique` (`kode_sanksi`);

--
-- Indeks untuk tabel `siswas`
--
ALTER TABLE `siswas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `siswas_nis_unique` (`nis`),
  ADD KEY `siswas_kelas_id_foreign` (`kelas_id`);

--
-- Indeks untuk tabel `tatibs`
--
ALTER TABLE `tatibs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tatibs_kode_tatib_unique` (`kode_tatib`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_siswa_id_foreign` (`siswa_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `laporan_pelanggarans`
--
ALTER TABLE `laporan_pelanggarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `laporan_sanksis`
--
ALTER TABLE `laporan_sanksis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `pending_registrations`
--
ALTER TABLE `pending_registrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `riwayats`
--
ALTER TABLE `riwayats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `rule_tatibs`
--
ALTER TABLE `rule_tatibs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT untuk tabel `sanksis`
--
ALTER TABLE `sanksis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `siswas`
--
ALTER TABLE `siswas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tatibs`
--
ALTER TABLE `tatibs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `laporan_pelanggarans`
--
ALTER TABLE `laporan_pelanggarans`
  ADD CONSTRAINT `laporan_pelanggarans_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `laporan_sanksis`
--
ALTER TABLE `laporan_sanksis`
  ADD CONSTRAINT `laporan_sanksis_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pending_registrations`
--
ALTER TABLE `pending_registrations`
  ADD CONSTRAINT `pending_registrations_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswas` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `riwayats`
--
ALTER TABLE `riwayats`
  ADD CONSTRAINT `riwayats_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `riwayats_tatib_id_foreign` FOREIGN KEY (`tatib_id`) REFERENCES `tatibs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `rule_tatibs`
--
ALTER TABLE `rule_tatibs`
  ADD CONSTRAINT `rule_tatibs_id_sanksi_foreign` FOREIGN KEY (`id_sanksi`) REFERENCES `sanksis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `siswas`
--
ALTER TABLE `siswas`
  ADD CONSTRAINT `siswas_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
