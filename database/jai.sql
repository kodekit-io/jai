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
CREATE DATABASE /*!32312 IF NOT EXISTS*/`jai` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `jai`;

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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `career_details` */

insert  into `career_details`(`id`,`career_id`,`lang`,`slug`,`position`,`description`) values 
(11,3,'en','environment-scientist-en','Environment Scientist (EN)','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(12,3,'id','environment-scientist-id','Environment Scientist (ID)','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(17,4,'en','operation-manager-en','Operation Manager (EN)','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(18,4,'id','operation-manager-id','Operation Manager (ID)','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(19,2,'en','programmers-en','Programmers (EN)','Programmers'),
(20,2,'id','programmers-id','Programmers  (ID)','Be a programmers');

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `career_metas` */

insert  into `career_metas`(`id`,`career_id`,`meta_key`,`meta_value`) values 
(11,2,'meta_description-en','META (EN)'),
(12,2,'meta_description-id','META (ID)');

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
(2,'ICT','2017-01-31','Dodo','2016-11-14 06:29:40','2016-12-08 05:45:17'),
(3,'Biological Program','2016-11-22','Dodo','2016-11-15 07:19:05','2016-11-15 07:19:05'),
(4,'Operation and Business Development','2016-11-30','Dodo','2016-11-15 07:39:02','2016-11-15 07:39:39');

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
(1,1,'News','news',NULL,'2016-10-21 12:40:03','2016-10-21 12:40:03',0),
(2,1,'What\'s On','whats-on',NULL,'2016-10-22 01:59:54','2016-10-22 01:59:54',0),
(3,2,'Test Category','test-category',NULL,NULL,NULL,0),
(15,1,'Coba','coba',NULL,'2016-10-22 02:46:19','2016-10-22 02:46:19',0),
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `cimb_checkouts` */

insert  into `cimb_checkouts`(`id`,`process_type`,`order_id`,`payment_id`,`amount`,`currency`,`remark`,`trans_id`,`auth_code`,`status`,`error_desc`,`message`,`signature`,`created_at`,`updated_at`) values 
(7,'',96,'',665000,'IDR','','','','','','Transaction request start','VWfGb89c0BQuX1pbY9K9uZUyISo=','2017-01-05 10:23:38','2017-01-05 10:23:38'),
(8,'',97,'',200000,'IDR','','','','','','Transaction request start','W77iMY+A4dAMkarn8DME7CrMf4U=','2017-01-05 10:24:27','2017-01-05 10:24:27'),
(9,'',98,'',265000,'IDR','','','','','','Transaction request start','XjRXonjQuhI/IdBIttabVlQuB4U=','2017-01-05 10:33:27','2017-01-05 10:33:27'),
(10,'',99,'',265000,'IDR','','','','','','Transaction request start','nTns/JQhuAqCPXeX7/I/mdHkEIM=','2017-01-05 10:34:10','2017-01-05 10:34:10'),
(11,'',100,'',275000,'IDR','','','','','','Transaction request start','mj5aZgfiFDOoDRWnO1I5bx4mXCc=','2017-01-05 13:46:30','2017-01-05 13:46:30'),
(12,'',101,'',27500000,'IDR','','','','','','Transaction request start','peapkK0wsXcd3VxCnMkk1blNMNw=','2017-01-11 10:16:59','2017-01-11 10:16:59');

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
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `doku_checkouts` */

insert  into `doku_checkouts`(`id`,`ip_address`,`process_type`,`order_id`,`amount`,`response_code`,`status_code`,`result_msg`,`payment_datetime`,`payment_channel`,`payment_code`,`words`,`session_id`,`bank`,`credit_card`,`message`,`created_at`,`updated_at`) values 
(109,'192.168.10.1','REQUEST',96,665000,'','','',NULL,'','','c4e8f57372ca4fff8246a6eff45585930750ece7','6MDCLgMpRjtC4rCvKmgSJSpSrESTp6mXvLYUTBqr','','','Transaction request start','2017-01-05 10:23:38','2017-01-05 10:23:38'),
(110,'192.168.10.1','CHECKSTATUS',96,665000,'0000','0000','SUCCESS',NULL,'15','','28a31aa03decef20d7666e6ca8df1c0bb2d7d291','6MDCLgMpRjtC4rCvKmgSJSpSrESTp6mXvLYUTBqr','PT. BANK BUKOPIN','411111******1111','Checking payment status from doku.','2017-01-05 10:24:11','2017-01-05 10:24:11'),
(111,'192.168.10.1','REDIRECT',96,665000,'','0000','',NULL,'15','','7708e4ac6fb35efc06ba99c1a92d9588ac75fe19','6MDCLgMpRjtC4rCvKmgSJSpSrESTp6mXvLYUTBqr','','','Redirect process with no notify message come from DOKU. Transaction is Success. Please check on Back Office.','2017-01-05 10:24:11','2017-01-05 10:24:11'),
(112,'192.168.10.1','REQUEST',97,200000,'','','',NULL,'','','eb692195d33ecdddc0c1569ac8c79976610cf9d4','6MDCLgMpRjtC4rCvKmgSJSpSrESTp6mXvLYUTBqr','','','Transaction request start','2017-01-05 10:24:27','2017-01-05 10:24:27'),
(113,'192.168.10.1','REQUEST',98,265000,'','','',NULL,'','','678f2f2c22b9a9eda4b18b44a758d9c59b6be627','6MDCLgMpRjtC4rCvKmgSJSpSrESTp6mXvLYUTBqr','','','Transaction request start','2017-01-05 10:33:27','2017-01-05 10:33:27'),
(114,'192.168.10.1','REDIRECT',98,265000,'','5510','',NULL,'01','','1dcbae9d4efe17a15f523bca70681a0d3c2eb7cb','6MDCLgMpRjtC4rCvKmgSJSpSrESTp6mXvLYUTBqr','','','Redirect process come from DOKU. Transaction is cancelled by User.','2017-01-05 10:33:49','2017-01-05 10:33:49'),
(115,'192.168.10.1','REQUEST',99,265000,'','','',NULL,'','','3f6d0345feab5a4a4f181cb88cbb4a55462733e4','6MDCLgMpRjtC4rCvKmgSJSpSrESTp6mXvLYUTBqr','','','Transaction request start','2017-01-05 10:34:10','2017-01-05 10:34:10'),
(116,'192.168.10.1','REDIRECT',99,265000,'','5511','',NULL,'05','8965012830000421','cfe917b4747b708872dce22b70165d9592d3efd9','6MDCLgMpRjtC4rCvKmgSJSpSrESTp6mXvLYUTBqr','','','Redirect process come from DOKU. Transaction is pending for payment','2017-01-05 10:34:32','2017-01-05 10:34:32'),
(117,'192.168.10.1','REQUEST',100,275000,'','','',NULL,'','','581a8ad9a8204e290596c8520b035e7b4f0f072b','6MDCLgMpRjtC4rCvKmgSJSpSrESTp6mXvLYUTBqr','','','Transaction request start','2017-01-05 13:46:30','2017-01-05 13:46:30'),
(118,'192.168.10.1','REQUEST',101,275000,'','','',NULL,'','','cfa044c0a7ce45fd0148f641e3ef85be7a4900f7','f5rxIiZK5MVlAthhXZg5dtsgnwWtgTqU38PiUkRN','','','Transaction request start','2017-01-11 10:16:59','2017-01-11 10:16:59');

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
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `galasys_tickets` */

insert  into `galasys_tickets`(`id`,`order_id`,`code`,`name`,`barcode`,`e_ticket`,`created_at`,`updated_at`) values 
(86,96,'o1dpa','Regular','1701050000123','uploads/e-tickets/regular-1701050000123.pdf','2017-01-05 10:24:14','2017-01-05 10:24:14'),
(87,96,'o1dpa','Regular','1701050000147','uploads/e-tickets/regular-1701050000147.pdf','2017-01-05 10:24:15','2017-01-05 10:24:15'),
(88,96,'o1dpa','Regular','1701050000161','uploads/e-tickets/regular-1701050000161.pdf','2017-01-05 10:24:15','2017-01-05 10:24:15'),
(89,96,'pb4r','Photo Booth - 4R','1701050000185','uploads/e-tickets/photo-booth-4r-1701050000185.pdf','2017-01-05 10:24:15','2017-01-05 10:24:15');

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `holidays` */

insert  into `holidays`(`id`,`title`,`date`,`description`,`created_by`,`created_at`,`updated_at`) values 
(3,'Lebaran Misalnya','2016-10-15','Lebaran sebentar lagi',3,'2016-10-28 14:07:42','2016-10-28 14:07:42'),
(4,'Lebaran Misalnya','2016-10-16','Lebaran sebentar lagi',3,'2016-10-28 14:07:42','2016-10-28 14:07:42'),
(5,'Lebaran Misalnya','2016-10-17','Lebaran sebentar lagi',3,'2016-10-28 14:07:42','2016-10-28 14:07:42'),
(6,'Lebaran Misalnya','2016-10-18','Lebaran sebentar lagi',3,'2016-10-28 14:07:42','2016-10-28 14:07:42'),
(7,'Lebaran Misalnya','2016-10-19','Lebaran sebentar lagi',3,'2016-10-28 14:07:42','2016-10-28 14:07:42'),
(8,'Lebaran Misalnya','2016-10-20','Lebaran sebentar lagi',3,'2016-10-28 14:07:42','2016-10-28 14:07:42'),
(9,'Lebaran Misalnya','2016-10-21','Lebaran sebentar lagi',3,'2016-10-28 14:07:42','2016-10-28 14:07:42'),
(10,'Natal','2016-12-25','',1,'2016-12-16 19:58:52','2016-12-16 19:58:52');

/*Table structure for table `jobs` */

DROP TABLE IF EXISTS `jobs`;

CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_reserved_at_index` (`queue`,`reserved_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `jobs` */

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
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `media` */

insert  into `media`(`id`,`title`,`file_name`,`description`,`created_at`,`updated_at`) values 
(43,'AiPzG1F86wWs.jpg','AiPzG1F86wWs.jpg',NULL,'2016-10-19 13:33:06','2016-10-19 13:33:06'),
(44,'4FdyA3zYcuZ2.jpg','4FdyA3zYcuZ2.jpg',NULL,'2016-10-19 13:33:54','2016-10-19 13:33:54'),
(45,'bg-sec2-twb.jpg','bg-sec2-twb.jpg',NULL,'2016-10-19 13:35:25','2016-10-19 13:35:25'),
(46,'under the sea.jpg','under the sea.jpg',NULL,'2016-10-21 12:22:09','2016-10-21 12:22:09'),
(47,'street.jpg','street.jpg',NULL,'2016-10-21 12:24:03','2016-10-21 12:24:03'),
(48,'river.jpg','river.jpg',NULL,'2016-10-21 12:25:05','2016-10-21 12:25:05'),
(49,'boat.jpg','boat.jpg',NULL,'2016-10-21 12:25:37','2016-10-21 12:25:37'),
(50,'test.jpg','test.jpg',NULL,'2016-10-22 10:08:10','2016-10-22 10:08:10'),
(51,'head-sample-03.jpg','head-sample-03.jpg',NULL,'2016-10-28 07:09:59','2016-10-28 07:09:59'),
(52,'head-sample-01.jpg','head-sample-01.jpg',NULL,'2016-10-28 07:10:46','2016-10-28 07:10:46'),
(53,'about-header.jpg','about-header.jpg',NULL,'2016-11-02 11:32:31','2016-11-02 11:32:31'),
(54,'bg-section-sight.png','bg-section-sight.png',NULL,'2016-11-02 11:32:36','2016-11-02 11:32:36'),
(55,'img-sample-01.jpg','img-sample-01.jpg',NULL,'2016-11-02 11:32:48','2016-11-02 11:32:48'),
(56,'about-header.jpg','about-header.jpg',NULL,'2016-11-05 07:42:15','2016-11-05 07:42:15'),
(57,'img-news-01.jpg','img-news-01.jpg',NULL,'2016-11-10 10:26:27','2016-11-10 10:26:27'),
(58,'img-news-02.jpg','img-news-02.jpg',NULL,'2016-11-11 10:34:41','2016-11-11 10:34:41'),
(59,'img-news-03.jpg','img-news-03.jpg',NULL,'2016-11-11 10:34:57','2016-11-11 10:34:57'),
(60,'img-news-04.jpg','img-news-04.jpg',NULL,'2016-11-11 10:34:58','2016-11-11 10:34:58'),
(61,'img-news-05.jpg','img-news-05.jpg',NULL,'2016-11-11 10:34:59','2016-11-11 10:34:59'),
(62,'img-sample-01.jpg','img-sample-01.jpg',NULL,'2016-11-11 10:35:01','2016-11-11 10:35:01'),
(63,'Sea_otters_holding_hands.jpg','Sea_otters_holding_hands.jpg',NULL,'2016-11-16 08:59:41','2016-11-16 08:59:41'),
(64,'Screen Shot 2016-11-16 at 5.02.10 PM.png','Screen Shot 2016-11-16 at 5.02.10 PM.png',NULL,'2016-11-16 09:02:39','2016-11-16 09:02:39'),
(65,'Otter Peek a Boo.jpg','Otter Peek a Boo.jpg',NULL,'2016-11-16 09:04:59','2016-11-16 09:04:59'),
(66,'Otter Peek a Boo.jpg','Otter Peek a Boo.jpg',NULL,'2016-11-16 09:07:04','2016-11-16 09:07:04'),
(67,'Touch Me If You can.jpg','Touch Me If You can.jpg',NULL,'2016-11-16 09:13:10','2016-11-16 09:13:10'),
(68,'watch out the crab.jpg','watch out the crab.jpg',NULL,'2016-11-16 09:16:57','2016-11-16 09:16:57'),
(69,'Diving with Shark.jpg','Diving with Shark.jpg',NULL,'2016-11-16 09:25:33','2016-11-16 09:25:33'),
(70,'sea trekking.jpg','sea trekking.jpg',NULL,'2016-11-16 09:36:06','2016-11-16 09:36:06'),
(71,'sea trekking1.jpg','sea trekking1.jpg',NULL,'2016-11-16 09:38:44','2016-11-16 09:38:44'),
(72,'seatrek.jpg','seatrek.jpg',NULL,'2016-11-16 09:40:26','2016-11-16 09:40:26'),
(73,'create your own fish.jpeg','create your own fish.jpeg',NULL,'2016-11-16 09:44:03','2016-11-16 09:44:03'),
(74,'jakarta aquarium Neo Soho - Satu harapan.jpg','jakarta aquarium Neo Soho - Satu harapan.jpg',NULL,'2016-12-05 08:10:22','2016-12-05 08:10:22'),
(75,'showtime-header.jpg','showtime-header.jpg',NULL,'2017-01-05 16:25:54','2017-01-05 16:25:54');

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
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `menus` */

insert  into `menus`(`id`,`name`,`display`,`link`,`parent_id`,`permission`,`icon_class`,`description`,`created_at`,`updated_at`,`order`,`menu_type`) values 
(1,'dashboard','Dashboard','jai-backend',0,'dashboard','icon-home',NULL,NULL,NULL,0,'backend'),
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
(41,'f.show-time','Show Time','show-time',38,'frontend',NULL,NULL,NULL,NULL,300,'frontend'),
(42,'f.location','Location','location',38,'frontend',NULL,NULL,NULL,NULL,400,'frontend'),
(43,'f.attraction','Attractions and Experience','attractions-experience',0,'frontend','ja-icon-attract',NULL,NULL,NULL,300,'frontend'),
(44,'f.conservation','Education and Conservation','conservation',0,'frontend','ja-icon-edu',NULL,NULL,NULL,400,'frontend-old'),
(45,'f.news','News','news',0,'frontend','ja-icon-news',NULL,NULL,NULL,500,'frontend'),
(46,'career','Careers','javascript:;',0,'career','fa fa-child',NULL,NULL,NULL,700,'backend'),
(47,'career.list','Career List','jai-backend/career',46,'career',NULL,NULL,NULL,NULL,100,'backend'),
(48,'career.add','Add Career','jai-backend/career/add',46,'career.add',NULL,NULL,NULL,NULL,200,'backend'),
(49,'page','Pages','jai-backend/page',0,'page','fa fa-sticky-note-o',NULL,NULL,NULL,800,'backend'),
(50,'f.aquarium-map','Aquarium Map','location-map',38,'frontend',NULL,NULL,'2016-11-30 16:00:00','2016-11-30 16:00:00',350,'frontend'),
(51,'general-setting','General Setting','jai-backend/general-setting',4,'setting',NULL,NULL,NULL,NULL,50,'backend'),
(52,'order','Orders','jai-backend/order',0,'order',NULL,NULL,NULL,NULL,900,'backend'),
(53,'promo','Promo','jai-backend/promo',0,'promo','fa fa-bullhorn',NULL,NULL,NULL,850,'backend');

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
('2016_11_24_154312_add_color_on_package',31),
('2016_12_04_111825_alter_package_add_galasys_id',32),
('2016_12_04_112302_create_order_table',33),
('2016_12_04_115501_alter_package_add_order',33),
('2016_12_04_121154_add_order_status_on_orders',33),
('2016_12_04_182407_add_sub_total_and_tax_on_orders',33),
('2016_12_14_215058_create_settings_table',33),
('2016_12_17_165606_create_jobs_table',34),
('2016_12_21_132847_create_doku_response_codes',35),
('2016_12_30_140418_create_doku_checkouts_table',36),
('2017_01_03_171626_create_galasys_tickets_table',37),
('2017_01_04_153412_create_cimb_checkouts_table',38);

/*Table structure for table `order_details` */

DROP TABLE IF EXISTS `order_details`;

CREATE TABLE `order_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) unsigned NOT NULL,
  `product_id` int(11) NOT NULL,
  `galasys_product_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `qty` double NOT NULL,
  `total_price` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order_details_order_id_foreign` (`order_id`),
  CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=183 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `order_details` */

insert  into `order_details`(`id`,`order_id`,`product_id`,`galasys_product_id`,`product_name`,`price`,`qty`,`total_price`) values 
(176,96,4018,'o1dpa','Regular',200000,2,400000),
(177,96,4019,'o1dpc','Premium',265000,1,265000),
(178,97,4018,'o1dpa','Regular',200000,1,200000),
(179,98,4019,'o1dpc','Premium',265000,1,265000),
(180,99,4019,'o1dpc','Premium',265000,1,265000),
(181,100,4019,'o1dpc','Premium',275000,1,275000),
(182,101,4019,'o1dpc','Premium',275000,1,275000);

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
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `orders` */

insert  into `orders`(`id`,`visit_date`,`email`,`name`,`phone_number`,`sub_total`,`tax`,`total_amount`,`created_at`,`updated_at`,`status`,`status_description`) values 
(96,'2017-01-28','pasha.md5@gmail.com','Pasha Mahardika','081808325756',665000,0,665000,'2017-01-05 10:23:38','2017-01-05 10:24:48',5,'email-sent'),
(97,'2017-01-28','pasha.md5@gmail.com','Pasha Mahardika','081808325756',200000,0,200000,'2017-01-05 10:24:27','2017-01-05 10:24:27',0,NULL),
(98,'2017-01-21','pasha.md5@gmail.com','Pasha Mahardika','081808325756',265000,0,265000,'2017-01-05 10:33:27','2017-01-05 10:33:49',9,'cancelled'),
(99,'2017-01-28','pasha.md5@gmail.com','Pasha Mahardika','081808325756',265000,0,265000,'2017-01-05 10:34:10','2017-01-05 10:34:32',2,'on-hold'),
(100,'2017-01-21','pasha.md5@gmail.com','Pasha Mahardika','081808325756',275000,0,275000,'2017-01-05 13:46:30','2017-01-05 13:46:30',0,NULL),
(101,'2017-01-28','pasha.md5@gmail.com','Pasha Mahardika','081808325756',275000,0,275000,'2017-01-11 10:16:59','2017-01-11 10:16:59',0,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(63,5,'en','School, Coorporate and Birthday Package','school-coorporate-and-birthday-package','Jakarta Aquarium provides a wide range of interesting activity for your company or school group.<br /><br />Get a special rate and activity package for your group in Jakarta Aquarium. For a group consist of more than 30 people, place a reservation at least 7 days in advance.<br /><br /><br />Contact Us :<br />T. 021 2920 9072<br />E. sales@jakarta-aquarium.com'),
(64,5,'id','Paket sekolah, korporasi dan ulang tahun','paket-sekolah-korporasi-dan-ulang-tahun','Jakarta Aquarium menyediakan beragam paket aktivitas menarik untuk grup perusahaan atau grup sekolah.<br /><br />Dapatkan harga khusus hanya untuk grup Anda. Untuk group lebih dari 30 orang silahkan melakukan reservasi 7 hari sebelumnya.<br /><br />Hubungi tim kami di :<br />T. 021 2920 9072<br />E. sales@jakarta-aquarium.com');

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
  `galasys_product_id` int(11) NOT NULL DEFAULT '0',
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `packages` */

insert  into `packages`(`id`,`galasys_product_id`,`package_type_id`,`normal_price`,`weekend_price`,`holiday_price`,`created_by`,`is_general_admission`,`created_at`,`updated_at`,`color`,`order`) values 
(1,0,1,100000,150000,150000,1,1,'2016-10-28 13:59:22','2016-11-26 08:47:13','cyan darken-1',0),
(3,0,1,265000,290000,290000,3,1,'2016-10-28 14:10:11','2016-11-24 07:37:20','light-blue darken-4',0),
(4,0,1,550000,600000,600000,3,1,'2016-10-30 03:31:58','2016-11-24 07:38:20','amber darken-1',0),
(5,0,2,0,0,0,1,1,'2016-11-01 11:59:03','2017-01-08 09:42:35','cyan',0),
(6,0,2,0,0,0,3,0,'2016-11-01 12:00:47','2016-11-01 12:00:47','cyan',0),
(7,0,2,0,0,0,3,0,'2016-11-01 12:02:02','2016-11-01 12:02:02','cyan',0);

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
(11,'role.add','2016-10-13 02:36:02','2016-10-13 02:36:02'),
(12,'role.edit','2016-10-13 02:36:09','2016-10-13 02:36:09'),
(13,'role.delete','2016-10-13 02:36:14','2016-10-13 02:36:14'),
(14,'permission.add','2016-10-13 02:37:22','2016-10-13 02:37:22'),
(15,'permission.edit','2016-10-13 02:37:27','2016-10-13 02:37:27'),
(16,'permission.delete','2016-10-13 02:37:32','2016-10-13 02:37:32'),
(21,'post-type','2016-10-13 09:30:58','2016-10-13 09:30:58'),
(22,'post-type.add','2016-10-13 09:31:06','2016-10-13 09:31:06'),
(23,'post-type.edit','2016-10-13 09:31:12','2016-10-13 09:31:12'),
(24,'post-type.delete','2016-10-13 09:31:19','2016-10-13 09:31:19'),
(25,'post-category','2016-10-14 03:09:26','2016-10-14 03:09:26'),
(26,'post-category.add','2016-10-14 03:14:03','2016-10-14 03:14:03'),
(27,'post-category.edit','2016-10-14 03:14:11','2016-10-14 03:14:11'),
(28,'post-category.delete','2016-10-14 03:14:18','2016-10-14 03:14:18'),
(29,'whats-on','2016-10-21 11:41:51','2016-10-21 11:41:51'),
(30,'whats-on.add','2016-10-21 11:41:57','2016-10-21 11:41:57'),
(31,'whats-on.edit','2016-10-21 11:42:02','2016-10-21 11:42:02'),
(32,'whats-on.delete','2016-10-21 11:42:07','2016-10-21 11:42:07'),
(33,'post.edit','2016-10-22 07:53:48','2016-10-22 07:53:48'),
(34,'post.delete','2016-10-22 07:53:53','2016-10-22 07:53:53'),
(35,'slider','2016-10-24 13:56:43','2016-10-24 13:56:43'),
(36,'slider.add','2016-10-24 13:56:49','2016-10-24 13:56:49'),
(37,'slider.edit','2016-10-24 13:56:54','2016-10-24 13:56:54'),
(38,'slider.delete','2016-10-24 13:57:00','2016-10-24 13:57:00'),
(39,'news','2016-10-26 10:44:59','2016-10-26 10:44:59'),
(40,'news.add','2016-10-26 10:45:03','2016-10-26 10:45:03'),
(41,'news.edit','2016-10-26 10:45:09','2016-10-26 10:45:09'),
(42,'news.delete','2016-10-26 10:45:15','2016-10-26 10:45:15'),
(43,'news-category','2016-10-26 11:36:43','2016-10-26 11:36:43'),
(44,'package','2016-10-27 05:17:35','2016-10-27 05:17:35'),
(45,'package.add','2016-10-27 05:17:44','2016-10-27 05:17:44'),
(46,'package.edit','2016-10-27 05:17:51','2016-10-27 05:17:51'),
(47,'package.delete','2016-10-27 05:17:57','2016-10-27 05:17:57'),
(48,'holiday','2016-10-27 05:31:05','2016-10-27 05:31:05'),
(49,'attraction','2016-10-30 05:12:05','2016-10-30 05:12:05'),
(50,'attraction.add','2016-10-30 05:12:13','2016-10-30 05:12:13'),
(51,'attraction.edit','2016-10-30 05:12:20','2016-10-30 05:12:20'),
(52,'attraction.delete','2016-10-30 05:12:27','2016-10-30 05:12:27'),
(53,'attraction-category','2016-10-30 05:12:36','2016-10-30 05:12:36'),
(54,'media-room','2016-10-30 05:56:51','2016-10-30 05:56:51'),
(55,'media-room.add','2016-10-30 05:56:56','2016-10-30 05:56:56'),
(56,'media-room.edit','2016-10-30 05:57:01','2016-10-30 05:57:01'),
(57,'media-room.delete','2016-10-30 05:57:08','2016-10-30 05:57:08'),
(58,'media-room-category','2016-10-30 05:57:14','2016-10-30 05:57:14'),
(59,'showtime','2016-11-02 12:30:02','2016-11-02 12:30:02'),
(60,'showtime.add','2016-11-02 12:30:07','2016-11-02 12:30:07'),
(61,'showtime.edit','2016-11-02 12:30:13','2016-11-02 12:30:23'),
(62,'showtime.delete','2016-11-02 12:30:32','2016-11-02 12:30:32'),
(63,'career','2016-11-14 05:39:00','2016-11-14 05:39:00'),
(64,'career.add','2016-11-14 05:39:06','2016-11-14 05:39:06'),
(65,'career.update','2016-11-14 05:39:12','2016-11-14 05:39:12'),
(66,'career.delete','2016-11-14 05:39:20','2016-11-14 05:39:20'),
(67,'page','2016-11-22 07:36:56','2016-11-22 07:36:56'),
(68,'page.add','2016-11-22 07:37:00','2016-11-22 07:37:00'),
(69,'page.edit','2016-11-22 07:37:04','2016-11-22 07:37:04'),
(70,'page.delete','2016-11-22 07:37:08','2016-11-22 07:37:08'),
(71,'order','2017-01-09 11:14:07','2017-01-09 11:14:07'),
(72,'promo','2017-01-11 14:03:49','2017-01-11 14:03:49'),
(73,'promo.edit','2017-01-11 14:03:54','2017-01-11 14:03:54'),
(74,'promo.delete','2017-01-11 14:04:04','2017-01-11 14:04:04'),
(75,'promo.add','2017-01-11 14:04:15','2017-01-11 14:04:15');

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
(72,'en','Shark Feeding Frenzy','shark-feeding-frenzy','Try a new experience and meet the sharks! Challenge yourself in hand-feeding this sea creature. Sharks\' food will be provided by our staff.<br /><br /><br />Lokation: Ocean Tank Walk Over'),
(72,'id','Shark Feeding Frenzy','shark-feeding-frenzy-2','Rasakan pengalaman baru memberi makan hiu di Jakarta Aquarium. Anda bisa dapatkan makanan hiu dari staff kami.&nbsp;<br /><br />Lokasi: Ocean Tank Walk Over'),
(73,'en','Otter Peek-a-Boo','otter-peek-a-boo','Come and meet our utterly amazing Otters who are not only fun creatures, but also highly intelligent. Take a peek of their daily activities through the glass tunnel. Who knows, you will find them holding hands while sleeping. <br /><br />Location: Otter Exhibition'),
(73,'id','Otter Peek-a-Boo','otter-peek-a-boo-2','Temui dan sapa si Berang-Berang, hewan yang lucu, menggemaskan dan juga cerdas. Intip keseharian mereka melalui terowongan kaca. Siapa tahu, kamu dapat melihat mereka tidur sambil berpegangan tangan.<br /><br />Lokasi : Eksibit Berang-berang'),
(77,'en','Touch Me If You Can','touch-me-if-you-can','Let them feel your love through simple touch of your hand. Introduce yourself to the Brown Banded Bamboo Shark, Blue Starfish, Turbo Snail, and other gentle animals. <br /><br />Location: Touch and Find Zone'),
(77,'id','Touch Me if You Can','touch-me-if-you-can-2','Tunjukkan kasih sayangmu dengan membelai para hewan ini! Kenali hiu bambu, bintang laut biru, siput dan masih banyak lagi.<br /><br />Lokasi : Touch and Find Zone'),
(78,'en','Watch Out the Crab!','watch-out-the-crab','Find out how hermit crabs spend their time inside tree truck with your magnifying glass. The warm wood chips or sand is a perfect spot for them to play.<br /><br />Location: Nurseries of the Sea'),
(78,'id','Watch Out The Crab!','watch-out-the-crab-2','Temukan apa saja yang dilakukan kelomang untuk menjalani hari-harinya dengan menggunakan kaca pembesar. Serpihan kayu atau pasir yang hangat adalah tempat favorit mereka untuk bermain.<br /><br />Lokasi: Nurseries of The Sea'),
(79,'en','Diving With Shark','diving-with-shark','Only here you can dive in our main tank where the Black Tip Reef Shark nestle. Our certified instructor is ready to accompany you to feel the experience. Only for licensed diver. Based on appointment. Please call us for further information. <br /><br />Location: Main Tank'),
(79,'id','Diving With Shark','diving-with-shark-2','Hanya di sini anda dapat menyelam ke sarang hiu karang. Instruktur bersertifikat kami siap memandu anda. Hanya untuk penyelam yang memiliki lisensi. Berdasarkan perjanjian. Hubungi kami untuk info lebih lanjut.<br /><br />Lokasi: Main Tank'),
(80,'en','Seatrekking','seatrekking','Don&rsquo;t have a diving license? You can still have the underwater adventure with this seatrekking activity. With a safety seatrek helmet, trace the handrail inside the main tank and be ready for the encounter with Black Blotch Stingray. Please call us for further info. <br /><br />Location: Main Tank'),
(80,'id','Seatrekking','seatrekking-2','Tidak memiliki lisensi menyelam? Anda masih bisa merasakan serunya petualangan bawah laut dengan aktivitas seatrek. Dengan helm oksigen, telusuri panduan di akuarium utama dan bersiaplah berpapasan dengan ikan pari hitam. Hubungi kami untuk info lebih lanjut. <br /><br />Lokasi: Main Tank'),
(81,'en','Create Your Own Fish','create-your-own-fish','Let your creativity play and create some cute fish as you wish. Color your favorite fish and scan your drawing. Let the fish swim freely on the screen.<br /><br />Location: Kid\'s Classroom'),
(81,'id','Create Your Own Fish','create-your-own-fish-2','Kembangkan kreativitasmu dan mulai membuat ikan-ikan lucu karyamu. Warnai ikan favoritmu dan scan hasilnya. Biarkan mereka berenang bebas di layar.<br /><br />Lokasi : Kid\'s Classroom'),
(82,'en','Sea Explorer','sea-explorer','Hop on and feel the sensation as if you ride a real submarine with your close ones while exploring the deep ocean.<br /><br />Location: 5D Theater'),
(82,'id','Sea Explorer','sea-explorer-2','Masuk dan rasakan sensasi seakan berada dalam sebuah kapal selam sungguhan sembari menjelajahi lautan.<br /><br />Lokasi : 5D Theater'),
(83,'en','Pearl of The South Sea','pearl-of-the-south-sea','<span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;An epic performance that tells a story of a King to his dear princess. This story is adapted from a local tale that take place in a kingdom in southern part of Java. Be ready to be dazzled by this magical performance that combine stage act, illusion trick and underwater dance.&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:13245,&quot;3&quot;:{&quot;1&quot;:0},&quot;5&quot;:{&quot;1&quot;:[{&quot;1&quot;:2,&quot;2&quot;:0,&quot;5&quot;:{&quot;1&quot;:2,&quot;2&quot;:0}},{&quot;1&quot;:0,&quot;2&quot;:0,&quot;3&quot;:3},{&quot;1&quot;:1,&quot;2&quot;:0,&quot;4&quot;:1}]},&quot;6&quot;:{&quot;1&quot;:[{&quot;1&quot;:2,&quot;2&quot;:0,&quot;5&quot;:{&quot;1&quot;:2,&quot;2&quot;:0}},{&quot;1&quot;:0,&quot;2&quot;:0,&quot;3&quot;:3},{&quot;1&quot;:1,&quot;2&quot;:0,&quot;4&quot;:1}]},&quot;7&quot;:{&quot;1&quot;:[{&quot;1&quot;:2,&quot;2&quot;:0,&quot;5&quot;:{&quot;1&quot;:2,&quot;2&quot;:0}},{&quot;1&quot;:0,&quot;2&quot;:0,&quot;3&quot;:3},{&quot;1&quot;:1,&quot;2&quot;:0,&quot;4&quot;:1}]},&quot;8&quot;:{&quot;1&quot;:[{&quot;1&quot;:2,&quot;2&quot;:0,&quot;5&quot;:{&quot;1&quot;:2,&quot;2&quot;:0}},{&quot;1&quot;:0,&quot;2&quot;:0,&quot;3&quot;:3},{&quot;1&quot;:1,&quot;2&quot;:0,&quot;4&quot;:1}]},&quot;10&quot;:1,&quot;11&quot;:4,&quot;12&quot;:0,&quot;15&quot;:&quot;Calibri&quot;,&quot;16&quot;:11}\">An epic performance that tells a story of a King to his dear princess. This story is adapted from a local tale that take place in a kingdom in southern part of Java. Be ready to be dazzled by this magical performance that combine stage act, illusion trick and underwater dance.</span>'),
(83,'id','Pearl of The South Sea','pearl-of-the-south-sea-2','<span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;Sebuah pertunjukan yang mengisahkan cinta kasih seorang raja terhadap putri kesayangannya. Kisah ini diadaptasi dari cerita rakyat yang berlokasi di sebuah kerajaan di bagian selatan Pulau Jawa. Bersiaplah untuk terpesona oleh pertunjukan yang menakjubkan, gabungan aksi panggung, trik ilusi dan tarian di bawah air.&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:13245,&quot;3&quot;:{&quot;1&quot;:0},&quot;5&quot;:{&quot;1&quot;:[{&quot;1&quot;:2,&quot;2&quot;:0,&quot;5&quot;:{&quot;1&quot;:2,&quot;2&quot;:0}},{&quot;1&quot;:0,&quot;2&quot;:0,&quot;3&quot;:3},{&quot;1&quot;:1,&quot;2&quot;:0,&quot;4&quot;:1}]},&quot;6&quot;:{&quot;1&quot;:[{&quot;1&quot;:2,&quot;2&quot;:0,&quot;5&quot;:{&quot;1&quot;:2,&quot;2&quot;:0}},{&quot;1&quot;:0,&quot;2&quot;:0,&quot;3&quot;:3},{&quot;1&quot;:1,&quot;2&quot;:0,&quot;4&quot;:1}]},&quot;7&quot;:{&quot;1&quot;:[{&quot;1&quot;:2,&quot;2&quot;:0,&quot;5&quot;:{&quot;1&quot;:2,&quot;2&quot;:0}},{&quot;1&quot;:0,&quot;2&quot;:0,&quot;3&quot;:3},{&quot;1&quot;:1,&quot;2&quot;:0,&quot;4&quot;:1}]},&quot;8&quot;:{&quot;1&quot;:[{&quot;1&quot;:2,&quot;2&quot;:0,&quot;5&quot;:{&quot;1&quot;:2,&quot;2&quot;:0}},{&quot;1&quot;:0,&quot;2&quot;:0,&quot;3&quot;:3},{&quot;1&quot;:1,&quot;2&quot;:0,&quot;4&quot;:1}]},&quot;10&quot;:1,&quot;11&quot;:4,&quot;12&quot;:0,&quot;15&quot;:&quot;Calibri&quot;,&quot;16&quot;:11}\">Sebuah pertunjukan yang mengisahkan cinta kasih seorang raja terhadap putri kesayangannya. Kisah ini diadaptasi dari cerita rakyat yang berlokasi di sebuah kerajaan di bagian selatan Pulau Jawa. Bersiaplah untuk terpesona oleh pertunjukan yang menakjubkan, gabungan aksi panggung, trik ilusi dan tarian di bawah air.</span>'),
(84,'en','Pingoo Restaurant','pingoo-restaurant','<span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;An American seafood and grill restaurant inspired by penguin habitat in southern hemisphere beach is located on LG Floor, Neo SOHO.\\n\\nEnjoy your meal on the beach deck and get closer to see and feed these penguins in Pingoo!&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:4993,&quot;3&quot;:{&quot;1&quot;:0},&quot;10&quot;:1,&quot;11&quot;:4,&quot;12&quot;:0,&quot;15&quot;:&quot;Calibri&quot;}\">An American seafood and grill restaurant inspired by penguin habitat in southern hemisphere beach is located on LG Floor, Neo SOHO.<br /><br />Enjoy your meal on the beach deck and get closer to see and feed these penguins in Pingoo!</span>'),
(84,'id','Pingoo Restaurant','pingoo-restaurant-2','<span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;\\nRestoran seafood and grill ala Amerika yang terinspirasi oleh habitat penguin asli di daerah pantai selatan ini terletak di Neo SOHO lantai LG.\\n\\n Nikmati santapan Anda di atas dek pantai dan dapatkan pengalaman melihat langsung dan memberi makan pinguin Humboldt lebih dekat di Pingoo!&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:13057,&quot;3&quot;:{&quot;1&quot;:0},&quot;11&quot;:4,&quot;12&quot;:0,&quot;15&quot;:&quot;Calibri&quot;,&quot;16&quot;:11}\"><br />Restoran seafood and grill ala Amerika yang terinspirasi oleh habitat penguin asli di daerah pantai selatan ini terletak di Neo SOHO lantai LG.<br /><br /> Nikmati santapan Anda di atas dek pantai dan dapatkan pengalaman melihat langsung dan memberi makan pinguin Humboldt lebih dekat di Pingoo!</span>'),
(85,'en','Ocean Wonders','ocean-wonders','<span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;Your visit at Jakarta Aquarium won\'t be complete without notable souvenirs. Get adorable merchandises of Jakarta Aquarium at Ocean Wonders store on LG floor.&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:6915,&quot;3&quot;:{&quot;1&quot;:0},&quot;4&quot;:{&quot;1&quot;:2,&quot;2&quot;:16777215},&quot;11&quot;:4,&quot;12&quot;:0,&quot;14&quot;:{&quot;1&quot;:2,&quot;2&quot;:0},&quot;15&quot;:&quot;Calibri&quot;}\">Your visit at Jakarta Aquarium won\'t be complete without notable souvenirs. Get adorable merchandises of Jakarta Aquarium at Ocean Wonders store on LG floor.</span>'),
(85,'id','Ocean Wonders','ocean-wonders-2','<span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;\\nPengalaman Anda di Jakarta Aquarium tidak lengkap tanpa souvenir yang berkesan. Dapatkan berbagai merchandise Jakarta Aquarium yang lucu dan menggemaskan di gerai Ocean Wonders yang berada di lantai LG.\\n&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:6915,&quot;3&quot;:{&quot;1&quot;:0},&quot;4&quot;:{&quot;1&quot;:2,&quot;2&quot;:16777215},&quot;11&quot;:4,&quot;12&quot;:0,&quot;14&quot;:{&quot;1&quot;:2,&quot;2&quot;:0},&quot;15&quot;:&quot;Calibri&quot;}\">Pengalaman Anda di Jakarta Aquarium tidak lengkap tanpa souvenir yang berkesan. Dapatkan berbagai merchandise Jakarta Aquarium yang lucu dan menggemaskan di gerai Ocean Wonders yang berada di lantai LG.<br /></span>'),
(86,'en','About Us','about-us','<p>Taman Safari Indonesia Group</p>\r\n<p>presents a cutting edge family recreation,</p>\r\n<p>Jakarta Aquarium.</p>'),
(86,'id','Tentang Kami','tentang-kami','<p>Taman Safari Indonesia Group</p>\r\n<p>mempersembahkan Jakarta Aquarium</p>\r\n<p>sebagai sarana rekreasi keluarga di tengah kota Jakarta.</p>'),
(87,'en','Special Package','special-package',''),
(87,'id','Paket Spesial','paket-spesial',''),
(88,'en','Career','career','<p>We are looking for a fun and dynamic person to join our team. Discover many interesting job opportunity and grow with us!</p>'),
(88,'id','Karir','karir','<p>Jakarta Aquarium mencari kandidat yang ceria dan dinamis untuk bergabung dengan tim kami. Temukan banyak kesempatan menarik dan berkembanglah bersama kami.<span style=\"text-decoration: underline;\"><br /></span></p>'),
(89,'en','Privacy Policy','privacy-policy',''),
(89,'id','Syarat Ketentuan','syarat-ketentuan',''),
(90,'en','Term of Use','term-of-use',''),
(90,'id','Ketentuan Penggunaan','ketentuan-penggunaan','<p><span class=\"bold\">Situs web ini dimiliki dan dioperasikan oleh PT. Jakarta Akuarium Indonesia dan Ketentuan Penggunaan berlaku untuk pengunjung dan pengguna situs (JAI website). Istilah \"Kami\" mengacu pada JAI (Jakarta Akuarium Indonesia), yang menyediakan situs untuk Anda, dan istilah \"Anda\" mengacu pada pengguna yang menerima Ketentuan Penggunaan. Jika Anda tidak setuju dengan Syarat Penggunaan, jangan menggunakan situs ini.</span></p>\r\n<p>&nbsp;</p>\r\n<h4 class=\"cyan-text text-darken-1\">1. Pembukaan</h4>\r\n<p>Terima kasih atas kunjungan Anda ke website kami, (*). Kami berharap bahwa kunjungan anda dapat bermanfaat dan memberikan kemudahan dalam mengakses dan menggunakan semua layanan yang tersedia pada website kami. Kami terus berupaya untuk memperbaiki dan meningkatkan kualitas layanan kami, dan akan menghargai setiap masukan, saran dan masukan dari Anda; Silakan Anda kirimkan kepada Kami melalui (email) atau telepon di +62 21 (*).</p>\r\n<p>&nbsp;</p>\r\n<h4 class=\"cyan-text text-darken-1\">2. Umum dan Penerimaan Persyaratan</h4>\r\n<p>Dengan mengakses dan menggunakan Situs dan Layanan, Anda menyatakan telah membaca, memahami, setuju dan tunduk pada Syarat dan Ketentuan (website) ini. Jika Anda tidak setuju dengan Syarat dan Ketentuan (website), baik seluruhnya atau sebagian, maka Anda tidak diizinkan untuk mengakses website ini atau menggunakan layanan yang kami berikan.<br /><br />Syarat dan Ketentuan (website) terdiri dari (i) syarat dan ketentuan umum yang berlaku untuk setiap akses dan layanan yang tersedia di situs, dan (ii) syarat dan ketentuan yang mengatur kondisi lebih lanjut dari penggunaan produk atau jasa tertentu.<br /><br />Syarat dan Ketentuan Penggunaan (website) dapat / mungkin kami ubah, modifikasi, menambah, menghapus atau koreksi setiap saat dan setiap perubahan yang berlaku dari waktu kami dinyatakan tidak berlaku atau pada waktu lain yang ditentukan oleh Kami; Kami menyarankan Anda untuk mengunjungi situs kami secara teratur untuk menyadari perubahan ini.</p>\r\n<p>&nbsp;</p>\r\n<h3>&nbsp;</h3>'),
(91,'en','Sightseeing','sightseeing','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidale laborum et dolorem magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation autem.</p>'),
(91,'id','Sightseeing','sightseeing-2','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidale laborum et dolorem magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation autem.</p>'),
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
(99,'en','Welcome to Jakarta Aquarium','welcome-to-jakarta-aquarium','<p><strong>Jakarta, September 8<sup>th</sup> 2016</strong> - Celebrating the 30th anniversary Taman Safari Indonesia Group proudly present Jakarta Aquarium, a next generation family recreational and edutainment center from Indonesia&rsquo;s leading conservation institute and family recreation. Jakarta Aquarium located in the newest Agung Podomoro Land leisure district, Neo Soho, in West Jakarta will be open for public on December 2016. The ultimate boutique aquarium is a result of extensive collaboration of world class artists and designers, delivering an extraordinary journey to Indonesia&rsquo;s mega biodiversity.<br /><br /></p>\r\n<p>Providing escapism from the urban lifestyle, Jakarta Aquarium will provide an integrated family leisure of education and entertainment. Explore the beauty of Indonesian nature through the exotic leopard whipray, giant pacific octopus, blacktip reef shark, and coconut crab. Not to mention the cute living exhibition of Humboldt penguin in the penguin themed restaurant. Have fun by experiencing dive in the giant tank and seatrekking with professional guide while kids could enjoy the interactive multimedia activity in the kids&rsquo; zone.</p>\r\n<p><br />Jakarta Aquarium uniquely presents a theatrical underwater performance inspired by Indonesian folklore directed by Peter Wilson. The underwater show is a must-see for all ages.<br /><br /></p>\r\n<p>Visit and be mesmerize by Jakarta Aquarium coming soon at LG and LGM floor in Neo Soho Jakarta.</p>\r\n<p>&nbsp;</p>'),
(99,'id','Welcome to Jakarta Aquarium','welcome-to-jakarta-aquarium-2','<p><strong>Jakarta, September 8<sup>th</sup> 2016</strong> - Celebrating the 30th anniversary Taman Safari Indonesia Group proudly present Jakarta Aquarium, a next generation family recreational and edutainment center from Indonesia&rsquo;s leading conservation institute and family recreation. Jakarta Aquarium located in the newest Agung Podomoro Land leisure district, Neo Soho, in West Jakarta will be open for public on December 2016. The ultimate boutique aquarium is a result of extensive collaboration of world class artists and designers, delivering an extraordinary journey to Indonesia&rsquo;s mega biodiversity.<br /><br /></p>\r\n<p>Providing escapism from the urban lifestyle, Jakarta Aquarium will provide an integrated family leisure of education and entertainment. Explore the beauty of Indonesian nature through the exotic leopard whipray, giant pacific octopus, blacktip reef shark, and coconut crab. Not to mention the cute living exhibition of Humboldt penguin in the penguin themed restaurant. Have fun by experiencing dive in the giant tank and seatrekking with professional guide while kids could enjoy the interactive multimedia activity in the kids&rsquo; zone.</p>\r\n<p><br />Jakarta Aquarium uniquely presents a theatrical underwater performance inspired by Indonesian folklore directed by Peter Wilson. The underwater show is a must-see for all ages.<br /><br /></p>\r\n<p>Visit and be mesmerize by Jakarta Aquarium coming soon at LG and LGM floor in Neo Soho Jakarta.</p>\r\n<p>&nbsp;</p>'),
(101,'en','Promosi Satu','promosi-satu','Ini promosi pertama di JAI'),
(101,'id','','','');

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
(72,17),
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
(17,48,'featured'),
(18,45,'featured'),
(72,57,'featured'),
(73,66,'featured'),
(77,67,'featured'),
(78,68,'featured'),
(79,69,'featured'),
(80,72,'featured'),
(81,73,'featured'),
(95,74,'featured'),
(98,75,'featured'),
(99,75,'featured'),
(101,75,'featured');

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
) ENGINE=InnoDB AUTO_INCREMENT=266 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `post_metas` */

insert  into `post_metas`(`id`,`post_id`,`meta_key`,`meta_value`) values 
(26,72,'meta_description-en','META (ENG)'),
(27,72,'meta_description-id','Meta (ID)'),
(64,86,'meta_description-en','All about JAI'),
(65,86,'meta_description-id','Semua tentang JAI'),
(66,86,'philosophy-en',''),
(67,86,'philosophy-id',''),
(68,86,'story-en','<p>Located in NEO Soho, a shopping center in West Jakarta, make Jakarta Aquarium accessible from all corners of the city.</p>\r\n<p>The combination of Indonesian biodiversity, the beauty of Indonesian heritage, and technology will become the main attraction for you and your family to escape from the midst of the capital\'s busy lifestyle.</p>'),
(69,86,'story-id','<p>Terletak di Neo SOHO, salah satu pusat perbelanjaan di daerah Jakarta Barat, membuat Jakarta Aquarium sangat mudah diakses dari segala penjuru kota.</p>\r\n<p>Perpaduan keanekaragaman hayati Indonesia, keindahan budaya, dan teknologi merupakan daya tarik utama Jakarta Aquarium di tengah kesibukan ibu kota bagi Anda dan keluarga.</p>'),
(78,90,'meta_description-en','Term & Condition of Jakarta Aquarium Indonesia'),
(79,90,'meta_description-id','Syarat dan Ketentuan Jakarta Aquarium Indonesia'),
(82,97,'openingHours-en','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor crasher malarki requiem predantia incididunt ut labore et dolore magna aliqua. Ut eni ad minim veniam, quisiom nostrud at autumn irure dor in reprehenderit exercitation.</p>\r\n<ul class=\"uk-list\">\r\n<li>Weekday (Monday - Thursday) : 08.00 a.m. - 07.00 p.m.</li>\r\n<li>Weekend (Friday - Sunday) : 08.00 a.m. - 09.00 p.m.</li>\r\n</ul>'),
(83,97,'openingHours-id','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor crasher malarki requiem predantia incididunt ut labore et dolore magna aliqua. Ut eni ad minim veniam, quisiom nostrud at autumn irure dor in reprehenderit exercitation.</p>\r\n<ul class=\"uk-list\">\r\n<li>Weekday (Monday - Thursday) : 08.00 a.m. - 07.00 p.m.</li>\r\n<li>Weekend (Friday - Sunday) : 08.00 a.m. - 09.00 p.m.</li>\r\n</ul>'),
(176,97,'parkingTitle-en','test'),
(177,97,'parkingTitle-id',''),
(178,97,'parkingDesc-en','test test'),
(179,97,'parkingDesc-id',''),
(180,97,'vipTitle-en','VIP'),
(181,97,'vipTitle-id',''),
(182,97,'vipDesc-en','asdfasdf'),
(183,97,'vipDesc-id',''),
(188,97,'bikeRackTitle-en','qeqwe'),
(189,97,'bikeRackTitle-id',''),
(190,97,'bikeRackDesc-en','qweqwe'),
(191,97,'bikeRackDesc-id',''),
(192,97,'shuttleBusTitle-en','ds'),
(193,97,'shuttleBusTitle-id',''),
(194,97,'shuttleBusDesc-en','sdsdf'),
(195,97,'shuttleBusDesc-id',''),
(196,97,'blueBirdTitle-en','xzcv'),
(197,97,'blueBirdTitle-id',''),
(198,97,'blueBirdDesc-en','sfsfs'),
(199,97,'blueBirdDesc-id',''),
(200,97,'publicBusTitle-en','yuyt'),
(201,97,'publicBusTitle-id',''),
(202,97,'publicBusDesc-en','ghhn'),
(203,97,'publicBusDesc-id',''),
(218,99,'whats_on','1'),
(219,99,'featured','1'),
(220,96,'openingHours-en','<p>Spend the whole day in Jakarta Aquarium with your family. Check our opening hours and do not miss a single attraction.</p>\r\n<ul class=\"uk-list\">\r\n<li>Weekday (Monday - Thursday) : 08.00 a.m. - 07.00 p.m.</li>\r\n<li>Weekend (Friday - Sunday) : 08.00 a.m. - 09.00 p.m.</li>\r\n</ul>'),
(221,96,'openingHours-id','<p>Habiskan waktu seharian di Jakarta Aquarium bersama keluarga Anda. Cek waktu operasional kami dan jangan lewatkan satu atraksi pun.</p>\r\n<ul class=\"uk-list\">\r\n<li>Weekday (Monday - Thursday) : 08.00 a.m. - 07.00 p.m.</li>\r\n<li>Weekend (Friday - Sunday) : 08.00 a.m. - 09.00 p.m.</li>\r\n</ul>'),
(222,91,'firstBox-en','<p class=\"uk-margin-remove\">Feel the sensation of riding a real submarine through this 5-D theater while exploring the deep ocean.</p>'),
(223,91,'firstBox-id','<p class=\"uk-margin-remove\">Contains more than</p>\r\n<h2 class=\"uk-margin-remove font-intro amber-text text-darken-1\">14,820&nbsp;ANIMALS</h2>\r\n<p class=\"uk-margin-remove\">in seawater, freshwater and land</p>'),
(224,91,'secondBox-en','<p class=\"uk-margin-remove\">Holds more than</p>\r\n<h2 class=\"uk-margin-remove font-intro amber-text text-darken-1\">120 PROGRAMS</h2>\r\n<p class=\"uk-margin-remove\">for attractions and edutainment</p>'),
(225,91,'secondBox-id','<p class=\"uk-margin-remove\">Holds more than</p>\r\n<h2 class=\"uk-margin-remove font-intro amber-text text-darken-1\">120 PROGRAMS</h2>\r\n<p class=\"uk-margin-remove\">for attractions and edutainment</p>'),
(226,91,'thirdBox-en','<p class=\"uk-margin-remove\">Located in the large</p>\r\n<h2 class=\"uk-margin-remove font-intro amber-text text-darken-1\">LEISURE DISTRICTS</h2>\r\n<p class=\"uk-margin-remove\">include 3 malls, hotels, and parks</p>'),
(227,91,'thirdBox-id','<p class=\"uk-margin-remove\">Located in the large</p>\r\n<h2 class=\"uk-margin-remove font-intro amber-text text-darken-1\">LEISURE DISTRICTS</h2>\r\n<p class=\"uk-margin-remove\">include 3 malls, hotels, and parks</p>'),
(228,91,'fourthBox-en','<p class=\"uk-margin-remove\">Contains more than</p>\r\n<h2 class=\"uk-margin-remove font-intro amber-text text-darken-1\">14,820&nbsp;ANIMALS</h2>\r\n<p class=\"uk-margin-remove\">in seawater, freshwater and land</p>'),
(229,91,'fourthBox-id','<p class=\"uk-margin-remove\">Contains more than</p>\r\n<h2 class=\"uk-margin-remove font-intro amber-text text-darken-1\">14,820&nbsp;ANIMALS</h2>\r\n<p class=\"uk-margin-remove\">in seawater, freshwater and land</p>'),
(232,97,'afterMap-en','<p>teadfasdfadf</p>'),
(233,97,'afterMap-id','<p>teadfasdfadf</p>'),
(234,97,'lockerTitle-en','Locker'),
(235,97,'lockerTitle-id',''),
(236,97,'lockerDesc-en','Jakarta Aquarium provides locker facility for visitor convenient in lobby area. Visitor can use the locker with deposit.'),
(237,97,'lockerDesc-id',''),
(238,97,'restroomTitle-en','Restroom and Shower Room'),
(239,97,'restroomTitle-id',''),
(240,97,'restroomDesc-en','Restroom and shower room is located on LG level in Rivers of Indonesia zone. Shower room with ameneties and towel is ready for you to freshen up after diving or seatrekking.'),
(241,97,'restroomDesc-id',''),
(242,97,'wheelchairTitle-en','Wheelchair Access'),
(243,97,'wheelchairTitle-id',''),
(244,97,'wheelchairDesc-en','Jakarta Aquarium is specially designed to ensure visitor convenient. One dedicated access for visitor with wheelchair is available.'),
(245,97,'wheelchairDesc-id',''),
(246,97,'babyTitle-en','Baby Changing Room'),
(247,97,'babyTitle-id',''),
(248,97,'babyDesc-en','To comply your baby\'s comfort, Jakarta Aquarium provides nursery room that is available on LG level, in Rivers of Indonesia zone'),
(249,97,'babyDesc-id',''),
(250,97,'wifiTitle-en','Wifi'),
(251,97,'wifiTitle-id',''),
(252,97,'wifiDesc-en','Access our wifi to maximize your visit. Download Jakarta Aquarium application and play the Treasure Hunt games that can be activated with the Wifi.'),
(253,97,'wifiDesc-id',''),
(254,97,'cafeTitle-en','Cafetaria'),
(255,97,'cafeTitle-id',''),
(256,97,'cafeDesc-en','Snacks and beverages are available to accompany your visit while look after your kids. Cafetaria is located on LG floor in Rivers of Indonesia zone.'),
(257,97,'cafeDesc-id',''),
(258,97,'souvenirTitle-en','Souvenir'),
(259,97,'souvenirTitle-id',''),
(260,97,'souvenirDesc-en','Your journey is not complete without the cool stuff from Ocean Wonders. Located on LG floor, right after the aquarium exit.'),
(261,97,'souvenirDesc-id',''),
(262,97,'restaurantTitle-en','Restaurant'),
(263,97,'restaurantTitle-id',''),
(264,97,'restaurantDesc-en','Restaurant detail'),
(265,97,'restaurantDesc-id','');

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
(1,'Post','post','2016-10-13 10:32:05','2016-10-13 10:32:05'),
(2,'News','news','2016-10-26 10:44:06','2016-10-26 10:44:06'),
(3,'Attraction and Experience','attraction-and-experience','2016-10-13 12:13:53','2016-10-13 12:13:53'),
(4,'Media Room','media-room','2016-11-05 06:22:54','2016-11-05 06:22:57'),
(5,'Career','career','2016-11-14 05:53:44','2016-11-14 05:53:44'),
(6,'Page','page','2016-11-21 16:00:00','2016-11-21 16:00:00'),
(7,'Promo','promo','2017-01-11 14:15:10','2017-01-11 14:15:13');

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
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `posts` */

insert  into `posts`(`id`,`post_type_id`,`created_at`,`updated_at`,`status`,`publish_date`,`created_by`) values 
(17,1,'2016-10-22 11:20:17','2016-10-27 10:34:17','PUBLISH','2016-10-22 11:19:00',1),
(18,1,'2016-10-24 03:40:55','2016-10-24 10:15:16','PUBLISH','2016-10-24 03:35:00',1),
(72,3,'2016-11-10 10:26:45','2016-11-16 08:40:34','PUBLISH','2016-11-10 10:04:00',3),
(73,3,'2016-11-11 10:33:49','2016-11-16 09:07:10','PUBLISH','2016-11-11 10:33:00',3),
(77,3,'2016-11-16 09:13:23','2016-11-16 09:13:23','PUBLISH','2016-11-16 09:08:00',3),
(78,3,'2016-11-16 09:17:01','2016-11-16 09:17:01','PUBLISH','2016-11-16 09:13:00',3),
(79,3,'2016-11-16 09:25:47','2016-11-16 09:25:47','PUBLISH','2016-11-16 09:21:00',3),
(80,3,'2016-11-16 09:36:09','2016-11-16 09:40:32','PUBLISH','2016-11-16 09:31:00',3),
(81,3,'2016-11-16 09:44:08','2016-11-16 09:44:08','PUBLISH','2016-11-16 09:41:00',3),
(82,3,'2016-11-16 09:47:33','2016-12-08 05:52:30','PUBLISH','2016-11-16 09:44:00',3),
(83,3,'2016-11-16 09:49:46','2016-12-08 05:57:33','PUBLISH','2016-11-16 09:48:00',3),
(84,3,'2016-11-16 09:50:32','2016-12-08 06:03:18','PUBLISH','2016-11-16 09:49:00',3),
(85,3,'2016-11-16 09:52:24','2016-12-08 06:04:57','PUBLISH','2016-11-16 09:51:00',3),
(86,6,'2016-11-22 07:41:01','2016-12-05 07:31:25','PUBLISH','2016-11-22 07:40:00',1),
(87,6,'2016-11-22 07:41:21','2016-11-22 07:41:21','PUBLISH','2016-11-22 07:41:00',1),
(88,6,'2016-11-22 07:41:36','2016-12-08 05:42:19','PUBLISH','2016-11-22 07:41:00',1),
(89,6,'2016-11-22 07:42:01','2016-11-22 07:42:01','PUBLISH','2016-11-22 07:41:00',1),
(90,6,'2016-11-22 07:42:42','2016-12-21 11:09:30','PUBLISH','2016-11-22 07:42:00',1),
(91,6,'2016-12-02 01:13:54','2017-01-09 10:22:00','PUBLISH','2016-12-02 01:13:00',1),
(92,4,'2016-12-05 07:41:21','2016-12-05 08:05:51','PUBLISH','2016-12-05 07:38:00',3),
(93,4,'2016-12-05 07:43:26','2016-12-05 08:18:35','PUBLISH','2016-12-05 07:43:00',3),
(94,4,'2016-12-05 07:45:54','2016-12-05 08:19:48','PUBLISH','2016-12-05 07:44:00',3),
(95,4,'2016-12-05 08:10:30','2016-12-05 08:12:51','PUBLISH','2016-12-05 08:08:00',3),
(96,6,'2016-12-22 19:18:42','2017-01-08 09:50:45','PUBLISH','2016-12-22 19:18:00',1),
(97,6,'2016-12-22 19:22:03','2017-01-11 13:29:25','PUBLISH','2016-12-22 19:21:00',1),
(98,6,'2017-01-05 16:24:07','2017-01-05 16:33:57','PUBLISH','2017-01-05 16:23:00',1),
(99,2,'2017-01-06 16:19:50','2017-01-06 16:42:21','PUBLISH','2017-01-06 16:19:00',1),
(101,7,'2017-01-11 14:09:58','2017-01-11 14:32:16','PUBLISH','2017-01-11 14:09:00',1);

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
(26,4),
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
(3,'Author','2016-10-12 12:11:37','2016-10-12 12:11:37'),
(4,'Semi Admin','2016-10-13 09:34:12','2016-10-13 09:34:12');

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
('NNqoWdUr6yqT7LKoQbTkiHMgv5HeKqtGhowaIDRp',1,'192.168.10.1','Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36','YTo2OntzOjY6Il90b2tlbiI7czo0MDoic1psN3dyN0tQTFBLYTM2Um9mMzR6ek0wQzFUQW55RW9ibG1CbDN0aiI7czo0OiJsYW5nIjtzOjI6ImVuIjtzOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM0OiJodHRwOi8vcGF5bWVudC5qYWkvZW4vdGlja2V0LWhvdXJzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfc2YyX21ldGEiO2E6Mzp7czoxOiJ1IjtpOjE0ODQyMjAyMTY7czoxOiJjIjtpOjE0ODQyMTM1OTM7czoxOiJsIjtzOjE6IjAiO319',1484220217),
('zzLBphg016HrAm1rj7X3b4fgKuvBqaVwNUVZZQqo',1,'192.168.10.1','Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36','YTo2OntzOjY6Il90b2tlbiI7czo0MDoibFdvZ2xReUtET0FtQ1IyYVlkUm1YeE5NWDUzZ1JKbXNFcmZ5NlFqVyI7czo0OiJsYW5nIjtzOjI6ImlkIjtzOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI3OiJodHRwOi8vamFpLmRldi9pZC9zaG93LXRpbWUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjk6Il9zZjJfbWV0YSI7YTozOntzOjE6InUiO2k6MTQ4NDIyMjIwNjtzOjE6ImMiO2k6MTQ4NDIxMzIwOTtzOjE6ImwiO3M6MToiMCI7fX0=',1484222206);

/*Table structure for table `settings` */

DROP TABLE IF EXISTS `settings`;

CREATE TABLE `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `settings` */

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
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `show_details` */

insert  into `show_details`(`id`,`show_id`,`title`,`slug`,`lang`,`content`) values 
(23,8,'Coral Reef Story Time (English)','coral-reef-story-time-english','en','At vero eos et accusamus et iusto odio madeline dignis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo mallera consequat aller proident.<br />At vero eos et accusamus et iusto odio madeline dignis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo mallera consequat aller proident.<br />At vero eos et accusamus et iusto odio madeline dignis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo mallera consequat aller proident.'),
(24,8,'Coral Reef Story Time (ID)','coral-reef-story-time-id','id','At vero eos et accusamus et iusto odio madeline dignis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo mallera consequat aller proident.<br />At vero eos et accusamus et iusto odio madeline dignis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo mallera consequat aller proident.<br />At vero eos et accusamus et iusto odio madeline dignis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo mallera consequat aller proident.'),
(27,10,'Particular Show','particular-show','en','At vero eos et accusamus et iusto odio madeline dignis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo mallera consequat aller proident.'),
(28,10,'Pertunjukan Musiman','pertunjukan-musiman','id','At vero eos et accusamus et iusto odio madeline dignis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo mallera consequat aller proident.'),
(31,9,'Limited Show','limited-show','en','At vero eos et accusamus et iusto odio madeline dignis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo mallera consequat aller proident.'),
(32,9,'Pertunjukan Terbatas','pertunjukan-terbatas','id','At vero eos et accusamus et iusto odio madeline dignis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo mallera consequat aller proident.');

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

insert  into `show_has_medias`(`id`,`show_id`,`media_id`,`media_type`) values 
(4,8,52,'featured');

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

insert  into `show_metas`(`id`,`show_id`,`meta_key`,`meta_value`) values 
(9,8,'meta_description-en','Show Meta (EN)'),
(10,8,'meta_description-id','Show Meta (ID)');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `shows` */

insert  into `shows`(`id`,`show_type`,`created_by`,`created_at`,`updated_at`,`day`,`start_date`,`end_date`,`start_time`,`end_time`) values 
(8,1,3,'2016-11-10 10:31:53','2016-11-10 10:41:49',5,'1970-01-01','1970-01-01','14:00:00','00:00:00'),
(9,3,3,'2016-11-11 10:11:05','2016-11-11 10:31:51',1,'2016-11-09','2016-11-15','13:00:00','00:00:00'),
(10,2,3,'2016-11-11 10:12:32','2016-11-11 10:12:32',5,'1970-01-01','1970-01-01','11:00:00','00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `slider_items` */

insert  into `slider_items`(`id`,`slider_id`,`lang`,`content`,`link`,`file_name`,`order`) values 
(5,6,'en','HERE YOU WILL MEET FACE-TO-FACE WITH THE TAME PREDATORS','#','bg-section-sight.png',0),
(6,6,'id','DISINI KALIAN AKAN BERHADAPANG LANGSUNG DENGAN HIU PREDATOR','#','head-sample-03.jpg',0),
(9,6,'en','EXPLORE A HUNDRED OF BEAUTIFUL JELLIES IN A DARK TANK','#','head-sample-01.jpg',1),
(10,6,'id','DISINI KALIAN AKAN BERTEMU DENGAN FINDING DORI','#','head-sample-01.jpg',1),
(11,7,'en','Be ready to be dazzled by this magical performance that combine stage act, illusion trick and underwater dance.','javascript:;','showtime-header.jpg',0),
(12,7,'id','Bersiaplah untuk terpesona oleh pertunjukan yang menakjubkan, gabungan aksi panggung, trik ilusi dan tarian di bawah air.','javascript:;','showtime-header.jpg',0);

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
(6,'Homeslider',3,'2016-10-26 19:05:00','2016-10-25 11:08:43','2016-10-25 12:07:46'),
(7,'PEARL OF THE SOUTH SEA',1,'2017-01-05 16:37:00','2017-01-05 16:38:27','2017-01-05 16:38:27');

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
(1,'Pasha Mahardika','me@pashamahardika.com','$2y$10$Ys8gQPnelcFYGY7vVzKe/OHSzXBLNyqPGz9DTHFp9MZGzRa7djpb.','qqGvqJsdAWFcPsWJW0x38YxHYpxQCCKvDPDzvw1qqVrwpVn18Fs6PmQUdomQ','2016-10-11 19:35:26','2016-12-02 09:03:19'),
(3,'Edwina Trianinda','trianinda.edwina@gmail.com','$2y$10$iWVk/vWv/R3oa1ipa.pVgem6ypOZvDLW.F4jnbxEVODJFxbKgKHRa','c5jCFR3VIoX6rKN8nyVbudjeOTbPFH95N2Mkld6uLF3cTL0TRbVHrGvSE2s8','2016-10-11 23:41:14','2016-11-19 05:48:45');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
