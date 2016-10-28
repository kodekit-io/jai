/*
SQLyog Community
MySQL - 5.7.12 : Database - jai
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `categories` */

insert  into `categories`(`id`,`post_type_id`,`name`,`slug`,`description`,`created_at`,`updated_at`,`parent_id`) values (1,1,'News','news',NULL,'2016-10-21 20:40:03','2016-10-21 20:40:03',0);
insert  into `categories`(`id`,`post_type_id`,`name`,`slug`,`description`,`created_at`,`updated_at`,`parent_id`) values (2,1,'What\'s On','whats-on',NULL,'2016-10-22 09:59:54','2016-10-22 09:59:54',0);
insert  into `categories`(`id`,`post_type_id`,`name`,`slug`,`description`,`created_at`,`updated_at`,`parent_id`) values (3,2,'Test Category','test-category',NULL,NULL,NULL,0);
insert  into `categories`(`id`,`post_type_id`,`name`,`slug`,`description`,`created_at`,`updated_at`,`parent_id`) values (15,1,'Coba','coba',NULL,'2016-10-22 10:46:19','2016-10-22 10:46:19',0);

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `menus` */

insert  into `menus`(`id`,`name`,`display`,`link`,`parent_id`,`permission`,`icon_class`,`description`,`created_at`,`updated_at`,`order`) values (1,'dashboard','Dashboard','jai-backend',0,'dashboard','icon-home',NULL,NULL,NULL,0);
insert  into `menus`(`id`,`name`,`display`,`link`,`parent_id`,`permission`,`icon_class`,`description`,`created_at`,`updated_at`,`order`) values (2,'post','Posts','javascript:;',0,'post','fa fa-pencil',NULL,NULL,NULL,100);
insert  into `menus`(`id`,`name`,`display`,`link`,`parent_id`,`permission`,`icon_class`,`description`,`created_at`,`updated_at`,`order`) values (3,'post.add','Add Post','jai-backend/post/add',2,'post.add',NULL,NULL,NULL,NULL,200);
insert  into `menus`(`id`,`name`,`display`,`link`,`parent_id`,`permission`,`icon_class`,`description`,`created_at`,`updated_at`,`order`) values (4,'setting','Settings','javascript:;',0,'setting','fa fa-gears',NULL,NULL,NULL,1000);
insert  into `menus`(`id`,`name`,`display`,`link`,`parent_id`,`permission`,`icon_class`,`description`,`created_at`,`updated_at`,`order`) values (5,'user','User','jai-backend/user',4,'user',NULL,NULL,NULL,NULL,300);
insert  into `menus`(`id`,`name`,`display`,`link`,`parent_id`,`permission`,`icon_class`,`description`,`created_at`,`updated_at`,`order`) values (6,'permission','Permission','jai-backend/permission',4,'permission',NULL,NULL,NULL,NULL,100);
insert  into `menus`(`id`,`name`,`display`,`link`,`parent_id`,`permission`,`icon_class`,`description`,`created_at`,`updated_at`,`order`) values (7,'role','Role','jai-backend/role',4,'role',NULL,NULL,NULL,NULL,200);
insert  into `menus`(`id`,`name`,`display`,`link`,`parent_id`,`permission`,`icon_class`,`description`,`created_at`,`updated_at`,`order`) values (9,'post.list','Post List','jai-backend/post',2,'post',NULL,NULL,NULL,NULL,100);
insert  into `menus`(`id`,`name`,`display`,`link`,`parent_id`,`permission`,`icon_class`,`description`,`created_at`,`updated_at`,`order`) values (10,'category','Post Category','jai-backend/post-category/1',2,'post','',NULL,NULL,NULL,300);
insert  into `menus`(`id`,`name`,`display`,`link`,`parent_id`,`permission`,`icon_class`,`description`,`created_at`,`updated_at`,`order`) values (13,'posttype','Post Type','jai-backend/post-type',4,'post-type','',NULL,NULL,NULL,400);
insert  into `menus`(`id`,`name`,`display`,`link`,`parent_id`,`permission`,`icon_class`,`description`,`created_at`,`updated_at`,`order`) values (14,'slider','Slider','javascript:;',0,'slider','icon-picture',NULL,NULL,NULL,700);
insert  into `menus`(`id`,`name`,`display`,`link`,`parent_id`,`permission`,`icon_class`,`description`,`created_at`,`updated_at`,`order`) values (15,'slider.list','Slider List','jai-backend/slider',14,'slider',NULL,NULL,NULL,NULL,100);
insert  into `menus`(`id`,`name`,`display`,`link`,`parent_id`,`permission`,`icon_class`,`description`,`created_at`,`updated_at`,`order`) values (16,'slider.add','Add Slider','jai-backend/slider/add',14,'slider.add',NULL,NULL,NULL,NULL,200);
insert  into `menus`(`id`,`name`,`display`,`link`,`parent_id`,`permission`,`icon_class`,`description`,`created_at`,`updated_at`,`order`) values (17,'news','News','javascript:;',0,'news','fa fa-newspaper-o',NULL,NULL,NULL,200);
insert  into `menus`(`id`,`name`,`display`,`link`,`parent_id`,`permission`,`icon_class`,`description`,`created_at`,`updated_at`,`order`) values (18,'news.list','News List','jai-backend/news',17,'news',NULL,NULL,NULL,NULL,100);
insert  into `menus`(`id`,`name`,`display`,`link`,`parent_id`,`permission`,`icon_class`,`description`,`created_at`,`updated_at`,`order`) values (19,'news.add','Add News','jai-backend/news/add',17,'news.add',NULL,NULL,NULL,NULL,200);
insert  into `menus`(`id`,`name`,`display`,`link`,`parent_id`,`permission`,`icon_class`,`description`,`created_at`,`updated_at`,`order`) values (20,'news.category','News Category','jai-backend/post-category/2',17,'news-category',NULL,NULL,NULL,NULL,300);
insert  into `menus`(`id`,`name`,`display`,`link`,`parent_id`,`permission`,`icon_class`,`description`,`created_at`,`updated_at`,`order`) values (24,'package','Package','javascript:;',0,'package','fa fa-ticket',NULL,NULL,NULL,400);
insert  into `menus`(`id`,`name`,`display`,`link`,`parent_id`,`permission`,`icon_class`,`description`,`created_at`,`updated_at`,`order`) values (25,'package.list','Package List','jai-backend/package',24,'package',NULL,NULL,NULL,NULL,100);
insert  into `menus`(`id`,`name`,`display`,`link`,`parent_id`,`permission`,`icon_class`,`description`,`created_at`,`updated_at`,`order`) values (26,'package.add','Add Package','jai-backend/package/add',24,'package.add',NULL,NULL,NULL,NULL,200);
insert  into `menus`(`id`,`name`,`display`,`link`,`parent_id`,`permission`,`icon_class`,`description`,`created_at`,`updated_at`,`order`) values (27,'holidays','Holiday Management','jai-backend/holiday',24,'holiday',NULL,NULL,NULL,NULL,500);

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `package_details` */

insert  into `package_details`(`id`,`package_id`,`lang`,`title`,`slug`,`content`) values (1,1,'en','General Admission','general-admission','Meet sharks, turtles, jellyfish and other animals');
insert  into `package_details`(`id`,`package_id`,`lang`,`title`,`slug`,`content`) values (2,1,'id','Paket Umum','paket-umum','Temui hiu, kura-kura, ubur-ubur, gurita dan binatang lainnya.');
insert  into `package_details`(`id`,`package_id`,`lang`,`title`,`slug`,`content`) values (5,3,'en','Package A','package-a','Admission + 5D Theater');
insert  into `package_details`(`id`,`package_id`,`lang`,`title`,`slug`,`content`) values (6,3,'id','Paket A','paket-a','Pendaftaran + 5D Theater');

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

/*Table structure for table `packages` */

CREATE TABLE `packages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `package_type_id` int(11) NOT NULL DEFAULT '1',
  `normal_price` double NOT NULL DEFAULT '0',
  `weekend_price` double NOT NULL DEFAULT '0',
  `holiday_price` double NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `packages` */

insert  into `packages`(`id`,`package_type_id`,`normal_price`,`weekend_price`,`holiday_price`,`created_by`,`created_at`,`updated_at`) values (1,1,100000,200000,200000,3,'2016-10-28 21:59:22','2016-10-28 21:59:22');
insert  into `packages`(`id`,`package_type_id`,`normal_price`,`weekend_price`,`holiday_price`,`created_by`,`created_at`,`updated_at`) values (3,1,400000,450000,450000,3,'2016-10-28 22:10:11','2016-10-28 22:10:11');

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
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (21,'en','AH MENG AND FAMILY REVEL IN NEW HANGOUT AT SINGAPORE ZOO','ah-meng-and-family-revel-in-new-hangout-at-singapore-zoo','Singapore Zoo introduced their flagship orangutans to a new free-ranging area earlier this month, to complement the Ah Meng-zing experience, which happens every weekend this June. Overlooking the picturesque Upper Seletar Reservoir, the new space features hammocks and interconnecting vines for the orangutans to explore. An average of five orangutans hang out in the area daily to enjoy the treetop haven, while guests walking underneath them stop to gaze in wonder at the charismatic apes above. <br />Guests have one final weekend to enjoy the Ah Meng-zing experience, where Singapore Zoo transforms into a living classroom to show visitors, parents and children alike, the small things they can do to help save the planet and the animals that share it. Visitors can discover and appreciate wildlife through a diverse range of activities, including meet and greet sessions with larger than life mascots, inventive craft workshops, and enlightening animal enrichment trails. For more information about the June holiday activities');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (21,'id','AH MENG AND FAMILY REVEL IN NEW HANGOUT AT SINGAPORE ZOO','ah-meng-and-family-revel-in-new-hangout-at-singapore-zoo-2','Singapore Zoo introduced their flagship orangutans to a new free-ranging area earlier this month, to complement the Ah Meng-zing experience, which happens every weekend this June. Overlooking the picturesque Upper Seletar Reservoir, the new space features hammocks and interconnecting vines for the orangutans to explore. An average of five orangutans hang out in the area daily to enjoy the treetop haven, while guests walking underneath them stop to gaze in wonder at the charismatic apes above. <br />Guests have one final weekend to enjoy the Ah Meng-zing experience, where Singapore Zoo transforms into a living classroom to show visitors, parents and children alike, the small things they can do to help save the planet and the animals that share it. Visitors can discover and appreciate wildlife through a diverse range of activities, including meet and greet sessions with larger than life mascots, inventive craft workshops, and enlightening animal enrichment trails. For more information about the June holiday activities');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (24,'en','XPLORE A HUNDRED OF BEAUTIFUL JELLIES IN A DARK TANK','xplore-a-hundred-of-beautiful-jellies-in-a-dark-tank','English Content');
insert  into `post_details`(`post_id`,`lang`,`title`,`slug`,`content`) values (24,'id','DISINI KALIAN AKAN BERTEMU DENGAN FINDING DORI','disini-kalian-akan-bertemu-dengan-finding-dori','Content bahasa');

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

insert  into `post_has_categories`(`post_id`,`category_id`) values (21,1);
insert  into `post_has_categories`(`post_id`,`category_id`) values (17,2);
insert  into `post_has_categories`(`post_id`,`category_id`) values (18,2);
insert  into `post_has_categories`(`post_id`,`category_id`) values (21,2);
insert  into `post_has_categories`(`post_id`,`category_id`) values (19,3);
insert  into `post_has_categories`(`post_id`,`category_id`) values (24,3);

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
insert  into `post_has_medias`(`post_id`,`media_id`,`media_type`) values (21,47,'featured');
insert  into `post_has_medias`(`post_id`,`media_id`,`media_type`) values (24,47,'featured');

/*Table structure for table `post_metas` */

CREATE TABLE `post_metas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(10) unsigned NOT NULL,
  `meta_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_value` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `post_metas_post_id_foreign` (`post_id`),
  CONSTRAINT `post_metas_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `post_metas` */

insert  into `post_metas`(`id`,`post_id`,`meta_key`,`meta_value`) values (4,19,'whats_on','1');
insert  into `post_metas`(`id`,`post_id`,`meta_key`,`meta_value`) values (6,24,'whats_on','1');

/*Table structure for table `post_types` */

CREATE TABLE `post_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `post_types` */

insert  into `post_types`(`id`,`name`,`slug`,`created_at`,`updated_at`) values (1,'Post','post','2016-10-13 18:32:05','2016-10-13 18:32:05');
insert  into `post_types`(`id`,`name`,`slug`,`created_at`,`updated_at`) values (2,'News','news','2016-10-26 18:44:06','2016-10-26 18:44:06');
insert  into `post_types`(`id`,`name`,`slug`,`created_at`,`updated_at`) values (3,'Event','event','2016-10-13 20:13:53','2016-10-13 20:13:53');

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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `posts` */

insert  into `posts`(`id`,`post_type_id`,`created_at`,`updated_at`,`status`,`publish_date`,`created_by`) values (17,1,'2016-10-22 19:20:17','2016-10-27 18:34:17','PUBLISH','2016-10-22 19:19:00',1);
insert  into `posts`(`id`,`post_type_id`,`created_at`,`updated_at`,`status`,`publish_date`,`created_by`) values (18,1,'2016-10-24 11:40:55','2016-10-24 18:15:16','PUBLISH','2016-10-24 11:35:00',1);
insert  into `posts`(`id`,`post_type_id`,`created_at`,`updated_at`,`status`,`publish_date`,`created_by`) values (19,2,'2016-10-27 18:22:34','2016-10-28 15:10:06','PUBLISH','2016-10-27 18:22:00',1);
insert  into `posts`(`id`,`post_type_id`,`created_at`,`updated_at`,`status`,`publish_date`,`created_by`) values (21,1,'2016-10-27 18:33:36','2016-10-27 18:33:36','PUBLISH','2016-10-27 18:32:00',1);
insert  into `posts`(`id`,`post_type_id`,`created_at`,`updated_at`,`status`,`publish_date`,`created_by`) values (24,2,'2016-10-28 14:31:20','2016-10-28 22:04:10','PUBLISH','2016-10-28 14:30:00',1);

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

insert  into `sessions`(`id`,`user_id`,`ip_address`,`user_agent`,`payload`,`last_activity`) values ('4d8Ode8wUUoNfw2jWyJOe1JSyIjKHoIV9ozeGgWM',3,'192.168.10.1','Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.71 Safari/537.36','YTo3OntzOjY6Il90b2tlbiI7czo0MDoiUDFKRFQ0QUYzNm9iUjM3NG1iVnRvQ05uaG9GVjBaOE52eDM2M1RMTCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly9qYWkuZGV2L2phaS1iYWNrZW5kL3BhY2thZ2UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjQ6ImxhbmciO3M6MjoiaWQiO3M6MzoidXJsIjthOjA6e31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozO3M6OToiX3NmMl9tZXRhIjthOjM6e3M6MToidSI7aToxNDc3NjY3NDEyO3M6MToiYyI7aToxNDc3NjU1NzI5O3M6MToibCI7czoxOiIwIjt9fQ==',1477667412);

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
insert  into `users`(`id`,`name`,`email`,`password`,`remember_token`,`created_at`,`updated_at`) values (3,'Edwina Trianinda','trianinda.edwina@gmail.com','$2y$10$iWVk/vWv/R3oa1ipa.pVgem6ypOZvDLW.F4jnbxEVODJFxbKgKHRa','Hi50RYQzPSvKQ0ywaBRpgzHLiS8vvtv0ddQe3YexffBdHA6mHZH1Brm1ND4W','2016-10-12 07:41:14','2016-10-24 22:19:07');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
