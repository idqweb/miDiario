-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 04-03-2016 a las 09:16:58
-- Versión del servidor: 5.6.26
-- Versión de PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectofinal`
--
#borro la DB en caso de que exista
DROP DATABASE IF EXISTS proyectofinal;
# la creo
CREATE DATABASE proyectofinal;

USE proyectofinal;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE IF NOT EXISTS `articulos` (
  `id` int(11) NOT NULL,
  `titular` varchar(80) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `autor` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `copete` varchar(300) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `tema` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `cuerpo` mediumtext CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `multimedia` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id`, `titular`, `fecha`, `autor`, `copete`, `tema`, `cuerpo`, `multimedia`) VALUES
(16, 'Y, viÃ©ndole don Quijote de aquella manera, con muestras de tanta tristeza, le d', '2016-03-01 21:34:53', 'admin', 'Una maÃ±ana, tras un sueÃ±o intranquilo, Gregorio Samsa se despertÃ³ convertido en un monstruoso insecto. Estaba echado de espaldas sobre un duro caparazÃ³n y, al alzar la cabeza, vio su vientre convexo y oscuro, surcado por curvadas callosidades, sobre.', 'Pensamientos', '<p>Una ma&ntilde;ana, tras un sue&ntilde;o intranquilo, Gregorio Samsa se despert&oacute; convertido en un monstruoso insecto. Estaba echado de espaldas sobre un duro caparaz&oacute;n y, al alzar la cabeza, vio su vientre convexo y oscuro, surcado por curvadas callosidades, sobre el que casi no se aguantaba la colcha, que estaba a punto de escurrirse hasta el suelo. Numerosas patas, penosamente delgadas en comparaci&oacute;n con el grosor normal de sus piernas, se agitaban sin concierto. - &iquest;Qu&eacute; me ha ocurrido?</p><p>No estaba so&ntilde;ando. Su habitaci&oacute;n, una habitaci&oacute;n normal, aunque muy peque&ntilde;a, ten&iacute;a el aspecto habitual. Sobre la mesa hab&iacute;a desparramado un muestrario de pa&ntilde;os - Samsa era viajante de comercio-, y de la pared colgaba una estampa recientemente recortada de una revista ilustrada y puesta en un marco dorado. La estampa mostraba a una mujer tocada con un gorro de pieles, envuelta en una estola tambi&eacute;n de pieles, y que, muy erguida, esgrim&iacute;a un amplio manguito, asimismo de piel, que ocultaba todo su antebrazo.</p><p>Gregorio mir&oacute; hacia la ventana; estaba nublado, y sobre el cinc del alf&eacute;izar repiqueteaban las gotas de lluvia, lo que le hizo sentir una gran melancol&iacute;a. &laquo;Bueno -pens&oacute;-; &iquest;y si siguiese durmiendo un rato y me olvidase de todas estas locuras? &raquo; Pero no era posible, pues Gregorio ten&iacute;a la costumbre de dormir sobre el lado derecho, y su actual estado no le permit&iacute;a adoptar tal postura. Por m&aacute;s que se esforzara volv&iacute;a a quedar de espaldas. Intent&oacute; en vano esta operaci&oacute;n numerosas veces; cerr&oacute; los ojos para no tener que ver aquella confusa agitaci&oacute;n de patas, que no ces&oacute; hasta que not&oacute; en el costado un dolor leve y punzante, un dolor jam&aacute;s sentido hasta entonces. - &iexcl;Qu&eacute; cansada es la profesi&oacute;n que he elegido! -se dijo-. Siempre de viaje. Las preocupaciones son mucho mayores cuando se trabaja</p><ol><li>listado</li><li>madrid</li><li>paris</li><li>espa&ntilde;a</li><li>Fin</li></ol>', 'noexiste'),
(30, 'Una maÃ±ana, tras un sueÃ±o intranquilo, Gregorio Samsa se des', '2016-03-02 23:43:36', 'admin', 'Una maÃ±ana, tras un sueÃ±o intranquilo, Gregorio Samsa se despertÃ³ convertido en un monstruoso insecto. Estaba echado de espaldas sobre un duro caparazÃ³n y, al alzar la cabeza, vio su vientre convexo y oscuro, surcado por curvadas callosidades, sobre.			', 'reflexiones', '<p>Una ma&ntilde;ana, tras un sue&ntilde;o intranquilo, Gregorio Samsa se despert&oacute; convertido en un monstruoso insecto. Estaba echado de espaldas sobre un duro caparaz&oacute;n y, al alzar la cabeza, vio su vientre convexo y oscuro, surcado por curvadas callosidades, sobre el que casi no se aguantaba la colcha, que estaba a punto de escurrirse hasta el suelo.</p><p>Numerosas patas, penosamente delgadas en comparaci&oacute;n con el grosor normal de sus piernas, se agitaban sin concierto. - &iquest;Qu&eacute; me ha ocurrido? No estaba so&ntilde;ando. Su habitaci&oacute;n, una habitaci&oacute;n normal, aunque muy peque&ntilde;a, ten&iacute;a el aspecto habitual.</p><p>Sobre la mesa hab&iacute;a desparramado un muestrario de pa&ntilde;os - Samsa era viajante de comercio-, y de la pared colgaba una estampa recientemente recortada de una revista ilustrada y puesta en un marco dorado. La estampa mostraba a una mujer tocada con un gorro de pieles, envuelta en una estola tambi&eacute;n de pieles, y que, muy erguida, esgrim&iacute;a un amplio manguito, asimismo de piel, que ocultaba todo su antebrazo.</p><p>Gregorio mir&oacute; hacia la ventana; estaba nublado, y sobre el cinc del alf&eacute;izar repiqueteaban las gotas de lluvia, lo que le hizo sentir una gran melancol&iacute;a. &laquo;Bueno -pens&oacute;-; &iquest;y si siguiese durmiendo un rato y me olvidase de todas estas locuras? &raquo; Pero no era posible, pues Gregorio ten&iacute;a la costumbre de dormir sobre el lado derecho, y su actual estado no le permit&iacute;a adoptar tal postura. Por m&aacute;s que se esforzara volv&iacute;a a quedar de espaldas. Intent&oacute; en vano esta operaci&oacute;n numerosas veces; cerr&oacute; los ojos para no</p>', 'noexiste'),
(34, 'Viaje a ninguna parte', '2016-03-03 21:58:06', 'admin', 'ninguno', 'Reflexiones', 'noexiste666', '/uploads/fotos/paisaje1.jpg'),
(36, 'Moto', '2016-03-03 22:19:06', 'admin', 'ninguno', 'Vivencias', 'noexiste666', '/uploads/fotos/animadas3.gif'),
(39, 'Viajando se esta guay', '2016-03-03 22:41:59', 'admin', 'ninguno', 'Viajes', 'noexiste666', '/uploads/fotos/paisaje6.jpg'),
(40, 'Vaija', '2016-03-03 22:44:18', 'admin', 'ninguno', 'Reflexiones', 'noexiste666', '/uploads/fotos/paisaje1.jpg'),
(41, 'Viajando a la Polinesia', '2016-03-03 22:59:01', 'admin', 'ninguno', 'Viajes', 'noexiste666', '/uploads/fotos/paisaje2.jpg'),
(42, 'Mi barca yo tenia una', '2016-03-03 22:59:35', 'admin', 'ninguno', 'Reflexiones', 'noexiste666', '/uploads/fotos/paisaje3.jpg'),
(44, 'Se parece a Asturias que verde esta todo', '2016-03-03 23:11:00', 'admin', 'ninguno', 'Reflexiones', 'noexiste666', '/uploads/fotos/paisaje4.jpg'),
(45, 'El gran lago un sitio para perderse', '2016-03-03 23:12:08', 'admin', 'ninguno', 'Viajes', 'noexiste666', '/uploads/fotos/paisaje5.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL,
  `login` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `pass` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `login`, `pass`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
