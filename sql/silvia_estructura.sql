-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-01-2023 a las 23:52:35
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
