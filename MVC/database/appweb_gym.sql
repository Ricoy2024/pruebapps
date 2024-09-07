-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-06-2024 a las 00:44:28
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `appweb_gym`
--
CREATE DATABASE IF NOT EXISTS `appweb_gym` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `appweb_gym`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_actividad`
--

DROP TABLE IF EXISTS `tb_actividad`;
CREATE TABLE `tb_actividad` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELACIONES PARA LA TABLA `tb_actividad`:
--

--
-- Volcado de datos para la tabla `tb_actividad`
--

INSERT INTO `tb_actividad` (`id`, `nombre`) VALUES
(1, 'Spinning'),
(2, 'Yoga'),
(3, 'Pilates'),
(4, 'Zumba'),
(5, 'Crossfit'),
(6, 'Body Jump'),
(7, 'Kick Boxing'),
(8, 'Sin actividad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_administrador`
--

DROP TABLE IF EXISTS `tb_administrador`;
CREATE TABLE `tb_administrador` (
  `Id` int(11) NOT NULL,
  `dni` int(11) NOT NULL,
  `contraseña` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- RELACIONES PARA LA TABLA `tb_administrador`:
--

--
-- Volcado de datos para la tabla `tb_administrador`
--

INSERT INTO `tb_administrador` (`Id`, `dni`, `contraseña`) VALUES
(1, 11111111, 0x313267796d3334);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_clase`
--

DROP TABLE IF EXISTS `tb_clase`;
CREATE TABLE `tb_clase` (
  `id` int(11) NOT NULL,
  `id_actividad` int(11) DEFAULT NULL,
  `id_profesor` int(11) DEFAULT NULL,
  `hora` enum('7:00','8:00','9:00','10:00','11:00','12:00','13:00','14:00','15:00','16:00','17:00','18:00','19:00','20:00') DEFAULT NULL,
  `cupo` int(11) DEFAULT 0,
  `dia` enum('Lunes','Martes','Miércoles','Jueves','Viernes','Sábado') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELACIONES PARA LA TABLA `tb_clase`:
--   `id_actividad`
--       `tb_actividad` -> `id`
--   `id_profesor`
--       `tb_profesor` -> `id`
--

--
-- Volcado de datos para la tabla `tb_clase`
--

INSERT INTO `tb_clase` (`id`, `id_actividad`, `id_profesor`, `hora`, `cupo`, `dia`) VALUES
(1, 8, NULL, '7:00', 25, 'Lunes'),
(3, 8, NULL, '8:00', 25, 'Lunes'),
(4, 4, 3, '9:00', 23, 'Lunes'),
(5, 5, 4, '10:00', 23, 'Lunes'),
(6, 1, 2, '11:00', 25, 'Lunes'),
(7, 3, 3, '12:00', 23, 'Lunes'),
(8, 2, 2, '13:00', 25, 'Lunes'),
(9, 4, 3, '14:00', 25, 'Lunes'),
(10, 6, 4, '15:00', 20, 'Lunes'),
(11, 5, 4, '16:00', 23, 'Lunes'),
(12, 4, 3, '17:00', 25, 'Lunes'),
(13, 2, 2, '18:00', 25, 'Lunes'),
(14, 5, 1, '19:00', 23, 'Lunes'),
(15, 2, 2, '20:00', 22, 'Lunes'),
(16, 3, 6, '7:00', 23, 'Martes'),
(18, 2, 5, '8:00', 23, 'Martes'),
(19, 1, 3, '9:00', 23, 'Martes'),
(20, 6, 4, '10:00', 23, 'Martes'),
(51, 2, 5, '11:00', 24, 'Martes'),
(52, 1, 6, '12:00', 25, 'Martes'),
(53, 6, 4, '13:00', 23, 'Martes'),
(54, 3, 6, '14:00', 26, 'Martes'),
(55, 1, 6, '15:00', 25, 'Martes'),
(56, 4, 5, '16:00', 25, 'Martes'),
(57, 3, 3, '17:00', 22, 'Martes'),
(58, 1, 6, '18:00', 25, 'Martes'),
(59, 4, 5, '19:00', 23, 'Martes'),
(60, 6, 4, '20:00', 24, 'Martes'),
(63, 2, 5, '7:00', 24, 'Miércoles'),
(64, 3, 6, '8:00', 22, 'Miércoles'),
(65, 4, 3, '9:00', 25, 'Miércoles'),
(66, 5, 4, '10:00', 25, 'Miércoles'),
(67, 1, 2, '11:00', 23, 'Miércoles'),
(68, 4, 3, '14:00', 24, 'Miércoles'),
(69, 6, 4, '15:00', 25, 'Miércoles'),
(70, 5, 1, '16:00', 25, 'Miércoles'),
(71, 2, 3, '17:00', 22, 'Miércoles'),
(72, 2, 2, '18:00', 25, 'Miércoles'),
(73, 5, 4, '19:00', 23, 'Miércoles'),
(74, 2, 5, '20:00', 23, 'Miércoles'),
(75, 3, 3, '7:00', 25, 'Jueves'),
(76, 2, 2, '8:00', 24, 'Jueves'),
(77, 1, 6, '9:00', 25, 'Jueves'),
(78, 6, 4, '10:00', 23, 'Jueves'),
(79, 2, 2, '11:00', 25, 'Jueves'),
(80, 3, 3, '12:00', 22, 'Jueves'),
(81, 6, 4, '13:00', 25, 'Jueves'),
(82, 3, 3, '14:00', 22, 'Jueves'),
(83, 2, 2, '15:00', 25, 'Jueves'),
(84, 1, 6, '16:00', 25, 'Jueves'),
(85, 3, 3, '17:00', 22, 'Jueves'),
(86, 1, 6, '18:00', 25, 'Jueves'),
(87, 4, 3, '19:00', 24, 'Jueves'),
(88, 6, 4, '20:00', 25, 'Jueves'),
(89, 2, 5, '7:00', 25, 'Viernes'),
(90, 3, 6, '8:00', 25, 'Viernes'),
(91, 4, 3, '9:00', 24, 'Viernes'),
(92, 5, 4, '10:00', 25, 'Viernes'),
(93, 1, 2, '11:00', 24, 'Viernes'),
(94, 5, 4, '12:00', 23, 'Viernes'),
(95, 2, 5, '13:00', 25, 'Viernes'),
(96, 4, 3, '14:00', 22, 'Viernes'),
(97, 6, 4, '15:00', 24, 'Viernes'),
(98, 5, 4, '16:00', 25, 'Viernes'),
(99, 4, 3, '17:00', 22, 'Viernes'),
(100, 2, 5, '18:00', 25, 'Viernes'),
(101, 5, 4, '19:00', 23, 'Viernes'),
(102, 2, 5, '20:00', 25, 'Viernes'),
(103, 4, 4, '7:00', 25, 'Sábado'),
(104, 4, 5, '8:00', 25, 'Sábado'),
(105, 5, 1, '9:00', 23, 'Sábado'),
(106, 1, 6, '10:00', 25, 'Sábado'),
(107, 2, 2, '11:00', 22, 'Sábado'),
(108, 6, 4, '12:00', 25, 'Sábado'),
(109, 4, 5, '13:00', 22, 'Sábado'),
(110, 5, 1, '14:00', 25, 'Sábado'),
(111, 1, 2, '15:00', 24, 'Sábado'),
(112, 3, 6, '16:00', 22, 'Sábado'),
(113, 2, 2, '17:00', 23, 'Sábado'),
(114, 4, 5, '18:00', 23, 'Sábado'),
(115, 6, 4, '19:00', 24, 'Sábado'),
(116, 4, 5, '20:00', 22, 'Sábado'),
(117, 7, 6, '12:00', 25, 'Miércoles'),
(118, 7, 4, '13:00', 25, 'Miércoles');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_dia`
--

DROP TABLE IF EXISTS `tb_dia`;
CREATE TABLE `tb_dia` (
  `id` int(11) NOT NULL,
  `dia` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELACIONES PARA LA TABLA `tb_dia`:
--

--
-- Volcado de datos para la tabla `tb_dia`
--

INSERT INTO `tb_dia` (`id`, `dia`) VALUES
(1, 'Lunes'),
(2, 'Martes'),
(3, 'Miércoles'),
(4, 'Jueves'),
(5, 'Viernes'),
(6, 'Sábado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_inscripcion`
--

DROP TABLE IF EXISTS `tb_inscripcion`;
CREATE TABLE `tb_inscripcion` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_clase` int(11) DEFAULT NULL,
  `fecha_inscripcion` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELACIONES PARA LA TABLA `tb_inscripcion`:
--   `id_usuario`
--       `tb_usuario` -> `Id`
--   `id_clase`
--       `tb_clase` -> `id`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_profesor`
--

DROP TABLE IF EXISTS `tb_profesor`;
CREATE TABLE `tb_profesor` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `dni` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `foto_perfil` varchar(255) NOT NULL,
  `celular` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- RELACIONES PARA LA TABLA `tb_profesor`:
--

--
-- Volcado de datos para la tabla `tb_profesor`
--

INSERT INTO `tb_profesor` (`id`, `nombre`, `apellido`, `dni`, `email`, `foto_perfil`, `celular`) VALUES
(1, 'Julián', 'Rodriguez', 24798345, 'julianprofe@gmail.com', 'Julian.png', '1123452345'),
(2, 'Agustina', 'Perez', 20100300, 'agustinaprofe@gmail.com', 'Agustina.jpg', '1120302030'),
(3, 'Clara', 'Suárez', 20500300, 'claraprofe@gmail.com', 'Clara.jpg', '1190302010'),
(4, 'Sebastián', 'Dominguez', 50406070, 'sebastianprofe@gmail.com', 'Sebastian.jpg', '1123344532'),
(5, 'Guadalupe', 'López', 45556670, 'guadalupeprofe@gmail.com', 'Guadalupe.jpg', '1125789865'),
(6, 'Federico', 'Gutiérrez', 39302939, 'federicoprofe@gmail.com', 'Federico.jpg', '1145788754');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_usuario`
--

DROP TABLE IF EXISTS `tb_usuario`;
CREATE TABLE `tb_usuario` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `Apellido` varchar(20) NOT NULL,
  `Dni` int(8) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Celular` int(10) NOT NULL,
  `Contraseña` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELACIONES PARA LA TABLA `tb_usuario`:
--

--
-- Volcado de datos para la tabla `tb_usuario`
--

INSERT INTO `tb_usuario` (`Id`, `Nombre`, `Apellido`, `Dni`, `Email`, `Celular`, `Contraseña`) VALUES
(1, 'Julio', 'Juarez', 10200300, 'julio@gmail.com', 1160005000, 0x3214ff813644adbe92132956134511e1),
(3, 'Sandra', 'Juarez', 20400500, 'sandra@gmail.com', 1141414141, 0xbd8ee2aefa135dec977bc0d886f24cc9),
(5, 'Joa', 'Saku', 18906677, 'joannarocios@gmail.com', 1120235654, 0xbd8ee2aefa135dec977bc0d886f24cc9),
(6, 'Julio', 'Gomez', 20192930, 'gomez@gmail.com', 1140506050, 0xecfeb22ab8ef78593af8df8e5f5eda1b),
(7, 'Nahu', 'Marti', 80907060, 'nahuel.martinez.243@gmail.com', 1120235654, 0xd0a688959ebe26f5b2b4659c8512e685),
(8, 'Luca', 'Maxi', 20300400, 'lucasmaximilianoolivieri@gmail.com', 1154563298, 0xbd9a34e15b1210a37bbf1edb4148a70f);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_actividad`
--
ALTER TABLE `tb_actividad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tb_administrador`
--
ALTER TABLE `tb_administrador`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `tb_clase`
--
ALTER TABLE `tb_clase`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_actividad` (`id_actividad`),
  ADD KEY `id_profesor` (`id_profesor`);

--
-- Indices de la tabla `tb_dia`
--
ALTER TABLE `tb_dia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tb_inscripcion`
--
ALTER TABLE `tb_inscripcion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_clase` (`id_clase`);

--
-- Indices de la tabla `tb_profesor`
--
ALTER TABLE `tb_profesor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_actividad`
--
ALTER TABLE `tb_actividad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tb_administrador`
--
ALTER TABLE `tb_administrador`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tb_clase`
--
ALTER TABLE `tb_clase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT de la tabla `tb_dia`
--
ALTER TABLE `tb_dia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tb_inscripcion`
--
ALTER TABLE `tb_inscripcion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tb_profesor`
--
ALTER TABLE `tb_profesor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tb_clase`
--
ALTER TABLE `tb_clase`
  ADD CONSTRAINT `tb_clase_ibfk_1` FOREIGN KEY (`id_actividad`) REFERENCES `tb_actividad` (`id`),
  ADD CONSTRAINT `tb_clase_ibfk_2` FOREIGN KEY (`id_profesor`) REFERENCES `tb_profesor` (`id`);

--
-- Filtros para la tabla `tb_inscripcion`
--
ALTER TABLE `tb_inscripcion`
  ADD CONSTRAINT `tb_inscripcion_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuario` (`Id`),
  ADD CONSTRAINT `tb_inscripcion_ibfk_2` FOREIGN KEY (`id_clase`) REFERENCES `tb_clase` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
