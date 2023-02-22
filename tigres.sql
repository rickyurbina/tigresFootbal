-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 20, 2023 at 04:40 PM
-- Server version: 8.0.31
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tigres`
--

-- --------------------------------------------------------

--
-- Table structure for table `abonos`
--

CREATE TABLE `abonos` (
  `id` int NOT NULL,
  `idVenta` int NOT NULL,
  `cantidad` double NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `abonos`
--

INSERT INTO `abonos` (`id`, `idVenta`, `cantidad`, `fecha`) VALUES
(1, 7, 100, '2023-01-18'),
(9, 7, 100, '2023-01-18'),
(10, 7, 50, '2023-01-18'),
(11, 7, 50, '2023-01-18'),
(12, 7, 100, '2023-01-18'),
(13, 8, 250, '2023-01-18'),
(14, 9, 200, '2023-01-18'),
(15, 9, 50, '2023-01-18'),
(16, 10, 200, '2023-01-18'),
(17, 10, 100, '2023-01-18'),
(18, 9, 100, '2023-01-20'),
(19, 12, 50, '2023-01-23'),
(20, 14, 200, '2023-01-23'),
(21, 15, 300, '2023-01-25'),
(22, 15, 200, '2023-01-25'),
(23, 12, 150, '2023-01-25'),
(24, 12, 150, '2023-01-25');

-- --------------------------------------------------------

--
-- Table structure for table `asistencia`
--

CREATE TABLE `asistencia` (
  `id` int NOT NULL,
  `idSocio` int NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Dumping data for table `asistencia`
--

INSERT INTO `asistencia` (`id`, `idSocio`, `fecha`) VALUES
(1, 5, '2021-12-18 10:15:18'),
(2, 10, '2022-05-12 12:02:52'),
(3, 1, '2022-05-12 14:13:47'),
(4, 1, '2022-06-01 21:46:55'),
(5, 1, '2022-12-03 12:10:32'),
(6, 5, '2023-01-18 15:17:08'),
(7, 6, '2023-01-18 15:29:33'),
(8, 6, '2023-01-19 18:23:29'),
(9, 14, '2023-01-25 11:33:21'),
(10, 13, '2023-02-14 19:57:08');

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE `clientes` (
  `idCliente` int NOT NULL,
  `nombres` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `apellidos` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `telefono` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `email` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `tipoCliente` int NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `fechaRegistro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grupos`
--

CREATE TABLE `grupos` (
  `id` int NOT NULL,
  `nombreG` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `grupos`
--

INSERT INTO `grupos` (`id`, `nombreG`) VALUES
(1, 'Infantil'),
(2, 'Juvenil'),
(3, '8-9'),
(4, 'JÃ³venes');

-- --------------------------------------------------------

--
-- Table structure for table `pagos`
--

CREATE TABLE `pagos` (
  `id` int NOT NULL,
  `idSocio` int NOT NULL,
  `cantidad` double NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Dumping data for table `pagos`
--

INSERT INTO `pagos` (`id`, `idSocio`, `cantidad`, `fecha`) VALUES
(14, 5, 300, '2023-01-09'),
(15, 6, 550, '2023-01-09'),
(16, 14, 350, '2023-01-09'),
(17, 13, 550, '2023-01-11'),
(18, 5, 300, '2023-01-12'),
(25, 15, 350, '2023-01-18'),
(26, 16, 550, '2023-01-18'),
(27, 5, 300, '2023-01-25'),
(28, 13, 550, '2023-01-25');

-- --------------------------------------------------------

--
-- Table structure for table `precios`
--

CREATE TABLE `precios` (
  `id` int NOT NULL,
  `categoria` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `costo` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Dumping data for table `precios`
--

INSERT INTO `precios` (`id`, `categoria`, `costo`) VALUES
(3, 'Individual', 550),
(4, 'Familiar', 350),
(5, 'Especial', 300);

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `idProducto` int NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `marca` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `contenido` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `costo` double NOT NULL,
  `precioPublico` double NOT NULL DEFAULT '0',
  `stock` int NOT NULL DEFAULT '0',
  `imagen` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`idProducto`, `nombre`, `marca`, `contenido`, `costo`, `precioPublico`, `stock`, `imagen`) VALUES
(6, 'Guantes', 'Gold\'s Gym', '1', 250, 350, 10, 'Moon-Knight-HD-Wallpaper-Free-download.png'),
(7, 'Espinilleras', 'Adidas', '1 Par', 400, 850, 6, ''),
(9, 'Uniforme', 'Adidas', '1', 1000, 1500, 10, '');

-- --------------------------------------------------------

--
-- Table structure for table `socios`
--

CREATE TABLE `socios` (
  `idSocio` int NOT NULL,
  `nombres` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `apellidos` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `telefono` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `contacto` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `nombreG` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `tipoSocio` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `fechaRegistro` date NOT NULL,
  `fechaUltimoPago` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Dumping data for table `socios`
--

INSERT INTO `socios` (`idSocio`, `nombres`, `apellidos`, `telefono`, `contacto`, `nombreG`, `tipoSocio`, `fechaNacimiento`, `fechaRegistro`, `fechaUltimoPago`) VALUES
(5, 'Melany', 'Urbina Garcia', '6251065030', 'mell@gmail.com', 'Infantil', 'Especial', '2003-01-10', '2022-12-10', '2023-01-25 00:00:00'),
(6, 'Monica', 'Garcia Arpero', '625', 'monica@gmail.com', 'Infantil', 'Familiar', '2003-03-03', '2022-12-11', '2023-01-18 00:00:00'),
(13, 'Ricardo', 'Urbina', '6251221438', 'Ricardo', '8-9', 'Individual', '2000-11-05', '2023-01-06', '2023-01-25 00:00:00'),
(14, 'Rosa', 'Najera', '6251152323', 'Ricardo Urbina', '7-8', 'Familiar', '2005-03-05', '2023-01-06', '2023-01-18 00:00:00'),
(15, 'Raul', 'Prieto', '6251112222', 'r@gmail.com', '', 'Familiar', '2000-11-05', '2023-01-13', '2023-01-18 00:00:00'),
(16, 'Olaf', 'Urbina', '6251112222', 'o@gmail.com', '', 'Individual', '2000-11-05', '2023-01-13', '2023-01-18 00:00:00'),
(17, 'Ovidio', 'Olivas', '6251221433', 'ovidio@gmail.com', '', 'Familiar', '2000-11-05', '2023-01-16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `nombres` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `apellidos` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `nickName` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `telefono` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `permisos` varchar(13) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `password` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nombres`, `apellidos`, `nickName`, `email`, `telefono`, `permisos`, `password`) VALUES
(15, 'Melany Fernanda', 'Urbina Garcia', 'Mell', 'mell@gmail.com', '6251065030', 'Administrador', '909090');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `nombres` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `apellidos` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `nickName` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `telefono` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `email` varchar(40) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `password` text CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `personal` text CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci COMMENT 'Informacion personal del usuario que sera mostrada en el perfil de usuario',
  `titulo` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL COMMENT 'Titulo que tiene en la empresa. ej. Gerente, Agente de ventas, etc',
  `permisos` varchar(13) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL COMMENT 'El tipo de acceso que tiene en el sistema ej. Administrador, usuario, etc',
  `foto` text CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci,
  `estado` varchar(1) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL COMMENT 'Activo / Inactivo',
  `ultimoLogin` datetime DEFAULT NULL,
  `fechaNac` date DEFAULT NULL,
  `sociales` text CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci COMMENT 'Los diferentes links a las redes sociales del usuario para ser contactado por los clientes.  En formato JSON'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombres`, `apellidos`, `nickName`, `telefono`, `email`, `password`, `personal`, `titulo`, `permisos`, `foto`, `estado`, `ultimoLogin`, `fechaNac`, `sociales`) VALUES
(13, 'Ricardo', 'Urbina Najera', 'Rick', '6251221438', 'r@gmail.com', '$2y$10$0O.XFJJEf6ZDyBdpc8if7eDeXKoBRVpMdX3iym5OGsKI6YXJTEKDy', '', 'Gerente', 'admin', 'assets/images/faces/1.jpg', '1', '0000-00-00 00:00:00', '1991-09-27', '{\"Facebook\":\"\",\"Twitter\":\"\",\"LinkedIn\":\"\"}'),
(25, 'Melany', 'Urbina Garcia', 'Mell', '6251065030', 'mell@gmail.com', '$2y$10$fhOTjWg0LMW.2NAz0nPCBu1GiE3iO4m/7INsRLnhTer0Y2wWlfURe', NULL, NULL, 'user', NULL, '0', NULL, '1969-12-31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ventas`
--

CREATE TABLE `ventas` (
  `idVenta` int NOT NULL,
  `idCliente` int NOT NULL,
  `productos` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `pago` double NOT NULL DEFAULT '0',
  `total` double NOT NULL,
  `debe` double NOT NULL DEFAULT '0',
  `fecha` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `ventas`
--

INSERT INTO `ventas` (`idVenta`, `idCliente`, `productos`, `pago`, `total`, `debe`, `fecha`) VALUES
(9, 13, '[{\"idProducto\":\"6\",\"nombreProducto\":\"Guantes\",\"cantidad\":\"2\",\"precio\":350}]', 200, 700, 150, '2023-01-18'),
(6, 5, '[{\"idProducto\":\"5\",\"nombreProducto\":\"Proteina Mass Tech Extreme 2000\",\"cantidad\":\"2\",\"precio\":1100},{\"idProducto\":\"6\",\"nombreProducto\":\"Guantes\",\"cantidad\":\"3\",\"precio\":350}]', 0, 3250, 0, '2023-01-16'),
(7, 6, '[{\"idProducto\":\"6\",\"nombreProducto\":\"Guantes\",\"cantidad\":\"2\",\"precio\":350}]', 350, 700, 0, '2023-01-16'),
(8, 13, '[{\"idProducto\":\"6\",\"nombreProducto\":\"Guantes\",\"cantidad\":\"2\",\"precio\":350}]', 350, 700, 100, '2023-01-17'),
(10, 15, '[{\"idProducto\":\"6\",\"nombreProducto\":\"Guantes\",\"cantidad\":1,\"precio\":350}]', 100, 350, -50, '2023-01-18'),
(11, 6, '[{\"idProducto\":\"6\",\"nombreProducto\":\"Guantes\",\"cantidad\":\"1\",\"precio\":350}]', 100, 350, 250, '2023-01-18'),
(12, 13, '[{\"idProducto\":\"7\",\"nombreProducto\":\"Espinilleras\",\"cantidad\":1,\"precio\":850}]', 850, 850, 0, '2023-01-23'),
(13, 15, '[{\"idProducto\":\"6\",\"nombreProducto\":\"Guantes\",\"cantidad\":1,\"precio\":350}]', 350, 350, 0, '2023-01-23'),
(14, 5, '[{\"idProducto\":\"7\",\"nombreProducto\":\"Espinilleras\",\"cantidad\":\"1\",\"precio\":850},{\"idProducto\":\"6\",\"nombreProducto\":\"Guantes\",\"cantidad\":1,\"precio\":350}]', 1000, 1200, 200, '2023-01-23'),
(15, 13, '[{\"idProducto\":\"9\",\"nombreProducto\":\"Uniforme\",\"cantidad\":1,\"precio\":1500}]', 1500, 1500, 0, '2023-01-25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abonos`
--
ALTER TABLE `abonos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indexes for table `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `precios`
--
ALTER TABLE `precios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProducto`);

--
-- Indexes for table `socios`
--
ALTER TABLE `socios`
  ADD PRIMARY KEY (`idSocio`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`idVenta`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abonos`
--
ALTER TABLE `abonos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idCliente` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `grupos`
--
ALTER TABLE `grupos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `precios`
--
ALTER TABLE `precios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `idProducto` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `socios`
--
ALTER TABLE `socios`
  MODIFY `idSocio` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `ventas`
--
ALTER TABLE `ventas`
  MODIFY `idVenta` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
