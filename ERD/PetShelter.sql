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
-- Table `mydb`.`employee`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`employee` (
  `employee_id` INT NOT NULL AUTO_INCREMENT,
  `employee_name` VARCHAR(45) NULL,
  `employee_conctact` VARCHAR(45) NULL,
  `employee_address` VARCHAR(45) NULL,
  PRIMARY KEY (`employee_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`rescuer`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`rescuer` (
  `rescuer_id` INT NOT NULL AUTO_INCREMENT,
  `rescuer_name` VARCHAR(45) NULL,
  `rescuer_contact` VARCHAR(45) NULL,
  `rescuer_address` VARCHAR(45) NULL,
  PRIMARY KEY (`rescuer_id`))
ENGINE = InnoDB;




-- -----------------------------------------------------
-- Table `mydb`.`donation`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`donation` (
  `donation_id` INT NOT NULL AUTO_INCREMENT,
  `donation_amount` VARCHAR(45) NULL,
  `donation_date` DATE NULL,
  `donation_method` VARCHAR(45) NULL,
  PRIMARY KEY (`donation_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`adopter`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`adopter` (
  `adopter_id` INT NOT NULL AUTO_INCREMENT,
  `adopter_name` VARCHAR(45) NULL,
  `adopter_contact` VARCHAR(45) NULL,
  PRIMARY KEY (`adopter_id`))
ENGINE = InnoDB;



-- -----------------------------------------------------
-- Table `mydb`.`donation1`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`donation1` (
  `donation1_id` INT NOT NULL AUTO_INCREMENT,
  `donation1_type` VARCHAR(45) NULL,
  `donation1_date` VARCHAR(45) NULL,
  PRIMARY KEY (`donation1_id`))
ENGINE = InnoDB;








-- -----------------------------------------------------
-- Table `mydb`.`animal`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`animal` (
  `animal_id` INT NOT NULL AUTO_INCREMENT,
  `animal_name` VARCHAR(45) NOT NULL,
  `animal_color` VARCHAR(45) NOT NULL,
  `animal_age` INT NOT NULL,
  `animal_breed` VARCHAR(45) NOT NULL,
  `animal_sick` VARCHAR(45) NOT NULL,
  `rescuer_id` INT NOT NULL,
  `employee_id` INT NOT NULL,
  `adopter_id` INT NOT NULL,
  `rescue_date` DATE NOT NULL,
  `donation1_id` INT NULL,
  PRIMARY KEY (`animal_id`),
 # INDEX `fk_animal_employee_idx` (`employee_id` ASC) VISIBLE,
  #INDEX `fk_animal_rescuer1_idx` (`rescuer_id` ASC) VISIBLE,
  CONSTRAINT `fk_animal_employee`
    FOREIGN KEY (`employee_id`)
    REFERENCES `mydb`.`employee` (`employee_id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_animal_rescuer1`
    FOREIGN KEY (`rescuer_id`)
    REFERENCES `mydb`.`rescuer` (`rescuer_id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;





-- -----------------------------------------------------
-- Table `mydb`.`transaction1`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`transaction1` (
  `animal_id` INT NOT NULL,
  `donation_id` INT NOT NULL,
  PRIMARY KEY (`animal_id`, `donation_id`),
  #INDEX `fk_transaction1_donation1_idx` (`donation_id` ASC) VISIBLE,
  CONSTRAINT `fk_transaction1_animal1`
    FOREIGN KEY (`animal_id`)
    REFERENCES `mydb`.`animal` (`animal_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_transaction1_donation1`
    FOREIGN KEY (`donation_id`)
    REFERENCES `mydb`.`donation` (`donation_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`transaction2`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`transaction2` (
  `animal_id` INT NOT NULL,
  `donation1_id` INT NOT NULL,
  PRIMARY KEY (`animal_id`, `donation1_id`),
 # INDEX `fk_transaction2_donation11_idx` (`donation1_id` ASC) VISIBLE,
  CONSTRAINT `fk_transaction2_animal1`
    FOREIGN KEY (`animal_id`)
    REFERENCES `mydb`.`animal` (`animal_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_transaction2_donation11`
    FOREIGN KEY (`donation1_id`)
    REFERENCES `mydb`.`donation1` (`donation1_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;





-- -----------------------------------------------------
-- Table `mydb`.`adapting`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`adapting` (
  `animal_id` INT NOT NULL,
  `adopter_id` INT NOT NULL,
  PRIMARY KEY (`animal_id`, `adopter_id`),
 # INDEX `fk_adapting_adopter1_idx` (`adopter_id` ASC) VISIBLE,
  CONSTRAINT `fk_adapting_animal1`
    FOREIGN KEY (`animal_id`)
    REFERENCES `mydb`.`animal` (`animal_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_adapting_adopter1`
    FOREIGN KEY (`adopter_id`)
    REFERENCES `mydb`.`adopter` (`adopter_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
