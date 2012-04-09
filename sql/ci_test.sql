/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50137
Source Host           : localhost:3306
Source Database       : ci_test

Target Server Type    : MYSQL
Target Server Version : 50137
File Encoding         : 65001

Date: 2012-04-10 00:11:20
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `contacts`
-- ----------------------------
DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `notes` text NOT NULL,
  `stamp` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `ipaddress` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of contacts
-- ----------------------------
INSERT INTO `contacts` VALUES ('1', 'test', 'test@test.com', 'test', '2012-04-10 01:07:58', '');
