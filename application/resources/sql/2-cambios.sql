-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-11-2018 a las 04:55:16
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30


--
-- Base de datos: `databasetpfinal`
--

-- --------------------------------------------------------

USE databaseGC;
DROP TABLE IF EXISTS comercio;
DROP TABLE IF EXISTS importes;
DROP TABLE IF EXISTS pedidos;
DROP TABLE IF EXISTS items;
DROP TABLE IF EXISTS items_pedidos;
DROP TABLE IF EXISTS importes;
DROP TABLE IF EXISTS liquidaciones_comercios;
DROP TABLE IF EXISTS liquidaciones_repartidores;
DROP TABLE IF EXISTS liquidaciones_sistema;
--
-- Estructura de tabla para la tabla `comercio`
--

CREATE TABLE `comercio` (
  id int(11) NOT NULL,
  razonSocial varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  puntoDeVenta varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  categoria varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  zonaCobertura varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  tiempo_estimado int(11) DEFAULT NULL, 
  tel varchar(20) DEFAULT NULL,
  mailto varchar(100) DEFAULT NULL,
  activo BOOLEAN
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;



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
  `monto` FLOAT(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comercio`
--
ALTER TABLE `comercio`
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
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comercio`
--
ALTER TABLE `comercio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `items_pedidos`
--
ALTER TABLE `items_pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

CREATE TABLE `importes` (
  `id` int(11) primary key AUTO_INCREMENT,
  `id_pedido`int(11) NOT NULL UNIQUE,
  `importe_comerciante` FLOAT(7,2) NOT NULL,
  `importe_repartidor` FLOAT(7,2) NOT NULL,
  `importe_sistema` FLOAT(7,2) NOT NULL,
	FOREIGN KEY (id_pedido) REFERENCES pedidos(id)
);

CREATE TABLE `liquidaciones_comercios` (
  `id` int(11) primary key AUTO_INCREMENT,
  `id_comercio`int(11) NOT NULL,
  `monto` FLOAT(7,2) NOT NULL,
  `fecha_desde` datetime DEFAULT NULL,
  `fecha_hasta` datetime DEFAULT NULL,
	FOREIGN KEY (id_comercio) REFERENCES comercio(id)
);

CREATE TABLE `liquidaciones_repartidores` (
  `id` int(11) primary key AUTO_INCREMENT,
  `id_repartidor`int(11) NOT NULL,
  `monto` FLOAT(7,2) NOT NULL,
  `fecha_desde` datetime DEFAULT NULL,
  `fecha_hasta` datetime DEFAULT NULL,
	FOREIGN KEY (id_repartidor) REFERENCES usuario(id_usuario)
);


CREATE TABLE `liquidaciones_sistema` (
  `id` int(11) primary key AUTO_INCREMENT,
  `monto` FLOAT(7,2) NOT NULL,
  `fecha_desde` datetime DEFAULT NULL,
  `fecha_hasta` datetime DEFAULT NULL
);