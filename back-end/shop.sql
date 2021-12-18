-- -----------------------------------------------------
-- Schema shopright
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `shopright` ;

-- -----------------------------------------------------
-- Schema shopright
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `shopright` ;
USE `shopright` ;

-- -----------------------------------------------------
-- Table `shopright`.`product`
-- -----------------------------------------------------

DROP TABLE IF EXISTS `shopright`.`product`;
DROP TABLE IF EXISTS `shopright`.`customer`;
DROP TABLE IF EXISTS `shopright`.`order`;
DROP TABLE IF EXISTS `shopright`.`ProductList`;
DROP TABLE IF EXISTS `shopright`.`deliver address`;




CREATE TABLE IF NOT EXISTS `shopright`.`product` (
  `ProductId` INT AUTO_INCREMENT,
  `Product name` VARCHAR(100) NULL DEFAULT NULL,
  `Category` VARCHAR(100) NULL DEFAULT NULL,
  `Country of origin` VARCHAR(100) NULL DEFAULT NULL,
  `Price` FLOAT NULL DEFAULT NULL,
  `Weight` FLOAT NULL DEFAULT NULL,
  `Calories` INT NULL DEFAULT NULL,
  `Stock` INT NULL DEFAULT NULL,
  `Description` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`ProductId`));


-- -----------------------------------------------------
-- Table `shopright`.`customer`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `shopright`.`customer` (
  `CustomerId` INT AUTO_INCREMENT ,
  `First name` VARCHAR(100) NULL DEFAULT NULL,
  `Last name` VARCHAR(100) NULL DEFAULT NULL,
  `Mobile number` VARCHAR(11) NULL DEFAULT NULL,
  `Other number` VARCHAR(11) NULL DEFAULT NULL,
  `LastAccess` DATE  NOT NULL,
  PRIMARY KEY (`CustomerId`));


-- -----------------------------------------------------
-- Table `shopright`.`order`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `shopright`.`order` (
  `OrderId` INT  AUTO_INCREMENT,
  `CustomerId` INT NOT NULL UNIQUE,
  PRIMARY KEY (`OrderId`, `CustomerId`),
  UNIQUE INDEX `idBasket` (`OrderId` ASC) VISIBLE,
  CONSTRAINT `CustomerId`
    FOREIGN KEY (`CustomerId`)
    REFERENCES `shopright`.`customer` (`CustomerId`));


-- -----------------------------------------------------
-- Table `mydb`.`ProductList`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `shopright`.`ProductList` (
  `OrderId` INT AUTO_INCREMENT,
  `ProductId` INT NOT NULL ,
  PRIMARY KEY (`OrderId`, `ProductId`),
  INDEX `ProductId_idx` (`ProductId` ASC) VISIBLE,
    FOREIGN KEY (`ProductId`)
    REFERENCES `shopright`.`product` (`ProductId`),
    FOREIGN KEY (`OrderId`)
    REFERENCES `shopright`.`order` (`OrderId`)
    );


-- -----------------------------------------------------
-- Table `shopright`.`deliver address`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `shopright`.`deliver address` (
  `OrderId` INT NOT NULL UNIQUE,
  `Address Line 1` VARCHAR(100) NOT NULL,
  `Address Line  2` VARCHAR(100) NULL DEFAULT NULL,
  `City` VARCHAR(100) NULL DEFAULT NULL,
  `County` VARCHAR(100) NULL DEFAULT NULL,
  `Postal code` VARCHAR(100) NULL DEFAULT NULL,
  PRIMARY KEY (`OrderId`),
    FOREIGN KEY (`OrderId`)
    REFERENCES `shopright`.`order` (`OrderId`));






