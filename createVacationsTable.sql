DROP TABLE `vacationplanner_db`.`vacations` 

CREATE TABLE IF NOT EXISTS `vacations` (  vacationNum BIGINT PRIMARY KEY, email VARCHAR(40), name VARCHAR(60) );


INSERT INTO `vacationplanner_db`.`vacations` (`vacationNum`, `email`, `name`) 
VALUES ('2', 'mike@somemail.com', 'Mike P'), 
       ('3', 'john@othermail.com', 'John S'),
	   ('4', 'ralph@othermail.com', 'Ralph Cramden'),
	   ('5', 'fredF@othermail.com', 'Fred Flintstone');