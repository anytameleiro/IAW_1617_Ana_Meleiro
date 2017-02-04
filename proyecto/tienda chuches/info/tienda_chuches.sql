-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 02-02-2017 a las 08:56:52
-- Versión del servidor: 5.7.17-0ubuntu0.16.04.1
-- Versión de PHP: 7.0.15-1+deb.sury.org~xenial+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda_chuches`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(10) NOT NULL,
  `nombre_cat` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `img_cat` varchar(150) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre_cat`, `img_cat`) VALUES
(1, 'Caramelos goma', 'http://recetas.cuidadoinfantil.net/files/2012/10/Receta-de-caramelos-de-goma-caseros-e1349678078285.jpg'),
(2, 'Caramelos', ''),
(3, 'Nubes', ''),
(4, 'Pica picas', ''),
(5, 'Regaliz', ''),
(6, 'Chicles', ''),
(7, 'Gelatinas', ''),
(8, 'Otros', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chuches`
--

CREATE TABLE `chuches` (
  `id_chuche` int(10) NOT NULL,
  `id_categoria` int(10) NOT NULL,
  `nombre_chu` varchar(50) NOT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `img_chu` varchar(150) CHARACTER SET latin1 DEFAULT NULL,
  `img1_chu` varchar(150) DEFAULT NULL,
  `img2_chu` varchar(150) DEFAULT NULL,
  `img3_chu` varchar(150) DEFAULT NULL,
  `img4_chu` varchar(150) DEFAULT NULL,
  `precio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `chuches`
--

INSERT INTO `chuches` (`id_chuche`, `id_categoria`, `nombre_chu`, `descripcion`, `img_chu`, `img1_chu`, `img2_chu`, `img3_chu`, `img4_chu`, `precio`) VALUES
(100, 1, 'BOLSITAS FINI FUN SURTIDO', 'SURTIDO 360 GRS 18 BOLSITAS APROX', 'https://www.chuchesonline.com/9418-thickbox_default/bolsitas-fini-fun-surtido.jpg', NULL, NULL, NULL, NULL, 2.72),
(101, 2, 'CARAMELO ACIDO MANZANA', 'CARAMELO ACIDO MANZANA EL AVION\r\nBOLSA 1 KG (300 CARAMELOS APROX).', 'https://www.chuchesonline.com/7723-thickbox_default/acido-manzana-el-avion.jpg', NULL, NULL, NULL, NULL, 6.8),
(102, 3, 'CHOCO JUMBOS', 'NUBE GIGANTE CON CUBIERTA CHOCOLATE\r\nESTUCHE 24 NUBES FINI CUBIERTA CHOCOLATE', 'https://www.chuchesonline.com/8965-thickbox_default/choco-jumbos-nube-gigante-cubierta-choco.jpg', NULL, NULL, NULL, NULL, 7.84),
(103, 4, 'VARITAS MAGICAS LATA', 'LATA CON 150 PAJITAS PICA', 'https://www.chuchesonline.com/7909-thickbox_default/varitas-magicas-lata.jpg', NULL, NULL, NULL, NULL, 12.63),
(104, 5, 'REGALIZ GATOS XXL', 'ESTUCHE 40 UNIDADES', 'https://www.chuchesonline.com/2572-thickbox_default/regaliz-gatos-xxl-40-uds.jpg', NULL, NULL, NULL, NULL, 6.46),
(105, 6, 'CHICLE DUBBLE CRY BABY', 'ESTUCHE 200 BOLAS CHICLE SUPER ACIDAS', 'https://www.chuchesonline.com/9558-thickbox_default/chicle-dubble-cry-baby.jpg', NULL, NULL, NULL, NULL, 7.59),
(106, 7, 'GELATINA FRESA TARRINAS ZAMBA', 'TARRO 48 TARRINAS +CUCHARAS\r\n', 'https://www.chuchesonline.com/8924-thickbox_default/gelatina-fresa-tarrinas-zamba.jpg', NULL, NULL, NULL, NULL, 8.58),
(107, 8, 'PRINGLES TORTILLA ORIGINAL', 'BOTE 160 GRAMOS PRINGLES MAIZ', 'https://www.chuchesonline.com/7098-thickbox_default/pringles-tortilla-original.jpg', NULL, NULL, NULL, NULL, 2.6),
(108, 8, 'ALGODON CANDY BICOLOR', 'ESTUCHE CON 6 TARROS', 'https://www.chuchesonline.com/4791-thickbox_default/algodon-candy-bicolor.jpg', NULL, NULL, NULL, NULL, 13.3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `nombre` varchar(25) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `dni` varchar(10) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `contrasenia` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`nombre`, `apellidos`, `direccion`, `dni`, `email`, `contrasenia`) VALUES
('admin', NULL, NULL, '11111111A', NULL, '81dc9bdb52d04dc20036dbd8313ed055'),
('Alejandro', 'Ramos', 'calle san jacinto,Sevilla', '44556120A', 'alejandroramos@correo.net', '81dc9bdb52d04dc20036dbd8313ed055'),
('Carmen', 'Jimenez', 'calle san mario,Madrid', '88546129G', 'carmen4516@correo.edu', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contiene`
--

CREATE TABLE `contiene` (
  `id_pedido` int(10) NOT NULL,
  `id_chuche` int(10) NOT NULL,
  `cantidad` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `contiene`
--

INSERT INTO `contiene` (`id_pedido`, `id_chuche`, `cantidad`) VALUES
(1, 100, 1),
(2, 101, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(10) NOT NULL,
  `dni` varchar(10) NOT NULL,
  `fecha` date NOT NULL,
  `precio_total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id_pedido`, `dni`, `fecha`, `precio_total`) VALUES
(1, '44556120A', '2017-01-11', '2.72'),
(2, '88546129G', '2017-01-27', '13.60');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `chuches`
--
ALTER TABLE `chuches`
  ADD PRIMARY KEY (`id_chuche`),
  ADD UNIQUE KEY `id_chuche_3` (`id_chuche`),
  ADD KEY `id_chuche` (`id_chuche`),
  ADD KEY `id_chuche_2` (`id_chuche`),
  ADD KEY `id_chuche_4` (`id_chuche`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`dni`);

--
-- Indices de la tabla `contiene`
--
ALTER TABLE `contiene`
  ADD PRIMARY KEY (`id_pedido`,`id_chuche`),
  ADD KEY `id_chuches` (`id_chuche`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `dni` (`dni`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD CONSTRAINT `categoria_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `chuches` (`id_categoria`);

--
-- Filtros para la tabla `contiene`
--
ALTER TABLE `contiene`
  ADD CONSTRAINT `contiene_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id_pedido`),
  ADD CONSTRAINT `contiene_ibfk_2` FOREIGN KEY (`id_chuche`) REFERENCES `chuches` (`id_chuche`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`dni`) REFERENCES `cliente` (`dni`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
