-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 15-07-2017 a las 10:57:27
-- Versión del servidor: 5.7.17-log
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_asistencia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(2) UNSIGNED ZEROFILL NOT NULL,
  `usuario_admin` varchar(30) DEFAULT NULL,
  `password_admin` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id_admin`, `usuario_admin`, `password_admin`) VALUES
(01, 'root', '63a9f0ea7bb98050796b649e85481845');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE `asistencia` (
  `cod_asistencia` int(10) NOT NULL,
  `cod_grupo_2587` int(7) UNSIGNED ZEROFILL DEFAULT NULL,
  `cod_estudiante_2587` int(6) UNSIGNED ZEROFILL DEFAULT NULL,
  `asistencia` enum('Asistencia','Falta') DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `asistencia`
--

INSERT INTO `asistencia` (`cod_asistencia`, `cod_grupo_2587`, `cod_estudiante_2587`, `asistencia`, `fecha`) VALUES
(1, 0000002, 000001, 'Asistencia', '2017-06-03'),
(2, 0000002, 000002, 'Asistencia', '2017-06-03'),
(3, 0000002, 000003, 'Asistencia', '2017-06-03'),
(4, 0000002, 000005, 'Asistencia', '2017-06-03'),
(5, 0000002, 000006, 'Asistencia', '2017-06-03'),
(6, 0000002, 000008, 'Asistencia', '2017-06-03'),
(7, 0000002, 000016, 'Falta', '2017-06-03'),
(8, 0000002, 000018, 'Asistencia', '2017-06-03'),
(9, 0000004, 000024, 'Asistencia', '2017-07-15'),
(10, 0000004, 000023, 'Asistencia', '2017-07-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `cod_carrera` int(3) UNSIGNED ZEROFILL NOT NULL,
  `sigla_carrera` varchar(20) DEFAULT NULL,
  `nombre_carrera` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`cod_carrera`, `sigla_carrera`, `nombre_carrera`) VALUES
(001, '187-4', 'INGENIERIA EN SISTEMAS'),
(002, '187-3', 'INGENIERIA INFORMATICA'),
(003, '187-5', 'INGENIERIA EN REDES Y TELECOMUNICACIONES'),
(004, '180-1', 'ADMINISTRACION DE EMPRESAS'),
(005, '180-2', 'CIENCIAS DE LA EDUCACION'),
(006, '180-3', 'ENFERMERIA'),
(007, '180-4', 'INGENIERIA AGROPECUARIA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera_materia`
--

CREATE TABLE `carrera_materia` (
  `cod_carrera_materia` int(8) UNSIGNED ZEROFILL NOT NULL,
  `cod_carrera_1122` int(3) UNSIGNED ZEROFILL DEFAULT NULL,
  `cod_materia_1122` int(4) UNSIGNED ZEROFILL DEFAULT NULL,
  `semestre` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `carrera_materia`
--

INSERT INTO `carrera_materia` (`cod_carrera_materia`, `cod_carrera_1122`, `cod_materia_1122`, `semestre`) VALUES
(00000002, 001, 0003, 'Semestre 1-2017'),
(00000003, 001, 0006, 'Semestre 1-2017'),
(00000004, 001, 0001, 'Semestre 1-2017');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `cod_estudiante` int(6) UNSIGNED ZEROFILL NOT NULL,
  `nombre_estudiante` varchar(100) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`cod_estudiante`, `nombre_estudiante`, `email`, `celular`, `fecha_nacimiento`, `direccion`) VALUES
(000001, 'ANZALDO ANZALDO DAVID', 'user@hotmail.com', '75391781', '2017-05-05', 'B/CARMEN'),
(000002, 'AOIZ CARBALLO ELIO', 'user@hotmail.com', '75391781', '2017-05-05', 'B/CARMEN'),
(000003, 'ARCE MENDUINA EDITH SONIA', 'user@hotmail.com', '75391781', '2017-05-05', 'B/CARMEN'),
(000004, 'BARBA DIAZ JOSE MILTON', 'user@hotmail.com', '75391781', '2017-05-05', 'B/CARMEN'),
(000005, 'BONILLA MORON GERARDO', 'user@hotmail.com', '75391781', '2017-05-05', 'B/CARMEN'),
(000006, 'FORONDA CASTRO JOSE', 'user@hotmail.com', '75391781', '2017-05-05', 'B/CARMEN'),
(000007, 'MEDINA COCA ULISES ELMER', 'user@hotmail.com', '75391781', '2017-05-05', 'B/CARMEN'),
(000008, 'MICHAGA SOLIZ MARTIN', 'user@hotmail.com', '75391781', '2017-05-05', 'B/CARMEN'),
(000009, 'MIRANDA PENA CARLOS', 'user@hotmail.com', '75391781', '2017-05-05', 'B/CARMEN'),
(000010, 'MOLINA AVILA RIDHER', 'user@hotmail.com', '75391781', '2017-05-05', 'B/CARMEN'),
(000011, 'MOSCOSO ZENTENO JOSE MANUEL', 'user@hotmail.com', '75391781', '2017-05-05', 'B/CARMEN'),
(000012, 'ROBLES CATARI IVETH BESCIE', 'user@hotmail.com', '75391781', '2017-05-05', 'B/CARMEN'),
(000013, 'RODRIGUEZ MARTINEZ OSCAR', 'user@hotmail.com', '75391781', '2017-05-05', 'B/CARMEN'),
(000014, 'SAAVEDRA AREVALO JOSE LUIS', 'user@hotmail.com', '75391781', '2017-05-05', 'B/CARMEN'),
(000015, 'USTAREZ MEDINA WILMAN', 'user@hotmail.com', '75391781', '2017-05-05', 'B/CARMEN'),
(000016, 'USTAREZ MEDINA MARIO WEIMAR', 'user@hotmail.com', '75391781', '2017-05-05', 'B/CARMEN'),
(000017, 'VARGAS ROSADO LAZARO', 'user@hotmail.com', '75391781', '2017-05-05', 'B/CARMEN'),
(000018, 'VARGAS VARGAS LUIS ALBERTO', 'user@hotmail.com', '75391781', '2017-05-05', 'B/CARMEN'),
(000019, 'ANIVARRO ALDUNATE SARA', 'user@hotmail.com', '75391781', '2017-05-05', 'B/CARMEN'),
(000020, 'BARRERO DE MORALES GIOVANNA', 'user@hotmail.com', '75391781', '2017-05-05', 'B/CARMEN'),
(000021, 'BECERRA CACERES DE ROSADO LOURDES', 'user@hotmail.com', '75391781', '2017-05-05', 'B/CARMEN'),
(000022, 'NICOLAS MENDOZA GONZALES', 'nico@hotmail.com', '71684933', '2017-05-05', 'B/EL CARMEN'),
(000023, 'JUANCITO PINTO MAJADITO', 'yhonny_mendoza@hotmail.com', '75391781', '2017-07-15', 'Barrio Las Cadenas'),
(000024, 'Juan Carlos Teran', 'teran@hotmail.com', '78596589', '2017-07-05', 'B/EL CARMEN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante_grupo`
--

CREATE TABLE `estudiante_grupo` (
  `cod_estudiante_grupo` int(9) UNSIGNED ZEROFILL NOT NULL,
  `cod_estudiante_546` int(6) UNSIGNED ZEROFILL DEFAULT NULL,
  `cod_grupo_546` int(7) UNSIGNED ZEROFILL DEFAULT NULL,
  `fecha_inscripcion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estudiante_grupo`
--

INSERT INTO `estudiante_grupo` (`cod_estudiante_grupo`, `cod_estudiante_546`, `cod_grupo_546`, `fecha_inscripcion`) VALUES
(000000002, 000001, 0000002, '2017-06-24'),
(000000003, 000002, 0000002, '2017-06-24'),
(000000004, 000003, 0000002, '2017-06-24'),
(000000005, 000005, 0000002, '2017-06-24'),
(000000006, 000006, 0000002, '2017-06-24'),
(000000007, 000008, 0000002, '2017-06-24'),
(000000008, 000001, 0000003, '2017-06-26'),
(000000009, 000002, 0000003, '2017-06-26'),
(000000010, 000003, 0000003, '2017-06-26'),
(000000011, 000004, 0000003, '2017-06-26'),
(000000012, 000022, 0000003, '2017-06-26'),
(000000013, 000016, 0000002, '2017-07-01'),
(000000014, 000018, 0000002, '2017-07-01'),
(000000015, 000024, 0000003, '2017-07-05'),
(000000016, 000024, 0000004, '2017-07-15'),
(000000017, 000023, 0000004, '2017-07-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `cod_grupo` int(7) UNSIGNED ZEROFILL NOT NULL,
  `cod_carrera_materia_99` int(8) UNSIGNED ZEROFILL DEFAULT NULL,
  `cod_profesor_99` int(5) UNSIGNED ZEROFILL DEFAULT NULL,
  `nombre_grupo` varchar(30) DEFAULT NULL,
  `aula` varchar(10) DEFAULT NULL,
  `dia` varchar(10) DEFAULT NULL,
  `hora_inicio` varchar(10) DEFAULT NULL,
  `hora_salida` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`cod_grupo`, `cod_carrera_materia_99`, `cod_profesor_99`, `nombre_grupo`, `aula`, `dia`, `hora_inicio`, `hora_salida`) VALUES
(0000002, 00000002, 00002, 'GRUPO 1-2017', 'AULA-02', 'Sabado', '08:00', '10:00'),
(0000003, 00000003, 00002, 'GRUPO 1-2017', 'AULA - 45', 'Sabado', '04:15', '06:15'),
(0000004, 00000004, 00003, 'GRUPO 1-2017', 'AULA - 45', 'Viernes', '06:00', '07:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `cod_materia` int(4) UNSIGNED ZEROFILL NOT NULL,
  `sigla_materia` varchar(10) DEFAULT NULL,
  `nombre_materia` varchar(50) DEFAULT NULL,
  `creditos` int(11) DEFAULT NULL,
  `descripcion` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`cod_materia`, `sigla_materia`, `nombre_materia`, `creditos`, `descripcion`) VALUES
(0001, 'INF511', 'TALLER DE GRADO I', 5, ''),
(0002, 'INF513', 'TECNOLOGIA WEB', 5, ''),
(0003, 'INF512', 'INGENIERIA DE SOFTWARE II', 5, ''),
(0004, 'INF 552', 'ARQUITECTURA DEL SOFTWARE', 5, ''),
(0005, 'INF462', 'AUDITORIA INFORMATICA', 5, ''),
(0006, 'INF442', 'SISTEMAS DE INFORMACION GEOGRAFICA', 5, ''),
(0007, 'INF423', 'REDES II', 5, ''),
(0008, 'INF422', 'INGENIERIA DE SOFTWARE I', 5, ''),
(0009, 'ECO449', 'PREPARACION Y EVALUACION DE PROYECTOS', 5, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE `profesor` (
  `cod_profesor` int(5) UNSIGNED ZEROFILL NOT NULL,
  `nick_profesor` varchar(30) DEFAULT NULL,
  `password_profesor` text,
  `nombre_profesor` varchar(50) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`cod_profesor`, `nick_profesor`, `password_profesor`, `nombre_profesor`, `direccion`, `email`, `celular`) VALUES
(00001, 'profesor1', '202cb962ac59075b964b07152d234b70', 'EDWIN CALLE', 'B/ELL CARMEN', 'calle@hotmail.com', '78598745'),
(00002, 'profesor2', '202cb962ac59075b964b07152d234b70', 'EDWIN CALLIZAYA', 'B/ELL CARMEN', 'callizaya@hotmail.com', '78598745'),
(00003, 'profesor3', '202cb962ac59075b964b07152d234b70', 'DAVID INOCENTE', 'B/ELL CARMEN', 'inocente@hotmail.com', '78598745'),
(00004, 'profesor4', '202cb962ac59075b964b07152d234b70', 'JUAN ALVAREZ', 'B/ELL CARMEN', 'alvarez@hotmail.com', '78598745'),
(00005, 'profesor5', '202cb962ac59075b964b07152d234b70', 'NOLBERTO ZABALA', 'B/ELL CARMEN', 'zabala@hotmail.com', '78598745'),
(00006, 'profesor6', '202cb962ac59075b964b07152d234b70', 'LUIS FERNANDO VILLAROEL', 'B/ELL CARMEN', 'villaroel@hotmail.com', '78598745');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indices de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`cod_asistencia`),
  ADD KEY `cod_grupo_2587` (`cod_grupo_2587`),
  ADD KEY `cod_estudiante_2587` (`cod_estudiante_2587`);

--
-- Indices de la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`cod_carrera`);

--
-- Indices de la tabla `carrera_materia`
--
ALTER TABLE `carrera_materia`
  ADD PRIMARY KEY (`cod_carrera_materia`),
  ADD KEY `cod_carrera_1122` (`cod_carrera_1122`),
  ADD KEY `cod_materia_1122` (`cod_materia_1122`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`cod_estudiante`);

--
-- Indices de la tabla `estudiante_grupo`
--
ALTER TABLE `estudiante_grupo`
  ADD PRIMARY KEY (`cod_estudiante_grupo`),
  ADD KEY `cod_estudiante_546` (`cod_estudiante_546`),
  ADD KEY `cod_grupo_546` (`cod_grupo_546`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`cod_grupo`),
  ADD KEY `cod_carrera_materia_99` (`cod_carrera_materia_99`),
  ADD KEY `cod_profesor_99` (`cod_profesor_99`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`cod_materia`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`cod_profesor`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(2) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `cod_asistencia` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `carrera`
--
ALTER TABLE `carrera`
  MODIFY `cod_carrera` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `carrera_materia`
--
ALTER TABLE `carrera_materia`
  MODIFY `cod_carrera_materia` int(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `cod_estudiante` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `estudiante_grupo`
--
ALTER TABLE `estudiante_grupo`
  MODIFY `cod_estudiante_grupo` int(9) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `grupo`
--
ALTER TABLE `grupo`
  MODIFY `cod_grupo` int(7) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `cod_materia` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `profesor`
--
ALTER TABLE `profesor`
  MODIFY `cod_profesor` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD CONSTRAINT `asistencia_ibfk_1` FOREIGN KEY (`cod_grupo_2587`) REFERENCES `grupo` (`cod_grupo`),
  ADD CONSTRAINT `asistencia_ibfk_2` FOREIGN KEY (`cod_estudiante_2587`) REFERENCES `estudiante` (`cod_estudiante`);

--
-- Filtros para la tabla `carrera_materia`
--
ALTER TABLE `carrera_materia`
  ADD CONSTRAINT `carrera_materia_ibfk_1` FOREIGN KEY (`cod_carrera_1122`) REFERENCES `carrera` (`cod_carrera`),
  ADD CONSTRAINT `carrera_materia_ibfk_2` FOREIGN KEY (`cod_materia_1122`) REFERENCES `materia` (`cod_materia`);

--
-- Filtros para la tabla `estudiante_grupo`
--
ALTER TABLE `estudiante_grupo`
  ADD CONSTRAINT `estudiante_grupo_ibfk_1` FOREIGN KEY (`cod_estudiante_546`) REFERENCES `estudiante` (`cod_estudiante`),
  ADD CONSTRAINT `estudiante_grupo_ibfk_2` FOREIGN KEY (`cod_grupo_546`) REFERENCES `grupo` (`cod_grupo`);

--
-- Filtros para la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD CONSTRAINT `grupo_ibfk_1` FOREIGN KEY (`cod_carrera_materia_99`) REFERENCES `carrera_materia` (`cod_carrera_materia`),
  ADD CONSTRAINT `grupo_ibfk_2` FOREIGN KEY (`cod_profesor_99`) REFERENCES `profesor` (`cod_profesor`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
