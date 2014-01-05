/*
SQLyog Ultimate v8.55 
MySQL - 5.5.24-log : Database - it_shop
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`it_shop` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `it_shop`;

/*Table structure for table `image` */

DROP TABLE IF EXISTS `image`;

CREATE TABLE `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `extension` varchar(255) NOT NULL,
  `size` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

/*Data for the table `image` */

insert  into `image`(`id`,`name`,`type`,`extension`,`size`) values (5,'prt_scr.png','image/png','png',365.306),(6,'prt_scr.png','image/png','png',365.306),(7,'prt_scr.png','image/png','png',365.306),(8,'prt_scr.png','image/png','png',365.306),(9,'prt_scr.png','image/png','png',365.306),(10,'pre_beach2aw.jpg','image/jpeg','jpg',26.3633),(11,'pre_beach2aw.jpg','image/jpeg','jpg',26.3633),(12,'243tenebra (35).jpg','image/jpeg','jpg',1747.23),(13,'243tenebra (35).jpg','image/jpeg','jpg',1747.23),(14,'prt_scr.png','image/png','png',365.306),(15,'tenebra_1 (24).jpg','image/jpeg','jpg',517.141),(16,'tenebra_1 (5).jpg','image/jpeg','jpg',431.172),(17,'tenebra_1 (1).jpg','image/jpeg','jpg',819.523),(18,'tenebra_6 (1).jpg','image/jpeg','jpg',704.301),(19,'tenebra_1 (5).jpg','image/jpeg','jpg',431.172),(20,'tenebra_1 (4).jpg','image/jpeg','jpg',775.112),(21,'tenebra_1 (5).jpg','image/jpeg','jpg',431.172),(22,'tenebra_1 (8).jpg','image/jpeg','jpg',890.684),(23,'tenebra_1 (6).jpg','image/jpeg','jpg',971.756),(24,'tenebra_1 (1).jpg','image/jpeg','jpg',819.523),(25,'tenebra_1 (6).jpg','image/jpeg','jpg',971.756),(26,'tenebra_1 (1).jpg','image/jpeg','jpg',819.523),(27,'tenebra_1 (1).jpg','image/jpeg','jpg',819.523),(28,'tenebra_1 (1).jpg','image/jpeg','jpg',819.523),(29,'tenebra_1 (1).jpg','image/jpeg','jpg',819.523);

/*Table structure for table `menu` */

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `name` varchar(255) NOT NULL,
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `menu` */

insert  into `menu`(`name`,`id`) values ('main_menu',1);

/*Table structure for table `menu_item` */

DROP TABLE IF EXISTS `menu_item`;

CREATE TABLE `menu_item` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `menu` int(11) NOT NULL,
  `require_login` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`,`menu`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `menu_item` */

insert  into `menu_item`(`id`,`title`,`path`,`menu`,`require_login`) values (1,'Home','/index.php',1,0),(2,'Contact','/contact.php',1,0),(4,'View Products','/products.php',1,0),(5,'Admin Panel','/admin.php',1,1),(6,'Add New Product','/add-new.php',0,1),(7,'Edit Product','/edit-product.php',0,1),(8,'Login','/login.php',0,0),(9,'Contact','/contact.php',1,0);

/*Table structure for table `product` */

DROP TABLE IF EXISTS `product`;

CREATE TABLE `product` (
  `name` varchar(255) DEFAULT NULL,
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` text,
  `image` int(11) DEFAULT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `product` */

insert  into `product`(`name`,`id`,`description`,`image`,`price`) values ('test',11,'test',27,23),('',13,'<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>test</p>\r\n</body>\r\n</html>',0,0);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`,`username`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id`,`username`,`password`,`firstname`,`lastname`) values (1,'admin','d033e22ae348aeb5660fc2140aec35850c4da997',NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
