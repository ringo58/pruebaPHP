-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-05-2022 a las 19:58:26
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
-- Base de datos: `prueba_funcional`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(10) NOT NULL,
  `nombre` text NOT NULL,
  `apellido` text NOT NULL,
  `telefono` bigint(10) NOT NULL,
  `identificacion` varchar(12) NOT NULL,
  `f_nacimiento` date NOT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `apellido`, `telefono`, `identificacion`, `f_nacimiento`, `fecha_creacion`) VALUES
(7, 'diego', 'molina', 3177545077, '1036665085', '1996-01-20', '2022-05-23 09:40:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `id` int(10) NOT NULL,
  `id_cliente` int(10) NOT NULL,
  `factura` bigint(5) NOT NULL,
  `valor_total` bigint(10) NOT NULL,
  `empresa` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`id`, `id_cliente`, `factura`, `valor_total`, `empresa`) VALUES
(1, 7, 145, 0, 'molina'),
(2, 7, 145, 0, 'molina'),
(3, 7, 145, 22000, 'molina');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(10) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `valor` int(10) NOT NULL,
  `f_creacion` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `valor`, `f_creacion`) VALUES
(1, 'manzana', 1000, '2022-05-23 10:02:51'),
(2, 'pera', 5000, '2022-05-23 11:53:40');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
