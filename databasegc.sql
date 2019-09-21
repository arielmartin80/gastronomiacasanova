-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-09-2019 a las 13:08:10
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `databasegc`
--
CREATE DATABASE IF NOT EXISTS `databasegc` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `databasegc`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cancelaciones`
--

CREATE TABLE `cancelaciones` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `estado_pedido` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `motivo` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comercio`
--

CREATE TABLE `comercio` (
  `id` int(11) NOT NULL,
  `razonSocial` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `puntoDeVenta` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `categoria` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `zonaCobertura` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `tiempo_estimado` int(11) DEFAULT NULL,
  `tel` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `mailto` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `comercio`
--

INSERT INTO `comercio` (`id`, `razonSocial`, `puntoDeVenta`, `categoria`, `zonaCobertura`, `tiempo_estimado`, `tel`, `mailto`, `activo`) VALUES
(1, 'Burger King', 'Rivadavia 1024, caba', 'Hamburgueseria', 'A', 20, '011 555 55555', 'burguer@king.com', 1),
(2, 'Kentucky', 'Av. de Mayo 567, Ramos Mejía', 'Pizzeria', 'B', 45, '011 222 22222', 'kentucky@live.com', 1),
(3, 'Freddo', 'Peru 345, caba', 'Heladeria', 'C', 15, '011 333 33333', 'freddo@gmail.com', 1),
(4, 'Fabric', 'Florencio Varela 1900, San Justo', 'Sushi', 'D', 30, '11-777-4444', 'fabric@hotmail.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `importes`
--

CREATE TABLE `importes` (
  `id` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `id_comercio` int(11) NOT NULL,
  `id_repartidor` int(11) NOT NULL,
  `monto_comercio` float(7,2) NOT NULL,
  `monto_repartidor` float(7,2) NOT NULL,
  `monto_sistema` float(7,2) NOT NULL,
  `fecha_pedido` date NOT NULL,
  `id_liquidacion_comercio` int(11) DEFAULT NULL,
  `id_liquidacion_repartidor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `precio` float(7,2) NOT NULL,
  `id_comercio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `items`
--

INSERT INTO `items` (`id`, `nombre`, `descripcion`, `precio`, `id_comercio`) VALUES
(1, 'Combo BK Nuggets (10 piezas)', 'Diez unidades de pollo rebozados en pan rallado junto con una bebida y una papas fritas regulares.', 240.00, 1),
(2, 'Combo WHOPPER', 'Carne Whopper a la parrilla, tomate, lechuga, cebolla, pepinos, ketchup y mayonesa. Junto con una bebida y una papas fritas regulares.', 260.00, 1),
(3, 'Combo BK Stacker XL Rodeo', 'Tres carnes Whopper, pan especial, panceta, queso cheddar, aros de cebolla y salsa especial. Con bebida y papas fritas regulares.', 310.00, 1),
(4, 'Combo Long clasico', 'Dos carnes a la parrilla, salsa cheddar, mayonesa, lechuga y tomate. Junto con una bebida y una papas fritas regulares.', 215.00, 1),
(5, ' Pizza Bosque Green', 'Salsa de tomate, muzarella, jamon cocido y rucula', 288.00, 2),
(6, 'Pizza americana', 'Salsa de tomate, huevos fritos y panceta', 360.00, 2),
(7, 'Pizza con jamon crudo y rucula', 'Salsa de tomate, muzarella, jamon crudo, rucula y queso parmesano', 348.00, 2),
(8, 'Pizza napolitana', 'Salsa de tomate, muzarella, jamon cocido y rodajas de tomate', 320.00, 2),
(9, 'Dos salmones roll', 'Salmon y palta por dentro, spicy salmon sellado por fuera, con nuestra salsa nikkei.', 300.00, 4),
(10, 'Arrolladitos primavera de verdura (2 unidades)', 'Rellenos de riquisimos vegetales.', 80.00, 4),
(11, 'Spring roll', 'Langostino, palta y phila, con verdeo por fuera.', 280.00, 4),
(12, 'Helado 1/4 kg', 'Dulce de leche Vauquita - con trocitos de tableta Vauquita y Sambayon.', 140.00, 3),
(13, 'Helado 1/2 kg', 'Chocolate blanco y Mascarpone - con frambuesa de la Patagonia ', 260.00, 3),
(14, 'Helados 1 kg', 'Chocolate Alpino - con cognac y nueces de Famatina, La Rioja, Tiramisu y Tramontana', 440.00, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `items_pedidos`
--

CREATE TABLE `items_pedidos` (
  `id` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `liquidaciones`
--

CREATE TABLE `liquidaciones` (
  `id` int(11) NOT NULL,
  `id_comercio` int(11) NOT NULL,
  `id_repartidor` int(11) NOT NULL,
  `fecha_desde` date NOT NULL,
  `fecha_hasta` date NOT NULL,
  `ganancia_repartidor` float(7,2) NOT NULL,
  `ganancia_sistema` float(7,2) NOT NULL,
  `ganancia_comercio` float(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `estado` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `id_comercio` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_repartidor` int(11) DEFAULT NULL,
  `hora_inicio` datetime NOT NULL,
  `hora_listo` datetime DEFAULT NULL,
  `hora_asignado` datetime DEFAULT NULL,
  `hora_despachado` datetime DEFAULT NULL,
  `hora_estimada` datetime DEFAULT NULL,
  `hora_finalizacion` datetime DEFAULT NULL,
  `direccion_destino` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `monto` float(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE `permiso` (
  `id_permiso` int(11) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `porcentajes`
--

CREATE TABLE `porcentajes` (
  `id` int(11) NOT NULL,
  `rol` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `porcentaje` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `porcentajes`
--

INSERT INTO `porcentajes` (`id`, `rol`, `porcentaje`) VALUES
(1, 'Repartidor', 3),
(2, 'Sistema', 5),
(3, 'Comercio', 92);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'Comerciante'),
(3, 'Repartidor'),
(4, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_permisos`
--

CREATE TABLE `rol_permisos` (
  `id_rol` int(11) NOT NULL,
  `id_permiso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `dni` varchar(50) DEFAULT NULL,
  `cuil` varchar(50) DEFAULT NULL,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellido` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `direccion` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `contrasenia` varchar(100) DEFAULT NULL,
  `id_rol` int(11) DEFAULT NULL,
  `id_comercio` int(11) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `dni`, `cuil`, `nombre`, `apellido`, `direccion`, `email`, `contrasenia`, `id_rol`, `id_comercio`, `activo`) VALUES
(0, '', '', 'admin', 'admin', '', 'admin', '58acb7acccce58ffa8b953b12b5a7702bd42dae441c1ad85057fa70b', 1, NULL, 1),
(1, '34123456', '23341234569', 'Ariel', 'Martin', 'Rivadavia 456,CABA', 'ariel@gmail.com', '99fb2f48c6af4761f904fc85f95eb56190e5d40b1f44ec3a9c1fa319', 2, 1, 1),
(2, '36123456', '23361234569', 'Tomas', 'Gómez', 'Av. Corrientes 1678, CABA', 'tomas@gmail.com', '99fb2f48c6af4761f904fc85f95eb56190e5d40b1f44ec3a9c1fa319', 2, 2, 1),
(3, '35123456', '23351234569', 'Diego', 'Salas', 'Av. Callao 765, CABA', 'diego@gmail.com', '99fb2f48c6af4761f904fc85f95eb56190e5d40b1f44ec3a9c1fa319', 3, NULL, 1),
(4, '37123456', '27371234569', 'Reyna', 'Rondosa', 'Florida 437, CABA', 'reyna@gmail.com', '99fb2f48c6af4761f904fc85f95eb56190e5d40b1f44ec3a9c1fa319', 4, NULL, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cancelaciones`
--
ALTER TABLE `cancelaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comercio`
--
ALTER TABLE `comercio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `importes`
--
ALTER TABLE `importes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `items_pedidos`
--
ALTER TABLE `items_pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `liquidaciones`
--
ALTER TABLE `liquidaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`id_permiso`);

--
-- Indices de la tabla `porcentajes`
--
ALTER TABLE `porcentajes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `rol_permisos`
--
ALTER TABLE `rol_permisos`
  ADD PRIMARY KEY (`id_rol`,`id_permiso`),
  ADD KEY `id_permiso` (`id_permiso`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cancelaciones`
--
ALTER TABLE `cancelaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comercio`
--
ALTER TABLE `comercio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `importes`
--
ALTER TABLE `importes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `items_pedidos`
--
ALTER TABLE `items_pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `liquidaciones`
--
ALTER TABLE `liquidaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `id_permiso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `porcentajes`
--
ALTER TABLE `porcentajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `rol_permisos`
--
ALTER TABLE `rol_permisos`
  ADD CONSTRAINT `rol_permisos_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`),
  ADD CONSTRAINT `rol_permisos_ibfk_2` FOREIGN KEY (`id_permiso`) REFERENCES `permiso` (`id_permiso`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`);
