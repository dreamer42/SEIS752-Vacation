USE `seis752_vacation`;

DROP TABLE IF EXISTS `vacation_plan`;

CREATE TABLE IF NOT EXISTS `vacation_plan` (  
   vacation_plan_id BIGINT PRIMARY KEY, 
   vacation_id BIGINT, 
   row_number INT,
   day_date DATE,
   travel_time DECIMAL, 
   starting_location VARCHAR(80),
   ending_location  VARCHAR(80),
   morning VARCHAR(255),
   afternoon VARCHAR(255),
   evening VARCHAR(255),
   lodging VARCHAR(255) );
   
INSERT INTO `vacation_plan`(`vacation_plan_id`, `vacation_id`, `row_number`, `day_date`, `travel_time`, `starting_location`, `ending_location`, `morning`, `afternoon`, `evening`, `lodging`) 
  VALUES (1,1,1,'2014-07-11',5.5,'Eagan','omaha, NE','work / summer camp','work / summer camp','travel','travel');
INSERT INTO `vacation_plan`(`vacation_plan_id`, `vacation_id`, `row_number`, `day_date`, `travel_time`, `starting_location`, `ending_location`, `morning`, `afternoon`, `evening`, `lodging`) 
  VALUES (2,1,2,'2014-07-12',8.5,'Omaha','Colorado Springs, CO','travel','travel','Garden of the Gods','Garden of the Gods RV Resort 719-475-9450');
INSERT INTO `vacation_plan`(`vacation_plan_id`, `vacation_id`, `row_number`, `day_date`, `travel_time`, `starting_location`, `ending_location`, `morning`, `afternoon`, `evening`, `lodging`)
 VALUES (3,1,3,'2014-07-13',6.5,'Colorado Springs','Mesa Verde, CO','Colorado Springs, CO','Great Sand Dunes NP','travel','Mesa Verde RV Resort - Camper Cabin - 800-776-7421');
INSERT INTO `vacation_plan`(`vacation_plan_id`, `vacation_id`, `row_number`, `day_date`, `travel_time`, `starting_location`, `ending_location`, `morning`, `afternoon`, `evening`, `lodging`) 
  VALUES (4,1,4,'2014-07-14',0,'Mesa Verde, CO','Mesa Verde, CO','Mesa Verde NP','Mesa Verde NP','Mesa Verde NP Twilight Tour 7:15 p.m. - 8:45 p.m.','Mesa Verde RV Resort - Camper Cabin - 800-776-7421');
INSERT INTO `vacation_plan`(`vacation_plan_id`, `vacation_id`, `row_number`, `day_date`, `travel_time`, `starting_location`, `ending_location`, `morning`, `afternoon`, `evening`, `lodging`) 
  VALUES (5,1,5,'2014-07-15',3.5,'Mesa Verde','Moab, UT','Mesa Verde NP','Four Corners / travel','Explore Moab','Moab Valley RV Resort Large Cabin 435-259-4469') ;
INSERT INTO `vacation_plan`(`vacation_plan_id`, `vacation_id`, `row_number`, `day_date`, `travel_time`, `starting_location`, `ending_location`, `morning`, `afternoon`, `evening`, `lodging`) 
  VALUES (6,1,6,'2014-07-16',0,'Moab','Moab, UT','Arches','Arches Fiery Furnace Tour 4:00 p.m. - 7:00 p.m.','relax / laundry','Moab Valley RV Resort Large Cabin 435-259-4469');
INSERT INTO `vacation_plan`(`vacation_plan_id`, `vacation_id`, `row_number`, `day_date`, `travel_time`, `starting_location`, `ending_location`, `morning`, `afternoon`, `evening`, `lodging`) 
  VALUES (7,1,7,'2014-07-17',0,'Moab','Moab, UT, CO','Canyon Lands NP','relax / laundry','Horseback Ride MHCowboy 6:00 p.m.','Moab Valley RV Resort Large Cabin435-259-4469');
INSERT INTO `vacation_plan`(`vacation_plan_id`, `vacation_id`, `row_number`, `day_date`, `travel_time`, `starting_location`, `ending_location`, `morning`, `afternoon`, `evening`, `lodging`) 
  VALUES (8,1,8,'2014-07-18',4,'Moab','Vernal, UT','travel','Dinosaur National Monument','relax','Vernal / Dinosaur land KOA 800-562-7574');
INSERT INTO `vacation_plan`(`vacation_plan_id`, `vacation_id`, `row_number`, `day_date`, `travel_time`, `starting_location`, `ending_location`, `morning`, `afternoon`, `evening`, `lodging`) 
  VALUES (9,1,9,'2014-07-19',5.5,'Vernal, UT','Laramie, WY','Dinosaur National Monument raft trip Don Hatch Rafting','Dinosaur National Monument raft trip Don Hatch Rafting','travel', 'Laramie KOA 800-562-4153'); 
INSERT INTO `vacation_plan`(`vacation_plan_id`, `vacation_id`, `row_number`, `day_date`, `travel_time`, `starting_location`, `ending_location`, `morning`, `afternoon`, `evening`, `lodging`) 
  VALUES (10,1,10,'2014-07-20',2.5,'Casper, WY ','Fort Robinson, NE','travel','Fort Robinson / possible reservation activity','Chuckwagon Cookout (call for reservations during morning)','Fort Robinson State Park 308-665-2900');
INSERT INTO `vacation_plan`(`vacation_plan_id`, `vacation_id`, `row_number`, `day_date`, `travel_time`, `starting_location`, `ending_location`, `morning`, `afternoon`, `evening`, `lodging`) 
  VALUES (11,1,11,'2014-07-21',3,'Fort Robinson, NE','Badlands NP','travel','Wind Cave / Hot Spring / etc.','Badlands NP','Badlands/White River KOA 800-562-3897');
 INSERT INTO `vacation_plan`(`vacation_plan_id`, `vacation_id`, `row_number`, `day_date`, `travel_time`, `starting_location`, `ending_location`, `morning`, `afternoon`, `evening`, `lodging`) 
   VALUES (12,1,12,'2014-07-22',7.5,'Badlands NP','Eagan','Badlands','travel','home!','home');
INSERT INTO `vacation_plan`(`vacation_plan_id`, `vacation_id`, `row_number`, `day_date`, `travel_time`, `starting_location`, `ending_location`, `morning`, `afternoon`, `evening`, `lodging`)
  VALUES (13,1,13,'2014-07-23',0,'Omaha','Eagan','relax','relax','relax','home');
  
INSERT INTO `vacation_plan`(`vacation_plan_id`, `vacation_id`, `row_number`, `day_date`, `travel_time`, `starting_location`, `ending_location`, `morning`, `afternoon`, `evening`, `lodging`)
  VALUES (14,2,1,'1987-10-05',8,'St Paul','Brule Lake BWCA','pack and drive','drive','paddle in','Tent on a Brule lake site');
INSERT INTO `vacation_plan`(`vacation_plan_id`, `vacation_id`, `row_number`, `day_date`, `travel_time`, `starting_location`, `ending_location`, `morning`, `afternoon`, `evening`, `lodging`)
  VALUES (15,2,2,'1987-10-06',0,'Brule Lake','Brule Lake BWCA','Brule Lake','explore','campfire','Tent on a Brule lake site');
INSERT INTO `vacation_plan`(`vacation_plan_id`, `vacation_id`, `row_number`, `day_date`, `travel_time`, `starting_location`, `ending_location`, `morning`, `afternoon`, `evening`, `lodging`)
  VALUES (16,2,3,'1987-10-07',8,'Brule Lake','St Paul','pack and paddle','drive','drive /  unpack','home');
  
INSERT INTO `vacation_plan`(`vacation_plan_id`, `vacation_id`, `row_number`, `day_date`, `travel_time`, `starting_location`, `ending_location`, `morning`, `afternoon`, `evening`, `lodging`)
  VALUES (17,3,1,'1987-10-07',5,'Bedrock','Jelly Stone Park','pack','drive','unpack - setup camp','Jelly Stone Park');
INSERT INTO `vacation_plan`(`vacation_plan_id`, `vacation_id`, `row_number`, `day_date`, `travel_time`, `starting_location`, `ending_location`, `morning`, `afternoon`, `evening`, `lodging`)
  VALUES (18,3,2,'1987-10-07',0,'Jelly Stone Park','Jelly Stone Park','breakfast & hike','chase Yogi bear ','rest','Jelly Stone Park');
INSERT INTO `vacation_plan`(`vacation_plan_id`, `vacation_id`, `row_number`, `day_date`, `travel_time`, `starting_location`, `ending_location`, `morning`, `afternoon`, `evening`, `lodging`)
  VALUES (19,3,3,'1987-10-07',5,'Jelly Stone Park','Bedrock','set bear traps','eat before Yogi wakes up','drive home','home = Bedrock');
  
