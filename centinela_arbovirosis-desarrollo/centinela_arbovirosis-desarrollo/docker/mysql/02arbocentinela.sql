-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: mariadb-arvovirus
-- Tiempo de generación: 23-11-2022 a las 16:06:37
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
-- Base de datos: `arbocentinela`
--
CREATE DATABASE IF NOT EXISTS `arbocentinela` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `arbocentinela`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `arbocenti`
--

DROP TABLE IF EXISTS `arbocenti`;
CREATE TABLE IF NOT EXISTS `arbocenti` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `diresa` varchar(2) NOT NULL,
  `e_salud` varchar(10) NOT NULL,
  `laboratorio_res` varchar(45) NOT NULL,
  `epidemio_res` varchar(45) NOT NULL,
  `fecha_not` date NOT NULL,
  `anio` varchar(4) NOT NULL,
  `semana` varchar(2) NOT NULL,
  `fecha_fie` date DEFAULT NULL,
  `fecha_mue` date DEFAULT NULL,
  `dni` varchar(10) NOT NULL,
  `apepat` varchar(30) NOT NULL,
  `apemat` varchar(30) NOT NULL,
  `nombres` varchar(45) NOT NULL,
  `edad` int(3) UNSIGNED NOT NULL,
  `tipo_edad` varchar(1) NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `direccion` varchar(70) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `fiebre` tinyint(1) UNSIGNED DEFAULT NULL,
  `rash` tinyint(1) UNSIGNED DEFAULT NULL,
  `conjuntivitis` tinyint(1) UNSIGNED DEFAULT NULL,
  `artralgia` tinyint(11) NOT NULL DEFAULT 0,
  `mialgia` tinyint(4) NOT NULL DEFAULT 0,
  `negativa` tinyint(1) DEFAULT NULL,
  `observaciones` mediumtext DEFAULT NULL,
  `gestante` tinyint(1) DEFAULT NULL,
  `evaluacion_paciente` int(11) NOT NULL,
  `area_captacion` int(11) NOT NULL,
  `diagnostico_captacion` varchar(300) NOT NULL,
  `pais` varchar(11) NOT NULL,
  `departamento` varchar(11) NOT NULL,
  `provincia` varchar(11) NOT NULL,
  `distrito` varchar(11) NOT NULL,
  `localidad` varchar(100) NOT NULL,
  `tipo_zona` int(11) NOT NULL,
  `direccion_tipo_via` int(11) NOT NULL,
  `direccion_nombre_via` varchar(100) NOT NULL,
  `direccion_numero_puerta` varchar(50) NOT NULL,
  `direccion_numero_manzana` varchar(50) NOT NULL,
  `direccion_lote` varchar(50) NOT NULL,
  `direccion_tipo_asociacion` int(11) NOT NULL,
  `direccion_nombre_asociacion` varchar(100) NOT NULL,
  `otros` int(11) NOT NULL,
  `otros_nombre` varchar(100) NOT NULL,
  `fecha_reg` date NOT NULL,
  `usuario_reg` varchar(10) NOT NULL,
  `fecha_mod` datetime DEFAULT NULL,
  `usuario_mod` varchar(10) DEFAULT NULL,
  `fecha_eli` datetime DEFAULT NULL,
  `usuario_eli` varchar(10) DEFAULT NULL,
  `eliminado` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=361 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `arbocenti_enf`
--

DROP TABLE IF EXISTS `arbocenti_enf`;
CREATE TABLE IF NOT EXISTS `arbocenti_enf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `denominacion` varchar(45) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `arbocenti_enf`
--

INSERT INTO `arbocenti_enf` (`id`, `denominacion`, `estado`) VALUES
(1, 'Dengue', 1),
(6, 'Zika', 1),
(7, 'Chikungunya', 1),
(8, 'Oropuche', 1),
(9, 'Mayaro', 1),
(10, 'Fiebre Amarilla', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `arbocenti_lab`
--

DROP TABLE IF EXISTS `arbocenti_lab`;
CREATE TABLE IF NOT EXISTS `arbocenti_lab` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `paciente` int(11) NOT NULL,
  `muestra` varchar(15) DEFAULT NULL,
  `enfermedad` int(11) NOT NULL,
  `prueba` int(11) NOT NULL,
  `serotipo` int(11) DEFAULT NULL,
  `resultado` int(11) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `fecha_res` varchar(20) DEFAULT NULL,
  `dtRecepcionLRR` varchar(20) DEFAULT NULL,
  `bEnvioIns` tinyint(4) NOT NULL,
  `dtFechaEnvioINS` varchar(20) DEFAULT NULL,
  `dtRecepcionINS` varchar(20) DEFAULT NULL,
  `fecha_reg` datetime NOT NULL,
  `usuario_reg` varchar(10) NOT NULL,
  `fecha_mod` datetime DEFAULT NULL,
  `usuario_mod` varchar(10) DEFAULT NULL,
  `fecha_eli` datetime DEFAULT NULL,
  `usuario_eli` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=604 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `arbocenti_pru`
--

DROP TABLE IF EXISTS `arbocenti_pru`;
CREATE TABLE IF NOT EXISTS `arbocenti_pru` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `enfermedad` int(11) NOT NULL,
  `denominacion` varchar(45) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `arbocenti_pru`
--

INSERT INTO `arbocenti_pru` (`id`, `enfermedad`, `denominacion`, `estado`) VALUES
(1, 1, 'Aislamiento y tipificación viral', 1),
(2, 1, 'Diagnóstico molecular', 1),
(3, 1, 'Elisa NS1', 1),
(4, 1, 'qRT PCR tiempo real', 1),
(5, 1, 'Elisa de IGM', 1),
(6, 1, 'Elisa de captura IGA', 1),
(7, 1, 'Elisa de captura IGG', 1),
(8, 1, 'Imunocromatográfica IgG', 1),
(9, 1, 'Inmunocromatográfica IgM', 1),
(10, 1, 'Inmunocromatográfica NS1', 1),
(51, 6, 'Aislamiento y tipificación viral', 1),
(52, 6, 'Elisa IgG', 1),
(53, 6, 'Elisa IgM', 1),
(54, 6, 'RT-PCR Suero', 1),
(55, 7, 'Aislamiento y tipificación viral', 1),
(56, 7, 'RT-PCR ', 1),
(57, 7, 'Elisa IgG', 1),
(58, 7, 'Elisa IgM', 1),
(59, 8, 'Aislamiento y tipificación viral', 1),
(60, 8, 'Elisa IgM', 1),
(61, 8, 'Elisa IgG', 1),
(62, 8, 'PCR ', 1),
(63, 8, 'RT-PCR ', 1),
(64, 9, 'Aislamiento y tipificación viral', 1),
(65, 9, 'Elisa IgM', 1),
(66, 9, 'Elisa IgG', 1),
(67, 9, 'PCR ', 1),
(68, 6, 'RT-PCR Orina', 1),
(69, 10, 'Aislamiento y tipificación viral', 1),
(70, 10, 'RT-PCR ', 1),
(71, 10, 'Elisa IgM', 1),
(72, 10, 'Elisa IgG', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `arbocenti_res`
--

DROP TABLE IF EXISTS `arbocenti_res`;
CREATE TABLE IF NOT EXISTS `arbocenti_res` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resultado` varchar(45) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `arbocenti_res`
--

INSERT INTO `arbocenti_res` (`id`, `resultado`, `estado`) VALUES
(1, 'Positivo', 1),
(2, 'Negativo', 1),
(3, 'Indeterminado', 1),
(4, 'Pendiente', 1),
(5, 'No se registra en el NETLAB', 1),
(6, 'Muestra perdida', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `arbocenti_ser`
--

DROP TABLE IF EXISTS `arbocenti_ser`;
CREATE TABLE IF NOT EXISTS `arbocenti_ser` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `enfermedad` int(11) NOT NULL,
  `prueba` int(11) DEFAULT NULL,
  `denominacion` varchar(30) NOT NULL,
  `estado` tinyint(1) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `arbocenti_ser`
--

INSERT INTO `arbocenti_ser` (`id`, `enfermedad`, `prueba`, `denominacion`, `estado`) VALUES
(1, 1, 1, 'Dengue 1', 1),
(2, 1, 1, 'Dengue 2', 1),
(3, 1, 1, 'Dengue 3', 1),
(4, 1, 1, 'Dengue 4', 1),
(5, 1, 2, 'Dengue 1', 1),
(6, 1, 2, 'Dengue 2', 1),
(7, 1, 2, 'Dengue 3', 1),
(8, 1, 2, 'Dengue 4', 1),
(9, 1, 4, 'Dengue 1', 1),
(10, 1, 4, 'Dengue 2', 1),
(11, 1, 4, 'Dengue 3', 1),
(12, 1, 4, 'Dengue 4', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area_captacion`
--

DROP TABLE IF EXISTS `area_captacion`;
CREATE TABLE IF NOT EXISTS `area_captacion` (
  `idAreaCaptacion` int(11) NOT NULL AUTO_INCREMENT,
  `cNombre` varchar(30) NOT NULL,
  `iEliminado` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`idAreaCaptacion`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `area_captacion`
--

INSERT INTO `area_captacion` (`idAreaCaptacion`, `cNombre`, `iEliminado`) VALUES
(1, 'Triaje', 0),
(2, 'Observación', 0),
(3, 'Hospitalización', 0),
(4, 'Consultorio', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacion_paciente`
--

DROP TABLE IF EXISTS `evaluacion_paciente`;
CREATE TABLE IF NOT EXISTS `evaluacion_paciente` (
  `idEvaluacionPaciente` int(11) NOT NULL AUTO_INCREMENT,
  `cNombre` varchar(30) NOT NULL,
  `iEliminado` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`idEvaluacionPaciente`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `evaluacion_paciente`
--

INSERT INTO `evaluacion_paciente` (`idEvaluacionPaciente`, `cNombre`, `iEliminado`) VALUES
(1, 'Hospitalizado', 0),
(2, 'Favorable', 0),
(3, 'Defunción', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_asociacion`
--

DROP TABLE IF EXISTS `tipo_asociacion`;
CREATE TABLE IF NOT EXISTS `tipo_asociacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `denominacion` varchar(50) NOT NULL,
  `eliminado` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_asociacion`
--

INSERT INTO `tipo_asociacion` (`id`, `denominacion`, `eliminado`) VALUES
(1, 'Grupo', 0),
(2, 'Urbanización', 0),
(3, 'Otros', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_zona`
--

DROP TABLE IF EXISTS `tipo_zona`;
CREATE TABLE IF NOT EXISTS `tipo_zona` (
  `idTipoZona` int(11) NOT NULL AUTO_INCREMENT,
  `cNombre` varchar(30) NOT NULL,
  `iEliminado` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`idTipoZona`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_zona`
--

INSERT INTO `tipo_zona` (`idTipoZona`, `cNombre`, `iEliminado`) VALUES
(1, 'Zona de Brote', 0),
(2, 'Zona Nueva', 0),
(3, 'Zona de Baja Transmisión', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
