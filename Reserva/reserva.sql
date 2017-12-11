-- MySQL Script generated by MySQL Workbench
-- 12/17/15 06:18:49
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema basereserva
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema basereserva
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `basereserva` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `basereserva` ;

-- -----------------------------------------------------
-- Table `basereserva`.`persona`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `basereserva`.`persona` (
  `idpersona` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `cedula` VARCHAR(10) NOT NULL COMMENT '',
  `password` VARCHAR(45) NOT NULL COMMENT '',
  `nombre` VARCHAR(20) NOT NULL COMMENT '',
  `apellido` VARCHAR(20) NOT NULL COMMENT '',
  `tipo_documento` VARCHAR(15) NOT NULL COMMENT '',
  `num_documento` VARCHAR(8) NOT NULL COMMENT '',
  `direccion` VARCHAR(100) NULL COMMENT '',
  `telefono` VARCHAR(8) NULL COMMENT '',
  `email` VARCHAR(25) NULL COMMENT '',
  PRIMARY KEY (`idpersona`)  COMMENT '',
  UNIQUE INDEX `email_UNIQUE` (`email` ASC)  COMMENT '',
  UNIQUE INDEX `telefono_UNIQUE` (`telefono` ASC)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `basereserva`.`cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `basereserva`.`cliente` (
  `idcliente` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `idpersona` INT NOT NULL COMMENT '',
  `cod_cliente` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`idcliente`, `idpersona`)  COMMENT '',
  UNIQUE INDEX `cod_cliente_UNIQUE` (`cod_cliente` ASC)  COMMENT '',
  INDEX `fk_persona_cliente_idx` (`idpersona` ASC)  COMMENT '',
  CONSTRAINT `fk_persona_cliente`
    FOREIGN KEY (`idpersona`)
    REFERENCES `basereserva`.`persona` (`idpersona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `basereserva`.`auto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `basereserva`.`auto` (
  `idauto` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `idpersona` INT NOT NULL COMMENT '',
  `matricula` VARCHAR(4) NOT NULL COMMENT '',
  `marca` VARCHAR(20) NOT NULL COMMENT '',
  `modelo` VARCHAR(25) NOT NULL COMMENT '',
  `tipo` VARCHAR(15) NOT NULL COMMENT '',
  PRIMARY KEY (`idauto`, `idpersona`)  COMMENT '',
  UNIQUE INDEX `matricula_UNIQUE` (`matricula` ASC)  COMMENT '',
  INDEX `fk_persona_auto_idx` (`idpersona` ASC)  COMMENT '',
  CONSTRAINT `fk_persona_auto`
    FOREIGN KEY (`idpersona`)
    REFERENCES `basereserva`.`cliente` (`idpersona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `basereserva`.`trabajador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `basereserva`.`trabajador` (
  `idtrabajador` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `idpersona` INT NOT NULL COMMENT '',
  `sueldo` DECIMAL(7,2) NOT NULL COMMENT '',
  `acceso` VARCHAR(15) NOT NULL COMMENT '',
  `login` VARCHAR(15) NOT NULL COMMENT '',
  `password` VARCHAR(20) NOT NULL COMMENT '',
  `estado` VARCHAR(1) NOT NULL COMMENT '',
  PRIMARY KEY (`idtrabajador`, `idpersona`)  COMMENT '',
  UNIQUE INDEX `login_UNIQUE` (`login` ASC)  COMMENT '',
  CONSTRAINT `fk_persona_trabajador`
    FOREIGN KEY (`idpersona`)
    REFERENCES `basereserva`.`persona` (`idpersona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `basereserva`.`producto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `basereserva`.`producto` (
  `idproducto` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `nombre` VARCHAR(45) NOT NULL COMMENT '',
  `descripcion` VARCHAR(255) NULL COMMENT '',
  `unidad_medida` VARCHAR(20) NOT NULL COMMENT '',
  `precio_venta` DECIMAL(7,2) NOT NULL COMMENT '',
  PRIMARY KEY (`idproducto`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `basereserva`.`servicio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `basereserva`.`servicio` (
  `idservicio` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `nombre` VARCHAR(45) NOT NULL COMMENT '',
  `descripcion` VARCHAR(512) NULL COMMENT '',
  `caracteristica` VARCHAR(512) NULL COMMENT '',
  `precio_servicio` DECIMAL(7,2) NOT NULL COMMENT '',
  `estado` VARCHAR(20) NOT NULL COMMENT '',
  `tipo` VARCHAR(20) NOT NULL COMMENT '',
  PRIMARY KEY (`idservicio`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `basereserva`.`reserva`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `basereserva`.`reserva` (
  `idreserva` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `idauto` INT NOT NULL COMMENT '',
  `idcliente` INT NOT NULL COMMENT '',
  `idtrabajador` INT NOT NULL COMMENT '',
  `idservicio` INT NOT NULL COMMENT '',
  `tipo_reserva` VARCHAR(20) NOT NULL COMMENT '',
  `fecha_reserva` DATE NOT NULL COMMENT '',
  `hora_ingresa` TIME NOT NULL COMMENT '',
  `hora_salida` TIME NOT NULL COMMENT '',
  `costo_lavado` DECIMAL(7,2) NOT NULL COMMENT '',
  `estado` VARCHAR(15) NOT NULL COMMENT '',
  `cantidad_auto` INT NOT NULL COMMENT '',
  PRIMARY KEY (`idreserva`)  COMMENT '',
  INDEX `fk_reserva_auto_cliente_idx` (`idauto` ASC)  COMMENT '',
  INDEX `fk_reserva_servicio_idx` (`idservicio` ASC)  COMMENT '',
  INDEX `fk_reserva_trabajador_idx` (`idtrabajador` ASC)  COMMENT '',
  CONSTRAINT `fk_reserva_auto_cliente`
    FOREIGN KEY (`idauto`)
    REFERENCES `basereserva`.`auto` (`idpersona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reserva_servicio`
    FOREIGN KEY (`idservicio`)
    REFERENCES `basereserva`.`servicio` (`idservicio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reserva_trabajador`
    FOREIGN KEY (`idtrabajador`)
    REFERENCES `basereserva`.`trabajador` (`idpersona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `basereserva`.`consumo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `basereserva`.`consumo` (
  `idconsumo` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `idreserva` INT NOT NULL COMMENT '',
  `idproducto` INT NOT NULL COMMENT '',
  `cantidad` DECIMAL(7,2) NOT NULL COMMENT '',
  `precio_venta` DECIMAL(7,2) NOT NULL COMMENT '',
  `estado` VARCHAR(15) NOT NULL COMMENT '',
  PRIMARY KEY (`idconsumo`)  COMMENT '',
  INDEX `fk_consumo_producto_idx` (`idproducto` ASC)  COMMENT '',
  INDEX `fk_consumo_reserva_idx` (`idreserva` ASC)  COMMENT '',
  CONSTRAINT `fk_consumo_producto`
    FOREIGN KEY (`idproducto`)
    REFERENCES `basereserva`.`producto` (`idproducto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_consumo_reserva`
    FOREIGN KEY (`idreserva`)
    REFERENCES `basereserva`.`reserva` (`idreserva`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `basereserva`.`pago`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `basereserva`.`pago` (
  `idpago` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `idreserva` INT NOT NULL COMMENT '',
  `tipo_comprobante` VARCHAR(20) NOT NULL COMMENT '',
  `num_comprobante` VARCHAR(20) NOT NULL COMMENT '',
  `igv` DECIMAL(4,2) NOT NULL COMMENT '',
  `total_pago` DECIMAL(7,2) NOT NULL COMMENT '',
  `fecha_emision` DATE NOT NULL COMMENT '',
  `fecha_:pago` DATE NOT NULL COMMENT '',
  PRIMARY KEY (`idpago`)  COMMENT '',
  INDEX `fk_pago_reserva_idx` (`idreserva` ASC)  COMMENT '',
  CONSTRAINT `fk_pago_reserva`
    FOREIGN KEY (`idreserva`)
    REFERENCES `basereserva`.`reserva` (`idreserva`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
