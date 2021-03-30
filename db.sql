-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 29, 2021 at 05:21 PM
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
  `quiero` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `peliculas`
--

CREATE TABLE `peliculas` (
  `pelicula_id` int(11) NOT NULL,
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
(1, 71712, 1, 0, 'The Good Doctor', '/bdlGjwPWpE45CKbcP4i3A7du9CP.jpg');

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
(13, 'juan', 'mail@mail.com', 'admin');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
