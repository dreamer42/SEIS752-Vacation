-- UPDATE THE "INSERT INTO" PORTION IF AFTER YOU ADD NEW USERS TO KEEP IDs IN SYNCH BETWEEN MULTIPLE DATABASES
-- OR IF THERE IS A STRUCTURE CHANGE, UPDATE ALL NECESSRY PARTS

--
-- Database: `seis752_vacation`
--

USE `seis752_vacation`;

-- --------------------------------------------------------

--
-- Drop table `users` is already there
--

DROP TABLE IF EXISTS `users`;

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`user_id` int(11) NOT NULL,
  `user_name` varchar(255) ,
  `first_name` varchar(255) ,
  `last_name` varchar(255) ,
  `password` char(64) ,
  `salt` char(16) ,
  `email` varchar(255) 
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `first_name`, `last_name`, `password`, `salt`, `email`) VALUES
(1, 'mike', 'Mike', 'Palmer', '0aed4b7874c4705f1f23129cdf8f5d68844572bd3e13a508143316172c277d2b', '71d5f2632e1ff090', 'mwpalmer@hotmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_id`), ADD UNIQUE KEY `username` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;

