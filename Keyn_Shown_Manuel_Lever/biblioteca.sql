-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-06-2022 a las 18:26:53
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `nombreLibro` varchar(200) NOT NULL,
  `ISBN` varchar(100) NOT NULL,
  `codigoEjemplar` varchar(100) NOT NULL,
  `categoria` varchar(200) NOT NULL,
  `estado` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`nombreLibro`, `ISBN`, `codigoEjemplar`, `categoria`, `estado`) VALUES
('Mate', '123456', '123', 'Infantil', 'Disponible'),
('Mate', '123456', '321', 'Infantil', 'Prestado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos`
--

CREATE TABLE `prestamos` (
  `nombreUsuario` varchar(200) NOT NULL,
  `cedula` varchar(100) NOT NULL,
  `nombreLibro` varchar(200) NOT NULL,
  `ISBN` varchar(100) NOT NULL,
  `codigoEjemplar` varchar(100) NOT NULL,
  `categoria` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `nombre` varchar(200) NOT NULL,
  `cedula` varchar(100) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `sexo` varchar(100) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `estado` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nombre`, `cedula`, `fechaNacimiento`, `sexo`, `tipo`, `estado`) VALUES
('adolfo', '1193585318', '2022-06-01', 'Masculino', 'Docente', 'Activo'),
('pedro', '123124124123123', '2022-05-30', 'Masculino', 'Docente', 'Inactivo'),
('Angela', '1245434234', '2022-06-07', 'Femenino', 'Estudiante', 'Activo'),
('jose', '2', '2022-05-30', 'Masculino', 'Estudiante', 'Inactivo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`ISBN`,`codigoEjemplar`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`cedula`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
