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
-- Drop table `users` is already there
--

DROP TABLE IF EXISTS `statusdef`;
-- --------------------------------------------------------

--
-- Table structure for table `statusdef`
--

CREATE TABLE IF NOT EXISTS `statusdef` (
  `number` int(11) NOT NULL,
  `color` varchar(12) NOT NULL,
  `HEXcolor` varchar(12) NOT NULL,
  `description` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statusdef`
--

INSERT INTO `statusdef` (`number`, `color`, `HEXcolor`, `description`) VALUES
(1, 'red', 'FF3333', 'activity/lodging reservation not made'),
(2, 'yellow', 'FFE16A', 'activity/lodging reservation may not confirmed'),
(3, 'green', '70DB70', 'activity/lodging reservation is confirmed');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
