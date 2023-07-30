-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-07-2023 a las 00:15:43
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `aula`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clase`
--

CREATE TABLE `clase` (
  `idclase` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `clave` varchar(30) NOT NULL,
  `Usuario` varchar(100) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clase`
--

INSERT INTO `clase` (`idclase`, `nombre`, `clave`, `Usuario`, `fecha`) VALUES
(32, 'echuaciones', '0a2238ba', 'faaa', '2023-07-17 06:15:41'),
(33, 'Calculo', 'be75428e', 'deyber', '2023-07-17 06:18:41'),
(37, '5d79cb24', '3a415c72', 'franck', '2023-07-20 05:46:59'),
(38, 'be75428e', '1f3c49d3', 'migue22', '2023-07-20 05:55:57'),
(40, 'Historia', '083ddf58', 'deyber', '2023-07-20 13:10:38'),
(41, 'Matematica', 'a5afd3b5', 'deyber', '2023-07-20 13:11:00'),
(43, '083ddf58', 'f166dc83', 'carlos', '2023-07-20 13:24:19'),
(44, 'Comunicación', '01ad378a', 'deyber', '2023-07-20 14:00:19'),
(45, 'ciencia y tecnologia', '05239c70', 'contreras', '2023-07-20 16:15:34'),
(46, 'Educacion Fisica', '023284e2', 'deyber', '2023-07-20 16:16:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `misclases`
--

CREATE TABLE `misclases` (
  `idmiclase` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `clave` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `misclases`
--

INSERT INTO `misclases` (`idmiclase`, `usuario`, `clave`) VALUES
(10, 'dey', 'a7fc0068'),
(11, 'dey', '260337e6'),
(12, 'dey', '6d403d90'),
(13, 'dey', 'be75428e'),
(14, 'josee', 'be75428e'),
(23, 'cland', 'be75428e'),
(25, 'franck', 'be75428e'),
(27, 'migue22', 'be75428e'),
(28, 'alumno', '083ddf58'),
(29, 'clan', '083ddf58'),
(30, 'alumno', '838d00fe'),
(31, 'Hola', 'be75428e'),
(33, 'alumno', 'a5afd3b5'),
(35, 'alumno', 'be75428e'),
(36, 'alumno', '023284e2'),
(37, 'alumno', '05239c70');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mistareas`
--

CREATE TABLE `mistareas` (
  `idmitarea` int(11) NOT NULL,
  `Usuario` varchar(300) NOT NULL,
  `clave` varchar(300) NOT NULL,
  `comentario` varchar(300) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `archivo` varchar(300) NOT NULL,
  `idtarea` int(11) NOT NULL,
  `nota` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mistareas`
--

INSERT INTO `mistareas` (`idmitarea`, `Usuario`, `clave`, `comentario`, `fecha`, `archivo`, `idtarea`, `nota`) VALUES
(6, 'deyber', 'be75428e', 'asdas', '2023-07-20 00:50:30', 'Aula virtual en la plataforma Moodle (1).pdf', 3, ''),
(9, 'cland', 'be75428e', '123123', '2023-07-20 03:50:31', 'Facebook 390986205977827(540p).mp4', 3, '10'),
(34, 'alumno', '05239c70', 'Los insectarios muestran a menudo una cierta variedad de insectos así como artrópodos como arañas, escarabajos, hormigas, abejas, ciempiés, saltamontes, escorpiones o mantis religiosas. La exposición se puede centrar en la enseñanza de insectos, tipos de insectos, sus hábitats o el trabajo de los en', '2023-07-20 16:37:47', '', 5, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plan`
--

CREATE TABLE `plan` (
  `idplan` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `clave` varchar(30) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `texto` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `archivo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `plan`
--

INSERT INTO `plan` (`idplan`, `usuario`, `clave`, `titulo`, `texto`, `fecha`, `archivo`) VALUES
(105, 'deyber', 'trabajo', 'be75428e', '12312', '2023-07-19 21:19:05', ''),
(106, 'deyber', '838d00fe', '123123', '123123', '2023-07-19 21:27:13', 'Aula virtual en la plataforma Moodle (1) (2).pdf'),
(122, 'deyber', 'trabajo', 'be75428e', 'qweqw', '2023-07-19 22:19:08', ''),
(129, 'deyber', 'a5afd3b5', 'Suma de numeros', 'La suma de numeros primos', '2023-07-20 13:59:18', 'MA0005-sumas-edufichas.pdf'),
(130, 'deyber', '083ddf58', 'historia del ati', 'historia general', '2023-07-20 14:04:55', 'ATI.pdf'),
(131, 'deyber', '01ad378a', 'cuentos ', 'cuento del cocoro', '2023-07-20 14:07:33', 'ATRAVESDELESPEJO.pdf'),
(132, 'contreras', '05239c70', 'LOS MOLUSCOS', 'INVESTIGAR LAS CARACTERISTICAS DE LOS MOLUSCOS Y AGRUPAR OS SERES QUE PERTENECEN A ESE GRUPO', '2023-07-20 16:19:00', 'Jnag Franco A.C.pptx');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE `tareas` (
  `idtarea` int(11) NOT NULL,
  `Usuario` varchar(300) NOT NULL,
  `clave` varchar(300) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `comentario` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fechaentrega` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tareas`
--

INSERT INTO `tareas` (`idtarea`, `Usuario`, `clave`, `titulo`, `comentario`, `fecha`, `fechaentrega`) VALUES
(2, 'deyber', 'be75428e', 'trabajo', 'asda', '2023-07-19 22:19:31', '2023-07-20'),
(3, 'deyber', 'be75428e', 'actividad 1', 'genetica y honestidad', '2023-07-19 23:08:32', '2023-07-20'),
(4, 'deyber', '083ddf58', 'tarea de las TICs', 'Genere una monografia sobre los TICs', '2023-07-20 13:19:15', '2023-07-21'),
(5, 'contreras', '05239c70', 'ELABORAR UN INSECTARIO', '¿EXPLIQUE CUAL ES LA FINALIDAD DE REALIZAR ESTE TRABAJO?\r\n¿DE ACUERDO A TU INDAGACION QUE INSSECTOS MAS CONOCIDOS ENCONTRASTE EN NUESTRA LOCALIDAD?', '2023-07-20 16:26:58', '2023-07-21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `IdUsuario` int(11) NOT NULL,
  `Usuario` varchar(100) NOT NULL,
  `NombreUsuario` varchar(100) NOT NULL,
  `Tipo` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`IdUsuario`, `Usuario`, `NombreUsuario`, `Tipo`, `Password`) VALUES
(2, 'deyber', 'Deyber Cuellar Ayerve', 'profe', '123'),
(6, 'dey', 'Romeo Santos', 'alumno', '123'),
(7, 'tony', 'Antony Bernaola Blanco', 'alumno', '123'),
(8, 'Alex', 'alexander Chirinos Chávez ', 'alumno', '123'),
(9, 'fra', 'Franck', 'alumno', '1234'),
(10, 'Tadeo', 'Tadeo Sanchez Chavez', 'alumno', '123'),
(11, 'deydey chiapana cuellar', 'Franck', 'profe', '123'),
(12, 'faaa', 'Dey dey Chipana cuellar', 'profe', '123'),
(13, '1212', 'cuellar ayerve', 'alumno', '123'),
(14, 'maro', 'MAROCHO chicas', 'alumno', '123'),
(15, 'josee', 'jose marocho', 'alumno', '12344321'),
(16, 'ercivk', 'edny foreick choe', 'alumno', '123'),
(17, 'franck', 'cuellar', 'alumno', '1234'),
(18, 'migue22', 'miguel ignacion condori', 'alumno', '123'),
(19, 'alumno', 'alumno', 'alumno', '123'),
(21, 'clan', 'franck chirinos', 'alumno', '123'),
(22, 'carlos', 'Carlos Raul Gonzales Huamani', 'alumno', '1234'),
(23, 'carlitos', 'carlos huamani gonzales', 'alumno', '123'),
(24, 'Marocho', 'Morocho Miercoles', 'alumno', '123'),
(25, 'Hola', 'Papito mas na', 'alumno', '123456'),
(26, 'Raul', 'Carlos Gonzáles subelete', 'alumno', '123'),
(27, 'Docente', 'Evangelina Rojas Contreras', 'profe', 'bolognesi'),
(28, 'contreras', 'Evangelina Rojas', 'profe', 'bolognesi'),
(29, 'emer', 'emerson paul aroni', 'alumno', 'emerson12');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clase`
--
ALTER TABLE `clase`
  ADD PRIMARY KEY (`idclase`);

--
-- Indices de la tabla `misclases`
--
ALTER TABLE `misclases`
  ADD PRIMARY KEY (`idmiclase`);

--
-- Indices de la tabla `mistareas`
--
ALTER TABLE `mistareas`
  ADD PRIMARY KEY (`idmitarea`);

--
-- Indices de la tabla `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`idplan`);

--
-- Indices de la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD PRIMARY KEY (`idtarea`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`IdUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clase`
--
ALTER TABLE `clase`
  MODIFY `idclase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `misclases`
--
ALTER TABLE `misclases`
  MODIFY `idmiclase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `mistareas`
--
ALTER TABLE `mistareas`
  MODIFY `idmitarea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `plan`
--
ALTER TABLE `plan`
  MODIFY `idplan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT de la tabla `tareas`
--
ALTER TABLE `tareas`
  MODIFY `idtarea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
