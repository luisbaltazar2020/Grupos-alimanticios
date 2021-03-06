-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 26-11-2021 a las 00:23:23
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `grupos alimenticios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacen`
--

DROP TABLE IF EXISTS `almacen`;
CREATE TABLE IF NOT EXISTS `almacen` (
  `Id_almacen` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `nombre` varchar(64) COLLATE utf16_spanish2_ci NOT NULL,
  PRIMARY KEY (`Id_almacen`),
  KEY `usuario_id` (`usuario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf16 COLLATE=utf16_spanish2_ci;

--
-- Volcado de datos para la tabla `almacen`
--

INSERT INTO `almacen` (`Id_almacen`, `usuario_id`, `nombre`) VALUES
(5, 1, 'tacos'),
(6, 1, 'tortas'),
(7, 1, 'tamales'),
(8, 1, 'desayunos'),
(9, 1, 'tortas'),
(10, 1, 'Italiana');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingredientes`
--

DROP TABLE IF EXISTS `ingredientes`;
CREATE TABLE IF NOT EXISTS `ingredientes` (
  `almacen_id` int(11) NOT NULL,
  `id_ingrediente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `costo` int(11) NOT NULL,
  PRIMARY KEY (`id_ingrediente`),
  KEY `almacen_id` (`almacen_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `ingredientes`
--

INSERT INTO `ingredientes` (`almacen_id`, `id_ingrediente`, `nombre`, `cantidad`, `costo`) VALUES
(5, 19, 'tortilla', 2000, 15),
(5, 26, 'suadero', 50, 100),
(6, 28, 'cebolla', 10, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `platillo`
--

DROP TABLE IF EXISTS `platillo`;
CREATE TABLE IF NOT EXISTS `platillo` (
  `Id_platillo` int(11) NOT NULL AUTO_INCREMENT,
  `almacen_id` int(11) NOT NULL,
  `nombre` varchar(32) COLLATE ucs2_spanish2_ci NOT NULL,
  `ingrediente_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`Id_platillo`),
  KEY `almacen_id` (`almacen_id`),
  KEY `ingrediente_id` (`ingrediente_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=ucs2 COLLATE=ucs2_spanish2_ci;

--
-- Volcado de datos para la tabla `platillo`
--

INSERT INTO `platillo` (`Id_platillo`, `almacen_id`, `nombre`, `ingrediente_id`, `cantidad`) VALUES
(1, 5, 'tacos de suadero', 26, 20),
(2, 5, 'tacos de suadero', 19, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Correo` varchar(128) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(128) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(128) COLLATE utf8_spanish2_ci NOT NULL,
  `tiempo_venta` int(11) NOT NULL,
  `h_inicial` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `eliminado` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `Correo`, `password`, `nombre`, `tiempo_venta`, `h_inicial`, `status`, `eliminado`) VALUES
(1, 'l.b.g.l_92@hotmail.com', 'hola', 'Luis Baltazar', 3, 5, 1, 0),
(2, 'EO@gmail.com', 'asasa', 'Erick', 5, 2, 1, 0),
(4, 'juan@udg.mx', 'hola', 'Juan Baltazar', 6, 8, 1, 0);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `almacen`
--
ALTER TABLE `almacen`
  ADD CONSTRAINT `fk_usuario_almacen` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  ADD CONSTRAINT `fk_almacen_ingredientes` FOREIGN KEY (`almacen_id`) REFERENCES `almacen` (`Id_almacen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `platillo`
--
ALTER TABLE `platillo`
  ADD CONSTRAINT `fk_platillo_ingredientes` FOREIGN KEY (`almacen_id`) REFERENCES `almacen` (`Id_almacen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `platillo_ibfk_1` FOREIGN KEY (`ingrediente_id`) REFERENCES `ingredientes` (`id_ingrediente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
