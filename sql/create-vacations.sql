USE `seis752_vacation`;

DROP TABLE IF EXISTS `vacations`;

CREATE TABLE IF NOT EXISTS `vacations` (  vacation_id BIGINT PRIMARY KEY, user_id int(11) NOT NULL, name VARCHAR(60) );

INSERT INTO `vacations` (`vacation_id`, `user_id`, `name`)
  VALUES (1, 1, 'Utah Road Trip'),
  (2, 2, 'BWCA Brule'),
  (3, 3, 'Jellystone Park'),
  (4, 1, 'Mike''s coast to coast');

ALTER TABLE `vacations`
MODIFY `vacation_id` BIGINT NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;