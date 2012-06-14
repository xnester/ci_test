/*
Navicat MySQL Data Transfer

Source Server         : 10.0.1.53
Source Server Version : 50152
Source Host           : 10.0.1.53:3306
Source Database       : ci_test

Target Server Type    : MYSQL
Target Server Version : 50152
File Encoding         : 65001

Date: 2012-06-14 17:40:06
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `clients`
-- ----------------------------
DROP TABLE IF EXISTS `clients`;
CREATE TABLE `clients` (
  `id` int(6) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `cus_id` int(6) unsigned zerofill NOT NULL COMMENT 'customer id',
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `dealer_id` int(6) NOT NULL,
  `status` enum('Active','Suspend','Terminate') NOT NULL DEFAULT 'Active',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=126 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of clients
-- ----------------------------
INSERT INTO `clients` VALUES ('000122', '123450', 'test12345', 'test@test.com', '4019', '0', 'Active', '2012-06-14 14:45:01', '2012-06-14 17:17:19');
INSERT INTO `clients` VALUES ('000123', '654321', 'Spam', 'spam@spam.com', '4321', '0', 'Active', '2012-06-14 16:06:03', '2012-06-14 17:17:22');
INSERT INTO `clients` VALUES ('000124', '020018', 'Jasmine Internet', 'domain@ji-net.com', '4019', '0', 'Active', '2012-06-14 17:08:36', '2012-06-14 17:18:26');
INSERT INTO `clients` VALUES ('000125', '003333', '3333', '3333', '33334', '0', 'Active', '2012-06-14 17:18:19', '2012-06-14 17:19:09');

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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of contacts
-- ----------------------------
INSERT INTO `contacts` VALUES ('1', 'test', 'test@test.com', 'test', '2012-04-10 01:07:58', '');
INSERT INTO `contacts` VALUES ('2', 'Spam', 'Spam', 'Spam', '2012-04-10 10:17:35', '');
INSERT INTO `contacts` VALUES ('3', 'Spam', '111', '890', '2012-04-10 10:17:58', '');
INSERT INTO `contacts` VALUES ('4', 'Spam', '111', '890', '2012-04-10 10:18:14', '');
INSERT INTO `contacts` VALUES ('5', 'Spam', '111', '890', '2012-04-10 10:18:17', '');
INSERT INTO `contacts` VALUES ('6', 'test', 'ttest@test.com', 'test', '2012-04-17 16:09:45', '');
INSERT INTO `contacts` VALUES ('7', 'test', 'test', 'test', '2012-04-18 18:34:48', '');
INSERT INTO `contacts` VALUES ('8', '123', '123', '123', '2012-04-19 12:59:05', '');
INSERT INTO `contacts` VALUES ('9', '000', '000', '000', '2012-04-19 14:08:01', '');

-- ----------------------------
-- Table structure for `dealers`
-- ----------------------------
DROP TABLE IF EXISTS `dealers`;
CREATE TABLE `dealers` (
  `id` int(6) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(6) NOT NULL,
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dealers
-- ----------------------------

-- ----------------------------
-- Table structure for `domains`
-- ----------------------------
DROP TABLE IF EXISTS `domains`;
CREATE TABLE `domains` (
  `id` int(6) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `registrar` varchar(255) NOT NULL,
  `created` date NOT NULL,
  `expires` date NOT NULL,
  `changed` date NOT NULL,
  `nserver` varchar(255) NOT NULL,
  `status` enum('Suspend','Active') NOT NULL DEFAULT 'Active',
  `client_id` int(4) unsigned zerofill NOT NULL,
  `add` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `stamp` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `note` longtext NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `domain_name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of domains
-- ----------------------------
INSERT INTO `domains` VALUES ('000001', 'ji-net.com', 'NETWORK SOLUTIONS, LLC.', '1999-10-08', '2014-10-08', '2011-09-14', 'ns.ji-net.com,ns2.ji-net.com,', 'Active', '0000', '0000-00-00 00:00:00', '2012-05-02 16:20:03', '');
INSERT INTO `domains` VALUES ('000002', 'google.com', 'MARKMONITOR INC.', '1997-09-15', '2020-09-13', '2012-01-29', 'ns1.google.com,ns2.google.com,ns3.google.com,ns4.google.com,', 'Active', '0000', '0000-00-00 00:00:00', '2012-05-04 15:34:27', '');
INSERT INTO `domains` VALUES ('000003', 'ji-net.co.th', 'T.H.NIC Co., Ltd.', '0000-00-00', '0000-00-00', '0000-00-00', 'ns.ji-net.co.th,ns2.ji-net.co.th,', 'Active', '0000', '0000-00-00 00:00:00', '2012-05-22 14:00:38', '');
