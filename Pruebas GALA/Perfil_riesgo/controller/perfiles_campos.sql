-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 10-06-2023 a las 19:08:16
-- Versión del servidor: 10.5.20-MariaDB
-- Versión de PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id18636429_perfiles_riesgo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles_campos`
--

CREATE TABLE `perfiles_campos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `peso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `perfiles_campos`
--

INSERT INTO `perfiles_campos` (`id`, `nombre`, `peso`) VALUES
(1, 'Pais de origen', 10),
(2, 'Pais de residencia', 10),
(3, 'Profesión', 20),
(4, 'Edad', 10),
(5, 'Nivel de ingresos', 20),
(6, 'PEP', 20);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `perfiles_campos`
--
ALTER TABLE `perfiles_campos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `perfiles_campos`
--
ALTER TABLE `perfiles_campos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
