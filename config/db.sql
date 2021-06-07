-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema covid
-- -----------------------------------------------------

CREATE SCHEMA IF NOT EXISTS `covid` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci ;
USE `covid` ;


-- -----------------------------------------------------
-- Table `covid`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `covid`.`usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  PRIMARY KEY (`id_usuario`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `covid`.`resumenes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `covid`.`resumenes` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `autor` varchar(100) NOT NULL,
  `resumen` MEDIUMTEXT NOT NULL,
  `fuente` varchar(255) NOT NULL,
  `imagen` varchar(255),
  `video` varchar(255),
  `fecha_creacion` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `idnew_table_UNIQUE` (`id` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `covid`.`etiquetas_de_resumen`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `covid`.`etiquetas_de_resumen` (
  `resumenes_id` INT UNSIGNED NOT NULL,
  `etiquetas_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`resumenes_id`, `etiquetas_id`),
  INDEX `fk_resumenes_has_etiquetas_etiquetas1_idx` (`etiquetas_id` ASC) VISIBLE,
  INDEX `fk_resumenes_has_etiquetas_resumenes_idx` (`resumenes_id` ASC) VISIBLE,
  CONSTRAINT `fk_resumenes_has_etiquetas_etiquetas1`
    FOREIGN KEY (`etiquetas_id`)
    REFERENCES `covid`.`etiquetas` (`id`),
  CONSTRAINT `fk_resumenes_has_etiquetas_resumenes`
    FOREIGN KEY (`resumenes_id`)
    REFERENCES `covid`.`resumenes` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;



-- -----------------------------------------------------
-- Table `covid`.`resumenes-cambios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `covid`.`resumenes-cambios` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_resumen` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `autor` varchar(100) NOT NULL,
  `resumen` MEDIUMTEXT NOT NULL,
  `fuente` varchar(255) NOT NULL,
  `imagen` varchar(255),
  `video` varchar(255),
  `fecha_creacion` datetime NOT NULL,
  `nombre_usuario` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
