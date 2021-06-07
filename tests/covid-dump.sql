-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 08, 2021 at 01:09 AM
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

DROP TABLE IF EXISTS `etiquetas`;
CREATE TABLE IF NOT EXISTS `etiquetas` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `etiquetas`
--

INSERT INTO `etiquetas` (`id`, `nombre`, `fecha_creacion`) VALUES
(1, 'vacuna', '2021-05-12 12:35:50'),
(2, 'octubre', '2020-10-15 12:35:50'),
(3, 'covid 19', '2021-10-15 12:35:50'),
(4, 'Pandemia', '2022-10-15 12:35:50'),
(5, 'joven', '2023-10-15 12:35:50');

-- --------------------------------------------------------

--
-- Table structure for table `etiquetas_de_resumen`
--

DROP TABLE IF EXISTS `etiquetas_de_resumen`;
CREATE TABLE IF NOT EXISTS `etiquetas_de_resumen` (
  `resumenes_id` int(10) UNSIGNED NOT NULL,
  `etiquetas_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`resumenes_id`,`etiquetas_id`),
  KEY `fk_resumenes_has_etiquetas_etiquetas1_idx` (`etiquetas_id`),
  KEY `fk_resumenes_has_etiquetas_resumenes_idx` (`resumenes_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `etiquetas_de_resumen`
--

INSERT INTO `etiquetas_de_resumen` (`resumenes_id`, `etiquetas_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(2, 2),
(3, 3),
(4, 3),
(4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `resumenes`
--

DROP TABLE IF EXISTS `resumenes`;
CREATE TABLE IF NOT EXISTS `resumenes` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `autor` varchar(100) NOT NULL,
  `resumen` mediumtext NOT NULL,
  `fuente` varchar(255) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idnew_table_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resumenes`
--

INSERT INTO `resumenes` (`id`, `titulo`, `autor`, `resumen`, `fuente`, `imagen`, `video`, `fecha_creacion`) VALUES
(1, 'Johnson & Johnson’s Janssen COVID-19 Vaccine Overview and Safety', 'https://www.cdc.gov/', 'ohnson & Johnson’s Janssen COVID-19 Vaccine:  The Centers for Disease Control and Prevention (CDC) and the US Food and Drug Administration (FDA) recommend that use of Johnson & Johnson’s Janssen (J&J/Janssen) COVID-19 Vaccine resume in the United States, effective April 23, 2021. However, women younger than 50 years old should especially be aware of the rare risk of blood clots with low platelets after vaccination. There are other COVID-19 vaccines available for which this risk has not been seen. If you received a J&J/Janssen COVID-19 Vaccine, here is what you need to know.  Read the CDC/FDA statement.', 'https://www.cdc.gov/coronavirus/2019-ncov/vaccines/different-vaccines/janssen.html', 'images/jhon.jpeg', '', '2021-05-27 22:20:59'),
(2, 'COVID-19 Vaccines:\r\n\r\nThe FDA has regulatory processes in place to facilitate the development of COVID-19 vaccines that meet the FDA\'s rigorous scientific standards.', 'Food and drugs administration', 'The FDA updated its guidance, Emergency Use Authorization for Vaccines to Prevent COVID-19, to include a new section that clarifies how the agency intends to prioritize review of EUA requests for the remainder of the COVID-19 public health emergency. Additionally, the FDA issued a report that describes some of the approaches used by the South Korean government to address COVID-19, particularly regarding development, authorization and use of diagnostic tests.', 'https://www.fda.gov/emergency-preparedness-and-response/coronavirus-disease-2019-covid-19/covid-19-vaccines/phs/community_epidemiology/dc/2019-nCoV/vaccines.html', 'images/food.png', '', '2021-05-27 22:20:59'),
(3, '\r\n¿Qué es el coronavirus?\r\n', 'Coronavirus.gob.mx', '\r\n\r\nLos coronavirus son una familia de virus que causan enfermedades (desde el resfriado común hasta enfermedades respiratorias más graves) y circulan entre humanos y animales.\r\n\r\nEn este caso, se trata del SARS-COV2. Apareció en China en diciembre pasado y provoca una enfermedad llamada COVID-19, que se extendió por el mundo y fue declarada pandemia global por la Organización Mundial de la Salud.\r\n', 'https://coronavirus.gob.mx/covid-19/', NULL, NULL, '2021-05-20 05:46:06'),
(4, 'The Covid-19 Pandemic', 'NyTimes', 'The coronavirus pandemic has affected our lives, our economy and nearly every corner of the globe. It has sickened more than 173 million people worldwide. More than 3.7 million people have died so far.', 'https://www.nytimes.com/news-event/coronavirus', NULL, NULL, '2021-05-20 05:47:06');

-- --------------------------------------------------------

--
-- Table structure for table `resumenes-cambios`
--

DROP TABLE IF EXISTS `resumenes-cambios`;
CREATE TABLE IF NOT EXISTS `resumenes-cambios` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(100) NOT NULL,
  `id_resumen` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `autor` varchar(100) NOT NULL,
  `resumen` mediumtext NOT NULL,
  `fuente` varchar(255) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resumenes-cambios`
--

INSERT INTO `resumenes-cambios` (`id`, `nombre_usuario`, `id_resumen`, `titulo`, `autor`, `resumen`, `fuente`, `imagen`, `video`, `fecha_creacion`) VALUES
(17, 'usuario1', 1, 'Los Escuincles', 'El Escuincle', 'esto es una prueba de java script enviando todas las variables como post', 'https://github.com/', NULL, NULL, '2021-05-27 22:20:59'),
(23, 'usuario1', 1, 'Los Escuincles', 'Tu', 'Se edito con la nueva base de datos woooooooooooooooooooo', 'https://www.ebay.com/', '', '', '2021-05-27 22:20:59'),
(26, 'escuicnle', 1, 'Los Escuincles', 'Tu', 'Se va a editar como usuario normal		  ', 'https://www.ebay.com/', '', '', '2021-05-27 22:20:59'),
(27, 'escuicnle', 1, 'Los Escuincles', 'Tu', 'Se va a editar como usuario normal		  ', 'https://www.ebay.com/', '', '', '2021-05-27 22:20:59');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `password`, `email`, `tipo`) VALUES
(1, 'usuario1', '$2y$10$bFo9BEyhcxTug2.3uPgvGOz9BHUbS4/d43ayUWh0GOZyfpcAy.mf6', 'prueba@hotmail.com', 'admin'),
(2, 'admin', '$2y$10$Y8GrWSDmDweanTBIx6vHS.zi4ucIaUbGgb4dFzl5/7X0S1w.Cwfr.', 'admin@admin.com', 'admin'),
(22, 'escuicnle', '$2y$10$97Wm.krBFKR/AMRrKpb7X.XXjJdmPGNt6N9.uzxZ98DoDn6wIK9hy', 'nestorelvin@gmail.com', 'usuario');

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
