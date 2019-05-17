-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 12, 2019 at 01:43 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thecleaner`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

DROP TABLE IF EXISTS `customer_order`;
CREATE TABLE IF NOT EXISTS `customer_order` (
  `customer_order_id` int(11) NOT NULL AUTO_INCREMENT,
  `cust_order_item` text NOT NULL,
  `cost_per_item` float NOT NULL,
  `total_cost_item` float NOT NULL,
  `order_date` datetime NOT NULL,
  `collection_date` datetime NOT NULL,
  `cust_order_id` int(11) NOT NULL,
  `vend_order_id` int(11) NOT NULL,
  PRIMARY KEY (`customer_order_id`),
  KEY `cust_order_id` (`cust_order_id`),
  KEY `vend_order_id` (`vend_order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer_order_status`
--

DROP TABLE IF EXISTS `customer_order_status`;
CREATE TABLE IF NOT EXISTS `customer_order_status` (
  `order_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `cust_order_status` enum('unfulfilled','ready','collected') NOT NULL,
  `cust_ord_status_id` int(11) NOT NULL,
  `vend_ord_status_id` int(11) NOT NULL,
  PRIMARY KEY (`order_status_id`),
  KEY `cust_ord_status_id` (`cust_ord_status_id`),
  KEY `vend_ord_status_id` (`vend_ord_status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer_registration`
--

DROP TABLE IF EXISTS `customer_registration`;
CREATE TABLE IF NOT EXISTS `customer_registration` (
  `cust_reg_id` int(11) NOT NULL AUTO_INCREMENT,
  `cust_first_name` varchar(30) NOT NULL,
  `cust_last_name` varchar(30) NOT NULL,
  `cust_email` varchar(54) NOT NULL,
  `cust_phone` varchar(30) NOT NULL,
  `cust_address` longtext NOT NULL,
  `cust_dob` datetime NOT NULL,
  `cust_gender` enum('Male','Female') NOT NULL,
  `cust_vend_id` int(11) NOT NULL,
  `cust_reg_date` timestamp NOT NULL,
  PRIMARY KEY (`cust_reg_id`),
  KEY `cust_vend_id` (`cust_vend_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer_registration`
--

INSERT INTO `customer_registration` (`cust_reg_id`, `cust_first_name`, `cust_last_name`, `cust_email`, `cust_phone`, `cust_address`, `cust_dob`, `cust_gender`, `cust_vend_id`, `cust_reg_date`) VALUES
(1, 'akorede', 'Ayomide', 'akorede@afarait.com', '08032716181', '52 akingbemi street,lekki phase 2,lagos island,lagos', '2012-01-31 00:00:00', 'Male', 9, '2019-05-03 11:28:37'),
(2, 'Ogechi', 'Nnamdi', 'ogebabe@aol.com', '08125253696', '56 santins avenue, bulk road ,Allen Avenue,Ikeja,Lagos.', '1984-07-19 00:00:00', 'Female', 9, '2019-05-03 11:42:42'),
(3, 'yemi', 'agonk', 'agonkking@yahoo.co.uk', '88-858-9696', '52 olubandan street,area avenue,mushin,lagos state.', '1988-10-29 00:00:00', 'Male', 8, '2019-05-03 12:31:13');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_inventory`
--

DROP TABLE IF EXISTS `vendor_inventory`;
CREATE TABLE IF NOT EXISTS `vendor_inventory` (
  `vendor_inv_id` int(11) NOT NULL AUTO_INCREMENT,
  `inventory_name` varchar(30) NOT NULL,
  `price` float NOT NULL,
  `vend_id` int(11) NOT NULL,
  PRIMARY KEY (`vendor_inv_id`),
  KEY `vend_id` (`vend_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vendor_inventory`
--

INSERT INTO `vendor_inventory` (`vendor_inv_id`, `inventory_name`, `price`, `vend_id`) VALUES
(2, 'Agbada', 200, 9),
(3, 'Complete Suit', 500, 9),
(5, 'Pant Trouser', 500, 8),
(6, 'White Shirt', 600, 8),
(7, 'underwears', 200, 8),
(8, 'Coloured Shirts', 400, 8),
(9, 'kids cloth', 200, 8);

-- --------------------------------------------------------

--
-- Table structure for table `vendor_registration`
--

DROP TABLE IF EXISTS `vendor_registration`;
CREATE TABLE IF NOT EXISTS `vendor_registration` (
  `vendor_id` int(11) NOT NULL AUTO_INCREMENT,
  `comp_name` varchar(225) NOT NULL,
  `comp_address` text NOT NULL,
  `comp_email` varchar(50) NOT NULL,
  `comp_phone` varchar(30) NOT NULL,
  `comp_password` varchar(32) NOT NULL,
  `registered_date` timestamp NOT NULL,
  PRIMARY KEY (`vendor_id`),
  UNIQUE KEY `comp_email` (`comp_email`),
  UNIQUE KEY `comp_phone` (`comp_phone`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vendor_registration`
--

INSERT INTO `vendor_registration` (`vendor_id`, `comp_name`, `comp_address`, `comp_email`, `comp_phone`, `comp_password`, `registered_date`) VALUES
(1, 'Kopper Dry cleaning service', '56 assignton street,off benson junction,lekki phase 1,lagos island', 'koppercleaning@gmail.com', '0032716181', 'e10adc3949ba59abbe56e057f20f883e', '2019-04-19 14:25:52'),
(2, 'Ashraf & sons Incoporated', '56 tuface road,banana island.lagos island,lagos', 'ashrafandsons@ashraf.com', '08056562323', '1308daba54db5d7d8e601c49ae86eec9', '2019-04-19 14:32:52'),
(3, 'Aremogushi brands', '56 karaole street,ayanmo road,ibadan,oyo state', 'aremoalomo@aol.com', '0186657295', 'ecf924a18d3a3e4a3fbd28270dcbe8ce', '2019-04-19 14:36:17'),
(4, 'camper camper rolls cleaning service', '87 ajao estate,isolo,lagos.', 'camperservice@aol.com', '85796532541', '390800ff548bfec1f511ecfa6597f647', '2019-04-19 14:40:53'),
(5, 'common world associates cleaning', '25 walking street,ire-akari estate,isolo,lagos', 'commonworld@yahoo.co.uk', '08256654556', '9efab2399c7c560b34de477b9aa0a465', '2019-04-19 14:43:35'),
(6, 'tobeskosko cleaning service', 'Blessing Plaza ,shop 7c,76 kajola street,off airport road,ikeja.Lagos.', 'tobeeysko@yahoo.com', '08025657896', '25f9e794323b453885f5181f1b624d0b', '2019-04-19 14:49:07'),
(7, 'mymine cleaning services', '25 alhaji rasak street', 'mymymine@yahoo.co.uk', '0825679555', 'e10adc3949ba59abbe56e057f20f883e', '2019-04-19 14:52:48'),
(8, 'bola Inc', '45 las las avenue ikeja lagos', 'bbbooo@aol.com', '080327458595', '123456789', '2019-04-24 14:42:08'),
(9, 'pepples place', '65 ferror road,off alen ikeja', 'peopppl@yahoo.co.uk', '08025235698', 'peoplesplus', '2019-04-24 14:44:55');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD CONSTRAINT `customer_order_ibfk_1` FOREIGN KEY (`cust_order_id`) REFERENCES `customer_registration` (`cust_reg_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_order_ibfk_2` FOREIGN KEY (`vend_order_id`) REFERENCES `vendor_registration` (`vendor_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer_order_status`
--
ALTER TABLE `customer_order_status`
  ADD CONSTRAINT `customer_order_status_ibfk_1` FOREIGN KEY (`cust_ord_status_id`) REFERENCES `customer_order` (`customer_order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_order_status_ibfk_2` FOREIGN KEY (`vend_ord_status_id`) REFERENCES `vendor_registration` (`vendor_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer_registration`
--
ALTER TABLE `customer_registration`
  ADD CONSTRAINT `customer_registration_ibfk_1` FOREIGN KEY (`cust_vend_id`) REFERENCES `vendor_registration` (`vendor_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vendor_inventory`
--
ALTER TABLE `vendor_inventory`
  ADD CONSTRAINT `vendor_inventory_ibfk_1` FOREIGN KEY (`vend_id`) REFERENCES `vendor_registration` (`vendor_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
