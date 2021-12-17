-- Esperanza Rodríguez Martínez
------------------BD minijuegos2 CON DATOS DE PRUEBA DE JUEGOS AGREGADOS------------------------------

-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-12-2021 a las 23:19:56
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `minijuegos2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `minijuegos`
--

CREATE TABLE `minijuegos` (
  `idjuego` tinyint(4) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `url` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `minijuegos`
--

INSERT INTO `minijuegos` (`idjuego`, `nombre`, `url`) VALUES
(1, 'Solitario', 'https://www.google.com/search?q=juego+solitario+online&oq=juego+solitario+online&aqs=chrome..69i57.9503j0j7&sourceid=chrome&ie=UTF-8'),
(3, 'Serpiente', 'https://www.google.com/search?q=jugar%20al%20Snake&stick=H4sIAAAAAAAAAOOwfcQowy3w8sc9YSnhSWtOXmPk5eIOzkvMTnUsSk5MSeUBAB3FamohAAAA'),
(5, 'Pac-Man', 'https://www.google.com/search?q=jugar%20a%20PAC-MAN&stick=H4sIAAAAAAAAAOOwfcQozi3w8sc9YSm-SWtOXmPk4GILSEzOTczjAQBYtGz7HAAAAA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preferencias`
--

CREATE TABLE `preferencias` (
  `idusuario` tinyint(4) NOT NULL,
  `idjuego` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` tinyint(4) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contrasena` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `nombre`, `correo`, `contrasena`) VALUES
(1, 'Esperanza', 'esperanza@gmail.com', 'esperancita11'),
(9, 'Alfonso', 'alfonsoferdi@gmail.com', 'alfonsito22');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `minijuegos`
--
ALTER TABLE `minijuegos`
  ADD PRIMARY KEY (`idjuego`);

--
-- Indices de la tabla `preferencias`
--
ALTER TABLE `preferencias`
  ADD PRIMARY KEY (`idusuario`,`idjuego`),
  ADD KEY `FK_idjuego` (`idjuego`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `minijuegos`
--
ALTER TABLE `minijuegos`
  MODIFY `idjuego` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `preferencias`
--
ALTER TABLE `preferencias`
  ADD CONSTRAINT `FK_idjuego` FOREIGN KEY (`idjuego`) REFERENCES `minijuegos` (`idjuego`),
  ADD CONSTRAINT `FK_idusuario` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
