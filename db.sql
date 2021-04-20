-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 18, 2021 at 05:48 PM
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
  `serie_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vista` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `capitulo`
--

INSERT INTO `capitulo` (`capitulo_id`, `temporada_id`, `serie_id`, `user_id`, `vista`) VALUES
(1160784, 1, 63174, 1, 1),
(1160786, 1, 63174, 1, 1),
(1160787, 1, 63174, 1, 1),
(1165518, 1, 63174, 1, 1),
(1186049, 1, 63174, 1, 1),
(1317084, 1, 71694, 1, 1),
(1518825, 2, 71694, 1, 1),
(1987867, 1, 95557, 1, 1),
(2431898, 1, 88396, 1, 1),
(2535022, 1, 88396, 1, 1),
(2670396, 1, 95557, 1, 1),
(2670397, 1, 95557, 1, 1),
(2823706, 1, 95557, 1, 1),
(2832743, 1, 95557, 1, 1),
(2832746, 1, 95557, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `peliculas`
--

CREATE TABLE `peliculas` (
  `pelicula_id` int(11) NOT NULL,
  `runtime` int(11) NOT NULL,
  `poster_path_film` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `peli_vista` int(11) NOT NULL,
  `peli_quiero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `serie`
--

CREATE TABLE `serie` (
  `user_id` int(11) NOT NULL,
  `serie_id` int(11) NOT NULL,
  `poster_path` varchar(50) NOT NULL,
  `proximoEpisodio` date NOT NULL,
  `serie_vista` tinyint(1) NOT NULL,
  `serie_quiero` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `serie`
--

INSERT INTO `serie` (`user_id`, `serie_id`, `poster_path`, `proximoEpisodio`, `serie_vista`, `serie_quiero`) VALUES
(1, 62286, '/kV2Ebh0sfSHeZLWa2rpJY5q3Vpt.jpg', '0001-01-01', 1, 0),
(1, 63174, '/mzQf0QAs4jz0fDMrzFlZxQvC9KT.jpg', '2020-01-01', 1, 0),
(1, 71694, '/orvFrLzqSeW5qTFpfJEbPfHRPWg.jpg', '2021-04-21', 0, 0),
(1, 71712, '/bdlGjwPWpE45CKbcP4i3A7du9CP.jpg', '2020-01-01', 1, 0),
(1, 88396, '/ay7XexwbdRn6aP2wPzbXEsNifLV.jpg', '2020-01-01', 1, 0),
(1, 95557, '/yDWJYRAwMNKbIYT8ZB33qy84uzO.jpg', '2021-04-23', 0, 0),
(1, 120168, 'holabebe', '2020-01-01', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `temporada`
--

CREATE TABLE `temporada` (
  `temporada_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `serie_id` int(11) NOT NULL
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
-- Indexes for table `capitulo`
--
ALTER TABLE `capitulo`
  ADD PRIMARY KEY (`capitulo_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `serie_id` (`serie_id`);

--
-- Indexes for table `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`pelicula_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `serie`
--
ALTER TABLE `serie`
  ADD PRIMARY KEY (`serie_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `temporada`
--
ALTER TABLE `temporada`
  ADD PRIMARY KEY (`temporada_id`),
  ADD KEY `serie_id` (`serie_id`),
  ADD KEY `user_id` (`user_id`);

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

--
-- Constraints for dumped tables
--

--
-- Constraints for table `peliculas`
--
ALTER TABLE `peliculas`
  ADD CONSTRAINT `peliculas_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `serie`
--
ALTER TABLE `serie`
  ADD CONSTRAINT `serie_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `temporada`
--
ALTER TABLE `temporada`
  ADD CONSTRAINT `temporada_ibfk_1` FOREIGN KEY (`serie_id`) REFERENCES `serie` (`serie_id`),
  ADD CONSTRAINT `temporada_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
