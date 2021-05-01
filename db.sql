-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 01-05-2021 a las 11:35:12
-- Versión del servidor: 5.7.32
-- Versión de PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

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
  `serie_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vista` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `capitulo`
--

INSERT INTO `capitulo` (`capitulo_id`, `temporada_id`, `serie_id`, `user_id`, `vista`) VALUES
(64383, 1, 1416, 1, 1),
(64384, 1, 1416, 1, 1),
(64385, 1, 1416, 1, 1),
(64386, 1, 1416, 1, 1),
(64387, 1, 1416, 1, 1),
(64389, 1, 1416, 1, 1),
(64391, 1, 1416, 1, 1),
(1000956, 11, 1416, 1, 1),
(1008081, 11, 1416, 1, 1),
(1009369, 11, 1416, 1, 1),
(1010859, 11, 1416, 1, 1),
(1130976, 1, 63174, 1, 1),
(1160783, 1, 63174, 1, 1),
(1160784, 1, 63174, 1, 1),
(1160785, 1, 63174, 1, 1),
(1160786, 1, 63174, 1, 1),
(1160787, 1, 63174, 1, 1),
(1165518, 1, 63174, 1, 1),
(1186049, 1, 63174, 1, 1),
(1213352, 13, 1416, 1, 1),
(1224271, 13, 1416, 1, 1),
(1226781, 13, 1416, 1, 1),
(1227004, 13, 1416, 1, 1),
(1232973, 13, 1416, 1, 1),
(1317084, 1, 71694, 1, 1),
(1518825, 2, 71694, 1, 1),
(1987867, 1, 95557, 1, 1),
(2431898, 1, 88396, 1, 1),
(2535022, 1, 88396, 1, 1),
(2832746, 1, 95557, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `pelicula_id` int(11) NOT NULL,
  `runtime` int(11) NOT NULL,
  `poster_path_film` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `peli_vista` int(11) NOT NULL,
  `peli_quiero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`pelicula_id`, `runtime`, `poster_path_film`, `user_id`, `peli_vista`, `peli_quiero`) VALUES
(399566, 113, '/bnuC6hu7AB5dYW26A3o6NNLlIlE.jpg', 1, 1, 0),
(791373, 242, '/rkuvJnamPl3xW9wKJsIS6qkmOCW.jpg', 1, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `serie`
--

CREATE TABLE `serie` (
  `user_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `serie_id` int(11) NOT NULL,
  `poster_path` varchar(50) NOT NULL,
  `proximoEpisodioStart` date NOT NULL,
  `proximoEpisodioEnd` date NOT NULL,
  `serie_vista` tinyint(1) NOT NULL,
  `serie_quiero` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `serie`
--

INSERT INTO `serie` (`user_id`, `title`, `serie_id`, `poster_path`, `proximoEpisodioStart`, `proximoEpisodioEnd`, `serie_vista`, `serie_quiero`) VALUES
(1, 'Anatomía de Grey', 1416, '/7ElKH7Ql2MIMvG0SqsGP6Iiwp5e.jpg', '2021-04-22', '2021-04-22', 0, 1),
(1, 'The Flash', 60735, '/pvnZrzyKKFYZaL0wUrVI7NK3Ge6.jpg', '2021-05-04', '2021-05-04', 0, 1),
(1, 'Lucifer', 63174, '/mzQf0QAs4jz0fDMrzFlZxQvC9KT.jpg', '2021-05-28', '2021-05-28', 0, 0),
(1, 'Luis Miguel: La Serie', 79008, '/qR0uCwC6umvJUcmvNsSz2FruGXp.jpg', '2021-05-02', '2021-05-02', 0, 0),
(1, 'Falcon y el Soldado del Invierno', 88396, '/cYAlkQ1ul2AhAm1YgHgeLv5GHlE.jpg', '2021-04-23', '2021-04-23', 0, 1),
(1, 'Invencible', 95557, '/yDWJYRAwMNKbIYT8ZB33qy84uzO.jpg', '2021-04-23', '2021-04-23', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temporada`
--

CREATE TABLE `temporada` (
  `temporada_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `serie_id` int(11) NOT NULL
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
(13, 'juan', 'mail@mail.com', 'admin'),
(14, 'da', 'das@gmail.com', 'jajaj');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `capitulo`
--
ALTER TABLE `capitulo`
  ADD PRIMARY KEY (`capitulo_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `serie_id` (`serie_id`);

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`pelicula_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `serie`
--
ALTER TABLE `serie`
  ADD PRIMARY KEY (`serie_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `temporada`
--
ALTER TABLE `temporada`
  ADD PRIMARY KEY (`temporada_id`),
  ADD KEY `serie_id` (`serie_id`),
  ADD KEY `user_id` (`user_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD CONSTRAINT `peliculas_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `serie`
--
ALTER TABLE `serie`
  ADD CONSTRAINT `serie_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `temporada`
--
ALTER TABLE `temporada`
  ADD CONSTRAINT `temporada_ibfk_1` FOREIGN KEY (`serie_id`) REFERENCES `serie` (`serie_id`),
  ADD CONSTRAINT `temporada_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
