-- MySQL Script generated by MySQL Workbench
-- Wed Aug  7 15:44:52 2024
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`Categoria`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`Categoria` ;

CREATE TABLE IF NOT EXISTS `mydb`.`Categoria` (
  `idCategoria` INT NOT NULL,
  `nomCategoria` VARCHAR(45) NULL,
  PRIMARY KEY (`idCategoria`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Producto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`Producto` ;

CREATE TABLE IF NOT EXISTS `mydb`.`Producto` (
  `idProducto` INT NOT NULL AUTO_INCREMENT,
  `codProducto` INT NULL UNIQUE,
  `empaque` VARCHAR(45) NOT NULL,
  `descripcion` VARCHAR(100) NOT NULL,
  `stock` INT NOT NULL,
  `Categoria_idCategoria` INT NOT NULL,
  PRIMARY KEY (`idProducto`),
  CONSTRAINT `fk_Producto_Categoria1`
    FOREIGN KEY (`Categoria_idCategoria`)
    REFERENCES `mydb`.`Categoria` (`idCategoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Solicitante`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`Solicitante` ;

CREATE TABLE IF NOT EXISTS `mydb`.`Solicitante` (
  `idSolicitante` INT NOT NULL AUTO_INCREMENT,
  `numrut` VARCHAR(8) NULL,
  `dvrut` CHAR(1) NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `appaterno` VARCHAR(45) NULL,
  `apmaterno` VARCHAR(45) NULL,
  PRIMARY KEY (`idSolicitante`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Solicitud`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`Solicitud` ;

CREATE TABLE IF NOT EXISTS `mydb`.`Solicitud` (
  `idSolicitud` INT NOT NULL AUTO_INCREMENT,
  `Producto_idProducto` INT NOT NULL,
  `Producto_codProducto` INT NOT NULL,
  `Solicitante_idSolicitante` INT NOT NULL,
  `fechaSolicitud` DATE,
  PRIMARY KEY (`idSolicitud`),
  CONSTRAINT `fk_Solicitud_Producto`
    FOREIGN KEY (`Producto_idProducto`)
    REFERENCES `mydb`.`Producto` (`idProducto`),
	CONSTRAINT `fk_Solicitud_Solicitante1`
    FOREIGN KEY (`Solicitante_idSolicitante`)
    REFERENCES `mydb`.`Solicitante` (`idSolicitante`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

SELECT * FROM PRODUCTO
WHERE Categoria_idCategoria = 5;