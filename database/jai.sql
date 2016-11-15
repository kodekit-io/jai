/*
SQLyog Community
MySQL - 5.7.12-0ubuntu1.1 : Database - jai
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `categories` */

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

insert  into `categories`(`id`,`post_type_id`,`name`,`slug`,`description`,`created_at`,`updated_at`,`parent_id`) values (1,1,'News','news',NULL,'2016-10-21 20:40:03','2016-10-21 20:40:03',0);
insert  into `categories`(`id`,`post_type_id`,`name`,`slug`,`description`,`created_at`,`updated_at`,`parent_id`) values (2,1,'What\'s On','whats-on',NULL,'2016-10-22 09:59:54','2016-10-22 09:59:54',0);
insert  into `categories`(`id`,`post_type_id`,`name`,`slug`,`description`,`created_at`,`updated_at`,`parent_id`) values (3,2,'Test Category','test-category',NULL,NULL,NULL,0);
insert  into `categories`(`id`,`post_type_id`,`name`,`slug`,`description`,`created_at`,`updated_at`,`parent_id`) values (15,1,'Coba','coba',NULL,'2016-10-22 10:46:19','2016-10-22 10:46:19',0);
insert  into `categories`(`id`,`post_type_id`,`name`,`slug`,`description`,`created_at`,`updated_at`,`parent_id`) values (17,3,'Experience','experience',NULL,NULL,NULL,0);
insert  into `categories`(`id`,`post_type_id`,`name`,`slug`,`description`,`created_at`,`updated_at`,`parent_id`) values (18,3,'Shows & Attraction','shows-attraction',NULL,NULL,NULL,0);
insert  into `categories`(`id`,`post_type_id`,`name`,`slug`,`description`,`created_at`,`updated_at`,`parent_id`) values (19,3,'Dining & Shopping','dining-shopping',NULL,NULL,NULL,0);
insert  into `categories`(`id`,`post_type_id`,`name`,`slug`,`description`,`created_at`,`updated_at`,`parent_id`) values (21,4,'Animals','animals',NULL,NULL,NULL,0);
insert  into `categories`(`id`,`post_type_id`,`name`,`slug`,`description`,`created_at`,`updated_at`,`parent_id`) values (22,4,'Conservation','conservation',NULL,NULL,NULL,0);
insert  into `categories`(`id`,`post_type_id`,`name`,`slug`,`description`,`created_at`,`updated_at`,`parent_id`) values (23,4,'Event','event',NULL,NULL,NULL,0);
insert  into `categories`(`id`,`post_type_id`,`name`,`slug`,`description`,`created_at`,`updated_at`,`parent_id`) values (24,4,'Research','research',NULL,NULL,NULL,0);
insert  into `categories`(`id`,`post_type_id`,`name`,`slug`,`description`,`created_at`,`updated_at`,`parent_id`) values (25,4,'Leadership','leadership',NULL,NULL,NULL,0);

/*Table structure for table `coupons` */

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

/*Table structure for table `holidays` */

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

insert  into `holidays`(`id`,`title`,`date`,`description`,`created_by`,`created_at`,`updated_at`) values (3,'Lebaran Misalnya','2016-10-15','Lebaran sebentar lagi',3,'2016-10-28 22:07:42','2016-10-28 22:07:42');
insert  into `holidays`(`id`,`title`,`date`,`description`,`created_by`,`created_at`,`updated_at`) values (4,'Lebaran Misalnya','2016-10-16','Lebaran sebentar lagi',3,'2016-10-28 22:07:42','2016-10-28 22:07:42');
insert  into `holidays`(`id`,`title`,`date`,`description`,`created_by`,`created_at`,`updated_at`) values (5,'Lebaran Misalnya','2016-10-17','Lebaran sebentar lagi',3,'2016-10-28 22:07:42','2016-10-28 22:07:42');
insert  into `holidays`(`id`,`title`,`date`,`description`,`created_by`,`created_at`,`updated_at`) values (6,'Lebaran Misalnya','2016-10-18','Lebaran sebentar lagi',3,'2016-10-28 22:07:42','2016-10-28 22:07:42');
insert  into `holidays`(`id`,`title`,`date`,`description`,`created_by`,`created_at`,`updated_at`) values (7,'Lebaran Misalnya','2016-10-19','Lebaran sebentar lagi',3,'2016-10-28 22:07:42','2016-10-28 22:07:42');
insert  into `holidays`(`id`,`title`,`date`,`description`,`created_by`,`created_at`,`updated_at`) values (8,'Lebaran Misalnya','2016-10-20','Lebaran sebentar lagi',3,'2016-10-28 22:07:42','2016-10-28 22:07:42');
insert  into `holidays`(`id`,`title`,`date`,`description`,`created_by`,`created_at`,`updated_at`) values (9,'Lebaran Misalnya','2016-10-21','Lebaran sebentar lagi',3,'2016-10-28 22:07:42','2016-10-28 22:07:42');

/*Table structure for table `media` */

CREATE TABLE `media` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `media` */

insert  into `media`(`id`,`title`,`file_name`,`description`,`created_at`,`updated_at`) values (43,'AiPzG1F86wWs.jpg','AiPzG1F86wWs.jpg',NULL,'2016-10-19 21:33:06','2016-10-19 21:33:06');
insert  into `media`(`id`,`title`,`file_name`,`description`,`created_at`,`updated_at`) values (44,'4FdyA3zYcuZ2.jpg','4FdyA3zYcuZ2.jpg',NULL,'2016-10-19 21:33:54','2016-10-19 21:33:54');
insert  into `media`(`id`,`title`,`file_name`,`description`,`created_at`,`updated_at`) values (45,'bg-sec2-twb.jpg','bg-sec2-twb.jpg',NULL,'2016-10-19 21:35:25','2016-10-19 21:35:25');
insert  into `media`(`id`,`title`,`file_name`,`description`,`created_at`,`updated_at`) values (46,'under the sea.jpg','under the sea.jpg',NULL,'2016-10-21 20:22:09','2016-10-21 20:22:09');
insert  into `media`(`id`,`title`,`file_name`,`description`,`created_at`,`updated_at`) values (47,'street.jpg','street.jpg',NULL,'2016-10-21 20:24:03','2016-10-21 20:24:03');
insert  into `media`(`id`,`title`,`file_name`,`description`,`created_at`,`updated_at`) values (48,'river.jpg','river.jpg',NULL,'2016-10-21 20:25:05','2016-10-21 20:25:05');
insert  into `media`(`id`,`title`,`file_name`,`description`,`created_at`,`updated_at`) values (49,'boat.jpg','boat.jpg',NULL,'2016-10-21 20:25:37','2016-10-21 20:25:37');
insert  into `media`(`id`,`title`,`file_name`,`description`,`created_at`,`updated_at`) values (50,'test.jpg','test.jpg',NULL,'2016-10-22 18:08:10','2016-10-22 18:08:10');
insert  into `media`(`id`,`title`,`file_name`,`description`,`created_at`,`updated_at`) values (51,'head-sample-03.jpg','head-sample-03.jpg',NULL,'2016-10-28 15:09:59','2016-10-28 15:09:59');
insert  into `media`(`id`,`title`,`file_name`,`description`,`created_at`,`updated_at`) values (52,'head-sample-01.jpg','head-sample-01.jpg',NULL,'2016-10-28 15:10:46','2016-10-28 15:10:46');
insert  into `media`(`id`,`title`,`file_name`,`description`,`created_at`,`updated_at`) values (53,'about-header.jpg','about-header.jpg',NULL,'2016-11-02 19:32:31','2016-11-02 19:32:31');
insert  into `media`(`id`,`title`,`file_name`,`description`,`created_at`,`updated_at`) values (54,'bg-section-sight.png','bg-section-sight.png',NULL,'2016-11-02 19:32:36','2016-11-02 19:32:36');
insert  into `media`(`id`,`title`,`file_name`,`description`,`created_at`,`updated_at`) values (55,'img-sample-01.jpg','img-sample-01.jpg',NULL,'2016-11-02 19:32:48','2016-11-02 19:32:48');
insert  into `media`(`id`,`title`,`file_name`,`description`,`created_at`,`updated_at`) values (56,'about-header.jpg','about-header.jpg',NULL,'2016-11-05 15:42:15','2016-11-05 15:42:15');
insert  into `media`(`id`,`title`,`file_name`,`description`,`created_at`,`updated_at`) values (57,'img-news-01.jpg','img-news-01.jpg',NULL,'2016-11-10 18:26:27','2016-11-10 18:26:27');
insert  into `media`(`id`,`title`,`file_name`,`description`,`created_at`,`updated_at`) values (58,'img-news-02.jpg','img-news-02.jpg',NULL,'2016-11-11 18:34:41','2016-11-11 18:34:41');
insert  into `media`(`id`,`title`,`file_name`,`description`,`created_at`,`updated_at`) values (59,'img-news-03.jpg','img-news-03.jpg',NULL,'2016-11-11 18:34:57','2016-11-11 18:34:57');
insert  into `media`(`id`,`title`,`file_name`,`description`,`created_at`,`updated_at`) values (60,'img-news-04.jpg','img-news-04.jpg',NULL,'2016-11-11 18:34:58','2016-11-11 18:34:58');
insert  into `media`(`id`,`title`,`file_name`,`description`,`created_at`,`updated_at`) values (61,'img-news-05.jpg','img-news-05.jpg',NULL,'2016-11-11 18:34:59','2016-11-11 18:34:59');
insert  into `media`(`id`,`title`,`file_name`,`description`,`created_at`,`updated_at`) values (62,'img-sample-01.jpg','img-sample-01.jpg',NULL,'2016-11-11 18:35:01','2016-11-11 18:35:01');

/*Table structure for table `media_sizes` */

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
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `menus` */

insert  into `menus`(`id`,`name`,`display`,`link`,`parent_id`,`permission`,`icon_class`,`description`,`created_at`,`updated_at`,`order`,`menu_type`) values (1,'dashboard','Dashboard','jai-backend',0,'dashboard','icon-home',NULL,NULL,NULL,0,'backend');
insert  into `menus`(`id`,`name`,`display`,`link`,`parent_id`,`permission`,`icon_class`,`description`,`created_at`,`updated_at`,`order`,`menu_type`) values (2,'post','Posts','javascript:;',0,'post','fa fa-pencil',NULL,NULL,NULL,100,'backend');
insert  into `menus`(`id`,`name`,`display`,`link`,`parent_id`,`permission`,`icon_class`,`description`,`created_at`,`updated_at`,`order`,`menu_type`) values (3,'post.add','Add Post','jai-backend/post/add',2,'post.add',NULL,NULL,NULL,NULL,200,'backend');
insert  into `menus`(`id`,`name`,`display`,`link`,`parent_id`,`permission`,`icon_class`,`description`,`created_at`,`updated_at`,`order`,`menu_type`) values (4,'setting','Settings','javascript:;',0,'setting','fa fa-gears',NULL,NULL,NULL,1000,'backend');
insert  into `menus`(`id`,`name`,`display`,`link`,`parent_id`,`permission`,`icon_class`,`description`,`created_at`,`updated_at`,`order`,`menu_type`) values (5,'user','User','jai-backend/user',4,'user',NULL,NULL,NULL,NULL,300,'backend');
insert  into `menus`(`id`,`name`,`display`,`link`,`parent_id`,`permission`,`icon_class`,`description`,`created_at`,`updated_at`,`order`,`menu_type`) values (6,'permission','Permission','jai-backend/permission',4,'permission',NULL,NULL,NULL,NULL,100,'backend');
insert  into `menus`(`id`,`name`,`display`,`link`,`parent_id`,`permission`,`icon_class`,`description`,`created_at`,`updated_at`,`order`,`menu_type`) values (7,'role','Role','jai-backend/role',4,'role',NULL,NULL,NULL,NULL,200,'backend');
insert  into `menus`(`id`,`name`,`display`,`link`,`parent_id`,`permission`,`icon_class`,`description`,`created_at`,`updated_at`,`order`,`menu_type`) values (9,'post.list','Post List','jai-backend/post',2,'post',NULL,NULL,NULL,NULL,100,'backend');
insert  into `menus`(`id`,`name`,`display`,`link`,`parent_id`,`permission`,`icon_class`,`description`,`created_at`,`updated_at`,`order`,`menu_type`) values (10,'category','Post Category','jai-backend/post-category/1',2,'post','',NULL,NULL,NULL,300,'backend');
insert  into `menus`(`id`,`name`,`display`,`link`,`parent_id`,`permission`,`icon_class`,`description`,`created_at`,`updated_at`,`order`,`menu_type`) values (13,'posttype','Post Type','jai-backend/post-type',4,'post-type','',NULL,NULL,NULL,400,'backend');
insert  into `menus`(`id`,`name`,`display`,`link`,`parent_id`,`permission`,`icon_class`,`description`,`created_at`,`updated_at`,`order`,`menu_type`) values (14,'slider','Slider','javascript:;',0,'slider','icon-picture',NULL,NULL,NULL,700,'backend');
insert  into `menus`(`id`,`name`,`display`,`link`,`parent_id`,`permission`,`icon_class`,`description`,`created_at`,`updated_at`,`order`,`menu_type`) values (15,'slider.list','Slider List','jai-backend/slider',14,'slider',NULL,NULL,NULL,NULL,100,'backend');
insert  into `menus`(`id`,`name`,`display`,`link`,`parent_id`,`permission`,`icon_class`,`description`,`created_at`,`updated_at`,`order`,`menu_type`) values (16,'slider.add','Add Slider','jai-backend/slider/add',14,'slider.add',NULL,NULL,NULL,NULL,200,'backend');
insert  into `menus`(`id`,`name`,`display`,`link`,`parent_id`,`permission`,`icon_class`,`description`,`created_at`,`updated_at`,`order`,`menu_type`) values (17,'news','News','javascript:;',0,'news','fa fa-newspaper-o',NULL,NULL,NULL,200,'backend');
insert  into `menus`(`id`,`name`,`display`,`link`,`parent_id`,`permission`,`icon_class`,`description`,`created_at`,`updated_at`,`order`,`menu_type`) values (18,'news.list','News List','jai-backend/news',17,'news',NULL,NULL,NULL,NULL,100,'backend');
insert  into `menus`(`id`,`name`,`display`,`link`,`parent_id`,`permission`,`icon_class`,`description`,`created_at`,`updated_at`,`order`,`menu_type`) values (19,'news.add','Add News','jai-backend/news/add',17,'news.add',NULL,NULL,NULL,NULL,200,'backend');
insert  into `menus`(`id`,`name`,`display`,`link`,`parent_id`,`permission`,`icon_class`,`description`,`created_at`,`updated_at`,`order`,`menu_type`) values (20,'news.category','News Category','jai-backend/post-category/2',17,'news-category',NULL,NULL,NULL,NULL,300,'backend');
insert  into `menus`(`id`,`name`,`display`,`link`,`parent_id`,`permission`,`icon_class`,`description`,`created_at`,`updated_at`,`order`,`menu_type`) values (24,'package','Package','javascript:;',0,'package','fa fa-ticket',NULL,NULL,NULL,400,'backend');
insert  into `menus`(`id`,`name`,`display`,`link`,`parent_id`,`permission`,`icon_class`,`description`,`created_at`,`updated_at`,`order`,`menu_type`) values (25,'package.list','Package List','jai-backend/package',24,'package',NULL,NULL,NULL,NULL,100,'backend');
insert  into `menus`(`id`,`name`,`display`,`link`,`parent_id`,`permission`,`icon_class`,`description`,`created_at`,`updated_at`,`order`,`menu_type`) values (26,'package.add','Add Package','jai-backend/package/add',24,'package.add',NULL,NULL,NULL,NULL,200,'backend');
insert  into `menus`(`id`,`name`,`display`,`link`,`parent_id`,`permission`,`icon_class`,`description`,`created_at`,`updated_at`,`order`,`menu_type`) values (27,'holidays','Holiday Management','jai-backend/holiday',24,'holiday',NULL,NULL,NULL,NULL,500,'backend');
insert  into `menus`(`id`,`name`,`display`,`link`,`parent_id`,`permission`,`icon_class`,`description`,`created_at`,`updated_at`,`order`,`menu_type`) values (28,'attractions','Attraction &amp; Experience','javascript:;',0,'attraction','fa fa-rocket',NULL,NULL,NULL,500,'backend');
insert  into `menus`(`id`,`name`,`display`,`link`,`parent_id`,`permission`,`icon_class`,`description`,`created_at`,`updated_at`,`order`,`menu_type`) values (29,'attraction.list','Attraction List','jai-backend/attraction',28,'attraction',NULL,NULL,NULL,NULL,100,'backend');
insert  into `menus`(`id`,`name`,`display`,`link`,`parent_id`,`permission`,`icon_class`,`description`,`created_at`,`updated_at`,`order`,`menu_type`) values (30,'attraction.add','Add Attraction','jai-backend/attraction/add',28,'attraction.add',NULL,NULL,NULL,NULL,200,'backend');
insert  into `menus`(`id`,`name`,`display`,`link`,`parent_id`,`permission`,`icon_class`,`description`,`created_at`,`updated_at`,`order`,`menu_type`) values (31,'media-room','Media Room','javascript:;',0,'media-room','fa fa-bullhorn',NULL,NULL,NULL,600,'backend');
insert  into `menus`(`id`,`name`,`display`,`link`,`parent_id`,`permission`,`icon_class`,`description`,`created_at`,`updated_at`,`order`,`menu_type`) values (32,'media-room.list','Media Room List','jai-backend/media-room',31,'media-room',NULL,NULL,NULL,NULL,100,'backend');
insert  into `menus`(`id`,`name`,`display`,`link`,`parent_id`,`permission`,`icon_class`,`description`,`created_at`,`updated_at`,`order`,`menu_type`) values (33,'media-room.add','Add Media Room','jai-backend/media-room/add',31,'media-room.add',NULL,NULL,NULL,NULL,200,'backend');
insert  into `menus`(`id`,`name`,`display`,`link`,`parent_id`,`permission`,`icon_class`,`description`,`created_at`,`updated_at`,`order`,`menu_type`) values (34,'showtime','Show Time','javascript:;',0,'showtime','fa fa-clock-o',NULL,NULL,NULL,700,'backend');
insert  into `menus`(`id`,`name`,`display`,`link`,`parent_id`,`permission`,`icon_class`,`description`,`created_at`,`updated_at`,`order`,`menu_type`) values (35,'showtime.list','Show Time List','jai-backend/showtime',34,'showtime',NULL,NULL,NULL,NULL,100,'backend');
insert  into `menus`(`id`,`name`,`display`,`link`,`parent_id`,`permission`,`icon_class`,`description`,`created_at`,`updated_at`,`order`,`menu_type`) values (36,'showtime.add','Add Show Time','jai-backend/showtime/add',34,'showtime.add',NULL,NULL,NULL,NULL,200,'backend');
insert  into `menus`(`id`,`name`,`display`,`link`,`parent_id`,`permission`,`icon_class`,`description`,`created_at`,`updated_at`,`order`,`menu_type`) values (37,'f.about-us','About Us','about-us',0,'frontend','ja-icon-about',NULL,NULL,NULL,100,'frontend');
insert  into `menus`(`id`,`name`,`display`,`link`,`parent_id`,`permission`,`icon_class`,`description`,`created_at`,`updated_at`,`order`,`menu_type`) values (38,'f.plan','Plan Your Visit','javascript:;',0,'frontend','ja-icon-loc',NULL,NULL,NULL,200,'frontend');
insert  into `menus`(`id`,`name`,`display`,`link`,`parent_id`,`permission`,`icon_class`,`description`,`created_at`,`updated_at`,`order`,`menu_type`) values (39,'f.ticket','Ticket &amp; Hours','ticket-hours',38,'frontend',NULL,NULL,NULL,NULL,100,'frontend');
insert  into `menus`(`id`,`name`,`display`,`link`,`parent_id`,`permission`,`icon_class`,`description`,`created_at`,`updated_at`,`order`,`menu_type`) values (40,'f.package','Special Packages','special-packages',38,'frontend',NULL,NULL,NULL,NULL,200,'frontend');
insert  into `menus`(`id`,`name`,`display`,`link`,`parent_id`,`permission`,`icon_class`,`description`,`created_at`,`updated_at`,`order`,`menu_type`) values (41,'f.show-time','Show Time','show-time',38,'frontend',NULL,NULL,NULL,NULL,300,'frontend');
insert  into `menus`(`id`,`name`,`display`,`link`,`parent_id`,`permission`,`icon_class`,`description`,`created_at`,`updated_at`,`order`,`menu_type`) values (42,'f.location','Location','location',38,'frontend',NULL,NULL,NULL,NULL,400,'frontend');
insert  into `menus`(`id`,`name`,`display`,`link`,`parent_id`,`permission`,`icon_class`,`description`,`created_at`,`updated_at`,`order`,`menu_type`) values (43,'f.attraction','Attractions and Experience','attractions-experience',0,'frontend','ja-icon-attract',NULL,NULL,NULL,300,'frontend');
insert  into `menus`(`id`,`name`,`display`,`link`,`parent_id`,`permission`,`icon_class`,`description`,`created_at`,`updated_at`,`order`,`menu_type`) values (44,'f.conservation','Education and Conservation','conservation',0,'frontend','ja-icon-edu',NULL,NULL,NULL,400,'frontend');
insert  into `menus`(`id`,`name`,`display`,`link`,`parent_id`,`permission`,`icon_class`,`description`,`created_at`,`updated_at`,`order`,`menu_type`) values (45,'f.news','News','news-blog',0,'frontend','ja-icon-news',NULL,NULL,NULL,500,'frontend');

/*Table structure for table `migrations` */

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`migration`,`batch`) values ('2014_10_12_000000_create_users_table',1);
insert  into `migrations`(`migration`,`batch`) values ('2014_10_12_100000_create_password_resets_table',1);
insert  into `migrations`(`migration`,`batch`) values ('2016_10_04_113129_create_sessions_table',2);
insert  into `migrations`(`migration`,`batch`) values ('2016_10_05_042749_create_media_table',3);
insert  into `migrations`(`migration`,`batch`) values ('2016_10_11_081507_create_menus_table',4);
insert  into `migrations`(`migration`,`batch`) values ('2016_10_12_032409_create_permission_tables',5);
insert  into `migrations`(`migration`,`batch`) values ('2016_10_12_042248_add_order_on_menus',6);
insert  into `migrations`(`migration`,`batch`) values ('2016_10_13_110437_create_categories_table',7);
insert  into `migrations`(`migration`,`batch`) values ('2016_10_13_110650_create_post_types_table',8);
insert  into `migrations`(`migration`,`batch`) values ('2016_10_13_110751_create_posts_table',9);
insert  into `migrations`(`migration`,`batch`) values ('2016_10_13_112053_create_post_has_categories_table',10);
insert  into `migrations`(`migration`,`batch`) values ('2016_10_13_112733_create_tags_table',11);
insert  into `migrations`(`migration`,`batch`) values ('2016_10_14_095031_add_parent_id_on_categories',12);
insert  into `migrations`(`migration`,`batch`) values ('2016_10_14_135937_add_status_on_posts',13);
insert  into `migrations`(`migration`,`batch`) values ('2016_10_14_152415_add_publish_date_on_posts',14);
insert  into `migrations`(`migration`,`batch`) values ('2016_10_15_202336_create_medias_table',14);
insert  into `migrations`(`migration`,`batch`) values ('2016_10_20_210322_add_media_type_on_post_has_medias',15);
insert  into `migrations`(`migration`,`batch`) values ('2016_10_22_183740_create_post_details_table',16);
insert  into `migrations`(`migration`,`batch`) values ('2016_10_24_213009_create_sliders_table',17);
insert  into `migrations`(`migration`,`batch`) values ('2016_10_26_185546_create_post_metas_table',18);
insert  into `migrations`(`migration`,`batch`) values ('2016_10_27_133403_create_holidays_table',19);
insert  into `migrations`(`migration`,`batch`) values ('2016_10_27_181417_add_created_by_on_posts',20);
insert  into `migrations`(`migration`,`batch`) values ('2016_10_28_192728_create_packages_table',21);
insert  into `migrations`(`migration`,`batch`) values ('2016_10_30_112407_add_is_general_admission_on_package',22);
insert  into `migrations`(`migration`,`batch`) values ('2016_10_30_120042_create_shows_table',23);
insert  into `migrations`(`migration`,`batch`) values ('2016_11_01_201700_create_package_has_medias',24);
insert  into `migrations`(`migration`,`batch`) values ('2016_11_05_125956_add_menu_type_on_menus',25);
insert  into `migrations`(`migration`,`batch`) values ('2016_11_05_152539_alter_show_tables',26);
insert  into `migrations`(`migration`,`batch`) values ('2016_11_10_104656_create_show_has_media_table',27);
insert  into `migrations`(`migration`,`batch`) values ('2016_11_10_175742_create_package_metas_table',28);
insert  into `migrations`(`migration`,`batch`) values ('2016_11_10_183306_create_show_metas_table',29);

/*Table structure for table `package_details` */

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
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `package_details` */

insert  into `package_details`(`id`,`package_id`,`lang`,`title`,`slug`,`content`) values (17,4,'en','Package B','package-b','General admission + 5D + Diving');
insert  into `package_details`(`id`,`package_id`,`lang`,`title`,`slug`,`content`) values (18,4,'id','Paket B','paket-b','Pendaftaran + 5D + Diving');
insert  into `package_details`(`id`,`package_id`,`lang`,`title`,`slug`,`content`) values (29,3,'en','Package A','package-a','At vero eos et accusamus et iusto odio madeline dignis imosse ducma quisa. Ut enim ad minim veniam, quis nostrud quirelle exercitation ullamco ullamco accusamus et iusto cupidatat non proident. Set ed ut perspiciatis laboris nisi ut aliquip ex eamus commodo consequat. <br />Duis aute irure dignis imosse ducmation quisa cillum fugiat Extravaganza nulla pariatur. Excepteur sint exercitation ullamco accusamus et iusto cupidatat non proident. Set ed ut perspiciatis, unde omnis iste natus laboris nisi ut aliquip ex ea commodo consequat error sit voluptatem accusantium iusto cupidatat non proident doloremque requiem et dolore magnam accusamus et iusto odio voluptatem.');
insert  into `package_details`(`id`,`package_id`,`lang`,`title`,`slug`,`content`) values (30,3,'id','Paket A','paket-a','At vero eos et accusamus et iusto odio madeline dignis imosse ducma quisa. Ut enim ad minim veniam, quis nostrud quirelle exercitation ullamco ullamco accusamus et iusto cupidatat non proident. Set ed ut perspiciatis laboris nisi ut aliquip ex eamus commodo consequat. <br />Duis aute irure dignis imosse ducmation quisa cillum fugiat Extravaganza nulla pariatur. Excepteur sint exercitation ullamco accusamus et iusto cupidatat non proident. Set ed ut perspiciatis, unde omnis iste natus laboris nisi ut aliquip ex ea commodo consequat error sit voluptatem accusantium iusto cupidatat non proident doloremque requiem et dolore magnam accusamus et iusto odio voluptatem.');
insert  into `package_details`(`id`,`package_id`,`lang`,`title`,`slug`,`content`) values (33,6,'en','Camp Program','camp-program','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. <br />Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. <br />Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
insert  into `package_details`(`id`,`package_id`,`lang`,`title`,`slug`,`content`) values (34,6,'id','Program Camp','program-camp','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. <br />Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. <br />Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
insert  into `package_details`(`id`,`package_id`,`lang`,`title`,`slug`,`content`) values (35,5,'en','School Program','school-program','At vero eos et accusamus et iusto odio madeline dignis imosse ducma quisa. Ut enim ad minim veniam, quis nostrud quirelle exercitation ullamco ullamco accusamus et iusto cupidatat non proident. Set ed ut perspiciatis laboris nisi ut aliquip ex eamus commodo consequat. Duis aute irure dignis imosse ducmation quisa cillum fugiat Extravaganza nulla pariatur. <br />Excepteur sint exercitation ullamco accusamus et iusto cupidatat non proident. Set ed ut perspiciatis, unde omnis iste natus laboris nisi ut aliquip ex ea commodo consequat error sit voluptatem accusantium iusto cupidatat non proident doloremque requiem et dolore magnam accusamus et iusto odio voluptatem');
insert  into `package_details`(`id`,`package_id`,`lang`,`title`,`slug`,`content`) values (36,5,'id','Program Sekolah','program-sekolah','At vero eos et accusamus et iusto odio madeline dignis imosse ducma quisa. Ut enim ad minim veniam, quis nostrud quirelle exercitation ullamco ullamco accusamus et iusto cupidatat non proident. Set ed ut perspiciatis laboris nisi ut aliquip ex eamus commodo consequat. Duis aute irure dignis imosse ducmation quisa cillum fugiat Extravaganza nulla pariatur. <br /> Excepteur sint exercitation ullamco accusamus et iusto cupidatat non proident. Set ed ut perspiciatis, unde omnis iste natus laboris nisi ut aliquip ex ea commodo consequat error sit voluptatem accusantium iusto cupidatat non proident doloremque requiem et dolore magnam accusamus et iusto odio voluptatem');
insert  into `package_details`(`id`,`package_id`,`lang`,`title`,`slug`,`content`) values (39,7,'en','Combo Package','combo-package','The aquarium is one of Indonesia\'s most unforgettable group activities! Groups of 10 or more people receive discounted admission to the aquarium! Pre-booking is required at least 7 days in advance as groups must be pre-qualified before receiving this rate.&nbsp;');
insert  into `package_details`(`id`,`package_id`,`lang`,`title`,`slug`,`content`) values (40,7,'id','Paket Kombo','paket-kombo','The aquarium is one of Indonesia\'s most unforgettable group activities! Groups of 10 or more people receive discounted admission to the aquarium! Pre-booking is required at least 7 days in advance as groups must be pre-qualified before receiving this rate.&nbsp;');
insert  into `package_details`(`id`,`package_id`,`lang`,`title`,`slug`,`content`) values (41,1,'en','General Admission','general-admission','Meet sharks, turtles, jellyfish and other animals');
insert  into `package_details`(`id`,`package_id`,`lang`,`title`,`slug`,`content`) values (42,1,'id','Paket Umum','paket-umum','Temui hiu, kura-kura, ubur-ubur, gurita dan binatang lainnya.');

/*Table structure for table `package_has_coupons` */

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

CREATE TABLE `package_has_medias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `package_id` int(10) unsigned NOT NULL,
  `media_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `package_has_medias_package_id_foreign` (`package_id`),
  CONSTRAINT `package_has_medias_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `package_has_medias` */

insert  into `package_has_medias`(`id`,`package_id`,`media_id`) values (4,6,53);
insert  into `package_has_medias`(`id`,`package_id`,`media_id`) values (5,5,55);
insert  into `package_has_medias`(`id`,`package_id`,`media_id`) values (6,7,54);

/*Table structure for table `package_metas` */

CREATE TABLE `package_metas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `package_id` int(10) unsigned NOT NULL,
  `meta_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_value` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `package_metas_package_id_foreign` (`package_id`),
  CONSTRAINT `package_metas_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `package_metas` */

insert  into `package_metas`(`id`,`package_id`,`meta_key`,`meta_value`) values (1,1,'meta_description-en','META (ENG)');
insert  into `package_metas`(`id`,`package_id`,`meta_key`,`meta_value`) values (2,1,'meta_description-id','META (ID)');

/*Table structure for table `packages` */

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `packages` */

insert  into `packages`(`id`,`package_type_id`,`normal_price`,`weekend_price`,`holiday_price`,`created_by`,`is_general_admission`,`created_at`,`updated_at`) values (1,1,100000,150000,150000,3,1,'2016-10-28 21:59:22','2016-10-30 11:31:07');
insert  into `packages`(`id`,`package_type_id`,`normal_price`,`weekend_price`,`holiday_price`,`created_by`,`is_general_admission`,`created_at`,`updated_at`) values (3,1,400000,450000,450000,3,1,'2016-10-28 22:10:11','2016-10-30 11:31:01');
insert  into `packages`(`id`,`package_type_id`,`normal_price`,`weekend_price`,`holiday_price`,`created_by`,`is_general_admission`,`created_at`,`updated_at`) values (4,1,400000,500000,500000,3,1,'2016-10-30 11:31:58','2016-10-30 11:31:58');
insert  into `packages`(`id`,`package_type_id`,`normal_price`,`weekend_price`,`holiday_price`,`created_by`,`is_general_admission`,`created_at`,`updated_at`) values (5,2,0,0,0,3,0,'2016-11-01 19:59:03','2016-11-01 19:59:03');
insert  into `packages`(`id`,`package_type_id`,`normal_price`,`weekend_price`,`holiday_price`,`created_by`,`is_general_admission`,`created_at`,`updated_at`) values (6,2,0,0,0,3,0,'2016-11-01 20:00:47','2016-11-01 20:00:47');
insert  into `packages`(`id`,`package_type_id`,`normal_price`,`weekend_price`,`holiday_price`,`created_by`,`is_general_admission`,`created_at`,`updated_at`) values (7,2,0,0,0,3,0,'2016-11-01 20:02:02','2016-11-01 20:02:02');

/*Table structure for table `password_resets` */

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `permissions` */

CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `permissions` */

insert  into `permissions`(`id`,`name`,`created_at`,`updated_at`) values (1,'dashboard',NULL,NULL);
insert  into `permissions`(`id`,`name`,`created_at`,`updated_at`) values (2,'post',NULL,NULL);
insert  into `permissions`(`id`,`name`,`created_at`,`updated_at`) values (3,'post.add',NULL,NULL);
insert  into `permissions`(`id`,`name`,`created_at`,`updated_at`) values (4,'setting',NULL,NULL);
insert  into `permissions`(`id`,`name`,`created_at`,`updated_at`) values (5,'user',NULL,NULL);
insert  into `permissions`(`id`,`name`,`created_at`,`updated_at`) values (6,'permission',NULL,NULL);
insert  into `permissions`(`id`,`name`,`created_at`,`updated_at`) values (7,'role',NULL,NULL);
insert  into `permissions`(`id`,`name`,`created_at`,`updated_at`) values (8,'user.add',NULL,NULL);
insert  into `permissions`(`id`,`name`,`created_at`,`updated_at`) values (9,'user.edit',NULL,NULL);
insert  into `permissions`(`id`,`name`,`created_at`,`updated_at`) values (10,'user.delete',NULL,NULL);
insert  into `permissions`(`id`,`name`,`created_at`,`updated_at`) values (11,'role.add','2016-10-13 10:36:02','2016-10-13 10:36:02');
insert  into `permissions`(`id`,`name`,`created_at`,`updated_at`) values (12,'role.edit','2016-10-13 10:36:09','2016-10-13 10:36:09');
insert  into `permissions`(`id`,`name`,`created_at`,`updated_at`) values (13,'role.delete','2016-10-13 10:36:14','2016-10-13 10:36:14');
insert  into `permissions`(`id`,`name`,`created_at`,`updated_at`) values (14,'permission.add','2016-10-13 10:37:22','2016-10-13 10:37:22');
insert  into `permissions`(`id`,`name`,`created_at`,`updated_at`) values (15,'permission.edit','2016-10-13 10:37:27','2016-10-13 10:37:27');
insert  into `permissions`(`id`,`name`,`created_at`,`updated_at`) values (16,'permission.delete','2016-10-13 10:37:32','2016-10-13 10:37:32');
insert  into `permissions`(`id`,`name`,`created_at`,`updated_at`) values (21,'post-type','2016-10-13 17:30:58','2016-10-13 17:30:58');
insert  into `permissions`(`id`,`name`,`created_at`,`updated_at`) values (22,'post-type.add','2016-10-13 17:31:06','2016-10-13 17:31:06');
insert  into `permissions`(`id`,`name`,`created_at`,`updated_at`) values (23,'post-type.edit','2016-10-13 17:31:12','2016-10-13 17:31:12');
insert  into `permissions`(`id`,`name`,`created_at`,`updated_at`) values (24,'post-type.delete','2016-10-13 17:31:19','2016-10-13 17:31:19');
insert  into `permissions`(`id`,`name`,`created_at`,`updated_at`) values (25,'post-category','2016-10-14 11:09:26','2016-10-14 11:09:26');
insert  into `permissions`(`id`,`name`,`created_at`,`updated_at`) values (26,'post-category.add','2016-10-14 11:14:03','2016-10-14 11:14:03');
insert  into `permissions`(`id`,`name`,`created_at`,`updated_at`) values (27,'post-category.edit','2016-10-14 11:14:11','2016-10-14 11:14:11');
insert  into `permissions`(`id`,`name`,`created_at`,`updated_at`) values (28,'post-category.delete','2016-10-14 11:14:18','2016-10-14 11:14:18');
insert  into `permissions`(`id`,`name`,`created_at`,`updated_at`) values (29,'whats-on','2016-10-21 19:41:51','2016-10-21 19:41:51');
insert  into `permissions`(`id`,`name`,`created_at`,`updated_at`) values (30,'whats-on.add','2016-10-21 19:41:57','2016-10-21 19:41:57');
insert  into `permissions`(`id`,`name`,`created_at`,`updated_at`) values (31,'whats-on.edit','2016-10-21 19:42:02','2016-10-21 19:42:02');
insert  into `permissions`(`id`,`name`,`created_at`,`updated_at`) values (32,'whats-on.delete','2016-10-21 19:42:07','2016-10-21 19:42:07');
insert  into `permissions`(`id`,`name`,`created_at`,`updated_at`) values (33,'post.edit','2016-10-22 15:53:48','2016-10-22 15:53:48');
insert  into `permissions`(`id`,`name`,`created_at`,`updated_at`) values (34,'post.delete','2016-10-22 15:53:53','2016-10-22 15:53:53');
insert  into `permissions`(`id`,`name`,`created_at`,`updated_at`) values (35,'slider','2016-10-24 21:56:43','2016-10-24 21:56:43');
insert  into `permissions`(`id`,`name`,`created_at`,`updated_at`) values (36,'slider.add','2016-10-24 21:56:49','2016-10-24 21:56:49');
insert  into `permissions`(`id`,`name`,`created_at`,`updated_at`) values (37,'slider.edit','2016-10-24 21:56:54','2016-10-24 21:56:54');
insert  into `permissions`(`id`,`name`,`created_at`,`updated_at`) values (38,'slider.delete','2016-10-24 21:57:00','2016-10-24 21:57:00');
insert  into `permissions`(`id`,`name`,`created_at`,`updated_at`) values (39,'news','2016-10-26 18:44:59','2016-10-26 18:44:59');
insert  into `permissions`(`id`,`name`,`created_at`,`updated_at`) values (40,'news.add','2016-10-26 18:45:03','2016-10-26 18:45:03');
insert  into `permissions`(`id`,`name`,`created_at`,`updated_at`) values (41,'news.edit','2016-10-26 18:45:09','2016-10-26 18:45:09');
insert  into `permissions`(`id`,`name`,`created_at`,`updated_at`) values (42,'news.delete','2016-10-26 18:45:15','2016-10-26 18:45:15');
insert  into `permissions`(`id`,`name`,`created_at`,`updated_at`) values (43,'news-category','2016-10-26 19:36:43','2016-10-26 19:36:43');
insert  into `permissions`(`id`,`name`,`created_at`,`updated_at`) values (44,'package','2016-10-27 13:17:35','2016-10-27 13:17:35');
insert  into `permissions`(`id`,`name`,`created_at`,`updated_at`) values (45,'package.add','2016-10-27 13:17:44','2016-10-27 13:17:44');
insert  into `permissions`(`id`,`name`,`created_at`,`updated_at`) values (46,'package.edit','2016-10-27 13:17:51','2016-10-27 13:17:51');
insert  into `permissions`(`id`,`name`,`created_at`,`updated_at`) values (47,'package.delete','2016-10-27 13:17:57','2016-10-27 13:17:57');
insert  into `permissions`(`id`,`name`,`created_at`,`updated_at`) values (48,'holiday','2016-10-27 13:31:05','2016-10-27 13:31:05');
insert  into `permissions`(`id`,`name`,`created_at`,`updated_at`) values (49,'attraction','2016-10-30 13:12:05','2016-10-30 13:12:05');
insert  into `permissions`(`id`,`name`,`created_at`,`updated_at`) values (50,'attraction.add','2016-10-30 13:12:13','2016-10-30 13:12:13');
insert  into `permissions`(`id`,`name`,`created_at`,`updated_at`) values (51,'attraction.edit','2016-10-30 13:12:20','2016-10-30 13:12:20');
insert  into `permissions`(`id`,`name`,`created_at`,`updated_at`) values (52,'attraction.delete','2016-10-30 13:12:27','2016-10-30 13:12:27');
insert  into `permissions`(`id`,`name`,`created_at`,`updated_at`) values (53,'attraction-category','2016-10-30 13:12:36','2016-10-30 13:12:36');
insert  into `permissions`(`id`,`name`,`created_at`,`updated_at`) values (54,'media-room','2016-10-30 13:56:51','2016-10-30 13:56:51');
insert  into `permissions`(`id`,`name`,`created_at`,`updated_at`) values (55,'media-room.add','2016-10-30 13:56:56','2016-10-30 13:56:56');
insert  into `permissions`(`id`,`name`,`created_at`,`updated_at`) values (56,'media-room.edit','2016-10-30 13:57:01','2016-10-30 13:57:01');
insert  into `permissions`(`id`,`name`,`created_at`,`updated_at`) values (57,'media-room.delete','2016-10-30 13:57:08','2016-10-30 13:57:08');
insert  into `permissions`(`id`,`name`,`created_at`,`updated_at`) values (58,'media-room-category','2016-10-30 13:57:14','2016-10-30 13:57:14');
insert  into `permissions`(`id`,`name`,`created_at`,`updated_at`) values (59,'showtime','2016-11-02 20:30:02','2016-11-02 20:30:02');
insert  into `permissions`(`id`,`name`,`created_at`,`updated_at`) values (60,'showtime.add','2016-11-02 20:30:07','2016-11-02 20:30:07');
insert  into `permissions`(`id`,`name`,`created_at`,`updated_at`) values (61,'showtime.edit','2016-11-02 20:30:13','2016-11-02 20:30:23');
insert  into `permissions`(`id`,`name`,`created_at`,`updated_at`) values (62,'showtime.delete','2016-11-02 20:30:32','2016-11-02 20:30:32');

/*Table structure for table `post_details` */

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

insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (17,'en','Far far away, behind the word mountains, far from the countries Vokalia and Consonantia','far-far-away-behind-the-word-mountains-far-from-the-countries-vokalia-and-consonantia','Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. <br />Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar. The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn&rsquo;t listen. <br />She packed her seven versalia, put her initial into the belt and made herself on the way. When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. <br />Pityful a rethoric question ran over her cheek, then');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (17,'id','Far far away, behind the word mountains, far from the countries Vokalia and Consonantia','far-far-away-behind-the-word-mountains-far-from-the-countries-vokalia-and-consonantia-2','Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. <br />Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar. The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn&rsquo;t listen. <br />She packed her seven versalia, put her initial into the belt and made herself on the way. When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. <br />Pityful a rethoric question ran over her cheek, then');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (18,'en','Ini title english','ini-title-english','content english');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (18,'id','Title bahasa','title-bahasa','content bahasa');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (19,'en','HERE YOU WILL MEET FACE-TO-FACE WITH THE TAME PREDATORS','here-you-will-meet-face-to-face-with-the-tame-predators','News test');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (19,'id','DISINI KALIAN AKAN BERHADAPANG LANGSUNG DENGAN HIU PREDATOR','disini-kalian-akan-berhadapang-langsung-dengan-hiu-predator','Test news');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (20,'en','Eius qui ut officia ut cupiditate sit.','eius-qui-ut-officia-ut-cupiditate-sit','I don\'t believe it,\' said the Mock Turtle. \'No, no! The adventures first,\' said the Mock Turtle to sing this:-- \'Beautiful Soup, so rich and green, Waiting in a melancholy tone: \'it doesn\'t seem to be\"--or if you\'d like it very much,\' said the.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (20,'id','Eius qui ut officia ut cupiditate sit.','eius-qui-ut-officia-ut-cupiditate-sit-2','I don\'t believe it,\' said the Mock Turtle. \'No, no! The adventures first,\' said the Mock Turtle to sing this:-- \'Beautiful Soup, so rich and green, Waiting in a melancholy tone: \'it doesn\'t seem to be\"--or if you\'d like it very much,\' said the.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (21,'en','Totam necessitatibus molestiae iusto ratione dolore ea.','totam-necessitatibus-molestiae-iusto-ratione-dolore-ea','King put on his knee, and looking at the top of his pocket, and was going on shrinking rapidly: she soon made out that she was in such long ringlets, and mine doesn\'t go in ringlets at all; however, she went on, half to itself, \'Oh dear! Oh dear!.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (21,'id','Totam necessitatibus molestiae iusto ratione dolore ea.','totam-necessitatibus-molestiae-iusto-ratione-dolore-ea-2','King put on his knee, and looking at the top of his pocket, and was going on shrinking rapidly: she soon made out that she was in such long ringlets, and mine doesn\'t go in ringlets at all; however, she went on, half to itself, \'Oh dear! Oh dear!.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (22,'en','Voluptatem quam dolorum inventore cum accusamus aut ea.','voluptatem-quam-dolorum-inventore-cum-accusamus-aut-ea','Alice, whose thoughts were still running on the spot.\' This did not seem to see the earth takes twenty-four hours to turn into a doze; but, on being pinched by the time she heard a little bit of stick, and tumbled head over heels in its sleep.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (22,'id','Voluptatem quam dolorum inventore cum accusamus aut ea.','voluptatem-quam-dolorum-inventore-cum-accusamus-aut-ea','Alice, whose thoughts were still running on the spot.\' This did not seem to see the earth takes twenty-four hours to turn into a doze; but, on being pinched by the time she heard a little bit of stick, and tumbled head over heels in its sleep.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (23,'en','Laborum ut dolor eveniet aperiam sit hic et et.','laborum-ut-dolor-eveniet-aperiam-sit-hic-et-et','Alice, \'shall I NEVER get any older than I am so VERY wide, but she could not help thinking there MUST be more to come, so she went back to the table for it, he was speaking, and this was the BEST butter,\' the March Hare. \'He denies it,\' said.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (23,'id','Laborum ut dolor eveniet aperiam sit hic et et.','laborum-ut-dolor-eveniet-aperiam-sit-hic-et-et','Alice, \'shall I NEVER get any older than I am so VERY wide, but she could not help thinking there MUST be more to come, so she went back to the table for it, he was speaking, and this was the BEST butter,\' the March Hare. \'He denies it,\' said.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (24,'en','Quasi quidem harum accusantium harum itaque voluptas harum modi.','quasi-quidem-harum-accusantium-harum-itaque-voluptas-harum-modi','Alice said; but was dreadfully puzzled by the way to explain it as you might knock, and I never understood what it was: she was getting very sleepy; \'and they all looked so good, that it had made. \'He took me for his housemaid,\' she said these.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (24,'id','Quasi quidem harum accusantium harum itaque voluptas harum modi.','quasi-quidem-harum-accusantium-harum-itaque-voluptas-harum-modi','Alice said; but was dreadfully puzzled by the way to explain it as you might knock, and I never understood what it was: she was getting very sleepy; \'and they all looked so good, that it had made. \'He took me for his housemaid,\' she said these.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (25,'en','Molestias eaque sit nisi qui ut.','molestias-eaque-sit-nisi-qui-ut','I will prosecute YOU.--Come, I\'ll take no denial; We must have got into it), and sometimes shorter, until she made out that it was all ridges and furrows; the balls were live hedgehogs, the mallets live flamingoes, and the shrill voice of the.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (25,'id','Molestias eaque sit nisi qui ut.','molestias-eaque-sit-nisi-qui-ut','I will prosecute YOU.--Come, I\'ll take no denial; We must have got into it), and sometimes shorter, until she made out that it was all ridges and furrows; the balls were live hedgehogs, the mallets live flamingoes, and the shrill voice of the.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (26,'en','Omnis qui natus fuga ab.','omnis-qui-natus-fuga-ab','Queen, \'Really, my dear, and that if you like!\' the Duchess to play with, and oh! ever so many lessons to learn! Oh, I shouldn\'t want YOURS: I don\'t know,\' he went on all the while, and fighting for the hot day made her look up in such a curious.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (26,'id','Omnis qui natus fuga ab.','omnis-qui-natus-fuga-ab','Queen, \'Really, my dear, and that if you like!\' the Duchess to play with, and oh! ever so many lessons to learn! Oh, I shouldn\'t want YOURS: I don\'t know,\' he went on all the while, and fighting for the hot day made her look up in such a curious.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (27,'en','Enim deleniti recusandae consequatur aut voluptates et iusto.','enim-deleniti-recusandae-consequatur-aut-voluptates-et-iusto','Alice\'s shoulder, and it sat down in a hot tureen! Who for such a nice soft thing to get in?\' asked Alice again, in a confused way, \'Prizes! Prizes!\' Alice had been of late much accustomed to usurpation and conquest. Edwin and Morcar, the earls of.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (27,'id','Enim deleniti recusandae consequatur aut voluptates et iusto.','enim-deleniti-recusandae-consequatur-aut-voluptates-et-iusto','Alice\'s shoulder, and it sat down in a hot tureen! Who for such a nice soft thing to get in?\' asked Alice again, in a confused way, \'Prizes! Prizes!\' Alice had been of late much accustomed to usurpation and conquest. Edwin and Morcar, the earls of.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (28,'en','Quia est molestiae consequatur enim.','quia-est-molestiae-consequatur-enim','Kings and Queens, and among them Alice recognised the White Rabbit was no label this time with great curiosity. \'It\'s a friend of mine--a Cheshire Cat,\' said Alice: \'three inches is such a new idea to Alice, and she thought it must be collected at.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (28,'id','Quia est molestiae consequatur enim.','quia-est-molestiae-consequatur-enim','Kings and Queens, and among them Alice recognised the White Rabbit was no label this time with great curiosity. \'It\'s a friend of mine--a Cheshire Cat,\' said Alice: \'three inches is such a new idea to Alice, and she thought it must be collected at.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (29,'en','Error est consequatur sunt recusandae consectetur.','error-est-consequatur-sunt-recusandae-consectetur','You grant that?\' \'I suppose so,\' said the Queen, who had followed him into the sky all the jurymen on to himself in an offended tone, \'so I should be free of them even when they liked, so that her shoulders were nowhere to be afraid of them!\' \'And.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (29,'id','Error est consequatur sunt recusandae consectetur.','error-est-consequatur-sunt-recusandae-consectetur','You grant that?\' \'I suppose so,\' said the Queen, who had followed him into the sky all the jurymen on to himself in an offended tone, \'so I should be free of them even when they liked, so that her shoulders were nowhere to be afraid of them!\' \'And.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (30,'en','Dolorem quia non necessitatibus quia.','dolorem-quia-non-necessitatibus-quia','Alice; \'only, as it\'s asleep, I suppose you\'ll be telling me next that you have to go on. \'And so these three little sisters--they were learning to draw,\' the Dormouse shook itself, and began picking them up again as she remembered trying to make.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (30,'id','Dolorem quia non necessitatibus quia.','dolorem-quia-non-necessitatibus-quia','Alice; \'only, as it\'s asleep, I suppose you\'ll be telling me next that you have to go on. \'And so these three little sisters--they were learning to draw,\' the Dormouse shook itself, and began picking them up again as she remembered trying to make.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (31,'en','Aut error at ut voluptatem eum inventore labore.','aut-error-at-ut-voluptatem-eum-inventore-labore','Why, I haven\'t had a vague sort of way to fly up into the teapot. \'At any rate I\'ll never go THERE again!\' said Alice to herself, \'it would be very likely it can be,\' said the March Hare went on. \'Would you like to show you! A little bright-eyed.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (31,'id','Aut error at ut voluptatem eum inventore labore.','aut-error-at-ut-voluptatem-eum-inventore-labore','Why, I haven\'t had a vague sort of way to fly up into the teapot. \'At any rate I\'ll never go THERE again!\' said Alice to herself, \'it would be very likely it can be,\' said the March Hare went on. \'Would you like to show you! A little bright-eyed.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (32,'en','Fugiat ad rerum qui id quibusdam voluptas in.','fugiat-ad-rerum-qui-id-quibusdam-voluptas-in','There could be NO mistake about it: it was neither more nor less than no time she\'d have everybody executed, all round. \'But she must have imitated somebody else\'s hand,\' said the King, rubbing his hands; \'so now let the jury--\' \'If any one left.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (32,'id','Fugiat ad rerum qui id quibusdam voluptas in.','fugiat-ad-rerum-qui-id-quibusdam-voluptas-in','There could be NO mistake about it: it was neither more nor less than no time she\'d have everybody executed, all round. \'But she must have imitated somebody else\'s hand,\' said the King, rubbing his hands; \'so now let the jury--\' \'If any one left.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (33,'en','Consequatur et enim recusandae.','consequatur-et-enim-recusandae','So she set to work shaking him and punching him in the long hall, and close to the conclusion that it might end, you know,\' said Alice, who had been (Before she had brought herself down to the Knave of Hearts, who only bowed and smiled in reply..');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (33,'id','Consequatur et enim recusandae.','consequatur-et-enim-recusandae','So she set to work shaking him and punching him in the long hall, and close to the conclusion that it might end, you know,\' said Alice, who had been (Before she had brought herself down to the Knave of Hearts, who only bowed and smiled in reply..');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (34,'en','Aut cum dolor rerum ipsum.','aut-cum-dolor-rerum-ipsum','Mock Turtle, \'they--you\'ve seen them, of course?\' \'Yes,\' said Alice a good way off, panting, with its wings. \'Serpent!\' screamed the Gryphon. \'Turn a somersault in the book,\' said the Hatter, and, just as well as she came in with the Dormouse..');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (34,'id','Aut cum dolor rerum ipsum.','aut-cum-dolor-rerum-ipsum','Mock Turtle, \'they--you\'ve seen them, of course?\' \'Yes,\' said Alice a good way off, panting, with its wings. \'Serpent!\' screamed the Gryphon. \'Turn a somersault in the book,\' said the Hatter, and, just as well as she came in with the Dormouse..');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (35,'en','Et atque voluptatem repudiandae qui consectetur.','et-atque-voluptatem-repudiandae-qui-consectetur','I tell you!\' But she went on: \'--that begins with an M, such as mouse-traps, and the great question certainly was, what? Alice looked down into its mouth again, and she sat down with wonder at the beginning,\' the King eagerly, and he checked.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (35,'id','Et atque voluptatem repudiandae qui consectetur.','et-atque-voluptatem-repudiandae-qui-consectetur','I tell you!\' But she went on: \'--that begins with an M, such as mouse-traps, and the great question certainly was, what? Alice looked down into its mouth again, and she sat down with wonder at the beginning,\' the King eagerly, and he checked.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (36,'en','Consequatur asperiores qui sed consequatur atque officia.','consequatur-asperiores-qui-sed-consequatur-atque-officia','Lory, who at last it unfolded its arms, took the watch and looked at it uneasily, shaking it every now and then, and holding it to half-past one as long as you are; secondly, because they\'re making such a noise inside, no one listening, this time,.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (36,'id','Consequatur asperiores qui sed consequatur atque officia.','consequatur-asperiores-qui-sed-consequatur-atque-officia','Lory, who at last it unfolded its arms, took the watch and looked at it uneasily, shaking it every now and then, and holding it to half-past one as long as you are; secondly, because they\'re making such a noise inside, no one listening, this time,.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (37,'en','Tempore odit officia tempora maxime ut inventore veniam quibusdam.','tempore-odit-officia-tempora-maxime-ut-inventore-veniam-quibusdam','Alice; \'I can\'t explain MYSELF, I\'m afraid, sir\' said Alice, \'how am I then? Tell me that first, and then said \'The fourth.\' \'Two days wrong!\' sighed the Lory, with a melancholy air, and, after waiting till she was considering in her life, and had.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (37,'id','Tempore odit officia tempora maxime ut inventore veniam quibusdam.','tempore-odit-officia-tempora-maxime-ut-inventore-veniam-quibusdam','Alice; \'I can\'t explain MYSELF, I\'m afraid, sir\' said Alice, \'how am I then? Tell me that first, and then said \'The fourth.\' \'Two days wrong!\' sighed the Lory, with a melancholy air, and, after waiting till she was considering in her life, and had.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (38,'en','Eaque laudantium quia et ea.','eaque-laudantium-quia-et-ea','William\'s conduct at first she thought of herself, \'I wonder what CAN have happened to me! I\'LL soon make you grow shorter.\' \'One side of the thing at all. \'But perhaps he can\'t help that,\' said the Hatter. \'He won\'t stand beating. Now, if you only.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (38,'id','Eaque laudantium quia et ea.','eaque-laudantium-quia-et-ea','William\'s conduct at first she thought of herself, \'I wonder what CAN have happened to me! I\'LL soon make you grow shorter.\' \'One side of the thing at all. \'But perhaps he can\'t help that,\' said the Hatter. \'He won\'t stand beating. Now, if you only.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (39,'en','Ipsum quis numquam veniam qui autem id qui aliquam.','ipsum-quis-numquam-veniam-qui-autem-id-qui-aliquam','So she sat still and said to the cur, \"Such a trial, dear Sir, With no jury or judge, would be very likely true.) Down, down, down. Would the fall was over. However, when they arrived, with a lobster as a drawing of a muchness?\' \'Really, now you.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (39,'id','Ipsum quis numquam veniam qui autem id qui aliquam.','ipsum-quis-numquam-veniam-qui-autem-id-qui-aliquam','So she sat still and said to the cur, \"Such a trial, dear Sir, With no jury or judge, would be very likely true.) Down, down, down. Would the fall was over. However, when they arrived, with a lobster as a drawing of a muchness?\' \'Really, now you.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (40,'en','Sunt quae voluptates dicta molestiae adipisci qui doloribus.','sunt-quae-voluptates-dicta-molestiae-adipisci-qui-doloribus','King put on her spectacles, and began smoking again. This time there were a Duck and a fall, and a bright brass plate with the other: the Duchess sang the second verse of the moment they saw her, they hurried back to the fifth bend, I think?\' he.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (40,'id','Sunt quae voluptates dicta molestiae adipisci qui doloribus.','sunt-quae-voluptates-dicta-molestiae-adipisci-qui-doloribus','King put on her spectacles, and began smoking again. This time there were a Duck and a fall, and a bright brass plate with the other: the Duchess sang the second verse of the moment they saw her, they hurried back to the fifth bend, I think?\' he.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (41,'en','Ad eius voluptas et sunt.','ad-eius-voluptas-et-sunt','However, she got back to the Cheshire Cat sitting on a three-legged stool in the wood, \'is to grow up again! Let me see: I\'ll give them a railway station.) However, she did so, very carefully, with one eye, How the Owl and the happy summer days..');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (41,'id','Ad eius voluptas et sunt.','ad-eius-voluptas-et-sunt','However, she got back to the Cheshire Cat sitting on a three-legged stool in the wood, \'is to grow up again! Let me see: I\'ll give them a railway station.) However, she did so, very carefully, with one eye, How the Owl and the happy summer days..');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (42,'en','Mollitia beatae at et.','mollitia-beatae-at-et','I eat or drink something or other; but the Dormouse began in a whisper, half afraid that she still held the pieces of mushroom in her life before, and he went on, \'and most of \'em do.\' \'I don\'t believe there\'s an atom of meaning in it, \'and what is.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (42,'id','Mollitia beatae at et.','mollitia-beatae-at-et','I eat or drink something or other; but the Dormouse began in a whisper, half afraid that she still held the pieces of mushroom in her life before, and he went on, \'and most of \'em do.\' \'I don\'t believe there\'s an atom of meaning in it, \'and what is.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (43,'en','Soluta ut sunt quisquam et.','soluta-ut-sunt-quisquam-et','Alice a little pattering of footsteps in the kitchen. \'When I\'M a Duchess,\' she said this, she came upon a little bottle that stood near the looking-glass. There was no time to hear it say, as it went, as if it please your Majesty!\' the Duchess by.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (43,'id','Soluta ut sunt quisquam et.','soluta-ut-sunt-quisquam-et','Alice a little pattering of footsteps in the kitchen. \'When I\'M a Duchess,\' she said this, she came upon a little bottle that stood near the looking-glass. There was no time to hear it say, as it went, as if it please your Majesty!\' the Duchess by.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (44,'en','Facere eius eius dicta voluptatem fugiat consequuntur tenetur.','facere-eius-eius-dicta-voluptatem-fugiat-consequuntur-tenetur','There were doors all round her, calling out in a Little Bill It was so large in the way to explain the mistake it had come to the Gryphon. \'Turn a somersault in the lap of her ever getting out of this sort of mixed flavour of cherry-tart, custard,.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (44,'id','Facere eius eius dicta voluptatem fugiat consequuntur tenetur.','facere-eius-eius-dicta-voluptatem-fugiat-consequuntur-tenetur','There were doors all round her, calling out in a Little Bill It was so large in the way to explain the mistake it had come to the Gryphon. \'Turn a somersault in the lap of her ever getting out of this sort of mixed flavour of cherry-tart, custard,.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (45,'en','Qui est sit ducimus voluptate aut occaecati non tempora.','qui-est-sit-ducimus-voluptate-aut-occaecati-non-tempora','I needn\'t be so stingy about it, you know--\' She had just upset the week before. \'Oh, I BEG your pardon!\' she exclaimed in a very difficult question. However, at last she stretched her arms folded, frowning like a thunderstorm. \'A fine day, your.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (45,'id','Qui est sit ducimus voluptate aut occaecati non tempora.','qui-est-sit-ducimus-voluptate-aut-occaecati-non-tempora','I needn\'t be so stingy about it, you know--\' She had just upset the week before. \'Oh, I BEG your pardon!\' she exclaimed in a very difficult question. However, at last she stretched her arms folded, frowning like a thunderstorm. \'A fine day, your.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (46,'en','Dolorem impedit ipsa a qui ad laudantium architecto.','dolorem-impedit-ipsa-a-qui-ad-laudantium-architecto','Hatter, and he poured a little scream of laughter. \'Oh, hush!\' the Rabbit say to itself, half to Alice. \'Only a thimble,\' said Alice indignantly. \'Ah! then yours wasn\'t a bit hurt, and she looked back once or twice she had sat down and began.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (46,'id','Dolorem impedit ipsa a qui ad laudantium architecto.','dolorem-impedit-ipsa-a-qui-ad-laudantium-architecto','Hatter, and he poured a little scream of laughter. \'Oh, hush!\' the Rabbit say to itself, half to Alice. \'Only a thimble,\' said Alice indignantly. \'Ah! then yours wasn\'t a bit hurt, and she looked back once or twice she had sat down and began.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (47,'en','Maiores soluta omnis culpa dolorum repudiandae quibusdam et.','maiores-soluta-omnis-culpa-dolorum-repudiandae-quibusdam-et','Bill\'s place for a baby: altogether Alice did not wish to offend the Dormouse began in a great deal too flustered to tell its age, there was a dispute going on rather better now,\' she added in an undertone to the other, trying every door, she found.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (47,'id','Maiores soluta omnis culpa dolorum repudiandae quibusdam et.','maiores-soluta-omnis-culpa-dolorum-repudiandae-quibusdam-et','Bill\'s place for a baby: altogether Alice did not wish to offend the Dormouse began in a great deal too flustered to tell its age, there was a dispute going on rather better now,\' she added in an undertone to the other, trying every door, she found.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (48,'en','Quis ipsam id ab velit et repellendus praesentium quae.','quis-ipsam-id-ab-velit-et-repellendus-praesentium-quae','Alice was silent. The Dormouse again took a great thistle, to keep herself from being broken. She hastily put down yet, before the end of his shrill little voice, the name of the Lizard\'s slate-pencil, and the bright flower-beds and the three.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (48,'id','Quis ipsam id ab velit et repellendus praesentium quae.','quis-ipsam-id-ab-velit-et-repellendus-praesentium-quae','Alice was silent. The Dormouse again took a great thistle, to keep herself from being broken. She hastily put down yet, before the end of his shrill little voice, the name of the Lizard\'s slate-pencil, and the bright flower-beds and the three.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (49,'en','Sunt et dolor corporis sit dolorem.','sunt-et-dolor-corporis-sit-dolorem','I suppose.\' So she sat on, with closed eyes, and half believed herself in Wonderland, though she felt that it might tell her something about the reason and all the while, till at last turned sulky, and would only say, \'I am older than you, and.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (49,'id','Sunt et dolor corporis sit dolorem.','sunt-et-dolor-corporis-sit-dolorem','I suppose.\' So she sat on, with closed eyes, and half believed herself in Wonderland, though she felt that it might tell her something about the reason and all the while, till at last turned sulky, and would only say, \'I am older than you, and.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (50,'en','Quis consequatur nostrum et sed qui nemo minima.','quis-consequatur-nostrum-et-sed-qui-nemo-minima','Queen. \'It proves nothing of the evening, beautiful Soup! Beau--ootiful Soo--oop! Beau--ootiful Soo--oop! Beau--ootiful Soo--oop! Beau--ootiful Soo--oop! Soo--oop of the bread-and-butter. Just at this corner--No, tie \'em together first--they don\'t.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (50,'id','Quis consequatur nostrum et sed qui nemo minima.','quis-consequatur-nostrum-et-sed-qui-nemo-minima','Queen. \'It proves nothing of the evening, beautiful Soup! Beau--ootiful Soo--oop! Beau--ootiful Soo--oop! Beau--ootiful Soo--oop! Beau--ootiful Soo--oop! Soo--oop of the bread-and-butter. Just at this corner--No, tie \'em together first--they don\'t.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (51,'en','Tenetur expedita ipsum sint molestiae eaque beatae culpa.','tenetur-expedita-ipsum-sint-molestiae-eaque-beatae-culpa','Alice could see her after the others. \'Are their heads down! I am so VERY wide, but she heard one of the conversation. Alice felt a very grave voice, \'until all the party sat silent and looked into its face to see it again, but it was talking in.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (51,'id','Tenetur expedita ipsum sint molestiae eaque beatae culpa.','tenetur-expedita-ipsum-sint-molestiae-eaque-beatae-culpa','Alice could see her after the others. \'Are their heads down! I am so VERY wide, but she heard one of the conversation. Alice felt a very grave voice, \'until all the party sat silent and looked into its face to see it again, but it was talking in.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (52,'en','Quia consequuntur necessitatibus vitae maxime et.','quia-consequuntur-necessitatibus-vitae-maxime-et','Alice didn\'t think that there was Mystery,\' the Mock Turtle; \'but it doesn\'t mind.\' The table was a child,\' said the young Crab, a little house in it about four inches deep and reaching half down the hall. After a time she had succeeded in getting.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (52,'id','Quia consequuntur necessitatibus vitae maxime et.','quia-consequuntur-necessitatibus-vitae-maxime-et','Alice didn\'t think that there was Mystery,\' the Mock Turtle; \'but it doesn\'t mind.\' The table was a child,\' said the young Crab, a little house in it about four inches deep and reaching half down the hall. After a time she had succeeded in getting.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (53,'en','Nihil repellat qui molestiae velit quo.','nihil-repellat-qui-molestiae-velit-quo','VERY much out of a sea of green leaves that lay far below her. \'What CAN all that stuff,\' the Mock Turtle interrupted, \'if you don\'t even know what they\'re about!\' \'Read them,\' said the Gryphon. \'I mean, what makes them so shiny?\' Alice looked very.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (53,'id','Nihil repellat qui molestiae velit quo.','nihil-repellat-qui-molestiae-velit-quo','VERY much out of a sea of green leaves that lay far below her. \'What CAN all that stuff,\' the Mock Turtle interrupted, \'if you don\'t even know what they\'re about!\' \'Read them,\' said the Gryphon. \'I mean, what makes them so shiny?\' Alice looked very.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (54,'en','Praesentium ad quod fugiat perspiciatis laudantium et.','praesentium-ad-quod-fugiat-perspiciatis-laudantium-et','Alice was beginning to end,\' said the sage, as he fumbled over the list, feeling very curious to see the Mock Turtle. \'Very much indeed,\' said Alice. \'Oh, don\'t talk about cats or dogs either, if you want to get out at all fairly,\' Alice began, in.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (54,'id','Praesentium ad quod fugiat perspiciatis laudantium et.','praesentium-ad-quod-fugiat-perspiciatis-laudantium-et','Alice was beginning to end,\' said the sage, as he fumbled over the list, feeling very curious to see the Mock Turtle. \'Very much indeed,\' said Alice. \'Oh, don\'t talk about cats or dogs either, if you want to get out at all fairly,\' Alice began, in.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (55,'en','Rerum dolor et sint doloremque.','rerum-dolor-et-sint-doloremque','Mock Turtle at last, and managed to put the Dormouse sulkily remarked, \'If you please, sir--\' The Rabbit started violently, dropped the white kid gloves in one hand and a long argument with the Queen till she was saying, and the pattern on their.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (55,'id','Rerum dolor et sint doloremque.','rerum-dolor-et-sint-doloremque','Mock Turtle at last, and managed to put the Dormouse sulkily remarked, \'If you please, sir--\' The Rabbit started violently, dropped the white kid gloves in one hand and a long argument with the Queen till she was saying, and the pattern on their.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (56,'en','Odit amet autem neque ab.','odit-amet-autem-neque-ab','DOES THE BOOTS AND SHOES.\' the Gryphon whispered in reply, \'for fear they should forget them before the officer could get away without speaking, but at last came a little before she got back to the Duchess: \'flamingoes and mustard both bite. And.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (56,'id','Odit amet autem neque ab.','odit-amet-autem-neque-ab','DOES THE BOOTS AND SHOES.\' the Gryphon whispered in reply, \'for fear they should forget them before the officer could get away without speaking, but at last came a little before she got back to the Duchess: \'flamingoes and mustard both bite. And.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (57,'en','Excepturi quam repellendus quo facere optio in.','excepturi-quam-repellendus-quo-facere-optio-in','I think?\' \'I had NOT!\' cried the Mock Turtle would be very likely it can talk: at any rate he might answer questions.--How am I to do?\' said Alice. \'Why?\' \'IT DOES THE BOOTS AND SHOES.\' the Gryphon remarked: \'because they lessen from day to such.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (57,'id','Excepturi quam repellendus quo facere optio in.','excepturi-quam-repellendus-quo-facere-optio-in','I think?\' \'I had NOT!\' cried the Mock Turtle would be very likely it can talk: at any rate he might answer questions.--How am I to do?\' said Alice. \'Why?\' \'IT DOES THE BOOTS AND SHOES.\' the Gryphon remarked: \'because they lessen from day to such.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (58,'en','Cum blanditiis quo quia ad.','cum-blanditiis-quo-quia-ad','The first thing she heard a little shriek, and went by without noticing her. Then followed the Knave of Hearts, carrying the King\'s crown on a summer day: The Knave did so, very carefully, with one foot. \'Get up!\' said the King, going up to them.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (58,'id','Cum blanditiis quo quia ad.','cum-blanditiis-quo-quia-ad','The first thing she heard a little shriek, and went by without noticing her. Then followed the Knave of Hearts, carrying the King\'s crown on a summer day: The Knave did so, very carefully, with one foot. \'Get up!\' said the King, going up to them.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (59,'en','Ea id voluptas magnam sed.','ea-id-voluptas-magnam-sed','Alice. \'It must have imitated somebody else\'s hand,\' said the Dormouse, who seemed to be lost, as she spoke, but no result seemed to have been a RED rose-tree, and we won\'t talk about cats or dogs either, if you please! \"William the Conqueror,.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (59,'id','Ea id voluptas magnam sed.','ea-id-voluptas-magnam-sed','Alice. \'It must have imitated somebody else\'s hand,\' said the Dormouse, who seemed to be lost, as she spoke, but no result seemed to have been a RED rose-tree, and we won\'t talk about cats or dogs either, if you please! \"William the Conqueror,.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (60,'en','Repellendus aspernatur iure quia dolorem rem quos a.','repellendus-aspernatur-iure-quia-dolorem-rem-quos-a','Alice. \'I\'M not a mile high,\' said Alice. \'Of course twinkling begins with an air of great dismay, and began singing in its hurry to change the subject,\' the March Hare, \'that \"I breathe when I was going to do anything but sit with its wings..');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (60,'id','Repellendus aspernatur iure quia dolorem rem quos a.','repellendus-aspernatur-iure-quia-dolorem-rem-quos-a','Alice. \'I\'M not a mile high,\' said Alice. \'Of course twinkling begins with an air of great dismay, and began singing in its hurry to change the subject,\' the March Hare, \'that \"I breathe when I was going to do anything but sit with its wings..');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (61,'en','Temporibus voluptas qui rerum blanditiis corrupti.','temporibus-voluptas-qui-rerum-blanditiis-corrupti','I wonder who will put on one side, to look at me like that!\' But she waited for a minute, nurse! But I\'ve got to?\' (Alice had been all the jurymen on to himself as he spoke, \'we were trying--\' \'I see!\' said the Hatter. \'I told you that.\' \'If I\'d.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (61,'id','Temporibus voluptas qui rerum blanditiis corrupti.','temporibus-voluptas-qui-rerum-blanditiis-corrupti','I wonder who will put on one side, to look at me like that!\' But she waited for a minute, nurse! But I\'ve got to?\' (Alice had been all the jurymen on to himself as he spoke, \'we were trying--\' \'I see!\' said the Hatter. \'I told you that.\' \'If I\'d.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (62,'en','Maiores eum quia repudiandae totam.','maiores-eum-quia-repudiandae-totam','White Rabbit, \'but it doesn\'t matter much,\' thought Alice, \'as all the right size, that it was only sobbing,\' she thought, \'till its ears have come, or at any rate I\'ll never go THERE again!\' said Alice sharply, for she was appealed to by all three.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (62,'id','Maiores eum quia repudiandae totam.','maiores-eum-quia-repudiandae-totam','White Rabbit, \'but it doesn\'t matter much,\' thought Alice, \'as all the right size, that it was only sobbing,\' she thought, \'till its ears have come, or at any rate I\'ll never go THERE again!\' said Alice sharply, for she was appealed to by all three.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (63,'en','Doloremque quia fugiat sint laborum doloribus quia suscipit magni.','doloremque-quia-fugiat-sint-laborum-doloribus-quia-suscipit-magni','This time there were a Duck and a great crowd assembled about them--all sorts of little birds and beasts, as well go back, and see what was going to begin with; and being so many lessons to learn! Oh, I shouldn\'t want YOURS: I don\'t remember.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (63,'id','Doloremque quia fugiat sint laborum doloribus quia suscipit magni.','doloremque-quia-fugiat-sint-laborum-doloribus-quia-suscipit-magni','This time there were a Duck and a great crowd assembled about them--all sorts of little birds and beasts, as well go back, and see what was going to begin with; and being so many lessons to learn! Oh, I shouldn\'t want YOURS: I don\'t remember.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (64,'en','Sit tempore consequatur qui nostrum aut.','sit-tempore-consequatur-qui-nostrum-aut','Mock Turtle, \'Drive on, old fellow! Don\'t be all day about it!\' and he says it\'s so useful, it\'s worth a hundred pounds! He says it kills all the jurymen on to the Cheshire Cat sitting on the stairs. Alice knew it was very fond of beheading people.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (64,'id','Sit tempore consequatur qui nostrum aut.','sit-tempore-consequatur-qui-nostrum-aut','Mock Turtle, \'Drive on, old fellow! Don\'t be all day about it!\' and he says it\'s so useful, it\'s worth a hundred pounds! He says it kills all the jurymen on to the Cheshire Cat sitting on the stairs. Alice knew it was very fond of beheading people.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (65,'en','Eum in et et accusamus quia ea nobis quae.','eum-in-et-et-accusamus-quia-ea-nobis-quae','Mouse looked at them with large eyes full of smoke from one end of your flamingo. Shall I try the effect: the next witness!\' said the youth, \'and your jaws are too weak For anything tougher than suet; Yet you finished the first sentence in her.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (65,'id','Eum in et et accusamus quia ea nobis quae.','eum-in-et-et-accusamus-quia-ea-nobis-quae','Mouse looked at them with large eyes full of smoke from one end of your flamingo. Shall I try the effect: the next witness!\' said the youth, \'and your jaws are too weak For anything tougher than suet; Yet you finished the first sentence in her.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (66,'en','Praesentium magnam expedita dolor et.','praesentium-magnam-expedita-dolor-et','Mock Turtle. \'And how do you want to go on. \'And so these three weeks!\' \'I\'m very sorry you\'ve been annoyed,\' said Alice, in a sulky tone, as it left no mark on the trumpet, and called out, \'Sit down, all of them attempted to explain the paper. \'If.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (66,'id','Praesentium magnam expedita dolor et.','praesentium-magnam-expedita-dolor-et','Mock Turtle. \'And how do you want to go on. \'And so these three weeks!\' \'I\'m very sorry you\'ve been annoyed,\' said Alice, in a sulky tone, as it left no mark on the trumpet, and called out, \'Sit down, all of them attempted to explain the paper. \'If.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (67,'en','Nobis dolore est porro quam.','nobis-dolore-est-porro-quam','King. \'Then it doesn\'t matter much,\' thought Alice, and, after folding his arms and frowning at the stick, running a very difficult game indeed. The players all played at once in her life; it was impossible to say anything. \'Why,\' said the Queen.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (67,'id','Nobis dolore est porro quam.','nobis-dolore-est-porro-quam','King. \'Then it doesn\'t matter much,\' thought Alice, and, after folding his arms and frowning at the stick, running a very difficult game indeed. The players all played at once in her life; it was impossible to say anything. \'Why,\' said the Queen.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (68,'en','Minus cupiditate in sapiente ad.','minus-cupiditate-in-sapiente-ad','And when I got up and saying, \'Thank you, sir, for your walk!\" \"Coming in a hurry. \'No, I\'ll look first,\' she said, without even waiting to put it right; \'not that it was out of sight. Alice remained looking thoughtfully at the mushroom for a great.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (68,'id','Minus cupiditate in sapiente ad.','minus-cupiditate-in-sapiente-ad','And when I got up and saying, \'Thank you, sir, for your walk!\" \"Coming in a hurry. \'No, I\'ll look first,\' she said, without even waiting to put it right; \'not that it was out of sight. Alice remained looking thoughtfully at the mushroom for a great.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (69,'en','Enim fugit officia repudiandae autem quo.','enim-fugit-officia-repudiandae-autem-quo','King. \'Nothing whatever,\' said Alice. \'You are,\' said the King, with an M, such as mouse-traps, and the pool a little scream of laughter. \'Oh, hush!\' the Rabbit coming to look through into the loveliest garden you ever see such a nice soft thing to.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (69,'id','Enim fugit officia repudiandae autem quo.','enim-fugit-officia-repudiandae-autem-quo','King. \'Nothing whatever,\' said Alice. \'You are,\' said the King, with an M, such as mouse-traps, and the pool a little scream of laughter. \'Oh, hush!\' the Rabbit coming to look through into the loveliest garden you ever see such a nice soft thing to.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (70,'en','test','test','test');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (70,'id','TEst','test-2','test');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (71,'en','Test (English)','test-english','TEST');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (71,'id','Test (Bahasa)','test-bahasa','TEST');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (72,'en','HANGING EXHIBIT','hanging-exhibit','At vero eos et accusamus et iusto odio madeline dignis imosse ducimus qui. Ut enim ad minim veniam, quis nostrud mellark exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure cillum fugiat nulla pariatu prodiener excepteur sint occaecat cupidatat non proident.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (72,'id','HANGING EXHIBIT','hanging-exhibit-2','At vero eos et accusamus et iusto odio madeline dignis imosse ducimus qui. Ut enim ad minim veniam, quis nostrud mellark exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure cillum fugiat nulla pariatu prodiener excepteur sint occaecat cupidatat non proident.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (73,'en','Art Installation','art-installation','At vero eos et accusamus et iusto odio madeline dignis imosse ducimus qui. Ut enim ad minim veniam, quis nostrud mellark exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure cillum fugiat nulla pariatu prodiener excepteur sint occaecat cupidatat non proident.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (73,'id','Art Installation','art-installation-2','At vero eos et accusamus et iusto odio madeline dignis imosse ducimus qui. Ut enim ad minim veniam, quis nostrud mellark exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure cillum fugiat nulla pariatu prodiener excepteur sint occaecat cupidatat non proident.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (74,'en','The Aquarium (en)','the-aquarium-en','At vero eos et accusamus et iusto odio madeline dignis imosse ducimus qui. Ut enim ad minim veniam, quis nostrud mellark exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure cillum fugiat nulla pariatu prodiener excepteur sint occaecat cupidatat non proident.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (74,'id','The Aquarium (ID)','the-aquarium-id','At vero eos et accusamus et iusto odio madeline dignis imosse ducimus qui. Ut enim ad minim veniam, quis nostrud mellark exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure cillum fugiat nulla pariatu prodiener excepteur sint occaecat cupidatat non proident.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (75,'en','DIVE WITH SHARKS (EN)','dive-with-sharks-en','At vero eos et accusamus et iusto odio madeline dignis imosse ducimus qui. Ut enim ad minim veniam, quis nostrud mellark exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure cillum fugiat nulla pariatu prodiener excepteur sint occaecat cupidatat non proident.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (75,'id','DIVE WITH SHARKS (ID)','dive-with-sharks-id','At vero eos et accusamus et iusto odio madeline dignis imosse ducimus qui. Ut enim ad minim veniam, quis nostrud mellark exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure cillum fugiat nulla pariatu prodiener excepteur sint occaecat cupidatat non proident.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (76,'en','THE MERMAID SONG (EN)','the-mermaid-song-en','At vero eos et accusamus et iusto odio madeline dignis imosse ducimus qui. Ut enim ad minim veniam, quis nostrud mellark exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure cillum fugiat nulla pariatu prodiener excepteur sint occaecat cupidatat non proident.');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (76,'id','THE MERMAID SONG (ID)','the-mermaid-song-id','At vero eos et accusamus et iusto odio madeline dignis imosse ducimus qui. Ut enim ad minim veniam, quis nostrud mellark exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure cillum fugiat nulla pariatu prodiener excepteur sint occaecat cupidatat non proident.');

/*Table structure for table `post_has_categories` */

CREATE TABLE `post_has_categories` (
  `post_id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`post_id`,`category_id`),
  KEY `post_has_categories_category_id_foreign` (`category_id`),
  CONSTRAINT `post_has_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `post_has_categories_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `post_has_categories` */

insert  into `post_has_categories`(`post_id`,`category_id`) values (17,2);
insert  into `post_has_categories`(`post_id`,`category_id`) values (18,2);
insert  into `post_has_categories`(`post_id`,`category_id`) values (19,3);
insert  into `post_has_categories`(`post_id`,`category_id`) values (71,3);
insert  into `post_has_categories`(`post_id`,`category_id`) values (72,17);
insert  into `post_has_categories`(`post_id`,`category_id`) values (73,17);
insert  into `post_has_categories`(`post_id`,`category_id`) values (74,18);
insert  into `post_has_categories`(`post_id`,`category_id`) values (75,18);
insert  into `post_has_categories`(`post_id`,`category_id`) values (76,18);
insert  into `post_has_categories`(`post_id`,`category_id`) values (76,19);
insert  into `post_has_categories`(`post_id`,`category_id`) values (70,21);
insert  into `post_has_categories`(`post_id`,`category_id`) values (70,22);

/*Table structure for table `post_has_medias` */

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

insert  into `post_has_medias`(`post_id`,`media_id`,`media_type`) values (17,48,'featured');
insert  into `post_has_medias`(`post_id`,`media_id`,`media_type`) values (18,45,'featured');
insert  into `post_has_medias`(`post_id`,`media_id`,`media_type`) values (19,51,'featured');
insert  into `post_has_medias`(`post_id`,`media_id`,`media_type`) values (20,53,'featured');
insert  into `post_has_medias`(`post_id`,`media_id`,`media_type`) values (21,55,'featured');
insert  into `post_has_medias`(`post_id`,`media_id`,`media_type`) values (22,54,'featured');
insert  into `post_has_medias`(`post_id`,`media_id`,`media_type`) values (23,55,'featured');
insert  into `post_has_medias`(`post_id`,`media_id`,`media_type`) values (24,55,'featured');
insert  into `post_has_medias`(`post_id`,`media_id`,`media_type`) values (25,54,'featured');
insert  into `post_has_medias`(`post_id`,`media_id`,`media_type`) values (26,53,'featured');
insert  into `post_has_medias`(`post_id`,`media_id`,`media_type`) values (27,53,'featured');
insert  into `post_has_medias`(`post_id`,`media_id`,`media_type`) values (28,51,'featured');
insert  into `post_has_medias`(`post_id`,`media_id`,`media_type`) values (29,52,'featured');
insert  into `post_has_medias`(`post_id`,`media_id`,`media_type`) values (30,51,'featured');
insert  into `post_has_medias`(`post_id`,`media_id`,`media_type`) values (31,53,'featured');
insert  into `post_has_medias`(`post_id`,`media_id`,`media_type`) values (32,51,'featured');
insert  into `post_has_medias`(`post_id`,`media_id`,`media_type`) values (33,55,'featured');
insert  into `post_has_medias`(`post_id`,`media_id`,`media_type`) values (34,51,'featured');
insert  into `post_has_medias`(`post_id`,`media_id`,`media_type`) values (35,53,'featured');
insert  into `post_has_medias`(`post_id`,`media_id`,`media_type`) values (36,54,'featured');
insert  into `post_has_medias`(`post_id`,`media_id`,`media_type`) values (37,54,'featured');
insert  into `post_has_medias`(`post_id`,`media_id`,`media_type`) values (38,52,'featured');
insert  into `post_has_medias`(`post_id`,`media_id`,`media_type`) values (39,53,'featured');
insert  into `post_has_medias`(`post_id`,`media_id`,`media_type`) values (40,51,'featured');
insert  into `post_has_medias`(`post_id`,`media_id`,`media_type`) values (41,51,'featured');
insert  into `post_has_medias`(`post_id`,`media_id`,`media_type`) values (42,52,'featured');
insert  into `post_has_medias`(`post_id`,`media_id`,`media_type`) values (43,52,'featured');
insert  into `post_has_medias`(`post_id`,`media_id`,`media_type`) values (44,52,'featured');
insert  into `post_has_medias`(`post_id`,`media_id`,`media_type`) values (45,53,'featured');
insert  into `post_has_medias`(`post_id`,`media_id`,`media_type`) values (46,55,'featured');
insert  into `post_has_medias`(`post_id`,`media_id`,`media_type`) values (47,55,'featured');
insert  into `post_has_medias`(`post_id`,`media_id`,`media_type`) values (48,52,'featured');
insert  into `post_has_medias`(`post_id`,`media_id`,`media_type`) values (49,53,'featured');
insert  into `post_has_medias`(`post_id`,`media_id`,`media_type`) values (50,51,'featured');
insert  into `post_has_medias`(`post_id`,`media_id`,`media_type`) values (51,54,'featured');
insert  into `post_has_medias`(`post_id`,`media_id`,`media_type`) values (52,52,'featured');
insert  into `post_has_medias`(`post_id`,`media_id`,`media_type`) values (53,55,'featured');
insert  into `post_has_medias`(`post_id`,`media_id`,`media_type`) values (54,54,'featured');
insert  into `post_has_medias`(`post_id`,`media_id`,`media_type`) values (55,51,'featured');
insert  into `post_has_medias`(`post_id`,`media_id`,`media_type`) values (56,54,'featured');
insert  into `post_has_medias`(`post_id`,`media_id`,`media_type`) values (57,52,'featured');
insert  into `post_has_medias`(`post_id`,`media_id`,`media_type`) values (58,54,'featured');
insert  into `post_has_medias`(`post_id`,`media_id`,`media_type`) values (59,55,'featured');
insert  into `post_has_medias`(`post_id`,`media_id`,`media_type`) values (60,54,'featured');
insert  into `post_has_medias`(`post_id`,`media_id`,`media_type`) values (61,54,'featured');
insert  into `post_has_medias`(`post_id`,`media_id`,`media_type`) values (62,52,'featured');
insert  into `post_has_medias`(`post_id`,`media_id`,`media_type`) values (63,55,'featured');
insert  into `post_has_medias`(`post_id`,`media_id`,`media_type`) values (64,53,'featured');
insert  into `post_has_medias`(`post_id`,`media_id`,`media_type`) values (65,52,'featured');
insert  into `post_has_medias`(`post_id`,`media_id`,`media_type`) values (66,52,'featured');
insert  into `post_has_medias`(`post_id`,`media_id`,`media_type`) values (67,52,'featured');
insert  into `post_has_medias`(`post_id`,`media_id`,`media_type`) values (68,55,'featured');
insert  into `post_has_medias`(`post_id`,`media_id`,`media_type`) values (69,54,'featured');
insert  into `post_has_medias`(`post_id`,`media_id`,`media_type`) values (71,53,'featured');
insert  into `post_has_medias`(`post_id`,`media_id`,`media_type`) values (72,57,'featured');
insert  into `post_has_medias`(`post_id`,`media_id`,`media_type`) values (73,56,'featured');
insert  into `post_has_medias`(`post_id`,`media_id`,`media_type`) values (74,61,'featured');
insert  into `post_has_medias`(`post_id`,`media_id`,`media_type`) values (75,60,'featured');
insert  into `post_has_medias`(`post_id`,`media_id`,`media_type`) values (76,60,'featured');

/*Table structure for table `post_metas` */

CREATE TABLE `post_metas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(10) unsigned NOT NULL,
  `meta_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_value` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `post_metas_post_id_foreign` (`post_id`),
  CONSTRAINT `post_metas_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `post_metas` */

insert  into `post_metas`(`id`,`post_id`,`meta_key`,`meta_value`) values (8,19,'whats_on','1');
insert  into `post_metas`(`id`,`post_id`,`meta_key`,`meta_value`) values (9,19,'featured','1');
insert  into `post_metas`(`id`,`post_id`,`meta_key`,`meta_value`) values (14,20,'featured','1');
insert  into `post_metas`(`id`,`post_id`,`meta_key`,`meta_value`) values (15,21,'featured','1');
insert  into `post_metas`(`id`,`post_id`,`meta_key`,`meta_value`) values (20,71,'meta_description-en','Meta (English)');
insert  into `post_metas`(`id`,`post_id`,`meta_key`,`meta_value`) values (21,71,'meta_description-id','Meta (Bahasa)');
insert  into `post_metas`(`id`,`post_id`,`meta_key`,`meta_value`) values (22,72,'meta_description-en','META (ENG)');
insert  into `post_metas`(`id`,`post_id`,`meta_key`,`meta_value`) values (23,72,'meta_description-id','Meta (ID)');
insert  into `post_metas`(`id`,`post_id`,`meta_key`,`meta_value`) values (24,70,'meta_description-en','Media Meta (EN)');
insert  into `post_metas`(`id`,`post_id`,`meta_key`,`meta_value`) values (25,70,'meta_description-id','Media Meta (ID)');

/*Table structure for table `post_types` */

CREATE TABLE `post_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `post_types` */

insert  into `post_types`(`id`,`name`,`slug`,`created_at`,`updated_at`) values (1,'Post','post','2016-10-13 18:32:05','2016-10-13 18:32:05');
insert  into `post_types`(`id`,`name`,`slug`,`created_at`,`updated_at`) values (2,'News','news','2016-10-26 18:44:06','2016-10-26 18:44:06');
insert  into `post_types`(`id`,`name`,`slug`,`created_at`,`updated_at`) values (3,'Attraction and Experience','attraction-and-experience','2016-10-13 20:13:53','2016-10-13 20:13:53');
insert  into `post_types`(`id`,`name`,`slug`,`created_at`,`updated_at`) values (4,'Media Room','media-room','2016-11-05 14:22:54','2016-11-05 14:22:57');

/*Table structure for table `posts` */

CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_type_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'draft',
  `publish_date` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `posts` */

insert  into `posts`(`id`,`post_type_id`,`created_at`,`updated_at`,`status`,`publish_date`,`created_by`) values (17,1,'2016-10-22 19:20:17','2016-10-27 18:34:17','PUBLISH','2016-10-22 19:19:00',1);
insert  into `posts`(`id`,`post_type_id`,`created_at`,`updated_at`,`status`,`publish_date`,`created_by`) values (18,1,'2016-10-24 11:40:55','2016-10-24 18:15:16','PUBLISH','2016-10-24 11:35:00',1);
insert  into `posts`(`id`,`post_type_id`,`created_at`,`updated_at`,`status`,`publish_date`,`created_by`) values (19,2,'2016-10-27 18:22:34','2016-11-03 11:03:29','PUBLISH','2016-10-27 18:22:00',1);
insert  into `posts`(`id`,`post_type_id`,`created_at`,`updated_at`,`status`,`publish_date`,`created_by`) values (20,2,'2016-11-03 13:19:49','2016-11-03 13:20:11','PUBLISH','2016-11-03 00:00:00',1);
insert  into `posts`(`id`,`post_type_id`,`created_at`,`updated_at`,`status`,`publish_date`,`created_by`) values (21,2,'2016-11-03 13:19:49','2016-11-03 13:20:20','PUBLISH','2016-11-03 00:00:00',1);
insert  into `posts`(`id`,`post_type_id`,`created_at`,`updated_at`,`status`,`publish_date`,`created_by`) values (22,2,'2016-11-03 13:19:49','2016-11-03 13:19:49','PUBLISH','2016-11-03 00:00:00',1);
insert  into `posts`(`id`,`post_type_id`,`created_at`,`updated_at`,`status`,`publish_date`,`created_by`) values (23,2,'2016-11-03 13:19:49','2016-11-03 13:19:49','PUBLISH','2016-11-03 00:00:00',1);
insert  into `posts`(`id`,`post_type_id`,`created_at`,`updated_at`,`status`,`publish_date`,`created_by`) values (24,2,'2016-11-03 13:19:49','2016-11-03 13:19:49','PUBLISH','2016-11-03 00:00:00',1);
insert  into `posts`(`id`,`post_type_id`,`created_at`,`updated_at`,`status`,`publish_date`,`created_by`) values (25,2,'2016-11-03 13:19:49','2016-11-03 13:19:49','PUBLISH','2016-11-03 00:00:00',1);
insert  into `posts`(`id`,`post_type_id`,`created_at`,`updated_at`,`status`,`publish_date`,`created_by`) values (26,2,'2016-11-03 13:19:49','2016-11-03 13:19:49','PUBLISH','2016-11-03 00:00:00',1);
insert  into `posts`(`id`,`post_type_id`,`created_at`,`updated_at`,`status`,`publish_date`,`created_by`) values (27,2,'2016-11-03 13:19:49','2016-11-03 13:19:49','PUBLISH','2016-11-03 00:00:00',1);
insert  into `posts`(`id`,`post_type_id`,`created_at`,`updated_at`,`status`,`publish_date`,`created_by`) values (28,2,'2016-11-03 13:19:49','2016-11-03 13:19:49','PUBLISH','2016-11-03 00:00:00',1);
insert  into `posts`(`id`,`post_type_id`,`created_at`,`updated_at`,`status`,`publish_date`,`created_by`) values (29,2,'2016-11-03 13:19:49','2016-11-03 13:19:49','PUBLISH','2016-11-03 00:00:00',1);
insert  into `posts`(`id`,`post_type_id`,`created_at`,`updated_at`,`status`,`publish_date`,`created_by`) values (30,2,'2016-11-03 13:19:49','2016-11-03 13:19:49','PUBLISH','2016-11-03 00:00:00',1);
insert  into `posts`(`id`,`post_type_id`,`created_at`,`updated_at`,`status`,`publish_date`,`created_by`) values (31,2,'2016-11-03 13:19:49','2016-11-03 13:19:49','PUBLISH','2016-11-03 00:00:00',1);
insert  into `posts`(`id`,`post_type_id`,`created_at`,`updated_at`,`status`,`publish_date`,`created_by`) values (32,2,'2016-11-03 13:19:49','2016-11-03 13:19:49','PUBLISH','2016-11-03 00:00:00',1);
insert  into `posts`(`id`,`post_type_id`,`created_at`,`updated_at`,`status`,`publish_date`,`created_by`) values (33,2,'2016-11-03 13:19:49','2016-11-03 13:19:49','PUBLISH','2016-11-03 00:00:00',1);
insert  into `posts`(`id`,`post_type_id`,`created_at`,`updated_at`,`status`,`publish_date`,`created_by`) values (34,2,'2016-11-03 13:19:49','2016-11-03 13:19:49','PUBLISH','2016-11-03 00:00:00',1);
insert  into `posts`(`id`,`post_type_id`,`created_at`,`updated_at`,`status`,`publish_date`,`created_by`) values (35,2,'2016-11-03 13:19:49','2016-11-03 13:19:49','PUBLISH','2016-11-03 00:00:00',1);
insert  into `posts`(`id`,`post_type_id`,`created_at`,`updated_at`,`status`,`publish_date`,`created_by`) values (36,2,'2016-11-03 13:19:49','2016-11-03 13:19:49','PUBLISH','2016-11-03 00:00:00',1);
insert  into `posts`(`id`,`post_type_id`,`created_at`,`updated_at`,`status`,`publish_date`,`created_by`) values (37,2,'2016-11-03 13:19:49','2016-11-03 13:19:49','PUBLISH','2016-11-03 00:00:00',1);
insert  into `posts`(`id`,`post_type_id`,`created_at`,`updated_at`,`status`,`publish_date`,`created_by`) values (38,2,'2016-11-03 13:19:49','2016-11-03 13:19:49','PUBLISH','2016-11-03 00:00:00',1);
insert  into `posts`(`id`,`post_type_id`,`created_at`,`updated_at`,`status`,`publish_date`,`created_by`) values (39,2,'2016-11-03 13:19:49','2016-11-03 13:19:49','PUBLISH','2016-11-03 00:00:00',1);
insert  into `posts`(`id`,`post_type_id`,`created_at`,`updated_at`,`status`,`publish_date`,`created_by`) values (40,2,'2016-11-03 13:19:49','2016-11-03 13:19:49','PUBLISH','2016-11-03 00:00:00',1);
insert  into `posts`(`id`,`post_type_id`,`created_at`,`updated_at`,`status`,`publish_date`,`created_by`) values (41,2,'2016-11-03 13:19:49','2016-11-03 13:19:49','PUBLISH','2016-11-03 00:00:00',1);
insert  into `posts`(`id`,`post_type_id`,`created_at`,`updated_at`,`status`,`publish_date`,`created_by`) values (42,2,'2016-11-03 13:19:49','2016-11-03 13:19:49','PUBLISH','2016-11-03 00:00:00',1);
insert  into `posts`(`id`,`post_type_id`,`created_at`,`updated_at`,`status`,`publish_date`,`created_by`) values (43,2,'2016-11-03 13:19:49','2016-11-03 13:19:49','PUBLISH','2016-11-03 00:00:00',1);
insert  into `posts`(`id`,`post_type_id`,`created_at`,`updated_at`,`status`,`publish_date`,`created_by`) values (44,2,'2016-11-03 13:19:49','2016-11-03 13:19:49','PUBLISH','2016-11-03 00:00:00',1);
insert  into `posts`(`id`,`post_type_id`,`created_at`,`updated_at`,`status`,`publish_date`,`created_by`) values (45,2,'2016-11-03 13:19:49','2016-11-03 13:19:49','PUBLISH','2016-11-03 00:00:00',1);
insert  into `posts`(`id`,`post_type_id`,`created_at`,`updated_at`,`status`,`publish_date`,`created_by`) values (46,2,'2016-11-03 13:19:49','2016-11-03 13:19:49','PUBLISH','2016-11-03 00:00:00',1);
insert  into `posts`(`id`,`post_type_id`,`created_at`,`updated_at`,`status`,`publish_date`,`created_by`) values (47,2,'2016-11-03 13:19:49','2016-11-03 13:19:49','PUBLISH','2016-11-03 00:00:00',1);
insert  into `posts`(`id`,`post_type_id`,`created_at`,`updated_at`,`status`,`publish_date`,`created_by`) values (48,2,'2016-11-03 13:19:49','2016-11-03 13:19:49','PUBLISH','2016-11-03 00:00:00',1);
insert  into `posts`(`id`,`post_type_id`,`created_at`,`updated_at`,`status`,`publish_date`,`created_by`) values (49,2,'2016-11-03 13:19:49','2016-11-03 13:19:49','PUBLISH','2016-11-03 00:00:00',1);
insert  into `posts`(`id`,`post_type_id`,`created_at`,`updated_at`,`status`,`publish_date`,`created_by`) values (50,2,'2016-11-03 13:19:49','2016-11-03 13:19:49','PUBLISH','2016-11-03 00:00:00',1);
insert  into `posts`(`id`,`post_type_id`,`created_at`,`updated_at`,`status`,`publish_date`,`created_by`) values (51,2,'2016-11-03 13:19:49','2016-11-03 13:19:49','PUBLISH','2016-11-03 00:00:00',1);
insert  into `posts`(`id`,`post_type_id`,`created_at`,`updated_at`,`status`,`publish_date`,`created_by`) values (52,2,'2016-11-03 13:19:49','2016-11-03 13:19:49','PUBLISH','2016-11-03 00:00:00',1);
insert  into `posts`(`id`,`post_type_id`,`created_at`,`updated_at`,`status`,`publish_date`,`created_by`) values (53,2,'2016-11-03 13:19:49','2016-11-03 13:19:49','PUBLISH','2016-11-03 00:00:00',1);
insert  into `posts`(`id`,`post_type_id`,`created_at`,`updated_at`,`status`,`publish_date`,`created_by`) values (54,2,'2016-11-03 13:19:49','2016-11-03 13:19:49','PUBLISH','2016-11-03 00:00:00',1);
insert  into `posts`(`id`,`post_type_id`,`created_at`,`updated_at`,`status`,`publish_date`,`created_by`) values (55,2,'2016-11-03 13:19:49','2016-11-03 13:19:49','PUBLISH','2016-11-03 00:00:00',1);
insert  into `posts`(`id`,`post_type_id`,`created_at`,`updated_at`,`status`,`publish_date`,`created_by`) values (56,2,'2016-11-03 13:19:49','2016-11-03 13:19:49','PUBLISH','2016-11-03 00:00:00',1);
insert  into `posts`(`id`,`post_type_id`,`created_at`,`updated_at`,`status`,`publish_date`,`created_by`) values (57,2,'2016-11-03 13:19:49','2016-11-03 13:19:49','PUBLISH','2016-11-03 00:00:00',1);
insert  into `posts`(`id`,`post_type_id`,`created_at`,`updated_at`,`status`,`publish_date`,`created_by`) values (58,2,'2016-11-03 13:19:49','2016-11-03 13:19:49','PUBLISH','2016-11-03 00:00:00',1);
insert  into `posts`(`id`,`post_type_id`,`created_at`,`updated_at`,`status`,`publish_date`,`created_by`) values (59,2,'2016-11-03 13:19:49','2016-11-03 13:19:49','PUBLISH','2016-11-03 00:00:00',1);
insert  into `posts`(`id`,`post_type_id`,`created_at`,`updated_at`,`status`,`publish_date`,`created_by`) values (60,2,'2016-11-03 13:19:49','2016-11-03 13:19:49','PUBLISH','2016-11-03 00:00:00',1);
insert  into `posts`(`id`,`post_type_id`,`created_at`,`updated_at`,`status`,`publish_date`,`created_by`) values (61,2,'2016-11-03 13:19:49','2016-11-03 13:19:49','PUBLISH','2016-11-03 00:00:00',1);
insert  into `posts`(`id`,`post_type_id`,`created_at`,`updated_at`,`status`,`publish_date`,`created_by`) values (62,2,'2016-11-03 13:19:49','2016-11-03 13:19:49','PUBLISH','2016-11-03 00:00:00',1);
insert  into `posts`(`id`,`post_type_id`,`created_at`,`updated_at`,`status`,`publish_date`,`created_by`) values (63,2,'2016-11-03 13:19:49','2016-11-03 13:19:49','PUBLISH','2016-11-03 00:00:00',1);
insert  into `posts`(`id`,`post_type_id`,`created_at`,`updated_at`,`status`,`publish_date`,`created_by`) values (64,2,'2016-11-03 13:19:49','2016-11-03 13:19:49','PUBLISH','2016-11-03 00:00:00',1);
insert  into `posts`(`id`,`post_type_id`,`created_at`,`updated_at`,`status`,`publish_date`,`created_by`) values (65,2,'2016-11-03 13:19:49','2016-11-03 13:19:49','PUBLISH','2016-11-03 00:00:00',1);
insert  into `posts`(`id`,`post_type_id`,`created_at`,`updated_at`,`status`,`publish_date`,`created_by`) values (66,2,'2016-11-03 13:19:49','2016-11-03 13:19:49','PUBLISH','2016-11-03 00:00:00',1);
insert  into `posts`(`id`,`post_type_id`,`created_at`,`updated_at`,`status`,`publish_date`,`created_by`) values (67,2,'2016-11-03 13:19:49','2016-11-03 13:19:49','PUBLISH','2016-11-03 00:00:00',1);
insert  into `posts`(`id`,`post_type_id`,`created_at`,`updated_at`,`status`,`publish_date`,`created_by`) values (68,2,'2016-11-03 13:19:49','2016-11-03 13:19:49','PUBLISH','2016-11-03 00:00:00',1);
insert  into `posts`(`id`,`post_type_id`,`created_at`,`updated_at`,`status`,`publish_date`,`created_by`) values (69,2,'2016-11-03 13:19:49','2016-11-03 13:19:49','PUBLISH','2016-11-03 00:00:00',1);
insert  into `posts`(`id`,`post_type_id`,`created_at`,`updated_at`,`status`,`publish_date`,`created_by`) values (70,4,'2016-11-05 14:21:55','2016-11-10 18:28:41','PUBLISH','2016-11-05 14:21:00',3);
insert  into `posts`(`id`,`post_type_id`,`created_at`,`updated_at`,`status`,`publish_date`,`created_by`) values (71,2,'2016-11-10 17:36:56','2016-11-10 17:51:47','PUBLISH','2016-11-10 17:35:00',3);
insert  into `posts`(`id`,`post_type_id`,`created_at`,`updated_at`,`status`,`publish_date`,`created_by`) values (72,3,'2016-11-10 18:26:45','2016-11-10 18:26:45','PUBLISH','2016-11-10 18:04:00',3);
insert  into `posts`(`id`,`post_type_id`,`created_at`,`updated_at`,`status`,`publish_date`,`created_by`) values (73,3,'2016-11-11 18:33:49','2016-11-11 18:33:49','PUBLISH','2016-11-11 18:33:00',3);
insert  into `posts`(`id`,`post_type_id`,`created_at`,`updated_at`,`status`,`publish_date`,`created_by`) values (74,3,'2016-11-11 18:35:21','2016-11-11 18:35:21','PUBLISH','2016-11-11 18:34:00',3);
insert  into `posts`(`id`,`post_type_id`,`created_at`,`updated_at`,`status`,`publish_date`,`created_by`) values (75,3,'2016-11-11 18:35:55','2016-11-11 18:35:55','PUBLISH','2016-11-11 18:35:00',3);
insert  into `posts`(`id`,`post_type_id`,`created_at`,`updated_at`,`status`,`publish_date`,`created_by`) values (76,3,'2016-11-11 18:36:42','2016-11-11 18:36:42','PUBLISH','2016-11-11 18:36:00',3);

/*Table structure for table `role_has_permissions` */

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `role_has_permissions` */

insert  into `role_has_permissions`(`permission_id`,`role_id`) values (1,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (2,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (3,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (4,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (5,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (6,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (7,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (8,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (9,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (10,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (11,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (12,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (13,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (14,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (15,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (16,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (21,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (22,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (23,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (24,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (25,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (26,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (27,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (28,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (29,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (30,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (31,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (32,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (33,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (34,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (35,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (36,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (37,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (38,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (39,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (40,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (41,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (42,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (43,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (44,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (45,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (46,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (47,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (48,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (49,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (50,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (51,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (52,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (53,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (54,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (55,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (56,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (57,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (58,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (59,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (60,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (61,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (62,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (1,3);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (2,3);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (3,3);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (4,3);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (5,3);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (8,3);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (1,4);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (2,4);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (3,4);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (4,4);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (5,4);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (6,4);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (7,4);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (8,4);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (9,4);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (10,4);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (11,4);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (12,4);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (13,4);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (14,4);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (15,4);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (16,4);

/*Table structure for table `roles` */

CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `roles` */

insert  into `roles`(`id`,`name`,`created_at`,`updated_at`) values (1,'Administrator',NULL,NULL);
insert  into `roles`(`id`,`name`,`created_at`,`updated_at`) values (3,'Author','2016-10-12 20:11:37','2016-10-12 20:11:37');
insert  into `roles`(`id`,`name`,`created_at`,`updated_at`) values (4,'Semi Admin','2016-10-13 17:34:12','2016-10-13 17:34:12');

/*Table structure for table `sessions` */

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

insert  into `sessions`(`id`,`user_id`,`ip_address`,`user_agent`,`payload`,`last_activity`) values ('AzpZmDyAmtKQJyyVZnGC3xKfxQokQkgk0sB2JGVW',3,'192.168.10.1','Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.71 Safari/537.36','YTo2OntzOjY6Il90b2tlbiI7czo0MDoic0t0R0lJeXpkQ3FuMUVOUjhuaGV5TjZCbmgyajRyZ1c0aGJzZGZvdCI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MztzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyNzoiaHR0cDovL2phaS5kZXYvaWQvbmV3cy1ibG9nIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo0OiJsYW5nIjtzOjI6ImlkIjtzOjk6Il9zZjJfbWV0YSI7YTozOntzOjE6InUiO2k6MTQ3ODg2NzAyNTtzOjE6ImMiO2k6MTQ3ODg1Njc2ODtzOjE6ImwiO3M6MToiMCI7fX0=',1478867025);

/*Table structure for table `show_details` */

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

insert  into `show_details`(`id`,`show_id`,`title`,`slug`,`lang`,`content`) values (23,8,'Coral Reef Story Time (English)','coral-reef-story-time-english','en','At vero eos et accusamus et iusto odio madeline dignis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo mallera consequat aller proident.<br />At vero eos et accusamus et iusto odio madeline dignis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo mallera consequat aller proident.<br />At vero eos et accusamus et iusto odio madeline dignis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo mallera consequat aller proident.');
insert  into `show_details`(`id`,`show_id`,`title`,`slug`,`lang`,`content`) values (24,8,'Coral Reef Story Time (ID)','coral-reef-story-time-id','id','At vero eos et accusamus et iusto odio madeline dignis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo mallera consequat aller proident.<br />At vero eos et accusamus et iusto odio madeline dignis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo mallera consequat aller proident.<br />At vero eos et accusamus et iusto odio madeline dignis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo mallera consequat aller proident.');
insert  into `show_details`(`id`,`show_id`,`title`,`slug`,`lang`,`content`) values (27,10,'Particular Show','particular-show','en','At vero eos et accusamus et iusto odio madeline dignis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo mallera consequat aller proident.');
insert  into `show_details`(`id`,`show_id`,`title`,`slug`,`lang`,`content`) values (28,10,'Pertunjukan Musiman','pertunjukan-musiman','id','At vero eos et accusamus et iusto odio madeline dignis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo mallera consequat aller proident.');
insert  into `show_details`(`id`,`show_id`,`title`,`slug`,`lang`,`content`) values (31,9,'Limited Show','limited-show','en','At vero eos et accusamus et iusto odio madeline dignis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo mallera consequat aller proident.');
insert  into `show_details`(`id`,`show_id`,`title`,`slug`,`lang`,`content`) values (32,9,'Pertunjukan Terbatas','pertunjukan-terbatas','id','At vero eos et accusamus et iusto odio madeline dignis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo mallera consequat aller proident.');

/*Table structure for table `show_has_medias` */

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

insert  into `show_has_medias`(`id`,`show_id`,`media_id`,`media_type`) values (4,8,52,'featured');

/*Table structure for table `show_metas` */

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

insert  into `show_metas`(`id`,`show_id`,`meta_key`,`meta_value`) values (9,8,'meta_description-en','Show Meta (EN)');
insert  into `show_metas`(`id`,`show_id`,`meta_key`,`meta_value`) values (10,8,'meta_description-id','Show Meta (ID)');

/*Table structure for table `show_types` */

CREATE TABLE `show_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `show_types` */

/*Table structure for table `shows` */

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

insert  into `shows`(`id`,`show_type`,`created_by`,`created_at`,`updated_at`,`day`,`start_date`,`end_date`,`start_time`,`end_time`) values (8,1,3,'2016-11-10 18:31:53','2016-11-10 18:41:49',5,'1970-01-01','1970-01-01','14:00:00','00:00:00');
insert  into `shows`(`id`,`show_type`,`created_by`,`created_at`,`updated_at`,`day`,`start_date`,`end_date`,`start_time`,`end_time`) values (9,3,3,'2016-11-11 18:11:05','2016-11-11 18:31:51',1,'2016-11-09','2016-11-15','13:00:00','00:00:00');
insert  into `shows`(`id`,`show_type`,`created_by`,`created_at`,`updated_at`,`day`,`start_date`,`end_date`,`start_time`,`end_time`) values (10,2,3,'2016-11-11 18:12:32','2016-11-11 18:12:32',5,'1970-01-01','1970-01-01','11:00:00','00:00:00');

/*Table structure for table `slider_items` */

CREATE TABLE `slider_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slider_id` int(11) NOT NULL,
  `lang` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'en',
  `content` text COLLATE utf8_unicode_ci,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '#',
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `slider_items` */

insert  into `slider_items`(`id`,`slider_id`,`lang`,`content`,`link`,`file_name`,`order`) values (5,6,'en','HERE YOU WILL MEET FACE-TO-FACE WITH THE TAME PREDATORS','#','bg-section-sight.png',0);
insert  into `slider_items`(`id`,`slider_id`,`lang`,`content`,`link`,`file_name`,`order`) values (6,6,'id','DISINI KALIAN AKAN BERHADAPANG LANGSUNG DENGAN HIU PREDATOR','#','head-sample-03.jpg',0);
insert  into `slider_items`(`id`,`slider_id`,`lang`,`content`,`link`,`file_name`,`order`) values (9,6,'en','EXPLORE A HUNDRED OF BEAUTIFUL JELLIES IN A DARK TANK','#','head-sample-01.jpg',1);
insert  into `slider_items`(`id`,`slider_id`,`lang`,`content`,`link`,`file_name`,`order`) values (10,6,'id','DISINI KALIAN AKAN BERTEMU DENGAN FINDING DORI','#','head-sample-01.jpg',1);

/*Table structure for table `sliders` */

CREATE TABLE `sliders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `publish_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `sliders` */

insert  into `sliders`(`id`,`title`,`user_id`,`publish_date`,`created_at`,`updated_at`) values (6,'Homeslider',3,'2016-10-26 19:05:00','2016-10-25 19:08:43','2016-10-25 20:07:46');

/*Table structure for table `tags` */

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

CREATE TABLE `user_has_roles` (
  `role_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`user_id`),
  KEY `user_has_roles_user_id_foreign` (`user_id`),
  CONSTRAINT `user_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_has_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `user_has_roles` */

insert  into `user_has_roles`(`role_id`,`user_id`) values (1,1);
insert  into `user_has_roles`(`role_id`,`user_id`) values (1,3);
insert  into `user_has_roles`(`role_id`,`user_id`) values (4,3);

/*Table structure for table `users` */

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

insert  into `users`(`id`,`name`,`email`,`password`,`remember_token`,`created_at`,`updated_at`) values (1,'Pasha Mahardika','me@pashamahardika.com','$2y$10$Ys8gQPnelcFYGY7vVzKe/OHSzXBLNyqPGz9DTHFp9MZGzRa7djpb.','9pYCFU0NQHVB8a8ym5J37JdOU0guoqcO0dDZQXoiZB9mijqYi1VNRqysdHRP','2016-10-12 03:35:26','2016-10-12 07:55:17');
insert  into `users`(`id`,`name`,`email`,`password`,`remember_token`,`created_at`,`updated_at`) values (3,'Edwina Trianinda','trianinda.edwina@gmail.com','$2y$10$iWVk/vWv/R3oa1ipa.pVgem6ypOZvDLW.F4jnbxEVODJFxbKgKHRa','EL0vGWYARjbxg9eate1N7LINscJpcwlWuL2JR6tOVcHv7NZwg1yiLml5vSMC','2016-10-12 07:41:14','2016-11-10 14:33:04');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
