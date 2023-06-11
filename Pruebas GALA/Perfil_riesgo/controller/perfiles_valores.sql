-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 10-06-2023 a las 19:07:47
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
-- Estructura de tabla para la tabla `perfiles_valores`
--

CREATE TABLE `perfiles_valores` (
  `id_valor` int(11) NOT NULL,
  `id_campo` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `puntos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `perfiles_valores`
--

INSERT INTO `perfiles_valores` (`id_valor`, `id_campo`, `nombre`, `puntos`) VALUES
(1, 1, 'Panamá', 100),
(1, 2, 'Panamá', 100),
(1, 3, 'Abogado', 100),
(1, 4, 'Menos de 25', 100),
(1, 5, 'Menos de 20K anual', 100),
(1, 6, 'No', 100),
(2, 1, 'Otros países', 200),
(2, 2, 'Otros países', 200),
(2, 3, 'Ingeniero', 200),
(2, 4, 'Entre 25 y 55', 200),
(2, 5, 'Entre 20 y 75k anual', 200),
(2, 6, 'NO', 200),
(3, 3, 'Médico', 300),
(3, 4, 'Mayor a 55', 300),
(3, 5, 'Mayor de 75k', 300),
(4, 3, 'Contador', 400),
(5, 3, 'Otras', 500);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `perfiles_valores`
--
ALTER TABLE `perfiles_valores`
  ADD UNIQUE KEY `id_valor` (`id_valor`,`id_campo`),
  ADD KEY `id_valor_2` (`id_valor`,`id_campo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
