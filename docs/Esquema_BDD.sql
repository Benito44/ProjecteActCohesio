-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema activitats_cohesio
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `activitats_cohesio` ;

-- -----------------------------------------------------
-- Schema activitats_cohesio
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `activitats_cohesio` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci ;
USE `activitats_cohesio` ;

-- -----------------------------------------------------
-- Table `activitats_cohesio`.`grup`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `activitats_cohesio`.`grup` ;

CREATE TABLE IF NOT EXISTS `activitats_cohesio`.`grup` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `activitats_cohesio`.`alumne`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `activitats_cohesio`.`alumne` ;

CREATE TABLE IF NOT EXISTS `activitats_cohesio`.`alumne` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NOT NULL,
  `cognoms` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `grup_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_user_group_idx` (`grup_id` ASC) VISIBLE,
  CONSTRAINT `fk_usuari_grup`
    FOREIGN KEY (`grup_id`)
    REFERENCES `activitats_cohesio`.`grup` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `activitats_cohesio`.`professor`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `activitats_cohesio`.`professor` ;

CREATE TABLE IF NOT EXISTS `activitats_cohesio`.`professor` (
  `id` INT NOT NULL,
  `nom` VARCHAR(45) NULL,
  `cognoms` VARCHAR(45) NULL,
  `administrador` TINYINT NULL,
  `email` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `activitats_cohesio`.`activitat`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `activitats_cohesio`.`activitat` ;

CREATE TABLE IF NOT EXISTS `activitats_cohesio`.`activitat` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NOT NULL,
  `descripcio` VARCHAR(45) NULL,
  `professor_puntuador` INT NOT NULL,
  `professor_assistencia` INT NOT NULL,
  `localitzacio_text` VARCHAR(45) NULL,
  `localitzacio_coord` POINT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_activitat_professor1_idx` (`professor_puntuador` ASC) VISIBLE,
  INDEX `fk_activitat_professor2_idx` (`professor_assistencia` ASC) VISIBLE,
  CONSTRAINT `fk_activitat_professor1`
    FOREIGN KEY (`professor_puntuador`)
    REFERENCES `activitats_cohesio`.`professor` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_activitat_professor2`
    FOREIGN KEY (`professor_assistencia`)
    REFERENCES `activitats_cohesio`.`professor` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `activitats_cohesio`.`alumne_assisteix_activitat`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `activitats_cohesio`.`alumne_assisteix_activitat` ;

CREATE TABLE IF NOT EXISTS `activitats_cohesio`.`alumne_assisteix_activitat` (
  `alumne_id` INT NOT NULL,
  `activitat_id` INT NOT NULL,
  `data` DATETIME NOT NULL DEFAULT NOW(),
  PRIMARY KEY (`alumne_id`, `activitat_id`),
  INDEX `fk_alumne_has_activitat_activitat1_idx` (`activitat_id` ASC) VISIBLE,
  INDEX `fk_alumne_has_activitat_alumne1_idx` (`alumne_id` ASC) VISIBLE,
  CONSTRAINT `fk_alumne_has_activitat_alumne1`
    FOREIGN KEY (`alumne_id`)
    REFERENCES `activitats_cohesio`.`alumne` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_alumne_has_activitat_activitat1`
    FOREIGN KEY (`activitat_id`)
    REFERENCES `activitats_cohesio`.`activitat` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `activitats_cohesio`.`grup_puntua_activitat`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `activitats_cohesio`.`grup_puntua_activitat` ;

CREATE TABLE IF NOT EXISTS `activitats_cohesio`.`grup_puntua_activitat` (
  `grup_id` INT NOT NULL,
  `activitat_id` INT NOT NULL,
  `puntuacio` INT NOT NULL,
  PRIMARY KEY (`grup_id`, `activitat_id`),
  INDEX `fk_grup_has_activitat_activitat1_idx` (`activitat_id` ASC) VISIBLE,
  INDEX `fk_grup_has_activitat_grup1_idx` (`grup_id` ASC) VISIBLE,
  CONSTRAINT `fk_grup_has_activitat_grup1`
    FOREIGN KEY (`grup_id`)
    REFERENCES `activitats_cohesio`.`grup` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_grup_has_activitat_activitat1`
    FOREIGN KEY (`activitat_id`)
    REFERENCES `activitats_cohesio`.`activitat` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `activitats_cohesio`.`config`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `activitats_cohesio`.`config` ;

CREATE TABLE IF NOT EXISTS `activitats_cohesio`.`config` (
  `option` VARCHAR(20) NOT NULL,
  `value` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`option`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
