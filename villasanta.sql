-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-01-2019 a las 22:59:31
-- Versión del servidor: 10.1.34-MariaDB
-- Versión de PHP: 7.1.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `villasanta`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacenes`
--

CREATE TABLE `almacenes` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_zona` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `almacenes`
--

INSERT INTO `almacenes` (`id`, `id_zona`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 1, 'Almancen-1-cruzimex', '2019-01-30 06:03:00', '2019-01-30 06:03:00'),
(3, 1, 'Almacen-2-cruzimex', '2019-01-30 11:05:14', '2019-01-30 11:05:14'),
(4, 6, 'Almacen Norte', '2019-01-30 11:11:04', '2019-01-30 11:11:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacen_productos`
--

CREATE TABLE `almacen_productos` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_almacen` int(10) UNSIGNED NOT NULL,
  `id_producto` int(10) UNSIGNED NOT NULL,
  `stock` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `almacen_productos`
--

INSERT INTO `almacen_productos` (`id`, `id_almacen`, `id_producto`, `stock`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 36, '2019-01-30 10:23:46', '2019-01-30 10:23:46'),
(2, 1, 4, 6, '2019-01-30 10:31:22', '2019-01-30 10:31:22'),
(3, 1, 5, 213, '2019-01-30 10:32:50', '2019-01-30 10:32:50'),
(4, 1, 6, 50, '2019-01-30 10:39:21', '2019-01-30 10:39:21'),
(5, 1, 7, 20, '2019-01-30 10:41:02', '2019-01-30 10:41:02'),
(6, 1, 8, 20, '2019-01-30 10:42:13', '2019-01-30 10:42:13'),
(7, 1, 9, 25, '2019-01-30 10:44:28', '2019-01-30 10:44:28'),
(8, 1, 10, 12, '2019-01-30 10:45:57', '2019-01-30 10:45:57'),
(9, 1, 11, 10, '2019-01-30 10:46:29', '2019-01-30 10:46:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cart_ordens`
--

CREATE TABLE `cart_ordens` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_producto` int(10) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(12, 'Carnes', '2019-01-30 09:55:15', '2019-01-30 09:55:15'),
(13, 'Bebidas', '2019-01-30 09:55:19', '2019-01-30 09:55:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_ordens`
--

CREATE TABLE `detalle_ordens` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_producto` int(10) UNSIGNED NOT NULL,
  `id_orden` int(10) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL,
  `importe` double NOT NULL,
  `precio_venta` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `detalle_ordens`
--

INSERT INTO `detalle_ordens` (`id`, `id_producto`, `id_orden`, `cantidad`, `importe`, `precio_venta`) VALUES
(1, 9, 2, 1, 6, 6),
(2, 11, 2, 1, 32, 32),
(3, 11, 2, 1, 32, 32),
(4, 11, 2, 1, 32, 32),
(5, 9, 3, 1, 6, 6),
(6, 11, 3, 1, 32, 32),
(7, 11, 3, 1, 32, 32),
(8, 11, 3, 1, 32, 32),
(9, 11, 5, 1, 32, 32),
(10, 11, 5, 1, 32, 32),
(11, 11, 6, 3, 96, 32),
(12, 9, 6, 3, 18, 6),
(13, 9, 7, 1, 6, 6),
(14, 11, 7, 1, 32, 32),
(15, 11, 8, 1, 32, 32),
(16, 11, 9, 1, 32, 32),
(17, 9, 10, 2, 12, 6),
(18, 11, 10, 4, 128, 32);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `devoluciones`
--

CREATE TABLE `devoluciones` (
  `id` int(10) UNSIGNED NOT NULL,
  `recibido_por` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `motivo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_orden` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `devoluciones`
--

INSERT INTO `devoluciones` (`id`, `recibido_por`, `motivo`, `id_orden`, `created_at`, `updated_at`) VALUES
(1, 'Pedrito', 'Era lo que esperaba pero no estaba satisfecho', 6, '2019-01-31 00:20:03', '2019-01-31 00:20:03'),
(2, 'KAthe', 'no le gusto', 10, '2019-01-31 01:57:04', '2019-01-31 01:57:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entregas`
--

CREATE TABLE `entregas` (
  `id` int(10) UNSIGNED NOT NULL,
  `recibido_por` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cantidad_confirmada` tinyint(1) NOT NULL DEFAULT '0',
  `id_orden` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `entregas`
--

INSERT INTO `entregas` (`id`, `recibido_por`, `cantidad_confirmada`, `id_orden`, `created_at`, `updated_at`) VALUES
(3, 'Pedrito ', 1, 5, '2019-01-31 00:17:08', '2019-01-31 00:17:08'),
(4, 'Pedrito', 1, 7, '2019-01-31 00:41:16', '2019-01-31 00:41:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados_ordenes`
--

CREATE TABLE `estados_ordenes` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `estados_ordenes`
--

INSERT INTO `estados_ordenes` (`id`, `nombre`) VALUES
(1, 'solicitado'),
(2, 'entregado'),
(3, 'devuelto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_01_30_015743_create_categorias_table', 2),
(4, '2019_01_30_015817_create_productos_table', 2),
(5, '2019_01_30_015926_create_ordens_table', 2),
(6, '2019_01_30_015959_create_rols_table', 2),
(7, '2019_01_30_020141_create_zonas_table', 2),
(8, '2019_01_30_020250_create_estados_ordens_table', 2),
(9, '2019_01_30_020541_create_devolucions_table', 2),
(10, '2019_01_30_020729_create_almacens_table', 2),
(11, '2019_01_30_020857_add_extra_columns_to_user', 3),
(12, '2019_01_30_023314_create_almacen_productos_table', 3),
(13, '2019_01_30_023326_create_detalle_ordens_table', 3),
(14, '2019_01_30_024520_create_entregas_table', 3),
(15, '2019_01_30_092739_create_cart_ordens_table', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenes`
--

CREATE TABLE `ordenes` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user_cliente` int(10) UNSIGNED NOT NULL,
  `id_user_encargado` int(10) UNSIGNED DEFAULT NULL,
  `total` double NOT NULL,
  `descuento` double NOT NULL,
  `nombre_factura` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `forma_pago` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'efectivo',
  `nit` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `moneda` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Bolivianos',
  `fecha_entrega` date NOT NULL,
  `id_estado` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ordenes`
--

INSERT INTO `ordenes` (`id`, `id_user_cliente`, `id_user_encargado`, `total`, `descuento`, `nombre_factura`, `forma_pago`, `nit`, `moneda`, `fecha_entrega`, `id_estado`, `created_at`, `updated_at`) VALUES
(5, 2, 3, 64, 0, 'admin', 'efectivo', NULL, 'Bolivianos', '2019-01-30', 2, '2019-01-30 21:30:55', '2019-01-31 00:17:08'),
(6, 2, 3, 114, 0, 'admin', 'efectivo', NULL, 'Bolivianos', '2019-01-30', 3, '2019-01-30 21:34:50', '2019-01-31 00:20:03'),
(7, 3, 3, 38, 10, 'Pablo Picapiedra', 'Efectivo', '123123', 'Bolivianos', '2019-01-30', 2, '2019-01-31 00:26:19', '2019-01-31 00:41:16'),
(8, 3, NULL, 32, 0, 'Paul Fernando Grimaldo Bravo', 'efectivo', NULL, 'Bolivianos', '2019-01-30', 1, '2019-01-31 01:04:11', '2019-01-31 01:04:12'),
(9, 4, NULL, 32, 0, 'Carla', 'efectivo', NULL, 'Bolivianos', '2019-01-30', 1, '2019-01-31 01:23:56', '2019-01-31 01:23:56'),
(10, 4, 5, 140, 0, 'Carla', 'efectivo', NULL, 'Bolivianos', '2019-01-30', 3, '2019-01-31 01:54:58', '2019-01-31 01:57:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `precio` double NOT NULL,
  `id_categoria` int(10) UNSIGNED NOT NULL,
  `id_almacen` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `imagen`, `precio`, `id_categoria`, `id_almacen`, `created_at`, `updated_at`) VALUES
(9, 'Leche pil', 'jugosa', 'productos-imagenes/d3ayNebx6UMkzagxvLm7d9IXzcParAOzATAcoqH0.jpeg', 6, 13, 1, '2019-01-30 10:44:27', '2019-01-30 10:44:28'),
(11, 'Carnes', 'Carne Promo', 'productos-imagenes/JiZAnND4RnwwuUWTSHeVWMi5C5YGiHogiHB9S8TC.jpeg', 32, 12, 1, '2019-01-30 10:46:29', '2019-01-30 10:46:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2019-01-30 07:17:03', '2019-01-30 07:17:03'),
(3, 'encargado', '2019-01-30 11:17:33', '2019-01-30 11:17:33'),
(4, 'cliente', '2019-01-30 21:54:45', '2019-01-30 21:54:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_zona` int(10) UNSIGNED NOT NULL,
  `id_rol` int(10) UNSIGNED NOT NULL,
  `telefono` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `id_zona`, `id_rol`, `telefono`, `direccion`) VALUES
(1, 'Pablito Perez', 'pablitoperez@hotmail.com', '$2y$10$B1.SHic2U6wVaPmBXwA0SOweJ224BAfE3iov7iE6mfPm04BH7eVim', 'rkEiEZAXIxbjRDc93iWkhrZVbZt3HDeYO9C6bpbYUlljG2fELagMP80wqh3z', '2019-01-26 17:43:27', '2019-01-26 17:43:27', 1, 1, '', ''),
(2, 'admin', 'admin@admin.com', '$2y$10$FLG6K18AdRlrgc4Luawc0uKR464b4yQjWBt0LSqUYB08ha/1tYpTm', '0tbIShlFe8TFYsY29n3phA1lYVlYAHtO2sBXwYtZcn5kZH0zDiNrXq8qn6ZP', '2019-01-30 07:17:03', '2019-01-30 07:17:03', 1, 1, '72678859', 'Av alemana cruzimex 2121'),
(3, 'pedroalvarez', 'pedroalvarez@gmail.com', '$2y$10$QvIy20Qmrz.NMsaHXzUQu.zEQaoa21gK.YWRABDa42HtmEtMF1p1m', 'YBl55ZvlwsJp7RrYUYGVNSizGH3eZXk6yDRjpRv0wrGZd0DMV7yGkAJWQI0Z', '2019-01-30 11:51:56', '2019-01-30 11:51:56', 1, 3, '69000850', 'Calle Yourcenar #1210 Sexto anillo entre Av2 de agosto y Alemana, calle paralela al DP8 Con direccion a Av Alemana'),
(4, 'Carla', 'carla@gmail.com', '$2y$10$RSUO83VeoVMSDnyiYeUsuenXZ51JBb7VZNTw6lYwwC47gwWVhkLeS', 'f3XYGqipHFP4j8hL5b8EDmltGbbEnkEKZSeM7LScIM7QCj36XRI09fT4SHYY', '2019-01-31 01:19:59', '2019-01-31 01:19:59', 1, 4, '69000850', 'Calle Yourcenar #1210 Sexto anillo entre Av2 de agosto y Alemana, calle paralela al DP8 Con direccion a Av Alemana'),
(5, 'Carmen', 'carmen@gmail.com', '$2y$10$W/gde7fHqkylEM4KfkHjjuZAqO.383bdcAXBiItbr/HgbjTO/ywFK', 'ZHPCeZAo480SLC1IGcEvrUzowRZEy1ZajYuVwCzuegkLDkSdkowhrzme8XhD', '2019-01-31 01:52:26', '2019-01-31 01:52:26', 1, 3, '124656465', 'La salle');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zonas`
--

CREATE TABLE `zonas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `zonas`
--

INSERT INTO `zonas` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Santa Cruz', '2019-01-30 07:16:27', '2019-01-30 07:16:27'),
(4, 'La Paz', '2019-01-30 11:10:27', '2019-01-30 11:10:27'),
(5, 'Tarija', '2019-01-30 11:10:32', '2019-01-30 11:10:32'),
(6, 'Santa Cruz Norte', '2019-01-30 11:10:40', '2019-01-30 11:10:40');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `almacenes`
--
ALTER TABLE `almacenes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `almacen_productos`
--
ALTER TABLE `almacen_productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cart_ordens`
--
ALTER TABLE `cart_ordens`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_ordens`
--
ALTER TABLE `detalle_ordens`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `devoluciones`
--
ALTER TABLE `devoluciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `entregas`
--
ALTER TABLE `entregas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estados_ordenes`
--
ALTER TABLE `estados_ordenes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ordenes`
--
ALTER TABLE `ordenes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `zonas`
--
ALTER TABLE `zonas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `almacenes`
--
ALTER TABLE `almacenes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `almacen_productos`
--
ALTER TABLE `almacen_productos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `cart_ordens`
--
ALTER TABLE `cart_ordens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `detalle_ordens`
--
ALTER TABLE `detalle_ordens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `devoluciones`
--
ALTER TABLE `devoluciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `entregas`
--
ALTER TABLE `entregas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `estados_ordenes`
--
ALTER TABLE `estados_ordenes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `ordenes`
--
ALTER TABLE `ordenes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `zonas`
--
ALTER TABLE `zonas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
