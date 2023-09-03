-- Create acme database for this project

CREATE DATABASE acme;

-- Create a table painting within the database

CREATE TABLE IF NOT EXISTS `painting` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `title` char(100) NOT NULL,
    `finished` char(50) NOT NULL,
      `media` char(50) NOT NULL,
        `artist` char(50) NOT NULL,
          `style` char(50) NOT NULL,
            `image` MEDIUMBLOB NOT NULL
) 



