-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 23, 2026 at 10:49 AM
-- Server version: 11.8.6-MariaDB-log
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u460887819_ksvmeducationc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admissions`
--

CREATE TABLE `admissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admission_for` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `priority` int(11) NOT NULL DEFAULT 1,
  `description` text NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT '1',
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admission_contacts`
--

CREATE TABLE `admission_contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `parent_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `class` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `subtitle`, `description`, `image`, `order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Empowering Students Through Knowledge & Values', 'Welcome To KSVM', 'K.S.V.M. Education Centre stands as a temple of learning where education meets excellence.', 'front/img/banners/1767955389_6960dbbd69b2b.jpg', 1, 'active', '2026-01-09 16:13:09', '2026-03-11 17:31:43'),
(2, 'Empowering Students Through Knowledge & Values', 'Welcome To KSVM', 'K.S.V.M. Education Centre stands as a temple of learning where education meets excellence.', 'front/img/banners/1773230934_69b15b56a1daa.jpg', 2, 'active', '2026-03-11 17:38:54', '2026-03-11 17:38:54');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel_cache_7309549193|2405:201:601b:1082:58d4:cf82:4703:4fb2', 'i:1;', 1776929205),
('laravel_cache_7309549193|2405:201:601b:1082:58d4:cf82:4703:4fb2:timer', 'i:1776929205;', 1776929205),
('laravel_cache_7985719982|2405:201:601b:1082:58d4:cf82:4703:4fb2', 'i:1;', 1776929151),
('laravel_cache_7985719982|2405:201:601b:1082:58d4:cf82:4703:4fb2:timer', 'i:1776929151;', 1776929151),
('laravel_cache_8604898138|2405:201:601b:1082:58d4:cf82:4703:4fb2', 'i:1;', 1776929238),
('laravel_cache_8604898138|2405:201:601b:1082:58d4:cf82:4703:4fb2:timer', 'i:1776929238;', 1776929238),
('laravel_cache_8726634004|2405:201:601b:1082:58d4:cf82:4703:4fb2', 'i:1;', 1776929178),
('laravel_cache_8726634004|2405:201:601b:1082:58d4:cf82:4703:4fb2:timer', 'i:1776929178;', 1776929178),
('laravel_cache_8957594893|2405:201:601b:1082:58d4:cf82:4703:4fb2', 'i:1;', 1776929118),
('laravel_cache_8957594893|2405:201:601b:1082:58d4:cf82:4703:4fb2:timer', 'i:1776929118;', 1776929118),
('laravel_cache_8957594893|2405:201:601b:1082:9e59:23d6:6352:849d', 'i:2;', 1773289449),
('laravel_cache_8957594893|2405:201:601b:1082:9e59:23d6:6352:849d:timer', 'i:1773289449;', 1773289449);

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
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exam_for` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `priority` int(11) NOT NULL DEFAULT 1,
  `description` text NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT '1',
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `video` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `policies`
--

CREATE TABLE `policies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `type` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `created_by` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `policies`
--

INSERT INTO `policies` (`id`, `name`, `slug`, `description`, `type`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'test2', 'test2', '<p>hfdhghgfh</p>', 'test2', 'notice', '1', '2026-01-10 10:39:38', '2026-03-11 17:59:39');

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `applicant_name` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `last_school` varchar(255) DEFAULT NULL,
  `last_class` varchar(255) DEFAULT NULL,
  `report_card` varchar(255) DEFAULT NULL,
  `applicant_photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
('1ES5japxDPffSdLO80X3WfGoyLs2qL43SaVxcyob', NULL, '103.4.250.118', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib1JyV0xhenJkVmU0WWh1dUVrdzBWMklIUFNUNHFMazNqRURrcVhZYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776916753),
('1lCo5xtv629ZSLwxgarICl27GUaR2Ub93CJkVaZ8', NULL, '51.254.49.111', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:134.0) Gecko/20100101 Firefox/134.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiU3QzbWliYmlzOGd5d00zN055OVFXNGZLRU9Pb0pJeE1TWlJWSXdNayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776922964),
('25x4D5nDdWXqvkdyE2ADNjUl3JjLaHwbrFUojOMW', NULL, '2001:bc8:1201:731:da5e:d3ff:feea:fded', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.3', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZUR4NDJ6YzQzSXM2YVp0b2ZuSk81bEtENENVYmRtNXRMUU92NElWUyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776641311),
('3ZaNjlxH4ZGMs6mLIbZlUWMCGsKM8DI3p0LAKdCl', NULL, '136.0.38.56', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibDQ5cWRtaWNwSGlyRGhQS28yQ3BpNmk0OEhLM2ZwRk5lMGdZWmFRSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776936327),
('5CZLgdkgIY0teaGwV16okN09lzmC1jTkp5Lcncne', NULL, '64.23.191.98', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieFYwOFNLYnZZV3RWOUJHdHZLYm80U0xUcUZXQldBNzRoZ2FwNTllaiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776939970),
('5hkIHq2YtqlP40Kdm6IWEoCijxZHZxBSIQI3zWBQ', NULL, '2604:a880:cad:d0::dd0:b001', 'Mozilla/5.0 (l9scan/2.0.23464616a346331343a353367346a363467353a3361643a34343a303837343a323031623; +https://leakix.net)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiT25xOVVmSHp0QWRQcGdua1RoTzgzckU0em9wVWVkWE5TRE16WjZNOSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHBzOi8vd3d3Lmtzdm1lZHVjYXRpb25jZW50ZXIuaW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1776916725),
('5KayyBlGRjZ7p83kMGE7qS5n4kVoQkjV2tfyR4dM', NULL, '2604:a880:4:1d0::3d7:5000', 'Mozilla/5.0 (l9scan/2.0.33238363a343234383a336532346a336937346a373468383a33343a303837343a323031623; +https://leakix.net)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZllnYkNoQU8yaUdXaUk1d0pjenhsbGhaa285SVpFVEh2cXBOVzZvaSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHBzOi8vd3d3Lmtzdm1lZHVjYXRpb25jZW50ZXIuaW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1776916726),
('5Qu3FRVOfqSj7qYBp2IMV2vI3Zh8D0UJSOeuPksG', NULL, '44.201.181.173', 'axios/1.13.6', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMzYwQWNvS0VaVFkxRkFzekZ2YVVnREVSTkRiMHE5VmRiN2Eyc1ZacyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776918520),
('6yl17jLHBHA3AIpNZjMxt9gsEDQtEktVhGWAyqJC', NULL, '103.108.58.16', 'FaviconHash-API/1.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYjAxamFMWmt2dDlHb3lsbjB3bzdZR3lsU3p5azZUNjZSZFlRQVo2TyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776543231),
('7cti4vPrHjlvKagrVxPfTG3t8v1OxhQga5V56IAo', NULL, '2a02:4780:11:c0de::e', 'Go-http-client/2.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZnFEb2ZSckdISnhkTFdjNHpLenZoOFB0OXR6UDRLb0hEYjBIcG5hNSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776851647),
('8eJHgdML6PXgS9cER393Z4varRGXgQRTVGeh90bz', NULL, '103.4.250.118', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQWNJNTRmWUpxYk9ZajRCZjdrRHFKWnhYV2VoNEtKS2NBS1hDd1JqNyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776916748),
('96yg5Cro6tlVy8fqKGzRJUoVuaXJqPmkDTLuPeGZ', NULL, '66.249.70.39', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.7680.177 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoielNMRGdTYWlvT2FEcmJzMlpEb0xPSEgzUkFxTWREWEZRYnN3bm8zaiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776559410),
('9GVXgjguWQB0sbK2avxrJj5R1xVuGAFQQKQ5wMay', NULL, '44.201.181.173', 'axios/1.13.6', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTXE1RUZFSFlMQWRpY3N0ZTMxT0Z6anhVT2hTQlo1SFA3UFpWdGo4WSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776918551),
('9nSvsoQ8noH5cfx4Q3iKzlqUUIGVWMJ9eqlNSWbi', NULL, '32.194.215.91', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQ3ZrYUpmU1N1MUM0Q1BOcDRKMkRmMDFpUlhubGoxcFJoVDRxSXdwRyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776583701),
('A1HFUvtivCXQXq7vn54VrQPSGECqWhjsklIodaTf', NULL, '216.73.217.46', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; ClaudeBot/1.0; +claudebot@anthropic.com)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNElaY3J3alBZRUVUYkt4d0I1Q0loNVJjNjJwcWpvZ1RpNlVjQXhYcyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbi9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776928723),
('AKGe0QQWI5ysYnbt9kjcdgvGZIEextmEkXi0pgeW', NULL, '2001:4860:7:805::d7', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibUg0OU1BYlZXQ1ZEWFJQUHpFaEhrbENpOGd1ZmtIODB0djBrNnNjdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776767471),
('aKkp2PlpOI4ZRTCPqqwQc9KKeVPghtUM0zc0kWmP', NULL, '216.73.217.46', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; ClaudeBot/1.0; +claudebot@anthropic.com)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiT2N5U3o0RzZHMUxXQlJ4TmxENlhXamhWZkpDYThoQUFWQVg1NTlhVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbi9nYWxsZXJ5Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1776928633),
('Ao5oYmzc0q1n9bHEMI3oHsSbRC3mvT9HSGJlHSGT', NULL, '172.111.15.113', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMG5lbE1ISGZiaWc0MnFDMTFJcW43ZFdTeVhTMUsyMG1pTzFGVjlYayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776917203),
('aSbZP1Gcndjq8POAXc7P3AOd5yCN6asAOeRrAob3', NULL, '103.108.58.16', 'FaviconHash-API/1.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib1pYM0lkd216cFk3WmhkRTVjWVcwVjdMbnB0S3U2d2E0bHRnaWZ3OSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776556439),
('bMtZLxG3rmlZli4LhiHm5yzEgiHtq5wpn3lHxzOd', NULL, '216.73.217.46', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; ClaudeBot/1.0; +claudebot@anthropic.com)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidkpHY3c3TEllMG5pQnRaQms5NmczRHdtbGhvMFVWckFGVVNjclY3QSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776922724),
('cbzz3fe7Xb9uMPFuWSqbk9sIWYwUomNJTH2v4VbQ', NULL, '104.238.41.174', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNjhqR0JiUHJkazlVeHlKcXQ5SWVLOWFNS1RnZnFNZlBZS2ZhQkI5VCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776936358),
('cHP8D5FLDNYTIRaOEtAkXOud5WqACG9I4agJs6JF', NULL, '202.120.37.109', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/5d7.36 (KHTML, like Gecko) Chrome/138.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiemdkajNZcnEyY3l3cXkzcTNCTUFaaElnTDVBTjRzN1M1aU5UNlV2ZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776916697),
('CQVhTAfvPRgdd1PN3KUIivFgcm5eG5SuJWvBvhFH', NULL, '2001:bc8:701:50:da5e:d3ff:fe6f:cc91', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.3', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTmxzS1NyYmk5ekcxNlNyRVZYc0hzUDg4Y1RTYlpiUXR2RFRzNGd6OSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776562392),
('cWYbPdM6RclW8PVbFPNsAq4Uvbqpa49UBd432Fiy', NULL, '2001:bc8:1f90:21:da5e:d3ff:fe49:9fbc', 'curl/7.81.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSjYxakpFUmZONExuMmh4SWF3NkJKNWlodnliMHEzNXAzQnpScG5sTSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776809951),
('cXBKi6ytG4KHcH4mh8G7VowdZwOOOnV3UgrXxqPu', NULL, '104.164.126.126', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiS2pMeWJra09WZ1BubjgwUlRFZEJWOFhUeGFGSnN5WWpqTmoyQVhEWSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776917798),
('D1JLRaioWpOToKTxLzHFFV8S6n7bJemKzrRg9S0D', NULL, '5.133.192.197', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36 Agency/93.8.2357.5', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSmhnamp6NHVqamZNWFpRVEFCbDB1bmVRc2pacXh6V2V4cDZIZmM4OCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776894053),
('EfYRLkNYfm9S5HTrdMeCEW2cJ0STezBj80F43KJa', NULL, '189.28.145.137', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.6778.86 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidzVmTDJSM3A4Yldoc2pjbE5UNEJ1M056ZGZEVzFZeXRVZDVjUlByaiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776720989),
('EmmKnaV5jNjUcRN8GWzlF1nZu5zSJzPkCqOP7Wlw', NULL, '2001:bc8:50c0:316:da5e:d3ff:fe49:982c', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.3', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZzlGR3ozSVI1dFNTVHh5czVRTW5CTVgybzNvT24xTm1FMExCWHE2bSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776728167),
('EOIvx0HrD9g6Cgesx2lvixmHVpwUUXlBIkwc98e9', NULL, '2001:bc8:701:50:da5e:d3ff:fe49:a39c', 'curl/7.81.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRUhrc0lJVTl4eVJJSFA0OWU2amxRbVlYUkRXOEtzcnhCM1g2OUJNSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776903681),
('f6Yifhz65MCSgKKRqjyCRRfRcv15pA2yrl6d9AU9', NULL, '202.120.37.109', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) HeadlessChrome/138.0.7204.23 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiS1RYZDJoV1RSMTFFZTk5ajFDbndtYjkwbUdoNHlmNVJlb1FhZzR6WCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHBzOi8vd3d3Lmtzdm1lZHVjYXRpb25jZW50ZXIuaW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1776916702),
('F7kCHSmzij1nOG4bQLWxRDqwkjZRtGqmukHHUX7V', NULL, '44.201.181.173', 'axios/1.13.6', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYlRqemw2aGxFcXIxUnVJSVpHZ2ZpdnlBT1FudjB2aGljOG5QQ3hoTyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776918568),
('FAe3S3gj6luRPBfefogBGx2VlA5g9BhTj8FMnzfm', NULL, '2001:bc8:50c0:316:da5e:d3ff:fe49:982c', 'curl/7.81.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWHJ1N2RHSGZjcU5JVVdoV2J1bGJ5c0ZqWWFRZDlNMEhOWkpoQkNhMyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776728164),
('fgPPzEJiuPCBT7xKslGXvzLL2glpkpHCQFbPbLLK', NULL, '154.28.229.86', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUlpDTFd6ODFPa2tERklsN1pza2t1RWhsdlhKVzd1VTRMOGxCVWoyTCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776916747),
('fhLiHFrV47G4HmrHlDYhdZYaD9q7n5yZojWFpxsx', NULL, '166.0.50.19', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiajdkMUNOdnc3YzdBbWxtekZldzAyYXowblg4ZVc1NmRub0lvOFFPWiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776936358),
('Fjj9SXUuhn8n3mnWqJetdnRZL2lfLIgQVQZT9vAE', NULL, '103.4.251.21', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTGYyWHd0YmVEdE5YQjZ4SnYyUlM4QTJKMXRMVjNHd09wNHc3VE5uRSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776917803),
('FKgL4p73Y15Cm5sZPZHt03prU4ffkpYNIAhAQ2t9', NULL, '144.126.195.48', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN2tWOENmOTBFRms5YnlPUGI0blF1RzBRNFhVdWlNaTBybE4zYXdEbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776878382),
('FX7BBJ6ipRusJTk9yfK3LXP4vyXA93hath807oLx', NULL, '66.179.85.58', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.1 Safari/605.1.15', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiY0dHdXFpMkI5OERGNWd6TENIRkZ3cEtLYmFBZVFGWWFtY1NHdTM2YSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776936358),
('GamsGzV8n9MDG32hF6ZNwPkbMIJoYq8FUdOo3piq', NULL, '3.92.245.92', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.84 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZ2xxMjFaS3l0VkpkWHF4ZmEzTGdzRG1qVDlVWUNmSE5wSDBCMGdmYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776695372),
('GaxCkBOigdXxTo3Xl7gou4RUxEKsGkyNkZuIYG53', NULL, '2001:4860:7:505::fd', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiU0pIUERYQmkwY3NXRWxLZ0pLb1FOTkh0QXMyVktCNHhaMU14Z0FPYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776861736),
('gQnPlJqb3wapMU2XAz4tyMXTqw7Io1LYa2zyRZgA', NULL, '172.71.164.174', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36 Edg/122.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSWJjOXNBWDJOdjlqcVh0VUh6aEV6dURSdUM0SXkxZEFNeFptZXJGdiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776916802),
('GsmSiYCi2CNK8DVS3Aqrw50ZTTTyGQJE97oIQWcc', NULL, '103.110.48.203', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUk4wSUFSQW5RVzg0SXJrdWFNV3Q5MzhqVm11YnV6eXluZGlQb29IVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776940829),
('hcOwn9JDTFytELab6PH0oX5zCB5cVkmHheUo05T5', NULL, '103.108.58.16', 'FaviconHash-API/1.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoielB1ckFXbmlHV0Vmdkx6ZldzZVZxVmxsc0VsVGpzbDlBMlRFM1l3UyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776537923),
('HjMAJ0QeBkF3rJGeLMDM3hBfHq6A91VN4ljMWJLK', NULL, '103.4.250.223', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiME1jSGZNQVlHbHRTTEFjZUlYaUxTblNhOXpaTkxkTlMwcDQwZkc4biI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776919708),
('hJnkeYLJvy2dIf9VNIe1mOHIP70ePnPA1K3i1m2o', NULL, '44.202.20.250', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Maxthon/4.4.6.1000 Chrome/30.0.1599.101 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUUF4STVJTWNYRFhVQkJuWnRGa3JBTm5GRHdyU3ZzR1BCWmFDRTBvYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776866302),
('HLnMTu6gKDq3E2EfjAMddcdcyliBvRPXtS5d1JCK', NULL, '172.111.15.113', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRzkyczFGNmFHOE1QV2c4elBYY3BLbkpmakdpeUJSSnJOUzZqaGNybiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776917205),
('hQ5IhNX5TuDNsDwHIMIZK70u29t7xtTiOSOwboxt', NULL, '2001:bc8:1f90:21:da5e:d3ff:fe49:9fbc', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.3', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiejV6aFZSQXVBbWpISnlJQnpxU3dvUVVDWVMzMnRVeHpMd2UyQ3dnbSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776809953),
('iYmQnH05qduC2XeUtdVV2NH1gk22gw8Mervn6UaC', NULL, '216.73.217.46', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; ClaudeBot/1.0; +claudebot@anthropic.com)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRHJJTnV5UWZaUXhNUW92SldPb0xjcU1ReUdubXp3NlhLanp6UllESiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbi9nYWxsZXJ5Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1776934225),
('jIdBdoP9cJUzACg3LPLzD3tt7JSB6NYPGR6S70EV', NULL, '103.4.251.186', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib2J0RjZ3dVpxUW5nZE1OZG5tTlRDUWE4MUl1cGplYWcyUVdweTZLbyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776916748),
('JiO54mv1xM9aGsG0s1nxcPy5nGbfCPTvYdyr7p8Q', NULL, '202.120.37.109', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) HeadlessChrome/138.0.7204.23 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRHliR0R5ZHJZTXZsc3FqSkQyS3Uwd3MxUklQUU91MWQ3TkpkZ0JMWiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776916698),
('juq6kD1mARNgCVGsyzztOm3TEudGxx29deHeMGGQ', NULL, '216.73.217.46', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; ClaudeBot/1.0; +claudebot@anthropic.com)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiT3FlSDNBWjM5VklwQTNLd1FBQUg5WmxvMlJCWk42d2pWbWZBWGk4RCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbi9ldmVudHMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1776928517),
('KCj2yCLJft63D0mXWAzXK8PeXa7xm7UWGs2wFqFb', NULL, '216.73.217.46', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; ClaudeBot/1.0; +claudebot@anthropic.com)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQ0paS05IVzdndUo3Zm5SeXVLdzgzS2pjM2hadWJYczl5SXBtS0FlRyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbi9hZG1pc3Npb25zIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1776928904),
('KHmoTW2NjsPjnFdb6TLzVcEDWHBAuJH7L4uLzRnI', NULL, '170.83.49.7', 'Mozilla/5.0 (Linux; Android 7.0; SM-G892A Build/NRD90M; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/60.0.3112.107 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQTR2QTlNVkRSczFpMFZGUDl3YUpVZnNGbkxJUVRLaXBsUmtlR3ljcCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776696473),
('KyYpeYydLrtu9NcpzCMdBiQ9TqQIGjgNySPyOhae', NULL, '103.4.251.186', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidnY4Z3NOUHFQSGx6MWlZZ3ZYamRWNWp0OWVBQ1Fpemp5ejlxWTRHcSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776916746),
('l9AAhuEzfYsymhmv72x8h5DA08w6zGWEyLpl4w9X', NULL, '104.253.213.133', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:137.0) Gecko/20100101 Firefox/137.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVEYzYkNndFhxUWZhTmJKSWlBR1RGNmM2bjdBWExnNnB0ZFlPNUNlTCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776936358),
('LBQLyK8URTAmcfYUHLCAnjsSqzdVfV4Mmra34ztd', NULL, '66.249.70.39', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicmt6Wnp3eWU3Wmtndkt0SXR0c1p2d1VYcFF3dEVKQXRybGc2QlAxVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776559442),
('LtTpOo04cFxPFAuUditBgAS0Bj53EJ1tOIT3DMbH', NULL, '103.108.58.16', 'FaviconHash-API/1.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaHRCeU1jQ05oS1NaZEU1Y1hBb3lwWW1sd3h6TUljUDNhZ0J5TlZ6NCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776540104),
('mrYkEIHHBK5V0mwfkIMFnWZJpeEzh61Xyu7GJhpW', NULL, '51.254.49.98', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:134.0) Gecko/20100101 Firefox/134.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVXZkRnFZNFhKc2RsdGFQR0tpUHR0dXdBR1M2SkhZemlOeFp1T29EbCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHBzOi8vd3d3Lmtzdm1lZHVjYXRpb25jZW50ZXIuaW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1776924289),
('MvNZCdPRwhPaOFnZdtxEZNTmITvScBqmTmfmOH6P', NULL, '2400:6180:0:d0::1188:b001', 'Mozilla/5.0 (l9scan/2.0.369333a343635326a353033373a333639373a336532616a32343a303837343a323031623; +https://leakix.net)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaU1TMVhEcWxyeTRYU3JEZWZnbmlOMnE5ZjFzSVBiUWplWlRVYndrRyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776916725),
('NSazdGWHauuh8RP0Kyj4G7S0IWVfNTvYVgSpWkSj', NULL, '104.164.173.44', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidGZkZ0hOU1ZoenJTMzZCTlg5Q3ZLaFFPQWZqOUREQkVsVlA3SVNtMyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776919716),
('ntvMlr50U6l2M1rmfAJ4GpV4xtueuBT2MBHpXIej', NULL, '2001:4860:7:405::ea', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRGZoVkE1TFAwaVlGUXlXdXZXZGlyYUdlcVAxRGFDdHdyRUw4cnI3TCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776541534),
('NZV39PnLQmrVXgoK5MKBGBpOPUVGVxpCOa4uzFVZ', NULL, '216.73.217.46', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; ClaudeBot/1.0; +claudebot@anthropic.com)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiY05OYWN3V0RLa09FSDZYOEN2aG1sVUxnaU1ycmRhZ2RGWVI3NzNxbSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDk6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbi9leGFtLWRldGFpbHMvdGVzdDIiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1776928785),
('o8vwYwq3PihZzn47DnUrK6CJ0ETNQzTaEfcFRJlW', NULL, '157.55.39.195', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNVFrNG10UUF2QTY1NVdMSXl5NlFISmFpdlh3Y3pOZFF2QThheVdhcCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbi9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776930858),
('OGPZ3bw15xHuWyJI0IGhCVf1ocYLICind9pQv4bH', NULL, '103.4.251.21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQWpGUmJVODY3N1lvNkpDU1pweEwwUzZhQkRRS0FtSXlCRXA1ZGF5RCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776917796),
('OGXlzjwvdzMcEKK8JqGZzTPvk9g6qdYnJsus0e0T', NULL, '2405:201:4:f0e5:54b1:6d62:a03d:e90f', 'Mozilla/5.0 (Windows NT 6.2; WOW64; Trident/7.0; rv:11.0) like Gecko', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZFNXa2lxQlFNaGlCdnlBWGM3cmZldEtlUkhNa01GTmlyZ1hVa3FDZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776872393),
('oUr9vMTcP1uPQAmFgggxjMgTIyKpCkH4jD48ugRM', 1, '2405:201:601b:1082:58d4:cf82:4703:4fb2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36 Edg/147.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibmRQMVlLSlhIU3NMcWxRTUc1Tnh2ejZxV1lJQWxmblZvakZDR3BhUyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1776931474),
('PB1KpAOaMijqbMaiSdkTpRD8x8ojYLGxDQGaB3xC', NULL, '3.92.245.92', 'Mozilla/5.0 (Windows NT 6.2; ARM; Trident/7.0; Touch; rv:11.0; WPDesktop; NOKIA; Lumia 635) like Gecko', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib3BSQXNEVk9Qb3hBa3dQNVRBNksyMGVvM1Z1TlBHYWtjUjNMUk1BSSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776695372),
('pFxZw4Z7se0j6Vn5txx6fVCWsEDW96cLMh5mmagQ', NULL, '202.120.37.109', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/5d7.36 (KHTML, like Gecko) Chrome/138.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUkZrbXN1czRzQXpxR1JHRm01enRBVU12SUpkekpxdFZjOFNwazZhciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHBzOi8vd3d3Lmtzdm1lZHVjYXRpb25jZW50ZXIuaW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1776916701),
('PIAuFQeCB7tGrxIWvkB1xKskBWlx5Sfdr3IUrkAL', NULL, '205.169.39.5', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYTFxRTR5Uk5tNGxKRUJsRHdjVm9MTmw5alBvMEtoU3I2enpBTEU3QSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776931872),
('PnCQeDh1ElWNdyKJh2WHrJMdAgVWzEBkjiKxtOPu', NULL, '52.167.144.172', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRGZpM1c5cllsdU15VHdJQlpob3hmNVV5N3JrS0I5SGJtQkNUS3dpaCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTY6Imh0dHBzOi8vd3d3Lmtzdm1lZHVjYXRpb25jZW50ZXIuaW4vZXZlbnRzLWRldGFsaWVzL2V2ZW50Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1776617047),
('pVmg7ki4FQbWBJcNJZy9sAlJ0VpwHE2d5CAU1oQU', NULL, '205.169.39.18', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUlNEM2lyMEtWTW5nWU1YY1M2N1FwVXV0SlFpY0NheGd2bVd0ZGtBMyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHBzOi8vd3d3Lmtzdm1lZHVjYXRpb25jZW50ZXIuaW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1776920963),
('q0ZFXjD7hl32PwwgBmJTeJrv8IWQ34Q8q4L2f5nX', NULL, '66.249.70.38', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.84 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieGV3VW1PT0l5eUtwUUIxSGVQbTFyWFdSZWVmZVcwdElHdXZZNlNrcCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776559443),
('QLLwCeFf2lqAPiXVC935L6AP3B4lK8AmgzE3TuzW', NULL, '2a02:4780:11:c0de::e', 'Go-http-client/2.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiM0E1cTZMQjFLZUpxaWJsM011YlhpaWptZFdjcjc1akdxM3FyUkQxZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776697914),
('QyI9nJDUnQlqU5M7hpAZIMXAgxE8ysnYDbhhq3Fx', NULL, '91.231.89.32', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:134.0) Gecko/20100101 Firefox/134.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZ3V3ZGJCMWNlVDZ4aXVkMEY4dVRHZERmRGhOdXBGN3kwT3E3cFNodCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHBzOi8vd3d3Lmtzdm1lZHVjYXRpb25jZW50ZXIuaW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1776918531),
('r0u6Kvq7BY4MIPe0kB62pPGzHmS1qFCpH28drdsj', NULL, '2a02:4780:11:c0de::e', 'Go-http-client/2.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWVI5aVR3UVM2NzdCdktvNmxlRnJ0WEp4ZXBpMXpYTTc4cENKVzh5ciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776616442),
('r8Q2LXg5k7weV24u8z03mYylMp7HH2rZVvFLjoNs', NULL, '2001:4860:7:805::dd', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRkdleUxvMW5UMWtDZ0Y3ZnAyWnhrZnN3eHJ2UXdVdzVwNEdkSmtuciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776767348),
('RwutGPODiuGaMPDc0c5ePmf1cZyeERpOZQ36ZeI0', NULL, '2401:4900:1c82:5e88:74ab:1442:3dc4:cd', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibDNqcWlsd0tIQ0xRM3V3SVZkZzlWeWVFdjB4S3lEZHZYS3d4RThJMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776855950),
('RXdIbtB49HoRhh5oYvthEBo1GKkh4AbPtan3HPbj', NULL, '103.108.58.16', 'FaviconHash-API/1.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZnpMWHlHUEZqYXoxdDVKaDRoOGp0RXZCTmJUdjFheVhFcHRSVWlGbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776554725),
('sE9IlqzvixkrDLDSHF688EKmr318q0EgarlXQftU', NULL, '2602:80d:1007::38', 'Mozilla/5.0 (compatible; CensysInspect/1.1; +https://about.censys.io/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibFpRN3BxTkRjblVYeEhhQVlqekNKMXNEZ2JXcXk5Wkc0RDB5dDJQaCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHBzOi8vd3d3Lmtzdm1lZHVjYXRpb25jZW50ZXIuaW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1776623117),
('SJzQQUMNqiel4wukEB3Omvgjn4lY4rMhilZAQoeO', NULL, '2001:bc8:701:50:da5e:d3ff:fe6f:cc91', 'curl/7.81.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRjFadkNnQ1g4MDF0Rlp4MlFwMFR5RmhSWE5rN1lhOGdnaVE1d0pTViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776562389),
('t0WTZuro6w9a8Cbem4Fa2KARq6ZmlYAMNFy0BCkU', NULL, '216.73.217.46', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; ClaudeBot/1.0; +claudebot@anthropic.com)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTGhxWmFCb1V4ODRyeHphdkd0M2JtS0wxNEFnaFRselpXeU1pUEZZbSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbi9jb250YWN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1776928744),
('t7yBbPgQULiDJI2BZNLNcB4VqQPlBeld90kBXgiE', NULL, '82.23.167.229', 'Mozilla/5.0 (X11; Linux x86_64; rv:128.0) Gecko/20100101 Firefox/128.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOXhzRDI1UjRvMnZaek43M01ZV045blE1SGNMbGZXd2ZIbjh5UWtlMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776936345),
('THWMbz2XQoMJOdB2gsEY4u7oRSPZt2zvQEp9T0L9', NULL, '2a0a:4cc0:c0:9393:242c:79ff:fef6:207d', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:109.0) Gecko/20100101 Firefox/113.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWTNobEMzUkpSOFY5cjlxUnFGYlRzWWJFTTJKNm9GOXNqa3lQOGhmbSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776845128),
('TRiBPwIaI4okgDpGxD1RQUhIdmXBmegG1cuQ1PlF', NULL, '216.73.217.46', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; ClaudeBot/1.0; +claudebot@anthropic.com)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOTNKdFpFdkpkUmxqWWl4eno3cFliSDVQcjVVOU43dG9hVjhwYlBSWiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbi9leGFtIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1776928546),
('tRNI5irKFqE4CT5k7zKNIIWCUkR7vR9vxfvR2vzt', NULL, '104.164.173.44', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSnJDYTc1cUlQamNqelhEU3J5VXprNEFkR205YmFvQkxwbFdhV3lGRiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776919720),
('Ty9yny23gdsQ8mTO5HcWIcuVui7AlppUhExuQ23w', NULL, '141.98.11.134', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia21pdEducTVRYURLT1dHN1ZzRFBJMkVkYlVoSnp0NlNJYldQTVRaOCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776541181),
('UB511pG1vweiOiGs5CuRausPkJGMfDib3sv6CYxW', NULL, '172.111.15.128', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTnladzd6VUJTYmEzdjZBempCaW1hZEF4UUJZV1RBSERGSjd5ZTV0YSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHBzOi8vd3d3Lmtzdm1lZHVjYXRpb25jZW50ZXIuaW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1776917206),
('ufjyaZ6ELd11sqExtNqx4kHRvh46tHE3FyMDWngj', NULL, '216.73.217.46', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; ClaudeBot/1.0; +claudebot@anthropic.com)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZGd5ZFAxcFh0cHFtN2xuQzVkaUQ3WUNnS1RGdVJIcmJ2WW9OalZ5YSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbi9hYm91dHVzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1776928682),
('UjP3QZxb2mV6Ad4HstXznYPJVAhbRIFXmUszZ4FW', NULL, '2001:bc8:1201:731:da5e:d3ff:feea:fded', 'curl/7.81.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN2RubEU0eHVLdHRtbEwwQXA1ZHljcHBERndIYnZhdm1ocDR5YkFHbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776641309),
('v2khlmTiIHo6upwdppHNBzLSJDHsSX5OFyymFj8U', NULL, '216.73.217.46', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; ClaudeBot/1.0; +claudebot@anthropic.com)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN0NhSlNmcWpKZXRXZjZEMHozRUlYWThYNDZjQUJRVzA4ZUQwZEZ1YSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbi9hZG1pc3Npb25zIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1776934356),
('Xudy7HwRsA89HKnMp5P2EYwohlTFLuwiR6j6mctw', NULL, '51.254.49.109', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:134.0) Gecko/20100101 Firefox/134.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicWxBR3JUTDcxSEd1dktqdDFMRFNaNUlrQ0JRdWxVUUU2Y0xLYnBZRiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776926976),
('XVZRFrf7oXdbbRVFI8UWkwuJYGp9Rz7KAgFepjDo', NULL, '172.111.15.128', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQ0FuQ3c4bGJXejVXMUhTQkYzSEJuWmpBRng5QjFlOTRtRE9YUjlXTCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHBzOi8vd3d3Lmtzdm1lZHVjYXRpb25jZW50ZXIuaW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1776917209),
('YD7rdiL005u1Td9CWf7dFTINJwDZXBkaZ8PnI15S', NULL, '2405:201:601b:1082:58d4:cf82:4703:4fb2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSTB3N3NIVm84cENOeTJvT2JyMHRxRVRuU0JQNE1MOFNEckJpOEluTCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776931488),
('YKWc2gudsMm7RKrKx0yuudGVF4PXVe8aq1qmoLZ5', NULL, '96.62.229.124', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.5938.132 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZm1kOXhmR3RjOWF4a2x1bzEyVmt5dmFFeURHS3huREZWUEZ6S2pwOSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776936358),
('YoZ8SPsUiEsJ2YzUSAtp5dnNkZwAO2lqdafchejZ', NULL, '2602:80d:1004::35', 'Mozilla/5.0 (compatible; CensysInspect/1.1; +https://about.censys.io/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMGhqV2VZUVdTSUh4aDJKVUlIblY2dUpCRllOOXFDTXlmbmx2WkZ5TyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776884503),
('Z34pdPUhhHwXmO66RUAVxyb5YuGjTI419g3HwFAk', NULL, '216.73.217.46', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; ClaudeBot/1.0; +claudebot@anthropic.com)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiM1VIODVPSmFnOTJaN1k3MnIwMlExUGVWalNIcGF5cUNuWW9zeTQyQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbi9jb3Vyc2VzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1776928518),
('z70AUGXUhvLZ0mGE1Q770xhgYmpBY69B5Md0bYpS', NULL, '2a03:b0c0:3:d0::d04:1', 'Mozilla/5.0 (l9scan/2.0.56536353a366339343a303665363a346666383a356836663a33343a303837343a323031623; +https://leakix.net)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib1lEdzVlY0VYNURUbkg4SXpRWXFFenpkcHJsRkZ4c1NIUVk5U0lrZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776916722),
('z77XfbTz305VFWYNQKIuqec3vsyB2S58Zw6k3u0F', NULL, '44.202.20.250', 'Mozilla/5.0 (SymbianOS/9.1; U; en-us) AppleWebKit/413 (KHTML, like Gecko) Safari/413 es65', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicnZyM05zWmVFNVpjaHRyY2wzb0dvalA1bnAwNzA0clNRbE5lWlQ3MyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776866301),
('zKhZmYV8HTJ2SKlralFeBnrlbJNNGTgqNzJt1oZQ', NULL, '2a02:4780:11:c0de::e', 'Go-http-client/2.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibm9HRnQ5M2RZVjBYZjdkNWlOVEpsaUsxbFRiOGtJRWFtbTczR09GZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776732781),
('ZlPjSdreeo5aFdoQdsK5YQxN5Z7xdIXSFMsLl7Xz', NULL, '104.252.191.108', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTjlYMVE0Y1dzMU1NU1BFRU1ZUlJrZFNIVzFvaDlpTmFyQUljSU1YaiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776919714),
('Zu2C49wGjOctnVE2lz84zdZm1VjCCWdtKhjgu09G', NULL, '2001:bc8:701:50:da5e:d3ff:fe49:a39c', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.3', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiV2FJRm1UYnVjMjllOW4xdkdMSHBVWkdVRVlWQmMxRTc3Z0YxcFdmQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va3N2bWVkdWNhdGlvbmNlbnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1776903683);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'Admin',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'KSEC Admin', 'superadmin@122gmail.com', '7084183114', 'SPA', NULL, '$2y$12$0dDuiKltlA1TA8WLg0Xlo.8kWhqdcGHT/19NLNTmTbkfVr3.tkWg2', NULL, NULL, '2026-01-09 16:07:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admissions`
--
ALTER TABLE `admissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admissions_slug_unique` (`slug`);

--
-- Indexes for table `admission_contacts`
--
ALTER TABLE `admission_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `events_slug_unique` (`slug`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `exams_slug_unique` (`slug`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `galleries_slug_unique` (`slug`);

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
-- Indexes for table `policies`
--
ALTER TABLE `policies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `admissions`
--
ALTER TABLE `admissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admission_contacts`
--
ALTER TABLE `admission_contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `policies`
--
ALTER TABLE `policies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
