-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-09-2018 a las 00:38:37
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `citas_medicas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `idcita` int(11) NOT NULL,
  `fechacita` date NOT NULL,
  `motivocita` varchar(100) DEFAULT NULL,
  `descripcion` text,
  `resultadocita` text,
  `idpaciente` int(11) DEFAULT NULL,
  `sintomas` text,
  `enfermedadesprevias` text,
  `medicinastomadas` text,
  `idmedico` int(11) DEFAULT NULL,
  `idusuario` int(11) DEFAULT NULL,
  `montocita` double DEFAULT NULL,
  `idestadopago` int(11) NOT NULL DEFAULT '1',
  `idestadocita` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`idcita`, `fechacita`, `motivocita`, `descripcion`, `resultadocita`, `idpaciente`, `sintomas`, `enfermedadesprevias`, `medicinastomadas`, `idmedico`, `idusuario`, `montocita`, `idestadopago`, `idestadocita`) VALUES
(1, '2018-09-26', 'Dolor abdominal', NULL, NULL, 1, 'Fiebre, malestar estomacal', 'Apendicitis', NULL, 1, 1, 12000, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidades`
--

CREATE TABLE `especialidades` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `especialidades`
--

INSERT INTO `especialidades` (`id`, `descripcion`) VALUES
(1, 'Oncologia'),
(2, 'Urologia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadoscitas`
--

CREATE TABLE `estadoscitas` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estadoscitas`
--

INSERT INTO `estadoscitas` (`id`, `descripcion`) VALUES
(1, 'No Confirmada'),
(2, 'Cancelada'),
(3, 'En camino'),
(4, 'En Sala'),
(5, 'Visto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadosciviles`
--

CREATE TABLE `estadosciviles` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estadosciviles`
--

INSERT INTO `estadosciviles` (`id`, `descripcion`) VALUES
(1, 'Soltero'),
(2, 'Casado'),
(3, 'Union Libre'),
(4, 'Viudo'),
(5, 'Divorciado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadospagos`
--

CREATE TABLE `estadospagos` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estadospagos`
--

INSERT INTO `estadospagos` (`id`, `descripcion`) VALUES
(1, 'Pagado'),
(2, 'Pendiente'),
(3, 'Transito(Transferencia)');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicos`
--

CREATE TABLE `medicos` (
  `id` int(11) NOT NULL,
  `idtipodocumento` smallint(6) DEFAULT NULL,
  `documento` varchar(50) DEFAULT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `genero` varchar(1) DEFAULT NULL,
  `fechanacimiento` date DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `fechacreacion` datetime DEFAULT NULL,
  `idespecialidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `medicos`
--

INSERT INTO `medicos` (`id`, `idtipodocumento`, `documento`, `nombres`, `apellidos`, `genero`, `fechanacimiento`, `email`, `direccion`, `telefono`, `photo`, `activo`, `fechacreacion`, `idespecialidad`) VALUES
(1, 1, '3200555441', 'Pedro', 'Perez', 'M', '1981-09-05', 'pedrop@gmail.com', 'Crra 65', '3225371462', NULL, 1, '2018-09-25 00:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `id` int(11) NOT NULL,
  `idtipodocumento` smallint(6) DEFAULT NULL,
  `documento` varchar(50) DEFAULT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `genero` varchar(1) DEFAULT NULL,
  `fechanacimiento` date DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `enfermedadesprevias` varchar(500) DEFAULT NULL,
  `medicamentos` varchar(500) DEFAULT NULL,
  `alergias` varchar(500) DEFAULT NULL,
  `visitaprevia` tinyint(1) NOT NULL DEFAULT '1',
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `fecharegistro` datetime DEFAULT NULL,
  `ocupacion` varchar(100) DEFAULT NULL,
  `idestadocivil` smallint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id`, `idtipodocumento`, `documento`, `nombres`, `apellidos`, `genero`, `fechanacimiento`, `email`, `direccion`, `telefono`, `photo`, `enfermedadesprevias`, `medicamentos`, `alergias`, `visitaprevia`, `activo`, `fecharegistro`, `ocupacion`, `idestadocivil`) VALUES
(1, 2, '799282', 'Nelson ', 'Barraez', 'M', '1981-07-17', 'nelsonbarr@gmail.com', 'Crra 56', '3225371462', NULL, 'Apendicitis', NULL, 'MErthiolate', 0, 1, '2018-09-25 00:00:00', 'Empleado', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposdocumento`
--

CREATE TABLE `tiposdocumento` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tiposdocumento`
--

INSERT INTO `tiposdocumento` (`id`, `descripcion`) VALUES
(1, 'Cedula Ciudadania'),
(2, 'Cedula Extranjeria'),
(3, 'Pasaporte');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombreusuario` varchar(50) DEFAULT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `perfil` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombreusuario`, `nombres`, `apellidos`, `email`, `telefono`, `password`, `status`, `perfil`) VALUES
(2, 'nelsonbarr', 'Nelson', 'Barraez', 'nelsonbarr@gmail.com', '3225371462', '123', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`idcita`);

--
-- Indices de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estadoscitas`
--
ALTER TABLE `estadoscitas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estadosciviles`
--
ALTER TABLE `estadosciviles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indices de la tabla `estadospagos`
--
ALTER TABLE `estadospagos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tiposdocumento`
--
ALTER TABLE `tiposdocumento`
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
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `idcita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `estadoscitas`
--
ALTER TABLE `estadoscitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `estadosciviles`
--
ALTER TABLE `estadosciviles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `estadospagos`
--
ALTER TABLE `estadospagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `medicos`
--
ALTER TABLE `medicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tiposdocumento`
--
ALTER TABLE `tiposdocumento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
