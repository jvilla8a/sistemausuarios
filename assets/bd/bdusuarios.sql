-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-09-2015 a las 02:11:29
-- Versión del servidor: 5.6.25
-- Versión de PHP: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdusuarios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE IF NOT EXISTS `perfil` (
  `id` bigint(20) NOT NULL,
  `descripcion` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id`, `descripcion`) VALUES
(1, 'admin'),
(2, 'usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` bigint(20) NOT NULL,
  `usuario` varchar(30) COLLATE utf8_bin NOT NULL,
  `nombre` varchar(50) COLLATE utf8_bin NOT NULL,
  `correo` varchar(50) COLLATE utf8_bin NOT NULL,
  `clave` varchar(255) COLLATE utf8_bin NOT NULL,
  `fechahoraregistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idperfil` bigint(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `nombre`, `correo`, `clave`, `fechahoraregistro`, `idperfil`) VALUES
(19, 'admin', 'Administrador', 'admin@localhost.com', 'admin', '2015-09-11 23:42:47', 1),
(20, 'usuario3', 'Pedro Arango', 'usuario3@hotmail.com', 'usuario3', '2015-09-11 23:42:47', 2),
(21, 'usuario1', 'Juan Zapata', 'juan@gmail.com', 'usuario1', '2015-09-11 23:42:47', 2),
(22, 'usuario2', 'Ana Pérez', 'ana@yahoo.com', 'usuario2', '2015-09-11 23:42:47', 2),
(23, 'usuario4', 'Guillermo Zuluaga', 'usuario4@gmail.com', 'usuario4', '2015-09-11 23:42:47', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idperfil` (`idperfil`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`idperfil`) REFERENCES `perfil` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
