-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-11-2014 a las 07:20:31
-- Versión del servidor: 5.6.20
-- Versión de PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `inmobi16_inmo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagedesc`
--

CREATE TABLE IF NOT EXISTS `imagedesc` (
  `Filtro` varchar(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `padre` enum('1','2') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `imagedesc`
--

INSERT INTO `imagedesc` (`Filtro`, `padre`, `url`) VALUES
('', '1', 'images/banners/HomeFull_2.jpg'),
('', '1', 'images/banners/HomeFull_1.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagefilters`
--

CREATE TABLE IF NOT EXISTS `imagefilters` (
`ID` int(2) NOT NULL,
  `url` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `Descripcion` text NOT NULL,
  `Ubicacion` tinytext NOT NULL,
  `Tipo` enum('Casa','Oficina','Departamento','Bodega') NOT NULL,
  `Status` enum('En venta','En renta','No disponible','') NOT NULL,
  `Condiciones` text NOT NULL,
  `Filtro` varchar(2) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `imagefilters`
--

INSERT INTO `imagefilters` (`ID`, `url`, `nombre`, `Descripcion`, `Ubicacion`, `Tipo`, `Status`, `Condiciones`, `Filtro`) VALUES
(13, 'images/filtros/house.jpg', 'house.jpg', 'lkasjdoiden,cmnxoiejd', 'gbljgluyghbmb', 'Casa', 'En venta', ',bvjvygbj,hb,lhgjhgjgjhg', 'F1'),
(14, 'images/filtros/house1.jpg', 'house1.jpg', 'esta es una casa muy bonita', 'Av. SiempreViva Numero 23 manzana 56 a un lado del kwek-e Mart ', 'Oficina', 'En venta', 'Subir una foto \r\nCredencial de elector\r\nlSDOIEJ', 'F2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `password` varchar(128) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email_address`, `password`, `date`) VALUES
(1, 'jose', 'coca', 'a@a.com', '91dfd9ddb4198affc5c194cd8ce6d338fde470e2', '2014-10-24 19:28:22');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `imagefilters`
--
ALTER TABLE `imagefilters`
 ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `imagefilters`
--
ALTER TABLE `imagefilters`
MODIFY `ID` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
