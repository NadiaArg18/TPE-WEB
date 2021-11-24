-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-11-2021 a las 22:47:06
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_entretenimiento`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `canales`
--

CREATE TABLE `canales` (
  `NombreCanal` varchar(50) NOT NULL,
  `id_canal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `canales`
--

INSERT INTO `canales` (`NombreCanal`, `id_canal`) VALUES
('Telefe', 1),
('Universal', 3),
('TNT', 4),
('Paramount', 5),
('Fox', 7),
('Space', 8),
('Trece', 10),
('Amazon', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `series`
--

CREATE TABLE `series` (
  `id_Series` int(11) NOT NULL,
  `nombreSerie` varchar(60) NOT NULL,
  `fk_id_Nombre` int(11) NOT NULL,
  `Canal` varchar(140) NOT NULL,
  `Genero` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `series`
--

INSERT INTO `series` (`id_Series`, `nombreSerie`, `fk_id_Nombre`, `Canal`, `Genero`) VALUES
(5, 'The Last Kingdom', 5, 'Paramount', 'Historia'),
(9, 'This is Us', 12, 'Amazon', 'Drama'),
(10, 'The Boys', 12, 'Amazon', 'Drama'),
(15, 'Los 100', 8, 'Netflix', 'Ciencia Ficción'),
(18, 'New Amsterdam', 5, 'Paramount', 'Medicos'),
(20, 'The Crown', 1, 'Telefe', 'Drama'),
(45, 'Casados con hijos', 1, 'Telefe', 'Comedia'),
(50, 'La ley y el orden', 10, 'Universal', 'Drama'),
(61, 'Dr. House', 10, 'TNT', 'Medicos'),
(68, 'Friends', 10, 'Space', 'Comedia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_Usuarios` int(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Contraseña` varchar(250) NOT NULL,
  `Administrador` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_Usuarios`, `Email`, `Contraseña`, `Administrador`) VALUES
(8, 'nadia@gmail.com', '$2y$10$urbsdYrlrMwgirbnOWZU6urw4tVY9VMgaT6KKs42JM2m/sVgYOv3.', 'no-admin'),
(9, 'test1@gmail.com', '$2y$10$g2lEKHDnb0l4txGFnsw5TOYnWEVScRieANcc2rICWEy28QlK1s55e', 'userAdmin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoracion`
--

CREATE TABLE `valoracion` (
  `id_valoracion` int(11) NOT NULL,
  `comentario` varchar(300) NOT NULL,
  `puntaje` int(11) NOT NULL,
  `fk_id_Nombre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `canales`
--
ALTER TABLE `canales`
  ADD PRIMARY KEY (`NombreCanal`),
  ADD KEY `index` (`id_canal`);

--
-- Indices de la tabla `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id_Series`),
  ADD KEY `fk_id_Nombre` (`fk_id_Nombre`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_Usuarios`);

--
-- Indices de la tabla `valoracion`
--
ALTER TABLE `valoracion`
  ADD PRIMARY KEY (`id_valoracion`),
  ADD KEY `fk_id_Nombre` (`fk_id_Nombre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `canales`
--
ALTER TABLE `canales`
  MODIFY `id_canal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `series`
--
ALTER TABLE `series`
  MODIFY `id_Series` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_Usuarios` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `valoracion`
--
ALTER TABLE `valoracion`
  MODIFY `id_valoracion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `series`
--
ALTER TABLE `series`
  ADD CONSTRAINT `series_ibfk_1` FOREIGN KEY (`fk_id_Nombre`) REFERENCES `canales` (`id_canal`);

--
-- Filtros para la tabla `valoracion`
--
ALTER TABLE `valoracion`
  ADD CONSTRAINT `valoracion_ibfk_1` FOREIGN KEY (`fk_id_Nombre`) REFERENCES `series` (`id_Series`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
