CREATE TABLE `cars` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`brand` char(50) NOT NULL,
	`model` char(50) NOT NULL,
	`model_name` char(50) NOT NULL,
	`engine_capacity` char(50) NOT NULL,
	`color` char(50) NOT NULL,
	`max_speed` INT(11) NOT NULL,
	`price` INT(11) NOT NULL,
	`year` INT(11) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `model` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`model` char(50) NOT NULL ,
	PRIMARY KEY (`id`)
);

CREATE TABLE `brand` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`brand` char(50) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `color` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`color` char(50) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `color_cars` (
	`color_id` INT(11) NOT NULL,
	`car_id` INT(11) NOT NULL
);

CREATE TABLE `orders` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`first_name_client` char(50) NOT NULL,
	`last_name_client` char(50) NOT NULL,
	`payments` enum('cash','credit card') NOT NULL,
	PRIMARY KEY (`id`)
);

ALTER TABLE `model` ADD CONSTRAINT `model_fk0` FOREIGN KEY (`id`) REFERENCES `cars`(`id`);

ALTER TABLE `brand` ADD CONSTRAINT `brand_fk0` FOREIGN KEY (`id`) REFERENCES `cars`(`id`);

ALTER TABLE `color_cars` ADD CONSTRAINT `color_cars_fk0` FOREIGN KEY (`color_id`) REFERENCES `color`(`id`);

ALTER TABLE `color_cars` ADD CONSTRAINT `color_cars_fk1` FOREIGN KEY (`car_id`) REFERENCES `cars`(`id`);

ALTER TABLE `orders` ADD CONSTRAINT `orders_fk0` FOREIGN KEY (`id`) REFERENCES `cars`(`id`);

