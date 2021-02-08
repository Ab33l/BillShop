-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2021 at 05:29 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `billshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Categoryid` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Parent` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Categoryid`, `Name`, `Parent`) VALUES
(1, 'Fruit', 0),
(2, 'Vegetables', 0),
(3, 'Cereals', 0),
(4, 'Herbs', 0),
(5, 'Spices', 0),
(6, 'Berries', 1),
(7, 'Pits', 1),
(8, 'Core', 1),
(9, 'Citrus Fruits', 1),
(10, 'Melons', 1),
(11, 'Tropical Fruits', 1),
(12, 'Tubers', 2),
(13, 'Bulbs', 2),
(14, 'Flowers', 2),
(15, 'Leaves', 2),
(16, 'Roots', 2),
(17, 'Stems', 2),
(18, 'Seeds', 3),
(19, 'Dried Herbs', 4),
(20, 'Fresh Herbs', 4),
(21, 'Dried Spices', 5),
(22, 'Spice Blends', 5),
(24, 'Legumes', 3),
(25, 'Nuts', 3);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `firstname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `email`, `phone`, `address`, `created`, `modified`, `status`, `firstname`, `lastname`, `description`) VALUES
(1, 'testuser@gmail.com', '9999999999', 'New York, NY, USA', '2016-08-17 08:21:25', '2016-08-17 08:21:25', '1', 'Test ', 'User', 'Very fragile. Hold Up.'),
(2, 'amoskibe@yahoo.com', '0711000333', 'Kenya meat Commission, 2nd floor', '2017-11-10 00:00:00', '2017-11-10 00:00:00', '1', 'Amos', 'Kibet', 'To be delivered by 9AM'),
(3, 'abellwasike@gmail.com', '0702675898', 'Langata Akila Room 4', '2017-11-14 04:21:45', '2017-11-14 04:22:57', '1', 'Abel', 'Wasike', 'Handle with Care'),
(4, 'cyril@gmail.com', '0702675898', 'Huddersfield, 2nd Floor', '2018-06-04 13:11:13', '2017-11-14 05:44:26', '1', 'Cyril', 'Odhiambo', '	Take your time\r\n		');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `total_price` float(10,2) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `total_price`, `created`, `modified`, `status`) VALUES
(1, 1, 120.00, '2017-11-05 10:37:51', '2017-11-05 10:37:51', '1'),
(2, 1, 25.00, '2017-11-05 12:04:46', '2017-11-05 12:04:46', '1'),
(4, 1, 25.00, '2017-11-05 12:55:48', '2017-11-05 12:55:48', '1'),
(5, 1, 15.00, '2017-11-05 13:08:49', '2017-11-05 13:08:49', '1'),
(6, 1, 15.00, '2017-11-05 14:32:00', '2017-11-05 14:32:00', '1'),
(39, 1, 12.00, '2017-11-13 16:41:33', '2017-11-13 16:41:33', '1'),
(40, 3, 35.40, '2017-11-14 03:09:43', '2017-11-14 03:09:43', '1'),
(41, 4, 12.00, '2017-11-14 03:44:33', '2017-11-14 03:44:33', '1'),
(42, 4, 46.40, '2017-11-14 04:13:04', '2017-11-14 04:13:04', '1'),
(43, 4, 23.00, '2017-11-14 04:19:17', '2017-11-14 04:19:17', '1'),
(44, 4, 12.40, '2017-11-14 04:32:48', '2017-11-14 04:32:48', '1'),
(45, 4, 12.00, '2017-11-14 10:33:01', '2017-11-14 10:33:01', '1'),
(46, 4, 46.80, '2017-11-14 11:51:14', '2017-11-14 11:51:14', '1'),
(47, 4, 90.74, '2017-11-14 12:22:17', '2017-11-14 12:22:17', '1'),
(48, 4, 48.00, '2018-01-22 19:16:32', '2018-01-22 19:16:32', '1'),
(49, 4, 12.00, '2018-02-11 20:10:18', '2018-02-11 20:10:18', '1'),
(50, 4, 12.00, '2018-04-29 22:46:13', '2018-04-29 22:46:13', '1'),
(51, 4, 12.40, '2018-04-30 10:31:29', '2018-04-30 10:31:29', '1'),
(52, 4, 24.00, '2018-04-30 11:05:13', '2018-04-30 11:05:13', '1'),
(53, 4, 12.40, '2018-05-04 12:48:54', '2018-05-04 12:48:54', '1'),
(54, 4, 12.40, '2018-05-04 12:49:41', '2018-05-04 12:49:41', '1'),
(55, 4, 24.00, '2018-06-01 16:31:55', '2018-06-01 16:31:55', '1'),
(56, 4, 124.00, '2018-06-01 16:44:34', '2018-06-01 16:44:34', '1'),
(57, 4, 12.00, '2018-06-01 17:03:17', '2018-06-01 17:03:17', '1'),
(58, 4, 34.00, '2018-06-01 17:15:50', '2018-06-01 17:15:50', '1'),
(59, 4, 26.00, '2018-06-25 00:27:07', '2018-06-25 00:27:07', '1'),
(60, 0, 12.40, '2018-07-12 12:14:09', '2018-07-12 12:14:09', '1'),
(61, 0, 37.20, '2018-07-12 13:53:50', '2018-07-12 13:53:50', '1'),
(62, 0, 12.00, '2018-12-05 21:20:38', '2018-12-05 21:20:38', '1'),
(63, 0, 12.00, '2018-12-05 21:21:22', '2018-12-05 21:21:22', '1'),
(64, 0, 26.00, '2021-02-07 19:13:36', '2021-02-07 19:13:36', '1');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`) VALUES
(1, 1, 1, 3),
(2, 1, 2, 3),
(3, 2, 2, 1),
(6, 4, 2, 1),
(7, 5, 1, 1),
(8, 6, 1, 1),
(53, 39, 1, 1),
(54, 40, 5, 1),
(55, 40, 17, 1),
(56, 41, 1, 1),
(57, 42, 7, 1),
(58, 42, 5, 1),
(59, 43, 17, 1),
(60, 44, 5, 1),
(61, 45, 1, 1),
(62, 46, 4, 1),
(63, 46, 5, 2),
(64, 47, 7, 2),
(65, 47, 33, 2),
(66, 48, 1, 4),
(67, 49, 9, 1),
(68, 50, 9, 1),
(69, 51, 5, 1),
(70, 52, 1, 2),
(71, 53, 5, 1),
(72, 54, 5, 1),
(73, 55, 1, 2),
(74, 56, 5, 10),
(75, 57, 1, 1),
(76, 58, 7, 1),
(77, 59, 2, 1),
(78, 60, 5, 1),
(79, 61, 5, 3),
(80, 62, 1, 1),
(81, 63, 1, 1),
(82, 64, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `Productid` int(11) NOT NULL,
  `Category` int(11) DEFAULT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `UnitPrice` float DEFAULT NULL,
  `Image` varchar(250) DEFAULT NULL,
  `date_added` datetime NOT NULL,
  `Deleted` int(11) DEFAULT NULL,
  `Featured` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Productid`, `Category`, `Name`, `UnitPrice`, `Image`, `date_added`, `Deleted`, `Featured`) VALUES
(1, 6, 'Blue Bandana', 12, 'https://media.boohooman.com/i/boohooman/mzz38384_navy_xl?$product_image_category_page_2x$&fmt=webp', '2017-11-04 16:00:00', 0, 1),
(2, 6, 'Block Sweater Tracksuit', 26, 'https://media.boohooman.com/i/boohooman/mzz06541_black_xl?$product_image_category_page_2x$&fmt=webp', '2017-11-04 16:01:00', 0, 2),
(3, 6, 'Denim Shirt', 21, 'https://media.boohooman.com/i/boohooman/mzz01634_ice%20grey_xl?$product_image_category_page_2x$&fmt=webp', '2017-11-04 16:02:00', 0, 2),
(4, 6, 'Utility Cargo Pants', 22, 'https://media.boohooman.com/i/boohooman/mzz06160_pink_xl?$product_image_category_page_2x$&fmt=webp', '2017-11-04 16:03:00', 0, 2),
(5, 7, 'Multi-Colored Checked', 12.4, 'https://media.boohooman.com/i/boohooman/mzz17621_blue_xl?$product_image_category_page$&fmt=webp', '2017-11-04 16:05:00', 0, 1),
(6, 7, 'LongLine Trench Coat', 45.12, 'https://media.boohooman.com/i/boohooman/mzz03567_navy_xl?$product_image_category_page_2x$&fmt=webp', '0000-00-00 00:00:00', 0, 2),
(7, 8, 'Vert Multi-Striped', 34, 'https://media.boohooman.com/i/boohooman/mzz64146_silver_xl?$product_image_category_page$&fmt=webp', '2017-11-04 16:07:00', 0, 1),
(8, 8, 'Raglan Hoodie', 25.12, 'https://media.boohooman.com/i/boohooman/mzz05853_charcoal_xl?$product_image_category_page_2x$&fmt=webp', '2017-11-04 16:08:00', 0, 2),
(9, 9, 'Horizontal Multi-Striped', 12, 'https://media.boohooman.com/i/boohooman/mzz53769_black_xl?$product_image_category_page$&fmt=webp', '2017-11-04 16:09:00', 0, 1),
(10, 9, 'Pique Polo', 25.98, 'https://media.boohooman.com/i/boohooman/mzz05132_white_xl?$product_image_category_page_2x$&fmt=webp', '2017-11-04 16:10:00', 0, 2),
(11, 9, 'Chinese Collar Grandad', 10.11, 'https://media.boohooman.com/i/boohooman/mzz06758_white_xl?$product_image_category_page_2x$&fmt=webp', '2017-11-04 16:10:04', 0, 2),
(12, 10, 'Cable Knit Turtle Neck', 15.14, 'https://media.boohooman.com/i/boohooman/mzz05473_navy_xl?$product_image_category_page_2x$&fmt=webp', '2017-11-04 16:11:00', 0, 2),
(13, 10, 'Burna T-Shirt', 34, 'https://media.boohooman.com/i/boohooman/mzz38190_black_xl?$product_image_category_page$&fmt=webp', '2017-11-04 16:12:00', 0, 1),
(14, 11, 'TMT TrackSuit', 45, 'https://media.boohooman.com/i/boohooman/mzz27563_light%20blue_xl?$product_image_category_page$&fmt=webp', '2017-11-04 16:13:00', 0, 1),
(15, 11, 'Signature Tracksuit', 16.99, 'https://media.boohooman.com/i/boohooman/mzz27558_navy_xl?$product_image_category_page$&fmt=webp', '2017-11-04 16:14:00', 0, 3),
(16, 12, 'Swae TrackSuit', 29.61, 'https://media.boohooman.com/i/boohooman/mzz31292_white_xl?$product_image_category_page$&fmt=webp', '2017-11-04 16:15:00', 0, 1),
(17, 12, 'Summer Homme', 23, 'https://media.boohooman.com/i/boohooman/mzz32336_mint_xl?$product_image_category_page$&fmt=webp', '2017-11-04 16:16:00', 0, 1),
(18, 12, 'Paisley Sleeve', 12.45, 'https://media.boohooman.com/i/boohooman/mzz52798_white_xl?$product_image_category_page$&fmt=webp', '2017-11-04 16:18:00', 0, 3),
(19, 13, 'Oversized Blue Jumper', 34.21, 'https://media.boohooman.com/i/boohooman/mzz36287_blue_xl?$product_image_category_page$&fmt=webp', '2017-11-04 16:19:00', 0, 3),
(20, 13, 'Loose Fit Joogers', 12.54, 'https://media.boohooman.com/i/boohooman/mzz03933_grey%20marl_xl?$product_image_category_page_2x$&fmt=webp', '2017-11-04 16:20:00', 0, 3),
(21, 14, 'Crew Neck T-Shirt', 34.54, 'https://media.boohooman.com/i/boohooman/mzz29791_white_xl?$product_image_category_page_2x$&fmt=webp', '2017-11-04 16:21:00', 0, 3),
(22, 14, 'Fleece Hoodie', 23.46, 'https://media.boohooman.com/i/boohooman/mzz37358_black_xl?$product_image_category_page_2x$&fmt=webp', '2017-11-04 16:22:00', 0, 3),
(23, 15, 'Printed Socks', 12.78, 'https://media.boohooman.com/i/boohooman/mzz29517_white_xl?$product_image_category_page_2x$&fmt=webp', '2017-11-04 16:23:00', 0, 3),
(24, 15, '5 Pack Plain Socks', 12.45, 'https://media.boohooman.com/i/boohooman/mzz28872_white_xl?$product_image_category_page_2x$&fmt=webp', '2017-11-04 16:24:00', 0, 3),
(25, 16, 'Knitted Sock Trainer', 12.45, 'https://media.boohooman.com/i/boohooman/mzz30352_black_xl?$product_image_category_page_2x$&fmt=webp', '2017-11-04 16:24:00', 0, 4),
(26, 16, 'Hicker Panelled Trainers', 15.11, 'https://media.boohooman.com/i/boohooman/mzz37850_multi_xl?$product_image_category_page_2x$&fmt=webp', '2017-11-04 16:25:00', 0, 4),
(28, 17, 'White Trainers', 10.67, 'https://media.boohooman.com/i/boohooman/mzz37675_white_xl?$product_image_category_page_2x$&fmt=webp', '2017-11-04 16:30:00', 0, 4),
(29, 17, 'Flyknit Trainers', 12.23, 'https://media.boohooman.com/i/boohooman/mzz16569_black_xl?$product_image_category_page_2x$&fmt=webp', '2017-11-04 16:31:00', 0, 4),
(30, 18, 'Suede Boots', 34.11, 'https://media.boohooman.com/i/boohooman/mzz38272_grey_xl?$product_image_category_page_2x$&fmt=webp', '2017-11-04 16:32:00', 0, 4),
(31, 18, 'Tassel Loafers', 34.87, 'https://media.boohooman.com/i/boohooman/mzz37391_brown_xl?$product_image_category_page_2x$&fmt=webp', '2017-11-04 16:34:00', 0, 4),
(32, 19, 'Faux Suede Boots', 10.34, 'https://media.boohooman.com/i/boohooman/mzz38271_black_xl?$product_image_category_page_2x$&fmt=webp', '2017-11-04 16:36:00', 0, 4),
(33, 19, 'Patent Brogue', 11.37, 'https://media.boohooman.com/i/boohooman/mzz38217_black_xl?$product_image_category_page_2x$&fmt=webp', '2017-11-04 16:39:00', 0, 4),
(34, 20, 'Sole Hiker Trainers', 16.45, 'https://media.boohooman.com/i/boohooman/mzz38260_black_xl?$product_image_category_page_2x$&fmt=webp', '2017-11-04 16:40:00', 0, 5),
(35, 20, 'Weave PU Loafers', 78.21, 'https://media.boohooman.com/i/boohooman/mzz37388_black_xl?$product_image_category_page_2x$&fmt=webp', '2017-11-04 16:41:00', 0, 5),
(36, 21, 'Tassel Loafers', 78.06, 'https://media.boohooman.com/i/boohooman/mzz37390_black_xl?$product_image_category_page_2x$&fmt=webp', '2017-11-04 16:39:31', 0, 5),
(37, 21, 'Deboss Sliders', 65.98, 'https://media.boohooman.com/i/boohooman/mzz07672_black_xl?$product_image_category_page_2x$&fmt=webp', '2017-11-04 16:40:00', 0, 5),
(38, 22, 'Faux Leather Trainers', 67.99, 'https://media.boohooman.com/i/boohooman/mzz38220_black_xl?$product_image_category_page_2x$&fmt=webp', '2017-11-04 17:00:00', 0, 5),
(39, 22, 'Tie Dye Sliders', 55.55, 'https://media.boohooman.com/i/boohooman/mzz04698_multi_xl?$product_image_category_page_2x$&fmt=webp', '2017-11-04 17:07:13', 0, 5),
(40, 23, 'LaceFront Sliders', 34.43, 'https://media.boohooman.com/i/boohooman/mzz04697_black_xl?$product_image_category_page_2x$&fmt=webp', '0000-00-00 00:00:00', 0, 5),
(41, 23, 'Crocs Boots', 989.21, 'https://media.boohooman.com/i/boohooman/mzz38219_silver_xl?$product_image_category_page_2x$&fmt=webp', '0000-00-00 00:00:00', 0, 5),
(42, 6, 'Velour Tape TrackSuit', 23.56, 'https://media.boohooman.com/i/boohooman/mzz38999_brown_xl?$product_image_category_page$&fmt=webp', '2021-02-07 13:09:55', 0, 6),
(43, 6, 'Acid Watch TrackSuit', 12.54, 'https://media.boohooman.com/i/boohooman/mzz38784_charcoal_xl?$product_image_category_page$&fmt=webp', '2021-02-07 13:12:01', 0, 6),
(44, 7, 'ColorBlock TrackSuit', 500.23, 'https://media.boohooman.com/i/boohooman/mzz37093_black_xl?$product_image_category_page$&fmt=webp', '2021-02-07 13:12:01', 0, 6),
(45, 7, 'Graffiti Match', 453.21, 'https://media.boohooman.com/i/boohooman/mzz27300_black_xl?$product_image_category_page$&fmt=webp', '2021-02-07 13:12:01', 0, 6),
(46, 8, 'Drop Face Match', 789.21, 'https://media.boohooman.com/i/boohooman/mzz29542_blue_xl?$product_image_category_page$&fmt=webp', '2021-02-07 13:12:01', 0, 6),
(47, 8, 'Swae ColorBlock', 912, 'https://media.boohooman.com/i/boohooman/mzz31310_black_xl?$product_image_category_page$&fmt=webp', '2021-02-07 13:12:01', 0, 6),
(48, 9, 'Butterfly TrackSuit', 120.91, 'https://media.boohooman.com/i/boohooman/mzz31608_blue_xl?$product_image_category_page$&fmt=webp', '2021-02-07 13:12:01', 0, 6),
(49, 9, 'Block TrackSuit', 738.21, 'https://media.boohooman.com/i/boohooman/mzz31606_stone_xl?$product_image_category_page$&fmt=webp', '2021-02-07 13:12:01', 0, 6),
(50, 10, 'BackPrinted Ecru Hoodie', 17.9, 'https://media.boohooman.com/i/boohooman/mzz34860_grey_xl?$product_image_category_page$&fmt=webp', '2021-02-07 14:00:41', 0, 7),
(51, 10, 'Funnel Nick Gilet', 89.21, 'https://media.boohooman.com/i/boohooman/mzz34651_white_xl?$product_image_category_page$&fmt=webp', '2021-02-07 14:00:41', 0, 7),
(52, 11, 'Applique B T-Shirt', 89.91, 'https://media.boohooman.com/i/boohooman/mzz38164_black_xl?$product_image_category_page$&fmt=webp', '2021-02-07 14:00:41', 0, 7),
(53, 11, 'Utility Camo T-Shirt', 123.56, 'https://media.boohooman.com/i/boohooman/mzz38180_camo_xl?$product_image_category_page$&fmt=webp', '2021-02-07 14:00:41', 0, 7),
(54, 12, 'Utility Camo Jacket', 6789.21, 'https://media.boohooman.com/i/boohooman/mzz38006_camo_xl?$product_image_category_page$&fmt=webp', '2021-02-07 14:00:41', 0, 7),
(55, 12, 'Acid Wash T-Shirt', 981.21, 'https://media.boohooman.com/i/boohooman/mzz38165_charcoal_xl?$product_image_category_page$&fmt=webp', '2021-02-07 14:00:41', 0, 7),
(56, 13, 'Tie Dye T-Shirt', 1234, 'https://media.boohooman.com/i/boohooman/mzz38223_yellow_xl?$product_image_category_page$&fmt=webp', '2021-02-07 14:00:41', 0, 7),
(57, 13, 'Graffiti Oversized Print', 1209, 'https://media.boohooman.com/i/boohooman/mzz32033_stone_xl?$product_image_category_page$&fmt=webp', '2021-02-07 14:11:08', 0, 7);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Sessionid` int(11) NOT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `PhoneNumber` int(11) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Timestamp` datetime DEFAULT NULL,
  `UserType` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Sessionid`, `FirstName`, `LastName`, `Email`, `PhoneNumber`, `Password`, `Timestamp`, `UserType`) VALUES
(1, 'Abell', 'Wasike', 'abellwasike@gmail.com', 702676898, '$2y$10$OuF2rOUS1ag56E61Go.xv.At5KUN/mcEvxG5A0skicIZemkNqreS2', '2018-12-05 22:42:08', 'admin'),
(3, 'Leo', 'Messi', 'leomessi@gmail.com', 738272855, '$2y$10$zjwruNjPWK3K7.zEdsuN3.u0/nMvzpZZLalOZm22367MOeZcUMVZe', '2017-11-09 18:29:00', 'customer'),
(4, 'kawhi', 'leo', 'kawhileo@gmail.com', 702675898, '$2y$10$rqBc9FOV9REuOcmB5pNt8er/JbXp5gr7euYvDWkO6C3XnyIzPCbhq', NULL, 'agent'),
(5, 'Cyril', 'Odhiambo', 'cyril@gmail.com', 702675898, '$2y$10$OxOODQl.TVSxBMJrkcSk3OkozRzBSiBxShrl/jn.oirTSPiYoCgiy', NULL, 'user'),
(6, 'Alvin', 'Kamara', 'akamara@gmail.com', 701020304, '$2y$10$UD6A0TCFYoACaApgl2C8MeEybTQt2A26hOJaH17ryCdcOxS05f6.i', NULL, 'user'),
(7, 'Darius', 'Mutisya', 'dariusm@gmail.com', 701020304, '$2y$10$vZSODDrkw4KnhI9E1dz2OOm.FiKU5B/abNQv2q0YQqmAXnrIoW342', NULL, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Categoryid`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Productid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Sessionid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Categoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Sessionid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
