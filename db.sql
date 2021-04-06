-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 06, 2021 at 02:19 PM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `watchme`
--

-- --------------------------------------------------------

--
-- Table structure for table `capitulo`
--

CREATE TABLE `capitulo` (
  `capitulo_id` int(11) NOT NULL,
  `temporada_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vista` tinyint(1) NOT NULL,
  `episode_run_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `capitulo`
--

INSERT INTO `capitulo` (`capitulo_id`, `temporada_id`, `user_id`, `vista`, `episode_run_time`) VALUES
(1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `peliculas`
--

CREATE TABLE `peliculas` (
  `pelicula_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `overview_film` varchar(1500) NOT NULL,
  `runtime` int(11) NOT NULL,
  `poster_path_film` varchar(200) NOT NULL,
  `genres_ids_film` varchar(50) NOT NULL,
  `adult` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  `peli_vista` int(11) NOT NULL,
  `peli_quiero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `peliculas`
--

INSERT INTO `peliculas` (`pelicula_id`, `title`, `overview_film`, `runtime`, `poster_path_film`, `genres_ids_film`, `adult`, `user_id`, `peli_vista`, `peli_quiero`) VALUES
(520946, '100% Wolf: Pequeño gran lobo', 'Freddy Lupin pertenece a una orgullosa familia de hombres lobo. Confiado de que pronto se convertirá en un hombre lobo de los más temidos, Freddy se queda sorprendido cuando descubre que no es todo lo feroz que esperaba.', 85, '/4fJcKIBQ5Enwo47lKqI2bMGboQ5.jpg', 'aArray', 0, 1, 1, 0),
(587996, 'Bajocero', 'Invierno. Bajo cero. Noche cerrada. En mitad de una carretera despoblada, un furgón blindado es asaltado durante un traslado de presos. Alguien busca a uno de los presos y no parará hasta sacarlo. Su plan no tiene fisuras, no le importan las consecuencias, nada le va a detener. Pero Martín, el conductor del furgón, consigue atrincherarse dentro del cubículo blindado con los reclusos, convirtiéndose en su único obstáculo. Obligado a entenderse con sus enemigos naturales, Martín tratará de sobrevivir y cumplir con su deber en una larga noche de pesadilla que acabará haciendo que ponga en duda todos sus principios.', 101, '/340AAxjvtGXChWkqhIlScZTSokq.jpg', 'aArray', 0, 1, 1, 0),
(527774, 'Raya y el último dragón', 'Raya, una niña de gran espíritu aventurero,  se embarca en la búsqueda del último dragón del mundo con el objetivo de devolver el equilibrio a Kumandra, un lejano y recóndito territorio habitado por una civilización milenaria.', 90, '/yHpNgjEXzZ557YiZ2r3VrKid788.jpg', 'aArray', 0, 1, 1, 0),
(399566, 'Godzilla vs Kong', 'Godzilla y Kong, dos de las fuerzas más poderosas de un planeta habitado por todo tipo de aterradoras criaturas, se enfrentan en un espectacular combate que sacude los cimientos de la humanidad. Monarch (Kyle Chandler) se embarca en una misión de alto riesgo y pone rumbo hacia territorios inexplorados para descubrir los orígenes de estos dos titanes, en un último esfuerzo por tratar de salvar a dos bestias que parecen tener las horas contadas sobre la faz de la Tierra.', 113, '/bnuC6hu7AB5dYW26A3o6NNLlIlE.jpg', 'aArray', 0, 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `serie`
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
-- Dumping data for table `serie`
--

INSERT INTO `serie` (`user_id`, `serie_id`, `serie_vista`, `serie_quiero`, `titulo`, `posterPath`) VALUES
(1, 88396, 1, 0, 'Falcon y el Soldado de Invierno', '/uVJbiVuxNCjE9BVjj0yKsbNZ9Dt.jpg'),
(13, 60735, 1, 0, 'The Flash', '/nRoiIu64HbX9abKHm9w8FvW6Z99.jpg'),
(1, 69050, 1, 0, 'Riverdale', '/cEmpGjZZu3JSlkKm8NUuCzrUscR.jpg'),
(1, 71712, 1, 0, 'The Good Doctor', '/bdlGjwPWpE45CKbcP4i3A7du9CP.jpg'),
(1, 60735, 1, 0, 'The Flash', '/nRoiIu64HbX9abKHm9w8FvW6Z99.jpg'),
(1, 120168, 1, 0, '¿Quién mató a Sara?', '/jnit57q25N5VvVrK4pj4Uj8BLe7.jpg'),
(1, 60735, 1, 0, 'The Flash', '/nRoiIu64HbX9abKHm9w8FvW6Z99.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `temporada`
--

CREATE TABLE `temporada` (
  `temporada_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nombre`, `mail`, `password`) VALUES
(1, 'willy', 'willy@gmail.com', 'admin'),
(11, 'Oriol', 'ocortes@gmail.com', 'jajaja'),
(12, 'Myje', 'my@gmai.com', 'admin1'),
(13, 'juan', 'mail@mail.com', 'admin'),
(14, 'da', 'das@gmail.com', 'jajaj');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
