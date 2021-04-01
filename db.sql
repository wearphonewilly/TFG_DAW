-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 01-04-2021 a las 23:47:40
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
  `user_id` int(11) NOT NULL,
  `vista` tinyint(1) NOT NULL,
  `quiero` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `pelicula_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `overview_film` varchar(1500) NOT NULL,
  `poster_path_film` varchar(200) NOT NULL,
  `genres_ids_film` varchar(50) NOT NULL,
  `adult` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  `peli_vista` int(11) NOT NULL,
  `peli_quiero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`pelicula_id`, `title`, `overview_film`, `poster_path_film`, `genres_ids_film`, `adult`, `user_id`, `peli_vista`, `peli_quiero`) VALUES
(791373, 'La Liga de la Justicia de Zack Snyder', 'Con la determinación de asegurar que el sacrificio definitivo de Superman no fue en vano, Bruce Wayne une fuerzas con Diana Prince para reclutar a un equipo de metahumanos que protejan el mundo de una amenaza inminente de proporciones catastróficas. La tarea es más difícil de lo que Bruce imaginaba, ya que cada uno de los reclutas deberá enfrentarse a sus propios demonios para trascender aquello que los detenía, para unirse y formar de manera definitiva una liga de héroes sin precedentes. Ahora unidos, Batman, Wonder Woman, Aquaman, Cyborg y Flash deberán salvar al planeta de la amenaza de Steppenwolf, DeSaad y Darkseid, antes de que sea demasiado tarde.', '/rkuvJnamPl3xW9wKJsIS6qkmOCW.jpg', 'aArray', 0, 1, 1, 0),
(527774, 'Raya y el último dragón', 'Raya, una niña de gran espíritu aventurero,  se embarca en la búsqueda del último dragón del mundo con el objetivo de devolver el equilibrio a Kumandra, un lejano y recóndito territorio habitado por una civilización milenaria.', '/67ZrxjUEXPObtc2D5BDAjsXrnnR.jpg', 'aArray', 0, 1, 1, 0),
(581389, 'Barrenderos espaciales', 'En 2092, la tripulación de una nave basurero espacial llama Victory descubre un robot humanoide llamado Dorothy, un arma de destrucción masiva, y se ven envueltos en un negocio de alto riesgo.', '/f32ne52ClTPFL9Ew2aPUhKoVn9e.jpg', 'aArray', 0, 1, 1, 0),
(527774, 'Raya y el último dragón', 'Raya, una niña de gran espíritu aventurero,  se embarca en la búsqueda del último dragón del mundo con el objetivo de devolver el equilibrio a Kumandra, un lejano y recóndito territorio habitado por una civilización milenaria.', '/nPCICwwl4eYTrvY7PlvfPIwFqHl.jpg', 'aArray', 0, 1, 1, 0),
(544401, 'Cherry', 'Cuenta la historia real de Nico Walker, que volvió de la guerra de Iraq con un trastorno de estrés postraumático no diagnosticado que le llevó primero a hacerse adicto al opio y posteriormente a robar bancos.', '/pwDvkDyaHEU9V7cApQhbcSJMG1w.jpg', 'aArray', 0, 1, 1, 0),
(587807, 'Tom y Jerry', 'Tom el gato y Jerry el ratón son expulsados de su casa y se trasladan a un elegante hotel de Nueva York, donde una empleada descuidada llamada Kayla perderá su trabajo si no puede desalojar a Jerry antes de una boda de clase alta en el hotel. ¿Su solución? Contratar a Tom para deshacerse del molesto ratón.', '/orzPlWUbf0S5HeWmpP3TeHvduwn.jpg', 'aArray', 0, 1, 1, 0);

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
(13, 60735, 1, 0, 'The Flash', '/nRoiIu64HbX9abKHm9w8FvW6Z99.jpg'),
(1, 69050, 1, 0, 'Riverdale', '/cEmpGjZZu3JSlkKm8NUuCzrUscR.jpg'),
(1, 71712, 1, 0, 'The Good Doctor', '/bdlGjwPWpE45CKbcP4i3A7du9CP.jpg');

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
(13, 'juan', 'mail@mail.com', 'admin'),
(14, 'da', 'das@gmail.com', 'jajaj');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
