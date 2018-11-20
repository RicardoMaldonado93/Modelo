-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-11-2018 a las 03:40:54
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `local`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `datos` varchar(50) NOT NULL,
  `marca` varchar(30) NOT NULL,
  `modelo` varchar(30) NOT NULL,
  `precio` int(11) NOT NULL,
  `fechaCompra` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `datos`, `marca`, `modelo`, `precio`, `fechaCompra`) VALUES
(5, 'Celular', 'Nokia', 'Lumia', 5000, '2018-11-19 22:27:39'),
(6, 'Celular', 'Samsung', 'J2-800', 7500, '2018-11-19 22:46:14'),
(7, 'Celular', 'Samsung', 'J7-900', 12000, '2018-11-19 22:46:31'),
(8, 'Celular', 'Samsung', 'S9', 25000, '2018-11-19 22:46:41'),
(9, 'Celular', 'Motorola', 'G5', 8000, '2018-11-19 22:47:02'),
(10, 'Celular', 'Motorola', 'G5-PLUS', 12000, '2018-11-19 22:47:14'),
(11, 'Celular', 'Motorola', 'G6-PLUS', 25000, '2018-11-19 22:47:23'),
(12, 'Celular', 'Motorola', 'G6-PLUS', 25000, '2018-11-19 23:54:38'),
(13, 'Celular', 'Motorola', 'E2', 4500, '2018-11-19 21:59:17'),
(14, 'Celular', 'Motorola', 'E2', 4500, '2018-11-19 22:14:19'),
(15, 'Celular', 'Motorola', 'E2', 4500, '2018-11-19 22:14:44'),
(19, 'Celular', 'Motorola', 'G6', 25000, '2018-11-19 23:35:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `usuario` varchar(30) NOT NULL,
  `metodo` varchar(30) NOT NULL,
  `ruta` varchar(40) NOT NULL,
  `hora` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`usuario`, `metodo`, `ruta`, `hora`) VALUES
('usuario', 'GET', 'api/usuario/', '2018-11-19 21:31:28'),
('usuario', 'GET', 'api/usuario/', '2018-11-19 21:32:14'),
('usuario', 'GET', 'api/usuario/', '2018-11-19 21:32:45'),
('usuario', 'POST', 'api/usuario/', '2018-11-19 21:33:11'),
('admin', 'GET', 'api/usuario/', '2018-11-19 21:38:11'),
('usuario', 'GET', 'api/usuario/', '2018-11-19 21:38:18'),
('admin', 'POST', 'api/compra', '2018-11-19 21:59:17'),
('admin', 'POST', 'api/compra', '2018-11-19 22:14:19'),
('admin', 'POST', 'api/compra', '2018-11-19 22:14:44'),
('admin', 'POST', 'api/compra', '2018-11-19 22:21:41'),
('admin', 'POST', 'api/compra', '2018-11-19 22:22:46'),
('admin', 'POST', 'api/compra', '2018-11-19 22:24:29'),
('admin', 'GET', 'api/productos', '2018-11-19 22:51:18'),
('admin', 'GET', 'api/productos', '2018-11-19 22:51:34'),
('admin', 'GET', 'api/productos', '2018-11-19 22:51:55'),
('admin', 'GET', 'api/productos', '2018-11-19 23:00:35'),
('admin', 'GET', 'api/productos', '2018-11-19 23:01:03'),
('admin', 'GET', 'api/productos', '2018-11-19 23:01:35'),
('admin', 'GET', 'api/productos', '2018-11-19 23:01:59'),
('admin', 'GET', 'api/productos', '2018-11-19 23:02:16'),
('admin', 'GET', 'api/productos', '2018-11-19 23:03:51'),
('admin', 'GET', 'api/productos', '2018-11-19 23:04:15'),
('admin', 'GET', 'api/productos', '2018-11-19 23:04:31'),
('admin', 'GET', 'api/productos', '2018-11-19 23:06:15'),
('admin', 'GET', 'api/productos', '2018-11-19 23:06:55'),
('admin', 'GET', 'api/productos', '2018-11-19 23:07:09'),
('admin', 'GET', 'api/productos', '2018-11-19 23:07:22'),
('admin', 'GET', 'api/productos', '2018-11-19 23:07:45'),
('admin', 'GET', 'api/productos', '2018-11-19 23:07:56'),
('admin', 'GET', 'api/productos', '2018-11-19 23:08:17'),
('admin', 'GET', 'api/productos', '2018-11-19 23:09:34'),
('admin', 'GET', 'api/productos', '2018-11-19 23:10:15'),
('admin', 'GET', 'api/productos', '2018-11-19 23:11:24'),
('admin', 'GET', 'api/productos', '2018-11-19 23:14:56'),
('admin', 'GET', 'api/productos', '2018-11-19 23:15:33'),
('admin', 'GET', 'api/productos', '2018-11-19 23:16:22'),
('admin', 'GET', 'api/productos', '2018-11-19 23:18:06'),
('admin', 'GET', 'api/productos', '2018-11-19 23:18:46'),
('admin', 'GET', 'api/productos', '2018-11-19 23:19:10'),
('admin', 'GET', 'api/productos', '2018-11-19 23:19:30'),
('admin', 'GET', 'api/productos', '2018-11-19 23:20:49'),
('admin', 'GET', 'api/productos', '2018-11-19 23:21:12'),
('admin', 'GET', 'api/productos', '2018-11-19 23:23:25'),
('admin', 'GET', 'api/productos', '2018-11-19 23:24:28'),
('admin', 'GET', 'api/productos', '2018-11-19 23:24:58'),
('admin', 'GET', 'api/productos', '2018-11-19 23:25:21'),
('admin', 'POST', 'api/compra', '2018-11-19 23:35:11'),
('admin', 'GET', 'api/compra', '2018-11-19 23:36:47'),
('admin', 'GET', 'api/productos', '2018-11-19 23:37:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `nombre` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `perfil` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`nombre`, `email`, `perfil`, `pass`) VALUES
('Albert', 'albert@abt.com', 'usuario', 'albert1234'),
('Hubert', 'hubert@hubert.com', 'usuario', 'hubert1234'),
('Ricardo', 'maldonadoricardo93@gmail.com', 'admin', 'ricardo1234');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
