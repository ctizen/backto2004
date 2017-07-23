CREATE TABLE `entity` (
  `id` INT AUTO_INCREMENT,
  `title` VARCHAR(255) NOT NULL,
  `description` TEXT,
  `cost` DECIMAL(10,2) NOT NULL,
  `img` VARCHAR(255),
  `deleted` SMALLINT NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `cost` (`cost`),
  KEY `deleted` (`deleted`) -- might be useful when cleaning up database
) ENGINE=InnoDB;
