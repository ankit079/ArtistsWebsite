-- Create acme database for this project

CREATE DATABASE acme;

-- Create a table artist within the database

CREATE TABLE IF NOT EXISTS `artist` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `artist_name` char(100) NOT NULL,
    `lifespan` char(50) NOT NULL,
      `nationality` char(50) NOT NULL,
	        `portrait` MEDIUMBLOB NOT NULL
) 

-- Create a table painting within the database

CREATE TABLE IF NOT EXISTS `painting` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `title` char(100) NOT NULL,
  `finished` char(50) NOT NULL,
  `media` char(50) NOT NULL,
  `artist` char(100) NOT NULL,
  `style` char(50) NOT NULL,
  `image` MEDIUMBLOB NOT NULL,	
   FOREIGN KEY (`artist`) REFERENCES `artist`(`artist_name`)
) 

CREATE TABLE IF NOT EXISTS `subscriber` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
      `monthly_newsletter` INT DEFAULT 0,
        `breaking_news` INT DEFAULT 0,
          `unsubscribe` INT DEFAULT 0  
) ENGINE InnoDB;

CREATE TABLE IF NOT EXISTS `user` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `email` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
      `role` ENUM('user', 'admin') NOT NULL DEFAULT 'user'
) ENGINE InnoDB;

INSERT INTO USER (EMAIL,password,ROLE)
VALUES ('ankit079@gmail.com', '3248', 'admin');
