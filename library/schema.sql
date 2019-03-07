-- phpMyAdmin SQL Dump
-- version 4.7.8
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 13, 2019 at 02:45 AM
-- Server version: 5.7.22-0ubuntu18.04.1
-- PHP Version: 7.2.10-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `o_concept`
--

-- --------------------------------------------------------

--
-- Table structure for table `bidding`
--

CREATE TABLE `bidding` (
  `id` int(11) NOT NULL,
  `product_id` int(9) DEFAULT NULL,
  `supplier_id` int(9) DEFAULT NULL,
  `starting_amount` decimal(10,2) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT 'open'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bidding`
--

INSERT INTO `bidding` (`id`, `product_id`, `supplier_id`, `starting_amount`, `date`, `status`) VALUES
(1, 4, 1, '500.00', '2019-01-12', 'open');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(9) NOT NULL,
  `product_id` int(9) DEFAULT NULL,
  `user_id` int(9) DEFAULT NULL,
  `unit_cost` decimal(10,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(9) NOT NULL,
  `description` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `description`) VALUES
(1, 'Raw materials');

-- --------------------------------------------------------

--
-- Table structure for table `courier`
--

CREATE TABLE `courier` (
  `id` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courier`
--

INSERT INTO `courier` (`id`, `name`, `description`) VALUES
(1, 'LBC HARI NG PADALA', 'HJDioheifjwpei');

-- --------------------------------------------------------

--
-- Table structure for table `customer_bids`
--

CREATE TABLE `customer_bids` (
  `id` int(9) NOT NULL,
  `bidding_id` int(9) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `user_id` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_bids`
--

INSERT INTO `customer_bids` (`id`, `bidding_id`, `amount`, `user_id`) VALUES
(1, 1, '500.50', NULL),
(2, 1, '500.50', 2);

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `id` int(11) NOT NULL,
  `tracking_number` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `orderdetails_id` int(11) NOT NULL,
  `description` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `courier_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`id`, `tracking_number`, `orderdetails_id`, `description`, `status`, `courier_id`) VALUES
(1, '0934202-234234-24234', 1, 'ipdqwiwueqiweipqwesfjs', 'ajhdqouhoq', 1);

-- --------------------------------------------------------

--
-- Table structure for table `messaging`
--

CREATE TABLE `messaging` (
  `id` int(11) NOT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `body` int(11) DEFAULT NULL,
  `date_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `supplier_id` int(9) DEFAULT NULL,
  `customer_id` int(9) DEFAULT NULL,
  `description` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(9) UNSIGNED NOT NULL,
  `user_id` int(9) UNSIGNED NOT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `code` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_number` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total_amount`, `date`, `code`, `status`, `order_number`) VALUES
(1, 1, '117.60', '2019-01-12', NULL, NULL, 20519107);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(9) NOT NULL,
  `product_id` int(9) DEFAULT NULL,
  `unit_cost` decimal(10,2) DEFAULT NULL,
  `quantity` int(9) DEFAULT NULL,
  `order_id` int(9) DEFAULT NULL,
  `total_cost` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `product_id`, `unit_cost`, `quantity`, `order_id`, `total_cost`) VALUES
(1, 2, '0.35', 36, 1, '12.60'),
(2, 3, '3.00', 35, 1, '105.00');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `order_id` int(9) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `date_time` datetime DEFAULT NULL,
  `customer_id` int(9) DEFAULT NULL,
  `supplier_id` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(9) DEFAULT NULL,
  `cost` decimal(10,2) DEFAULT NULL,
  `quantity` int(9) DEFAULT NULL,
  `reordering_point` int(9) DEFAULT NULL,
  `supplier_id` int(9) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `code` int(9) NOT NULL,
  `image` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `category_id`, `cost`, `quantity`, `reordering_point`, `supplier_id`, `date_added`, `code`, `image`) VALUES
(2, 'Sewing kit', 'Sewing kit', 4, '0.35', 954, 50, 1, NULL, 0, ''),
(3, 'Pencil case', 'steel box pencil case', 4, '3.00', 465, 10, 1, NULL, 0, ''),
(4, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(5, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(6, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(7, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(8, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(9, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(10, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(11, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(12, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(13, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(14, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(15, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(16, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(17, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(18, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(19, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(20, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(21, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(22, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(23, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(24, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(25, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(26, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(27, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(28, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(29, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(30, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(31, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(32, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(33, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(34, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(35, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(36, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(37, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(38, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(39, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(40, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(41, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(42, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(43, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(44, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(45, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(46, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(47, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(48, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(49, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(50, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(51, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(52, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(53, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(54, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(55, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(56, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(57, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(58, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(59, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(60, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(61, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(62, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(63, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(64, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(65, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(66, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(67, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(68, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(69, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(70, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(71, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(72, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(73, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(74, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(75, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(76, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(77, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(78, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(79, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(80, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(81, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(82, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(83, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(84, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(85, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(86, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(87, 'New product 1', 'Sample description', 4, '0.50', 500, 10, 1, NULL, 0, ''),
(88, 'New product 2', 'Sample Description', 4, '0.40', 1500, 10, 1, NULL, 0, ''),
(89, 'New product 2', 'Sample Description', 4, '0.40', 1500, 10, 1, NULL, 0, ''),
(90, 'New product 2', 'Sample Description', 4, '0.40', 1500, 10, 1, NULL, 0, ''),
(91, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(92, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(93, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(94, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(95, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(96, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(97, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(98, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(99, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(100, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(101, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(102, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(103, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(104, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(105, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(107, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(108, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(109, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(110, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(111, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(112, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(113, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(114, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(115, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(116, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(117, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(118, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(119, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(120, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(121, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(122, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(123, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(124, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(125, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(126, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(127, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(128, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(129, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(130, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(131, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(132, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(133, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(134, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(135, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(136, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(137, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(138, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(139, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(140, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(141, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(142, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(143, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(144, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(145, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(146, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(147, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(148, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(149, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(150, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(151, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(152, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(153, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(154, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(155, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(156, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(157, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(158, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(159, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(160, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(161, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(162, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(163, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(164, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(165, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(166, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(167, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(168, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(169, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(170, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(171, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(172, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(173, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(174, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(175, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(176, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(177, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(178, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(179, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(180, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(181, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(182, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(183, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(184, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(185, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(186, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(187, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(188, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(189, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(190, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(191, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(192, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(193, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(194, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(195, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(196, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(197, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(198, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(199, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(200, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(201, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(202, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(203, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(204, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(205, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(206, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(207, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(208, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(209, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(210, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(211, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(212, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(213, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(214, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(215, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(216, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(217, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(218, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(219, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(220, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(221, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(222, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(223, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(224, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(225, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(226, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(227, 'New product 2', 'sample description of product 2', 4, '0.45', 1500, 10, 1, NULL, 0, ''),
(228, 'Coffee', 'is life man.', 4, '0.35', 999999999, 10, NULL, '2018-12-24 06:02:27', 0, ''),
(229, 'Coffee', 'is life man.', 4, '0.35', 999999999, 10, 1, '2018-12-24 06:03:13', 0, ''),
(230, 'Coffee', 'is life man.', 4, '0.35', 999999999, 10, 1, '2018-12-24 06:06:21', 0, ''),
(231, 'Coffee', 'is life man.', 4, '0.35', 999999999, 10, 1, '2018-12-24 06:12:25', 0, ''),
(232, 'Coffee', 'is life man.', 4, '0.35', 999999999, 10, 1, '2018-12-24 06:21:02', 0, ''),
(233, 'Coffee', 'is life man.', 4, '0.35', 999999999, 10, 1, '2019-01-05 02:12:57', 0, ''),
(234, 'Coffee asdasd', 'is life man.', 4, '0.35', 999999999, 10, 1, '2019-01-05 02:13:43', 0, ''),
(235, 'Coffee asdasd', 'is life man.', 4, '0.35', 999999999, 10, 1, '2019-01-05 02:21:03', 0, ''),
(236, 'Coffee black', 'is life man.', 4, '0.35', 999999999, 10, 1, '2019-01-05 02:21:25', 0, ''),
(237, 'Coffee black', 'is life man.', 4, '0.35', 999999999, 10, 1, '2019-01-05 02:52:48', 0, ''),
(238, 'Coffee sadasdfafaf', 'is life man.', 4, '0.35', 999999999, 10, 1, '2019-01-05 02:53:58', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `returns`
--

CREATE TABLE `returns` (
  `id` int(9) NOT NULL,
  `order_details_id` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int(9) UNSIGNED NOT NULL,
  `description` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `description`) VALUES
(1, 'Admin'),
(2, 'Customer'),
(3, 'Seller');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(9) UNSIGNED NOT NULL,
  `name` varchar(75) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(75) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(75) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(75) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_id` int(9) DEFAULT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `is_admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `contact`, `address`, `type_id`, `is_verified`, `is_admin`) VALUES
(1, 'Admin admin', 'oconceptadmin@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '09235760695', 'bacolod city', 1, 1, 1),
(2, 'oconceptseller', 'oconceptseller@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '+639235760695', 'bacolod', 3, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bidding`
--
ALTER TABLE `bidding`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courier`
--
ALTER TABLE `courier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_bids`
--
ALTER TABLE `customer_bids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messaging`
--
ALTER TABLE `messaging`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `returns`
--
ALTER TABLE `returns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bidding`
--
ALTER TABLE `bidding`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courier`
--
ALTER TABLE `courier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_bids`
--
ALTER TABLE `customer_bids`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `messaging`
--
ALTER TABLE `messaging`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=239;

--
-- AUTO_INCREMENT for table `returns`
--
ALTER TABLE `returns`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
