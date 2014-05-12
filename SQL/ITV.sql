SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';



-- -----------------------------------------------------
-- Table `mydb`.`tbl`
-- -----------------------------------------------------
create database itv_v1;
use itv_v1;

-- -----------------------------------------------------
-- Table `itv_v1`.`lieferant`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `itv_v1`.`lieferant` ;

CREATE  TABLE IF NOT EXISTS `itv_v1`.`lieferant` (
  `l_id` INT NOT NULL AUTO_INCREMENT ,
  `l_firmenname` VARCHAR(45) NULL ,
  `l_strasse` VARCHAR(45) NULL ,
  `l_plz` VARCHAR(5) NULL ,
  `l_ort` VARCHAR(45) NULL ,
  `l_tel` VARCHAR(20) NULL ,
  `l_mobil` VARCHAR(20) NULL ,
  `l_fax` VARCHAR(20) NULL ,
  `l_email` VARCHAR(45) NULL ,
  PRIMARY KEY (`l_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `itv_v1`.`raeume`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `itv_v1`.`raeume` ;

CREATE  TABLE IF NOT EXISTS `itv_v1`.`raeume` (
  `r_id` INT NOT NULL AUTO_INCREMENT ,
  `r_nr` VARCHAR(20) NULL COMMENT 'z.B. r014, W304, etc.' ,
  `r_bezeichnung` VARCHAR(45) NULL COMMENT 'z.B. Werkstatt, Lager,...' ,
  `r_notiz` VARCHAR(1024) NULL ,
  PRIMARY KEY (`r_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `itv_v1`.`komponentenarten`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `itv_v1`.`komponentenarten` ;

CREATE  TABLE IF NOT EXISTS `itv_v1`.`komponentenarten` (
  `ka_id` INT NOT NULL ,
  `ka_komponentenart` VARCHAR(45) NULL ,
  PRIMARY KEY (`ka_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `itv_v1`.`komponenten`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `itv_v1`.`komponenten` ;

CREATE  TABLE IF NOT EXISTS `itv_v1`.`komponenten` (
  `k_id` INT NOT NULL ,
  `lieferant_l_id` INT NOT NULL ,
  `lieferant_r_id` INT NOT NULL ,
  `k_einkaufsdatum` DATE NULL ,
  `k_gewaehrleistungsdauer` INT NULL ,
  `k_notiz` VARCHAR(1024) NULL ,
  `k_hersteller` VARCHAR(45) NULL ,
  `komponentenarten_ka_id` INT NOT NULL ,
  PRIMARY KEY (`k_id`) ,
  INDEX `fk_komponenten_haendler` (`lieferant_l_id` ASC) ,
  INDEX `fk_komponenten_raeume1` (`lieferant_r_id` ASC) ,
  INDEX `fk_komponenten_komponentenarten1` (`komponentenarten_ka_id` ASC) ,
  CONSTRAINT `fk_komponenten_haendler`
    FOREIGN KEY (`lieferant_l_id` )
    REFERENCES `itv_v1`.`lieferant` (`l_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_komponenten_raeume1`
    FOREIGN KEY (`lieferant_r_id` )
    REFERENCES `itv_v1`.`raeume` (`r_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_komponenten_komponentenarten1`
    FOREIGN KEY (`komponentenarten_ka_id` )
    REFERENCES `itv_v1`.`komponentenarten` (`ka_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `itv_v1`.`vorgangsarten`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `itv_v1`.`vorgangsarten` ;

CREATE  TABLE IF NOT EXISTS `itv_v1`.`vorgangsarten` (
  `v_id` INT NOT NULL ,
  `v_bezeichnung` VARCHAR(45) NULL COMMENT 'Einbau / Ausbau' ,
  PRIMARY KEY (`v_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `itv_v1`.`komponente_hat_komponente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `itv_v1`.`komponente_hat_komponente` ;

CREATE  TABLE IF NOT EXISTS `itv_v1`.`komponente_hat_komponente` (
  `komponenten_k_id_aggregat` INT NOT NULL ,
  `komponenten_k_id_teil` INT NOT NULL ,
  `khk_id` INT NOT NULL AUTO_INCREMENT ,
  `vorgangsarten_v_id` INT NOT NULL ,
  `khk_datum` DATE NULL ,
  INDEX `fk_komponenten_has_komponenten_komponenten2` (`komponenten_k_id_teil` ASC) ,
  INDEX `fk_komponenten_has_komponenten_komponenten1` (`komponenten_k_id_aggregat` ASC) ,
  PRIMARY KEY (`khk_id`) ,
  INDEX `fk_komponente_hat_komponente_vorgangsarten1` (`vorgangsarten_v_id` ASC) ,
  CONSTRAINT `fk_komponenten_has_komponenten_komponenten1`
    FOREIGN KEY (`komponenten_k_id_aggregat` )
    REFERENCES `itv_v1`.`komponenten` (`k_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_komponenten_has_komponenten_komponenten2`
    FOREIGN KEY (`komponenten_k_id_teil` )
    REFERENCES `itv_v1`.`komponenten` (`k_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_komponente_hat_komponente_vorgangsarten1`
    FOREIGN KEY (`vorgangsarten_v_id` )
    REFERENCES `itv_v1`.`vorgangsarten` (`v_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `itv_v1`.`komponentenattribute`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `itv_v1`.`komponentenattribute` ;

CREATE  TABLE IF NOT EXISTS `itv_v1`.`komponentenattribute` (
  `kat_id` INT NOT NULL ,
  PRIMARY KEY (`kat_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `itv_v1`.`wird_beschrieben_durch`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `itv_v1`.`wird_beschrieben_durch` ;

CREATE  TABLE IF NOT EXISTS `itv_v1`.`wird_beschrieben_durch` (
  `komponentenarten_ka_id` INT NOT NULL ,
  `komponentenattribute_kat_id` INT NOT NULL ,
  INDEX `fk_komponentenarten_has_komponentenattribute_komponentenattri1` (`komponentenattribute_kat_id` ASC) ,
  INDEX `fk_komponentenarten_has_komponentenattribute_komponentenarten1` (`komponentenarten_ka_id` ASC) ,
  PRIMARY KEY (`komponentenarten_ka_id`, `komponentenattribute_kat_id`) ,
  CONSTRAINT `fk_komponentenarten_has_komponentenattribute_komponentenarten1`
    FOREIGN KEY (`komponentenarten_ka_id` )
    REFERENCES `itv_v1`.`komponentenarten` (`ka_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_komponentenarten_has_komponentenattribute_komponentenattri1`
    FOREIGN KEY (`komponentenattribute_kat_id` )
    REFERENCES `itv_v1`.`komponentenattribute` (`kat_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `itv_v1`.`komponente_hat_attribute`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `itv_v1`.`komponente_hat_attribute` ;

CREATE  TABLE IF NOT EXISTS `itv_v1`.`komponente_hat_attribute` (
  `komponenten_k_id` INT NOT NULL ,
  `komponentenattribute_kat_id` INT NOT NULL ,
  `khkat_wert` VARCHAR(45) NULL ,
  PRIMARY KEY (`komponenten_k_id`, `komponentenattribute_kat_id`) ,
  INDEX `fk_komponenten_has_komponentenattribute_komponentenattribute1` (`komponentenattribute_kat_id` ASC) ,
  INDEX `fk_komponenten_has_komponentenattribute_komponenten1` (`komponenten_k_id` ASC) ,
  CONSTRAINT `fk_komponenten_has_komponentenattribute_komponenten1`
    FOREIGN KEY (`komponenten_k_id` )
    REFERENCES `itv_v1`.`komponenten` (`k_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_komponenten_has_komponentenattribute_komponentenattribute1`
    FOREIGN KEY (`komponentenattribute_kat_id` )
    REFERENCES `itv_v1`.`komponentenattribute` (`kat_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `itv_v1`.`zulaessige_werte`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `itv_v1`.`zulaessige_werte` ;

CREATE  TABLE IF NOT EXISTS `itv_v1`.`zulaessige_werte` (
  `zw_id` INT NOT NULL ,
  `zw_wert` VARCHAR(45) NULL ,
  PRIMARY KEY (`zw_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `itv_v1`.`komponentenattribut_hat_zulaessige_werte`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `itv_v1`.`komponentenattribut_hat_zulaessige_werte` ;

CREATE  TABLE IF NOT EXISTS `itv_v1`.`komponentenattribut_hat_zulaessige_werte` (
  `komponentenattribute_kat_id` INT NOT NULL ,
  `zulaessige_werte_zw_id` INT NOT NULL ,
  PRIMARY KEY (`komponentenattribute_kat_id`, `zulaessige_werte_zw_id`) ,
  INDEX `fk_komponentenattribute_has_zulaessige_werte_zulaessige_werte1` (`zulaessige_werte_zw_id` ASC) ,
  INDEX `fk_komponentenattribute_has_zulaessige_werte_komponentenattri1` (`komponentenattribute_kat_id` ASC) ,
  CONSTRAINT `fk_komponentenattribute_has_zulaessige_werte_komponentenattri1`
    FOREIGN KEY (`komponentenattribute_kat_id` )
    REFERENCES `itv_v1`.`komponentenattribute` (`kat_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_komponentenattribute_has_zulaessige_werte_zulaessige_werte1`
    FOREIGN KEY (`zulaessige_werte_zw_id` )
    REFERENCES `itv_v1`.`zulaessige_werte` (`zw_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
