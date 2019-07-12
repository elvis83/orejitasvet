-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-07-2019 a las 01:36:17
-- Versión del servidor: 10.3.15-MariaDB
-- Versión de PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `orejitas`
--
CREATE DATABASE IF NOT EXISTS `orejitas` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `orejitas`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `appointments`
--

CREATE TABLE `appointments` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `doctor_id` int(10) UNSIGNED NOT NULL,
  `status` enum('Pendiente','Realizado','Cancelado') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Pendiente',
  `user_id` int(10) UNSIGNED NOT NULL,
  `pet_id` int(10) UNSIGNED NOT NULL,
  `invoice_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `appointments`
--

INSERT INTO `appointments` (`id`, `date`, `doctor_id`, `status`, `user_id`, `pet_id`, `invoice_id`, `created_at`, `updated_at`) VALUES
(1, '2019-07-18 22:30:00', 25, '', 20, 0, 1, '2019-07-12 03:55:15', '2019-07-12 04:46:51'),
(2, '2019-07-12 07:21:11', 25, 'Cancelado', 20, 0, 4, '2019-07-12 04:07:45', '2019-07-12 12:21:11'),
(3, '2019-07-12 22:30:00', 25, '', 20, 0, 5, '2019-07-12 04:28:32', '2019-07-12 04:41:13'),
(4, '2019-07-12 03:54:42', 25, 'Realizado', 23, 0, 6, '2019-07-12 05:07:55', '2019-07-12 08:54:42'),
(5, '2019-07-16 21:30:00', 25, 'Pendiente', 23, 0, 7, '2019-07-12 08:54:12', '2019-07-12 08:54:12'),
(6, '2019-07-12 05:38:31', 25, 'Realizado', 24, 1, 13, '2019-07-12 10:32:31', '2019-07-12 10:38:31'),
(7, '2019-07-25 13:30:00', 25, 'Pendiente', 24, 2, 14, '2019-07-12 10:39:42', '2019-07-12 10:39:42'),
(8, '2019-07-12 07:14:06', 25, 'Cancelado', 24, 1, 15, '2019-07-12 11:45:07', '2019-07-12 12:14:06'),
(9, '2019-07-12 07:20:47', 25, 'Cancelado', 24, 1, 16, '2019-07-12 12:12:20', '2019-07-12 12:20:47'),
(10, '2019-07-13 15:30:00', 25, 'Pendiente', 24, 1, 17, '2019-07-12 18:15:10', '2019-07-12 18:15:10'),
(11, '2019-07-31 14:30:00', 25, 'Pendiente', 24, 2, 18, '2019-07-12 18:45:30', '2019-07-12 18:45:30'),
(12, '2019-07-17 21:00:00', 25, 'Pendiente', 24, 1, 19, '2019-07-13 00:24:27', '2019-07-13 00:24:27'),
(13, '2019-07-23 23:00:00', 25, 'Pendiente', 24, 2, 20, '2019-07-13 00:26:25', '2019-07-13 00:26:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clinic_data`
--

CREATE TABLE `clinic_data` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clinic_notes`
--

CREATE TABLE `clinic_notes` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `privacy` enum('public','private') COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `clinic_notes`
--

INSERT INTO `clinic_notes` (`id`, `date`, `description`, `privacy`, `user_id`, `created_by`, `created_at`, `updated_at`) VALUES
(1, '2019-07-13 00:47:12', 'Prueba', 'public', 24, 25, '2019-07-13 00:47:12', '2019-07-13 00:47:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disable_dates`
--

CREATE TABLE `disable_dates` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disable_times`
--

CREATE TABLE `disable_times` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctor_schedules`
--

CREATE TABLE `doctor_schedules` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invoices`
--

CREATE TABLE `invoices` (
  `id` int(10) UNSIGNED NOT NULL,
  `amount` double(8,2) NOT NULL,
  `status` enum('Pendiente','Aprobado','Rechazado','Cancelado','Devolución') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Pendiente',
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `invoices`
--

INSERT INTO `invoices` (`id`, `amount`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 500.00, '', 20, '2019-07-12 03:55:15', '2019-07-12 04:46:51'),
(2, 500.00, '', 20, '2019-07-12 04:02:30', '2019-07-12 04:02:30'),
(3, 500.00, '', 20, '2019-07-12 04:04:29', '2019-07-12 04:04:29'),
(4, 500.00, 'Cancelado', 20, '2019-07-12 04:07:45', '2019-07-12 12:21:11'),
(5, 500.00, '', 20, '2019-07-12 04:28:32', '2019-07-12 04:41:13'),
(6, 500.00, 'Aprobado', 23, '2019-07-12 05:07:55', '2019-07-12 09:07:01'),
(7, 500.00, 'Pendiente', 23, '2019-07-12 08:54:12', '2019-07-12 08:54:12'),
(8, 500.00, 'Pendiente', 24, '2019-07-12 10:23:15', '2019-07-12 10:23:15'),
(9, 500.00, 'Pendiente', 24, '2019-07-12 10:27:16', '2019-07-12 10:27:16'),
(10, 500.00, 'Pendiente', 24, '2019-07-12 10:30:31', '2019-07-12 10:30:31'),
(11, 500.00, 'Pendiente', 24, '2019-07-12 10:30:58', '2019-07-12 10:30:58'),
(12, 500.00, 'Pendiente', 24, '2019-07-12 10:31:35', '2019-07-12 10:31:35'),
(13, 500.00, 'Aprobado', 24, '2019-07-12 10:32:31', '2019-07-12 10:38:31'),
(14, 500.00, 'Pendiente', 24, '2019-07-12 10:39:42', '2019-07-12 10:39:42'),
(15, 500.00, 'Cancelado', 24, '2019-07-12 11:45:07', '2019-07-12 12:14:06'),
(16, 500.00, 'Cancelado', 24, '2019-07-12 12:12:20', '2019-07-12 12:20:47'),
(17, 500.00, 'Pendiente', 24, '2019-07-12 18:15:09', '2019-07-12 18:15:09'),
(18, 500.00, 'Pendiente', 24, '2019-07-12 18:45:30', '2019-07-12 18:45:30'),
(19, 500.00, 'Pendiente', 24, '2019-07-13 00:24:27', '2019-07-13 00:24:27'),
(20, 500.00, 'Pendiente', 24, '2019-07-13 00:26:25', '2019-07-13 00:26:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invoice_metas`
--

CREATE TABLE `invoice_metas` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8_unicode_ci NOT NULL,
  `invoice_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `invoice_metas`
--

INSERT INTO `invoice_metas` (`id`, `key`, `value`, `invoice_id`, `created_at`, `updated_at`) VALUES
(1, 'doctor', '25', 1, '2019-07-12 03:55:15', '2019-07-12 03:55:15'),
(2, 'concept', 'Cita médica', 1, '2019-07-12 03:55:15', '2019-07-12 03:55:15'),
(3, 'doctor', '25', 2, '2019-07-12 04:02:30', '2019-07-12 04:02:30'),
(4, 'concept', 'Cita médica', 2, '2019-07-12 04:02:30', '2019-07-12 04:02:30'),
(5, 'doctor', '25', 3, '2019-07-12 04:04:29', '2019-07-12 04:04:29'),
(6, 'concept', 'Cita médica', 3, '2019-07-12 04:04:29', '2019-07-12 04:04:29'),
(7, 'doctor', '25', 4, '2019-07-12 04:07:45', '2019-07-12 04:07:45'),
(8, 'concept', 'Cita médica', 4, '2019-07-12 04:07:45', '2019-07-12 04:07:45'),
(9, 'doctor', '25', 5, '2019-07-12 04:28:32', '2019-07-12 04:28:32'),
(10, 'concept', 'Cita médica', 5, '2019-07-12 04:28:32', '2019-07-12 04:28:32'),
(11, 'doctor', '25', 6, '2019-07-12 05:07:55', '2019-07-12 05:07:55'),
(12, 'concept', 'Cita médica', 6, '2019-07-12 05:07:55', '2019-07-12 05:07:55'),
(13, 'doctor', '25', 7, '2019-07-12 08:54:12', '2019-07-12 08:54:12'),
(14, 'concept', 'Cita médica', 7, '2019-07-12 08:54:12', '2019-07-12 08:54:12'),
(15, 'doctor', '25', 8, '2019-07-12 10:23:15', '2019-07-12 10:23:15'),
(16, 'concept', 'Cita médica', 8, '2019-07-12 10:23:16', '2019-07-12 10:23:16'),
(17, 'doctor', '25', 9, '2019-07-12 10:27:16', '2019-07-12 10:27:16'),
(18, 'concept', 'Cita médica', 9, '2019-07-12 10:27:16', '2019-07-12 10:27:16'),
(19, 'doctor', '25', 10, '2019-07-12 10:30:31', '2019-07-12 10:30:31'),
(20, 'concept', 'Cita médica', 10, '2019-07-12 10:30:31', '2019-07-12 10:30:31'),
(21, 'doctor', '25', 11, '2019-07-12 10:30:58', '2019-07-12 10:30:58'),
(22, 'concept', 'Cita médica', 11, '2019-07-12 10:30:59', '2019-07-12 10:30:59'),
(23, 'doctor', '25', 12, '2019-07-12 10:31:35', '2019-07-12 10:31:35'),
(24, 'concept', 'Cita médica', 12, '2019-07-12 10:31:35', '2019-07-12 10:31:35'),
(25, 'doctor', '25', 13, '2019-07-12 10:32:31', '2019-07-12 10:32:31'),
(26, 'concept', 'Cita médica', 13, '2019-07-12 10:32:31', '2019-07-12 10:32:31'),
(27, 'doctor', '25', 14, '2019-07-12 10:39:42', '2019-07-12 10:39:42'),
(28, 'concept', 'Cita médica', 14, '2019-07-12 10:39:42', '2019-07-12 10:39:42'),
(29, 'doctor', '25', 15, '2019-07-12 11:45:07', '2019-07-12 11:45:07'),
(30, 'concept', 'Cita médica', 15, '2019-07-12 11:45:07', '2019-07-12 11:45:07'),
(31, 'doctor', '25', 16, '2019-07-12 12:12:20', '2019-07-12 12:12:20'),
(32, 'concept', 'Cita médica', 16, '2019-07-12 12:12:20', '2019-07-12 12:12:20'),
(33, 'doctor', '25', 17, '2019-07-12 18:15:09', '2019-07-12 18:15:09'),
(34, 'concept', 'Cita médica', 17, '2019-07-12 18:15:10', '2019-07-12 18:15:10'),
(35, 'doctor', '25', 18, '2019-07-12 18:45:30', '2019-07-12 18:45:30'),
(36, 'concept', 'Cita médica', 18, '2019-07-12 18:45:30', '2019-07-12 18:45:30'),
(37, 'doctor', '25', 19, '2019-07-13 00:24:27', '2019-07-13 00:24:27'),
(38, 'concept', 'Cita médica', 19, '2019-07-13 00:24:27', '2019-07-13 00:24:27'),
(39, 'doctor', '25', 20, '2019-07-13 00:26:25', '2019-07-13 00:26:25'),
(40, 'concept', 'Cita médica', 20, '2019-07-13 00:26:25', '2019-07-13 00:26:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_06_10_222032_create_roles_table', 1),
(4, '2019_06_10_222457_create_permissions_table', 1),
(5, '2019_06_11_030117_create_role_user_table', 1),
(6, '2019_06_11_030155_create_permission_user_table', 1),
(7, '2019_06_18_044106_create_res_tipodocumento_table', 2),
(8, '2019_06_21_133148_add_dob_to_users_table', 3),
(9, '2019_06_25_203846_drop_permissions_slug_unique', 4),
(10, '2019_07_01_152041_create_invoices_table', 5),
(11, '2019_07_01_152209_create_invoice_metas_table', 5),
(12, '2019_07_01_152225_create_appointments_table', 5),
(13, '2019_07_01_155855_create_specialities_table', 6),
(14, '2019_07_01_160059_create_speciality_user_table', 6),
(15, '2019_07_04_172318_create_pets_table', 7),
(16, '2019_07_12_131813_create_clinic_data_table', 7),
(17, '2019_07_12_143320_create_clinic_notes_table', 8),
(18, '2019_07_12_150524_create_doctor_schedules_table', 9),
(19, '2019_07_12_150556_create_disable_dates_table', 9),
(20, '2019_07_12_150612_create_disable_times_table', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `slug`, `description`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 'index-role', 'index-role', 'Listar todos los roles del sistema', 1, '2019-06-26 02:02:05', '2019-06-26 02:02:05'),
(2, 'create-role', 'create-role', 'Crear un nuevo rol', 1, '2019-06-26 02:02:47', '2019-06-26 02:02:47'),
(3, 'view-role', 'view-role', 'Mostrar un rol', 1, '2019-06-26 02:03:10', '2019-06-26 02:03:10'),
(4, 'update-role', 'update-role', 'Editar rol', 1, '2019-06-26 02:03:56', '2019-06-26 02:03:56'),
(5, 'delete-role', 'delete-role', 'Eliminar rol', 1, '2019-06-26 02:04:26', '2019-06-26 02:04:26'),
(6, 'index-permission', 'index-permission', 'index-permission', 1, '2019-06-26 02:38:37', '2019-06-26 02:38:37'),
(7, 'create-permission', 'create-permission', 'create-permission', 1, '2019-06-26 02:40:08', '2019-06-26 02:40:08'),
(8, 'view-permission', 'view-permission', 'view-permission', 1, '2019-06-26 02:40:39', '2019-06-26 02:40:39'),
(9, 'update-permission', 'update-permission', 'update-permission', 1, '2019-06-26 02:42:22', '2019-06-26 02:42:22'),
(10, 'delete-permission', 'delete-permission', 'delete-permission', 1, '2019-06-26 02:42:54', '2019-06-26 02:42:54'),
(11, 'index-user', 'index-user', 'index-user', 1, '2019-06-25 05:00:00', '2019-06-25 05:00:00'),
(12, 'create-user', 'create-user', 'create-user', 1, '2019-06-25 05:00:00', '2019-06-25 05:00:00'),
(13, 'view-user', 'view-user', 'view-user', 1, '2019-06-25 05:00:00', '2019-06-25 05:00:00'),
(14, 'update-user', 'update-user', 'update-user', 1, '2019-06-25 05:00:00', '2019-06-25 05:00:00'),
(15, 'delete-user', 'delete-user', 'delete-user', 1, '2019-06-25 05:00:00', '2019-06-25 05:00:00'),
(16, 'assign-role-user', 'assign-role-user', 'assign-role-user', 1, '2019-06-25 05:00:00', '2019-06-25 05:00:00'),
(17, 'assign-permission-user', 'assign-permission-user', 'assign-permission-user', 1, '2019-06-25 05:00:00', '2019-06-25 05:00:00'),
(18, 'import-user', 'import-user', 'import-user', 1, '2019-06-25 05:00:00', '2019-06-29 14:11:16'),
(20, 'index-tipodocumento', 'index-tipodocumento', 'index-tipodocumento', 1, '2019-06-30 01:14:49', '2019-06-30 01:14:49'),
(22, 'create-tipodocumento', 'create-tipodocumento', 'create-tipodocumento', 1, '2019-06-30 01:17:47', '2019-06-30 01:17:47'),
(23, 'view-tipodocumento', 'view-tipodocumento', 'view-tipodocumento', 1, '2019-06-30 01:18:22', '2019-06-30 01:18:22'),
(24, 'update-tipodocumento', 'update-tipodocumento', 'update-tipodocumento', 1, '2019-06-30 01:18:46', '2019-06-30 01:18:46'),
(25, 'delete-tipodocumento', 'delete-tipodocumento', 'delete-tipodocumento', 1, '2019-06-30 01:19:57', '2019-06-30 01:19:57'),
(27, 'index-user', 'index-user', 'index-user', 2, '2019-07-01 00:43:45', '2019-07-01 00:43:45'),
(28, 'create-user', 'create-user', 'create-user', 2, '2019-07-01 00:49:56', '2019-07-01 00:49:56'),
(29, 'view-user', 'view-user', 'view-user', 2, '2019-07-01 00:50:23', '2019-07-01 00:50:23'),
(30, 'update-user', 'update-user', 'update-user', 2, '2019-07-01 00:50:47', '2019-07-01 00:50:47'),
(31, 'delete-user', 'delete-user', 'delete-user', 2, '2019-07-01 00:51:09', '2019-07-01 00:51:09'),
(32, 'index-user', 'index-user', 'index-user', 3, '2019-07-01 19:46:15', '2019-07-01 19:46:15'),
(33, 'view-user', 'view-user', 'view-user', 3, '2019-07-01 19:47:00', '2019-07-01 19:47:00'),
(34, 'create-user', 'create-user', 'create-user', 3, '2019-07-01 19:47:18', '2019-07-01 19:47:18'),
(35, 'index-pet', 'index-pet', 'index-pet', 1, '2019-07-04 22:34:37', '2019-07-04 22:34:37'),
(36, 'index-insumo', 'index-insumo', 'index-insumo', 1, '2019-07-08 20:58:14', '2019-07-08 20:58:14'),
(37, 'create-insumo', 'create-insumo', 'create-insumo', 1, '2019-07-08 20:59:18', '2019-07-08 20:59:18'),
(38, 'view-insumo', 'view-insumo', 'view-insumo', 1, '2019-07-08 20:59:55', '2019-07-08 20:59:55'),
(39, 'update-insumo', 'update-insumo', 'update-insumo', 1, '2019-07-08 21:00:31', '2019-07-08 21:00:31'),
(40, 'delete-insumo', 'delete-insumo', 'delete-insumo', 1, '2019-07-08 21:01:02', '2019-07-08 21:01:02'),
(41, 'create-pet', 'create-pet', 'create-pet', 1, '2019-07-09 19:10:59', '2019-07-09 19:10:59'),
(42, 'view-pet', 'view-pet', 'view-pet', 1, '2019-07-09 19:11:17', '2019-07-09 19:11:17'),
(43, 'update-pet', 'update-pet', 'update-pet', 1, '2019-07-09 19:11:34', '2019-07-09 19:11:34'),
(44, 'delete-pet', 'delete-pet', 'delete-pet', 1, '2019-07-09 19:11:51', '2019-07-09 19:11:51'),
(45, 'index-servicio', 'index-servicio', 'index-servicio', 1, '2019-07-09 19:35:00', '2019-07-09 19:35:00'),
(46, 'create-servicio', 'create-servicio', 'create-servicio', 1, '2019-07-09 19:35:24', '2019-07-09 19:35:24'),
(47, 'view-servicio', 'view-servicio', 'view-servicio', 1, '2019-07-09 19:35:44', '2019-07-09 19:35:44'),
(48, 'update-servicio', 'update-servicio', 'update-servicio', 1, '2019-07-09 19:36:06', '2019-07-09 19:36:06'),
(49, 'delete-servicio', 'delete-servicio', 'delete-servicio', 1, '2019-07-09 19:36:23', '2019-07-09 19:36:23'),
(50, 'index-tiposervicio', 'index-tiposervicio', 'index-tiposervicio', 1, '2019-07-09 20:18:52', '2019-07-09 20:18:52'),
(51, 'create-tiposervicio', 'create-tiposervicio', 'create-tiposervicio', 1, '2019-07-09 20:19:08', '2019-07-09 20:19:08'),
(52, 'view-tiposervicio', 'view-tiposervicio', 'view-tiposervicio', 1, '2019-07-09 20:19:29', '2019-07-09 20:19:29'),
(53, 'update-tiposervicio', 'update-tiposervicio', 'update-tiposervicio', 1, '2019-07-09 20:19:46', '2019-07-09 20:19:46'),
(54, 'delete-tiposervicio', 'delete-tiposervicio', 'delete-tiposervicio', 1, '2019-07-09 20:20:04', '2019-07-09 20:20:04'),
(55, 'index-pet', 'index-pet', 'index-pet', 2, '2019-07-12 09:31:25', '2019-07-12 09:31:25'),
(56, 'create-pet', 'create-pet', 'create-pet', 2, '2019-07-12 09:31:47', '2019-07-12 09:31:47'),
(57, 'view-pet', 'view-pet', 'view-pet', 2, '2019-07-12 09:32:04', '2019-07-12 09:32:04'),
(58, 'view-appointments', 'view-appointments', 'view-appointments', 3, '2019-07-12 11:40:58', '2019-07-12 11:40:58'),
(59, 'view-appointments-calendar', 'view-appointments-calendar', 'view_appointments_calendar', 3, '2019-07-12 11:57:12', '2019-07-12 11:58:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permission_user`
--

CREATE TABLE `permission_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `permission_user`
--

INSERT INTO `permission_user` (`id`, `permission_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 17, '2019-06-26 02:05:59', '2019-06-26 02:05:59'),
(2, 2, 17, '2019-06-26 02:05:59', '2019-06-26 02:05:59'),
(3, 3, 17, '2019-06-26 02:05:59', '2019-06-26 02:05:59'),
(4, 4, 17, '2019-06-26 02:05:59', '2019-06-26 02:05:59'),
(5, 5, 17, '2019-06-26 02:05:59', '2019-06-26 02:05:59'),
(20, 9, 17, '2019-06-29 14:18:35', '2019-06-29 14:18:35'),
(24, 6, 17, '2019-06-29 14:21:19', '2019-06-29 14:21:19'),
(25, 7, 17, '2019-06-29 14:21:49', '2019-06-29 14:21:49'),
(26, 17, 17, '2019-06-29 14:21:50', '2019-06-29 14:21:50'),
(27, 8, 17, '2019-06-29 14:40:03', '2019-06-29 14:40:03'),
(28, 16, 17, '2019-06-29 14:40:03', '2019-06-29 14:40:03'),
(29, 11, 17, '2019-06-29 14:40:21', '2019-06-29 14:40:21'),
(30, 13, 17, '2019-06-29 14:40:21', '2019-06-29 14:40:21'),
(31, 12, 17, '2019-06-29 15:42:44', '2019-06-29 15:42:44'),
(32, 14, 17, '2019-06-29 15:42:44', '2019-06-29 15:42:44'),
(33, 15, 17, '2019-06-29 15:42:44', '2019-06-29 15:42:44'),
(38, 10, 17, '2019-06-29 17:46:47', '2019-06-29 17:46:47'),
(39, 18, 17, '2019-06-29 17:46:47', '2019-06-29 17:46:47'),
(40, 20, 17, '2019-06-30 04:00:52', '2019-06-30 04:00:52'),
(41, 22, 17, '2019-06-30 04:00:52', '2019-06-30 04:00:52'),
(42, 23, 17, '2019-06-30 04:00:52', '2019-06-30 04:00:52'),
(43, 24, 17, '2019-06-30 04:00:52', '2019-06-30 04:00:52'),
(44, 25, 17, '2019-06-30 04:00:52', '2019-06-30 04:00:52'),
(68, 27, 22, '2019-07-01 00:44:39', '2019-07-01 00:44:39'),
(69, 28, 22, '2019-07-01 00:51:30', '2019-07-01 00:51:30'),
(70, 29, 22, '2019-07-01 00:51:30', '2019-07-01 00:51:30'),
(71, 30, 22, '2019-07-01 00:51:30', '2019-07-01 00:51:30'),
(72, 31, 22, '2019-07-01 00:51:30', '2019-07-01 00:51:30'),
(73, 32, 25, '2019-07-01 19:47:32', '2019-07-01 19:47:32'),
(74, 33, 25, '2019-07-01 19:47:32', '2019-07-01 19:47:32'),
(75, 34, 25, '2019-07-01 19:47:32', '2019-07-01 19:47:32'),
(104, 35, 17, '2019-07-04 22:38:32', '2019-07-04 22:38:32'),
(105, 36, 17, '2019-07-08 21:01:32', '2019-07-08 21:01:32'),
(106, 37, 17, '2019-07-08 21:01:32', '2019-07-08 21:01:32'),
(107, 38, 17, '2019-07-08 21:01:32', '2019-07-08 21:01:32'),
(108, 39, 17, '2019-07-08 21:01:32', '2019-07-08 21:01:32'),
(109, 40, 17, '2019-07-08 21:01:32', '2019-07-08 21:01:32'),
(110, 41, 17, '2019-07-09 19:12:05', '2019-07-09 19:12:05'),
(111, 42, 17, '2019-07-09 19:12:05', '2019-07-09 19:12:05'),
(112, 43, 17, '2019-07-09 19:12:05', '2019-07-09 19:12:05'),
(113, 44, 17, '2019-07-09 19:12:05', '2019-07-09 19:12:05'),
(114, 45, 17, '2019-07-09 19:36:37', '2019-07-09 19:36:37'),
(115, 46, 17, '2019-07-09 19:36:37', '2019-07-09 19:36:37'),
(116, 47, 17, '2019-07-09 19:36:37', '2019-07-09 19:36:37'),
(117, 48, 17, '2019-07-09 19:36:37', '2019-07-09 19:36:37'),
(118, 49, 17, '2019-07-09 19:36:37', '2019-07-09 19:36:37'),
(119, 50, 17, '2019-07-09 20:20:21', '2019-07-09 20:20:21'),
(120, 51, 17, '2019-07-09 20:20:21', '2019-07-09 20:20:21'),
(121, 52, 17, '2019-07-09 20:20:21', '2019-07-09 20:20:21'),
(122, 53, 17, '2019-07-09 20:20:21', '2019-07-09 20:20:21'),
(123, 54, 17, '2019-07-09 20:20:21', '2019-07-09 20:20:21'),
(124, 55, 22, '2019-07-12 09:32:18', '2019-07-12 09:32:18'),
(125, 56, 22, '2019-07-12 09:32:18', '2019-07-12 09:32:18'),
(126, 57, 22, '2019-07-12 09:32:18', '2019-07-12 09:32:18'),
(127, 58, 25, '2019-07-12 11:41:20', '2019-07-12 11:41:20'),
(128, 59, 25, '2019-07-12 11:57:26', '2019-07-12 11:57:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 'administrador', 'Administrador', '2019-06-26 01:49:13', '2019-06-26 01:50:47'),
(2, 'Asistente', 'asistente', 'Asistente', '2019-06-26 01:49:38', '2019-06-26 01:51:02'),
(3, 'Doctor', 'doctor', 'Doctor', '2019-06-26 01:50:07', '2019-06-30 03:46:52'),
(5, 'Cliente', 'cliente', 'Cliente', '2019-06-29 10:28:32', '2019-06-29 10:28:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_user`
--

CREATE TABLE `role_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(5, 1, 17, '2019-06-29 14:41:01', '2019-06-29 14:41:01'),
(10, 5, 20, '2019-06-29 18:03:13', '2019-06-29 18:03:13'),
(13, 2, 22, '2019-06-30 23:39:07', '2019-06-30 23:39:07'),
(14, 2, 21, '2019-07-01 00:34:20', '2019-07-01 00:34:20'),
(15, 5, 23, '2019-07-01 00:52:46', '2019-07-01 00:52:46'),
(16, 5, 24, '2019-07-01 01:14:54', '2019-07-01 01:14:54'),
(17, 3, 25, '2019-07-01 19:42:05', '2019-07-01 19:42:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ser_mascotas`
--

CREATE TABLE `ser_mascotas` (
  `id` int(10) UNSIGNED NOT NULL,
  `mas_nombre` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `mas_tipo` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `mas_raza` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `mas_sexo` enum('M','H') COLLATE utf8_unicode_ci NOT NULL COMMENT 'Valores permitidos: (M) Macho y (H) Hembra',
  `mas_gs` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `mas_alergia` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mas_fecnac` date NOT NULL,
  `mas_color` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `mas_foto` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mas_estado` enum('A','I') COLLATE utf8_unicode_ci NOT NULL COMMENT 'Valores permitidos: (A) Activo y (I) Inactivo',
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='En la tabla mascota se registran los datos de la mascota quien será el paciente, el cual obtendrá el servicio de la veterinaria.';

--
-- Volcado de datos para la tabla `ser_mascotas`
--

INSERT INTO `ser_mascotas` (`id`, `mas_nombre`, `mas_tipo`, `mas_raza`, `mas_sexo`, `mas_gs`, `mas_alergia`, `mas_fecnac`, `mas_color`, `mas_foto`, `mas_estado`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Thiago', 'Canino', 'Golden', 'M', 'R001', NULL, '2018-01-01', 'Blanco', NULL, 'A', 24, '2019-07-09 19:14:57', '2019-07-09 22:44:48'),
(2, 'Panchito', 'Felino', 'Angora', 'M', 'R001', NULL, '2018-05-02', 'Beige', NULL, 'A', 24, '2019-07-12 09:34:25', '2019-07-12 09:34:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ser_servicios`
--

CREATE TABLE `ser_servicios` (
  `id` int(10) UNSIGNED NOT NULL,
  `ser_nombre` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='El servicio describe la actividad por la cual el cliente separó una cita para su mascota.';

--
-- Volcado de datos para la tabla `ser_servicios`
--

INSERT INTO `ser_servicios` (`id`, `ser_nombre`, `created_at`, `updated_at`) VALUES
(1, 'Estética', '2019-07-09 19:37:43', '2019-07-09 19:37:43'),
(3, 'Cirugía', '2019-07-09 21:45:57', '2019-07-09 21:45:57'),
(4, 'Esterilización', '2019-07-09 21:46:23', '2019-07-09 21:46:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ser_tipo_servicios`
--

CREATE TABLE `ser_tipo_servicios` (
  `id` int(10) NOT NULL,
  `tips_desc` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `tips_costo` decimal(4,2) NOT NULL DEFAULT 0.00,
  `ser_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='El tipo de servicio será dado por las diversas actividades que se realiza en la veterinaria.';

--
-- Volcado de datos para la tabla `ser_tipo_servicios`
--

INSERT INTO `ser_tipo_servicios` (`id`, `tips_desc`, `tips_costo`, `ser_id`, `created_at`, `updated_at`) VALUES
(1, 'Bano', '26.00', 3, '2019-07-09 20:42:52', '2019-07-09 21:47:02'),
(2, 'Cirugía Abdominal', '99.00', 3, '2019-07-09 21:52:09', '2019-07-09 21:52:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `specialities`
--

CREATE TABLE `specialities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `specialities`
--

INSERT INTO `specialities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Cirugía', '2019-07-01 05:00:00', '2019-07-02 19:37:37'),
(3, 'Estética', '2019-07-02 20:35:36', '2019-07-02 20:35:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `speciality_user`
--

CREATE TABLE `speciality_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `speciality_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `speciality_user`
--

INSERT INTO `speciality_user` (`id`, `user_id`, `speciality_id`, `created_at`, `updated_at`) VALUES
(1, 25, 1, '2019-07-02 05:00:00', '2019-07-02 05:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dob` date DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `dob`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(17, 'Elvis', '1983-07-01', 'elvis@correo.com', NULL, '$2y$10$BB5JiVaLf4/9O5ANWdElUuIAq1oON/2uPWXlNFj6Tb7nony0bFrTe', NULL, '2019-06-26 01:47:00', '2019-06-26 01:47:00'),
(20, 'Luis', '1988-04-26', 'luis@correo.com', NULL, '$2y$10$qjiUfUdbg4uPsoJNmgkmHOMvMjQaJryAmUxFB1EhY3PCDX92lw80y', NULL, '2019-06-29 18:03:13', '2019-07-01 19:36:21'),
(21, 'Prueba', '2000-02-01', 'prueba@correo.com', NULL, '$2y$10$GKG9vrX2rIVUuu1.BJ2tTOhOPFr961G3SLpUZnPPRxDXGrexFWzcG', NULL, '2019-06-30 23:01:41', '2019-06-30 23:01:42'),
(22, 'Elizabeth', '1990-03-25', 'asistente@correo.com', NULL, '$2y$10$.dlkhKOG6wY/rPPvN6euWOBYIOscRLhU6tdtPIqxlEJpCBht.p536', NULL, '2019-06-30 23:19:33', '2019-06-30 23:19:33'),
(23, 'Alejandro', '1982-08-07', 'alejandro@correo.com', NULL, '$2y$10$/z5EztWDzFs1dAdap589IeuGSl6vuELizQSM50qrtbyFuRefVD8Ii', NULL, '2019-07-01 00:52:46', '2019-07-01 00:52:46'),
(24, 'Carlos', '2001-05-01', 'carlos@correo.com', NULL, '$2y$10$KrUC50bVI4JxejAvOhOoJ.wevJEBdwxbHlgUsP8dWP5jxG6vvcWnC', NULL, '2019-07-01 01:14:54', '2019-07-01 01:14:54'),
(25, 'Doctor', '1992-12-31', 'doctor@correo.com', NULL, '$2y$10$kN6ZeQnElmB9O8FBExaFJO0iVE1kTbVJmdNTcEQYZ.bQHV2B4G9wu', NULL, '2019-07-01 19:42:04', '2019-07-01 19:42:05');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointments_user_id_foreign` (`user_id`),
  ADD KEY `appointments_invoice_id_foreign` (`invoice_id`);

--
-- Indices de la tabla `clinic_data`
--
ALTER TABLE `clinic_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clinic_datas_user_id_foreign` (`user_id`),
  ADD KEY `clinic_datas_created_by_foreign` (`created_by`),
  ADD KEY `clinic_datas_updated_by_foreign` (`updated_by`);

--
-- Indices de la tabla `clinic_notes`
--
ALTER TABLE `clinic_notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clinic_notes_user_id_foreign` (`user_id`),
  ADD KEY `clinic_notes_created_by_foreign` (`created_by`);

--
-- Indices de la tabla `disable_dates`
--
ALTER TABLE `disable_dates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `disable_dates_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `disable_times`
--
ALTER TABLE `disable_times`
  ADD PRIMARY KEY (`id`),
  ADD KEY `disable_times_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `doctor_schedules`
--
ALTER TABLE `doctor_schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_schedules_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoices_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `invoice_metas`
--
ALTER TABLE `invoice_metas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_metas_invoice_id_foreign` (`invoice_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`),
  ADD KEY `permission_user_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indices de la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `ser_mascotas`
--
ALTER TABLE `ser_mascotas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `USER_MASC` (`user_id`);

--
-- Indices de la tabla `ser_servicios`
--
ALTER TABLE `ser_servicios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `IU_SERVICIO` (`ser_nombre`) USING BTREE;

--
-- Indices de la tabla `ser_tipo_servicios`
--
ALTER TABLE `ser_tipo_servicios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `IU_TIPOSERVICIO` (`tips_desc`) USING BTREE,
  ADD KEY `SERV_TIPSERV` (`ser_id`);

--
-- Indices de la tabla `specialities`
--
ALTER TABLE `specialities`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `speciality_user`
--
ALTER TABLE `speciality_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `speciality_user_user_id_foreign` (`user_id`),
  ADD KEY `speciality_user_speciality_id_foreign` (`speciality_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `clinic_data`
--
ALTER TABLE `clinic_data`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clinic_notes`
--
ALTER TABLE `clinic_notes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `disable_dates`
--
ALTER TABLE `disable_dates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `disable_times`
--
ALTER TABLE `disable_times`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `doctor_schedules`
--
ALTER TABLE `doctor_schedules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `invoice_metas`
--
ALTER TABLE `invoice_metas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de la tabla `permission_user`
--
ALTER TABLE `permission_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `ser_mascotas`
--
ALTER TABLE `ser_mascotas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ser_servicios`
--
ALTER TABLE `ser_servicios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `ser_tipo_servicios`
--
ALTER TABLE `ser_tipo_servicios`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `specialities`
--
ALTER TABLE `specialities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `speciality_user`
--
ALTER TABLE `speciality_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appointments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `clinic_data`
--
ALTER TABLE `clinic_data`
  ADD CONSTRAINT `clinic_datas_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clinic_datas_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clinic_datas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `clinic_notes`
--
ALTER TABLE `clinic_notes`
  ADD CONSTRAINT `clinic_notes_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clinic_notes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `disable_dates`
--
ALTER TABLE `disable_dates`
  ADD CONSTRAINT `disable_dates_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `disable_times`
--
ALTER TABLE `disable_times`
  ADD CONSTRAINT `disable_times_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `doctor_schedules`
--
ALTER TABLE `doctor_schedules`
  ADD CONSTRAINT `doctor_schedules_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `invoice_metas`
--
ALTER TABLE `invoice_metas`
  ADD CONSTRAINT `invoice_metas_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permissions_permission_user` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_permission_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `roles_role_user` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_role_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ser_mascotas`
--
ALTER TABLE `ser_mascotas`
  ADD CONSTRAINT `USER_MASC` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ser_tipo_servicios`
--
ALTER TABLE `ser_tipo_servicios`
  ADD CONSTRAINT `SERV_TIPSERV` FOREIGN KEY (`ser_id`) REFERENCES `ser_servicios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `speciality_user`
--
ALTER TABLE `speciality_user`
  ADD CONSTRAINT `speciality_speciality` FOREIGN KEY (`speciality_id`) REFERENCES `specialities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `speciality_speciality_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

