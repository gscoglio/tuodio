CREATE TABLE `following` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `user_id` varchar(64) CHARACTER SET utf8 NOT NULL,
 `application` varchar(32) CHARACTER SET utf8 NOT NULL,
 `fecha` varchar(8) CHARACTER SET utf8 NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=latin1
