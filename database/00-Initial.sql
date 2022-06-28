CREATE DATABASE `bladeinsight_v1` /*!40100 DEFAULT CHARACTER SET utf8 */;

CREATE TABLE `turbines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(155) NOT NULL,
  `manufacture` varchar(255) NOT NULL,
  `dimension_positive` varchar(45) NOT NULL,
  `dimension_negative` varchar(45) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;