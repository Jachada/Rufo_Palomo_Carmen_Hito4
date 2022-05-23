-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 23-05-2022 a las 23:13:47
-- Versión del servidor: 8.0.29-0ubuntu0.20.04.3
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `PoligonoSur`
--
CREATE DATABASE IF NOT EXISTS `PoligonoSur` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `PoligonoSur`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id`, `created_at`, `updated_at`) VALUES
(1, '2022-05-16 10:17:41', '2022-05-16 10:17:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `classroom`
--

DROP TABLE IF EXISTS `classroom`;
CREATE TABLE `classroom` (
  `id` int NOT NULL,
  `class` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `classroom`
--

INSERT INTO `classroom` (`id`, `class`, `created_at`, `updated_at`) VALUES
(1, 'A129', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'A128', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `id` int NOT NULL,
  `issue` int NOT NULL,
  `comment` text CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `author` int NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `comment`
--

INSERT INTO `comment` (`id`, `issue`, `comment`, `author`, `created_at`, `updated_at`) VALUES
(1, 1, 'HOLAA22222', 1, '2022-05-15 16:06:03', '2022-05-15 14:10:03'),
(2, 4, 'lorem ipsum dolor sit amet', 2, '2022-05-10 18:15:37', '2022-05-23 16:15:37'),
(3, 1, 'lorem ipsum lorem ipsum', 1, '2022-05-22 18:15:37', '2022-05-22 16:15:37'),
(7, 1, 'sx', 1, '2022-05-23 20:45:04', '2022-05-23 18:45:04'),
(8, 1, '3333', 1, '2022-05-23 20:47:11', '2022-05-23 18:47:11');

--
-- Disparadores `comment`
--
DROP TRIGGER IF EXISTS `Comment-Issue-Insert`;
DELIMITER $$
CREATE TRIGGER `Comment-Issue-Insert` AFTER INSERT ON `comment` FOR EACH ROW UPDATE issues 
SET issues.updated_at = new.created_at
WHERE issues.id = new.issue
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `Comment-Issue-Update`;
DELIMITER $$
CREATE TRIGGER `Comment-Issue-Update` AFTER UPDATE ON `comment` FOR EACH ROW UPDATE issues 
SET issues.updated_at = new.updated_at
WHERE issues.id = new.issue
OR issues.id = old.issue
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conditions`
--

DROP TABLE IF EXISTS `conditions`;
CREATE TABLE `conditions` (
  `id` int NOT NULL,
  `condition` text CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `conditions`
--

INSERT INTO `conditions` (`id`, `condition`, `created_at`, `updated_at`) VALUES
(1, 'Nuevo', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'En progreso', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Resuelto', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Derivado', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `condition_issue`
--

DROP TABLE IF EXISTS `condition_issue`;
CREATE TABLE `condition_issue` (
  `id` int NOT NULL,
  `id_issue` int NOT NULL,
  `id_condition` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `condition_issue`
--

INSERT INTO `condition_issue` (`id`, `id_issue`, `id_condition`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-04-03 21:43:24', '0000-00-00 00:00:00'),
(2, 1, 2, '2022-04-03 21:43:24', '0000-00-00 00:00:00'),
(3, 1, 3, '2022-04-03 21:44:20', '0000-00-00 00:00:00'),
(4, 2, 1, '2022-03-31 21:44:20', '0000-00-00 00:00:00'),
(5, 2, 2, '2022-04-01 21:44:20', '0000-00-00 00:00:00'),
(6, 2, 3, '2022-05-15 14:23:41', '2022-05-15 14:23:41'),
(8, 1, 1, '2022-05-15 14:39:29', '2022-05-15 14:39:29'),
(9, 2, 1, '2022-05-15 14:39:44', '2022-05-15 14:39:44'),
(10, 1, 1, '2022-05-15 14:39:29', '2022-05-15 14:39:29'),
(11, 4, 1, '2022-05-15 14:56:19', '2022-05-15 14:56:19'),
(12, 4, 3, '2022-05-15 14:56:19', '2022-05-15 14:56:19'),
(13, 5, 1, '2022-05-15 13:39:54', '2022-05-15 13:39:54'),
(14, 6, 1, '2022-05-15 13:50:13', '2022-05-15 13:50:13'),
(15, 7, 1, '2022-05-16 08:53:42', '2022-05-16 08:53:42'),
(16, 8, 1, '2022-05-23 16:35:13', '2022-05-23 16:35:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `issues`
--

DROP TABLE IF EXISTS `issues`;
CREATE TABLE `issues` (
  `id` int NOT NULL,
  `title` text CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `author` int NOT NULL,
  `classroom` int NOT NULL,
  `id_condition` int NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `closed_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `issues`
--

INSERT INTO `issues` (`id`, `title`, `description`, `author`, `classroom`, `id_condition`, `created_at`, `updated_at`, `closed_at`) VALUES
(1, 'Falta monitor', 'Falta el monitor para uno de los equipos', 1, 1, 1, '2022-05-15 14:39:29', '2022-05-23 18:47:11', NULL),
(2, 'Fallo eléctrico', 'La luz salta al encender los equipos de la última mesa de la izquierda', 1, 2, 1, '2022-05-15 14:39:44', '2022-05-15 14:23:41', NULL),
(4, 'Pepe', 'Me aburro', 1, 1, 3, '2022-05-15 14:56:19', '2022-05-10 16:15:37', NULL),
(5, 'EO', 'EO', 1, 1, 1, '2022-05-15 13:39:54', '2022-05-15 13:39:54', NULL),
(6, 'Usuario', 'Usuario', 1, 1, 1, '2022-05-15 13:50:13', '2022-05-15 13:50:13', NULL),
(7, 'Usuario', 'oo', 1, 2, 1, '2022-05-16 08:53:42', '2022-05-16 08:53:42', NULL),
(8, 'Pepe', 'Me aburro', 1, 1, 1, '2022-05-23 16:35:13', '2022-05-23 16:35:13', NULL);

--
-- Disparadores `issues`
--
DROP TRIGGER IF EXISTS `Issue-Condition-Insert`;
DELIMITER $$
CREATE TRIGGER `Issue-Condition-Insert` AFTER INSERT ON `issues` FOR EACH ROW INSERT INTO condition_issue (id_issue, id_condition, created_at, updated_at)
VALUES (new.id, new.id_condition, new.created_at, new.created_at)
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `Issue-Condition-Update`;
DELIMITER $$
CREATE TRIGGER `Issue-Condition-Update` BEFORE UPDATE ON `issues` FOR EACH ROW IF new.id_condition <> old.id_condition THEN 
INSERT INTO condition_issue (id_issue, id_condition, created_at, updated_at)
VALUES (new.id, new.id_condition, new.created_at, new.created_at);
END IF
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `states`
--

DROP TABLE IF EXISTS `states`;
CREATE TABLE `states` (
  `id` int NOT NULL,
  `state` text CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `states`
--

INSERT INTO `states` (`id`, `state`, `created_at`, `updated_at`) VALUES
(1, 'Pendiente Confirmar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Confirmado', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'De Baja', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_birth` date NOT NULL,
  `telephone` int NOT NULL,
  `warning` tinyint(1) NOT NULL DEFAULT '1',
  `id_state` int NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `date_birth`, `telephone`, `warning`, `id_state`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Carmen Rufo', 'carmen.rufo.palomo.al@iespoligonosur.org', NULL, '$2y$10$qZciPefrkmqFENryM0peB.FK..tdQKNwxM6fdWtBNTUhSpCT1L9sO', '1999-09-22', 603638253, 1, 2, NULL, '2022-04-25 09:38:16', '2022-04-25 09:38:16'),
(2, 'Juancho', 'juancho@iespoligonosur.org', NULL, '$2y$10$plOgcM1DhsVmRsf47EfRp.P8Pa.9T/j22CQ7KYE4lw6npPP.BfUH.', '2022-05-16', 666666666, 0, 2, NULL, '2022-05-16 08:46:35', '2022-05-16 08:46:35');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `classroom`
--
ALTER TABLE `classroom`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `incidencia` (`issue`),
  ADD KEY `autor` (`author`),
  ADD KEY `autor_2` (`author`);

--
-- Indices de la tabla `conditions`
--
ALTER TABLE `conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `condition_issue`
--
ALTER TABLE `condition_issue`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idIncidencia` (`id_issue`),
  ADD KEY `idEstado` (`id_condition`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `issues`
--
ALTER TABLE `issues`
  ADD PRIMARY KEY (`id`),
  ADD KEY `autor` (`author`),
  ADD KEY `aula` (`classroom`),
  ADD KEY `id_condition` (`id_condition`);

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
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `id_state` (`id_state`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `classroom`
--
ALTER TABLE `classroom`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `conditions`
--
ALTER TABLE `conditions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `condition_issue`
--
ALTER TABLE `condition_issue`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `issues`
--
ALTER TABLE `issues`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `states`
--
ALTER TABLE `states`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`issue`) REFERENCES `issues` (`id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`author`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `condition_issue`
--
ALTER TABLE `condition_issue`
  ADD CONSTRAINT `condition_issue_ibfk_1` FOREIGN KEY (`id_issue`) REFERENCES `issues` (`id`),
  ADD CONSTRAINT `condition_issue_ibfk_2` FOREIGN KEY (`id_condition`) REFERENCES `conditions` (`id`);

--
-- Filtros para la tabla `issues`
--
ALTER TABLE `issues`
  ADD CONSTRAINT `issues_ibfk_2` FOREIGN KEY (`classroom`) REFERENCES `classroom` (`id`),
  ADD CONSTRAINT `issues_ibfk_3` FOREIGN KEY (`author`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `issues_ibfk_4` FOREIGN KEY (`id_condition`) REFERENCES `conditions` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_state`) REFERENCES `states` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
