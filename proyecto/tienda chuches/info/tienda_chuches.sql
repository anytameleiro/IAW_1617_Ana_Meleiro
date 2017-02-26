-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 26-02-2017 a las 18:17:31
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
  `nombre_cat` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre_cat`) VALUES
(1, 'Gomitas'),
(2, 'Caramelos'),
(3, 'Nubes'),
(4, 'Pica picas'),
(5, 'Regaliz'),
(6, 'Chicles'),
(7, 'Gelatinas'),
(8, 'Otros');

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
  `precio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `chuches`
--

INSERT INTO `chuches` (`id_chuche`, `id_categoria`, `nombre_chu`, `descripcion`, `img_chu`, `precio`) VALUES
(100, 5, 'BOLSITAS FINI FUN SURTIDO', 'SURTIDO 360 GRS 18 BOLSITAS APROX\r\n', '../../imgchu/bolsitafini.jpg', 1.5),
(101, 2, 'CARAMELO ACIDO MANZANA', 'CARAMELO ACIDO MANZANA EL AVIONBOLSA 1 KG (300 CARAMELOS APROX).', '../../imgchu/acido-manzana-el-avion.jpg', 4.8),
(102, 3, 'CHOCO JUMBOS', 'NUBE GIGANTE CON CUBIERTA CHOCOLATEESTUCHE 24 NUBES FINI CUBIERTA CHOCOLATE', NULL, 7.83),
(103, 4, 'VARITAS MAGICAS LATA', 'LATA CON 150 PAJITAS PICA', NULL, 12.63),
(104, 5, 'REGALIZ GATOS XXL', 'ESTUCHE 40 UNIDADES', NULL, 6.46),
(105, 6, 'CHICLE DUBBLE CRY BABY', 'ESTUCHE 200 BOLAS CHICLE SUPER ACIDAS', NULL, 7.59),
(106, 7, 'GELATINA FRESA TARRINAS ZAMBA', 'TARRO 48 TARRINAS +CUCHARAS\r\n', NULL, 8.58),
(107, 8, 'PRINGLES TORTILLA ORIGINAL', 'BOTE 160 GRAMOS PRINGLES MAIZ', NULL, 2.6),
(108, 1, 'CHUCHE2', 'CHUCHE NUEVA2', '', 2.7),
(122, 2, 'bocaditos-nube-chocolate.jpg', 'sadadasdsad', '../../imgchu/bocaditos-nube-chocolate.jpg', 3),
(124, 6, 'gbnhfhf', 'ghi..', '../../imgchu/descarga.jpg', 7),
(126, 1, 'fw', 've', '../../imgchu/727501c81.jpg', 2),
(127, 1, 'bwnt', 'wrbwbrrwb', '../../imgchu/captura de pantalla_2017-02-15_22-29-02.png', 8);

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
('Carmen', 'Jimenez', 'calle san mario,Madrid', 'Carmen', 'carmen4516@corre.edu', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contiene`
--

CREATE TABLE `contiene` (
  `id_pedido` int(50) NOT NULL,
  `id_chuche` int(10) NOT NULL,
  `cantidad` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(50) NOT NULL,
  `apodo` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `precio_total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  ADD PRIMARY KEY (`apodo`),
  ADD UNIQUE KEY `apodo` (`apodo`);

--
-- Indices de la tabla `contiene`
--
ALTER TABLE `contiene`
  ADD PRIMARY KEY (`id_pedido`,`id_chuche`),
  ADD KEY `id_pedido` (`id_pedido`),
  ADD KEY `id_chuche` (`id_chuche`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`,`apodo`),
  ADD KEY `dni` (`apodo`),
  ADD KEY `id_pedido` (`id_pedido`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `chuches`
--
ALTER TABLE `chuches`
  MODIFY `id_chuche` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;
--
-- AUTO_INCREMENT de la tabla `contiene`
--
ALTER TABLE `contiene`
  MODIFY `id_pedido` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
  ADD CONSTRAINT `contiene_ibfk_4` FOREIGN KEY (`id_chuche`) REFERENCES `chuches` (`id_chuche`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contiene_ibfk_5` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id_pedido`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`apodo`) REFERENCES `cliente` (`apodo`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
