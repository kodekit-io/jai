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


/*Table structure for table `cimb_credit_checkouts` */

DROP TABLE IF EXISTS `cimb_credit_checkouts`;

CREATE TABLE `cimb_credit_checkouts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) unsigned NOT NULL,
  `process_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `txn_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `txn_signature` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `secure_signature` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tran_date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sales_date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `response_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `response_desc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `merchant_tranid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customer_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fr_level` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fr_score` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
