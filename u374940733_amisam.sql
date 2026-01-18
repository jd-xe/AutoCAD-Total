-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 07-01-2026 a las 04:38:58
-- Versión del servidor: 11.8.3-MariaDB-log
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u374940733_amisam`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `authentications`
--

CREATE TABLE `authentications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `authentications`
--

INSERT INTO `authentications` (`id`, `user_id`, `password`, `last_login`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 2, '$2y$12$UPogEg9BJW4NMEs6.y13C.Auu6HHysBj/O4.tgpnzN5BU21XfXKLO', NULL, 1, '2025-05-13 20:43:57', NULL),
(4, 1, '$2y$12$PVNiLtMGVvTlzNtPOnCwkulNzEORS.TbLt35TP88H07RAhSniHszO', NULL, 1, '2025-05-14 01:52:58', '2025-05-14 01:52:58'),
(5, 4, '$2y$12$rtBkrmplt7a70VYJmKzdP.EmCs9HMOxAzBUdeJxH2/esJFH.h9eLa', NULL, 1, '2025-06-20 04:16:20', '2025-06-20 04:16:20'),
(6, 5, '$2y$12$/SIJ4Yi19Q1qC9CuaZX94e7f5BTuakSA4c9MzHu4kq0/PNDJCQ6GK', NULL, 1, '2025-06-24 05:14:34', '2025-06-24 06:10:11'),
(7, 6, '$2y$12$lnDZd0wQ33AbPzDvFywrIutFD.3gkl3alCdQ6q81kS5enmKJN3Nb6', NULL, 1, '2025-08-11 11:33:21', '2025-08-11 11:33:21'),
(8, 8, '$2y$12$4xiSwl1NtFdAVW8LaRtY4Oyaqd2wytM3NhWYbj/2zseLRLJVtztsa', NULL, 1, '2025-08-18 14:27:04', '2025-08-18 14:27:04'),
(9, 10, '$2y$12$SxKYeVtptZHkSGeqAHg0dO5IhzYTPP8a171lscKYJI4Qsnxb05UK6', NULL, 1, '2025-12-26 20:02:42', '2025-12-26 20:02:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` text DEFAULT NULL,
  `duration` int(11) NOT NULL COMMENT 'Duration in hours',
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `courses`
--

INSERT INTO `courses` (`id`, `name`, `description`, `duration`, `status`, `created_at`, `updated_at`) VALUES
(1, 'AutoCAD Básico', 'Curso básico en 2D', 20, 'active', '2025-05-14 01:50:27', '2025-05-14 01:50:27'),
(2, 'AutoCAD Intermedio', 'Curso intermedio de AutoCAD', 20, 'active', '2025-05-14 01:51:48', '2025-05-14 01:51:48'),
(3, 'AutoCAD Avanzado', 'Curso avanzado de AutoCAD', 20, 'active', '2025-05-14 01:52:06', '2025-05-14 01:52:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `course_groups`
--

CREATE TABLE `course_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `max_capacity` int(11) DEFAULT NULL COMMENT 'Maximum number of students in the group',
  `status` enum('active','closed') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `course_groups`
--

INSERT INTO `course_groups` (`id`, `course_id`, `teacher_id`, `start_date`, `end_date`, `max_capacity`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2025-06-30', '2025-10-24', 20, 'active', '2025-06-24 06:38:28', '2025-06-24 06:38:28'),
(2, 1, 2, '2025-06-30', '2025-10-24', 20, 'active', '2025-06-24 06:57:50', '2025-06-24 06:57:50'),
(3, 1, 2, '2025-06-30', '2025-10-24', 20, 'active', '2025-06-24 07:41:03', '2025-06-24 07:41:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documents`
--

CREATE TABLE `documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `course_group_id` bigint(20) UNSIGNED DEFAULT NULL,
  `enrollment_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type` enum('certificate','attendance') NOT NULL,
  `status` enum('pending','issued','verified','cancelled') NOT NULL DEFAULT 'pending',
  `document_url` varchar(255) NOT NULL,
  `validation_code` char(64) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `documents`
--

INSERT INTO `documents` (`id`, `user_id`, `course_group_id`, `enrollment_id`, `type`, `status`, `document_url`, `validation_code`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, 'certificate', 'issued', 'certificates/1.pdf', 'ae17206ea23788b5556f805a1b594695', '2025-10-07 08:14:19', '2025-10-07 08:14:19'),
(2, 1, 1, NULL, 'certificate', 'issued', '', 'fcf2da61c036af2ccde9573499daabd4', '2025-10-07 08:44:41', '2025-10-07 08:44:41'),
(3, 1, 2, NULL, 'certificate', 'issued', '', 'deef116a46939c7f9ba63f0e9b9c0bc2', '2025-10-07 08:45:28', '2025-10-07 08:45:28'),
(4, 1, 2, NULL, 'certificate', 'issued', 'certificates/4.pdf', '097cd864a6ab6c7e52d0d5e001cad058', '2025-10-07 08:51:02', '2025-10-07 08:51:02'),
(5, 1, 1, NULL, 'certificate', 'issued', 'certificates/5.pdf', 'ece8b552df8333ace75e0ca5b378f069', '2025-10-07 08:51:31', '2025-10-07 08:51:31'),
(6, 1, 1, NULL, 'certificate', 'issued', 'certificates/6.pdf', '0652d52ccb0292ff6ca0b42f2c8c1cd7', '2025-10-07 08:52:15', '2025-10-07 08:52:16'),
(7, 1, 1, NULL, 'certificate', 'issued', 'certificates/7.pdf', 'c24c85f0aaa83cb2d29973f4117e9fa1', '2025-10-07 08:53:36', '2025-10-07 08:53:37'),
(8, 1, 1, NULL, 'certificate', 'issued', 'certificates/8.pdf', 'd1a437adb5890da9d94c26fcb2ebd292', '2025-10-07 08:53:49', '2025-10-07 08:53:49'),
(9, 1, 1, NULL, 'certificate', 'issued', 'certificates/9.pdf', 'c9a679f577dc594e2a622991d76d5c06', '2025-10-07 08:54:04', '2025-10-07 08:54:05'),
(10, 1, 1, NULL, 'certificate', 'issued', 'certificates/10.pdf', '34890aac7badebfa14e2032b92c8db80', '2025-10-07 08:54:17', '2025-10-07 08:54:18'),
(11, 1, 1, NULL, 'certificate', 'issued', '', 'b4231d50187a249478c125ad85bb74c2', '2025-10-07 09:03:29', '2025-10-07 09:03:29'),
(12, 1, 1, NULL, 'certificate', 'issued', '', '1e192878d0cae72189d657b94296d37c', '2025-10-07 09:03:54', '2025-10-07 09:03:54'),
(13, 1, 1, NULL, 'certificate', 'issued', '', 'ce147c4fb7a8c56b861266ffd02d1c57', '2025-10-07 09:03:57', '2025-10-07 09:03:57'),
(14, 1, 1, NULL, 'certificate', 'issued', '', '89ee77bf3eaa692237c3f8e0051d7a41', '2025-10-07 09:04:51', '2025-10-07 09:04:51'),
(15, 1, 1, NULL, 'certificate', 'issued', 'certificates/15.pdf', '65f4b5e78d8d69ab2106dae997d8eb15', '2025-10-07 09:05:45', '2025-10-07 09:05:45'),
(16, 1, 1, NULL, 'certificate', 'issued', 'certificates/16.pdf', '60681a4063f36de1f2b92f68761a8da1', '2025-10-07 09:06:30', '2025-10-07 09:06:30'),
(17, 1, 1, NULL, 'certificate', 'issued', 'certificates/17.pdf', 'd5242ca3c64f191a0e50d38b18aeaaf0', '2025-10-07 09:07:48', '2025-10-07 09:07:48'),
(18, 1, 1, NULL, 'certificate', 'issued', 'certificates/18.pdf', '703e3a0417610a7de55f5ce17fabf505', '2025-10-07 09:09:53', '2025-10-07 09:09:54'),
(19, 1, 1, NULL, 'certificate', 'issued', 'certificates/19.pdf', '8d47c5d3439f78832b51dc97ba37e14f', '2025-10-07 09:12:19', '2025-10-07 09:12:19'),
(20, 1, 1, NULL, 'certificate', 'issued', 'certificates/20.pdf', '6c78ecca42f0938c9bacdc252a66e754', '2025-10-07 09:13:42', '2025-10-07 09:13:42'),
(21, 1, 1, NULL, 'certificate', 'issued', '', 'd176fb277cb78a0042c988c2f54199f6', '2025-10-07 09:15:19', '2025-10-07 09:15:19'),
(22, 1, 1, NULL, 'certificate', 'issued', 'certificates/22.pdf', '86ff0c93f7864a9a1e757e711bdbc336', '2025-10-07 09:15:57', '2025-10-07 09:15:58'),
(23, 1, 1, NULL, 'certificate', 'issued', 'certificates/23.pdf', 'b8537913bcd938c94a2a65cf60fb5d53', '2025-10-07 09:16:57', '2025-10-07 09:16:57'),
(24, 1, 1, NULL, 'certificate', 'issued', 'certificates/24.pdf', '7e6b41917cc454f00a1c0e3127c33e0c', '2025-10-07 09:20:30', '2025-10-07 09:20:30'),
(25, 1, 1, NULL, 'certificate', 'issued', 'certificates/25.pdf', '8ac35ca493e4b82e51f685b064f38430', '2025-10-07 09:23:49', '2025-10-07 09:23:49'),
(26, 1, 1, NULL, 'certificate', 'issued', 'certificates/26.pdf', 'd8ffe2e308df4da1dccd8c69bf97cb90', '2025-10-07 09:24:48', '2025-10-07 09:24:49'),
(27, 1, 1, NULL, 'certificate', 'issued', 'certificates/27.pdf', '52b41bd9b8cc5e8b2585d92cad89ba91', '2025-10-07 09:26:12', '2025-10-07 09:26:12'),
(28, 1, 1, NULL, 'certificate', 'issued', 'certificates/28.pdf', 'c3e740f32b98ee25303aed6741903add', '2025-10-07 09:26:59', '2025-10-07 09:26:59'),
(29, 1, 1, NULL, 'certificate', 'issued', 'certificates/29.pdf', '36739965834e42dce06baae4f21de6b8', '2025-10-07 09:27:23', '2025-10-07 09:27:23'),
(30, 1, 1, NULL, 'certificate', 'issued', 'certificates/30.pdf', '7a60d3249bc9eb5cf4056e6129cb5b7b', '2025-10-07 09:27:40', '2025-10-07 09:27:40'),
(31, 1, 1, NULL, 'certificate', 'issued', 'certificates/31.pdf', 'cba329be7807087cfc9db90174cf133d', '2025-10-07 09:27:58', '2025-10-07 09:27:59'),
(32, 1, 1, NULL, 'certificate', 'issued', 'certificates/32.pdf', 'f84dea17ca28e71be1746ca2fb144503', '2025-10-07 09:28:27', '2025-10-07 09:28:27'),
(33, 1, 1, NULL, 'certificate', 'issued', 'certificates/33.pdf', '0b4448d1b7a3363b155a02542a32a6bc', '2025-10-07 09:29:11', '2025-10-07 09:29:11'),
(34, 1, 1, NULL, 'certificate', 'issued', 'certificates/34.pdf', 'c6f93906aaab029c5c8f2acda4ee7183', '2025-10-07 09:29:32', '2025-10-07 09:29:32'),
(35, 1, 1, NULL, 'certificate', 'issued', 'certificates/35.pdf', '83e2c7f1804d1dba3126d2c392cef5ed', '2025-10-07 09:29:49', '2025-10-07 09:29:49'),
(36, 1, 1, NULL, 'certificate', 'issued', 'certificates/36.pdf', 'a7a5a8e308f73dec8f1ec55151c3d9e5', '2025-10-07 09:30:03', '2025-10-07 09:30:03'),
(37, 1, 1, NULL, 'certificate', 'issued', 'certificates/37.pdf', '0a63aefc74e45c92b71b8514c21113e8', '2025-10-07 09:30:19', '2025-10-07 09:30:20'),
(38, 1, 1, NULL, 'certificate', 'issued', 'certificates/38.pdf', '452ead8f4ad7cd822032d100e5fa0282', '2025-10-07 09:30:38', '2025-10-07 09:30:38'),
(39, 1, 1, NULL, 'certificate', 'issued', 'certificates/39.pdf', 'f3d668cfd34dfb4fbaa24a174b87a60d', '2025-10-07 09:30:56', '2025-10-07 09:30:56'),
(40, 1, 1, NULL, 'certificate', 'issued', 'certificates/40.pdf', '4b26da6f128a154575bc3780d9714ab2', '2025-10-07 09:31:19', '2025-10-07 09:31:20'),
(41, 1, 1, NULL, 'certificate', 'issued', 'certificates/41.pdf', '9a2a8a250b2253ecf1eceeb6a3446237', '2025-10-07 09:32:14', '2025-10-07 09:32:14'),
(42, 1, 1, NULL, 'certificate', 'issued', 'certificates/42.pdf', '22098acd8a71061750cfd3eda503e9aa', '2025-10-07 09:32:27', '2025-10-07 09:32:27'),
(43, 1, 1, NULL, 'certificate', 'issued', 'certificates/43.pdf', 'c96958bcfbcf568d1cc4635150a411b8', '2025-10-07 09:35:14', '2025-10-07 09:35:15'),
(44, 1, 1, NULL, 'certificate', 'issued', 'certificates/44.pdf', '52aac04c1ae7ef909444f1d485ec2c8f', '2025-10-07 09:37:18', '2025-10-07 09:37:18'),
(45, 1, 1, NULL, 'certificate', 'issued', 'certificates/45.pdf', 'a0f3d11674923e7e13a580cdc9d1b9cc', '2025-10-07 09:37:47', '2025-10-07 09:37:47'),
(46, 1, 1, NULL, 'certificate', 'issued', 'certificates/46.pdf', 'c9151565fe0c19ffdcdf258b074c8131', '2025-10-07 09:42:52', '2025-10-07 09:42:52'),
(47, 1, 1, NULL, 'certificate', 'issued', 'certificates/47.pdf', '1c9d016f22e0af468783269747e2ce97', '2025-10-07 09:43:12', '2025-10-07 09:43:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `email_verifications`
--

CREATE TABLE `email_verifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `token` varchar(255) NOT NULL,
  `expires_at` timestamp NOT NULL,
  `used` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `email_verifications`
--

INSERT INTO `email_verifications` (`id`, `user_id`, `token`, `expires_at`, `used`, `created_at`, `updated_at`) VALUES
(1, 1, 'eOiY8O39nF2dTcnNCfXYuluJyrYsAkxqXCajDJ8nxgBCQ1PEDLJSuf9lAG7BhyYk', '2025-05-15 00:07:16', 1, '2025-05-14 00:07:16', '2025-05-14 01:52:58'),
(2, 3, 'd0RtBQdpVAZDzD2sMwYt3YBNwPEE2huXg1hpbe1ci5N4NSPsITGlNkTCtP4Vioq4', '2025-05-15 03:57:53', 0, '2025-05-14 03:57:53', '2025-05-14 03:57:53'),
(3, 4, 'nKhrJsodfOnoWDa6vw2eky1EuNy3OJrK5K4pnC2XB4TEcEX6xXmHJdKJPlF2MLPB', '2025-06-21 04:15:48', 1, '2025-06-20 04:15:48', '2025-06-20 04:16:20'),
(4, 5, 'AHk0HuC7l5wzgale81BPgDsWY4y5ClcVq8IKnuM1bHVdmy9cgHF8vNdb2VkHy70M', '2025-06-25 05:05:19', 1, '2025-06-24 05:05:19', '2025-06-24 05:14:34'),
(5, 6, '252hXQJNZSSSLOtam8bVAiTjrAOl99ViFuAcueVcFgiOM1vx7E6tjTjxaNdGYMzW', '2025-08-12 11:20:01', 1, '2025-08-11 11:20:01', '2025-08-11 11:33:21'),
(6, 7, 'LxS7Fm3veQLpPnrmQlakWqKCOGDnfY1UmVI7rCIpZieafXwylKZlbtSyQQFDOkDd', '2025-08-19 13:58:38', 0, '2025-08-18 13:58:38', '2025-08-18 13:58:38'),
(7, 8, 'RjzbXuhp7RHozOz2MxJDOjQPeTKWftlyRYKbVIQnlVp4NR0Mmx3wGADAn01xeNrY', '2025-08-19 14:25:32', 1, '2025-08-18 14:25:32', '2025-08-18 14:27:04'),
(8, 9, 'EgkkRgwAVNZ0FAS4OpuwNpvMvqBfWJvHNUXuAnYEe1fOfsar1jJJxBa6QGRlIX8T', '2025-10-02 16:28:41', 0, '2025-10-01 16:28:41', '2025-10-01 16:28:41'),
(9, 10, 'LMDVXsxNyYQcCkdlD5BbI1iTDqXoHF5XHuHhTIVzvVqVCgI85aI3kodKx5VHeWXx', '2025-12-27 20:02:25', 1, '2025-12-26 20:02:25', '2025-12-26 20:02:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enrollments`
--

CREATE TABLE `enrollments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `course_group_id` bigint(20) UNSIGNED DEFAULT NULL,
  `payment_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('pending','confirmed','cancelled','completed') NOT NULL DEFAULT 'pending',
  `enrollment_date` date DEFAULT NULL COMMENT 'Date when the enrollment was made',
  `completed_at` timestamp NULL DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `enrollments`
--

INSERT INTO `enrollments` (`id`, `user_id`, `course_group_id`, `payment_id`, `status`, `enrollment_date`, `completed_at`, `comment`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 3, 'confirmed', NULL, NULL, NULL, '2025-06-24 05:38:31', '2025-06-24 07:59:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
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
-- Estructura de tabla para la tabla `grades`
--

CREATE TABLE `grades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `course_group_id` bigint(20) UNSIGNED NOT NULL,
  `evaluation_type` varchar(50) NOT NULL DEFAULT 'final' COMMENT 'Tipo de evaluación: final, parcial, práctica, etc.',
  `score` decimal(5,2) NOT NULL COMMENT 'Calificación numérica',
  `comments` text DEFAULT NULL COMMENT 'Observaciones adicionales',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `group_schedules`
--

CREATE TABLE `group_schedules` (
  `course_group_id` bigint(20) UNSIGNED NOT NULL,
  `schedule_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `group_schedules`
--

INSERT INTO `group_schedules` (`course_group_id`, `schedule_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL),
(2, 2, NULL, NULL),
(3, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
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
-- Estructura de tabla para la tabla `job_batches`
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
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_04_14_082021_modify_users_table', 1),
(5, '2025_04_14_084015_create_authentications_table', 1),
(6, '2025_04_14_084016_create_courses_table', 1),
(7, '2025_04_14_084016_create_payment_concepts_table', 1),
(8, '2025_04_14_084016_create_roles_table', 1),
(9, '2025_04_14_084016_create_schedules_table', 1),
(10, '2025_04_14_084016_create_user_roles_table', 1),
(11, '2025_04_14_084017_create_course_groups_table', 1),
(12, '2025_04_14_084017_create_group_schedules_table', 1),
(13, '2025_04_14_084017_create_payment_methods_table', 1),
(14, '2025_04_14_084017_create_payments_table', 1),
(15, '2025_04_14_084018_create_enrollments_table', 1),
(16, '2025_04_14_084050_create_email_verifications_table', 1),
(17, '2025_04_14_084056_create_documents_table', 1),
(18, '2025_04_14_104641_add_upload_fields_to_payments_table', 1),
(19, '2025_04_14_110709_add_amount_to_payment_concepts_table', 1),
(20, '2025_04_22_060200_add_type_to_payment_concepts_table', 1),
(21, '2025_04_29_054024_add_enrollment_date_to_enrollments_table', 2),
(22, '2025_05_06_020340_add_course_id_to_payment_concepts_table', 2),
(23, '2025_05_10_001905_create_table_grades', 2),
(24, '2025_05_10_005304_create_table_resources', 2),
(25, '2025_05_12_034216_alter_payment_concepts_table', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `concept_id` bigint(20) UNSIGNED NOT NULL,
  `payment_method_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_date` timestamp NULL DEFAULT NULL,
  `status` enum('pending','approved','rejected','verification') NOT NULL DEFAULT 'pending',
  `receipt_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `upload_token` char(36) DEFAULT NULL,
  `uploaded_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `concept_id`, `payment_method_id`, `amount`, `payment_date`, `status`, `receipt_url`, `created_at`, `updated_at`, `upload_token`, `uploaded_at`) VALUES
(1, 1, 1, 1, 200.00, '2025-05-14 01:53:43', 'verification', 'https://res.cloudinary.com/doy35yjhq/image/upload/v1747187623/AMISAM/Students/1/Receipts/p4l417gis8uqk0dwfp3o.jpg', '2025-05-14 01:52:58', '2025-05-14 01:53:43', 'fd99e0b8-ea1c-4792-a7ec-291b2289122c', NULL),
(2, 4, 1, 1, 200.00, '2025-06-20 04:17:56', 'verification', 'https://res.cloudinary.com/doy35yjhq/image/upload/v1750393075/AMISAM/Students/4/Receipts/qwnmrcsveh3wbh5gqnb1.jpg', '2025-06-20 04:16:20', '2025-06-20 04:17:56', '1b29c80d-e667-46a8-a1da-2feb37c120d6', NULL),
(3, 5, 1, 1, 200.00, '2025-06-24 05:16:21', 'approved', 'https://res.cloudinary.com/doy35yjhq/image/upload/v1750742180/AMISAM/Students/5/Receipts/igsro1z7quieuysbhzx9.jpg', '2025-06-24 05:14:34', '2025-06-24 05:38:31', '7c4984e0-4a14-4c85-8d6a-e23baae146ec', '2025-06-24 05:38:31'),
(4, 6, 1, 1, 200.00, '2025-08-11 11:53:33', 'verification', 'https://res.cloudinary.com/doy35yjhq/image/upload/v1754913212/AMISAM/Students/6/Receipts/gjn91tmpygdevz3vawsf.jpg', '2025-08-11 11:33:21', '2025-08-11 11:53:33', 'c73949c5-9ff8-4811-b64c-536d3f7f8764', NULL),
(5, 8, 1, 1, 200.00, '2025-08-18 14:28:45', 'verification', 'https://res.cloudinary.com/doy35yjhq/image/upload/v1755527325/AMISAM/Students/8/Receipts/qrbob1s7j1taqcnjnomp.jpg', '2025-08-18 14:27:04', '2025-08-18 14:28:45', '42d45cc6-800e-4767-b443-ed36c4167a1e', NULL),
(6, 10, 1, 1, 200.00, NULL, 'pending', NULL, '2025-12-26 20:02:42', '2025-12-26 20:02:42', '93503ae4-bbb9-4dbb-a612-f3359f47667d', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payment_concepts`
--

CREATE TABLE `payment_concepts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `amount` decimal(10,2) NOT NULL COMMENT 'Monto del concepto de pago',
  `type` enum('enrollment','document','other') NOT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `payment_concepts`
--

INSERT INTO `payment_concepts` (`id`, `name`, `amount`, `type`, `course_id`, `created_at`, `updated_at`) VALUES
(1, 'AutoCAD Básico', 200.00, 'enrollment', 1, '2025-05-14 01:51:30', '2025-05-14 01:51:30'),
(2, 'AutoCAD Intermedio', 220.00, 'enrollment', 2, '2025-05-14 01:52:31', '2025-05-14 01:52:31'),
(3, 'AutoCAD Avanzado', 250.00, 'enrollment', 3, '2025-05-14 01:52:46', '2025-05-14 01:52:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Yape', '2025-05-14 01:52:16', '2025-08-19 13:25:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resources`
--

CREATE TABLE `resources` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_group_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `file_url` varchar(255) NOT NULL,
  `type` enum('pdf','ppt','doc') NOT NULL DEFAULT 'pdf',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', '2025-05-13 20:41:43', NULL),
(2, 'admin', '2025-05-13 20:41:43', NULL),
(3, 'teacher', '2025-05-13 20:41:57', NULL),
(4, 'student', '2025-05-13 20:41:57', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `schedules`
--

CREATE TABLE `schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `day` enum('Lunes','Martes','Miércoles','Jueves','Viernes','Sábado','Domingo') NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `schedules`
--

INSERT INTO `schedules` (`id`, `day`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES
(1, 'Lunes', '19:30:00', '22:00:00', '2025-06-24 06:38:04', '2025-06-24 06:38:04'),
(2, 'Martes', '18:00:00', '20:00:00', '2025-06-24 06:57:31', '2025-06-24 06:57:31'),
(3, 'Miércoles', '14:00:00', '18:00:00', '2025-06-24 07:40:26', '2025-06-24 07:40:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
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
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('4LA11CtmVYw4dBResTt1xdCr6s1tEF3OWkGGesBW', NULL, '80.248.225.154', 'Mozilla/5.0 (Linux; Android 14; SM-S901B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.6099.280 Mobile Safari/537.36 OPR/80.4.4244.7786', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiV3BjdkxmN0F3Z1g1Q2gwVkp2NzNQclNNSHhIMExZSWg5amNIbG9kYyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHBzOi8vYXV0b2NhZHRvdGFsLmNvbS9jdXJzby1pbnRlcm1lZGlvIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1767755734),
('57x2TFxvhdQ5YfDJoex5CA0YR3TgCVqqZjJZUJw0', NULL, '184.154.139.34', 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; WOW64; Trident/6.0)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQlV5c3V4MzZQWmdMbkVsNzE1NGNPVWdTNTRLS01rcGREOTJuWnRRcyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYXV0b2NhZHRvdGFsLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1767723999),
('6bejrASa8DnogWvqD93vOD6MWHEghy3KSBWqYwY8', NULL, '38.253.189.95', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:146.0) Gecko/20100101 Thunderbird/146.0.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicmNGSVpjNDBZWFN3SE1lYXRzMTZpWWNPUUxjVFozWlNDMHJ0bUdadSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYXV0b2NhZHRvdGFsLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1767730867),
('7CSKMq9xns9OBkFZtNDYchdoR0lnzSOWEp7jUbV2', NULL, '34.231.60.151', 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; WOW64; Trident/6.0)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYjA1SlNlN0lpRXVBUVhxeUgySDlRNWFvZUZOb3F4cEpsZTdTUkh0biI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYXV0b2NhZHRvdGFsLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1767744788),
('7iv69EmW2c0IRkSyZnoYhRr6iSSy9k2niQBysT1u', NULL, '200.37.5.126', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:146.0) Gecko/20100101 Firefox/146.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUVlMWDVFOVJZMUg2MmN4UXE4WnBJWm1zdWFWSWNrbHMxbUk1WXdYWSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHBzOi8vd3d3LmF1dG9jYWR0b3RhbC5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1767736361),
('8mGvQnWIH6SIVU3xKXCKyD8rQ2xc9CrgwXCFndxh', NULL, '132.191.1.149', 'WhatsApp/2.23.20.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNEV3NWNDUHVBUFNCOGxwWXdlaWc2bFY1bzVFMzJwRmgxSHM0OFZSRyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHBzOi8vd3d3LmF1dG9jYWR0b3RhbC5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1767726978),
('8ndezdweAyavj9DbbStcny0ikQk4rCVBIgknvcj2', NULL, '45.204.207.168', 'python-requests/2.32.4', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWEU4Q3RvQm1RNEZVY3B4OVJFNHFTWG5VRHBBcU50NEJoTnZmcm9ESSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHBzOi8vd3d3LmF1dG9jYWR0b3RhbC5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1767725146),
('BfnO2Ci1tEO9d1HzIycv9YueJ4U7ixviIlHuj0zK', NULL, '181.176.106.254', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTHBCcWdIc0xiekVwaEdTQW9UeUZOYXFaSkpiMDNDV3dEdDd3T0RDeSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHBzOi8vd3d3LmF1dG9jYWR0b3RhbC5jb20vY3Vyc28taW50ZXJtZWRpbyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1767727674),
('DSU8L7INX6wIDt93o6VzanGmL1XaE7krXCPEFTn6', NULL, '185.12.150.110', 'Mozilla/5.0 (Linux; Android 14; SM-S901B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.6099.280 Mobile Safari/537.36 OPR/80.4.4244.7786', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN0Z3d0drRnZnN2ZFYWVRdFl2TTJjemxQeENnc2Z0OXg5MnFleDN0UCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYXV0b2NhZHRvdGFsLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1767755733),
('hmRv1ETFGm1eTdyeFUnIraiPSQDREsn0FAJSSa6n', NULL, '38.253.189.95', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibE9yRmhwRFpqcmwyUjJwNGc4d0hDOGE4eGhBQmlRdFpyVG9ZUkI4RiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHBzOi8vYXV0b2NhZHRvdGFsLmNvbS9jZXJ0aWZpY2Fkb3MiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1767735530),
('IRCpKHcSLf84TkGaaQCFXutEKqZNycyUPyWPQOue', NULL, '38.253.189.95', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:146.0) Gecko/20100101 Thunderbird/146.0.1', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiMkJ5VThXTFlZeUJrYVhYRnBaTmQ1WTFrUWZTRUEzcnpHTDkxRFIzZCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1767730866),
('L1rznrpB9ELWPKSlm21x4bXSBcYa5BgkmjOBBnF5', NULL, '142.44.228.152', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiS1BLNGJvNWZrZDN5MHpwN1ZBdEtHbkhjbHJGSmROeWg1SFB4TGc2diI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8vYXV0b2NhZHRvdGFsLmNvbS9wYWdvcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1767753579),
('mQMKsCYwGsnTlm7en5BaHlsxoY3XKVMM2JNzedvl', NULL, '38.253.189.95', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOHBGVTE0OEQ0N3NoaUpYSnAyYnJRVzMxWXhGTDlzY3RnYjQwa0s1dCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vYXV0b2NhZHRvdGFsLmNvbS9jb250YWN0byI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1767730589),
('nLL1MhKo3RYNUlqeAQ38DZ6ISG2RsjtDZqSOo0YM', NULL, '2602:80d:1006::74', 'Mozilla/5.0 (compatible; CensysInspect/1.1; +https://about.censys.io/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTm80YzZmaW1pWmpYZ2NWQzZvclFYeHlDQ0NTcnFEdnNpQXJuRTNOaSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHBzOi8vd3d3LmF1dG9jYWR0b3RhbC5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1767733728),
('qeHJKtF0CJmANROSOo9RqwSxHglA44ZwVxUEeebs', NULL, '198.186.131.170', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2900.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMXNOa0FzNVVNbEp5TThFdGFzaUNPM1lRMW9ITUVjeTJDOXFUTlgzcCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYXV0b2NhZHRvdGFsLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1767733664),
('QMSMOM6gcCb3uku8e7F1Dr5Ukz3wyNw7CzaLEypJ', NULL, '52.67.157.114', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36 Assetnote/1.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQVVleWV4dkZxc2sydlNaTXlKakNmbTZlNFNiZVJwNmV1dEppaGp0YyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYXV0b2NhZHRvdGFsLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1767722578),
('S0R5GIhntByQU5WiIObYLyVT4BsGcq8rd63O3dRb', NULL, '34.231.60.151', 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; WOW64; Trident/6.0)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiY1dnTmZ2RkVrVVVReWplbDJQYjY3NmlzWEt6dTc5OGs2NzJKV0RsMyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYXV0b2NhZHRvdGFsLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1767748817),
('s2s1wHvYC1g2xlolYO0ce521IlSFsGi6EytUSPvy', NULL, '77.68.12.133', 'Mozilla/5.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMFJ1UnpyeE12TUhZZFpOUXprWEZGYzhLRUNkdzNabXNPaHpITzVsaSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYXV0b2NhZHRvdGFsLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1767753127),
('SVT79Jjfs1VtJPKtHT0F4aJ04OIx6oae4ELVJZVX', NULL, '200.37.5.126', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:146.0) Gecko/20100101 Firefox/146.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidmtXSXZmMmNGVU9KS1hibGlybWtFZ21iRW1MMzd5aFJQaGltZFRzSiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHBzOi8vd3d3LmF1dG9jYWR0b3RhbC5jb20vY29tdW5pZGFkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1767731227),
('t5l3IlLa6Bnnq4ftChuDRgCJWZV7l0YZZISnGHoF', NULL, '185.13.98.57', 'Mozilla/5.0 (Linux; Android 14; SM-S901B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.6099.280 Mobile Safari/537.36 OPR/80.4.4244.7786', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRE1wQkdXam92dGEzcEtrQTdsSXk2U3RndHNWbmZKUmkxS3dkQjlvVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHBzOi8vYXV0b2NhZHRvdGFsLmNvbS9jdXJzby1iYXNpY28iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1767755735),
('tCnvf4oyg1WfXMt26mdbjM5NTvLqDIdrlJiN1E2b', NULL, '38.253.189.95', 'WhatsApp/2.23.20.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidkgzR3pIeDNaOVJtbGF3bjM3NndGTVBxc0o2STBTOEdSNU5ZYzB1MiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYXV0b2NhZHRvdGFsLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1767741628),
('VA9VrMQgoTbUHxumwkmpedjirtunDRblofcaOhHR', NULL, '5.133.192.193', 'Mozilla/5.0 (Linux; Android 14; SM-S901B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.6099.280 Mobile Safari/537.36 OPR/80.4.4244.7786', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRUVBU0tSMXZVTXlrZndxQ0VLdW5HVkc1Z2dtb3BuVHA3a09pSGJiNiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHBzOi8vYXV0b2NhZHRvdGFsLmNvbS9jdXJzby1hdmFuemFkbyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1767755734),
('Xc22xWbvYoiRzGYw5mvzGTutlSGfhnTualY1gDaT', NULL, '34.231.60.151', 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; WOW64; Trident/6.0)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoid0F4djI5UGdzTXJYVWJNNHNaZUVOSWUzRVg4dnA1OVd2ZlpZN05PbyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYXV0b2NhZHRvdGFsLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1767744633),
('YZPyvR4l9ldSfEOorQ13ybmoYk7YmPYNKnqQVbgv', NULL, '15.235.96.143', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiU1FtcnV6dHl2M1I3UW9IRjhJODNyMHgxN2RPVER3V1l2MjN4MDdoOCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHBzOi8vYXV0b2NhZHRvdGFsLmNvbS9jdXJzby1hdmFuemFkbyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1767747638);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_name` varchar(255) NOT NULL,
  `dni` varchar(8) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `first_name`, `email`, `phone`, `birth_date`, `address`, `created_at`, `updated_at`, `last_name`, `dni`, `deleted_at`) VALUES
(1, 'Jesús Daniel Ryan', 'mcrtu01@gmail.com', '913318947', '2000-10-18', 'Calle Falsa #123', '2025-05-14 00:07:16', '2025-05-14 00:07:16', 'Loli Castillo', '76163435', NULL),
(2, 'Fredy Martin', 'fespinoza@senati.pe', '940277254', '2000-03-11', 'Prolongación José Gálvez', '2025-05-13 20:36:42', NULL, 'Espinoza Castillo', '40920507', NULL),
(3, 'Juan', 'jmarcos@senati.pe', '940277254', '2000-05-10', 'Prolong Galvez 215', '2025-05-14 03:57:53', '2025-05-14 03:57:53', 'Marcos Espinoza', '40920504', NULL),
(4, 'Fredy', 'fespinoza201520@gmail.com', '940277254', '2000-08-15', 'Prolong Jose galvez 555', '2025-06-20 04:15:48', '2025-06-20 04:15:48', 'Espinoza Retuerto', '40585652', NULL),
(5, 'Jesús Ryan', 'jd.exyn51@gmail.com', '992468731', '2002-02-12', 'Av. Miraflores #123', '2025-06-24 05:05:19', '2025-06-24 05:05:19', 'Loli Castillo', '74854651', NULL),
(6, 'Amina Valentina', 'mcrtu02@gmail.com', '974569654', '2007-04-15', 'Av. Siempre Viva #123', '2025-08-11 11:20:01', '2025-08-11 11:20:01', 'Espinoza Castillo', '87842345', NULL),
(7, 'Juan', 'jmamani@gmail.com', '985856545', '2005-06-13', 'xxx', '2025-08-18 13:58:38', '2025-08-18 13:58:38', 'Mamani Yunca', '40858565', NULL),
(8, 'Fredy', 'comunidadacotama@gmail.com', '931901845', '1981-03-11', 'Prolong Sin fecha 333', '2025-08-18 14:25:32', '2025-08-18 14:25:32', 'Macario Marcos', '45857585', NULL),
(9, 'Angela Fiorella', 'angela_tauro_15@hotmail.com', '960336208', '1991-05-15', 'SAN MARTIN', '2025-10-01 16:28:41', '2025-10-01 16:28:41', 'MARTINEZ ESPINOZA', '47585949', NULL),
(10, 'Cristina Medalit', 'medalit964@gmail.com', '997781188', '2007-12-29', 'A.H. 15 de Setiembre Mz. E Lote 7', '2025-12-26 20:02:25', '2025-12-26 20:02:25', 'Alberto Aldana', '71155871', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_roles`
--

CREATE TABLE `user_roles` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `user_roles`
--

INSERT INTO `user_roles` (`user_id`, `role_id`) VALUES
(2, 1),
(2, 2),
(2, 3),
(1, 4),
(4, 4),
(5, 4),
(6, 4),
(8, 4),
(10, 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `authentications`
--
ALTER TABLE `authentications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `authentications_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `course_groups`
--
ALTER TABLE `course_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_groups_course_id_foreign` (`course_id`),
  ADD KEY `course_groups_teacher_id_foreign` (`teacher_id`);

--
-- Indices de la tabla `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `validation_code` (`validation_code`),
  ADD KEY `documents_user_id_foreign` (`user_id`),
  ADD KEY `documents_course_group_id_foreign` (`course_group_id`),
  ADD KEY `documents_enrollment_id_foreign` (`enrollment_id`);

--
-- Indices de la tabla `email_verifications`
--
ALTER TABLE `email_verifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email_verifications_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `enrollments`
--
ALTER TABLE `enrollments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `enrollments_payment_id_unique` (`payment_id`),
  ADD KEY `enrollments_user_id_foreign` (`user_id`),
  ADD KEY `enrollments_course_group_id_foreign` (`course_group_id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `grade_unique_record` (`user_id`,`course_group_id`,`evaluation_type`),
  ADD KEY `grades_course_group_id_foreign` (`course_group_id`);

--
-- Indices de la tabla `group_schedules`
--
ALTER TABLE `group_schedules`
  ADD PRIMARY KEY (`course_group_id`,`schedule_id`),
  ADD KEY `group_schedules_schedule_id_foreign` (`schedule_id`);

--
-- Indices de la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indices de la tabla `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payments_upload_token_unique` (`upload_token`),
  ADD KEY `payments_user_id_foreign` (`user_id`),
  ADD KEY `payments_concept_id_foreign` (`concept_id`),
  ADD KEY `payments_payment_method_id_foreign` (`payment_method_id`);

--
-- Indices de la tabla `payment_concepts`
--
ALTER TABLE `payment_concepts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payment_concepts_name_unique` (`name`),
  ADD KEY `payment_concepts_course_id_index` (`course_id`);

--
-- Indices de la tabla `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payment_methods_name_unique` (`name`);

--
-- Indices de la tabla `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`id`),
  ADD KEY `resources_course_group_id_foreign` (`course_group_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indices de la tabla `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_dni_unique` (`dni`);

--
-- Indices de la tabla `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `user_roles_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `authentications`
--
ALTER TABLE `authentications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `course_groups`
--
ALTER TABLE `course_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `email_verifications`
--
ALTER TABLE `email_verifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `enrollments`
--
ALTER TABLE `enrollments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `grades`
--
ALTER TABLE `grades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `payment_concepts`
--
ALTER TABLE `payment_concepts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `resources`
--
ALTER TABLE `resources`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `authentications`
--
ALTER TABLE `authentications`
  ADD CONSTRAINT `authentications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `course_groups`
--
ALTER TABLE `course_groups`
  ADD CONSTRAINT `course_groups_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_groups_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_course_group_id_foreign` FOREIGN KEY (`course_group_id`) REFERENCES `course_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `documents_enrollment_id_foreign` FOREIGN KEY (`enrollment_id`) REFERENCES `enrollments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `documents_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `email_verifications`
--
ALTER TABLE `email_verifications`
  ADD CONSTRAINT `email_verifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `enrollments`
--
ALTER TABLE `enrollments`
  ADD CONSTRAINT `enrollments_course_group_id_foreign` FOREIGN KEY (`course_group_id`) REFERENCES `course_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `enrollments_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `enrollments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `grades_course_group_id_foreign` FOREIGN KEY (`course_group_id`) REFERENCES `course_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `grades_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `group_schedules`
--
ALTER TABLE `group_schedules`
  ADD CONSTRAINT `group_schedules_course_group_id_foreign` FOREIGN KEY (`course_group_id`) REFERENCES `course_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `group_schedules_schedule_id_foreign` FOREIGN KEY (`schedule_id`) REFERENCES `schedules` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_concept_id_foreign` FOREIGN KEY (`concept_id`) REFERENCES `payment_concepts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payments_payment_method_id_foreign` FOREIGN KEY (`payment_method_id`) REFERENCES `payment_methods` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `payment_concepts`
--
ALTER TABLE `payment_concepts`
  ADD CONSTRAINT `payment_concepts_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `resources`
--
ALTER TABLE `resources`
  ADD CONSTRAINT `resources_course_group_id_foreign` FOREIGN KEY (`course_group_id`) REFERENCES `course_groups` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
