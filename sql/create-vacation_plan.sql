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
  `travel_time` decimal(10,1) DEFAULT NULL,
  `travel_distance` decimal(10,1) DEFAULT NULL,
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

INSERT INTO `vacation_plan` (`vacation_plan_id`, `vacation_id`, `row_number`, `day_date`, `travel_time`, `travel_distance`, `starting_location`, `ending_location`, `morning`, `morning_status`, `afternoon`, `afternoon_status`, `evening`, `evening_status`, `lodging`, `lodging_status`) VALUES
(1, 1, 1, '2014-07-11', '5.5', '372', 'Eagan, MN', 'Omaha, NE', 'work / summer camp', 3, 'work / summer camp', 3, 'travel', 3, 'hotel in Omaha', 3),
(2, 1, 2, '2014-07-12', '8.5', '607', 'Omaha, NE', 'Colorado Springs, CO', 'travel', 3, 'travel', 3, 'Garden of the Gods', 3, 'Garden of the Gods RV Resort 719-375-9450', 3),
(3, 1, 3, '2014-07-13', '6', '348', 'Colorado Springs, CO', 'Mesa Verde, CO', 'Colorado Springs, CO', 3, 'Great Sand Dunes NP', 3, 'travel', 3, 'Mesa Verde RV Resort - Camper Cabin - 800-776-7421', 3),
(4, 1, 4, '2014-07-14', '0', '0', 'Mesa Verde, CO', 'Mesa Verde, CO', 'Mesa Verde NP', 3, 'Mesa Verde NP', 3, 'Mesa Verde NP Twilight Tour 7:15 p.m. - 8:45 p.m.', 3, 'Mesa Verde RV Resort - Camper Cabin - 800-776-7421', 3),
(5, 1, 5, '2014-07-15', '2.1', '124', 'Mesa Verde, CO', 'Moab, UT', 'Mesa Verde NP', 3, 'Four Corners / travel', 3, 'Explore Moab', 3, 'Moab Valley RV Resort Large Cabin 435-259-4469', 3),
(6, 1, 6, '2014-07-16', '0', '0', 'Moab, UT', 'Moab, UT', 'Arches', 3, 'Arches Fiery Furnace Tour 4:00 p.m. - 7:00 p.m.', 3, 'relax / laundry', 3, 'Moab Valley RV Resort Large Cabin 435-259-4469', 3),
(7, 1, 7, '2014-07-17', '0', '0', 'Moab, UT', 'Moab, UT', 'Canyon Lands NP', 3, 'relax / laundry', 3, 'Horseback Ride MHCowboy 6:00 p.m.', 3, 'Moab Valley RV Resort Large Cabin435-259-4469', 3),
(8, 1, 8, '2014-07-18', '3.8', '227', 'Moab, UT', 'Vernal, UT', 'travel', 3, 'Dinosaur National Monument', 3, 'relax', 3, 'Vernal / Dinosaur land KOA 800-562-7574', 3),
(9, 1, 9, '2014-07-19', '3.4', '317', 'Vernal, UT', 'Laramie, WY', 'Dinosaur National Monument raft trip Don Hatch Rafting', 3, 'Dinosaur National Monument raft trip Don Hatch Rafting', 3, 'travel', 3, 'Laramie KOA 800-562-4153', 3),
(10, 1, 10, '2014-07-20', '3.3', '208', 'Laramie, WY', 'Fort Robinson, NE', 'travel', 3, 'Fort Robinson / possible reservation activity', 3, 'Chuckwagon Cookout (call for reservations during morning)', 1, 'Fort Robinson State Park 308-665-2900', 2),
(11, 1, 11, '2014-07-21', '3.1', '198', 'Fort Robinson, NE', 'Badlands NP', 'travel', 3, 'Wind Cave / Hot Spring / etc.', 3, 'Badlands NP', 3, 'Badlands/White River KOA 800-562-3897', 2),
(12, 1, 12, '2014-07-22', '7.3', '497', 'Badlands NP', 'Eagan, MN', 'Badlands', 3, 'travel', 3, 'home!', 3, 'home', 3),
(13, 1, 13, '2014-07-23', '0', '0', 'Eagan, MN', 'Eagan, MN', 'relax', 3, 'relax', 3, 'relax', 3, 'home', 3),
(14, 2, 1, '1987-10-05', '8', '11', 'St Paul', 'Brule Lake BWCA', 'pack and drive', 3, 'drive', 3, 'paddle in', 3, 'Tent on a Brule lake site', 3),
(15, 2, 2, '1987-10-06', '0', '11', 'Brule Lake', 'Brule Lake BWCA', 'Brule Lake', 3, 'explore', 3, 'campfire', 3, 'Tent on a Brule lake site', 3),
(16, 2, 3, '1987-10-07', '8', '11', 'Brule Lake', 'St Paul', 'pack and paddle', 3, 'drive', 3, 'drive /  unpack', 3, 'home', 3),
(17, 3, 1, '1987-10-07', '5', '11', 'Bedrock', 'Jelly Stone Park', 'pack', 3, 'drive', 3, 'unpack - setup camp', 3, 'Jelly Stone Park', 3),
(18, 3, 2, '1987-10-07', '0', '11', 'Jelly Stone Park', 'Jelly Stone Park', 'breakfast & hike', 3, 'chase Yogi bear ', 2, 'rest', 3, 'Jelly Stone Park', 3),
(19, 3, 3, '1987-10-07', '5', '11', 'Jelly Stone Park', 'Bedrock', 'set bear traps', 1, 'eat before Yogi wakes up', 3, 'drive home', 3, 'home = Bedrock', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `vacation_plan`
--
ALTER TABLE `vacation_plan`
ADD PRIMARY KEY (`vacation_plan_id`);

ALTER TABLE `vacation_plan`
MODIFY `vacation_plan_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
