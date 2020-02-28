-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 05-04-2019 a las 03:13:23
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `BanUniver`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cli` int(11) NOT NULL,
  `nom_cli` text NOT NULL,
  `ap_cli` text NOT NULL,
  `cor_cli` text NOT NULL,
  `telefono` text NOT NULL,
  `activo` int(1) NOT NULL,
  `roll` int(1) NOT NULL,
  `referencia1` text NOT NULL,
  `referencia2` text NOT NULL,
  `referencia3` text NOT NULL,
  `ref_tel1` text NOT NULL,
  `ref_tel2` text NOT NULL,
  `ref_tel3` text NOT NULL,
  `fecha_nacim` date NOT NULL,
  `genero` int(1) NOT NULL,
  `nip` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cli`, `nom_cli`, `ap_cli`, `cor_cli`, `telefono`, `activo`, `roll`, `referencia1`, `referencia2`, `referencia3`, `ref_tel1`, `ref_tel2`, `ref_tel3`, `fecha_nacim`, `genero`, `nip`) VALUES
(1, 'lol', 'alo', 'alo@gmail.com', '', 1, 2, 'angel', 'emery', 'emery', 'angel', 'emery', 'emery', '1987-08-07', 2, 1234),
(2, 'ruth', 'madrigal', 'ruth@gmail.com', '', 1, 1, 'angel', 'ashley', 'nes', 'angel', 'ashley', 'nes', '1988-12-14', 2, 2121),
(7, 'thay', 'gonzalez', 'thay@gmail.com', '', 1, 1, 'uno', 'dos', 'tres', 'uno', 'dos', 'tres', '1999-03-10', 1, 2121),
(8, 'nes', 'madrigal', 'Nes@gmail.com', '', 1, 1, 'uno', 'dos', 'emery', 'uno', 'dos', 'emery', '1994-10-05', 2, 2121),
(9, 'nes', 'madrigal', 'Nes@gmail.com', '', 1, 1, 'uno', 'dos', 'emery', 'uno', 'dos', 'emery', '1994-10-05', 2, 2121),
(10, 'sam', 'bigotes', '', '1212121212', 1, 1, 'uno', 'dos', 'tres', 'uno', 'dos', 'tres', '1979-10-19', 2, 1234),
(11, 'lol', 'exe', '', '098765432', 1, 1, 'erick', 'dos', 'tres', 'erick', 'dos', 'tres', '1986-10-11', 2, 1234),
(12, 'bigotes', 'bigotes', 'bigotes@gmail.com', '', 1, 1, 'uno', 'dos', 'tres', 'uno', 'dos', 'tres', '1993-11-07', 2, 4321),
(13, 'hola', 'hola', 'hola@gmail.com', '', 1, 1, 'uno', 'dos', 'tres', 'uno', 'dos', 'tres', '1999-12-11', 1, 1234),
(14, 'xochitl', 'lopez', 'xooLopez@gmail.com', '', 1, 2, 'thay', 'dos', 'tres', 'thay', 'dos', 'tres', '1997-12-14', 1, 1234);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `targeta`
--

CREATE TABLE `targeta` (
  `id_tar` int(11) NOT NULL,
  `id_cli` int(11) NOT NULL,
  `numero_tar` text NOT NULL,
  `nom_tar` text NOT NULL,
  `fecha_tramite` datetime NOT NULL,
  `nip` int(4) NOT NULL,
  `caracteristicas` text NOT NULL,
  `modelo` text NOT NULL,
  `saldo` decimal(20,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `targeta`
--

INSERT INTO `targeta` (`id_tar`, `id_cli`, `numero_tar`, `nom_tar`, `fecha_tramite`, `nip`, `caracteristicas`, `modelo`, `saldo`) VALUES
(1, 2, '0987654321', 'black', '2019-03-01 06:47:18', 1234, 'master card', 'visa', '-24.00'),
(2, 1, '0987654321987654', 'ejemplo', '2019-03-21 10:24:18', 1234, 'ejemplo', 'ejemplo', '100.00'),
(3, 2, '1234567890123456', 'Ruth', '2019-03-30 00:00:00', 1234, 'visa', 'azul', '196.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transaccion`
--

CREATE TABLE `transaccion` (
  `id_tran` int(11) NOT NULL,
  `tipo_tran` int(2) NOT NULL,
  `fecha_tran` datetime NOT NULL,
  `cantidad` decimal(20,2) NOT NULL,
  `enviar` int(11) NOT NULL,
  `recibir` int(11) NOT NULL,
  `noTargetaE` text NOT NULL,
  `noTargetaR` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `transaccion`
--

INSERT INTO `transaccion` (`id_tran`, `tipo_tran`, `fecha_tran`, `cantidad`, `enviar`, `recibir`, `noTargetaE`, `noTargetaR`) VALUES
(3, 0, '2019-03-29 17:45:03', '500.00', 1, 2, '0987654321', '0987654321987654'),
(4, 0, '2019-03-29 17:46:15', '1250.00', 1, 2, '0987654321', '0987654321987654'),
(5, 1, '2019-04-02 18:59:15', '63723.00', 1, 2, '1234567890', '1234567890123456'),
(6, 1, '2019-04-02 19:03:59', '12.00', 1, 2, '1234567890', '1234567890123456'),
(7, 1, '2019-04-03 09:25:15', '12.00', 2, 2, '1234567890', '1234567890123456'),
(8, 1, '2019-04-03 09:34:47', '12.00', 2, 1, '0987654321', '1234567890123456'),
(9, 1, '2019-04-03 09:35:53', '12.00', 1, 2, '0987654321987654', '0987654321'),
(10, 2, '2019-04-03 10:37:18', '80.00', 2, 1, '0987654321', '0987654321987654'),
(11, 1, '2019-04-03 11:01:36', '12.00', 2, 1, '0987654321', '0987654321987654'),
(12, 1, '2019-04-03 11:04:24', '80.00', 2, 1, '0987654321', '0987654321987654'),
(13, 1, '2019-04-03 11:08:39', '80.00', 2, 1, '0987654321', '1234567890123456'),
(14, 1, '2019-04-03 11:29:21', '80.00', 2, 1, '0987654321', '1234567890123456'),
(15, 1, '2019-04-03 11:30:56', '80.00', 2, 1, '0987654321', '1234567890123456'),
(16, 1, '2019-04-03 11:32:43', '60.00', 2, 1, '0987654321', '1234567890123456'),
(17, 1, '2019-04-03 11:34:20', '60.00', 2, 1, '0987654321', '1234567890123456'),
(18, 1, '2019-04-03 11:58:15', '60.00', 2, 1, '0987654321', '1234567890123456'),
(19, 1, '2019-04-03 16:30:35', '80.00', 2, 1, '1234567890', '1234567890123456'),
(20, 1, '2019-04-03 16:31:49', '80.00', 1, 2, '0987654321987654', '0987654321'),
(21, 1, '2019-04-03 16:34:30', '12.00', 2, 1, '1234567890', '1234567890123456'),
(22, 1, '2019-04-03 16:34:41', '80.00', 2, 1, '1234567890', '1234567890123456'),
(23, 1, '2019-04-03 16:34:54', '12.00', 1, 2, '0987654321987654', '0987654321'),
(24, 1, '2019-04-03 16:40:15', '80.00', 2, 1, '1234567890', '1234567890123456'),
(25, 1, '2019-04-03 16:45:09', '60.00', 2, 1, '1234567890', '1234567890123456'),
(26, 1, '2019-04-03 16:47:23', '60.00', 2, 1, '1234567890', '1234567890123456'),
(27, 1, '2019-04-03 16:47:32', '60.00', 2, 1, '1234567890', '1234567890123456'),
(28, 1, '2019-04-03 16:49:24', '60.00', 2, 1, '1234567890', '1234567890123456'),
(29, 1, '2019-04-03 16:49:30', '60.00', 2, 1, '1234567890', '1234567890123456'),
(30, 1, '2019-04-03 16:49:32', '60.00', 2, 1, '1234567890', '1234567890123456'),
(31, 1, '2019-04-03 16:54:41', '60.00', 2, 1, '1234567890', '1234567890123456'),
(32, 1, '2019-04-03 17:51:47', '60.00', 2, 1, '1234567890', '1234567890123456'),
(33, 1, '2019-04-03 17:51:48', '60.00', 2, 1, '1234567890', '1234567890123456'),
(34, 1, '2019-04-03 17:51:48', '60.00', 2, 1, '1234567890', '1234567890123456'),
(35, 1, '2019-04-03 17:51:48', '60.00', 2, 1, '1234567890', '1234567890123456'),
(36, 1, '2019-04-03 17:52:12', '60.00', 2, 1, '1234567890', '1234567890123456'),
(37, 1, '2019-04-03 17:52:18', '60.00', 2, 1, '1234567890', '1234567890123456'),
(38, 2, '2019-04-03 17:52:51', '60.00', 2, 1, '1234567890', '1234567890123456'),
(39, 1, '2019-04-03 17:57:26', '60.00', 2, 1, '1234567890', '1234567890123456'),
(40, 1, '2019-04-03 18:03:27', '60.00', 2, 1, '1234567890', '1234567890123456'),
(41, 1, '2019-04-03 18:04:38', '60.00', 2, 1, '1234567890', '1234567890123456'),
(42, 1, '2019-04-03 18:04:52', '60.00', 2, 1, '1234567890', '1234567890123456'),
(43, 1, '2019-04-03 18:08:14', '60.00', 2, 1, '1234567890', '1234567890123456'),
(44, 1, '2019-04-03 18:09:35', '60.00', 2, 1, '1234567890', '1234567890123456'),
(45, 1, '2019-04-03 18:10:12', '60.00', 2, 1, '1234567890', '1234567890123456'),
(46, 1, '2019-04-03 18:11:21', '60.00', 2, 1, '1234567890', '1234567890123456'),
(47, 1, '2019-04-03 18:12:18', '60.00', 2, 1, '1234567890', '1234567890123456'),
(48, 1, '2019-04-03 18:14:08', '60.00', 2, 1, '1234567890', '1234567890123456'),
(49, 1, '2019-04-03 18:15:42', '60.00', 2, 1, '1234567890', '1234567890123456'),
(50, 1, '2019-04-03 18:16:39', '60.00', 2, 1, '1234567890', '1234567890123456'),
(51, 1, '2019-04-03 18:17:44', '60.00', 2, 1, '1234567890', '1234567890123456'),
(52, 1, '2019-04-03 18:18:15', '60.00', 2, 1, '1234567890', '1234567890123456'),
(53, 1, '2019-04-03 18:19:35', '60.00', 2, 1, '1234567890', '1234567890123456'),
(54, 1, '2019-04-03 18:20:11', '60.00', 2, 1, '1234567890', '1234567890123456'),
(55, 1, '2019-04-03 18:20:54', '12.00', 2, 1, '0987654321', '1234567890123456'),
(56, 1, '2019-04-03 18:21:12', '12.00', 2, 1, '0987654321', '1234567890123456'),
(57, 1, '2019-04-03 18:21:34', '12.00', 2, 1, '0987654321', '1234567890123456'),
(58, 1, '2019-04-03 18:22:23', '12.00', 2, 1, '0987654321', '1234567890123456'),
(59, 1, '2019-04-03 18:22:57', '12.00', 2, 1, '0987654321', '1234567890123456'),
(60, 1, '2019-04-03 18:23:32', '12.00', 2, 1, '0987654321', '1234567890123456'),
(61, 1, '2019-04-03 18:24:07', '12.00', 2, 1, '0987654321', '1234567890123456'),
(62, 1, '2019-04-03 18:24:27', '60.00', 2, 1, '1234567890', '1234567890123456');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cli`);

--
-- Indices de la tabla `targeta`
--
ALTER TABLE `targeta`
  ADD PRIMARY KEY (`id_tar`);

--
-- Indices de la tabla `transaccion`
--
ALTER TABLE `transaccion`
  ADD PRIMARY KEY (`id_tran`),
  ADD KEY `id_cli` (`enviar`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `targeta`
--
ALTER TABLE `targeta`
  MODIFY `id_tar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `transaccion`
--
ALTER TABLE `transaccion`
  MODIFY `id_tran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
