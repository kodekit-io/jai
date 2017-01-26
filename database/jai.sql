/*
SQLyog Community v12.3.2 (64 bit)
MySQL - 5.7.16-0ubuntu0.16.04.1 : Database - jai
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

/*Table structure for table `career_details` */

DROP TABLE IF EXISTS `career_details`;

CREATE TABLE `career_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `career_id` int(10) unsigned NOT NULL,
  `lang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `career_details_career_id_foreign` (`career_id`),
  CONSTRAINT `career_details_career_id_foreign` FOREIGN KEY (`career_id`) REFERENCES `careers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `career_details` */

insert  into `career_details`(`id`,`career_id`,`lang`,`slug`,`position`,`description`) values 

(11,3,'en','environment-scientist-en','Environment Scientist (EN)','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),

(12,3,'id','environment-scientist-id','Environment Scientist (ID)','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),

(17,4,'en','operation-manager-en','Operation Manager (EN)','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),

(18,4,'id','operation-manager-id','Operation Manager (ID)','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),

(21,2,'en','programmers-en','Programmers (EN)','Programmers'),

(22,2,'id','programmers-id','Programmers  (ID)','Be a programmers');

/*Table structure for table `career_metas` */

DROP TABLE IF EXISTS `career_metas`;

CREATE TABLE `career_metas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `career_id` int(10) unsigned NOT NULL,
  `meta_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_value` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `career_metas_career_id_foreign` (`career_id`),
  CONSTRAINT `career_metas_career_id_foreign` FOREIGN KEY (`career_id`) REFERENCES `careers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `career_metas` */

insert  into `career_metas`(`id`,`career_id`,`meta_key`,`meta_value`) values 

(13,2,'meta_description-en','META (EN)'),

(14,2,'meta_description-id','META (ID)');

/*Table structure for table `careers` */

DROP TABLE IF EXISTS `careers`;

CREATE TABLE `careers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `department` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active_date` date NOT NULL,
  `contact_person` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `careers` */

insert  into `careers`(`id`,`department`,`active_date`,`contact_person`,`created_at`,`updated_at`) values 

(2,'ICT','2017-01-01','Dodo','2016-11-13 23:29:40','2017-01-13 14:05:45'),

(3,'Biological Program','2016-11-22','Dodo','2016-11-15 00:19:05','2016-11-15 00:19:05'),

(4,'Operation and Business Development','2016-11-30','Dodo','2016-11-15 00:39:02','2016-11-15 00:39:39');

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_type_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `categories` */

insert  into `categories`(`id`,`post_type_id`,`name`,`slug`,`description`,`created_at`,`updated_at`,`parent_id`) values 

(1,1,'News','news',NULL,'2016-10-21 05:40:03','2016-10-21 05:40:03',0),

(2,1,'What\'s On','whats-on',NULL,'2016-10-21 18:59:54','2016-10-21 18:59:54',0),

(3,2,'Test Category','test-category',NULL,NULL,NULL,0),

(15,1,'Coba','coba',NULL,'2016-10-21 19:46:19','2016-10-21 19:46:19',0),

(17,3,'Experience','experience',NULL,NULL,NULL,0),

(18,3,'Shows & Attraction','shows-attraction',NULL,NULL,NULL,0),

(19,3,'Dining & Shopping','dining-shopping',NULL,NULL,NULL,0),

(21,4,'Animals','animals',NULL,NULL,NULL,0),

(22,4,'Conservation','conservation',NULL,NULL,NULL,0),

(23,4,'Event','event',NULL,NULL,NULL,0),

(24,4,'Research','research',NULL,NULL,NULL,0),

(25,4,'Leadership','leadership',NULL,NULL,NULL,0);

/*Table structure for table `cimb_checkouts` */

DROP TABLE IF EXISTS `cimb_checkouts`;

CREATE TABLE `cimb_checkouts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `process_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_id` bigint(20) unsigned NOT NULL,
  `payment_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `currency` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remark` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trans_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `error_desc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `signature` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `cimb_checkouts` */

insert  into `cimb_checkouts`(`id`,`process_type`,`order_id`,`payment_id`,`amount`,`currency`,`remark`,`trans_id`,`auth_code`,`status`,`error_desc`,`message`,`signature`,`created_at`,`updated_at`) values 

(4,'',108,'',200000,'IDR','','','','','','Transaction request start','RzMOVsBLq4Msk6ZzPOhOhmcIVK4=','2017-01-05 02:47:38','2017-01-05 02:47:38'),

(5,'',109,'',265000,'IDR','','','','','','Transaction request start','kanKRgHN+FN4tQ7S31C1xdxVTJ8=','2017-01-05 02:53:07','2017-01-05 02:53:07'),

(6,'',110,'',265000,'IDR','','','','','','Transaction request start','B4PeWyPGdnczGkqVUf9ixZvXerk=','2017-01-05 03:49:16','2017-01-05 03:49:16'),

(7,'',111,'',200000,'IDR','','','','','','Transaction request start','BC7nBj76p0SBoBIU1E/96b94xxY=','2017-01-05 03:56:40','2017-01-05 03:56:40'),

(8,'',111,'7',200000,'IDR','','T0023172200','null','0','Payment fail','Payment is failed : Payment fail','3ONrAIhh+Fgu82Am5T68vmFZC1c=','2017-01-05 04:09:00','2017-01-05 04:09:00'),

(9,'',112,'',265000,'IDR','','','','','','Transaction request start','eNhqx2101pFqDBmPr3az7I+nLAg=','2017-01-05 04:14:06','2017-01-05 04:14:06'),

(10,'',112,'7',265000,'IDR','','T0023172500','','0','Duplicate transaction id','Payment is failed : Duplicate transaction id','vs4zfDp2OwJPfMliM7DhczJ98m0=','2017-01-05 04:15:17','2017-01-05 04:15:17'),

(11,'',113,'',265000,'IDR','','','','','','Transaction request start','/Ch0m2YH3c/7FzxAYd8hxEoGWRo=','2017-01-05 04:16:50','2017-01-05 04:16:50'),

(12,'',113,'7',265000,'IDR','','T0023173200','null','0','Payment fail','Payment is failed : Payment fail','Xk96Z2fI40UH8Y2fgmLJVnbzQNU=','2017-01-05 04:28:50','2017-01-05 04:28:50'),

(13,'',114,'',200000,'IDR','','','','','','Transaction request start','fNN6MXK5eSF65Tsb58OAtopaSa4=','2017-01-05 06:31:20','2017-01-05 06:31:20'),

(14,'',115,'',200000,'IDR','','','','','','Transaction request start','d+AWJJKXfFJjpkf+0R22G+7c/Tg=','2017-01-05 06:33:10','2017-01-05 06:33:10'),

(15,'',115,'7',200000,'IDR','','T0023174800','null','0','Payment fail','Payment is failed : Payment fail','/d7DdSQZJ1U7eYA70x/w6Y+9+gY=','2017-01-05 06:46:46','2017-01-05 06:46:46'),

(16,'',116,'',200000,'IDR','','','','','','Transaction request start','FasCFjoU8W/2/FDnIwHF6DaKQao=','2017-01-05 07:45:19','2017-01-05 07:45:19'),

(17,'',116,'7',200000,'IDR','','T0023175000','RB50307459','0','Payment fail','Payment is failed : Payment fail','fe86yCaKI+Ngnk4nWiqwUleploI=','2017-01-05 07:48:50','2017-01-05 07:48:50'),

(18,'',117,'',200000,'IDR','','','','','','Transaction request start','cd0lWuAtUmX4KdNtFZj7Ys+8o+U=','2017-01-05 07:55:41','2017-01-05 07:55:41'),

(19,'',118,'',200000,'IDR','','','','','','Transaction request start','neAQv9F5dwv+3tNEMA4kfJ+cb8c=','2017-01-05 08:02:30','2017-01-05 08:02:30'),

(20,'',118,'7',20000000,'IDR','','T0023175200','','0','Signature not match','Invalid signature. Transaction is Failed','','2017-01-05 08:03:13','2017-01-05 08:03:13'),

(21,'',119,'',20000000,'IDR','','','','','','Transaction request start','ZsHkbeVj99fMXDLuSRqLUeZlvzg=','2017-01-05 08:04:17','2017-01-05 08:04:17'),

(22,'',119,'7',20000000,'IDR','','T0023175300','RB5030745971','1','','Transaction is succeed','ZWqWgpQxFEuS84sLBUAugOwqCuI=','2017-01-05 08:07:35','2017-01-05 08:07:35'),

(23,'',120,'',20000000,'IDR','','','','','','Transaction request start','YXAYYKxSi+ByqHTW+YYDb5KpQ/o=','2017-01-09 03:04:31','2017-01-09 03:04:31'),

(24,'',121,'',47500000,'IDR','','','','','','Transaction request start','mrb2VfgYLl3MYF4F52BKsZs2mnU=','2017-01-09 03:25:06','2017-01-09 03:25:06'),

(25,'',122,'',67500000,'IDR','','','','','','Transaction request start','+/nzRtkgOi28TDR1UM+npy32QJQ=','2017-01-09 03:25:27','2017-01-09 03:25:27'),

(26,'',122,'7',67500000,'IDR','','T0023179600','null','0','Payment fail','Payment is failed : Payment fail','7SvOHwFF45/+lVrQhbn3ThiP2ao=','2017-01-09 03:26:29','2017-01-09 03:26:29'),

(27,'',123,'',67500000,'IDR','','','','','','Transaction request start','NlAY8XRy3wASCq3M+Vr9ZYaIMaI=','2017-01-09 06:40:44','2017-01-09 06:40:44'),

(28,'',123,'7',67500000,'IDR','','T0023179900','RB5030745980','1','','Transaction is succeed','9jPdmlFmvlXIzNFtoDDux2SindQ=','2017-01-09 06:42:38','2017-01-09 06:42:38'),

(29,'',123,'7',67500000,'IDR','','T0023179900','RB5030745980','1','','Transaction is succeed','9jPdmlFmvlXIzNFtoDDux2SindQ=','2017-01-09 06:43:19','2017-01-09 06:43:19'),

(30,'',123,'7',67500000,'IDR','','T0023179900','RB5030745980','1','','Transaction is succeed','9jPdmlFmvlXIzNFtoDDux2SindQ=','2017-01-09 06:46:48','2017-01-09 06:46:48'),

(31,'',123,'7',67500000,'IDR','','T0023179900','RB5030745980','1','','Transaction is succeed','9jPdmlFmvlXIzNFtoDDux2SindQ=','2017-01-09 06:51:02','2017-01-09 06:51:02'),

(32,'',124,'',20000000,'IDR','','','','','','Transaction request start','KgU20grBmXI3baI9wFQojXQ5RQA=','2017-01-09 07:01:11','2017-01-09 07:01:11'),

(33,'REDIRECT',124,'7',20000000,'IDR','','T0023180100','RB5030745981','1','','Transaction is succeed, check status succeed','+jzKZxZbDoG9f3EyZ+TxYLmyolY=','2017-01-09 07:02:56','2017-01-09 07:02:56'),

(34,'',125,'',20000000,'IDR','','','','','','Transaction request start','drcFGbhYmdWmKpJ42+2RMLAIc70=','2017-01-09 07:03:52','2017-01-09 07:03:52'),

(35,'',126,'',20000000,'IDR','','','','','','Transaction request start','b/teYalcBxztCi900dST2oS+BC4=','2017-01-09 07:16:09','2017-01-09 07:16:09'),

(36,'REDIRECT',126,'7',200000,'IDR','','T0023180300','','1','','Invalid signature. Transaction is Failed','oaOXJS9g1fKaxiMHQYNGgUbMGAA=','2017-01-09 07:18:02','2017-01-09 07:18:02'),

(37,'',127,'',20000000,'IDR','','','','','','Transaction request start','hFgV5XtYr0NdOIAr/H4WTQub/cE=','2017-01-09 07:22:26','2017-01-09 07:22:26'),

(38,'REDIRECT',127,'7',20000000,'IDR','','T0023180500','null','0','Payment fail','Payment is failed : Payment fail','/Ixfq1Q+u/QsIiiovt+/ggQsc4M=','2017-01-09 07:23:57','2017-01-09 07:23:57'),

(39,'',128,'',20000000,'IDR','','','','','','Transaction request start','98By5IYyc4NP6XFB1yiPgYrG/bA=','2017-01-09 07:25:44','2017-01-09 07:25:44'),

(40,'REDIRECT',128,'7',20000000,'IDR','','T0023180700','RB50307459','0','Payment fail','Payment is failed : Payment fail','u4G6VFUlkjINDdyE7KO/M73dlK0=','2017-01-09 07:28:36','2017-01-09 07:28:36'),

(41,'',129,'',20000000,'IDR','','','','','','Transaction request start','A+6pgseZxX5fmTnqmawGy83x/WI=','2017-01-09 07:29:14','2017-01-09 07:29:14'),

(42,'REDIRECT',129,'7',20000000,'IDR','','T0023180900','RB5030745984','1','','Transaction is succeed, check status succeed','lIKsqTsJmTa04g5ybjs4gVDBqrg=','2017-01-09 07:35:39','2017-01-09 07:35:39'),

(43,'',130,'',27500000,'IDR','','','','','','Transaction request start','XkE/hD2aTiQpl52SLoQ+38iCycM=','2017-01-09 10:06:36','2017-01-09 10:06:36'),

(44,'',131,'',20000000,'IDR','','','','','','Transaction request start','GFLaAhWIW7unsLmfSFwvXLERr7w=','2017-01-10 01:57:12','2017-01-10 01:57:12'),

(45,'',132,'',27500000,'IDR','','','','','','Transaction request start','pqc4KqugbEDeAlOuIMR1LCd5cW8=','2017-01-10 06:44:28','2017-01-10 06:44:28'),

(46,'',133,'',55000000,'IDR','','','','','','Transaction request start','C4UNrpvlsfkaMu3ila0Gxab9WBo=','2017-01-10 09:11:15','2017-01-10 09:11:15'),

(47,'',134,'',40000000,'IDR','','','','','','Transaction request start','AtjZici+Hj/Y1PKmf1jfDiUgv5E=','2017-01-10 09:14:15','2017-01-10 09:14:15'),

(48,'',135,'',55000000,'IDR','','','','','','Transaction request start','V7EupGJhXavDNNYTkQe3fEhOAxE=','2017-01-10 09:16:57','2017-01-10 09:16:57'),

(49,'',136,'',20000000,'IDR','','','','','','Transaction request start','+KPGe813REjU5Kk3GvlG45Tw9qk=','2017-01-10 09:27:36','2017-01-10 09:27:36'),

(50,'',137,'',55000000,'IDR','','','','','','Transaction request start','hTvym5WJ1r7yMl9hpdYVaFxyVqc=','2017-01-10 11:23:43','2017-01-10 11:23:43'),

(51,'',138,'',55000000,'IDR','','','','','','Transaction request start','R5Inlu/5TtmVyqjj2txTdgtqmUg=','2017-01-10 13:05:07','2017-01-10 13:05:07'),

(52,'',139,'',55000000,'IDR','','','','','','Transaction request start','Mc+N5baxKRm+pIPCYfL+8JLxMGI=','2017-01-10 13:06:58','2017-01-10 13:06:58'),

(53,'',140,'',27500000,'IDR','','','','','','Transaction request start','3+7enWXe+8uUAR99BVijSKpHLIs=','2017-01-11 01:36:26','2017-01-11 01:36:26'),

(54,'',141,'',27500000,'IDR','','','','','','Transaction request start','ptgiODp1yFmWRdqXJoS0SEsN8AM=','2017-01-11 01:38:16','2017-01-11 01:38:16'),

(55,'',142,'',27500000,'IDR','','','','','','Transaction request start','uk5fsrTbQDaKgztsldWbLoMvaCE=','2017-01-11 03:18:04','2017-01-11 03:18:04'),

(56,'',143,'',27500000,'IDR','','','','','','Transaction request start','U2D75h35unzwIMfs0yGaqzX9ypE=','2017-01-11 05:24:03','2017-01-11 05:24:03'),

(57,'',144,'',55000000,'IDR','','','','','','Transaction request start','rj09BPqMBobHPSm+OhC7CLGFyWc=','2017-01-11 05:25:11','2017-01-11 05:25:11'),

(58,'',145,'',55000000,'IDR','','','','','','Transaction request start','YamwpmDz3cm5eum0TdW5EhtFtls=','2017-01-11 05:29:58','2017-01-11 05:29:58'),

(59,'',146,'',58000000,'IDR','','','','','','Transaction request start','PQg/NJ+aOhRMqSJnxMMPcYQWpeI=','2017-01-12 03:56:46','2017-01-12 03:56:46'),

(60,'',147,'',58000000,'IDR','','','','','','Transaction request start','9MOpn7U43HmonyFFZq3nxzDv9BQ=','2017-01-12 06:41:27','2017-01-12 06:41:27');

/*Table structure for table `coupons` */

DROP TABLE IF EXISTS `coupons`;

CREATE TABLE `coupons` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `coupon_type` int(11) NOT NULL DEFAULT '1',
  `usage_type` int(11) NOT NULL DEFAULT '1',
  `value` double NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `coupons` */

/*Table structure for table `doku_checkouts` */

DROP TABLE IF EXISTS `doku_checkouts`;

CREATE TABLE `doku_checkouts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `process_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `response_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `result_msg` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_datetime` datetime DEFAULT NULL,
  `payment_channel` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `words` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `session_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bank` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `credit_card` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `doku_checkouts` */

insert  into `doku_checkouts`(`id`,`ip_address`,`process_type`,`order_id`,`amount`,`response_code`,`status_code`,`result_msg`,`payment_datetime`,`payment_channel`,`payment_code`,`words`,`session_id`,`bank`,`credit_card`,`message`,`created_at`,`updated_at`) values 

(1,'112.215.201.185','REQUEST',29,550000,'','','',NULL,'','','55d1fa40fec473157fb6aeb16f0439dda8aa2ad2','Q8HqYlcr6sVj19pKPjEBaE9qpR2b4oFutjDtNBrY','','','Transaction request start','2017-01-03 09:20:03','2017-01-03 09:20:03'),

(2,'112.215.201.182','REQUEST',30,220000,'','','',NULL,'','','aaf056c70bd9985fd0d621aae91374a2922c310b','2o8YXYiLwpRf7FheLDmrLEO3oQcz6Y1TCzVXItQt','','','Transaction request start','2017-01-04 02:19:29','2017-01-04 02:19:29'),

(3,'112.215.201.182','REQUEST',31,220000,'','','',NULL,'','','4d1c0ec44480e1fc099a6e2e2d906eff81e298a4','2o8YXYiLwpRf7FheLDmrLEO3oQcz6Y1TCzVXItQt','','','Transaction request start','2017-01-04 02:42:16','2017-01-04 02:42:16'),

(4,'112.215.201.182','REQUEST',32,220000,'','','',NULL,'','','535827d2c7d99974896f44f6be6df5ef1d133480','2o8YXYiLwpRf7FheLDmrLEO3oQcz6Y1TCzVXItQt','','','Transaction request start','2017-01-04 02:53:38','2017-01-04 02:53:38'),

(5,'112.215.201.182','REQUEST',33,220000,'','','',NULL,'','','4b26444fa36e83927726e7987e5bf55ac841e431','2o8YXYiLwpRf7FheLDmrLEO3oQcz6Y1TCzVXItQt','','','Transaction request start','2017-01-04 03:19:14','2017-01-04 03:19:14'),

(6,'112.215.201.182','REQUEST',34,220000,'','','',NULL,'','','70cfa6ded14ad34cb6b139b6cf0ea8b9f1e22cc0','9DiJzILszaCGT2CBycArUGx0eBdFADUsLSOk1j43','','','Transaction request start','2017-01-04 06:00:53','2017-01-04 06:00:53'),

(7,'112.215.201.182','REQUEST',89,220000,'','','',NULL,'','','f3579485b9d23e9b19fa2aca1d0c16c28b04c669','9DiJzILszaCGT2CBycArUGx0eBdFADUsLSOk1j43','','','Transaction request start','2017-01-04 06:03:33','2017-01-04 06:03:33'),

(8,'112.215.201.182','REQUEST',90,220000,'','','',NULL,'','','00c6df02d9dad2b6b630bfc899fc778b085dc163','9DiJzILszaCGT2CBycArUGx0eBdFADUsLSOk1j43','','','Transaction request start','2017-01-04 06:05:18','2017-01-04 06:05:18'),

(9,'112.215.201.182','CHECKSTATUS',90,220000,'0000','0000','SUCCESS',NULL,'15','','2d27fd167381b663485252222a4fb2598ddbe101','9DiJzILszaCGT2CBycArUGx0eBdFADUsLSOk1j43','PT. BANK BUKOPIN','411111******1111','Checking payment status from doku.','2017-01-04 06:05:36','2017-01-04 06:05:36'),

(10,'112.215.201.182','CHECKSTATUS',90,220000,'0000','0000','SUCCESS',NULL,'15','','2d27fd167381b663485252222a4fb2598ddbe101','9DiJzILszaCGT2CBycArUGx0eBdFADUsLSOk1j43','PT. BANK BUKOPIN','411111******1111','Checking payment status from doku.','2017-01-04 06:08:55','2017-01-04 06:08:55'),

(11,'112.215.201.182','REDIRECT',90,220000,'','0000','',NULL,'15','','5f221f6ba57a488d17416fb5509bb75782ff3298','9DiJzILszaCGT2CBycArUGx0eBdFADUsLSOk1j43','','','Redirect process with no notify message come from DOKU. Transaction is Success. Please check on Back Office.','2017-01-04 06:08:55','2017-01-04 06:08:55'),

(12,'112.215.201.182','REQUEST',91,220000,'','','',NULL,'','','db0c777d0d7d1b2caece07996043bc0e12e9dfc5','9DiJzILszaCGT2CBycArUGx0eBdFADUsLSOk1j43','','','Transaction request start','2017-01-04 06:22:25','2017-01-04 06:22:25'),

(13,'112.215.201.182','CHECKSTATUS',91,220000,'0000','0000','SUCCESS',NULL,'15','','f47f710f8998a81e6c48b0b6abf4662d340566b6','9DiJzILszaCGT2CBycArUGx0eBdFADUsLSOk1j43','PT. BANK BUKOPIN','411111******1111','Checking payment status from doku.','2017-01-04 06:23:12','2017-01-04 06:23:12'),

(14,'112.215.201.182','REDIRECT',91,220000,'','0000','',NULL,'15','','70b89ebd1b0a50bd71b7f6fe0292511471d31314','9DiJzILszaCGT2CBycArUGx0eBdFADUsLSOk1j43','','','Redirect process with no notify message come from DOKU. Transaction is Success. Please check on Back Office.','2017-01-04 06:23:12','2017-01-04 06:23:12'),

(15,'202.51.126.2','REQUEST',92,583000,'','','',NULL,'','','715b70c33e51f3ab09cbc83c1dadf505c1d9dc12','8jbepshE49orbxP49BvD2MRIBigxs3i4UoShbrb9','','','Transaction request start','2017-01-04 06:59:47','2017-01-04 06:59:47'),

(16,'202.51.126.2','REQUEST',93,583000,'','','',NULL,'','','6cb2a8e30bb68c50f10ca6f0e21dbe882b7e5181','8jbepshE49orbxP49BvD2MRIBigxs3i4UoShbrb9','','','Transaction request start','2017-01-04 07:00:14','2017-01-04 07:00:14'),

(17,'202.51.126.2','REQUEST',94,583000,'','','',NULL,'','','c56293e88cf084a3203b7cd1430410cb946d9df6','8jbepshE49orbxP49BvD2MRIBigxs3i4UoShbrb9','','','Transaction request start','2017-01-04 07:00:36','2017-01-04 07:00:36'),

(18,'202.51.126.2','REQUEST',95,583000,'','','',NULL,'','','8836a0f8230ba469ea3c6ffb50330f6fb980ee78','8jbepshE49orbxP49BvD2MRIBigxs3i4UoShbrb9','','','Transaction request start','2017-01-04 07:01:24','2017-01-04 07:01:24'),

(19,'202.51.126.2','REQUEST',96,583000,'','','',NULL,'','','4e7579ad8458b4428387121724336522f1be08b5','8jbepshE49orbxP49BvD2MRIBigxs3i4UoShbrb9','','','Transaction request start','2017-01-04 07:02:13','2017-01-04 07:02:13'),

(20,'112.215.201.182','REQUEST',97,220000,'','','',NULL,'','','aa0902db5180c640098b309e206973cce99f26d8','zpEmgwAosEygdlFPjdhuUnJFEjfwdXHpW4s4aRSY','','','Transaction request start','2017-01-04 07:06:29','2017-01-04 07:06:29'),

(21,'112.215.201.182','CHECKSTATUS',97,220000,'0000','0000','SUCCESS',NULL,'15','','53a5785cd2e8f731ff59d81cc60320c976fe521f','zpEmgwAosEygdlFPjdhuUnJFEjfwdXHpW4s4aRSY','PT. BANK BUKOPIN','411111******1111','Checking payment status from doku.','2017-01-04 07:07:09','2017-01-04 07:07:09'),

(22,'112.215.201.182','REDIRECT',97,220000,'','0000','',NULL,'15','','937c34b8f6966bf9d5cec60c573f141316b8ca6e','zpEmgwAosEygdlFPjdhuUnJFEjfwdXHpW4s4aRSY','','','Redirect process with no notify message come from DOKU. Transaction is Success. Please check on Back Office.','2017-01-04 07:07:09','2017-01-04 07:07:09'),

(23,'202.51.126.2','REQUEST',98,1100000,'','','',NULL,'','','5e67917f488e068ecab3560d0c8ce80d390029f2','r1TWi4PNaoHn4yUh9ki2L7c3iYQEAJMTTRnYNYIx','','','Transaction request start','2017-01-04 07:17:26','2017-01-04 07:17:26'),

(24,'202.51.126.2','REQUEST',99,583000,'','','',NULL,'','','eab00dab027f6c1c0138181b365f680cd894190f','8Uvlc5YOB89FvaX6UdToSAHt7KSSTz4xtadZ9137','','','Transaction request start','2017-01-04 07:19:51','2017-01-04 07:19:51'),

(25,'202.51.126.2','REQUEST',100,583000,'','','',NULL,'','','e46a21cf235616c793cb110202ecd0a79e6ea2e3','8Uvlc5YOB89FvaX6UdToSAHt7KSSTz4xtadZ9137','','','Transaction request start','2017-01-04 07:20:22','2017-01-04 07:20:22'),

(26,'202.51.126.2','CHECKSTATUS',100,583000,'0000','0000','SUCCESS',NULL,'15','','81f514246fae3aac43beba7b01bee03f040a2600','8Uvlc5YOB89FvaX6UdToSAHt7KSSTz4xtadZ9137','PT. BANK BUKOPIN','411111******1111','Checking payment status from doku.','2017-01-04 07:23:51','2017-01-04 07:23:51'),

(27,'202.51.126.2','REDIRECT',100,583000,'','0000','',NULL,'15','','497add67828f37c037eb8f8ba822bc7c38288a04','8Uvlc5YOB89FvaX6UdToSAHt7KSSTz4xtadZ9137','','','Redirect process with no notify message come from DOKU. Transaction is Success. Please check on Back Office.','2017-01-04 07:23:51','2017-01-04 07:23:51'),

(28,'112.215.201.182','REQUEST',101,220000,'','','',NULL,'','','4cf4cbea7cde72f039262103223684ec5bc2a2c5','9DiJzILszaCGT2CBycArUGx0eBdFADUsLSOk1j43','','','Transaction request start','2017-01-04 07:26:38','2017-01-04 07:26:38'),

(29,'202.51.126.2','REQUEST',102,583000,'','','',NULL,'','','5ddbc6624c56d5e2a5087b42c79ca66b39995a51','r1TWi4PNaoHn4yUh9ki2L7c3iYQEAJMTTRnYNYIx','','','Transaction request start','2017-01-04 07:27:13','2017-01-04 07:27:13'),

(30,'202.51.126.2','CHECKSTATUS',102,583000,'0000','0000','SUCCESS',NULL,'15','','8ed2c5f7fea595206ac77fab20e2f384688e8250','r1TWi4PNaoHn4yUh9ki2L7c3iYQEAJMTTRnYNYIx','PT. BANK BUKOPIN','411111******1111','Checking payment status from doku.','2017-01-04 07:28:56','2017-01-04 07:28:56'),

(31,'202.51.126.2','REDIRECT',102,583000,'','0000','',NULL,'15','','a4bc277eb7c764b8098c909d0bba2028588a6852','r1TWi4PNaoHn4yUh9ki2L7c3iYQEAJMTTRnYNYIx','','','Redirect process with no notify message come from DOKU. Transaction is Success. Please check on Back Office.','2017-01-04 07:28:56','2017-01-04 07:28:56'),

(32,'202.51.126.2','REQUEST',103,2200000,'','','',NULL,'','','031ebc0d09488a08b5180cd298ddcb3ed3955ddb','2X4pT0xrCs2T8PkuzbQT0teRoykHi3iPWSXUjNYX','','','Transaction request start','2017-01-04 07:29:14','2017-01-04 07:29:14'),

(33,'202.51.126.2','CHECKSTATUS',103,2200000,'0000','0000','SUCCESS',NULL,'15','','a30a01dbe3dcf091d6291868e6786d7f0c3ab70f','2X4pT0xrCs2T8PkuzbQT0teRoykHi3iPWSXUjNYX','PT. BANK BUKOPIN','411111******1111','Checking payment status from doku.','2017-01-04 07:30:51','2017-01-04 07:30:51'),

(34,'202.51.126.2','REDIRECT',103,2200000,'','0000','',NULL,'15','','418d091b66f435c5b776bbf2a658183100a25273','2X4pT0xrCs2T8PkuzbQT0teRoykHi3iPWSXUjNYX','','','Redirect process with no notify message come from DOKU. Transaction is Success. Please check on Back Office.','2017-01-04 07:30:51','2017-01-04 07:30:51'),

(35,'202.62.18.48','REQUEST',104,550000,'','','',NULL,'','','e74ed33859d938e55acea273e078e7ab922046dc','ozQIBgOm3Q2O8ccGOfjGXIpkgV8k7C1Z6Y6SygB2','','','Transaction request start','2017-01-04 07:34:23','2017-01-04 07:34:23'),

(36,'114.110.21.14','REQUEST',105,220000,'','','',NULL,'','','ece76d2041b4d56dab176e8227b1e721c494fc0e','Mje1AYj6aYh2bsCGaMPvDQ9SQflNqbBt8ePrHsIM','','','Transaction request start','2017-01-04 10:39:35','2017-01-04 10:39:35'),

(37,'114.110.21.14','REQUEST',106,220000,'','','',NULL,'','','9ada76ffabac0f4d70bc21cff0930aea93873709','Mje1AYj6aYh2bsCGaMPvDQ9SQflNqbBt8ePrHsIM','','','Transaction request start','2017-01-04 10:41:44','2017-01-04 10:41:44'),

(38,'112.215.201.182','CHECKSTATUS',92,200000,'0000','0000','SUCCESS',NULL,'15','','10d803025eb7f87ea2b1a3031003bbf1b70f0798','6MDCLgMpRjtC4rCvKmgSJSpSrESTp6mXvLYUTBqr','PT. BANK BUKOPIN','411111******1111','Checking payment status from doku.','2017-01-05 02:42:04','2017-01-05 02:42:04'),

(39,'112.215.201.182','REDIRECT',92,200000,'','0000','',NULL,'15','','3653d0afeb970f62fef0522045423c17ee6385c2','6MDCLgMpRjtC4rCvKmgSJSpSrESTp6mXvLYUTBqr','','','Redirect process with no notify message come from DOKU. Transaction is Success. Please check on Back Office.','2017-01-05 02:42:04','2017-01-05 02:42:04'),

(40,'112.215.201.182','REQUEST',107,200000,'','','',NULL,'','','817b538e4d836b7f2ddbe9400e082193273a5670','heK2Zi3tPNEMayYX6t0egmAs86NNymoj3ErHBCn7','','','Transaction request start','2017-01-05 02:46:29','2017-01-05 02:46:29'),

(41,'112.215.201.182','REQUEST',108,200000,'','','',NULL,'','','666100926498e72e5d1cd1fce75fe207d8d763c3','heK2Zi3tPNEMayYX6t0egmAs86NNymoj3ErHBCn7','','','Transaction request start','2017-01-05 02:47:38','2017-01-05 02:47:38'),

(42,'112.215.201.182','CHECKSTATUS',108,200000,'0000','0000','SUCCESS',NULL,'15','','192b94fb3b9a7addb4682979579e1543bfe5cfab','heK2Zi3tPNEMayYX6t0egmAs86NNymoj3ErHBCn7','PT. BANK BUKOPIN','411111******1111','Checking payment status from doku.','2017-01-05 02:49:09','2017-01-05 02:49:09'),

(43,'112.215.201.182','REDIRECT',108,200000,'','0000','',NULL,'15','','a6fe6e9df296de35b8e3ab812396ed0cd4d2dbeb','heK2Zi3tPNEMayYX6t0egmAs86NNymoj3ErHBCn7','','','Redirect process with no notify message come from DOKU. Transaction is Success. Please check on Back Office.','2017-01-05 02:49:09','2017-01-05 02:49:09'),

(44,'112.215.201.182','REQUEST',109,265000,'','','',NULL,'','','71b53646a4b48d710673e1f990d2699838964a45','heK2Zi3tPNEMayYX6t0egmAs86NNymoj3ErHBCn7','','','Transaction request start','2017-01-05 02:53:07','2017-01-05 02:53:07'),

(45,'112.215.201.182','REQUEST',110,265000,'','','',NULL,'','','fae3a1826b86d9e0f469777173a3a100fd59dafc','heK2Zi3tPNEMayYX6t0egmAs86NNymoj3ErHBCn7','','','Transaction request start','2017-01-05 03:49:16','2017-01-05 03:49:16'),

(46,'112.215.201.182','REDIRECT',110,265000,'','5510','',NULL,'01','','4003f4d2faa7060fde6032130ea43254040d7a05','heK2Zi3tPNEMayYX6t0egmAs86NNymoj3ErHBCn7','','','Redirect process come from DOKU. Transaction is cancelled by User.','2017-01-05 03:49:28','2017-01-05 03:49:28'),

(47,'112.215.201.182','REQUEST',111,200000,'','','',NULL,'','','e6b6b2ce5437b22e68d98a17f8d76f8cbcead2e8','heK2Zi3tPNEMayYX6t0egmAs86NNymoj3ErHBCn7','','','Transaction request start','2017-01-05 03:56:40','2017-01-05 03:56:40'),

(48,'112.215.201.182','REQUEST',112,265000,'','','',NULL,'','','faf0931815a28c3c2737f54b1a98414340f6804c','heK2Zi3tPNEMayYX6t0egmAs86NNymoj3ErHBCn7','','','Transaction request start','2017-01-05 04:14:06','2017-01-05 04:14:06'),

(49,'112.215.201.182','REQUEST',113,265000,'','','',NULL,'','','1248ba5650d83b3de3c1377906bec21cb33bceea','heK2Zi3tPNEMayYX6t0egmAs86NNymoj3ErHBCn7','','','Transaction request start','2017-01-05 04:16:50','2017-01-05 04:16:50'),

(50,'112.215.201.182','REQUEST',114,200000,'','','',NULL,'','','cfa015df8ed981e7d97521068b2eb6e18da84172','uYx9F9hFy4nV5yubo94jHBDAsnDQsgxVLrVfeVBk','','','Transaction request start','2017-01-05 06:31:20','2017-01-05 06:31:20'),

(51,'112.215.201.182','REQUEST',115,200000,'','','',NULL,'','','ace5bf2482c6daff82ba68b9ce7c325485fb6e4b','uYx9F9hFy4nV5yubo94jHBDAsnDQsgxVLrVfeVBk','','','Transaction request start','2017-01-05 06:33:10','2017-01-05 06:33:10'),

(52,'112.215.201.182','REQUEST',116,200000,'','','',NULL,'','','10d5b7395a3e1e7015f48ae3306cf7a148e6607f','uYx9F9hFy4nV5yubo94jHBDAsnDQsgxVLrVfeVBk','','','Transaction request start','2017-01-05 07:45:19','2017-01-05 07:45:19'),

(53,'112.215.201.182','REQUEST',117,200000,'','','',NULL,'','','02a9c2f3a4c2d7c1730703f969cafb42f525a36b','uYx9F9hFy4nV5yubo94jHBDAsnDQsgxVLrVfeVBk','','','Transaction request start','2017-01-05 07:55:41','2017-01-05 07:55:41'),

(54,'112.215.201.182','REQUEST',118,200000,'','','',NULL,'','','34e75e6c3c042295920f1cc62b79038b84937893','uYx9F9hFy4nV5yubo94jHBDAsnDQsgxVLrVfeVBk','','','Transaction request start','2017-01-05 08:02:30','2017-01-05 08:02:30'),

(55,'112.215.201.182','REQUEST',119,200000,'','','',NULL,'','','ad799c13f92df67d3cae882411fc4d237115e5bb','uYx9F9hFy4nV5yubo94jHBDAsnDQsgxVLrVfeVBk','','','Transaction request start','2017-01-05 08:04:17','2017-01-05 08:04:17'),

(56,'112.215.170.72','REQUEST',120,200000,'','','',NULL,'','','6951729a0b9a778fc31167fba2d94634ab87fabc','mGwOgUH1Lno38x9FzXkwg9TE0yNIGAbTSJ6f8bak','','','Transaction request start','2017-01-09 03:04:31','2017-01-09 03:04:31'),

(57,'','NOTIFY',120,200000,'0000','','','2017-01-09 10:05:04','15','','44be29465c7d552d980ade979eb4be32e06ca416','mGwOgUH1Lno38x9FzXkwg9TE0yNIGAbTSJ6f8bak','PT. BANK BUKOPIN','411111******1111','Notify process message come from DOKU. Success : completed','2017-01-09 03:05:04','2017-01-09 03:05:04'),

(58,'112.215.170.72','CHECKSTATUS',120,200000,'0000','0000','SUCCESS',NULL,'15','','44be29465c7d552d980ade979eb4be32e06ca416','mGwOgUH1Lno38x9FzXkwg9TE0yNIGAbTSJ6f8bak','PT. BANK BUKOPIN','411111******1111','Checking payment status from doku.','2017-01-09 03:05:11','2017-01-09 03:05:11'),

(59,'112.215.170.72','REDIRECT',120,200000,'','0000','',NULL,'15','','10b230defe3d330845dda9060585ce5dbe0bb1ee','mGwOgUH1Lno38x9FzXkwg9TE0yNIGAbTSJ6f8bak','','','Redirect process with no notify message come from DOKU. Transaction is Success. Please check on Back Office.','2017-01-09 03:05:11','2017-01-09 03:05:11'),

(60,'112.215.170.72','REQUEST',121,475000,'','','',NULL,'','','9f712dc5298f427d79082db7a3b846c20b16033c','mGwOgUH1Lno38x9FzXkwg9TE0yNIGAbTSJ6f8bak','','','Transaction request start','2017-01-09 03:25:06','2017-01-09 03:25:06'),

(61,'112.215.170.72','REQUEST',122,675000,'','','',NULL,'','','28d3404bbb54f7850c7cbace08ef0df177e647f0','mGwOgUH1Lno38x9FzXkwg9TE0yNIGAbTSJ6f8bak','','','Transaction request start','2017-01-09 03:25:27','2017-01-09 03:25:27'),

(62,'112.215.200.152','REQUEST',123,675000,'','','',NULL,'','','74d54b764d29a1864ebf02ed95f1337f8185ebb0','iib7Vxo346MGHX2M8jEn0JbiqhDPbYxi5CtsAmNk','','','Transaction request start','2017-01-09 06:40:44','2017-01-09 06:40:44'),

(63,'112.215.200.152','REQUEST',124,200000,'','','',NULL,'','','03c082c7235046d9a77ab8ade5e0e21a2f44c1a4','iib7Vxo346MGHX2M8jEn0JbiqhDPbYxi5CtsAmNk','','','Transaction request start','2017-01-09 07:01:11','2017-01-09 07:01:11'),

(64,'112.215.200.152','REQUEST',125,200000,'','','',NULL,'','','7dc0e2baee08b0c7031d1c9f27bcf9172b77e9d8','iib7Vxo346MGHX2M8jEn0JbiqhDPbYxi5CtsAmNk','','','Transaction request start','2017-01-09 07:03:52','2017-01-09 07:03:52'),

(65,'','NOTIFY',125,200000,'0000','','','2017-01-09 14:04:12','15','','b3aa5d5928a916572de579e864de15309bf149d2','iib7Vxo346MGHX2M8jEn0JbiqhDPbYxi5CtsAmNk','PT. BANK BUKOPIN','411111******1111','Notify process message come from DOKU. Success : completed','2017-01-09 07:04:12','2017-01-09 07:04:12'),

(66,'112.215.200.152','CHECKSTATUS',125,200000,'0000','0000','SUCCESS',NULL,'15','','b3aa5d5928a916572de579e864de15309bf149d2','iib7Vxo346MGHX2M8jEn0JbiqhDPbYxi5CtsAmNk','PT. BANK BUKOPIN','411111******1111','Checking payment status from doku.','2017-01-09 07:04:15','2017-01-09 07:04:15'),

(67,'112.215.200.152','REDIRECT',125,200000,'','0000','',NULL,'15','','0c2b301f921a236681bb86c0fd936362fb1c0a6f','iib7Vxo346MGHX2M8jEn0JbiqhDPbYxi5CtsAmNk','','','Redirect process with no notify message come from DOKU. Transaction is Success. Please check on Back Office.','2017-01-09 07:04:15','2017-01-09 07:04:15'),

(68,'112.215.200.152','CHECKSTATUS',125,200000,'0000','0000','SUCCESS',NULL,'15','','b3aa5d5928a916572de579e864de15309bf149d2','iib7Vxo346MGHX2M8jEn0JbiqhDPbYxi5CtsAmNk','PT. BANK BUKOPIN','411111******1111','Checking payment status from doku.','2017-01-09 07:06:30','2017-01-09 07:06:30'),

(69,'112.215.200.152','REDIRECT',125,200000,'','0000','',NULL,'15','','0c2b301f921a236681bb86c0fd936362fb1c0a6f','iib7Vxo346MGHX2M8jEn0JbiqhDPbYxi5CtsAmNk','','','Redirect process with no notify message come from DOKU. Transaction is Success. Please check on Back Office.','2017-01-09 07:06:30','2017-01-09 07:06:30'),

(70,'210.210.158.135','REQUEST',126,200000,'','','',NULL,'','','adea303420c17c5384ad3df4ffa95ceb355450fb','CvlbzTiXJRuAWc41g6QTIQS6fy8tR2gRHN8ZnMq3','','','Transaction request start','2017-01-09 07:16:09','2017-01-09 07:16:09'),

(71,'210.210.158.135','REQUEST',127,200000,'','','',NULL,'','','8e2b768e1e3fac9bf65fe21836874d07abc66063','CvlbzTiXJRuAWc41g6QTIQS6fy8tR2gRHN8ZnMq3','','','Transaction request start','2017-01-09 07:22:26','2017-01-09 07:22:26'),

(72,'210.210.158.135','REQUEST',128,200000,'','','',NULL,'','','9034954cca98486d97ce1fa38da4398096ab16fc','CvlbzTiXJRuAWc41g6QTIQS6fy8tR2gRHN8ZnMq3','','','Transaction request start','2017-01-09 07:25:44','2017-01-09 07:25:44'),

(73,'210.210.158.135','REQUEST',129,200000,'','','',NULL,'','','09b413a60a602d7d37c9986e4847ad71db145c8d','CvlbzTiXJRuAWc41g6QTIQS6fy8tR2gRHN8ZnMq3','','','Transaction request start','2017-01-09 07:29:14','2017-01-09 07:29:14'),

(74,'202.51.126.2','REQUEST',130,275000,'','','',NULL,'','','f0ae0fd73211a736cc037d254d00c12e639e4e89','WWUZLBjqUrcKU1p2jbG3whJDtN3wDHQ2zKGkqPz3','','','Transaction request start','2017-01-09 10:06:36','2017-01-09 10:06:36'),

(75,'114.110.21.14','REQUEST',131,200000,'','','',NULL,'','','fee4996e6383763039aad400b67a64f078554a22','raPicTphnZ7vHB6x4FgyVqULzZBT0cDZBRyEonQM','','','Transaction request start','2017-01-10 01:57:12','2017-01-10 01:57:12'),

(76,'114.110.21.14','REQUEST',132,275000,'','','',NULL,'','','f808013f891bd0e809a7294dca805b7dbebd0aaf','6P6f1eDy2xL3wQJNPuqa79VjT8RftNGIVU2R26oc','','','Transaction request start','2017-01-10 06:44:28','2017-01-10 06:44:28'),

(77,'202.51.126.2','REQUEST',133,550000,'','','',NULL,'','','4cebc8ead922ee9ab1117017438507fe24e2f222','oiPG7xsLHAjPlkN6NRILF9QomCAGcu0Ra9EqFzpv','','','Transaction request start','2017-01-10 09:11:15','2017-01-10 09:11:15'),

(78,'39.248.38.109','REQUEST',134,400000,'','','',NULL,'','','5fbcccc6d7f939df34324da229578785c5484087','jh1ZTbROAguffwhD6VLgI80jMxparNKLLiFM1U0y','','','Transaction request start','2017-01-10 09:14:15','2017-01-10 09:14:15'),

(79,'202.51.126.2','REQUEST',135,550000,'','','',NULL,'','','c719a22acc9b3fea36ae255a79e64b2a6e6779d9','IlGZsIlsqOrJcbzFiJJzX4bSb8oNhYEFvPu2rltm','','','Transaction request start','2017-01-10 09:16:57','2017-01-10 09:16:57'),

(80,'202.51.104.50','REQUEST',136,200000,'','','',NULL,'','','f24794d9ba5ef9299cf67bde1d5e73a9240aca31','mJGCat2Z318eZUeqZTcetStKL03u57PuTRO2LtAJ','','','Transaction request start','2017-01-10 09:27:36','2017-01-10 09:27:36'),

(81,'','NOTIFY',136,200000,'0000','','','2017-01-10 16:28:00','15','','fa5de3f0245165a9d7cd8cfc5b2012dd94c08269','mJGCat2Z318eZUeqZTcetStKL03u57PuTRO2LtAJ','PT. BANK BUKOPIN','411111******1111','Notify process message come from DOKU. Success : completed','2017-01-10 09:28:00','2017-01-10 09:28:00'),

(82,'202.51.104.50','CHECKSTATUS',136,200000,'0000','0000','SUCCESS',NULL,'15','','fa5de3f0245165a9d7cd8cfc5b2012dd94c08269','mJGCat2Z318eZUeqZTcetStKL03u57PuTRO2LtAJ','PT. BANK BUKOPIN','411111******1111','Checking payment status from doku.','2017-01-10 09:28:04','2017-01-10 09:28:04'),

(83,'202.51.104.50','REDIRECT',136,200000,'','0000','',NULL,'15','','e31f38d8a16fb4d5def2fe5654408b6f30b5efb0','mJGCat2Z318eZUeqZTcetStKL03u57PuTRO2LtAJ','','','Redirect process with no notify message come from DOKU. Transaction is Success. Please check on Back Office.','2017-01-10 09:28:04','2017-01-10 09:28:04'),

(84,'114.124.27.110','REQUEST',137,550000,'','','',NULL,'','','4b474271ae367881f11e9e9aa71e4f18b8525ebd','daIVFnRqTOD2sPwhe58QwRPYmlX61PmACPFgOUTm','','','Transaction request start','2017-01-10 11:23:43','2017-01-10 11:23:43'),

(85,'139.0.114.130','REQUEST',138,550000,'','','',NULL,'','','6785c3fed801ab838aaa5c967c895f505956e417','daIVFnRqTOD2sPwhe58QwRPYmlX61PmACPFgOUTm','','','Transaction request start','2017-01-10 13:05:07','2017-01-10 13:05:07'),

(86,'139.0.114.130','REQUEST',139,550000,'','','',NULL,'','','3bccb7ca89a836d60283a9a73705622858234561','IJ3O5h3tkSZuTrIJZA1KijKAoEcJsAUAlbbvvQRb','','','Transaction request start','2017-01-10 13:06:58','2017-01-10 13:06:58'),

(87,'139.0.114.130','REQUEST',140,275000,'','','',NULL,'','','60ac62e4774a1dce0e528bb9d092b09404b04489','VfUaWWtPvmpMrICaQ606lRlMhHRH6namxBCMv7b6','','','Transaction request start','2017-01-11 01:36:26','2017-01-11 01:36:26'),

(88,'139.0.114.130','REQUEST',141,275000,'','','',NULL,'','','032a92df8b83af870f9c6022733d946e85e1ba38','VfUaWWtPvmpMrICaQ606lRlMhHRH6namxBCMv7b6','','','Transaction request start','2017-01-11 01:38:16','2017-01-11 01:38:16'),

(89,'112.215.171.92','REQUEST',142,275000,'','','',NULL,'','','e5f2163161df28c77b4ccdf9a6990f97fbb2f1ef','jWJhcHYGwTSf37Oe23VXicLOcKtmzDAwaO8o8Vi2','','','Transaction request start','2017-01-11 03:18:04','2017-01-11 03:18:04'),

(90,'','NOTIFY',142,275000,'0000','','','2017-01-11 10:18:21','15','','1704604780eea9cfcfe622f4375b5b0cf1791424','jWJhcHYGwTSf37Oe23VXicLOcKtmzDAwaO8o8Vi2','PT. BANK BUKOPIN','411111******1111','Notify process message come from DOKU. Success : completed','2017-01-11 03:18:21','2017-01-11 03:18:21'),

(91,'112.215.171.92','CHECKSTATUS',142,275000,'0000','0000','SUCCESS',NULL,'15','','1704604780eea9cfcfe622f4375b5b0cf1791424','jWJhcHYGwTSf37Oe23VXicLOcKtmzDAwaO8o8Vi2','PT. BANK BUKOPIN','411111******1111','Checking payment status from doku.','2017-01-11 03:18:24','2017-01-11 03:18:24'),

(92,'112.215.171.92','REDIRECT',142,275000,'','0000','',NULL,'15','','3ccd9f6cb57ba0a78a95d481f164627efe37b39e','jWJhcHYGwTSf37Oe23VXicLOcKtmzDAwaO8o8Vi2','','','Redirect process with no notify message come from DOKU. Transaction is Success. Please check on Back Office.','2017-01-11 03:18:24','2017-01-11 03:18:24'),

(93,'112.215.171.92','REQUEST',143,275000,'','','',NULL,'','','90fdae2e93107fbb2a737c5144e8f63c5e0814de','MgzRjFaqnnZMg5BTLZiUWeKZaAXOcg9Rp9iqP0X7','','','Transaction request start','2017-01-11 05:24:03','2017-01-11 05:24:03'),

(94,'39.252.220.250','REQUEST',144,550000,'','','',NULL,'','','57d7454e557efb432763d8e99440a2d9428a9a99','9URGXrrwrXEqkvqu1fYfYcAbaWeLEeHCAHF69fGI','','','Transaction request start','2017-01-11 05:25:11','2017-01-11 05:25:11'),

(95,'39.252.220.250','REQUEST',145,550000,'','','',NULL,'','','3d1961e3d54e3285d79a394ae68a542f10f422da','9URGXrrwrXEqkvqu1fYfYcAbaWeLEeHCAHF69fGI','','','Transaction request start','2017-01-11 05:29:58','2017-01-11 05:29:58'),

(96,'112.215.171.92','REDIRECT',143,275000,'','5511','',NULL,'05','8890012830000453','63fbac88f11bd4da37986a187da36ce90e777159','MgzRjFaqnnZMg5BTLZiUWeKZaAXOcg9Rp9iqP0X7','','','Redirect process come from DOKU. Transaction is pending for payment','2017-01-11 06:10:41','2017-01-11 06:10:41'),

(97,'112.215.171.92','REDIRECT',143,275000,'','5511','',NULL,'05','8890012830000453','63fbac88f11bd4da37986a187da36ce90e777159','MgzRjFaqnnZMg5BTLZiUWeKZaAXOcg9Rp9iqP0X7','','','Redirect process come from DOKU. Transaction is pending for payment','2017-01-11 06:12:49','2017-01-11 06:12:49'),

(98,'202.51.126.2','REQUEST',146,580000,'','','',NULL,'','','bb666b3b424b8bf84ad57a3b17e8adcda417e126','SfJV4qyGPe6rtHvLLaEX1EygmKZfIzObYHSSPIHb','','','Transaction request start','2017-01-12 03:56:46','2017-01-12 03:56:46'),

(99,'202.51.126.2','REQUEST',147,580000,'','','',NULL,'','','50e19feb40abdd18650cc965abc1fd9785489a35','sLi13N5UvqOpslfHAWQNQIjCVHICrC7MTm7qbyIT','','','Transaction request start','2017-01-12 06:41:27','2017-01-12 06:41:27');

/*Table structure for table `doku_response_codes` */

DROP TABLE IF EXISTS `doku_response_codes`;

CREATE TABLE `doku_response_codes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `origin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `visa_description` text COLLATE utf8_unicode_ci,
  `master_description` text COLLATE utf8_unicode_ci,
  `general_description` text COLLATE utf8_unicode_ci,
  `actions` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=117 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `doku_response_codes` */

insert  into `doku_response_codes`(`id`,`code`,`origin`,`visa_description`,`master_description`,`general_description`,`actions`) values 

(2,'0001','VISA/MASTER','Refer to card issuer','Refer to card issuer','','Tell Customer to contact the Bank Issuer of the card used.'),

(3,'0002','VISA/MASTER','','Refer to card issuer, special condition','','Tell Customer to contact the Bank Issuer of the card used.'),

(4,'0003','VISA/MASTER','Invalid Merchant','Invalid merchant or service provider','','Contact DOKU or BNI'),

(5,'0004','VISA/MASTER','Capture card','Pickup card','','Should consider blocking the card temporarily or Block login ID'),

(6,'0005','VISA/MASTER','Do Not Honor','Do Not Honor','','Tell Customer to contact the Bank Issuer of the card used.'),

(7,'0006','VISA/MASTER','','Error','','Tell Customer to contact the Bank Issuer of the card used.'),

(8,'0007','VISA/MASTER','','Pickup card, special condition (other than lost/stolen card)','','Should consider blocking the card'),

(9,'0008','VISA/MASTER','Honor with ID','','','Tell Customer to contact the Bank Issuer of the card used.'),

(10,'0010','VISA/MASTER','','Partial Approval - Private label','','Tell Customer to contact the Bank Issuer of the card used.'),

(11,'0011','VISA/MASTER','','VIP Approval','','Tell Customer to contact the Bank Issuer of the card used.'),

(12,'0012','VISA/MASTER','Invalid Transaction','Invalid Transaction','','Contact DOKU or BNI'),

(13,'0013','VISA/MASTER','Invalid Amount','Invalid amount (currency conversion field overflow. Visa Cash - Invalid load mount)','','Contact DOKU or BNI'),

(14,'0014','VISA/MASTER','Invalid Card Number','Invalid account number (no such number)','','Contact DOKU or BNI'),

(15,'0015','VISA/MASTER','Invalid issuer','No such issuer','','Contact DOKU or BNI'),

(16,'0019','VISA/MASTER','','Re-enter transaction','','Contact DOKU or BNI'),

(17,'0021','VISA/MASTER','','No Action taken (unable to back out prior transaction)','','Contact DOKU or BNI'),

(18,'0025','VISA/MASTER','','Unable to locate record in file, or account number is missing from inquiry','','Contact DOKU or BNI'),

(19,'0028','VISA/MASTER','','File is temporarily unavailable','','Contact DOKU or BNI'),

(20,'0030','VISA/MASTER','Format error','','','Contact DOKU or BNI'),

(21,'0041','VISA/MASTER','Lost Card','Pickup card {lost card)','','Should consider blocking the card temporarily or Block login ID'),

(22,'0043','VISA/MASTER','Stolen Card','Pickup card [stolen card)','','Should consider blocking the card temporarily or Block login ID'),

(23,'0051','VISA/MASTER','Insufficient Funds/Over Credit limit','Insufficient funds','','Tell Customer to contact the Bank Issuer of the card used.'),

(24,'0052','VISA/MASTER','','No checking account','','Tell Customer to contact the Bank Issuer of the card used.'),

(25,'0053','VISA/MASTER','','non savings account','','Tell Customer to contact the Bank Issuer of the card used.'),

(26,'0054','VISA/MASTER','Expired Card','Expired card','','Tell Customer to contact the Bank Issuer of the card used.'),

(27,'0055','VISA/MASTER','Invalid PIN','Incorrect PIN (Visa cash - invalid or missing SI signature)','','Tell Customer to contact the Bank Issuer of the card used.'),

(28,'0057','VISA/MASTER','Transaction not permitted to issuer/cardholder','Transaction not permitted to cardholder [Visa cash - incorrect routing, not a load request)','','Tell Customer to contact the Bank Issuer of the card used.'),

(29,'0058','VISA/MASTER','Transaction not permitted to acquirer/terminal','Transaction not allowed at terminal','','Tell Customer to contact the Bank Issuer of the card used.'),

(30,'0061','VISA/MASTER','Exceeds withdrawal amount limit','Activity amount limit exceeded','','Tell Customer to contact the Bank Issuer of the card used.'),

(31,'0062','VISA/MASTER','Restricted Card','Restricted card (for example in country exclusion table)','','Tell Customer to contact the Bank Issuer of the card used.'),

(32,'0063','VISA/MASTER','Security Violation','Security violation','','Contact DOKU or BNI'),

(33,'0065','VISA/MASTER','Exceeds withdrawal count limit','Activity count limit exceeded','','Tell Customer to contact the Bank Issuer of the card used.'),

(34,'0075','VISA/MASTER','Allowable number of PIN tries exceeded','Allowable number of PIN-entry tries exceeded','','Tell Customer to contact the Bank Issuer of the card used.'),

(35,'0076','VISA/MASTER','Invalid/nonexistent \"To Account\" specified','Unable to locate previous message (no match on Retrieval Reference number)','','Contact DOKU or BNI'),

(36,'0077','VISA/MASTER','Invalid/nonexistent \"From account\" specified','Previous message located for a repeat or reversal, but repeat or reversal data are inconsistent with original message','','Contact DOKU or BNI'),

(37,'0078','VISA/MASTER','Invalid/nonexistent account specified (general)','','','Contact DOKU or BNI'),

(38,'0080','VISA/MASTER','','invalid date (For use in private label card transactions and check acceptance transactions)','','Contact DOKU or BNI'),

(39,'0081','VISA/MASTER','','PIN Cryptographic error found (error found by VIC security module during PIN decryption)','','Contact DOKU or BNI'),

(40,'0082','VISA/MASTER','','Incorrect CW/1CW','','Tell Customer to contact the Bank Issuer of the card used.'),

(41,'0083','VISA/MASTER','','Unable to verify PIN','','Tell Customer to contact the Bank Issuer of the card used.'),

(42,'0084','VISA/MASTER','Invalid Authorization Life Cycle','','','Contact DOKU or BNI'),

(43,'0085','VISA/MASTER','Not Decline Valid for AVS only, balance inquiry, or SET Cardholder certificate requests [VISA Only)','No reason to decline a request for account number verification or address verification','','Contact DOKU or BNI'),

(44,'0091','VISA/MASTER','Authorization System or issuer system inoperative','Issuer unavailable or switch inoperative (STIP not applicable or available for this transaction)','','Contact DOKU or BNI'),

(45,'0092','VISA/MASTER','Unable to route transaction','Destination cannot be found for routing','','Contact DOKU or BNI'),

(46,'0093','VISA/MASTER','','Transaction cannot be completed; violation of law','','Contact DOKU or BNI'),

(47,'0094','VISA/MASTER','Duplicate transmission detected','','','Contact DOKU or BNI'),

(48,'0096','VISA/MASTER','System Error','System malfunction / System malfunction or certain field error conditions','','Contact DOKU or BNI'),

(49,'00NO','VISA/MASTER','','Force STIP','','Contact DOKU or BNI'),

(50,'00N3','VISA/MASTER','','Cash service not available','','Contact DOKU or BNI'),

(51,'00N4','VISA/MASTER','','Cash request exceeds issuer limit','','Contact DOKU or BNI'),

(52,'00N7','VISA/MASTER','','Decline for CW2 failure','','Contact DOKU or BNI'),

(53,'00P2','VISA/MASTER','','Invalid biller information','','Contact DOKU or BNI'),

(54,'00P5','VISA/MASTER','','PIN Change/Unblock request declined','','Contact DOKU or BNI'),

(55,'00P6','VISA/MASTER','','Unsafe PIN','','Contact DOKU or BNI'),

(56,'00TO','DOKU','Timeout /  Transaction’s response exceed time limit','Timeout / Transaction’s response exceed time limit','','Contact DOKU or BNI'),

(57,'00UE','DOKU','Unknown Exception / PosServer not responding','Unknown Exception / PosServer not responding','','Contact DOKU or BNI'),

(58,'0E01','DOKU WALLET','','','FAILED GET MERCHANT',''),

(59,'0E02','DOKU WALLET','','','MASTER MERCHANT INACTIVE',''),

(60,'0E03','DOKU WALLET','','','INVALID WORDS FROM MERCHANT',''),

(61,'0E04','DOKU WALLET','','','INVALID MERCHANT',''),

(62,'0E05','DOKU WALLET','','','FAILED TO PROCESS PAYMENT',''),

(63,'0E06','DOKU WALLET','','','PAYMENT METHOD NOT DEFINE',''),

(64,'0E07','DOKU WALLET','','','FAILED EXECUTE PRE AUTH PLUGINS',''),

(65,'0E08','DOKU WALLET','','','FAILED EXECUTE POST AUTH PLUGINS',''),

(66,'0E09','DOKU WALLET','','','INVALID PAY ID',''),

(67,'0E10','DOKU WALLET','','','ERROR PAY ID',''),

(68,'0E11','DOKU WALLET','','','FAILED EXECUTE PRE TRANS MIP PLUGINS',''),

(69,'0E12','DOKU WALLET','','','VERIFY RESPONSE STOP FROM MERCHANT',''),

(70,'0E13','DOKU WALLET','','','FAILED VERIFY TO MERCHANT',''),

(71,'0E14','DOKU WALLET','','','FAILED SEND PAYMENT CASH WALLET',''),

(72,'0E15','DOKU WALLET','','','NOTIFY RESPONSE STOP FROM MERCHANT',''),

(73,'0E16','DOKU WALLET','','','FAILED NOTIFY TO MERCHANT',''),

(74,'0E18','DOKU WALLET','','','FAILED EXECUTE POST TRANS MIP PLUGINS',''),

(75,'0E19','DOKU WALLET','','','NOT ENOUGH CASH BALANCE AND DON’T HAVE CREDIT CARD',''),

(76,'0E20','DOKU WALLET','','','SPENDER NO HAVE LINK TO CREDIT CARD',''),

(77,'0E21','DOKU WALLET','','','ERROR CHECK 3D SECURE CREDIT CARD',''),

(78,'0E22','DOKU WALLET','','','PIN/OTP IS NOT VALID',''),

(79,'0E23','DOKU WALLET','','','PLEASE INPUT CVV2',''),

(80,'0E24','DOKU WALLET','','','INVALID SESSION',''),

(81,'0E25','DOKU WALLET','','','FAILED SEND LINK AUTHENTICATION TO CARD HOLDER',''),

(82,'0E26','DOKU WALLET','','','INSUFFICIENT PARAMS',''),

(83,'0E27','DOKU WALLET','','','FAILED EXECUTE PRE TRANS CIP PLUGINS',''),

(84,'0E28','DOKU WALLET','','','FAILED EXECUTE POST TRANS CIP PLUGINS',''),

(85,'0E29','DOKU WALLET','','','FAILED SEND PAYMENT MIP CREDIT CARD',''),

(86,'0E30','DOKU WALLET','','','YOU DO NOT HAVE PIN',''),

(87,'0E31','DOKU WALLET','','','DUPLICATE INVOICE NO',''),

(88,'0E32','DOKU WALLET','','','URL NOT FOUND',''),

(89,'0E33','DOKU WALLET','','','CUSTOMER NOT FOUND',''),

(90,'0E34','DOKU WALLET','','','VOID PROCESS FAILED',''),

(91,'0E35','DOKU WALLET','','','Failed Send ONE TIME PIN to your email',''),

(92,'0E36','DOKU WALLET','','','Failed Send Link for create PIN to your email',''),

(93,'0E37','DOKU WALLET','','','THIS SPENDER CAN\'T TRANSACT IN THIS MERCHANT',''),

(94,'0E38','DOKU WALLET','','','You have reach your DOKU ID Transaction Limit',''),

(95,'0E39','DOKU WALLET','','','Process MIP Transaction Failed',''),

(96,'0E99','DOKU WALLET','','','ERROR SYSTEM',''),

(97,'5555','GENERAL',NULL,NULL,'Undefined error',NULL),

(98,'5501','GENERAL',NULL,NULL,'Payment channel not registered',NULL),

(99,'5502','GENERAL',NULL,NULL,'Merchant is disabled',NULL),

(100,'5503','GENERAL',NULL,NULL,'Maximum attempt 3 times',NULL),

(101,'5504','GENERAL',NULL,NULL,'Words not match',NULL),

(102,'5505','GENERAL',NULL,NULL,'Invalid parameter',NULL),

(103,'5506','GENERAL',NULL,NULL,'Notify failed',NULL),

(104,'5507','GENERAL',NULL,NULL,'Invalid parameter detected / Customer click cancel process',NULL),

(105,'5508','GENERAL',NULL,NULL,'Re-enter transaction',NULL),

(106,'5509','GENERAL',NULL,NULL,'Payment code already expired',NULL),

(107,'5510','GENERAL',NULL,NULL,'Cancel by Customer',NULL),

(108,'5511','GENERAL',NULL,NULL,'Not an error, payment code has not been paid by Customer',NULL),

(109,'5512','GENERAL',NULL,NULL,'Insufficient Parameter',NULL),

(110,'5514','GENERAL',NULL,NULL,'Reject by Fraud System',NULL),

(111,'5515','GENERAL',NULL,NULL,'Duplicate PNR',NULL),

(112,'5516','GENERAL',NULL,NULL,'Transaction Not Found',NULL),

(113,'5517','GENERAL',NULL,NULL,'Error in Authorization process',NULL),

(114,'5518','GENERAL',NULL,NULL,'Error parsing XML',NULL),

(115,'5519','GENERAL',NULL,NULL,'Customer stop at 3D Secure page',NULL),

(116,'2015','DOKU WALLET',NULL,NULL,'General Error',NULL);

/*Table structure for table `galasys_tickets` */

DROP TABLE IF EXISTS `galasys_tickets`;

CREATE TABLE `galasys_tickets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) unsigned NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `barcode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `e_ticket` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `galasys_tickets_order_id_foreign` (`order_id`),
  CONSTRAINT `galasys_tickets_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=127 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `galasys_tickets` */

insert  into `galasys_tickets`(`id`,`order_id`,`code`,`name`,`barcode`,`e_ticket`,`created_at`,`updated_at`) values 

(87,91,'o1dpa','Regular','1701040001468','uploads/e-tickets/regular-1701040001468.pdf','2017-01-04 06:24:03','2017-01-04 06:24:03'),

(88,97,'o1dpa','Regular','1701040001482','uploads/e-tickets/regular-1701040001482.pdf','2017-01-04 07:08:02','2017-01-04 07:08:02'),

(89,100,'o1dpa','Regular','1701040001505','uploads/e-tickets/regular-1701040001505.pdf','2017-01-04 07:24:02','2017-01-04 07:24:02'),

(90,100,'pb4r','Photo Booth - 4R','1701040001529','uploads/e-tickets/photo-booth-4r-1701040001529.pdf','2017-01-04 07:24:03','2017-01-04 07:24:03'),

(91,100,'o1dpa','Regular','1701040001543','uploads/e-tickets/regular-1701040001543.pdf','2017-01-04 07:24:04','2017-01-04 07:24:04'),

(92,100,'pb4r','Photo Booth - 4R','1701040001567','uploads/e-tickets/photo-booth-4r-1701040001567.pdf','2017-01-04 07:24:04','2017-01-04 07:24:04'),

(93,102,'o1dpa','Regular','1701040001581','uploads/e-tickets/regular-1701040001581.pdf','2017-01-04 07:29:02','2017-01-04 07:29:02'),

(94,102,'pb4r','Photo Booth - 4R','1701040001604','uploads/e-tickets/photo-booth-4r-1701040001604.pdf','2017-01-04 07:29:02','2017-01-04 07:29:02'),

(95,102,'o1dpa','Regular','1701040001628','uploads/e-tickets/regular-1701040001628.pdf','2017-01-04 07:29:02','2017-01-04 07:29:02'),

(96,102,'pb4r','Photo Booth - 4R','1701040001642','uploads/e-tickets/photo-booth-4r-1701040001642.pdf','2017-01-04 07:29:03','2017-01-04 07:29:03'),

(97,103,'o1dps','Exclusive','1701040001666','uploads/e-tickets/exclusive-1701040001666.pdf','2017-01-04 07:31:02','2017-01-04 07:31:02'),

(98,103,'o1dps','Exclusive','1701040001680','uploads/e-tickets/exclusive-1701040001680.pdf','2017-01-04 07:31:03','2017-01-04 07:31:03'),

(99,103,'o1dps','Exclusive','1701040001703','uploads/e-tickets/exclusive-1701040001703.pdf','2017-01-04 07:31:03','2017-01-04 07:31:03'),

(100,103,'o1dps','Exclusive','1701040001727','uploads/e-tickets/exclusive-1701040001727.pdf','2017-01-04 07:31:04','2017-01-04 07:31:04'),

(101,92,'o1dpa','Regular','1701050000024','uploads/e-tickets/regular-1701050000024.pdf','2017-01-05 02:43:04','2017-01-05 02:43:04'),

(102,92,'pb4r','Photo Booth - 4R','1701050000048','uploads/e-tickets/photo-booth-4r-1701050000048.pdf','2017-01-05 02:43:05','2017-01-05 02:43:05'),

(103,92,'o1dpa','Regular','1701050000062','uploads/e-tickets/regular-1701050000062.pdf','2017-01-05 02:43:05','2017-01-05 02:43:05'),

(104,92,'pb4r','Photo Booth - 4R','1701050000086','uploads/e-tickets/photo-booth-4r-1701050000086.pdf','2017-01-05 02:43:05','2017-01-05 02:43:05'),

(105,108,'o1dpa','Regular','1701050000109','uploads/e-tickets/regular-1701050000109.pdf','2017-01-05 02:50:02','2017-01-05 02:50:02'),

(106,119,'o1dpa','Regular','1701050000208','uploads/e-tickets/regular-1701050000208.pdf','2017-01-05 08:08:02','2017-01-05 08:08:02'),

(107,120,'o1dpa','Regular','1701090000022','uploads/e-tickets/regular-1701090000022.pdf','2017-01-09 03:06:07','2017-01-09 03:06:07'),

(108,123,'o1dpa','Regular','1701090000046','uploads/e-tickets/regular-1701090000046.pdf','2017-01-09 06:43:01','2017-01-09 06:43:01'),

(109,123,'o1dpa','Regular','1701090000060','uploads/e-tickets/regular-1701090000060.pdf','2017-01-09 06:43:02','2017-01-09 06:43:02'),

(110,123,'o1dpa','Regular','1701090000084','uploads/e-tickets/regular-1701090000084.pdf','2017-01-09 06:43:02','2017-01-09 06:43:02'),

(111,123,'pb4r','Photo Booth - 4R','1701090000107','uploads/e-tickets/photo-booth-4r-1701090000107.pdf','2017-01-09 06:43:03','2017-01-09 06:43:03'),

(112,123,'o1dpa','Regular','1701090000121','uploads/e-tickets/regular-1701090000121.pdf','2017-01-09 06:47:02','2017-01-09 06:47:02'),

(113,123,'o1dpa','Regular','1701090000145','uploads/e-tickets/regular-1701090000145.pdf','2017-01-09 06:47:02','2017-01-09 06:47:02'),

(114,123,'o1dpa','Regular','1701090000169','uploads/e-tickets/regular-1701090000169.pdf','2017-01-09 06:47:03','2017-01-09 06:47:03'),

(115,123,'pb4r','Photo Booth - 4R','1701090000183','uploads/e-tickets/photo-booth-4r-1701090000183.pdf','2017-01-09 06:47:03','2017-01-09 06:47:03'),

(116,123,'o1dpa','Regular','1701090000206','uploads/e-tickets/regular-1701090000206.pdf','2017-01-09 06:52:03','2017-01-09 06:52:03'),

(117,123,'o1dpa','Regular','1701090000220','uploads/e-tickets/regular-1701090000220.pdf','2017-01-09 06:52:03','2017-01-09 06:52:03'),

(118,123,'o1dpa','Regular','1701090000244','uploads/e-tickets/regular-1701090000244.pdf','2017-01-09 06:52:03','2017-01-09 06:52:03'),

(119,123,'pb4r','Photo Booth - 4R','1701090000268','uploads/e-tickets/photo-booth-4r-1701090000268.pdf','2017-01-09 06:52:04','2017-01-09 06:52:04'),

(120,124,'o1dpa','Regular','1701090000282','uploads/e-tickets/regular-1701090000282.pdf','2017-01-09 07:03:02','2017-01-09 07:03:02'),

(121,125,'o1dpa','Regular','1701090000305','uploads/e-tickets/regular-1701090000305.pdf','2017-01-09 07:05:02','2017-01-09 07:05:02'),

(122,125,'o1dpa','Regular','1701090000329','uploads/e-tickets/regular-1701090000329.pdf','2017-01-09 07:07:01','2017-01-09 07:07:01'),

(123,129,'o1dpa','Regular','1701090000343','uploads/e-tickets/regular-1701090000343.pdf','2017-01-09 07:36:02','2017-01-09 07:36:02'),

(124,136,'o1dpa','Regular','1701100000028','uploads/e-tickets/regular-1701100000028.pdf','2017-01-10 09:28:04','2017-01-10 09:28:04'),

(125,142,'o1dpa','Regular','1701110000247','uploads/e-tickets/regular-1701110000247.pdf','2017-01-11 03:19:05','2017-01-11 03:19:05'),

(126,142,'pb4r','Photo Booth - 4R','1701110000261','uploads/e-tickets/photo-booth-4r-1701110000261.pdf','2017-01-11 03:19:06','2017-01-11 03:19:06');

/*Table structure for table `holidays` */

DROP TABLE IF EXISTS `holidays`;

CREATE TABLE `holidays` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `holidays` */

insert  into `holidays`(`id`,`title`,`date`,`description`,`created_by`,`created_at`,`updated_at`) values 

(3,'Lebaran Misalnya','2016-10-15','Lebaran sebentar lagi',3,'2016-10-28 07:07:42','2016-10-28 07:07:42'),

(4,'Lebaran Misalnya','2016-10-16','Lebaran sebentar lagi',3,'2016-10-28 07:07:42','2016-10-28 07:07:42'),

(5,'Lebaran Misalnya','2016-10-17','Lebaran sebentar lagi',3,'2016-10-28 07:07:42','2016-10-28 07:07:42'),

(6,'Lebaran Misalnya','2016-10-18','Lebaran sebentar lagi',3,'2016-10-28 07:07:42','2016-10-28 07:07:42'),

(7,'Lebaran Misalnya','2016-10-19','Lebaran sebentar lagi',3,'2016-10-28 07:07:42','2016-10-28 07:07:42'),

(8,'Lebaran Misalnya','2016-10-20','Lebaran sebentar lagi',3,'2016-10-28 07:07:42','2016-10-28 07:07:42'),

(9,'Lebaran Misalnya','2016-10-21','Lebaran sebentar lagi',3,'2016-10-28 07:07:42','2016-10-28 07:07:42');

/*Table structure for table `media` */

DROP TABLE IF EXISTS `media`;

CREATE TABLE `media` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `media` */

insert  into `media`(`id`,`title`,`file_name`,`description`,`created_at`,`updated_at`) values 

(102,'Swirl_Tank_Zone.jpg','Swirl_Tank_Zone.jpg',NULL,'2017-01-12 23:31:47','2017-01-12 23:31:47'),

(103,'drawing.jpg','drawing.jpg',NULL,'2017-01-12 23:32:36','2017-01-12 23:32:36'),

(104,'hiu.jpg','hiu.jpg',NULL,'2017-01-12 23:32:36','2017-01-12 23:32:36'),

(105,'keong.jpg','keong.jpg',NULL,'2017-01-12 23:32:38','2017-01-12 23:32:38'),

(106,'otter.jpg','otter.jpg',NULL,'2017-01-12 23:32:39','2017-01-12 23:32:39'),

(107,'seatrek.jpg','seatrek.jpg',NULL,'2017-01-12 23:32:40','2017-01-12 23:32:40'),

(108,'touch.jpg','touch.jpg',NULL,'2017-01-12 23:32:42','2017-01-12 23:32:42'),

(109,'Attraction Images-07.jpg','Attraction Images-07.jpg',NULL,'2017-01-12 23:35:00','2017-01-12 23:35:00'),

(110,'Attraction Images-08.jpg','Attraction Images-08.jpg',NULL,'2017-01-12 23:35:01','2017-01-12 23:35:01'),

(111,'Attraction Images-10.jpg','Attraction Images-10.jpg',NULL,'2017-01-12 23:35:02','2017-01-12 23:35:02'),

(112,'Attraction Images-09.jpg','Attraction Images-09.jpg',NULL,'2017-01-12 23:37:04','2017-01-12 23:37:04'),

(113,'showtime-header.jpg','showtime-header.jpg',NULL,'2017-01-13 00:05:37','2017-01-13 00:05:37');

/*Table structure for table `media_sizes` */

DROP TABLE IF EXISTS `media_sizes`;

CREATE TABLE `media_sizes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `media_id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `width` int(11) NOT NULL DEFAULT '0',
  `height` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `media_sizes_media_id_foreign` (`media_id`),
  CONSTRAINT `media_sizes_media_id_foreign` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `media_sizes` */

/*Table structure for table `menus` */

DROP TABLE IF EXISTS `menus`;

CREATE TABLE `menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `permission` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon_class` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT '0',
  `menu_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'backend',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `menus` */

insert  into `menus`(`id`,`name`,`display`,`link`,`parent_id`,`permission`,`icon_class`,`description`,`created_at`,`updated_at`,`order`,`menu_type`) values 

(1,'dashboard','Dashboard','jai-backend',0,'dashboard','icon-home',NULL,NULL,NULL,0,'backend-old'),

(2,'post','Posts','javascript:;',0,'post','fa fa-pencil',NULL,NULL,NULL,100,'backend-old'),

(3,'post.add','Add Post','jai-backend/post/add',2,'post.add',NULL,NULL,NULL,NULL,200,'backend-old'),

(4,'setting','Settings','javascript:;',0,'setting','fa fa-gears',NULL,NULL,NULL,1000,'backend'),

(5,'user','User','jai-backend/user',4,'user',NULL,NULL,NULL,NULL,300,'backend'),

(6,'permission','Permission','jai-backend/permission',4,'permission',NULL,NULL,NULL,NULL,100,'backend'),

(7,'role','Role','jai-backend/role',4,'role',NULL,NULL,NULL,NULL,200,'backend'),

(9,'post.list','Post List','jai-backend/post',2,'post',NULL,NULL,NULL,NULL,100,'backend-old'),

(10,'category','Post Category','jai-backend/post-category/1',2,'post','',NULL,NULL,NULL,300,'backend-old'),

(13,'posttype','Post Type','jai-backend/post-type',4,'post-type','',NULL,NULL,NULL,400,'backend'),

(14,'slider','Slider','javascript:;',0,'slider','icon-picture',NULL,NULL,NULL,700,'backend'),

(15,'slider.list','Slider List','jai-backend/slider',14,'slider',NULL,NULL,NULL,NULL,100,'backend'),

(16,'slider.add','Add Slider','jai-backend/slider/add',14,'slider.add',NULL,NULL,NULL,NULL,200,'backend'),

(17,'news','News','javascript:;',0,'news','fa fa-newspaper-o',NULL,NULL,NULL,200,'backend'),

(18,'news.list','News List','jai-backend/news',17,'news',NULL,NULL,NULL,NULL,100,'backend'),

(19,'news.add','Add News','jai-backend/news/add',17,'news.add',NULL,NULL,NULL,NULL,200,'backend'),

(20,'news.category','News Category','jai-backend/post-category/2',17,'news-category',NULL,NULL,NULL,NULL,300,'backend'),

(24,'package','Package','javascript:;',0,'package','fa fa-ticket',NULL,NULL,NULL,400,'backend'),

(25,'package.list','Package List','jai-backend/package',24,'package',NULL,NULL,NULL,NULL,100,'backend'),

(26,'package.add','Add Package','jai-backend/package/add',24,'package.add',NULL,NULL,NULL,NULL,200,'backend'),

(27,'holidays','Holiday Management','jai-backend/holiday',24,'holiday',NULL,NULL,NULL,NULL,500,'backend'),

(28,'attractions','Attraction &amp; Experience','javascript:;',0,'attraction','fa fa-rocket',NULL,NULL,NULL,500,'backend'),

(29,'attraction.list','Attraction List','jai-backend/attraction',28,'attraction',NULL,NULL,NULL,NULL,100,'backend'),

(30,'attraction.add','Add Attraction','jai-backend/attraction/add',28,'attraction.add',NULL,NULL,NULL,NULL,200,'backend'),

(31,'media-room','Media Room','javascript:;',0,'media-room','fa fa-bullhorn',NULL,NULL,NULL,600,'backend'),

(32,'media-room.list','Media Room List','jai-backend/media-room',31,'media-room',NULL,NULL,NULL,NULL,100,'backend'),

(33,'media-room.add','Add Media Room','jai-backend/media-room/add',31,'media-room.add',NULL,NULL,NULL,NULL,200,'backend'),

(34,'showtime','Show Time','javascript:;',0,'showtime','fa fa-clock-o',NULL,NULL,NULL,700,'backend'),

(35,'showtime.list','Show Time List','jai-backend/showtime',34,'showtime',NULL,NULL,NULL,NULL,100,'backend'),

(36,'showtime.add','Add Show Time','jai-backend/showtime/add',34,'showtime.add',NULL,NULL,NULL,NULL,200,'backend'),

(37,'f.about-us','About Us','about-us',0,'frontend','ja-icon-about',NULL,NULL,NULL,100,'frontend'),

(38,'f.plan','Plan Your Visit','javascript:;',0,'frontend','ja-icon-loc',NULL,NULL,NULL,200,'frontend'),

(39,'f.ticket','Ticket &amp; Hours','ticket-hours',38,'frontend',NULL,NULL,NULL,NULL,100,'frontend'),

(40,'f.package','Special Packages','special-packages',38,'frontend',NULL,NULL,NULL,NULL,200,'frontend-old'),

(41,'f.show-time','Schedule','show-time',38,'frontend',NULL,NULL,NULL,NULL,300,'frontend'),

(42,'f.location','Location','location',38,'frontend',NULL,NULL,NULL,NULL,400,'frontend'),

(43,'f.attraction','Attractions and Experience','attractions-experience',0,'frontend','ja-icon-attract',NULL,NULL,NULL,300,'frontend'),

(44,'f.conservation','Education and Conservation','conservation',0,'frontend','ja-icon-edu',NULL,NULL,NULL,400,'frontend-old'),

(45,'f.news','News','news',0,'frontend','ja-icon-news',NULL,NULL,NULL,500,'frontend'),

(46,'career','Careers','javascript:;',0,'career','fa fa-child',NULL,NULL,NULL,700,'backend'),

(47,'career.list','Career List','jai-backend/career',46,'career',NULL,NULL,NULL,NULL,100,'backend'),

(48,'career.add','Add Career','jai-backend/career/add',46,'career.add',NULL,NULL,NULL,NULL,200,'backend'),

(49,'page','Pages','jai-backend/page',0,'page','fa fa-sticky-note-o',NULL,NULL,NULL,800,'backend'),

(50,'f.aquarium-map','Aquarium Map','javascript:;',38,'frontend',NULL,NULL,'2016-11-30 09:00:00','2016-11-30 09:00:00',350,'frontend'),

(51,'general-setting','General Setting','jai-backend/general-setting',4,'setting',NULL,NULL,NULL,NULL,50,'backend'),

(52,'promo','Promo','jai-backend/promo',0,'promo','fa fa-star',NULL,'2016-01-11 07:41:00','2016-01-11 07:41:00',850,'backend');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`migration`,`batch`) values 

('2014_10_12_000000_create_users_table',1),

('2014_10_12_100000_create_password_resets_table',1),

('2016_10_04_113129_create_sessions_table',2),

('2016_10_05_042749_create_media_table',3),

('2016_10_11_081507_create_menus_table',4),

('2016_10_12_032409_create_permission_tables',5),

('2016_10_12_042248_add_order_on_menus',6),

('2016_10_13_110437_create_categories_table',7),

('2016_10_13_110650_create_post_types_table',8),

('2016_10_13_110751_create_posts_table',9),

('2016_10_13_112053_create_post_has_categories_table',10),

('2016_10_13_112733_create_tags_table',11),

('2016_10_14_095031_add_parent_id_on_categories',12),

('2016_10_14_135937_add_status_on_posts',13),

('2016_10_14_152415_add_publish_date_on_posts',14),

('2016_10_15_202336_create_medias_table',14),

('2016_10_20_210322_add_media_type_on_post_has_medias',15),

('2016_10_22_183740_create_post_details_table',16),

('2016_10_24_213009_create_sliders_table',17),

('2016_10_26_185546_create_post_metas_table',18),

('2016_10_27_133403_create_holidays_table',19),

('2016_10_27_181417_add_created_by_on_posts',20),

('2016_10_28_192728_create_packages_table',21),

('2016_10_30_112407_add_is_general_admission_on_package',22),

('2016_10_30_120042_create_shows_table',23),

('2016_11_01_201700_create_package_has_medias',24),

('2016_11_05_125956_add_menu_type_on_menus',25),

('2016_11_05_152539_alter_show_tables',26),

('2016_11_10_104656_create_show_has_media_table',27),

('2016_11_10_175742_create_package_metas_table',28),

('2016_11_10_183306_create_show_metas_table',29),

('2016_11_14_125111_create_careers_table',30),

('2016_11_24_154312_add_color_on_package',31);

/*Table structure for table `order_details` */

DROP TABLE IF EXISTS `order_details`;

CREATE TABLE `order_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) unsigned NOT NULL,
  `product_id` int(11) NOT NULL,
  `galasys_product_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `qty` double NOT NULL,
  `total_price` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order_details_order_id_foreign` (`order_id`),
  CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=127 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `order_details` */

insert  into `order_details`(`id`,`order_id`,`product_id`,`galasys_product_id`,`product_name`,`price`,`qty`,`total_price`) values 

(34,20,4018,'o1dpa','Regular',200000,1,200000),

(35,20,4019,'o1dpc','Premium',265000,2,530000),

(36,20,4020,'o1dps','Exclusive',500000,2,1000000),

(37,21,4018,'o1dpa','Regular',200000,1,200000),

(38,21,4019,'o1dpc','Premium',265000,0,0),

(39,21,4020,'o1dps','Exclusive',500000,0,0),

(40,22,4018,'o1dpa','Regular',200000,0,0),

(41,22,4019,'o1dpc','Premium',265000,1,265000),

(42,22,4020,'o1dps','Exclusive',500000,0,0),

(43,23,4018,'o1dpa','Regular',200000,0,0),

(44,23,4019,'o1dpc','Premium',265000,1,265000),

(45,23,4020,'o1dps','Exclusive',500000,0,0),

(46,24,4018,'o1dpa','Regular',200000,0,0),

(47,24,4019,'o1dpc','Premium',265000,0,0),

(48,24,4020,'o1dps','Exclusive',500000,1,500000),

(49,25,4018,'o1dpa','Regular',200000,0,0),

(50,25,4019,'o1dpc','Premium',265000,1,265000),

(51,25,4020,'o1dps','Exclusive',500000,0,0),

(52,26,4018,'o1dpa','Regular',200000,2,400000),

(53,26,4019,'o1dpc','Premium',265000,0,0),

(54,26,4020,'o1dps','Exclusive',500000,0,0),

(55,27,4018,'o1dpa','Regular',200000,0,0),

(56,27,4019,'o1dpc','Premium',265000,1,265000),

(57,27,4020,'o1dps','Exclusive',500000,0,0),

(58,28,4020,'o1dps','Exclusive',500000,1,500000),

(59,29,4020,'o1dps','Exclusive',500000,1,500000),

(60,30,4018,'o1dpa','Regular',200000,1,200000),

(61,31,4018,'o1dpa','Regular',200000,1,200000),

(62,32,4018,'o1dpa','Regular',200000,1,200000),

(63,33,4018,'o1dpa','Regular',200000,1,200000),

(64,34,4018,'o1dpa','Regular',200000,1,200000),

(65,89,4018,'o1dpa','Regular',200000,1,200000),

(66,90,4018,'o1dpa','Regular',200000,1,200000),

(67,91,4018,'o1dpa','Regular',200000,1,200000),

(68,92,4019,'o1dpc','Premium',265000,2,530000),

(69,93,4019,'o1dpc','Premium',265000,2,530000),

(70,94,4019,'o1dpc','Premium',265000,2,530000),

(71,95,4019,'o1dpc','Premium',265000,2,530000),

(72,96,4019,'o1dpc','Premium',265000,2,530000),

(73,97,4018,'o1dpa','Regular',200000,1,200000),

(74,98,4020,'o1dps','Exclusive',500000,2,1000000),

(75,99,4019,'o1dpc','Premium',265000,2,530000),

(76,100,4019,'o1dpc','Premium',265000,2,530000),

(77,101,4018,'o1dpa','Regular',200000,1,200000),

(78,102,4019,'o1dpc','Premium',265000,2,530000),

(79,103,4020,'o1dps','Exclusive',500000,4,2000000),

(80,104,4020,'o1dps','Exclusive',500000,1,500000),

(81,105,4018,'o1dpa','Regular',200000,1,200000),

(82,106,4018,'o1dpa','Regular',200000,1,200000),

(83,107,4018,'o1dpa','Regular',200000,1,200000),

(84,108,4018,'o1dpa','Regular',200000,1,200000),

(85,109,4019,'o1dpc','Premium',265000,1,265000),

(86,110,4019,'o1dpc','Premium',265000,1,265000),

(87,111,4018,'o1dpa','Regular',200000,1,200000),

(88,112,4019,'o1dpc','Premium',265000,1,265000),

(89,113,4019,'o1dpc','Premium',265000,1,265000),

(90,114,4018,'o1dpa','Regular',200000,1,200000),

(91,115,4018,'o1dpa','Regular',200000,1,200000),

(92,116,4018,'o1dpa','Regular',200000,1,200000),

(93,117,4018,'o1dpa','Regular',200000,1,200000),

(94,118,4018,'o1dpa','Regular',200000,1,200000),

(95,119,4018,'o1dpa','Regular',200000,1,200000),

(96,120,4018,'o1dpa','Regular',200000,1,200000),

(97,121,4018,'o1dpa','Regular',200000,1,200000),

(98,121,4019,'o1dpc','Premium',275000,1,275000),

(99,122,4018,'o1dpa','Regular',200000,2,400000),

(100,122,4019,'o1dpc','Premium',275000,1,275000),

(101,123,4018,'o1dpa','Regular',200000,2,400000),

(102,123,4019,'o1dpc','Premium',275000,1,275000),

(103,124,4018,'o1dpa','Regular',200000,1,200000),

(104,125,4018,'o1dpa','Regular',200000,1,200000),

(105,126,4018,'o1dpa','Regular',200000,1,200000),

(106,127,4018,'o1dpa','Regular',200000,1,200000),

(107,128,4018,'o1dpa','Regular',200000,1,200000),

(108,129,4018,'o1dpa','Regular',200000,1,200000),

(109,130,4019,'o1dpc','Premium',275000,1,275000),

(110,131,4018,'o1dpa','Regular',200000,1,200000),

(111,132,4019,'o1dpc','Aquarium Admission, 5D Theater, and Printed Photo Souvenir',275000,1,275000),

(112,133,4019,'o1dpc','Aquarium Admission, 5D Theater, and Printed Photo Souvenir',275000,2,550000),

(113,134,4018,'o1dpa','Aquarium Admission',200000,2,400000),

(114,135,4019,'o1dpc','Aquarium Admission, 5D Theater, and Printed Photo Souvenir',275000,2,550000),

(115,136,4018,'o1dpa','Aquarium Admission',200000,1,200000),

(116,137,4019,'o1dpc','Aquarium Admission, 5D Theater, and Printed Photo Souvenir',275000,2,550000),

(117,138,4019,'o1dpc','Aquarium Admission, 5D Theater, and Printed Photo Souvenir',275000,2,550000),

(118,139,4019,'o1dpc','Aquarium Admission, 5D Theater, and Printed Photo Souvenir',275000,2,550000),

(119,140,4019,'o1dpc','Aquarium Admission, 5D Theater, and Printed Photo Souvenir',275000,1,275000),

(120,141,4019,'o1dpc','Aquarium Admission, 5D Theater, and Printed Photo Souvenir',275000,1,275000),

(121,142,4019,'o1dpc','Premium',275000,1,275000),

(122,143,4019,'o1dpc','Premium',275000,1,275000),

(123,144,4019,'o1dpc','Premium',275000,2,550000),

(124,145,4019,'o1dpc','Premium',275000,2,550000),

(125,146,4019,'o1dpc','Premium',290000,2,580000),

(126,147,4019,'o1dpc','Premium',290000,2,580000);

/*Table structure for table `orders` */

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `visit_date` date NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sub_total` double NOT NULL DEFAULT '0',
  `tax` double NOT NULL DEFAULT '0',
  `total_amount` double NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `status_description` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=148 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `orders` */

insert  into `orders`(`id`,`visit_date`,`email`,`name`,`phone_number`,`sub_total`,`tax`,`total_amount`,`created_at`,`updated_at`,`status`,`status_description`) values 

(19,'2016-12-10','trianinda.edwina@gmail.com','Edwina Trianinda','081808180818',1730000,173000,1903000,'2016-12-19 07:42:32','2016-12-19 07:42:32',0,NULL),

(20,'2016-12-10','trianinda.edwina@gmail.com','Edwina Trianinda','081808180818',1730000,173000,1903000,'2016-12-19 07:50:52','2016-12-19 07:50:52',0,NULL),

(21,'2016-12-10','trianinda.edwina@gmail.com','Edwina Trianinda','08180832948757',200000,20000,220000,'2016-12-19 11:41:48','2016-12-19 11:41:48',0,NULL),

(22,'2016-12-25','pasha.md5@gmail.com','Pasha Mahardika','081803857',265000,26500,291500,'2016-12-19 11:47:59','2016-12-19 11:47:59',0,NULL),

(23,'2016-12-25','pasha.md5@gmail.com','Pasha Mahardika','081803857',265000,26500,291500,'2016-12-19 11:49:18','2016-12-19 11:49:18',0,NULL),

(24,'2016-12-25','trianinda.edwina@gmail.com','Edwina Trianinda','081803857',500000,50000,550000,'2016-12-19 15:42:20','2016-12-19 15:42:20',0,NULL),

(25,'2016-12-25','pasha.md5@gmail.com','Pasha Mahardika','08180832948757',265000,26500,291500,'2016-12-21 04:44:49','2016-12-21 04:44:49',0,NULL),

(26,'2016-12-25','edwina.trianinda@redspace.asia','Edwina Trianinda','081294054353',400000,40000,440000,'2016-12-21 05:03:21','2016-12-21 05:03:21',0,NULL),

(27,'2016-12-24','pasha.md5@gmail.com','Edwina Trianinda','081803857',265000,26500,291500,'2016-12-21 06:19:47','2016-12-21 06:19:47',0,NULL),

(28,'2017-01-28','pasha.md5@gmail.com','Pasha Mahardika','081808325756',500000,50000,550000,'2017-01-03 09:17:51','2017-01-03 09:17:51',0,NULL),

(29,'2017-01-28','pasha.md5@gmail.com','Pasha Mahardika','081808325756',500000,50000,550000,'2017-01-03 09:20:03','2017-01-03 09:20:03',0,NULL),

(30,'2017-01-14','pasha.md5@gmail.com','Pasha Mahardika','081808325756',200000,20000,220000,'2017-01-04 02:19:29','2017-01-04 02:19:29',0,NULL),

(31,'2017-01-28','pasha.md5@gmail.com','Pasha Mahardika','081808325756',200000,20000,220000,'2017-01-04 02:42:16','2017-01-04 02:42:16',0,NULL),

(32,'2017-01-28','pasha.md5@gmail.com','Pasha Mahardika','081808325756',200000,20000,220000,'2017-01-04 02:53:38','2017-01-04 02:53:38',0,NULL),

(33,'2017-01-28','pasha.md5@gmail.com','Pasha Mahardika','081808325756',200000,20000,220000,'2017-01-04 03:19:14','2017-01-04 03:19:14',0,NULL),

(34,'2017-01-21','pasha.md5@gmail.com','Pasha Mahardika','081808325756',200000,20000,220000,'2017-01-04 06:00:53','2017-01-04 06:00:53',0,NULL),

(89,'2017-01-21','pasha.md5@gmail.com','Pasha Mahardika','081808325756',200000,20000,220000,'2017-01-04 06:03:33','2017-01-04 06:03:33',0,NULL),

(90,'2017-01-21','pasha.md5@gmail.com','Pasha Mahardika','081808325756',200000,20000,220000,'2017-01-04 06:05:18','2017-01-04 06:21:07',5,'email-sent'),

(91,'2017-01-21','pasha.md5@gmail.com','Pasha Mahardika','081808325756',200000,20000,220000,'2017-01-04 06:22:25','2017-01-04 06:24:11',5,'email-sent'),

(92,'2017-01-14','ameliaceldy@gmail.com','Elfitri Amelia','081218258650',530000,53000,583000,'2017-01-04 06:59:47','2017-01-05 02:43:28',5,'email-sent'),

(93,'2017-01-14','ameliaceldy@gmail.com','Elfitri Amelia','081218258650',530000,53000,583000,'2017-01-04 07:00:14','2017-01-04 07:00:14',0,NULL),

(94,'2017-01-14','ameliaceldy@gmail.com','Elfitri Amelia','081218258650',530000,53000,583000,'2017-01-04 07:00:36','2017-01-04 07:00:36',0,NULL),

(95,'2017-01-14','a','Elfitri Amelia','',530000,53000,583000,'2017-01-04 07:01:24','2017-01-04 07:01:24',0,NULL),

(96,'2017-01-14','ameliaceldy@gmail.com','Elfitri Amelia','081218258650',530000,53000,583000,'2017-01-04 07:02:13','2017-01-04 07:02:13',0,NULL),

(97,'2017-01-14','pasha.md5@gmail.com','Pasha Mahardika','081808180818',200000,20000,220000,'2017-01-04 07:06:29','2017-01-04 07:08:11',5,'email-sent'),

(98,'2017-01-14','anotherslaycovu@gmail.com','Meri Melindasari','087724569098',1000000,100000,1100000,'2017-01-04 07:17:26','2017-01-04 07:17:26',0,NULL),

(99,'2017-01-29','edwina.trianinda@redspace.asia','Edwina Trianinda','081294054353',530000,53000,583000,'2017-01-04 07:19:51','2017-01-04 07:19:51',0,NULL),

(100,'2017-01-29','edwina.trianinda@redspace.asia','Edwina Trianinda','081294054353',530000,53000,583000,'2017-01-04 07:20:22','2017-01-04 07:24:35',5,'email-sent'),

(101,'2017-01-21','pasha.md5@gmail.com','Pasha Mahardika','081808325756',200000,20000,220000,'2017-01-04 07:26:38','2017-01-04 07:26:38',0,NULL),

(102,'2017-01-14','anotherslaycovu@gmail.com','Meri Melindasari','087725679098',530000,53000,583000,'2017-01-04 07:27:13','2017-01-04 07:29:33',5,'email-sent'),

(103,'2017-01-08','alfi.redspace@gmail.com','noksnfoinweofnwvp','90277879',2000000,200000,2200000,'2017-01-04 07:29:14','2017-01-04 07:31:34',5,'email-sent'),

(104,'2017-01-08','jamal@kleur.id','Full Name','08123456789',500000,50000,550000,'2017-01-04 07:34:23','2017-01-04 07:34:23',0,NULL),

(105,'2017-01-21','boyz.arifin@gmail.com','Boy Arifin','085697780606',200000,20000,220000,'2017-01-04 10:39:35','2017-01-04 10:39:35',0,NULL),

(106,'2017-01-14','boyz.arifin@gmail.com','Boy Arifin','085697780606',200000,20000,220000,'2017-01-04 10:41:44','2017-01-04 10:41:44',0,NULL),

(107,'2017-02-04','pasha.md5@gmail.com','Pasha Mahardika','081808325756',200000,0,200000,'2017-01-05 02:46:29','2017-01-05 02:46:29',0,NULL),

(108,'2017-02-04','pasha.md5@gmail.com','Pasha Mahardika','081808325756',200000,0,200000,'2017-01-05 02:47:38','2017-01-05 02:50:10',5,'email-sent'),

(109,'2017-01-29','pasha.md5@gmail.com','Pasha Mahardika','081808325756',265000,0,265000,'2017-01-05 02:53:07','2017-01-05 02:53:07',0,NULL),

(110,'2017-01-28','pasha.md5@gmail.com','Pasha Mahardika','081808325756',265000,0,265000,'2017-01-05 03:49:16','2017-01-05 03:49:27',9,'cancelled'),

(111,'2017-02-04','pasha.md5@gmail.com','Pasha Mahardika','081808325756',200000,0,200000,'2017-01-05 03:56:40','2017-01-05 04:09:00',9,'cancelled'),

(112,'2017-01-28','pasha.md5@gmail.com','Pasha Mahardika','081808325756',265000,0,265000,'2017-01-05 04:14:06','2017-01-05 04:15:17',9,'cancelled'),

(113,'2017-01-14','pasha.md5@gmail.com','Pasha Mahardika','081808325756',265000,0,265000,'2017-01-05 04:16:50','2017-01-05 04:28:50',9,'cancelled'),

(114,'2017-01-28','pasha.md5@gmail.com','Pasha Mahardika','081808325756',200000,0,200000,'2017-01-05 06:31:20','2017-01-05 06:31:20',0,NULL),

(115,'2017-01-29','pasha.md5@gmail.com','Pasha Mahardika','081808325756',200000,0,200000,'2017-01-05 06:33:10','2017-01-05 06:46:46',9,'cancelled'),

(116,'2017-01-28','pasha.md5@gmail.com','Pasha Mahardika','081808325756',200000,0,200000,'2017-01-05 07:45:19','2017-01-05 07:48:50',9,'cancelled'),

(117,'2017-01-28','pasha.md5@gmail.com','Pasha Mahardika','081808325756',200000,0,200000,'2017-01-05 07:55:41','2017-01-05 07:55:41',0,NULL),

(118,'2017-01-28','pasha.md5@gmail.com','Pasha Mahardika','081808325756',200000,0,200000,'2017-01-05 08:02:30','2017-01-05 08:03:13',9,'cancelled'),

(119,'2017-01-21','pasha.md5@gmail.com','Pasha Mahardika','081808325756',200000,0,200000,'2017-01-05 08:04:17','2017-01-05 08:08:11',5,'email-sent'),

(120,'2017-01-21','pasha.md5@gmail.com','Pasha Mahardika','081808325756',200000,0,200000,'2017-01-09 03:04:31','2017-01-09 03:06:15',5,'email-sent'),

(121,'2017-01-22','pasha.md5@gmail.com','Pasha Mahardika','081808325756',475000,0,475000,'2017-01-09 03:25:06','2017-01-09 03:25:06',0,NULL),

(122,'2017-01-21','pasha.md5@gmail.com','Pasha Mahardika','081808325756',675000,0,675000,'2017-01-09 03:25:27','2017-01-09 03:26:29',9,'cancelled'),

(123,'2017-01-21','pasha.md5@gmail.com','Pasha Mahardika','08180832948757',675000,0,675000,'2017-01-09 06:40:43','2017-01-09 06:53:00',5,'email-sent'),

(124,'2017-01-21','pasha.md5@gmail.com','Pasha Mahardika','081803857',200000,0,200000,'2017-01-09 07:01:11','2017-01-09 07:03:14',5,'email-sent'),

(125,'2017-01-21','trianinda.edwina@gmail.com','Edwina Trianinda','08180832948757',200000,0,200000,'2017-01-09 07:03:52','2017-01-09 07:07:19',5,'email-sent'),

(126,'2017-01-22','iman.ismatullah@ymail.com','test','081234567890',200000,0,200000,'2017-01-09 07:16:09','2017-01-09 07:18:02',9,'cancelled'),

(127,'2017-01-22','iman.ismatullah@ymail.com','test','081234567890',200000,0,200000,'2017-01-09 07:22:26','2017-01-09 07:23:57',9,'cancelled'),

(128,'2017-01-22','iman.ismatullah@ymail.com','test','081234567890',200000,0,200000,'2017-01-09 07:25:44','2017-01-09 07:28:36',9,'cancelled'),

(129,'2017-01-22','iman.ismatullah@ymail.com','test','081234567890',200000,0,200000,'2017-01-09 07:29:14','2017-01-09 07:36:14',5,'email-sent'),

(130,'2017-01-21','edwina.trianinda@redspace.asia','Edwina Trianinda','081294054353',275000,0,275000,'2017-01-09 10:06:36','2017-01-09 10:06:36',0,NULL),

(131,'2017-01-21','boyz.arifin@gmail.com','Boy Arifin','085697780606',200000,0,200000,'2017-01-10 01:57:12','2017-01-10 01:57:12',0,NULL),

(132,'2017-01-21','bza@gmail.com','Arif','085676658989',275000,0,275000,'2017-01-10 06:44:28','2017-01-10 06:44:28',0,NULL),

(133,'2017-02-18','ameliaceldy@gmail.com','Elfitri Amelia','081218258650',550000,0,550000,'2017-01-10 09:11:15','2017-01-10 09:11:15',0,NULL),

(134,'2017-01-18','edwina.trianinda@redspace.asia','Edwina Trianinda','081294054353',400000,0,400000,'2017-01-10 09:14:15','2017-01-10 09:14:15',0,NULL),

(135,'2017-02-18','ameliaceldy@gmail.com','elfitri amelia','081218258650',550000,0,550000,'2017-01-10 09:16:57','2017-01-10 09:16:57',0,NULL),

(136,'2017-01-18','aldion@nsiapay.net','Doku test','0215150555',200000,0,200000,'2017-01-10 09:27:36','2017-01-10 09:28:13',5,'email-sent'),

(137,'2017-02-18','ameliaceldy@gmail.com','elfitri amelia','081218258650',550000,0,550000,'2017-01-10 11:23:43','2017-01-10 11:23:43',0,NULL),

(138,'2017-02-18','ameliaceldy@gmail.com','elfitri amelia','081218258650',550000,0,550000,'2017-01-10 13:05:07','2017-01-10 13:05:07',0,NULL),

(139,'2017-02-18','ameliaceldy@gmail.com','elfitri amelia','081218258650',550000,0,550000,'2017-01-10 13:06:58','2017-01-10 13:06:58',0,NULL),

(140,'2017-01-21','rzky.pahlevi@gmail.com','Rizky PattySaid','081286265412',275000,0,275000,'2017-01-11 01:36:26','2017-01-11 01:36:26',0,NULL),

(141,'2017-01-22','rzky.pahlevi@gmail.com','Rizky Pahlevi','081286265412',275000,0,275000,'2017-01-11 01:38:16','2017-01-11 01:38:16',0,NULL),

(142,'2017-01-21','pasha.md5@gmail.com','Pasha Mahardika','081808325756',275000,0,275000,'2017-01-11 03:18:04','2017-01-11 03:19:20',5,'email-sent'),

(143,'2017-01-21','pasha.md5@gmail.com','Pasha Mahardika','081808325756',275000,0,275000,'2017-01-11 05:24:03','2017-01-11 06:10:41',2,'on-hold'),

(144,'2017-02-18','ameliaceldy@gmail.com','elfitri amelia','081218258650',550000,0,550000,'2017-01-11 05:25:11','2017-01-11 05:25:11',0,NULL),

(145,'2017-02-18','ameliaceldy@gmail.com','elfitri amelia','081218258650',550000,0,550000,'2017-01-11 05:29:58','2017-01-11 05:29:58',0,NULL),

(146,'2017-01-22','aass@aamail.com','aas','08121932764',580000,0,580000,'2017-01-12 03:56:46','2017-01-12 03:56:46',0,NULL),

(147,'2017-01-21','edwina.trianinda@redspace.asia','Edwina Trianinda','081294054353',580000,0,580000,'2017-01-12 06:41:27','2017-01-12 06:41:27',0,NULL);

/*Table structure for table `package_details` */

DROP TABLE IF EXISTS `package_details`;

CREATE TABLE `package_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `package_id` int(10) unsigned NOT NULL,
  `lang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `package_details_package_id_foreign` (`package_id`),
  CONSTRAINT `package_details_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `package_details` */

insert  into `package_details`(`id`,`package_id`,`lang`,`title`,`slug`,`content`) values 

(33,6,'en','Camp Program','camp-program','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. <br />Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. <br />Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),

(34,6,'id','Program Camp','program-camp','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. <br />Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. <br />Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),

(39,7,'en','Combo Package','combo-package','The aquarium is one of Indonesia\'s most unforgettable group activities! Groups of 10 or more people receive discounted admission to the aquarium! Pre-booking is required at least 7 days in advance as groups must be pre-qualified before receiving this rate.&nbsp;'),

(40,7,'id','Paket Kombo','paket-kombo','The aquarium is one of Indonesia\'s most unforgettable group activities! Groups of 10 or more people receive discounted admission to the aquarium! Pre-booking is required at least 7 days in advance as groups must be pre-qualified before receiving this rate.&nbsp;'),

(53,1,'en','Regular','regular','Aquarium&nbsp;Tour'),

(54,1,'id','Regular','regular-2','Aquarium&nbsp;Tour'),

(57,3,'en','Premium ','premium','Aquarium Tour, 5D Theater and Printed Photo Souvenir.'),

(58,3,'id','Premium','premium-2','Aquarium Tour, 5D Theater and Printed Photo Souvenir.'),

(59,4,'en','Ultimate','ultimate','Aquarium Tour, 5D Theater, Shark/Piranha Feeding, Seatrek/Dive and Printed Photo Souvenir.'),

(60,4,'id','Ultimate','ultimate-2','Aquarium Tour, 5D Theater, Shark/Piranha Feeding, Seatrek/Dive and Printed Photo Souvenir.'),

(65,5,'en','School, Coorporate and Birthday Package','school-coorporate-and-birthday-package','Jakarta Aquarium provides a wide range of interesting activity for your company or school group.<br /><br />Get a special rate and activity package for your group in Jakarta Aquarium. For a group consist of more than 30 people, place a reservation at least 7 days in advance.<br /><br /><br />Contact Us :<br />T. 021 2920 9072<br />E. sales@jakarta-aquarium.com'),

(66,5,'id','Paket Sekolah, Korporasi dan Ulang Tahun','paket-sekolah-korporasi-dan-ulang-tahun','Jakarta Aquarium menyediakan beragam paket aktivitas menarik untuk grup perusahaan atau grup sekolah.<br /><br />Dapatkan harga khusus hanya untuk grup Anda. Untuk group lebih dari 30 orang silahkan melakukan reservasi 7 hari sebelumnya.<br /><br />Hubungi tim kami di :<br />T. 021 2920 9072<br />E. sales@jakarta-aquarium.com');

/*Table structure for table `package_has_coupons` */

DROP TABLE IF EXISTS `package_has_coupons`;

CREATE TABLE `package_has_coupons` (
  `package_id` int(10) unsigned NOT NULL,
  `coupon_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`package_id`,`coupon_id`),
  KEY `package_has_coupons_coupon_id_foreign` (`coupon_id`),
  CONSTRAINT `package_has_coupons_coupon_id_foreign` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`) ON DELETE CASCADE,
  CONSTRAINT `package_has_coupons_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `package_has_coupons` */

/*Table structure for table `package_has_medias` */

DROP TABLE IF EXISTS `package_has_medias`;

CREATE TABLE `package_has_medias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `package_id` int(10) unsigned NOT NULL,
  `media_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `package_has_medias_package_id_foreign` (`package_id`),
  CONSTRAINT `package_has_medias_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `package_has_medias` */

insert  into `package_has_medias`(`id`,`package_id`,`media_id`) values 

(4,6,53),

(5,5,55),

(6,7,54);

/*Table structure for table `package_metas` */

DROP TABLE IF EXISTS `package_metas`;

CREATE TABLE `package_metas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `package_id` int(10) unsigned NOT NULL,
  `meta_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_value` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `package_metas_package_id_foreign` (`package_id`),
  CONSTRAINT `package_metas_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `package_metas` */

insert  into `package_metas`(`id`,`package_id`,`meta_key`,`meta_value`) values 

(9,1,'meta_description-en','META (ENG)'),

(10,1,'meta_description-id','META (ID)');

/*Table structure for table `packages` */

DROP TABLE IF EXISTS `packages`;

CREATE TABLE `packages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `package_type_id` int(11) NOT NULL DEFAULT '1',
  `normal_price` double NOT NULL DEFAULT '0',
  `weekend_price` double NOT NULL DEFAULT '0',
  `holiday_price` double NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `is_general_admission` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'cyan',
  `order` int(11) NOT NULL DEFAULT '0',
  `galasys_product_id` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `packages` */

insert  into `packages`(`id`,`package_type_id`,`normal_price`,`weekend_price`,`holiday_price`,`created_by`,`is_general_admission`,`created_at`,`updated_at`,`color`,`order`,`galasys_product_id`) values 

(1,1,100000,150000,150000,1,1,'2016-10-28 06:59:22','2016-11-26 01:47:13','cyan darken-1',0,NULL),

(3,1,265000,290000,290000,3,1,'2016-10-28 07:10:11','2016-11-24 00:37:20','light-blue darken-4',0,NULL),

(4,1,550000,600000,600000,3,1,'2016-10-29 20:31:58','2016-11-24 00:38:20','amber darken-1',0,NULL),

(5,2,0,0,0,1,1,'2016-11-01 04:59:03','2017-01-08 02:58:34','cyan',0,'0'),

(6,2,0,0,0,3,0,'2016-11-01 05:00:47','2016-11-01 05:00:47','cyan',0,NULL),

(7,2,0,0,0,3,0,'2016-11-01 05:02:02','2016-11-01 05:02:02','cyan',0,NULL);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `password_resets` */

insert  into `password_resets`(`email`,`token`,`created_at`) values 

('trianinda.edwina@gmail.com','5117d3b8a75506a04a5b3b0b472aa0dd5bdbf2c4b28dfeb97ca923662357cb90','2017-01-06 07:42:25');

/*Table structure for table `permissions` */

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `permissions` */

insert  into `permissions`(`id`,`name`,`created_at`,`updated_at`) values 

(1,'dashboard',NULL,NULL),

(2,'post',NULL,NULL),

(3,'post.add',NULL,NULL),

(4,'setting',NULL,NULL),

(5,'user',NULL,NULL),

(6,'permission',NULL,NULL),

(7,'role',NULL,NULL),

(8,'user.add',NULL,NULL),

(9,'user.edit',NULL,NULL),

(10,'user.delete',NULL,NULL),

(11,'role.add','2016-10-12 19:36:02','2016-10-12 19:36:02'),

(12,'role.edit','2016-10-12 19:36:09','2016-10-12 19:36:09'),

(13,'role.delete','2016-10-12 19:36:14','2016-10-12 19:36:14'),

(14,'permission.add','2016-10-12 19:37:22','2016-10-12 19:37:22'),

(15,'permission.edit','2016-10-12 19:37:27','2016-10-12 19:37:27'),

(16,'permission.delete','2016-10-12 19:37:32','2016-10-12 19:37:32'),

(21,'post-type','2016-10-13 02:30:58','2016-10-13 02:30:58'),

(22,'post-type.add','2016-10-13 02:31:06','2016-10-13 02:31:06'),

(23,'post-type.edit','2016-10-13 02:31:12','2016-10-13 02:31:12'),

(24,'post-type.delete','2016-10-13 02:31:19','2016-10-13 02:31:19'),

(25,'post-category','2016-10-13 20:09:26','2016-10-13 20:09:26'),

(26,'post-category.add','2016-10-13 20:14:03','2016-10-13 20:14:03'),

(27,'post-category.edit','2016-10-13 20:14:11','2016-10-13 20:14:11'),

(28,'post-category.delete','2016-10-13 20:14:18','2016-10-13 20:14:18'),

(29,'whats-on','2016-10-21 04:41:51','2016-10-21 04:41:51'),

(30,'whats-on.add','2016-10-21 04:41:57','2016-10-21 04:41:57'),

(31,'whats-on.edit','2016-10-21 04:42:02','2016-10-21 04:42:02'),

(32,'whats-on.delete','2016-10-21 04:42:07','2016-10-21 04:42:07'),

(33,'post.edit','2016-10-22 00:53:48','2016-10-22 00:53:48'),

(34,'post.delete','2016-10-22 00:53:53','2016-10-22 00:53:53'),

(35,'slider','2016-10-24 06:56:43','2016-10-24 06:56:43'),

(36,'slider.add','2016-10-24 06:56:49','2016-10-24 06:56:49'),

(37,'slider.edit','2016-10-24 06:56:54','2016-10-24 06:56:54'),

(38,'slider.delete','2016-10-24 06:57:00','2016-10-24 06:57:00'),

(39,'news','2016-10-26 03:44:59','2016-10-26 03:44:59'),

(40,'news.add','2016-10-26 03:45:03','2016-10-26 03:45:03'),

(41,'news.edit','2016-10-26 03:45:09','2016-10-26 03:45:09'),

(42,'news.delete','2016-10-26 03:45:15','2016-10-26 03:45:15'),

(43,'news-category','2016-10-26 04:36:43','2016-10-26 04:36:43'),

(44,'package','2016-10-26 22:17:35','2016-10-26 22:17:35'),

(45,'package.add','2016-10-26 22:17:44','2016-10-26 22:17:44'),

(46,'package.edit','2016-10-26 22:17:51','2016-10-26 22:17:51'),

(47,'package.delete','2016-10-26 22:17:57','2016-10-26 22:17:57'),

(48,'holiday','2016-10-26 22:31:05','2016-10-26 22:31:05'),

(49,'attraction','2016-10-29 22:12:05','2016-10-29 22:12:05'),

(50,'attraction.add','2016-10-29 22:12:13','2016-10-29 22:12:13'),

(51,'attraction.edit','2016-10-29 22:12:20','2016-10-29 22:12:20'),

(52,'attraction.delete','2016-10-29 22:12:27','2016-10-29 22:12:27'),

(53,'attraction-category','2016-10-29 22:12:36','2016-10-29 22:12:36'),

(54,'media-room','2016-10-29 22:56:51','2016-10-29 22:56:51'),

(55,'media-room.add','2016-10-29 22:56:56','2016-10-29 22:56:56'),

(56,'media-room.edit','2016-10-29 22:57:01','2016-10-29 22:57:01'),

(57,'media-room.delete','2016-10-29 22:57:08','2016-10-29 22:57:08'),

(58,'media-room-category','2016-10-29 22:57:14','2016-10-29 22:57:14'),

(59,'showtime','2016-11-02 05:30:02','2016-11-02 05:30:02'),

(60,'showtime.add','2016-11-02 05:30:07','2016-11-02 05:30:07'),

(61,'showtime.edit','2016-11-02 05:30:13','2016-11-02 05:30:23'),

(62,'showtime.delete','2016-11-02 05:30:32','2016-11-02 05:30:32'),

(63,'career','2016-11-13 22:39:00','2016-11-13 22:39:00'),

(64,'career.add','2016-11-13 22:39:06','2016-11-13 22:39:06'),

(65,'career.update','2016-11-13 22:39:12','2016-11-13 22:39:12'),

(66,'career.delete','2016-11-13 22:39:20','2016-11-13 22:39:20'),

(67,'page','2016-11-22 00:36:56','2016-11-22 00:36:56'),

(68,'page.add','2016-11-22 00:37:00','2016-11-22 00:37:00'),

(69,'page.edit','2016-11-22 00:37:04','2016-11-22 00:37:04'),

(70,'page.delete','2016-11-22 00:37:08','2016-11-22 00:37:08'),

(71,'order','2017-01-09 04:09:17','2017-01-09 04:09:17'),

(72,'promo','2017-01-11 07:42:25','2017-01-11 07:42:25'),

(73,'promo.add','2017-01-11 07:42:29','2017-01-11 07:42:29'),

(74,'promo.edit','2017-01-11 07:42:32','2017-01-11 07:42:32'),

(75,'promo.delete','2017-01-11 07:42:35','2017-01-11 07:42:35');

/*Table structure for table `post_details` */

DROP TABLE IF EXISTS `post_details`;

CREATE TABLE `post_details` (
  `post_id` int(10) unsigned NOT NULL,
  `lang` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'en',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`post_id`,`lang`),
  CONSTRAINT `post_details_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `post_details` */

insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values 

(17,'en','Far far away, behind the word mountains, far from the countries Vokalia and Consonantia','far-far-away-behind-the-word-mountains-far-from-the-countries-vokalia-and-consonantia','Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. <br />Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar. The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn&rsquo;t listen. <br />She packed her seven versalia, put her initial into the belt and made herself on the way. When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. <br />Pityful a rethoric question ran over her cheek, then'),

(17,'id','Far far away, behind the word mountains, far from the countries Vokalia and Consonantia','far-far-away-behind-the-word-mountains-far-from-the-countries-vokalia-and-consonantia-2','Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. <br />Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar. The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn&rsquo;t listen. <br />She packed her seven versalia, put her initial into the belt and made herself on the way. When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. <br />Pityful a rethoric question ran over her cheek, then'),

(18,'en','Ini title english','ini-title-english','content english'),

(18,'id','Title bahasa','title-bahasa','content bahasa'),

(73,'en','Otter Tunnel','otter-tunnel','Come and meet our utterly amazing Otters who are not only fun creatures, but also highly intelligent. Take a peek of their daily activities through the glass tunnel. Who knows, you will find them holding hands while sleeping. <br /><br />Location: Otter Exhibition'),

(73,'id','Otter Tunnel','otter-tunnel-2','Temui dan sapa si Berang-Berang, hewan yang lucu, menggemaskan dan juga cerdas. Intip keseharian mereka melalui terowongan kaca. Siapa tahu, kamu dapat melihat mereka tidur sambil berpegangan tangan.<br /><br />Lokasi : Eksibit Berang-berang'),

(77,'en','Touch Pool','touch-pool','Let them feel your love through simple touch of your hand. Introduce yourself to the Brown Banded Bamboo Shark, Blue Starfish, Turbo Snail, and other gentle animals. <br /><br />Location: Touch and Find Zone'),

(77,'id','Touch Pool','touch-pool-2','Tunjukkan kasih sayangmu dengan membelai para hewan ini! Kenali hiu bambu, bintang laut biru, siput dan masih banyak lagi.<br /><br />Lokasi : Touch and Find Zone'),

(78,'en','Hermit Crab Wooden Log','hermit-crab-wooden-log','Find out how hermit crabs spend their time inside tree truck with your magnifying glass. The warm wood chips or sand is a perfect spot for them to play.<br /><br />Location: Nurseries of the Sea'),

(78,'id','Hermit Crab Wooden Log','hermit-crab-wooden-log-2','Temukan apa saja yang dilakukan kelomang untuk menjalani hari-harinya dengan menggunakan kaca pembesar. Serpihan kayu atau pasir yang hangat adalah tempat favorit mereka untuk bermain.<br /><br />Lokasi: Nurseries of The Sea'),

(79,'en','Diving With Shark','diving-with-shark','Only here you can dive in our main tank where the Black Tip Reef Shark nestle. Our certified instructor is ready to accompany you to feel the experience. Only for licensed diver. Based on appointment. Please call us for further information. <br /><br />Location: Main Tank'),

(79,'id','Diving With Shark','diving-with-shark-2','Hanya di sini anda dapat menyelam ke sarang hiu karang. Instruktur bersertifikat kami siap memandu anda. Hanya untuk penyelam yang memiliki lisensi. Berdasarkan perjanjian. Hubungi kami untuk info lebih lanjut.<br /><br />Lokasi: Main Tank'),

(80,'en','Seatrekking','seatrekking','Don&rsquo;t have a diving license? You can still have the underwater adventure with this seatrekking activity. With a safety seatrek helmet, trace the handrail inside the main tank and be ready for the encounter with Black Blotch Stingray. Please call us for further info. <br /><br />Location: Main Tank'),

(80,'id','Seatrekking','seatrekking-2','Tidak memiliki lisensi menyelam? Anda masih bisa merasakan serunya petualangan bawah laut dengan aktivitas seatrek. Dengan helm oksigen, telusuri panduan di akuarium utama dan bersiaplah berpapasan dengan ikan pari hitam. Hubungi kami untuk info lebih lanjut. <br /><br />Lokasi: Main Tank'),

(81,'en','Create Your Own Fish','create-your-own-fish','Let your creativity play and create some cute fish as you wish. Color your favorite fish and scan your drawing. Let the fish swim freely on the screen.<br /><br />Location: Kid\'s Classroom'),

(81,'id','Create Your Own Fish','create-your-own-fish-2','Kembangkan kreativitasmu dan mulai membuat ikan-ikan lucu karyamu. Warnai ikan favoritmu dan scan hasilnya. Biarkan mereka berenang bebas di layar.<br /><br />Lokasi : Kid\'s Classroom'),

(82,'en','Sea Explorer','sea-explorer','Hop on and feel the sensation as if you ride a real submarine with your close ones while exploring the deep ocean.<br /><br />Location: 5D Theater'),

(82,'id','Sea Explorer','sea-explorer-2','Masuk dan rasakan sensasi seakan berada dalam sebuah kapal selam sungguhan sembari menjelajahi lautan.<br /><br />Lokasi : 5D Theater'),

(83,'en','Pearl of The South Sea','pearl-of-the-south-sea','<span data-sheets-value=\"{\" data-sheets-userformat=\"{\">An epic performance that tells a story of a King to his dear princess. This story is adapted from a local tale that take place in a kingdom in southern part of Java. Be ready to be dazzled by this magical performance that combine stage act, illusion trick and underwater dance.</span>'),

(83,'id','Pearl of The South Sea','pearl-of-the-south-sea-2','<span data-sheets-value=\"{\" data-sheets-userformat=\"{\">Sebuah pertunjukan yang mengisahkan cinta kasih seorang raja terhadap putri kesayangannya. Kisah ini diadaptasi dari cerita rakyat yang berlokasi di sebuah kerajaan di bagian selatan Pulau Jawa. Bersiaplah untuk terpesona oleh pertunjukan yang menakjubkan, gabungan aksi panggung, trik ilusi dan tarian di bawah air.</span>'),

(84,'en','Pingoo','pingoo','<span data-sheets-value=\"{\" data-sheets-userformat=\"{\">An American seafood and grill restaurant inspired by penguin habitat in southern hemisphere beach is located on LG Floor, Neo SOHO. Enjoy your meal on the beach deck and get closer to see and feed these penguins in Pingoo!</span>'),

(84,'id','Pingoo Restaurant','pingoo-restaurant','<span data-sheets-value=\"{\" data-sheets-userformat=\"{\">Restoran seafood and grill ala Amerika yang terinspirasi oleh habitat penguin asli di daerah pantai selatan ini terletak di Neo SOHO lantai LG. Nikmati santapan Anda di atas dek pantai dan dapatkan pengalaman melihat langsung dan memberi makan pinguin Humboldt lebih dekat di Pingoo!</span>'),

(85,'en','Ocean Wonders','ocean-wonders','<span data-sheets-value=\"{\" data-sheets-userformat=\"{\">Your visit at Jakarta Aquarium won\'t be complete without notable souvenirs. Get adorable merchandises of Jakarta Aquarium at Ocean Wonders store on LG floor.</span>'),

(85,'id','Ocean Wonders','ocean-wonders-2','<span data-sheets-value=\"{\" data-sheets-userformat=\"{\">Pengalaman Anda di Jakarta Aquarium tidak lengkap tanpa souvenir yang berkesan. Dapatkan berbagai merchandise Jakarta Aquarium yang lucu dan menggemaskan di gerai Ocean Wonders yang berada di lantai LG.<br /></span>'),

(86,'en','About Us','about-us','<p>Jakarta Aquarium is a Conservation Organization and part of Taman Safari Indonesia who continously build conservation of wildlife with 30 years experience. Jakarta Aquarium in collaboration with Aquaria KLCC brings you the world class aquarium for more fun experience and edutainment</p>'),

(86,'id','Tentang Kami','tentang-kami','<p>Jakarta Aquarium adalah bagian dari Taman Safari Indonesia yang terus membangun upaya konservasi satwa dengan pengalaman selama 30 tahun. Berkolaborasi dengan Aquaria KLCC mempersembahkan sebuah wahana yang akan memberikan keceriaan baru dan sarat akan nilai edukasi</p>'),

(87,'en','Special Package','special-package',''),

(87,'id','Paket Spesial','paket-spesial',''),

(88,'en','Career','career','<p>We are looking for a fun and dynamic person to join our team. Discover many interesting job opportunity and grow with us!</p>'),

(88,'id','Karir','karir','<p>Jakarta Aquarium mencari kandidat yang ceria dan dinamis untuk bergabung dengan tim kami. Temukan banyak kesempatan menarik dan berkembanglah bersama kami.<span style=\"text-decoration: underline;\"><br /></span></p>'),

(89,'en','Privacy Policy','privacy-policy',''),

(89,'id','Syarat Ketentuan','syarat-ketentuan',''),

(90,'en','Term of Use','term-of-use',''),

(90,'id','Ketentuan Penggunaan','ketentuan-penggunaan','<p><span class=\"bold\">Situs web ini dimiliki dan dioperasikan oleh PT. Jakarta Akuarium Indonesia dan Ketentuan Penggunaan berlaku untuk pengunjung dan pengguna situs (JAI website). Istilah \"Kami\" mengacu pada JAI (Jakarta Akuarium Indonesia), yang menyediakan situs untuk Anda, dan istilah \"Anda\" mengacu pada pengguna yang menerima Ketentuan Penggunaan. Jika Anda tidak setuju dengan Syarat Penggunaan, jangan menggunakan situs ini.</span></p>\r\n<p>&nbsp;</p>\r\n<h4 class=\"cyan-text text-darken-1\">1. Pembukaan</h4>\r\n<p>Terima kasih atas kunjungan Anda ke website kami, (*). Kami berharap bahwa kunjungan anda dapat bermanfaat dan memberikan kemudahan dalam mengakses dan menggunakan semua layanan yang tersedia pada website kami. Kami terus berupaya untuk memperbaiki dan meningkatkan kualitas layanan kami, dan akan menghargai setiap masukan, saran dan masukan dari Anda; Silakan Anda kirimkan kepada Kami melalui (email) atau telepon di +62 21 (*).</p>\r\n<p>&nbsp;</p>\r\n<h4 class=\"cyan-text text-darken-1\">2. Umum dan Penerimaan Persyaratan</h4>\r\n<p>Dengan mengakses dan menggunakan Situs dan Layanan, Anda menyatakan telah membaca, memahami, setuju dan tunduk pada Syarat dan Ketentuan (website) ini. Jika Anda tidak setuju dengan Syarat dan Ketentuan (website), baik seluruhnya atau sebagian, maka Anda tidak diizinkan untuk mengakses website ini atau menggunakan layanan yang kami berikan.<br /><br />Syarat dan Ketentuan (website) terdiri dari (i) syarat dan ketentuan umum yang berlaku untuk setiap akses dan layanan yang tersedia di situs, dan (ii) syarat dan ketentuan yang mengatur kondisi lebih lanjut dari penggunaan produk atau jasa tertentu.<br /><br />Syarat dan Ketentuan Penggunaan (website) dapat / mungkin kami ubah, modifikasi, menambah, menghapus atau koreksi setiap saat dan setiap perubahan yang berlaku dari waktu kami dinyatakan tidak berlaku atau pada waktu lain yang ditentukan oleh Kami; Kami menyarankan Anda untuk mengunjungi situs kami secara teratur untuk menyadari perubahan ini.</p>'),

(91,'en','Highlight','highlight','<p>Jakarta Aquarium is a place suitable to all ages and genders. Whether to unwind yourself or to have fun with your friends and family. All the animals, shows, and entertainments in Jakarta Aquarium will bring valuable experience for you.</p>'),

(91,'id','Highlight','highlight-2','<p>Jakarta Aquarium cocok untuk segala usia dan aktivitas. Baik untuk bersantai maupun untuk bersenang-senang bersama teman dan keluarga. Semua satwa, pertunjukan, dan hiburan di Jakarta Aquarium akan memberikan pengalaman tak terlupakan untuk Anda.</p>'),

(92,'en','Neo Soho, Destinasi Gaya Hidup Baru di Jakarta','neo-soho-destinasi-gaya-hidup-baru-di-jakarta','<p class=\"p1\"><span class=\"s1\">REPUBLIKA.CO.ID, JAKARTA -- PT Agung Podomoro Land kembali menghadirkan destinasi gaya hidup baru di ibu kota. Pusat perbelanjaan bernama Neo Soho itu berlokasi di kawasan Jalan Letjen S Parman, Jakarta Barat.</span></p>\r\n<p class=\"p1\"><span class=\"s1\">&nbsp;</span></p>\r\n<p class=\"p1\"><span class=\"s1\">\"Neo Soho menghadirkan suasana belanja berkelas yang nyaman untuk kalangan chic, modern family, hang outers, young urban, dan youngsters,\" ungkap Veri Y Setiady selaku CEO Neo Soho pada acara soft opening Neo Soho, Kamis (8/9).</span></p>\r\n<p class=\"p1\"><span class=\"s1\">&nbsp;</span></p>\r\n<p class=\"p1\"><span class=\"s1\">Veri memerinci, gedung setinggi sembilan lantai itu berdiri di atas lahan seluas 2,3 hektare. Salah satu daya tarik Neo Soho ialah terkoneksi dengan Central Park Mall melalui jembatan Eco Sky Walksepanjang 250 meter dan East Tunnel.</span></p>\r\n<p class=\"p1\"><span class=\"s1\">&nbsp;</span></p>\r\n<p class=\"p1\"><span class=\"s1\">Ia menjelaskan, Neo Soho mengusung tag line \'So New So Bold\'. Kalimat itu merepresentasikan identitas Neo Soho sebagai destinasi gaya hidup terbaru dengan konsep kreatif yang diaplikasikan pada seluruh tenant yang dihadirkan.</span></p>\r\n<p class=\"p1\"><span class=\"s1\">&nbsp;</span></p>\r\n<p class=\"p1\"><span class=\"s1\">Ada tujuh kategori tenant yakni So Posh (fashion), So Glam (produk kecantikan), So Essential (aksesoris), So Smart (gawai dan teknologi), So Fit (produk olahraga), So Fun (hiburan keluarga), dan So Yummy(kuliner). Neo Soho juga mempersembahkan Extraordinary Anchor Tenant seperti Central Department Store, Jakarta Aquarium, Open Kitchen All-Day Dining Court, dan Chipmunks.</span></p>\r\n<p class=\"p1\"><span class=\"s1\">&nbsp;</span></p>\r\n<p class=\"p1\"><span class=\"s1\">\"Dengan perpaduan kategori tenant tersebut, para pengunjung dapat membeli berbagai kebutuhan, memanjakan diri, berkumpul bersama teman, serta menikmati hiburan bersama keluarga,\" ujar Veri yang menginformasikan grand opening Neo Soho bakal berlangsung pada Desember 2016.</span></p>\r\n<p class=\"p1\"><span class=\"s1\">&nbsp;</span></p>\r\n<p class=\"p1\"><span class=\"s1\">Terkait akses, Veri menyebut Neo Soho tak sulit dijangkau karena berlokasi di kawasan strategis jalur utama. Adanya akses keluar tol Tanjung Duren juga memudahkan pengunjung dari berbagai lokasi seperti bandara dan kawasan bisnis Sudirman.</span></p>\r\n<p class=\"p2\">&nbsp;</p>'),

(92,'id','Neo Soho, Destinasi Gaya Hidup Baru di Jakarta','neo-soho-destinasi-gaya-hidup-baru-di-jakarta-2','<p class=\"p1\"><span class=\"s1\">REPUBLIKA.CO.ID, JAKARTA -- PT Agung Podomoro Land kembali menghadirkan destinasi gaya hidup baru di ibu kota. Pusat perbelanjaan bernama Neo Soho itu berlokasi di kawasan Jalan Letjen S Parman, Jakarta Barat.</span></p>\r\n<p class=\"p1\"><span class=\"s1\">&nbsp;</span></p>\r\n<p class=\"p1\"><span class=\"s1\">\"Neo Soho menghadirkan suasana belanja berkelas yang nyaman untuk kalangan chic, modern family, hang outers, young urban, dan youngsters,\" ungkap Veri Y Setiady selaku CEO Neo Soho pada acara soft opening Neo Soho, Kamis (8/9).</span></p>\r\n<p class=\"p1\"><span class=\"s1\">&nbsp;</span></p>\r\n<p class=\"p1\"><span class=\"s1\">Veri memerinci, gedung setinggi sembilan lantai itu berdiri di atas lahan seluas 2,3 hektare. Salah satu daya tarik Neo Soho ialah terkoneksi dengan Central Park Mall melalui jembatan Eco Sky Walksepanjang 250 meter dan East Tunnel.</span></p>\r\n<p class=\"p1\"><span class=\"s1\">&nbsp;</span></p>\r\n<p class=\"p1\"><span class=\"s1\">Ia menjelaskan, Neo Soho mengusung tag line \'So New So Bold\'. Kalimat itu merepresentasikan identitas Neo Soho sebagai destinasi gaya hidup terbaru dengan konsep kreatif yang diaplikasikan pada seluruh tenant yang dihadirkan.</span></p>\r\n<p class=\"p1\"><span class=\"s1\">&nbsp;</span></p>\r\n<p class=\"p1\"><span class=\"s1\">Ada tujuh kategori tenant yakni So Posh (fashion), So Glam (produk kecantikan), So Essential (aksesoris), So Smart (gawai dan teknologi), So Fit (produk olahraga), So Fun (hiburan keluarga), dan So Yummy(kuliner). Neo Soho juga mempersembahkan Extraordinary Anchor Tenant seperti Central Department Store, Jakarta Aquarium, Open Kitchen All-Day Dining Court, dan Chipmunks.</span></p>\r\n<p class=\"p1\"><span class=\"s1\">&nbsp;</span></p>\r\n<p class=\"p1\"><span class=\"s1\">\"Dengan perpaduan kategori tenant tersebut, para pengunjung dapat membeli berbagai kebutuhan, memanjakan diri, berkumpul bersama teman, serta menikmati hiburan bersama keluarga,\" ujar Veri yang menginformasikan grand opening Neo Soho bakal berlangsung pada Desember 2016.</span></p>\r\n<p class=\"p1\"><span class=\"s1\">&nbsp;</span></p>\r\n<p class=\"p1\"><span class=\"s1\">Terkait akses, Veri menyebut Neo Soho tak sulit dijangkau karena berlokasi di kawasan strategis jalur utama. Adanya akses keluar tol Tanjung Duren juga memudahkan pengunjung dari berbagai lokasi seperti bandara dan kawasan bisnis Sudirman.</span></p>\r\n<p class=\"p2\">&nbsp;</p>'),

(93,'en','Neo Soho, Mal Pertama di Indonesia yang Dilengkapi Akuarium Raksasa','neo-soho-mal-pertama-di-indonesia-yang-dilengkapi-akuarium-raksasa','<p class=\"p1\"><span class=\"s1\">Jakarta - Satu lagi destinasi belanja dan hiburan yang bisa Anda temukan di kawasan jalan Jend. S. Parman, Jakarta Barat. Adalah Neo Soho, sebuah mal baru setinggi sembilan lantai yang mengusung konsep \'store within a store\', bergaya chic dan urban.&nbsp;</span></p>\r\n<p class=\"p2\">&nbsp;</p>\r\n<p class=\"p1\"><span class=\"s1\">Tak hanya berlokasi di daerah strategis, bangunan seluas 22 ha tersebut juga terkoneksi dengan pusat perbelanjaan Central Park. Dan yang membuat Neo Soho berbeda dari mal kebanyakan adalah kehadiran akuarium.</span></p>\r\n<p class=\"p2\">&nbsp;</p>\r\n<p class=\"p1\"><span class=\"s1\">\"Podomoro City sudah seperti satu kota sendiri, sudah lengkap. Central Park adalah salah satu mal yang traffic-nya paling tinggi. Kita lihat masyarakat Indonesia, khususnya menengah ke atas perkembangannya pesat. Apalagi dengan neo generation yang jadi target market kami di sini. Kami ada ide untuk bikin satu mal lagi yang melengkapi Central Park,\" kata Very Y. Setiady selaku CEO Neo Soho saat peresmian mal, Kamis, (8/9/2016).</span></p>\r\n<p class=\"p2\">&nbsp;</p>\r\n<p class=\"p1\"><span class=\"s1\">Walau sudah dibuka mulai hari ini, toko-toko dalam Neo Soho memang belum semuanya beroperasi. Meski begitu, cukup banyak pengunjung yang datang untuk berbelanja dan makan. Berdasarkan pengamatan Wolipop, mal tersebut terasa cukup nyaman, tampak mewah, dan indah dipandang mata, apalagi dengan banyaknya window display yang berkolaborasi dengan para illustrator ternama.&nbsp;</span></p>\r\n<p class=\"p2\">&nbsp;</p>\r\n<p class=\"p1\"><span class=\"s1\">Sebagai mal yang diklaim terbesar di Indonesia, Neo Soho tentu menawarkan tenant-tenant yang cukup lengkap, mulai dari fashion, beauty, gadget, sport, hingga hiburan keluarga. Tengok saja hadirnya Central Department Store, Adidas Neighborhood, Our Daily Dose, Aldo, Clarks, Everbest, dan sejumlah merek luxury lainnya.</span></p>\r\n<p class=\"p2\">&nbsp;</p>\r\n<p class=\"p1\"><span class=\"s1\">Sedangkan untuk kuliner, Anda bisa menjumpai gerai Kkuldak, Kitchen by Pizza Hut, Marugame Udon, Holy Cow, Born Gan, hingga Pablo Cheese Tart asal Jepang yang pertama kali buka di Indonesia. Selain itu, tersedia pula tempat makan Open Kitchen yang menawarkan konsep berbeda dari food court kebanyakan karena didesain lebih menawan.&nbsp;</span></p>\r\n<p class=\"p2\">&nbsp;</p>\r\n<p class=\"p1\"><span class=\"s1\">\"Diharapkan Open Kitchen bisa jadi destinasi baru. Kami hadirkan desain yang nice dan spesial. Bukan food court tapi lebih kepada all day dining jadi bisa jadi meeting point,\" tambah Very.&nbsp;</span></p>\r\n<p class=\"p2\">&nbsp;</p>\r\n<p class=\"p1\"><span class=\"s1\">Jakarta Aquarium pun akan semakin meramaikan pusat perbelanjaan tersebut. Dihadirkan dalam rangka merayakan hari jadi Taman Safari Indonesia Group yang ke-30, akuarium itu akan jadi yang pertama berada dalam sebuah mal. Anda dan keluarga pun bakal bisa melihat berbagai bioata laut, seperti ikan hiu, ikan pari tutul, gurita raksasa, hingga penguin. Nantinya ada pula pertunjukan teater terinspirasi cerita rakyat Indonesia.</span></p>\r\n<p class=\"p2\">&nbsp;</p>\r\n<p class=\"p1\"><span class=\"s1\">\"Pertamakalinya akan ada penguin cafe, ada pula merchandising. Indonesia punya biota laut yang luar biasa jadi nanti akan diisi berbagai ikan khas indonesia, termasuk juga reptil,\" tuturnya lagi. (ami/eny)</span></p>'),

(93,'id','Neo Soho, Mal Pertama di Indonesia yang Dilengkapi Akuarium Raksasa','neo-soho-mal-pertama-di-indonesia-yang-dilengkapi-akuarium-raksasa-2','<p class=\"p1\"><span class=\"s1\">Jakarta - Satu lagi destinasi belanja dan hiburan yang bisa Anda temukan di kawasan jalan Jend. S. Parman, Jakarta Barat. Adalah Neo Soho, sebuah mal baru setinggi sembilan lantai yang mengusung konsep \'store within a store\', bergaya chic dan urban.&nbsp;</span></p>\r\n<p class=\"p2\">&nbsp;</p>\r\n<p class=\"p1\"><span class=\"s1\">Tak hanya berlokasi di daerah strategis, bangunan seluas 22 ha tersebut juga terkoneksi dengan pusat perbelanjaan Central Park. Dan yang membuat Neo Soho berbeda dari mal kebanyakan adalah kehadiran akuarium.</span></p>\r\n<p class=\"p2\">&nbsp;</p>\r\n<p class=\"p1\"><span class=\"s1\">\"Podomoro City sudah seperti satu kota sendiri, sudah lengkap. Central Park adalah salah satu mal yang traffic-nya paling tinggi. Kita lihat masyarakat Indonesia, khususnya menengah ke atas perkembangannya pesat. Apalagi dengan neo generation yang jadi target market kami di sini. Kami ada ide untuk bikin satu mal lagi yang melengkapi Central Park,\" kata Very Y. Setiady selaku CEO Neo Soho saat peresmian mal, Kamis, (8/9/2016).</span></p>\r\n<p class=\"p2\">&nbsp;</p>\r\n<p class=\"p1\"><span class=\"s1\">Walau sudah dibuka mulai hari ini, toko-toko dalam Neo Soho memang belum semuanya beroperasi. Meski begitu, cukup banyak pengunjung yang datang untuk berbelanja dan makan. Berdasarkan pengamatan Wolipop, mal tersebut terasa cukup nyaman, tampak mewah, dan indah dipandang mata, apalagi dengan banyaknya window display yang berkolaborasi dengan para illustrator ternama.&nbsp;</span></p>\r\n<p class=\"p2\">&nbsp;</p>\r\n<p class=\"p1\"><span class=\"s1\">Sebagai mal yang diklaim terbesar di Indonesia, Neo Soho tentu menawarkan tenant-tenant yang cukup lengkap, mulai dari fashion, beauty, gadget, sport, hingga hiburan keluarga. Tengok saja hadirnya Central Department Store, Adidas Neighborhood, Our Daily Dose, Aldo, Clarks, Everbest, dan sejumlah merek luxury lainnya.</span></p>\r\n<p class=\"p2\">&nbsp;</p>\r\n<p class=\"p1\"><span class=\"s1\">Sedangkan untuk kuliner, Anda bisa menjumpai gerai Kkuldak, Kitchen by Pizza Hut, Marugame Udon, Holy Cow, Born Gan, hingga Pablo Cheese Tart asal Jepang yang pertama kali buka di Indonesia. Selain itu, tersedia pula tempat makan Open Kitchen yang menawarkan konsep berbeda dari food court kebanyakan karena didesain lebih menawan.&nbsp;</span></p>\r\n<p class=\"p2\">&nbsp;</p>\r\n<p class=\"p1\"><span class=\"s1\">\"Diharapkan Open Kitchen bisa jadi destinasi baru. Kami hadirkan desain yang nice dan spesial. Bukan food court tapi lebih kepada all day dining jadi bisa jadi meeting point,\" tambah Very.&nbsp;</span></p>\r\n<p class=\"p2\">&nbsp;</p>\r\n<p class=\"p1\"><span class=\"s1\">Jakarta Aquarium pun akan semakin meramaikan pusat perbelanjaan tersebut. Dihadirkan dalam rangka merayakan hari jadi Taman Safari Indonesia Group yang ke-30, akuarium itu akan jadi yang pertama berada dalam sebuah mal. Anda dan keluarga pun bakal bisa melihat berbagai bioata laut, seperti ikan hiu, ikan pari tutul, gurita raksasa, hingga penguin. Nantinya ada pula pertunjukan teater terinspirasi cerita rakyat Indonesia.</span></p>\r\n<p class=\"p2\">&nbsp;</p>\r\n<p class=\"p1\"><span class=\"s1\">\"Pertamakalinya akan ada penguin cafe, ada pula merchandising. Indonesia punya biota laut yang luar biasa jadi nanti akan diisi berbagai ikan khas indonesia, termasuk juga reptil,\" tuturnya lagi. (ami/eny)</span></p>'),

(94,'en','Selfie-selfie Cantik di Neo Soho Mall, Jakarta Barat','selfie-selfie-cantik-di-neo-soho-mall-jakarta-barat','<p class=\"p1\"><span class=\"s1\">Baru-baru ini, dibangun mal baru di kawasan Jakarta Barat yang diberi nama Neo Soho Mall. Meskipun grand launching Neo Soho Mall masih di bulan Desember 2016, tapi kamu sudah bisa berkunjung ke sana, kok. Yuk, kenalan dulu dengan mal hits yang satu ini dan jangan lupa selfie-selfie cantik, jika jalan-jalan ke sana.</span></p>\r\n<p class=\"p2\">&nbsp;</p>\r\n<p class=\"p1\"><span class=\"s1\">Neo Soho Mall dan Central Park sama-sama berada di satu komplek Podomoro City. Central Park adalah salah satu mal terbesar di Jakarta, sedangkan Neo Soho Mall ukurannya lebih kecil. Keduanya digabungkan oleh infrastruktur unik. Neo Soho Mall yang memiliki sembilan lantai ini terhubung dengan Central Park melalui East Tunnel dan jembatan Eco Skywalk yang megah. Dengan adanya penghubung tersebut, diharapkan agar pengunjung yang datang ke Central Park juga mampir ke Neo Soho Mall.</span></p>\r\n<p class=\"p2\">&nbsp;</p>\r\n<p class=\"p1\"><span class=\"s1\">Karena jembatan penghubung tersebut terlihat instagramable dan seperti jembatan megah di Singapura, nggak heran jika banyak pengunjung yang selfie-selfie cantik di sana. Jadi, jika kamu main ke Neo Soho Mall, jangan lupa untuk foto-foto di sana, ya!</span></p>\r\n<p class=\"p2\">&nbsp;</p>\r\n<p class=\"p1\"><span class=\"s1\">Neo Soho Mall bakal menjadi pusat perbelanjaan pertama di Indonesia yang memiliki akuarium laut seluas 7 ribu meter persegi di dalam ruangan. Jakarta Aquarium akan menampilkan berbagai hewan laut, seperti pari tutul, ikan hiu, penguin, gurita raksasa Pasifik, hiu karang blacktip, dan lain-lain. Jakarta Aquarium juga sengaja dihadirkan di Neo Soho Mall dalam rangka merayakan ulang tahun ke-30 PT Taman Safari Indonesia Group.</span></p>\r\n<p class=\"p1\"><span class=\"s1\">Di Jakarta Aquarium bakal ada resto bertema penguin, di mana pengunjung bisa makan siang bersama Penguin Humboldt. Buat yang suka menyelam, kamu juga bisa mencoba seatrekking dan menyelam di sebuah tangki raksasa, tentunya dengan bantuan orang yang sudah ahli. Untuk menghibur si kecil, jangan lupa saksikan pertunjukan teater di Jakarta Aquarium yang terinspirasi dari cerita rakyat Indonesia. Semua hiburan menarik tersebut, baru bisa kamu nikmati di bulan Desember 2016.</span></p>\r\n<p class=\"p2\">&nbsp;</p>\r\n<p class=\"p1\"><span class=\"s1\">Buat kamu yang pengin borong barang belanjaan di Neo Soho Mall, kamu bisa mampir ke beberapa brand fashion yang sudah tersedia di sana, seperti Central Department Store, Our Daily Dose, Adidas Neighborhood, District, dan lain-lain. Setelah capek keliling Neo Soho Mall, kamu bisa cari makan. Sudah cukup banyak resto di Neo Soho Mall, seperti Gyu-Kaku Japanese BBQ, Sanukiseimen Mugimaru, Shaburi Shabu Shabu, Imperial Lamien, &nbsp;Steak Hotel by Holycow, dan lain-lain.</span></p>\r\n<p class=\"p2\">&nbsp;</p>\r\n<p class=\"p1\"><span class=\"s1\">Buat kamu yang berada di luar Jakarta dan pengin ke Jakarta dalam waktu dekat untuk liburan atau keperluan bisnis, sekalian aja mampir ke Neo Soho Mall! Jangan lupa buat pesan tiket pesawat&nbsp;</span></p>'),

(94,'id','Selfie-selfie Cantik di Neo Soho Mall, Jakarta Barat','selfie-selfie-cantik-di-neo-soho-mall-jakarta-barat-2','<p class=\"p1\"><span class=\"s1\">Baru-baru ini, dibangun mal baru di kawasan Jakarta Barat yang diberi nama Neo Soho Mall. Meskipun grand launching Neo Soho Mall masih di bulan Desember 2016, tapi kamu sudah bisa berkunjung ke sana, kok. Yuk, kenalan dulu dengan mal hits yang satu ini dan jangan lupa selfie-selfie cantik, jika jalan-jalan ke sana.</span></p>\r\n<p class=\"p2\">&nbsp;</p>\r\n<p class=\"p1\"><span class=\"s1\">Neo Soho Mall dan Central Park sama-sama berada di satu komplek Podomoro City. Central Park adalah salah satu mal terbesar di Jakarta, sedangkan Neo Soho Mall ukurannya lebih kecil. Keduanya digabungkan oleh infrastruktur unik. Neo Soho Mall yang memiliki sembilan lantai ini terhubung dengan Central Park melalui East Tunnel dan jembatan Eco Skywalk yang megah. Dengan adanya penghubung tersebut, diharapkan agar pengunjung yang datang ke Central Park juga mampir ke Neo Soho Mall.</span></p>\r\n<p class=\"p2\">&nbsp;</p>\r\n<p class=\"p1\"><span class=\"s1\">Karena jembatan penghubung tersebut terlihat instagramable dan seperti jembatan megah di Singapura, nggak heran jika banyak pengunjung yang selfie-selfie cantik di sana. Jadi, jika kamu main ke Neo Soho Mall, jangan lupa untuk foto-foto di sana, ya!</span></p>\r\n<p class=\"p2\">&nbsp;</p>\r\n<p class=\"p1\"><span class=\"s1\">Neo Soho Mall bakal menjadi pusat perbelanjaan pertama di Indonesia yang memiliki akuarium laut seluas 7 ribu meter persegi di dalam ruangan. Jakarta Aquarium akan menampilkan berbagai hewan laut, seperti pari tutul, ikan hiu, penguin, gurita raksasa Pasifik, hiu karang blacktip, dan lain-lain. Jakarta Aquarium juga sengaja dihadirkan di Neo Soho Mall dalam rangka merayakan ulang tahun ke-30 PT Taman Safari Indonesia Group.</span></p>\r\n<p class=\"p1\"><span class=\"s1\">Di Jakarta Aquarium bakal ada resto bertema penguin, di mana pengunjung bisa makan siang bersama Penguin Humboldt. Buat yang suka menyelam, kamu juga bisa mencoba seatrekking dan menyelam di sebuah tangki raksasa, tentunya dengan bantuan orang yang sudah ahli. Untuk menghibur si kecil, jangan lupa saksikan pertunjukan teater di Jakarta Aquarium yang terinspirasi dari cerita rakyat Indonesia. Semua hiburan menarik tersebut, baru bisa kamu nikmati di bulan Desember 2016.</span></p>\r\n<p class=\"p2\">&nbsp;</p>\r\n<p class=\"p1\"><span class=\"s1\">Buat kamu yang pengin borong barang belanjaan di Neo Soho Mall, kamu bisa mampir ke beberapa brand fashion yang sudah tersedia di sana, seperti Central Department Store, Our Daily Dose, Adidas Neighborhood, District, dan lain-lain. Setelah capek keliling Neo Soho Mall, kamu bisa cari makan. Sudah cukup banyak resto di Neo Soho Mall, seperti Gyu-Kaku Japanese BBQ, Sanukiseimen Mugimaru, Shaburi Shabu Shabu, Imperial Lamien, &nbsp;Steak Hotel by Holycow, dan lain-lain.</span></p>\r\n<p class=\"p2\">&nbsp;</p>\r\n<p class=\"p1\"><span class=\"s1\">Buat kamu yang berada di luar Jakarta dan pengin ke Jakarta dalam waktu dekat untuk liburan atau keperluan bisnis, sekalian aja mampir ke Neo Soho Mall! Jangan lupa buat pesan tiket pesawat&nbsp;</span></p>'),

(95,'en','Neo Soho dan Aquarium Indoor Pertama di Pusat Perbelanjaan','neo-soho-dan-aquarium-indoor-pertama-di-pusat-perbelanjaan','<p class=\"p1\"><span class=\"s1\">JAKARTA, SATUHARAPAN.COM &ndash; Merayakan ulang tahun ke-30, Taman Safari Indonesia Group, menghadirkan Jakarta Aquarium yang terletak di area terbaru milik Agung Podomoro Land, Neo Soho, Jakarta Barat, yang akan dibuka untuk umum pada bulan Desember 2016.</span></p>\r\n<p class=\"p2\">&nbsp;</p>\r\n<p class=\"p1\"><span class=\"s1\">&ldquo;Butik akuarium ini merupakan hasil kolaborasi mengesankan dari seniman dan perancang kelas dunia yang akan menyajikan sebuah petualangan luar biasa yang menonjolkan keanekaragaman hayati Indonesia,&rdquo; kata Jr Marketing Communication, Elivia Mirzarani, hari Kamis (8/9) sore, dalam grand launching Neo Soho, di Jakarta Barat.</span></p>\r\n<p class=\"p2\">&nbsp;</p>\r\n<p class=\"p1\"><span class=\"s1\">Melepas kepenatan gaya hidup urban, Jakarta Aquarium memberikan rekreasi keluarga yang terpadu antara pendidikan dan hiburan. Pengunjung nantinya bisa menelusuri alam Indonesia melalui koleksi ikan pari tutul, gurita raksasa Pasifik, hiu karang blacktip, dan kepiting kelapa.</span></p>\r\n<p class=\"p1\"><span class=\"s1\">Selain itu, di restaurant bertema penguin, pengunjung dapat bertemu langsung dengan penguin Humboldt yang menggemaskan.</span></p>\r\n<p class=\"p2\">&nbsp;</p>\r\n<p class=\"p1\"><span class=\"s1\">&ldquo;Jakarta Aquarium mengajak anda bersenang-senang oleh pengalaman menyelam di tangki raksasa dan seatrekking dengan panduan professional, sementara anak-anak bisa menikmati aktivitas multimedia interaktif di zona anak,&rdquo; ujar dia.</span></p>\r\n<p class=\"p2\">&nbsp;</p>\r\n<p class=\"p1\"><span class=\"s1\">Jakarta Aquarium menyajikan pertunjukan teater bawah laut yang unik dengan insprirasi dari cerita rakyat Indonesia dan diarahkan oleh Peter Wilson.</span></p>\r\n<p class=\"p2\">&nbsp;</p>\r\n<p class=\"p1\"><span class=\"s1\">&ldquo;Pertunjukan teater ini adalah salah satu kegiatan wajib yang wajib anda saksikan saat berkunjung ke Neo Soho,&rdquo; kata Elivia.</span></p>\r\n<p class=\"p2\">&nbsp;</p>\r\n<p class=\"p1\"><span class=\"s1\">Kunjungi dan bersiaplah untuk terpesona oleh Jakarta Aquarium yang akan segera hadir di lantai LG dan LGM di Neo Soho Jakarta.</span></p>'),

(95,'id','Neo Soho dan Aquarium Indoor Pertama di Pusat Perbelanjaan','neo-soho-dan-aquarium-indoor-pertama-di-pusat-perbelanjaan-2','<p class=\"p1\"><span class=\"s1\">JAKARTA, SATUHARAPAN.COM &ndash; Merayakan ulang tahun ke-30, Taman Safari Indonesia Group, menghadirkan Jakarta Aquarium yang terletak di area terbaru milik Agung Podomoro Land, Neo Soho, Jakarta Barat, yang akan dibuka untuk umum pada bulan Desember 2016.</span></p>\r\n<p class=\"p2\">&nbsp;</p>\r\n<p class=\"p1\"><span class=\"s1\">&ldquo;Butik akuarium ini merupakan hasil kolaborasi mengesankan dari seniman dan perancang kelas dunia yang akan menyajikan sebuah petualangan luar biasa yang menonjolkan keanekaragaman hayati Indonesia,&rdquo; kata Jr Marketing Communication, Elivia Mirzarani, hari Kamis (8/9) sore, dalam grand launching Neo Soho, di Jakarta Barat.</span></p>\r\n<p class=\"p2\">&nbsp;</p>\r\n<p class=\"p1\"><span class=\"s1\">Melepas kepenatan gaya hidup urban, Jakarta Aquarium memberikan rekreasi keluarga yang terpadu antara pendidikan dan hiburan. Pengunjung nantinya bisa menelusuri alam Indonesia melalui koleksi ikan pari tutul, gurita raksasa Pasifik, hiu karang blacktip, dan kepiting kelapa.</span></p>\r\n<p class=\"p1\"><span class=\"s1\">Selain itu, di restaurant bertema penguin, pengunjung dapat bertemu langsung dengan penguin Humboldt yang menggemaskan.</span></p>\r\n<p class=\"p2\">&nbsp;</p>\r\n<p class=\"p1\"><span class=\"s1\">&ldquo;Jakarta Aquarium mengajak anda bersenang-senang oleh pengalaman menyelam di tangki raksasa dan seatrekking dengan panduan professional, sementara anak-anak bisa menikmati aktivitas multimedia interaktif di zona anak,&rdquo; ujar dia.</span></p>\r\n<p class=\"p2\">&nbsp;</p>\r\n<p class=\"p1\"><span class=\"s1\">Jakarta Aquarium menyajikan pertunjukan teater bawah laut yang unik dengan insprirasi dari cerita rakyat Indonesia dan diarahkan oleh Peter Wilson.</span></p>\r\n<p class=\"p2\">&nbsp;</p>\r\n<p class=\"p1\"><span class=\"s1\">&ldquo;Pertunjukan teater ini adalah salah satu kegiatan wajib yang wajib anda saksikan saat berkunjung ke Neo Soho,&rdquo; kata Elivia.</span></p>\r\n<p class=\"p2\">&nbsp;</p>\r\n<p class=\"p1\"><span class=\"s1\">Kunjungi dan bersiaplah untuk terpesona oleh Jakarta Aquarium yang akan segera hadir di lantai LG dan LGM di Neo Soho Jakarta.</span></p>'),

(96,'en','Ticket & Hours','ticket-hours','<p>Get ready to be amused by sharks, turtles, jellyfishes, octopuses, seahorses, otters, and many more. Purchase your ticket online to get access to all Jakarta Aquarium parks and services. The ticket is valid only for the date stated on the ticket.</p>'),

(96,'id','Ticket & Hours','ticket-hours-2','<p>Bersiaplah untuk dihibur oleh ikan hiu, kura-kura, ubur-ubur, gurita, kuda laut, berang-berang, dan satwa lainnya. Dapatkan tiket secara online untuk mendapatkan akses ke semua atraksi dan layanan kami. Tiket hanya berlaku untuk tanggal yang tertera pada tiket</p>'),

(97,'en','Location','location','<p>Jakarta Aquarium is located in Neo SOHO, a shopping center in West Jakarta area which surrounded by parks, apartments, hotels, shopping centers, restaurants, and nightlife. Allow you to explore other recreational spot of the city either before or after your visit to Jakarta Aquarium.</p>'),

(97,'id','Location','location-2','<p>Jakarta Aquarium terletak di Neo SOHO, sebuah pusat perbelanjaan di daerah Jakarta Barat yang dikelilingi oleh taman, apartemen, hotel, mal, restoran, dan dunia malam. Memungkinkan Anda untuk menjelajahi tempat rekreasi lain baik sebelum ataupun setelah kunjungan Anda ke Jakarta Aquarium.</p>'),

(98,'en','Schedule','schedule','<p>There\'s always something new and exciting happening at the Jakarta Aquarium. With an ever-evolving lineup of shows, Jakarta Aquarium always has something interesting to see. Join us for a show led by our educational and entertaining interpreters to learn more about the animals that live at the Jakarta Aquarium.</p>'),

(98,'id','Schedule','schedule-2','<p>There\'s always something new and exciting happening at the Jakarta Aquarium. With an ever-evolving lineup of shows, Jakarta Aquarium always has something interesting to see. Join us for a show led by our educational and entertaining interpreters to learn more about the animals that live at the Jakarta Aquarium.</p>'),

(102,'en','Welcome to Jakarta Aquarium','welcome-to-jakarta-aquarium','<p class=\"p1\"><span class=\"s1\">Celebrating the 30th anniversary&nbsp;</span><span class=\"s1\">Taman Safari Indonesia Group proudly present Jakarta Aquarium, a next&nbsp;</span><span class=\"s1\">generation family recreational and edutainment center from Indonesia&rsquo;s leading&nbsp;</span><span class=\"s1\">conservation institute and family recreation. Jakarta Aquarium located in the&nbsp;</span><span class=\"s1\">newest Agung Podomoro Land leisure district, Neo Soho, in West Jakarta will be&nbsp;</span><span class=\"s1\">open for public on December 2016. The ultimate boutique aquarium is a result of&nbsp;</span><span class=\"s1\">extensive collaboration of world class artists and designers, delivering an&nbsp;</span><span class=\"s1\">extraordinary journey to Indonesia&rsquo;s mega biodiversity.</span></p>\r\n<p class=\"p1\"><span class=\"s1\">Providing escapism from the urban lifestyle, Jakarta Aquarium will provide an integrated&nbsp;</span><span class=\"s1\">family leisure of education and entertainment. Explore the beauty of Indonesian&nbsp;</span><span class=\"s1\">nature through the exotic leopard whipray, giant pacific octopus, blacktip reef&nbsp;</span><span class=\"s1\">shark, and coconut crab. Not to mention the cute living exhibition of Humboldt&nbsp;</span><span class=\"s1\">penguin in the penguin themed restaurant. Have fun by experiencing dive in the g</span><span class=\"s1\">iant tank and seatrekking with professional guide while kids could enjoy the&nbsp;</span><span class=\"s1\">interactive multimedia activity in the kids&rsquo; zone.</span></p>\r\n<p class=\"p1\"><span class=\"s1\">Jakarta Aquarium uniquely presents a theatrical underwater performance inspired by&nbsp;</span><span class=\"s1\">Indonesian folklore directed by Peter Wilson. The underwater show is a must-see&nbsp;</span><span class=\"s1\">for all ages.&nbsp;</span></p>\r\n<p class=\"p1\"><span class=\"s1\">Visit and be mesmerize by Jakarta Aquarium coming soon at LG and LGM floor in Neo&nbsp;</span><span class=\"s1\">Soho Jakarta.</span></p>'),

(102,'id','Selamat Datang di Jakarta Aquarium','selamat-datang-di-jakarta-aquarium','<p class=\"p1\"><span class=\"s1\">Merayakan ulang tahun ke&nbsp;</span><span class=\"s1\">30, Taman Safari Indonesia Group dengan bangga menghadirkan Jakarta Aquarium, proyek terkemuka dari sebuah lembaga konservasi dan rekreasi keluarga di Indonesia.&nbsp;</span><span class=\"s1\">Jakarta Aquarium terletak di area terbaru milik Agung Podomoro Land, Neo Soho,</span><span class=\"s1\">di Jakarta Barat yang akan dibuka untuk umum pada Desember 2016. Butik akuarium</span><span class=\"s1\">ini merupakan hasil kolaborasi mengesankan dari seniman dan perancang kelas&nbsp;</span><span class=\"s1\">dunia yang akan menyajikan sebuah petualangan luar biasa yang menonjolkan&nbsp;</span><span class=\"s1\">keanekaragaman hayati Indonesia.&nbsp;</span></p>\r\n<p class=\"p1\"><span class=\"s1\">Melepas kepenatan dari gaya hidup urban, Jakarta Aquarium memberikan rekreasi keluarga yang terpadu antara pendidikan dan hiburan. Telusuri keindahan alam Indonesia melalui koleksi ikan pari tutul, gurita raksasa Pasifik, hiu karang blacktip, dan kepiting&nbsp;</span><span class=\"s1\">kelapa. Selain itu di restauran bertema penguin anda juga dapat bertemu langsung dengan penguin Humboldt nan lucu. Jakarta Aquarium mengajak anda&nbsp;</span><span class=\"s1\">bersenang-senang oleh pengalaman menyelam di tangki raksasa dan seatrekking dengan&nbsp;</span><span class=\"s1\">panduan profesional sementara anak-anak bisa menikmati aktivitas multimedia&nbsp;</span><span class=\"s1\">interaktif di zona anak. &nbsp;</span></p>\r\n<p class=\"p1\"><span class=\"s1\">Jakarta Aquarium menyajikan pertunjukan teater bawah laut yang unik terinspirasi oleh cerita rakyat Indonesia dan diarahkan oleh Peter Wilson. Pertunjukan teater ini adalah salah satu kegiatan yang wajib anda saksikan saat berkunjung.</span></p>\r\n<p class=\"p1\"><span class=\"s1\">Kunjungi dan bersiaplah untuk terpesona oleh Jakarta Aquarium yang akan segera hadir di lantai LG dan LGM di Neo Soho Jakarta.</span></p>\r\n<p class=\"p1\"><span class=\"s1\">&nbsp;</span></p>'),

(103,'en','Test Promo 1','test-promo-1','Promo pertama di JAI'),

(103,'id','Promo','test-promo','sdfasdfasdf\r\n'),

(104,'en','Aquarium Map','aquarium-map','Jakarta Aquarium consists of two floors and twelve zones that show a variety of unique, lovable, and beautiful animals in its habitat. Explore every corner of Jakarta Aquarium to find new fun experience with your friends and family.'),

(104,'id','Aquarium Map','aquarium-map-2','Jakarta Aquarium terdiri dari dua lantai dan dua belas zona yang menampilkan beraneka ragam satwa unik, lucu, dan indah dalam habitatnya. Jelajahi setiap sudut Jakarta Aquarium untuk menemukan pengalaman seru baru bersama teman dan keluarga Anda.');

/*Table structure for table `post_has_categories` */

DROP TABLE IF EXISTS `post_has_categories`;

CREATE TABLE `post_has_categories` (
  `post_id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`post_id`,`category_id`),
  KEY `post_has_categories_category_id_foreign` (`category_id`),
  CONSTRAINT `post_has_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `post_has_categories_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `post_has_categories` */

insert  into `post_has_categories`(`post_id`,`category_id`) values 

(17,2),

(18,2),

(73,17),

(77,17),

(78,17),

(79,17),

(80,17),

(81,17),

(82,18),

(83,18),

(84,19),

(85,19);

/*Table structure for table `post_has_medias` */

DROP TABLE IF EXISTS `post_has_medias`;

CREATE TABLE `post_has_medias` (
  `post_id` int(10) unsigned NOT NULL,
  `media_id` int(10) unsigned NOT NULL,
  `media_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'featured',
  PRIMARY KEY (`post_id`,`media_id`),
  KEY `post_has_medias_media_id_foreign` (`media_id`),
  CONSTRAINT `post_has_medias_media_id_foreign` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`) ON DELETE CASCADE,
  CONSTRAINT `post_has_medias_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `post_has_medias` */

insert  into `post_has_medias`(`post_id`,`media_id`,`media_type`) values 

(73,106,'featured'),

(77,108,'featured'),

(78,105,'featured'),

(79,104,'featured'),

(80,107,'featured'),

(81,103,'featured'),

(82,110,'featured'),

(83,109,'featured'),

(84,112,'featured'),

(85,111,'featured'),

(98,113,'featured'),

(102,102,'featured');

/*Table structure for table `post_metas` */

DROP TABLE IF EXISTS `post_metas`;

CREATE TABLE `post_metas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(10) unsigned NOT NULL,
  `meta_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_value` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `post_metas_post_id_foreign` (`post_id`),
  CONSTRAINT `post_metas_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=625 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `post_metas` */

insert  into `post_metas`(`id`,`post_id`,`meta_key`,`meta_value`) values 

(72,90,'meta_description-en','Term & Condition of Jakarta Aquarium Indonesia'),

(73,90,'meta_description-id','Syarat dan Ketentuan Jakarta Aquarium Indonesia'),

(214,96,'openingHours-en','<p>Spend the whole day in Jakarta Aquarium with your family. Check our opening hours and do not miss a single attraction.</p>\r\n<ul class=\"uk-list\">\r\n<li>Weekday (Monday - Thursday) : 10.00 a.m. - 08.00 p.m.</li>\r\n<li>Weekend (Friday - Sunday) : 10.00 a.m. - 08.00 p.m.</li>\r\n</ul>\r\n<p>Ticket counter will be closed at 19.30</p>'),

(215,96,'openingHours-id','<p>Habiskan waktu seharian di Jakarta Aquarium bersama keluarga Anda. Cek waktu operasional kami dan jangan lewatkan satu atraksi pun.</p>\r\n<ul class=\"uk-list\">\r\n<li>Hari Kerja (Senin - Kamis) : 10.00 - 20.00.</li>\r\n<li>Hari Libur (Jum\'at - Minggu) : 10.00 - 20.00</li>\r\n</ul>\r\n<p>Loket tiket akan tutup pada pukul 19.30</p>'),

(285,91,'firstBox-en','<h2 class=\"font-intro amber-text text-darken-1 uk-margin-remove\">Sea Explorer</h2>\r\n<p class=\"uk-margin-remove\">Feel the sensation of riding a real submarine through this 5-D theater while exploring the deep ocean.</p>'),

(286,91,'firstBox-id','<h2 class=\"uk-margin-remove font-intro amber-text text-darken-1\">Sea Explorer</h2>\r\n<p class=\"uk-margin-remove\">Rasakan sensasi seakan berada dalam sebuah kapal selam sungguhan sembari menjelajahi lautan dalam dengan teater 5-D.</p>'),

(287,91,'secondBox-en','<h2 class=\"uk-margin-remove font-intro amber-text text-darken-1\">Pearl of the South Sea</h2>\r\n<p class=\"uk-margin-remove\">Be ready to be dazzled by this magical performance that combine stage act, illusion trick and underwater dance.</p>'),

(288,91,'secondBox-id','<h2 class=\"uk-margin-remove font-intro amber-text text-darken-1\">Pearl of the South Sea</h2>\r\n<p class=\"uk-margin-remove\">Bersiaplah untuk terpesona oleh pertunjukan yang menakjubkan, gabungan aksi panggung, trik ilusi dan tarian di bawah air.</p>'),

(289,91,'thirdBox-en','<p class=\"uk-margin-remove\">Located in the large</p>\r\n<h2 class=\"uk-margin-remove font-intro amber-text text-darken-1\">LEISURE DISTRICTS</h2>\r\n<p class=\"uk-margin-remove\">include 3 malls, hotels, and parks</p>'),

(290,91,'thirdBox-id','<p class=\"uk-margin-remove\">Located in the large</p>\r\n<h2 class=\"uk-margin-remove font-intro amber-text text-darken-1\">LEISURE DISTRICTS</h2>\r\n<p class=\"uk-margin-remove\">include 3 malls, hotels, and parks</p>'),

(291,91,'fourthBox-en','<p class=\"uk-margin-remove\">Contains more than</p>\r\n<h2 class=\"uk-margin-remove font-intro amber-text text-darken-1\">14,820&nbsp;ANIMALS</h2>\r\n<p class=\"uk-margin-remove\">in seawater, freshwater and land</p>'),

(292,91,'fourthBox-id','<p class=\"uk-margin-remove\">Contains more than</p>\r\n<h2 class=\"uk-margin-remove font-intro amber-text text-darken-1\">14,820&nbsp;ANIMALS</h2>\r\n<p class=\"uk-margin-remove\">in seawater, freshwater and land</p>'),

(447,86,'meta_description-en','All about JAI'),

(448,86,'meta_description-id','Semua tentang JAI'),

(449,86,'philosophy-en',''),

(450,86,'philosophy-id',''),

(451,86,'story-en','<p>Located in NEO Soho, a shopping center in West Jakarta, make Jakarta Aquarium accessible from all corners of the city.</p>\r\n<p>The combination of Indonesian biodiversity, the beauty of Indonesian heritage, and technology will become the main attraction for you and your family to escape from the midst of the capital\'s busy lifestyle.</p>'),

(452,86,'story-id','<p>Terletak di Neo SOHO, salah satu pusat perbelanjaan di daerah Jakarta Barat, membuat Jakarta Aquarium sangat mudah diakses dari segala penjuru kota.</p>\r\n<p>Perpaduan keanekaragaman hayati Indonesia, keindahan budaya, dan teknologi merupakan daya tarik utama Jakarta Aquarium di tengah kesibukan ibu kota bagi Anda dan keluarga.</p>'),

(589,97,'afterMap-en',''),

(590,97,'afterMap-id',''),

(591,97,'lockerTitle-en','Locker'),

(592,97,'lockerTitle-id','Loker'),

(593,97,'lockerDesc-en','Locker facility for visitor convenient in lobby area. Visitor can use the locker with deposit.'),

(594,97,'lockerDesc-id','Fasilitas loker yang berada di area lobi, anda dapat menggunakan loker dengan sejumlah deposit.'),

(595,97,'restroomTitle-en','Restroom and Shower Room'),

(596,97,'restroomTitle-id','Toilet dan Kamar Mandi'),

(597,97,'restroomDesc-en','Restroom and shower room is located on LG level in Rivers of Indonesia zone.'),

(598,97,'restroomDesc-id','Toilet dan kamar mandi berada di lantai LG, zona Rivers of Indonesia.'),

(599,97,'wheelchairTitle-en','Wheelchair access'),

(600,97,'wheelchairTitle-id','Akses Masuk untuk Kursi Roda'),

(601,97,'wheelchairDesc-en','One dedicated access for visitor with wheelchair is available.'),

(602,97,'wheelchairDesc-id','Akses masuk khusus disiapkan untuk kenyamanan pengunjung yang menggunakan kursi roda.'),

(603,97,'babyTitle-en','Baby Changing Room'),

(604,97,'babyTitle-id','Ruang Ganti Bayi'),

(605,97,'babyDesc-en','Jakarta Aquarium provides nursery room that is available on LG level, in Rivers of Indonesia zone'),

(606,97,'babyDesc-id','Fasilitas ruang ganti bayi yang terletak di lantai LG, di zona Rivers of Indonesia.'),

(607,97,'wifiTitle-en','Wifi'),

(608,97,'wifiTitle-id','WiFi'),

(609,97,'wifiDesc-en','Access our wifi to maximize your visit. '),

(610,97,'wifiDesc-id','Gunakan akses Wifi publik Jakarta Aquarium untuk memaksimalkan kunjungan anda.'),

(611,97,'cafeTitle-en','Cafetaria'),

(612,97,'cafeTitle-id','Cafetaria'),

(613,97,'cafeDesc-en','Cafetaria is located on LG floor in Rivers of Indonesia zone.'),

(614,97,'cafeDesc-id','Beragam makanan ringan dan minuman tersedia untuk menemani anda.'),

(615,97,'souvenirTitle-en','Souvenir'),

(616,97,'souvenirTitle-id','Souvenir'),

(617,97,'souvenirDesc-en','Get Jakarta Aquarium\'s souvenirs and other cool stuff from Ocean Wonders. Located on LG floor.'),

(618,97,'souvenirDesc-id','Dapatkan souvenir yang keren dan unik di gerai Ocean Wonders di lantai LG.'),

(619,97,'restaurantTitle-en','Pingoo'),

(620,97,'restaurantTitle-id','Pingoo'),

(621,97,'restaurantDesc-en','Pingoo, an American seafood and grill restaurant. Located on LG floor, next to Ocean Wonders.'),

(622,97,'restaurantDesc-id','Restoran dengan konsep American seafood and grill yang terletak di lantai LG.'),

(623,102,'whats_on','1'),

(624,102,'featured','1');

/*Table structure for table `post_types` */

DROP TABLE IF EXISTS `post_types`;

CREATE TABLE `post_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `post_types` */

insert  into `post_types`(`id`,`name`,`slug`,`created_at`,`updated_at`) values 

(1,'Post','post','2016-10-13 03:32:05','2016-10-13 03:32:05'),

(2,'News','news','2016-10-26 03:44:06','2016-10-26 03:44:06'),

(3,'Attraction and Experience','attraction-and-experience','2016-10-13 05:13:53','2016-10-13 05:13:53'),

(4,'Media Room','media-room','2016-11-04 23:22:54','2016-11-04 23:22:57'),

(5,'Career','career','2016-11-13 22:53:44','2016-11-13 22:53:44'),

(6,'Page','page','2016-11-21 09:00:00','2016-11-21 09:00:00'),

(7,'Promo','promo','2016-01-11 07:41:00','2016-01-11 07:41:00');

/*Table structure for table `posts` */

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_type_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'draft',
  `publish_date` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `posts` */

insert  into `posts`(`id`,`post_type_id`,`created_at`,`updated_at`,`status`,`publish_date`,`created_by`) values 

(17,1,'2016-10-22 04:20:17','2016-10-27 03:34:17','PUBLISH','2016-10-22 04:19:00',1),

(18,1,'2016-10-23 20:40:55','2016-10-24 03:15:16','PUBLISH','2016-10-23 20:35:00',1),

(73,3,'2016-11-11 03:33:49','2017-01-12 23:32:49','PUBLISH','2016-11-11 03:33:00',3),

(77,3,'2016-11-16 02:13:23','2017-01-12 23:33:02','PUBLISH','2016-11-16 02:08:00',3),

(78,3,'2016-11-16 02:17:01','2017-01-12 23:33:16','PUBLISH','2016-11-16 02:13:00',3),

(79,3,'2016-11-16 02:25:47','2017-01-12 23:33:28','PUBLISH','2016-11-16 02:21:00',3),

(80,3,'2016-11-16 02:36:09','2017-01-12 23:33:42','PUBLISH','2016-11-16 02:31:00',3),

(81,3,'2016-11-16 02:44:08','2017-01-12 23:33:55','PUBLISH','2016-11-16 02:41:00',3),

(82,3,'2016-11-16 02:47:33','2017-01-12 23:35:15','PUBLISH','2016-11-16 02:44:00',3),

(83,3,'2016-11-16 02:49:46','2017-01-12 23:35:32','PUBLISH','2016-11-16 02:48:00',3),

(84,3,'2016-11-16 02:50:32','2017-01-12 23:37:10','PUBLISH','2016-11-16 02:49:00',3),

(85,3,'2016-11-16 02:52:24','2017-01-12 23:37:22','PUBLISH','2016-11-16 02:51:00',3),

(86,6,'2016-11-22 00:41:01','2017-01-12 03:53:13','PUBLISH','2016-11-22 00:40:00',1),

(87,6,'2016-11-22 00:41:21','2016-11-22 00:41:21','PUBLISH','2016-11-22 00:41:00',1),

(88,6,'2016-11-22 00:41:36','2016-12-07 22:42:19','PUBLISH','2016-11-22 00:41:00',1),

(89,6,'2016-11-22 00:42:01','2016-11-22 00:42:01','PUBLISH','2016-11-22 00:41:00',1),

(90,6,'2016-11-22 00:42:42','2016-12-21 04:14:20','PUBLISH','2016-11-22 00:42:00',1),

(91,6,'2016-12-01 18:13:54','2017-01-10 05:28:35','PUBLISH','2016-12-01 18:13:00',1),

(92,4,'2016-12-05 00:41:21','2016-12-05 01:05:51','PUBLISH','2016-12-05 00:38:00',3),

(93,4,'2016-12-05 00:43:26','2016-12-05 01:18:35','PUBLISH','2016-12-05 00:43:00',3),

(94,4,'2016-12-05 00:45:54','2017-01-12 13:21:36','PUBLISH','2017-01-04 00:40:00',3),

(95,4,'2016-12-05 01:10:30','2016-12-05 01:12:51','PUBLISH','2016-12-05 01:08:00',3),

(96,6,'2016-12-22 12:59:11','2017-01-05 04:12:43','PUBLISH','2016-12-22 12:59:00',1),

(97,6,'2016-12-22 13:39:53','2017-01-12 05:44:36','PUBLISH','2016-12-22 13:39:00',1),

(98,6,'2017-01-05 10:01:43','2017-01-13 00:05:40','PUBLISH','2017-01-05 10:01:00',1),

(102,2,'2017-01-06 09:48:11','2017-01-12 23:31:53','PUBLISH','2017-01-06 09:41:00',3),

(103,7,'2017-01-11 07:46:19','2017-01-11 08:00:16','PUBLISH','2017-01-11 07:45:00',1),

(104,6,'2017-01-17 08:20:27','2017-01-17 08:20:27','PUBLISH','2017-01-17 08:19:00',1);

/*Table structure for table `role_has_permissions` */

DROP TABLE IF EXISTS `role_has_permissions`;

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `role_has_permissions` */

insert  into `role_has_permissions`(`permission_id`,`role_id`) values 

(1,1),

(2,1),

(3,1),

(4,1),

(5,1),

(6,1),

(7,1),

(8,1),

(9,1),

(10,1),

(11,1),

(12,1),

(13,1),

(14,1),

(15,1),

(16,1),

(21,1),

(22,1),

(23,1),

(24,1),

(25,1),

(26,1),

(27,1),

(28,1),

(29,1),

(30,1),

(31,1),

(32,1),

(33,1),

(34,1),

(35,1),

(36,1),

(37,1),

(38,1),

(39,1),

(40,1),

(41,1),

(42,1),

(43,1),

(44,1),

(45,1),

(46,1),

(47,1),

(48,1),

(49,1),

(50,1),

(51,1),

(52,1),

(53,1),

(54,1),

(55,1),

(56,1),

(57,1),

(58,1),

(59,1),

(60,1),

(61,1),

(62,1),

(63,1),

(64,1),

(65,1),

(66,1),

(67,1),

(68,1),

(69,1),

(70,1),

(71,1),

(72,1),

(73,1),

(74,1),

(75,1),

(1,3),

(2,3),

(3,3),

(4,3),

(5,3),

(8,3),

(1,4),

(2,4),

(3,4),

(4,4),

(5,4),

(8,4),

(9,4),

(10,4),

(25,4),

(27,4),

(28,4),

(29,4),

(30,4),

(31,4),

(32,4),

(33,4),

(34,4),

(35,4),

(36,4),

(37,4),

(38,4),

(39,4),

(40,4),

(41,4),

(42,4),

(43,4),

(44,4),

(45,4),

(46,4),

(47,4),

(48,4),

(49,4),

(50,4),

(51,4),

(52,4),

(53,4),

(54,4),

(55,4),

(56,4),

(57,4),

(58,4),

(59,4),

(60,4),

(61,4),

(62,4),

(63,4),

(64,4),

(65,4),

(66,4),

(67,4),

(68,4),

(69,4),

(70,4),

(71,4),

(72,4),

(73,4),

(74,4),

(75,4);

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `roles` */

insert  into `roles`(`id`,`name`,`created_at`,`updated_at`) values 

(1,'Administrator',NULL,NULL),

(3,'Author','2016-10-12 05:11:37','2016-10-12 05:11:37'),

(4,'Semi Admin','2016-10-13 02:34:12','2016-10-13 02:34:12');

/*Table structure for table `sessions` */

DROP TABLE IF EXISTS `sessions`;

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8_unicode_ci,
  `payload` text COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  UNIQUE KEY `sessions_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `sessions` */

insert  into `sessions`(`id`,`user_id`,`ip_address`,`user_agent`,`payload`,`last_activity`) values 

('EmJsl79PhA8GATAzDSLqQ20Nr18tQHYVhjIK7j51',1,'192.168.10.1','Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36','YTo3OntzOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjY6Il90b2tlbiI7czo0MDoiYmhxOGE4dmg0Z0g1Wkt0R01vNGw2WHE0eHVKanhuUFRPRGEyTzFLSiI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQzOiJodHRwOi8vamFpLmRldi9qYWktYmFja2VuZC9zaG93dGltZS8xNC9lZGl0Ijt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjQ6ImxhbmciO3M6MjoiZW4iO3M6OToiX3NmMl9tZXRhIjthOjM6e3M6MToidSI7aToxNDg0NjM4MTQwO3M6MToiYyI7aToxNDg0NjE1OTU3O3M6MToibCI7czoxOiIwIjt9fQ==',1484638140),

('fREBlz0goWDRsToCYbBXweNI2XGPJbepl9tdnjVd',NULL,'192.168.10.1','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiQmJIRW9NYzQwUnN2N1lVR2U0N2RBWXRiaHQwRzMxU3BnekthV0x6NSI7czo0OiJsYW5nIjtzOjI6ImVuIjtzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyNzoiaHR0cDovL2phaS5kZXYvZW4vc2hvdy10aW1lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfc2YyX21ldGEiO2E6Mzp7czoxOiJ1IjtpOjE0ODQ2Mzg4NTY7czoxOiJjIjtpOjE0ODQ2MzA4MDE7czoxOiJsIjtzOjE6IjAiO319',1484638856),

('NS08gaI2oLpH0wzWdgspqa203wRNSm19CBXW1FSj',NULL,'192.168.10.1','Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiQ1JmUXFTZGFReklQVGVMRzZObWF2MUdqSFV1RGxMUThPM1Y3VDIxMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly9wYXltZW50LmphaS9lbi90aWNrZXQtaG91cnMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjQ6ImxhbmciO3M6MjoiZW4iO3M6OToiX3NmMl9tZXRhIjthOjM6e3M6MToidSI7aToxNDg0NjMxMjA2O3M6MToiYyI7aToxNDg0NjIzNjQ0O3M6MToibCI7czoxOiIwIjt9fQ==',1484631207);

/*Table structure for table `settings` */

DROP TABLE IF EXISTS `settings`;

CREATE TABLE `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) NOT NULL,
  `value` text,
  PRIMARY KEY (`id`,`key`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `settings` */

insert  into `settings`(`id`,`key`,`value`) values 

(6,'facebook_link','https://www.facebook.com/JakartaAquarium/'),

(7,'twitter_link','https://www.twitter.com/JakartaAquarium/'),

(8,'tripadvisor_link','https://www.tripadvisor.com/JakartaAquarium/'),

(9,'homepage_meta','asdfasdfasdf'),

(10,'instagram_link','https://www.instagram.com/jakartaaquarium/'),

(11,'googleplus_link','https://plus.google.com/115041976414559325070');

/*Table structure for table `show_details` */

DROP TABLE IF EXISTS `show_details`;

CREATE TABLE `show_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `show_id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lang` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'en',
  `content` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `show_details_show_id_foreign` (`show_id`),
  CONSTRAINT `show_details_show_id_foreign` FOREIGN KEY (`show_id`) REFERENCES `shows` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `show_details` */

insert  into `show_details`(`id`,`show_id`,`title`,`slug`,`lang`,`content`) values 

(37,12,'Shark Feeding Frenzy','shark-feeding-frenzy','en','<span data-sheets-value=\"{\" data-sheets-userformat=\"{\">Feel the sensation of being close to nature by feeding the Black Tip Reef Shark in Southern Sea Gallery zone from LGM floor. Don\'t worry, they usually don\'t bite</span>'),

(38,12,'Shark Feeding Frenzy','shark-feeding-frenzy-2','id','<span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;Dekatkan diri Anda dengan alam dengan memberi makan Hiu Black Tip di zona Southern Sea Gallery di lantai LGM. Jangan takut, mereka biasanya tidak gigit :)&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:4994,&quot;4&quot;:{&quot;1&quot;:2,&quot;2&quot;:16573901},&quot;10&quot;:1,&quot;11&quot;:4,&quot;12&quot;:0,&quot;15&quot;:&quot;Calibri&quot;}\">Dekatkan diri Anda dengan alam dengan memberi makan Hiu Black Tip di zona Southern Sea Gallery dari lantai LGM. Jangan takut, mereka biasanya tidak gigit.</span>'),

(45,13,'Penguin Feeding','penguin-feeding','en','<span data-sheets-value=\"{\" data-sheets-userformat=\"{\">Get the chance to feed the Humboldt Penguins that origin from the coast of South America only in Pingoo restaurant on LG floor of Neo SOHO.</span>'),

(46,13,'Penguin Feeding','penguin-feeding-2','id','<span data-sheets-value=\"{\" data-sheets-userformat=\"{\">Dapatkan pengalaman memberi makan Penguin Humboldt yang berasal dari pesisir pantai Amerika Selatan hanya di restoran Pingoo lantai LG Neo SOHO.</span>'),

(65,14,'asdfasdf','asdfasdf','en','<p>asdfadsfa</p>'),

(66,14,'asdfasdf','asdfasdf-2','id','<p>asdfadsf</p>');

/*Table structure for table `show_has_medias` */

DROP TABLE IF EXISTS `show_has_medias`;

CREATE TABLE `show_has_medias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `show_id` int(10) unsigned NOT NULL,
  `media_id` int(10) unsigned NOT NULL,
  `media_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'featured',
  PRIMARY KEY (`id`),
  KEY `show_has_medias_show_id_foreign` (`show_id`),
  KEY `show_has_medias_media_id_foreign` (`media_id`),
  CONSTRAINT `show_has_medias_media_id_foreign` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`) ON DELETE CASCADE,
  CONSTRAINT `show_has_medias_show_id_foreign` FOREIGN KEY (`show_id`) REFERENCES `shows` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `show_has_medias` */

/*Table structure for table `show_metas` */

DROP TABLE IF EXISTS `show_metas`;

CREATE TABLE `show_metas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `show_id` int(10) unsigned NOT NULL,
  `meta_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_value` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `show_metas_show_id_foreign` (`show_id`),
  CONSTRAINT `show_metas_show_id_foreign` FOREIGN KEY (`show_id`) REFERENCES `shows` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `show_metas` */

/*Table structure for table `show_types` */

DROP TABLE IF EXISTS `show_types`;

CREATE TABLE `show_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `show_types` */

/*Table structure for table `shows` */

DROP TABLE IF EXISTS `shows`;

CREATE TABLE `shows` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `show_type` int(11) NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `day` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `particular_showtime` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `shows` */

insert  into `shows`(`id`,`show_type`,`created_by`,`created_at`,`updated_at`,`day`,`start_date`,`end_date`,`start_time`,`end_time`,`particular_showtime`) values 

(12,1,3,'2017-01-09 06:21:15','2017-01-09 06:22:48',1,'1970-01-01','1970-01-01','10:00:00','00:00:00',NULL),

(13,1,1,'2017-01-09 09:14:50','2017-01-17 11:56:10',0,'1970-01-01','1970-01-01','10:00:00','00:00:00',NULL),

(14,2,1,'2017-01-17 11:52:18','2017-01-17 14:15:42',0,'1970-01-01','1970-01-01','10:00:00','00:00:00','<h5 class=\"grey-text uk-margin-remove\">Monday - Friday</h5>\r\n03:00 PM\r\n<h5 class=\"grey-text uk-margin-remove\">Saturday - Sunday</h5>\r\n01:00 PM<br />04:00 PM<br />07:00 PM');

/*Table structure for table `slider_items` */

DROP TABLE IF EXISTS `slider_items`;

CREATE TABLE `slider_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slider_id` int(11) NOT NULL,
  `lang` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'en',
  `content` text COLLATE utf8_unicode_ci,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '#',
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `slider_items` */

insert  into `slider_items`(`id`,`slider_id`,`lang`,`content`,`link`,`file_name`,`order`) values 

(5,6,'en','WELCOME TO JAKARTA AQUARIUM','#','homeslide_dori.jpg',0),

(6,6,'id','SELAMAT DATANG DI JAKARTA AQUARIUM','#','homeslide_dori.jpg',0),

(9,6,'en','A CUTTING EDGE INDOOR BOUTIQUE AQUARIUM','#','homeslide_fishes.jpg',1),

(10,6,'id','SEBUAH KONSEP TERBARU AQUARIUM KONTEMPORER','#','homeslide_fishes.jpg',1),

(11,7,'en','Be ready to be dazzled by this magical performance that combine stage act, illusion trick and underwater dance.','javascript:;','showtime-header.jpg',0),

(12,7,'id','Bersiaplah untuk terpesona oleh pertunjukan yang menakjubkan, gabungan aksi panggung, trik ilusi dan tarian di bawah air.','javascript:;','showtime-header.jpg',0),

(13,6,'en','A JOURNEY INTO THE DEEP','','homeslide_shark.jpg',2),

(14,6,'id','SEBUAH PETUALANGAN PEMANDANGAN DASAR LAUT ','','homeslide_shark.jpg',2),

(15,6,'en','','','homeslide_otter.jpg',3),

(16,6,'id','','','homeslide_otter.jpg',3);

/*Table structure for table `sliders` */

DROP TABLE IF EXISTS `sliders`;

CREATE TABLE `sliders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `publish_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `sliders` */

insert  into `sliders`(`id`,`title`,`user_id`,`publish_date`,`created_at`,`updated_at`) values 

(6,'Homeslider',3,'2016-10-26 19:05:00','2016-10-25 04:08:43','2017-01-12 23:31:04'),

(7,'PEARL OF THE SOUTH SEA',1,'2017-01-05 17:02:00','2017-01-05 10:03:49','2017-01-13 00:06:26');

/*Table structure for table `tags` */

DROP TABLE IF EXISTS `tags`;

CREATE TABLE `tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tags` */

/*Table structure for table `user_has_permissions` */

DROP TABLE IF EXISTS `user_has_permissions`;

CREATE TABLE `user_has_permissions` (
  `user_id` int(10) unsigned NOT NULL,
  `permission_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`permission_id`),
  KEY `user_has_permissions_permission_id_foreign` (`permission_id`),
  CONSTRAINT `user_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_has_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `user_has_permissions` */

/*Table structure for table `user_has_roles` */

DROP TABLE IF EXISTS `user_has_roles`;

CREATE TABLE `user_has_roles` (
  `role_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`user_id`),
  KEY `user_has_roles_user_id_foreign` (`user_id`),
  CONSTRAINT `user_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_has_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `user_has_roles` */

insert  into `user_has_roles`(`role_id`,`user_id`) values 

(1,1),

(1,3),

(4,3);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`password`,`remember_token`,`created_at`,`updated_at`) values 

(1,'Pasha Mahardika','me@pashamahardika.com','$2y$10$Ys8gQPnelcFYGY7vVzKe/OHSzXBLNyqPGz9DTHFp9MZGzRa7djpb.','C5K7qps5sNJSAIuWpPXZ0SDC8zYN3AYNb6pZQ3U51tdZYLHj5PHSZQcKRA1y','2016-10-11 12:35:26','2017-01-17 10:04:15'),

(3,'Edwina Trianinda','trianinda.edwina@gmail.com','$2y$10$iWVk/vWv/R3oa1ipa.pVgem6ypOZvDLW.F4jnbxEVODJFxbKgKHRa','c5jCFR3VIoX6rKN8nyVbudjeOTbPFH95N2Mkld6uLF3cTL0TRbVHrGvSE2s8','2016-10-11 16:41:14','2016-11-18 22:48:45');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
