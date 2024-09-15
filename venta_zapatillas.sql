-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-09-2024 a las 22:00:13
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
-- Base de datos: `venta zapatillas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `importador` varchar(100) NOT NULL,
  `pais origen` varchar(100) NOT NULL,
  `cantidad` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id`, `nombre`, `importador`, `pais origen`, `cantidad`) VALUES
(1, 'TOPPER', 'Juan Garcia', 'ARGENTINA', 25),
(2, 'ADIDAS', 'Los imports srl', 'Malasia', 30),
(11, 'Nike', 'Importadores Asociados', 'USA', 18),
(12, 'PUMA', 'Juan Garcia', 'China', 28);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelo`
--

CREATE TABLE `modelo` (
  `id modelo` int(100) NOT NULL,
  `id marca` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `precio` int(10) NOT NULL,
  `material` varchar(10) DEFAULT NULL,
  `talle` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `modelo`
--

INSERT INTO `modelo` (`id modelo`, `id marca`, `nombre`, `precio`, `material`, `talle`) VALUES
(1, 1, 'Air Pegasus', 100000, 'caucho ', 40),
(2, 2, 'Super Star', 150000, 'cuero', 38),
(3, 12, 'Urbana', 310000, NULL, 37),
(4, 11, 'Air running', 200000, 'sinteticos', 37),
(5, 12, 'Urban', 210000, 'eco cuero', 40),
(6, 11, 'Air zoom', 211000, 'caucho ', 40),
(7, 1, 'Comfort', 90000, 'textil', 38),
(8, 2, 'Super Star', 210000, 'cuero', 39);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `modelo`
--
ALTER TABLE `modelo`
  ADD PRIMARY KEY (`id modelo`),
  ADD KEY `id marca` (`id marca`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `modelo`
--
ALTER TABLE `modelo`
  MODIFY `id modelo` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `modelo`
--
ALTER TABLE `modelo`
  ADD CONSTRAINT `modelo_ibfk_1` FOREIGN KEY (`id marca`) REFERENCES `marca` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
