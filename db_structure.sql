/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : jobboardcms

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2020-11-19 11:39:14
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `employers`
-- ----------------------------
DROP TABLE IF EXISTS `employers`;
CREATE TABLE `employers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site_id` varchar(255) DEFAULT NULL,
  `employer_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `hidden` varchar(255) DEFAULT NULL,
  `approved` varchar(255) DEFAULT NULL,
  `active_jobs_count` varchar(30) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `ts_integrate` varchar(10) DEFAULT NULL,
  `ts_id` varchar(255) DEFAULT NULL,
  `zapier_webhook_url` varchar(255) DEFAULT NULL,
  `zapier_integrate` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for `fields`
-- ----------------------------
DROP TABLE IF EXISTS `fields`;
CREATE TABLE `fields` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employer_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `required` varchar(10) DEFAULT NULL,
  `zapier_data_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for `logs`
-- ----------------------------
DROP TABLE IF EXISTS `logs`;
CREATE TABLE `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) DEFAULT NULL,
  `request` text,
  `response` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for `sites`
-- ----------------------------
DROP TABLE IF EXISTS `sites`;
CREATE TABLE `sites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `api_key` varchar(255) DEFAULT NULL,
  `employers` varchar(255) DEFAULT NULL,
  `api_key_checked` int(11) DEFAULT NULL,
  `jobboard_url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
