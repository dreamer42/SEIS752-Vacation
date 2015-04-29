-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2015 at 05:21 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `seis752_vacation`
--
USE `seis752_vacation`;

-- --------------------------------------------------------

--
-- Drop table `status_def` is already there
--

DROP TABLE IF EXISTS `status_def`;
-- --------------------------------------------------------

--
-- Table structure for table `status_def`
--

CREATE TABLE IF NOT EXISTS `status_def` (
  `status_id` int(11) NOT NULL,
  `color` varchar(12) NOT NULL,
  `HEXcolor` varchar(12) NOT NULL,
  `description` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_def`  
-- 'red', 'FF3333'  lighter red = #FE2E2E

INSERT INTO `status_def` (`status_id`, `color`, `HEXcolor`, `description`) VALUES
(1, 'red', 'FE2E2E', 'activity/lodging reservation not made'),
(2, 'yellow', 'FFE16A', 'activity/lodging reservation needs confirmed'),
(3, 'green', '70DB70', 'activity/lodging reservation is confirmed/not needed');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
