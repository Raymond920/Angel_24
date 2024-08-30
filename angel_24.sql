-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 30, 2024 at 02:02 AM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `angel_24`
--
CREATE DATABASE IF NOT EXISTS `angel_24` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `angel_24`;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `Product_ID` int NOT NULL AUTO_INCREMENT,
  `Product_Name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Product_Image` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Description` text COLLATE utf8mb4_general_ci,
  `Price` decimal(10,2) DEFAULT NULL,
  `Stock` int DEFAULT NULL,
  `Product_Type` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`Product_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Product_ID`, `Product_Name`, `Product_Image`, `Description`, `Price`, `Stock`, `Product_Type`) VALUES
(1, 'Lay\'s Classic Potato Chips', '/images/products/1.png', 'Classic potato chips with a crispy texture and a delicious taste.', 6.50, 100, 'Snacks'),
(2, 'Doritos Nacho Cheese Tortilla Chips', '/images/products/2.png', 'Crunchy tortilla chips flavored with tangy nacho cheese.', 7.00, 100, 'Snacks'),
(3, 'Ritz Original Crackers', '/images/products/3.png', 'Buttery and crisp crackers perfect for snacking.', 8.50, 100, 'Snacks'),
(4, 'Orville Redenbacher\'s Movie Theater Butter Popcorn', '/images/products/4.png', 'Buttery popcorn that tastes like it\'s straight from the theater.', 12.00, 100, 'Snacks'),
(5, 'Planters Salted Peanuts', '/images/products/5.png', 'Lightly salted peanuts perfect for snacking.', 9.00, 100, 'Snacks'),
(6, 'Nature Valley Crunchy Granola Bars (Oats & Honey)', '/images/products/6.png', 'Crunchy granola bars made with whole grain oats and honey.', 12.00, 100, 'Snacks'),
(7, 'Snickers Chocolate Bar', '/images/products/7.png', 'Chocolate bar filled with nougat, caramel, and peanuts.', 3.50, 100, 'Snacks'),
(8, 'Blue Diamond Almonds (Smokehouse)', '/images/products/8.png', 'Smokehouse-flavored almonds for a savory snack.', 20.00, 100, 'Snacks'),
(9, 'Jack Link\'s Original Beef Jerky', '/images/products/9.png', 'Savory and tender beef jerky snack.', 20.00, 100, 'Snacks'),
(10, 'Ocean\'s Halo Seaweed Snacks', '/images/products/10.png', 'Crispy seaweed snacks with a hint of salt.', 5.50, 100, 'Snacks'),
(11, 'Cheetos Crunchy Cheese Snacks', '/images/products/11.png', 'Crunchy cheese-flavored snacks.', 4.50, 100, 'Snacks'),
(12, 'Kellogg\'s Rice Krispies Treats', '/images/products/12.png', 'Sweet and crispy rice treats.', 8.00, 100, 'Snacks'),
(13, 'Pringles Sour Cream & Onion Chips', '/images/products/13.png', 'Crispy potato chips flavored with sour cream and onion.', 6.00, 100, 'Snacks'),
(14, 'KIND Healthy Grains Granola Bars (Dark Chocolate Chunk)', '/images/products/14.png', 'Chewy granola bars with dark chocolate chunks.', 15.00, 100, 'Snacks'),
(15, 'Sun-Maid Raisins', '/images/products/15.png', 'Sweet and chewy dried grapes.', 10.00, 100, 'Snacks'),
(16, 'Clif Bar Chocolate Chip Energy Bar', '/images/products/16.png', 'Energy bar packed with chocolate chips.', 8.50, 100, 'Snacks'),
(17, 'Goldfish Cheddar Crackers', '/images/products/17.png', 'Baked cheddar-flavored crackers in fun fish shapes.', 10.00, 100, 'Snacks'),
(18, 'Welch\'s Fruit Snacks', '/images/products/18.png', 'Assorted fruit-flavored chewy snacks.', 6.00, 100, 'Snacks'),
(19, 'Quaker Chewy Granola Bars (Chocolate Chip)', '/images/products/19.png', 'Chewy granola bars with chocolate chips.', 12.00, 100, 'Snacks'),
(20, 'Pepperidge Farm Milano Cookies', '/images/products/20.png', 'Crisp cookies with a layer of chocolate.', 15.00, 100, 'Snacks'),
(21, 'Maruchan Ramen Noodle Soup (Chicken Flavor)', '/images/products/21.png', 'Instant ramen noodles with chicken flavor.', 3.00, 100, 'Instant Noodle'),
(22, 'Nissin Cup Noodles (Beef Flavor)', '/images/products/22.png', 'Instant noodles in a cup with beef flavor.', 5.50, 100, 'Instant Noodle'),
(23, 'Indomie Mi Goreng Fried Noodles', '/images/products/23.png', 'Fried noodles with a rich and savory flavor.', 1.50, 100, 'Instant Noodle'),
(24, 'Samyang Buldak Spicy Chicken Ramen', '/images/products/24.png', 'Extra spicy chicken flavored instant ramen.', 6.00, 100, 'Instant Noodle'),
(25, 'Sapporo Ichiban Japanese Style Noodles (Original Flavor)', '/images/products/25.png', 'Japanese-style noodles with a savory broth.', 5.50, 100, 'Instant Noodle'),
(26, 'Shin Ramyun Spicy Korean Noodles', '/images/products/26.png', 'Spicy Korean ramen noodles.', 4.50, 100, 'Instant Noodle'),
(27, 'Koyo Organic Ramen (Tofu & Miso)', '/images/products/27.png', 'Organic ramen noodles with tofu and miso broth.', 8.00, 100, 'Instant Noodle'),
(28, 'Mama Instant Noodles (Tom Yum Shrimp)', '/images/products/28.png', 'Instant noodles with Tom Yum shrimp flavor.', 2.50, 100, 'Instant Noodle'),
(29, 'Annie Chun\'s Udon Soup Bowl (Sweet Chili)', '/images/products/29.png', 'Udon noodles in a sweet chili broth.', 15.00, 100, 'Instant Noodle'),
(30, 'Maggi 2-Minute Noodles (Masala)', '/images/products/30.png', 'Instant noodles with a masala flavor.', 1.80, 100, 'Instant Noodle'),
(31, 'Nongshim Shin Cup Noodle Soup (Gourmet Spicy)', '/images/products/31.png', 'Spicy gourmet cup noodles.', 6.00, 100, 'Instant Noodle'),
(32, 'Ottogi Jin Ramen (Mild)', '/images/products/32.png', 'Mild flavored Korean instant noodles.', 4.00, 100, 'Instant Noodle'),
(33, 'Paldo Bibim Men Cold Noodles', '/images/products/33.png', 'Cold noodles with a sweet and spicy sauce.', 5.00, 100, 'Instant Noodle'),
(34, 'Yum Yum Instant Noodles (Tom Yum Flavor)', '/images/products/34.png', 'Instant noodles with Tom Yum flavor.', 1.80, 100, 'Instant Noodle'),
(35, 'Knorr Asian Sides Teriyaki Noodles', '/images/products/35.png', 'Teriyaki flavored Asian-style noodles.', 7.50, 100, 'Instant Noodle'),
(36, 'Uncle Ben\'s Ready Rice (Basmati)', '/images/products/36.png', 'Microwaveable Basmati rice.', 12.00, 100, 'Instant Food'),
(37, 'Quaker Instant Oatmeal (Maple & Brown Sugar)', '/images/products/37.png', 'Instant oatmeal with maple and brown sugar flavor.', 8.00, 100, 'Instant Food'),
(38, 'Campbell\'s Chicken Noodle Soup', '/images/products/38.png', 'Classic chicken noodle soup in a can.', 6.50, 100, 'Instant Food'),
(39, 'Kraft Macaroni & Cheese Dinner', '/images/products/39.png', 'Macaroni and cheese dinner kit.', 7.00, 100, 'Instant Food'),
(40, 'Idahoan Buttery Homestyle Mashed Potatoes', '/images/products/40.png', 'Instant mashed potatoes with buttery flavor.', 10.00, 100, 'Instant Food'),
(41, 'Chef Boyardee Beef Ravioli', '/images/products/41.png', 'Beef ravioli in tomato sauce.', 6.00, 100, 'Instant Food'),
(42, 'Hormel Compleats Meatloaf & Gravy', '/images/products/42.png', 'Ready-to-eat meatloaf with gravy.', 14.00, 100, 'Instant Food'),
(43, 'Progresso Traditional Chicken Noodle Soup', '/images/products/43.png', 'Traditional chicken noodle soup in a can.', 8.00, 100, 'Instant Food'),
(44, 'Amy\'s Indian Palak Paneer', '/images/products/44.png', 'Frozen meal with spinach and cheese in a creamy sauce.', 20.00, 100, 'Instant Food'),
(45, 'Annie\'s Shells & White Cheddar', '/images/products/45.png', 'White cheddar cheese pasta shells.', 10.00, 100, 'Instant Food'),
(46, 'Michelina\'s Lean Gourmet Fettuccine Alfredo', '/images/products/46.png', 'Frozen fettuccine Alfredo meal.', 6.50, 100, 'Instant Food'),
(47, 'StarKist Tuna Creations (Lemon Pepper)', '/images/products/47.png', 'Flavored tuna in a pouch with lemon pepper seasoning.', 8.00, 100, 'Instant Food'),
(48, 'Bear Creek Country Kitchens Chicken Noodle Soup Mix', '/images/products/48.png', 'Chicken noodle soup mix.', 15.00, 100, 'Instant Food'),
(49, 'Stouffer\'s Classics Lasagna with Meat & Sauce', '/images/products/49.png', 'Frozen lasagna meal with meat and sauce.', 18.00, 100, 'Instant Food'),
(50, 'Prego Ready Meals Creamy Three Cheese Alfredo Rotini', '/images/products/50.png', 'Ready-to-eat Alfredo rotini with three cheeses.', 12.00, 100, 'Instant Food'),
(51, 'Maruchan Yakisoba Teriyaki Beef Flavor', '/images/products/51.png', 'Instant yakisoba noodles with teriyaki beef flavor.', 5.00, 100, 'Instant Food'),
(52, '365 by Whole Foods Market Organic Microwave Popcorn', '/images/products/52.png', 'Organic microwave popcorn.', 10.00, 100, 'Snacks'),
(53, 'Lipton Cup-a-Soup (Chicken Noodle)', '/images/products/53.png', 'Instant chicken noodle cup soup.', 6.00, 100, 'Instant Food'),
(54, 'Tasty Bite Indian Madras Lentils', '/images/products/54.png', 'Microwaveable pouch of Indian-style lentils.', 13.00, 100, 'Instant Food'),
(55, 'Velveeta Shells & Cheese Original Microwave Cups', '/images/products/55.png', 'Microwaveable cups of Velveeta shells and cheese.', 7.00, 100, 'Instant Food');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone_no` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `email`, `phone_no`) VALUES
('yuhang', 'yh123', 'yuhang123@gmail.com', '018-954 3206'),
('rongquan', 'boinkkboii', 'rongquan123@gmail.com', '012-639 9787'),
('john', 'asd', 'asd@a.com', '0181543206'),
('yuhang123', 'asd', 'a@a.com', '111111111');
--
-- Database: `animal_gallery`
--
CREATE DATABASE IF NOT EXISTS `animal_gallery` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `animal_gallery`;

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

DROP TABLE IF EXISTS `animals`;
CREATE TABLE IF NOT EXISTS `animals` (
  `id` int NOT NULL AUTO_INCREMENT,
  `image_path` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`id`, `image_path`) VALUES
(1, '/images/cat.jpg'),
(2, '/images/dog.jpg'),
(3, '/images/lion.jpg'),
(4, '/images/tiger.jpg'),
(5, '/images/elephant.jpg');
--
-- Database: `uecs2094_pie`
--
CREATE DATABASE IF NOT EXISTS `uecs2094_pie` DEFAULT CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci;
USE `uecs2094_pie`;

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

DROP TABLE IF EXISTS `announcement`;
CREATE TABLE IF NOT EXISTS `announcement` (
  `id` int NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) DEFAULT NULL,
  `message` text,
  `type` char(1) DEFAULT NULL,
  `posted` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `subject`, `message`, `type`, `posted`) VALUES
(24, 'pp', 'very long', 'P', '2024-08-09 09:00:04'),
(25, 'kuku', 'very big', 'T', '2024-08-09 09:00:17'),
(26, 'kuku', 'very big', 'T', '2024-08-09 09:03:58'),
(27, 'asd', 'asd', 'P', '2024-08-22 16:05:05');
--
-- Database: `utar_db`
--
CREATE DATABASE IF NOT EXISTS `utar_db` DEFAULT CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci;
USE `utar_db`;

-- --------------------------------------------------------

--
-- Table structure for table `utar_table`
--

DROP TABLE IF EXISTS `utar_table`;
CREATE TABLE IF NOT EXISTS `utar_table` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) DEFAULT NULL,
  `Email` text,
  `Staff/Student ID` text NOT NULL,
  `Department` text,
  `Password` text,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `UNIQUE_EMAIL` (`Email`(255))
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `utar_table`
--

INSERT INTO `utar_table` (`ID`, `Name`, `Email`, `Staff/Student ID`, `Department`, `Password`) VALUES
(1, 'gay', '2200894@1utar.my', 'asd', 'Department of Electrical and Electronic Engineering', '123asd');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
