-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 08-02-2017 a las 12:20:45
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
  `precio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `chuches`
--

INSERT INTO `chuches` (`id_chuche`, `id_categoria`, `nombre_chu`, `descripcion`, `img_chu`, `img1_chu`, `img2_chu`, `img3_chu`, `precio`) VALUES
(100, 1, 'BOLSITAS FINI FUN SURTIDO', 'SURTIDO 360 GRS 18 BOLSITAS APROX', '../imgchu/bolsitafini.jpg', NULL, NULL, NULL, 2.71),
(101, 2, 'CARAMELO ACIDO MANZANA', 'CARAMELO ACIDO MANZANA EL AVION\r\nBOLSA 1 KG (300 CARAMELOS APROX).', '../imgchu/acido-manzana-el-avion.jpg', '../imgchu/acido-manzana.jpg', NULL, NULL, 6.8),
(102, 3, 'CHOCO JUMBOS', 'NUBE GIGANTE CON CUBIERTA CHOCOLATE\r\nESTUCHE 24 NUBES FINI CUBIERTA CHOCOLATE', NULL, NULL, NULL, NULL, 7.84),
(103, 4, 'VARITAS MAGICAS LATA', 'LATA CON 150 PAJITAS PICA', NULL, NULL, NULL, NULL, 12.63),
(104, 5, 'REGALIZ GATOS XXL', 'ESTUCHE 40 UNIDADES', NULL, NULL, NULL, NULL, 6.46),
(105, 6, 'CHICLE DUBBLE CRY BABY', 'ESTUCHE 200 BOLAS CHICLE SUPER ACIDAS', NULL, NULL, NULL, NULL, 7.59),
(106, 7, 'GELATINA FRESA TARRINAS ZAMBA', 'TARRO 48 TARRINAS +CUCHARAS\r\n', NULL, NULL, NULL, NULL, 8.58),
(107, 8, 'PRINGLES TORTILLA ORIGINAL', 'BOTE 160 GRAMOS PRINGLES MAIZ', NULL, NULL, NULL, NULL, 2.6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `nombre` varchar(25) NOT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `apodo` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `contrasenia` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`nombre`, `apellidos`, `direccion`, `apodo`, `email`, `contrasenia`) VALUES
('admin', NULL, NULL, 'admin', NULL, '81dc9bdb52d04dc20036dbd8313ed055'),
('ana', 'meleiro sanchez', 'Sevilla', 'Ana', 'ana@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
('Carmen', 'Jimenez', 'calle san mario,Madrid', 'Carmen', 'carmen4516@correo.edu', '81dc9bdb52d04dc20036dbd8313ed055');

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
(2, 101, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(10) NOT NULL,
  `apodo` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `precio_total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id_pedido`, `apodo`, `fecha`, `precio_total`) VALUES
(2, 'Carmen', '2017-01-27', '13.60');

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
  ADD PRIMARY KEY (`id_chuche`,`id_categoria`),
  ADD UNIQUE KEY `id_chuche_3` (`id_chuche`),
  ADD KEY `id_chuche` (`id_chuche`),
  ADD KEY `id_chuche_2` (`id_chuche`),
  ADD KEY `id_chuche_4` (`id_chuche`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`apodo`);

--
-- Indices de la tabla `contiene`
--
ALTER TABLE `contiene`
  ADD PRIMARY KEY (`id_pedido`,`id_chuche`),
  ADD KEY `id_chuche` (`id_chuche`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`,`apodo`),
  ADD KEY `dni` (`apodo`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `chuches`
--
ALTER TABLE `chuches`
  ADD CONSTRAINT `chuches_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `contiene`
--
ALTER TABLE `contiene`
  ADD CONSTRAINT `contiene_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id_pedido`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contiene_ibfk_2` FOREIGN KEY (`id_chuche`) REFERENCES `chuches` (`id_chuche`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`apodo`) REFERENCES `cliente` (`apodo`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
