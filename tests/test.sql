

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

CREATE TABLE IF NOT EXISTS `etiquetas` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE IF NOT EXISTS `etiquetas_de_resumen` (
  `resumenes_id` int(10) UNSIGNED NOT NULL,
  `etiquetas_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`resumenes_id`,`etiquetas_id`),
  KEY `resumenes_id` (`resumenes_id`),
  KEY `etiquetas_id` (`etiquetas_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `etiquetas_de_resumen`
--

INSERT INTO `etiquetas_de_resumen` (`resumenes_id`, `etiquetas_id`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `resumenes`
--

CREATE TABLE IF NOT EXISTS `resumenes` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `texto` mediumtext NOT NULL,
  `original` varchar(255) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resumenes`
--

INSERT INTO `resumenes` (`id`, `texto`, `original`, `fecha_creacion`) VALUES
(1, 'ejemplo1', 'data/', '2021-05-18 11:34:04');

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
