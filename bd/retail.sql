-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 14-10-2023 a las 18:48:49
-- Versión del servidor: 5.7.33
-- Versión de PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `retail`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commune_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coins`
--

CREATE TABLE `coins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('Billetes','Monedas','Otros') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Billetes',
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `coins`
--

INSERT INTO `coins` (`id`, `type`, `value`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Billetes', '20000', NULL, '2023-09-03 19:04:47', '2023-09-03 19:04:47'),
(2, 'Billetes', '10000', NULL, '2023-09-03 19:04:47', '2023-09-03 19:04:47'),
(3, 'Billetes', '5000', NULL, '2023-09-03 19:04:47', '2023-09-03 19:04:47'),
(4, 'Billetes', '2000', NULL, '2023-09-03 19:04:47', '2023-09-03 19:04:47'),
(5, 'Billetes', '1000', NULL, '2023-09-03 19:04:47', '2023-09-03 19:04:47'),
(6, 'Monedas', '500', NULL, '2023-09-03 19:04:47', '2023-09-03 19:04:47'),
(7, 'Monedas', '100', NULL, '2023-09-03 19:04:47', '2023-09-03 19:04:47'),
(8, 'Monedas', '50', NULL, '2023-09-03 19:04:47', '2023-09-03 19:04:47'),
(9, 'Monedas', '10', NULL, '2023-09-03 19:04:47', '2023-09-03 19:04:47'),
(10, 'Otros', '0', NULL, '2023-09-03 19:04:47', '2023-09-03 19:04:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `communes`
--

CREATE TABLE `communes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `communes`
--

INSERT INTO `communes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Santiago', '2023-09-10 15:34:22', '2023-09-10 15:34:22'),
(2, 'Cerrillos', '2023-09-10 15:34:22', '2023-09-10 15:34:22'),
(3, 'Cerro Navia', '2023-09-10 15:34:22', '2023-09-10 15:34:22'),
(4, 'Conchalí', '2023-09-10 15:34:22', '2023-09-10 15:34:22'),
(5, 'El Bosque', '2023-09-10 15:34:22', '2023-09-10 15:34:22'),
(6, 'Estación Central', '2023-09-10 15:34:22', '2023-09-10 15:34:22'),
(7, 'Huechuraba', '2023-09-10 15:34:22', '2023-09-10 15:34:22'),
(8, 'Independencia', '2023-09-10 15:34:22', '2023-09-10 15:34:22'),
(9, 'La Cisterna', '2023-09-10 15:34:22', '2023-09-10 15:34:22'),
(10, 'La Florida', '2023-09-10 15:34:22', '2023-09-10 15:34:22'),
(11, 'La Granja', '2023-09-10 15:34:22', '2023-09-10 15:34:22'),
(12, 'La Pintana', '2023-09-10 15:34:22', '2023-09-10 15:34:22'),
(13, 'La Reina', '2023-09-10 15:34:22', '2023-09-10 15:34:22'),
(14, 'Las Condes', '2023-09-10 15:34:22', '2023-09-10 15:34:22'),
(15, 'Lo Barnechea', '2023-09-10 15:34:22', '2023-09-10 15:34:22'),
(16, 'Lo Espejo', '2023-09-10 15:34:22', '2023-09-10 15:34:22'),
(17, 'Lo Prado', '2023-09-10 15:34:22', '2023-09-10 15:34:22'),
(18, 'Macul', '2023-09-10 15:34:22', '2023-09-10 15:34:22'),
(19, 'Maipú', '2023-09-10 15:34:22', '2023-09-10 15:34:22'),
(20, 'Ñuñoa', '2023-09-10 15:34:22', '2023-09-10 15:34:22'),
(21, 'Pedro Aguirre Cerda', '2023-09-10 15:34:22', '2023-09-10 15:34:22'),
(22, 'Peñalolén', '2023-09-10 15:34:22', '2023-09-10 15:34:22'),
(23, 'Providencia', '2023-09-10 15:34:22', '2023-09-10 15:34:22'),
(24, 'Pudahuel', '2023-09-10 15:34:22', '2023-09-10 15:34:22'),
(25, 'Quilicura', '2023-09-10 15:34:22', '2023-09-10 15:34:22'),
(26, 'Quinta Normal', '2023-09-10 15:34:22', '2023-09-10 15:34:22'),
(27, 'Recoleta', '2023-09-10 15:34:22', '2023-09-10 15:34:22'),
(28, 'Renca', '2023-09-10 15:34:22', '2023-09-10 15:34:22'),
(29, 'San Joaquín', '2023-09-10 15:34:22', '2023-09-10 15:34:22'),
(30, 'San Miguel', '2023-09-10 15:34:22', '2023-09-10 15:34:22'),
(31, 'San Ramón', '2023-09-10 15:34:22', '2023-09-10 15:34:22'),
(32, 'Vitacura', '2023-09-10 15:34:22', '2023-09-10 15:34:22'),
(33, 'Puente Alto', '2023-09-10 15:34:22', '2023-09-10 15:34:22'),
(34, 'Pirque', '2023-09-10 15:34:22', '2023-09-10 15:34:22'),
(35, 'San José de Maipo', '2023-09-10 15:34:22', '2023-09-10 15:34:22'),
(36, 'Colina', '2023-09-10 15:34:22', '2023-09-10 15:34:22'),
(37, 'Lampa ', '2023-09-10 15:34:22', '2023-09-10 15:34:22'),
(38, 'Tiltil', '2023-09-10 15:34:22', '2023-09-10 15:34:22'),
(39, 'San Bernardo', '2023-09-10 15:34:22', '2023-09-10 15:34:22'),
(40, 'Buin', '2023-09-10 15:34:22', '2023-09-10 15:34:22'),
(41, 'Calera de Tango', '2023-09-10 15:34:22', '2023-09-10 15:34:22'),
(42, 'Paine', '2023-09-10 15:34:22', '2023-09-10 15:34:22'),
(43, 'Melipilla', '2023-09-10 15:34:22', '2023-09-10 15:34:22'),
(44, 'Alhué', '2023-09-10 15:34:22', '2023-09-10 15:34:22'),
(45, 'Curacaví', '2023-09-10 15:34:22', '2023-09-10 15:34:22'),
(46, 'María Pinto', '2023-09-10 15:34:22', '2023-09-10 15:34:22'),
(47, 'San Pedro', '2023-09-10 15:34:22', '2023-09-10 15:34:22'),
(48, 'Talagante', '2023-09-10 15:34:22', '2023-09-10 15:34:22'),
(49, 'El Monte', '2023-09-10 15:34:22', '2023-09-10 15:34:22'),
(50, 'Isla de Maipo', '2023-09-10 15:34:22', '2023-09-10 15:34:22'),
(51, 'Padre Hurtado', '2023-09-10 15:34:22', '2023-09-10 15:34:22'),
(52, 'Peñaflor', '2023-09-10 15:34:22', '2023-09-10 15:34:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(20, '2014_10_12_000000_create_users_table', 1),
(21, '2014_10_12_100000_create_password_resets_table', 1),
(22, '2019_08_19_000000_create_failed_jobs_table', 1),
(23, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(24, '2023_09_03_092123_create_permission_tables', 1),
(25, '2023_09_03_134927_create_coins_table', 1),
(26, '2023_09_03_141659_create_products_table', 1),
(27, '2023_09_10_132526_create_communes_table', 2),
(28, '2023_09_10_132738_create_clients_table', 2),
(29, '2023_09_17_100212_create_orders_table', 3),
(30, '2023_09_24_120538_create_sales_table', 4),
(31, '2023_09_24_122004_create_sale_details_table', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_order` date NOT NULL,
  `quantity` int(11) NOT NULL,
  `states` enum('Pendiente','Entregado') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pendiente',
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'dashboards.index', 'web', '2023-09-03 19:04:47', '2023-09-03 19:04:47'),
(2, 'stores.index', 'web', '2023-09-03 19:04:47', '2023-09-03 19:04:47'),
(3, 'products.index', 'web', '2023-09-03 19:04:47', '2023-09-03 19:04:47'),
(4, 'products.create', 'web', '2023-09-03 19:04:47', '2023-09-03 19:04:47'),
(5, 'products.show', 'web', '2023-09-03 19:04:47', '2023-09-03 19:04:47'),
(6, 'products.edit', 'web', '2023-09-03 19:04:47', '2023-09-03 19:04:47'),
(7, 'products.destroy', 'web', '2023-09-03 19:04:47', '2023-09-03 19:04:47'),
(8, 'coins.index', 'web', '2023-09-03 19:04:47', '2023-09-03 19:04:47'),
(9, 'coins.create', 'web', '2023-09-03 19:04:47', '2023-09-03 19:04:47'),
(10, 'coins.show', 'web', '2023-09-03 19:04:47', '2023-09-03 19:04:47'),
(11, 'coins.edit', 'web', '2023-09-03 19:04:48', '2023-09-03 19:04:48'),
(12, 'coins.destroy', 'web', '2023-09-03 19:04:48', '2023-09-03 19:04:48'),
(13, 'clients.index', 'web', '2023-09-03 19:04:48', '2023-09-03 19:04:48'),
(14, 'clients.create', 'web', '2023-09-03 19:04:48', '2023-09-03 19:04:48'),
(15, 'clients.show', 'web', '2023-09-03 19:04:48', '2023-09-03 19:04:48'),
(16, 'clients.edit', 'web', '2023-09-03 19:04:48', '2023-09-03 19:04:48'),
(17, 'clients.destroy', 'web', '2023-09-03 19:04:48', '2023-09-03 19:04:48'),
(18, 'orders.index', 'web', '2023-09-03 19:04:48', '2023-09-03 19:04:48'),
(19, 'orders.create', 'web', '2023-09-03 19:04:48', '2023-09-03 19:04:48'),
(20, 'orders.show', 'web', '2023-09-03 19:04:48', '2023-09-03 19:04:48'),
(21, 'orders.edit', 'web', '2023-09-03 19:04:48', '2023-09-03 19:04:48'),
(22, 'orders.destroy', 'web', '2023-09-03 19:04:48', '2023-09-03 19:04:48'),
(23, 'sales.index', 'web', '2023-09-03 19:04:48', '2023-09-03 19:04:48'),
(24, 'sales.create', 'web', '2023-09-03 19:04:48', '2023-09-03 19:04:48'),
(25, 'sales.show', 'web', '2023-09-03 19:04:48', '2023-09-03 19:04:48'),
(26, 'sales.edit', 'web', '2023-09-03 19:04:48', '2023-09-03 19:04:48'),
(27, 'sales.destroy', 'web', '2023-09-03 19:04:48', '2023-09-03 19:04:48'),
(28, 'reports.index', 'web', '2023-09-03 19:04:48', '2023-09-03 19:04:48'),
(29, 'reports.create', 'web', '2023-09-03 19:04:48', '2023-09-03 19:04:48'),
(30, 'reports.show', 'web', '2023-09-03 19:04:48', '2023-09-03 19:04:48'),
(31, 'reports.edit', 'web', '2023-09-03 19:04:48', '2023-09-03 19:04:48'),
(32, 'reports.destroy', 'web', '2023-09-03 19:04:48', '2023-09-03 19:04:48'),
(33, 'access.index', 'web', '2023-09-03 19:04:48', '2023-09-03 19:04:48'),
(34, 'roles.index', 'web', '2023-09-03 19:04:48', '2023-09-03 19:04:48'),
(35, 'roles.create', 'web', '2023-09-03 19:04:48', '2023-09-03 19:04:48'),
(36, 'roles.show', 'web', '2023-09-03 19:04:48', '2023-09-03 19:04:48'),
(37, 'roles.edit', 'web', '2023-09-03 19:04:48', '2023-09-03 19:04:48'),
(38, 'roles.destroy', 'web', '2023-09-03 19:04:48', '2023-09-03 19:04:48'),
(39, 'permissions.index', 'web', '2023-09-03 19:04:48', '2023-09-03 19:04:48'),
(40, 'permissions.create', 'web', '2023-09-03 19:04:48', '2023-09-03 19:04:48'),
(41, 'permissions.show', 'web', '2023-09-03 19:04:48', '2023-09-03 19:04:48'),
(42, 'permissions.edit', 'web', '2023-09-03 19:04:48', '2023-09-03 19:04:48'),
(43, 'permissions.destroy', 'web', '2023-09-03 19:04:48', '2023-09-03 19:04:48'),
(44, 'assignments.index', 'web', '2023-09-03 19:04:48', '2023-09-03 19:04:48'),
(45, 'assignments.create', 'web', '2023-09-03 19:04:48', '2023-09-03 19:04:48'),
(46, 'assignments.show', 'web', '2023-09-03 19:04:48', '2023-09-03 19:04:48'),
(47, 'assignments.edit', 'web', '2023-09-03 19:04:48', '2023-09-03 19:04:48'),
(48, 'assignments.destroy', 'web', '2023-09-03 19:04:48', '2023-09-03 19:04:48'),
(49, 'users.index', 'web', '2023-09-03 19:04:48', '2023-09-03 19:04:48'),
(50, 'users.create', 'web', '2023-09-03 19:04:48', '2023-09-03 19:04:48'),
(51, 'users.show', 'web', '2023-09-03 19:04:48', '2023-09-03 19:04:48'),
(52, 'users.edit', 'web', '2023-09-03 19:04:48', '2023-09-03 19:04:48'),
(53, 'users.destroy', 'web', '2023-09-03 19:04:48', '2023-09-03 19:04:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` decimal(10,0) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `stock` int(11) NOT NULL,
  `alerts` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 'web', '2023-09-03 19:04:48', '2023-09-03 19:04:48'),
(2, 'Vendedor', 'web', '2023-09-03 19:04:48', '2023-09-03 19:04:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(23, 2),
(24, 2),
(25, 2),
(26, 2),
(27, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `items` int(11) NOT NULL,
  `cash` decimal(10,0) NOT NULL,
  `change` decimal(10,0) NOT NULL,
  `status` enum('Pagado','Pendiente','Cancelado') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pagado',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sale_details`
--

CREATE TABLE `sale_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `quantity` decimal(10,0) NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `sale_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dni` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `dni`, `phone`, `email`, `profile`, `email_verified_at`, `password`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Wilson Neira', '11627784-0', '(+56) 978041698', 'wilson.neira@outlook.cl', 'Administrador', NULL, '$2y$10$dgtdfH.xudUkhjetCul5GelbrGelgLyBt2jFKJsMHBPIsYzagJQyq', '64fde5656e309_.png', NULL, '2023-09-03 19:04:48', '2023-09-10 15:48:53'),
(2, 'Alejandra Parry', '11111111-1', '(+56) 2 22222222', 'alejandra@correo.com', 'Vendedor', NULL, '$2y$10$HZO3tOIi8tUTOB6Nq/14ne3KOS6z9M42BuTpf7WMZQdBaHqYmnzDy', '6510a0f06d769_.png', NULL, '2023-09-24 20:49:52', '2023-09-24 20:49:52');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clients_commune_id_foreign` (`commune_id`);

--
-- Indices de la tabla `coins`
--
ALTER TABLE `coins`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `communes`
--
ALTER TABLE `communes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_client_id_foreign` (`client_id`),
  ADD KEY `orders_product_id_foreign` (`product_id`);

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
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_barcode_unique` (`barcode`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `sale_details`
--
ALTER TABLE `sale_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sale_details_product_id_foreign` (`product_id`),
  ADD KEY `sale_details_sale_id_foreign` (`sale_id`);

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
-- AUTO_INCREMENT de la tabla `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `coins`
--
ALTER TABLE `coins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `communes`
--
ALTER TABLE `communes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sale_details`
--
ALTER TABLE `sale_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_commune_id_foreign` FOREIGN KEY (`commune_id`) REFERENCES `communes` (`id`);

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `sale_details`
--
ALTER TABLE `sale_details`
  ADD CONSTRAINT `sale_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `sale_details_sale_id_foreign` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
