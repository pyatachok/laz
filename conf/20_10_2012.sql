CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `fio` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('user','admin','manager','reseller') NOT NULL DEFAULT 'user',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `activated` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `username` (`username`),
  KEY `email` (`email`),
  KEY `role` (`role`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1  ;

delete from fabric_theatre_hall where seans_id=99999;
delete from zil_hall where seans_id=99999;
delete from zil_south_big_hall where seans_id=99999;

Insert into fabric_theatre_hall(place_type_id, ticket_state_id,seat_number,`row`,`column`,seans_id,hall_part)
SELECT IF ((place_type_id=3 OR place_type_id=4 OR place_type_id=5), 2,  place_type_id)  AS place_type_id, ticket_state_id, seat_number,`row`,`column`,99999 AS seans_id,hall_part 
from fabric_theatre_hall
WHERE seans_id = 47;

Insert into zil_hall(place_type_id, ticket_state_id,seat_number,`row`,`column`,seans_id,hall_part)
SELECT IF ((place_type_id=3 OR place_type_id=4 OR place_type_id=5), 2,  place_type_id)  AS place_type_id, ticket_state_id, seat_number,`row`,`column`,99999 AS seans_id,hall_part 
from zil_hall
WHERE seans_id = 42;

Insert into zil_south_big_hall(place_type_id, ticket_state_id,seat_number,`row`,`column`,seans_id,hall_part)
SELECT IF ((place_type_id=3 OR place_type_id=4 OR place_type_id=5), 2,  place_type_id)  AS place_type_id, ticket_state_id, seat_number,`row`,`column`,99999 AS seans_id,hall_part 
from zil_south_big_hall
WHERE seans_id = 43;


CREATE TABLE IF NOT EXISTS `seat_kassa_url` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `seat_id` int(11) NOT NULL,
  `zal_alias` varchar(255) CHARACTER SET utf8 NOT NULL,
  `url` varchar(255) CHARACTER SET utf8 NOT NULL,
  `kassa_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `seat_id` (`seat_id`),
  KEY `zal_alias`(`zal_alias`),
  KEY `url`(`url`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


ALTER TABLE `users` CHANGE `role` `role` ENUM( 'user', 'admin', 'manager', 'reseler', 'supervisor' ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'user'
ALTER TABLE `users` CHANGE `fio` `fio` VARCHAR( 100 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL 

ALTER TABLE `seans` ADD `is_present` INT( 1 ) UNSIGNED NOT NULL DEFAULT '0',
ADD `present_price` DECIMAL( 6, 2 ) NOT NULL;
ALTER TABLE `orders` ADD `presents_count` SMALLINT UNSIGNED NOT NULL DEFAULT '0',
ADD `presents_amount` DECIMAL( 10, 2 ) NOT NULL DEFAULT '0';


CREATE TABLE IF NOT EXISTS `static_variables` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `value` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251 AUTO_INCREMENT=1 ;

INSERT INTO `a54101_2`.`static_variables` (`id`, `name`, `value`) 
VALUES 
(NULL, 'theatre_name_ru', 'Театр Живой Анимации'), 
(NULL, 'theatre_name_ru', 'Live Animation Theatre');


INSERT INTO `a54101_2`.`static_variables` (
`id` ,
`name` ,
`value`
)
VALUES (
NULL , 'sute_url', 'www.liveanimation.ru'
);

ALTER TABLE `hall` ADD `ticket_row` INT( 10 ) UNSIGNED NOT NULL ,
ADD INDEX ( `ticket_row` ) ;
ALTER TABLE `zil_south_big_hall` ADD `ticket_row` INT( 10 ) UNSIGNED NOT NULL ,
ADD INDEX ( `ticket_row` );
ALTER TABLE `zil_hall` ADD `ticket_row` INT( 10 ) UNSIGNED NOT NULL ,
ADD INDEX ( `ticket_row` );

update russkiy_dom_hall set ticket_row = row;
update zil_south_big_hall set ticket_row = row;
update zil_hall set ticket_row = row;
update russian_dom_hall set ticket_row = row;
update domarchitecture2_hall set ticket_row = row;
update fabric_theatre_hall set ticket_row = row;

ALTER TABLE `users` ADD `code` VARCHAR( 100 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL 

INSERT INTO `static_variables` (`id` ,`name` ,`value`)
VALUES (
NULL , 'book_expiration_days', '5')


ALTER TABLE `orders` ADD `is_delivery` VARCHAR( 255 ) NOT NULL 