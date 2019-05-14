-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-10-2018 a las 22:57:02
-- Versión del servidor: 10.1.34-MariaDB
-- Versión de PHP: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `curso_mvc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clients`
--

INSERT INTO `clients` (`id`, `name`, `email`, `address`) VALUES
(1, 'Diego Mata Miranda.', 'diegomata90@gmail.com', 'Sj, CR'),
(2, 'Luis', 'test@dev.com', 'San Jose, Costa Rica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(100) NOT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `estado` varchar(1) NOT NULL,
  `rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `email`, `password`, `avatar`, `estado`, `rol`) VALUES
(1, 'dmata', 'diegomata90@gmail.com', '$2y$10$.fonBl4eWS2RMKaDD8UFtOyegzws8Bb1TuLjAjkZi9viMaCykTnc.', 'Male-Avatar-Cool-Sunglasses-icon.png', 'A', 1),
(2, 'admin', 'admin@admin.com', '$2y$10$lJjF0nNlMNZ4RXUmzGk3qOMadgWK3lpNMnVHWeVdqqHmAz0olrjOa', 'Male-Avatar-Cool-Sunglasses-icon.png', 'A', 1),
(3, 'dmata1', 'diegomata91@gmail.com', '$2y$10$UonzfwsrQ.yLqxLGI36eRuPhbC5pNmn60FaVO9Vx9zY.nZnjiM5q6', 'user6-128x128.jpg', 'A', 2),
(4, 'test', 'test@dev.com', '$2y$10$rGCSFJ4QMPhK1/6K8gCi1uCFmHpu8zSNy9vG8SDDWoTf7Gxwaqvvu', 'user1-128x128.jpg', 'A', 2),
(8, 'juan1', 'juan1@gmail.com', '$2y$10$Kag.oFOizhAftpAKdUJYf.2zvKzFGG9e/NpOZvsNbWOsIEv7agB9S', 'Male-Avatar-Cool-Sunglasses-icon.png', 'A', 2),
(9, 'pedro', 'pedro@hotmail.com', '$2y$10$h5rlALcfZjytQ0TK/8INjOgkOtK.R71g0QqcNZcrIolTRNKgAT6Sq', 'usuario.png', 'A', 2),
(10, 'juanito', 'juanito123@gmail.com', '$2y$10$desi6sFCcXY723nv4l.XWe.SWTWiHpcKRRJLCzJn7/UdvBgLL6vV2', 'user1-128x128.jpg', 'I', 2),
(11, 'lmata', 'lmata@mfaabonosagro.com', '$2y$10$6Fstr81TzrIS72hFBz6b4uvNj5a8gh3q45vQTwVk2vmKRr0yUU3Hq', 'avatar5.png', 'A', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
