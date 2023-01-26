-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: mariadb-arvovirus
-- Tiempo de generación: 23-11-2022 a las 16:03:34
-- Versión del servidor: 10.2.44-MariaDB-1:10.2.44+maria~bionic
-- Versión de PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `colas`
--
CREATE DATABASE IF NOT EXISTS `colas` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `colas`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colas_querys_arbovirus`
--

DROP TABLE IF EXISTS `colas_querys_arbovirus`;
CREATE TABLE IF NOT EXISTS `colas_querys_arbovirus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vCodUsu` varchar(100) DEFAULT NULL,
  `vQry` text DEFAULT NULL,
  `cEstado` char(1) DEFAULT NULL,
  `fecReg` datetime DEFAULT NULL,
  `vProgreso` varchar(4) DEFAULT NULL,
  `vRuta` varchar(100) DEFAULT NULL,
  `vFiltros` text DEFAULT NULL,
  `tipo_descarga` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
