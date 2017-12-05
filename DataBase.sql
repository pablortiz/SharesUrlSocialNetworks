CREATE DATABASE `shares` /*!40100 DEFAULT CHARACTER SET utf16 COLLATE utf16_spanish_ci */;
USE shares;
CREATE TABLE `urlcounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(500) COLLATE utf16_spanish_ci DEFAULT NULL,
  `social` varchar(45) COLLATE utf16_spanish_ci DEFAULT NULL,
  `count` varchar(45) COLLATE utf16_spanish_ci DEFAULT NULL,
  `token` varchar(64) COLLATE utf16_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;