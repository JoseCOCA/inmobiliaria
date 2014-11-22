-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-11-2014 a las 00:39:51
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
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE IF NOT EXISTS `contactos` (
`ID` int(2) NOT NULL,
  `Nombre` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Telefono` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Celular` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Correo` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `Empresa` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagedesc`
--

CREATE TABLE IF NOT EXISTS `imagedesc` (
`ID` int(1) NOT NULL,
  `Filtro` varchar(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `principal` enum('0','1') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `recomendado` enum('0','1') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `imagedesc`
--

INSERT INTO `imagedesc` (`ID`, `Filtro`, `url`, `nombre`, `principal`, `recomendado`) VALUES
(1, 'F1', 'images/banners/HomeFull_2.jpg', 'HomeFull_2.jpg', '1', '0'),
(2, 'F2', 'images/banners/HomeFull_1.jpg', 'HomeFull_1.jpg', '1', '1'),
(5, 'F1', 'images/banners/banner_sld.jpg', 'banner_sld.jpg', '0', '0'),
(6, 'F1', 'images/banners/Camara_1_Final_.png', 'Camara_1_Final_.png', '0', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagefilters`
--

CREATE TABLE IF NOT EXISTS `imagefilters` (
`ID` int(2) NOT NULL,
  `url` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `Descripcion` text NOT NULL,
  `Tipo` enum('Casa','Oficina','Departamento','Bodega') NOT NULL,
  `Condicion` enum('venta','renta','NoDisponible','') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Condiciones` text NOT NULL,
  `Filtro` varchar(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `CalleNo` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Colonia` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Delegacion` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `CP` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Dimension` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Precio` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Status` enum('NO DISPONIBLE','EN REPARACION','EN CONSTRUCCION','EN REMODELACION') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `imagefilters`
--

INSERT INTO `imagefilters` (`ID`, `url`, `nombre`, `Descripcion`, `Tipo`, `Condicion`, `Condiciones`, `Filtro`, `CalleNo`, `Colonia`, `Delegacion`, `CP`, `Dimension`, `Precio`, `Status`) VALUES
(13, 'images/filtros/house.jpg', 'house.jpg', 'Casa bonita.\r\nQue tenga una bonita vista', 'Oficina', 'venta', 'Que se quede como esta.\r\nQue tenga una bonita vista', 'F1', 'Av. El Durazno, And. 45', 'El Durazno', 'Miguel hidalgo', '1340', '1000 m2', '100900', 'NO DISPONIBLE'),
(14, 'images/filtros/house1.jpg', 'house1.jpg', '', 'Casa', 'venta', '', 'F2', '', '', '', '', '', '', 'NO DISPONIBLE'),
(17, 'images/filtros/house2.jpg', 'house2.jpg', '', 'Casa', 'venta', '', 'F3', '', '', '', '', '', '', 'NO DISPONIBLE');

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
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
 ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `imagedesc`
--
ALTER TABLE `imagedesc`
 ADD PRIMARY KEY (`ID`);

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
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
MODIFY `ID` int(2) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `imagedesc`
--
ALTER TABLE `imagedesc`
MODIFY `ID` int(1) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `imagefilters`
--
ALTER TABLE `imagefilters`
MODIFY `ID` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
