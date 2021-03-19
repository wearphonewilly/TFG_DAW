-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: eu-cdbr-west-03.cleardb.net
-- Generation Time: Mar 19, 2021 at 09:17 AM
-- Server version: 5.6.49-log
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `heroku_a22259b35601486`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capitulo`
--

CREATE TABLE `capitulo` (
  `id_capitulo` int(11) NOT NULL,
  `id_temporada` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `vista` tinyint(1) NOT NULL,
  `quiero` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
<<<<<<< HEAD
-- Estructura de tabla para la tabla `peliculas`
=======
-- Table structure for table `peliculas`
>>>>>>> 3c3c5ab16033bbd00975feb0d4ae220cb74d6db2
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
<<<<<<< HEAD
-- Estructura de tabla para la tabla `serie`
--

CREATE TABLE `serie` (
  `id_user` int(11) NOT NULL,
  `id_serie` int(11) NOT NULL,
=======
-- Table structure for table `serie`
--

CREATE TABLE `serie` (
  `user_id` int(11) NOT NULL,
  `serie_id` int(11) NOT NULL,
>>>>>>> 3c3c5ab16033bbd00975feb0d4ae220cb74d6db2
  `serie_vista` tinyint(1) NOT NULL,
  `serie_quiero` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
<<<<<<< HEAD
-- Estructura de tabla para la tabla `temporada`
--

CREATE TABLE `temporada` (
  `id_temporada` int(11) NOT NULL
=======
-- Table structure for table `temporada`
--

CREATE TABLE `temporada` (
  `temporada_id` int(11) NOT NULL
>>>>>>> 3c3c5ab16033bbd00975feb0d4ae220cb74d6db2
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
<<<<<<< HEAD
-- Estructura de tabla para la tabla `users`
=======
-- Table structure for table `users`
>>>>>>> 3c3c5ab16033bbd00975feb0d4ae220cb74d6db2
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
<<<<<<< HEAD
-- Volcado de datos para la tabla `users`
=======
-- Dumping data for table `users`
>>>>>>> 3c3c5ab16033bbd00975feb0d4ae220cb74d6db2
--

INSERT INTO `users` (`id`, `name`, `mail`, `password`) VALUES
(1, 'willy', 'willy@gmail.com', 'admin'),
(11, 'Oriol', 'ocortes@gmail.com', 'jajaja'),
(12, 'Myje', 'my@gmai.com', 'admin1'),
(13, 'juan', 'mail@mail.com', 'jaaj'),
(21, 'angel', 'agiro@gmal.com', 'angel'),
(31, 'ramon', 'rcardil@treaam.com', '1234567890');

<<<<<<< HEAD
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoracion`
--

CREATE TABLE `valoracion` (
  `id_user` int(11) NOT NULL,
  `id_serie` int(11) NOT NULL,
  `id_temporada` int(11) NOT NULL,
  `id_episodio` int(11) NOT NULL,
  `id_pelicula` int(11) NOT NULL,
  `puntuacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `users`
=======
--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
>>>>>>> 3c3c5ab16033bbd00975feb0d4ae220cb74d6db2
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
<<<<<<< HEAD
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
=======
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
>>>>>>> 3c3c5ab16033bbd00975feb0d4ae220cb74d6db2
