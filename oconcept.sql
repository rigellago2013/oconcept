-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.19 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for o_concept
CREATE DATABASE IF NOT EXISTS `o_concept` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `o_concept`;

-- Dumping structure for table o_concept.bidding
CREATE TABLE IF NOT EXISTS `bidding` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(9) DEFAULT NULL,
  `description` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT 'open',
  `title` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table o_concept.bidding: ~1 rows (approximately)
/*!40000 ALTER TABLE `bidding` DISABLE KEYS */;
INSERT INTO `bidding` (`id`, `user_id`, `description`, `date`, `status`, `title`) VALUES
	(1, 3, 'New bidding', '2019-01-28', 'open', 'new bid');
/*!40000 ALTER TABLE `bidding` ENABLE KEYS */;

-- Dumping structure for table o_concept.cart
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `product_id` int(9) DEFAULT NULL,
  `user_id` int(9) DEFAULT NULL,
  `unit_cost` decimal(10,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table o_concept.cart: ~2 rows (approximately)
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
INSERT INTO `cart` (`id`, `product_id`, `user_id`, `unit_cost`, `quantity`) VALUES
	(1, 1, 3, 0.50, 2),
	(2, 2, 3, 0.70, 2);
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;

-- Dumping structure for table o_concept.category
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `description` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table o_concept.category: ~2 rows (approximately)
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`id`, `description`) VALUES
	(1, 'Raw Materials'),
	(2, 'Concept Design'),
	(3, 'Souvenir Item');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;

-- Dumping structure for table o_concept.courier
CREATE TABLE IF NOT EXISTS `courier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table o_concept.courier: ~0 rows (approximately)
/*!40000 ALTER TABLE `courier` DISABLE KEYS */;
INSERT INTO `courier` (`id`, `name`, `description`, `rate`) VALUES
	(1, 'LBC', '', 150.00);
/*!40000 ALTER TABLE `courier` ENABLE KEYS */;

-- Dumping structure for table o_concept.delivery
CREATE TABLE IF NOT EXISTS `delivery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tracking_number` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` int(11) NOT NULL,
  `description` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `courier_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table o_concept.delivery: ~0 rows (approximately)
/*!40000 ALTER TABLE `delivery` DISABLE KEYS */;
INSERT INTO `delivery` (`id`, `tracking_number`, `order_id`, `description`, `status`, `courier_id`) VALUES
	(1, '0934202-234234-24234', 1, 'sample description', 'Not Delivered', 1);
/*!40000 ALTER TABLE `delivery` ENABLE KEYS */;

-- Dumping structure for table o_concept.messaging
CREATE TABLE IF NOT EXISTS `messaging` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `seller_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `body` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table o_concept.messaging: ~0 rows (approximately)
/*!40000 ALTER TABLE `messaging` DISABLE KEYS */;
INSERT INTO `messaging` (`id`, `seller_id`, `customer_id`, `body`, `date_time`) VALUES
	(1, 2, 3, 'This is a message to a person.', '2019-01-14 00:00:00');
/*!40000 ALTER TABLE `messaging` ENABLE KEYS */;

-- Dumping structure for table o_concept.notification
CREATE TABLE IF NOT EXISTS `notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(9) DEFAULT NULL,
  `description` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table o_concept.notification: ~0 rows (approximately)
/*!40000 ALTER TABLE `notification` DISABLE KEYS */;
INSERT INTO `notification` (`id`, `user_id`, `description`, `date`) VALUES
	(1, 2, 'product 123123 : mecahanical keyboard has reached reordering point.', '2019-01-15');
/*!40000 ALTER TABLE `notification` ENABLE KEYS */;

-- Dumping structure for table o_concept.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(9) unsigned NOT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `code` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_number` int(9) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table o_concept.orders: ~0 rows (approximately)
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` (`id`, `user_id`, `total_amount`, `date`, `code`, `status`, `order_number`) VALUES
	(1, 3, 117.60, '2019-01-12', NULL, NULL, 20519107);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;

-- Dumping structure for table o_concept.order_details
CREATE TABLE IF NOT EXISTS `order_details` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `product_id` int(9) DEFAULT NULL,
  `unit_cost` decimal(10,2) DEFAULT NULL,
  `quantity` int(9) DEFAULT NULL,
  `order_id` int(9) DEFAULT NULL,
  `total_cost` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table o_concept.order_details: ~2 rows (approximately)
/*!40000 ALTER TABLE `order_details` DISABLE KEYS */;
INSERT INTO `order_details` (`id`, `product_id`, `unit_cost`, `quantity`, `order_id`, `total_cost`) VALUES
	(1, 1, 0.35, 36, 1, 12.60),
	(2, 2, 3.00, 35, 1, 105.00),
	(3, 3, 3.00, 35, 1, 105.00),
	(4, 3, 3.00, 35, 1, 105.00);
/*!40000 ALTER TABLE `order_details` ENABLE KEYS */;

-- Dumping structure for table o_concept.payments
CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(9) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `date_time` datetime DEFAULT NULL,
  `customer_id` int(9) DEFAULT NULL,
  `supplier_id` int(9) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table o_concept.payments: ~0 rows (approximately)
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;

-- Dumping structure for table o_concept.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(9) DEFAULT NULL,
  `cost` decimal(10,2) DEFAULT NULL,
  `quantity` int(9) DEFAULT NULL,
  `reordering_point` int(9) DEFAULT NULL,
  `supplier_id` int(9) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `code` int(9) DEFAULT NULL,
  `image` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table o_concept.products: ~2 rows (approximately)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `name`, `description`, `category_id`, `cost`, `quantity`, `reordering_point`, `supplier_id`, `date_added`, `code`, `image`) VALUES
	(1, 'Mechanical Keyboard', 'Switch type mechanical keyboard', 2, 3000.99, 13, 10, 2, '2019-01-16 00:00:00', 123133345, '/app/images/12345.jpg'),
	(2, 'G-Sync Monitor', '160 Hz LED Monitor 15.6 inch', 2, 7800.00, 13, 10, 1, '2019-01-16 00:00:00', 1234213245, '/app/images/12345.jpg'),
	(3, 'Asus zenphone max pro m1', 'smart phone', 2, 7800.00, 13, 10, 1, '2019-01-16 00:00:00', 1234213245, '/app/images/12345.jpg');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Dumping structure for table o_concept.returns
CREATE TABLE IF NOT EXISTS `returns` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `order_details_id` int(9) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table o_concept.returns: ~0 rows (approximately)
/*!40000 ALTER TABLE `returns` DISABLE KEYS */;
/*!40000 ALTER TABLE `returns` ENABLE KEYS */;

-- Dumping structure for table o_concept.seller_bid
CREATE TABLE IF NOT EXISTS `seller_bid` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `bidding_id` int(9) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `user_id` int(9) DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table o_concept.seller_bid: ~0 rows (approximately)
/*!40000 ALTER TABLE `seller_bid` DISABLE KEYS */;
INSERT INTO `seller_bid` (`id`, `bidding_id`, `amount`, `user_id`, `status`, `date`) VALUES
	(1, 1, 300.00, 3, 'pending', '2019-01-28');
/*!40000 ALTER TABLE `seller_bid` ENABLE KEYS */;

-- Dumping structure for table o_concept.types
CREATE TABLE IF NOT EXISTS `types` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table o_concept.types: ~2 rows (approximately)
/*!40000 ALTER TABLE `types` DISABLE KEYS */;
INSERT INTO `types` (`id`, `description`) VALUES
	(2, 'Customer'),
	(3, 'Seller'),
	(4, 'Admin');
/*!40000 ALTER TABLE `types` ENABLE KEYS */;

-- Dumping structure for table o_concept.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(75) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(75) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(75) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(75) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_id` int(9) DEFAULT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table o_concept.users: ~10 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `contact`, `address`, `type_id`, `is_verified`, `is_admin`) VALUES
	(2, 'oconceptseller', 'oconceptseller@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '+639235760695', 'bacolod', 3, 1, 0),
	(3, 'Steve jobs', 'oconceptcustomer@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '12345678901', 'bacolod', 2, 1, 0),
	(15, 'RhixyRhix@yahoo.com', 'oconceptadmin@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '21312312', 'sadasdad', 4, 0, 0),
	(17, 'Maria Henna Pilla', 'hennapilla@yahoo.com', '5f4dcc3b5aa765d61d8327deb882cf99', '123456', 'Mansilingan Bacolod City', 3, 0, 0),
	(18, 'Ian Segunla', 'segunla@yahoo.com', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'Homesite', 3, 0, 0),
	(19, 'Tangina Moh Kah', 'iancliffgellaco@yahoo.com', '5f4dcc3b5aa765d61d8327deb882cf99', '09192490252', 'Bacolod', 2, 0, 0),
	(20, 'newuser', 'newuser@yahoo.com', '0354d89c28ec399c00d3cb2d094cf093', '09235760695', 'bacoloid', 2, 0, 0),
	(21, 'a new user', 'lalalala@yahoo.com', '5f4dcc3b5aa765d61d8327deb882cf99', '09235972', 'bacolod cityy', 2, 0, 0),
	(22, 'Harjea Aligan', 'harjea@yahoo.com', '5f4dcc3b5aa765d61d8327deb882cf99', '09192490252', 'Eroreco', 2, 0, 0),
	(23, 'Ian Cliff H Gellaco', 'igellaco@yahoo.com', '5f4dcc3b5aa765d61d8327deb882cf99', '09192490252', 'Eroreco', 2, 0, 0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table o_concept.user_address
CREATE TABLE IF NOT EXISTS `user_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `place_name` varchar(150) DEFAULT NULL,
  `province` varchar(150) DEFAULT NULL,
  `city` varchar(150) DEFAULT NULL,
  `barangay` varchar(150) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table o_concept.user_address: ~0 rows (approximately)
/*!40000 ALTER TABLE `user_address` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_address` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
