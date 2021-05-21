-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 21, 2021 at 08:57 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `covid`
--
CREATE DATABASE IF NOT EXISTS `covid` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `covid`;

-- --------------------------------------------------------

--
-- Table structure for table `etiquetas`
--

CREATE TABLE `etiquetas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `etiquetas`
--

INSERT INTO `etiquetas` (`id`, `nombre`, `fecha_creacion`) VALUES
(1, 'vacuna', '2021-05-12 12:35:50'),
(2, 'octubre', '2020-10-15 12:35:50');

-- --------------------------------------------------------

--
-- Table structure for table `etiquetas_de_resumen`
--

CREATE TABLE `etiquetas_de_resumen` (
  `resumenes_id` int(10) UNSIGNED NOT NULL,
  `etiquetas_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `etiquetas_de_resumen`
--

INSERT INTO `etiquetas_de_resumen` (`resumenes_id`, `etiquetas_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `resumenes`
--

CREATE TABLE `resumenes` (
  `id` int(10) UNSIGNED NOT NULL,
  `texto` mediumtext NOT NULL,
  `original` varchar(255) NOT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resumenes`
--

INSERT INTO `resumenes` (`id`, `texto`, `original`, `fecha_creacion`) VALUES
(1, 'ejemplo1', 'data', '2021-05-18 11:34:04');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `password`, `email`, `tipo`) VALUES
(1, 'usuario1', '$2y$10$bFo9BEyhcxTug2.3uPgvGOz9BHUbS4/d43ayUWh0GOZyfpcAy.mf6', 'prueba@hotmail.com', 'usuario'),
(2, 'admin', '$2y$10$Y8GrWSDmDweanTBIx6vHS.zi4ucIaUbGgb4dFzl5/7X0S1w.Cwfr.', 'admin@admin.com', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `etiquetas`
--
ALTER TABLE `etiquetas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `etiquetas_de_resumen`
--
ALTER TABLE `etiquetas_de_resumen`
  ADD PRIMARY KEY (`resumenes_id`,`etiquetas_id`),
  ADD KEY `resumenes_id` (`resumenes_id`),
  ADD KEY `etiquetas_id` (`etiquetas_id`);

--
-- Indexes for table `resumenes`
--
ALTER TABLE `resumenes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `etiquetas`
--
ALTER TABLE `etiquetas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `resumenes`
--
ALTER TABLE `resumenes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `etiquetas_de_resumen`
--
ALTER TABLE `etiquetas_de_resumen`
  ADD CONSTRAINT `fk_resumenes_has_etiquetas_etiquetas1` FOREIGN KEY (`etiquetas_id`) REFERENCES `etiquetas` (`id`),
  ADD CONSTRAINT `fk_resumenes_has_etiquetas_resumenes` FOREIGN KEY (`resumenes_id`) REFERENCES `resumenes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
