-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3308
-- Tiempo de generación: 01-06-2022 a las 08:10:19
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `apuestatotal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `edad` int(3) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `telefono` varchar(9) DEFAULT NULL,
  `saldo` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nombre`, `edad`, `correo`, `telefono`, `saldo`) VALUES
(1, 'José Luis Arias Flores', 23, 'josariasf@gmail.com', '910173198', 140),
(2, 'Bladimir Quispe Flores', 28, 'bladimirquisteflores@gmail.com', '910173154', 2010);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_cliente_recarga`
--

CREATE TABLE `detalle_cliente_recarga` (
  `playerid` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `monto_recarga` double DEFAULT NULL,
  `banco` varchar(50) DEFAULT NULL,
  `canal_comunicacion` varchar(50) DEFAULT NULL,
  `vaucher_deposito` varchar(50) DEFAULT NULL,
  `fecha_registro` datetime DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_cliente_recarga`
--

INSERT INTO `detalle_cliente_recarga` (`playerid`, `idcliente`, `monto_recarga`, `banco`, `canal_comunicacion`, `vaucher_deposito`, `fecha_registro`, `estado`) VALUES
(1, 1, 20, 'BCP', 'WhatsApp', '3.png', '2022-05-31 23:03:50', 'REVISADO'),
(2, 2, 20, 'PICHINCHA', 'Telegram', 'vaucher2.png', '2022-05-31 23:03:50', 'EN PROCESO'),
(3, 1, 50, 'BCP', 'WhatsApp', 'vaucher1.png', '2022-05-31 23:03:50', 'REVISADO'),
(4, 1, 10, 'INTERBANK', 'Telegram', '2.jpg', '2022-05-31 23:03:50', 'REVISADO'),
(5, 2, 100, 'PICHINCHA', 'WhatsApp', '2.jpg', '2022-05-31 23:03:50', 'EN PROCESO'),
(6, 2, 10, 'BCP', 'WhatsApp', '3.png', '2022-05-31 23:03:50', 'REVISADO'),
(7, 1, 10, 'PICHINCHA', 'Telegram', '3.png', '2022-05-31 23:03:50', 'REVISADO'),
(9, 2, 20, 'PICHINCHA', 'Telegram', '3.png', '2022-05-31 23:03:50', 'EN PROCESO'),
(10, 1, 50, 'BCP', 'Telegram', '3.png', '2022-05-31 23:03:50', 'REVISADO'),
(11, 1, 10, 'BCP', 'Telegram', 'vaucher1.png', '2022-05-31 23:03:50', 'REVISADO'),
(12, 1, 10, 'BCP', 'WhatsApp', '3.png', '2022-05-31 23:03:50', 'REVISADO'),
(13, 1, 10, 'PICHINCHA', 'WhatsApp', 'vaucher1.png', '2022-05-31 23:03:50', 'EN PROCESO'),
(14, 1, 10, 'BCP', 'WhatsApp', 'vaucher1.png', '2022-06-01 00:22:50', 'EN PROCESO'),
(15, 1, 20, 'BCP', 'WhatsApp', 'vaucher1.png', '2022-05-31 20:19:40', 'REVISADO'),
(16, 1, 10, 'BCP', 'WhatsApp', 'vaucher1.png', '2022-05-31 20:19:59', 'REVISADO'),
(17, 1, 10, 'Elije el banco', 'WhatsApp', 'vaucher1.png', '2022-05-31 20:21:00', 'REVISADO'),
(18, 2, 1000, 'BCP', 'WhatsApp', 'vaucher1.png', '2022-05-31 23:03:50', 'REVISADO'),
(19, 1, 10, 'BCP', 'WhatsApp', 'vaucher1.png', '2022-06-01 00:45:32', 'EN PROCESO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `correo_electronico` varchar(50) DEFAULT NULL,
  `clave` varchar(50) DEFAULT NULL,
  `cargo` varchar(50) DEFAULT NULL,
  `dni` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `correo_electronico`, `clave`, `cargo`, `dni`) VALUES
(1, 'José Luis Arias Flores', 'josariasf@gmail.com', 'ariasflores', NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `detalle_cliente_recarga`
--
ALTER TABLE `detalle_cliente_recarga`
  ADD PRIMARY KEY (`playerid`),
  ADD KEY `FK__cliente` (`idcliente`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `detalle_cliente_recarga`
--
ALTER TABLE `detalle_cliente_recarga`
  MODIFY `playerid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_cliente_recarga`
--
ALTER TABLE `detalle_cliente_recarga`
  ADD CONSTRAINT `FK__cliente` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`id_cliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
