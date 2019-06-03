-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema cursus
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema cursus
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `cursus` DEFAULT CHARACTER SET utf8 ;
USE `cursus` ;

-- -----------------------------------------------------
-- Table `cursus`.`theuser`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cursus`.`theuser` (
  `idtheuser` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `thelogin` VARCHAR(80) NOT NULL,
  `thepwd` CHAR(64) NOT NULL COMMENT 'sha-256',
  PRIMARY KEY (`idtheuser`),
  UNIQUE INDEX `thelogin_UNIQUE` (`thelogin` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cursus`.`thesection`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cursus`.`thesection` (
  `idthesection` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `thetitle` VARCHAR(100) NOT NULL,
  `thedesc` VARCHAR(1000) NULL,
  PRIMARY KEY (`idthesection`),
  UNIQUE INDEX `thetitle_UNIQUE` (`thetitle` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cursus`.`thestudent`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cursus`.`thestudent` (
  `idthestudent` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `thename` VARCHAR(80) NOT NULL,
  `thesurname` VARCHAR(80) NOT NULL,
  PRIMARY KEY (`idthestudent`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cursus`.`thesection_has_thestudent`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cursus`.`thesection_has_thestudent` (
  `thesection_idthesection` INT UNSIGNED NOT NULL,
  `thestudent_idthestudent` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`thesection_idthesection`, `thestudent_idthestudent`),
  INDEX `fk_thesection_has_thestudent_thestudent1_idx` (`thestudent_idthestudent` ASC),
  INDEX `fk_thesection_has_thestudent_thesection_idx` (`thesection_idthesection` ASC),
  CONSTRAINT `fk_thesection_has_thestudent_thesection`
    FOREIGN KEY (`thesection_idthesection`)
    REFERENCES `cursus`.`thesection` (`idthesection`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_thesection_has_thestudent_thestudent1`
    FOREIGN KEY (`thestudent_idthestudent`)
    REFERENCES `cursus`.`thestudent` (`idthestudent`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
