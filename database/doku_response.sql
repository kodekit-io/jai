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

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
