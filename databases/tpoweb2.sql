-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-11-2022 a las 16:01:44
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tpoweb2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `info_pesca`
--

CREATE TABLE `info_pesca` (
  `id_pesca` int(11) NOT NULL,
  `embarcado` varchar(2) NOT NULL,
  `tipo_embarcacion` varchar(15) NOT NULL,
  `equipo_pesca` text NOT NULL,
  `carnada` text NOT NULL,
  `pesca` text NOT NULL,
  `Detalles_Pesca` text NOT NULL,
  `id_localidad_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `info_pesca`
--

INSERT INTO `info_pesca` (`id_pesca`, `embarcado`, `tipo_embarcacion`, `equipo_pesca`, `carnada`, `pesca`, `Detalles_Pesca`, `id_localidad_fk`) VALUES
(6, 'No', 'costa', 'cañita de pescar', 'un cangrejo', 'un atun ', 'Hola MUendo Web', 2),
(7, 'No', 'costa', 'cañita de pescar', 'un cangrejo', 'un atun ', 'Hola MUendo Web', 8),
(8, 'No', 'costa', 'cañita de pescar', 'un cangrejo', 'un atun ', 'Hola MUendo Web', 8),
(9, 'Si', 'embarcacionamot', 'dasd', 'dasd', 'dsad', 'dassad', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidades`
--

CREATE TABLE `localidades` (
  `id_localidad` int(11) NOT NULL,
  `localidad` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `localidades`
--

INSERT INTO `localidades` (`id_localidad`, `localidad`) VALUES
(2, 'NECOCHEA'),
(5, 'MAR DEL PLATA'),
(6, 'Neuquen'),
(8, 'Quequen');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(1, 'guido.cipo20@gmail.com', '$2a$12$tzC8Xa3UGGLfyZOvx7cJJeXTC46ESFhVuJkDxsXBJ7JAN4lj3e2bC');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `info_pesca`
--
ALTER TABLE `info_pesca`
  ADD PRIMARY KEY (`id_pesca`),
  ADD KEY `id_localidad_fk` (`id_localidad_fk`);

--
-- Indices de la tabla `localidades`
--
ALTER TABLE `localidades`
  ADD PRIMARY KEY (`id_localidad`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `info_pesca`
--
ALTER TABLE `info_pesca`
  MODIFY `id_pesca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `localidades`
--
ALTER TABLE `localidades`
  MODIFY `id_localidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `info_pesca`
--
ALTER TABLE `info_pesca`
  ADD CONSTRAINT `info_pesca_ibfk_1` FOREIGN KEY (`id_localidad_fk`) REFERENCES `localidades` (`id_localidad`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
