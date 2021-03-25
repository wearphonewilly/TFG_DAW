-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-03-2021 a las 12:52:31
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `watchme`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capitulo`
--

CREATE TABLE `capitulo` (
  `capitulo_id` int(11) NOT NULL,
  `temporada_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vista` tinyint(1) NOT NULL,
  `quiero` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `id_pelicula` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `overview_film` varchar(500) NOT NULL,
  `poster_path_film` varchar(200) NOT NULL,
  `genres_ids_film` varchar(50) NOT NULL,
  `homepage_film` varchar(50) NOT NULL,
  `adult` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  `peli_vista` int(11) NOT NULL,
  `peli_quiero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `serie`
--

CREATE TABLE `serie` (
  `user_id` int(11) NOT NULL,
  `serie_id` int(11) NOT NULL,
  `serie_vista` tinyint(1) NOT NULL,
  `serie_quiero` tinyint(1) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `posterPath` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `serie`
--

INSERT INTO `serie` (`user_id`, `serie_id`, `serie_vista`, `serie_quiero`, `titulo`, `posterPath`) VALUES
(1, 88396, 1, 0, 'Falcon y el Soldado de Invierno', '/uVJbiVuxNCjE9BVjj0yKsbNZ9Dt.jpg'),
(13, 60735, 1, 0, 'The Flash', '/nRoiIu64HbX9abKHm9w8FvW6Z99.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temporada`
--

CREATE TABLE `temporada` (
  `temporada_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre`, `mail`, `password`) VALUES
(1, 'willy', 'willy@gmail.com', 'admin'),
(11, 'Oriol', 'ocortes@gmail.com', 'jajaja'),
(12, 'Myje', 'my@gmai.com', 'admin1'),
(13, 'juan', 'mail@mail.com', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
