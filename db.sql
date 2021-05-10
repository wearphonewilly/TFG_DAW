-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 10-05-2021 a las 14:20:30
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
(64321, 3, 1416, 1, 1),
(64322, 3, 1416, 1, 1),
(64323, 3, 1416, 1, 1),
(64324, 3, 1416, 1, 1),
(64325, 3, 1416, 1, 1),
(64383, 1, 1416, 1, 1),
(64384, 1, 1416, 1, 1),
(64385, 1, 1416, 1, 1),
(64386, 1, 1416, 1, 1),
(64387, 1, 1416, 1, 1),
(64388, 1, 1416, 1, 1),
(64389, 1, 1416, 1, 1),
(64390, 1, 1416, 1, 1),
(64391, 1, 1416, 1, 1),
(64511, 9, 1416, 1, 1),
(64965, 1, 1421, 1, 1),
(977122, 1, 60735, 1, 1),
(1000956, 11, 1416, 1, 1),
(1005651, 1, 60735, 1, 1),
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
(1264932, 1, 69050, 1, 1),
(1264933, 1, 69050, 1, 1),
(1271252, 1, 69050, 1, 1),
(1287103, 1, 69050, 1, 1),
(1317084, 1, 71694, 1, 1),
(1317409, 1, 71712, 1, 1),
(1336114, 7, 1399, 1, 1),
(1336115, 7, 1399, 1, 1),
(1340524, 7, 1399, 1, 1),
(1370097, 1, 71712, 1, 1),
(1372339, 1, 71712, 1, 1),
(1375646, 1, 71712, 1, 1),
(1378290, 1, 71712, 1, 1),
(1380999, 1, 71712, 1, 1),
(1391211, 1, 71712, 1, 1),
(1392797, 1, 71712, 1, 1),
(1435827, 1, 71712, 1, 1),
(1435829, 1, 71712, 1, 1),
(1435830, 1, 71712, 1, 1),
(1478419, 1, 79008, 1, 1),
(1478421, 1, 79008, 1, 1),
(1518825, 2, 71694, 1, 1),
(1987867, 1, 95557, 1, 1),
(2558741, 1, 88396, 1, 1),
(2558742, 1, 88396, 1, 1),
(2558743, 1, 88396, 1, 1),
(2670397, 1, 95557, 1, 1),
(2753384, 2, 79008, 1, 1),
(2823706, 1, 95557, 1, 1),
(2832746, 1, 95557, 1, 1),
(2887101, 2, 79008, 1, 1),
(2888214, 2, 79008, 1, 1),
(2888215, 2, 79008, 1, 1),
(2888220, 2, 79008, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `pelicula_id` int(11) NOT NULL,
  `nombrePeli` varchar(75) NOT NULL,
  `runtime` int(11) NOT NULL,
  `poster_path_film` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `peli_vista` int(11) NOT NULL,
  `peli_quiero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`pelicula_id`, `nombrePeli`, `runtime`, `poster_path_film`, `user_id`, `peli_vista`, `peli_quiero`) VALUES
(251605, 'Light Fly, Fly High', 80, '', 1, 1, 0),
(385074, '', 0, '', 1, 1, 0),
(395871, '', 77, '', 1, 1, 0),
(399566, '', 113, '/bnuC6hu7AB5dYW26A3o6NNLlIlE.jpg', 1, 1, 0),
(450750, '', 72, '/96fYNpI2gc40CbPkufm2ZupcCkl.jpg', 1, 0, 1),
(452349, '', 82, '/n2ZuIMiymoW8TbxR1YKgDFLrn90.jpg', 1, 0, 1),
(460273, '', 67, '/g96pAs87h3jExnJvCx5eJOklz4B.jpg', 1, 0, 1),
(538235, '', 60, '/fY2VYsqti9WkqizQ5afowFwxH9Q.jpg', 1, 1, 0),
(556867, '', 96, '/pMyCYtgfBmMisX3RFc5eH6zIV5Y.jpg', 1, 1, 0),
(587807, '', 101, '/orzPlWUbf0S5HeWmpP3TeHvduwn.jpg', 1, 1, 0),
(593914, 'Some Kind of Genius', 29, '', 1, 1, 0),
(615678, '', 107, '/e9r4aLl7OAXdGK49u5oEjlbHKA3.jpg', 1, 0, 1),
(635302, '', 117, '/3f4ETSwknZs74lmUYC7ENIMRBMP.jpg', 1, 0, 1),
(694596, 'Sand', 23, '/qarjwEiXjXeb5dFm3PrlsFarcXH.jpg', 1, 1, 0),
(726684, 'Miraculous World Shanghai, la légende de Ladydragon', 52, '/tf9nWFyJ745mBFkXZtPWabDYBR3.jpg', 1, 1, 0),
(791373, '', 242, '/rkuvJnamPl3xW9wKJsIS6qkmOCW.jpg', 1, 0, 1),
(819669, '', 6, '/j3y70D9ocZl84EyVV3kacc7AseS.jpg', 1, 1, 0),
(826317, '', 12, '', 1, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `serie`
--

CREATE TABLE `serie` (
  `PKCombined` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `serie_id` int(11) NOT NULL,
  `poster_path` varchar(50) NOT NULL,
  `proximoEpisodioStart` date NOT NULL,
  `proximoEpisodioEnd` date NOT NULL,
  `serie_vista` tinyint(1) NOT NULL,
  `serie_quiero` tinyint(1) NOT NULL,
  `valoracion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `serie`
--

INSERT INTO `serie` (`PKCombined`, `user_id`, `title`, `serie_id`, `poster_path`, `proximoEpisodioStart`, `proximoEpisodioEnd`, `serie_vista`, `serie_quiero`, `valoracion`) VALUES
('A1120168', 1, '¿Quién mató a Sara?', 120168, '/jnit57q25N5VvVrK4pj4Uj8BLe7.jpg', '2021-05-19', '2021-05-19', 1, 0, 1),
('A11399', 1, 'Juego de tronos', 1399, '/3hDtRuwTfQQYRst3kjhvp4Cogjw.jpg', '0001-01-01', '0001-01-01', 1, 0, 2),
('A11416', 1, 'Anatomía de Grey', 1416, '/7ElKH7Ql2MIMvG0SqsGP6Iiwp5e.jpg', '2021-05-20', '2021-05-20', 0, 1, NULL),
('A160735', 1, 'The Flash', 60735, '/nMBnKsAsqwq266nGQFt7DbwZ65G.jpg', '2021-05-11', '2021-05-11', 1, 0, 5),
('A165820', 1, 'Van Helsing', 65820, '/r8ODGmfNbZQlNhiJl2xQENE2jsk.jpg', '0001-01-01', '0001-01-01', 1, 0, 2),
('A169050', 1, 'Riverdale', 69050, '/cEmpGjZZu3JSlkKm8NUuCzrUscR.jpg', '2021-08-11', '2021-08-11', 1, 0, 4),
('A171712', 1, 'The Good Doctor', 71712, '/bdlGjwPWpE45CKbcP4i3A7du9CP.jpg', '2021-05-10', '2021-05-10', 1, 0, 5),
('A179008', 1, 'Luis Miguel: La Serie', 79008, '/qR0uCwC6umvJUcmvNsSz2FruGXp.jpg', '2021-05-09', '2021-05-09', 1, 0, 5),
('A188396', 1, 'Falcon y el Soldado de Invierno', 88396, '/ay7XexwbdRn6aP2wPzbXEsNifLV.jpg', '0001-01-01', '0001-01-01', 1, 0, 5),
('A197180', 1, 'Selena: La serie', 97180, '/ta1Eicec2I2vDUARpNvXWnEzNC8.jpg', '0001-01-01', '0001-01-01', 1, 0, 5);

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
  ADD PRIMARY KEY (`PKCombined`);

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
