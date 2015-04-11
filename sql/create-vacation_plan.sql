-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2015 at 05:38 AM
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

DROP TABLE IF EXISTS `vacation_plan`;
-- --------------------------------------------------------

-- --------------------------------------------------------

--
-- Table structure for table `vacation_plan`
--

CREATE TABLE IF NOT EXISTS `vacation_plan` (
  `vacation_plan_id` bigint(20) NOT NULL,
  `vacation_id` bigint(20) DEFAULT NULL,
  `row_number` int(11) DEFAULT NULL,
  `day_date` date DEFAULT NULL,
  `travel_time` decimal(10,0) DEFAULT NULL,
  `starting_location` varchar(80) DEFAULT NULL,
  `ending_location` varchar(80) DEFAULT NULL,
  `morning` varchar(255) DEFAULT NULL,
  `morning_status` int(11) NOT NULL DEFAULT '1',
  `afternoon` varchar(255) DEFAULT NULL,
  `afternoon_status` int(11) NOT NULL DEFAULT '1',
  `evening` varchar(255) DEFAULT NULL,
  `evening_status` int(11) NOT NULL DEFAULT '1',
  `lodging` varchar(255) DEFAULT NULL,
  `lodging_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vacation_plan`
--

INSERT INTO `vacation_plan` (`vacation_plan_id`, `vacation_id`, `row_number`, `day_date`, `travel_time`, `starting_location`, `ending_location`, `morning`, `morning_status`, `afternoon`, `afternoon_status`, `evening`, `evening_status`, `lodging`, `lodging_status`) VALUES
(1, 1, 1, '2014-07-11', '6', 'Eagan', 'omaha, NE', 'work / summer camp', 4, 'work / summer camp', 4, 'travel', 4, 'hotel in Omaha', 3),
(2, 1, 2, '2014-07-12', '9', 'Omaha', 'Colorado Springs, CO', 'travel', 4, 'travel', 4, 'Garden of the Gods', 4, 'Garden of the Gods RV Resort 719-475-9450', 3),
(3, 1, 3, '2014-07-13', '7', 'Colorado Springs', 'Mesa Verde, CO', 'Colorado Springs, CO', 4, 'Great Sand Dunes NP', 4, 'travel', 4, 'Mesa Verde RV Resort - Camper Cabin - 800-776-7421', 3),
(4, 1, 4, '2014-07-14', '0', 'Mesa Verde, CO', 'Mesa Verde, CO', 'Mesa Verde NP', 4, 'Mesa Verde NP', 4, 'Mesa Verde NP Twilight Tour 7:15 p.m. - 8:45 p.m.', 3, 'Mesa Verde RV Resort - Camper Cabin - 800-776-7421', 3),
(5, 1, 5, '2014-07-15', '4', 'Mesa Verde', 'Moab, UT', 'Mesa Verde NP', 4, 'Four Corners / travel', 4, 'Explore Moab', 4, 'Moab Valley RV Resort Large Cabin 435-259-4469', 3),
(6, 1, 6, '2014-07-16', '0', 'Moab', 'Moab, UT', 'Arches', 4, 'Arches Fiery Furnace Tour 4:00 p.m. - 7:00 p.m.', 3, 'relax / laundry', 4, 'Moab Valley RV Resort Large Cabin 435-259-4469', 3),
(7, 1, 7, '2014-07-17', '0', 'Moab', 'Moab, UT, CO', 'Canyon Lands NP', 4, 'relax / laundry', 4, 'Horseback Ride MHCowboy 6:00 p.m.', 3, 'Moab Valley RV Resort Large Cabin435-259-4469', 3),
(8, 1, 8, '2014-07-18', '4', 'Moab', 'Vernal, UT', 'travel', 4, 'Dinosaur National Monument', 4, 'relax', 4, 'Vernal / Dinosaur land KOA 800-562-7574', 3),
(9, 1, 9, '2014-07-19', '6', 'Vernal, UT', 'Laramie, WY', 'Dinosaur National Monument raft trip Don Hatch Rafting', 3, 'Dinosaur National Monument raft trip Don Hatch Rafting', 3, 'travel', 4, 'Laramie KOA 800-562-4153', 3),
(10, 1, 10, '2014-07-20', '3', 'Casper, WY ', 'Fort Robinson, NE', 'travel', 4, 'Fort Robinson / possible reservation activity', 4, 'Chuckwagon Cookout (call for reservations during morning)', 1, 'Fort Robinson State Park 308-665-2900', 2),
(11, 1, 11, '2014-07-21', '3', 'Fort Robinson, NE', 'Badlands NP', 'travel', 4, 'Wind Cave / Hot Spring / etc.', 4, 'Badlands NP', 4, 'Badlands/White River KOA 800-562-3897', 2),
(12, 1, 12, '2014-07-22', '8', 'Badlands NP', 'Eagan', 'Badlands', 4, 'travel', 4, 'home!', 4, 'home', 4),
(13, 1, 13, '2014-07-23', '0', 'Eagan', 'Eagan', 'relax', 4, 'relax', 4, 'relax', 4, 'home', 4),
(14, 2, 1, '1987-10-05', '8', 'St Paul', 'Brule Lake BWCA', 'pack and drive', 4, 'drive', 4, 'paddle in', 4, 'Tent on a Brule lake site', 3),
(15, 2, 2, '1987-10-06', '0', 'Brule Lake', 'Brule Lake BWCA', 'Brule Lake', 4, 'explore', 4, 'campfire', 4, 'Tent on a Brule lake site', 3),
(16, 2, 3, '1987-10-07', '8', 'Brule Lake', 'St Paul', 'pack and paddle', 4, 'drive', 4, 'drive /  unpack', 4, 'home', 4),
(17, 3, 1, '1987-10-07', '5', 'Bedrock', 'Jelly Stone Park', 'pack', 4, 'drive', 4, 'unpack - setup camp', 4, 'Jelly Stone Park', 3),
(18, 3, 2, '1987-10-07', '0', 'Jelly Stone Park', 'Jelly Stone Park', 'breakfast & hike', 4, 'chase Yogi bear ', 2, 'rest', 4, 'Jelly Stone Park', 3),
(19, 3, 3, '1987-10-07', '5', 'Jelly Stone Park', 'Bedrock', 'set bear traps', 1, 'eat before Yogi wakes up', 4, 'drive home', 4, 'home = Bedrock', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `vacation_plan`
--
ALTER TABLE `vacation_plan`
 ADD PRIMARY KEY (`vacation_plan_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
