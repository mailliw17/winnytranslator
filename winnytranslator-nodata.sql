-- Adminer 4.8.0 MySQL 5.7.24 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `documents`;
CREATE TABLE `documents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_title` varchar(200) DEFAULT NULL,
  `ch_title` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `number_chapter` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `document_chapters`;
CREATE TABLE `document_chapters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `document_id` int(11) NOT NULL,
  `user_id` varchar(50) DEFAULT NULL,
  `ch_chapter_title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_chapter_title` varchar(100) DEFAULT NULL,
  `ch_text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_text` text,
  `number_words` int(11) DEFAULT NULL,
  `cost_of_translate` float DEFAULT NULL,
  `revision_reason` text,
  `reduced_fare` float DEFAULT NULL,
  `status` int(2) NOT NULL,
  `is_paid` int(2) NOT NULL,
  `is_lock` int(2) NOT NULL,
  `is_vendor_paid` int(2) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `user_payments`;
CREATE TABLE `user_payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(50) NOT NULL,
  `price` int(3) DEFAULT NULL,
  `payment_method` varchar(50) NOT NULL,
  `account_info` varchar(50) NOT NULL,
  `account_name` varchar(50) NOT NULL,
  `number_chapters` int(11) DEFAULT NULL,
  `number_words` int(11) DEFAULT NULL,
  `last_payment` datetime DEFAULT NULL,
  `salary` int(11) DEFAULT NULL,
  `payment_period` varchar(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `withdraw_histories`;
CREATE TABLE `withdraw_histories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_payment_id` int(11) NOT NULL,
  `salary` float NOT NULL,
  `number_words_wd` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- 2022-08-29 14:24:47
