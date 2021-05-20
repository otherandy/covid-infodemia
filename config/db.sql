-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema covid
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema covid
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `covid` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci ;
USE `covid` ;

-- -----------------------------------------------------
-- Table `covid`.`etiquetas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `covid`.`etiquetas` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `fecha_creacion` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `covid`.`resumenes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `covid`.`resumenes` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `texto` MEDIUMTEXT NOT NULL,
  `original` VARCHAR(255) NOT NULL,
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


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
