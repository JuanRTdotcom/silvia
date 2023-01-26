-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-08-2022 a las 21:57:11
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `monkeypox`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `animales_contacto`
--

CREATE TABLE `animales_contacto` (
  `id` tinyint(4) NOT NULL,
  `perro` tinyint(4) NOT NULL,
  `gato` tinyint(4) NOT NULL,
  `mono` tinyint(4) NOT NULL,
  `ave` tinyint(4) NOT NULL,
  `roedores` tinyint(4) NOT NULL,
  `otros` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `casos`
--

CREATE TABLE `casos` (
  `id` int(11) NOT NULL,
  `fecha_not` date DEFAULT NULL,
  `e_salud` varchar(10) NOT NULL,
  `clasificacion` int(11) DEFAULT NULL,
  `fecha_dia` date NOT NULL,
  `cerits` varchar(45) DEFAULT NULL,
  `semana` int(11) DEFAULT NULL,
  `tipo_doc` int(11) NOT NULL,
  `documento` varchar(25) NOT NULL,
  `apepat` varchar(45) DEFAULT NULL,
  `apemat` varchar(45) DEFAULT NULL,
  `nombres` varchar(45) DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `tipo_edad` int(11) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `sexo` int(11) DEFAULT NULL,
  `etnia` varchar(2) DEFAULT NULL,
  `pueblo_etnico` varchar(2) DEFAULT NULL,
  `otro_etnia` varchar(80) DEFAULT NULL,
  `pob_especifica` int(11) DEFAULT NULL,
  `otro_pob_especifica` varchar(50) NOT NULL,
  `orientacion` int(11) DEFAULT NULL,
  `otro_orientacion` varchar(45) NOT NULL,
  `trabajo_sexual` int(11) DEFAULT NULL,
  `pais` varchar(3) DEFAULT NULL,
  `ubigeo` varchar(6) DEFAULT NULL,
  `tipo_via` int(11) DEFAULT NULL,
  `nombre_via` varchar(100) DEFAULT NULL,
  `puerta` int(11) DEFAULT NULL,
  `agrupamiento` int(11) DEFAULT NULL,
  `nombre_agru` varchar(100) DEFAULT NULL,
  `manzana` varchar(5) DEFAULT NULL,
  `block` varchar(5) DEFAULT NULL,
  `interior` varchar(5) DEFAULT NULL,
  `kilometro` decimal(5,2) DEFAULT NULL,
  `lote` varchar(5) DEFAULT NULL,
  `referencia` varchar(100) DEFAULT NULL,
  `tiempo_residencia` varchar(100) NOT NULL,
  `celular` varchar(10) DEFAULT NULL,
  `nacionalidad` varchar(3) DEFAULT NULL,
  `embarazo` int(11) DEFAULT NULL,
  `nro_semanas_embarazo` int(11) DEFAULT NULL,
  `inmunodeprimido` int(11) DEFAULT NULL,
  `estado_inm` int(11) DEFAULT NULL,
  `vih` int(11) DEFAULT NULL,
  `estado_ser` int(11) DEFAULT NULL,
  `cd4` int(11) DEFAULT NULL,
  `vacuna` int(11) DEFAULT NULL,
  `infecciones` int(11) DEFAULT NULL,
  `fecha_ini` date DEFAULT NULL,
  `semana_epi` int(11) DEFAULT NULL,
  `fecha_exa` date DEFAULT NULL,
  `severidad` int(11) DEFAULT NULL,
  `hospitalizado` int(11) DEFAULT NULL,
  `ingreso_hos` date DEFAULT NULL,
  `alta_hos` date DEFAULT NULL,
  `hospital_hos` varchar(10) DEFAULT NULL,
  `uci` int(11) DEFAULT NULL,
  `ingreso_uci` date DEFAULT NULL,
  `alta_uci` date DEFAULT NULL,
  `hospital_uci` varchar(10) DEFAULT NULL,
  `defuncion` int(11) DEFAULT NULL,
  `fecha_def` date DEFAULT NULL,
  `lugar` varchar(45) DEFAULT NULL,
  `contactos` int(11) DEFAULT NULL,
  `parejas` int(11) DEFAULT NULL,
  `cuantos` int(11) DEFAULT NULL,
  `animales` int(11) DEFAULT NULL,
  `animal` int(11) DEFAULT NULL,
  `animal_otro` varchar(45) DEFAULT NULL,
  `viaje` int(11) DEFAULT NULL,
  `tipo_con` int(11) DEFAULT NULL,
  `observaciones` mediumtext,
  `investigador` varchar(45) DEFAULT NULL,
  `cargo` varchar(45) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `parejas_sexuales` int(11) NOT NULL,
  `domiciliarios` int(11) NOT NULL,
  `extradomiciliarios` int(11) NOT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `usuario_reg` varchar(10) DEFAULT NULL,
  `fecha_reg` datetime DEFAULT NULL,
  `usuario_mod` varchar(10) DEFAULT NULL,
  `fecha_mod` datetime DEFAULT NULL,
  `usuario_eli` varchar(10) DEFAULT NULL,
  `fecha_eli` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `casos`
--

INSERT INTO `casos` (`id`, `fecha_not`, `e_salud`, `clasificacion`, `fecha_dia`, `cerits`, `semana`, `tipo_doc`, `documento`, `apepat`, `apemat`, `nombres`, `fecha_nac`, `tipo_edad`, `edad`, `sexo`, `etnia`, `pueblo_etnico`, `otro_etnia`, `pob_especifica`, `otro_pob_especifica`, `orientacion`, `otro_orientacion`, `trabajo_sexual`, `pais`, `ubigeo`, `tipo_via`, `nombre_via`, `puerta`, `agrupamiento`, `nombre_agru`, `manzana`, `block`, `interior`, `kilometro`, `lote`, `referencia`, `tiempo_residencia`, `celular`, `nacionalidad`, `embarazo`, `nro_semanas_embarazo`, `inmunodeprimido`, `estado_inm`, `vih`, `estado_ser`, `cd4`, `vacuna`, `infecciones`, `fecha_ini`, `semana_epi`, `fecha_exa`, `severidad`, `hospitalizado`, `ingreso_hos`, `alta_hos`, `hospital_hos`, `uci`, `ingreso_uci`, `alta_uci`, `hospital_uci`, `defuncion`, `fecha_def`, `lugar`, `contactos`, `parejas`, `cuantos`, `animales`, `animal`, `animal_otro`, `viaje`, `tipo_con`, `observaciones`, `investigador`, `cargo`, `telefono`, `parejas_sexuales`, `domiciliarios`, `extradomiciliarios`, `estado`, `usuario_reg`, `fecha_reg`, `usuario_mod`, `fecha_mod`, `usuario_eli`, `fecha_eli`) VALUES
(1, '2022-08-02', '', NULL, '0000-00-00', NULL, 23, 0, '', 'RUIZ', 'TRUJILLO', 'JUAN VICTOR', NULL, 4, 25, 9, NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, '2022-08-02', '', NULL, '0000-00-00', NULL, 23, 0, '', 'RUIZ', 'TRUJILLO', 'JUAN VICTOR', NULL, 4, 25, 9, NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, '2022-08-02', '', NULL, '0000-00-00', NULL, 23, 0, '', 'RUIZ', 'TRUJILLO', 'JUAN VICTOR', NULL, 4, 24, 9, NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, '2022-08-02', '', NULL, '0000-00-00', NULL, 12, 0, '', 'RUIZ', 'TRUJILLO', 'JUAN VICTOR', NULL, 4, 13, 9, NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, '2022-08-02', '', NULL, '0000-00-00', NULL, 12, 0, '', 'RUIZ', 'TRUJILLO', 'JUAN VICTOR', NULL, 4, 25, 9, NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, '2022-08-02', '', NULL, '0000-00-00', NULL, 1, 77, '', 'CABRERA', 'MANDARIN', 'ALBERTO LUIS', NULL, 4, 25, 9, NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(7, '2022-08-02', '', NULL, '0000-00-00', NULL, 12, 0, '', 'LOPES', 'MENU', 'ALICIA MELISSA', NULL, 4, 25, 9, NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(8, '2022-08-02', '', NULL, '0000-00-00', NULL, 5, 81, '77878787', 'RUIZ', 'TRUJILLO', 'JUAN VICTOR', NULL, 4, 25, 10, NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `casos_estadio`
--

CREATE TABLE `casos_estadio` (
  `id` int(11) NOT NULL,
  `id_casos` int(11) NOT NULL,
  `macula` int(11) DEFAULT NULL,
  `papula` int(11) DEFAULT NULL,
  `vesicula` int(11) DEFAULT NULL,
  `pustula` int(11) DEFAULT NULL,
  `costra` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `casos_fisico`
--

CREATE TABLE `casos_fisico` (
  `id` int(11) NOT NULL,
  `id_casos` int(11) NOT NULL,
  `id_parte` int(11) NOT NULL,
  `enumerar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `casos_infecciones`
--

CREATE TABLE `casos_infecciones` (
  `id` int(11) NOT NULL,
  `id_casos` int(11) NOT NULL,
  `chlamidya` int(11) DEFAULT NULL,
  `gonorrea` int(11) DEFAULT NULL,
  `herpes` int(11) DEFAULT NULL,
  `sifilis` int(11) DEFAULT NULL,
  `mycoplasma` int(11) DEFAULT NULL,
  `trichonomas` int(11) DEFAULT NULL,
  `verrugas` int(11) DEFAULT NULL,
  `otro` int(11) DEFAULT NULL,
  `infeccion_otro` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `casos_previos`
--

CREATE TABLE `casos_previos` (
  `id` int(11) NOT NULL,
  `id_exantema` int(11) NOT NULL,
  `id_caso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `casos_signos`
--

CREATE TABLE `casos_signos` (
  `id` int(11) NOT NULL,
  `id_casos` int(11) NOT NULL,
  `cefalea` int(11) DEFAULT NULL,
  `mialgias` int(11) DEFAULT NULL,
  `espalda` int(11) DEFAULT NULL,
  `astenia` int(11) DEFAULT NULL,
  `fiebre` int(11) DEFAULT NULL,
  `linfadenopatia` int(11) DEFAULT NULL,
  `cutanea` int(11) DEFAULT NULL,
  `genital` int(11) DEFAULT NULL,
  `oral` int(11) DEFAULT NULL,
  `garganta` int(11) DEFAULT NULL,
  `conjuntivitis` int(11) DEFAULT NULL,
  `nauseas` int(11) DEFAULT NULL,
  `tos` int(11) DEFAULT NULL,
  `otros` int(11) DEFAULT NULL,
  `otro_signo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `casos_viajes`
--

CREATE TABLE `casos_viajes` (
  `id` int(11) NOT NULL,
  `id_casos` int(11) NOT NULL,
  `pais` varchar(3) DEFAULT NULL,
  `ciudad` varchar(45) DEFAULT NULL,
  `fecha_ini` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE `contactos` (
  `id` int(11) NOT NULL,
  `id_casos` int(11) NOT NULL,
  `apenom` varchar(70) DEFAULT NULL,
  `parentesco` varchar(45) DEFAULT NULL,
  `tipo_edad` int(11) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `direccion` varchar(70) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `sintomas` int(11) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `otro` varchar(45) DEFAULT NULL,
  `dni` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuerpo_humano`
--

CREATE TABLE `cuerpo_humano` (
  `id` int(11) NOT NULL,
  `parte` varchar(45) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cuerpo_humano`
--

INSERT INTO `cuerpo_humano` (`id`, `parte`, `estado`) VALUES
(1, 'Cabeza', 0),
(2, 'Cara', 1),
(3, 'Cuello', 0),
(4, 'Hombro derecho', 0),
(5, 'Hombro izquierdo', 0),
(6, 'Pecho derecho', 0),
(7, 'Pecho izquierdo', 0),
(8, 'Brazo derecho', 0),
(9, 'Brazo izquierdo', 0),
(10, 'Antebrazo derecho', 0),
(11, 'Antebrazo izquierdo', 0),
(12, 'Mano derecha', 0),
(13, 'Mano izquierda', 0),
(14, 'Pierna derecha', 0),
(15, 'Pierna izquierda', 0),
(16, 'Pantorrilla derecha', 0),
(17, 'Pantorrilla izquierda', 0),
(18, 'Pie derecho', 0),
(19, 'Pie izquierda', 0),
(20, 'Abdomen', 0),
(21, 'Genital/perianal', 1),
(22, 'Glúteos', 0),
(23, 'Espalda', 0),
(24, 'Oral ( boca,labios)', 1),
(25, 'Tórax, espalda', 1),
(26, 'Extremidades', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `laboratorio`
--

CREATE TABLE `laboratorio` (
  `id` int(11) NOT NULL,
  `id_casos` int(11) NOT NULL,
  `tipo_mue` int(11) DEFAULT NULL,
  `fecha_tom` date DEFAULT NULL,
  `fecha_res` date DEFAULT NULL,
  `resultado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lugar_contacto`
--

CREATE TABLE `lugar_contacto` (
  `id` int(11) NOT NULL,
  `id_caso` int(11) NOT NULL,
  `Fiesta` tinyint(4) NOT NULL,
  `Bar` tinyint(4) NOT NULL,
  `Casa` tinyint(4) NOT NULL,
  `Trabajo` tinyint(4) NOT NULL,
  `Sauna` tinyint(4) NOT NULL,
  `Club sexual` tinyint(4) NOT NULL,
  `EESS` tinyint(4) NOT NULL,
  `Otro` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opciones`
--

CREATE TABLE `opciones` (
  `id` int(11) NOT NULL,
  `id_pregunta` int(11) NOT NULL,
  `denominacion` varchar(45) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `opciones`
--

INSERT INTO `opciones` (`id`, `id_pregunta`, `denominacion`, `estado`) VALUES
(1, 1, 'PROBABLE', 1),
(2, 1, 'CONFIRMADO', 1),
(3, 1, 'DESCARTADO', 1),
(4, 2, 'AÑOS', 1),
(5, 2, 'MESES', 1),
(6, 2, 'DIAS', 1),
(9, 3, 'HOMBRE', 1),
(10, 3, 'MUJER', 1),
(11, 4, 'MASCULINO', 1),
(12, 4, 'FEMENINO', 1),
(13, 4, 'TRANSGENERO', 1),
(14, 4, 'DESCONOCIDO', 1),
(15, 4, 'OTRO', 1),
(16, 5, 'HETEROSEXUAL', 1),
(17, 5, 'HOMOSEXUAL', 1),
(18, 5, 'BISEXUAL', 1),
(19, 5, 'OTRO', 1),
(20, 6, 'SI', 1),
(21, 6, 'NO', 1),
(22, 7, 'SI', 1),
(23, 7, 'NO', 1),
(24, 7, 'DESCONOCIDO', 1),
(25, 8, '1er TRIMESTRE', 1),
(26, 8, '2do TRIMESTRE', 1),
(27, 8, '3er TRIMESTRE', 1),
(28, 8, 'PUERPERA', 1),
(29, 9, 'SI', 1),
(30, 9, 'NO', 1),
(31, 9, 'DESCONOCIDO', 1),
(32, 10, 'POR ENFERMEDAD', 1),
(33, 10, 'POR MEDICACION', 1),
(34, 10, 'RAZON DESCONOCIDA', 1),
(35, 11, 'POSITIVO', 1),
(36, 11, 'NEGATIVO', 1),
(37, 11, 'DESCONOCIDO', 1),
(38, 12, 'TAMIZAJE REACTIVO', 1),
(39, 12, 'CONFIRMADO POSITIVO', 1),
(40, 13, 'SI', 1),
(41, 13, 'NO', 1),
(42, 13, 'DESCONOCIDO', 1),
(43, 14, 'SI', 1),
(44, 14, 'NO', 1),
(45, 14, 'DESCONOCIDO', 1),
(46, 15, 'CASO LEVE', 1),
(47, 15, 'CASO MODERADO', 1),
(48, 15, 'CASO SEVERO', 1),
(49, 16, 'SI', 1),
(50, 16, 'NO', 1),
(51, 17, 'SI', 1),
(52, 17, 'NO', 1),
(53, 18, 'SI', 1),
(54, 18, 'NO', 1),
(55, 19, 'SI', 1),
(56, 19, 'NO', 1),
(57, 20, 'SI', 1),
(58, 20, 'NO', 1),
(59, 21, '1', 1),
(60, 21, '3', 1),
(61, 21, 'MAS DE 5', 1),
(62, 22, 'SI', 1),
(63, 22, 'NO', 1),
(64, 23, 'PERRO', 1),
(65, 23, 'GATO', 1),
(66, 23, 'ROEDOR', 1),
(67, 23, 'OTROS', 1),
(68, 24, 'SI', 1),
(69, 24, 'NO', 1),
(71, 25, 'RELACIONES SEXUALES CON SU PAREJA', 1),
(72, 25, 'RELACIONES C/DESCONOCIDOS O P/MULTIPLES', 1),
(73, 25, 'PERSONAS CON EXANTEMA', 1),
(74, 25, 'MATERIAL POTENCIALMENTE CONTAMINADO', 1),
(77, 30, 'DNI', 1),
(78, 30, 'CARNET DE EXTRANJERIA', 1),
(79, 30, 'PASAPORTE', 1),
(80, 30, 'SIN DOCUMENTO', 1),
(81, 30, 'CARNET DE REFUGIADO', 1),
(82, 30, 'CEDULA DE IDENTIDAD', 1),
(83, 30, 'PERMISO TEMPORAL DE RESIDENCIA', 1),
(86, 31, 'HSH', 1),
(87, 31, 'MUJER TRANSGENERO', 1),
(88, 31, 'TRABAJADOR(A) SEXUAL', 1),
(89, 31, 'OTRO', 1),
(90, 32, 'SI', 1),
(91, 32, 'NO', 1),
(92, 25, 'ATENDER CASOS DE VM SIN ADECUADO EPP', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta`
--

CREATE TABLE `pregunta` (
  `id` int(11) NOT NULL,
  `denominacion` varchar(100) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pregunta`
--

INSERT INTO `pregunta` (`id`, `denominacion`, `estado`) VALUES
(1, 'CLASIFICACION DEL CASO', 1),
(2, 'TIPO DE EDAD', 1),
(3, 'SEXO AL NACER', 1),
(4, 'IDENTIDAD DE GENERO', 1),
(5, 'ORIENTACION SEXUAL', 1),
(6, 'GESTANTE', 1),
(7, 'EMBARAZO', 1),
(8, 'ESTADO DE EMBARAZO', 1),
(9, 'INMUNODEPRIMIDO', 1),
(10, 'ESTADO INMUNODEPRIMIDO', 1),
(11, 'ESTADO SEROLOGICO', 1),
(12, 'ESTADO SEROLOGICO POSITIVO', 1),
(13, 'RECIBIO VACUNA CONTRA VIRUELA', 1),
(14, 'INFECCIONES PREVIAS', 1),
(15, 'SEVERIDAD DEL CUADRO CLINICO', 1),
(16, 'HOSPITALIZADO', 1),
(17, 'UCI', 1),
(18, 'DEFUNCION', 1),
(19, 'CONTACTO CON CASOS', 1),
(20, 'PAREJAS SEXUALES MULTIPLES', 1),
(21, 'CUANTOS', 1),
(22, 'ANIMALES DOMESTICOS O DE CRIANZA', 1),
(23, 'ANIMAL', 1),
(24, 'ANTECEDENTES DE VIAJE', 1),
(25, 'TIPO DE CONTACTO', 1),
(26, 'HISOPADO DE LESION DERMICA', 1),
(27, 'PIEL ESFACELADA O COSTRA', 1),
(28, 'HISOPADO NASOFARINGEO/OROFARINGEO', 1),
(29, 'SANGRE', 1),
(30, 'TIPO DE DOCUMENTO', 1),
(31, 'POBLACION ESPECIFICA', 1),
(32, 'VIAJO', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `animales_contacto`
--
ALTER TABLE `animales_contacto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `casos`
--
ALTER TABLE `casos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `casos_estadio`
--
ALTER TABLE `casos_estadio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_casos_estadio_casos1_idx` (`id_casos`);

--
-- Indices de la tabla `casos_fisico`
--
ALTER TABLE `casos_fisico`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_casos_fisico_casos1_idx` (`id_casos`),
  ADD KEY `fk_casos_fisico_cuerpo_humano1_idx` (`id_parte`);

--
-- Indices de la tabla `casos_infecciones`
--
ALTER TABLE `casos_infecciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_casos_infecciones_casos_idx` (`id_casos`);

--
-- Indices de la tabla `casos_previos`
--
ALTER TABLE `casos_previos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `casos_signos`
--
ALTER TABLE `casos_signos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_casos_signos_casos1_idx` (`id_casos`);

--
-- Indices de la tabla `casos_viajes`
--
ALTER TABLE `casos_viajes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_casos_viajes_casos1_idx` (`id_casos`);

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_contactos_casos1_idx` (`id_casos`);

--
-- Indices de la tabla `cuerpo_humano`
--
ALTER TABLE `cuerpo_humano`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `laboratorio`
--
ALTER TABLE `laboratorio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_laboratorio_casos1_idx` (`id_casos`);

--
-- Indices de la tabla `lugar_contacto`
--
ALTER TABLE `lugar_contacto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `opciones`
--
ALTER TABLE `opciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_opciones_pregunta1_idx` (`id_pregunta`);

--
-- Indices de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `animales_contacto`
--
ALTER TABLE `animales_contacto`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `casos`
--
ALTER TABLE `casos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `casos_estadio`
--
ALTER TABLE `casos_estadio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `casos_fisico`
--
ALTER TABLE `casos_fisico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `casos_infecciones`
--
ALTER TABLE `casos_infecciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `casos_previos`
--
ALTER TABLE `casos_previos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `casos_signos`
--
ALTER TABLE `casos_signos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `casos_viajes`
--
ALTER TABLE `casos_viajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cuerpo_humano`
--
ALTER TABLE `cuerpo_humano`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `laboratorio`
--
ALTER TABLE `laboratorio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lugar_contacto`
--
ALTER TABLE `lugar_contacto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `opciones`
--
ALTER TABLE `opciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `casos_estadio`
--
ALTER TABLE `casos_estadio`
  ADD CONSTRAINT `fk_casos_estadio_casos1` FOREIGN KEY (`id_casos`) REFERENCES `casos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `casos_fisico`
--
ALTER TABLE `casos_fisico`
  ADD CONSTRAINT `fk_casos_fisico_casos1` FOREIGN KEY (`id_casos`) REFERENCES `casos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_casos_fisico_cuerpo_humano1` FOREIGN KEY (`id_parte`) REFERENCES `cuerpo_humano` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `casos_infecciones`
--
ALTER TABLE `casos_infecciones`
  ADD CONSTRAINT `fk_casos_infecciones_casos` FOREIGN KEY (`id_casos`) REFERENCES `casos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `casos_signos`
--
ALTER TABLE `casos_signos`
  ADD CONSTRAINT `fk_casos_signos_casos1` FOREIGN KEY (`id_casos`) REFERENCES `casos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `casos_viajes`
--
ALTER TABLE `casos_viajes`
  ADD CONSTRAINT `fk_casos_viajes_casos1` FOREIGN KEY (`id_casos`) REFERENCES `casos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD CONSTRAINT `fk_contactos_casos1` FOREIGN KEY (`id_casos`) REFERENCES `casos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `laboratorio`
--
ALTER TABLE `laboratorio`
  ADD CONSTRAINT `fk_laboratorio_casos1` FOREIGN KEY (`id_casos`) REFERENCES `casos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `opciones`
--
ALTER TABLE `opciones`
  ADD CONSTRAINT `fk_opciones_pregunta1` FOREIGN KEY (`id_pregunta`) REFERENCES `pregunta` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
