-- MySQL Script generated by MySQL Workbench
-- seg 08 jan 2018 23:01:04 -02
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema locadora
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema locadora
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `locadora` DEFAULT CHARACTER SET utf8 ;
USE `locadora` ;

-- -----------------------------------------------------
-- Table `locadora`.`endereco`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `locadora`.`endereco` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `endereco` VARCHAR(255) NOT NULL,
  `logadouro` VARCHAR(100) NOT NULL,
  `numero` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `locadora`.`clientes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `locadora`.`clientes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `idEndereco` INT NOT NULL,
  `nome` VARCHAR(200) NOT NULL,
  `cpf` INT(11) NOT NULL,
  `telefone` INT(11) NOT NULL,
  `eMail` VARCHAR(200) NOT NULL,
  `login` VARCHAR(50) NOT NULL,
  `senha` VARCHAR(100) NOT NULL,
  `dataNascimento` DATE NOT NULL,
  `debito` REAL(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  INDEX `fk_clientes_endereco_idx` (`idEndereco` ASC),
  CONSTRAINT `fk_usuarios_endereco0`
    FOREIGN KEY (`idEndereco`)
    REFERENCES `locadora`.`endereco` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `locadora`.`genero`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `locadora`.`genero` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `genero` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `locadora`.`videos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `locadora`.`videos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `idGenero` INT NOT NULL,
  `titulo` VARCHAR(200) NOT NULL,
  `descricao` LONGTEXT NOT NULL,
  `disposicao` TINYINT(1) NOT NULL,
  `imagem` VARCHAR(300) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  INDEX `fk_videos_genero1_idx` (`idGenero` ASC),
  CONSTRAINT `fk_Videos_Genero1`
    FOREIGN KEY (`idGenero`)
    REFERENCES `locadora`.`genero` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `locadora`.`locacoes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `locadora`.`locacoes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `idUsuario` INT NOT NULL,
  `idCliente` INT NOT NULL,
  `idVideo` INT NOT NULL,
  `dataLocacao` TIMESTAMP NOT NULL,
  `dataDevolucao` DATE NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  INDEX `fk_locacoes_clientes1_idx` (`idCliente` ASC),
  INDEX `fk_locacoes_videos1_idx` (`idVideo` ASC),
  CONSTRAINT `fk_locacoes_clientes1`
    FOREIGN KEY (`idCliente`)
    REFERENCES `locadora`.`clientes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_locacoes_videos1`
    FOREIGN KEY (`idVideo`)
    REFERENCES `locadora`.`videos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
