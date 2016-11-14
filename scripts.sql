-- MySQL Script generated by MySQL Workbench
-- Seg 14 Nov 2016 10:52:14 BRST
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema easy_moto
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema easy_moto
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `easy_moto` DEFAULT CHARACTER SET utf8 ;
USE `easy_moto` ;

-- -----------------------------------------------------
-- Table `easy_moto`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `easy_moto`.`usuario` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `cpf` BIGINT(11) UNSIGNED NOT NULL,
  `email` VARCHAR(255) UNIQUE NOT NULL,
  `senha` VARCHAR(255) NOT NULL,
  `tipo` TINYINT(1) NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  `remember_token` VARCHAR(255),
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `easy_moto`.`motoboy`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `easy_moto`.`motoboy` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `status` INT(2) NOT NULL DEFAULT 1,
  `id_usuario` INT(11) NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_motoboy_usuario_idx` (`id_usuario` ASC),
  CONSTRAINT `fk_motoboy_usuario`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `easy_moto`.`usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `easy_moto`.`avaliacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `easy_moto`.`avaliacao` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `id_motoboy` INT(11) NOT NULL,
  `nota` INT(11) NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_avaliacao_motoboy_idx` (`id_motoboy` ASC),
  CONSTRAINT `fk_avaliacao_motoboy`
    FOREIGN KEY (`id_motoboy`)
    REFERENCES `easy_moto`.`motoboy` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `easy_moto`.`cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `easy_moto`.`cliente` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` INT(11) NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_cliente_usuario_idx` (`id_usuario` ASC),
  CONSTRAINT `fk_cliente_usuario`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `easy_moto`.`usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `easy_moto`.`cartao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `easy_moto`.`cartao` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` INT(11) NOT NULL,
  `numero` BIGINT(15) UNSIGNED NOT NULL,
  `nome` VARCHAR(50) NOT NULL,
  `bandeira` VARCHAR(20) NOT NULL,
  `mes` INT(11) NOT NULL,
  `ano` INT(11) NOT NULL,
  `cvv` INT(11) NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  `deleted_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_cartao_cliente_idx` (`id_cliente` ASC),
  CONSTRAINT `fk_cartao_cliente`
    FOREIGN KEY (`id_cliente`)
    REFERENCES `easy_moto`.`cliente` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `easy_moto`.`servico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `easy_moto`.`servico` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `id_motoboy` INT(11) NOT NULL,
  `id_cliente` INT(11) NOT NULL,
  `id_cartao` INT(11) NOT NULL,
  `status` TINYINT(1) NOT NULL DEFAULT 1,
  `endereco_origem` VARCHAR(100) NOT NULL,
  `endereco_destino` VARCHAR(100) NOT NULL,
  `preco` DECIMAL(12,2) NOT NULL,
  `avaliado` TINYINT(1) NOT NULL DEFAULT 0,
  `observacoes` TEXT NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_servico_motoboy_idx` (`id_motoboy` ASC),
  INDEX `fk_servico_cliente_idx` (`id_cliente` ASC),
  INDEX `fk_servico_cartao_idx` (`id_cartao` ASC),
  CONSTRAINT `fk_servico_motoboy`
    FOREIGN KEY (`id_motoboy`)
    REFERENCES `easy_moto`.`motoboy` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_servico_cliente`
    FOREIGN KEY (`id_cliente`)
    REFERENCES `easy_moto`.`cliente` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_servico_cartao`
    FOREIGN KEY (`id_cartao`)
    REFERENCES `easy_moto`.`cartao` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
