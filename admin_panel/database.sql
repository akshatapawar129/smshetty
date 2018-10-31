

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `sms_facilities` */

insert  into `sms_facilities`(`fac_id`,`fac_img`,`fac_title`,`fac_desc`,`fac_active`,`fac_add_date`,`fac_edit_date`) values (1,'facilities_1540879611.jpg','Classroom','These Classrooms enhance the teaching and learning environment by allowing Faculty, Staff and Studentsâ€¦',0,'2018-10-30 11:36:51','2018-10-30 11:36:58'),(2,'facilities_1540879647.jpg','COMPUTER LAB','The computer lab of the department has various i3, AMD processor based PCs running on Windows',0,'2018-10-30 11:37:27',NULL),(3,'facilities_1540879670.jpg','LIBRARY','Our Library is well-stocked with a huge collection of reference books, encyclopedias, magazines and journals.',0,'2018-10-30 11:37:50',NULL),(4,'facilities_1540879709.jpg','PLAYGROUND','A lush green playground with a cricket pitch and facilities for football.',0,'2018-10-30 11:38:29',NULL),(5,'facilities_1540879750.jpg','CANTEEN','The College is equipped with a well designed canteen that serves nutritious food',0,'2018-10-30 11:39:10',NULL),(6,'facilities_1540879837.jpg','MSC.IT LAB','Exclusive State-of-the-art MSc.IT Lab',0,'2018-10-30 11:40:37',NULL),(7,'facilities_1540879858.jpg','\';select * from demo','t is a long established\' fact that a reader will be distracted by the readable content of a page when looking at its layout.',1,'2018-10-30 11:40:58',NULL);

/*Table structure for table `sms_footer_links` */

DROP TABLE IF EXISTS `sms_footer_links`;

CREATE TABLE `sms_footer_links` (
  `link_id` int(11) NOT NULL AUTO_INCREMENT,
  `link_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link_active` int(11) DEFAULT '0',
  `link_add_date` datetime DEFAULT NULL,
  `link_edit_date` datetime DEFAULT NULL,
  PRIMARY KEY (`link_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `sms_footer_links` */

insert  into `sms_footer_links`(`link_id`,`link_name`,`link_url`,`link_active`,`link_add_date`,`link_edit_date`) values (1,'SiteMap','http://smshettycollege.edu.in/sitemap/',0,'2018-10-29 16:59:21','2018-10-31 10:45:21'),(2,'Services','http://smshettycollege.edu.in/services/',0,'2018-10-29 16:59:51','2018-10-31 10:45:41'),(3,'RTI','http://smshettycollege.edu.in/rti/',0,'2018-10-29 17:00:12','2018-10-31 10:46:11'),(4,'Academic Calender','http://smshettycollege.edu.in/wp-content/uploads/2018/08/2018-19-calendar-for-sms-shetty-1.pdf',0,'2018-10-31 10:46:32',NULL),(5,'College Magazine','http://smshettycollege.edu.in/',0,'2018-10-31 10:46:57',NULL),(6,'E-journal','http://smshettycollege.edu.in/',0,'2018-10-31 10:47:04',NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `sms_institute` */

insert  into `sms_institute`(`inst_id`,`inst_name`,`inst_desc`,`inst_icon`,`inst_color`,`inst_add_date`,`inst_edit_date`,`inst_active`) values (21,'International School & Jr. College','To create a liberating learning environment that cherishes individual potential to nurture, confident, responsible, innovative and engaged global citizens.','institute_1540886407.png','#f0615e','2018-10-30 13:30:07',NULL,0),(22,'High School & Junior College','Bunts Sangha\'s S. M. Shetty High School and Junior College is managed by the Powai Education Committee on behalf of by Bunts Sangha Mumbai.','institute_1540886478.png','#d7a974','2018-10-30 13:31:18',NULL,0),(23,'Play School & Day Care','The SM Angels Daycare and Playschool Centre is such an institution located in Powai, which is one of the Mumbaiâ€™s prime areaâ€¦..','institute_1540886529.png','#24c12c','2018-10-30 13:32:09',NULL,0),(24,'Degree College','Buntâ€™s Sanghaâ€™s S.M. Shetty College of Science, Commerce and Management studies is committed to promote and propagate quality education with relevant excellence.','institute_1540886601.png','#5bb3d7','2018-10-30 13:33:21','2018-10-30 13:33:28',0);

/*Table structure for table `sms_news` */

DROP TABLE IF EXISTS `sms_news`;

CREATE TABLE `sms_news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `news_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `news_desc` longtext COLLATE utf8_unicode_ci,
  `news_date` date DEFAULT NULL,
  `news_active` int(11) DEFAULT '0',
  `news_add_date` datetime DEFAULT NULL,
  `news_edit_date` datetime DEFAULT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `sms_news` */

insert  into `sms_news`(`news_id`,`news_title`,`news_desc`,`news_date`,`news_active`,`news_add_date`,`news_edit_date`) values (1,'Nature Club Trip','<p>A visit to the butterfly garden, OWALEKAR WADI, was conducted by the nature club of the college as a part of their Environment Awareness programme, on 14 September, 2014The members of the photography club also joined this programme. The&nbsp; intentionwas to learn about the environment of butterflies and the need to conserve the environment to protect the various species of butterflies.Mr. IsaacKehimkar(BNHS) and Mr. Rajesh Owalekarbriefed the members of the club about the life of a butterfly and its various species.</p>','2017-05-05',0,'2018-10-30 18:39:16',NULL),(2,'WDC Poster Making Competition','<p>WDC (Womenâ€™sâ€™ Development Cell) organized a poster making competition in the college on the 12th of August, 2014. The purpose of the competition was to provide a platform to the students to express their views on the status of women in todayâ€™s world. Principal Dr. SridharaShetty inaugurated the competition which saw interesting views expressed through art.</p>','2017-05-05',0,'2018-10-30 18:40:07','2018-10-31 10:59:00'),(3,'Nature Club Trip','<p>A visit to the butterfly garden, OWALEKAR WADI, was conducted by the nature club of the college as a part of their Environment Awareness programme, on 14 September, 2014The members of the photography club also joined this programme. The&nbsp; intentionwas to learn about the environment of butterflies and the need to conserve the environment to protect the various species of butterflies.Mr. IsaacKehimkar(BNHS) and Mr. Rajesh Owalekarbriefed the members of the club about the life of a butterfly and its various species.</p>','2017-05-05',0,'2018-10-31 09:24:31','2018-10-31 10:57:44');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `sms_notice_board` */

insert  into `sms_notice_board`(`notice_id`,`notice_title`,`notice_attach`,`notice_url`,`notice_active`,`notice_add_date`,`notice_edit_date`) values (1,'Notice for Examination','notice_1540878034.pdf',NULL,0,'2018-10-30 11:10:34',NULL),(2,'First Merit list of BBI',NULL,'http://smshettycollege.edu.in/',0,'2018-10-30 11:10:45',NULL),(3,'Porspectus 2018-19',NULL,'http://smshettycollege.edu.in/wp-content/uploads/2018/05/18_BsSmsDCollege_Prosp_Final.pdf',0,'2018-10-30 11:12:04',NULL),(4,'Third Merit list','notice_1540878163.pdf',NULL,0,'2018-10-30 11:12:43',NULL),(5,'Notice for Repeater','notice_1540878220.pdf',NULL,0,'2018-10-30 11:13:40',NULL),(6,'B.B.I Exam Timetable','notice_1540878268.pdf',NULL,0,'2018-10-30 11:14:28',NULL);

/*Table structure for table `sms_one_time` */

DROP TABLE IF EXISTS `sms_one_time`;

CREATE TABLE `sms_one_time` (
  `change_id` int(11) NOT NULL AUTO_INCREMENT,
  `con_add` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `con_phone` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `con_fax` decimal(10,0) DEFAULT NULL,
  `con_mail` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fb_link` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tw_link` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ln_link` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gp_link` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`change_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `sms_one_time` */

insert  into `sms_one_time`(`change_id`,`con_add`,`con_phone`,`con_fax`,`con_mail`,`fb_link`,`tw_link`,`ln_link`,`gp_link`) values (1,'Hiranandani Gardens, Powai, Mumbai- 400076, Maharashtra','022 61327352/56/63','25706687','college@smshettyinstitute.in',NULL,NULL,NULL,NULL);

/*Table structure for table `sms_slider_home` */

DROP TABLE IF EXISTS `sms_slider_home`;

CREATE TABLE `sms_slider_home` (
  `sms_slider_id` int(11) NOT NULL AUTO_INCREMENT,
  `sms_slider_img` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sms_img_active` int(11) NOT NULL DEFAULT '0',
  `sms_img_add_date` datetime DEFAULT NULL,
  `sms_img_edit_date` datetime DEFAULT NULL,
  PRIMARY KEY (`sms_slider_id`,`sms_img_active`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `sms_slider_home` */

insert  into `sms_slider_home`(`sms_slider_id`,`sms_slider_img`,`sms_img_active`,`sms_img_add_date`,`sms_img_edit_date`) values (1,'slider_1540873046.jpg',0,'2018-10-30 09:47:26',NULL),(2,'slider_1540873052.jpg',0,'2018-10-30 09:47:32',NULL),(3,'slider_1540873057.jpg',0,'2018-10-30 09:47:37',NULL),(4,'slider_1540873245.jpg',0,'2018-10-30 09:50:45',NULL),(5,'slider_1540873288.jpg',0,'2018-10-30 09:51:28',NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `smshetty_login` */

insert  into `smshetty_login`(`adm_id`,`adm_us_nm`,`adm_pass`,`adm_email`,`adm_type`,`adm_active`,`adm_sess_id`) values (1,'akshata','9684b5477f9b496c9d6f1bb20dd0c4ea','akshatpawar129@gmail.com',1,0,'400p9uphhguoqvk4bm43m49mj1'),(2,'SMS_AdMINSMShy_Col@786','d698acf1ac697d927d2f8b5f499b1319','akshata.p@trinityglobalservices.org',1,0,'i4r0lbiflq8ics3mmo0g8i6nv6');
