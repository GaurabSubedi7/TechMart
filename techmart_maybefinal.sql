CREATE TABLE `users` (
	`user_id` INT NOT NULL AUTO_INCREMENT,
	`first_name` varchar(255) NOT NULL,
	`last_name` varchar(255) NOT NULL,
	`username` varchar(255) NOT NULL UNIQUE,
	`phone_number` varchar(100),
	`email` varchar(255) NOT NULL UNIQUE,
	`address` varchar(255) NOT NULL,
	`password` varchar(400) NOT NULL,
	`status` BOOLEAN NOT NULL DEFAULT true,
	PRIMARY KEY (`user_id`)
);

CREATE TABLE `categories` (
	`category_id` INT NOT NULL AUTO_INCREMENT,
	`category_name` varchar(255) NOT NULL,
	PRIMARY KEY (`category_id`)
);

CREATE TABLE `products` (
	`product_id` INT NOT NULL AUTO_INCREMENT,
	`product_name` varchar(255) NOT NULL,
	`product_price` FLOAT(25,3) NOT NULL,
	`product_quantity` INT NOT NULL,
	`product_image` varchar(500) NOT NULL DEFAULT 'none',
	`category_id` INT NOT NULL,
	`vendor_id` INT NOT NULL,
	PRIMARY KEY (`product_id`)
);

CREATE TABLE `vendors` (
	`vendor_id` INT NOT NULL AUTO_INCREMENT,
	`vendor_name` varchar(255) NOT NULL,
	`phone_number` varchar(100) NOT NULL,
	`email` varchar(255) NOT NULL,
	`address` varchar(255) NOT NULL,
	`password` varchar(400) NOT NULL,
	`status` BOOLEAN NOT NULL DEFAULT true,
	PRIMARY KEY (`vendor_id`)
);

CREATE TABLE `carts` (
	`product_id` INT NOT NULL,
	`user_id` INT NOT NULL,
	`item_quantity` INT NOT NULL DEFAULT '1',
	PRIMARY KEY (`product_id`,`user_id`)
);

CREATE TABLE `avatars` (
	`avatar_id` INT NOT NULL AUTO_INCREMENT,
	`avatar_image` varchar(255) NOT NULL DEFAULT 'profile.jpg',
	PRIMARY KEY (`avatar_id`)
);

CREATE TABLE `user_avatars` (
	`user_id` INT NOT NULL,
	`avatar_id` INT NOT NULL,
	PRIMARY KEY (`user_id`,`avatar_id`)
);

CREATE TABLE `vendor_avatars` (
	`vendor_id` INT NOT NULL,
	`avatar_id` INT NOT NULL,
	PRIMARY KEY (`vendor_id`,`avatar_id`)
);

CREATE TABLE `descriptions` (
	`product_id` INT NOT NULL,
	`description_id` INT NOT NULL AUTO_INCREMENT,
	`ram` varchar(255),
	`screen_size` varchar(255),
	`refresh_rate` varchar(255),
	`resolution` varchar(255),
	`storage` varchar(255),
	`gpu` varchar(255),
	`cpu` varchar(255),
	`dpi` varchar(255),
	`programmable_buttons` varchar(255),
	`battery_power` varchar(255),
	`wireless` BOOLEAN NOT NULL DEFAULT false,
	`touchscreen` BOOLEAN NOT NULL DEFAULT false,
	`others` varchar(255),
	PRIMARY KEY (`description_id`)
);

ALTER TABLE `products` ADD CONSTRAINT `products_fk0` FOREIGN KEY (`category_id`) REFERENCES `categories`(`category_id`);

ALTER TABLE `products` ADD CONSTRAINT `products_fk1` FOREIGN KEY (`vendor_id`) REFERENCES `vendors`(`vendor_id`);

ALTER TABLE `carts` ADD CONSTRAINT `carts_fk0` FOREIGN KEY (`product_id`) REFERENCES `products`(`product_id`);

ALTER TABLE `carts` ADD CONSTRAINT `carts_fk1` FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`);

ALTER TABLE `user_avatars` ADD CONSTRAINT `user_avatars_fk0` FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`);

ALTER TABLE `user_avatars` ADD CONSTRAINT `user_avatars_fk1` FOREIGN KEY (`avatar_id`) REFERENCES `avatars`(`avatar_id`);

ALTER TABLE `vendor_avatars` ADD CONSTRAINT `vendor_avatars_fk0` FOREIGN KEY (`vendor_id`) REFERENCES `vendors`(`vendor_id`);

ALTER TABLE `vendor_avatars` ADD CONSTRAINT `vendor_avatars_fk1` FOREIGN KEY (`avatar_id`) REFERENCES `avatars`(`avatar_id`);

ALTER TABLE `descriptions` ADD CONSTRAINT `descriptions_fk0` FOREIGN KEY (`product_id`) REFERENCES `products`(`product_id`);

INSERT INTO `avatars` (`avatar_image`) VALUES ('1.png');
INSERT INTO `avatars` (`avatar_image`) VALUES ('2.jpg');
INSERT INTO `avatars` (`avatar_image`) VALUES ('3.png');
INSERT INTO `avatars` (`avatar_image`) VALUES ('4.jpeg');
INSERT INTO `avatars` (`avatar_image`) VALUES ('5.jpg');
INSERT INTO `avatars` (`avatar_image`) VALUES ('6.jpg');
INSERT INTO `avatars` (`avatar_image`) VALUES ('7.jpg');
INSERT INTO `avatars` (`avatar_image`) VALUES ('8.jpg');
INSERT INTO `avatars` (`avatar_image`) VALUES ('9.jpg');
INSERT INTO `avatars` (`avatar_image`) VALUES ('10.jpeg');
INSERT INTO `avatars` (`avatar_image`) VALUES ('11.jpg');
INSERT INTO `avatars` (`avatar_image`) VALUES ('12.jpg');
INSERT INTO `avatars` (`avatar_image`) VALUES ('13.jpg');
INSERT INTO `avatars` (`avatar_image`) VALUES ('14.png');
INSERT INTO `avatars` (`avatar_image`) VALUES ('15.png');
INSERT INTO `avatars` (`avatar_image`) VALUES ('16.jpg');
INSERT INTO `avatars` (`avatar_image`) VALUES ('18.jpg');
INSERT INTO `avatars` (`avatar_image`) VALUES ('19.jpeg');
INSERT INTO `avatars` (`avatar_image`) VALUES ('17.png');
INSERT INTO `avatars` (`avatar_image`) VALUES ('20.png');
INSERT INTO `avatars` (`avatar_image`) VALUES ('21.jpg');
INSERT INTO `avatars` (`avatar_image`) VALUES ('22.jpeg');
INSERT INTO `avatars` (`avatar_image`) VALUES ('23.png');
INSERT INTO `avatars` (`avatar_image`) VALUES ('24.jpg');
INSERT INTO `avatars` (`avatar_image`) VALUES ('25.jpg');
INSERT INTO `avatars` (`avatar_image`) VALUES ('26.jpg');
INSERT INTO `avatars` (`avatar_image`) VALUES ('27.png');
INSERT INTO `avatars` (`avatar_image`) VALUES ('28.png');