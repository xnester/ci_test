SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `default_schema` ;
USE `default_schema` ;

-- -----------------------------------------------------
-- Table `default_schema`.`salesperson`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `default_schema`.`salesperson` (
  `id` INT(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(255) NOT NULL ,
  `phone` INT(6) NOT NULL ,
  `email` VARCHAR(255) NOT NULL ,
  `password` VARCHAR(64) NOT NULL ,
  `created` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00' ,
  `modified` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP ,
  PRIMARY KEY (`id`) )
ENGINE = MyISAM
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `default_schema`.`clients`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `default_schema`.`clients` (
  `id` INT(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT ,
  `cus_id` INT(6) UNSIGNED ZEROFILL NOT NULL COMMENT 'customer id' ,
  `name` VARCHAR(255) NOT NULL ,
  `email` VARCHAR(255) NOT NULL ,
  `phone` VARCHAR(255) NOT NULL ,
  `dealer_id` INT(6) NOT NULL ,
  `status` ENUM('Active','Suspend','Terminate') NOT NULL DEFAULT 'Active' ,
  `created` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00' ,
  `modified` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP ,
  `dealers_id` INT(6) UNSIGNED ZEROFILL NOT NULL ,
  PRIMARY KEY (`id`, `dealers_id`) ,
  UNIQUE INDEX `cus_id` (`cus_id` ASC) ,
  INDEX `fk_clients_dealers1` (`dealers_id` ASC) )
ENGINE = MyISAM
AUTO_INCREMENT = 126
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `default_schema`.`contacts`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `default_schema`.`contacts` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(128) NOT NULL ,
  `email` VARCHAR(255) NOT NULL ,
  `notes` TEXT NOT NULL ,
  `stamp` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP ,
  `ipaddress` VARCHAR(32) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = MyISAM
AUTO_INCREMENT = 10
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `default_schema`.`domains`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `default_schema`.`domains` (
  `id` INT(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(255) NOT NULL ,
  `registrar` VARCHAR(255) NOT NULL ,
  `created` DATE NOT NULL ,
  `expires` DATE NOT NULL ,
  `changed` DATE NOT NULL ,
  `nserver` VARCHAR(255) NOT NULL ,
  `status` ENUM('Suspend','Active') NOT NULL DEFAULT 'Active' ,
  `add` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00' ,
  `stamp` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP ,
  `note` LONGTEXT NOT NULL ,
  `clients_id` INT(6) UNSIGNED ZEROFILL NOT NULL ,
  PRIMARY KEY (`id`, `clients_id`) ,
  UNIQUE INDEX `domain_name` (`name` ASC) ,
  INDEX `fk_domains_clients` (`clients_id` ASC) )
ENGINE = MyISAM
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8
ROW_FORMAT = DYNAMIC;


-- -----------------------------------------------------
-- Table `default_schema`.`groups`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `default_schema`.`groups` (
  `id` INT(6) NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `description` TEXT NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `default_schema`.`products`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `default_schema`.`products` (
  `id` INT(6) NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(255) NOT NULL ,
  `description` TEXT NOT NULL ,
  `groups_id` INT(6) NOT NULL ,
  PRIMARY KEY (`id`, `groups_id`) ,
  INDEX `fk_products_groups1` (`groups_id` ASC) ,
  CONSTRAINT `fk_products_groups1`
    FOREIGN KEY (`groups_id` )
    REFERENCES `default_schema`.`groups` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `default_schema`.`hosts`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `default_schema`.`hosts` (
  `id` INT(6) NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `ip` VARCHAR(32) NOT NULL ,
  `free` INT NOT NULL ,
  `description` TEXT NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `default_schema`.`periods`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `default_schema`.`periods` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `description` TEXT NOT NULL ,
  `start` DATETIME NOT NULL ,
  `stop` DATETIME NOT NULL ,
  `year` YEAR NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `default_schema`.`services`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `default_schema`.`services` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `unit` INT NOT NULL ,
  `size` INT NOT NULL ,
  `periods_id` INT NOT NULL ,
  `domains_id` INT(6) UNSIGNED ZEROFILL NOT NULL ,
  `domains_clients_id` INT(6) UNSIGNED ZEROFILL NOT NULL ,
  PRIMARY KEY (`id`, `periods_id`, `domains_id`, `domains_clients_id`) ,
  INDEX `fk_services_periods1` (`periods_id` ASC) ,
  INDEX `fk_services_domains1` (`domains_id` ASC, `domains_clients_id` ASC) ,
  CONSTRAINT `fk_services_periods1`
    FOREIGN KEY (`periods_id` )
    REFERENCES `default_schema`.`periods` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_services_domains1`
    FOREIGN KEY (`domains_id` , `domains_clients_id` )
    REFERENCES `default_schema`.`domains` (`id` , `clients_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `default_schema`.`authorizations`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `default_schema`.`authorizations` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `description` TEXT NOT NULL ,
  `domains_id` INT(6) UNSIGNED ZEROFILL NOT NULL ,
  `domains_clients_id` INT(6) UNSIGNED ZEROFILL NOT NULL ,
  `products_id` INT(6) NOT NULL ,
  `products_groups_id` INT(6) NOT NULL ,
  PRIMARY KEY (`id`, `domains_id`, `domains_clients_id`, `products_id`, `products_groups_id`) ,
  INDEX `fk_authorizations_domains1` (`domains_id` ASC, `domains_clients_id` ASC) ,
  INDEX `fk_authorizations_products1` (`products_id` ASC, `products_groups_id` ASC) ,
  CONSTRAINT `fk_authorizations_domains1`
    FOREIGN KEY (`domains_id` , `domains_clients_id` )
    REFERENCES `default_schema`.`domains` (`id` , `clients_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_authorizations_products1`
    FOREIGN KEY (`products_id` , `products_groups_id` )
    REFERENCES `default_schema`.`products` (`id` , `groups_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
