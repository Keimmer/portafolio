-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-11-2021 a las 02:48:15
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `portafolio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `blogpost`
--

CREATE TABLE `blogpost` (
  `blog_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `blog_img_route` varchar(100) NOT NULL,
  `author_id` int(11) NOT NULL,
  `fech_agregado` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `blogpost`
--

INSERT INTO `blogpost` (`blog_id`, `title`, `blog_img_route`, `author_id`, `fech_agregado`) VALUES
(1, 'Tostada', '61a42d0a7b45d5.25590952.jpg', 7, '2021-11-29');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `blogpost`
--
ALTER TABLE `blogpost`
  ADD PRIMARY KEY (`blog_id`),
  ADD KEY `author_id` (`author_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `blogpost`
--
ALTER TABLE `blogpost`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `blogpost`
--
ALTER TABLE `blogpost`
  ADD CONSTRAINT `blogpost_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
