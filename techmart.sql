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
	`product_description` varchar(500) NOT NULL DEFAULT 'No description available',
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
	`user_id` INT NOT NULL
);

ALTER TABLE `products` ADD CONSTRAINT `products_fk0` FOREIGN KEY (`category_id`) REFERENCES `categories`(`category_id`);

ALTER TABLE `products` ADD CONSTRAINT `products_fk1` FOREIGN KEY (`vendor_id`) REFERENCES `vendors`(`vendor_id`);

ALTER TABLE `carts` ADD CONSTRAINT `carts_fk0` FOREIGN KEY (`product_id`) REFERENCES `products`(`product_id`);

ALTER TABLE `carts` ADD CONSTRAINT `carts_fk1` FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`);
