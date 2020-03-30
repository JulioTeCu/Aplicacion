-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mybas
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mybas
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mybas` DEFAULT CHARACTER SET utf8 ;
USE `mybas` ;

-- -----------------------------------------------------
-- Table `mybas`.`clientes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mybas`.`clientes` (
  `idClientes` INT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(45) NOT NULL,
  `Apellido` VARCHAR(45) NOT NULL,
  `Direccion` TINYTEXT NOT NULL,
  PRIMARY KEY (`idClientes`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mybas`.`servicios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mybas`.`servicios` (
  `idServicios` INT NOT NULL AUTO_INCREMENT,
  `Fecha` DATE NOT NULL,
  `idClientes` INT NOT NULL,
  PRIMARY KEY (`idServicios`),
  INDEX ` idClientes_idx` (`idClientes` ASC,VISIBLE) ,
  CONSTRAINT ` idClientes`
    FOREIGN KEY (`idClientes`)
    REFERENCES `mybas`.`clientes` (`idClientes`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mybas`.`detalleservicios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mybas`.`detalleservicios` (
  `idDetalleServicios` INT NOT NULL AUTO_INCREMENT,
  `idServicios` INT NOT NULL,
  `idcontrato` INT NOT NULL,
  PRIMARY KEY (`idDetalleServicios`),
  INDEX `idServicios_idx` (`idServicios` ASC,VISIBLE) ,
  CONSTRAINT `idServicios`
    FOREIGN KEY (`idServicios`)
    REFERENCES `mybas`.`servicios` (`idServicios`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;