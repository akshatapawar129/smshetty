/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 10.1.36-MariaDB : Database - smshetty_admin
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`smshetty_admin` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;

USE `smshetty_admin`;

/*Table structure for table `sms_facilities` */

DROP TABLE IF EXISTS `sms_facilities`;

CREATE TABLE `sms_facilities` (
  `fac_id` int(11) NOT NULL AUTO_INCREMENT,
  `fac_img` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fac_title` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fac_desc` varchar(3000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fac_active` int(11) DEFAULT '0',
  `fac_add_date` datetime DEFAULT NULL,
  `fac_edit_date` datetime DEFAULT NULL,
  PRIMARY KEY (`fac_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `sms_facilities` */

insert  into `sms_facilities`(`fac_id`,`fac_img`,`fac_title`,`fac_desc`,`fac_active`,`fac_add_date`,`fac_edit_date`) values (1,'facilities_1540557147.jpg','','',1,'2018-10-26 18:02:27',NULL),(2,'facilities_1540557226.jpg','Classroom','t is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.',1,'2018-10-26 18:03:46',NULL),(3,'facilities_1540612061.png','Classroom','t is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.',1,'2018-10-27 09:17:41',NULL),(4,'facilities_1540620993.jpg','Classroom1','t is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.1',0,'2018-10-27 09:19:03','2018-10-27 11:46:33'),(5,'facilities_1540616224.jpg','','',1,'2018-10-27 10:27:04',NULL),(6,'facilities_1540616245.jpg','','',1,'2018-10-27 10:27:25',NULL),(7,'facilities_1540616372.jpg','Class\"room\'','t is a long established fact that a reader \'will be distracted by the readable content of a page when looking at its \'\"layout.',0,'2018-10-27 10:29:32',NULL),(8,'facilities_1540621353.jpg','\';select * from demo\" fdgsdfg','t is a long established fact that a reader will be distracted \"\"by the readable content of a page when looking at its layout.',0,'2018-10-27 10:32:49','2018-10-27 12:30:40'),(9,'institute_1540627865.jpg','','Lorem Ipsum is \"\"simply dummy text of\' the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. ',0,'2018-10-27 13:41:05',NULL);

/*Table structure for table `sms_institute` */

DROP TABLE IF EXISTS `sms_institute`;

CREATE TABLE `sms_institute` (
  `inst_id` int(11) NOT NULL AUTO_INCREMENT,
  `inst_name` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `inst_desc` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `inst_icon` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `inst_color` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `inst_add_date` datetime DEFAULT NULL,
  `inst_edit_date` datetime DEFAULT NULL,
  `inst_active` int(11) DEFAULT '0',
  PRIMARY KEY (`inst_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `sms_institute` */

insert  into `sms_institute`(`inst_id`,`inst_name`,`inst_desc`,`inst_icon`,`inst_color`,`inst_add_date`,`inst_edit_date`,`inst_active`) values (1,'HIgh school and Jr college','Lorem Ipsum is \"\"simply dummy text of\' the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. ','institute_1540635436.jpg','#000000','2018-10-27 15:47:16',NULL,0),(2,'HIgh school and Jr college','Lorem Ipsum is \"\"simply dummy text of\' the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. ','institute_1540635917.jpg','#000000','2018-10-27 15:55:17',NULL,0);

/*Table structure for table `sms_notice_board` */

DROP TABLE IF EXISTS `sms_notice_board`;

CREATE TABLE `sms_notice_board` (
  `notice_id` int(11) NOT NULL AUTO_INCREMENT,
  `notice_title` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `notice_attach` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `notice_url` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `notice_active` int(11) DEFAULT '0',
  `notice_add_date` datetime DEFAULT NULL,
  `notice_edit_date` datetime DEFAULT NULL,
  PRIMARY KEY (`notice_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `sms_notice_board` */

insert  into `sms_notice_board`(`notice_id`,`notice_title`,`notice_attach`,`notice_url`,`notice_active`,`notice_add_date`,`notice_edit_date`) values (1,'Notice for Examination','notice_1540538455.pdf',NULL,0,NULL,NULL),(2,'Third Merit List - F.Y.BMS','notice_1540538420.pdf','http://smshettycollege.edu.in/',0,NULL,NULL),(3,'Third Merit List - F.Y.BMS',NULL,'http://smshettycollege.edu.in/',0,NULL,NULL),(4,'First Semester ATKT time table','notice_1540531784.pdf','http://smshettycollege.edu.in/',0,NULL,NULL),(5,'First Semester ATKT time table','notice_1540531879.pdf',NULL,0,NULL,NULL),(6,'Notice for Examination',NULL,'http://smshettycollege.edu.in\"/',0,NULL,'2018-10-27 12:30:11'),(7,'Notice for Examination','notice_1540538628.pdf','',0,NULL,NULL),(8,'First Merit list of BBI','notice_1540535084.pdf',NULL,1,NULL,NULL),(9,'Notice for Examination','notice_1540539381.pdf',NULL,1,NULL,NULL),(10,'Notice for Examination1','notice_1540541068.pdf','',1,'2018-10-26 13:32:09','2018-10-26 13:34:28'),(11,'Notice for Examination1',NULL,'http://smshettycollege.edu.in/',1,'2018-10-26 13:32:41','2018-10-26 13:34:05');

/*Table structure for table `sms_slider_home` */

DROP TABLE IF EXISTS `sms_slider_home`;

CREATE TABLE `sms_slider_home` (
  `sms_slider_id` int(11) NOT NULL AUTO_INCREMENT,
  `sms_slider_img` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sms_img_active` int(11) NOT NULL DEFAULT '0',
  `sms_img_add_date` datetime DEFAULT NULL,
  `sms_img_edit_date` datetime DEFAULT NULL,
  PRIMARY KEY (`sms_slider_id`,`sms_img_active`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `sms_slider_home` */

insert  into `sms_slider_home`(`sms_slider_id`,`sms_slider_img`,`sms_img_active`,`sms_img_add_date`,`sms_img_edit_date`) values (11,'slider_1540451115.jpg',0,'2018-10-25 12:35:15',NULL),(12,'slider_1540451121.jpg',0,'2018-10-25 12:35:21',NULL),(13,'slider_1540462787.jpg',0,'2018-10-25 12:35:31','2018-10-25 15:49:47'),(14,'slider_1540459947.jpg',1,'2018-10-25 12:35:43','2018-10-25 15:02:27');

/*Table structure for table `smshetty_login` */

DROP TABLE IF EXISTS `smshetty_login`;

CREATE TABLE `smshetty_login` (
  `adm_id` int(11) NOT NULL AUTO_INCREMENT,
  `adm_us_nm` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adm_pass` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adm_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adm_type` int(11) NOT NULL DEFAULT '0',
  `adm_active` int(11) NOT NULL DEFAULT '0',
  `adm_sess_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`adm_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `smshetty_login` */

insert  into `smshetty_login`(`adm_id`,`adm_us_nm`,`adm_pass`,`adm_email`,`adm_type`,`adm_active`,`adm_sess_id`) values (1,'akshata','9684b5477f9b496c9d6f1bb20dd0c4ea','akshatpawar129@gmail.com',1,0,'s9d3mi31ccf3cqqdcjsr9o8bb0');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
