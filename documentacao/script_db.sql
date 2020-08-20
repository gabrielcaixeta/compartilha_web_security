SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `compartilha` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;

USE `compartilha`;

CREATE  TABLE IF NOT EXISTS `compartilha`.`Usuario` (
  `idUsuario` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NOT NULL ,
  `login` VARCHAR(45) NOT NULL ,
  `senha` VARCHAR(255) NOT NULL ,
  PRIMARY KEY (`idUsuario`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE  TABLE IF NOT EXISTS `compartilha`.`Canal` (
  `idCanal` INT(11) NOT NULL AUTO_INCREMENT ,
  `descricao` VARCHAR(45) NULL DEFAULT NULL ,
  PRIMARY KEY (`idCanal`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE  TABLE IF NOT EXISTS `compartilha`.`Curso` (
  `idCurso` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `descricao` VARCHAR(45) NULL DEFAULT NULL ,
  `idCanal` INT(11) NOT NULL ,
  PRIMARY KEY (`idCurso`) ,
  INDEX `fk_Curso_Canal_idx` (`idCanal` ASC) ,
  CONSTRAINT `fk_Curso_Canal`
    FOREIGN KEY (`idCanal` )
    REFERENCES `compartilha`.`Canal` (`idCanal` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE  TABLE IF NOT EXISTS `compartilha`.`Usuario_Curso` (
  `idUsuario` INT(10) UNSIGNED NOT NULL ,
  `idCurso` INT(10) UNSIGNED NOT NULL ,
  PRIMARY KEY (`idUsuario`, `idCurso`) ,
  INDEX `fk_Usuario_has_Curso_Curso1_idx` (`idCurso` ASC) ,
  INDEX `fk_Usuario_has_Curso_Usuario1_idx` (`idUsuario` ASC) ,
  CONSTRAINT `fk_Usuario_has_Curso_Usuario1`
    FOREIGN KEY (`idUsuario` )
    REFERENCES `compartilha`.`Usuario` (`idUsuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Usuario_has_Curso_Curso1`
    FOREIGN KEY (`idCurso` )
    REFERENCES `compartilha`.`Curso` (`idCurso` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
