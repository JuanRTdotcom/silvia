-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-01-2023 a las 23:52:56
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `silvia`
--
CREATE DATABASE IF NOT EXISTS `silvia` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `silvia`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `idCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `usuario_registra` int(11) NOT NULL,
  `fecha_registra` datetime NOT NULL DEFAULT current_timestamp(),
  `usuario_modifica` int(11) DEFAULT NULL,
  `fecha_modifica` datetime DEFAULT NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `descripcion`, `estado`, `usuario_registra`, `fecha_registra`, `usuario_modifica`, `fecha_modifica`) VALUES
(1, 'Excelente', 1, 1, '2023-01-18 11:37:36', NULL, NULL),
(2, 'Bueno', 1, 1, '2023-01-18 11:37:36', NULL, NULL),
(3, 'Medio', 1, 1, '2023-01-18 11:37:54', NULL, NULL),
(4, 'Malo', 1, 1, '2023-01-18 11:37:54', NULL, NULL),
(5, 'Deudor', 1, 1, '2023-01-18 11:39:32', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `idCliente` int(11) NOT NULL AUTO_INCREMENT,
  `fidCategoria` int(11) NOT NULL,
  `fidPersona` int(11) NOT NULL,
  `deuda` tinyint(1) NOT NULL DEFAULT 0,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `usuario_registra` int(11) NOT NULL,
  `fecha_registra` datetime NOT NULL DEFAULT current_timestamp(),
  `usuario_modifica` int(11) DEFAULT NULL,
  `fecha_modifica` datetime DEFAULT NULL,
  PRIMARY KEY (`idCliente`),
  KEY `fidCategoria` (`fidCategoria`),
  KEY `fidPersona` (`fidPersona`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idCliente`, `fidCategoria`, `fidPersona`, `deuda`, `estado`, `usuario_registra`, `fecha_registra`, `usuario_modifica`, `fecha_modifica`) VALUES
(1, 2, 3, 0, 0, 1, '2023-01-22 21:57:36', NULL, NULL),
(2, 2, 4, 0, 1, 1, '2023-01-23 00:25:21', NULL, NULL),
(3, 2, 5, 0, 1, 1, '2023-01-23 00:33:28', NULL, NULL),
(4, 2, 6, 0, 1, 1, '2023-01-23 00:41:15', NULL, NULL),
(5, 2, 7, 0, 0, 1, '2023-01-23 00:42:20', NULL, NULL),
(6, 2, 8, 0, 1, 1, '2023-01-23 00:48:01', 1, '2023-01-24 00:48:28'),
(12, 2, 9, 0, 0, 1, '2023-01-23 01:49:47', NULL, NULL),
(14, 2, 10, 0, 0, 1, '2023-01-23 18:22:20', NULL, NULL),
(15, 2, 11, 0, 1, 1, '2023-01-23 18:23:04', 1, '2023-01-24 00:14:17'),
(16, 2, 12, 0, 0, 1, '2023-01-23 22:28:06', NULL, NULL),
(17, 2, 13, 0, 1, 1, '2023-01-24 00:11:44', 1, '2023-01-24 00:12:18'),
(18, 2, 14, 0, 1, 1, '2023-01-24 00:18:50', 1, '2023-01-24 00:19:06'),
(19, 2, 15, 0, 1, 1, '2023-01-24 00:19:32', 1, '2023-01-24 00:50:19'),
(20, 2, 16, 0, 1, 1, '2023-01-24 00:20:13', NULL, NULL),
(21, 2, 17, 0, 0, 1, '2023-01-24 00:21:18', NULL, NULL),
(22, 2, 18, 0, 0, 1, '2023-01-24 00:44:09', NULL, NULL),
(23, 2, 19, 0, 0, 1, '2023-01-24 00:44:50', NULL, NULL),
(24, 2, 20, 0, 0, 1, '2023-01-24 00:45:40', NULL, NULL),
(25, 2, 21, 0, 0, 1, '2023-01-24 00:45:51', NULL, NULL),
(26, 2, 22, 0, 1, 1, '2023-01-24 09:09:32', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_venta`
--

DROP TABLE IF EXISTS `estado_venta`;
CREATE TABLE IF NOT EXISTS `estado_venta` (
  `idEstadoVenta` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `usuario_registra` int(11) NOT NULL,
  `fecha_registra` datetime NOT NULL DEFAULT current_timestamp(),
  `usuario_modifica` int(11) DEFAULT NULL,
  `fecha_modifica` datetime DEFAULT NULL,
  PRIMARY KEY (`idEstadoVenta`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estado_venta`
--

INSERT INTO `estado_venta` (`idEstadoVenta`, `descripcion`, `estado`, `usuario_registra`, `fecha_registra`, `usuario_modifica`, `fecha_modifica`) VALUES
(1, 'Completo', 1, 1, '2023-01-18 12:08:12', NULL, NULL),
(2, 'Deuda', 1, 1, '2023-01-18 12:08:12', NULL, NULL),
(3, 'En desarrollo', 0, 1, '2023-01-18 12:08:12', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foto_historial`
--

DROP TABLE IF EXISTS `foto_historial`;
CREATE TABLE IF NOT EXISTS `foto_historial` (
  `idFotoHistorial` int(11) NOT NULL AUTO_INCREMENT,
  `fidVentaDetalle` int(11) NOT NULL,
  `foto` text DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `usuario_registra` int(11) NOT NULL,
  `fecha_registra` datetime NOT NULL DEFAULT current_timestamp(),
  `usuario_modifica` int(11) DEFAULT NULL,
  `fecha_modifica` datetime DEFAULT NULL,
  PRIMARY KEY (`idFotoHistorial`),
  KEY `fidVentaDetalle` (`fidVentaDetalle`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_deudas`
--

DROP TABLE IF EXISTS `historial_deudas`;
CREATE TABLE IF NOT EXISTS `historial_deudas` (
  `idHistorialDeudas` int(11) NOT NULL AUTO_INCREMENT,
  `fidCliente` int(11) NOT NULL,
  `fidVenta` int(11) NOT NULL,
  `monto` double(10,2) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `usuario_registra` int(11) NOT NULL,
  `fecha_registra` datetime NOT NULL DEFAULT current_timestamp(),
  `usuario_modifica` int(11) DEFAULT NULL,
  `fecha_modifica` datetime DEFAULT NULL,
  PRIMARY KEY (`idHistorialDeudas`),
  KEY `fidCliente` (`fidCliente`),
  KEY `fidVenta` (`fidVenta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel_usuario`
--

DROP TABLE IF EXISTS `nivel_usuario`;
CREATE TABLE IF NOT EXISTS `nivel_usuario` (
  `idNivelUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(30) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `usuario_registra` int(11) NOT NULL,
  `fecha_registra` datetime NOT NULL DEFAULT current_timestamp(),
  `usuario_modifica` int(11) DEFAULT NULL,
  `fecha_modifica` datetime DEFAULT NULL,
  PRIMARY KEY (`idNivelUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `nivel_usuario`
--

INSERT INTO `nivel_usuario` (`idNivelUsuario`, `descripcion`, `estado`, `usuario_registra`, `fecha_registra`, `usuario_modifica`, `fecha_modifica`) VALUES
(1, 'Administrador', 1, 1, '2023-01-18 11:32:14', NULL, NULL),
(2, 'Empresa', 1, 1, '2023-01-18 11:32:51', NULL, NULL),
(3, 'Trabajador', 1, 1, '2023-01-18 11:33:40', NULL, NULL),
(4, 'Usuario', 1, 1, '2023-01-18 11:33:40', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

DROP TABLE IF EXISTS `persona`;
CREATE TABLE IF NOT EXISTS `persona` (
  `idPersona` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(100) DEFAULT NULL,
  `apellido_paterno` varchar(50) DEFAULT NULL,
  `apellido_materno` varchar(50) DEFAULT NULL,
  `nombre_completo` varchar(200) DEFAULT NULL,
  `sexo` tinytext NOT NULL DEFAULT 'M',
  `telefono1` varchar(15) DEFAULT NULL,
  `telefono2` varchar(15) DEFAULT NULL,
  `correo` varchar(40) DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `direccion` varchar(240) DEFAULT NULL,
  `dni` varchar(20) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `usuario_registra` int(11) NOT NULL,
  `fecha_registra` datetime NOT NULL DEFAULT current_timestamp(),
  `usuario_modifica` int(11) DEFAULT NULL,
  `fecha_modifica` datetime DEFAULT NULL,
  PRIMARY KEY (`idPersona`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idPersona`, `nombres`, `apellido_paterno`, `apellido_materno`, `nombre_completo`, `sexo`, `telefono1`, `telefono2`, `correo`, `foto`, `direccion`, `dni`, `fecha_nacimiento`, `edad`, `estado`, `usuario_registra`, `fecha_registra`, `usuario_modifica`, `fecha_modifica`) VALUES
(1, 'JUAN VICTOR', 'RUIZ', 'TRUJILLO', 'JUAN VICTOR RUIZ TRUJILLO', 'M', '960655272', NULL, 'jruizt96@gmail.com', NULL, 'Alfonso ugarte 353 - Moche', '77271360', NULL, NULL, 1, 1, '2023-01-18 12:12:23', NULL, NULL),
(2, 'SILVIA LILIANA', 'TRUJILLO', 'LECA', 'SILVIA LILIANA TRUJILLO LECA', 'M', '924987144', NULL, 'silvia_leca@hotmail.com', NULL, 'Alfonso ugarte 353 - Moche', '18012351', NULL, NULL, 1, 1, '2023-01-18 12:14:17', NULL, NULL),
(3, 'JUAN PRUEBA', 'RUIZ', 'TRUJILLO', 'JUAN PRUEBA RUIZ TRUJILLO', 'H', '960655272', '992025652', 'JRUIZT96@GMAIL.COM', 'upload/clientes/1674442655_696e28a9894af3125b52.jpg', 'MOCHE', '77271366', '1996-08-24', 24, 0, 1, '2023-01-22 21:57:36', NULL, NULL),
(4, 'alicia', 'marrufo', '', 'alicia marrufo ', 'M', '98987662', '', '', 'upload/clientes/1674451521_ae105828501511db9312.png', '', '', '0000-00-00', 54, 1, 1, '2023-01-23 00:25:21', NULL, NULL),
(5, 'alexis manuel', 'cabrera', 'cordoba', 'alexis manuel cabrera cordoba', 'H', '960655272', '', '', 'upload/clientes/1674452008_fe61b1d293103e1ef82b.jpg', '', '', '0000-00-00', 21, 1, 1, '2023-01-23 00:33:28', NULL, NULL),
(6, 'cecilia', 'romero', '', 'cecilia romero ', 'M', '94533856', '', '', 'upload/clientes/1674452475_299645d76ad9add5b189.jpg', '', '', '1969-08-22', 23, 1, 1, '2023-01-23 00:41:15', NULL, NULL),
(7, 'jaime', 'cavero', '', 'jaime cavero ', 'H', '', '', '', '', 'Moche', '', '0000-00-00', 18, 0, 1, '2023-01-23 00:42:20', NULL, NULL),
(8, 'lady', 'cross', 'romero', 'lady cross romero', 'M', '', '', '', 'upload/clientes/1674539308_c16abcff9b2777b2aeae.jpg', '', '', '0000-00-00', 13, 1, 1, '2023-01-23 00:48:01', 1, '2023-01-24 00:48:28'),
(9, 'anonimo', '', '', 'anonimo  ', 'H', '', '', '', '', '', '', '0000-00-00', NULL, 0, 1, '2023-01-23 01:49:47', NULL, NULL),
(10, 'juan victor', 'ruiz', 'trujillo', 'juan victor ruiz trujillo', 'H', '960655272', '', '', '', 'MOCHE', '77271360', '1996-08-24', 24, 0, 1, '2023-01-23 18:22:20', NULL, NULL),
(11, 'juan', 'ruiz', 'trujillo', 'juan ruiz trujillo', 'M', '960655272', '944304741', 'jruizt96@gmail.com', 'upload/clientes/1674536853_3ae6b849c9cf2c8580f4.jpg', 'MOCHE', '77271360', '1996-08-24', 26, 1, 1, '2023-01-23 18:23:04', 1, '2023-01-24 00:14:17'),
(12, 'asd', 'asd', 'asd', 'asd asd asd', 'H', '', '', '', '', '', '', '0000-00-00', NULL, 0, 1, '2023-01-23 22:28:06', NULL, NULL),
(13, 'anónimo', '', '', 'anónimo  ', 'H', '', '', '', '', '', '', '0000-00-00', NULL, 1, 1, '2023-01-24 00:11:44', 1, '2023-01-24 00:12:18'),
(14, 'la roca', '', '', 'la roca  ', 'H', '', '', '', 'upload/clientes/1674537546_d3eb28418fed0e67efd1.jpg', '', '', '0000-00-00', NULL, 1, 1, '2023-01-24 00:18:50', 1, '2023-01-24 00:19:06'),
(15, 'megan', 'fox', 'bbe', 'megan fox bbe', 'M', '992025652', '', 'megan@hotmail.com', 'upload/clientes/1674537572_fb67378980ea5d2aded0.jpg', 'HUANCHACO', '18022351', '2022-12-27', 30, 1, 1, '2023-01-24 00:19:32', 1, '2023-01-24 00:50:19'),
(16, 'thor', 'asgard', 'noe', 'thor asgard noe', 'H', '', '', '', 'upload/clientes/1674537613_d4ba133bb7ea8e03b0c7.jpg', '', '', '0000-00-00', NULL, 1, 1, '2023-01-24 00:20:13', NULL, NULL),
(17, 'nelly', 'cabrera', 'diaz', 'nelly cabrera diaz', 'M', '9896672', '', '', '', 'MOCHE', '', '0000-00-00', 67, 0, 1, '2023-01-24 00:21:18', NULL, NULL),
(18, 'jaime cris', 'asd', '', 'jaime cris asd ', 'H', '', '', '', '', '', '', '0000-00-00', NULL, 0, 1, '2023-01-24 00:44:09', NULL, NULL),
(19, 'asd', 'asd', 'asd', 'asd asd asd', 'H', '', '', '', '', '', '', '0000-00-00', NULL, 0, 1, '2023-01-24 00:44:50', NULL, NULL),
(20, 'ddd', 'aaa', '', 'ddd aaa ', 'H', '', '', '', '', '', '', '0000-00-00', NULL, 0, 1, '2023-01-24 00:45:40', NULL, NULL),
(21, 'bbbb', 'bbb', '', 'bbbb bbb ', 'H', '', '', '', '', '', '', '0000-00-00', NULL, 0, 1, '2023-01-24 00:45:51', NULL, NULL),
(22, 'gloglo', 'king', '', 'gloglo king ', 'H', '987987564', '', '', 'upload/clientes/1674569372_074998be8b7238d51e53.jpg', '', '', '2023-01-02', 24, 1, 1, '2023-01-24 09:09:32', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

DROP TABLE IF EXISTS `servicio`;
CREATE TABLE IF NOT EXISTS `servicio` (
  `idServicio` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  `detalle` varchar(200) DEFAULT NULL,
  `monto_sugerido` decimal(10,2) DEFAULT 0.00,
  `foto` text DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `usuario_registra` int(11) NOT NULL,
  `fecha_registra` datetime NOT NULL DEFAULT current_timestamp(),
  `usuario_modifica` int(11) DEFAULT NULL,
  `fecha_modifica` datetime DEFAULT NULL,
  PRIMARY KEY (`idServicio`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`idServicio`, `descripcion`, `detalle`, `monto_sugerido`, `foto`, `estado`, `usuario_registra`, `fecha_registra`, `usuario_modifica`, `fecha_modifica`) VALUES
(13, 'Peinado', '', '25.00', 'upload/servicios/1674254674_8fd2dc74dec26c39b534.jpg', 1, 1, '2023-01-20 17:44:34', NULL, NULL),
(14, 'Corte', '', '7.00', 'upload/servicios/1674281269_034bc66ef479e50c368f.jpg', 1, 1, '2023-01-20 17:49:11', 1, '2023-01-21 11:05:49'),
(15, 'Maquillaje', '', '15.00', 'upload/servicios/1674255175_0e5553dce902342163a8.png', 1, 1, '2023-01-20 17:52:55', 1, '2023-01-21 01:51:56'),
(16, 'Manicure', '', '12.00', 'upload/servicios/1674255319_7c231f2d615fad93033d.jpg', 1, 1, '2023-01-20 17:55:19', NULL, NULL),
(17, 'Pedicure', 'hola', '15.00', '', 0, 1, '2023-01-20 17:56:05', 1, '2023-01-21 00:46:26'),
(18, 'Pestañas', '', '8.00', 'upload/servicios/1674255457_24a017160ee93bdace6e.jpg', 0, 1, '2023-01-20 17:57:37', NULL, NULL),
(19, 'Tinturado de cabello', '', '20.00', 'upload/servicios/1674255556_4412038532f5259c9e75.jpeg', 0, 1, '2023-01-20 17:59:16', NULL, NULL),
(20, 'asdsa', 'asdas', '21.00', 'upload/servicios/1674268863_9ed8d8be641a4737d3bd.jpg', 0, 1, '2023-01-20 21:41:03', NULL, NULL),
(21, 'Caballero', '', '12.00', 'upload/servicios/1674278452_24c392b1b93d9f43ebf7.jpg', 0, 1, '2023-01-21 00:20:52', NULL, NULL),
(22, 'ojos', '', '122.00', 'upload/servicios/1674278527_79d76deba901d922ebaf.jpg', 0, 1, '2023-01-21 00:22:07', NULL, NULL),
(23, 'Pedicure', '', '9.00', 'upload/servicios/1674280067_3ce17f442dff1ec2afd8.jpeg', 1, 1, '2023-01-21 00:47:47', 1, '2023-01-21 03:32:42'),
(24, 'Tinte', '', '25.00', 'upload/servicios/1674281286_ad43f5d68d0e9309c93d.jpeg', 1, 1, '2023-01-21 01:08:06', NULL, NULL),
(25, 'Juan', 'Juan Victor Ruiz Trujillo', '3.00', 'upload/servicios/1674287344_bc35fa1572a8d1ce8a34.jpg', 0, 1, '2023-01-21 02:49:04', 1, '2023-01-21 02:49:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(25) NOT NULL,
  `clave` varchar(25) NOT NULL,
  `fidNivel` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `usuario_registra` int(11) NOT NULL,
  `fecha_registra` datetime NOT NULL DEFAULT current_timestamp(),
  `usuario_modifica` int(11) DEFAULT NULL,
  `fecha_modifica` datetime DEFAULT NULL,
  PRIMARY KEY (`idUsuario`),
  KEY `fidNivel` (`fidNivel`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `usuario`, `clave`, `fidNivel`, `estado`, `usuario_registra`, `fecha_registra`, `usuario_modifica`, `fecha_modifica`) VALUES
(1, '77271360', 'root', 1, 1, 1, '2023-01-18 12:10:37', NULL, NULL),
(2, '18012351', 'Trujillo852', 2, 1, 1, '2023-01-18 12:11:08', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_persona`
--

DROP TABLE IF EXISTS `usuario_persona`;
CREATE TABLE IF NOT EXISTS `usuario_persona` (
  `idUsuarioPersona` int(11) NOT NULL AUTO_INCREMENT,
  `fidUsuario` int(11) NOT NULL,
  `fidPersona` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `usuario_registra` int(11) NOT NULL,
  `fecha_registra` datetime NOT NULL DEFAULT current_timestamp(),
  `usuario_modifica` int(11) DEFAULT NULL,
  `fecha_modifica` datetime DEFAULT NULL,
  PRIMARY KEY (`idUsuarioPersona`),
  KEY `fidUsuario` (`fidUsuario`),
  KEY `fidPersona` (`fidPersona`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario_persona`
--

INSERT INTO `usuario_persona` (`idUsuarioPersona`, `fidUsuario`, `fidPersona`, `estado`, `usuario_registra`, `fecha_registra`, `usuario_modifica`, `fecha_modifica`) VALUES
(1, 1, 1, 1, 1, '2023-01-18 12:15:27', NULL, NULL),
(2, 2, 2, 1, 1, '2023-01-18 12:15:35', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

DROP TABLE IF EXISTS `venta`;
CREATE TABLE IF NOT EXISTS `venta` (
  `idVenta` int(11) NOT NULL AUTO_INCREMENT,
  `fidCliente` int(11) NOT NULL,
  `fidEstadoVenta` int(11) NOT NULL,
  `fechaVenta` datetime DEFAULT current_timestamp(),
  `descripcion` text DEFAULT NULL,
  `subtotal` decimal(10,2) DEFAULT 0.00,
  `deuda` decimal(10,2) DEFAULT 0.00,
  `saldo` decimal(10,2) DEFAULT 0.00,
  `total` decimal(10,2) DEFAULT 0.00,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `usuario_registra` int(11) NOT NULL,
  `fecha_registra` datetime NOT NULL DEFAULT current_timestamp(),
  `usuario_modifica` int(11) DEFAULT NULL,
  `fecha_modifica` datetime DEFAULT NULL,
  PRIMARY KEY (`idVenta`),
  KEY `fidCliente` (`fidCliente`),
  KEY `fidEstadoVenta` (`fidEstadoVenta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta_detalle`
--

DROP TABLE IF EXISTS `venta_detalle`;
CREATE TABLE IF NOT EXISTS `venta_detalle` (
  `idVentaDetalle` int(11) NOT NULL AUTO_INCREMENT,
  `fidVenta` int(11) NOT NULL,
  `fidServicio` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL DEFAULT 0,
  `precio` decimal(10,2) NOT NULL DEFAULT 0.00,
  `total` decimal(10,2) NOT NULL DEFAULT 0.00,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `usuario_registra` int(11) NOT NULL,
  `fecha_registro` datetime NOT NULL DEFAULT current_timestamp(),
  `usuario_modifica` int(11) DEFAULT NULL,
  `fecha_modifica` datetime DEFAULT NULL,
  PRIMARY KEY (`idVentaDetalle`),
  KEY `fidVenta` (`fidVenta`),
  KEY `fidServicio` (`fidServicio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `categoria_cliente` FOREIGN KEY (`fidCategoria`) REFERENCES `categoria` (`idCategoria`) ON UPDATE CASCADE,
  ADD CONSTRAINT `categoria_persona` FOREIGN KEY (`fidPersona`) REFERENCES `persona` (`idPersona`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `foto_historial`
--
ALTER TABLE `foto_historial`
  ADD CONSTRAINT `fotohistorial_ventadetalle` FOREIGN KEY (`fidVentaDetalle`) REFERENCES `venta_detalle` (`idventaDetalle`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `historial_deudas`
--
ALTER TABLE `historial_deudas`
  ADD CONSTRAINT `historialdeudas_cliente` FOREIGN KEY (`fidCliente`) REFERENCES `cliente` (`idCliente`) ON UPDATE CASCADE,
  ADD CONSTRAINT `historialdeudas_ventas` FOREIGN KEY (`fidVenta`) REFERENCES `venta` (`idVenta`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `nivel_usaurio` FOREIGN KEY (`fidNivel`) REFERENCES `nivel_usuario` (`idNivelUsuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario_persona`
--
ALTER TABLE `usuario_persona`
  ADD CONSTRAINT `usuariopersona_persona` FOREIGN KEY (`fidPersona`) REFERENCES `persona` (`idPersona`) ON UPDATE CASCADE,
  ADD CONSTRAINT `usuariopersona_usuario` FOREIGN KEY (`fidUsuario`) REFERENCES `usuario` (`idusuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_cliente` FOREIGN KEY (`fidCliente`) REFERENCES `cliente` (`idCliente`) ON UPDATE CASCADE,
  ADD CONSTRAINT `venta_estadoventa` FOREIGN KEY (`fidEstadoVenta`) REFERENCES `estado_venta` (`idEstadoVenta`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `venta_detalle`
--
ALTER TABLE `venta_detalle`
  ADD CONSTRAINT `ventadetalle_servicio` FOREIGN KEY (`fidServicio`) REFERENCES `servicio` (`idServicio`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ventadetallle_venta` FOREIGN KEY (`fidVenta`) REFERENCES `venta` (`idVenta`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
