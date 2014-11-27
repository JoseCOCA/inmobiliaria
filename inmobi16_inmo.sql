-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-11-2014 a las 19:54:40
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `contactos`
--

INSERT INTO `contactos` (`ID`, `Nombre`, `Telefono`, `Celular`, `Correo`, `Empresa`) VALUES
(1, 'Jose', '230948', '0445502932', 'josecoca0890@gmail.com', 'Monster Code'),
(2, 'Jose', '230923', '', 'alberto@gmail.com', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenido`
--

CREATE TABLE IF NOT EXISTS `contenido` (
`ID` int(100) NOT NULL,
  `contenido` text CHARACTER SET utf8 NOT NULL,
  `padre` int(5) NOT NULL COMMENT '1=inicio, 2=info empresa, 3=aviso privacidad, 4=terminos uso'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `contenido`
--

INSERT INTO `contenido` (`ID`, `contenido`, `padre`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod inventore sed, in dignissimos officia tempore quaerat magnam sit voluptates necessitatibus placeat, amet sapiente velit dolore sequi, hic dolor blanditiis pariatur ad. Officiis a fugiat quis sit qui ipsa pariatur, ratione animi iste deleniti laboriosam iusto eveniet dolor quia quod architecto adipisci tempora, amet explicabo ex? Doloribus quo quae similique reprehenderit nemo. Inventore, repellendus nulla necessitatibus excepturi. Iure, pariatur. Totam deleniti suscipit culpa, vel, ipsa eum dolores corrupti vitae commodi? Reiciendis voluptatem sint voluptates itaque quia maiores nobis incidunt est. Maiores neque commodi excepturi sit saepe autem temporibus illo minus quae odio veniam a, deserunt iste magnam, culpa provident impedit, reprehenderit dolor. Laboriosam esse vero, aperiam nulla, incidunt officiis illo totam nemo voluptatum eaque vel iste a temporibus labore quaerat ab explicabo beatae, est illum cumque. Illum reprehenderit odit nulla eum laudantium, fuga distinctio quas, voluptates, laborum autem magnam dolorem facilis rem, natus? Nulla ex suscipit rerum cupiditate delectus optio at laboriosam voluptatibus corporis porro distinctio temporibus harum ullam, consequuntur neque debitis adipisci voluptatum quasi earum dolore vel laudantium velit reiciendis! Mollitia sed magni tempora vero animi, eveniet quod dignissimos at nulla eum quibusdam ad, aspernatur laboriosam! Sed ea rerum ad esse ullam consequatur cum excepturi molestias quaerat autem aliquam odio, maiores officiis, animi sint odit qui neque quo recusandae aperiam veniam explicabo consectetur ex delectus. Labore est dolor distinctio minus cupiditate, nisi odit voluptas dolorem officia, porro dolorum nemo totam hic vitae incidunt in temporibus itaque quia ducimus! In sunt vitae sint repellat, iste quis asperiores quidem consectetur obcaecati unde voluptates, voluptatum ipsum fuga nulla libero adipisci est explicabo. Libero dolore ratione, iste fugit temporibus nihil quia obcaecati esse numquam, tenetur alias ipsum doloribus. Maiores ullam sunt porro fugiat at fuga quia, eveniet dolorum quam. Tempora magnam dolorem quod fugiat qui quos, provident similique distinctio eaque voluptas laboriosam aperiam minima voluptates accusantium, facere necessitatibus, perferendis obcaecati. Error dolores neque eaque nulla reprehenderit minus similique quos itaque officia consequuntur earum modi nihil quia, porro eligendi, praesentium sit accusantium nostrum, sequi deserunt quam in assumenda. Nostrum alias praesentium suscipit tenetur placeat esse corrupti, autem, fuga odio perspiciatis iusto, ex dignissimos. Sed illo nisi, expedita cumque commodi officiis laboriosam voluptatibus similique molestiae deserunt repudiandae vero qui ab. Voluptas, sequi unde perferendis ipsa sit quia cum iure est non rem libero alias fuga, accusamus temporibus officiis! Excepturi distinctio dolorem libero tempore reprehenderit, quis officia minus voluptas esse molestias perspiciatis nostrum perferendis doloribus, eum suscipit iste quam hic porro itaque! Nemo voluptates nobis eos eum repellat, nam alias nisi animi hic provident beatae quasi perspiciatis vel nesciunt iste architecto delectus corrupti vero commodi sunt! Saepe temporibus minima eaque dignissimos vel hic vitae cum obcaecati cumque quisquam ipsum harum et modi facere ea culpa consectetur, natus provident eligendi non quam blanditiis, voluptate facilis possimus. Cupiditate reiciendis hic repellat suscipit sit soluta, perspiciatis ducimus, dicta totam qui odio voluptatum aliquid dolor error ullam tenetur illo. Consequuntur maiores soluta odio accusamus sunt temporibus aspernatur, aliquam minima cum eum.', 1),
(2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod inventore sed, in dignissimos officia tempore quaerat magnam sit voluptates necessitatibus placeat, amet sapiente velit dolore sequi, hic dolor blanditiis pariatur ad. Officiis a fugiat quis sit qui ipsa pariatur, ratione animi iste deleniti laboriosam iusto eveniet dolor quia quod architecto adipisci tempora, amet explicabo ex? Doloribus quo quae similique reprehenderit nemo. Inventore, repellendus nulla necessitatibus excepturi. Iure, pariatur. Totam deleniti suscipit culpa, vel, ipsa eum dolores corrupti vitae commodi? Reiciendis voluptatem sint voluptates itaque quia maiores nobis incidunt est. Maiores neque commodi excepturi sit saepe autem temporibus illo minus quae odio veniam a, deserunt iste magnam, culpa provident impedit, reprehenderit dolor. Laboriosam esse vero, aperiam nulla, incidunt officiis illo totam nemo voluptatum eaque vel iste a temporibus labore quaerat ab explicabo beatae, est illum cumque. Illum reprehenderit odit nulla eum laudantium, fuga distinctio quas, voluptates, laborum autem magnam dolorem facilis rem, natus? Nulla ex suscipit rerum cupiditate delectus optio at laboriosam voluptatibus corporis porro distinctio temporibus harum ullam, consequuntur neque debitis adipisci voluptatum quasi earum dolore vel laudantium velit reiciendis! Mollitia sed magni tempora vero animi, eveniet quod dignissimos at nulla eum quibusdam ad, aspernatur laboriosam! Sed ea rerum ad esse ullam consequatur cum excepturi molestias quaerat autem aliquam odio, maiores officiis, animi sint odit qui neque quo recusandae aperiam veniam explicabo consectetur ex delectus. Labore est dolor distinctio minus cupiditate, nisi odit voluptas dolorem officia, porro dolorum nemo totam hic vitae incidunt in temporibus itaque quia ducimus! In sunt vitae sint repellat, iste quis asperiores quidem consectetur obcaecati unde voluptates, voluptatum ipsum fuga nulla libero adipisci est explicabo. Libero dolore ratione, iste fugit temporibus nihil quia obcaecati esse numquam, tenetur alias ipsum doloribus. Maiores ullam sunt porro fugiat at fuga quia, eveniet dolorum quam. Tempora magnam dolorem quod fugiat qui quos, provident similique distinctio eaque voluptas laboriosam aperiam minima voluptates accusantium, facere necessitatibus, perferendis obcaecati. Error dolores neque eaque nulla reprehenderit minus similique quos itaque officia consequuntur earum modi nihil quia, porro eligendi, praesentium sit accusantium nostrum, sequi deserunt quam in assumenda. Nostrum alias praesentium suscipit tenetur placeat esse corrupti, autem, fuga odio perspiciatis iusto, ex dignissimos. Sed illo nisi, expedita cumque commodi officiis laboriosam voluptatibus similique molestiae deserunt repudiandae vero qui ab. Voluptas, sequi unde perferendis ipsa sit quia cum iure est non rem libero alias fuga, accusamus temporibus officiis! Excepturi distinctio dolorem libero tempore reprehenderit, quis officia minus voluptas esse molestias perspiciatis nostrum perferendis doloribus, eum suscipit iste quam hic porro itaque! Nemo voluptates nobis eos eum repellat, nam alias nisi animi hic provident beatae quasi perspiciatis vel nesciunt iste architecto delectus corrupti vero commodi sunt! Saepe temporibus minima eaque dignissimos vel hic vitae cum obcaecati cumque quisquam ipsum harum et modi facere ea culpa consectetur, natus provident eligendi non quam blanditiis, voluptate facilis possimus. Cupiditate reiciendis hic repellat suscipit sit soluta, perspiciatis ducimus, dicta totam qui odio voluptatum aliquid dolor error ullam tenetur illo. Consequuntur maiores soluta odio accusamus sunt temporibus aspernatur, aliquam minima cum eum.', 2),
(3, '<div class="extra_wrapper">\r\n                    <p>Kharetra venenatis nulla. Vestibulum volutpat turpis ut massa commodo, quis aliquam massa facilisis. Donec non sapien a erat porttitor aliquet. Maecenas est quam, suscipit ac nunc at, semper elementum nulla. </p>\r\n                    Etiam non rutrum lectus, a viverra elit. Nulla quis arcu sed lectus ultricies tincidunt quis dictum tellus.\r\n                </div>\r\n            </div>\r\n            <img style= "width: 100%; padding-top: 30px;" src="images/mision.png" alt="">', 2),
(4, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod inventore sed, in dignissimos officia tempore quaerat magnam sit voluptates necessitatibus placeat, amet sapiente velit dolore sequi, hic dolor blanditiis pariatur ad. Officiis a fugiat quis sit qui ipsa pariatur, ratione animi iste deleniti laboriosam iusto eveniet dolor quia quod architecto adipisci tempora, amet explicabo ex? Doloribus quo quae similique reprehenderit nemo. Inventore, repellendus nulla necessitatibus excepturi. Iure, pariatur. Totam deleniti suscipit culpa, vel, ipsa eum dolores corrupti vitae commodi? Reiciendis voluptatem sint voluptates itaque quia maiores nobis incidunt est. Maiores neque commodi excepturi sit saepe autem temporibus illo minus quae odio veniam a, deserunt iste magnam, culpa provident impedit, reprehenderit dolor. Laboriosam esse vero, aperiam nulla, incidunt officiis illo totam nemo voluptatum eaque vel iste a temporibus labore quaerat ab explicabo beatae, est illum cumque. Illum reprehenderit odit nulla eum laudantium, fuga distinctio quas, voluptates, laborum autem magnam dolorem facilis rem, natus? Nulla ex suscipit rerum cupiditate delectus optio at laboriosam voluptatibus corporis porro distinctio temporibus harum ullam, consequuntur neque debitis adipisci voluptatum quasi earum dolore vel laudantium velit reiciendis! Mollitia sed magni tempora vero animi, eveniet quod dignissimos at nulla eum quibusdam ad, aspernatur laboriosam! Sed ea rerum ad esse ullam consequatur cum excepturi molestias quaerat autem aliquam odio, maiores officiis, animi sint odit qui neque quo recusandae aperiam veniam explicabo consectetur ex delectus. Labore est dolor distinctio minus cupiditate, nisi odit voluptas dolorem officia, porro dolorum nemo totam hic vitae incidunt in temporibus itaque quia ducimus! In sunt vitae sint repellat, iste quis asperiores quidem consectetur obcaecati unde voluptates, voluptatum ipsum fuga nulla libero adipisci est explicabo. Libero dolore ratione, iste fugit temporibus nihil quia obcaecati esse numquam, tenetur alias ipsum doloribus. Maiores ullam sunt porro fugiat at fuga quia, eveniet dolorum quam. Tempora magnam dolorem quod fugiat qui quos, provident similique distinctio eaque voluptas laboriosam aperiam minima voluptates accusantium, facere necessitatibus, perferendis obcaecati. Error dolores neque eaque nulla reprehenderit minus similique quos itaque officia consequuntur earum modi nihil quia, porro eligendi, praesentium sit accusantium nostrum, sequi deserunt quam in assumenda. Nostrum alias praesentium suscipit tenetur placeat esse corrupti, autem, fuga odio perspiciatis iusto, ex dignissimos. Sed illo nisi, expedita cumque commodi officiis laboriosam voluptatibus similique molestiae deserunt repudiandae vero qui ab. Voluptas, sequi unde perferendis ipsa sit quia cum iure est non rem libero alias fuga, accusamus temporibus officiis! Excepturi distinctio dolorem libero tempore reprehenderit, quis officia minus voluptas esse molestias perspiciatis nostrum perferendis doloribus, eum suscipit iste quam hic porro itaque! Nemo voluptates nobis eos eum repellat, nam alias nisi animi hic provident beatae quasi perspiciatis vel nesciunt iste architecto delectus corrupti vero commodi sunt! Saepe temporibus minima eaque dignissimos vel hic vitae cum obcaecati cumque quisquam ipsum harum et modi facere ea culpa consectetur, natus provident eligendi non quam blanditiis, voluptate facilis possimus. Cupiditate reiciendis hic repellat suscipit sit soluta, perspiciatis ducimus, dicta totam qui odio voluptatum aliquid dolor error ullam tenetur illo. Consequuntur maiores soluta odio accusamus sunt temporibus aspernatur, aliquam minima cum eum.', 2),
(5, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod inventore sed, in dignissimos officia tempore quaerat magnam sit voluptates necessitatibus placeat, amet sapiente velit dolore sequi, hic dolor blanditiis pariatur ad. Officiis a fugiat quis sit qui ipsa pariatur, ratione animi iste deleniti laboriosam iusto eveniet dolor quia quod architecto adipisci tempora, amet explicabo ex? Doloribus quo quae similique reprehenderit nemo. Inventore, repellendus nulla necessitatibus excepturi. Iure, pariatur. Totam deleniti suscipit culpa, vel, ipsa eum dolores corrupti vitae commodi? Reiciendis voluptatem sint voluptates itaque quia maiores nobis incidunt est. Maiores neque commodi excepturi sit saepe autem temporibus illo minus quae odio veniam a, deserunt iste magnam, culpa provident impedit, reprehenderit dolor. Laboriosam esse vero, aperiam nulla, incidunt officiis illo totam nemo voluptatum eaque vel iste a temporibus labore quaerat ab explicabo beatae, est illum cumque. Illum reprehenderit odit nulla eum laudantium, fuga distinctio quas, voluptates, laborum autem magnam dolorem facilis rem, natus? Nulla ex suscipit rerum cupiditate delectus optio at laboriosam voluptatibus corporis porro distinctio temporibus harum ullam, consequuntur neque debitis adipisci voluptatum quasi earum dolore vel laudantium velit reiciendis! Mollitia sed magni tempora vero animi, eveniet quod dignissimos at nulla eum quibusdam ad, aspernatur laboriosam! Sed ea rerum ad esse ullam consequatur cum excepturi molestias quaerat autem aliquam odio, maiores officiis, animi sint odit qui neque quo recusandae aperiam veniam explicabo consectetur ex delectus. Labore est dolor distinctio minus cupiditate, nisi odit voluptas dolorem officia, porro dolorum nemo totam hic vitae incidunt in temporibus itaque quia ducimus! In sunt vitae sint repellat, iste quis asperiores quidem consectetur obcaecati unde voluptates, voluptatum ipsum fuga nulla libero adipisci est explicabo. Libero dolore ratione, iste fugit temporibus nihil quia obcaecati esse numquam, tenetur alias ipsum doloribus. Maiores ullam sunt porro fugiat at fuga quia, eveniet dolorum quam. Tempora magnam dolorem quod fugiat qui quos, provident similique distinctio eaque voluptas laboriosam aperiam minima voluptates accusantium, facere necessitatibus, perferendis obcaecati. Error dolores neque eaque nulla reprehenderit minus similique quos itaque officia consequuntur earum modi nihil quia, porro eligendi, praesentium sit accusantium nostrum, sequi deserunt quam in assumenda. Nostrum alias praesentium suscipit tenetur placeat esse corrupti, autem, fuga odio perspiciatis iusto, ex dignissimos. Sed illo nisi, expedita cumque commodi officiis laboriosam voluptatibus similique molestiae deserunt repudiandae vero qui ab. Voluptas, sequi unde perferendis ipsa sit quia cum iure est non rem libero alias fuga, accusamus temporibus officiis! Excepturi distinctio dolorem libero tempore reprehenderit, quis officia minus voluptas esse molestias perspiciatis nostrum perferendis doloribus, eum suscipit iste quam hic porro itaque! Nemo voluptates nobis eos eum repellat, nam alias nisi animi hic provident beatae quasi perspiciatis vel nesciunt iste architecto delectus corrupti vero commodi sunt! Saepe temporibus minima eaque dignissimos vel hic vitae cum obcaecati cumque quisquam ipsum harum et modi facere ea culpa consectetur, natus provident eligendi non quam blanditiis, voluptate facilis possimus. Cupiditate reiciendis hic repellat suscipit sit soluta, perspiciatis ducimus, dicta totam qui odio voluptatum aliquid dolor error ullam tenetur illo. Consequuntur maiores soluta odio accusamus sunt temporibus aspernatur, aliquam minima cum eum.', 3),
(6, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod inventore sed, in dignissimos officia tempore quaerat magnam sit voluptates necessitatibus placeat, amet sapiente velit dolore sequi, hic dolor blanditiis pariatur ad. Officiis a fugiat quis sit qui ipsa pariatur, ratione animi iste deleniti laboriosam iusto eveniet dolor quia quod architecto adipisci tempora, amet explicabo ex? Doloribus quo quae similique reprehenderit nemo. Inventore, repellendus nulla necessitatibus excepturi. Iure, pariatur. Totam deleniti suscipit culpa, vel, ipsa eum dolores corrupti vitae commodi? Reiciendis voluptatem sint voluptates itaque quia maiores nobis incidunt est. Maiores neque commodi excepturi sit saepe autem temporibus illo minus quae odio veniam a, deserunt iste magnam, culpa provident impedit, reprehenderit dolor. Laboriosam esse vero, aperiam nulla, incidunt officiis illo totam nemo voluptatum eaque vel iste a temporibus labore quaerat ab explicabo beatae, est illum cumque. Illum reprehenderit odit nulla eum laudantium, fuga distinctio quas, voluptates, laborum autem magnam dolorem facilis rem, natus? Nulla ex suscipit rerum cupiditate delectus optio at laboriosam voluptatibus corporis porro distinctio temporibus harum ullam, consequuntur neque debitis adipisci voluptatum quasi earum dolore vel laudantium velit reiciendis! Mollitia sed magni tempora vero animi, eveniet quod dignissimos at nulla eum quibusdam ad, aspernatur laboriosam! Sed ea rerum ad esse ullam consequatur cum excepturi molestias quaerat autem aliquam odio, maiores officiis, animi sint odit qui neque quo recusandae aperiam veniam explicabo consectetur ex delectus. Labore est dolor distinctio minus cupiditate, nisi odit voluptas dolorem officia, porro dolorum nemo totam hic vitae incidunt in temporibus itaque quia ducimus! In sunt vitae sint repellat, iste quis asperiores quidem consectetur obcaecati unde voluptates, voluptatum ipsum fuga nulla libero adipisci est explicabo. Libero dolore ratione, iste fugit temporibus nihil quia obcaecati esse numquam, tenetur alias ipsum doloribus. Maiores ullam sunt porro fugiat at fuga quia, eveniet dolorum quam. Tempora magnam dolorem quod fugiat qui quos, provident similique distinctio eaque voluptas laboriosam aperiam minima voluptates accusantium, facere necessitatibus, perferendis obcaecati. Error dolores neque eaque nulla reprehenderit minus similique quos itaque officia consequuntur earum modi nihil quia, porro eligendi, praesentium sit accusantium nostrum, sequi deserunt quam in assumenda. Nostrum alias praesentium suscipit tenetur placeat esse corrupti, autem, fuga odio perspiciatis iusto, ex dignissimos. Sed illo nisi, expedita cumque commodi officiis laboriosam voluptatibus similique molestiae deserunt repudiandae vero qui ab. Voluptas, sequi unde perferendis ipsa sit quia cum iure est non rem libero alias fuga, accusamus temporibus officiis! Excepturi distinctio dolorem libero tempore reprehenderit, quis officia minus voluptas esse molestias perspiciatis nostrum perferendis doloribus, eum suscipit iste quam hic porro itaque! Nemo voluptates nobis eos eum repellat, nam alias nisi animi hic provident beatae quasi perspiciatis vel nesciunt iste architecto delectus corrupti vero commodi sunt! Saepe temporibus minima eaque dignissimos vel hic vitae cum obcaecati cumque quisquam ipsum harum et modi facere ea culpa consectetur, natus provident eligendi non quam blanditiis, voluptate facilis possimus. Cupiditate reiciendis hic repellat suscipit sit soluta, perspiciatis ducimus, dicta totam qui odio voluptatum aliquid dolor error ullam tenetur illo. Consequuntur maiores soluta odio accusamus sunt temporibus aspernatur, aliquam minima cum eum.', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `correos`
--

CREATE TABLE IF NOT EXISTS `correos` (
`ID` int(5) NOT NULL,
  `Propiedad` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `Correos` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Enviado` enum('0','1') COLLATE utf8_unicode_ci NOT NULL
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
  `Status` enum('NO DISPONIBLE','EN REPARACION','EN CONSTRUCCION','EN REMODELACION','DISPONIBLE') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email_address`, `password`, `date`) VALUES
(1, 'jose', 'coca', 'a@a.com', '91dfd9ddb4198affc5c194cd8ce6d338fde470e2', '2014-10-24 19:28:22'),
(2, 'Admin', 'Inmobiliaria', 'admin@admin.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', '2014-10-24 19:28:22');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
 ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `contenido`
--
ALTER TABLE `contenido`
 ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `correos`
--
ALTER TABLE `correos`
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
MODIFY `ID` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `contenido`
--
ALTER TABLE `contenido`
MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `correos`
--
ALTER TABLE `correos`
MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT;
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
