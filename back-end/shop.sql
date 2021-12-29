-- -----------------------------------------------------
-- Schema miniproject
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `miniproject` ;

-- -----------------------------------------------------
-- Schema miniproject
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `miniproject` ;
USE `miniproject` ;

-- -----------------------------------------------------
-- Table `miniproject`.`product`
-- -----------------------------------------------------

DROP TABLE IF EXISTS `miniproject`.`product`;
DROP TABLE IF EXISTS `miniproject`.`customer`;
DROP TABLE IF EXISTS `miniproject`.`order`;
DROP TABLE IF EXISTS `miniproject`.`productlist`;
DROP TABLE IF EXISTS `miniproject`.`deliver_address`;




CREATE TABLE IF NOT EXISTS `miniproject`.`product` (
  `product_id` INT AUTO_INCREMENT,
  `product_name` VARCHAR(100) NULL DEFAULT NULL,
  `category` VARCHAR(100) NULL DEFAULT NULL,
  `country_of_origin` VARCHAR(100) NULL DEFAULT NULL,
  `price` FLOAT NULL DEFAULT NULL,
  `weight` FLOAT NULL DEFAULT NULL,
  `calories` INT NULL DEFAULT NULL,
  `stock` INT NULL DEFAULT NULL,
  `description` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`product_id`));


-- -----------------------------------------------------
-- Table `miniproject`.`customer`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `miniproject`.`customer` (
  `customer_id` INT AUTO_INCREMENT ,
  `first_name` VARCHAR(100) NULL DEFAULT NULL,
  `last_name` VARCHAR(100) NULL DEFAULT NULL,
  `mobile_number` VARCHAR(11) NULL DEFAULT NULL,
  `other_number` VARCHAR(11) NULL DEFAULT NULL,
  `last_access` DATE  NOT NULL,
  PRIMARY KEY (`customer_id`));


-- -----------------------------------------------------
-- Table `miniproject`.`order`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `miniproject`.`order` (
  `order_id` INT  AUTO_INCREMENT,
  `customer_id` INT NOT NULL UNIQUE,
  PRIMARY KEY (`order_id`, `customer_id`),
  UNIQUE INDEX `idBasket` (`order_id` ASC) VISIBLE,
  CONSTRAINT `customer_id`
    FOREIGN KEY (`customer_id`)
    REFERENCES `miniproject`.`customer` (`customer_id`));


-- -----------------------------------------------------
-- Table `mydb`.`productlist`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `miniproject`.`productlist` (
  `order_id` INT AUTO_INCREMENT,
  `product_id` INT NOT NULL ,
  PRIMARY KEY (`order_id`, `product_id`),
  INDEX `product_id_idx` (`product_id` ASC) VISIBLE,
    FOREIGN KEY (`product_id`)
    REFERENCES `miniproject`.`product` (`product_id`),
    FOREIGN KEY (`order_id`)
    REFERENCES `miniproject`.`order` (`order_id`)
    );


-- -----------------------------------------------------
-- Table `miniproject`.`deliver_address`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `miniproject`.`deliver_address` (
  `order_id` INT NOT NULL UNIQUE,
  `address_line_1` VARCHAR(100) NOT NULL,
  `address_line_2` VARCHAR(100) NULL DEFAULT NULL,
  `city` VARCHAR(100) NULL DEFAULT NULL,
  `county` VARCHAR(100) NULL DEFAULT NULL,
  `postal_code` VARCHAR(100) NULL DEFAULT NULL,
  PRIMARY KEY (`order_id`),
    FOREIGN KEY (`order_id`)
    REFERENCES `miniproject`.`order` (`order_id`));






