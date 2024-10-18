-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-10-2024 a las 00:59:46
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pps`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_cliente`
--

CREATE TABLE `tb_cliente` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `telefono` int(20) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `pass` blob DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tb_cliente`
--

INSERT INTO `tb_cliente` (`id`, `nombre`, `apellido`, `telefono`, `mail`, `pass`, `usuario`) VALUES
(6, 'cristian', 'cricoy', 1135607380, 'ricoy984@gmail.com', 0x30, 'ricoy'),
(7, 'eduardo', 'ricoy', 1123435454, 'eduardo@gmail.com', 0x30, 'edu123'),
(8, 'laura ', 'leiva', 12343212, 'leivalau@gmail.com', 0x30, 'leiva'),
(9, 'julieta', 'ricoy', 342212334, 'julieta@gmail.com', 0x243279243130244f762e63434f537a38656f61592f6b35374c6234582e4e6478322f62673872367a705a79455851527a6267334c5144677864534f53, 'juli'),
(10, 'dario', 'laprovitela', 1123232323, 'vintage76@gmail.com', 0x243279243130242e354444565a5172764b685731516f355835776b4a2e55334679795247794667414159783446342f2f41312f69326e68466d643557, 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_cliente`
--
ALTER TABLE `tb_cliente`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_cliente`
--
ALTER TABLE `tb_cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
