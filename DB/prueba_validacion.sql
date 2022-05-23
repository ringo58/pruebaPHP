-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-05-2022 a las 20:00:10
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
-- Base de datos: `prueba_validacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log_excepciones`
--

CREATE TABLE `log_excepciones` (
  `id` int(10) NOT NULL,
  `modulo` varchar(25) NOT NULL,
  `campo` varchar(25) NOT NULL,
  `mensaje` varchar(250) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `log_excepciones`
--

INSERT INTO `log_excepciones` (`id`, `modulo`, `campo`, `mensaje`, `fecha`) VALUES
(12, 'clientes', 'nombre', 'El valor es requerido y no fue enviado', '2022-05-23 09:04:25'),
(13, 'clientes', 'apellido', 'El campo tiene un minimo de 3 caracteres', '2022-05-23 09:04:25'),
(14, 'clientes', 'telefono', 'El campo tiene un minimo de 10 caracteres', '2022-05-23 09:04:25'),
(15, 'clientes', 'identificacion', 'El valor es requerido y no fue enviado', '2022-05-23 09:04:25'),
(16, 'clientes', 'nombre', 'El valor es requerido y no fue enviado', '2022-05-23 09:06:21'),
(17, 'clientes', 'apellido', 'El campo tiene un minimo de 3 caracteres', '2022-05-23 09:06:21'),
(18, 'clientes', 'telefono', 'El campo tiene un minimo de 10 caracteres', '2022-05-23 09:06:21'),
(19, 'clientes', 'identificacion', 'El valor es requerido y no fue enviado', '2022-05-23 09:06:21'),
(20, 'clientes', 'nombre', 'El valor es requerido y no fue enviado', '2022-05-23 09:13:57'),
(21, 'clientes', 'apellido', 'El campo tiene un minimo de 3 caracteres', '2022-05-23 09:13:57'),
(22, 'clientes', 'telefono', 'El campo tiene un minimo de 10 caracteres', '2022-05-23 09:13:57'),
(23, 'clientes', 'identificacion', 'El valor es requerido y no fue enviado', '2022-05-23 09:13:57'),
(24, 'clientes', 'telefono', 'El campo tiene un maximo de 10 caracteres', '2022-05-23 09:25:16'),
(25, 'productos', 'nombre', 'El valor es requerido y no fue enviado', '2022-05-23 10:03:02'),
(26, 'clientes', 'nombre', 'El valor es requerido y no fue enviado', '2022-05-23 11:54:47'),
(27, 'clientes', 'apellido', 'El campo tiene un minimo de 3 caracteres', '2022-05-23 11:54:47'),
(28, 'clientes', 'telefono', 'El campo tiene un minimo de 10 caracteres', '2022-05-23 11:54:47'),
(29, 'clientes', 'identificacion', 'El campo no es un string', '2022-05-23 11:54:47'),
(30, 'clientes', 'nombre', 'El valor es requerido y no fue enviado', '2022-05-23 11:57:46'),
(31, 'clientes', 'apellido', 'El campo tiene un minimo de 3 caracteres', '2022-05-23 11:57:46'),
(32, 'clientes', 'telefono', 'El campo tiene un minimo de 10 caracteres', '2022-05-23 11:57:46'),
(33, 'clientes', 'identificacion', 'El campo no es un string', '2022-05-23 11:57:46'),
(34, 'clientes', 'nombre', 'El valor es requerido y no fue enviado', '2022-05-23 12:01:27'),
(35, 'clientes', 'apellido', 'El campo tiene un minimo de 3 caracteres', '2022-05-23 12:01:27'),
(36, 'clientes', 'telefono', 'El campo tiene un minimo de 10 caracteres', '2022-05-23 12:01:27'),
(37, 'clientes', 'identificacion', 'El campo no es un string', '2022-05-23 12:01:27'),
(38, 'clientes', 'nombre', 'El valor es requerido y no fue enviado', '2022-05-23 12:05:45'),
(39, 'clientes', 'apellido', 'El campo tiene un minimo de 3 caracteres', '2022-05-23 12:05:45'),
(40, 'clientes', 'telefono', 'El campo tiene un minimo de 10 caracteres', '2022-05-23 12:05:45'),
(41, 'clientes', 'identificacion', 'El campo no es un string', '2022-05-23 12:05:45'),
(42, 'clientes', 'nombre', 'El valor es requerido y no fue enviado', '2022-05-23 12:10:29'),
(43, 'clientes', 'apellido', 'El campo tiene un minimo de 3 caracteres', '2022-05-23 12:10:29'),
(44, 'clientes', 'telefono', 'El campo tiene un minimo de 10 caracteres', '2022-05-23 12:10:29'),
(45, 'clientes', 'identificacion', 'El campo no es un string', '2022-05-23 12:10:29'),
(46, 'clientes', 'nombre', 'El valor es requerido y no fue enviado', '2022-05-23 12:20:27'),
(47, 'clientes', 'apellido', 'El campo tiene un minimo de 3 caracteres', '2022-05-23 12:20:27'),
(48, 'clientes', 'telefono', 'El campo tiene un minimo de 10 caracteres', '2022-05-23 12:20:27'),
(49, 'clientes', 'identificacion', 'El campo no es un string', '2022-05-23 12:20:27'),
(50, 'clientes', 'nombre', 'El valor es requerido y no fue enviado', '2022-05-23 12:21:24'),
(51, 'clientes', 'apellido', 'El campo tiene un minimo de 3 caracteres', '2022-05-23 12:21:24'),
(52, 'clientes', 'telefono', 'El campo tiene un minimo de 10 caracteres', '2022-05-23 12:21:24'),
(53, 'clientes', 'identificacion', 'El campo no es un string', '2022-05-23 12:21:24'),
(54, 'clientes', 'nombre', 'El valor es requerido y no fue enviado', '2022-05-23 12:22:01'),
(55, 'clientes', 'apellido', 'El campo tiene un minimo de 3 caracteres', '2022-05-23 12:22:01'),
(56, 'clientes', 'telefono', 'El campo tiene un minimo de 10 caracteres', '2022-05-23 12:22:01'),
(57, 'clientes', 'identificacion', 'El campo no es un string', '2022-05-23 12:22:01'),
(58, 'clientes', 'nombre', 'El valor es requerido y no fue enviado', '2022-05-23 12:32:55'),
(59, 'clientes', 'apellido', 'El campo tiene un minimo de 3 caracteres', '2022-05-23 12:32:55'),
(60, 'clientes', 'telefono', 'El campo tiene un minimo de 10 caracteres', '2022-05-23 12:32:55'),
(61, 'clientes', 'identificacion', 'El campo no es un string', '2022-05-23 12:32:55'),
(62, 'clientes', 'nombre', 'El valor es requerido y no fue enviado', '2022-05-23 12:35:25'),
(63, 'clientes', 'apellido', 'El campo tiene un minimo de 3 caracteres', '2022-05-23 12:35:25'),
(64, 'clientes', 'telefono', 'El campo tiene un minimo de 10 caracteres', '2022-05-23 12:35:25'),
(65, 'clientes', 'identificacion', 'El campo no es un string', '2022-05-23 12:35:25');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `log_excepciones`
--
ALTER TABLE `log_excepciones`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `log_excepciones`
--
ALTER TABLE `log_excepciones`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
