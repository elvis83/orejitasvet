-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-06-2019 a las 02:38:48
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
-- Base de datos: `orejitasvet`
--
CREATE DATABASE IF NOT EXISTS `orejitasvet` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `orejitasvet`;

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
(8, '2019_06_21_133148_add_dob_to_users_table', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_comprobantes`
--

CREATE TABLE `pag_comprobantes` (
  `com_id` int(11) NOT NULL,
  `com_fecha` date NOT NULL,
  `com_tipo` enum('B','F') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'B' COMMENT 'Valores permitidos: (B) Boleta y (F) Factura.',
  `com_monto` decimal(4,2) NOT NULL DEFAULT 0.00,
  `com_estado` enum('V','A') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'V' COMMENT 'Valores permitidos: (A) Anulado y (V) Vigente.',
  `clie_id` int(11) NOT NULL,
  `tipp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='El comprobante será el documento que acredite la prestación del servicio.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_detalle_comprobantes`
--

CREATE TABLE `pag_detalle_comprobantes` (
  `detc_cant` int(11) NOT NULL DEFAULT 0,
  `detc_preu` decimal(3,2) NOT NULL DEFAULT 0.00,
  `com_id` int(11) NOT NULL,
  `ser_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='El detalle del comprobantenos describe los servicios adquiridos por el cliente y detalla los costos generados.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_tipo_pagos`
--

CREATE TABLE `pag_tipo_pagos` (
  `tipp_id` int(11) NOT NULL,
  `tipp_desc` varchar(60) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='El tipo de pago se dará por el tipo de modalidad que elija el cliente para poder cancelar la deuda por la obtención del servicio.';

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
(1, 'admin_1', 'admin-1', '123', 1, '2019-06-19 23:26:33', '2019-06-19 23:26:33'),
(2, 'admin_2', 'admin-2', '123', 1, '2019-06-19 23:27:06', '2019-06-19 23:27:06');

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
(1, 1, 1, '2019-06-20 09:46:29', '2019-06-20 09:46:29'),
(3, 2, 1, '2019-06-21 09:46:03', '2019-06-21 09:46:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `res_citas`
--

CREATE TABLE `res_citas` (
  `cit_id` int(11) NOT NULL,
  `cit_fecha` date NOT NULL,
  `cit_estado` enum('P','C','R') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'P' COMMENT 'Valores permitidos: (P) Pendiente, (C) Cancelado y (R) Realizado.',
  `res_id` int(11) NOT NULL,
  `ser_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='La cita será cuando ya se haya dado el día y la hora fijad, y se apersonen a la veterinaria a pasar consulta.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `res_clientes`
--

CREATE TABLE `res_clientes` (
  `clie_id` int(11) NOT NULL,
  `clie_estado` enum('A','B') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'A' COMMENT 'Valores permitidos: (A) Activo y (B) Baja',
  `per_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='En la tabla Cliente se registrarán los datos de quien será intermediario y dueño, quien se encargará de llevar a su mascota para recibir un servicio de la veterinaria.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `res_especialidades`
--

CREATE TABLE `res_especialidades` (
  `esp_id` int(11) NOT NULL,
  `esp_nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `esp_descripcion` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='La especialidad clinica supone el cargo que el Medico ocupa dentro de la veterinaria para poder ofrecer un servicio determinado.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `res_medicos`
--

CREATE TABLE `res_medicos` (
  `med_id` int(11) NOT NULL,
  `med_estado` enum('A','B') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'A' COMMENT 'Valores permitidos (A) Activo y (B) Baja.',
  `per_id` int(11) NOT NULL,
  `esp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='La tabla Médico describe los datos del especialista que trabaja en la Veterinaria y atenderá los servicios solicitados por los clientes.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `res_personas`
--

CREATE TABLE `res_personas` (
  `per_id` int(11) NOT NULL,
  `per_apepat` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `per_apemat` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `per_nombres` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `per_dir` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `tipd_id` int(11) NOT NULL,
  `per_nrodoc` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `per_fecnac` date NOT NULL,
  `per_sexo` enum('H','M','I') COLLATE utf8_unicode_ci NOT NULL COMMENT 'Valores permitidos: (H) Hombre - (M) Mujer - (I) Indefinido',
  `per_tel` varchar(9) COLLATE utf8_unicode_ci DEFAULT NULL,
  `per_cel` varchar(9) COLLATE utf8_unicode_ci DEFAULT NULL,
  `per_ecivil` enum('S','C','V','D') COLLATE utf8_unicode_ci NOT NULL COMMENT 'Valores permitidos: (S) Soltero, (C) Casado, (V) Viudo y (D) Divorciado',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='En la tabla Persona se generaliza los datos, ya sea de un Cliente o un Médico';

--
-- Volcado de datos para la tabla `res_personas`
--

INSERT INTO `res_personas` (`per_id`, `per_apepat`, `per_apemat`, `per_nombres`, `per_dir`, `tipd_id`, `per_nrodoc`, `per_fecnac`, `per_sexo`, `per_tel`, `per_cel`, `per_ecivil`, `created_at`, `updated_at`) VALUES
(1, 'CASTRO', 'JAVIER', 'ALBERTO', 'AV. PARDO 133', 1, '44444448', '1975-12-12', 'H', '999999999', NULL, 'C', '2019-06-18 21:29:39', '2019-06-18 21:29:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `res_reservas`
--

CREATE TABLE `res_reservas` (
  `res_id` int(11) NOT NULL,
  `res_fecres` date NOT NULL,
  `res_motivo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `res_estado` enum('P','C','R') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'P' COMMENT 'Valores permitidos: (P) Pendiente, (C) Cancelado y (R) Relaizado.',
  `mas_id` int(11) NOT NULL,
  `tur_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='La reserva se genera cuando el cliente contacta con la veterinaria para separar una cita.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `res_tipodocumentos`
--

CREATE TABLE `res_tipodocumentos` (
  `tipd_id` int(11) NOT NULL,
  `tipd_nombre` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `tipd_abreviatura` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `res_tipodocumentos`
--

INSERT INTO `res_tipodocumentos` (`tipd_id`, `tipd_nombre`, `tipd_abreviatura`, `created_at`, `updated_at`) VALUES
(1, 'Documento Nacional de Identidad', 'DNI', '2019-06-18 10:27:39', '2019-06-18 10:27:39'),
(2, 'Pasaporte', 'PAS', '2019-06-18 10:33:12', '2019-06-18 10:33:12'),
(3, 'Tarjeta de Registro Civil', 'TRC', '2019-06-18 10:36:07', '2019-06-18 10:36:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `res_turnos`
--

CREATE TABLE `res_turnos` (
  `tur_id` int(11) NOT NULL,
  `tur_fectur` date NOT NULL,
  `tur_hini` time NOT NULL,
  `tur_hfin` time NOT NULL,
  `tur_estado` enum('D','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'D' COMMENT 'Valores permitidos: (D) Disponible y (N) No Disponible',
  `med_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='El turno programado es la programación de las fechas y horarios de atención de los médicos.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `res_usuarios`
--

CREATE TABLE `res_usuarios` (
  `usu_id` int(11) NOT NULL,
  `med_id` int(11) NOT NULL,
  `usu_user` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `usu_clave` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `usu_fecreg` date NOT NULL,
  `usu_estado` enum('A','B') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'A' COMMENT 'Valores permitidos: (A) Activo - (B) Baja.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='La tabla Usuario establece una cuenta única a un Médico para el uso del Sistema Web, para poder acceder al sistema y sus características.';

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
(1, 'ADMINISTRADOR', 'administrador', '123', '2019-06-19 23:26:03', '2019-06-20 03:34:47'),
(3, 'Paciente', 'paciente', 'Paciente', '2019-06-21 09:59:11', '2019-06-21 09:59:11'),
(4, 'Doctor', 'doctor', 'Doctor', '2019-06-21 09:59:37', '2019-06-21 09:59:37');

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
(4, 1, 1, '2019-06-21 09:21:06', '2019-06-21 09:21:06'),
(5, 3, 2, '2019-06-21 10:02:37', '2019-06-21 10:02:37'),
(6, 3, 3, '2019-06-21 10:10:45', '2019-06-21 10:10:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ser_control_vacunas`
--

CREATE TABLE `ser_control_vacunas` (
  `con_id` int(11) NOT NULL,
  `con_fecap` date NOT NULL,
  `con_fecve` date NOT NULL,
  `con_obs` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tips_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='El control de vacuna será el cronograma que se debe seguir para estar al día con las vacunas de la mascota.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ser_detalle_historias`
--

CREATE TABLE `ser_detalle_historias` (
  `deth_id` int(11) NOT NULL,
  `deth_fechis` date NOT NULL,
  `deth_obs` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deth_estado` enum('V','A') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'V' COMMENT 'Valores permitidos: (V) Vigente y (A) Anulado.',
  `his_id` int(11) NOT NULL,
  `con_id` int(11) NOT NULL,
  `ser_id` int(11) NOT NULL,
  `exa_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='El detalle de la historia muestra la descripción de la historia, la cual mostrará los datos por fechas y atención de las mascotas y los detalles más relevantes.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ser_detalle_insumos`
--

CREATE TABLE `ser_detalle_insumos` (
  `deti_cant` int(11) NOT NULL,
  `deti_id` int(11) NOT NULL,
  `deti_estado` enum('D','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'D' COMMENT 'Valores permitidos: (D) Disponible y (N) No Disponible.',
  `ser_id` int(11) NOT NULL,
  `ins_id` int(11) NOT NULL,
  `medi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='En la tabla detalle insumos se detallarán los insumos usados por cada servicio que se brinda.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ser_diagnosticos`
--

CREATE TABLE `ser_diagnosticos` (
  `dia_id` int(11) NOT NULL,
  `dia_trat` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `dia_obs` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `res_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='El diagnóstico será el procedimiento por el cual se identifica alguna enfermedad o cualquier estado de salud.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ser_examenes`
--

CREATE TABLE `ser_examenes` (
  `exa_id` int(11) NOT NULL,
  `exa_temp` decimal(2,1) NOT NULL DEFAULT 0.0,
  `exa_peso` decimal(3,2) NOT NULL DEFAULT 0.00,
  `exa_pulso` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `exa_resp` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `exa_anom` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `tips_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='El examen es la evaluación clínica que el médico recolecta recoge para obtener información objetiva y luego analizarla.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ser_historia_clinicas`
--

CREATE TABLE `ser_historia_clinicas` (
  `his_id` int(11) NOT NULL,
  `his_fecreg` date NOT NULL,
  `his_estado` enum('A','B') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'A' COMMENT 'Valores permitidos: (A) Activo y (B) Baja.',
  `mas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='La historia clínica se origina por el primer episodio de alguna enfermedad o control de salud de la mascota.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ser_insumos`
--

CREATE TABLE `ser_insumos` (
  `ins_id` int(11) NOT NULL,
  `ins_desc` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `ins_uni` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `ins_stock` int(11) NOT NULL,
  `ins_fecven` date NOT NULL,
  `ins_estado` enum('D','F') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'D' COMMENT 'Valores permitidos: (D) Disponible y (F) Faltante.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Los insumos serán los materiales utilizados para la atención de los pacientes.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ser_mascotas`
--

CREATE TABLE `ser_mascotas` (
  `mas_id` int(11) NOT NULL,
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
  `clie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='En la tabla mascota se registran los datos de la mascota quien será el paciente, el cual obtendrá el servicio de la veterinaria.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ser_medicamentos`
--

CREATE TABLE `ser_medicamentos` (
  `medi_id` int(11) NOT NULL,
  `medi_nombre` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `medi_desc` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `medi_pres` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `medi_stock` int(11) NOT NULL,
  `medi_fecven` date NOT NULL,
  `medi_estado` enum('A','B') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'A' COMMENT 'Valores permitidos: (A) Activo y (B) Baja.',
  `medi_precio` decimal(5,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='El medicamento será la sustancia que sirve para curar o prevenir una enfermedad.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ser_receta_medicas`
--

CREATE TABLE `ser_receta_medicas` (
  `rec_id` int(11) NOT NULL,
  `rec_fecexp` date NOT NULL,
  `rec_feccad` date NOT NULL,
  `dia_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='La receta médica será el documento legal por la cual el médico prescribe la medicación a la mascota para su dispensación.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ser_receta_medica_detalles`
--

CREATE TABLE `ser_receta_medica_detalles` (
  `detr_can` int(11) NOT NULL,
  `detr_obs` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `detr_dia` int(11) NOT NULL,
  `detr_ind` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `rec_id` int(11) NOT NULL,
  `medi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='El detalle de la receta médica describirá la medicación individualmente si a a mascota se le recetará más de un medicamento.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ser_resultados`
--

CREATE TABLE `ser_resultados` (
  `res_id` int(11) NOT NULL,
  `res_anexo` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `res_obs1` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `res_obs2` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `exa_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Los resultados serán dados por la evaluación de los exámenes previamente realizados.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ser_servicios`
--

CREATE TABLE `ser_servicios` (
  `ser_id` int(11) NOT NULL,
  `ser_nombre` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `ser_monto` decimal(4,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='El servicio describe la actividad por la cual el cliente separó una cita para su mascota.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ser_tipo_examenes`
--

CREATE TABLE `ser_tipo_examenes` (
  `tipe_id` int(11) NOT NULL,
  `tipe_nombre` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `tipe_estado` enum('R','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N' COMMENT 'Valores permitidos: (R) Revisado y (N) No Revisado.',
  `exa_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='El tipo de examen varia por el tipo de requerimiento de la mascota a evaluar para poder dar un resultado.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ser_tipo_servicios`
--

CREATE TABLE `ser_tipo_servicios` (
  `tips_id` int(11) NOT NULL,
  `tips_desc` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `tips_costo` decimal(4,2) NOT NULL DEFAULT 0.00,
  `ser_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='El tipo de servicio será dado por las diversas actividades que se realiza en la veterinaria.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ser_tipo_vacunas`
--

CREATE TABLE `ser_tipo_vacunas` (
  `tipv_id` int(11) NOT NULL,
  `tipv_nombre` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `tipv_desc` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `con_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='El tipo de vacuna podrá variar de acuerdo a lo que requiera la mascota, según la edad y enfermedades que presenta.';

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
(1, 'Elvis Bernardo', '1983-07-01', 'sivle1983@gmail.com', NULL, '$2y$10$Oi2uZheII6siFVstIuYvCOU4FblLDmn06TObzAmSUWh3JvZatdx.i', NULL, '2019-06-19 23:23:37', '2019-06-19 23:23:37'),
(2, 'Jesus', '2001-05-16', 'jesus@hotmail.com', '2019-06-21 10:03:46', '$2y$10$hJ/QMvp/vfmp5qiU8q8SKuwGwgXJTyiayn6KaN1fW9qAZleAlUlgq', NULL, '2019-06-21 10:02:37', '2019-06-21 10:03:46'),
(3, 'Homero', '0199-12-11', 'homero@hotmail.com', '2019-06-21 10:10:58', '$2y$10$TgfAu3ZDNL5qR6fzq7swZerNoZFLJRekjX0Jks.Kj0f3ybH3SyPwO', NULL, '2019-06-21 10:10:45', '2019-06-21 10:10:58');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pag_comprobantes`
--
ALTER TABLE `pag_comprobantes`
  ADD PRIMARY KEY (`com_id`),
  ADD UNIQUE KEY `IU_COMPROBANTE` (`com_id`,`com_fecha`,`com_tipo`,`clie_id`,`tipp_id`,`com_estado`),
  ADD KEY `CLIE_COMP` (`clie_id`),
  ADD KEY `TIPPAGO_COMP` (`tipp_id`);

--
-- Indices de la tabla `pag_detalle_comprobantes`
--
ALTER TABLE `pag_detalle_comprobantes`
  ADD UNIQUE KEY `IU_COMPROBANTEDET` (`com_id`,`ser_id`,`detc_cant`,`detc_preu`),
  ADD KEY `SER_DETCOMP` (`ser_id`);

--
-- Indices de la tabla `pag_tipo_pagos`
--
ALTER TABLE `pag_tipo_pagos`
  ADD PRIMARY KEY (`tipp_id`),
  ADD UNIQUE KEY `IU_TIPO_PAGO` (`tipp_id`,`tipp_desc`);

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
  ADD UNIQUE KEY `permissions_name_unique` (`name`),
  ADD UNIQUE KEY `permissions_slug_unique` (`slug`),
  ADD KEY `permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`),
  ADD KEY `permission_user_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `res_citas`
--
ALTER TABLE `res_citas`
  ADD PRIMARY KEY (`cit_id`),
  ADD UNIQUE KEY `IU_CITA` (`cit_fecha`,`res_id`),
  ADD KEY `RES_CITA` (`res_id`),
  ADD KEY `SER_CITA` (`ser_id`);

--
-- Indices de la tabla `res_clientes`
--
ALTER TABLE `res_clientes`
  ADD PRIMARY KEY (`clie_id`),
  ADD KEY `PERS_CLIE` (`per_id`);

--
-- Indices de la tabla `res_especialidades`
--
ALTER TABLE `res_especialidades`
  ADD PRIMARY KEY (`esp_id`),
  ADD UNIQUE KEY `IU_ESPECIALIDAD` (`esp_nombre`,`esp_descripcion`);

--
-- Indices de la tabla `res_medicos`
--
ALTER TABLE `res_medicos`
  ADD PRIMARY KEY (`med_id`),
  ADD UNIQUE KEY `IU_MEDICO` (`med_id`,`esp_id`),
  ADD KEY `ESPE_MED` (`esp_id`),
  ADD KEY `PERS_MED` (`per_id`);

--
-- Indices de la tabla `res_personas`
--
ALTER TABLE `res_personas`
  ADD PRIMARY KEY (`per_id`),
  ADD UNIQUE KEY `IU_NOMPERSONA` (`per_apepat`,`per_apemat`,`per_nombres`,`per_nrodoc`),
  ADD KEY `PERS_TIPODOC` (`tipd_id`);

--
-- Indices de la tabla `res_reservas`
--
ALTER TABLE `res_reservas`
  ADD PRIMARY KEY (`res_id`),
  ADD UNIQUE KEY `IU_FECRESERVA` (`res_fecres`,`tur_id`,`mas_id`,`res_motivo`,`res_estado`),
  ADD KEY `MASC_RES` (`mas_id`),
  ADD KEY `TUR_RES` (`tur_id`);

--
-- Indices de la tabla `res_tipodocumentos`
--
ALTER TABLE `res_tipodocumentos`
  ADD PRIMARY KEY (`tipd_id`),
  ADD UNIQUE KEY `res_tipodocumento_tipd_nombre_unique` (`tipd_nombre`),
  ADD UNIQUE KEY `res_tipodocumento_tipd_abreviatura_unique` (`tipd_abreviatura`);

--
-- Indices de la tabla `res_turnos`
--
ALTER TABLE `res_turnos`
  ADD PRIMARY KEY (`tur_id`),
  ADD UNIQUE KEY `IU_TURNOPROG` (`med_id`,`tur_fectur`,`tur_hini`);

--
-- Indices de la tabla `res_usuarios`
--
ALTER TABLE `res_usuarios`
  ADD PRIMARY KEY (`usu_id`),
  ADD UNIQUE KEY `IU_USUARIO` (`usu_user`,`usu_fecreg`,`usu_estado`),
  ADD KEY `USU_MED` (`med_id`);

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
-- Indices de la tabla `ser_control_vacunas`
--
ALTER TABLE `ser_control_vacunas`
  ADD PRIMARY KEY (`con_id`),
  ADD UNIQUE KEY `IU_CONTROLVAC` (`con_fecap`,`con_fecve`,`con_obs`),
  ADD KEY `SER_CONTVAC` (`tips_id`);

--
-- Indices de la tabla `ser_detalle_historias`
--
ALTER TABLE `ser_detalle_historias`
  ADD PRIMARY KEY (`deth_id`),
  ADD UNIQUE KEY `IU_HISTORIADET` (`his_id`,`deth_fechis`,`deth_obs`,`exa_id`,`con_id`),
  ADD KEY `CONTVAC_DETHIST` (`con_id`),
  ADD KEY `SER_DETHIST` (`ser_id`),
  ADD KEY `EXA_DETHIST` (`exa_id`);

--
-- Indices de la tabla `ser_detalle_insumos`
--
ALTER TABLE `ser_detalle_insumos`
  ADD PRIMARY KEY (`deti_id`),
  ADD KEY `SER_DETINS` (`ser_id`),
  ADD KEY `INS_DETINS` (`ins_id`),
  ADD KEY `MEDI_DETINS` (`medi_id`);

--
-- Indices de la tabla `ser_diagnosticos`
--
ALTER TABLE `ser_diagnosticos`
  ADD PRIMARY KEY (`dia_id`),
  ADD UNIQUE KEY `IU_DIAGNOSTICO` (`dia_trat`,`dia_obs`),
  ADD KEY `RESU_DIAG` (`res_id`);

--
-- Indices de la tabla `ser_examenes`
--
ALTER TABLE `ser_examenes`
  ADD PRIMARY KEY (`exa_id`),
  ADD UNIQUE KEY `IU_EXAMEN` (`tips_id`,`exa_temp`,`exa_peso`,`exa_pulso`,`exa_resp`,`exa_anom`);

--
-- Indices de la tabla `ser_historia_clinicas`
--
ALTER TABLE `ser_historia_clinicas`
  ADD PRIMARY KEY (`his_id`),
  ADD UNIQUE KEY `IU_HISTORIACLI` (`mas_id`,`his_fecreg`,`his_estado`);

--
-- Indices de la tabla `ser_insumos`
--
ALTER TABLE `ser_insumos`
  ADD PRIMARY KEY (`ins_id`),
  ADD UNIQUE KEY `IU_INSUMO` (`ins_desc`,`ins_uni`,`ins_stock`,`ins_estado`,`ins_fecven`);

--
-- Indices de la tabla `ser_mascotas`
--
ALTER TABLE `ser_mascotas`
  ADD PRIMARY KEY (`mas_id`),
  ADD UNIQUE KEY `IU_MASCOTA` (`mas_nombre`,`mas_tipo`,`mas_raza`,`mas_sexo`,`mas_alergia`,`mas_fecnac`),
  ADD KEY `CLIE_MASC` (`clie_id`);

--
-- Indices de la tabla `ser_medicamentos`
--
ALTER TABLE `ser_medicamentos`
  ADD PRIMARY KEY (`medi_id`),
  ADD UNIQUE KEY `IU_MEDICAMENTO` (`medi_nombre`,`medi_precio`,`medi_desc`,`medi_stock`,`medi_pres`,`medi_fecven`);

--
-- Indices de la tabla `ser_receta_medicas`
--
ALTER TABLE `ser_receta_medicas`
  ADD PRIMARY KEY (`rec_id`),
  ADD UNIQUE KEY `IU_RECETA` (`rec_fecexp`,`rec_feccad`),
  ADD KEY `DIAG_REC` (`dia_id`);

--
-- Indices de la tabla `ser_receta_medica_detalles`
--
ALTER TABLE `ser_receta_medica_detalles`
  ADD UNIQUE KEY `IU_RECETADETALLE` (`rec_id`,`medi_id`,`detr_can`,`detr_obs`,`detr_dia`,`detr_ind`),
  ADD KEY `MEDI_DETMED` (`medi_id`);

--
-- Indices de la tabla `ser_resultados`
--
ALTER TABLE `ser_resultados`
  ADD PRIMARY KEY (`res_id`),
  ADD UNIQUE KEY `IU_RESULTADO` (`exa_id`,`res_anexo`,`res_obs1`,`res_obs2`);

--
-- Indices de la tabla `ser_servicios`
--
ALTER TABLE `ser_servicios`
  ADD PRIMARY KEY (`ser_id`),
  ADD UNIQUE KEY `IU_SERVICIO` (`ser_monto`,`ser_nombre`);

--
-- Indices de la tabla `ser_tipo_examenes`
--
ALTER TABLE `ser_tipo_examenes`
  ADD PRIMARY KEY (`tipe_id`),
  ADD UNIQUE KEY `IU_TIPOEXAMEN` (`tipe_nombre`,`tipe_estado`),
  ADD KEY `EXA_TIPEXA` (`exa_id`);

--
-- Indices de la tabla `ser_tipo_servicios`
--
ALTER TABLE `ser_tipo_servicios`
  ADD PRIMARY KEY (`tips_id`),
  ADD UNIQUE KEY `IU_TIPOSERVICIO` (`ser_id`,`tips_desc`,`tips_costo`);

--
-- Indices de la tabla `ser_tipo_vacunas`
--
ALTER TABLE `ser_tipo_vacunas`
  ADD PRIMARY KEY (`tipv_id`),
  ADD UNIQUE KEY `IU_TIPOVAC` (`con_id`,`tipv_nombre`);

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
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `pag_comprobantes`
--
ALTER TABLE `pag_comprobantes`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pag_tipo_pagos`
--
ALTER TABLE `pag_tipo_pagos`
  MODIFY `tipp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `permission_user`
--
ALTER TABLE `permission_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `res_citas`
--
ALTER TABLE `res_citas`
  MODIFY `cit_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `res_clientes`
--
ALTER TABLE `res_clientes`
  MODIFY `clie_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `res_especialidades`
--
ALTER TABLE `res_especialidades`
  MODIFY `esp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `res_medicos`
--
ALTER TABLE `res_medicos`
  MODIFY `med_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `res_personas`
--
ALTER TABLE `res_personas`
  MODIFY `per_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `res_reservas`
--
ALTER TABLE `res_reservas`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `res_tipodocumentos`
--
ALTER TABLE `res_tipodocumentos`
  MODIFY `tipd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `res_turnos`
--
ALTER TABLE `res_turnos`
  MODIFY `tur_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `res_usuarios`
--
ALTER TABLE `res_usuarios`
  MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `ser_control_vacunas`
--
ALTER TABLE `ser_control_vacunas`
  MODIFY `con_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ser_detalle_historias`
--
ALTER TABLE `ser_detalle_historias`
  MODIFY `deth_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ser_detalle_insumos`
--
ALTER TABLE `ser_detalle_insumos`
  MODIFY `deti_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ser_diagnosticos`
--
ALTER TABLE `ser_diagnosticos`
  MODIFY `dia_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ser_examenes`
--
ALTER TABLE `ser_examenes`
  MODIFY `exa_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ser_historia_clinicas`
--
ALTER TABLE `ser_historia_clinicas`
  MODIFY `his_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ser_insumos`
--
ALTER TABLE `ser_insumos`
  MODIFY `ins_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ser_mascotas`
--
ALTER TABLE `ser_mascotas`
  MODIFY `mas_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ser_medicamentos`
--
ALTER TABLE `ser_medicamentos`
  MODIFY `medi_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ser_receta_medicas`
--
ALTER TABLE `ser_receta_medicas`
  MODIFY `rec_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ser_resultados`
--
ALTER TABLE `ser_resultados`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ser_servicios`
--
ALTER TABLE `ser_servicios`
  MODIFY `ser_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ser_tipo_examenes`
--
ALTER TABLE `ser_tipo_examenes`
  MODIFY `tipe_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ser_tipo_servicios`
--
ALTER TABLE `ser_tipo_servicios`
  MODIFY `tips_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ser_tipo_vacunas`
--
ALTER TABLE `ser_tipo_vacunas`
  MODIFY `tipv_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pag_comprobantes`
--
ALTER TABLE `pag_comprobantes`
  ADD CONSTRAINT `CLIE_COMP` FOREIGN KEY (`clie_id`) REFERENCES `res_clientes` (`clie_id`),
  ADD CONSTRAINT `TIPPAGO_COMP` FOREIGN KEY (`tipp_id`) REFERENCES `pag_tipo_pagos` (`tipp_id`);

--
-- Filtros para la tabla `pag_detalle_comprobantes`
--
ALTER TABLE `pag_detalle_comprobantes`
  ADD CONSTRAINT `COMP_DETCOMP` FOREIGN KEY (`com_id`) REFERENCES `pag_comprobantes` (`com_id`),
  ADD CONSTRAINT `SER_DETCOMP` FOREIGN KEY (`ser_id`) REFERENCES `ser_servicios` (`ser_id`);

--
-- Filtros para la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `res_citas`
--
ALTER TABLE `res_citas`
  ADD CONSTRAINT `RES_CITA` FOREIGN KEY (`res_id`) REFERENCES `res_reservas` (`res_id`),
  ADD CONSTRAINT `SER_CITA` FOREIGN KEY (`ser_id`) REFERENCES `ser_servicios` (`ser_id`);

--
-- Filtros para la tabla `res_clientes`
--
ALTER TABLE `res_clientes`
  ADD CONSTRAINT `PERS_CLIE` FOREIGN KEY (`per_id`) REFERENCES `res_personas` (`per_id`);

--
-- Filtros para la tabla `res_medicos`
--
ALTER TABLE `res_medicos`
  ADD CONSTRAINT `ESPE_MED` FOREIGN KEY (`esp_id`) REFERENCES `res_especialidades` (`esp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `PERS_MED` FOREIGN KEY (`per_id`) REFERENCES `res_personas` (`per_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `res_personas`
--
ALTER TABLE `res_personas`
  ADD CONSTRAINT `PERS_TIPODOC` FOREIGN KEY (`tipd_id`) REFERENCES `res_tipodocumentos` (`tipd_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `res_reservas`
--
ALTER TABLE `res_reservas`
  ADD CONSTRAINT `MASC_RES` FOREIGN KEY (`mas_id`) REFERENCES `ser_mascotas` (`mas_id`),
  ADD CONSTRAINT `TUR_RES` FOREIGN KEY (`tur_id`) REFERENCES `res_turnos` (`tur_id`);

--
-- Filtros para la tabla `res_turnos`
--
ALTER TABLE `res_turnos`
  ADD CONSTRAINT `MED_TURNO` FOREIGN KEY (`med_id`) REFERENCES `res_medicos` (`med_id`);

--
-- Filtros para la tabla `res_usuarios`
--
ALTER TABLE `res_usuarios`
  ADD CONSTRAINT `USU_MED` FOREIGN KEY (`med_id`) REFERENCES `res_medicos` (`med_id`);

--
-- Filtros para la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ser_control_vacunas`
--
ALTER TABLE `ser_control_vacunas`
  ADD CONSTRAINT `SER_CONTVAC` FOREIGN KEY (`tips_id`) REFERENCES `ser_tipo_servicios` (`tips_id`);

--
-- Filtros para la tabla `ser_detalle_historias`
--
ALTER TABLE `ser_detalle_historias`
  ADD CONSTRAINT `CONTVAC_DETHIST` FOREIGN KEY (`con_id`) REFERENCES `ser_control_vacunas` (`con_id`),
  ADD CONSTRAINT `EXA_DETHIST` FOREIGN KEY (`exa_id`) REFERENCES `ser_examenes` (`exa_id`),
  ADD CONSTRAINT `HISTCLI_DETHIST` FOREIGN KEY (`his_id`) REFERENCES `ser_historia_clinicas` (`his_id`),
  ADD CONSTRAINT `SER_DETHIST` FOREIGN KEY (`ser_id`) REFERENCES `ser_servicios` (`ser_id`);

--
-- Filtros para la tabla `ser_detalle_insumos`
--
ALTER TABLE `ser_detalle_insumos`
  ADD CONSTRAINT `INS_DETINS` FOREIGN KEY (`ins_id`) REFERENCES `ser_insumos` (`ins_id`),
  ADD CONSTRAINT `MEDI_DETINS` FOREIGN KEY (`medi_id`) REFERENCES `ser_medicamentos` (`medi_id`),
  ADD CONSTRAINT `SER_DETINS` FOREIGN KEY (`ser_id`) REFERENCES `ser_servicios` (`ser_id`);

--
-- Filtros para la tabla `ser_diagnosticos`
--
ALTER TABLE `ser_diagnosticos`
  ADD CONSTRAINT `RESU_DIAG` FOREIGN KEY (`res_id`) REFERENCES `ser_resultados` (`res_id`);

--
-- Filtros para la tabla `ser_examenes`
--
ALTER TABLE `ser_examenes`
  ADD CONSTRAINT `TIPSER_EXA` FOREIGN KEY (`tips_id`) REFERENCES `ser_tipo_servicios` (`tips_id`);

--
-- Filtros para la tabla `ser_historia_clinicas`
--
ALTER TABLE `ser_historia_clinicas`
  ADD CONSTRAINT `MASC_HISTCLI` FOREIGN KEY (`mas_id`) REFERENCES `ser_mascotas` (`mas_id`);

--
-- Filtros para la tabla `ser_mascotas`
--
ALTER TABLE `ser_mascotas`
  ADD CONSTRAINT `CLIE_MASC` FOREIGN KEY (`clie_id`) REFERENCES `res_clientes` (`clie_id`);

--
-- Filtros para la tabla `ser_receta_medicas`
--
ALTER TABLE `ser_receta_medicas`
  ADD CONSTRAINT `DIAG_REC` FOREIGN KEY (`dia_id`) REFERENCES `ser_diagnosticos` (`dia_id`);

--
-- Filtros para la tabla `ser_receta_medica_detalles`
--
ALTER TABLE `ser_receta_medica_detalles`
  ADD CONSTRAINT `MEDI_DETMED` FOREIGN KEY (`medi_id`) REFERENCES `ser_medicamentos` (`medi_id`),
  ADD CONSTRAINT `REC_DETMEDI` FOREIGN KEY (`rec_id`) REFERENCES `ser_receta_medicas` (`rec_id`);

--
-- Filtros para la tabla `ser_resultados`
--
ALTER TABLE `ser_resultados`
  ADD CONSTRAINT `EXA_RESU` FOREIGN KEY (`exa_id`) REFERENCES `ser_examenes` (`exa_id`);

--
-- Filtros para la tabla `ser_tipo_examenes`
--
ALTER TABLE `ser_tipo_examenes`
  ADD CONSTRAINT `EXA_TIPEXA` FOREIGN KEY (`exa_id`) REFERENCES `ser_examenes` (`exa_id`);

--
-- Filtros para la tabla `ser_tipo_servicios`
--
ALTER TABLE `ser_tipo_servicios`
  ADD CONSTRAINT `SER_TIPSER` FOREIGN KEY (`ser_id`) REFERENCES `ser_servicios` (`ser_id`);

--
-- Filtros para la tabla `ser_tipo_vacunas`
--
ALTER TABLE `ser_tipo_vacunas`
  ADD CONSTRAINT `CONTVAC_TIPVAC` FOREIGN KEY (`con_id`) REFERENCES `ser_control_vacunas` (`con_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
