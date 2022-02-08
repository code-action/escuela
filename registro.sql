-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-02-2022 a las 19:12:19
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `registro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alm_alumno`
--

CREATE TABLE `alm_alumno` (
  `alm_id` int(10) UNSIGNED NOT NULL,
  `alm_codigo` varchar(100) NOT NULL,
  `alm_nombre` varchar(300) NOT NULL,
  `alm_edad` int(11) NOT NULL,
  `alm_sexo` varchar(100) NOT NULL,
  `alm_id_grd` int(10) UNSIGNED NOT NULL,
  `alm_observacion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alm_alumno`
--

INSERT INTO `alm_alumno` (`alm_id`, `alm_codigo`, `alm_nombre`, `alm_edad`, `alm_sexo`, `alm_id_grd`, `alm_observacion`) VALUES
(1, '66666', 'Flor Ventura', 4, 'Femenino', 7, 'Habla mucho en clase'),
(2, '44433', 'Liz Flores', 6, 'Masculino', 6, 'No presenta la tarea'),
(3, '33333', 'Carlos López', 5, 'Masculino', 2, 'llega tarde');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grd_grado`
--

CREATE TABLE `grd_grado` (
  `grd_id` int(10) UNSIGNED NOT NULL,
  `grd_nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `grd_grado`
--

INSERT INTO `grd_grado` (`grd_id`, `grd_nombre`) VALUES
(2, 'Primero'),
(4, 'Tercero'),
(5, 'Cuarto'),
(6, 'Segundo'),
(7, 'Quinto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mat_materia`
--

CREATE TABLE `mat_materia` (
  `mat_id` int(10) UNSIGNED NOT NULL,
  `mat_nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mat_materia`
--

INSERT INTO `mat_materia` (`mat_id`, `mat_nombre`) VALUES
(1, 'Matemáticas'),
(3, 'Ciencias'),
(4, 'Lenguaje');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mxg_materiasxgrado`
--

CREATE TABLE `mxg_materiasxgrado` (
  `mxg_id` int(10) UNSIGNED NOT NULL,
  `mxg_id_grd` int(10) UNSIGNED NOT NULL,
  `mxg_id_mat` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mxg_materiasxgrado`
--

INSERT INTO `mxg_materiasxgrado` (`mxg_id`, `mxg_id_grd`, `mxg_id_mat`) VALUES
(2, 7, 3),
(3, 7, 1),
(5, 6, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alm_alumno`
--
ALTER TABLE `alm_alumno`
  ADD PRIMARY KEY (`alm_id`);

--
-- Indices de la tabla `grd_grado`
--
ALTER TABLE `grd_grado`
  ADD PRIMARY KEY (`grd_id`);

--
-- Indices de la tabla `mat_materia`
--
ALTER TABLE `mat_materia`
  ADD PRIMARY KEY (`mat_id`);

--
-- Indices de la tabla `mxg_materiasxgrado`
--
ALTER TABLE `mxg_materiasxgrado`
  ADD PRIMARY KEY (`mxg_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alm_alumno`
--
ALTER TABLE `alm_alumno`
  MODIFY `alm_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `grd_grado`
--
ALTER TABLE `grd_grado`
  MODIFY `grd_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `mat_materia`
--
ALTER TABLE `mat_materia`
  MODIFY `mat_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `mxg_materiasxgrado`
--
ALTER TABLE `mxg_materiasxgrado`
  MODIFY `mxg_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
