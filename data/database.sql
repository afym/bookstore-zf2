SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS bookstore DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE bookstore ;

-- -----------------------------------------------------
-- Table category
-- -----------------------------------------------------
CREATE  TABLE categories (
  id INT NOT NULL AUTO_INCREMENT ,
  name VARCHAR(255) NOT NULL ,
  PRIMARY KEY (id) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table book
-- -----------------------------------------------------
CREATE  TABLE books (
  id INT NOT NULL AUTO_INCREMENT ,
  category_id INT NULL,
  title VARCHAR(255) NOT NULL ,
  isbn CHAR(13) NOT NULL ,
  author VARCHAR(255) NOT NULL ,
  PRIMARY KEY (id) ,
  INDEX fk_book_Category_idx (category_id ASC) ,
  CONSTRAINT fk_book_Category
    FOREIGN KEY (category_id )
    REFERENCES categories (id )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
