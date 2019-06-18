CREATE TABLE `cars` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`brand_id` int(11) NOT NULL,
	`model_id` int(11) NOT NULL,
	`engine_capacity` int(11) NOT NULL,
	`max_speed` int(11) NOT NULL,
	`price` int(11) NOT NULL,
	`year` int(11) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `color_cars` (
	`color_id` int(11) NOT NULL,
	`car_id` int(11) NOT NULL
);

CREATE TABLE `color` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`color` char(50) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `model` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`model` char(50) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `brand` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`brand` char(50) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `orders` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`client_name` char(50) NOT NULL,
	`car_id` int(11) NOT NULL,
	`payments` enum('cash','credit card') NOT NULL,
	PRIMARY KEY (`id`)
);

ALTER TABLE `cars` ADD CONSTRAINT `cars_fk0` FOREIGN KEY (`brand_id`) REFERENCES `brand`(`id`);

ALTER TABLE `cars` ADD CONSTRAINT `cars_fk1` FOREIGN KEY (`model_id`) REFERENCES `model`(`id`);

ALTER TABLE `color_cars` ADD CONSTRAINT `color_cars_fk0` FOREIGN KEY (`color_id`) REFERENCES `color`(`id`);

ALTER TABLE `color_cars` ADD CONSTRAINT `color_cars_fk1` FOREIGN KEY (`car_id`) REFERENCES `cars`(`id`);

ALTER TABLE `orders` ADD CONSTRAINT `orders_fk0` FOREIGN KEY (`car_id`) REFERENCES `cars`(`id`);

