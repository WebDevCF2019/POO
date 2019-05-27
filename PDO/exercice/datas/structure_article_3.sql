-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema article_3
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema article_3
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `article_3` DEFAULT CHARACTER SET utf8 ;
USE `article_3` ;

-- -----------------------------------------------------
-- Table `article_3`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `article_3`.`users` (
  `idusers` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `thelogin` VARCHAR(80) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `thepwd` CHAR(64) NOT NULL,
  `thename` VARCHAR(120) NOT NULL,
  PRIMARY KEY (`idusers`),
  UNIQUE INDEX `thelogin_UNIQUE` (`thelogin` ASC),
  UNIQUE INDEX `thename_UNIQUE` (`thename` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `article_3`.`articles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `article_3`.`articles` (
  `idarticles` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `thetitle` VARCHAR(120) NOT NULL,
  `thetext` TEXT NOT NULL,
  `thedate` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `users_idusers` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idarticles`),
  INDEX `fk_articles_users_idx` (`users_idusers` ASC),
  CONSTRAINT `fk_articles_users`
    FOREIGN KEY (`users_idusers`)
    REFERENCES `article_3`.`users` (`idusers`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
